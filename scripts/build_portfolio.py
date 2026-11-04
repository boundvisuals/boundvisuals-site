#!/usr/bin/env python3
"""CV + portfolio PDFs in Vítor's own InDesign style (A4 portrait, warm light grey, Visby CF), always up to date.

usage: build_portfolio.py <out_dir> <assets_dir>
  <assets_dir> = checkout of the `assets` branch (brand/…): his original PDFs (cover, index, presentation, CV,
  recommendations, AI pages, back page) are reused as-is; NEW 3D project pages are generated in the same layout
  from every processed project (reports/<id>/preview) and placed before his older project pages.
Outputs (EN):
  CV_Vitor_Hugo_Long.pdf, CV_Vitor_Hugo_Short.pdf, Cover_Letter.pdf
  Portfolio_3D_Architecture_Visualization.pdf  (cover…CV…recommendations + new projects + previous projects + back)
  Portfolio_AI.pdf                             (his AI portfolio as is, until new AI work is added)
  Portfolio_All.pdf                            (cover…CV + new 3D projects + AI pages + back)
"""
import sys, os, glob, base64, html, pathlib, shutil, yaml
from pypdf import PdfReader, PdfWriter

OUT = pathlib.Path(sys.argv[1]); OUT.mkdir(parents=True, exist_ok=True)
A = pathlib.Path(sys.argv[2])
REF = {
    "cv_long": "brand/cv/package/CV_vitor hugo_2026_LongVersion_en Folder/CV_vitor hugo_2026_LongVersion_en.pdf",
    "p3d": "brand/portfolio-3d/package/Portfolio_2025_3DArchitectureVisualization_en Folder/Portfolio_2025_3DArchitectureVisualization_en.pdf",
    "pai": "brand/portfolio-ai/package/Portfolio_2025_AI_en Folder/Portfolio_2025_AI_en.pdf",
    "pall": "brand/portfolio-all/package/Portfolio_2025_All_en Folder/Portfolio_2025_All_en.pdf",
    "letter": "brand/cover-letter/package/Cover Letter_2025_en Folder/Cover Letter_2025_en.pdf",
}
short = glob.glob(str(A / "brand/cv/package/*Short*/*.pdf"))
FONTS = A / "brand/fontes/FONTES/Visby CF"
reg = yaml.safe_load(open("projects/registry.yml")) or {}
reg = reg.get("projects", reg) if isinstance(reg, dict) else reg
crops = list((yaml.safe_load(open("config/crops.yml")) or {}).get("crops", {}))
YEAR = "2026"


def b64(p):
    return "data:image/jpeg;base64," + base64.b64encode(open(p, "rb").read()).decode()


def ratio(p):
    from PIL import Image
    w, h = Image.open(p).size
    return w / h


# ---- new 3D project pages, same layout as his portfolio (title, images, project card, footer) ----
pages = []
for p in reg:
    prev = [x for x in sorted(glob.glob(f"reports/{p['id']}/preview/*.jpg")) if not os.path.basename(x).startswith("2026_-_FINAIS")]
    if not prev:
        continue
    prev.sort(key=lambda x: (crops.index(os.path.basename(x)[:-4]) if os.path.basename(x)[:-4] in crops else 999, x))
    land = [x for x in prev if ratio(x) >= 1.1]
    port = [x for x in prev if ratio(x) < 1.1]
    groups = [land[i:i + 2] for i in range(0, len(land), 2)] + [port[i:i + 4] for i in range(0, len(port), 4)]
    card = (f'<div class="card"><p>Project name: {html.escape(p.get("title", p["id"]))}<br>'
            + (f'Client: {html.escape(p["client"])}<br>' if p.get("client") else "")
            + f'Date: {p.get("year", YEAR)}</p><p>View all project images<br>www.boundvisuals.com</p></div>')
    for g in groups:
        cls = "l" if ratio(g[0]) >= 1.1 else "p"
        imgs = "".join(f'<img src="{b64(x)}">' for x in g)
        pages.append(f'<section><h1>3D - Architecture Visualization</h1><div class="g {cls} n{len(g)}">{imgs}</div>{card}<div class="ft">Index</div><div class="pn"></div></section>')

