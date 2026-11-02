# Screenshots + design facts of the live site (read-only).
import json, os, sys
from playwright.sync_api import sync_playwright
URLS = {"home": "https://boundvisuals.com/", "info": "https://boundvisuals.com/info/"}
OUT = "reports/site-snapshot"; os.makedirs(OUT, exist_ok=True)
facts = {}
with sync_playwright() as p:
    b = p.chromium.launch()
    for name, url in URLS.items():
        for dev, vp in [("desktop", (1440, 900)), ("mobile", (390, 844))]:
            pg = b.new_page(viewport={"width": vp[0], "height": vp[1]})
            pg.goto(url, wait_until="networkidle", timeout=90000); pg.wait_for_timeout(4000)
            pg.screenshot(path=f"{OUT}/{name}-{dev}.jpg", type="jpeg", quality=70)
            pg.screenshot(path=f"{OUT}/{name}-{dev}-full.jpg", type="jpeg", quality=55, full_page=True)
            if dev == "desktop":
                if name == "home":
                    links = pg.eval_on_selector_all("a[href*='portfolio_page']", "els=>[...new Set(els.map(e=>e.href))]")
                    facts["project_links"] = links
                facts[name] = pg.evaluate("""()=>{const g=s=>{const e=document.querySelector(s);if(!e)return null;const c=getComputedStyle(e);
                  return {font:c.fontFamily,size:c.fontSize,weight:c.fontWeight,ls:c.letterSpacing,tt:c.textTransform,color:c.color,bg:c.backgroundColor,h:e.getBoundingClientRect().height}};
                  return {body:g('body'),header:g('header'),nav:g('nav a, .main_menu a'),h1:g('h1'),h2:g('h2'),p:g('p'),logo:g('header img'),
                    grid:(()=>{const im=[...document.querySelectorAll('article img, .portfolio_main_holder img, video')].slice(0,6).map(e=>{const r=e.getBoundingClientRect();return [Math.round(r.x),Math.round(r.y),Math.round(r.width),Math.round(r.height)]});return im})(),
                    title:document.title}}""")
            pg.close()
    if facts.get("project_links"):
        u = facts["project_links"][0]
        pg = b.new_page(viewport={"width": 1440, "height": 900}); pg.goto(u, wait_until="networkidle", timeout=90000); pg.wait_for_timeout(4000)
        pg.screenshot(path=f"{OUT}/project-desktop-full.jpg", type="jpeg", quality=55, full_page=True); facts["project_sample"] = u
    b.close()
json.dump(facts, open(f"{OUT}/facts.json", "w"), indent=1)
