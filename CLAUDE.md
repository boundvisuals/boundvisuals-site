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
- Avatar: Vítor chose the GPT Image 2 half-photo/half-clay portrait (2026-10-31).
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
- Content (XML export 2026-10-31): 5 pages (Work=home, Info, Get my budget, Obter o meu orçamento, Privacy) + 36 portfolio_page items, ALL built with Elementor (WPBakery unused → removable). 12 real project pages (one per project, URL /portfolio_page/<slug>/) + 24 extra grid thumbnails that redirect to their project page via the page-links-to plugin (_links_to meta) — keep this behaviour, grid loops via post-featured-video plugin (27 mp4 in uploads). Categories: Image, Architectural, Marketing, Product, Design, Film/Animation, Concept, Digital Art, Automotive. Every portfolio item has the same SEO title "3D - Bound Visuals" (leftover SEOPress/qode meta, plugin gone) → major SEO fix.
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
- Bound Visuals = 3D (all 3D, as since day one). Vítor Hugo = the person behind it all: all 3D of any kind + literally everything else (AI image/video, performance ads, image, video, film…) (confirmed 2026-11-02).
- ONE site, two doors: boundvisuals.com (studio: Work, Services) + boundvisuals.com/vitorhugo (AI, video, ads, Lab, CV). No subdomain, no second domain.
- Instagram is Vítor's (person-first bio, mentions the studio).

## Instagram hashtags (decided 2026-11-02)
- Caption stays clean (text + 14 mentions). Hashtags go in Vítor's FIRST COMMENT, posted by the robot right after publishing: 26 fixed + 4 rotating of 11 (max 30).

## Instagram crops (decided)
- Robot proposes detail crops; Claude reviews them visually and replaces weak ones (foliage/sky-only, cut heads) before the approval queue. If Vítor puts his own 4:5 crops in the finals folder, his win.

## Access (working, 2026-11-02)
- SSH not usable from GitHub (PTServidor whitelists fixed IPs only, port 1082). Path: FTP for files + WP REST API as user `claude-robot` (role Editor, Application Password; secrets WP_USER, WP_APP_PASS) — verified 200 by wp-check.yml. cPanel Terminal for rare manual commands.
- portfolio_page is NOT exposed in REST (stockholm-core) → small mu-plugin via FTP needed to expose it + ACF/meta.
- gh: use REST (`gh api .../dispatches`), GraphQL blocked; secrets list not readable.

## Done by Vítor (2026-11-02)
- Old handle replaced everywhere. LinkedIn: minimal changes, kept mostly as is for now (drafted texts stay in master doc §7, parked).

## Brand assets (received 2026-11-02, branch `assets`, folder brand/)
- Colours: #0b0c0c (black), #c5c1b7 (warm grey), #e5e5e3 (light). Typeface: Visby CF (woff2 in brand/fontes) + Poppins in the budget doc. Logo SVGs 01–21 (01/04/07/10/19 dark, 02/05/08/11/20 grey, 03/06/09/12/21 light).
- InDesign packages (IDML+INDD+PDF+links): orcamento, CV long + short (short "por editar info igual ao long"), cover letter 2025, portfolio 3D / AI / All 2025. Manual de identidade only as .ai/.pdf (49 MB).
- Robot: fetch-brand.yml (MEGA folders → assets branch).

## Site design (2026-11-02)
- Vítor rejected canvas A/B/C AND prototype v1 (https://claude.ai/artifact/VVfwDYmV3hBvQNZEcMy87f). DECIDED: the new site must look very close to the CURRENT live site — same look, rebuilt lean, then refined. Rule (Vítor): improve everything (faster, more beautiful) but keep the essence; any visible change must be justified ("better because X/Y") — list each change with its reason when showing staging. Reference = docs/current-site-spec.md (measured in Vítor's browser pane; GitHub headless screenshots hang on this site).

## Live changes log
- 2026-11-02 19:36 SEO mu-plugin bv-seo.php LIVE (/public_html/wp-content/mu-plugins). Verified titles/descriptions on home, Vivendas Cête, Corim. Undo: deploy-mu.yml action=remove-mu target=production.

## Housekeeping rule (Vítor, 2026-11-02)
- Always delete what is no longer needed (staging copies, parked theme files on the server, test files, robots that served once).

## DECISION 2026-11-02 19:02 — site stays as is
- Vítor keeps the current Stockholm/Elementor site and wp-admin exactly as today; he keeps editing it himself. New theme (theme/boundvisuals) is PARKED, not to be deployed to production.
- Claude only does important, invisible changes on the live site, each approved first: SEO (titles/descriptions/schema via a small mu-plugin, test on /novo first), speed/security cleanup (list for Vítor), no design changes.

## Staging + theme (2026-11-02, parked)
- Staging: https://www.boundvisuals.com/novo (Softaculous staging, DB boundvis_wp246, noindex on). Robot REST access verified there.
- Theme code: theme/boundvisuals (no builder on front end; reads portfolio_page + Elementor JSON blocks, pfv_featured_video_uploading video ids, _links_to redirects). Parked theme removed from staging server; deploy-theme robot deleted (code stays in git only).
- Changes vs current site to present with reasons: Visby CF for nav/body too (brand typeface, one font family less); header turns solid on scroll; loops play only when visible; lightbox with original file; prev/next project links; real SEO titles/descriptions + schema; Maionese credit removed (new theme); icon fonts/reCAPTCHA/builder CSS not loaded.

## Pending from Vítor
- Speed cleanup step 1: VERIFIED on staging 2026-11-02 (same content on 6 pages; −10 JS, −3 CSS, −15 KB HTML). Vítor to deactivate the same 8 on LIVE: WPBakery, LayerSlider, Slider Revolution, Select Twitter Feed, Select Instagram Feed, Disable Right Click Images, Inspect Element Console Blocker, WordPress Importer. Delete them after a few days without issues.
- Speed cleanup step 2 (on staging first): GA Google Analytics (same G-9CWHCJLG72 tag loaded twice → visits counted double), Simple Social Icons (Info icons come from Elementor), Health Check. KEEP: 360 panorama (1 widget), Qi addons (contact form widget), page-links-to, post-featured-video, CF7, cookie box.
- Findings: Stockholm itself loads 44 files/page; server nginx, no page cache (no-store) → propose WP Super Cache (approval needed).
- MEGA links per project (sent: Vivendas Cête, Gold Village, Apartamentos Gondomar 2; in progress: School Building, 10 Moradias SFM, Corim, Vivendas Aveleda, Apartamentos Cete 2026, Casas Mouriz Respirar Arte).
- One-time authorisations: Instagram/Facebook, Pinterest, YouTube, LinkedIn.
- Rewrite all brand docs, portfolio documents and CV (1st person, new positioning).
- Instagram profile: done by Vítor (2026-11-02); highlight covers still to design.

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
