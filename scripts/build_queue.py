#!/usr/bin/env python3
"""Builds queue/week-02..04.yml (feed) and queue/social-week-02..04.yml (stories + reels), all approved: false,
from the hand-cropped slides in reports/<project>/{ig,story,reel}. Run after ingest + make-social finished.
usage: python scripts/build_queue.py [start_date=2026-11-10] [weeks=3]
"""
import sys, glob, os, datetime, yaml

START = datetime.date.fromisoformat(sys.argv[1]) if len(sys.argv) > 1 else datetime.date(2026, 11, 10)
WEEKS = int(sys.argv[2]) if len(sys.argv) > 2 else 3

G2, VDI, CET, GV = "apartamentos-gondomar-2", "vivendas-duas-igrejas", "vivendas-cete", "gold-village"
# (project, stem, caption_en, caption_pt) in publishing order, interleaved A,B,C,D
FEED = [
 (G2, "1_-_Exterior1_1-exterior1_edit_0001", "Dark cladding, planted balconies and a quiet path to the door. Apartamentos Gondomar 2.", "Revestimento escuro, varandas com plantas e um caminho calmo até à porta. Apartamentos Gondomar 2."),
 (VDI, "root_4_-_exterior_frente_webp", "The street view: a row of timber-toned houses at dusk, with the neighbourhood moving past. Duas Igrejas, Penafiel.", "A vista da rua: uma fila de moradias em tons de madeira ao fim do dia, com o bairro a passar. Duas Igrejas, Penafiel."),
 (GV, "3_-_exterior3_3_exterior3", "Timber slats, green balconies and a cobbled street at golden hour. Gold Village.", "Ripado de madeira, varandas verdes e uma rua em calçada à hora dourada. Gold Village."),
 (CET, "6-exterior2_6-exterior2", "Grey sky, white volumes and an ordinary street that feels lived in. Vivendas Cête, Penafiel.", "Céu cinzento, volumes brancos e uma rua comum que parece vivida. Vivendas Cête, Penafiel."),
 (G2, "5_-_Exterior5_5-exterior5_edit_0001", "Six floors, one calm facade. Rhythm, shade and a meadow in front. Apartamentos Gondomar 2.", "Seis pisos, uma fachada calma. Ritmo, sombra e um prado à frente. Apartamentos Gondomar 2."),
 (VDI, "root_6-interior3_webp", "Warm light, a timber wardrobe and a bed made for slow mornings. Duas Igrejas, Penafiel.", "Luz quente, um roupeiro em madeira e uma cama feita para manhãs lentas. Duas Igrejas, Penafiel."),
 (GV, "8_-_interior1_8-interior1", "Open kitchen, timber slats and a living room that fills with daylight. Gold Village.", "Cozinha aberta, ripado de madeira e uma sala que se enche de luz do dia. Gold Village."),
 (CET, "3-interior3_3-interior3", "A bedroom in soft grey and white, with a little warmth from the floor. Vivendas Cête, Penafiel.", "Um quarto em cinzentos suaves e branco, com um pouco de calor vindo do chão. Vivendas Cête, Penafiel."),
 (G2, "10_-_Interior_3_10-interior3_edit_0001", "Coffee on the sofa and a kitchen that stays out of the way. Apartamentos Gondomar 2.", "Café no sofá e uma cozinha que não se intromete. Apartamentos Gondomar 2."),
 (VDI, "root_7-interior4_webp", "Looking down the stairwell: timber, white walls and a plant catching the light. Duas Igrejas, Penafiel.", "A olhar para a caixa de escadas: madeira, paredes brancas e uma planta a apanhar luz. Duas Igrejas, Penafiel."),
 (GV, "9_-_interior2_9-interior2", "Two pendants, a breakfast bar and someone reading in the corner. Gold Village.", "Dois candeeiros suspensos, um balcão de pequeno-almoço e alguém a ler no canto. Gold Village."),
 (G2, "8_-_Interior_1_8-interior1_edit_0001", "Stools, a breakfast bar and a living room that never feels far away. Apartamentos Gondomar 2.", "Bancos, um balcão de pequeno-almoço e uma sala que nunca fica longe. Apartamentos Gondomar 2."),
 (CET, "2-interior2_2-interior2", "Up the stairs, past the timber slats and into the light. Vivendas Cête, Penafiel.", "Escadas acima, ao lado do ripado de madeira e para dentro da luz. Vivendas Cête, Penafiel."),
 (VDI, "root_5-interior2_webp", "A long hallway with a runner and a morning on the stairs. Duas Igrejas, Penafiel.", "Um corredor comprido com passadeira e uma manhã nas escadas. Duas Igrejas, Penafiel."),
 (GV, "11_-_interior4_11-interior4", "Black marble, a white robe and a morning that starts slowly. Gold Village.", "Mármore preto, um roupão branco e uma manhã que começa devagar. Gold Village."),
 (G2, "14_-_Interior_7_14-interior7_edit_0001", "The view from the sofa. Hills, rooftops and a quiet afternoon. Apartamentos Gondomar 2.", "A vista do sofá. Colinas, telhados e uma tarde calma. Apartamentos Gondomar 2."),
 (CET, "4-interior4_4-interior4", "A bathroom in pale stone, clean lines and a soft rug. Vivendas Cête, Penafiel.", "Uma casa de banho em pedra clara, linhas limpas e um tapete suave. Vivendas Cête, Penafiel."),
 (GV, "1_-_exterior1_1-exterior1", "Five floors of timber and planters, seen from the street. Gold Village.", "Cinco pisos de madeira e floreiras, vistos da rua. Gold Village."),
 (G2, "19_-_Interior_12_19-interior12_0001", "A bedroom with a wardrobe, an arched mirror and a book on the nightstand. Apartamentos Gondomar 2.", "Um quarto com roupeiro, espelho em arco e um livro na mesa de cabeceira. Apartamentos Gondomar 2."),
 (GV, "4_-_exterior4_4-exterior4", "A balcony above the road, a chair and a quiet moment outside. Gold Village.", "Uma varanda sobre a estrada, uma cadeira e um momento calmo cá fora. Gold Village."),
 (G2, "2_-_Exterior2_2-exterior2_4SeedVR2Upscale", "Planters and railings along the ground floor. Detail first. Apartamentos Gondomar 2.", "Floreiras e guardas ao longo do piso térreo. O pormenor primeiro. Apartamentos Gondomar 2."),
]
REEL_CAP = {
 G2: ("A walk through Apartamentos Gondomar 2: facade, living room and bedroom.", "Um passeio por Apartamentos Gondomar 2: fachada, sala e quarto."),
 VDI: ("Duas Igrejas in motion: garden, timber and light. Penafiel.", "Duas Igrejas em movimento: jardim, madeira e luz. Penafiel."),
 CET: ("Vivendas Cête in a few slow shots. Penafiel.", "Vivendas Cête em alguns planos lentos. Penafiel."),
 GV: ("Gold Village: timber, green balconies and calm interiors.", "Gold Village: madeira, varandas verdes e interiores calmos."),
}
PROJ_ORDER = [G2, VDI, CET, GV]
USED_STORY_STEMS = set()   # week 1 social queue


