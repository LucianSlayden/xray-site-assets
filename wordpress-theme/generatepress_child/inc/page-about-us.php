<?php
/**
 * Moved from Code Snippets #18 "XRay — About Us Page HTML".
 */

add_action( 'generate_before_content', function () {
  if ( ! is_page( 'about-us' ) ) return;
  ?>
<style>
/* About Us — GeneratePress wrapper resets (scoped to #content to avoid hitting site header) */
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

/* Extended GP/WP site-level wrappers — ensure all are transparent so canvas shows through */
.site, .site-wrap, .site-inner, .site-content,
.inside-site-content, .site-header-wrap,
.container, .inside-container { background: transparent !important; }

/* Page background — this style tag is only injected on the About Us page */
body { background: #060c12 !important; }

/* Fixed canvas + veil — visible equally throughout the entire page */
#ab-canvas {
  position: fixed; top: 0; left: 0;
  width: 100vw; height: 100vh;
  pointer-events: none; z-index: 0; display: block;
}
#ab-veil {
  position: fixed; inset: 0;
  background: rgba(6,12,18,0.22);
  pointer-events: none; z-index: 1;
}

/* All sections float above canvas — transparent so canvas is equally visible throughout */
#ab-hero, #ab-mission, #ab-principles, #ab-learn, #ab-cta-section {
  position: relative; z-index: 2; background: transparent !important;
}
.xr-footer { z-index: 2; }

/* Intermediate containers within sections must also be transparent */
.xr-container, .ab-hero-grid,
.ab-mission-inner, .ab-prin-inner, .ab-learn-inner { background: transparent !important; }

/* Hide decorative per-section backdrops that would block the canvas */
.ab-hero-bg, .ab-fog-top, .ab-fog-left, .ab-fog-right, .ab-fog-bottom,
.ab-mission-bg, .ab-learn-bg, .ab-cta-bg { display: none !important; }
#ab-mission-canvas, #ab-prin-canvas { display: none !important; }

/* HERO */
#ab-hero {
  min-height: 100vh; display: flex; align-items: center; padding: 130px 0 80px;
}
.ab-hero-grid {
  position: relative; z-index: 3;
  display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center;
}
@media (max-width: 880px) { .ab-hero-grid { grid-template-columns: 1fr; gap: 40px; } }
.ab-hw { display: inline-block; overflow: hidden; vertical-align: bottom; }
.ab-hw-inner { display: inline-block; transform: translateY(110%); }
#ab-eyebrow, #ab-lede, #ab-ctas, #ab-snapshot { opacity: 0; transform: translateY(20px); }

