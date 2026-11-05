#!/usr/bin/env python3
"""Vítor Hugo's personal site (boundvisuals.com/vitorhugo) — static, lean, print-white editorial.
Everything 3D Architecture links to boundvisuals.com; this site holds AI, Ads, Design, Video, Lab, CV.
Two languages: EN at /vitorhugo/ and PT at /vitorhugo/pt/ (texts in docs/vitorhugo-pt.yml; missing PT keys fall back to EN).
usage: build_vitorhugo.py <out_dir> <assets_dir>     (deployed by .github/workflows/portfolio.yml)
"""
import sys, pathlib, shutil, html, yaml, glob, os
from PIL import Image

OUT = pathlib.Path(sys.argv[1]); A = pathlib.Path(sys.argv[2])
(OUT / "i").mkdir(parents=True, exist_ok=True); (OUT / "f").mkdir(exist_ok=True); (OUT / "pt").mkdir(exist_ok=True)
M = pathlib.Path("docs/cv-source/media")
CV = yaml.safe_load(open("docs/cv.yml", encoding="utf-8"))
AI = yaml.safe_load(open("docs/ai-portfolio.yml", encoding="utf-8"))
PT = yaml.safe_load(open("docs/vitorhugo-pt.yml", encoding="utf-8")) if os.path.exists("docs/vitorhugo-pt.yml") else {}
reg = yaml.safe_load(open("projects/registry.yml")) or {}
reg = reg.get("projects", reg) if isinstance(reg, dict) else reg
e = lambda s: html.escape(str(s or ""))
BV = "https://www.boundvisuals.com"
TEL = "tel:" + CV["phone"].replace(" ", "")
_cache = {}


def pic(src, w=1600):
    """Whole image (never cropped), resized, progressive JPEG. Returns (url, w, h). Each file is written once."""
    key = (str(src), w)
    if key in _cache:
        return _cache[key]
    src = pathlib.Path(src); name = src.stem[:60] + ".jpg"
    im = Image.open(src).convert("RGB")
    if im.width > w:
        im = im.resize((w, round(im.height * w / im.width)), Image.LANCZOS)
    im.save(OUT / "i" / name, "JPEG", quality=84, optimize=True, progressive=True)
    _cache[key] = (f"i/{name}", im.width, im.height)
    return _cache[key]


def tag(src, alt, w=1600, cls=""):
    u, W, H = pic(src, w)
    return f'<img src="{u}" width="{W}" height="{H}" alt="{e(alt)}" loading="lazy" decoding="async" class="{cls}">'


for f in ["Light", "Medium", "DemiBold", "Bold"]:
    s = A / f"brand/fontes/FONTES/Visby CF/VisbyCF-{f}.woff2"
    if s.exists():
        shutil.copy(s, OUT / "f" / s.name)

