#!/usr/bin/env python3
"""Free daily job hunt (no AI, no credits). Reads public job feeds, keeps postings that match Vítor's three axes
(archviz/3D · AI image & video · performance ads/design), writes docs/opps-auto.yml (shown in Painel → Oportunidades
next to Claude's leads) and a ready-to-adapt kit per new lead in docs/kits/<id>.md.
Mechanical keyword filter → some noise; Vítor decides. Never applies to anything by itself.
"""
import json, re, datetime, hashlib, os, html, urllib.request, xml.etree.ElementTree as ET
import yaml

UA = {"User-Agent": "Mozilla/5.0 (bv-robot job feed reader)"}
NOW = datetime.datetime.utcnow()
KEEP_DAYS = 45
MAX = 40

AXES = {
    "3d": [r"arch\s*viz", r"archviz", r"architectural visuali", r"3d visuali[sz]", r"3d artist", r"cgi artist", r"corona render", r"3ds ?max",
           r"v-?ray", r"unreal engine", r"interior visuali", r"real estate render", r"product render", r"3d generalist", r"blender artist"],
    "ai": [r"comfy\s*ui", r"stable diffusion", r"generative ai (artist|designer|creative|video)", r"gen ?ai artist", r"ai (artist|video|image|creative)",
           r"ai[- ]generated (video|content)", r"\bflux\b", r"midjourney", r"runway", r"kling", r"veo ?3", r"seedance"],
    "ads": [r"performance creative", r"ad creative", r"\bugc\b", r"motion designer", r"creative strategist", r"paid social designer", r"video editor.*ads"],
}
BAD = [r"senior software", r"backend", r"frontend engineer", r"data engineer", r"devops", r"sales representative", r"account executive"]


def get(url, kind="json"):
    try:
        with urllib.request.urlopen(urllib.request.Request(url, headers=UA), timeout=25) as r:
            b = r.read()
        return json.loads(b) if kind == "json" else b
    except Exception as e:
        print("  feed failed:", url, type(e).__name__)
        return None


def clean(t, n=380):
    t = re.sub(r"<[^>]+>", " ", html.unescape(str(t or "")))
    t = re.sub(r"\s+", " ", t).strip()
    return t if len(t) <= n else t[: n - 1].rsplit(" ", 1)[0] + "…"


def feeds():
    out = []
    d = get("https://remoteok.com/api")
    for j in (d or [])[1:]:
        out.append(dict(title=j.get("position"), org=j.get("company"), url=j.get("url"), text=" ".join([j.get("description") or "", " ".join(j.get("tags") or [])]),
                        where=j.get("location") or "Remote", src="RemoteOK", date=(j.get("date") or "")[:10]))
    d = get("https://www.arbeitnow.com/api/job-board-api")
    for j in (d or {}).get("data", []):
        out.append(dict(title=j.get("title"), org=j.get("company_name"), url=j.get("url"), text=(j.get("description") or "") + " " + " ".join(j.get("tags") or []),
                        where=("Remote · " if j.get("remote") else "") + (j.get("location") or ""), src="Arbeitnow (EU)",
                        date=datetime.datetime.utcfromtimestamp(j.get("created_at") or 0).strftime("%Y-%m-%d")))
    for tag in ["3d", "design", "video"]:
        d = get(f"https://jobicy.com/api/v2/remote-jobs?count=50&tag={tag}")
        for j in (d or {}).get("jobs", []):
            out.append(dict(title=j.get("jobTitle"), org=j.get("companyName"), url=j.get("url"), text=(j.get("jobExcerpt") or "") + " " + (j.get("jobDescription") or ""),
                            where=j.get("jobGeo") or "Remote", src="Jobicy", date=(j.get("pubDate") or "")[:10]))
    d = get("https://himalayas.app/jobs/api?limit=100")
    for j in (d or {}).get("jobs", []):
        out.append(dict(title=j.get("title"), org=j.get("companyName"), url=j.get("applicationLink") or j.get("guid"), text=(j.get("excerpt") or "") + " " + (j.get("description") or ""),
                        where=", ".join(j.get("locationRestrictions") or []) or "Remote", src="Himalayas", date=str(j.get("pubDate") or "")[:10]))
    for cat in ["remote-design-jobs", "remote-full-stack-programming-jobs"][:1]:
        b = get(f"https://weworkremotely.com/categories/{cat}.rss", "raw")
        if b:
            try:
                for it in ET.fromstring(b).iter("item"):
                    t = it.findtext("title") or ""
                    org, _, title = t.partition(": ")
                    out.append(dict(title=title or t, org=org, url=it.findtext("link"), text=it.findtext("description") or "",
                                    where=it.findtext("region") or "Remote", src="We Work Remotely", date=""))
            except ET.ParseError:
                pass
    return out


def axis(j):
    blob = f"{j['title']} {j['title']} {j['text']}".lower()
    if any(re.search(b, blob) for b in BAD):
        return None, 0
    best, score = None, 0
    for ax, pats in AXES.items():
        s = sum(2 if re.search(p, (j["title"] or "").lower()) else 1 for p in pats if re.search(p, blob))
        if s > score:
            best, score = ax, s
    return best, score


