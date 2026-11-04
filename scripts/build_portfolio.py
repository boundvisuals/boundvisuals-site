#!/usr/bin/env python3
"""Portfolio PDF, rebuilt automatically from every project's finals (reports/<p>/preview).
usage: python scripts/build_portfolio.py <out.pdf>
Layout: 16:9 landscape pages, brand black, Visby CF. Cover → about → per project (hero + pairs/singles) → contact.
"""
import sys, os, glob, io
import yaml
from PIL import Image
from reportlab.pdfgen import canvas
from reportlab.lib.utils import ImageReader
from reportlab.pdfbase import pdfmetrics
from reportlab.pdfbase.ttfonts import TTFont

W, H = 1600, 900
BLACK, GREY, LIGHT = (11/255, 12/255, 12/255), (197/255, 193/255, 183/255), (229/255, 229/255, 227/255)
F = os.path.join(os.path.dirname(__file__), "fonts")
pdfmetrics.registerFont(TTFont("VL", f"{F}/VisbyCF-Light.ttf"))
pdfmetrics.registerFont(TTFont("VM", f"{F}/VisbyCF-Medium.ttf"))
pdfmetrics.registerFont(TTFont("VD", f"{F}/VisbyCF-DemiBold.ttf"))
M = 64  # margin


def bg(c, col=BLACK):
    c.setFillColorRGB(*col); c.rect(0, 0, W, H, stroke=0, fill=1)


def img_reader(path, max_px=2000):
    im = Image.open(path).convert("RGB")
    im.thumbnail((max_px, max_px), Image.LANCZOS)
    b = io.BytesIO(); im.save(b, "JPEG", quality=86, optimize=True, progressive=True); b.seek(0)
    return ImageReader(b), im.size


def place(c, path, x, y, w, h, cover=False):
    r, (iw, ih) = img_reader(path)
    s = max(w / iw, h / ih) if cover else min(w / iw, h / ih)
    dw, dh = iw * s, ih * s
    c.saveState()
    p = c.beginPath(); p.rect(x, y, w, h); c.clipPath(p, stroke=0, fill=0)
    c.drawImage(r, x + (w - dw) / 2, y + (h - dh) / 2, dw, dh)
    c.restoreState()


def footer(c, left, n):
    c.setFont("VL", 13); c.setFillColorRGB(*GREY)
    c.drawString(M, 34, left)
    c.drawRightString(W - M, 34, f"Vítor Hugo  •  Bound Visuals    {n:02d}")


