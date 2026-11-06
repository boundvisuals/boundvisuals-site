# Vítor Hugo · Bound Visuals — operations repo

Source of truth for the rebrand, the website and the content automation.
Master plan (Claude Doc): https://claude.ai/artifact/CiMZbhepRpkE2qYCfgMwCw
LIVING DOSSIER (Claude Doc, PT): https://claude.ai/artifact/SSokUsyAh7x3PpswQvWo6k (doc id ce0edf0a-9970-4cf6-8e2b-82f7f036437d, body node a618e0cb-54b3). Vítor's rule: update it after EVERY decision/progress (Agora, Tarefas, Registo de decisões, Projetos…) and remind him of his tasks ahead of time. Reminder set: 2026-11-06 10:00 delete plugins. REMINDER CHANNEL (decided 2026-11-02): Claude app push notifications via scheduled tasks (Vítor has the app). Test push 2026-11-02 22:23 RECEIVED by Vítor ✅ (one-off trigger, self-disabled). Planned recurring tasks once approval page exists: Sunday evening (week to approve + his tasks), Mon/Wed/Fri evening (daily-study brief for next day), launch −2 days, queue < 7 days warning.
Talk to Vítor in European Portuguese. Generation prompts in English.
RULE (Vítor, 2026-11-02): explain every step he must do in tiny, click-by-click detail ("como se eu fosse muito burro"): exact URL, exact button names, what he should see.
RULE (Vítor, 2026-11-03): DO every Claude-side task proactively without waiting to be told; report when ready.
RULE (Vítor, 2026-11-03): crops were bad — review every crop at FULL size, composition-first (no meaningless fragments); he may supply his own crops.
CREDITS: chat got expensive; new chats start from Project doc claude/COMECA-AQUI.md + this file.
RULE (Vítor, 2026-11-02): when he answers only part of a message, end EVERY reply with what is still open/unanswered from before ("Ficou por responder/fazer"), repeating the open questions in full.

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
- Finals detection: folders named final/finals/finais/final export(s)/publicar/publish; Vítor shares the project (or a finals) folder link. Shots with numbered stage subfolders ("1 - ai…", "4 - SeedVr2 Upscale", "5 - final export"): take only the highest-numbered stage that has images (Gondomar 2 → "4 - SeedVr2 Upscale", 18 images).
- Rotate projects (A, B, C, A…); each project opens with its best image; one auto reel per project.
- 1 image post/day, reel every other day, 3–5 stories/day. Queue ~2 weeks; warn when < 7 days.
- Daily approval page before anything publishes.
- Publish order on launch day: site + Behance + CG platforms first, then Instagram/Facebook/Pinterest/LinkedIn linking back.
- Auto via API: Instagram, Facebook, Pinterest, YouTube, LinkedIn personal. Manual kit (Vítor uploads): Behance, CGArchitect/CG Awards, Chaos CG Connect, Indústria Criativa, LinkedIn company page until API approval.

## Brand architecture (decided 2026-10-31)
- Bound Visuals = 3D (all 3D, as since day one). Vítor Hugo = the person behind it all: all 3D of any kind + literally everything else (AI image/video, performance ads, image, video, film…) (confirmed 2026-11-02).
- ONE site, two doors: boundvisuals.com (studio: Work, Services) + boundvisuals.com/vitorhugo (AI, video, ads, Lab, CV). No subdomain, no second domain.
- Instagram is Vítor's (person-first bio, mentions the studio).

