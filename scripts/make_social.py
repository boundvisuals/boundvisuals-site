#!/usr/bin/env python3
"""Stories (1080x1920 JPEG) and one reel (1080x1920 MP4, slow push-ins, generated ambient audio)
for a project, built from the ORIGINAL finals and ONLY from images that have hand-reviewed crops in
config/crops.yml (same rule as the feed: nothing unreviewed goes out).

usage: make_social.py <input_dir> <output_dir> <project_id> <project_title>

Output:
  <out>/story/<stem>-s00.jpg        whole image on brand black
  <out>/story/<stem>-s01..jpg       one story per reviewed crop (4:5 crop on brand black)
  <out>/reel/<project_id>-reel.mp4  + <project_id>-reel-cover.jpg
Layout follows Instagram safe zones: media in the middle, text clear of the top 250 px / bottom 250 px UI.
"""
import sys, pathlib, subprocess, math, wave, struct
import numpy as np
import yaml
from PIL import Image, ImageDraw, ImageFont

W, H = 1080, 1920
BLACK = (11, 12, 12)       # #0b0c0c
GREY = (197, 193, 183)     # #c5c1b7
LIGHT = (229, 229, 227)    # #e5e5e3
EXTS = {".png", ".jpg", ".jpeg", ".tif", ".tiff", ".webp"}
_HERE = pathlib.Path(__file__).resolve().parent / "fonts"
FONT_L = str(_HERE / "Poppins-Light.ttf")   # SIL OFL, kept in the repo so the runner needs no download
FONT_M = str(_HERE / "Poppins-Medium.ttf")
FPS = 30
SHOT_S = 3.0
END_S = 2.0
FADE = 0.35


def font(path, size):
    try:
        return ImageFont.truetype(path, size)
    except OSError:
        return ImageFont.load_default()


def boxes_for(img, spec):
    """[cx, cy, h] fractions of the original -> float 4:5 boxes (same maths as process_media)."""
    iw, ih = img.size
    out = []
    for cx, cy, fh in spec:
        ch = min(fh * ih, ih)
        cw = 0.8 * ch
        if cw > iw:
            cw = iw; ch = cw / 0.8
        x0 = min(max(cx * iw - cw / 2, 0), iw - cw)
        y0 = min(max(cy * ih - ch / 2, 0), ih - ch)
        out.append((x0, y0, x0 + cw, y0 + ch))
    return out


