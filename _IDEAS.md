# Design Improvement Ideas — X-Ray Geoanalytics
Generated: 2026-05-15

A running list of ideas surfaced during the May 15 overnight troubleshooting
pass. Each item notes: priority (P0–P3), category, summary, and rough cost.

## P0 — User-facing bugs already fixed in this pass
- **[FIXED] Platform hero "X-Ray" wrapping awkwardly on mobile** — non-breaking
  span added on the gold-coloured wordmark.
- **[FIXED] `about-us.html` was orphaned** — no nav link pointed to it; added
  as the first item in the "About Us" desktop dropdown and the mobile nav.
- **[FIXED] Platform Inference card dots cluster overlapped sub-text** —
  moved cluster from y=326-342 to y=322-334 on the title row where text
  doesn't reach.
- **[FIXED] 10 heading-hierarchy jumps** across 9 pages — footer h4 → h3,
  card-headlines h4 → h3, hero-bullets h3 → h2, FAQ category h2s added as
  sr-only, request-demo form gets sr-only h2.
- **[FIXED] News-updates email input had no accessible label** — added
  aria-label="Email address".
- **[FIXED] Three pages had divergent footer taglines** (product, our-models,
  pricing). Unified to the canonical "Advanced machine learning for mining
  site discovery..." string.
- **[FIXED] Video-404 perma-locked the hero** — if the .mp4 fails to load,
  the page would never unlock scroll. Added a 6-second readiness timeout
  + a video error-event listener that drops the lock and reveals bullets.
- **[FIXED] `prefers-reduced-motion` was ignored** — now skips the hero
  scrub entirely and shows the still hero with bullets already visible.
