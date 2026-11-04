#!/usr/bin/env python3
"""Painel data builder (runs in GitHub Actions; no Claude credits).
  apply <approvals.json.php>   → sets approved: true in queue/*.yml for every approved key; prints count
  build <out_dir>              → writes <out>/store/data.json.php + <out>/thumbs/** (small previews)
Item keys: feed|<date>|<project>   social|<date>|<time>|<type>|<file>
"""
import sys, os, glob, json, re, subprocess, datetime
from zoneinfo import ZoneInfo
import yaml
from PIL import Image

TZ = ZoneInfo("Europe/Lisbon")
FILA = "https://www.boundvisuals.com/bv-fila"
from urllib.parse import quote


def studies():
    """Parse docs/daily-study-briefings.md into [{num,title,when,blocks:[{k,t}]}] for the Estúdio tab."""
    p = "docs/daily-study-briefings.md"
    if not os.path.exists(p):
        return []
    out, cur, code = [], None, None
    for line in open(p, encoding="utf-8").read().splitlines():
        m = re.match(r"## (#\d+) · (.+?)(?: \((.+)\))?$", line)
        if m:
            cur = {"num": m.group(1), "title": m.group(2), "when": m.group(3) or "", "blocks": []}; out.append(cur); continue
        if cur is None or line.startswith("---"):
            continue
        if line.startswith("```"):
            if code is None:
                code = []
            else:
                cur["blocks"].append({"k": "code", "t": "\n".join(code)}); code = None
            continue
        if code is not None:
            code.append(line); continue
        if not line.strip():
            continue
        if re.match(r"\*\*.+\*\*$", line.strip()):
            cur["blocks"].append({"k": "h", "t": line.strip().strip("*")}); continue
        cur["blocks"].append({"k": "li" if line.lstrip().startswith("- ") else "p", "t": re.sub(r"\*\*|`", "", line.lstrip("- ").strip())})
    return out
_REG = yaml.safe_load(open("projects/registry.yml")) or {}
_REG = _REG.get("projects", []) if isinstance(_REG, dict) else _REG
TITLES = {p["id"]: p.get("title", p["id"]) for p in _REG}


def read_store(path):
    if not os.path.exists(path):
        return {}
    raw = open(path, encoding="utf-8").read()
    raw = raw.split("\n", 1)[1] if raw.startswith("<?php") else raw
    try:
        return json.loads(raw) or {}
    except Exception:
        return {}


def feed_key(it):
    return f"feed|{it['date']}|{it['project']}"


def social_key(it):
    return f"social|{it['date']}|{it['time']}|{it['type']}|{it['file']}"


def apply(path):
    appr = read_store(path)
    n = 0
    for f in sorted(glob.glob("queue/week-*.yml")) + sorted(glob.glob("queue/social-week-*.yml")):
        txt = open(f, encoding="utf-8").read()
        head = "".join(l for l in txt.splitlines(True) if l.startswith("#"))
        items = yaml.safe_load(txt) or []
        ch = False
        for it in items:
            it_date = str(it["date"])
            k = social_key({**it, "date": it_date}) if "type" in it else feed_key({**it, "date": it_date})
            if k in appr:
                want = not (isinstance(appr[k], dict) and appr[k].get("v") is False)
                if bool(it.get("approved")) != want:
                    it["approved"] = want; ch = True; n += 1
        if ch:
            open(f, "w", encoding="utf-8").write(head + yaml.safe_dump(items, allow_unicode=True, sort_keys=False, width=240))
    print(n)


def thumb(src, out_dir, rel, size):
    dst = os.path.join(out_dir, "thumbs", rel)
    if not os.path.exists(src):
        return None
    if not os.path.exists(dst):
        os.makedirs(os.path.dirname(dst), exist_ok=True)
        im = Image.open(src).convert("RGB")
        im.thumbnail(size)
        im.save(dst, quality=78, optimize=True, progressive=True)
    return "thumbs/" + rel


def last_log():
    p = "reports/publish/run.txt"
    return open(p, encoding="utf-8").read().strip().splitlines() if os.path.exists(p) else []


SCROPS = (yaml.safe_load(open("config/story_crops.yml")) or {}).get("story_crops", {}) if os.path.exists("config/story_crops.yml") else {}
CROPS = (yaml.safe_load(open("config/crops.yml")) or {}).get("crops", {}) if os.path.exists("config/crops.yml") else {}


