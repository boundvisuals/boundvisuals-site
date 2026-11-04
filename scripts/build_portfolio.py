#!/usr/bin/env python3
"""Portfolio PDF, always up to date: every processed project, every image, in the brand look.
usage: build_portfolio.py <out_dir>   → <out>/Vitor-Hugo-Bound-Visuals-Portfolio.pdf (+ .html)
A4 landscape. Cover → about → per project: title page + one image per page (full bleed, letterboxed on brand black) → contact.
"""
import sys, os, glob, base64, html, pathlib, yaml

OUT = pathlib.Path(sys.argv[1]); OUT.mkdir(parents=True, exist_ok=True)
reg = yaml.safe_load(open("projects/registry.yml")) or {}
reg = reg.get("projects", reg) if isinstance(reg, dict) else reg
prof = yaml.safe_load(open("docs/profile.yml", encoding="utf-8")) if os.path.exists("docs/profile.yml") else {}
crops = list((yaml.safe_load(open("config/crops.yml")) or {}).get("crops", {}))
FONT = pathlib.Path("scripts/fonts").resolve()


def img64(p):
    return "data:image/jpeg;base64," + base64.b64encode(open(p, "rb").read()).decode()


pages = []
pages.append(f'''<section class="cover"><div><h1>Vítor Hugo</h1><h2>Bound Visuals</h2></div>
<p class="pos">{html.escape(prof.get("headline_en", ""))}</p><p class="url">boundvisuals.com · @vitorhugo_boundvisuals</p></section>''')
pages.append(f'''<section class="about"><div class="col"><h3>About</h3><p>{html.escape(prof.get("bio_long_en", ""))}</p></div>
<div class="col"><h3>Services</h3><ul>{"".join(f"<li>{html.escape(x)}</li>" for x in prof.get("services_en", prof.get("services", [])))}</ul>
<h3>Tools</h3><p class="tools">{" · ".join(html.escape(x) for x in prof.get("tools", []))}</p></div></section>''')
n_img = 0
for p in reg:
    prev = sorted(glob.glob(f"reports/{p['id']}/preview/*.jpg"))
    prev = [x for x in prev if not os.path.basename(x).startswith("2026_-_FINAIS")]
    if not prev:
        continue
    stem = lambda x: os.path.basename(x)[:-4]
    prev.sort(key=lambda x: (crops.index(stem(x)) if stem(x) in crops else 999, x))   # best (crop-reviewed) first
    pages.append(f'''<section class="ptitle" style="background-image:linear-gradient(rgba(11,12,12,.55),rgba(11,12,12,.75)),url({img64(prev[0])})">
<div><span>Project</span><h2>{html.escape(p.get("title", p["id"]))}</h2><p>{len(prev)} images · 3D + AI · Vítor Hugo • Bound Visuals</p></div></section>''')
    for x in prev:
        pages.append(f'<section class="img"><img src="{img64(x)}"><div class="cap">{html.escape(p.get("title", p["id"]))}</div></section>')
        n_img += 1
pages.append('''<section class="cover end"><div><h1>Let's talk.</h1><h2>Vítor Hugo • Bound Visuals</h2></div><p class="url">boundvisuals.com · @vitorhugo_boundvisuals</p></section>''')

doc = f'''<!doctype html><html><head><meta charset="utf-8"><style>
@font-face{{font-family:P;src:url("file://{FONT}/Poppins-Light.ttf");font-weight:300}}
@font-face{{font-family:P;src:url("file://{FONT}/Poppins-Medium.ttf");font-weight:500}}
@page{{size:297mm 210mm;margin:0}}
*{{box-sizing:border-box}}body{{margin:0;font-family:P,sans-serif;font-weight:300;color:#e5e5e3;background:#0b0c0c}}
section{{width:297mm;height:210mm;page-break-after:always;position:relative;overflow:hidden;background:#0b0c0c}}
.cover{{display:flex;flex-direction:column;justify-content:space-between;padding:24mm}}
.cover h1{{font-weight:500;font-size:44pt;margin:0;letter-spacing:-.01em}}.cover h2{{font-weight:300;font-size:24pt;margin:2mm 0 0;color:#c5c1b7}}
.pos{{font-size:13pt;max-width:180mm;color:#c5c1b7}}.url{{font-size:10pt;color:#8f8b82;letter-spacing:.06em}}
.about{{display:grid;grid-template-columns:1fr 1fr;gap:16mm;padding:24mm}}.about h3{{font-weight:500;font-size:10pt;letter-spacing:.14em;text-transform:uppercase;color:#c5c1b7;margin:0 0 4mm}}
.about p,.about li{{font-size:11.5pt;line-height:1.6}}.about ul{{padding-left:5mm;margin:0 0 8mm}}.tools{{color:#c5c1b7}}
.ptitle{{background-size:cover;background-position:center;display:flex;align-items:flex-end;padding:22mm}}
.ptitle span{{font-size:9pt;letter-spacing:.2em;text-transform:uppercase;color:#c5c1b7}}.ptitle h2{{font-weight:500;font-size:36pt;margin:2mm 0}}.ptitle p{{margin:0;color:#c5c1b7;font-size:11pt}}
.img{{display:flex;align-items:center;justify-content:center}}.img img{{max-width:100%;max-height:100%;object-fit:contain;display:block}}
.cap{{position:absolute;right:8mm;bottom:5mm;font-size:8pt;color:#8f8b82;letter-spacing:.08em}}
</style></head><body>{"".join(pages)}</body></html>'''
h = OUT / "portfolio.html"; h.write_text(doc, encoding="utf-8")
from playwright.sync_api import sync_playwright
with sync_playwright() as pw:
    b = pw.chromium.launch(); pg = b.new_page()
    pg.goto(f"file://{h.resolve()}"); pg.wait_for_timeout(500)
    pg.pdf(path=str(OUT / "Vitor-Hugo-Bound-Visuals-Portfolio.pdf"), width="297mm", height="210mm", print_background=True)
    b.close()
h.unlink()
print(f"portfolio: {n_img} images, {len(pages)} pages")
