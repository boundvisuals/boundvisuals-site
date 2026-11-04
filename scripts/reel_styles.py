#!/usr/bin/env python3
"""Two advanced reel styles (1080x1920, full-screen, 30 fps, H.264 high, AAC) from the ORIGINAL finals.

usage: reel_styles.py <input_dir> <out_dir> <project_id> "<Title>" [A|B|AB]
  A = editorial: 5 shots × 4.2 s, varied camera moves (lateral travelling, push-in, pull-out to wide), long crossfades,
      animated title at the start, end card. Soft generated ambient pad.
  B = rhythm: 110 bpm, cuts on the beat over detail crops with micro zooms, speed-ramped push, final reveal from detail to the
      whole image on a blurred backdrop, end card. Generated beat (kick/hat/pad) so no licensing question.
Only images with hand-reviewed crops (config/crops.yml) are used, best image first (order of crops.yml).
"""
import sys, pathlib, subprocess, math, wave
import numpy as np
import yaml
from PIL import Image, ImageDraw, ImageFont, ImageFilter

W, H, FPS = 1080, 1920, 30
BLACK, GREY, LIGHT = (11, 12, 12), (197, 193, 183), (229, 229, 227)
FD = pathlib.Path(__file__).resolve().parent / "fonts"
EXTS = {".png", ".jpg", ".jpeg", ".tif", ".tiff", ".webp"}


def font(n, s):
    try:
        return ImageFont.truetype(str(FD / n), s)
    except OSError:
        return ImageFont.load_default()


def ease(t):
    t = min(max(t, 0.0), 1.0)
    return t * t * (3 - 2 * t)


def ease_out(t):
    t = min(max(t, 0.0), 1.0)
    return 1 - (1 - t) ** 3


def box916(iw, ih, cx, cy, h):
    ch = min(h * ih, ih); cw = 0.5625 * ch
    if cw > iw:
        cw = iw; ch = min(cw / 0.5625, ih)
    x0 = min(max(cx * iw - cw / 2, 0), iw - cw); y0 = min(max(cy * ih - ch / 2, 0), ih - ch)
    return [x0, y0, x0 + cw, y0 + ch]


def lerp_box(a, b, t):
    return [a[i] + (b[i] - a[i]) * t for i in range(4)]


def render(img, box):
    return img.resize((W, H), Image.LANCZOS, box=tuple(box))


# ---------- audio ----------
def write_wav(path, L, R, sr=44100):
    peak = max(np.abs(L).max(), np.abs(R).max(), 1e-9)
    L = L * (0.55 / peak); R = R * (0.55 / peak)
    with wave.open(str(path), "wb") as w:
        w.setnchannels(2); w.setsampwidth(2); w.setframerate(sr)
        x = np.empty(len(L) * 2, dtype=np.int16); x[0::2] = (L * 32767).astype(np.int16); x[1::2] = (R * 32767).astype(np.int16)
        w.writeframes(x.tobytes())


def pad(seconds, sr=44100, notes=(110.0, 164.81, 220.0, 277.18, 329.63, 493.88)):
    t = np.arange(int(sr * seconds)) / sr
    L = np.zeros_like(t); R = np.zeros_like(t)
    for i, f in enumerate(notes):
        lfo = 0.6 + 0.4 * np.sin(2 * np.pi * (0.05 + 0.02 * i) * t + i)
        L += np.sin(2 * np.pi * (f - 0.15) * t) * lfo / (1 + 0.6 * i)
        R += np.sin(2 * np.pi * (f + 0.15) * t) * lfo / (1 + 0.6 * i)
    env = np.clip(t / 1.2, 0, 1) * np.clip((seconds - t) / 2.0, 0, 1)
    return L * env, R * env


def beat_track(seconds, bpm, sr=44100):
    t = np.arange(int(sr * seconds)) / sr
    L, R = pad(seconds, sr, notes=(98.0, 146.83, 196.0, 246.94, 293.66))
    L *= 0.45; R *= 0.45
    beat = 60.0 / bpm
    out = np.zeros_like(t)
    for k in range(int(seconds / beat) + 1):
        s0 = int(k * beat * sr)
        n = int(0.35 * sr); tt = np.arange(n) / sr
        kick = np.sin(2 * np.pi * (55 + 90 * np.exp(-tt * 30)) * tt) * np.exp(-tt * 9)
        e = min(len(out), s0 + n); out[s0:e] += kick[:e - s0] * (1.0 if k % 4 == 0 else 0.7)
        h0 = int((k + 0.5) * beat * sr); hn = int(0.05 * sr)
        if h0 + hn < len(out):
            out[h0:h0 + hn] += np.random.default_rng(k).normal(0, 1, hn) * np.exp(-np.arange(hn) / sr * 80) * 0.18
    env = np.clip(t / 0.3, 0, 1) * np.clip((seconds - t) / 1.5, 0, 1)
    return (L + out) * env, (R + out) * env


