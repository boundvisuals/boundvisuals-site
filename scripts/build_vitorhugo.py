#!/usr/bin/env python3
"""Vítor Hugo's personal site (boundvisuals.com/vitorhugo) — static, lean, print-white editorial.
Everything 3D Architecture links to boundvisuals.com; this site holds AI, Ads, Design, Video, Lab, CV.
usage: build_vitorhugo.py <out_dir> <assets_dir>     (deployed by .github/workflows/vitorhugo.yml)
"""
import sys, pathlib, shutil, html, yaml, glob, os
from PIL import Image

OUT = pathlib.Path(sys.argv[1]); A = pathlib.Path(sys.argv[2])
(OUT / "i").mkdir(parents=True, exist_ok=True); (OUT / "f").mkdir(exist_ok=True)
M = pathlib.Path("docs/cv-source/media")
CV = yaml.safe_load(open("docs/cv.yml", encoding="utf-8"))
AI = yaml.safe_load(open("docs/ai-portfolio.yml", encoding="utf-8"))
reg = yaml.safe_load(open("projects/registry.yml")) or {}
reg = reg.get("projects", reg) if isinstance(reg, dict) else reg
e = lambda s: html.escape(str(s or ""))
BV = "https://www.boundvisuals.com"
TEL = "tel:" + CV["phone"].replace(" ", "")


def pic(src, w=1600):
    """Whole image (never cropped), resized, progressive JPEG. Returns (url, w, h)."""
    src = pathlib.Path(src); name = src.stem[:60] + ".jpg"
    im = Image.open(src).convert("RGB")
    if im.width > w:
        im = im.resize((w, round(im.height * w / im.width)), Image.LANCZOS)
    im.save(OUT / "i" / name, "JPEG", quality=84, optimize=True, progressive=True)
    return f"i/{name}", im.width, im.height


def tag(src, alt, w=1600, cls=""):
    u, W, H = pic(src, w)
    return f'<img src="{u}" width="{W}" height="{H}" alt="{e(alt)}" loading="lazy" decoding="async" class="{cls}">'


for f in ["Light", "Medium", "DemiBold", "Bold"]:
    s = A / f"brand/fontes/FONTES/Visby CF/VisbyCF-{f}.woff2"
    if s.exists():
        shutil.copy(s, OUT / "f" / s.name)

# ---------- sections
ai_blocks = []
for s in AI["sections"]:
    figs = []
    for it in s["items"]:
        if "pair" in it:
            a, b = it["pair"]
            figs.append(f'<figure class="ba">{tag(M / a, "Before — " + s["name"], 1100)}{tag(M / b, "After — " + s["name"], 1100)}<figcaption><span>Before</span><span>After</span></figcaption></figure>')
        elif "triple" in it:
            figs.append('<figure class="ba t3">' + "".join(tag(M / x, s["name"], 900) for x in it["triple"]) + "<figcaption><span>Reference</span><span>Before</span><span>After</span></figcaption></figure>")
        else:
            figs += [f'<figure>{tag(M / x, s["name"], 1400)}</figure>' for x in it["img"]]
    ai_blocks.append(f'<div class="aisec"><div class="aih"><h3>{e(s["name"])}</h3><p>{e(s["lead"])}</p></div><div class="aig">{"".join(figs)}</div></div>')

archi = []
for p in reg:
    prev = [x for x in sorted(glob.glob(f"reports/{p['id']}/preview/*.jpg")) if not os.path.basename(x).startswith("2026_-_FINAIS")]
    land = [x for x in prev if Image.open(x).width / Image.open(x).height > 1.2]
    if land:
        archi.append(f'<a class="tile" href="{BV}" target="_blank" rel="noopener">{tag(land[0], p.get("title", p["id"]), 1000)}<span>{e(p.get("title", p["id"]))} ↗</span></a>')