## Publishing model (decided 2026-11-02)
- MANUAL by Vítor, whenever a project is ready (robot prepares a kit): website, Behance, CGArchitect/CG Awards, Chaos CG Connect, Indústria Criativa (+ LinkedIn company page until API approval).
- AUTOMATIC (robot, after one-time connections): Instagram (1 post/day, reel every 2 days, 3–5 stories/day, hashtags in first comment), Facebook Page (mirror), Pinterest (pin → project URL), YouTube Shorts (reels), LinkedIn personal (2–3/week). Staggered best times, not simultaneous.
- Vítor says "project X is ready" → robot automatically prepares the manual-platform kit (images per platform + texts) and notifies him; he publishes on site/Behance/CG platforms himself.
- Something must go out EVERY day (at least a story). Need an endless-content plan (quick images/projects, series).
- QUALITY: always maximum ("extreme high quality", "chocar a malta") — never ship soft crops, banding, wrong colour space or over-compressed files on any platform.
- Approval: WEEKLY batch (Vítor approves next 7 days at once). Nothing publishes without ✅.
- Ad-hoc posts: Vítor can post himself anytime (queue unaffected) or ask Claude to publish now.
- Plan: queue builder (manifests → rotation A,B,C) → approval page on his server (/public_html/bv-fila, token, noindex; images there also serve as public URLs for the APIs) → publisher robot (GitHub Actions hourly cron, Meta Graph API via System User token, secret META_TOKEN).

## Publishing system (BUILT 2026-11-03)
- queue/week-NN.yml (date, time Lisbon, project, slides from reports/<p>/ig, caption_en/pt, approved) → .github/workflows/publish.yml (cron */30 + dispatch mode run|check) uploads used slides to /public_html/bv-fila/<project>/ (noindex) and scripts/publish.py publishes approved+due items: IG carousel + hashtags as 1st comment + FB page multi-photo. State: queue/published.json; logs reports/publish/.
- Week 1: crops REDONE BY HAND 2026-11-03 (config/crops.yml = [cx,cy,h] fractions per image; process_media.py uses them, otherwise auto crops flagged "auto-unreviewed" in process.log). Reviewed at full size, one by one. APPROVED by Vítor 2026-11-03 18:03 (all 7 days, approved: true).
- Week 1 (3–9 Nov, 19:00 daily, 7 carousels VDI/Cête/GV; 3–4 slides each) preview for approval (v2, new crops): https://claude.ai/artifact/BA2KNFmzt1a2MgLyHzJqh1. Re-run CHECK after the crop change. Approve = set approved: true in queue/week-01.yml.
- Not yet: stories, reels, server approval page, weekly push reminders, Pinterest/YouTube/LinkedIn.

## Captions (decided 2026-11-02)
- Always bilingual: EN first (hook in first ~125 chars), then PT below a separator. 14 mentions after the text. Hashtags in first comment.

## Content pillars (Vítor wants ALL, massive activity: posts, reels, stories, videos every day)
1 finals · 2 details/crops (auto) · 3 render→final slider reels (auto when base render exists) · 4 Daily study #NNN = REAL mini 3D projects (Vítor clarified 2026-11-02): Claude finds a free/licensed 3D model or scene (3D Warehouse/SketchUp near-ready models, Sketchfab CC, Vítor's own models — NO Chaos Cosmos, he doesn't have it; licence + credit checked), sends a full brief (model link, cameras, lighting/mood refs, render settings, AI/post steps, caption); Vítor does 3ds Max/Corona → AI → edit. ALWAYS 3D base + AI complement (never 3D-only, never AI-only): quick fixes on a near-ready model, his cameras, basic render, then AI + edit with full coherence between angles — "simple but beautiful" images. 3×/week (Tue/Thu/Sat), daily if easy. Styles VARY (Swiss look is NOT mandatory). MEGA: FREELANCER STUFF/3D/PORTFOLIO/Daily Study - 2026 = https://mega.nz/folder/b64hGZTD#IheHOIoJhFdssIbmGt5mUg (subfolders #001…) · 5 Seedance animated stills (near-auto) · 6 mood variations dawn/dusk/night/rain (near-auto) · 7 process/behind the scenes · 8 daily stories. Extras 9–15 APPROVED: slow zoom reels, render-or-photo, from-the-archive, colour palette carousels, weekly recap reel, then-vs-now, launch countdowns. Vítor will supply render base/clay/mask ID and animations (simple: LTX 2.5 in ComfyUI; storytelling: Kling 4.0/Seedance). Weekly calendar + 40 daily-study ideas + folder-name convention in the Dossier. Folder convention APPROVED: per shot, extra material in folders numbered 0 with keyword ("0 - render base"/raw/base, "0 - clay", "0 - mask id"), "video"/"anim" for animations, root folder "daily study/#NNN - …". Final = highest-numbered stage (ignore stage 0). Vítor: "faz tudo do teu lado e lembra-me com antecedência" — Claude prepares LITERALLY everything: calendar, texts, copy, captions, instructions, links, briefings.
- API limits to respect: polls/quiz/link stickers and Instagram-library music cannot be added via API → those stories are manual; reels get royalty-free audio baked in.

