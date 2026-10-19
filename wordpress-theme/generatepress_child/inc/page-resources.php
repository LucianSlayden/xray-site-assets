<?php
/**
 * Moved from Code Snippets #25 "Resources Page Content".
 */

/* ══ Resources page — content + styles injection ══════════════════════
   Hook: generate_before_content (fires inside .entry-content)
   Condition: only on the /resources/ page
   IMPORTANT: The WordPress page editor for /resources/ should be empty.
   ════════════════════════════════════════════════════════════════════ */
add_action( 'generate_before_content', function () {
  if ( ! is_page( 'resources' ) ) return;
  ?>
<style>
/* Resources — GeneratePress wrapper resets */
#content,
#content .inside-site-content,
#content .grid-container,
#content .grid-parent,
#primary, .content-area, .grid-item,
#main, .site-main,
article, .inside-article, .entry-content {
	max-width: none !important;
	width: 100% !important;
	padding: 0 !important;
	margin: 0 !important;
	background: transparent !important;
	border: none !important;
	box-shadow: none !important;
	overflow: visible !important;
	float: none !important;
}
.entry-content { position: relative !important; z-index: 2 !important; }
.site, .site-wrap, .site-inner, .site-content,
.inside-site-content, .site-header-wrap,
.container, .inside-container { background: transparent !important; }

/* Page background — only on Resources page */
html { background: #0E141B; }
body { background: transparent !important; }

/* ── Fixed background image + canvas ──────────────────────────── */
#xr-page-bg {
  position: fixed;
  inset: 0; z-index: 0;
  background: url('https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/mj-hex-bg-full.webp') 100% 0% / 200% auto no-repeat;
  opacity: 0.28;
  pointer-events: none;
}
#xr-anim-canvas {
  position: fixed;
  top: 0; left: 0; width: 100%; height: 100%;
  z-index: 1;
  pointer-events: none;
}

/* ── Kill default hero/section backgrounds — let canvas show through */
.xr-page-hero {
  position: relative; overflow: hidden;
  background: transparent !important;
}
.xr-page-hero::before,
.xr-page-hero::after { display: none !important; }
.xr-section,
.xr-section-deep,
.xr-section-void { background: transparent !important; }
.xr-section-rule,
.xr-topo-layer,
.xr-topo-hex-tr,
.xr-topo-hex-bl,
.xr-topo-wash,
.xr-topo-contours,
.xr-topo-lattice { display: none !important; }

/* Page sections must sit above canvas */
.xr-page-hero,
.xr-section { position: relative; z-index: 2; }
.xr-footer   { z-index: 2; position: relative; }
.xr-container { background: transparent !important; }

/* ── Scroll-reveal animation (from xray-system.css) ────────────── */
.xr-reveal { opacity: 0; transform: translateY(28px); transition: opacity .8s cubic-bezier(0.22,1,0.36,1), transform .8s cubic-bezier(0.22,1,0.36,1); }
.xr-reveal.in { opacity: 1; transform: translateY(0); }
.xr-d1 { transition-delay: 0.08s; }
.xr-d2 { transition-delay: 0.16s; }
.xr-d3 { transition-delay: 0.24s; }
.xr-d4 { transition-delay: 0.32s; }
@media (prefers-reduced-motion: reduce) {
  .xr-reveal { opacity: 1 !important; transform: none !important; transition: none !important; }
}

/* ── Hero heading size ──────────────────────────────────────────── */
.xr-page-hero h1 { font-size: clamp(38px, 4.8vw, 70px); }

/* ── Featured card ──────────────────────────────────────────────── */
.featured-card {
  background: rgba(22,29,39,0.92) !important;
  border: 1.5px solid rgba(232,185,99,0.4);
  border-radius: 2px;
  padding: 48px;
  display: grid; grid-template-columns: 1fr auto; gap: 48px;
  align-items: center;
  position: relative; overflow: hidden;
  box-shadow: 0 18px 60px rgba(232,185,99,0.08);
}
.featured-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
  background: linear-gradient(90deg, var(--xr-gold), rgba(232,185,99,0.2));
}
@media (max-width: 880px) { .featured-card { grid-template-columns: 1fr; gap: 32px; padding: 32px; } }

