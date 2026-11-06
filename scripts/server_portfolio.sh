#!/bin/bash
# Server version of portfolio.yml: CV + portfolio PDFs (HQ + light) and the personal site boundvisuals.com/vitorhugo.
set -u
B="$HOME/bv"; R="$B/repo"; W="$HOME/public_html"; export PATH="$B/env/bin:$PATH"
exec 7>"$B/portfolio.lock"; flock -n 7 || exit 0
echo "$(date '+%F %T') portfolio start"
# brand assets (fonts + InDesign originals) from the 'assets' branch, sparse
if [ ! -d "$B/assets/.git" ]; then
  git clone -q --depth 1 --filter=blob:none --sparse -b assets git@github.com:boundvisuals/boundvisuals-site.git "$B/assets" &&
  (cd "$B/assets" && git sparse-checkout set brand/fontes brand/portfolio-3d/package brand/portfolio-ai/package brand/portfolio-all/package)
else (cd "$B/assets" && git pull -q); fi
# headless Chromium for the PDFs (one time)
if [ ! -f "$B/.chromium" ]; then
  pip install -q playwright pypdf >/dev/null 2>&1 && python3 -m playwright install chromium >/dev/null 2>&1 && touch "$B/.chromium" || echo "chromium install failed"
fi
T="$B/pf"; rm -rf "$T"; mkdir -p "$T/out" "$T/site"
cd "$R"
export HIRES_DIR="$B/src"
python3 scripts/build_portfolio.py "$T/out" "$B/assets" && PDF_MAXPX=1800 PDF_JPGQ=85 PDF_SUFFIX=_light python3 scripts/build_portfolio.py "$T/out" "$B/assets" || echo "PDF build failed"
python3 scripts/build_vitorhugo.py "$T/site" "$B/assets" || echo "site build failed"
mkdir -p "$W/painel/files" "$W/vitorhugo/files"
cp "$T"/out/*.pdf "$W/painel/files/" 2>/dev/null && cp "$T"/out/*.pdf "$W/vitorhugo/files/" 2>/dev/null
date '+%F %T' > "$W/painel/files/updated.txt"
[ -f "$T/site/index.html" ] && cp -r "$T"/site/. "$W/vitorhugo/"
echo "$(date '+%F %T') portfolio done: $(ls "$T"/out/*.pdf 2>/dev/null | wc -l) PDFs"
