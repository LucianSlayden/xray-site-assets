<?php
/**
 * Moved from Code Snippets #12 "XRay — Our Models Page".
 */

add_action( 'generate_before_content', function () {
    if ( ! is_page('our-models') ) return;
    echo <<<'HTML'
	<style>
  #page, .site, .site-content, #primary, #main, .entry-content, .inside-page-hero {
    background: transparent !important;
  }
  body { background: #0E141B !important; }
</style>
<div id="om-page-bg" style="position:fixed;inset:0;background:url('https://xraygeoanalytics.com/wp-content/uploads/2026/06/mj-ourmodels-bg-2.png') center/cover no-repeat;opacity:0.32;z-index:0;pointer-events:none;"></div>
<div id="om-veil" style="position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(14,20,27,0.72);z-index:50;pointer-events:none;"></div>

<nav class="xr-nav">
  <div class="xr-nav-inner">
    <a href="/" class="xr-brand"><img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics"><span class="xr-brand-wordmark">X-Ray <span class="accent">Geoanalytics</span></span></a>
    <div class="xr-nav-list">
      <div class="xr-nav-item"><button class="xr-nav-btn" style="color:var(--xr-gold);">Product<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop"><a href="/product/">Product Overview</a><a href="/our-models/" style="color:var(--xr-gold);">Our Models</a><a href="/industries/">Industries</a><a href="/platform/">Platform</a><a href="/how-it-works/">How it Works</a><a href="/pricing/">Pricing</a></div>
      </div>
      <div class="xr-nav-item"><button class="xr-nav-btn">Resources<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop"><a href="/resources/">Resources</a><a href="/investors/">Investors</a></div>
      </div>
      <div class="xr-nav-item"><button class="xr-nav-btn">About Us<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop"><a href="/about-us/">About Us</a><a href="/our-team/">Our Team</a><a href="/why-xray/">Why X-Ray</a><a href="/news-updates/">News &amp; Updates</a><a href="/faqs/">FAQs</a></div>
      </div>
      <a href="/request-demo/" class="xr-btn xr-btn-gold xr-nav-cta">Request Demo</a>
    </div>
    <button class="xr-nav-toggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
  </div>
  <div class="xr-nav-mobile">
    <a href="/product/">Product</a>
    <a href="/our-models/">Our Models</a>
    <a href="/industries/">Industries</a>
    <a href="/platform/">Platform</a>
    <a href="/how-it-works/">How it Works</a>
    <a href="/pricing/">Pricing</a>
    <a href="/resources/">Resources</a>
    <a href="/investors/">Investors</a>
    <a href="/about-us/">About Us</a>
    <a href="/our-team/">Our Team</a>
    <a href="/why-xray/">Why X-Ray</a>
    <a href="/news-updates/">News &amp; Updates</a>
    <a href="/faqs/">FAQs</a>
    <a href="/request-demo/" class="xr-btn xr-btn-gold">Request Demo</a>
  </div>
</nav>

<section class="om-hero">
  <div class="om-hero-inner">
    <h1>One model in active development. <span class="accent">Every</span> mineral on the long horizon.</h1>
    <p>Our entire engineering effort is focused on a single prediction model right now — Nevada lithium. Once it's commercially viable, we'll expand model-by-model into the rest of the commodity universe.</p>
  </div>
</section>

<section class="active-section">
  <div class="active-inner">
    <div>
      <h2>Nevada lithium. <span class="accent">In development.</span> Targeting 90% accuracy.</h2>
      <p>Trained on USGS Mineral Resources Program deposit records as confirmed ground truth, fused with public geochemistry, geophysics, remote sensing, and structural geology data. The model returns ranked drill targets with explicit confidence intervals — not a heatmap, a list.</p>
      <p><strong>This is the only X-Ray model approaching commercial viability today.</strong> Pilot launch with Explorer-tier customers begins as soon as accuracy benchmarks are independently verified.</p>
      <p>Every commodity below is on the roadmap. None of them are shipping yet, and we are deliberately not building them in parallel — focus matters in early-stage modelling.</p>
      <a href="/request-demo/" class="xr-btn xr-btn-gold" style="margin-top:16px;">Request Pilot Access</a>
    </div>
    <div class="model-card">
      <div class="tag-row">
        <span class="tag"><span class="dot"></span>In Development</span>
      </div>
      <h3>Nevada Lithium</h3>
      <div class="sub">Basin &amp; Range province · 4 fused data modalities</div>
      <div class="data-grid">
        <div><div class="lbl">Target Accuracy</div><div class="v">90% out-of-sample<br><span style="color:var(--xr-text-muted);font-family:var(--xr-font-mono);font-size:12.5px;letter-spacing:0.04em;">(target metric, in development)</span></div></div>
        <div><div class="lbl">Coverage</div><div class="v">Northern + Central Nevada</div></div>
        <div><div class="lbl">Modalities</div><div class="v">Geochem · Geophys · Remote sensing · Terrain</div></div>
        <div><div class="lbl">Training Labels</div><div class="v">USGS MRDS confirmed Li occurrences</div></div>
      </div>
    </div>
  </div>
</section>

<section class="roadmap-section">
  <div class="roadmap-inner">
    <h2>From <span class="accent">Nevada lithium</span> to <span class="accent">lunar regolith</span>.</h2>
    <p class="intro">Every model below is on the long-term roadmap. <strong>None of them is shipping today.</strong> The Nevada lithium model is the only one in active development; everything else follows once we have additional commercially-viable models to bundle into Operator and Enterprise tiers.</p>
    <div class="roadmap-grid">
      <article class="rm-card is-active">
        <span class="rm-tag"><span class="dot"></span>In Development</span>
        <div class="rm-art">
          <svg viewBox="0 0 100 132" aria-hidden="true">
            <path d="M10 4 L88 4 L90 110 L82 114 L78 122 L60 130 L48 122 L30 88 L20 52 L12 22 Z" fill="rgba(232,185,99,0.08)" stroke="var(--xr-gold)" stroke-width="2.2" stroke-linejoin="round"/>
            <g transform="translate(46 60)">
              <circle r="11" fill="none" stroke="#4ade80" stroke-width="1.6"/>
              <circle r="3.6" fill="#4ade80"/>
              <line x1="0" y1="-14" x2="0" y2="-7" stroke="#4ade80" stroke-width="1.6"/>
              <line x1="0" y1="7" x2="0" y2="14" stroke="#4ade80" stroke-width="1.6"/>
              <line x1="-14" y1="0" x2="-7" y2="0" stroke="#4ade80" stroke-width="1.6"/>
              <line x1="7" y1="0" x2="14" y2="0" stroke="#4ade80" stroke-width="1.6"/>
            </g>
          </svg>
        </div>
        <h3>Nevada Lithium</h3>
        <p>Our active model — targeting 90% accuracy. Pilot launch with Explorer tier.</p>
      </article>
      <article class="rm-card is-future-1">
        <span class="rm-tag"><span class="dot"></span>Roadmap</span>
        <div class="rm-art">
          <svg viewBox="0 0 130 100" aria-hidden="true">
            <defs><linearGradient id="cuVein" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#E8B963"/><stop offset="100%" stop-color="#6FB5E0"/></linearGradient></defs>
            <path d="M0 60 L18 50 L32 56 L48 38 L66 50 L86 36 L104 44 L130 38 L130 100 L0 100 Z" fill="rgba(14,20,27,0.8)" stroke="rgba(111,181,224,0.55)" stroke-width="1.2"/>
            <path d="M10 80 Q40 70 64 78 T120 72" fill="none" stroke="url(#cuVein)" stroke-width="2.2" stroke-linecap="round"/>
            <circle cx="34" cy="76" r="2.6" fill="#E8B963"/>
            <circle cx="68" cy="78" r="3" fill="#C77A3D"/>
            <circle cx="98" cy="74" r="2.4" fill="#6FB5E0"/>
            <g font-family="monospace" font-weight="700">
              <rect x="14" y="12" width="22" height="20" fill="rgba(232,185,99,0.1)" stroke="#E8B963" stroke-width="0.9"/><text x="25" y="25" text-anchor="middle" fill="#E8B963" font-size="10">Cu</text>
              <rect x="48" y="12" width="26" height="20" fill="rgba(111,181,224,0.1)" stroke="#6FB5E0" stroke-width="0.9"/><text x="61" y="25" text-anchor="middle" fill="#6FB5E0" font-size="9.5">REE</text>
              <rect x="86" y="12" width="22" height="20" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.45)" stroke-width="0.8"/><text x="97" y="25" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="10">Au</text>
            </g>
          </svg>
        </div>
        <h3>Western US · Cu &amp; REE</h3>
        <p>Two future commodity models on the same fusion infrastructure.</p>
      </article>
      <article class="rm-card is-future-2">
        <span class="rm-tag"><span class="dot"></span>Long-term</span>
        <div class="rm-art">
          <svg viewBox="0 0 130 90" aria-hidden="true">
            <g font-family="monospace" font-weight="700">
              <rect x="4"   y="4"  width="20" height="22" fill="rgba(232,185,99,0.16)" stroke="#E8B963" stroke-width="1"/><text x="14" y="18" text-anchor="middle" fill="#E8B963" font-size="9">Li</text>
              <rect x="28"  y="4"  width="20" height="22" fill="rgba(232,185,99,0.1)" stroke="rgba(232,185,99,0.5)" stroke-width="1"/><text x="38" y="18" text-anchor="middle" fill="#E8B963" font-size="9">Cu</text>
              <rect x="52"  y="4"  width="20" height="22" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.35)" stroke-width="1"/><text x="62" y="18" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Au</text>
              <rect x="76"  y="4"  width="20" height="22" fill="rgba(111,181,224,0.08)" stroke="rgba(111,181,224,0.45)" stroke-width="1"/><text x="86" y="18" text-anchor="middle" fill="#6FB5E0" font-size="9">Ni</text>
              <rect x="100" y="4"  width="20" height="22" fill="rgba(111,181,224,0.06)" stroke="rgba(111,181,224,0.3)" stroke-width="1"/><text x="110" y="18" text-anchor="middle" fill="rgba(111,181,224,0.85)" font-size="9">Co</text>
              <rect x="4"   y="32" width="20" height="22" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.32)" stroke-width="1"/><text x="14" y="46" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Ag</text>
              <rect x="28"  y="32" width="20" height="22" fill="rgba(111,181,224,0.08)" stroke="rgba(111,181,224,0.4)" stroke-width="1"/><text x="38" y="46" text-anchor="middle" fill="#6FB5E0" font-size="9">U</text>
              <rect x="52"  y="32" width="20" height="22" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.3)" stroke-width="1"/><text x="62" y="46" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Pt</text>
              <rect x="76"  y="32" width="20" height="22" fill="rgba(111,181,224,0.06)" stroke="rgba(111,181,224,0.3)" stroke-width="1"/><text x="86" y="46" text-anchor="middle" fill="rgba(111,181,224,0.85)" font-size="9">Mo</text>
              <rect x="100" y="32" width="20" height="22" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.3)" stroke-width="1"/><text x="110" y="46" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Zn</text>
              <rect x="4"   y="60" width="20" height="22" fill="rgba(232,185,99,0.04)" stroke="rgba(232,185,99,0.22)" stroke-width="1"/><text x="14" y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">Sn</text>
              <rect x="28"  y="60" width="20" height="22" fill="rgba(111,181,224,0.04)" stroke="rgba(111,181,224,0.22)" stroke-width="1"/><text x="38" y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">V</text>
              <rect x="52"  y="60" width="20" height="22" fill="rgba(232,185,99,0.04)" stroke="rgba(232,185,99,0.22)" stroke-width="1"/><text x="62" y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">Pd</text>
              <rect x="76"  y="60" width="20" height="22" fill="rgba(111,181,224,0.04)" stroke="rgba(111,181,224,0.22)" stroke-width="1"/><text x="86" y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">W</text>
              <rect x="100" y="60" width="20" height="22" fill="rgba(232,185,99,0.04)" stroke="rgba(232,185,99,0.22)" stroke-width="1"/><text x="110" y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">Mn</text>
            </g>
          </svg>
        </div>
        <h3>Global · All Minerals</h3>
        <p>Same architecture, every commercially-important commodity, every producing country.</p>
      </article>
      <article class="rm-card is-future-2">
        <span class="rm-tag"><span class="dot"></span>Long-term</span>
        <div class="rm-art">
          <svg viewBox="0 0 130 100" aria-hidden="true">
            <path d="M50 14 L80 14 L84 22 L46 22 Z" fill="#6FB5E0" opacity="0.85"/>
            <rect x="62" y="8" width="6" height="6" fill="#6FB5E0" opacity="0.7"/>
            <g fill="none" stroke="#6FB5E0" stroke-width="1" stroke-linecap="round">
              <path d="M40 38 Q65 28 90 38" opacity="0.7"/>
              <path d="M30 50 Q65 36 100 50" opacity="0.5"/>
              <path d="M20 62 Q65 44 110 62" opacity="0.3"/>
            </g>
            <path d="M0 78 L18 70 L34 76 L50 66 L66 74 L84 64 L102 72 L120 66 L130 74 L130 100 L0 100 Z" fill="rgba(111,181,224,0.14)" stroke="#6FB5E0" stroke-width="1.2"/>
            <circle cx="40" cy="84" r="2.6" fill="#E8B963" opacity="0.9"/>
            <circle cx="64" cy="86" r="2" fill="#E8B963" opacity="0.7"/>
            <circle cx="92" cy="82" r="2.8" fill="#E8B963"/>
          </svg>
        </div>
        <h3>Deep Sea Mining</h3>
        <p>Polymetallic nodules and seafloor sulphides — bathymetry + sediment geochem.</p>
      </article>
      <article class="rm-card is-future-2">
        <span class="rm-tag"><span class="dot"></span>Long-term</span>
        <div class="rm-art">
          <svg viewBox="0 0 130 100" aria-hidden="true">
            <defs><radialGradient id="moonR" cx="38%" cy="38%"><stop offset="0%" stop-color="#F1F4F8"/><stop offset="60%" stop-color="#A8B2C0"/><stop offset="100%" stop-color="#5a6678"/></radialGradient></defs>
            <g fill="rgba(241,244,248,0.6)"><circle cx="10" cy="14" r="0.8"/><circle cx="118" cy="22" r="1"/><circle cx="22" cy="34" r="0.7"/><circle cx="14" cy="68" r="0.9"/><circle cx="120" cy="78" r="0.7"/></g>
            <circle cx="65" cy="50" r="34" fill="url(#moonR)"/>
            <g fill="rgba(14,20,27,0.35)"><circle cx="54" cy="38" r="4"/><circle cx="74" cy="44" r="3"/><circle cx="60" cy="58" r="5.5"/><circle cx="80" cy="64" r="2.5"/><circle cx="48" cy="68" r="3"/></g>
            <line x1="60" y1="58" x2="60" y2="46" stroke="#4ade80" stroke-width="1.4"/>
            <polygon points="60,42 56,48 64,48" fill="#4ade80"/>
          </svg>
        </div>
        <h3>Lunar Mining</h3>
        <p>Moon-surface resource models. KREEP terranes, ice-bearing shadowed craters.</p>
      </article>
    </div>
  </div>
