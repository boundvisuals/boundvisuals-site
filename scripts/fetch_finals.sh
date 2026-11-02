#!/usr/bin/env bash
# Download ONLY the final images from a shared MEGA project folder.
# usage: fetch_finals.sh <mega_folder_link> <out_dir>
# Picks image/video files inside any folder whose name contains one of the
# keywords (case-insensitive): final, finals, finais, final export(s), publicar, publish.
# e.g. "3_finals", "2026 - FINAIS edit for bound visuals", "Publicar".
# If the shared folder itself is the finals folder, everything in it is taken.
set -euo pipefail
LINK="$1"; OUT="$2"
PATTERN="${FINALS_PATTERN:-final|finais|publicar|publish}"
mkdir -p "$OUT"
mega-login "$LINK" >/dev/null
mega-find / > all.txt
echo "Folder contains $(wc -l < all.txt) entries"
grep -iE '\.(png|jpe?g|tiff?|webp|exr|mp4|mov)$' all.txt \
  | awk -F/ -v p="$PATTERN" '{ dir=""; for(i=3;i<NF;i++) dir=dir"/"$i; if (tolower(dir) ~ p) print }' \
  > finals.txt || true
if [ ! -s finals.txt ]; then
  echo "No finals/finais/publicar subfolders: taking every image/video in the shared folder"
  grep -iE '\.(png|jpe?g|tiff?|webp|exr|mp4|mov)$' all.txt > finals.txt || true
fi
# Numbered stage folders ("1 - ai", "2 - upscale", … "5 - final export"): per shot keep only
# the highest-numbered stage that actually holds images (Vítor's last step = the final).
python3 - <<'PY'
import re, collections
lines=[l.rstrip("\n") for l in open("finals.txt") if l.strip()]
groups=collections.defaultdict(list)
for l in lines:
    parts=l.split("/")
    stage=parts[-2] if len(parts)>2 else ""
    m=re.match(r"\s*(\d+)\s*-", stage)
    groups["/".join(parts[:-2])].append((int(m.group(1)) if m else None, l))
out=[]
for shot, items in groups.items():
    nums=[n for n,_ in items if n is not None]
    if nums and len(set(nums))>1:
        top=max(nums); out += [l for n,l in items if n==top]
    else:
        out += [l for _,l in items]
open("finals.txt","w").write("\n".join(out)+("\n" if out else ""))
PY
echo "Finals found: $(wc -l < finals.txt)"
FAIL=0
while IFS= read -r f; do
  shot=$(echo "$f" | awk -F/ '{ if (NF>3) print $(NF-2); else print "" }' | tr ' /' '__')
  dest="$OUT/${shot:-root}"; mkdir -p "$dest"
  rel="${f#/*/}"                      # paths are listed as /<shared-root>/...; mega-get wants them relative to it
  echo "  get $rel"
  mega-get "$rel" "$dest/" >/dev/null || { echo "  FAILED $rel"; FAIL=$((FAIL+1)); }
done < finals.txt
mega-logout >/dev/null || true
echo "Downloaded: $(find "$OUT" -type f | wc -l)  failed: $FAIL"
