#!/usr/bin/env python3
"""Daily stories for days that have a feed post but no stories yet ("something goes out EVERY day").

For each feed post in queue/week-NN.yml (from today on) whose day has no other story, two stories are
queued in queue/social-week-NN.yml (approved: false, Vítor approves them in the Painel like everything else):
  10:00  "Tonight · 19:00"  — a DETAIL slide of that post (2nd slide when it exists, never the white "-full" one)
  20:30  "New on the feed"  — the post's first slide
Images: reports/<project>/story/teaser-<date>-a|b.jpg, 1080x1920, the hand-reviewed 4:5 slide (already
approved crops, no new cropping) on brand black, clear of Instagram's top/bottom UI zones. Rebuilt from the
CURRENT slides on every run, so a crop edited in the Painel flows into the teaser too.
Approval flags of existing entries are never touched; entries are only added (or removed if their feed post
disappeared and they were never approved).

usage: python scripts/make_teasers.py [YYYY-MM-DD from]   → prints number of changed queue files/images
"""
import sys, os, re, glob, datetime, pathlib, io
import yaml
from PIL import Image, ImageDraw, ImageFont

W, H = 1080, 1920
BLACK, GREY, LIGHT = (11, 12, 12), (197, 193, 183), (229, 229, 227)
FONTS = pathlib.Path(__file__).resolve().parent / "fonts"
TIMES = {"a": "10:00", "b": "20:30"}
TEXT = {"a": ("TONIGHT · {t}", "HOJE · {t}"), "b": ("NEW ON THE FEED", "NOVO NO FEED")}


def font(name, size):
    return ImageFont.truetype(str(FONTS / name), size)


def titles():
    r = yaml.safe_load(open("projects/registry.yml", encoding="utf-8")) or {}
    r = r.get("projects", r) if isinstance(r, dict) else r
    return {p["id"]: p.get("title", p["id"]) for p in r}


def frame(slide_path, kind, title, t="19:00"):
    """4:5 slide (1080x1350) scaled to 936 wide (downscale only) between a kicker and the signature."""
    im = Image.open(slide_path).convert("RGB")
    iw = 936
    ih = round(im.height * iw / im.width)
    if ih > 1180:                       # unusually tall slide: fit height instead
        ih = 1180; iw = round(im.width * ih / im.height)
    im = im.resize((iw, ih), Image.LANCZOS)
    c = Image.new("RGB", (W, H), BLACK)
    top = 350 + (1180 - ih) // 2
    c.paste(im, ((W - iw) // 2, top))
    d = ImageDraw.Draw(c)
    en, pt = (x.format(t=t) for x in TEXT[kind])
    d.text((W // 2, 292), en, font=font("Poppins-Medium.ttf", 34), fill=LIGHT, anchor="mm")
    d.text((W // 2, 334), pt, font=font("Poppins-Light.ttf", 24), fill=GREY, anchor="mm")
    y = top + ih
    d.text((W // 2, y + 58), title, font=font("Poppins-Medium.ttf", 36), fill=LIGHT, anchor="mm")
    d.text((W // 2, y + 104), "Vítor Hugo  •  Bound Visuals", font=font("Poppins-Light.ttf", 26), fill=GREY, anchor="mm")
    return c


def save_if_changed(img, path):
    b = io.BytesIO()
    img.save(b, "JPEG", quality=95, subsampling=0, optimize=True)
    data = b.getvalue()
    if os.path.exists(path) and open(path, "rb").read() == data:
        return False
    os.makedirs(os.path.dirname(path), exist_ok=True)
    open(path, "wb").write(data)
    return True


def main():
    since = sys.argv[1] if len(sys.argv) > 1 else datetime.date.today().isoformat()
    T = titles()
    changed = 0
    for wf in sorted(glob.glob("queue/week-*.yml")):
        nn = re.search(r"week-(\d+)\.yml$", wf).group(1)
        feed = yaml.safe_load(open(wf, encoding="utf-8")) or []
        sf = f"queue/social-week-{nn}.yml"
        stxt = open(sf, encoding="utf-8").read() if os.path.exists(sf) else ""
        head = "".join(l for l in stxt.splitlines(True) if l.startswith("#")) or \
            f"# Week {int(nn)} social (stories + reels). approved only after Vítor's OK. Teasers by scripts/make_teasers.py\n"
        social = yaml.safe_load(stxt) or [] if stxt else []
        for it in social:
            it["date"] = str(it["date"])
        real_story_days = {it["date"] for it in social if it["type"] == "story" and not it.get("teaser")}
        want = {}
        for p in feed:
            d = str(p["date"])
            if d < since or d in real_story_days or not p.get("slides"):
                continue
            slides = [s for s in p["slides"] if os.path.exists(f"reports/{p['project']}/ig/{s}")]
            if not slides:
                continue
            det = [s for s in slides[1:] if not s.endswith("-full.jpg")]
            for k, src in ((("a", det[0]),) if det else ()) + (("b", slides[0]),):   # "a" only when a real detail slide exists (never the same image twice)
                fn = f"teaser-{d}-{k}.jpg"
                if save_if_changed(frame(f"reports/{p['project']}/ig/{src}", k, T.get(p["project"], p["project"]), str(p.get("time", "19:00"))),
                                   f"reports/{p['project']}/story/{fn}"):
                    changed += 1
                want[(d, k)] = {"date": d, "time": TIMES[k], "type": "story", "project": p["project"], "file": fn,
                                "teaser": k, "approved": False}
        keep, have, dirty = [], set(), False
        for it in social:
            if it.get("teaser"):
                key = (it["date"], it["teaser"])
                if key not in want:
                    if it.get("approved"):
                        keep.append(it)          # never drop something Vítor approved
                    else:
                        dirty = True
                    continue
                w = want[key]
                if it["project"] != w["project"]:   # feed post of that day changed project: follow it, keep the flag
                    it["project"] = w["project"]; dirty = True
                have.add(key)
            keep.append(it)
        for key, w in want.items():
            if key not in have:
                keep.append(w); dirty = True
        if not dirty:
            continue
        keep.sort(key=lambda x: (x["date"], str(x["time"])))
        out = head + (yaml.safe_dump(keep, allow_unicode=True, sort_keys=False, width=240) if keep else "[]\n")
        if out != stxt:
            open(sf, "w", encoding="utf-8").write(out)
            changed += 1
    print(changed)


if __name__ == "__main__":
    main()
