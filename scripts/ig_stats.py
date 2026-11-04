#!/usr/bin/env python3
"""Read-only Instagram stats for the Painel (no publishing calls). Writes reports/meta/stats.json."""
import json, os, urllib.request, urllib.parse, datetime
import yaml
G = "https://graph.facebook.com/v21.0"
T = os.environ["META_TOKEN"]
IG = yaml.safe_load(open("config/program.yml"))["meta"]["ig_user_id"]


def get(path, **p):
    p["access_token"] = T
    with urllib.request.urlopen(f"{G}/{path}?{urllib.parse.urlencode(p)}", timeout=60) as r:
        return json.load(r)


out = {"at": datetime.datetime.now(datetime.timezone.utc).isoformat()}
try:
    out["account"] = get(IG, fields="username,followers_count,follows_count,media_count")
    media = get(f"{IG}/media", fields="id,caption,media_type,media_url,thumbnail_url,permalink,timestamp,like_count,comments_count", limit=24).get("data", [])
    out["media"] = [{k: m.get(k) for k in ("id", "media_type", "permalink", "timestamp", "like_count", "comments_count")} | {"img": m.get("thumbnail_url") or m.get("media_url"), "caption": (m.get("caption") or "")[:140]} for m in media]
    try:
        ins = get(f"{IG}/insights", metric="reach", period="day", metric_type="total_value",
                  since=int((datetime.datetime.now() - datetime.timedelta(days=7)).timestamp()), until=int(datetime.datetime.now().timestamp()))
        out["reach_7d"] = ins.get("data", [{}])[0].get("total_value", {}).get("value")
    except Exception as e:
        out["reach_err"] = str(e)[:200]
    hist_f = "reports/meta/followers.json"
    hist = json.load(open(hist_f)) if os.path.exists(hist_f) else {}
    hist[datetime.date.today().isoformat()] = out["account"].get("followers_count")
    json.dump(hist, open(hist_f, "w"), indent=0)
except Exception as e:
    out["error"] = str(e)[:300]
json.dump(out, open("reports/meta/stats.json", "w"), ensure_ascii=False, indent=1)
print(json.dumps({k: v for k, v in out.items() if k != "media"})[:400])
