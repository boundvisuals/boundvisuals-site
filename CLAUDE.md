# Vítor Hugo · Bound Visuals — operations repo

Source of truth for the rebrand, the website and the content automation.
Master plan (Claude Doc): https://claude.ai/artifact/CiMZbhepRpkE2qYCfgMwCw
Talk to Vítor in European Portuguese. Generation prompts in English.

## Identity (decided)
- Display name everywhere: `Vítor Hugo • Bound Visuals`. Instagram handle: `@vitorhugo_boundvisuals` (changed 2026-10-31).
- Person = Vítor Hugo; studio = Bound Visuals. Communication in 1st person ("eu"), never "nós".
- Bound Visuals logo and brand are NOT to be changed. No personal logo. Signature = two lines: "Vítor Hugo" / "Bound Visuals" in the brand typeface.
- Positioning line: 3D Artist (ArchViz · Product · CGI Generalist) · AI Image & Video Specialist · Performance Ads Designer. Tools: ComfyUI · Seedance 2.5 · FloraAI · Nano Banana · Unreal · Corona/3ds Max.
- Goals: get hired (main archviz role + AI Power User), win clients, and stay visibly active/modern (public diary of work).
- Avatar: clean portrait on LinkedIn; Vítor holding the "bound" logo as a 3D object on Instagram/YouTube.
- Behance: keep both accounts (criativovitorhugo + boundvisuals), cross-credited.

## Website (decided)
- WordPress on PTServidor (cPanel user `boundvis`, IP 185.32.190.7, SSH port pending from support). Public key `claude-boundvisuals` imported in cPanel.
- Start from the CURRENT theme: audit its code first; evolve if lean, otherwise rebuild with same look/logic.
- Menu: Work (home: showreel + grid of auto-playing video loops, keep as today) · Lab · Services · Info.
- Images: lightbox loads original resolution with LOSSLESS compression only (pixel-identical, verified). Grid thumbnails may be sized.
- Video: thumbnail loops self-hosted; any video with a player comes from YouTube (lite facade). No paid CDN.
- Staging on subdomain, deploy via GitHub Actions. EN primary, PT secondary. Full SEO plan in the master doc (8 keyword groups).

## Content program (decided)
- Vítor sends: MEGA link to a project's FINALS subfolder + a one-line note. Nothing else.
- One image per post. 4:5 as-is; landscape goes whole in a 4:5 frame, never cropped.
- Rotate projects (A, B, C, A…); each project opens with its best image; one auto reel per project.
- 1 image post/day, reel every other day, 3–5 stories/day. Queue ~2 weeks; warn when < 7 days.
- Daily approval page before anything publishes.
- Publish order on launch day: site + Behance + CG platforms first, then Instagram/Facebook/Pinterest/LinkedIn linking back.
- Auto via API: Instagram, Facebook, Pinterest, YouTube, LinkedIn personal. Manual kit (Vítor uploads): Behance, CGArchitect/CG Awards, Chaos CG Connect, Indústria Criativa, LinkedIn company page until API approval.

## Pending from Vítor
- SSH port (asked PTServidor support).
- MEGA links per project.
- Brand docs (identity manual, budget doc…) exported as IDML to rewrite "nós" → "eu".
- One-time authorisations: Instagram/Facebook, Pinterest, YouTube, LinkedIn.

## Parked (never forget — raise after current phase)
- AI Build Lab: analyse the 120 ideas (PDFs + xlsx) and pick ones that serve the portfolio.
- Themed viral/pleasant Instagram + TikTok accounts; YouTube/other revenue; fully automated revenue content; cross-alias linking to Vítor.
- TikTok for the main account.
- Paid teaching offer.
- Pinterest, Facebook, Indústria Criativa strategy.
- LinkedIn final texts (headline, About, experience) — Phase 1.

## Repo layout
- `projects/registry.yml` — one entry per project (MEGA link, note, publish flag, status).
- `config/program.yml` — the content program rules above, as data.
- `scripts/` — ingest (MEGA) and media processing.
- `.github/workflows/` — robots.