EN = {
    "title": "Vítor Hugo — AI Image & Video · 3D Artist · Performance Ads",
    "description": "Vítor Hugo — 3D artist and AI image & video specialist in Portugal. AI characters, products and spaces, performance ads, design and video. 3D architecture at Bound Visuals.",
    "nav": {"work": "Work", "ai": "AI", "about": "About", "contact": "Contact"},
    "where": "Portugal · available worldwide",
    "lead": "I make images and films that didn’t exist yesterday — with 3D, AI and a designer’s eye.",
    "ticker": "AI Image & Video · 3D Architecture · Performance Ads · Design · Video · ComfyUI · Seedance · Kling · Veo · Nano Banana · Unreal · Corona",
    "work_k": "What I do", "work_h": "One person,<br>five disciplines.",
    "disc": [["AI Image & Video", "Photoreal characters, products and spaces. Lip-sync, motion, consistency across shots. ComfyUI · Seedance · Kling · Veo · Nano Banana."],
             ["3D Architecture", "Photoreal archviz — exteriors, interiors, animation. Lives at my 3D studio, Bound Visuals."],
             ["Performance Ads", "Multi-format ad creative (1:1, 9:16, 16:9), UGC and AI avatars, speed-to-creative, data-guided iteration."],
             ["Design & Video", "Brand, layout, motion, editing and sound. From the idea to the delivered file."],
             ["Lab", "Daily Study — a small 3D + AI piece, three times a week, in public."]],
    "ai_k": "AI Image & Video", "ai_h": "From text, image<br>and 3D to final.",
    "before": "Before", "after": "After", "reference": "Reference", "ai_sections": {},
    "arch_k": "3D Architecture · Bound Visuals", "arch_h": "Architecture lives<br>at my 3D studio.", "arch_btn": "See all 3D work at boundvisuals.com ↗",
    "ads_k": "Performance Ads · Design · Video", "ads_h": "Creative that<br>performs.", "deliver": CV["deliver"],
    "lab_h": "Daily Study.", "lab_p": "A real mini 3D project, three times a week: a near-ready model, my cameras and light, a basic render — then AI and edit. Simple, beautiful, in public.",
    "lab_btn": "Follow on Instagram ↗", "about_k": "About", "about_h": "Hello —<br>I’m Vítor.",
    "presentation": CV["presentation"][0], "how_i_work": CV["how_i_work"], "exp_k": "Experience",
    "experience": [[x["dates"], x["role"], x["org"]] for x in CV["experience"][:6]],
    "docs_k": "CV & portfolios", "docs": ["CV — long", "CV — short", "Portfolio — All", "Portfolio — 3D Architecture", "Portfolio — AI"],
    "recos_k": "Recommendations · {n} on LinkedIn", "recos_h": "What people say.",
    "contact_k": "Contact", "contact_big": "Let’s make<br>something new.",
    "contact_labels": ["Phone", "Email", "LinkedIn", "Behance", "Instagram", "3D studio"],
    "footer_bv": "3D studio → Bound Visuals ↗",
}
DOC_FILES = ["CV_Vitor_Hugo_Long.pdf", "CV_Vitor_Hugo_Short.pdf", "Portfolio_All.pdf", "Portfolio_3D_Architecture_Visualization.pdf", "Portfolio_AI.pdf"]

HIRES = pathlib.Path(os.environ.get("HIRES_DIR", "hires"))
(OUT / "v").mkdir(exist_ok=True)


def _stem(rel):
    return "_".join(pathlib.Path(rel).with_suffix("").parts).replace(" ", "_")


def best_src(prev, pid):
    root = HIRES / pid
    if root.exists():
        for f in root.rglob("*"):
            if f.is_file() and _stem(f.relative_to(root)) == pathlib.Path(prev).stem:
                return f
    return pathlib.Path(prev)


try:
    CROPORDER = list(((yaml.safe_load(open("config/crops.yml")) or {}).get("crops") or {}).keys())
except Exception:
    CROPORDER = []


def web_reel(pid):
    import subprocess
    reels = sorted(glob.glob(f"reports/{pid}/reel/*.mp4"))
    if not reels or not shutil.which("ffmpeg"):
        return None
    out = OUT / "v" / f"{pid}.mp4"; poster = OUT / "v" / f"{pid}.jpg"
    if not out.exists():
        subprocess.run(["ffmpeg", "-y", "-loglevel", "error", "-i", reels[0], "-t", "30", "-vf", "scale=720:-2", "-c:v", "libx264", "-preset", "veryfast", "-crf", "24",
                        "-pix_fmt", "yuv420p", "-an", "-movflags", "+faststart", str(out)], check=False)
        subprocess.run(["ffmpeg", "-y", "-loglevel", "error", "-ss", "1", "-i", str(out), "-frames:v", "1", "-q:v", "3", str(poster)], check=False)
    return (f"v/{pid}.mp4", f"v/{pid}.jpg") if out.exists() else None


import re as _re
STUDIES = _re.findall(r"^## (#\d{3}) · ([^(\n]+)", open("docs/daily-study-briefings.md", encoding="utf-8").read(), _re.M)[:8] if os.path.exists("docs/daily-study-briefings.md") else []
PROJ = []
for p in reg:
    prev = [x for x in sorted(glob.glob(f"reports/{p['id']}/preview/*.jpg")) if not os.path.basename(x).startswith("2026_-_FINAIS")]
    if not prev:
        continue
    prev.sort(key=lambda x: (CROPORDER.index(pathlib.Path(x).stem) if pathlib.Path(x).stem in CROPORDER else 999, x))
    land = [x for x in prev if Image.open(x).width / Image.open(x).height > 1.2]
    if land:
        prev.remove(land[0]); prev.insert(0, land[0])
    PROJ.append({"id": p["id"], "title": p.get("title", p["id"]), "client": p.get("client"), "year": p.get("year"),
                 "imgs": [best_src(x, p["id"]) for x in prev], "reel": web_reel(p["id"])})

