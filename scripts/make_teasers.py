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
import json, sys, os, re, glob, datetime, pathlib, io
import yaml
from PIL import Image, ImageDraw, ImageFont

W, H = 1080, 1920
BLACK, GREY, LIGHT = (11, 12, 12), (197, 193, 183), (229, 229, 227)
FONTS = pathlib.Path(__file__).resolve().parent / "fonts"
TIMES = {"a": "10:00", "b": "20:30"}
TEXT = {"a": ("TONIGHT · {t}", "HOJE · {t}"), "b": ("NEW ON THE FEED", "NOVO NO FEED"), "p": ("COLOUR PALETTE", "PALETA DE COR")}


def font(name, size):
    return ImageFont.truetype(str(FONTS / name), size)


def titles():
    r = yaml.safe_load(open("projects/registry.yml", encoding="utf-8")) or {}
    r = r.get("projects", r) if isinstance(r, dict) else r
    return {p["id"]: p.get("title", p["id"]) for p in r}


def frame(slide_path, kind, title, t="19:00"):
    """4:5 slide (1080x1350) scaled to 936 wide (downscale only) between a kicker and the signature."""
    im = slide_path if isinstance(slide_path, Image.Image) else Image.open(slide_path).convert("RGB")
    iw = 936
    ih = round(im.height * iw / im.width)
    if ih > 1180:                       # unusually tall slide: fit height instead
        ih = 1180; iw = round(im.width * ih / im.height)
    im = im.resize((iw, ih), Image.LANCZOS)
    c = Image.new("RGB", (W, H), BLACK)
    top = 350 + (1180 - ih) // 2
    c.paste(im, ((W - iw) // 2, top))
    d = ImageDraw.Draw(c)
    if kind == "p":                     # palette slide already carries its own title + signature
        return c
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


MID_TIMES = ["12:00", "15:00", "17:30"]
TCROPS_ALL = (yaml.safe_load(open("config/teaser_crops.yml")) or {}).get("teaser_crops", {}) if os.path.exists("config/teaser_crops.yml") else {}


def teaser_slide(pr, stem, crop):
    """Vítor's own 4:5 framing (Painel) → 1080x1350 from the full-res final on the server (preview only as fallback)."""
    import pathlib
    src = None
    d = pathlib.Path(os.path.expanduser(f"~/bv/src/{pr}"))
    if d.exists():
        for p in d.rglob("*"):
            if p.is_file() and "_".join(p.relative_to(d).with_suffix("").parts).replace(" ", "_") == stem:
                src = p; break
    im = Image.open(src or f"reports/{pr}/preview/{stem}.jpg").convert("RGB")
    W, H = im.size
    cx, cy, h = crop
    ch = h * H; cw = ch * 0.8
    if cw > W:
        cw = W; ch = cw / 0.8
    x0 = min(max(cx * W - cw / 2, 0), W - cw); y0 = min(max(cy * H - ch / 2, 0), H - ch)
    return im.crop((round(x0), round(y0), round(x0 + cw), round(y0 + ch))).resize((1080, 1350), Image.LANCZOS)


def src_of_story(fn):
    return fn.rsplit("-s", 1)[0]


def src_of_slide(fn):
    return re.sub(r"-\d+(-full)?\.jpg$", "", fn)


def main():
    """Fixed daily story rule (Vítor 2026-11-06), for every day AFTER today that has a feed post:
    10:00 'TONIGHT · 19:00' (detail of the post; the post image when it has no detail slide)
    12:00 / 15:00 / 17:30  up to 3 stories of the SAME project, each from a different image, never the post's image,
                           each crop used once in the whole calendar
    19:00 the post · 20:30 'NEW ON THE FEED'.
    Stories of other projects on post days are removed. Reels are untouched. Today is never touched."""
    since = sys.argv[1] if len(sys.argv) > 1 else datetime.date.today().isoformat()
    T = titles()
    changed = 0
    weeks = []
    for wf in sorted(glob.glob("queue/week-*.yml")):
        nn = re.search(r"week-(\d+)\.yml$", wf).group(1)
        feed = yaml.safe_load(open(wf, encoding="utf-8")) or []
        sf = f"queue/social-week-{nn}.yml"
        stxt = open(sf, encoding="utf-8").read() if os.path.exists(sf) else ""
        social = (yaml.safe_load(stxt) or []) if stxt else []
        for it in social:
            it["date"] = str(it["date"]); it["time"] = str(it["time"])
        weeks.append((nn, feed, sf, stxt, social))
    # crops already used (past days and kept entries) are never reused
    used = set()
    for _, _, _, _, social in weeks:
        for it in social:
            if it["type"] == "story" and not it.get("teaser") and it["date"] < since:
                used.add((it["project"], it.get("file")))
    pools = {}
    sys.path.insert(0, os.path.dirname(os.path.abspath(__file__)))
    from dedupe_queue import img_hash, load_twins
    TW = load_twins()
    hashes = []

    def fresh(pr, f, add=True):
        """False when dedupe_queue would drop it (horizontal twin or visually identical to an earlier story)."""
        if src_of_story(f) in (TW.get(pr, {}) or {}):
            return False
        h = img_hash(f"reports/{pr}/story/{f}")
        if h is not None and any(bin(h ^ o).count("1") <= 10 for o in hashes):
            return False
        if add and h is not None:
            hashes.append(h)
        return True

    for _, _, _, _, social in weeks:
        for it in sorted(social, key=lambda x: (x["date"], x["time"])):
            if it["type"] == "story" and it["date"] < since:
                fresh(it["project"], it["file"])

    def pool(pr):
        if pr not in pools:
            fs = sorted(os.path.basename(f) for f in glob.glob(f"reports/{pr}/story/*.jpg")
                        if not os.path.basename(f).startswith(("teaser-", "palette-", "motion-")))
            pools[pr] = fs
        return pools[pr]

    for nn, feed, sf, stxt, social in weeks:
        head = "".join(l for l in stxt.splitlines(True) if l.startswith("#")) or \
            f"# Week {int(nn)} social (stories + reels). approved only after Vítor's OK. Stories by scripts/make_teasers.py\n"
        days = {}
        for p in feed:
            d = str(p["date"])
            if d < since or not p.get("slides"):
                continue
            slides = [s for s in p["slides"] if os.path.exists(f"reports/{p['project']}/ig/{s}")]
            if slides:
                days[d] = (p, slides)
        keep = [it for it in social if it["date"] not in days or it["type"] != "story"]
        old = {(it["date"], it.get("teaser") or it.get("file")): it for it in social if it["date"] in days and it["type"] == "story"}
        for d, (p, slides) in sorted(days.items()):
            pr = p["project"]
            # approved stories are frozen (Vítor 07/11): kept exactly as they are, new ones only fill free slots
            frozen = [o for (dd, _), o in old.items() if dd == d and o.get("approved")]
            keep.extend(frozen)
            fz_teaser = {o.get("teaser") for o in frozen if o.get("teaser")}
            fz_times = {str(o["time"]) for o in frozen}
            det = [s for s in slides[1:] if not s.endswith("-full.jpg")]
            post_src = {src_of_slide(s) for s in slides}
            # 'a' = a detail of tonight's post: 2nd slide, else the post image's own 9:16 story crop
            a_src = f"reports/{pr}/ig/{det[0]}" if det else next(
                (f"reports/{pr}/story/{f}" for f in pool(pr) if src_of_story(f) in post_src), None)
            for k, src in (("a", a_src), ("b", f"reports/{pr}/ig/{slides[0]}")):
                if not src:
                    continue
                if k in fz_teaser:          # approved: never replaced (only Vítor's own crop edit re-renders it)
                    fn = f"teaser-{d}-{k}.jpg"; tc = TCROPS_ALL.get(fn[:-4]); tc = tc if tc and any(x.startswith(tc["stem"]) for x in slides) else None
                    mark = f"reports/{pr}/story/.{fn}.crop"
                    sig = json.dumps([tc, str(p.get("time", "19:00")), T.get(pr, pr)]) if tc else None
                    if tc and not (os.path.exists(mark) and open(mark).read() == sig):
                        try:
                            if save_if_changed(frame(teaser_slide(pr, tc["stem"], tc["crop"]), k, T.get(pr, pr), str(p.get("time", "19:00"))), f"reports/{pr}/story/{fn}"):
                                changed += 1
                            open(mark, "w").write(sig)
                        except Exception as e:
                            print("teaser crop failed", fn, e, file=sys.stderr)
                    fresh(pr, fn)
                    continue
                fn = f"teaser-{d}-{k}.jpg"
                tc = TCROPS_ALL.get(fn[:-4]); tc = tc if tc and any(x.startswith(tc["stem"]) for x in slides) else None
                mark = f"reports/{pr}/story/.{fn}.crop"
                sig = json.dumps([tc, str(p.get("time", "19:00")), T.get(pr, pr)]) if tc else None
                if tc and os.path.exists(mark) and open(mark).read() == sig and os.path.exists(f"reports/{pr}/story/{fn}"):
                    pass                                    # Vítor's framing already rendered (full-res) → keep it
                elif tc:
                    try:
                        if save_if_changed(frame(teaser_slide(pr, tc["stem"], tc["crop"]), k, T.get(pr, pr), str(p.get("time", "19:00"))),
                                           f"reports/{pr}/story/{fn}"):
                            changed += 1
                        open(mark, "w").write(sig)
                    except Exception as e:
                        print("teaser crop failed", fn, e, file=sys.stderr)
                elif save_if_changed(frame(src, k, T.get(pr, pr), str(p.get("time", "19:00"))),
                                   f"reports/{pr}/story/{fn}"):
                    changed += 1
                if not fresh(pr, fn):
                    continue
                o = old.get((d, k))
                keep.append({"date": d, "time": TIMES[k], "type": "story", "project": pr, "file": fn, "teaser": k,
                             "approved": bool(o and o.get("approved") and o["project"] == pr)})
            day_src, mids = set(post_src), []
            for o in frozen:
                if not o.get("teaser"):
                    day_src.add(src_of_story(o["file"]) if not o["file"].startswith(("palette-", "motion-")) else o["file"].split("-", 1)[1].rsplit(".", 1)[0])
                    used.add((pr, o["file"])); fresh(pr, o["file"])
            # keep this day's existing same-project stories that still fit the rule (approval kept)
            for (dd, f), o in sorted(old.items()):
                if dd == d and not o.get("teaser") and not o.get("approved") and o["project"] == pr and os.path.exists(f"reports/{pr}/story/{f}") and src_of_story(f) not in day_src and len(mids) < 3 and fresh(pr, f):
                    mids.append((f, bool(o.get("approved")))); day_src.add(src_of_story(f)); used.add((pr, f))
            for f in pool(pr):
                if len(mids) >= 3:
                    break
                if (pr, f) in used or src_of_story(f) in day_src or not fresh(pr, f):
                    continue
                mids.append((f, False)); day_src.add(src_of_story(f)); used.add((pr, f))
            # then motion stories (slow pan / push-in videos rendered on the server from full-res finals)
            if len(mids) < 3:
                for mv in sorted(glob.glob(f"reports/{pr}/story/motion-*.mp4")):
                    if len(mids) >= 3:
                        break
                    f = os.path.basename(mv); stem = f[7:-4]
                    if (pr, f) in used or stem in post_src or stem in day_src or stem in (TW.get(pr, {}) or {}):
                        continue
                    o = old.get((d, f))
                    mids.append((f, bool(o and o.get("approved")))); day_src.add(stem); used.add((pr, f))
            # not enough real crops left → colour-palette stories (pillar 'paleta'), one per image, ever
            if len(mids) < 3:
                for prev in sorted(glob.glob(f"reports/{pr}/preview/*.jpg")):
                    if len(mids) >= 3:
                        break
                    stem = os.path.basename(prev)[:-4]
                    f = f"palette-{stem}.jpg"
                    if (pr, f) in used or stem in post_src or stem in day_src or stem in (TW.get(pr, {}) or {}):
                        continue
                    out = f"reports/{pr}/story/{f}"
                    if not os.path.exists(out):
                        try:
                            from make_palette import slide as pal_slide
                            save_if_changed(frame(pal_slide(prev, T.get(pr, pr))[0].convert("RGB"), "p", T.get(pr, pr)), out)
                            changed += 1
                        except Exception as e:
                            print("palette failed", prev, e, file=sys.stderr); continue
                    if not fresh(pr, f):
                        continue
                    o = old.get((d, f))
                    mids.append((f, bool(o and o.get("approved")))); day_src.add(stem); used.add((pr, f))
            free = [t for t in MID_TIMES if t not in fz_times][:max(0, 3 - sum(1 for o in frozen if not o.get("teaser")))]
            for t, (f, ap) in zip(free, mids):
                e = {"date": d, "time": t, "type": "story", "project": pr, "file": f, "approved": ap}
                if f.endswith(".mp4"):
                    e["cover"] = f[:-4] + ".jpg"
                keep.append(e)
        keep.sort(key=lambda x: (x["date"], str(x["time"])))
        out = head + (yaml.safe_dump(keep, allow_unicode=True, sort_keys=False, width=240) if keep else "[]\n")
        if out != stxt:
            open(sf, "w", encoding="utf-8").write(out)
            changed += 1
    print(changed)


if __name__ == "__main__":
    main()
