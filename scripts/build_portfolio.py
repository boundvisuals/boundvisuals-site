#!/usr/bin/env python3
"""Vítor's CV + portfolio PDFs — his content (docs/cv.yml, docs/ai-portfolio.yml, docs/projects-archive.yml, processed
projects) in a new editorial design (A4 portrait, brand colours, Visby CF). Rebuilt automatically by .github/workflows/portfolio.yml.

usage: build_portfolio.py <out_dir> <assets_dir>
Outputs: CV_Vitor_Hugo_Long.pdf · CV_Vitor_Hugo_Short.pdf · Portfolio_All.pdf · Portfolio_3D_Architecture_Visualization.pdf · Portfolio_AI.pdf
"""
import sys, os, glob, base64, html, pathlib, yaml
from PIL import Image

OUT = pathlib.Path(sys.argv[1]); OUT.mkdir(parents=True, exist_ok=True)
A = pathlib.Path(sys.argv[2])
FONTS = A / "brand/fontes/FONTES/Visby CF"
LOGO = A / "brand/logo/LOGO/SVG/Bound_Visuals_SVG-09.svg"
M = pathlib.Path("docs/cv-source/media")
CV = yaml.safe_load(open("docs/cv.yml", encoding="utf-8"))
AI = yaml.safe_load(open("docs/ai-portfolio.yml", encoding="utf-8"))
ARCH = yaml.safe_load(open("docs/projects-archive.yml", encoding="utf-8")) or []
reg = yaml.safe_load(open("projects/registry.yml")) or {}
reg = reg.get("projects", reg) if isinstance(reg, dict) else reg
crops = list((yaml.safe_load(open("config/crops.yml")) or {}).get("crops", {}))
e = lambda s: html.escape(str(s or ""))


def img(p, maxw=2000):
    p = pathlib.Path(p)
    im = Image.open(p).convert("RGB")
    if max(im.size) > maxw:
        s = maxw / max(im.size); im = im.resize((round(im.width * s), round(im.height * s)), Image.LANCZOS)
    import io
    b = io.BytesIO(); im.save(b, "JPEG", quality=86, optimize=True)
    return "data:image/jpeg;base64," + base64.b64encode(b.getvalue()).decode()


def ratio(p):
    w, h = Image.open(p).size
    return w / h


# ------------------------------------------------------------------ pieces
def P(cls, body, dark=False, num=True):
    fn = '<div class="fn"></div>' if num else ""
    dk = "dark" if dark else ""
    return f'<section class="pg {cls} {dk}">{body}{fn}<div class="brand">Vítor Hugo · Bound Visuals</div></section>'


def cover(kind):
    hero = None
    for p in reg:
        prev = sorted(glob.glob(f"reports/{p['id']}/preview/*.jpg"))
        prev = [x for x in prev if ratio(x) > 1.2 and not os.path.basename(x).startswith("2026_-_FINAIS")]
        if prev and kind != "AI":
            prev.sort(key=lambda x: crops.index(os.path.basename(x)[:-4]) if os.path.basename(x)[:-4] in crops else 999)
            hero = prev[0]; break
    if kind == "AI":
        hero = M / "ai-006-001.jpg"
    bg = f'style="background-image:url({img(hero, 1800)})"' if hero else ""
    return (f'<section class="pg cover" {bg}><div class="shade"></div><div class="ct"><div class="kicker">Portfolio · {e(kind)} · 2026</div>'
            f'<h1>Vítor Hugo</h1><h2>Bound Visuals</h2><p>{e(CV["title"])}</p></div>'
            f'<div class="cf">{e(CV["website"])} · {e(CV["email"])} · {e(CV["phone"])}</div></section>')


def about():
    pr = "".join(f"<p>{e(x)}</p>" for x in CV["presentation"])
    dl = "".join(f"<li>{e(x)}</li>" for x in CV["deliver"])
    side = (f'<img class="portrait" src="{img(M / "portrait.jpg", 700)}"><div class="nm">{e(CV["name"])}</div><div class="tt">{e(CV["title"])}</div>'
            f'<div class="ci">{e(CV["location"])}<br>{e(CV["phone"])}<br>{e(CV["email"])}<br>{e(CV["website"])}<br>LinkedIn / Behance: {e(CV["linkedin"])}</div>'
            f'<h4>Languages</h4><div class="ci">{"<br>".join(e(x) for x in CV["languages"])}</div>'
            f'<h4>Mobility</h4><div class="ci">{e(CV["mobility"])}</div>')
    return P("about", f'<div class="side">{side}</div><div class="main"><div class="kicker">Presentation</div><h3>Hello — I’m Vítor.</h3>{pr}'
                      f'<h4>What I deliver</h4><ul>{dl}</ul><h4>How I work</h4><p>{e(CV["how_i_work"])}</p></div>')


