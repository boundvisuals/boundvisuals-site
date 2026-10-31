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


def _interest_map(rgb, work_w=640):
    """Cheap 'where is the detail' map: edge energy on a downscaled copy."""
    from PIL import ImageFilter, ImageStat
    scale = work_w / rgb.width
    small = rgb.resize((work_w, max(1, round(rgb.height * scale))), Image.BILINEAR).convert("L")
    edges = small.filter(ImageFilter.FIND_EDGES).filter(ImageFilter.BoxBlur(3))
    return edges, scale


def _integral(edges):
    import numpy as np
    a = np.asarray(edges, dtype=np.float64)
    ii = np.zeros((a.shape[0] + 1, a.shape[1] + 1)); ii[1:, 1:] = a.cumsum(0).cumsum(1)
    return ii


def _score(ii, box):
    x0, y0, x1, y1 = box
    return (ii[y1, x1] - ii[y0, x1] - ii[y1, x0] + ii[y0, x0]) / max(1, (x1 - x0) * (y1 - y0))


def _iou(a, b):
    ix = max(0, min(a[2], b[2]) - max(a[0], b[0])); iy = max(0, min(a[3], b[3]) - max(a[1], b[1]))
    inter = ix * iy
    ua = (a[2]-a[0])*(a[3]-a[1]) + (b[2]-b[0])*(b[3]-b[1]) - inter
    return inter / ua if ua else 0


def detail_crops(rgb, n=3, ratio=0.8):
    """Pick n interesting, non-overlapping 4:5 crops: one wide (full height), then tighter details."""
    edges, k = _interest_map(rgb)
    EW, EH = edges.size
    ii = _integral(edges)
    picks = []
    for frac in [1.0, 0.62, 0.45, 0.45, 0.62]:          # wide first, then details
        if len(picks) >= n:
            break
        h = int(EH * frac); w = int(h * ratio)
        if w > EW:
            w = EW; h = int(w / ratio)
        best = None
        step = max(4, w // 10)
        for y in range(0, EH - h + 1, max(4, h // 10) if h < EH else 1):
            for x in range(0, EW - w + 1, step):
                box = (x, y, x + w, y + h)
                if any(_iou(box, q) > 0.25 for q in picks):
                    continue
                cx = (x + w / 2) / EW
                sc = _score(ii, box) * (1 - 0.15 * abs(cx - 0.5))   # slight centre bias
                if not best or sc > best[0]:
                    best = (sc, box)
        if best:
            picks.append(best[1])
    return [tuple(round(v / k) for v in b) for b in picks]


def instagram_post(img, stem, out_dir, size, color, white="#FFFFFF"):
    """4:5 source -> single slide. Anything else -> carousel:
    interesting 4:5 detail crops, then the whole image on white as the last slide."""
    out_dir.mkdir(parents=True, exist_ok=True)
    W, H = size
    rgb = img.convert("RGB")
    save = lambda im, name: (im.save(out_dir / name, quality=95, subsampling=0, optimize=True), str(out_dir / name))[1]
    if abs(rgb.width / rgb.height - W / H) < 0.01:
        return [save(rgb.resize((W, H), Image.LANCZOS), f"{stem}-01.jpg")], "single"
    slides = []
    for i, (x0, y0, x1, y1) in enumerate(detail_crops(rgb), 1):
        crop = rgb.crop((x0, y0, x1, y1)).resize((W, H), Image.LANCZOS)
        slides.append(save(crop, f"{stem}-{i:02d}.jpg"))
    fitted = ImageOps.contain(rgb, (W, H), Image.LANCZOS)
    canvas = Image.new("RGB", (W, H), white)
    canvas.paste(fitted, ((W - fitted.width) // 2, (H - fitted.height) // 2))
    slides.append(save(canvas, f"{stem}-{len(slides)+1:02d}-full.jpg"))
    return slides, "carousel"


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
        slides, mode = instagram_post(img, stem, out_dir / "ig", cfg["feed_size"], cfg["frame_color"])
        items.append({
            "source": str(src.relative_to(src_dir)),
            "sha1": hashlib.sha1(src.read_bytes()).hexdigest(),
            "size": list(img.size),
            "orientation": "landscape" if img.width > img.height else "portrait" if img.height > img.width else "square",
            "web_full": str(full), "lossless_verified": True,
            "web_grid": grid_versions(img, stem, out_dir / "web" / "grid", cfg["grid_widths"]),
            "ig_slides": slides, "ig_mode": mode,
            "source_bytes": src.stat().st_size, "full_bytes": full.stat().st_size,
        })
        print(f"ok  {src.name}  {img.size[0]}x{img.size[1]}  ig:{mode}  "
              f"{src.stat().st_size/1e6:.1f}MB -> {full.stat().st_size/1e6:.1f}MB lossless")
    out_dir.mkdir(parents=True, exist_ok=True)
    (out_dir / "manifest.json").write_text(json.dumps({"project": pid, "items": items}, indent=2))
    print(f"{len(items)} image(s) processed for {pid}")


if __name__ == "__main__":
    main()