## Instagram hashtags (decided 2026-11-02)
- Caption stays clean (text + 14 mentions). Hashtags go in Vítor's FIRST COMMENT, posted by the robot right after publishing: 26 fixed + 4 rotating of 11 (max 30).

## Instagram crops (decided)
- Claude composes each carousel's detail crops by eye (composition-first: subject + context, no fragments) and writes them in config/crops.yml BEFORE an image enters the queue; any image without an entry gets auto crops that are NOT to be queued until reviewed. Auto picker (edge energy) produced meaningless fragments, do not trust it. If Vítor puts his own 4:5 crops in the finals folder, his win.

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

- 2026-11-02 20:48 bv-seo.php home description updated to brand definition ("Vítor Hugo's 3D brand… architecture and product"). A broken upload was blocked by the robot's PHP syntax check; live verified OK.

## Housekeeping rule (Vítor, 2026-11-02)
- Always delete what is no longer needed (staging copies, parked theme files on the server, test files, robots that served once).

## DECISION 2026-11-02 19:02 — site stays as is
- Vítor keeps the current Stockholm/Elementor site and wp-admin exactly as today; he keeps editing it himself. New theme (theme/boundvisuals) is PARKED, not to be deployed to production.
- Claude only does important, invisible changes on the live site, each approved first: SEO (titles/descriptions/schema via a small mu-plugin, test on /novo first), speed/security cleanup (list for Vítor), no design changes.

## Staging + theme (2026-11-02, parked)
- Staging: https://www.boundvisuals.com/novo (Softaculous staging, DB boundvis_wp246, noindex on). Robot REST access verified there.
- Theme code: theme/boundvisuals (no builder on front end; reads portfolio_page + Elementor JSON blocks, pfv_featured_video_uploading video ids, _links_to redirects). Parked theme removed from staging server; deploy-theme robot deleted (code stays in git only).
- Changes vs current site to present with reasons: Visby CF for nav/body too (brand typeface, one font family less); header turns solid on scroll; loops play only when visible; lightbox with original file; prev/next project links; real SEO titles/descriptions + schema; Maionese credit removed (new theme); icon fonts/reCAPTCHA/builder CSS not loaded.

## Pinterest/YouTube/LinkedIn API facts (checked 2026-11-03)
- Pinterest: new apps start in Trial access; pins created are visible only to the app owner until Standard access is approved (screencast of OAuth + pin creation required, typically 1-2 weeks; community reports, confirm in Pinterest developer portal).
- YouTube Data API: videos.insert costs 1 unit of the uploads bucket, max 100 calls/day (per Google docs page); unverified-project private-upload rule not stated on that page, verify in console.
- LinkedIn personal posting: self-serve product Share on LinkedIn, scope w_member_social, no partner review, up to 4 images, no video, tokens last 60 days, no company page needed (third-party source, confirm on Microsoft Learn).