/* ── Resource cards ─────────────────────────────────────────────── */
.res-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
@media (max-width: 980px) { .res-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 620px) { .res-grid { grid-template-columns: 1fr; } }
.res-card {
  background: rgba(22,29,39,0.88) !important;
  border: 1px solid rgba(232,185,99,0.18);
  border-radius: 2px;
  padding: 28px;
  display: flex; flex-direction: column;
  transition: border-color .25s, transform .25s, box-shadow .25s;
}
.res-card:hover { border-color: rgba(232,185,99,0.4); transform: translateY(-3px); box-shadow: 0 14px 40px rgba(0,0,0,0.4); }
.res-card.sky-border { border-color: rgba(111,181,224,0.22); }
.res-card.sky-border:hover { border-color: rgba(111,181,224,0.45); }
.res-tag {
  display: inline-block;
  font-family: var(--xr-font-mono); font-size: 10.5px; font-weight: 600;
  letter-spacing: 0.14em; text-transform: uppercase;
  padding: 4px 10px; border-radius: 2px;
  margin-bottom: 18px;
  background: rgba(232,185,99,0.12); color: var(--xr-gold);
  align-self: flex-start;
}
.res-card.sky-border .res-tag { background: rgba(111,181,224,0.12); color: var(--xr-sky); }
.res-card h3 { font-size: 18px; line-height: 1.3; margin: 0 0 12px; letter-spacing: -0.01em; }
.res-card p { color: var(--xr-text-2); font-size: 14px; line-height: 1.7; margin: 0 0 auto; padding-bottom: 18px; }
.res-card a.req {
  color: var(--xr-gold); font-family: var(--xr-font-mono); font-size: 13px; font-weight: 600;
  letter-spacing: 0.04em;
  transition: gap .15s; display: inline-flex; align-items: center; gap: 6px;
  text-decoration: none;
}
.res-card.sky-border a.req { color: var(--xr-sky); }
.res-card a.req:hover { gap: 10px; }

/* ── Data source cards ──────────────────────────────────────────── */
.ds-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
@media (max-width: 980px) { .ds-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 620px) { .ds-grid { grid-template-columns: 1fr; } }
.ds-card {
  position: relative;
  background: linear-gradient(180deg, rgba(22,29,39,0.92), rgba(14,20,27,0.92));
  border: 1px solid rgba(232,185,99,0.18);
  border-radius: 2px;
  padding: 26px 24px;
  transition: border-color .25s, transform .25s, box-shadow .25s;
  display: flex; flex-direction: column; gap: 14px;
  isolation: isolate; overflow: hidden;
}
.ds-card:hover { border-color: rgba(232,185,99,0.48); transform: translateY(-4px); box-shadow: 0 16px 40px rgba(0,0,0,0.5); }
.ds-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--c, var(--xr-gold)), transparent 80%);
}
.ds-card.sky  { --c: var(--xr-sky); border-color: rgba(111,181,224,0.22); }
.ds-card.sky:hover { border-color: rgba(111,181,224,0.5); }
.ds-card.green { --c: var(--xr-green); border-color: rgba(123,201,122,0.22); }
.ds-card.green:hover { border-color: rgba(123,201,122,0.5); }
.ds-head { display: flex; align-items: center; gap: 14px; }
.ds-icon {
  width: 33px; height: 38px;
  clip-path: polygon(50% 0%,100% 25%,100% 75%,50% 100%,0% 75%,0% 25%);
  background: rgba(232,185,99,0.16);
  display: inline-flex; align-items: center; justify-content: center;
  color: var(--c, var(--xr-gold)); flex-shrink: 0;
}
.ds-card.sky  .ds-icon { background: rgba(111,181,224,0.16); }
.ds-card.green .ds-icon { background: rgba(123,201,122,0.16); }
.ds-icon svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 1.6; }
.ds-card .ds-name {
  font-family: var(--xr-font-mono); font-weight: 700;
  font-size: 13.5px; letter-spacing: 0.06em; color: var(--xr-text);
  text-transform: uppercase; line-height: 1.25;
}
.ds-card .ds-type {
  color: var(--c, var(--xr-gold));
  font-family: var(--xr-font-mono); font-size: 11px;
  letter-spacing: 0.14em; text-transform: uppercase; margin-top: 2px;
}
.ds-meta { display: flex; gap: 8px; flex-wrap: wrap; margin-top: auto; padding-top: 4px; }
.ds-meta .pill {
  display: inline-flex; align-items: center; gap: 6px;
  padding: 5px 10px; border-radius: 2px;
  font-family: var(--xr-font-mono); font-size: 11px; letter-spacing: 0.05em;
  background: rgba(14,20,27,0.6); border: 1px solid rgba(232,185,99,0.18);
  color: var(--xr-text-2);
}
.ds-meta .pill strong { color: var(--xr-text); font-weight: 600; }
</style>

