#!/usr/bin/env python3
"""Motion stories (pillar 'slow zoom'): one 10 s 1080x1920 video per final image, rendered on the SERVER from the
full-resolution cache (~/bv/src/<project>), never from previews (quality rule).
  landscape → slow pan edge to edge at full height · vertical/4:5 → slow push-in (100% → 88%)
Output: reports/<project>/story/motion-<stem>.mp4 + cover motion-<stem>.jpg (git-ignored; the server is the only place they live).
Renders at most N missing videos per call (default 1) so the shared host is never overloaded.
usage: python scripts/make_motion.py [N]
"""
import sys, os, glob, pathlib, tempfile, yaml
from PIL import Image
sys.path.insert(0, os.path.dirname(os.path.abspath(__file__)))
import reel_styles as R

SEC = 10
EXTS = {".jpg", ".jpeg", ".png", ".webp", ".tif", ".tiff"}
SRC = pathlib.Path(os.path.expanduser("~/bv/src"))


def titles():
    r = yaml.safe_load(open("projects/registry.yml", encoding="utf-8")) or {}
    r = r.get("projects", r) if isinstance(r, dict) else r
    return {p["id"]: p.get("title", p["id"]) for p in r}


def render(src, title, out):
    im = Image.open(src); im.load(); im = im.convert("RGB")
    s = 4000 / max(im.size)
    if s < 1:
        im = im.resize((round(im.width * s), round(im.height * s)), Image.LANCZOS)
    iw, ih = im.size
    if iw / ih > 0.75:          # wider than a story: pan left → right at full height
        a, b = R.box916(iw, ih, 0.0, 0.5, 1.0), R.box916(iw, ih, 1.0, 0.5, 1.0)
    else:                       # tall: slow push-in to the centre
        a, b = R.box916(iw, ih, 0.5, 0.5, 1.0), R.box916(iw, ih, 0.5, 0.5, 0.88)
    with tempfile.TemporaryDirectory() as tmp:
        wav = pathlib.Path(tmp) / "a.wav"; R.write_wav(wav, *R.pad(SEC))
        part = out.with_suffix(".part.mp4")
        enc = R.Enc(part, wav)
        n = SEC * R.FPS
        for i in range(n):
            f = R.title_layer(R.render(im, R.lerp_box(a, b, R.ease(i / (n - 1)))), title, 1.0)
            if i == n // 2:
                f.save(out.with_suffix(".jpg"), quality=90)       # cover for the Painel
            enc.put(f)
        enc.close()
        part.rename(out)


def main():
    left = int(sys.argv[1]) if len(sys.argv) > 1 else 1
    T = titles()
    for d in sorted(p for p in SRC.iterdir() if p.is_dir()) if SRC.exists() else []:
        pid = d.name
        if not os.path.isdir(f"reports/{pid}/story"):
            continue
        for p in sorted(d.rglob("*")):
            if left <= 0:
                return
            if p.suffix.lower() not in EXTS:
                continue
            stem = "_".join(p.relative_to(d).with_suffix("").parts).replace(" ", "_")
            if stem.startswith("2026_-_FINAIS"):        # duplicate export folder
                continue
            out = pathlib.Path(f"reports/{pid}/story/motion-{stem}.mp4")
            if out.exists():
                continue
            print("motion", pid, stem, flush=True)
            render(p, T.get(pid, pid), out)
            left -= 1


if __name__ == "__main__":
    main()