archi_src = []
for p in reg:
    prev = [x for x in sorted(glob.glob(f"reports/{p['id']}/preview/*.jpg")) if not os.path.basename(x).startswith("2026_-_FINAIS")]
    land = [x for x in prev if Image.open(x).width / Image.open(x).height > 1.2]
    if land:
        archi_src.append((land[0], p.get("title", p["id"])))


def build(lang):
    T = dict(EN)
    if lang == "pt":
        T.update({k: v for k, v in PT.items() if v})
    pre = "../" if lang == "pt" else ""
    projs = []
    for P in PROJ:
        meta = " · ".join(x for x in [str(P["client"] or ""), str(P["year"] or ""), "3D + AI", f'{len(P["imgs"])} {T.get("images", "images")}'] if x)
        strip = ""
        if P["reel"]:
            strip += f'<video src="{pre}{P["reel"][0]}" poster="{pre}{P["reel"][1]}" muted loop playsinline autoplay preload="none" aria-label="Reel {e(P["title"])}"></video>'
        strip += "".join(tag(x, P["title"], 2400) for x in P["imgs"])
        projs.append(f'<article class="proj"><div class="ph"><h3>{e(P["title"])}</h3><span>{e(meta)}</span></div><div class="strip">{strip}</div></article>')
    hero_src = PROJ[0]["imgs"][0] if PROJ else M / "portrait.jpg"
    archi = "".join(f'<a class="tile" href="{BV}" target="_blank" rel="noopener">{tag(src, t, 1000)}<span>{e(t)} ↗</span></a>' for src, t in archi_src)
    exp = "".join(f'<li><span class="d">{e(d)}</span><b>{e(r)}</b><span class="o">{e(o)}</span></li>' for d, r, o in T["experience"])
    recos = "".join(f'<blockquote><p>“{e(str(r["text"]).split(chr(10))[0])}”</p><cite><b>{e(r["who"])}</b> {e(r["role"])}</cite></blockquote>' for r in CV["recommendations"])
    dl = "".join(f'<a href="files/{f}" target="_blank" rel="noopener">{e(t)} <i>PDF ↓</i></a>' for t, f in zip(T["docs"], DOC_FILES))
    lab = T["contact_labels"]
    links = [(lab[0], CV["phone"], TEL), (lab[1], CV["email"], "mailto:" + CV["email"]),
             (lab[2], "criativovitorhugo", "https://www.linkedin.com/in/" + CV["linkedin"]),
             (lab[3], "criativovitorhugo", "https://www.behance.net/" + CV["behance"]),
             (lab[4], CV["instagram"], "https://www.instagram.com/" + CV["instagram"].lstrip("@")),
             (lab[5], "boundvisuals.com", BV)]
    contact = "".join(f'<a href="{h}"><span>{l}</span>{e(t)}</a>' for l, t, h in links)
    hero_img = tag(hero_src, "Vítor Hugo — 3D + AI", 2800, "heroimg").replace("loading=\"lazy\"", "fetchpriority=\"high\"")
    portrait = tag(M / "portrait.jpg", "Vítor Hugo", 600, "portrait")
    hrefs = ["#projects", BV, "#ads", "#ads", "#lab"]
    dhtml = "".join(f'<a class="disc" href="{h}"{" target=_blank rel=noopener" if h.startswith("http") else ""}><span class="n">0{i+1}</span><b>{e(t)}{" ↗" if h.startswith("http") else ""}</b><p>{e(d)}</p></a>'
                    for i, ((t, d), h) in enumerate(zip(T["disc"], hrefs)))
    ads_list = "".join(f"<li>{e(x)}</li>" for x in T["deliver"])
    N = T["nav"]
    ig = CV["instagram"].lstrip("@")
    other = ("PT", "pt/", "pt-PT") if lang == "en" else ("EN", "../", "en")
    tick = (T["ticker"] + " · &nbsp;") * 2
    page = f'''<!doctype html><html lang="{"pt-PT" if lang == "pt" else "en"}"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>{e(T["title"])}</title>
<meta name="description" content="{e(T["description"])}">
<meta name="robots" content="noindex">
<link rel="canonical" href="{BV}/vitorhugo/{"pt/" if lang == "pt" else ""}">
<link rel="alternate" hreflang="en" href="{BV}/vitorhugo/"><link rel="alternate" hreflang="pt-PT" href="{BV}/vitorhugo/pt/"><link rel="alternate" hreflang="x-default" href="{BV}/vitorhugo/">
<meta property="og:title" content="{e(T["title"])}"><meta property="og:image" content="{BV}/vitorhugo/{pic(hero_src, 2800)[0]}">
<script type="application/ld+json">{{"@context":"https://schema.org","@type":"Person","name":"Vítor Hugo","jobTitle":"3D Artist · AI Image & Video Specialist","url":"{BV}/vitorhugo/","email":"{CV["email"]}","telephone":"{CV["phone"]}","sameAs":["https://www.linkedin.com/in/{CV["linkedin"]}","https://www.behance.net/{CV["behance"]}","https://www.instagram.com/{ig}","{BV}"]}}</script>
<style>
@font-face{{font-family:V;src:url(f/VisbyCF-Light.woff2) format("woff2");font-weight:300;font-display:swap}}
@font-face{{font-family:V;src:url(f/VisbyCF-Medium.woff2) format("woff2");font-weight:500;font-display:swap}}
@font-face{{font-family:V;src:url(f/VisbyCF-DemiBold.woff2) format("woff2");font-weight:600;font-display:swap}}
@font-face{{font-family:V;src:url(f/VisbyCF-Bold.woff2) format("woff2");font-weight:700;font-display:swap}}
:root{{--ink:#0b0c0c;--mute:#8f8b82;--line:#d9d6cf;--bg:#fff;--g:max(20px,4vw)}}
*{{box-sizing:border-box}}html{{scroll-behavior:smooth}}body{{margin:0;background:var(--bg);color:var(--ink);font:300 17px/1.55 V,"Helvetica Neue",Arial,sans-serif;-webkit-font-smoothing:antialiased}}
a{{color:inherit;text-decoration:none}}img{{display:block;max-width:100%;height:auto}}
.w{{padding-inline:var(--g);max-width:1600px;margin:0 auto}}
header{{position:sticky;top:0;z-index:9;background:rgba(255,255,255,.88);backdrop-filter:blur(12px);border-bottom:1px solid var(--line)}}
header .w{{display:flex;justify-content:space-between;align-items:center;height:58px;gap:20px}}header b{{font-weight:700;letter-spacing:-.01em}}
nav{{display:flex;gap:22px;font-size:14px;font-weight:500}}nav a:hover{{color:var(--mute)}}@media(max-width:760px){{nav a.h{{display:none}}}}
.k{{font-size:12px;letter-spacing:.22em;text-transform:uppercase;font-weight:600;color:var(--mute)}}
.hero{{padding-block:8vh 5vh;display:grid;grid-template-columns:1.4fr 1fr;gap:5vw;align-items:end}}@media(max-width:900px){{.hero{{grid-template-columns:1fr}}}}
h1{{font-weight:700;font-size:clamp(56px,11vw,190px);line-height:.88;letter-spacing:-.045em;margin:18px 0 26px}}
.lead{{font-size:clamp(19px,1.8vw,26px);font-weight:500;line-height:1.3;max-width:24ch;margin:0}}
.heroimg{{width:100%;height:auto}}.herof{{padding-inline:var(--g);max-width:2000px;margin:0 auto}}
.proj{{padding-block:7vh 0}}.ph{{display:flex;justify-content:space-between;align-items:baseline;gap:20px;flex-wrap:wrap;padding-inline:var(--g);max-width:1600px;margin:0 auto 22px;border-top:1px solid var(--ink);padding-top:16px}}
.ph h3{{font-weight:700;font-size:clamp(26px,3.2vw,48px);letter-spacing:-.03em;margin:0}}.ph span{{color:var(--mute);font-size:14px;font-weight:500;letter-spacing:.04em}}
.strip{{display:flex;gap:14px;overflow-x:auto;scroll-snap-type:x proximity;padding-inline:var(--g);scrollbar-width:thin;padding-bottom:10px}}
.strip img,.strip video{{height:min(72vh,780px);width:auto;max-width:none;flex:none;scroll-snap-align:start;background:#f2f1ee}}
.strip video{{aspect-ratio:9/16}}@media(max-width:760px){{.strip img,.strip video{{height:52vh}}}}
.tick{{border-block:1px solid var(--ink);overflow:hidden;white-space:nowrap;font-weight:600;font-size:clamp(18px,2.2vw,30px);padding:14px 0;margin-top:6vh}}
.tick div{{display:inline-block;animation:t 38s linear infinite}}@keyframes t{{to{{transform:translateX(-50%)}}}}@media(prefers-reduced-motion:reduce){{.tick div{{animation:none}}}}
section{{padding-block:12vh 0}}h2{{font-weight:700;font-size:clamp(38px,6vw,96px);letter-spacing:-.035em;line-height:.95;margin:12px 0 5vh}}
.discs{{border-top:1px solid var(--ink)}}.disc{{display:grid;grid-template-columns:70px 1fr 1.2fr;gap:20px;padding:26px 0;border-bottom:1px solid var(--line);transition:padding .25s}}
.disc:hover{{padding-left:14px}}.disc b{{font-weight:600;font-size:clamp(22px,2.6vw,38px);letter-spacing:-.02em;line-height:1.05}}.disc p{{margin:4px 0 0;color:#3c3b38}}.disc .n{{color:var(--mute);font-weight:500;padding-top:8px}}
@media(max-width:760px){{.disc{{grid-template-columns:44px 1fr}}.disc p{{grid-column:2}}}}
.aisec{{display:grid;grid-template-columns:minmax(220px,1fr) 2.6fr;gap:4vw;padding:6vh 0;border-top:1px solid var(--line)}}@media(max-width:900px){{.aisec{{grid-template-columns:1fr}}}}
.aih h3{{font-weight:600;font-size:28px;letter-spacing:-.02em;margin:0 0 10px;position:sticky;top:80px}}.aih p{{color:#3c3b38;font-size:15px;margin:0}}
.aig{{columns:2 320px;column-gap:16px}}.aig figure{{margin:0 0 16px;break-inside:avoid}}
.ba{{display:grid;grid-template-columns:1fr 1fr;gap:6px;align-items:start}}.ba.t3{{grid-template-columns:1fr 1fr 1fr}}.ba figcaption{{display:contents}}.ba figcaption span{{font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:var(--mute);font-weight:600}}
.tiles{{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:16px}}.tile span{{display:block;font-weight:600;margin-top:10px}}.tile img{{transition:opacity .3s}}.tile:hover img{{opacity:.85}}
.btn{{display:inline-flex;gap:10px;border:1px solid var(--ink);padding:14px 22px;font-weight:600;margin-top:28px}}.btn:hover{{background:var(--ink);color:#fff}}
.two{{display:grid;grid-template-columns:1fr 1fr;gap:5vw}}@media(max-width:900px){{.two{{grid-template-columns:1fr}}}}
ul.x{{padding:0;list-style:none;margin:0}}ul.x li{{padding:16px 0;border-top:1px solid var(--line)}}
.exp li{{display:grid;grid-template-columns:150px 1fr;gap:4px 20px;padding:14px 0;border-top:1px solid var(--line);list-style:none}}.exp{{padding:0;margin:0}}.exp .d{{color:var(--mute);font-size:14px;grid-row:span 2}}.exp .o{{color:#3c3b38;font-size:15px}}
.portrait{{width:160px;filter:grayscale(1);margin-bottom:22px}}
.q{{display:flex;gap:16px;overflow-x:auto;scroll-snap-type:x mandatory;padding-bottom:12px}}blockquote{{flex:0 0 min(420px,85vw);margin:0;border-top:1px solid var(--ink);padding-top:16px;scroll-snap-align:start}}
blockquote p{{font-size:16px;margin:0 0 14px}}cite{{font-style:normal;font-size:13px;color:#3c3b38}}cite b{{display:block;color:var(--ink);font-weight:600;font-size:15px}}
.docs a,.contact a{{display:flex;justify-content:space-between;padding:18px 0;border-top:1px solid var(--line);font-weight:500;font-size:clamp(18px,1.6vw,22px)}}.docs a:hover,.contact a:hover{{padding-left:10px}}.docs i{{font-style:normal;color:var(--mute);font-size:14px}}
.contact a span{{color:var(--mute);font-size:13px;letter-spacing:.18em;text-transform:uppercase;font-weight:600;align-self:center}}
.big{{font-weight:700;font-size:clamp(48px,9vw,150px);letter-spacing:-.045em;line-height:.9;margin:0 0 6vh}}
footer{{padding-block:10vh 40px;font-size:13px;color:var(--mute);display:flex;justify-content:space-between;flex-wrap:wrap;gap:10px}}
.studies{{margin-top:24px}}.studies li{{display:flex;gap:16px;font-weight:500}}.studies span{{color:var(--mute);min-width:48px}}
.lang{{color:var(--mute);font-weight:600;letter-spacing:.08em}}.lang:hover{{color:var(--ink)}}</style></head><body>
<header><div class="w"><b>Vítor Hugo</b><nav><a class="h" href="#work">{N["work"]}</a><a class="h" href="#projects">{T.get("nav_proj", "Projects")}</a><a href="{BV}" target="_blank" rel="noopener">3D ↗</a><a class="h" href="#about">{N["about"]}</a><a href="#contact">{N["contact"]}</a><a class="lang" href="{other[1]}" hreflang="{other[2]}" lang="{other[2]}">{other[0]}</a></nav></div></header>
<main>
<div class="w hero"><div><div class="k">{e(T["where"])}</div><h1>Vítor Hugo</h1></div><p class="lead">{e(T["lead"])}</p></div><div class="herof">{hero_img}</div>
<div class="tick"><div>{tick}</div></div>
<section class="w" id="work"><div class="k">{e(T["work_k"])}</div><h2>{T["work_h"]}</h2><div class="discs">{dhtml}</div></section>
<section id="projects"><div class="w"><div class="k">{e(T.get("proj_k", "Selected work · 2026"))}</div><h2>{T.get("proj_h", "Recent projects,<br>3D + AI.")}</h2></div>{"".join(projs)}</section>
<div class="w"><a class="btn" href="{BV}" target="_blank" rel="noopener">{e(T["arch_btn"])}</a></div>
<section class="w two" id="ads"><div><div class="k">{e(T["ads_k"])}</div><h2>{T["ads_h"]}</h2></div><ul class="x">{ads_list}</ul></section>
<section class="w two" id="lab"><div><div class="k">Lab</div><h2>{e(T["lab_h"])}</h2></div><div><p class="lead" style="max-width:none">{e(T["lab_p"])}</p><ul class="x studies">{"".join(f'<li><span>{n}</span>{e(t.strip())}</li>' for n, t in STUDIES)}</ul><a class="btn" href="https://www.instagram.com/{ig}" target="_blank" rel="noopener">{e(T["lab_btn"])}</a></div></section>
<section class="w two" id="about"><div>{portrait}<div class="k">{e(T["about_k"])}</div><h2>{T["about_h"]}</h2><p>{e(T["presentation"])}</p><p>{e(T["how_i_work"])}</p></div><div><div class="k" style="margin-bottom:14px">{e(T["exp_k"])}</div><ul class="exp">{exp}</ul><div class="docs" style="margin-top:6vh"><div class="k" style="margin-bottom:14px">{e(T["docs_k"])}</div>{dl}</div></div></section>
<section class="w"><div class="k">{e(T["recos_k"].format(n=len(CV["recommendations"])))}</div><h2>{e(T["recos_h"])}</h2><div class="q">{recos}</div></section>
<section class="w" id="contact"><div class="k">{e(T["contact_k"])}</div><p class="big">{T["contact_big"]}</p><div class="contact">{contact}</div></section>
</main>
<footer class="w"><span>© 2026 Vítor Hugo</span><a href="{BV}" target="_blank" rel="noopener">{e(T["footer_bv"])}</a></footer>
</body></html>'''
    if pre:
        page = page.replace('src="i/', f'src="{pre}i/').replace('url(f/', f'url({pre}f/').replace('href="files/', f'href="{pre}files/')
    return page


(OUT / "index.html").write_text(build("en"), encoding="utf-8")
(OUT / "pt" / "index.html").write_text(build("pt"), encoding="utf-8")
print("site ok (en + pt)", len(list((OUT / "i").iterdir())), "images")
