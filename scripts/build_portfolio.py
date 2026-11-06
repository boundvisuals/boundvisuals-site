#!/usr/bin/env python3
"""Vítor's CV + portfolio PDFs — his content (docs/cv.yml, docs/ai-portfolio.yml, docs/projects-archive.yml, processed
projects) in a new editorial design (A4 portrait, brand colours, Visby CF). Rebuilt automatically by .github/workflows/portfolio.yml.

usage: build_portfolio.py <out_dir> <assets_dir>
Outputs: CV_Vitor_Hugo_Long.pdf · CV_Vitor_Hugo_Short.pdf · Cover_Letter_EN.pdf · Carta_Apresentacao_PT.pdf · Portfolio_All.pdf · Portfolio_3D_Architecture_Visualization.pdf · Portfolio_AI.pdf
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


Image.MAX_IMAGE_PIXELS = None
HIRES = pathlib.Path(os.environ.get("HIRES_DIR", "hires"))
QMAX = int(os.environ.get("PDF_MAXPX", "3600"))      # long side of every embedded image (HQ: 3600 px ≈ 400+ dpi on A4 width)
SUFFIX = os.environ.get("PDF_SUFFIX", "")
QJPG = int(os.environ.get("PDF_JPGQ", "95"))


def _stem(rel):
    return "_".join(pathlib.Path(rel).with_suffix("").parts).replace(" ", "_")


def _dhash(p):
    im = Image.open(p).convert("L").resize((17, 16), Image.LANCZOS)
    px = list(im.tobytes())
    return sum(1 << i for i in range(256) if px[(i // 16) * 17 + i % 16] > px[(i // 16) * 17 + i % 16 + 1])


_LINKS = None


def _links():
    global _LINKS
    if _LINKS is None:
        _LINKS = []
        for f in A.glob("brand/portfolio-*/package/*/Links/*"):
            if f.suffix.lower() in (".jpg", ".jpeg", ".png", ".tif", ".tiff", ".webp", ".psd"):
                try:
                    _LINKS.append((_dhash(f), Image.open(f).size, f))
                except Exception:
                    pass
    return _LINKS


_ORIG = {}
_MM = None


def _mad(x, y):
    a = Image.open(x).convert("L").resize((64, 64), Image.LANCZOS)
    b = Image.open(y).convert("L").resize((64, 64), Image.LANCZOS)
    return sum(abs(i - j) for i, j in zip(a.tobytes(), b.tobytes())) / 4096


def _media_map():
    """Match each old-portfolio image to its InDesign Link original. One original → at most ONE image (the closest),
    so before/after pairs never collapse into the same 'after' file."""
    global _MM
    if _MM is None:
        best = {}
        for p in M.glob("*.jpg"):
            w, h = Image.open(p).size; r = w / h; hp = _dhash(p)
            c = [(bin(hp ^ lh).count("1"), f) for lh, sz, f in _links() if abs(sz[0] / sz[1] - r) < 0.04 and max(sz) > max(w, h)]
            c = sorted(c, key=lambda x: x[0])[:4]
            sc = sorted((_mad(p, f), f) for d, f in c if d <= 12)
            if sc and sc[0][0] < 1.5:
                best[p.name] = sc[0]
        owner = {}
        for n, (m, f) in best.items():
            if f not in owner or m < best[owner[f]][0]:
                owner[f] = n
        _MM = {n: f for f, n in owner.items()}
    return _MM


def original(p):
    """Full-resolution source of a preview: MEGA finals (hires/<project>/) or the InDesign Links of his 2025 portfolios."""
    p = pathlib.Path(p)
    if p in _ORIG:
        return _ORIG[p]
    best = p
    parts = p.parts
    if "reports" in parts and "preview" in parts:
        pid = parts[parts.index("reports") + 1]
        root = HIRES / pid
        if root.exists():
            for f in root.rglob("*"):
                if f.is_file() and _stem(f.relative_to(root)) == p.stem:
                    best = f; break
    elif "media" in parts:
        best = _media_map().get(p.name, p)
    _ORIG[p] = best
    if best == p:
        print("  low-res (no original found):", p)
    return best


def img(p, maxw=None):
    import io
    src = original(p)
    im = Image.open(src)
    if im.mode in ("RGBA", "LA", "P"):
        im = im.convert("RGBA"); bg = Image.new("RGB", im.size, "white"); bg.paste(im, mask=im.split()[-1]); im = bg
    im = im.convert("RGB")
    lim = QMAX if maxw is None else min(QMAX, max(maxw * 2, 1400))
    if max(im.size) > lim:
        s = lim / max(im.size); im = im.resize((round(im.width * s), round(im.height * s)), Image.LANCZOS)
    # images as files next to the HTML (not base64): far less memory for Chromium on the shared server
    import hashlib
    d = OUT / "_img"; d.mkdir(exist_ok=True)
    fn = d / (hashlib.sha1(f"{src}|{lim}|{QJPG}".encode()).hexdigest()[:16] + ".jpg")
    if not fn.exists():
        im.save(fn, "JPEG", quality=QJPG, subsampling=0, optimize=True)
    return fn.resolve().as_uri()


def ratio(p):
    w, h = Image.open(p).size
    return w / h


# ------------------------------------------------------------------ pieces
# Print-friendly: white pages, black type, no solid fills. Images are NEVER cropped (always whole, aspect kept).
TEL = "tel:" + CV["phone"].replace(" ", "")
SITE = "https://www." + CV["website"]
LINKS = [("Phone", CV["phone"], TEL), ("Email", CV["email"], "mailto:" + CV["email"]), ("Website", CV["website"], SITE),
         ("LinkedIn", "linkedin.com/in/" + CV["linkedin"], "https://www.linkedin.com/in/" + CV["linkedin"]),
         ("Behance", "behance.net/" + CV["behance"], "https://www.behance.net/" + CV["behance"]),
         ("Instagram", CV["instagram"], "https://www.instagram.com/" + CV["instagram"].lstrip("@"))]
FOOT = '<div class="brand"><a href="#top">Vítor Hugo</a> · <a href="' + TEL + '">' + CV["phone"] + '</a> · <a href="mailto:' + CV["email"] + '">' + CV["email"] + '</a></div>'
A_ = lambda lab, href: f'<a href="{href}">{e(lab)}</a>'


def P(cls, body, num=True, sid=""):
    fn = '<div class="fn"></div>' if num else ""
    ida = f' id="{sid}"' if sid else ""
    return f'<section class="pg {cls}"{ida}>{body}{fn}{FOOT}</section>'


def contact_list(sep="<br>"):
    return sep.join(f'<span class="cl">{l}</span> {A_(t, h)}' for l, t, h in LINKS)


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
    im = f'<img class="whole" src="{img(hero, 2200)}">' if hero else ""
    return (f'<section class="pg cover" id="top"><div class="kicker">{"Curriculum Vitae" if kind == "CV" else "Portfolio · " + e(kind)} · 2026</div><h1>Vítor Hugo</h1>'
            f'<p class="tt">{e(CV["title"])}</p><div class="cimg">{im}</div><div class="cf">{contact_list(" &nbsp;·&nbsp; ")}</div></section>')


def about(sid="presentation"):
    pr = "".join(f"<p>{e(x)}</p>" for x in CV["presentation"])
    dl = "".join(f"<li>{e(x)}</li>" for x in CV["deliver"])
    side = (f'<img class="portrait" src="{img(M / "portrait.jpg", 900)}"><div class="nm">{e(CV["name"])}</div><div class="tt">{e(CV["title"])}</div>'
            f'<div class="ci">{e(CV["location"])}<br>{contact_list()}</div>'
            f'<h4>Languages</h4><div class="ci">{"<br>".join(e(x) for x in CV["languages"])}</div>'
            f'<h4>Mobility</h4><div class="ci">{e(CV["mobility"])}</div>')
    return P("about", f'<div class="side">{side}</div><div class="main"><div class="kicker">Presentation</div><h3>Hello — I’m Vítor.</h3>{pr}'
                      f'<h4>What I deliver</h4><ul>{dl}</ul><h4>How I work</h4><p>{e(CV["how_i_work"])}</p></div>', sid=sid)


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
        out.append(P("cvp", f'<div class="kicker">CV</div><h3>{"Professional experience" if i == 0 else "Professional experience (cont.)"}</h3>{"".join(blocks[i:i + per])}',
                     sid="cv" if i == 0 else ""))
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


def recos():
    """ALL recommendations, full text (LinkedIn), paginated by text length so nothing overflows."""
    cards, sizes = [], []
    for r in CV["recommendations"]:
        t = "".join(f"<p>{e(x)}</p>" for x in str(r["text"]).split("\n\n"))
        cards.append(f'<div class="rc">{t}<b>{e(r["who"])}</b><span>{e(r["role"])}</span></div>')
        sizes.append(len(r["text"]) + 260)
    pages, cur, tot = [], [], 0
    for c, s in zip(cards, sizes):
        if cur and tot + s > 4300:
            pages.append(cur); cur, tot = [], 0
        cur.append(c); tot += s
    if cur:
        pages.append(cur)
    out = []
    for i, g in enumerate(pages):
        cols = [g[0::2], g[1::2]]
        body = "".join(f'<div class="col">{"".join(c)}</div>' for c in cols)
        h = "What people I worked with say" if i == 0 else "Recommendations (cont.)"
        out.append(P("reco", f'<div class="kicker">Recommendations · {len(CV["recommendations"])} on LinkedIn</div><h3>{h}</h3><div class="rcs">{body}</div>',
                     sid="recommendations" if i == 0 else ""))
    return out


def divider(title, lead, sid, bgimg=None):
    im = f'<div class="dimg"><img class="whole" src="{img(bgimg, 1800)}"></div>' if bgimg else ""
    return P("divider", f'<div class="kicker">Section</div><h1>{e(title)}</h1><p class="dl">{e(lead)}</p>{im}', sid=sid)


def gallery(title, imgs):
    """Whole images only. Landscapes: stacked full width, as many per page as fit. Portraits: two side by side."""
    W, H = 174.0, 238.0  # usable mm
    pages, cur, used = [], [], 0.0
    land = [x for x in imgs if ratio(x) >= 1.0]
    port = [x for x in imgs if ratio(x) < 1.0]
    for x in land:
        h = W / ratio(x)
        if cur and used + h + 6 > H:
            pages.append(("l", cur)); cur, used = [], 0.0
        cur.append(x); used += h + 6
    if cur:
        pages.append(("l", cur))
    for i in range(0, len(port), 2):
        pages.append(("p", port[i:i + 2]))
    out = []
    for k, g in pages:
        ims = "".join(f'<img src="{img(x)}">' for x in g)
        out.append(P("proj", f'<div class="ptop">{e(title)}</div><div class="g{k} n{len(g)}">{ims}</div>'))
    return out


def project_pages(title, client, year, images, sid=""):
    imgs = list(images)
    land = [x for x in imgs if ratio(x) >= 1.15]
    first = (land or imgs)[0]
    ext = sum(1 for x in imgs if ratio(x) >= 1.15)
    kinds = "exteriors & interiors" if 0 < ext < len(imgs) else ("exteriors" if ext else "interiors")
    facts = [("Client", client or "—"), ("Year", year), ("Images", f"{len(imgs)} · {kinds}"), ("Role", "3D modelling, lighting, render, AI finishing, post")]
    fx = "".join(f'<div><span>{k}</span>{e(v)}</div>' for k, v in facts)
    meta = f'<div class="meta"><h2>{e(title)}</h2><div class="facts">{fx}</div><p class="how">Built in 3ds Max + Corona, then finished with AI (ComfyUI · Nano Banana · SeedVR2 upscale) keeping full coherence between angles.</p></div>'
    out = [P("proj hero", f'<div class="kicker">Project</div>{meta}<img class="whole" src="{img(first, 2400)}">', sid=sid)]
    return out + gallery(title, [x for x in imgs if x != first])


def three_d_pages():
    pages = [divider("3D Architecture Visualization", "Photoreal exteriors and interiors, built in 3ds Max + Corona and finished with AI — full coherence between angles.", "s-3d")]
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
    pages = [divider("AI for Image & Video", AI["sections"][0]["lead"], "s-ai", M / "ai-006-001.jpg")]
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
    rows = "".join(f'<div class="cr"><span>{l}</span>{A_(t, h)}</div>' for l, t, h in LINKS)
    return P("end", f'<div class="kicker">Contact</div><h1>Let’s work together.</h1><p class="tt">{e(CV["name"])} · {e(CV["location"])}</p><div class="crs">{rows}</div>', sid="contact")


def letter_page(L):
    """One-page cover letter (docs/profile.yml → cover_letters with a pdf: key). Placeholders are neutralised for the generic PDF."""
    import datetime, re
    pt = L.get("lang") == "pt"
    t = L["text"].replace("a [Empresa]", "a sua empresa").replace("[Empresa]", "a sua empresa").replace("[Company]", "your team")
    t = re.sub(r"\[[^\]]+\]", "", t)
    paras = [x.strip() for x in t.split("\n\n") if x.strip()]
    sign = paras.pop() if paras and paras[-1].count("\n") >= 1 else ""
    body = ""
    for x in paras:
        lines = x.split("\n")
        if all(l.startswith("•") for l in lines[1:]) and len(lines) > 1:
            body += f'<p>{e(lines[0])}</p><ul>' + "".join(f"<li>{e(l.lstrip('• '))}</li>" for l in lines[1:]) + "</ul>"
        else:
            body += f"<p>{'<br>'.join(e(l) for l in lines)}</p>"
    close = sign.split("\n")[0] if sign else ""
    d = datetime.date.today()
    mpt = ["janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"]
    date = f"{d.day} de {mpt[d.month - 1]} de {d.year}" if pt else d.strftime("%B %-d, %Y")
    head = (f'<div class="lh"><div><h1>Vítor Hugo</h1><div class="tt">{e(CV["title"])}</div></div>'
            f'<div class="ci">{e(CV["location"])}<br>{contact_list()}</div></div>')
    subj = re.sub(r" ?\[[^\]]+\]", "", L.get("subject", "")).rstrip(" —")
    sub = f'<div class="lm"><span>{e(date)}</span><b>{e(subj)}</b></div>'
    sig = f'<div class="sg"><p>{e(close)}</p><div class="s1">Vítor Hugo</div><div class="s2">{e(CV["name"])}</div></div>'
    return P("letter", head + sub + f'<div class="lb">{body}</div>' + sig, num=False, sid="top")


def index_page(entries):
    li = "".join(f'<li><a href="#{sid}">{e(x)}</a><span class="pn">@@{sid}@@</span></li>' for x, sid in entries)
    return P("idx", f'<div class="kicker">Index</div><h3>Contents</h3><ol>{li}</ol>')


CSS = f'''
@font-face{{font-family:V;src:url("file://{FONTS}/VisbyCF-Light.ttf");font-weight:300}}
@font-face{{font-family:V;src:url("file://{FONTS}/VisbyCF-Medium.ttf");font-weight:500}}
@font-face{{font-family:V;src:url("file://{FONTS}/VisbyCF-DemiBold.ttf");font-weight:600}}
@font-face{{font-family:V;src:url("file://{FONTS}/VisbyCF-Bold.ttf");font-weight:700}}
@page{{size:210mm 297mm;margin:0}}*{{box-sizing:border-box}}
body{{margin:0;font-family:V,sans-serif;color:#0b0c0c;counter-reset:pg;background:#fff}}
a{{color:inherit;text-decoration:none}}
.pg{{width:210mm;height:297mm;background:#fff;position:relative;overflow:hidden;page-break-after:always;padding:18mm 18mm 22mm;counter-increment:pg}}
.fn{{position:absolute;right:18mm;bottom:10mm;font-size:8pt;font-weight:500;color:#8f8b82}}.fn::after{{content:counter(pg,decimal-leading-zero)}}
.brand{{position:absolute;left:18mm;bottom:10mm;font-size:7.5pt;letter-spacing:.04em;color:#8f8b82}}
.kicker{{font-size:7.5pt;letter-spacing:.24em;text-transform:uppercase;font-weight:600;color:#8f8b82;margin-bottom:3mm}}
h3{{font-weight:600;font-size:20pt;margin:0 0 7mm;letter-spacing:-.01em}}h4{{font-weight:600;font-size:9pt;letter-spacing:.12em;text-transform:uppercase;margin:7mm 0 2mm}}
p,li{{font-size:9.6pt;line-height:1.55;font-weight:300}}ul{{padding-left:4.5mm;margin:0}}li{{margin:0 0 1.2mm}}
img.whole{{display:block;max-width:100%;height:auto;margin:0 auto}}
.cover h1{{font-weight:700;font-size:58pt;margin:0;letter-spacing:-.025em;line-height:1}}.cover .tt{{font-size:11pt;font-weight:500;margin:4mm 0 10mm}}
.cimg{{height:170mm;display:flex;align-items:center;justify-content:center}}.cimg img{{max-height:170mm;width:auto;max-width:100%}}
.cf{{position:absolute;left:18mm;right:18mm;bottom:18mm;font-size:8pt;line-height:1.9;border-top:.3mm solid #0b0c0c;padding-top:3mm}}.cl{{color:#8f8b82}}
.cover .brand{{display:none}}
.about{{display:grid;grid-template-columns:58mm 1fr;gap:12mm}}.portrait{{width:100%;height:auto;display:block}}
.side .nm{{font-weight:700;font-size:12pt;margin:5mm 0 1mm}}.side .tt{{font-size:8.5pt;font-weight:500;color:#55534e;margin-bottom:3mm}}.ci{{font-size:8.1pt;line-height:1.7;font-weight:300}}
.main h3{{font-size:24pt}}
.job{{display:grid;grid-template-columns:42mm 1fr;gap:6mm;padding:4mm 0;border-top:.3mm solid #c5c1b7}}.jd{{font-size:8.2pt;font-weight:500}}.jd span{{font-weight:300;color:#55534e}}
.jb b{{font-weight:600;font-size:11pt}}.org{{font-size:8.6pt;color:#55534e;margin:.5mm 0 2mm}}.jb li{{font-size:8.8pt;line-height:1.45}}
.ed{{padding:3mm 0;border-top:.3mm solid #c5c1b7}}.ed b{{font-weight:600;font-size:10pt}}.ed div{{font-size:8.6pt;color:#55534e}}
.sks{{display:grid;grid-template-columns:1fr 1fr;gap:4mm 8mm}}.sk b{{font-weight:600;font-size:9pt}}.sk p{{font-size:8.6pt;margin:1mm 0 0}}
.certs{{display:grid;grid-template-columns:1fr 1fr;gap:2.5mm 8mm}}.cert{{border-top:.3mm solid #c5c1b7;padding-top:2mm}}.cert b{{font-weight:600;font-size:8.8pt;display:block}}.cert span{{font-size:8pt;color:#55534e}}
.rcs{{display:grid;grid-template-columns:1fr 1fr;gap:0 8mm}}.rc{{border-top:.3mm solid #c5c1b7;padding:3mm 0 5mm}}.rc p{{font-size:8.1pt;line-height:1.5;margin:0 0 1.6mm}}.rc b{{font-weight:600;font-size:9pt;display:block;margin-top:2mm}}.rc span{{font-size:7.6pt;color:#55534e}}
.divider h1{{font-weight:700;font-size:40pt;margin:60mm 0 5mm;line-height:1.05;letter-spacing:-.02em}}.divider .dl{{font-size:11pt;max-width:150mm;color:#3c3b38}}
.dimg{{margin-top:12mm;height:120mm;display:flex;align-items:flex-start}}.dimg img{{max-height:120mm;width:auto}}
.proj.hero .meta h2{{font-weight:700;font-size:26pt;margin:0 0 2mm;letter-spacing:-.01em}}.meta span{{font-size:9pt;color:#55534e;letter-spacing:.03em}}.proj.hero .meta{{margin-bottom:9mm}}
.facts{{display:grid;grid-template-columns:repeat(4,1fr);gap:4mm;border-top:.3mm solid #0b0c0c;padding-top:3mm;font-size:8.8pt;font-weight:500}}.facts span{{display:block;font-size:6.8pt;letter-spacing:.2em;text-transform:uppercase;color:#8f8b82;margin-bottom:1mm}}.how{{font-size:9pt;color:#3c3b38;margin:4mm 0 0;max-width:150mm}}.proj.hero img.whole{{max-height:175mm;width:auto}}.x{{max-height:205mm;width:auto}}
.ptop{{font-size:8pt;letter-spacing:.2em;text-transform:uppercase;font-weight:600;color:#8f8b82;margin-bottom:6mm}}
.gl{{display:flex;flex-direction:column;gap:6mm}}.gl img{{width:100%;height:auto;display:block}}
.gp{{display:flex;gap:6mm;align-items:flex-start;justify-content:center}}.gp img{{width:calc(50% - 3mm);height:auto;max-height:240mm;object-fit:contain;display:block}}.gp.n1 img{{width:auto;max-width:100%;max-height:240mm}}
.aip.two .ba img{{max-height:80mm}}.gap{{height:7mm}}
.aip .lead{{font-size:10pt;color:#3c3b38;max-width:160mm;margin:-3mm 0 7mm}}
.ba{{display:grid;grid-template-columns:1fr 1fr;gap:5mm;align-items:start}}.ba.one{{grid-template-columns:1fr}}.ba.t3{{grid-template-columns:1fr 1fr 1fr}}
.ba figure{{margin:0;display:flex;flex-direction:column;align-items:center}}.ba img{{max-width:100%;width:auto;height:auto;max-height:150mm;object-fit:contain;display:block}}.ba.one img{{max-height:175mm}}
.ba figcaption{{align-self:flex-start;font-size:7.5pt;letter-spacing:.2em;text-transform:uppercase;font-weight:600;color:#8f8b82;margin-top:2mm}}
.prompt{{margin-top:6mm;padding:1mm 0 1mm 5mm;border-left:.6mm solid #0b0c0c;font-size:8.6pt;line-height:1.5;font-weight:300}}.prompt span{{display:block;font-size:7pt;letter-spacing:.2em;text-transform:uppercase;font-weight:600;color:#8f8b82;margin-bottom:1.5mm}}
.idx ol{{list-style:none;padding:0;margin:0;counter-reset:i}}.idx li{{counter-increment:i;font-size:16pt;font-weight:500;padding:4mm 0;border-top:.3mm solid #c5c1b7;display:flex;gap:8mm}}
.idx li::before{{content:counter(i,decimal-leading-zero);font-size:9pt;color:#8f8b82;padding-top:2mm;width:10mm}}.idx li a{{flex:1}}.pn{{font-size:10pt;color:#8f8b82;padding-top:1.5mm}}.idx li a::after{{content:"  →";color:#8f8b82}}
.end h1{{font-weight:700;font-size:44pt;margin:70mm 0 4mm;letter-spacing:-.02em}}.end .tt{{font-size:11pt;margin-bottom:12mm}}
.letter .lh{{display:flex;justify-content:space-between;align-items:flex-end;gap:10mm;border-bottom:.3mm solid #0b0c0c;padding-bottom:5mm}}.letter h1{{font-weight:700;font-size:30pt;margin:0;letter-spacing:-.02em;line-height:1}}.letter .tt{{font-size:8.6pt;font-weight:500;color:#55534e;margin-top:2mm}}.letter .ci{{font-size:8pt;line-height:1.7;font-weight:300;text-align:right}}
.lm{{display:flex;justify-content:space-between;gap:8mm;margin:7mm 0 6mm;font-size:8.6pt}}.lm span{{color:#8f8b82;order:2;white-space:nowrap}}.lm b{{font-weight:600;font-size:10pt}}
.lb p,.lb li{{font-size:9.4pt;line-height:1.55;margin:0 0 3mm}}.lb ul{{margin:-1mm 0 3mm}}.lb li{{margin:0 0 1mm}}
.sg{{margin-top:4mm}}.sg p{{font-size:9.4pt;font-weight:300;margin:0 0 4mm}}.sg .s1{{font-weight:700;font-size:15pt;letter-spacing:-.01em}}.sg .s2{{font-size:8pt;color:#8f8b82;margin-top:1mm}}
.cr{{display:grid;grid-template-columns:32mm 1fr;padding:3.5mm 0;border-top:.3mm solid #0b0c0c;font-size:12pt;font-weight:500}}.cr span{{font-size:8pt;letter-spacing:.18em;text-transform:uppercase;color:#8f8b82;padding-top:1mm}}
'''


def number_index(pages):
    import re
    out = []
    for p in pages:
        for sid in re.findall(r"@@([\w-]+)@@", p):
            n = next((i + 1 for i, q in enumerate(pages) if f'id="{sid}"' in q), 0)
            p = p.replace(f"@@{sid}@@", f"{n:02d}")
        out.append(p)
    return out


def render(name, pages):
    pages = number_index(pages)
    from playwright.sync_api import sync_playwright
    h = OUT / f"_{name}{SUFFIX}.html"
    h.write_text(f'<!doctype html><html><head><meta charset="utf-8"><style>{CSS}</style></head><body>{"".join(pages)}</body></html>', encoding="utf-8")
    with sync_playwright() as pw:
        low = ["--single-process", "--no-zygote", "--disable-gpu", "--renderer-process-limit=1", "--disable-dev-shm-usage"] if os.environ.get("PW_LOWPROC") else []
        b = pw.chromium.launch(args=low); pg = b.new_page()
        pg.goto(f"file://{h.resolve()}", timeout=0); pg.wait_for_timeout(1500)
        pg.pdf(path=str(OUT / (name.replace(".pdf", SUFFIX + ".pdf"))), width="210mm", height="297mm", print_background=True)
        b.close()
    h.unlink()
    print(name, len(pages), "pages")


cv_long = [cover("CV")] + [about()] + experience_pages() + skills_page(True) + recos() + [back()]
cv_short = [about()] + experience_pages(short=True, tags=["3d", "ai", "ads", "design", "marketing", "web", "video", "photo"])[:1] + skills_page(False)
PROFILE = yaml.safe_load(open("docs/profile.yml", encoding="utf-8")) or {}
for L in PROFILE.get("cover_letters", []):
    if L.get("pdf"):
        render(L["pdf"], [letter_page(L)])
if os.environ.get("ONLY_LETTERS"):   # quick local test of the cover letters
    sys.exit(0)
render("CV_Vitor_Hugo_Long.pdf", cv_long)
render("CV_Vitor_Hugo_Short.pdf", cv_short)
td, ai = three_d_pages(), ai_pages()
intro = [about()] + experience_pages(short=True)[:2] + skills_page(False) + recos()
IX = [("Presentation", "presentation"), ("CV", "cv"), ("Recommendations", "recommendations")]
render("Portfolio_3D_Architecture_Visualization.pdf", [cover("3D Architecture Visualization"), index_page(IX + [("3D Architecture Visualization", "s-3d"), ("Contact", "contact")])] + intro + td + [back()])
render("Portfolio_AI.pdf", [cover("AI"), index_page(IX + [("AI for Image & Video", "s-ai"), ("Contact", "contact")])] + intro + ai + [back()])
render("Portfolio_All.pdf", [cover("All"), index_page(IX + [("3D Architecture Visualization", "s-3d"), ("AI for Image & Video", "s-ai"), ("Contact", "contact")])] + intro + td + ai + [back()])