<div id="xr-page-bg" aria-hidden="true"></div>
<canvas id="xr-anim-canvas" aria-hidden="true"></canvas>

<nav class="xr-nav">
  <div class="xr-nav-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="xr-brand">
      <img class="xr-brand-logo" src="https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/logo-wordmark.png" alt="X-Ray Geoanalytics" width="570" height="180">
    </a>
    <div class="xr-nav-list">
      <div class="xr-nav-item">
        <button class="xr-nav-btn">Product<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/product/' ) ); ?>">Product Overview</a>
          <a href="<?php echo esc_url( home_url( '/our-models/' ) ); ?>">Our Models</a>
          <a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>">Industries</a>
          <a href="<?php echo esc_url( home_url( '/platform/' ) ); ?>">Platform</a>
          <a href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>">How it Works</a>
          <a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>">Pricing</a>
        </div>
      </div>
      <div class="xr-nav-item">
        <button class="xr-nav-btn" style="color:var(--xr-gold);">Resources<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>" style="color:var(--xr-gold);">Resources</a>
          <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">Investors</a>
        </div>
      </div>
      <div class="xr-nav-item">
        <button class="xr-nav-btn">About Us<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a>
          <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a>
          <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">Why X-Ray</a>
          <a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a>
          <a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">FAQs</a>
        </div>
      </div>
      <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold xr-nav-cta">Request Demo</a>
    </div>
    <button class="xr-nav-toggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
  </div>
  <div class="xr-nav-mobile">
    <a href="<?php echo esc_url( home_url( '/product/' ) ); ?>">Product</a>
    <a href="<?php echo esc_url( home_url( '/our-models/' ) ); ?>">Our Models</a>
    <a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>">Industries</a>
    <a href="<?php echo esc_url( home_url( '/platform/' ) ); ?>">Platform</a>
    <a href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>">How it Works</a>
    <a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>">Pricing</a>
    <a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>" style="color:var(--xr-gold);">Resources</a>
    <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">Investors</a>
    <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a>
    <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a>
    <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">Why X-Ray</a>
    <a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a>
    <a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">FAQs</a>
    <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request Demo</a>
  </div>
</nav>
<!-- ══ HERO ══════════════════════════════════════════════════════ -->
<section class="xr-page-hero xr-topo">
  <div class="xr-topo-layer xr-topo-contours"></div>
  <div class="xr-topo-layer xr-topo-wash"></div>
  <div class="xr-topo-hex-tr"></div>
  <div class="xr-container">
    <div class="xr-reveal"><span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Resources</span></div>
    <h1 class="xr-reveal xr-d1" style="max-width:920px;margin-top:18px;">Everything you need to <span style="color:var(--xr-gold);">evaluate X-Ray</span>.</h1>
    <p class="xr-reveal xr-d2 xr-lede" style="max-width:680px;margin-top:14px;">Our model report, the data our models learn from, and how the platform works for exploration teams considering X-Ray for their programs.</p>
  </div>
</section>