def crop_info(it, out):
    """Original image + current hand crops, for the in-app crop editor (feed carousels only)."""
    stem = re.sub(r"-\d\d(-full)?\.jpg$", "", it["slides"][0]) if it.get("slides") else None
    src = f"reports/{it['project']}/preview/{stem}.jpg" if stem else None
    if not src or not os.path.exists(src) or len(it["slides"]) < 2:
        return {}
    w, h = Image.open(src).size
    lg = thumb(src, out, f"portfolio/{it['project']}/lg_{stem}.jpg", (1400, 1400))
    pc = CROPS.get(stem, [])
    sc = SCROPS.get(stem) or ([[pc[0][0] if pc else 0.5, 0.5, 1.0]] + pc)
    return {"stem": stem, "orig": lg, "orig_ratio": w / h, "crops": CROPS.get(stem, []), "story_crops": sc}


def build(out):
    os.makedirs(os.path.join(out, "store"), exist_ok=True)
    state = json.load(open("queue/published.json")) if os.path.exists("queue/published.json") else {}
    log = last_log()
    errs = {}
    for l in log:
        m = re.match(r"ERR (\S+): (.*)", l)
        if m:
            errs[m.group(1)] = m.group(2)
    days = {}

    def status(approved, pkey):
        rec = state.get(pkey)
        if rec and rec.get("skipped"):
            return "skipped", None
        if rec and rec.get("ig"):
            return "published", rec.get("ig_link")
        if pkey in errs:
            return "error", None
        return ("approved" if approved else "pending"), None

    for f in sorted(glob.glob("queue/week-*.yml")):
        for it in yaml.safe_load(open(f, encoding="utf-8")) or []:
            it["date"] = str(it["date"])
            pkey = f"{it['date']}_{it['project']}"
            st, link = status(it.get("approved"), pkey)
            sl = [thumb(f"reports/{it['project']}/ig/{s}", out, f"{it['project']}/ig/{s}", (240, 300)) for s in it["slides"]]
            sl = [s for s in sl if s]
            days.setdefault(it["date"], []).append({
                "key": feed_key(it), "type": "feed", "time": it["time"], "project": it["project"],
                "project_title": TITLES.get(it["project"], it["project"]), "caption": it.get("caption_en", ""),
                "thumb": sl[0] if sl else None, "slides": sl, "status": st, "link": link,
                "full": [f"{FILA}/{it['project']}/{quote(x)}" for x in it["slides"]], "caption_pt": it.get("caption_pt", ""),
                **crop_info(it, out),
                "note": errs.get(pkey, "")})
    for f in sorted(glob.glob("queue/social-week-*.yml")):
        for it in yaml.safe_load(open(f, encoding="utf-8")) or []:
            it["date"] = str(it["date"])
            pkey = f"{it['date']}_{it['time']}_{it['type']}_{it['file']}"
            st, link = status(it.get("approved"), pkey)
            src = f"reports/{it['project']}/{it['type']}/{it['cover'] if it['type'] == 'reel' else it['file']}"
            th = thumb(src, out, f"{it['project']}/{it['type']}/{os.path.basename(src)}", (180, 320))
            days.setdefault(it["date"], []).append({
                "key": social_key(it), "type": it["type"], "time": it["time"], "project": it["project"],
                "project_title": TITLES.get(it["project"], it["project"]), "caption": it.get("caption_en", ""),
                "thumb": th, "status": st, "link": link, "note": errs.get(pkey, ""), "caption_pt": it.get("caption_pt", ""),
                "full": [f"{FILA}/{it['project']}/{it['type']}/{quote(it['file'])}"]})
    cal = [{"date": d, "items": sorted(v, key=lambda x: x["time"])} for d, v in sorted(days.items())]

    now = datetime.datetime.now(TZ)
    today = now.date().isoformat()
    alerts = []
    cool = state.get("_cooldown_until")
    if cool and now < datetime.datetime.fromisoformat(cool):
        alerts.append({"level": "err", "text": f"Instagram recusou a última publicação. O robô volta a tentar sozinho às {datetime.datetime.fromisoformat(cool).astimezone(TZ):%H:%M}."})
    elif errs:
        alerts.append({"level": "err", "text": "Última tentativa no Instagram falhou (bloqueio temporário da Meta às legendas via API). O robô volta a tentar sozinho."})
    approved_days = {d["date"] for d in cal for i in d["items"] if i["type"] == "feed" and i["status"] in ("approved", "published") and d["date"] >= today}
    if len(approved_days) < 7:
        alerts.append({"level": "warn", "text": f"Só há {len(approved_days)} dias de posts aprovados à frente. Aprova no Calendário."})
    pend = sum(1 for d in cal for i in d["items"] if i["status"] == "pending")
    if pend:
        alerts.append({"level": "info", "text": f"{pend} publicações à espera do teu ✅ no Calendário."})

    ig_ok = any(v.get("ig") for v in state.values() if isinstance(v, dict))
    networks = [
        {"name": "Instagram", "status": "a publicar" if ig_ok and not errs else ("bloqueio temporário" if errs else "ligado"), "level": "err" if errs else ""},
        {"name": "Facebook (página)", "status": "espelho do Instagram"},
        {"name": "Pinterest", "status": "por ligar"},
        {"name": "YouTube Shorts", "status": "por ligar"},
        {"name": "LinkedIn", "status": "por ligar"},
        {"name": "Site · Behance · CG", "status": "manual (kit pronto)"},
    ]

    reg = yaml.safe_load(open("projects/registry.yml")) or {}
    reg = reg.get("projects", []) if isinstance(reg, dict) else reg
    projects = []
    for p in reg:
        pid = p["id"]
        ig = glob.glob(f"reports/{pid}/ig/*.jpg")
        stems = {re.sub(r"-\d\d(-full)?\.jpg$", "", os.path.basename(x)) for x in ig}
        posts = [i for d in cal for i in d["items"] if i["project"] == pid and i["type"] == "feed"]
        cover = None
        if posts and posts[0]["slides"]:
            cover = posts[0]["slides"][-1]
        projects.append({
            "id": pid, "title": p.get("title", pid), "mega": p.get("mega") or "",
            "status": "a publicar" if posts else ("série" if p.get("status") == "series" else ("à espera do link" if not p.get("mega") else "por processar")),
            "level": "approved" if posts else "pending",
            "images": len(stems) or None, "stories": len(glob.glob(f"reports/{pid}/story/*.jpg")),
            "reels": len(glob.glob(f"reports/{pid}/reel/*.mp4")),
            "posts_total": len(posts), "posts_published": sum(1 for i in posts if i["status"] == "published"),
            "cover": cover})
    for t in ["School Building", "10 Moradias SFM", "Corim", "Vivendas Aveleda", "Apartamentos Cete 2026", "Casas Mouriz Respirar Arte"]:
        if not any(t.lower() in x["title"].lower() for x in projects):
            projects.append({"id": t, "title": t, "mega": "", "status": "à espera do link", "level": "pending"})

    links = [
        {"group": "Os meus sites", "title": "boundvisuals.com", "url": "https://www.boundvisuals.com"},
        {"group": "Os meus sites", "title": "Instagram @vitorhugo_boundvisuals", "url": "https://www.instagram.com/vitorhugo_boundvisuals/"},
        {"group": "Os meus sites", "title": "Behance · Bound Visuals", "url": "https://www.behance.net/boundvisuals"},
        {"group": "Os meus sites", "title": "Behance · Vítor Hugo", "url": "https://www.behance.net/criativovitorhugo"},
        {"group": "Planos e documentos", "title": "Dossier vivo", "url": "https://claude.ai/artifact/SSokUsyAh7x3PpswQvWo6k"},
        {"group": "Planos e documentos", "title": "Plano mestre", "url": "https://claude.ai/artifact/CiMZbhepRpkE2qYCfgMwCw"},
        {"group": "Planos e documentos", "title": "Briefings Daily Study", "url": "https://github.com/boundvisuals/boundvisuals-site/blob/main/docs/daily-study-briefings.md"},
        {"group": "Planos e documentos", "title": "Kit de lançamento (site/Behance/CG)", "url": "https://github.com/boundvisuals/boundvisuals-site/blob/main/docs/kit-lancamento-3-projetos.md"},
        {"group": "Ferramentas", "title": "wp-admin", "url": "https://www.boundvisuals.com/wp-admin/"},
        {"group": "Ferramentas", "title": "Meta Business Suite", "url": "https://business.facebook.com/latest/home"},
        {"group": "Ferramentas", "title": "Robôs (GitHub)", "url": "https://github.com/boundvisuals/boundvisuals-site/actions"},
        {"group": "Ferramentas", "title": "Repositório", "url": "https://github.com/boundvisuals/boundvisuals-site"},
        {"group": "Pastas MEGA", "title": "Daily Study - 2026", "url": "https://mega.nz/folder/b64hGZTD#IheHOIoJhFdssIbmGt5mUg"},
    ]
    for p in reg:
        if p.get("mega") and p["id"] != "daily-study-2026":
            links.append({"group": "Pastas MEGA", "title": p.get("title", p["id"]), "url": p["mega"]})

    tasks = yaml.safe_load(open("docs/tasks.yml", encoding="utf-8")) or []
    profile = yaml.safe_load(open("docs/profile.yml", encoding="utf-8")) if os.path.exists("docs/profile.yml") else {}
    replies = yaml.safe_load(open("docs/inbox-replies.yml", encoding="utf-8")) if os.path.exists("docs/inbox-replies.yml") else {}
    portfolio = []
    cat = lambda st: "Interior" if re.search(r"(?i)interior|int\d", st) else ("Exterior" if re.search(r"(?i)exterior|front|back|frente|ext", st) else "Outro")
    for p in reg:
        prev = sorted(glob.glob(f"reports/{p['id']}/preview/*.jpg"))
        seen = set()
        for f in prev:
            st = os.path.basename(f)[:-4]
            if st.startswith("2026_-_FINAIS"):      # duplicate export folders
                continue
            sm = thumb(f, out, f"portfolio/{p['id']}/sm_{os.path.basename(f)}", (640, 640))
            lg = thumb(f, out, f"portfolio/{p['id']}/lg_{os.path.basename(f)}", (1400, 1400))
            if sm and st not in seen:
                seen.add(st)
                portfolio.append({"project": p["id"], "project_title": p.get("title", p["id"]), "cat": cat(st), "sm": sm, "lg": lg})
    gitlog = subprocess.run(["git", "log", "-12", "--date=format-local:%d/%m %H:%M", "--format=%ad  %s"], capture_output=True, text=True,
                            env={**os.environ, "TZ": "Europe/Lisbon"}).stdout.strip().splitlines()
    # timeline: robot + Claude actions (git) and publications (state)
    FR = [(r"^Publish log", "robot", "Robô de publicação correu"), (r"^Stories \+ reel: (.+)", "robot", r"Stories e reels gerados: \1"),
          (r"^Approved in the panel \((\d+)\)", "you", r"Aprovaste \1 publicações no painel"), (r"^Stats", "robot", "Números do Instagram atualizados"),
          (r"^Painel: ideas inbox", "you", "Nova ideia apontada"), (r"^Previews: (.+)", "robot", r"Pré-visualizações: \1"),
          (r"^Ingest|^Report: (.+)", "robot", "Imagens processadas"), (r"^Hand crops: (.+)", "claude", r"Recortes à mão: \1")]
    raw = subprocess.run(["git", "log", "-80", "--format=%aI\t%an\t%s"], capture_output=True, text=True).stdout.strip().splitlines()
    timeline, seen_log = [], None
    for line in raw:
        try:
            at, who, subj = line.split("\t", 2)
        except ValueError:
            continue
        kind, text = ("robot" if who == "bv-robot" else "claude"), subj
        for rx, k, t in FR:
            m = re.search(rx, subj)
            if m:
                try:
                    kind, text = k, (m.expand(t) if "\\" in t else t)
                except Exception:
                    kind, text = k, t.split("\\")[0]
                break
        if text == "Robô de publicação correu":
            if seen_log:
                continue
            seen_log = True
        timeline.append({"at": at, "kind": kind, "text": text})
    for k, v in state.items():
        if isinstance(v, dict) and v.get("ig"):
            timeline.append({"at": v.get("at"), "kind": "pub", "text": f"Publicado no Instagram: {k.replace('_', ' ')}", "link": v.get("ig_link")})
    timeline.sort(key=lambda x: x["at"] or "", reverse=True)
    stats = json.load(open("reports/meta/stats.json")) if os.path.exists("reports/meta/stats.json") else {}
    followers = json.load(open("reports/meta/followers.json")) if os.path.exists("reports/meta/followers.json") else {}
    data = {"generated_at": datetime.datetime.now(datetime.timezone.utc).isoformat(), "alerts": alerts, "networks": networks,
            "calendar": cal, "tasks": tasks, "studies": studies(), "profile": profile, "timeline": timeline[:60], "stats": stats, "followers": followers,
            "content_plan": yaml.safe_load(open("docs/content-plan.yml", encoding="utf-8")) if os.path.exists("docs/content-plan.yml") else {},
            "personal": yaml.safe_load(open("docs/personal-projects.yml", encoding="utf-8")) if os.path.exists("docs/personal-projects.yml") else [], "replies": replies or {}, "portfolio": portfolio, "projects": projects, "links": links,
            "log": (["Último robô de publicação:"] + log[-6:] + ["", "Últimas ações:"] + gitlog)}
    with open(os.path.join(out, "store", "data.json.php"), "w", encoding="utf-8") as fh:
        fh.write("<?php exit; ?>\n" + json.dumps(data, ensure_ascii=False))
    print(f"painel data: {sum(len(d['items']) for d in cal)} items, {len(tasks)} tasks, {len(projects)} projects")