def label(draw, title):
    f1, f2 = font(FONT_M, 40), font(FONT_L, 28)
    draw.text((W // 2, 1668), title, font=f1, fill=LIGHT, anchor="mm")
    draw.text((W // 2, 1722), "Vítor Hugo  •  Bound Visuals", font=f2, fill=GREY, anchor="mm")


def box916(img, spec):
    """[cx, cy, h] fractions → full-screen 9:16 box (same centre and height as the post crop, narrower)."""
    iw, ih = img.size
    cx, cy, fh = spec
    ch = min(fh * ih, ih)
    cw = 0.5625 * ch
    if cw > iw:
        cw = iw; ch = min(cw / 0.5625, ih)
    x0 = min(max(cx * iw - cw / 2, 0), iw - cw)
    y0 = min(max(cy * ih - ch / 2, 0), ih - ch)
    return (x0, y0, x0 + cw, y0 + ch)


def frame_story(photo, title, box):
    """Full-screen story (1080x1920): the 9:16 crop fills the screen; small brand label on a soft bottom gradient."""
    canvas = photo.resize((W, H), Image.LANCZOS, box=box).convert("RGB")
    grad = Image.new("L", (1, 420))
    for y in range(420):
        grad.putpixel((0, y), int(170 * (y / 419) ** 1.6))
    shade = Image.new("RGB", (W, 420), BLACK)
    canvas.paste(shade, (0, H - 420 - 230), grad.resize((W, 420)))
    lower = Image.new("RGB", (W, 230), BLACK)
    canvas.paste(lower, (0, H - 230), Image.new("L", (W, 230), 170))
    d = ImageDraw.Draw(canvas)
    d.text((W // 2, H - 300), title, font=font(FONT_M, 40), fill=LIGHT, anchor="mm")
    d.text((W // 2, H - 250), "Vítor Hugo  •  Bound Visuals", font=font(FONT_L, 28), fill=GREY, anchor="mm")
    return canvas


def ease(t):
    t = min(max(t, 0.0), 1.0)
    return t * t * (3 - 2 * t)


def push_box(box, k):
    """Shrink a 4:5 box toward its centre by up to 12 % (slow push-in)."""
    x0, y0, x1, y1 = box
    s = 1 - 0.12 * k
    cx, cy = (x0 + x1) / 2, (y0 + y1) / 2
    w, h = (x1 - x0) * s, (y1 - y0) * s
    return (cx - w / 2, cy - h / 2, cx + w / 2, cy + h / 2)


def synth_audio(path, seconds):
    """Soft original ambient pad (no samples, so no licensing question)."""
    sr = 44100
    t = np.arange(int(sr * seconds)) / sr
    notes = [110.0, 164.81, 220.0, 277.18, 329.63, 493.88]   # A2 E3 A3 C#4 E4 B4 (Amaj9 colour)
    L = np.zeros_like(t); R = np.zeros_like(t)
    for i, f in enumerate(notes):
        for d, side in ((-0.6, 0), (0.6, 1)):
            ph = 2 * np.pi * (f + d * 0.25) * t
            lfo = 0.65 + 0.35 * np.sin(2 * np.pi * (0.07 + 0.03 * i) * t + i)
            sig = np.sin(ph) * lfo * (0.5 / (1 + 0.6 * i))
            (L if side == 0 else R)[:] += sig * (0.85 if side == 0 else 1.0)
    pulse = 0.5 + 0.5 * np.sin(2 * np.pi * t / SHOT_S - np.pi / 2)   # gentle swell per shot
    L *= 0.8 + 0.2 * pulse; R *= 0.8 + 0.2 * pulse
    fade_in = np.clip(t / 0.8, 0, 1); fade_out = np.clip((seconds - t) / 1.6, 0, 1)
    env = fade_in * fade_out
    L *= env; R *= env
    peak = max(np.abs(L).max(), np.abs(R).max(), 1e-9)
    L *= 0.50 / peak; R *= 0.50 / peak
    with wave.open(str(path), "wb") as w:
        w.setnchannels(2); w.setsampwidth(2); w.setframerate(sr)
        inter = np.empty(len(t) * 2, dtype=np.int16)
        inter[0::2] = (L * 32767).astype(np.int16); inter[1::2] = (R * 32767).astype(np.int16)
        w.writeframes(inter.tobytes())


def make_reel(shots, title, out_mp4, cover_jpg, tmp):
    total = len(shots) * SHOT_S + END_S
    wav = tmp / "pad.wav"; synth_audio(wav, total)
    cmd = ["ffmpeg", "-y", "-loglevel", "error", "-f", "rawvideo", "-pix_fmt", "rgb24", "-s", f"{W}x{H}", "-r", str(FPS),
           "-i", "-", "-i", str(wav), "-c:v", "libx264", "-threads", "2", "-preset", "veryfast", "-crf", "16", "-pix_fmt", "yuv420p",
           "-profile:v", "high", "-movflags", "+faststart", "-c:a", "aac", "-b:a", "192k", "-shortest", str(out_mp4)]
    p = subprocess.Popen(cmd, stdin=subprocess.PIPE)
    base = Image.new("RGB", (W, H), BLACK)
    ImageDraw.Draw(base)
    cover_done = False
    n_shot = int(SHOT_S * FPS)
    for img, box in shots:
        for i in range(n_shot):
            tt = i / n_shot
            b = push_box(box, ease(tt))
            fr = base.copy()
            fr.paste(img.resize((W, 1350), Image.LANCZOS, box=b), (0, 250))
            label(ImageDraw.Draw(fr), title)
            a = min(1.0, (i / FPS) / FADE, ((n_shot - 1 - i) / FPS) / FADE)
            if a < 1.0:
                fr = Image.blend(base, fr, max(0.0, a))
            if not cover_done and tt > 0.5:
                fr.save(cover_jpg, quality=95); cover_done = True
            p.stdin.write(fr.tobytes())
    end = Image.new("RGB", (W, H), BLACK); d = ImageDraw.Draw(end)
    d.text((W // 2, 880), title, font=font(FONT_M, 58), fill=LIGHT, anchor="mm")
    d.text((W // 2, 960), "Vítor Hugo  •  Bound Visuals", font=font(FONT_L, 36), fill=GREY, anchor="mm")
    d.text((W // 2, 1040), "boundvisuals.com", font=font(FONT_L, 30), fill=GREY, anchor="mm")
    for i in range(int(END_S * FPS)):
        a = min(1.0, (i / FPS) / FADE)
        p.stdin.write((Image.blend(base, end, a) if a < 1 else end).tobytes())
    p.stdin.close()
    if p.wait() != 0:
        raise SystemExit("ffmpeg failed")


def main():
    src_dir, out_dir = pathlib.Path(sys.argv[1]), pathlib.Path(sys.argv[2])
    pid, title = sys.argv[3], sys.argv[4]
    crops = yaml.safe_load(open("config/crops.yml"))["crops"]
    # optional story-specific 9:16 crops: stem → [s00 spec, s01 spec, ...]; otherwise derived from the post crops
    story_crops = (yaml.safe_load(open("config/story_crops.yml")) or {}).get("story_crops", {}) if pathlib.Path("config/story_crops.yml").exists() else {}
    (out_dir / "story").mkdir(parents=True, exist_ok=True); (out_dir / "reel").mkdir(parents=True, exist_ok=True)
    per_image = []
    for src in sorted(p for p in src_dir.rglob("*") if p.suffix.lower() in EXTS):
        stem = "_".join(src.relative_to(src_dir).with_suffix("").parts).replace(" ", "_")
        if stem not in crops:
            print(f"skip (no reviewed crops): {src.name}")
            continue
        img = Image.open(src); img.load(); img = img.convert("RGB")
        bx = boxes_for(img, crops[stem])
        sc = story_crops.get(stem)
        frame_story(img, title, box916(img, sc[0] if sc else [crops[stem][0][0], 0.5, 1.0])).save(out_dir / "story" / f"{stem}-s00.jpg", quality=95, subsampling=0)
        for k, b in enumerate(bx, 1):
            spec = sc[k] if sc and k < len(sc) else crops[stem][k - 1]
            frame_story(img, title, box916(img, spec)).save(out_dir / "story" / f"{stem}-s{k:02d}.jpg", quality=95, subsampling=0)
        per_image.append((stem, img, bx))
        print(f"stories: {stem} -> {1 + len(bx)}")
    # reels: round-robin over images (crop 1 of each, then crop 2 ...), 4 shots per reel, project's best image first.
    # Reel 1 keeps the legacy name <pid>-reel.mp4; further reels are <pid>-reel-02.mp4 ... (max 3 per project).
    order = [k for k in crops if k in {s for s, _, _ in per_image}]
    per_image.sort(key=lambda x: order.index(x[0]))
    pool = []
    k = 0
    while any(k < len(bx) for _, _, bx in per_image):
        for _, img, bx in per_image:
            if k < len(bx):
                pool.append((img, bx[k]))
        k += 1
    import shutil
    n_reels = min(3, len(pool) // 4)
    for r in range(max(n_reels, 1 if pool else 0)):
        shots = pool[r * 4:(r + 1) * 4] or pool[:4]
        tmp = out_dir / "_tmp"; tmp.mkdir(exist_ok=True)
        name = f"{pid}-reel" if r == 0 else f"{pid}-reel-{r + 1:02d}"
        make_reel(shots, title, out_dir / "reel" / f"{name}.mp4", out_dir / "reel" / f"{name}-cover.jpg", tmp)
        shutil.rmtree(tmp)
        print(f"reel {r + 1}: {len(shots)} shots")


if __name__ == "__main__":
    main()