exp = "".join(f'<li><span class="d">{e(x["dates"])}</span><b>{e(x["role"])}</b><span class="o">{e(x["org"])}</span></li>' for x in CV["experience"][:6])
recos = "".join(f'<blockquote><p>“{e(str(r["text"]).split(chr(10))[0])}”</p><cite><b>{e(r["who"])}</b> {e(r["role"])}</cite></blockquote>' for r in CV["recommendations"])
docs = [("CV — long", "CV_Vitor_Hugo_Long.pdf"), ("CV — short", "CV_Vitor_Hugo_Short.pdf"), ("Portfolio — All", "Portfolio_All.pdf"),
        ("Portfolio — 3D Architecture", "Portfolio_3D_Architecture_Visualization.pdf"), ("Portfolio — AI", "Portfolio_AI.pdf")]
dl = "".join(f'<a href="files/{f}" target="_blank" rel="noopener">{e(t)} <i>PDF ↓</i></a>' for t, f in docs)
links = [("Phone", CV["phone"], TEL), ("Email", CV["email"], "mailto:" + CV["email"]),
         ("LinkedIn", "criativovitorhugo", "https://www.linkedin.com/in/" + CV["linkedin"]),
         ("Behance", "criativovitorhugo", "https://www.behance.net/" + CV["behance"]),
         ("Instagram", CV["instagram"], "https://www.instagram.com/" + CV["instagram"].lstrip("@")),
         ("3D studio", "boundvisuals.com", BV)]
contact = "".join(f'<a href="{h}"><span>{l}</span>{e(t)}</a>' for l, t, h in links)
hero_img = tag(M / "ai-006-001.jpg", "AI image by Vítor Hugo", 1800, "heroimg").replace("loading=\"lazy\"", "fetchpriority=\"high\"")
portrait = tag(M / "portrait.jpg", "Vítor Hugo", 600, "portrait")

disc = [("01", "AI Image & Video", "Photoreal characters, products and spaces. Lip-sync, motion, consistency across shots. ComfyUI · Seedance · Kling · Veo · Nano Banana.", "#ai"),
        ("02", "3D Architecture", "Photoreal archviz — exteriors, interiors, animation. Lives at my 3D studio, Bound Visuals.", BV),
        ("03", "Performance Ads", "Multi-format ad creative (1:1, 9:16, 16:9), UGC and AI avatars, speed-to-creative, data-guided iteration.", "#ads"),
        ("04", "Design & Video", "Brand, layout, motion, editing and sound. From the idea to the delivered file.", "#ads"),
        ("05", "Lab", "Daily Study — a small 3D + AI piece, three times a week, in public.", "#lab")]
dhtml = "".join(f'<a class="disc" href="{h}"{" target=_blank rel=noopener" if h.startswith("http") else ""}><span class="n">{n}</span><b>{t}{" ↗" if h.startswith("http") else ""}</b><p>{d}</p></a>' for n, t, d, h in disc)

ads_list = "".join(f"<li>{e(x)}</li>" for x in CV["deliver"])