css = f'''
@font-face{{font-family:V;src:url("file://{FONTS}/VisbyCF-Light.ttf");font-weight:300}}
@font-face{{font-family:V;src:url("file://{FONTS}/VisbyCF-Medium.ttf");font-weight:500}}
@font-face{{font-family:V;src:url("file://{FONTS}/VisbyCF-DemiBold.ttf");font-weight:600}}
@page{{size:210mm 297mm;margin:0}}*{{box-sizing:border-box}}
body{{margin:0;font-family:V,sans-serif;color:#0b0c0c}}
section{{width:210mm;height:297mm;background:#dcdcd8;position:relative;page-break-after:always;padding:10mm 10mm 0}}
h1{{font-weight:600;font-size:21pt;margin:0 0 7mm}}
.g{{display:grid;gap:15mm;}}
.g.l{{grid-template-columns:1fr}}.g.l img{{width:100%;height:100mm;object-fit:cover}}
.g.l.n1 img{{height:150mm}}
.g.p{{grid-template-columns:1fr 1fr;gap:16mm 15mm}}.g.p img{{width:100%;height:100mm;object-fit:cover}}
.card{{position:absolute;left:10mm;bottom:17mm;font-size:9.5pt;font-weight:500;line-height:1.35}}.card p{{margin:0 0 4mm}}
.ft{{position:absolute;left:0;right:0;bottom:9mm;text-align:center;font-size:9pt;font-weight:300;color:#5a5a57}}
'''
newpdf = OUT / "_new3d.pdf"
if pages:
    h = OUT / "_new3d.html"
    h.write_text(f'<!doctype html><html><head><meta charset="utf-8"><style>{css}</style></head><body>{"".join(pages)}</body></html>', encoding="utf-8")
    from playwright.sync_api import sync_playwright
    with sync_playwright() as pw:
        b = pw.chromium.launch(); pg = b.new_page()
        pg.goto(f"file://{h.resolve()}"); pg.wait_for_timeout(600)
        pg.pdf(path=str(newpdf), width="210mm", height="297mm", print_background=True)
        b.close()
    h.unlink()


def R(key):
    return PdfReader(str(A / REF[key]))


def build(name, parts):
    w = PdfWriter()
    for reader, idx in parts:
        for i in idx:
            w.add_page(reader.pages[i])
    with open(OUT / name, "wb") as f:
        w.write(f)
    return len(w.pages)


new = PdfReader(str(newpdf)) if newpdf.exists() else None
newp = list(range(len(new.pages))) if new else []
p3d, pai, pall = R("p3d"), R("pai"), R("pall")
n3d, nai = len(p3d.pages), len(pai.pages)
# his portfolios: 0 cover, 1 index, 2 presentation, 3 CV, 4 recommendations, 5..n-2 work, n-1 back
intro = list(range(0, 5))
res = {}
res["Portfolio_3D_Architecture_Visualization.pdf"] = build("Portfolio_3D_Architecture_Visualization.pdf",
    [(p3d, intro)] + ([(new, newp)] if new else []) + [(p3d, list(range(5, n3d - 1))), (p3d, [n3d - 1])])
res["Portfolio_AI.pdf"] = build("Portfolio_AI.pdf", [(pai, list(range(nai)))])
res["Portfolio_All.pdf"] = build("Portfolio_All.pdf",
    [(pall, intro)] + ([(new, newp)] if new else []) + [(p3d, list(range(5, n3d - 1))), (pai, list(range(5, nai - 1))), (pall, [len(pall.pages) - 1])])
shutil.copy(A / REF["cv_long"], OUT / "CV_Vitor_Hugo_Long.pdf")
if short:
    shutil.copy(short[0], OUT / "CV_Vitor_Hugo_Short.pdf")
shutil.copy(A / REF["letter"], OUT / "Cover_Letter.pdf")
if newpdf.exists():
    newpdf.unlink()
print("new 3D pages:", len(newp), res)