def experience_pages(short=False, tags=None):
    items = CV["experience"]
    if tags:
        items = [x for x in items if set(x.get("tags", [])) & set(tags) or "tech" not in x.get("tags", [])]
    blocks = []
    for x in items:
        bl = x["bullets"][:3] if short else x["bullets"]
        blocks.append(f'<div class="job"><div class="jd">{e(x["dates"])}<br><span>{e(x["place"])}</span></div><div class="jb"><b>{e(x["role"])}</b>'
                      f'<div class="org">{e(x["org"])}</div><ul>{"".join(f"<li>{e(b)}</li>" for b in bl)}</ul></div></div>')
    per = 4 if short else 3
    out = []
    for i in range(0, len(blocks), per):
        out.append(P("cvp", f'<div class="kicker">CV</div><h3>{"Professional experience" if i == 0 else "Professional experience (cont.)"}</h3>{"".join(blocks[i:i + per])}'))
    return out


def skills_page(full=True):
    sk = "".join(f'<div class="sk"><b>{e(k)}</b><p>{e(v)}</p></div>' for k, v in CV["skills"].items())
    ed = "".join(f'<div class="ed"><b>{e(x["course"])}</b><div>{e(x["school"])} · {e(x["dates"])} · {e(x["grade"])}</div></div>' for x in CV["education"])
    body = f'<div class="kicker">CV</div><h3>Education</h3>{ed}<h3 style="margin-top:9mm">Skills & software</h3><div class="sks">{sk}</div>'
    pages = [P("cvp", body)]
    if full:
        ce = "".join(f'<div class="cert"><b>{e(c["name"])}</b><span>{e(c["by"])} · {e(c["date"])}</span></div>' for c in CV["certifications"])
        pj = "".join(f'<div class="ed"><b>{e(p["name"])}</b><div>{e(p["dates"])} · {e(p["what"])}</div></div>' for p in CV["projects"])
        pages.append(P("cvp", f'<div class="kicker">CV</div><h3>Licenses & certifications</h3><div class="certs">{ce}</div><h3 style="margin-top:9mm">Projects & organizations</h3>{pj}'))
    return pages


def recos(n=None):
    rs = CV["recommendations"][:n] if n else CV["recommendations"]
    cards = [f'<div class="rc"><p>“{e(r["text"])}”</p><b>{e(r["who"])}</b><span>{e(r["role"])}</span></div>' for r in rs]
    out = []
    for i in range(0, len(cards), 6):
        out.append(P("reco", f'<div class="kicker">Recommendations</div><h3>What people I worked with say</h3><div class="rcs">{"".join(cards[i:i + 6])}</div>'))
    return out


def divider(title, lead, bgimg=None):
    bg = f'style="background-image:url({img(bgimg, 1800)})"' if bgimg else ""
    return f'<section class="pg divider dark" {bg}><div class="shade"></div><div class="ct"><div class="kicker">Section</div><h1>{e(title)}</h1><p>{e(lead)}</p></div></section>'


def project_pages(title, client, year, images, note=""):
    imgs = list(images)
    land = [x for x in imgs if ratio(x) >= 1.15]
    port = [x for x in imgs if ratio(x) < 1.15]
    meta = f'<div class="meta"><b>{e(title)}</b><span>{("Client: " + e(client) + " · ") if client else ""}{e(year)} · 3D + AI · Vítor Hugo • Bound Visuals</span></div>'
    out = []
    first = (land or port)[0]
    out.append(f'<section class="pg proj hero"><img class="full" src="{img(first)}">{meta}<div class="fn"></div><div class="brand">Vítor Hugo · Bound Visuals</div></section>')
    rest_l = [x for x in land if x != first]
    rest_p = [x for x in port if x != first]
    for i in range(0, len(rest_l), 2):
        g = rest_l[i:i + 2]
        out.append(P("proj", f'<div class="ptop">{e(title)}</div><div class="gl n{len(g)}">{"".join(f"<img src={chr(34)}{img(x)}{chr(34)}>" for x in g)}</div>'))
    for i in range(0, len(rest_p), 2):
        g = rest_p[i:i + 2]
        out.append(P("proj", f'<div class="ptop">{e(title)}</div><div class="gp n{len(g)}">{"".join(f"<img src={chr(34)}{img(x)}{chr(34)}>" for x in g)}</div>'))
    return out


