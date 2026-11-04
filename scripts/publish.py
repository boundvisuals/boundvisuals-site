"""Publish approved queue items to Instagram (carousel/single) + Facebook Page.

usage: python scripts/publish.py run|check
  check = build captions and create Instagram containers WITHOUT publishing (private test).
  run   = publish every approved item whose date/time (Europe/Lisbon) has passed and is not yet published.
State is kept in queue/published.json. Images are served from https://www.boundvisuals.com/bv-fila/<project>/<file>.
"""
import glob, json, os, sys, time, urllib.parse, urllib.request
from datetime import datetime, timedelta
from zoneinfo import ZoneInfo
import yaml

G = "https://graph.facebook.com/v21.0"
TOKEN = os.environ["META_TOKEN"]
CFG = yaml.safe_load(open("config/program.yml"))
IG, PAGE = CFG["meta"]["ig_user_id"], CFG["meta"]["page_id"]
INS = CFG["instagram"]
BASE = "https://www.boundvisuals.com/bv-fila"
STATE_F = "queue/published.json"
TZ = ZoneInfo("Europe/Lisbon")


def api(method, path, token=TOKEN, **params):
    params["access_token"] = token
    data = urllib.parse.urlencode(params).encode()
    url = f"{G}/{path}"
    req = urllib.request.Request(url + ("?" + data.decode() if method == "GET" else ""), data=None if method == "GET" else data, method=method)
    try:
        with urllib.request.urlopen(req, timeout=120) as r:
            return json.load(r)
    except urllib.error.HTTPError as e:
        body = e.read().decode()
        raise RuntimeError(f"{method} {path} -> {e.code} {body[:400]}")


def caption(item):
    # Mentions OFF (2026-11-04): 14 @mentions per API post look like spam to Instagram; re-enable with instagram.mentions_in_caption: true
    text = f"{item['caption_en']}\n—\n{item['caption_pt']}"
    if INS.get("mentions_in_caption"):
        text += "\n\n" + " ".join("@" + m for m in INS["mentions"])
    return text


def hashtags(n):
    rot = INS["hashtags_rotate"]
    pick = [rot[(n * 4 + i) % len(rot)] for i in range(4)]
    tags = INS["hashtags_always"] + pick
    return " ".join("#" + t for t in tags[: INS.get("hashtags_max", 30)])


def new_container(**params):
    """Create a media container. Meta sometimes answers id "0" (HTTP 200) on the first try for a carousel parent
    (flaky; the same call succeeds on retry): retry a few times with a pause, fail loudly if it never works."""
    resp = {}
    for attempt in range(5):
        resp = api("POST", f"{IG}/media", **params)
        cid = resp.get("id")
        if cid and str(cid) != "0":
            return cid
        time.sleep(10 + 10 * attempt)
    what = params.get("media_type") or ("carousel item" if params.get("is_carousel_item") else "single")
    raise RuntimeError(f"Meta returned container id 0 for {what} after 5 tries: {json.dumps(resp)[:300]}")


def wait_ready(cid, tries=30):
    for _ in range(tries):
        r = api("GET", cid, fields="status_code,status")
        s = r.get("status_code")
        if s == "FINISHED":
            return
        if s == "ERROR":
            raise RuntimeError(f"container {cid} ERROR: {json.dumps(r)[:300]}")
        time.sleep(5)
    raise RuntimeError(f"container {cid} not ready")


def ig_container(item):
    urls = [f"{BASE}/{item['project']}/{urllib.parse.quote(s)}" for s in item["slides"]]
    last = None
    for attempt in range(3):
        try:
            if len(urls) == 1:
                c = new_container(image_url=urls[0], caption=caption(item))
            else:
                kids = [new_container(image_url=u, is_carousel_item="true") for u in urls]
                for k in kids:
                    wait_ready(k)
                time.sleep(5)
                c = new_container(media_type="CAROUSEL", children=",".join(kids), caption=caption(item))
            wait_ready(c)
            return c, urls
        except RuntimeError as e:
            last = e
            print("container attempt", attempt + 1, "failed:", e)
            time.sleep(30)
    raise last


def fb_post(item, urls):
    ptok = api("GET", PAGE, fields="access_token")["access_token"]
    ids = [api("POST", f"{PAGE}/photos", token=ptok, url=u, published="false")["id"] for u in urls]
    msg = f"{item['caption_en']}\n—\n{item['caption_pt']}"
    params = {"message": msg}
    for i, pid in enumerate(ids):
        params[f"attached_media[{i}]"] = json.dumps({"media_fbid": pid})
    return api("POST", f"{PAGE}/feed", token=ptok, **params)["id"]


def social_items():
    items = []
    for f in sorted(glob.glob("queue/social-week-*.yml")):
        items += yaml.safe_load(open(f)) or []
    return items


