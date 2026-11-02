# Current boundvisuals.com — design spec (measured 2026-11-02, live site)
Goal: the new lean theme must LOOK like this (Vítor's rule), then be refined.

## Global
- Header: fixed, transparent over dark; logo left (light Bound Visuals logo, ~148×70); nav right: WORK · INFO — Raleway 12px, weight 700/800, letter-spacing 2px, uppercase; current item #c5c1b7, others white.
- Body text: Raleway 13px, #8d8d8d. Headings: Visby CF 700.
- Page background behind the work: #e5e5e3; sections painted with dark gradients (#000 → #292929 top band, #292929 → #0b0c0c behind the grid).
- Cookie bar bottom (icon, "Cookies policy" text, Accept button outlined).
- Footer (text): © 2026 Bound Visuals · All rights reserved · Portugal | Contacts: info@boundvisuals.com · +351 913 215 170 (Chamada para rede móvel nacional / Call to a national mobile network) | Social | Legal: Privacy, Cookies & GDPR Policy · Complaints Book | "Webdesign by Maionese Design".

## Home (Work)
- Top band (~320px, dark gradient): headline centred, Visby CF 700 ~33px white:
  "We develop 3D solutions linked to the world of static and moving images by paying maximum attention to detail and experience through emotions."
- Filter row: ALL · ARCHITECTURAL · AUTOMOTIVE · CONCEPT · DESIGN · DIGITAL ART · FILM/ANIMATION · IMAGE · MARKETING · PRODUCT — Raleway 13px uppercase grey, current = light/bold.
- Grid: Pinterest/masonry, 3 columns, ~10px gutters, 36 items, images at natural ratio; some items are muted autoplay loop <video> (post-featured-video). Hover ("pinterest_info_on_hover"): light overlay with title (Visby CF 700 ~21px, #0b0c0c) + categories ("Architectural / Image").
- Item links: real project pages /portfolio_page/<slug>/ ; extra thumbnails redirect to them (page-links-to).
- Project slugs seen: vivendascete, fsmwebdesign, goldvillage, 10moradiasemsaofelixdamarinha, vivendasduasigrejas, audi-rs-6-avant-2020, dreamingcollection1of2, corimresidence, dreaming-collection-2-2, thepath, outdoorwalk, fsmdesign.
- Page <title>: "Bound Visuals - It's bound to happen".

## Project page (e.g. /portfolio_page/vivendascete/)
- Dark gradient background (#000 → #0b0c0c).
- "See all works" button top and bottom.
- Images stacked full width (content width ~1057px), verticals in pairs side by side; images served at full original size (6144 px).
- Info block: Name / Client / Images: Bound Visuals / Date.
- No lightbox today. <title> on every project = "3D - Bound Visuals" (SEO bug).

## Info page
- Mostly image-based content; social icons (Behance, Facebook, Instagram, LinkedIn, Pinterest, YouTube); buttons "Get my budget" / "Obter o meu orçamento" (×3).

## Tech notes
- Images go through Jetpack Photon CDN (i0.wp.com) — replace with own srcset (original kept lossless for lightbox).
- reCAPTCHA iframe loaded on every page (CF7) — load only on the form page.
- ~12 icon fonts loaded (FontAwesome, ElegantIcons, Linearicons, linea ×7, Ionicons…) — drop all.