page = f'''<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Vítor Hugo — AI Image & Video · 3D Artist · Performance Ads</title>
<meta name="description" content="Vítor Hugo — 3D artist and AI image & video specialist in Portugal. AI characters, products and spaces, performance ads, design and video. 3D architecture at Bound Visuals.">
<meta name="robots" content="noindex">
<link rel="canonical" href="{BV}/vitorhugo/">
<meta property="og:title" content="Vítor Hugo — AI Image & Video · 3D"><meta property="og:image" content="{BV}/vitorhugo/i/ai-006-001.jpg">
<script type="application/ld+json">{{"@context":"https://schema.org","@type":"Person","name":"Vítor Hugo","jobTitle":"3D Artist · AI Image & Video Specialist","url":"{BV}/vitorhugo/","email":"{CV["email"]}","telephone":"{CV["phone"]}","sameAs":["https://www.linkedin.com/in/{CV["linkedin"]}","https://www.behance.net/{CV["behance"]}","https://www.instagram.com/{CV["instagram"].lstrip("@")}","{BV}"]}}</script>
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
.hero{{padding-block:9vh 5vh;display:grid;grid-template-columns:1.1fr 1fr;gap:5vw;align-items:end}}@media(max-width:900px){{.hero{{grid-template-columns:1fr}}}}
h1{{font-weight:700;font-size:clamp(56px,11vw,190px);line-height:.88;letter-spacing:-.045em;margin:18px 0 26px}}
.lead{{font-size:clamp(19px,1.8vw,26px);font-weight:500;line-height:1.3;max-width:24ch;margin:0}}
.heroimg{{width:100%}}
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
</style></head><body>
<header><div class="w"><b>Vítor Hugo</b><nav><a class="h" href="#work">Work</a><a class="h" href="#ai">AI</a><a href="{BV}" target="_blank" rel="noopener">3D ↗</a><a class="h" href="#about">About</a><a href="#contact">Contact</a></nav></div></header>
<main>
<div class="w hero"><div><div class="k">Portugal · available worldwide</div><h1>Vítor<br>Hugo</h1><p class="lead">I make images and films that didn’t exist yesterday — with 3D, AI and a designer’s eye.</p></div><div>{hero_img}</div></div>
<div class="tick"><div>AI Image & Video · 3D Architecture · Performance Ads · Design · Video · ComfyUI · Seedance · Kling · Veo · Nano Banana · Unreal · Corona · &nbsp;AI Image & Video · 3D Architecture · Performance Ads · Design · Video · ComfyUI · Seedance · Kling · Veo · Nano Banana · Unreal · Corona · &nbsp;</div></div>
<section class="w" id="work"><div class="k">What I do</div><h2>One person,<br>five disciplines.</h2><div class="discs">{dhtml}</div></section>
<section class="w" id="ai"><div class="k">AI Image & Video</div><h2>From text, image<br>and 3D to final.</h2>{"".join(ai_blocks)}</section>
<section class="w" id="arch"><div class="k">3D Architecture · Bound Visuals</div><h2>Architecture lives<br>at my 3D studio.</h2><div class="tiles">{"".join(archi)}</div><a class="btn" href="{BV}" target="_blank" rel="noopener">See all 3D work at boundvisuals.com ↗</a></section>
<section class="w two" id="ads"><div><div class="k">Performance Ads · Design · Video</div><h2>Creative that<br>performs.</h2></div><ul class="x">{ads_list}</ul></section>
<section class="w two" id="lab"><div><div class="k">Lab</div><h2>Daily Study.</h2></div><div><p class="lead" style="max-width:none">A real mini 3D project, three times a week: a near-ready model, my cameras and light, a basic render — then AI and edit. Simple, beautiful, in public.</p><a class="btn" href="https://www.instagram.com/{CV["instagram"].lstrip("@")}" target="_blank" rel="noopener">Follow on Instagram ↗</a></div></section>
<section class="w two" id="about"><div>{portrait}<div class="k">About</div><h2>Hello —<br>I’m Vítor.</h2><p>{e(CV["presentation"][0])}</p><p>{e(CV["how_i_work"])}</p></div><div><div class="k" style="margin-bottom:14px">Experience</div><ul class="exp">{exp}</ul><div class="docs" style="margin-top:6vh"><div class="k" style="margin-bottom:14px">CV & portfolios</div>{dl}</div></div></section>
<section class="w"><div class="k">Recommendations · {len(CV["recommendations"])} on LinkedIn</div><h2>What people say.</h2><div class="q">{recos}</div></section>
<section class="w" id="contact"><div class="k">Contact</div><p class="big">Let’s make<br>something new.</p><div class="contact">{contact}</div></section>
</main>
<footer class="w"><span>© 2026 Vítor Hugo</span><a href="{BV}" target="_blank" rel="noopener">3D studio → Bound Visuals ↗</a></footer>
</body></html>'''
(OUT / "index.html").write_text(page, encoding="utf-8")
print("site ok", len(list((OUT / "i").iterdir())), "images")
