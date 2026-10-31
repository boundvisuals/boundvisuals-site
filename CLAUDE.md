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
- Keep the current WordPress backend structure (content types, fields, admin) exactly; refresh design/SEO on top. Everything stays 100% editable in wp-admin. Theme code lives in Git; edit content in wp-admin, code via repo.
- Start from the CURRENT theme: audit its code first; evolve if lean, otherwise rebuild with same look/logic.
- Menu: Work (home: showreel + grid of auto-playing video loops, keep as today) · Lab · Services · Info.
- Images: lightbox loads original resolution with LOSSLESS compression only (pixel-identical, verified). Grid thumbnails may be sized.
- Video: thumbnail loops self-hosted; any video with a player comes from YouTube (lite facade). No paid CDN.
- Staging on subdomain, deploy via GitHub Actions. EN primary, PT secondary. Full SEO plan in the master doc (8 keyword groups).

## Current site audit (2026-10-31, via FTP read-only)
- Docroot /public_html. Theme: Stockholm 8.10 (Select Themes, commercial, 18 MB) + empty child theme → all customisation lives in theme options / page-builder content.
- Plugins: WPBakery (js_composer) AND Elementor + Qi addons, LayerSlider, Revolution Slider, Jetpack, ACF Pro (folder "advanced-custom-fields-pro-master" — check licence/updates), 3 separate custom-CSS plugins, right-click/inspect blockers, Wordfence, Limit Login, Really Simple SSL, CF7, PixelYourSite, Google Sitemap Generator, stockholm-core (portfolio post type).
- Uploads: 3.0 GB.
- Verdict: not lean → build a new lightweight custom theme that keeps the same content (portfolio post type slug, ACF fields, pages, URLs) so wp-admin stays familiar; retire builders/sliders after migration.
- Content (XML export 2026-10-31): 5 pages (Work=home, Info, Get my budget, Obter o meu orçamento, Privacy) + 36 portfolio_page items, ALL built with Elementor (WPBakery unused → removable). Each portfolio item = ONE image/shot (e.g. Gold Village ×7), URL /portfolio_page/<slug>/, grid loops via post-featured-video plugin (27 mp4 in uploads). Categories: Image, Architectural, Marketing, Product, Design, Film/Animation, Concept, Digital Art, Automotive. Every portfolio item has the same SEO title "3D - Bound Visuals" (leftover SEOPress/qode meta, plugin gone) → major SEO fix. No real case-study pages per project.
- FTP: account claude@boundvisuals.com (home dir), secrets FTP_HOST/FTP_USER/FTP_PASS in GitHub. SSH: port 44222 exists but firewalled from outside.

## Content program (decided)
- Vítor sends: MEGA link to a project's FINALS subfolder + a one-line note. Nothing else.
- One image per post. 4:5 → single slide. Any other ratio → carousel: auto 4:5 detail crops, last slide = whole image on WHITE 4:5 (Vítor's own habit).
- Finals detection: folders named final/finals/finais/final export(s)/publicar/publish; Vítor shares the project (or a finals) folder link.
- Rotate projects (A, B, C, A…); each project opens with its best image; one auto reel per project.
- 1 image post/day, reel every other day, 3–5 stories/day. Queue ~2 weeks; warn when < 7 days.
- Daily approval page before anything publishes.
- Publish order on launch day: site + Behance + CG platforms first, then Instagram/Facebook/Pinterest/LinkedIn linking back.
- Auto via API: Instagram, Facebook, Pinterest, YouTube, LinkedIn personal. Manual kit (Vítor uploads): Behance, CGArchitect/CG Awards, Chaos CG Connect, Indústria Criativa, LinkedIn company page until API approval.

## Brand architecture (decided 2026-10-31)
- Bound Visuals = archviz/3D studio (keeps current site filters). Vítor Hugo = the person: archviz + AI image/video, ads, film.
- ONE site, two doors: boundvisuals.com (studio: Work, Services) + boundvisuals.com/vitorhugo (AI, video, ads, Lab, CV). No subdomain, no second domain.
- Instagram is Vítor's (person-first bio, mentions the studio).

## Instagram crops (decided)
- Robot proposes detail crops; Claude reviews them visually and replaces weak ones (foliage/sky-only, cut heads) before the approval queue. If Vítor puts his own 4:5 crops in the finals folder, his win.

## Pending from Vítor
- SSH: port 44222 firewalled; asked PTServidor to open it (key-only). FTP works meanwhile.
- MEGA links per project.
- Brand docs (identity manual, budget doc…) exported as IDML to rewrite "nós" → "eu".
- One-time authorisations: Instagram/Facebook, Pinterest, YouTube, LinkedIn.
- Rewrite all brand docs, portfolio documents and CV (1st person, new positioning).
- Replace old handle @_boundvisuals_ everywhere it is cross-referenced (site, email signature, other profiles, docs).
- Instagram profile: bio, two avatar tests (holding the 3D 'bound' logo; clay-render portrait), highlight covers, links, action buttons. Category already 'Artist'.
- LinkedIn: all texts drafted in the master doc §7 — Vítor to review and paste.

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