/* Snapshot card */
.ab-snap-card {
  background: rgba(14,20,27,0.84); border: 1px solid rgba(232,185,99,0.22);
  border-radius: 3px; overflow: hidden;
  box-shadow: 0 32px 80px rgba(0,0,0,0.60), 0 0 0 1px rgba(232,185,99,0.05) inset;
  backdrop-filter: blur(8px);
}
.ab-snap-topper { height: 3px; background: linear-gradient(90deg, #E8B963 0%, rgba(232,185,99,0.35) 55%, transparent 100%); }
.ab-snap-body { padding: 26px 28px 28px; }
.ab-snap-grid {
  display: grid; grid-template-columns: 1fr 1fr;
  margin-bottom: 22px; border: 1px solid rgba(232,185,99,0.13);
  border-radius: 2px; overflow: hidden;
}
.ab-stat-cell {
  padding: 18px 16px 16px;
  border-right: 1px solid rgba(232,185,99,0.10);
  border-bottom: 1px solid rgba(232,185,99,0.10);
}
.ab-stat-cell:nth-child(2n)  { border-right: none; }
.ab-stat-cell:nth-child(n+3) { border-bottom: none; }
.ab-stat-num {
  font-family: var(--xr-font-display); font-size: 34px; font-weight: bold;
  line-height: 1; color: #E8B963; margin-bottom: 6px; letter-spacing: -0.02em;
}
.ab-stat-cell.sky .ab-stat-num { color: #6FB5E0; }
.ab-stat-lbl { color: #6F7B8B; font-size: 10px; font-weight: 700; letter-spacing: 0.13em; text-transform: uppercase; }
.ab-stat-cell.sky .ab-stat-lbl { color: #6FB5E0; opacity: 0.7; }
.ab-quote {
  position: relative; padding: 18px 0 0 20px;
  border-top: 1px solid rgba(232,185,99,0.13);
}
.ab-quote::before {
  content: '\201C'; position: absolute; top: 10px; left: 0;
  font-family: Georgia, serif; font-size: 48px; line-height: 1;
  color: rgba(232,185,99,0.22); pointer-events: none;
}
.ab-quote p { color: #A8B2C0; font-size: 13.5px; line-height: 1.78; margin: 0 0 10px; font-style: italic; }
.ab-quote-src { color: rgba(232,185,99,0.55); font-size: 10px; font-weight: 700; letter-spacing: 0.13em; text-transform: uppercase; }

/* MISSION */
#ab-mission { padding: 100px 0; }
.ab-mission-inner { position: relative; z-index: 2; }
.ab-mission-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: start; }
@media (max-width: 860px) { .ab-mission-grid { grid-template-columns: 1fr; gap: 36px; } }
.ab-info-box {
  background: #161D27; border: 1px solid rgba(232,185,99,0.18);
  border-radius: 2px; padding: 28px; position: relative; overflow: hidden; margin-bottom: 16px;
}
.ab-info-box::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, #E8B963, transparent);
}
.ab-discipline-row { display: flex; align-items: center; justify-content: space-between; padding: 10px 0; }
.ab-discipline-div { height: 1px; background: rgba(232,185,99,0.1); }
.ab-discipline-label { color: #A8B2C0; font-size: 14.5px; }

/* PRINCIPLES */
#ab-principles { padding: 100px 0; }
.ab-prin-inner { position: relative; z-index: 1; }
.ab-prin-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
@media (max-width: 980px) { .ab-prin-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 600px) { .ab-prin-grid { grid-template-columns: 1fr; } }
.ab-prin-card {
  background: rgba(22,29,39,0.92); border: 1px solid rgba(232,185,99,0.18);
  border-radius: 2px; padding: 30px 26px;
  position: relative; overflow: hidden;
  transition: border-color .3s, transform .3s, box-shadow .3s;
  opacity: 0; transform: translateY(28px);
  backdrop-filter: blur(4px);
}
.ab-prin-card.sky { border-color: rgba(111,181,224,0.2); }
.ab-prin-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, #E8B963, transparent);
}
.ab-prin-card.sky::before { background: linear-gradient(90deg, #6FB5E0, transparent); }
.ab-prin-card:hover { border-color: rgba(232,185,99,0.45); transform: translateY(-4px); box-shadow: 0 16px 50px rgba(0,0,0,0.45), 0 0 24px rgba(232,185,99,0.08); }
.ab-prin-card.sky:hover { border-color: rgba(111,181,224,0.45); }
.ab-prin-hex {
  width: 36px; height: 42px;
  clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
  background: #E8B963; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;
}
.ab-prin-hex.sky { background: #6FB5E0; }
.ab-prin-card h3 { font-family: var(--xr-font-display); font-size: 18px; margin: 0 0 11px; letter-spacing: -0.01em; color: #F1F4F8; }
.ab-prin-card p  { color: #A8B2C0; font-size: 14px; line-height: 1.75; margin: 0; }

/* LEARN MORE */
#ab-learn { padding: 100px 0; }
.ab-learn-inner { position: relative; z-index: 2; }
.ab-nav-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
@media (max-width: 820px) { .ab-nav-grid { grid-template-columns: 1fr; } }
.ab-nav-card {
  background: rgba(22,29,39,0.90); border: 1px solid rgba(232,185,99,0.18);
  border-radius: 2px; padding: 30px; text-decoration: none;
  transition: border-color .3s, transform .3s, box-shadow .3s;
  position: relative; overflow: hidden; display: block;
  opacity: 0; transform: translateY(22px); backdrop-filter: blur(4px);
}
.ab-nav-card.sky { border-color: rgba(111,181,224,0.2); }
.ab-nav-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, #E8B963, transparent);
}
.ab-nav-card.sky::before { background: linear-gradient(90deg, #6FB5E0, transparent); }
.ab-nav-card:hover { border-color: rgba(232,185,99,0.45); transform: translateY(-3px); box-shadow: 0 16px 50px rgba(0,0,0,0.4), 0 0 20px rgba(232,185,99,0.07); }
.ab-nav-card.sky:hover { border-color: rgba(111,181,224,0.45); }
.ab-nav-card h3 { font-family: var(--xr-font-display); font-size: 21px; margin: 0 0 9px; letter-spacing: -0.015em; color: #F1F4F8; }
.ab-nav-card p  { color: #A8B2C0; font-size: 14px; line-height: 1.7; margin: 0; }
.ab-nav-card-icon {
  width: 33px; height: 38px;
  clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
  background: rgba(232,185,99,0.1); border: 1px solid rgba(232,185,99,0.28);
  display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.ab-nav-card-icon.sky { background: rgba(111,181,224,0.08); border-color: rgba(111,181,224,0.3); }

/* CTA */
#ab-cta-section { padding: 110px 0; text-align: center; }
.ab-cta-inner {
  position: relative; z-index: 3;
  max-width: 600px; margin: 0 auto;
  background: rgba(14,20,27,0.72);
  border: 1px solid rgba(232,185,99,0.22); border-radius: 3px;
  padding: 56px 52px 52px; backdrop-filter: blur(8px);
  box-shadow: 0 32px 80px rgba(0,0,0,0.5), 0 0 0 1px rgba(232,185,99,0.06) inset;
}
.ab-cta-inner::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
  background: linear-gradient(90deg, transparent, #E8B963 30%, #E8B963 70%, transparent);
  border-radius: 3px 3px 0 0;
}
.ab-cta-divider {
  width: 40px; height: 2px;
  background: linear-gradient(90deg, #E8B963, rgba(232,185,99,0.2));
  margin: 20px auto 24px;
}
@media (max-width: 680px) { .ab-cta-inner { padding: 40px 28px 36px; } }

/* Scroll-reveal init states */
.ab-section-eyebrow { opacity: 0; transform: translateY(16px); }
.ab-section-h2      { opacity: 0; transform: translateY(16px); }
.ab-section-p       { opacity: 0; transform: translateY(16px); }
</style>

<nav class="xr-nav">
  <div class="xr-nav-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="xr-brand">
      <img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics">
      <span class="xr-brand-wordmark">X-Ray <span class="accent">Geoanalytics</span></span>
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
        <button class="xr-nav-btn">Resources<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">Resources</a>
          <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">Investors</a>
        </div>
      </div>
      <div class="xr-nav-item">
        <button class="xr-nav-btn" style="color:var(--xr-gold);">About Us<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" style="color:var(--xr-gold);">About Us</a>
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
    <a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">Resources</a>
    <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">Investors</a>
    <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" style="color:var(--xr-gold);">About Us</a>
    <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a>
    <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">Why X-Ray</a>
    <a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a>
    <a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">FAQs</a>
    <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request Demo</a>
  </div>
</nav>

<canvas id="ab-canvas"></canvas>
<div id="ab-veil"></div>

<!-- ══════════════════ HERO ══════════════════ -->
<section id="ab-hero">
  <div class="xr-container ab-hero-grid">
    <div>
      <div id="ab-eyebrow">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>About X-Ray Geoanalytics</span>
      </div>
      <h1 style="font-family:var(--xr-font-display);font-size:clamp(36px,4.5vw,58px);font-weight:700;line-height:1.12;letter-spacing:-0.03em;margin:18px 0 0;color:#F1F4F8;">
        <div style="overflow:hidden;"><div class="ab-hw-inner">We're building the world's</div></div>
        <div style="overflow:hidden;"><div class="ab-hw-inner">most accurate <span style="color:#E8B963;">mineral</span></div></div>
        <div style="overflow:hidden;"><div class="ab-hw-inner"><span style="color:#E8B963;">exploration engine</span>.</div></div>
      </h1>
      <p id="ab-lede" style="color:#A8B2C0;font-size:17px;line-height:1.8;margin:18px 0 34px;max-width:520px;">
        X-Ray Geoanalytics was founded on a simple observation: the mining industry generates enormous quantities of geoscience data, but almost none of it is analyzed in a way that makes the most of what it contains. We're changing that.
      </p>
      <div id="ab-ctas" style="display:flex;gap:14px;flex-wrap:wrap;">
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request a Demo</a>
        <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>" class="xr-btn xr-btn-outline">Meet the Team <span class="xr-arrow">→</span></a>
      </div>
    </div>
    <div id="ab-snapshot">
      <div class="ab-snap-card">
        <div class="ab-snap-topper"></div>
        <div class="ab-snap-body">
          <div class="xr-eyebrow" style="margin-bottom:16px;">Company Snapshot</div>
          <div class="ab-snap-grid">
            <div class="ab-stat-cell">
              <div class="ab-stat-num">2025</div>
              <div class="ab-stat-lbl">Founded</div>
            </div>
            <div class="ab-stat-cell">
              <div class="ab-stat-num">5</div>
              <div class="ab-stat-lbl">Co-founders</div>
            </div>
            <div class="ab-stat-cell">
              <div class="ab-stat-num">90%</div>
              <div class="ab-stat-lbl">Model accuracy</div>
            </div>
            <div class="ab-stat-cell sky">
              <div class="ab-stat-num">Pre-seed</div>
              <div class="ab-stat-lbl">Stage · 2026</div>
            </div>
          </div>
          <div class="ab-quote">
            <p>"The data problem in mining exploration isn't a collection problem — it's an integration problem. USGS alone has decades of surveys that have never been machine-fused with each other. That gap is our product."</p>
            <div class="ab-quote-src">— The Founding Insight</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════ MISSION ══════════════════ -->
<section id="ab-mission">
  <canvas id="ab-mission-canvas"></canvas>
  <div class="ab-mission-bg"></div>
  <div class="ab-mission-inner xr-container">
    <div class="ab-mission-grid">
      <div>
        <div class="ab-section-eyebrow">
          <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Our Mission</span>
        </div>
        <h2 class="ab-section-h2" style="font-family:var(--xr-font-display);font-size:clamp(28px,3vw,40px);font-weight:700;letter-spacing:-0.02em;margin:16px 0 20px;color:#F1F4F8;">Make the right drill site obvious before anyone puts a bit in the ground.</h2>
        <p class="ab-section-p" style="color:#A8B2C0;font-size:16px;line-height:1.85;margin:0 0 16px;">Mineral exploration is one of the most capital-intensive and failure-prone industries in the world. Junior explorers spend $2-5M per target. Majors spend far more. And the historical success rate of finding a commercially viable deposit from first discovery is less than 1 in 1,000.</p>
        <p class="ab-section-p" style="color:#A8B2C0;font-size:16px;line-height:1.85;margin:0;">Most of that failure is avoidable. Not because the deposits aren't there — they are — but because the data that would point to them exists in fragmented, incompatible formats across decades of surveys, and no one has the bandwidth to fuse it all. We built the machine that does.</p>
      </div>
      <div>
        <div class="ab-info-box ab-section-p" style="margin-bottom:16px;">
          <div class="xr-eyebrow" style="margin-bottom:13px;">The Problem We're Solving</div>
          <p style="color:#A8B2C0;font-size:14.5px;line-height:1.8;margin:0;">USGS alone has decades of publicly available geochemical and geophysical surveys that have never been machine-fused with satellite imagery or each other. Proprietary drill results sit in silos. Geophysical surveys exist in incompatible projections. That integration gap — not the absence of data — is why deposits go undiscovered.</p>
        </div>
        <div class="ab-info-box ab-section-p" style="margin-bottom:0;">
          <div class="xr-eyebrow" style="margin-bottom:14px;">Team Disciplines</div>
          <div class="ab-discipline-row">
            <span class="ab-discipline-label">ML Engineering &amp; AI</span>
            <span class="xr-tag xr-tag-gold">2 founders</span>
          </div>
          <div class="ab-discipline-div"></div>
          <div class="ab-discipline-row">
            <span class="ab-discipline-label">Data &amp; Infrastructure</span>
            <span class="xr-tag xr-tag-sky">2 founders</span>
          </div>
          <div class="ab-discipline-div"></div>
          <div class="ab-discipline-row">
            <span class="ab-discipline-label">Strategy &amp; Legal</span>
            <span class="xr-tag xr-tag-gold">1 founder</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════ PRINCIPLES ══════════════════ -->
<section id="ab-principles">
  <canvas id="ab-prin-canvas"></canvas>
  <div class="ab-prin-inner xr-container">
    <div style="text-align:center;margin-bottom:56px;">
      <span class="xr-eyebrow ab-section-eyebrow" style="justify-content:center;"><span class="xr-eyebrow-hex"></span>What We Stand For</span>
      <h2 class="ab-section-h2" style="font-family:var(--xr-font-display);font-size:clamp(26px,2.8vw,38px);font-weight:700;letter-spacing:-0.02em;margin:16px 0 0;color:#F1F4F8;">Principles that shape how we build.</h2>
    </div>
    <div class="ab-prin-grid">
      <div class="ab-prin-card">
        <div class="ab-prin-hex"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></div>
        <h3>Speed is the product</h3>
        <p>A result that arrives in hours is worth more than one that arrives in months, even if the underlying analysis is identical. We obsess over pipeline speed because our clients' capital is at risk every day they wait.</p>
      </div>
      <div class="ab-prin-card">
        <div class="ab-prin-hex"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="2.5"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
        <h3>Explainability is trust</h3>
        <p>Every ranked target comes with attribution — which data signals drove the score — so geoscientists can interrogate, override, or validate before committing capital. We never ship a black box.</p>
      </div>
      <div class="ab-prin-card">
        <div class="ab-prin-hex"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></div>
        <h3>Data isolation by default</h3>
        <p>Exploration data is commercially sensitive. We treat every client's dataset as proprietary from day one — isolated compute, no cross-client training, full audit logs. Security is not a feature we add later.</p>
      </div>
      <div class="ab-prin-card sky">
        <div class="ab-prin-hex sky"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="2.5"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div>
        <h3>Compound learning</h3>
        <p>Every drill result is a label. Our models improve with every campaign. We build systems that get sharper over time — not static tools that deliver the same analysis in year three as year one.</p>
      </div>
      <div class="ab-prin-card sky">
        <div class="ab-prin-hex sky"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="2.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"/></svg></div>
        <h3>Built with geoscientists</h3>
        <p>Domain expertise is baked in, not bolted on. Our team includes people who've worked exploration data problems from the field side. We build tools geoscientists trust — not tools that replace them.</p>
      </div>
      <div class="ab-prin-card">
        <div class="ab-prin-hex"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg></div>
        <h3>Every mineral, every continent</h3>
        <p>We started with Nevada lithium because it offered the best validation dataset. The same data problems exist everywhere exploration happens. We are building toward full mineral and geographic coverage — including deep-sea mining and lunar resources.</p>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════ LEARN MORE ══════════════════ -->
<section id="ab-learn">
  <div class="ab-learn-bg"></div>
  <div class="ab-learn-inner xr-container">
    <div style="margin-bottom:36px;">
      <span class="xr-eyebrow ab-section-eyebrow"><span class="xr-eyebrow-hex"></span>Learn More</span>
      <h2 class="ab-section-h2" style="font-family:var(--xr-font-display);font-size:clamp(24px,2.5vw,34px);font-weight:700;letter-spacing:-0.02em;margin:14px 0 0;color:#F1F4F8;">More about X-Ray.</h2>
    </div>
    <div class="ab-nav-grid">
      <a class="ab-nav-card" href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">
        <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:14px;">
          <div style="flex:1;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:13px;">
              <div class="ab-nav-card-icon"><svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
              <span class="xr-eyebrow" style="margin:0;">Our Team</span>
            </div>
            <h3>Meet the founders</h3>
            <p>Five co-founders spanning ML engineering, geoscience, data infrastructure, and legal strategy.</p>
          </div>
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2" style="flex-shrink:0;margin-top:4px;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </div>
      </a>
      <a class="ab-nav-card" href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">
        <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:14px;">
          <div style="flex:1;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:13px;">
              <div class="ab-nav-card-icon"><svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
              <span class="xr-eyebrow" style="margin:0;">Why X-Ray</span>
            </div>
            <h3>The competitive difference</h3>
            <p>How X-Ray compares to consultants, generic GIS software, and doing it in-house. The numbers tell the story.</p>
          </div>
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2" style="flex-shrink:0;margin-top:4px;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </div>
      </a>
      <a class="ab-nav-card sky" href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">
        <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:14px;">
          <div style="flex:1;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:13px;">
              <div class="ab-nav-card-icon sky"><svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6FB5E0" stroke-width="2"><path d="M4 22h16a2 2 0 002-2V4a2 2 0 00-2-2H8a2 2 0 00-2 2v16a2 2 0 01-2 2zm0 0a2 2 0 01-2-2v-9c0-1.1.9-2 2-2h2"/></svg></div>
              <span class="xr-eyebrow" style="margin:0;color:#6FB5E0;">News &amp; Updates</span>
            </div>
            <h3>Company milestones</h3>
            <p>Product launches, model accuracy milestones, YC batch acceptance, and company announcements.</p>
          </div>
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#6FB5E0" stroke-width="2" style="flex-shrink:0;margin-top:4px;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </div>
      </a>
      <a class="ab-nav-card sky" href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">
        <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:14px;">
          <div style="flex:1;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:13px;">
              <div class="ab-nav-card-icon sky"><svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6FB5E0" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div>
              <span class="xr-eyebrow" style="margin:0;color:#6FB5E0;">FAQs</span>
            </div>
            <h3>Common questions</h3>
            <p>Answers about accuracy, data security, pricing, minimum project size, and how the technology works.</p>
          </div>
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#6FB5E0" stroke-width="2" style="flex-shrink:0;margin-top:4px;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </div>
      </a>
    </div>
  </div>
</section>

<!-- ══════════════════ CTA ══════════════════ -->
<section id="ab-cta-section">
  <div class="ab-cta-bg"></div>
  <div class="ab-cta-inner">
    <span class="xr-eyebrow ab-section-eyebrow" style="justify-content:center;margin-bottom:18px;"><span class="xr-eyebrow-hex"></span>Early Partners</span>
    <h2 class="ab-section-h2" style="font-family:var(--xr-font-display);font-size:clamp(28px,3vw,42px);font-weight:700;letter-spacing:-0.025em;margin:0;color:#F1F4F8;line-height:1.15;">We're actively seeking<br>early partners.</h2>
    <div class="ab-cta-divider"></div>
    <p class="ab-section-p" style="color:#A8B2C0;font-size:16px;line-height:1.85;margin:0 0 36px;">If you're running an exploration campaign in 2026 and want to see what X-Ray can surface for your region, reach out. We're taking on a small number of early access clients now.</p>
    <div class="ab-section-p" style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
      <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request a Demo</a>
      <a href="mailto:info@xraygeoanalytics.com" class="xr-btn xr-btn-outline">Email us directly <span class="xr-arrow">→</span></a>
    </div>
  </div>
</section>

<footer class="xr-footer">
  <div class="xr-footer-strip"></div>
  <div class="xr-footer-inner">
    <div class="xr-footer-grid">
      <div>
        <div class="xr-footer-brand">
          <img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics">
          <span>X-Ray Geoanalytics</span>
        </div>
        <p class="xr-footer-tagline">Advanced machine learning for mining site discovery. Nevada lithium. Every mineral. Every continent. Every drill result makes us smarter.</p>
        <div class="xr-footer-contact">
          <a href="mailto:info@xraygeoanalytics.com">
            <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="M4 6l8 7 8-7"/></svg>
            info@xraygeoanalytics.com
          </a>
        </div>
      </div>
      <div>
        <h3>Product</h3>
        <ul class="xr-footer-list">
          <li><a href="<?php echo esc_url( home_url( '/product/' ) ); ?>">Overview</a></li>
          <li><a href="<?php echo esc_url( home_url( '/our-models/' ) ); ?>">Our Models</a></li>
          <li><a href="<?php echo esc_url( home_url( '/platform/' ) ); ?>">Platform</a></li>
          <li><a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>">Industries</a></li>
          <li><a href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>">How it Works</a></li>
          <li><a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>">Pricing</a></li>
        </ul>
      </div>
      <div>
        <h3>Company</h3>
        <ul class="xr-footer-list">
          <li><a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a></li>
          <li><a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">Why X-Ray</a></li>
          <li><a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a></li>
          <li><a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">FAQs</a></li>
        </ul>
      </div>
      <div>
        <h3>Resources</h3>
        <ul class="xr-footer-list">
          <li><a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">Resources Library</a></li>
          <li><a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">For Investors</a></li>
          <li><a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>">Request Demo</a></li>
        </ul>
      </div>
      <div>
        <h3>Get in Touch</h3>
        <ul class="xr-footer-list">
          <li><a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>">Book a Demo</a></li>
        </ul>
      </div>
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