# ---------- text ----------
def title_layer(frame, title, alpha, y=H - 360, big=54):
    if alpha <= 0:
        return frame
    ov = Image.new("RGBA", (W, H), (0, 0, 0, 0)); d = ImageDraw.Draw(ov)
    grad = Image.new("L", (1, 520))
    for y2 in range(520):
        grad.putpixel((0, y2), int(160 * (y2 / 519) ** 1.4 * alpha))
    ov.paste(Image.new("RGBA", (W, 520), BLACK + (255,)), (0, H - 520), grad.resize((W, 520)))
    a = int(255 * alpha); dy = int((1 - alpha) * 24)
    d.text((W // 2, y + dy), title, font=font("Poppins-Medium.ttf", big), fill=LIGHT + (a,), anchor="mm")
    d.text((W // 2, y + 64 + dy), "Vítor Hugo  •  Bound Visuals", font=font("Poppins-Light.ttf", 30), fill=GREY + (a,), anchor="mm")
    return Image.alpha_composite(frame.convert("RGBA"), ov).convert("RGB")


def end_card(title):
    c = Image.new("RGB", (W, H), BLACK); d = ImageDraw.Draw(c)
    d.text((W // 2, 880), title, font=font("Poppins-Medium.ttf", 60), fill=LIGHT, anchor="mm")
    d.text((W // 2, 960), "Vítor Hugo  •  Bound Visuals", font=font("Poppins-Light.ttf", 36), fill=GREY, anchor="mm")
    d.text((W // 2, 1040), "boundvisuals.com", font=font("Poppins-Light.ttf", 30), fill=GREY, anchor="mm")
    return c


class Enc:
    def __init__(self, out, wav):
        self.p = subprocess.Popen(["ffmpeg", "-y", "-loglevel", "error", "-f", "rawvideo", "-pix_fmt", "rgb24", "-s", f"{W}x{H}", "-r", str(FPS),
                                   "-i", "-", "-i", str(wav), "-c:v", "libx264", "-preset", "slow", "-crf", "15", "-pix_fmt", "yuv420p",
                                   "-profile:v", "high", "-movflags", "+faststart", "-c:a", "aac", "-b:a", "192k", "-shortest", str(out)], stdin=subprocess.PIPE)
        self.n = 0

    def put(self, im):
        self.p.stdin.write(im.tobytes()); self.n += 1

    def close(self):
        self.p.stdin.close()
        if self.p.wait() != 0:
            raise SystemExit("ffmpeg failed")


def load(src_dir, crops):
    imgs = []
    for p in sorted(src_dir.rglob("*")):
        if p.suffix.lower() not in EXTS:
            continue
        stem = "_".join(p.relative_to(src_dir).with_suffix("").parts).replace(" ", "_")
        if stem in crops:
            im = Image.open(p); im.load(); im = im.convert("RGB")
            s = 3200 / max(im.size)
            if s < 1:
                im = im.resize((round(im.width * s), round(im.height * s)), Image.LANCZOS)
            imgs.append((stem, im))
    order = list(crops)
    imgs.sort(key=lambda x: order.index(x[0]))
    return imgs


# ---------- style A: editorial ----------
def style_a(imgs, crops, title, out, tmp):
    SH, XF = 7.5, 0.45                      # long holds, short dissolve (Vítor: images must stay longer)
    shots = []
    for k, (stem, im) in enumerate(imgs[:4]):
        iw, ih = im.size; c = crops[stem][0]
        if iw / ih > 0.75:                 # every landscape image: slow pan across the WHOLE width (edge to edge)
            a = box916(iw, ih, 0.0, 0.5, 1.0); b = box916(iw, ih, 1.0, 0.5, 1.0)
            if k % 2 == 1:
                a, b = b, a
        else:                              # gentle push-in, max 8 %, centred on the main subject
            a = box916(iw, ih, c[0], 0.5, 1.0); b = box916(iw, ih, c[0], 0.5, 0.92)
        shots.append((im, a, b))
    total = len(shots) * SH - (len(shots) - 1) * XF + 2.4
    wav = tmp / "a.wav"; write_wav(wav, *pad(total))
    enc = Enc(out, wav)
    frames = []
    nsh = int(SH * FPS); nx = int(XF * FPS)
    prev_tail = []
    for k, (im, a, b) in enumerate(shots):
        cur = []
        for i in range(nsh):
            fr = render(im, lerp_box(a, b, ease(i / (nsh - 1))))
            if k == 0:
                al = min(1.0, max(0.0, (i / FPS - 0.4) / 0.8)) * min(1.0, max(0.0, (SH - 0.5 - i / FPS) / 0.6))
                fr = title_layer(fr, title, al)
            cur.append(fr)
        if prev_tail:
            for j in range(nx):
                enc.put(Image.blend(prev_tail[j], cur[j], ease(j / nx)))
            cur = cur[nx:]
        body, prev_tail = (cur[:-nx], cur[-nx:]) if k < len(shots) - 1 else (cur, [])
        for fr in body:
            enc.put(fr)
    endc = end_card(title)
    last = render(shots[-1][0], shots[-1][2])
    for i in range(int(2.4 * FPS)):
        a = ease(min(1, i / (0.7 * FPS)))
        enc.put(Image.blend(last, endc, a))
    enc.close()


# ---------- style B: rhythm ----------
def style_b(imgs, crops, title, out, tmp):
    bpm = 110; beat = 60 / bpm
    cuts = []
    for stem, im in imgs[:4]:
        iw, ih = im.size
        for c in crops[stem]:
            cuts.append((im, box916(iw, ih, *c)))
    cuts = cuts[:10]
    hero_stem, hero = imgs[0]
    iw, ih = hero.size; hc = crops[hero_stem][0]
    reveal_s, end_s = 3.3, 2.2
    total = len(cuts) * 2 * beat + beat * 4 + reveal_s + end_s
    wav = tmp / "b.wav"; write_wav(wav, *beat_track(total, bpm))
    enc = Enc(out, wav)
    # intro: 4 beats, title punches in over the hero detail
    ni = int(4 * beat * FPS)
    a0 = box916(iw, ih, hc[0], hc[1], 0.55); a1 = box916(iw, ih, hc[0], hc[1], 0.48)
    for i in range(ni):
        fr = render(hero, lerp_box(a0, a1, i / ni))
        enc.put(title_layer(fr, title, ease_out(min(1, i / (beat * FPS)))))
    # cuts on every 2nd beat with micro zoom + 2-frame flash
    nc = int(2 * beat * FPS)
    for im, b in cuts:
        cx, cy = (b[0] + b[2]) / 2, (b[1] + b[3]) / 2; w, h = b[2] - b[0], b[3] - b[1]
        for i in range(nc):
            s = 1 - 0.07 * ease_out(i / nc)
            bb = [cx - w * s / 2, cy - h * s / 2, cx + w * s / 2, cy + h * s / 2]
            fr = render(im, bb)
            if i < 2:
                fr = Image.blend(fr, Image.new("RGB", (W, H), (255, 255, 255)), 0.18 if i == 0 else 0.08)
            enc.put(fr)
    # reveal: from hero detail out to the whole image (letterboxed on a blurred, darkened copy)
    bg = hero.resize((W, H), Image.LANCZOS, box=tuple(box916(iw, ih, 0.5, 0.5, 1.0))).filter(ImageFilter.GaussianBlur(40))
    bg = Image.blend(bg, Image.new("RGB", (W, H), BLACK), 0.45)
    fw = W; fh = round(W * ih / iw); fy = (H - fh) // 2
    whole = hero.resize((fw, fh), Image.LANCZOS)
    nr = int(reveal_s * FPS)
    det = box916(iw, ih, hc[0], hc[1], 0.5)
    for i in range(nr):
        t = ease(min(1, i / (nr * 0.75)))
        if t < 1:
            # zoom out inside the frame: crop box grows from detail to full height, then cross to letterbox
            fullh = box916(iw, ih, hc[0], 0.5, 1.0)
            fr = render(hero, lerp_box(det, fullh, t))
            canvas = bg.copy(); canvas.paste(whole, (0, fy))
            fr = Image.blend(fr, canvas, max(0, (t - 0.6) / 0.4))
        else:
            fr = bg.copy(); fr.paste(whole, (0, fy))
        enc.put(title_layer(fr, title, max(0, (i / nr - 0.55) / 0.3)))
    endc = end_card(title)
    for i in range(int(end_s * FPS)):
        enc.put(Image.blend(fr, endc, ease(min(1, i / (0.5 * FPS)))))
    enc.close()


def main():
    src, out_dir, pid, title = pathlib.Path(sys.argv[1]), pathlib.Path(sys.argv[2]), sys.argv[3], sys.argv[4]
    which = sys.argv[5] if len(sys.argv) > 5 else "AB"
    crops = yaml.safe_load(open("config/crops.yml"))["crops"]
    imgs = load(src, crops)
    if not imgs:
        raise SystemExit("no images with reviewed crops")
    out_dir.mkdir(parents=True, exist_ok=True)
    tmp = out_dir / "_tmp"; tmp.mkdir(exist_ok=True)
    if "A" in which:
        style_a(imgs, crops, title, out_dir / f"{pid}-reel-A.mp4", tmp); print("A done")
    if "B" in which:
        style_b(imgs, crops, title, out_dir / f"{pid}-reel-B.mp4", tmp); print("B done")
    import shutil; shutil.rmtree(tmp)


if __name__ == "__main__":
    main()
