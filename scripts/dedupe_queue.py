#!/usr/bin/env python3
"""Keeps the publishing calendar free of repeats and applies Vítor's deletions.

Rules (Vítor 05/11):
- Nothing repeats: each source image is used ONCE across the whole calendar (feed carousels + stories).
  Different crops of the same image count as the same image. Already published images are done.
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


def twins(project):
    """landscape stem -> portrait stem for near-identical angles."""
    prev = sorted(glob.glob(f"reports/{project}/preview/*.jpg"))
    port = [p for p in prev if Image.open(p).width < Image.open(p).height]
    land = [p for p in prev if Image.open(p).width >= Image.open(p).height * 1.05]
    out = {}
    if not port or not land:
        return out
    def h(p, r):
        im = center(p, r).convert("L").resize((17, 16), Image.LANCZOS); px = im.tobytes()
        return sum(1 << i for i in range(256) if px[(i // 16) * 17 + i % 16] > px[(i // 16) * 17 + i % 16 + 1])
    for l in land:
        best = None
        for pp in port:
            r = Image.open(pp).width / Image.open(pp).height
            d = bin(h(l, r) ^ h(pp, r)).count("1")
            if best is None or d < best[0]:
                best = (d, pp)
        if best and best[0] <= 30:
            out[os.path.basename(l)[:-4]] = os.path.basename(best[1])[:-4]
    return out


def main():
    deleted = json.load(open("docs/deleted.json")) if os.path.exists("docs/deleted.json") else {}
    dkeys = set(deleted.get("keys", []))
    dslides = deleted.get("slides", {})
    pub = json.load(open(f"{QUEUE}/published.json")) if os.path.exists(f"{QUEUE}/published.json") else {}
    published_keys = set(pub.get("done", pub.keys()) if isinstance(pub, dict) else [])

    files = sorted(glob.glob(f"{QUEUE}/week-*.yml")) + sorted(glob.glob(f"{QUEUE}/social-week-*.yml"))
    data = {f: load(f) for f in files}
    TW = {}
    projects = {it.get("project") for items in data.values() for it in items if isinstance(it, dict)}
    for p in projects:
        TW[p] = twins(p)
    canon = lambda p, s: TW.get(p, {}).get(s, s)

    # published first, then feed posts (the main content), then stories take what is left
    allit = []
    for f, items in data.items():
        for it in items:
            k = feed_key(it) if "slides" in it else social_key(it)
            allit.append((0 if k in published_keys else (1 if "slides" in it else 2), str(it["date"]), str(it.get("time", "")), f, it, k))
    allit.sort(key=lambda x: (x[0], x[1], x[2]))

    used, drop, rep = set(), set(), {"deleted": 0, "slides_deleted": 0, "repeats": 0, "to_vertical": 0}
    for _, _, _, f, it, k in allit:
        if k in dkeys and k not in published_keys:
            drop.add(id(it)); rep["deleted"] += 1; continue
        if "slides" in it:
            if k in dslides:
                before = len(it["slides"]); it["slides"] = [s for s in it["slides"] if s not in set(dslides[k])]
                rep["slides_deleted"] += before - len(it["slides"])
                if not it["slides"]:
                    drop.add(id(it)); continue
            st = stem_of_slide(it["slides"][0]); p = it["project"]
            c = canon(p, st)
            if c != st and k not in published_keys:   # switch to the vertical twin if its slides exist
                ig = sorted(os.path.basename(x) for x in glob.glob(f"reports/{p}/ig/{c}-*.jpg"))
                if ig:
                    it["slides"] = ig; rep["to_vertical"] += 1
            if (p, c) in used and k not in published_keys:
                drop.add(id(it)); rep["repeats"] += 1; continue
            used.add((p, c))
        elif it.get("type") == "story" and it.get("teaser") == "a" and k not in published_keys:
            drop.add(id(it)); rep["repeats"] += 1; continue   # one teaser per post only
        elif it.get("type") == "story" and not it.get("teaser"):
            p = it["project"]; c = canon(p, stem_of_story(it["file"]))
            if (p, c) in used and k not in published_keys:
                drop.add(id(it)); rep["repeats"] += 1; continue
            used.add((p, c))
    changed = False
    for f, items in data.items():
        keep = [it for it in items if id(it) not in drop]
        if keep != load(f) or len(keep) != len(items):
            dump(f, keep); changed = True
    tw = {p: v for p, v in TW.items() if v}
    print(json.dumps({"report": rep, "twins": tw}, ensure_ascii=False, indent=1))
    return changed


if __name__ == "__main__":
    main()