<!-- ══ FEATURED ══════════════════════════════════════════════════ -->
<section class="xr-section xr-section-deep xr-topo" style="padding-bottom:72px;">
  <div class="xr-topo-layer xr-topo-lattice"></div>
  <div class="xr-container">
    <div class="xr-reveal featured-card">
      <div>
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="background:var(--xr-gold);color:var(--xr-void);font-family:var(--xr-font-mono);font-size:10.5px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;padding:4px 11px;border-radius:2px;">Featured</span>
          <span style="color:var(--xr-text-muted);font-family:var(--xr-font-mono);font-size:13px;letter-spacing:0.04em;">Model Report</span>
        </div>
        <h2 style="font-size:clamp(24px,2.6vw,32px);line-height:1.2;margin:0 0 16px;max-width:680px;">Early Nevada Lithium Model: 69% of Deposits Recovered in the Top 10% of Ranked Ground</h2>
        <p style="color:var(--xr-text-2);font-size:16px;line-height:1.75;margin:0 0 24px;max-width:640px;">Our report on an early version of our lithium model. It covers a feature matrix of 19,000 grid cells across Nevada built from geochemistry, structural, lithology, geophysics, geothermal and topography data, labels drawn from existing mine sites, geochemistry and mining claim data, a weighted model ensemble evaluated with spatial block cross-validation, and an honest look at its limits. Our later Great Basin model has since addressed the largest of those, cell size and underprediction, and reaches 95% recall and 80% precision at 1x1 km cells.</p>
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request full report</a>
      </div>
      <div style="display:flex;flex-direction:column;gap:12px;flex-shrink:0;">
        <div style="background:var(--xr-card);border:1px solid rgba(232,185,99,0.4);border-radius:2px;padding:22px 28px;text-align:center;min-width:160px;">
          <div style="font-family:var(--xr-font-display);font-size:42px;font-weight:700;line-height:1;color:var(--xr-gold);">69%</div>
          <div class="xr-eyebrow" style="justify-content:center;margin-top:6px;">In top 10%</div>
        </div>
        <div style="background:var(--xr-card);border:1px solid rgba(111,181,224,0.32);border-radius:2px;padding:22px 28px;text-align:center;min-width:160px;">
          <div style="font-family:var(--xr-font-display);font-size:42px;font-weight:700;line-height:1;color:var(--xr-sky);">6</div>
          <div class="xr-eyebrow" style="justify-content:center;margin-top:6px;color:var(--xr-sky);">Data categories</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ WHITE PAPERS ══════════════════════════════════════════════ -->
<section class="xr-section xr-section-void xr-topo" style="padding-top:64px;">
  <div class="xr-topo-layer xr-topo-contours" style="opacity:0.35;"></div>
  <div class="xr-topo-layer xr-topo-wash"></div>
  <div class="xr-container">
    <div class="xr-reveal" style="margin-bottom:36px;">
      <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>The Technology</span>
      <h2 style="margin-top:14px;">How our models work.</h2>
    </div>
    <div class="res-grid xr-reveal xr-d1">
      <div class="res-card">
        <span class="res-tag">Model</span>
        <h3>Great Basin Lithium Model</h3>
        <p>Predicts lithium deposits across the whole Great Basin region at 1x1 km cells, with 95% recall and 80% precision. It runs on our proprietary featuresets: lists of geological features that indicate lithium mineralization, designed in-house.</p>
        <a class="req" href="<?php echo esc_url( home_url( '/our-models/' ) ); ?>">Our models <span class="xr-arrow">→</span></a>
      </div>
      <div class="res-card">
        <span class="res-tag">Method</span>
        <h3>Ensemble Learning and Validation</h3>
        <p>An ensemble of XGBoost and LightGBM models with feature selection algorithms, tested with spatial block, repeated stratified k-fold and leave-one-out cross-validation. Field validation against real boreholes comes next.</p>
        <a class="req" href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>">How it works <span class="xr-arrow">→</span></a>
      </div>
      <div class="res-card">
        <span class="res-tag">Roadmap</span>
        <h3>Finer Resolution, More Minerals</h3>
        <p>We're building finer layers at 100–500 m per cell, toward a hierarchy of models that can point to exact drill coordinates. Nickel is the next commodity model, because our customers already explore for it alongside lithium.</p>
        <a class="req" href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">Read the FAQs <span class="xr-arrow">→</span></a>
      </div>
    </div>
  </div>
</section>

