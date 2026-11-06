#!/bin/bash
# Server version of portfolio.yml: CV + portfolio PDFs (HQ + light) and the personal site boundvisuals.com/vitorhugo.
set -u
# the shared server caps processes/threads per account: keep every library single-threaded
export OPENBLAS_NUM_THREADS=1 OMP_NUM_THREADS=1 MKL_NUM_THREADS=1 NUMEXPR_NUM_THREADS=1 PW_LOWPROC=1 MALLOC_ARENA_MAX=2
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
# system libraries Chromium needs (the shared server lacks them) → from conda-forge into our own env
if [ ! -f "$B/.chromelibs" ]; then
  for pkg in nss nspr atk-1.0 at-spi2-atk at-spi2-core libxkbcommon xorg-libxcomposite xorg-libxdamage xorg-libxrandr xorg-libxfixes xorg-libxext xorg-libx11 xorg-libxcb libdrm libgbm mesalib alsa-lib cups pango cairo expat dbus glib; do
    "$B/bin/micromamba" install -y -q -r "$B/mamba" -p "$B/env" -c conda-forge "$pkg" >/dev/null 2>&1 || echo "  (no conda package $pkg)"
  done
  touch "$B/.chromelibs"
fi
export LD_LIBRARY_PATH="$B/env/lib:${LD_LIBRARY_PATH:-}"
CH=$(ls -d "$HOME"/.cache/ms-playwright/chromium_headless_shell-*/chrome-headless-shell-linux64/chrome-headless-shell 2>/dev/null | tail -1)
[ -n "$CH" ] && { miss=$(ldd "$CH" | grep "not found"); [ -n "$miss" ] && echo "chromium still misses: $miss"; }
T="$B/pf"; rm -rf "$T"; mkdir -p "$T/out" "$T/site"
cd "$R"
export HIRES_DIR="$B/src"
python3 scripts/build_portfolio.py "$T/out" "$B/assets"; PDF_MAXPX=1800 PDF_JPGQ=85 PDF_SUFFIX=_light python3 scripts/build_portfolio.py "$T/out" "$B/assets" || echo "PDF build failed"
python3 scripts/build_vitorhugo.py "$T/site" "$B/assets" || echo "site build failed"
mkdir -p "$W/painel/files" "$W/vitorhugo/files"
rm -rf "$T/out/_img"; cp "$T"/out/*.pdf "$W/painel/files/" 2>/dev/null && cp "$T"/out/*.pdf "$W/vitorhugo/files/" 2>/dev/null
date '+%F %T' > "$W/painel/files/updated.txt"
[ -f "$T/site/index.html" ] && cp -r "$T"/site/. "$W/vitorhugo/"
echo "$(date '+%F %T') portfolio done: $(ls "$T"/out/*.pdf 2>/dev/null | wc -l) PDFs"
