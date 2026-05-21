# Overnight Troubleshooting Session — Summary
Date: 2026-05-15 (session pulled overnight per user request)

## Final state of the site

| Metric | Before | After |
|---|---|---|
| Pages with console errors | 0 / 15 | 0 / 15 |
| Pages with failed network requests | 0 / 15 | 0 / 15 |
| Pages reachable from internal nav | 14 / 15 | **15 / 15** |
| Internal links resolving 200 | 14 / 14 | **15 / 15** |
| Heading hierarchy jumps | **10** | **0** |
| Unlabeled form inputs | 1 | 0 |
| Buttons without accessible name | 0 | 0 |
| Decorative SVGs missing `aria-hidden` | **185** | **0** |
| Mobile-nav variants | 5 (drifting) | **1** (canonical) |
| Footer tagline variants | 4 (drifting) | **1** (canonical) |
| Meta descriptions over 165 chars (SERP-clipping) | **4** | **0** |
| Pages with OG / Twitter card meta | 0 / 15 | **15 / 15** |
| Hero stuck if video 404s | yes | **no** (6-s timeout + error listener) |
| `prefers-reduced-motion` honored | no | **yes** (skips scrub) |
| Hero keyboard nav focus rings | all visible | all visible |
| WCAG AA contrast on footer copyright | 3.94:1 (fail) | **8.34:1 (pass)** |

## Fixes shipped

### Bug fixes (user-visible)
1. **Platform hero "X-Ray" wrapped awkwardly on mobile.**
   Fix: wrapped `X-Ray` in `<span style="white-space:nowrap">` in `platform.html:265`.

2. **`about-us.html` was orphaned — no nav link pointed to it.**
   Fix: added `<a href="about-us.html">About Us</a>` to the desktop "About Us" dropdown
   AND the mobile-nav on all 15 pages.

3. **Inference card dots cluster overlapped "Per-mineral models" sub-text in the Platform pipeline diagram.**
   Fix: relocated dots from y=326-342 to y=322-334 on the title row, where short title text doesn't reach (`platform.html:320-331`).

4. **Footer column heading hierarchy jumped h2 → h4.**
   Fix: renamed every footer column header from `<h4>` to `<h3>` across all 15 pages; updated `.xr-footer h4` CSS to accept both for safety.

5. **Hero bullets used `<h3>` directly under `<h1>`, skipping `<h2>`.**
   Fix: hero bullet heads (`Validated accuracy`, `From months to hours`, `Software pricing`, `A compounding advantage`) are now `<h2 class="xr-hero-bullet-head">`.

6. **Several "Nevada Lithium" / phase-card headings on index/our-models/product used `<h4>` under section `<h2>`.**
   Fix: renamed them all to `<h3>` and updated the corresponding CSS selectors.

7. **Three pages had divergent footer taglines** (product, our-models, pricing).
   Fix: unified to the canonical "Advanced machine learning for mining site discovery..."

8. **`news-updates.html` email input had no accessible label.**
   Fix: added `aria-label="Email address"`.

9. **Faqs.html had four "section" labels (Product / Data & Security / Pricing & Contracts / Technical) hidden by the eyebrow-rule; screen readers got no per-section heading.**
   Fix: added a `<h2 class="xr-sr-only">` (visually-hidden) heading before each section. Visible layout unchanged.

10. **request-demo.html had no `<h2>` between `<h1>` and footer `<h3>`s.**
    Fix: added a hidden `<h2 class="xr-sr-only">Demo request form</h2>` before the form.

11. **Hero stayed scroll-locked forever if `website_hero_scrub.mp4` 404'd.**
    Fix: added a `setTimeout(6000)` and a `video.error` listener that release the scroll lock + reveal bullets on failure. State machine flips to `completed` so the reverse-handler doesn't fight it. Initial check catches `video.error` set before the listener was attached.

12. **`prefers-reduced-motion: reduce` was ignored — hero still scroll-locked + scrub-played.**
    Fix: early-return in `init()` that skips the lock + scrub entirely and pre-reveals the bullets.

13. **Global `.xr-eyebrow { display: none !important }` was hiding functional in-card labels** like "What you bring", "Model execution timeline", "Sample output · Target #1" (how-it-works), the accuracy / cost-advantage / data-modalities / turnaround labels on why-xray's proof cards, etc.
    Fix: scoped the rule to `.xr-eyebrow:has(.xr-eyebrow-hex)` so only the yellow-hex section chrome gets hidden, while pure-text eyebrow labels remain visible. Also added a dedicated `.proof-label` class to the why-xray proof-cards so they're insulated from any future eyebrow-rule changes.

