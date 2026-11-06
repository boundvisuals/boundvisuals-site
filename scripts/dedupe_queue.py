#!/usr/bin/env python3
"""Keeps the publishing calendar free of repeats and applies Vítor's deletions.

Rules (Vítor 05/11, corrected 23:15): never publish identical things.
- Feed: the same image is never posted twice. Stories: no visually identical story twice (any day), and not the
  same image twice on the same day. Stories may show images that are also in posts (that is normal).
- Near-identical angles inside a project (e.g. a horizontal web version and a vertical Instagram version):
  treated as the same image, and the VERTICAL one wins (feed posts are switched to it when its slides exist).
- Deletions made in the Painel (docs/deleted.json: {"keys": [...], "slides": {key: [slide filenames]}}) are removed.
Reels (video) are not touched by the uniqueness rule. Writes the queue files in place and prints a report.
"""
import glob, json, os, re, yaml
from PIL import Image

QUEUE = "queue"


def load(f):
    return yaml.safe_load(open(f, encoding="utf-8")) or []


def dump(f, items):
    head = "".join(l for l in open(f, encoding="utf-8") if l.startswith("#"))
    with open(f, "w", encoding="utf-8") as o:
        o.write(head)
        yaml.safe_dump(items, o, allow_unicode=True, sort_keys=False, width=1000)


def feed_key(it):
    return f"feed|{it['date']}|{it['project']}"


def social_key(it):
    return f"social|{it['date']}|{it['time']}|{it['type']}|{it['file']}"


def stem_of_slide(f):
    return re.sub(r"-(\d+)(-full)?\.jpg$", "", f)


def stem_of_story(f):
    return re.sub(r"-s\d+\.jpg$", "", f)


def dhash(p):
    im = Image.open(p).convert("L").resize((17, 16), Image.LANCZOS)
    px = im.tobytes()
    return sum(1 << i for i in range(256) if px[(i // 16) * 17 + i % 16] > px[(i // 16) * 17 + i % 16 + 1])


def center(p, r_target):
    """Centre crop of the preview to a common aspect, so a horizontal and a vertical render of one angle compare."""
    im = Image.open(p)
    w, h = im.size
    if w / h > r_target:
        nw = int(h * r_target); im = im.crop(((w - nw) // 2, 0, (w - nw) // 2 + nw, h))
    else:
        nh = int(w / r_target); im = im.crop((0, (h - nh) // 2, w, (h - nh) // 2 + nh))
    return im


def load_twins():
    try:
        return yaml.safe_load(open("config/twins.yml", encoding="utf-8")) or {}
    except FileNotFoundError:
        return {}


def img_hash(path):
    try:
        return dhash(path)
    except Exception:
        return None


def main():
    try:
        deleted = json.load(open("docs/deleted.json"))
    except (OSError, ValueError):
        deleted = {}
    dkeys = set(deleted.get("keys", []))
    dslides = deleted.get("slides", {})
    pub = json.load(open(f"{QUEUE}/published.json")) if os.path.exists(f"{QUEUE}/published.json") else {}
    published_keys = {k for k in pub if not k.startswith("_")} if isinstance(pub, dict) else set()
    TW = load_twins()

    files = sorted(glob.glob(f"{QUEUE}/week-*.yml")) + sorted(glob.glob(f"{QUEUE}/social-week-*.yml"))
    data = {f: load(f) for f in files}
    allit = []
    for f, items in data.items():
        for it in items:
            k = feed_key(it) if "slides" in it else social_key(it)
            allit.append((0 if k in published_keys else 1, str(it["date"]), str(it.get("time", "")), f, it, k))
    allit.sort(key=lambda x: (x[0], x[1], x[2]))

    feed_used, story_hashes, story_day = set(), [], set()
    drop, rep = set(), {"deleted": 0, "slides_deleted": 0, "identical": 0, "same_day": 0, "to_vertical": 0, "horizontal_twin": 0}
    for _, d, _, f, it, k in allit:
        pubd = k in published_keys
        if k in dkeys and not pubd:
            drop.add(id(it)); rep["deleted"] += 1; continue
        p = it.get("project")
        tw = TW.get(p, {}) or {}
        if "slides" in it:
            if k in dslides and not pubd:
                before = len(it["slides"]); it["slides"] = [x for x in it["slides"] if x not in set(dslides[k])]
                rep["slides_deleted"] += before - len(it["slides"])
                if not it["slides"]:
                    drop.add(id(it)); continue
            st = stem_of_slide(it["slides"][0])
            if st in tw and not pubd:          # horizontal with a vertical twin → use the vertical
                ig = sorted(os.path.basename(x) for x in glob.glob(f"reports/{p}/ig/{tw[st]}-*.jpg"))
                if ig:
                    it["slides"] = ig; st = tw[st]; rep["to_vertical"] += 1
            if (p, st) in feed_used and not pubd:   # the same image never posted twice in the feed
                drop.add(id(it)); rep["identical"] += 1; continue
            feed_used.add((p, st))
        elif it.get("type") == "story":
            st = stem_of_story(it["file"])
            if st in tw and not pubd:          # horizontal twin never goes out on Instagram
                drop.add(id(it)); rep["horizontal_twin"] += 1; continue
            if not it.get("teaser") and (d, p, st) in story_day and not pubd:   # same image twice on one day
                drop.add(id(it)); rep["same_day"] += 1; continue
            h = img_hash(f"reports/{p}/story/{it['file']}")
            if h is not None and not pubd and any(bin(h ^ o).count("1") <= 10 for o in story_hashes):
                drop.add(id(it)); rep["identical"] += 1; continue      # visually identical story already queued
            if h is not None:
                story_hashes.append(h)
            if not it.get("teaser"):
                story_day.add((d, p, st))
    for f, items in data.items():
        keep = [it for it in items if id(it) not in drop]
        if len(keep) != len(items) or keep != load(f):
            dump(f, keep)
    print(json.dumps(rep, ensure_ascii=False))


if __name__ == "__main__":
    main()