<!-- ══ DATA SOURCES ══════════════════════════════════════════════ -->
<section class="xr-section xr-section-deep xr-topo">
  <div class="xr-topo-layer xr-topo-lattice"></div>
  <div class="xr-container">
    <div class="xr-reveal" style="margin-bottom:36px;">
      <span class="xr-eyebrow" style="color:var(--xr-sky);"><span class="xr-eyebrow-hex" style="background:var(--xr-sky);"></span>Data Reference</span>
      <h2 style="margin-top:14px;">What our models learn from.</h2>
    </div>
    <div class="xr-reveal xr-d1 ds-grid">
      <div class="ds-card">
        <div class="ds-head">
          <span class="ds-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M4.2 4.2l2.1 2.1M17.7 17.7l2.1 2.1M4.2 19.8l2.1-2.1M17.7 6.3l2.1-2.1"/></svg></span>
          <div><div class="ds-name">Geochemistry</div><div class="ds-type">Training feature</div></div>
        </div>
        <div class="ds-meta">
          <span class="pill"><strong>Coverage:</strong> Great Basin</span>
          <span class="pill"><strong>Also used for:</strong> Labels</span>
        </div>
      </div>
      <div class="ds-card sky">
        <div class="ds-head">
          <span class="ds-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M3 12c2-4 6-4 9 0s7 4 9 0"/><path d="M3 16c2-4 6-4 9 0s7 4 9 0"/></svg></span>
          <div><div class="ds-name">Geophysics</div><div class="ds-type">Training feature</div></div>
        </div>
        <div class="ds-meta">
          <span class="pill"><strong>Coverage:</strong> Great Basin</span>
        </div>
      </div>
      <div class="ds-card sky">
        <div class="ds-head">
          <span class="ds-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 4l8 4 8-4M4 12l8 4 8-4M4 20l8-4 8 4"/></svg></span>
          <div><div class="ds-name">Structural</div><div class="ds-type">Training feature</div></div>
        </div>
        <div class="ds-meta">
          <span class="pill"><strong>Coverage:</strong> Great Basin</span>
        </div>
      </div>
      <div class="ds-card">
        <div class="ds-head">
          <span class="ds-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="1.6"/><path d="M21 15l-5-5L5 21"/></svg></span>
          <div><div class="ds-name">Lithology</div><div class="ds-type">Training feature</div></div>
        </div>
        <div class="ds-meta">
          <span class="pill"><strong>Coverage:</strong> Great Basin</span>
        </div>
      </div>
      <div class="ds-card">
        <div class="ds-head">
          <span class="ds-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3v18M5 6c5 4 9 4 14 0M5 18c5-4 9-4 14 0"/></svg></span>
          <div><div class="ds-name">Geothermal</div><div class="ds-type">Training feature</div></div>
        </div>
        <div class="ds-meta">
          <span class="pill"><strong>Coverage:</strong> Great Basin</span>
        </div>
      </div>
      <div class="ds-card green">
        <div class="ds-head">
          <span class="ds-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M3 18l5-7 4 5 3-4 6 6"/><path d="M3 20h18"/></svg></span>
          <div><div class="ds-name">Topography</div><div class="ds-type">Training feature</div></div>
        </div>
        <div class="ds-meta">
          <span class="pill"><strong>Coverage:</strong> Great Basin</span>
        </div>
      </div>
      <div class="ds-card" style="grid-column: 1 / -1;">
        <div class="ds-head">
          <span class="ds-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><polygon points="12,2 22,8.5 22,15.5 12,22 2,15.5 2,8.5"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg></span>
          <div>
            <div class="ds-name">Training labels</div>
            <div class="ds-type">Existing mine sites, geochemistry and mining claim data</div>
          </div>
        </div>
        <div class="ds-meta">
          <span class="pill"><strong>Use:</strong> Ground-truth labels for training and validation</span>
          <span class="pill"><strong>Coming next:</strong> Water well, oil and gas, and lithium drill logs</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ ONBOARDING GUIDES ═════════════════════════════════════════ -->