def publish_social(it, n):
    """Story (image, no caption) or reel (mp4 + cover + caption). Files are uploaded to /bv-fila/<project>/<type>/ by the workflow."""
    typ, proj, fn = it["type"], it["project"], it["file"]
    url = f"{BASE}/{proj}/{typ}/{urllib.parse.quote(fn)}"
    rec = {}
    if typ == "story":
        c = new_container(image_url=url, media_type="STORIES")
        wait_ready(c)
    else:
        cover = f"{BASE}/{proj}/{typ}/{urllib.parse.quote(it['cover'])}"
        c = new_container(media_type="REELS", video_url=url, cover_url=cover, caption=caption(it), share_to_feed="true")
        wait_ready(c, tries=90)
    mid = api("POST", f"{IG}/media_publish", creation_id=c)["id"]
    rec["ig"] = mid
    if typ == "reel":
        rec["ig_link"] = api("GET", mid, fields="permalink").get("permalink")
        try:
            api("POST", f"{mid}/comments", message=hashtags(n))
            rec["hashtags"] = "ok"
        except Exception as e:
            rec["hashtags"] = f"ERR {e}"
    return rec


def main(mode):
    state = json.load(open(STATE_F)) if os.path.exists(STATE_F) else {}
    items = []
    for f in sorted(glob.glob("queue/week-*.yml")):
        items += yaml.safe_load(open(f)) or []
    now = datetime.now(TZ)
    log = []
    cool = state.get("_cooldown_until")
    feed_cooling = mode == "run" and cool and now < datetime.fromisoformat(cool)
    scool = state.get("_cooldown_social_until")
    social_cooling = scool and now < datetime.fromisoformat(scool)
    halt = bool(feed_cooling)
    if feed_cooling:
        log.append(f"feed cooling down until {cool}")
    for n, it in enumerate(items):
        if halt:
            break
        key = f"{it['date']}_{it['project']}"
        when = datetime.fromisoformat(f"{it['date']}T{it['time']}").replace(tzinfo=TZ)
        if mode == "check":
            if n >= int(os.environ.get("CHECK_LIMIT", "3")):
                log.append(f"SKIP {key}: check limited to first {os.environ.get('CHECK_LIMIT', '3')} items (Meta throttles test containers)")
                continue
            try:
                c, _ = ig_container(it)
                log.append(f"OK  {key}: IG accepted {len(it['slides'])} slide(s) (container {c}, not published)")
            except Exception as e:
                log.append(f"ERR {key}: {e}")
            continue
        if key in state or not it.get("approved") or when > now:
            continue
        last_feed = max([datetime.fromisoformat(v["at"]) for k2, v in state.items()
                         if isinstance(v, dict) and v.get("ig") and not k2.count("_") > 1] or [datetime(2000, 1, 1, tzinfo=TZ)])
        if (now - last_feed).total_seconds() < 20 * 3600:  # late items never burst: max one feed post per ~day, schedule slides
            log.append(f"WAIT {key}: last feed post {last_feed:%d/%m %H:%M}, next allowed 20 h later")
            break
        rec = {"at": now.isoformat()}
        try:
            c, urls = ig_container(it)
            mid = api("POST", f"{IG}/media_publish", creation_id=c)["id"]
            rec["ig"] = mid
            rec["ig_link"] = api("GET", mid, fields="permalink").get("permalink")
            try:
                api("POST", f"{mid}/comments", message=hashtags(n))
                rec["hashtags"] = "ok"
            except Exception as e:
                rec["hashtags"] = f"ERR {e}"
            try:
                rec["fb"] = fb_post(it, urls)
            except Exception as e:
                rec["fb"] = f"ERR {e}"
            state[key] = rec
            log.append(f"PUBLISHED {key}: {rec}")
            break                                            # one feed post per run
        except Exception as e:
            log.append(f"ERR {key}: {e}")
            halt = True
            state["_cooldown_until"] = (now + timedelta(hours=3)).isoformat()
    if mode == "run" and not social_cooling:
        for n, it in enumerate(social_items()):
            key = f"{it['date']}_{it['time']}_{it['type']}_{it['file']}"
            when = datetime.fromisoformat(f"{it['date']}T{it['time']}").replace(tzinfo=TZ)
            if key in state or not it.get("approved") or when > now:
                continue
            if (now - when).total_seconds() > 6 * 3600:      # missed by more than 6 h: skip, never post stale stories
                state[key] = {"at": now.isoformat(), "skipped": "missed window"}
                log.append(f"SKIPPED {key}: missed window")
                continue
            if it["type"] == "reel" and halt:                 # captions currently refused → hold reels, keep stories going
                continue
            try:
                rec = publish_social(it, n)
                rec["at"] = now.isoformat(); state[key] = rec
                log.append(f"PUBLISHED {key}: {rec}")
            except Exception as e:
                log.append(f"ERR {key}: {e}")
                state["_cooldown_social_until"] = (now + timedelta(hours=3)).isoformat()
                json.dump(state, open(STATE_F, "w"), indent=1)
                break
            json.dump(state, open(STATE_F, "w"), indent=1)
    json.dump(state, open(STATE_F, "w"), indent=1)
    os.makedirs("reports/publish", exist_ok=True)
    with open(f"reports/publish/{mode}.txt", "w") as fh:
        fh.write(f"{now.isoformat()}\n" + "\n".join(log) + "\n")
    print("\n".join(log) or "nothing due")


if __name__ == "__main__":
    main(sys.argv[1] if len(sys.argv) > 1 else "run")