## Pending from Vítor
- Speed cleanup step 1: DONE on staging + LIVE 2026-11-02 (verified). Delete after a few days: WPBakery, LayerSlider, Slider Revolution, Select Twitter Feed, Select Instagram Feed, Disable Right Click Images, Inspect Element Console Blocker, WordPress Importer. Delete them after a few days without issues.
- Speed cleanup step 2: VERIFIED on staging 2026-11-02 (GA now 1×, Info icons intact) → DONE on live too: GA Google Analytics (same G-9CWHCJLG72 tag loaded twice → visits counted double), Simple Social Icons (Info icons come from Elementor), Health Check. KEEP: 360 panorama (1 widget), Qi addons (contact form widget), page-links-to, post-featured-video, CF7, cookie box.
- Findings: Stockholm itself loads 44 files/page; server nginx, no page cache; HTML takes ~1.6–1.8 s to generate. WP Super Cache: Vítor DECLINED (2026-11-02) — do not propose again unless he asks.
- MEGA links per project (sent: Vivendas Cête, Gold Village, Apartamentos Gondomar 2; in progress: School Building, 10 Moradias SFM, Corim, Vivendas Aveleda, Apartamentos Cete 2026, Casas Mouriz Respirar Arte).
- Meta app "Bound Visuals Publisher" CREATED 2026-11-02 (use cases: Instagram content + Page). CONNECTED 2026-11-02: META_TOKEN valid, never expires, scopes OK. Page 102995032197827 (Bound Visuals) ↔ IG 17841450386900546 (@vitorhugo_boundvisuals) — in config/program.yml. Pinterest/YouTube/LinkedIn integrations: Vítor wants them NOW (2026-11-03). Launch kit texts for VDI/Cête/GV in docs/kit-lancamento-3-projetos.md; Vítor publishing manual platforms on 2026-11-03. TOP PRIORITY for Vítor (2026-11-02: "calendarizar e começar a bombar").
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

## RULES added 2026-11-03 21:20 (Vítor)
- EVERY reply ends with (1) list of links to all docs/pages created (Master plan, Dossier, approval pages, briefings, repo, MEGA) and (2) the FULL list of everything agreed and still open since the beginning. Vítor wants everything automated; he will NOT publish manually. Show produced work continuously (daily study briefs etc.).
- Links: Master plan https://claude.ai/artifact/CiMZbhepRpkE2qYCfgMwCw · Dossier https://claude.ai/artifact/SSokUsyAh7x3PpswQvWo6k · Week 1 feed approval https://claude.ai/artifact/BA2KNFmzt1a2MgLyHzJqh1 · Stories+reels week 1 https://claude.ai/artifact/4PK3eSRaENXSbapLzqkNT2 · Daily study briefs docs/daily-study-briefings.md · Daily Study MEGA https://mega.nz/folder/b64hGZTD#IheHOIoJhFdssIbmGt5mUg · Repo https://github.com/boundvisuals/boundvisuals-site

## INSTAGRAM BLOCK (2026-11-03 ~21:20) — OPEN
- Graph API returns code 4 / subcode 2207051 ("Restringimos determinadas atividades…", action blocked) on container creation WITH caption (single+caption error; carousel parent+caption returns id 0 / status error 2207032; children and no-caption parent OK). Cause: too many test containers/same captions from my check runs. Day-1 feed post (Duas Igrejas, due 19:00) NOT published.
- publish.yml DISABLED (manual disable via API) to stop further attempts. Re-enable with: gh api -X PUT repos/boundvisuals/boundvisuals-site/actions/workflows/publish.yml/enable
- Next: Vítor checks the Instagram app notice (Settings > Account status / "Ação bloqueada") and taps "Tell us if we made a mistake"; wait 24h; then ONE single test, never more check-mode runs. Do not run meta-check container tests again. publish.py now retries container creation (id 0) and shows error detail.
- Hand crops done for Gondomar 2 and second batches of VDI/Cête/GV (config/crops.yml); stories/reel generated for Gondomar 2 (reports/apartamentos-gondomar-2); Daily Study #001–#003 briefs in docs/daily-study-briefings.md.

