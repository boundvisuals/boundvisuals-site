#!/bin/bash
# Server version of the old GitHub "ingest" + "make-social" robots (no Actions minutes).
# usage: server_ingest.sh <project_id> [mega_link]   (link read from projects/registry.yml when omitted)
# 1) finals from MEGA → $HOME/bv/src/<id>/ (cached, resumable)   2) Instagram slides (reports/<id>/ig) + editor previews
# 3) stories + house-style reels   4) committed + pushed by the next server_run.sh
set -u
# the shared server caps processes/threads per account: keep every library single-threaded
export OPENBLAS_NUM_THREADS=1 OMP_NUM_THREADS=1 MKL_NUM_THREADS=1 NUMEXPR_NUM_THREADS=1 PW_LOWPROC=1 MALLOC_ARENA_MAX=2
pid="$1"; B="$HOME/bv"; R="$B/repo"; export PATH="$B/env/bin:$PATH"
exec 8>"$B/ingest-$pid.lock"; flock -n 8 || exit 0
cd "$R" || exit 1
link="${2:-$(python3 -c "import yaml,sys;r=yaml.safe_load(open('projects/registry.yml'));r=r.get('projects',r) if isinstance(r,dict) else r;print(next((p.get('mega','') for p in r if p['id']==sys.argv[1]),''))" "$pid")}"
title=$(python3 -c "import yaml,sys;r=yaml.safe_load(open('projects/registry.yml'));r=r.get('projects',r) if isinstance(r,dict) else r;print(next((p.get('title',sys.argv[1]) for p in r if p['id']==sys.argv[1]),sys.argv[1]))" "$pid")
[ -n "$link" ] || { echo "no MEGA link for $pid"; exit 1; }
SRC="$B/src/$pid"; O="$B/tmp/$pid"; D="$B/outbox/$pid.part"; rm -rf "$D"; mkdir -p "$SRC" "$D"
# results go to an outbox (server_run.sh resets the repo every run); server_run.sh moves them into reports/<id>/
echo "$(date '+%F %T') ingest $pid"
if [ -z "$(ls -A "$SRC" 2>/dev/null)" ]; then
  DL="$B/dl/$pid"; rm -rf "$DL"
  python3 scripts/mega_public.py "$link" "$DL" > "$B/ingest-$pid.log" 2>&1 || { echo "download failed, see $B/ingest-$pid.log"; exit 1; }
  # keep a compact cache: JPEG q95, max 5000 px (plenty for Instagram 1080 and the 3600 px portfolio); originals stay in MEGA
  python3 - "$DL" "$SRC" <<'PY'
import pathlib, sys, shutil
from PIL import Image
Image.MAX_IMAGE_PIXELS = None
dl, src = pathlib.Path(sys.argv[1]), pathlib.Path(sys.argv[2])
for p in dl.rglob("*"):
    if not p.is_file(): continue
    out = src / p.relative_to(dl)
    out.parent.mkdir(parents=True, exist_ok=True)
    if p.suffix.lower() in {".png", ".jpg", ".jpeg", ".tif", ".tiff", ".webp"}:
        im = Image.open(p); im.load(); im = im.convert("RGB")
        if max(im.size) > 5000:
            s = 5000 / max(im.size); im = im.resize((round(im.width * s), round(im.height * s)), Image.LANCZOS)
        im.save(out, "JPEG", quality=95, subsampling=0)   # same file name (stems unchanged), JPEG data
    else:
        shutil.copy2(p, out)
PY
  rm -rf "$DL"
fi
rm -rf "$O"; mkdir -p "$O"
python3 scripts/process_media.py "$SRC" "$O" "$pid" config/program.yml > "$O/process.log" 2>&1
rm -rf "$D/ig" "$D/preview"; mkdir -p "$D/ig" "$D/preview"
cp "$O"/ig/*.jpg "$D/ig/" 2>/dev/null; cp "$O"/*.log "$O"/manifest.json "$D/" 2>/dev/null
python3 - "$SRC" "$D/preview" <<'PY'
import pathlib, sys
from PIL import Image
Image.MAX_IMAGE_PIXELS = None
src = pathlib.Path(sys.argv[1]); out = pathlib.Path(sys.argv[2])
for p in sorted(src.rglob("*")):
    if p.suffix.lower() not in {".png", ".jpg", ".jpeg", ".tif", ".tiff", ".webp"}: continue
    stem = "_".join(p.relative_to(src).with_suffix("").parts).replace(" ", "_")
    im = Image.open(p); im.load(); im = im.convert("RGB"); w, h = im.size
    s = 1400 / max(w, h); im.resize((round(w * s), round(h * s)), Image.LANCZOS).save(out / f"{stem}.jpg", quality=85)
PY
if [ "${STORIES:-1}" = "1" ]; then
  mkdir -p "$D/story" "$D/reel"
  python3 scripts/make_social.py "$SRC" "$D" "$pid" "$title" > "$O/social.log" 2>&1
  if [ "${REELS:-1}" = "1" ]; then
    rm -f "$D"/reel/*.mp4 "$D"/reel/*-cover.jpg
    python3 scripts/reel_styles.py "$SRC" "$D/reel" "$pid" "$title" series >> "$O/social.log" 2>&1
  fi
fi
[ "${REELS:-1}" = "1" ] || rm -rf "$D/reel"
rm -rf "$B/outbox/$pid"; mv "$D" "$B/outbox/$pid"; touch "$B/force"      # next server_run.sh picks it up
echo "$(date '+%F %T') ingest $pid done: $(ls "$B/outbox/$pid/ig" | wc -l) slides"
