#!/usr/bin/env bash
# Download ONLY Vítor's own animation clips from a shared MEGA folder (project or daily-study folder).
# usage: fetch_videos.sh <mega_folder_link> <out_dir>
# Takes .mp4/.mov/.m4v/.webm files inside any folder whose name contains "video" or "anim"
# (e.g. "video", "Videos", "anim", "3 - anim LTX"). If there is none, every video in the shared folder is taken.
set -euo pipefail
LINK="$1"; OUT="$2"
PATTERN="${VIDEO_PATTERN:-video|anim}"
mkdir -p "$OUT"
mega-login "$LINK" >/dev/null
mega-find / > all.txt
grep -iE '\.(mp4|mov|m4v|webm)$' all.txt \
  | awk -F/ -v p="$PATTERN" '{ dir=""; for(i=3;i<NF;i++) dir=dir"/"$i; if (tolower(dir) ~ p) print }' > videos.txt || true
if [ ! -s videos.txt ]; then
  echo "No video/anim subfolder: taking every video in the shared folder"
  grep -iE '\.(mp4|mov|m4v|webm)$' all.txt > videos.txt || true
fi
echo "Clips found: $(wc -l < videos.txt)"
FAIL=0
while IFS= read -r f; do
  rel="${f#/*/}"
  dest="$OUT/$(dirname "$rel")"; mkdir -p "$dest"
  echo "  get $rel"
  mega-get "$rel" "$dest/" >/dev/null || { echo "  FAILED $rel"; FAIL=$((FAIL+1)); }
done < videos.txt
mega-logout >/dev/null || true
echo "Downloaded: $(find "$OUT" -type f | wc -l)  failed: $FAIL"