</section>

<section class="meth-section">
  <div class="meth-inner">
    <h2>Built on <span style="color:var(--xr-gold);">confirmed deposits</span>, not assumptions.</h2>
    <p class="intro">Every X-Ray model begins with known economic deposits as its ground truth. We then build outward, never inward from untested assumptions.</p>
    <div class="meth-grid">
      <div class="meth-item">
        <span class="lbl">Foundation</span>
        <h3>Deposit-anchored training.</h3>
        <p>USGS Mineral Resources Program deposit records serve as confirmed positive labels. Only real economically significant deposits make it into training — no synthetic or modelled positives.</p>
      </div>
      <div class="meth-item">
        <span class="lbl">Fusion</span>
        <h3>Multi-modal feature alignment.</h3>
        <p>Geochemistry, geophysics, remote sensing, and structural geology are fused into a unified spatial tensor per hex cell. Each source is aligned and normalised before fusion — not simply stacked.</p>
      </div>
      <div class="meth-item">
        <span class="lbl">Validation</span>
        <h3>Out-of-sample only.</h3>
        <p>Accuracy is measured against deposits held out from training. We do not report training-set metrics. The 90% target on Nevada lithium is the benchmark, measured in independent verification, that we are still working to meet.</p>
      </div>
    </div>
  </div>
