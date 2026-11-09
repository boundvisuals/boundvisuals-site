#!/usr/bin/env python3
"""Server job: PNG (public MEGA folder) -> smallest WebP that is visually lossless.
Reads config/webp_jobs.txt lines: <name> <mega-link>. Output: ~/public_html/bv-fila/webp-<token>/<name>/ (+ index.html, all.zip),
push notification when done. Per image: lowest quality in 80..98 with SSIM(luma)>=0.998 and PSNR>=42 dB; fallback lossless."""
import os, sys, io, json, glob, hashlib, subprocess, zipfile, time
import numpy as np
from PIL import Image

HOME = os.path.expanduser("~"); B = HOME + "/bv"; R = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
W = HOME + "/public_html"; S = W + "/painel/store"
TOKEN = hashlib.sha1((HOME + "bvwebp").encode()).hexdigest()[:12]

def luma(a): return (0.299 * a[..., 0] + 0.587 * a[..., 1] + 0.114 * a[..., 2]).astype(np.float64)

def ssim(x, y, win=8):
    h, w = (x.shape[0] // win) * win, (x.shape[1] // win) * win
    x, y = x[:h, :w], y[:h, :w]
    bx = x.reshape(h // win, win, w // win, win); by = y.reshape(h // win, win, w // win, win)
    mx, my = bx.mean((1, 3)), by.mean((1, 3)); vx, vy = bx.var((1, 3)), by.var((1, 3))
    cov = (bx * by).mean((1, 3)) - mx * my
    c1, c2 = 6.5025, 58.5225
    s = ((2 * mx * my + c1) * (2 * cov + c2)) / ((mx ** 2 + my ** 2 + c1) * (vx + vy + c2))
    return float(s.mean()), float(np.percentile(s, 0.5))      # mean and worst 0.5% of blocks

def psnr(a, b):
    m = np.mean((a.astype(np.float64) - b.astype(np.float64)) ** 2)
    return 99.0 if m == 0 else 10 * np.log10(255 ** 2 / m)

def enc(im, q, icc):
    buf = io.BytesIO(); im.save(buf, "WEBP", quality=q, method=6, icc_profile=icc, exact=False); return buf.getvalue()

def best(im, icc):
    rgb = im.convert("RGB"); ref = np.asarray(rgb)
    def ok(q):
        data = enc(rgb, q, icc); dec = np.asarray(Image.open(io.BytesIO(data)).convert("RGB"))
        m, worst = ssim(luma(ref), luma(dec))
        return (m >= 0.998 and worst >= 0.99 and psnr(ref, dec) >= 42), data
    lo, hi, found = 80, 98, None
    good, d = ok(hi)
    if not good:
        buf = io.BytesIO(); im.save(buf, "WEBP", lossless=True, quality=100, method=6, icc_profile=icc); return buf.getvalue(), "lossless"
    found = (hi, d)
    while lo < hi:
        mid = (lo + hi) // 2; g, dd = ok(mid)
        if g: hi = mid; found = (mid, dd)
        else: lo = mid + 1
    return found[1], f"q{found[0]}"

def main():
    jobs = [l.split(None, 1) for l in open(R + "/config/webp_jobs.txt") if l.strip() and not l.startswith("#")]
    for name, link in jobs:
        link = link.strip(); done = f"{B}/webp_done_{name}"
        if os.path.exists(done): continue
        src = f"{B}/webp_in/{name}"; os.makedirs(src, exist_ok=True)
        subprocess.run([sys.executable, R + "/scripts/mega_public.py", link, src], check=True)
        out = f"{W}/bv-fila/webp-{TOKEN}/{name}"; os.makedirs(out, exist_ok=True)
        rows = []
        for f in sorted(glob.glob(src + "/**/*", recursive=True)):
            if not f.lower().endswith(".png"): continue
            im = Image.open(f); icc = im.info.get("icc_profile"); im.load()
            data, mode = best(im, icc)
            o = os.path.join(out, os.path.splitext(os.path.basename(f))[0] + ".webp"); open(o, "wb").write(data)
            rows.append((os.path.basename(o), os.path.getsize(f), len(data), mode, im.size)); print(rows[-1], flush=True)
        with zipfile.ZipFile(out + "/all.zip", "w") as z:
            for r in rows: z.write(os.path.join(out, r[0]), r[0])
        tr = "".join(f"<tr><td><a href='{r[0]}'>{r[0]}</a></td><td>{r[4][0]}×{r[4][1]}</td><td>{r[1]/1e6:.1f} MB</td><td>{r[2]/1e6:.2f} MB</td><td>-{100-100*r[2]/r[1]:.0f}%</td><td>{r[3]}</td></tr>" for r in rows)
        open(out + "/index.html", "w").write(f"<!doctype html><meta charset=utf-8><meta name=robots content=noindex><title>{name} WebP</title><body style='font:15px system-ui;padding:20px'><h2>{name} · WebP</h2><p><a href='all.zip'>⬇ all.zip</a></p><table cellpadding=6><tr><th>Ficheiro<th>Dim.<th>PNG<th>WebP<th>Poupança<th>Modo</tr>{tr}</table>")
        url = f"https://www.boundvisuals.com/bv-fila/webp-{TOKEN}/{name}/"
        n = json.loads(open(S + "/notify.json.php").read().split("\n", 1)[1]) if os.path.exists(S + "/notify.json.php") else []
        n.append({"id": f"webp-{name}-{int(time.time())}", "title": f"WebP prontos: {name}", "body": f"{len(rows)} imagens · {url}", "url": url})
        open(S + "/notify.json.php", "w").write("<?php exit; ?>\n" + json.dumps(n, ensure_ascii=False))
        try: import urllib.request; urllib.request.urlopen("https://www.boundvisuals.com/painel/push.php?a=run", timeout=20).read()
        except Exception: pass
        open(done, "w").write(url); print("DONE", url)

main()