def three_d_pages():
    pages = [divider("3D Architecture Visualization", "Photoreal exteriors and interiors, built in 3ds Max + Corona and finished with AI — full coherence between angles.",
                     None)]
    for p in reg:
        prev = [x for x in sorted(glob.glob(f"reports/{p['id']}/preview/*.jpg")) if not os.path.basename(x).startswith("2026_-_FINAIS")]
        if not prev:
            continue
        prev.sort(key=lambda x: (crops.index(os.path.basename(x)[:-4]) if os.path.basename(x)[:-4] in crops else 999, x))
        pages += project_pages(p.get("title", p["id"]), p.get("client"), p.get("year", 2026), prev)
    for a in ARCH:
        pages += project_pages(a["title"], a.get("client"), a.get("year"), [M / x for x in a["images"]])
    return pages


def ai_pages():
    pages = [divider("AI for Image & Video", AI["sections"][0]["lead"], M / "ai-006-001.jpg")]
    intro = "".join(f'<h4>{e(x["title"])}</h4><p>{e(x["text"])}</p>' for x in AI["intro"])
    pages.append(P("cvp", f'<div class="kicker">AI portfolio</div><h3>How to read this section</h3>{intro}'))
    for s in AI["sections"]:
        blocks = []
        for it in s["items"]:
            if "pair" in it:
                a, b = it["pair"]
                fig = f'<div class="ba"><figure><img src="{img(M / a, 1300)}"><figcaption>Before</figcaption></figure><figure><img src="{img(M / b, 1300)}"><figcaption>After</figcaption></figure></div>'
            elif "triple" in it:
                fig = '<div class="ba t3">' + "".join(f'<figure><img src="{img(M / x, 1100)}"><figcaption>{l}</figcaption></figure>' for x, l in zip(it["triple"], ["Reference", "Before", "After"])) + "</div>"
            else:
                fig = '<div class="ba' + (" one" if len(it["img"]) == 1 else "") + '">' + "".join(f'<figure><img src="{img(M / x, 1500)}"></figure>' for x in it["img"]) + "</div>"
            pr = f'<div class="prompt"><span>Prompt</span>{e(it["prompt"])}</div>' if it.get("prompt") else ""
            blocks.append(fig + pr)
        per = 1 if s["name"] in ("Text to Image", "Workflows", "ControlNET") else 2
        for k, i in enumerate(range(0, len(blocks), per)):
            head = f'<div class="kicker">AI · {e(s["name"])}</div><h3>{e(s["name"])}</h3><p class="lead">{e(s["lead"])}</p>' if k == 0 else f'<div class="ptop">AI · {e(s["name"])}</div>'
            pages.append(P("aip" + (" two" if per == 2 else ""), head + '<div class="gap"></div>'.join(blocks[i:i + per])))
    return pages


def back():
    return (f'<section class="pg cover end"><div class="ct"><div class="kicker">Thank you</div><h1>Let’s work together.</h1><h2>{e(CV["name"])}</h2>'
            f'<p>{e(CV["location"])}<br>{e(CV["phone"])} · {e(CV["email"])}<br>{e(CV["website"])} · LinkedIn / Behance: {e(CV["linkedin"])} · Instagram {e(CV["instagram"])}</p></div></section>')


def index_page(entries):
    li = "".join(f"<li><span>{e(x)}</span></li>" for x in entries)
    return P("idx", f'<div class="kicker">Index</div><h3>Contents</h3><ol>{li}</ol>')