</section>

<section class="om-cta">
  <div class="om-cta-inner">
    <h2>Pilot customers shape the <span class="accent">roadmap</span>.</h2>
    <p>Our pilot Explorer customers get early access to the lithium model and direct input into which commodity ships next.</p>
    <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="/request-demo/" class="xr-btn xr-btn-gold" style="font-size:16px;padding:16px 36px;">Request Demo</a>
      <a href="/pricing/" class="xr-btn xr-btn-outline" style="font-size:16px;padding:16px 36px;">View Pricing <span class="xr-arrow">→</span></a>
    </div>
  </div>
</section>

<footer class="xr-footer">
  <div class="xr-footer-strip"></div>
  <div class="xr-footer-inner">
    <div class="xr-footer-grid">
      <div>
        <div class="xr-footer-brand"><img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics"><span>X-Ray Geoanalytics</span></div>
        <p class="xr-footer-tagline">Advanced machine learning for mining site discovery. Nevada lithium. Every mineral. Every continent. Every drill result makes us smarter.</p>
        <div class="xr-footer-contact"><a href="mailto:info@xraygeoanalytics.com"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="M4 6l8 7 8-7"/></svg>info@xraygeoanalytics.com</a></div>
      </div>
      <div><h3>Product</h3><ul class="xr-footer-list"><li><a href="/product/">Overview</a></li><li><a href="/our-models/">Our Models</a></li><li><a href="/platform/">Platform</a></li><li><a href="/industries/">Industries</a></li><li><a href="/how-it-works/">How it Works</a></li><li><a href="/pricing/">Pricing</a></li></ul></div>
      <div><h3>Company</h3><ul class="xr-footer-list"><li><a href="/our-team/">Our Team</a></li><li><a href="/why-xray/">Why X-Ray</a></li><li><a href="/news-updates/">News &amp; Updates</a></li><li><a href="/faqs/">FAQs</a></li></ul></div>
      <div><h3>Resources</h3><ul class="xr-footer-list"><li><a href="/resources/">Resources Library</a></li><li><a href="/investors/">For Investors</a></li><li><a href="/request-demo/">Request Demo</a></li></ul></div>
      <div><h3>Get in Touch</h3><ul class="xr-footer-list"><li><a href="/request-demo/">Book a Demo</a></li></ul></div>
    </div>
    <div class="xr-footer-bottom">
      <p>© 2026 X-Ray Geoanalytics, Inc. All rights reserved.</p>
      <div class="xr-footer-social">
        <a href="https://www.linkedin.com/company/xray-geoanalytics" aria-label="LinkedIn" target="_blank" rel="noopener"><svg aria-hidden="true" viewBox="0 0 24 24"><rect x="2" y="9" width="4" height="13"/><circle cx="4" cy="4" r="2" fill="currentColor"/><path d="M22 22V13.5a3.5 3.5 0 0 0-7 0V22M10 22V9"/></svg></a>
        <a href="https://x.com/xraygeoanalytic" aria-label="X" target="_blank" rel="noopener"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 4l16 16M20 4L4 20"/></svg></a>
        <a href="mailto:info@xraygeoanalytics.com" aria-label="Email"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="M4 6l8 7 8-7"/></svg></a>
      </div>
      <p>xraygeoanalytics.com</p>
    </div>
  </div>
</footer>
HTML;
} );