- **[FIXED] Global `.xr-eyebrow { display: none }` was hiding functional
  in-card labels** ("What you bring", "Accuracy", "Model execution
  timeline", etc.) — refactored to use `:has(.xr-eyebrow-hex)` so only
  the section-chrome (yellow hex + "01 · Section" pattern) gets hidden;
  card labels remain visible.
- **[FIXED] why-xray proof-card metric labels disappeared** — added a
  dedicated `.proof-label` class so labels survive any future eyebrow
  CSS changes too.
- **[FIXED] Footer copyright low contrast (3.94:1)** — bumped to
  `--xr-text-2` for 8.34:1, passes WCAG AA for small text.
- **[FIXED] Product page "Long-term" pill low contrast** — bumped to
  `--xr-text-2` color, passes 4.5:1.
- **[FIXED] 185 decorative SVGs had no accessibility attribute** — all
  now `aria-hidden="true"` so screen readers skip them.
- **[FIXED] Mobile nav was inconsistent across 14 of 15 pages** — every
  page now has the full 13-page mobile menu + Request Demo CTA.
- **[ADDED] Open Graph + Twitter card meta on every page** — title,
  description, og:image (`mj-canyon-8k.jpg`), og:url, og:type,
  twitter:card. Links shared on social will preview properly.

## P1 — Bugs / a11y compliance still open

### Low-contrast small text (10–12px, --xr-text-muted on void)
The `.pdt-track-step.muted .pill`, .footer copyright, and several other
~11px muted-grey labels measure ~3.94:1 against `#0E141B` — just below
the WCAG AA 4.5:1 threshold for small text. Options:
1. Bump the brand `--xr-text-muted` from `#6F7B8B` to `#8A95A6` site-wide
   (raises to ~6:1). Big visual impact — touches many surfaces.
2. Only override for small text by class: add `.xr-mono-small` rule that
   uses `--xr-text-2` (#A8B2C0) when the parent is small-and-muted. Low
   visual impact.
3. Accept the non-compliance for decorative micro-text and document.

Recommendation: **option 2**, scope to footer copyright + "Roadmap" /
"Long-term" pills and similar 10–11px contexts only.

### Hero reverse smoothness
The keyframe-per-frame `.mp4` rewinds via GSAP `currentTime` tween in
Chrome (negative `playbackRate` is silently ignored). Already added
`requestVideoFrameCallback` syncing to the rAF fallback so the next
frame is presented before we advance. For a *truly* smooth reverse the
production-quality move is to **pre-decode the 91 frames into an
offscreen `<canvas>` array on load**, then blit per-frame during
reverse. Cost: ~120 lines of JS, ~12 MB memory for 91 frames at
1080p Y′CbCr 4:2:0. Not yet implemented.

### Image quality of `mj-landscape-sharp.jpg`
Still a Lanczos upscale from 1456×816. Renders crisp at 1× but pixelated
on retina. Blocked: Midjourney credits exhausted. Replacement target:
4-8K native render with the same canyon composition.

## P2 — Backlog items doable without new image generation

### Product page header rebuild
Per `prompt feedback/Product page edits/2/`:
- Drop the right-side data-viz block
- Condense header into the "green rectangle" area marked on the ref
- Body paragraph into "red rectangle" area
- Request Demo / How It Works buttons into "blue rectangle" area
- New diagram replacing the current one
- Replace tables with diagrams (multiple tables across the page)

This is a ~2-3 hour rebuild for a single page. Code-only — bg image
swap can happen separately when MJ credits return.

### Platform page: replace remaining hex icons in Fusion section
Per the same doc — the section ABOVE the four-source cards has hex
icons that the user wants replaced with "an image or heading that
explains what is discussed in the bullet points underneath". The
four-card layout already uses topper SVG illustrations + category
labels (per May-2026 rebuild), so this might already be done — needs
visual review side-by-side with the user's reference image.

### Investors: rebuild "marked sections" in different visual format
Per `prompt feedback/Investors page edits/1/`: two specific sections
flagged as "looking heavily AI generated" and needing a "completely
different format". Current code has the rebuilt vertical-timeline
markers and removed footer stats — need user visual sign-off on what
counts as "still too AI-looking".

### Resources page: redesign marked section
Per the doc, one section needs to be "more visually appealing". Likely
the "Technical documentation" white-paper card grid or the "For new
clients" guide grid. Both are clean 3-column card grids — the win
would be a more editorial/magazine-style layout (asymmetric, larger
hero card, smaller side cards).

## P3 — Polish / aspirational improvements

### Custom cursor on the hero
A subtle ring cursor on the hero that grows when over a green hex,
reinforcing the "scrub the prediction map" metaphor.

### Animated counter on first visible mineral / accuracy stat
The homepage stats are static numbers. A subtle count-up animation
when each stat enters the viewport (already triggers via `data-target`
in the anim layer for some places — sweep and apply to the remaining
proof-card numbers on why-xray + investors).

### "What changed since you last visited" banner
For repeat visitors (cookie or localStorage flag), show a top banner
linking to the latest news-updates entry. Useful as the lithium model
approaches launch — gives investors and prospects a low-cost reason
to come back.

### Glossary tooltips for technical terms
"Aeromagnetics", "SWIR", "MRDS", "polymetallic nodules" — these appear
throughout but assume reader familiarity. A `<dfn>`-based tooltip on
first occurrence per page would help non-geoscience readers (esp. on
investors + resources pages).

### Pre-load model accuracy chart on resources page
The Nevada Lithium Model case study card on resources shows "90%
Out-of-Sample" but no visual — adding the actual probability-vs-frequency
distribution curve (canvas or SVG) would make the claim more credible
and harder to dismiss as marketing copy.

### Dark-light toggle (deferred)
Site is dark-only by brand mandate. If/when a light variant ever
becomes desirable (e.g. for technical docs printable as PDF reports),
the brand palette would need a paired light system. Not a priority
right now — listed for completeness.

### Page transition hints
Currently nav clicks cause a hard reload. A subtle fade-to-black
(50 ms) on link click + corresponding fade-in on next page load
would feel more "app-like" without a full SPA framework.

### Hex-grid background detail on dark sections
The existing `.xr-topo-hex-tr` decorations are nice but a much more
sparse, slowly-drifting hex pattern across long dark sections (CTAs,
Why-X-Ray "What you don't get anywhere else") would reinforce the
hex motif without competing for attention.

### "Built with" partner / tech badge row
On about-us or platform pages: tasteful row of trust-builder logos
(AWS, NVIDIA cuDF, Sentinel Hub, etc.) at low opacity. Reads as
"these are the rails" rather than client logos (which we don't have
yet pre-launch).

### Founder photos with hex-clip frames
Currently the team-card avatars are letter-initials inside a hex
border. When real photos are available, applying the same hex clip-path
to founder portraits would be a beautiful brand-consistent moment.

### Section-anchor scrollspy
The platform + faqs pages have multiple anchored sections — adding a
right-edge "current section" indicator (a la stripe.com or vercel.com)
would aid navigation.

### Pricing tier reveal with crossfade SVGs
The pricing page currently shows all three tiers statically. A reveal
animation where the *currently-available* tier is visually distinct
(Explorer = lit, Operator/Enterprise = faded with "Coming Later"
chips) would visually reinforce the "Explorer is the only commercially
offered tier right now" messaging that the user emphasised.

### Mineral map background
Replace one of the dark-void section backgrounds with a stylised
USGS MRDS scatter plot — actual mineral occurrence dots forming the
backdrop. Reinforces the "trained on confirmed deposits" claim
visually. Could be SVG (lightweight) or canvas.

### Performance: lazy-load below-the-fold images
Currently all `<img>` tags load eagerly. Adding `loading="lazy"` to
images below the first 1500px improves LCP and reduces initial
bandwidth — particularly important for the news-updates + our-team
pages with multiple article-card images.

### SEO: per-page Open Graph + Twitter cards
None of the 15 pages currently expose og:title, og:description, or
og:image. When the site goes live + people share links, the previews
will be bare. Add a per-page meta block + a default fallback image.

### Sitemap.xml + robots.txt
For WordPress deploy, Yoast or RankMath usually handles this. Worth
verifying once the Code Snippets are activated in production.

## Maintenance notes

### Files added to repo root during this audit (safe to delete)
- `_audit.mjs`, `_audit-report.json`, `_audit-report.md` (initial console/404 audit)
- `_responsive_audit.mjs`, `_responsive-report.md` (multi-viewport)
- `_audit-shots/` (screenshots from responsive audit — 45 PNGs)
- `_link_audit.mjs`, `_links-report.md` (internal-link reachability)
- `_orphan_check.mjs` (page orphan finder)
- `_a11y_audit.mjs`, `_a11y-report.{json,md}` (accessibility scan)
- `_consistency_audit.mjs`, `_consistency-report.md` (nav/footer drift)
- `_footer_diff.mjs` (one-off footer diff)
- `_hero_edge_cases.mjs` (video-404 + reduced-motion tests)
- `_nav_fix.mjs`, `_h4_to_h3.mjs`, `_docx2txt.ps1` (one-off scripts)
- `_BACKLOG.md` (this file's backlog section, consolidated)
- `_IDEAS.md` (this file)

All begin with `_` so they're easy to bulk-delete: `rm _*.mjs _*.md _*.json _*.ps1 _audit-shots -r`.

### Production deploy parity
- `wordpress-deploy/customizer.css` — synced with `xray-system.css` (utility classes + footer h3/h4 rule).
- `wordpress-deploy/scroll-animation-hero.js` — synced with `xray-hero.js` (reduced-motion + video-404 fail-safes).
- `wordpress-deploy/scroll-animation.js` / `-anim.js` — already in sync with `xray-anim.js`.
- `wordpress-deploy/code-snippets.php` — unchanged this session.