CSS = f'''
@font-face{{font-family:V;src:url("file://{FONTS}/VisbyCF-Light.ttf");font-weight:300}}
@font-face{{font-family:V;src:url("file://{FONTS}/VisbyCF-Medium.ttf");font-weight:500}}
@font-face{{font-family:V;src:url("file://{FONTS}/VisbyCF-DemiBold.ttf");font-weight:600}}
@font-face{{font-family:V;src:url("file://{FONTS}/VisbyCF-Bold.ttf");font-weight:700}}
@page{{size:210mm 297mm;margin:0}}*{{box-sizing:border-box}}
body{{margin:0;font-family:V,sans-serif;color:#0b0c0c;counter-reset:pg}}
.pg{{width:210mm;height:297mm;background:#e5e5e3;position:relative;overflow:hidden;page-break-after:always;padding:20mm 18mm 22mm;counter-increment:pg}}
.pg.dark,.cover{{background:#0b0c0c;color:#e5e5e3}}
.fn{{position:absolute;right:18mm;bottom:10mm;font-size:8pt;font-weight:500;color:#8f8b82}}.fn::after{{content:counter(pg,decimal-leading-zero)}}
.brand{{position:absolute;left:18mm;bottom:10mm;font-size:8pt;letter-spacing:.06em;color:#8f8b82}}
.kicker{{font-size:7.5pt;letter-spacing:.24em;text-transform:uppercase;font-weight:600;color:#8f8b82;margin-bottom:3mm}}
h3{{font-weight:600;font-size:20pt;margin:0 0 7mm;letter-spacing:-.01em}}h4{{font-weight:600;font-size:9pt;letter-spacing:.12em;text-transform:uppercase;margin:7mm 0 2mm}}
p,li{{font-size:9.6pt;line-height:1.55;font-weight:300}}ul{{padding-left:4.5mm;margin:0}}li{{margin:0 0 1.2mm}}
.cover{{background-size:cover;background-position:center;padding:0}}.cover .shade{{position:absolute;inset:0;background:linear-gradient(180deg,rgba(11,12,12,.15),rgba(11,12,12,.25) 45%,rgba(11,12,12,.88))}}
.cover .ct{{position:absolute;left:18mm;right:18mm;bottom:34mm}}.cover h1{{font-weight:700;font-size:54pt;margin:0;letter-spacing:-.02em;line-height:1}}
.cover h2{{font-weight:300;font-size:26pt;margin:2mm 0 8mm;color:#c5c1b7}}.cover p{{font-size:11pt;color:#e5e5e3;max-width:150mm}}.cover .kicker{{color:#c5c1b7}}
.cf{{position:absolute;left:18mm;bottom:14mm;font-size:8.5pt;letter-spacing:.06em;color:#c5c1b7}}
.cover.end{{background:#0b0c0c}}.cover.end .ct{{bottom:auto;top:110mm}}.cover.end h1{{font-size:38pt}}.cover.end h2{{font-size:16pt}}.cover.end p{{color:#c5c1b7;font-size:10pt;line-height:1.8}}
.about{{display:grid;grid-template-columns:58mm 1fr;gap:12mm}}.portrait{{width:100%;aspect-ratio:4/5;object-fit:cover;filter:grayscale(.15)}}
.side .nm{{font-weight:700;font-size:12pt;margin:5mm 0 1mm}}.side .tt{{font-size:8.5pt;font-weight:500;color:#55534e}}.ci{{font-size:8.3pt;line-height:1.6;font-weight:300}}
.main h3{{font-size:24pt}}
.job{{display:grid;grid-template-columns:42mm 1fr;gap:6mm;padding:4mm 0;border-top:.3mm solid #c5c1b7}}.jd{{font-size:8.2pt;font-weight:500}}.jd span{{font-weight:300;color:#55534e}}
.jb b{{font-weight:600;font-size:11pt}}.org{{font-size:8.6pt;color:#55534e;margin:.5mm 0 2mm}}.jb li{{font-size:8.8pt;line-height:1.45}}
.ed{{padding:3mm 0;border-top:.3mm solid #c5c1b7}}.ed b{{font-weight:600;font-size:10pt}}.ed div{{font-size:8.6pt;color:#55534e}}
.sks{{display:grid;grid-template-columns:1fr 1fr;gap:4mm 8mm}}.sk b{{font-weight:600;font-size:9pt}}.sk p{{font-size:8.6pt;margin:1mm 0 0}}
.certs{{display:grid;grid-template-columns:1fr 1fr;gap:2.5mm 8mm}}.cert{{border-top:.3mm solid #c5c1b7;padding-top:2mm}}.cert b{{font-weight:600;font-size:8.8pt;display:block}}.cert span{{font-size:8pt;color:#55534e}}
.rcs{{display:grid;grid-template-columns:1fr 1fr;gap:6mm 8mm}}.rc{{border-top:.3mm solid #c5c1b7;padding-top:3mm}}.rc p{{font-size:8.4pt;font-style:normal;margin:0 0 2mm}}.rc b{{font-weight:600;font-size:9pt;display:block}}.rc span{{font-size:7.8pt;color:#55534e}}
.divider{{background-size:cover;background-position:center;padding:0}}.divider .shade{{position:absolute;inset:0;background:linear-gradient(180deg,rgba(11,12,12,.35),rgba(11,12,12,.9))}}
.divider .ct{{position:absolute;left:18mm;right:18mm;bottom:40mm}}.divider h1{{font-weight:700;font-size:36pt;margin:0 0 5mm;line-height:1.05}}.divider p{{color:#c5c1b7;font-size:11pt;max-width:150mm}}
.proj.hero{{padding:0;background:#0b0c0c;color:#e5e5e3}}.proj.hero .full{{width:100%;height:205mm;object-fit:cover;display:block}}
.proj.hero .meta{{padding:12mm 18mm}}.meta b{{display:block;font-weight:700;font-size:24pt;margin-bottom:2mm}}.meta span{{font-size:9pt;color:#c5c1b7;letter-spacing:.04em}}
.ptop{{font-size:8pt;letter-spacing:.2em;text-transform:uppercase;font-weight:600;color:#8f8b82;margin-bottom:6mm}}
.gl{{display:grid;gap:6mm}}.gl img{{width:100%;height:118mm;object-fit:cover;display:block}}.gl.n1 img{{height:180mm}}
.gp{{display:grid;grid-template-columns:1fr 1fr;gap:6mm}}.gp img{{width:100%;height:225mm;object-fit:cover;display:block}}.gp.n1{{grid-template-columns:1fr}}.gp.n1 img{{height:235mm}}
.aip.two .ba img{{max-height:78mm}}.gap{{height:7mm}}
.aip .lead{{font-size:10pt;color:#3c3b38;max-width:160mm;margin:-3mm 0 7mm}}
.ba{{display:grid;grid-template-columns:1fr 1fr;gap:5mm}}.ba.one{{grid-template-columns:1fr}}.ba.t3{{grid-template-columns:1fr 1fr 1fr}}
.ba figure{{margin:0}}.ba img{{width:100%;max-height:150mm;object-fit:cover;display:block}}.ba.one img{{max-height:175mm}}
.ba figcaption{{font-size:7.5pt;letter-spacing:.2em;text-transform:uppercase;font-weight:600;color:#8f8b82;margin-top:2mm}}
.prompt{{margin-top:6mm;padding:4mm 5mm;background:#dcdcd8;font-size:8.6pt;line-height:1.5;font-weight:300}}.prompt span{{display:block;font-size:7pt;letter-spacing:.2em;text-transform:uppercase;font-weight:600;color:#8f8b82;margin-bottom:1.5mm}}
.idx ol{{list-style:none;padding:0;margin:0;counter-reset:i}}.idx li{{counter-increment:i;font-size:16pt;font-weight:500;padding:4mm 0;border-top:.3mm solid #c5c1b7;display:flex;gap:8mm}}
.idx li::before{{content:counter(i,decimal-leading-zero);font-size:9pt;color:#8f8b82;padding-top:2mm;width:10mm}}
'''


