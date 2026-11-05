#!/usr/bin/env python3
"""Reminders for Vítor's phone (Painel Web Push). Runs inside the painel robot every ~10 min.
  notify.py <out.json.php>   → writes the notifications that are due RIGHT NOW (Lisbon time); push.php?a=run sends each id once.
Rules (quiet hours: nothing before 08:00 or after 23:00):
  - Sunday 19:00     week ahead: posts/stories/reels still to approve + Vítor's tasks due that week
  - eve 19:00        each open task of Vítor with a date ("qui 5 nov", "sex 6 nov 10:00") → "Amanhã: …" (skipped if ticked in the panel)
  - daily 10:00      prepared feed queue ends in < 7 days
  - daily 20:00      digest of what Claude did alone today (claude-log)
  - any time         a new Claude reply to one of his Ideias (last 12 h)
"""
import sys, os, re, glob, json, datetime
from zoneinfo import ZoneInfo
import yaml

TZ = ZoneInfo("Europe/Lisbon")
MONTHS = {m: i + 1 for i, m in enumerate("jan fev mar abr mai jun jul ago set out nov dez".split())}
WD = "seg ter qua qui sex sáb dom".split()


def y(p, default=None):
    try:
        return yaml.safe_load(open(p, encoding="utf-8")) or default
    except Exception:
        return default


def parse_due(s, today):
    m = re.search(r"(\d{1,2})\s+(jan|fev|mar|abr|mai|jun|jul|ago|set|out|nov|dez)", str(s or "").lower())
    if not m:
        return None
    mon, day = MONTHS[m.group(2)], int(m.group(1))
    year = today.year + (1 if mon < today.month - 2 else 0)
    try:
        return datetime.date(year, mon, day)
    except ValueError:
        return None


def queue_items():
    out = []
    for f in sorted(glob.glob("queue/*.yml")):
        d = y(f, [])
        items = d if isinstance(d, list) else (d.get("items") or d.get("posts") or []) if isinstance(d, dict) else []
        kind = "social" if "social-" in os.path.basename(f) else "feed"
        for it in items:
            if isinstance(it, dict) and it.get("date"):
                out.append({"date": str(it["date"]), "approved": bool(it.get("approved")), "kind": kind, "type": it.get("type", "post")})
    return out


def short(t, n=150):
    t = re.sub(r"\s+", " ", str(t or "")).strip()
    return t if len(t) <= n else t[: n - 1].rsplit(" ", 1)[0] + "…"


def due_now(now):
    today, h = now.date(), now.hour
    res = []
    if h < 8 or h >= 23:
        return res
    tasks = [t for t in (y("docs/tasks.yml", []) or []) if isinstance(t, dict)]
    mine = [t for t in tasks if t.get("owner") == "vitor" and not t.get("done")]

    if today.weekday() == 6 and h >= 19:
        mon = today + datetime.timedelta(days=1)
        sun = mon + datetime.timedelta(days=6)
        q = [i for i in queue_items() if mon.isoformat() <= i["date"] <= sun.isoformat()]
        todo = [i for i in q if not i["approved"]]
        feed = sum(1 for i in todo if i["kind"] == "feed")
        week_tasks = [t for t in mine if (d := parse_due(t.get("due"), today)) and mon <= d <= sun]
        body = (f"{feed} post{'s' if feed != 1 else ''} e {len(todo) - feed} stories/reels por aprovar ({mon.day}–{sun.day}/{sun.month})." if todo
                else f"Semana {mon.day}–{sun.day}/{sun.month} toda aprovada ✓.")
        if week_tasks:
            body += " Tuas: " + "; ".join(short(t["title"], 50) for t in week_tasks[:3])
        res.append({"id": f"sun-{today}", "title": "Semana a aprovar", "body": body, "url": "/painel/"})

    if h >= 19:
        for t in mine:
            d = parse_due(t.get("due"), today)
            if d and d == today + datetime.timedelta(days=1):
                hm = re.search(r"\b(\d{1,2}:\d{2})\b", str(t.get("due")))
                res.append({"id": f"due-{t.get('id')}-{d}", "task": t.get("id"), "title": f"Amanhã ({WD[d.weekday()]}{' ' + hm.group(1) if hm else ''}): {short(t.get('title'), 60)}",
                            "body": short(t.get("detail") or "Abre o Painel → Tarefas.", 160), "url": "/painel/"})

    if h >= 10:
        feed_dates = sorted(i["date"] for i in queue_items() if i["kind"] == "feed")
        if feed_dates:
            last = datetime.date.fromisoformat(feed_dates[-1][:10])
            left = (last - today).days
            if left < 7:
                res.append({"id": f"queue-{today}", "title": f"Fila curta: posts só até {last.day}/{last.month}",
                            "body": "Faltam projetos novos. Manda-me links MEGA (Ideias) para eu preparar mais semanas.", "url": "/painel/"})

    replies = y("docs/inbox-replies.yml", {}) or {}
    log = [m for m in (replies.get("claude-log") or []) if isinstance(m, dict)]
    if h >= 20:
        todays = [m for m in log if str(m.get("at", ""))[:10] and datetime.datetime.fromisoformat(str(m["at"])).astimezone(TZ).date() == today]
        if todays:
            todays.sort(key=lambda m: str(m.get("at")), reverse=True)
            body = short(re.sub(r"^Sessão automática( \(pequena\))?:\s*", "", todays[0].get("text", "")), 140)
            title = "O Claude trabalhou hoje" + (f" ({len(todays)} sessões)" if len(todays) > 1 else "")
            res.append({"id": f"digest-{today}", "title": title, "body": body, "url": "/painel/"})

    for key, val in replies.items():
        if key == "claude-log" or not isinstance(val, list):
            continue
        for m in val:
            try:
                at = datetime.datetime.fromisoformat(str(m.get("at")))
            except Exception:
                continue
            if datetime.timedelta(0) <= now - at <= datetime.timedelta(hours=12):
                res.append({"id": f"reply-{key}-{m.get('at')}", "title": "Resposta em Ideias", "body": short(m.get("text"), 160), "url": "/painel/"})
    return res


if __name__ == "__main__":
    now = datetime.datetime.now(TZ)
    if len(sys.argv) > 2:                      # test: notify.py out 2026-11-08T19:30
        now = datetime.datetime.fromisoformat(sys.argv[2]).replace(tzinfo=TZ)
    items = due_now(now)
    os.makedirs(os.path.dirname(os.path.abspath(sys.argv[1])), exist_ok=True)
    with open(sys.argv[1], "w", encoding="utf-8") as f:
        f.write("<?php exit; ?>\n" + json.dumps(items, ensure_ascii=False, indent=1))
    print(len(items))
