#!/bin/bash
# The whole robot, on Vítor's own server (PTServidor) — replaces the GitHub Actions robots (no minute limits).
# cPanel cron, every minute:   bash $HOME/bv/repo/scripts/server_run.sh >> $HOME/bv/run.log 2>&1
# Each run: pull code → apply what Vítor did in the Painel (approvals, deletions, captions, crops, ideas, opps)
#           → keep the queue clean (no repeats, teasers) → rebuild the Painel data in place → publish what is due
#           → push the changes back to GitHub (GitHub = code vault only).
# Fast path: if nothing changed since the last run, only the publisher runs (a few ms).
set -u
# the shared server caps processes/threads per account: keep every library single-threaded
export OPENBLAS_NUM_THREADS=1 OMP_NUM_THREADS=1 MKL_NUM_THREADS=1 NUMEXPR_NUM_THREADS=1 PW_LOWPROC=1 MALLOC_ARENA_MAX=2
# run from a private copy: git reset below rewrites this file while bash is still reading it
[ -z "${BV_SELF:-}" ] && { cp "$0" "$HOME/bv/.run.sh"; BV_SELF=1 exec bash "$HOME/bv/.run.sh" "$@"; }
B="$HOME/bv"; R="$B/repo"; W="$HOME/public_html"; S="$W/painel/store"
export PATH="$B/env/bin:$PATH"; PY=python3
exec 9>"$B/run.lock"; flock -n 9 || exit 0
cd "$R" || exit 1
[ -f "$B/.deps2" ] || { "$B/bin/micromamba" install -y -q -r "$B/mamba" -p "$B/env" -c conda-forge pycryptodome >/dev/null 2>&1 && touch "$B/.deps2"; }
export PYTHONPATH="$B/pylib:${PYTHONPATH:-}"

stamp_now=$(cat "$S"/approvals.json.php "$S"/deleted.json.php "$S"/captions.json.php "$S"/crops.json.php "$S"/inbox.json.php "$S"/opps.json.php 2>/dev/null | md5sum | cut -c1-12)
git fetch -q origin main 2>/dev/null
remote=$(git rev-parse origin/main 2>/dev/null); local_=$(git rev-parse HEAD)
pubstamp=$(md5sum "$S/published.json.php" 2>/dev/null | cut -c1-12)
if [ "$stamp_now" = "$(cat "$B/stamp" 2>/dev/null)" ] && [ "$remote" = "$local_" ] && [ "$pubstamp" = "$(cat "$B/pubstamp" 2>/dev/null)" ] && [ -z "${FORCE:-}" ] && [ ! -f "$B/force" ] && [ -z "$(ls -A "$B/outbox" 2>/dev/null)" ]; then
  php -q "$W/painel/cron.php"; exit 0
fi
git reset -q --hard origin/main
rm -f "$B/force"
# results of server_ingest.sh (new project or crop re-render) → repo
for o in "$B"/outbox/*; do
  [ -d "$o" ] || continue; case "$o" in *.part) continue;; esac
  pid=$(basename "$o"); D="reports/$pid"; mkdir -p "$D"
  [ -d "$o/ig" ] && { rm -rf "$D/ig" "$D/preview"; cp -r "$o/ig" "$o/preview" "$D/"; cp "$o"/*.log "$o"/manifest.json "$D/" 2>/dev/null; }
  [ -d "$o/story" ] && { find "$D/story" -name "*.jpg" ! -name "teaser-*" -delete 2>/dev/null; mkdir -p "$D/story"; cp "$o"/story/* "$D/story/" 2>/dev/null; }
  [ -d "$o/reel" ] && { rm -rf "$D/reel"; cp -r "$o/reel" "$D/"; }
  rm -rf "$o"
done

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
  while read -r pid; do [ -n "$pid" ] && (nohup bash "$R/scripts/server_rerender.sh" "$pid" >> "$B/ingest.log" 2>&1 &); done < "$B/in/changed.txt"
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

# new projects: registry entry with a MEGA link but no slides yet → ingest in the background (one at a time)
$PY - <<'PY' | head -1 | while read -r pid; do (nohup bash "$R/scripts/server_ingest.sh" "$pid" >> "$B/ingest.log" 2>&1 &); done
import yaml, os
r = yaml.safe_load(open("projects/registry.yml")); r = r.get("projects", r) if isinstance(r, dict) else r
for p in r:
    if p.get("mega") and p["id"] != "daily-study-2026" and not os.path.isdir(f"reports/{p['id']}/ig") and not os.path.exists(os.path.expanduser(f"~/bv/ingest-{p['id']}.failed")):
        print(p["id"])
PY

# once a day (after 07:00): job hunt + watchdog; Mondays: PDFs + personal site
if [ "$(cat "$B/daily" 2>/dev/null)" != "$(date +%F)" ] && [ "$(date +%H)" -ge 7 ]; then
  date +%F > "$B/daily"
  $PY scripts/hunt_opps.py >> "$B/daily.log" 2>&1
  META_TOKEN=$($PY -c "import json;print(json.loads(open('$S/meta.json.php').read().split(chr(10),1)[1])['token'])" 2>/dev/null) $PY scripts/watchdog.py >> "$B/daily.log" 2>&1
  [ "$(date +%u)" = "1" ] && (nohup bash "$R/scripts/server_portfolio.sh" >> "$B/portfolio.log" 2>&1 &)
fi

# back to GitHub (code vault)
git add -A queue docs/inbox.json docs/opps.json docs/deleted.json docs/opps-auto.yml docs/kits docs/watchdog.json config reports 2>/dev/null
if ! git diff --cached --quiet; then
  git -c user.name=bv-server -c user.email=robot@boundvisuals.com commit -qm "Server robot: Painel changes" && git push -q origin HEAD:main 2>/dev/null || { git pull -q --rebase origin main && git push -q origin HEAD:main; }
fi
echo "$stamp_now" > "$B/stamp"; md5sum "$S/published.json.php" 2>/dev/null | cut -c1-12 > "$B/pubstamp"
date '+%F %T full run'
# weekly housekeeping (Sundays): package cache, temp files, git garbage
if [ "$(date +%u)" = "7" ] && [ "$(cat "$B/clean" 2>/dev/null)" != "$(date +%F)" ]; then
  date +%F > "$B/clean"
  "$B/bin/micromamba" -r "$B/mamba" clean -a -y -q >/dev/null 2>&1; rm -rf "$B/tmp" "$B/pf" "$B/dl" /tmp/teste
  git gc -q --prune=now 2>/dev/null
fi