14. **185 decorative SVGs site-wide had no `aria-hidden`.**
    Fix: bulk-added `aria-hidden="true"` to every `<svg>` that didn't already carry an aria attribute or `<title>` element. Screen readers now skip the decorative icons.

15. **Mobile-nav was inconsistent across 14 of 15 pages** (different page sets, different spacing).
    Fix: standardised every page's `<div class="xr-nav-mobile">` block to the canonical 13-link list + Request Demo CTA.

### A11y / contrast
16. Footer copyright bumped from `--xr-text-muted` (3.94:1) to `--xr-text-2` (8.34:1).
17. Product page "Long-term" pill bumped from `--xr-text-muted` to `--xr-text-2` (~6.2:1).
18. Added `.xr-nobreak` and `.xr-sr-only` utility classes in xray-system.css.

### SEO + sharing
19. Added Open Graph (`og:title`, `og:description`, `og:type`, `og:url`, `og:image`, `og:image:width`, `og:image:height`, `og:site_name`) + Twitter card (`summary_large_image`) meta to all 15 pages. Default `og:image` = `mj-canyon-8k.jpg`.
20. Trimmed 4 over-long meta descriptions (index, product, our-models, platform) under the 165-char SERP-truncation threshold.

### Hero animation polish
21. The rAF fallback for reverse now uses `requestVideoFrameCallback` (Chrome/Edge) so each `video.currentTime` update is presented before scheduling the next step — eliminates perceptible stutter on the reverse scrub.

### Deploy parity
- `wordpress-deploy/scroll-animation-hero.js` synced with `xray-hero.js`.
- `wordpress-deploy/customizer.css` synced with `xray-system.css` (utility classes + new eyebrow scoping).
- `wordpress-deploy/scroll-animation.js` and `-anim.js` already in sync with `xray-anim.js`.

## Still on the backlog (see _BACKLOG.md + _IDEAS.md)

### Blocked on Midjourney credits
- Sharper `mj-landscape-sharp.jpg` (currently Lanczos-upscaled from 1456×816)
- 4–8K bgs for Industries, Our Models, Platform, How-It-Works, Pricing, Resources, Investors

### Code-only rebuilds (no MJ needed)
- Product page: header layout per `prompt feedback/Product page edits/2/`, drop right-side viz, new diagram, drop tables
- Investors: rebuild marked sections in different visual format (user flagged them as still "too AI-looking")
- Resources: redesign the "marked section" in a more editorial layout
- Per-frame canvas-blit reverse for the hero video (true smoothness — ~120 LoC + ~12 MB memory)

### Aspirational (P3 polish)
- Custom hero cursor, scrollspy on platform + faqs, page-transition fade,
  glossary tooltips, founder-photo hex frames, "Built with" trust row, etc.
  (See `_IDEAS.md` "P3 — Polish / aspirational improvements" section for the full list.)

## Audit reports written this session

- `_audit-report.{json,md}` — console errors / 404 assets across all pages
- `_responsive-report.md` — multi-viewport overflow detection
- `_audit-shots/` — 45 full-page screenshots (15 pages × 3 viewports)
- `_links-report.md` — internal-link reachability
- `_a11y-report.{json,md}` — heading hierarchy, contrast, form labels, ARIA
- `_consistency-report.md` — nav + footer drift across pages
- `_svg-a11y-report.json` — decorative-SVG attribute coverage
- `_BACKLOG.md` — consolidated from `prompt feedback/*.docx`
- `_IDEAS.md` — design improvement ideas, both fixed and proposed
- `_SESSION_SUMMARY.md` — this file

## Files to delete when you're done reviewing

All temp files this session begin with `_`:
```
rm _*.mjs _*.md _*.json _*.ps1 _*.txt
rm -rf _audit-shots
```

(Or leave them — they're harmless and useful for future audits.)

## Production deploy checklist

When you're ready to push to WordPress:
1. Upload `wordpress-deploy/scroll-animation.js`, `scroll-animation-anim.js`, `scroll-animation-hero.js` to GitHub.
2. Update `code-snippets.php` SNIPPET B with the jsDelivr CDN URL.
3. Paste `wordpress-deploy/customizer.css` into Appearance → Customize → Additional CSS.
4. Activate snippets A-E in the Code Snippets plugin.
5. Hard-refresh the live site and verify the hero animation plays, the about-us link is in the nav, and the footer copyright reads clearly.