<section class="xr-section xr-section-void xr-topo">
  <div class="xr-topo-layer xr-topo-contours" style="opacity:0.35;"></div>
  <div class="xr-topo-layer xr-topo-wash"></div>
  <div class="xr-topo-hex-bl"></div>
  <div class="xr-container">
    <div class="xr-reveal" style="margin-bottom:36px;">
      <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>The Platform</span>
      <h2 style="margin-top:14px;">For exploration teams.</h2>
    </div>
    <div class="res-grid xr-reveal xr-d1">
      <div class="res-card sky-border">
        <span class="res-tag">Step 1</span>
        <h3>Upload Your Data</h3>
        <p>Your geologists upload the exploration data they've already collected. It is compartmentalized: used only for your predictions and never to train other customers' models.</p>
        <a class="req" href="<?php echo esc_url( home_url( '/platform/' ) ); ?>">Platform details <span class="xr-arrow">→</span></a>
      </div>
      <div class="res-card sky-border">
        <span class="res-tag">Step 2</span>
        <h3>Get Ranked Drill Targets</h3>
        <p>The platform returns a prospectivity heat map and a ranked list of drill targets, plus a 3D visualization of the area being targeted.</p>
        <a class="req" href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>">How it works <span class="xr-arrow">→</span></a>
      </div>
      <div class="res-card sky-border">
        <span class="res-tag">Step 3</span>
        <h3>Keep Your Program Moving</h3>
        <p>Keep uploading drilling data as your program progresses to make quick, informed decisions on where to drill next, with updates as we improve model accuracy.</p>
        <a class="req" href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>">See pricing tiers <span class="xr-arrow">→</span></a>
      </div>
    </div>
  </div>
</section>

<!-- ══ CTA ═══════════════════════════════════════════════════════ -->
<section class="xr-section xr-section-deep xr-topo">
  <div class="xr-topo-layer xr-topo-lattice"></div>
  <div class="xr-topo-hex-tr"></div>
  <div class="xr-container" style="max-width:760px;text-align:center;">
    <span class="xr-reveal xr-eyebrow" style="justify-content:center;margin-bottom:18px;"><span class="xr-eyebrow-hex"></span>Need More?</span>
    <h2 class="xr-reveal xr-d1" style="margin:0 0 18px;">Need specific technical detail?</h2>
    <p class="xr-reveal xr-d2" style="color:var(--xr-text-2);font-size:17px;line-height:1.75;margin:0 auto 40px;max-width:520px;">Want the early Nevada model report, or more on our data and validation methods? Contact us with what your team needs to evaluate X-Ray.</p>
    <div class="xr-reveal xr-d3" style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request a Demo</a>
      <a href="mailto:info@xraygeoanalytics.com" class="xr-btn xr-btn-outline">Email the team <span class="xr-arrow">→</span></a>
    </div>
  </div>
</section>

<footer class="xr-footer">
  <div class="xr-footer-strip"></div>
  <div class="xr-footer-inner">
    <div class="xr-footer-grid">
      <div>
        <div class="xr-footer-brand">
          <img class="xr-brand-logo" src="https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/logo-wordmark.png" alt="X-Ray Geoanalytics" width="570" height="180">
        </div>
        <p class="xr-footer-tagline">Advanced machine learning for mining site discovery. Nevada lithium. Every mineral. Every continent. Every drill result makes us smarter.</p>
        <div class="xr-footer-contact">
          <a href="mailto:info@xraygeoanalytics.com">
            <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="M4 6l8 7 8-7"/></svg>
            info@xraygeoanalytics.com
          </a>
        </div>
      </div>
      <div><h3>Product</h3><ul class="xr-footer-list">
        <li><a href="<?php echo esc_url( home_url( '/product/' ) ); ?>">Overview</a></li>
        <li><a href="<?php echo esc_url( home_url( '/our-models/' ) ); ?>">Our Models</a></li>
        <li><a href="<?php echo esc_url( home_url( '/platform/' ) ); ?>">Platform</a></li>
        <li><a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>">Industries</a></li>
        <li><a href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>">How it Works</a></li>
        <li><a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>">Pricing</a></li>
      </ul></div>
      <div><h3>Company</h3><ul class="xr-footer-list">
        <li><a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a></li>
        <li><a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">Why X-Ray</a></li>
        <li><a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a></li>
        <li><a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">FAQs</a></li>
      </ul></div>
      <div><h3>Resources</h3><ul class="xr-footer-list">
        <li><a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">Resources Library</a></li>
        <li><a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">For Investors</a></li>
        <li><a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>">Request Demo</a></li>
      </ul></div>
      <div><h3>Get in Touch</h3><ul class="xr-footer-list">
        <li><a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>">Book a Demo</a></li>
      </ul></div>
    </div>
    <div class="xr-footer-bottom">
      <p>&copy; 2026 X-Ray Geoanalytics, Inc. All rights reserved.</p>
      <div class="xr-footer-social">
        <a href="https://www.linkedin.com/company/xray-geoanalytics" aria-label="LinkedIn" target="_blank" rel="noopener">
          <svg aria-hidden="true" viewBox="0 0 24 24"><rect x="2" y="9" width="4" height="13"/><circle cx="4" cy="4" r="2" fill="currentColor"/><path d="M22 22V13.5a3.5 3.5 0 0 0-7 0V22M10 22V9"/></svg>
        </a>
        <a href="https://x.com/xraygeoanalytic" aria-label="X" target="_blank" rel="noopener">
          <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 4l16 16M20 4L4 20"/></svg>
        </a>
        <a href="mailto:info@xraygeoanalytics.com" aria-label="Email">
          <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="M4 6l8 7 8-7"/></svg>
        </a>
      </div>
      <p>xraygeoanalytics.com</p>
    </div>
  </div>
