#!/usr/bin/env python3
"""Free daily health check (no AI). Writes docs/watchdog.json; notify.py pushes a phone alert for anything red.
Checks: public pages up + fast, personal-site links, PDFs present and fresh, Meta token alive (read-only debug call),
SSL certificate days left, queue horizon, last publish run.
"""
import json, os, re, ssl, socket, time, datetime, glob, urllib.request, urllib.parse
import yaml

UA = {"User-Agent": "Mozilla/5.0 (bv-robot watchdog)"}
NOW = datetime.datetime.utcnow()
res = []


def ok(name, good, detail=""):
    res.append({"name": name, "ok": bool(good), "detail": detail})


def fetch(url, method="GET"):
    t = time.time()
    try:
        r = urllib.request.urlopen(urllib.request.Request(url, headers=UA, method=method), timeout=30)
        body = r.read() if method == "GET" else b""
        return r.status, time.time() - t, body, r.headers
    except urllib.error.HTTPError as e:
        return e.code, time.time() - t, b"", {}
    except Exception as e:
        return 0, time.time() - t, str(e).encode(), {}


SITE = "https://www.boundvisuals.com"
for path, name in [("/", "Site Bound Visuals"), ("/vitorhugo/", "Site Vítor Hugo"), ("/painel/", "Painel")]:
    st, dt, body, _ = fetch(SITE + path)
    ok(name, st in (200, 401, 403) and dt < 8, f"HTTP {st} · {dt:.1f} s")
    if path == "/vitorhugo/" and st == 200:
        links = set(re.findall(rb'href="(files/[^"]+|https://www\.boundvisuals\.com[^"]*)"', body))
        bad = []
        for l in sorted(links)[:20]:
            u = l.decode(); u = u if u.startswith("http") else SITE + "/vitorhugo/" + u
            s2, *_ = fetch(u, "HEAD")
            if s2 not in (200, 301, 302):
                bad.append(f"{u.split('/')[-1] or u} ({s2})")
        ok("Links do site pessoal", not bad, ", ".join(bad) or f"{len(links)} links OK")

for pdf in ["Portfolio_All.pdf", "Portfolio_AI.pdf", "Portfolio_3D_Architecture_Visualization.pdf", "CV_Vitor_Hugo_Long.pdf", "CV_Vitor_Hugo_Short.pdf"]:
    st, _, _, h = fetch(f"{SITE}/vitorhugo/files/{pdf}", "HEAD")
    lm = h.get("Last-Modified") if h else None
    age = ""
    if lm:
        try:
            d = (NOW - datetime.datetime.strptime(lm, "%a, %d %b %Y %H:%M:%S GMT")).days; age = f" · {d} dias"
        except ValueError:
            pass
    ok(f"PDF {pdf}", st == 200, f"HTTP {st}{age}")

# SSL certificate
try:
    ctx = ssl.create_default_context()
    with socket.create_connection(("www.boundvisuals.com", 443), timeout=15) as s, ctx.wrap_socket(s, server_hostname="www.boundvisuals.com") as ss:
        exp = datetime.datetime.strptime(ss.getpeercert()["notAfter"], "%b %d %H:%M:%S %Y %Z")
    days = (exp - NOW).days
    ok("Certificado SSL", days > 10, f"expira em {days} dias")
except Exception as e:
    ok("Certificado SSL", False, type(e).__name__)

# Meta token (read-only)
tok = os.environ.get("META_TOKEN", "")
if tok:
    q = urllib.parse.urlencode({"input_token": tok, "access_token": tok})
    st, _, body, _ = fetch(f"https://graph.facebook.com/v21.0/debug_token?{q}")
    try:
        d = json.loads(body)["data"]; exp = d.get("expires_at") or 0
        left = "nunca expira" if exp == 0 else f"expira em {(datetime.datetime.utcfromtimestamp(exp) - NOW).days} dias"
        ok("Ligação Instagram/Facebook (token)", d.get("is_valid") and (exp == 0 or exp - time.time() > 7 * 86400), left)
    except Exception:
        ok("Ligação Instagram/Facebook (token)", False, f"HTTP {st}")

# Queue horizon
last = None
for f in glob.glob("queue/week-*.yml"):
    d = yaml.safe_load(open(f, encoding="utf-8")) or []
    items = d if isinstance(d, list) else d.get("items") or d.get("posts") or []
    for it in items:
        if isinstance(it, dict) and it.get("date"):
            dd = str(it["date"])[:10]; last = max(last or dd, dd)
if last:
    left = (datetime.date.fromisoformat(last) - NOW.date()).days
    ok("Fila de posts", left >= 7, f"posts preparados até {last} ({left} dias)")

json.dump({"checked": NOW.strftime("%Y-%m-%d %H:%M UTC"), "all_ok": all(r["ok"] for r in res), "checks": res},
          open("docs/watchdog.json", "w", encoding="utf-8"), ensure_ascii=False, indent=1)
print("\n".join(("OK  " if r["ok"] else "FAIL") + f" {r['name']}: {r['detail']}" for r in res))
