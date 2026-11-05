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
    reset = open("queue/approvals_reset.txt").read().strip() if os.path.exists("queue/approvals_reset.txt") else ""
    if reset:   # approvals made before a reset (e.g. "desaprova tudo") are ignored
        appr = {k: v for k, v in appr.items() if (v.get("at", "") if isinstance(v, dict) else v) >= reset}
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


def copy_texts(it, n):
    """Exactly what the robot puts on Instagram, for manual copy while the API refuses captions/comments."""
    os.environ.setdefault("META_TOKEN", "x")
    sys.path.insert(0, "scripts")
    import publish as P
    it2 = dict(it); it2["_n"] = n
    return {"copy_caption": P.caption(it2), "copy_comments": P.extra_hashtag_comments(n) if P.INS.get("hashtags_extra_comments") else []}


def fhash(p):
    import hashlib
    try:
        return hashlib.sha1(open(p, "rb").read()).hexdigest()[:10]
    except OSError:
        return "0"


def story_info(it, out):
    """Story → its source image + index, so the 9:16 crop can be edited in the panel."""
    if it.get("type") != "story":
        return {}
    m = re.match(r"(.+)-s(\d\d)\.jpg$", it["file"])
    if not m:
        return {}
    stem, idx = m.group(1), int(m.group(2))
    src = f"reports/{it['project']}/preview/{stem}.jpg"
    if not os.path.exists(src):
        return {}
    w, h = Image.open(src).size
    lg = thumb(src, out, f"portfolio/{it['project']}/lg_{stem}.jpg", (1400, 1400))
    pc = CROPS.get(stem, [])
    sc = SCROPS.get(stem) or ([[pc[0][0] if pc else 0.5, 0.5, 1.0]] + pc)
    return {"stem": stem, "story_idx": idx, "orig": lg, "orig_ratio": w / h, "crops": pc, "story_crops": sc}


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

    feed_n = -1
    for f in sorted(glob.glob("queue/week-*.yml")):
        for it in yaml.safe_load(open(f, encoding="utf-8")) or []:
            feed_n += 1
            it["date"] = str(it["date"])
            pkey = f"{it['date']}_{it['project']}"
            st, link = status(it.get("approved"), pkey)
            sl = [thumb(f"reports/{it['project']}/ig/{s}", out, f"{it['project']}/ig/{s}", (240, 300)) for s in it["slides"]]
            sl = [s for s in sl if s]
            days.setdefault(it["date"], []).append({
                "key": feed_key(it), "type": "feed", "time": it["time"], "project": it["project"],
                "project_title": TITLES.get(it["project"], it["project"]), "caption": it.get("caption_en", ""),
                "thumb": sl[0] if sl else None, "slides": sl, "status": st, "link": link,
                "full": [f"{FILA}/{it['project']}/{quote(x)}?v={fhash(f'reports/{it[chr(112)+chr(114)+chr(111)+chr(106)+chr(101)+chr(99)+chr(116)]}/ig/{x}')}" for x in it["slides"]], "caption_pt": it.get("caption_pt", ""),
                **crop_info(it, out), **copy_texts(it, feed_n),
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
                "full": [f"{FILA}/{it['project']}/{it['type']}/{quote(it['file'])}"], **story_info(it, out)})
    cal = [{"date": d, "items": sorted(v, key=lambda x: x["time"])} for d, v in sorted(days.items())]

    now = datetime.datetime.now(TZ)
    today = now.date().isoformat()
    alerts = []
    WD_PT = ["seg", "ter", "qua", "qui", "sex", "sáb", "dom"]
    cool = state.get("_cooldown_until")
    if cool and now < datetime.datetime.fromisoformat(cool):
        cd = datetime.datetime.fromisoformat(cool).astimezone(TZ)
        when = f"{cd:%H:%M}" if cd.date() == now.date() else f"{WD_PT[cd.weekday()]} {cd:%d/%m} às {cd:%H:%M}"
        nxt = next(((d["date"], i) for d in cal for i in d["items"] if i["type"] == "feed" and i["status"] == "approved"
                    and f'{d["date"]} {i["time"]}' >= f"{cd:%Y-%m-%d %H:%M}"), None)
        txt = f"Pausa no Instagram: nada publica até {when} (a seguir o robô retoma sozinho)."
        if nxt:
            nd = datetime.date.fromisoformat(nxt[0])
            txt += f" Próximo post aprovado: {WD_PT[nd.weekday()]} {nd:%d/%m} às {nxt[1]['time']} · {nxt[1]['project_title']}."
        alerts.append({"level": "err", "text": txt})
    elif errs:
        alerts.append({"level": "err", "text": "Última tentativa no Instagram falhou (bloqueio temporário da Meta às legendas via API). O robô volta a tentar sozinho."})
    approved_days = {d["date"] for d in cal for i in d["items"] if i["type"] == "feed" and i["status"] in ("approved", "published") and d["date"] >= today}
    if len(approved_days) < 7:
        alerts.append({"level": "warn", "text": (f"Só há {len(approved_days)} dia de posts aprovados à frente. Aprova no Calendário." if len(approved_days) == 1 else f"Só há {len(approved_days)} dias de posts aprovados à frente. Aprova no Calendário." if approved_days else "Não há posts aprovados à frente. Aprova no Calendário.")})
    feed_days = [d["date"] for d in cal for i in d["items"] if i["type"] == "feed"]
    if feed_days:
        end = datetime.date.fromisoformat(max(feed_days))
        if (end - now.date()).days < 21:
            alerts.append({"level": "warn", "text": f"A fila de posts acaba a {end:%d/%m}. Preciso de projetos novos: envia links MEGA (Tarefas) ou faz Daily Studies."})
    # Rotation check (A, B, C…): warn when the same project fills 3+ feed days in a row.
    feed_seq = sorted((d["date"], i["project"], i["project_title"]) for d in cal for i in d["items"]
                      if i["type"] == "feed" and i["status"] != "published" and d["date"] >= today)
    runs, cur = [], []
    for row in feed_seq:
        if cur and row[1] == cur[-1][1]:
            cur.append(row)
        else:
            if len(cur) >= 3:
                runs.append(cur)
            cur = [row]
    if len(cur) >= 3:
        runs.append(cur)
    if runs:
        first = datetime.date.fromisoformat(runs[0][0][0])
        longest = max(runs, key=len)
        alerts.append({"level": "warn", "text": f"A partir de {first:%d/%m} a fila repete o mesmo projeto em dias seguidos "
                       f"(ex.: {longest[0][2]}, {len(longest)} dias de {datetime.date.fromisoformat(longest[0][0]):%d/%m} a {datetime.date.fromisoformat(longest[-1][0]):%d/%m}). "
                       "Com mais projetos (links MEGA em Tarefas) ou Daily Studies volto a alternar A, B, C."})
    pend = sum(1 for d in cal for i in d["items"] if i["status"] == "pending")
    if pend:
        alerts.append({"level": "info", "text": f"{pend} publicações à espera do teu ✅ no Calendário."})

    ig_ok = any(v.get("ig") for v in state.values() if isinstance(v, dict))
    networks = [
        {"name": "Instagram", "status": (f"em pausa até {datetime.datetime.fromisoformat(cool).astimezone(TZ):%d/%m %H:%M}" if cool and now < datetime.datetime.fromisoformat(cool)
                                         else "a publicar" if ig_ok and not errs else ("bloqueio temporário" if errs else "ligado")),
         "level": "err" if errs or (cool and now < datetime.datetime.fromisoformat(cool)) else ""},
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
        {"group": "Planos e documentos", "title": "Orçamento na 1.ª pessoa (PT + EN)", "url": "https://github.com/boundvisuals/boundvisuals-site/blob/main/docs/orcamento-1a-pessoa.md"},
        {"group": "Planos e documentos", "title": "Textos do site na 1.ª pessoa", "url": "https://github.com/boundvisuals/boundvisuals-site/blob/main/docs/textos-1a-pessoa.md"},
        {"group": "Ferramentas", "title": "Ligar redes (Pinterest, LinkedIn, YouTube)", "url": "/painel/ligar.php"},
        {"group": "Ferramentas", "title": "wp-admin", "url": "https://www.boundvisuals.com/wp-admin/"},
        {"group": "Ferramentas", "title": "Meta Business Suite", "url": "https://business.facebook.com/latest/home"},
        {"group": "Ferramentas", "title": "Robôs (GitHub)", "url": "https://github.com/boundvisuals/boundvisuals-site/actions"},
        {"group": "Ferramentas", "title": "Repositório", "url": "https://github.com/boundvisuals/boundvisuals-site"},
        {"group": "Capas dos destaques (Instagram)", "title": "Pré-visualização das 3 cores", "url": "https://github.com/boundvisuals/boundvisuals-site/blob/main/reports/highlights/preview.png"},
        {"group": "Capas dos destaques (Instagram)", "title": "Escuras (preto + ícone claro)", "url": "https://github.com/boundvisuals/boundvisuals-site/tree/main/reports/highlights/dark"},
        {"group": "Capas dos destaques (Instagram)", "title": "Cinza quente", "url": "https://github.com/boundvisuals/boundvisuals-site/tree/main/reports/highlights/grey"},
        {"group": "Capas dos destaques (Instagram)", "title": "Claras", "url": "https://github.com/boundvisuals/boundvisuals-site/tree/main/reports/highlights/light"},
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
            "calendar": cal, "tasks": tasks, "studies": studies(), "profile": profile, "kits": {os.path.basename(k)[:-3]: open(k, encoding="utf-8").read() for k in glob.glob("docs/kits/*.md")}, "decisions": (yaml.safe_load(open("docs/decisions.yml", encoding="utf-8")) or []) if os.path.exists("docs/decisions.yml") else [], "timeline": timeline[:60], "stats": stats, "followers": followers,
            "content_plan": yaml.safe_load(open("docs/content-plan.yml", encoding="utf-8")) if os.path.exists("docs/content-plan.yml") else {},
            "opp_sources": (yaml.safe_load(open("docs/opps-sources.yml", encoding="utf-8")) or {}) if os.path.exists("docs/opps-sources.yml") else {},
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


def apply_captions(path):
    """Caption edits made in the panel → queue files. Prints number of items changed."""
    ed = read_store(path)
    n = 0
    for f in sorted(glob.glob("queue/week-*.yml")) + sorted(glob.glob("queue/social-week-*.yml")):
        txt = open(f, encoding="utf-8").read()
        head = "".join(l for l in txt.splitlines(True) if l.startswith("#"))
        items = yaml.safe_load(txt) or []
        ch = False
        for it in items:
            d = str(it["date"])
            k = social_key({**it, "date": d}) if "type" in it else feed_key({**it, "date": d})
            e = ed.get(k)
            if e and (it.get("caption_en") != e["en"] or it.get("caption_pt") != e["pt"]):
                it["caption_en"], it["caption_pt"] = e["en"], e["pt"]; ch = True; n += 1
        if ch:
            open(f, "w", encoding="utf-8").write(head + yaml.safe_dump(items, allow_unicode=True, sort_keys=False, width=240))
    print(n)


REEL_CAP = {
    "apartamentos-gondomar-2": ("Apartamentos Gondomar 2, slowly: facade, living rooms and bedrooms.", "Apartamentos Gondomar 2, devagar: fachada, salas e quartos."),
    "vivendas-duas-igrejas": ("Duas Igrejas, slowly: garden, timber and light. Penafiel.", "Duas Igrejas, devagar: jardim, madeira e luz. Penafiel."),
    "vivendas-cete": ("Vivendas Cête, slowly, from the street to the rooms. Penafiel.", "Vivendas Cête, devagar, da rua até às divisões. Penafiel."),
    "gold-village": ("Gold Village, slowly: timber, green balconies and calm interiors.", "Gold Village, devagar: madeira, varandas verdes e interiores calmos."),
}


def sync_reels():
    """Every generated reel gets a slot: unscheduled reels are appended at 12:30 every 2 days after the last reel (unapproved)."""
    import datetime as dt
    files = sorted(glob.glob("queue/social-week-*.yml"))
    allit = []
    for f in files:
        allit += yaml.safe_load(open(f, encoding="utf-8")) or []
    have = {(x["project"], x["file"]) for x in allit if x.get("type") == "reel"}
    reels = sorted(glob.glob("reports/*/reel/*-reel*.mp4"))
    new = [(r.split("/")[1], os.path.basename(r)) for r in reels if (r.split("/")[1], os.path.basename(r)) not in have]
    if not new:
        print(0); return
    last = max([dt.date.fromisoformat(str(x["date"])) for x in allit if x.get("type") == "reel"] or [dt.date.today()])
    # interleave projects
    byp = {}
    for p_, f_ in new:
        byp.setdefault(p_, []).append(f_)
    order = []
    while any(byp.values()):
        for p_ in list(byp):
            if byp[p_]:
                order.append((p_, byp[p_].pop(0)))
    extra = []
    for k, (p_, f_) in enumerate(order):
        d = last + dt.timedelta(days=2 * (k + 1))
        n = re.search(r"-reel-(\d+)\.mp4$", f_)
        part = f" (part {int(n.group(1))})" if n else ""
        en, pt = REEL_CAP.get(p_, (TITLES.get(p_, p_), TITLES.get(p_, p_)))
        extra.append({"date": d.isoformat(), "time": "12:30", "type": "reel", "project": p_, "file": f_, "cover": f_[:-4] + "-cover.jpg",
                      "caption_en": en + part, "caption_pt": pt + part.replace("part", "parte"), "approved": False})
    fx = "queue/social-week-90-reels.yml"
    cur = (yaml.safe_load(open(fx, encoding="utf-8")) or []) if os.path.exists(fx) else []
    open(fx, "w", encoding="utf-8").write("# Extra reels scheduled automatically (all project images covered). Unapproved.\n"
                                         + yaml.safe_dump(cur + extra, allow_unicode=True, sort_keys=False, width=240))
    print(len(extra))


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
    if sys.argv[1] == "apply-captions":
        apply_captions(sys.argv[2]); sys.exit()
    if sys.argv[1] == "sync-reels":
        sync_reels(); sys.exit()
    if sys.argv[1] == "sync-slides":
        sync_slides(); sys.exit()
    if sys.argv[1] == "apply":
        apply(sys.argv[2])
    elif sys.argv[1] == "apply-crops":
        apply_crops(sys.argv[2])
    else:
        build(sys.argv[2])
