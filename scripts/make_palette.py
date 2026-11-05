#!/usr/bin/env python3
"""Colour-palette slide for 'Desafio de cor' carousels (pillar 'paleta').

Takes ONE final image and writes a 1080x1350 (4:5) slide in the brand look:
  - the whole image, never cropped (fit inside the frame, light-grey brand background)
  - 5 dominant colours as swatches, with HEX + RGB, ordered dark → light
  - title + signature "Vítor Hugo • Bound Visuals" in Visby CF / Poppins

Colours: k-means in CIE Lab (perceptual) on a downsampled copy, 10 clusters, then the 5 most
important ones that are clearly different from each other (ΔE ≥ 12), so a big flat wall doesn't
eat three swatches with near-identical greys. Deterministic (fixed seed) → same image, same palette.

usage: python scripts/make_palette.py <image> [out.jpg] [--title "Colour challenge #3 · azulejo blue"]
       → default out = <image dir>/palette-<image stem>.jpg ; prints the HEX list
"""
import sys, pathlib, argparse
import numpy as np
from PIL import Image, ImageDraw, ImageFont

W, H = 1080, 1350
BLACK, GREY, LIGHT = (11, 12, 12), (197, 193, 183), (229, 229, 227)
FONTS = pathlib.Path(__file__).resolve().parent / "fonts"


def font(name, size):
    return ImageFont.truetype(str(FONTS / name), size)


# --- sRGB <-> Lab (D65) ---------------------------------------------------------------
def _lin(c):
    c = c / 255.0
    return np.where(c <= 0.04045, c / 12.92, ((c + 0.055) / 1.055) ** 2.4)


def rgb2lab(rgb):
    M = np.array([[0.4124, 0.3576, 0.1805], [0.2126, 0.7152, 0.0722], [0.0193, 0.1192, 0.9505]])
    xyz = _lin(rgb.astype(np.float64)) @ M.T / np.array([0.95047, 1.0, 1.08883])
    f = np.where(xyz > 0.008856, np.cbrt(xyz), 7.787 * xyz + 16 / 116)
    return np.stack([116 * f[:, 1] - 16, 500 * (f[:, 0] - f[:, 1]), 200 * (f[:, 1] - f[:, 2])], 1)


def palette(path, n=5, k=10, min_de=12.0):
    im = Image.open(path).convert("RGB")
    im.thumbnail((240, 240), Image.LANCZOS)
    px = np.asarray(im).reshape(-1, 3)
    lab = rgb2lab(px)
    rng = np.random.default_rng(7)
    cent = lab[rng.choice(len(lab), k, replace=False)]
    for _ in range(30):
        lbl = np.argmin(((lab[:, None] - cent[None]) ** 2).sum(-1), 1)
        new = np.array([lab[lbl == i].mean(0) if (lbl == i).any() else cent[i] for i in range(k)])
        if np.allclose(new, cent, atol=0.05):
            break
        cent = new
    w = np.bincount(lbl, minlength=k) / len(lbl)
    # representative sRGB = mean of the real pixels in the cluster (no Lab→RGB round trip)
    rgb = np.array([px[lbl == i].mean(0) if (lbl == i).any() else [0, 0, 0] for i in range(k)])
    # importance = share of pixels, with a bonus for chroma so the accent colour survives
    chroma = np.hypot(cent[:, 1], cent[:, 2])
    score = w * (1 + chroma / 40)
    picked = []
    for thr in (min_de, min_de / 2, 0):
        for i in np.argsort(-score):
            if len(picked) == n:
                break
            if i in picked:
                continue
            if all(np.linalg.norm(cent[i] - cent[j]) >= thr for j in picked):
                picked.append(i)
        if len(picked) == n:
            break
    picked.sort(key=lambda i: cent[i][0])          # dark → light
    return [tuple(int(round(v)) for v in rgb[i]) for i in picked]


def hexs(c):
    return "#%02X%02X%02X" % c


def slide(path, title=None):
    cols = palette(path)
    c = Image.new("RGB", (W, H), LIGHT)
    d = ImageDraw.Draw(c)
    m = 72                                           # side margin
    # header
    d.text((m, 70), "COLOUR PALETTE", font=font("VisbyCF-DemiBold.ttf", 30), fill=BLACK)
    d.text((m, 110), "Paleta de cores", font=font("Poppins-Light.ttf", 24), fill=(90, 90, 88))
    if title:
        d.text((W - m, 82), title, font=font("Poppins-Light.ttf", 24), fill=(90, 90, 88), anchor="ra")
    # image, whole, fitted in a box (never cropped)
    box_w, box_h, top = W - 2 * m, 660, 170
    im = Image.open(path).convert("RGB")
    s = min(box_w / im.width, box_h / im.height, 1.0)  # downscale only
    iw, ih = round(im.width * s), round(im.height * s)
    im = im.resize((iw, ih), Image.LANCZOS)
    c.paste(im, ((W - iw) // 2, top + (box_h - ih) // 2))
    # swatches
    gap = 16
    sw = (W - 2 * m - gap * 4) // 5
    sy, sh = top + box_h + 48, 250
    for i, col in enumerate(cols):
        x = m + i * (sw + gap)
        near_bg = sum(abs(a - b) for a, b in zip(col, LIGHT)) < 36
        d.rectangle([x, sy, x + sw, sy + sh], fill=col, outline=GREY if near_bg else None, width=2)
        d.text((x, sy + sh + 22), hexs(col), font=font("VisbyCF-Medium.ttf", 24), fill=BLACK)
        d.text((x, sy + sh + 56), "%d · %d · %d" % col, font=font("Poppins-Light.ttf", 19), fill=(90, 90, 88))
    # signature (two lines, brand typeface)
    d.text((W - m, H - 98), "Vítor Hugo", font=font("VisbyCF-DemiBold.ttf", 24), fill=BLACK, anchor="ra")
    d.text((W - m, H - 66), "Bound Visuals", font=font("VisbyCF-Light.ttf", 22), fill=(90, 90, 88), anchor="ra")
    d.line([(m, H - 82), (m + 60, H - 82)], fill=BLACK, width=2)
    return c, cols


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("image")
    ap.add_argument("out", nargs="?")
    ap.add_argument("--title")
    a = ap.parse_args()
    src = pathlib.Path(a.image)
    out = pathlib.Path(a.out) if a.out else src.with_name("palette-" + src.stem + ".jpg")
    img, cols = slide(src, a.title)
    img.save(out, "JPEG", quality=95, subsampling=0, optimize=True)
    print(out, " ".join(hexs(c) for c in cols))


if __name__ == "__main__":
    sys.exit(main())