KIT = {"3d": ("Portfolio_3D_Architecture_Visualization.pdf", "3D Architecture Visualization"),
       "ai": ("Portfolio_AI.pdf", "AI for Image & Video"),
       "ads": ("Portfolio_All.pdf", "Performance Ads + AI + 3D")}
HOOK = {"3d": "photoreal architectural visualization (3ds Max + Corona) finished with AI, with full coherence between angles",
        "ai": "AI image and video production (ComfyUI, Seedance, Kling, Veo, Nano Banana) on top of a solid 3D base",
        "ads": "performance ad creative in every format, with AI to test more ideas faster"}


def kit(l):
    pdf, label = KIT[l["axis"]]
    fu = (NOW + datetime.timedelta(days=7)).strftime("%d/%m")
    return f"""# Kit — {l['title']} · {l['org']}
_Gerado automaticamente pelo robô (modelo). Lê o anúncio e ajusta 2–3 frases antes de enviar._

**Anúncio:** {l['url']}
**Onde:** {l['where']} · **Fonte:** {l['src']}

## O que enviar
- Portfólio: **{label}** → https://www.boundvisuals.com/vitorhugo/files/{pdf.replace('.pdf', '_light.pdf')} (versão leve para email; HQ: …/files/{pdf})
- CV curto: https://www.boundvisuals.com/vitorhugo/files/CV_Vitor_Hugo_Short.pdf
- Site: https://www.boundvisuals.com/vitorhugo/
- Follow-up: **{fu}** (7 dias depois de enviar)

## Carta (EN)
Hi {l['org'] or 'there'} team,

I'm Vítor Hugo, a 3D artist and AI image & video specialist based in Portugal. I saw your opening for **{l['title']}** and it matches what I do every day: {HOOK[l['axis']]}.

A few things I'd bring from day one:
- Photoreal, client-ready images and films, delivered fast and organised.
- A modern pipeline that mixes 3D and AI where each one is strongest.
- Clear communication and quick iteration on feedback.

My portfolio ({label}) and CV are attached, and everything is also at boundvisuals.com/vitorhugo. I'd love to show you how I could help — happy to do a short test if useful.

Best regards,
Vítor Hugo · +351 913 215 170 · vitorhugobs@hotmail.com

## Carta (PT)
Olá, equipa {l['org'] or ''},

Sou o Vítor Hugo, artista 3D e especialista em imagem e vídeo com AI, em Portugal. Vi a vossa vaga de **{l['title']}** e encaixa no que faço todos os dias: {HOOK[l['axis']]}.

Envio o portfólio ({label}) e o CV; está tudo também em boundvisuals.com/vitorhugo. Terei todo o gosto em fazer um pequeno teste, se fizer sentido.

Cumprimentos,
Vítor Hugo · +351 913 215 170 · vitorhugobs@hotmail.com
"""


def main():
    old = (yaml.safe_load(open("docs/opps-auto.yml", encoding="utf-8")) or {}) if os.path.exists("docs/opps-auto.yml") else {}
    have = {l["id"]: l for l in old.get("leads", [])}
    new = 0
    for j in feeds():
        if not j.get("title") or not j.get("url"):
            continue
        ax, sc = axis(j)
        if not ax or sc < 2:
            continue
        lid = "auto-" + hashlib.sha1(j["url"].encode()).hexdigest()[:10]
        if lid in have:
            continue
        l = {"id": lid, "title": clean(j["title"], 120), "org": clean(j["org"], 80), "kind": "vaga", "url": j["url"], "axis": ax, "score": sc,
             "where": clean(j["where"], 80), "src": j["src"], "first_seen": NOW.strftime("%Y-%m-%d"),
             "notes": f"🤖 Encontrada pelo robô ({j['src']}, {NOW.strftime('%d/%m')}) · {clean(j['where'], 60)} · eixo {ax.upper()} · {clean(j['text'], 220)}"}
        have[lid] = l; new += 1
        os.makedirs("docs/kits", exist_ok=True)
        open(f"docs/kits/{lid}.md", "w", encoding="utf-8").write(kit(l))
    cut = (NOW - datetime.timedelta(days=KEEP_DAYS)).strftime("%Y-%m-%d")
    leads = sorted([l for l in have.values() if l["first_seen"] >= cut], key=lambda l: (l["first_seen"], l["score"]), reverse=True)[:MAX]
    keep = {l["id"] for l in leads}
    for f in os.listdir("docs/kits") if os.path.isdir("docs/kits") else []:
        if f.startswith("auto-") and f[:-3] not in keep:
            os.remove(os.path.join("docs/kits", f))
    yaml.safe_dump({"updated": NOW.strftime("%Y-%m-%d %H:%M UTC"), "new_today": new, "leads": leads},
                   open("docs/opps-auto.yml", "w", encoding="utf-8"), allow_unicode=True, sort_keys=False, width=1000)
    print(f"leads: {len(leads)} kept, {new} new")


if __name__ == "__main__":
    main()
