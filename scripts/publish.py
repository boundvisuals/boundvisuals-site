"""Publish approved queue items to Instagram (carousel/single) + Facebook Page.

usage: python scripts/publish.py run|check
  check = build captions and create Instagram containers WITHOUT publishing (private test).
  run   = publish every approved item whose date/time (Europe/Lisbon) has passed and is not yet published.
State is kept in queue/published.json. Images are served from https://www.boundvisuals.com/bv-fila/<project>/<file>.
"""
import glob, json, os, sys, time, urllib.parse, urllib.request
from datetime import datetime
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
    mentions = " ".join("@" + m for m in INS["mentions"])
    return f"{item['caption_en']}\n—\n{item['caption_pt']}\n\n{mentions}"


def hashtags(n):
    rot = INS["hashtags_rotate"]
    pick = [rot[(n * 4 + i) % len(rot)] for i in range(4)]
    tags = INS["hashtags_always"] + pick
    return " ".join("#" + t for t in tags[: INS.get("hashtags_max", 30)])


def new_container(**params):
    """Create a media container. Meta answers id "0" (HTTP 200) when it silently throttles
    container creation (seen after ~20 test containers in an hour): fail loudly instead."""
    cid = api("POST", f"{IG}/media", **params).get("id")
    if not cid or str(cid) == "0":
        raise RuntimeError("Meta throttled container creation (id 0): wait ~1 hour and retry; check mode creates many containers, use CHECK_LIMIT")
    return cid


def wait_ready(cid):
    for _ in range(30):
        s = api("GET", cid, fields="status_code").get("status_code")
        if s == "FINISHED":
            return
        if s == "ERROR":
            raise RuntimeError(f"container {cid} ERROR")
        time.sleep(5)
    raise RuntimeError(f"container {cid} not ready")


def ig_container(item):
    urls = [f"{BASE}/{item['project']}/{urllib.parse.quote(s)}" for s in item["slides"]]
    if len(urls) == 1:
        c = new_container(image_url=urls[0], caption=caption(item))
    else:
        kids = [new_container(image_url=u, is_carousel_item="true") for u in urls]
        for k in kids:
            wait_ready(k)
        c = new_container(media_type="CAROUSEL", children=",".join(kids), caption=caption(item))
    wait_ready(c)
    return c, urls


def fb_post(item, urls):
    ptok = api("GET", PAGE, fields="access_token")["access_token"]
    ids = [api("POST", f"{PAGE}/photos", token=ptok, url=u, published="false")["id"] for u in urls]
    msg = f"{item['caption_en']}\n—\n{item['caption_pt']}"
    params = {"message": msg}
    for i, pid in enumerate(ids):
        params[f"attached_media[{i}]"] = json.dumps({"media_fbid": pid})
    return api("POST", f"{PAGE}/feed", token=ptok, **params)["id"]


def main(mode):
    state = json.load(open(STATE_F)) if os.path.exists(STATE_F) else {}
    items = []
    for f in sorted(glob.glob("queue/week-*.yml")):
        items += yaml.safe_load(open(f)) or []
    now = datetime.now(TZ)
    log = []
    for n, it in enumerate(items):
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
        except Exception as e:
            log.append(f"ERR {key}: {e}")
    json.dump(state, open(STATE_F, "w"), indent=1)
    os.makedirs("reports/publish", exist_ok=True)
    with open(f"reports/publish/{mode}.txt", "w") as fh:
        fh.write(f"{now.isoformat()}\n" + "\n".join(log) + "\n")
    print("\n".join(log) or "nothing due")


if __name__ == "__main__":
    main(sys.argv[1] if len(sys.argv) > 1 else "run")
