#!/bin/bash
# The whole robot, on Vítor's own server (PTServidor) — replaces the GitHub Actions robots (no minute limits).
# cPanel cron, every minute:   bash $HOME/bv/repo/scripts/server_run.sh >> $HOME/bv/run.log 2>&1
# Each run: pull code → apply what Vítor did in the Painel (approvals, deletions, captions, crops, ideas, opps)
#           → keep the queue clean (no repeats, teasers) → rebuild the Painel data in place → publish what is due
#           → push the changes back to GitHub (GitHub = code vault only).
# Fast path: if nothing changed since the last run, only the publisher runs (a few ms).
set -u
B="$HOME/bv"; R="$B/repo"; W="$HOME/public_html"; S="$W/painel/store"
export PATH="$B/env/bin:$PATH"; PY=python3
exec 9>"$B/run.lock"; flock -n 9 || exit 0
cd "$R" || exit 1
export PYTHONPATH="$B/pylib:${PYTHONPATH:-}"

stamp_now=$(cat "$S"/approvals.json.php "$S"/deleted.json.php "$S"/captions.json.php "$S"/crops.json.php "$S"/inbox.json.php "$S"/opps.json.php 2>/dev/null | md5sum | cut -c1-12)
git fetch -q origin main 2>/dev/null
remote=$(git rev-parse origin/main 2>/dev/null); local_=$(git rev-parse HEAD)
pubstamp=$(md5sum "$S/published.json.php" 2>/dev/null | cut -c1-12)
if [ "$stamp_now" = "$(cat "$B/stamp" 2>/dev/null)" ] && [ "$remote" = "$local_" ] && [ "$pubstamp" = "$(cat "$B/pubstamp" 2>/dev/null)" ] && [ -z "${FORCE:-}" ]; then
  php -q "$W/painel/cron.php"; exit 0
fi
git reset -q --hard origin/main

strip() { [ -s "$1" ] && tail -n +2 "$1"; }
put() { local t; t=$(strip "$1") && [ -n "$t" ] && printf '%s' "$t" > "$2"; return 0; }
mkdir -p "$B/in"
# server publish state → repo
if [ -f "$S/published.json.php" ]; then
  strip "$S/published.json.php" > "$B/in/srvpub.json"
  $PY - "$B/in/srvpub.json" <<'PY'
import json, sys
srv = json.load(open(sys.argv[1])); st = json.load(open("queue/published.json"))
for k, v in srv.items():
    if k.startswith("_"): st[k] = v
    elif k not in st or (isinstance(v, dict) and v.get("ig") and not st[k].get("ig")): st[k] = v
json.dump(st, open("queue/published.json", "w"), indent=1)
PY
fi
put "$S/inbox.json.php" docs/inbox.json
put "$S/opps.json.php" docs/opps.json
put "$S/deleted.json.php" docs/deleted.json
[ -f "$S/approvals.json.php" ] && $PY scripts/build_painel.py apply "$S/approvals.json.php" >/dev/null
[ -f "$S/captions.json.php" ] && $PY scripts/build_painel.py apply-captions "$S/captions.json.php" >/dev/null
if [ -f "$S/crops.json.php" ]; then
  $PY scripts/build_painel.py apply-crops "$S/crops.json.php" > "$B/in/changed.txt"
  while read -r pid; do [ -n "$pid" ] && bash scripts/server_rerender.sh "$pid"; done < "$B/in/changed.txt"
fi
$PY scripts/dedupe_queue.py >/dev/null || true
$PY scripts/build_painel.py sync-reels >/dev/null; $PY scripts/build_painel.py sync-slides >/dev/null
$PY scripts/make_teasers.py >/dev/null || true

# rebuild the Painel in place
mkdir -p "$B/out"
$PY scripts/build_painel.py build "$B/out" > "$B/build.log" 2>&1 && {
  cp painel/app.html painel/api.php painel/push.php painel/ligar.php painel/index.php painel/config.php painel/manifest.webmanifest painel/sw.js painel/icon.svg painel/icon-192.png painel/icon-512.png painel/cron.php "$W/painel/" 2>/dev/null
  rsync -a "$B/out/thumbs/" "$W/painel/thumbs/" 2>/dev/null || cp -r "$B/out/thumbs/." "$W/painel/thumbs/"
  $PY scripts/notify.py "$B/out/store/notify.json.php" >/dev/null 2>&1 && cp "$B/out/store/notify.json.php" "$S/"
  cp "$B/out/store/data.json.php" "$S/data.json.php.new" && mv "$S/data.json.php.new" "$S/data.json.php"
}
# media for the publisher (Instagram fetches from these URLs)
$PY - "$W/bv-fila" <<'PY'
import yaml, glob, os, shutil, sys
D = sys.argv[1]
os.makedirs(D, exist_ok=True)
open(f"{D}/.htaccess", "w").write("Options -Indexes\n<IfModule mod_headers.c>\nHeader set X-Robots-Tag \"noindex, nofollow\"\n</IfModule>\n")
def cp(src, dst):
    if os.path.exists(src) and (not os.path.exists(dst) or os.path.getmtime(src) > os.path.getmtime(dst) or os.path.getsize(src) != os.path.getsize(dst)):
        os.makedirs(os.path.dirname(dst), exist_ok=True); shutil.copy2(src, dst)
for f in glob.glob("queue/week-*.yml"):
    for it in yaml.safe_load(open(f)) or []:
        for x in it["slides"]: cp(f"reports/{it['project']}/ig/{x}", f"{D}/{it['project']}/{x}")
for f in glob.glob("queue/social-week-*.yml"):
    for it in yaml.safe_load(open(f)) or []:
        for x in [it["file"], it.get("cover")]:
            if x: cp(f"reports/{it['project']}/{it['type']}/{x}", f"{D}/{it['project']}/{it['type']}/{x}")
PY

php -q "$W/painel/cron.php"

# back to GitHub (code vault)
git add -A queue docs/inbox.json docs/opps.json docs/deleted.json config reports 2>/dev/null
if ! git diff --cached --quiet; then
  git -c user.name=bv-server -c user.email=robot@boundvisuals.com commit -qm "Server robot: Painel changes" && git push -q origin HEAD:main 2>/dev/null || { git pull -q --rebase origin main && git push -q origin HEAD:main; }
fi
echo "$stamp_now" > "$B/stamp"; md5sum "$S/published.json.php" 2>/dev/null | cut -c1-12 > "$B/pubstamp"
date '+%F %T full run'