def apply_crops(path):
    """Panel crop edits → config/crops.yml. Prints the project ids whose crops changed (one per line)."""
    edits = read_store(path)
    if not edits:
        return
    cfg = yaml.safe_load(open("config/crops.yml")) or {}
    cr = cfg.setdefault("crops", {})
    scfg = (yaml.safe_load(open("config/story_crops.yml")) or {}) if os.path.exists("config/story_crops.yml") else {}
    scr = scfg.setdefault("story_crops", {})
    changed, story_changed = set(), False
    for key, e in edits.items():
        new = [[round(float(v), 3) for v in c] for c in e.get("crops", [])]
        if key.startswith("story|"):
            stem = key[6:]
            if new and scr.get(stem) != new:
                scr[stem] = new; changed.add(e.get("project")); story_changed = True
            continue
        if new and cr.get(key) != new:
            cr[key] = new
            changed.add(e.get("project"))
    if story_changed:
        open("config/story_crops.yml", "w").write("# Full-screen 9:16 story crops [cx, cy, h] (s00, s01, …), edited in the Painel. Missing → derived from post crops.\n"
                                                  + yaml.safe_dump(scfg, allow_unicode=True, sort_keys=False, default_flow_style=None, width=200))
    if changed:
        hdr = "# Hand-composed 4:5 crops: [cx, cy, h] as fractions of the original. Edited by Claude and in the Painel crop editor.\n"
        open("config/crops.yml", "w").write(hdr + yaml.safe_dump(cfg, allow_unicode=True, sort_keys=False, default_flow_style=None, width=200))
    for p in sorted(x for x in changed if x):
        print(p)


def sync_slides():
    """Queue slides follow the files actually generated (crop count can change in the editor)."""
    n = 0
    for f in sorted(glob.glob("queue/week-*.yml")):
        txt = open(f, encoding="utf-8").read()
        head = "".join(l for l in txt.splitlines(True) if l.startswith("#"))
        items = yaml.safe_load(txt) or []
        ch = False
        for it in items:
            if not it.get("slides"):
                continue
            stem = re.sub(r"-\d\d(-full)?\.jpg$", "", it["slides"][0])
            real = sorted(os.path.basename(x) for x in glob.glob(f"reports/{it['project']}/ig/{glob.escape(stem)}-[0-9][0-9]*.jpg"))
            if real and real != it["slides"]:
                it["slides"] = real; ch = True; n += 1
        if ch:
            open(f, "w", encoding="utf-8").write(head + yaml.safe_dump(items, allow_unicode=True, sort_keys=False, width=240))
    print(n)


if __name__ == "__main__":
    if sys.argv[1] == "sync-slides":
        sync_slides(); sys.exit()
    if sys.argv[1] == "apply":
        apply(sys.argv[2])
    elif sys.argv[1] == "apply-crops":
        apply_crops(sys.argv[2])
    else:
        build(sys.argv[2])