def render(name, pages):
    from playwright.sync_api import sync_playwright
    h = OUT / f"_{name}.html"
    h.write_text(f'<!doctype html><html><head><meta charset="utf-8"><style>{CSS}</style></head><body>{"".join(pages)}</body></html>', encoding="utf-8")
    with sync_playwright() as pw:
        b = pw.chromium.launch(); pg = b.new_page()
        pg.goto(f"file://{h.resolve()}"); pg.wait_for_timeout(800)
        pg.pdf(path=str(OUT / name), width="210mm", height="297mm", print_background=True)
        b.close()
    h.unlink()
    print(name, len(pages), "pages")


cv_long = [about()] + experience_pages() + skills_page(True) + recos()
cv_short = [about()] + experience_pages(short=True, tags=["3d", "ai", "ads", "design", "marketing", "web", "video", "photo"])[:1] + skills_page(False)
render("CV_Vitor_Hugo_Long.pdf", cv_long)
render("CV_Vitor_Hugo_Short.pdf", cv_short)
td, ai = three_d_pages(), ai_pages()
intro_short = [about()] + experience_pages(short=True)[:2] + skills_page(False) + recos(6)
render("Portfolio_3D_Architecture_Visualization.pdf", [cover("3D Architecture Visualization"), index_page(["Presentation", "CV", "Recommendations", "3D Architecture Visualization", "Contact"])] + intro_short + td + [back()])
render("Portfolio_AI.pdf", [cover("AI"), index_page(["Presentation", "CV", "Recommendations", "AI for Image & Video", "Contact"])] + intro_short + ai + [back()])
render("Portfolio_All.pdf", [cover("All"), index_page(["Presentation", "CV", "Recommendations", "3D Architecture Visualization", "AI for Image & Video", "Contact"])] + intro_short + td + ai + [back()])
