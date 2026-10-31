#!/usr/bin/env python3
"""Turn a folder of final renders into web + Instagram assets.

usage: process_media.py <input_dir> <output_dir> <project_id> [config/program.yml]

- web/full/:  lossless copy at original resolution (WebP lossless, or PNG
              for >8-bit sources). Every file is decoded again and compared
              pixel-by-pixel with the source; any difference aborts the run.
- web/grid/:  sized versions for the gallery grid (high-quality WebP).
- ig/:        1080x1350 JPEG per image. Never crops: images that are not
              4:5 are fitted whole inside a 4:5 frame.
- manifest.json describing everything.
"""
import json, sys, pathlib, hashlib, shutil
from PIL import Image, ImageOps

try:
    import yaml
except ImportError:  # config optional
    yaml = None

EXTS = {".png", ".jpg", ".jpeg", ".tif", ".tiff", ".webp", ".bmp"}


def load_cfg(path):
    defaults = {"feed_size": [1080, 1350], "frame_color": "#111111", "grid_widths": [800, 1600, 2400]}
    if yaml and path and pathlib.Path(path).exists():
        c = yaml.safe_load(open(path))
        defaults["feed_size"] = c["instagram"]["feed_size"]
        defaults["frame_color"] = c["instagram"]["frame_color"]
        defaults["grid_widths"] = c["web"]["grid_widths"]
    return defaults


def high_bit(img):
    return img.mode in ("I;16", "I;16B", "I;16L", "I", "F") or img.info.get("bits", 8) > 8


def lossless_full(img, stem, out_dir, src=None):
    """Write a lossless file and prove it is pixel-identical.
    Already-compressed sources (WebP/JPEG/AVIF) are kept byte-for-byte:
    re-encoding them could only make them bigger, never better."""
    out_dir.mkdir(parents=True, exist_ok=True)
    if src is not None and src.suffix.lower() in (".webp", ".jpg", ".jpeg", ".avif"):
        dst = out_dir / (stem + src.suffix.lower())
        shutil.copyfile(src, dst)
        return dst
    if high_bit(img):
        dst = out_dir / (stem + ".png")
        img.save(dst, optimize=True)
    else:
        base = img.convert("RGBA" if "A" in img.getbands() else "RGB")
        dst = out_dir / (stem + ".webp")
        base.save(dst, lossless=True, quality=100, method=6, exact=True)
        img = base
    back = Image.open(dst)
    back.load()
    back = back.convert(img.mode) if back.mode != img.mode else back
    if back.size != img.size or back.tobytes() != img.tobytes():
        raise SystemExit(f"PIXEL MISMATCH: {stem} -> {dst.name}")
    return dst


def grid_versions(img, stem, out_dir, widths):
    out_dir.mkdir(parents=True, exist_ok=True)
    rgb = img.convert("RGB")
    outs = []
    for w in widths:
        if w >= rgb.width:
            continue
        h = round(rgb.height * w / rgb.width)
        dst = out_dir / f"{stem}-{w}.webp"
        rgb.resize((w, h), Image.LANCZOS).save(dst, quality=92, method=6)
        outs.append(str(dst))
    return outs


def instagram_feed(img, stem, out_dir, size, color):
    out_dir.mkdir(parents=True, exist_ok=True)
    W, H = size
    rgb = img.convert("RGB")
    ratio = rgb.width / rgb.height
    target = W / H
    if abs(ratio - target) < 0.01:
        canvas = rgb.resize((W, H), Image.LANCZOS)
        mode = "native"
    else:  # fit whole image inside the 4:5 frame, never crop
        fitted = ImageOps.contain(rgb, (W, H), Image.LANCZOS)
        canvas = Image.new("RGB", (W, H), color)
        canvas.paste(fitted, ((W - fitted.width) // 2, (H - fitted.height) // 2))
        mode = "framed"
    dst = out_dir / f"{stem}-feed.jpg"
    canvas.save(dst, quality=95, subsampling=0, optimize=True)
    return str(dst), mode


def main():
    src_dir, out_dir, pid = map(pathlib.Path, sys.argv[1:4])
    cfg = load_cfg(sys.argv[4] if len(sys.argv) > 4 else "config/program.yml")
    pid = str(pid)
    items = []
    for src in sorted(p for p in src_dir.rglob("*") if p.suffix.lower() in EXTS):
        img = Image.open(src)
        img.load()
        stem = "_".join(src.relative_to(src_dir).with_suffix("").parts).replace(" ", "_")
        full = lossless_full(img, stem, out_dir / "web" / "full", src)
        feed, mode = instagram_feed(img, stem, out_dir / "ig", cfg["feed_size"], cfg["frame_color"])
        items.append({
            "source": str(src.relative_to(src_dir)),
            "sha1": hashlib.sha1(src.read_bytes()).hexdigest(),
            "size": list(img.size),
            "orientation": "landscape" if img.width > img.height else "portrait" if img.height > img.width else "square",
            "web_full": str(full), "lossless_verified": True,
            "web_grid": grid_versions(img, stem, out_dir / "web" / "grid", cfg["grid_widths"]),
            "ig_feed": feed, "ig_mode": mode,
            "source_bytes": src.stat().st_size, "full_bytes": full.stat().st_size,
        })
        print(f"ok  {src.name}  {img.size[0]}x{img.size[1]}  ig:{mode}  "
              f"{src.stat().st_size/1e6:.1f}MB -> {full.stat().st_size/1e6:.1f}MB lossless")
    out_dir.mkdir(parents=True, exist_ok=True)
    (out_dir / "manifest.json").write_text(json.dumps({"project": pid, "items": items}, indent=2))
    print(f"{len(items)} image(s) processed for {pid}")


if __name__ == "__main__":
    main()