def main(out):
    prof = yaml.safe_load(open("docs/profile.yml", encoding="utf-8"))
    reg = yaml.safe_load(open("projects/registry.yml", encoding="utf-8"))
    reg = reg.get("projects", []) if isinstance(reg, dict) else reg
    # feed order decides the hero (best image first)
    order = []
    for f in sorted(glob.glob("queue/week-*.yml")):
        for it in yaml.safe_load(open(f, encoding="utf-8")) or []:
            order.append((it["project"], it["slides"][0].rsplit("-", 1)[0].replace("-04", "").replace("-03", "")))
    c = canvas.Canvas(out, pagesize=(W, H))
    c.setTitle("Vítor Hugo • Bound Visuals — Portfolio"); c.setAuthor("Vítor Hugo")
    n = 1
    # cover
    bg(c)
    covers = sorted(glob.glob("reports/vivendas-duas-igrejas/preview/*.jpg"))
    if covers:
        place(c, covers[0], W * 0.48, 0, W * 0.52, H, cover=True)
    c.setFillColorRGB(*LIGHT); c.setFont("VD", 64); c.drawString(M + 8, H / 2 + 40, "Vítor Hugo")
    c.setFillColorRGB(*GREY); c.setFont("VL", 40); c.drawString(M + 8, H / 2 - 12, "Bound Visuals")
    c.setFont("VL", 18); c.setFillColorRGB(*LIGHT)
    c.drawString(M + 8, H / 2 - 90, "Architectural visualisation · Product · CGI")
    c.drawString(M + 8, H / 2 - 118, "AI image & video · Performance ads")
    c.setFillColorRGB(*GREY); c.setFont("VL", 14); c.drawString(M + 8, 60, "Portfolio  ·  boundvisuals.com")
    c.showPage(); n += 1
    # about
    bg(c)
    c.setFillColorRGB(*GREY); c.setFont("VM", 14); c.drawString(M, H - M - 10, "ABOUT")
    c.setFillColorRGB(*LIGHT); c.setFont("VD", 40); c.drawString(M, H - M - 70, prof.get("display", "Vítor Hugo • Bound Visuals"))
    t = c.beginText(M, H - M - 130); t.setFont("VL", 20); t.setFillColorRGB(*LIGHT); t.setLeading(30)
    words, line = prof.get("bio_long_en", "").split(), ""
    for w_ in words:
        if pdfmetrics.stringWidth(line + " " + w_, "VL", 20) > W * 0.55:
            t.textLine(line.strip()); line = ""
        line += " " + w_
    t.textLine(line.strip()); c.drawText(t)
    x2 = W * 0.66
    c.setFillColorRGB(*GREY); c.setFont("VM", 14); c.drawString(x2, H - M - 130, "SERVICES")
    y = H - M - 165; c.setFont("VL", 17); c.setFillColorRGB(*LIGHT)
    svc_en = ["Architectural 3D imagery (exterior & interior)", "AI post-production of renders", "Product & CGI imagery", "AI video & animation", "Performance ads (static & UGC)"]
    for s_ in svc_en:
        c.drawString(x2, y, s_); y -= 30
    c.setFillColorRGB(*GREY); c.setFont("VM", 14); c.drawString(x2, y - 20, "TOOLS"); y -= 55
    c.setFont("VL", 17); c.setFillColorRGB(*LIGHT)
    tools = prof.get("tools", [])
    for i in range(0, len(tools), 3):
        c.drawString(x2, y, "  ·  ".join(tools[i:i + 3])); y -= 28
    footer(c, "About", n); c.showPage(); n += 1
    # projects
    for p in reg:
        if p["id"] == "daily-study-2026":
            continue
        prev = [f for f in sorted(glob.glob(f"reports/{p['id']}/preview/*.jpg")) if not os.path.basename(f).startswith("2026_-_FINAIS")]
        if not prev:
            continue
        stems = [os.path.basename(f)[:-4] for f in prev]
        hero_stem = next((s for pr, s in order if pr == p["id"] and s in stems), stems[0])
        hero = prev[stems.index(hero_stem)]
        rest = [f for f in prev if f != hero]
        title, loc = p.get("title", p["id"]), p.get("location", "")
        # opener: full-bleed hero + title band
        bg(c); place(c, hero, 0, 0, W, H, cover=True)
        c.setFillColorRGB(*BLACK); c.setFillAlpha(0.72); c.rect(0, 0, W, 130, stroke=0, fill=1); c.setFillAlpha(1)
        c.setFillColorRGB(*LIGHT); c.setFont("VD", 38); c.drawString(M, 62, title)
        c.setFillColorRGB(*GREY); c.setFont("VL", 17); c.drawString(M, 32, (loc + "  ·  " if loc else "") + "3D + AI post-production")
        c.setFont("VL", 14); c.drawRightString(W - M, 34, f"Vítor Hugo  •  Bound Visuals    {n:02d}")
        c.showPage(); n += 1
        # body: portrait images in pairs, landscape full page
        q = list(rest)
        while q:
            f = q.pop(0)
            iw, ih = Image.open(f).size
            bg(c)
            if iw / ih < 1.1 and q and (lambda s: s[0] / s[1] < 1.1)(Image.open(q[0]).size):
                g = q.pop(0); gw = (W - 2 * M - 24) / 2
                place(c, f, M, 80, gw, H - 80 - M)
                place(c, g, M + gw + 24, 80, gw, H - 80 - M)
            else:
                place(c, f, M, 80, W - 2 * M, H - 80 - M)
            footer(c, title, n); c.showPage(); n += 1
    # contact
    bg(c)
    c.setFillColorRGB(*LIGHT); c.setFont("VD", 56); c.drawString(M, H / 2 + 30, "Let's work together.")
    c.setFillColorRGB(*GREY); c.setFont("VL", 22)
    y = H / 2 - 30
    for l in prof.get("links", []):
        c.drawString(M, y, f"{l['title']}:  {l['url'].replace('https://', '').replace('www.', '').rstrip('/')}"); y -= 36
    c.setFont("VL", 16); c.drawString(M, 60, "Vítor Hugo  •  Bound Visuals")
    c.showPage(); c.save()
    print(f"portfolio: {n} pages → {out} ({os.path.getsize(out) / 1e6:.1f} MB)")


if __name__ == "__main__":
    main(sys.argv[1])
