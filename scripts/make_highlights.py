"""Instagram highlight covers (1080x1920) in the Bound Visuals palette.
Icon sits in the centre circle IG keeps; three colourways: dark, grey, light.
Run: python scripts/make_highlights.py  -> reports/highlights/<colourway>/<nn>-<name>.png + preview.png"""
import os, asyncio
from playwright.async_api import async_playwright

C = {"black": "#0b0c0c", "grey": "#c5c1b7", "light": "#e5e5e3"}
WAYS = {"dark": (C["black"], C["light"]), "grey": (C["grey"], C["black"]), "light": (C["light"], C["black"])}
# 100x100 viewBox, stroke icons (stroke-width set globally)
ICONS = [
    ("archviz", "Archviz", '<path d="M14 84h72"/><path d="M22 84V44l28-22 28 22v40"/><path d="M42 84V62h16v22"/><path d="M30 52h8v8h-8zM62 52h8v8h-8z"/>'),
    ("product", "Product", '<path d="M50 14l32 18v36L50 86 18 68V32z"/><path d="M18 32l32 18 32-18"/><path d="M50 50v36"/>'),
    ("ai", "AI", '<path d="M44 16c3 18 10 25 28 28-18 3-25 10-28 28-3-18-10-25-28-28 18-3 25-10 28-28z"/><path d="M76 62c1.5 7 4.5 10 11 11-6.5 1.5-9.5 4.5-11 11-1.5-6.5-4.5-9.5-11-11 6.5-1 9.5-4 11-11z"/>'),
    ("video", "Video", '<rect x="14" y="24" width="72" height="52" rx="6"/><path d="M43 38v24l20-12z"/>'),
    ("daily-study", "Daily Study", '<rect x="18" y="20" width="64" height="64" rx="6"/><path d="M18 36h64M34 12v14M66 12v14"/><path d="M46 46l-5 30M60 46l-5 30M36 56h30M34 66h30"/>'),
    ("process", "Process", '<path d="M50 18l34 16-34 16-34-16z"/><path d="M16 50l34 16 34-16"/><path d="M16 66l34 16 34-16"/>'),
    ("lab", "Lab", '<path d="M40 14h20M44 14v26L22 78a6 6 0 005 8h46a6 6 0 005-8L56 40V14"/><path d="M31 62h38"/>'),
    ("services", "Services", '<rect x="14" y="32" width="72" height="48" rx="6"/><path d="M38 32v-8a4 4 0 014-4h16a4 4 0 014 4v8"/><path d="M14 52h72"/><path d="M46 52v8h8v-8"/>'),
    ("info", "Info", '<circle cx="50" cy="50" r="34"/><path d="M50 46v24"/><circle cx="50" cy="32" r="1.5" fill="currentColor"/>'),
    ("clients", "Clients", '<circle cx="38" cy="38" r="12"/><path d="M16 82c0-14 10-24 22-24s22 10 22 24"/><circle cx="66" cy="34" r="9"/><path d="M62 56c12 0 22 9 22 22"/>'),
]

def page(bg, fg, svg):
    # icon 380px wide centred: IG keeps a centre circle about the full width of the frame
    return f"""<html><body style="margin:0;width:1080px;height:1920px;background:{bg};display:flex;align-items:center;justify-content:center">
<svg viewBox="0 0 100 100" width="380" height="380" fill="none" stroke="{fg}" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round" style="color:{fg}">{svg}</svg></body></html>"""

async def main():
    out = "reports/highlights"
    async with async_playwright() as p:
        b = await p.chromium.launch()
        pg = await b.new_page(viewport={"width": 1080, "height": 1920})
        for way, (bg, fg) in WAYS.items():
            os.makedirs(f"{out}/{way}", exist_ok=True)
            for i, (slug, label, svg) in enumerate(ICONS, 1):
                await pg.set_content(page(bg, fg, svg))
                await pg.screenshot(path=f"{out}/{way}/{i:02d}-{slug}.png")
        # preview: circles as IG shows them, with labels
        html = '<html><body style="margin:0;padding:24px 32px;background:#fafafa;width:1600px">'
        for way, (bg, fg) in WAYS.items():
            cs = "".join(
                f'<div style="text-align:center;width:150px"><div style="width:120px;height:120px;border-radius:50%;margin:0 auto;background:{bg};display:flex;align-items:center;justify-content:center;box-shadow:0 0 0 3px #fff,0 0 0 4px #ccc">'
                f'<svg viewBox="0 0 100 100" width="50" height="50" fill="none" stroke="{fg}" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round" style="color:{fg}">{svg}</svg></div>'
                f'<div style="font:13px Arial;margin-top:8px;color:#222">{label}</div></div>' for (slug, label, svg) in ICONS)
            html += f'<h3 style="font:600 15px Arial;margin:16px 0 12px">{way}</h3><div style="display:flex;flex-wrap:wrap;gap:12px 6px">{cs}</div>'
        await pg.set_viewport_size({"width": 1600, "height": 700})
        await pg.set_content(html + "</body></html>")
        await pg.screenshot(path=f"{out}/preview.png", full_page=True)
        await b.close()

asyncio.run(main())