def slides_for(proj, stem):
    fs = sorted(glob.glob(f"reports/{proj}/ig/{glob.escape(stem)}-*.jpg"))
    return [os.path.basename(f) for f in fs]


def week_name(i):
    return f"{i:02d}"


def main():
    # week 1 stories already queued
    w1 = yaml.safe_load(open("queue/social-week-01.yml")) or []
    used = {(x["project"], x["file"]) for x in w1}
    # story pool: round-robin across projects, excluding week 1
    pools = {}
    for p in PROJ_ORDER:
        pools[p] = [os.path.basename(f) for f in sorted(glob.glob(f"reports/{p}/story/*.jpg")) if (p, os.path.basename(f)) not in used]
    reels = {p: [os.path.basename(f) for f in sorted(glob.glob(f"reports/{p}/reel/*-reel*.mp4")) if (p, os.path.basename(f)) not in used] for p in PROJ_ORDER}
    flat_stories = []
    while any(pools.values()):
        for p in PROJ_ORDER:
            if pools[p]:
                flat_stories.append((p, pools[p].pop(0)))
    reel_queue = []
    while any(reels.values()):
        for p in PROJ_ORDER:
            if reels[p]:
                reel_queue.append((p, reels[p].pop(0)))

    days = WEEKS * 7
    feed = []
    skipped = []
    for k in range(days):
        d = START + datetime.timedelta(k)
        if k < len(FEED):
            proj, stem, en, pt = FEED[k]
            sl = slides_for(proj, stem)
            if not sl:
                skipped.append(stem); continue
            feed.append({"date": d.isoformat(), "time": "19:00", "project": proj, "slides": sl, "caption_en": en, "caption_pt": pt, "approved": False})
    social = []
    si = 0
    ri = 0
    times = ["09:30", "14:30", "18:00", "21:30"]
    for k in range(days):
        d = START + datetime.timedelta(k)
        for t in times:
            if si < len(flat_stories):
                p, f = flat_stories[si]; si += 1
                social.append({"date": d.isoformat(), "time": t, "type": "story", "project": p, "file": f, "approved": False})
        if k % 2 == 0 and ri < len(reel_queue):
            p, f = reel_queue[ri]; ri += 1
            en, pt = REEL_CAP[p]
            social.append({"date": d.isoformat(), "time": "12:30", "type": "reel", "project": p, "file": f, "cover": f[:-4] + "-cover.jpg", "caption_en": en, "caption_pt": pt, "approved": False})
    for w in range(WEEKS):
        a = START + datetime.timedelta(w * 7); b = a + datetime.timedelta(6)
        n = w + 2
        fw = [x for x in feed if a.isoformat() <= x["date"] <= b.isoformat()]
        sw = [x for x in social if a.isoformat() <= x["date"] <= b.isoformat()]
        hdr = f"# Week {n} ({a} to {b}). approved only after Vítor's OK. Generated by scripts/build_queue.py\n"
        open(f"queue/week-{week_name(n)}.yml", "w").write(hdr + yaml.safe_dump(fw, allow_unicode=True, sort_keys=False, width=240))
        open(f"queue/social-week-{week_name(n)}.yml", "w").write(hdr + yaml.safe_dump(sw, allow_unicode=True, sort_keys=False, width=240))
        print(f"week {n}: {len(fw)} feed, {sum(1 for x in sw if x['type']=='story')} stories, {sum(1 for x in sw if x['type']=='reel')} reels")
    if skipped:
        print("SKIPPED (no slides found):", skipped)


if __name__ == "__main__":
    main()
