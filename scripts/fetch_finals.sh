#!/usr/bin/env bash
# Download ONLY the final images from a shared MEGA project folder.
# usage: fetch_finals.sh <mega_folder_link> <out_dir>
# Picks image files whose parent folder name contains "final" (case-insensitive),
# e.g. "3_finals", "Finals", "04 final". Ignores ai/edit/upscaling/Publicar.
set -euo pipefail
LINK="$1"; OUT="$2"
PATTERN="${FINALS_PATTERN:-final}"
mkdir -p "$OUT"
mega-login "$LINK" >/dev/null
mega-find / > all.txt
echo "Folder contains $(wc -l < all.txt) entries"
grep -iE '\.(png|jpe?g|tiff?|webp|exr|mp4|mov)$' all.txt \
  | awk -F/ -v p="$PATTERN" 'BEGIN{IGNORECASE=1} NF>1 && tolower($(NF-1)) ~ tolower(p) && tolower($0) !~ /publicar/' \
  > finals.txt || true
echo "Finals found: $(wc -l < finals.txt)"
while IFS= read -r f; do
  shot=$(echo "$f" | awk -F/ '{print $(NF-2)}' | tr ' /' '__')
  dest="$OUT/${shot:-root}"; mkdir -p "$dest"
  echo "  get $f"
  mega-get "$f" "$dest/" >/dev/null
done < finals.txt
mega-logout >/dev/null || true