## PAINEL (built 2026-11-03 23:30) — Vítor's single place for everything
- https://www.boundvisuals.com/painel/ (private: key link /painel/?k=KEY sets a 1-year cookie; repo holds only the sha256 in painel/config.php; the key was given to Vítor in chat). PWA: installable on Windows (Edge/Chrome → install) and phone (Add to home screen).
- Tabs: Hoje (alerts, KPIs, today, networks, robot log), Calendário (all feed/stories/reels; "Aprovar dia"/"Aprovar tudo" → api.php writes store/approvals.json.php), Tarefas (docs/tasks.yml; ticks stored server-side), Projetos (registry + counts), Links.
- Robot .github/workflows/painel.yml (push on queue/reports/tasks, cron */10, after each publish run): applies panel approvals to queue/*.yml, builds data (scripts/build_painel.py), uploads via FTP. Page polls every 15 s. No Claude credits needed to stay updated.
- RULE CHANGE (Vítor chose option A 2026-11-03): links + open lists live in the Painel; replies stay short and end with the Painel link + only what is new. Keep docs/tasks.yml as the master task list (update it whenever something is agreed/done).
- No repeated tests ever (Vítor 2026-11-03: "não faças testes… faz publicação direto"). Budget credits: heavy work in robots, not chat.

## STATE 2026-11-04 (read this first in autonomous sessions)
- STAND-BY: nothing publishes until 06/11 11:35 (cooldowns in queue/published.json). Calendar shifted +3 days; first post = Duas Igrejas front, 06/11 19:00 (approved). Everything else UNAPPROVED; Vítor reviews one by one in the Painel (crops must be accepted/edited before a single approve).
- Instagram: captions refused via API (account restriction after my tests). Fallback: post without caption, caption copy-ready in the Painel. Captions = EN — PT + 14 mentions + 5 hashtags (IG limit is 5/post since Dec 2025); other 25 hashtags as 5 comments of 5 (copy-ready in Painel; robot posts them spaced when API allows).
- Media URLs carry ?v=<sha1> (IG caches by URL). Ingest never wipes stories/reels; previews regenerated on ingest.
- Painel (painel/app.html + api.php, robot painel.yml): spaces Vítor Hugo / Bound Visuals; tabs Início, Ideias (numbered, filters, threads; hourly task answers), Projetos pessoais, Portfólio (+PDF button, scripts/build_portfolio.py, portfolio.yml), Oportunidades, Perfil, Tarefas, Links; BV: Marca (IG stats, feed preview), Calendário (approve/unapprove everywhere, crop editor 4:5 + 9:16 stories, caption editing, undo bars), Conteúdo (15 pillars, week, 40 ideas), Projetos, Estúdio (Daily Study). PT/EN switch. Instant robot via GitHub token saved by Vítor. Search Ctrl+K. Quick-capture + button.
- Reels: house style = scripts/reel_styles.py "series" (slow, 12 s per image, landscape pans edge to edge, whole project covered, 4 images per reel); new reels auto-scheduled (queue/social-week-90-reels.yml).
- Scheduled tasks: hourly "responder às Ideias" + "sessão automática" DISABLED 05/11 (Vítor: save credits). One-off reminders 06/11 kept. Robots (GitHub, free) keep running.
- NOTIFICATIONS (05/11): Painel Web Push (painel/push.php, VAPID keys created on the server in store/vapid.json.php; empty pushes, SW fetches push.php?a=notif). Robot painel.yml runs scripts/notify.py → store/notify.json.php → calls push.php?a=run (each id sent once; quiet 23–08). Vítor enables per device (Início → Ligar notificações).
- 05/11: notify.py also pushes "Publicado no Instagram: <projeto>" (last 6 h, from queue/published.json; says if it went without caption + where to copy it) and "Ainda não saiu" when an approved feed post is >45 min late. Ligar redes page = painel/ligar.php (OAuth tokens in store/oauth.json.php). Oportunidades: 'Onde procurar' + Claude leads in docs/opps-sources.yml; kits in docs/kits/<id>.md once Vítor adds opps (docs/opps.json pulled by painel.yml). Daily Study briefs written up to #039 (2 fev). 06/11 first post checked ready (3 slides 1080×1350, approved, publish.yml active).
- Vítor will also make his own videos (LTX 2.5 / Seedance / Kling) in a "video"/"anim" subfolder → TODO: assemble into reels.

## PERSONAL SITE + PRINT PORTFOLIO (2026-11-04)
- Vítor: two sites linked to each other. DECIDED (by Claude, Vítor delegated): boundvisuals.com/vitorhugo (static folder /public_html/vitorhugo, no subdomain → same domain authority, zero setup). Built by scripts/build_vitorhugo.py, deployed by portfolio.yml (also copies PDFs to /vitorhugo/files). noindex until Vítor approves. 3D Architecture links out to boundvisuals.com.
- Portfolios/CV: white print-friendly pages, images NEVER cropped, links everywhere (index with page numbers, tel/mail/web), no "Bound Visuals" branding (only as site/employer), all 14 full LinkedIn recommendations. Vítor: "faz o que achares melhor, nem me perguntes" — modern, attractive, different.

## CLAUDE TASKS (05/11 20:45, Vítor: "liga as tarefas, usa só o necessário")
- "Avisar o Claude" button REMOVED. Scheduled tasks back on: "responder às Ideias" hourly :56 on Sonnet (cheap); "sessão automática" every 3 h (08–23 Lisbon, :26) on Opus. Keep each run lean; stop early if nothing to do.
- Actions storage hit 90% (artifacts): ingest artifacts now kept 1 day; all old artifacts deleted 05/11.

## ACTIONS MINUTES (06/11) — free 2000 min/month EXHAUSTED 05/11 23:40 (≈2280 used; private repo). All jobs fail "spending limit". Vítor asked to pick: small budget / public repo / wait for cycle (task v-gh-minutes). Crons cut: publish only at queue slots (UTC = Lisbon winter; shift 1 h earlier on 29 Mar), painel 4×/day + dispatched by publish and api.php, stats 1×/day. Keep new robots minute-cheap.

## FREE ROBOTS (05/11, Vítor: "robôs mecânicos só, o máximo")
- .github/workflows/robots.yml (06:41 + 15:17 UTC): scripts/hunt_opps.py (RemoteOK, Arbeitnow, Jobicy, Himalayas, WWR → docs/opps-auto.yml + docs/kits/auto-*.md templated kits; shown in Painel Oportunidades), scripts/watchdog.py (sites, personal-site links, PDFs, SSL, Meta token, queue horizon → docs/watchdog.json; card in Início), Sunday backup of Painel store (no secrets) → backups/painel/, Monday PDF/site rebuild. notify.py pushes watchdog failures + new leads. No AI in robots (Vítor declined GitHub Models).

## NO REPEATS + APAGAR (05/11 23:00, Vítor)
- RULE (corrected 23:15): never publish IDENTICAL things — feed: same image never posted twice; stories: no visually identical story (dhash) and not the same image twice in one day; stories MAY reuse images from posts. Twins horizontal→vertical in config/twins.yml (Gondomar 2: 10→11, 14→17, 8→9): vertical used, horizontal never on IG. Teaser 'a' only when a real detail slide exists.
- Apagar: Painel 🗑 on posts/stories/reels and per slide → api.php?a=delete → store/deleted.json.php → docs/deleted.json → dedupe_queue.py removes from queue (undo supported).

## SERVER CLOCK (06/11) — publishing moved OFF GitHub Actions
- painel/cron.php runs on PTServidor via cPanel cron every 5 min (php -q /home/boundvis/public_html/painel/cron.php): publishes approved+due items from store/data.json.php (+ live approvals/deletions), IG feed (caption, fallback no-caption + 1st comment) + FB mirror, stories, reels, spaced extra hashtag comments, push notification, daily IG numbers (store/ig_stats.json.php), and starts the GitHub painel robot once 5 min after the last Painel click (store/robot_dirty). State store/published.json.php → merged into queue/published.json by painel.yml. api.php overlays server publish status.
- GitHub schedules removed (publish/painel/stats); robots.yml 1×/day. painel.yml uploads store/meta.json.php (token from secret), bv-fila media and cron.php.
