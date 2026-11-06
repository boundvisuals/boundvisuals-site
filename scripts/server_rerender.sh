#!/bin/bash
# Re-render one project's Instagram slides + stories on the server after a crop edit.
# Needs the full-res finals cached in $HOME/bv/src/<project>/ (same folder layout as MEGA finals).
pid="$1"; B="$HOME/bv"; SRC="$B/src/$pid"
[ -d "$SRC" ] || { echo "no cached finals for $pid (put them in $SRC)"; exit 0; }
O="$B/tmp/$pid"; rm -rf "$O"; mkdir -p "$O"
python3 scripts/process_media.py "$SRC" "$O" "$pid" config/program.yml >/dev/null 2>&1 && { rm -rf "reports/$pid/ig"; mkdir -p "reports/$pid/ig"; cp "$O"/ig/*.jpg "reports/$pid/ig/"; }
title=$(python3 -c "import yaml,sys;r=yaml.safe_load(open('projects/registry.yml'));r=r.get('projects',r) if isinstance(r,dict) else r;print(next((p.get('title','') for p in r if p['id']==sys.argv[1]),''))" "$pid")
find "reports/$pid/story" -name "*.jpg" ! -name "teaser-*" -delete 2>/dev/null
python3 scripts/make_social.py "$SRC" "reports/$pid" "$pid" "$title" --stories-only >/dev/null 2>&1 || python3 scripts/make_social.py "$SRC" "reports/$pid" "$pid" "$title" >/dev/null 2>&1
echo "rerendered $pid"