</footer>
	<?php
} );

/* ══ Resources — inline canvas + scroll-reveal + nav scripts ════════ */
add_action( 'wp_footer', function () {
  if ( ! is_page( 'resources' ) ) return;
  ?>
<script>
(function(){
'use strict';
/* ── Hex grid + particle background canvas ── */
var canvas=document.getElementById('xr-anim-canvas');
if(canvas){
  var ctx=canvas.getContext('2d'),W,H,t=0;
  var REDUCED=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var HEX_R=52,hexCells=[];
  function hexCorners(cx,cy,r){var pts=[];for(var i=0;i<6;i++){var a=(Math.PI/180)*(60*i);pts.push([cx+r*Math.cos(a),cy+r*Math.sin(a)]);}return pts;}
  function buildHexGrid(){hexCells=[];var colW=HEX_R*1.5,rowH=HEX_R*Math.sqrt(3);var cols=Math.ceil(W/colW)+2,rows=Math.ceil(H/rowH)+2;for(var c=0;c<cols;c++){for(var r=0;r<rows;r++){var cx=c*colW-HEX_R,cy=r*rowH+(c%2===0?0:rowH*0.5)-rowH;hexCells.push({cx:cx,cy:cy,phase:Math.random()*Math.PI*2,speed:0.004+Math.random()*0.008,lit:Math.random()<0.04,litT:0});}}}
  var N=70,particles=[],MAX_C=160;
  function Particle(){this.x=Math.random()*W;this.y=Math.random()*H;this.vx=(Math.random()-0.5)*0.22;this.vy=(Math.random()-0.5)*0.22;this.gold=Math.random()>0.4;this.r=0.8+Math.random()*1.4;this.phase=Math.random()*6.2832;this.freq=0.014+Math.random()*0.018;}
  function initParticles(){particles=[];for(var i=0;i<N;i++)particles.push(new Particle());}
  function resize(){W=canvas.width=window.innerWidth;H=canvas.height=window.innerHeight;buildHexGrid();initParticles();}
  var LIT_INTERVAL=40,litTimer=0;
  function draw(){
    requestAnimationFrame(draw);ctx.clearRect(0,0,W,H);if(!REDUCED)t++;
    litTimer++;if(!REDUCED&&litTimer>=LIT_INTERVAL){litTimer=0;var tl=1+Math.floor(Math.random()*2);for(var k=0;k<tl;k++){var idx=Math.floor(Math.random()*hexCells.length);if(!hexCells[idx].lit){hexCells[idx].lit=true;hexCells[idx].litT=0;}}}
    for(var i=0;i<hexCells.length;i++){var cell=hexCells[i],pts=hexCorners(cell.cx,cell.cy,HEX_R-1);if(cell.lit){cell.litT++;var lt=cell.litT,al;if(lt<40)al=(lt/40)*0.55;else if(lt<100)al=0.55;else if(lt<140)al=((140-lt)/40)*0.55;else{cell.lit=false;al=0;}if(al>0){ctx.beginPath();ctx.moveTo(pts[0][0],pts[0][1]);for(var p=1;p<6;p++)ctx.lineTo(pts[p][0],pts[p][1]);ctx.closePath();ctx.strokeStyle='rgba(232,185,99,'+al+')';ctx.lineWidth=1.2;ctx.stroke();ctx.fillStyle='rgba(232,185,99,'+(al*0.06)+')';ctx.fill();}}else{var ba=0.045+0.015*Math.sin(cell.phase+t*cell.speed);ctx.beginPath();ctx.moveTo(pts[0][0],pts[0][1]);for(var p=1;p<6;p++)ctx.lineTo(pts[p][0],pts[p][1]);ctx.closePath();ctx.strokeStyle='rgba(111,181,224,'+ba+')';ctx.lineWidth=0.5;ctx.stroke();}}
    if(!REDUCED){for(var i=0;i<N;i++){var p=particles[i];p.x+=p.vx;p.y+=p.vy;if(p.x<-8)p.x=W+8;if(p.x>W+8)p.x=-8;if(p.y<-8)p.y=H+8;if(p.y>H+8)p.y=-8;}}
    for(var i=0;i<N;i++){for(var j=i+1;j<N;j++){var pi=particles[i],pj=particles[j],dx=pi.x-pj.x,dy=pi.y-pj.y,d2=dx*dx+dy*dy;if(d2<MAX_C*MAX_C){var d=Math.sqrt(d2),al=(1-d/MAX_C)*0.18;var col=(pi.gold&&pj.gold)?'232,185,99':(!pi.gold&&!pj.gold)?'111,181,224':'172,190,168';ctx.beginPath();ctx.moveTo(pi.x,pi.y);ctx.lineTo(pj.x,pj.y);ctx.strokeStyle='rgba('+col+','+al+')';ctx.lineWidth=0.45;ctx.stroke();}}}
    for(var i=0;i<N;i++){var p=particles[i],tc=REDUCED?0:t,pulse=0.70+0.30*Math.sin(p.phase+tc*p.freq),al=0.50+0.40*pulse,rad=p.r*(0.80+0.20*pulse),rgb=p.gold?'232,185,99':'111,181,224';var grd=ctx.createRadialGradient(p.x,p.y,0,p.x,p.y,rad*6);grd.addColorStop(0,'rgba('+rgb+','+(al*0.15)+')');grd.addColorStop(1,'rgba('+rgb+',0)');ctx.beginPath();ctx.arc(p.x,p.y,rad*6,0,6.2832);ctx.fillStyle=grd;ctx.fill();ctx.beginPath();ctx.arc(p.x,p.y,rad,0,6.2832);ctx.fillStyle='rgba('+rgb+','+al+')';ctx.fill();}
  }
  resize();window.addEventListener('resize',resize,{passive:true});draw();
}

/* ── Scroll-reveal ── */
var els=document.querySelectorAll('.xr-reveal');
if(els.length){var obs=new IntersectionObserver(function(entries){entries.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');obs.unobserve(e.target);}});},{threshold:0.08,rootMargin:'0px 0px -56px 0px'});els.forEach(function(el){obs.observe(el);});}

/* ── Nav scroll-state + mobile toggle ── */
var nav=document.querySelector('.xr-nav');
if(nav){var raf=null;function upd(){raf=null;nav.classList.toggle('scrolled',window.scrollY>24);}window.addEventListener('scroll',function(){if(!raf)raf=requestAnimationFrame(upd);},{passive:true});upd();}
var toggle=document.querySelector('.xr-nav-toggle'),mobile=document.querySelector('.xr-nav-mobile');
if(toggle&&mobile){toggle.addEventListener('click',function(){mobile.classList.toggle('open');});mobile.querySelectorAll('a').forEach(function(a){a.addEventListener('click',function(){mobile.classList.remove('open');});});}
}());
</script>
  <?php
} );

