#!/bin/bash
# After a crop edit in the Painel: rebuild that project's slides + stories from the cached finals (no reels).
pid="$1"; B="$HOME/bv"
STORIES=1 REELS=0 bash "$B/repo/scripts/server_ingest.sh" "$pid"
