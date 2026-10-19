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
<div id="om-page-bg" style="position:fixed;inset:0;background:url('https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/mj-ourmodels-bg-2.webp') center/cover no-repeat;opacity:0.32;z-index:0;pointer-events:none;"></div>
<div id="om-veil" style="position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(14,20,27,0.72);z-index:50;pointer-events:none;"></div>

<nav class="xr-nav">
  <div class="xr-nav-inner">
    <a href="/" class="xr-brand"><img class="xr-brand-logo" src="https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/logo-wordmark.png" alt="X-Ray Geoanalytics" width="570" height="180"></a>
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
    <h1>One lithium model built. <span class="accent">More</span> minerals on the way.</h1>
    <p>Our work is focused on one prediction model right now: lithium in the Great Basin. Nickel is next, then cobalt, gold and silver, the minerals our customers already search for alongside lithium.</p>
  </div>
</section>

<section class="active-section">
  <div class="active-inner">
    <div>
      <h2>Great Basin lithium. <span class="accent">95% recall.</span> 80% precision.</h2>
      <p>Trained on geochemistry, structural, lithology, geophysics, geothermal and topography data, with labels from known mine sites, geochemistry and mining-claim data. We cleaned and sorted decades of cluttered public geological data so the model can learn from it. The model returns a prospectivity heat map and a ranked list of drill targets.</p>
      <p><strong>The model predicts lithium across the whole Great Basin at 1x1 km cells.</strong> An earlier Nevada model, covering 19,000 grid cells at 5x5 km, recovered 69% of deposits in the top 10% of ranked ground.</p>
      <p>Next is a hierarchy of finer models at 100–500 m per cell, each more precise than the last, working toward exact drill coordinates. They will add borehole logs from water wells, oil and gas wells and lithium drilling, plus customers' own exploration data.</p>
      <a href="/request-demo/" class="xr-btn xr-btn-gold" style="margin-top:16px;">Request Pilot Access</a>
    </div>
    <div class="model-card">
      <div class="tag-row">
        <span class="tag"><span class="dot"></span>Active Model</span>
      </div>
      <h3>Great Basin Lithium</h3>
      <div class="sub">Great Basin region · 6 data types</div>
      <div class="data-grid">
        <div><div class="lbl">Results</div><div class="v">95% recall<br><span style="color:var(--xr-text-muted);font-family:var(--xr-font-mono);font-size:12.5px;letter-spacing:0.04em;">80% precision on known deposits</span></div></div>
        <div><div class="lbl">Resolution</div><div class="v">1x1 km cells</div></div>
        <div><div class="lbl">Data Types</div><div class="v">Geochem · Structural · Lithology · Geophys · Geothermal · Topography</div></div>
        <div><div class="lbl">Training Labels</div><div class="v">Mine sites · geochemistry · mining claims</div></div>
      </div>
    </div>
  </div>
</section>

<section class="roadmap-section">
  <div class="roadmap-inner">
    <h2>From <span class="accent">Great Basin lithium</span> to <span class="accent">more minerals</span>.</h2>
    <p class="intro">Each model is trained for one commodity in one region. <strong>Lithium is the only model available today.</strong> Nickel comes next, followed by cobalt, gold and silver, while finer-resolution lithium models and neural network research continue alongside.</p>
    <div class="roadmap-grid">
      <article class="rm-card is-active">
        <span class="rm-tag"><span class="dot"></span>Active</span>
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
        <h3>Great Basin Lithium</h3>
        <p>Our active model. 95% recall and 80% precision at 1x1 km cells.</p>
      </article>
      <article class="rm-card is-future-1">
        <span class="rm-tag"><span class="dot"></span>Next</span>
        <div class="rm-art">
          <svg viewBox="0 0 130 100" aria-hidden="true">
            <defs><linearGradient id="cuVein" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#E8B963"/><stop offset="100%" stop-color="#6FB5E0"/></linearGradient></defs>
            <path d="M0 60 L18 50 L32 56 L48 38 L66 50 L86 36 L104 44 L130 38 L130 100 L0 100 Z" fill="rgba(14,20,27,0.8)" stroke="rgba(111,181,224,0.55)" stroke-width="1.2"/>
            <path d="M10 80 Q40 70 64 78 T120 72" fill="none" stroke="url(#cuVein)" stroke-width="2.2" stroke-linecap="round"/>
            <circle cx="34" cy="76" r="2.6" fill="#E8B963"/>
            <circle cx="68" cy="78" r="3" fill="#C77A3D"/>
            <circle cx="98" cy="74" r="2.4" fill="#6FB5E0"/>
            <g font-family="monospace" font-weight="700">
              <rect x="52" y="12" width="26" height="20" fill="rgba(111,181,224,0.1)" stroke="#6FB5E0" stroke-width="0.9"/><text x="65" y="25" text-anchor="middle" fill="#6FB5E0" font-size="10">Ni</text>
            </g>
          </svg>
        </div>
        <h3>Nickel</h3>
        <p>Our next model. A metal our customers already target alongside lithium.</p>
      </article>
      <article class="rm-card is-future-2">
        <span class="rm-tag"><span class="dot"></span>Later</span>
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
        <h3>Cobalt, Gold &amp; Silver</h3>
        <p>Further models for minerals our customers drill for alongside lithium.</p>
      </article>
      <article class="rm-card is-future-2">
        <span class="rm-tag"><span class="dot"></span>In Progress</span>
        <div class="rm-art">
          <svg viewBox="0 0 130 100" aria-hidden="true">
            <rect x="15" y="8" width="84" height="84" fill="rgba(111,181,224,0.06)" stroke="rgba(111,181,224,0.45)" stroke-width="1.2"/>
            <rect x="57" y="8" width="42" height="42" fill="rgba(111,181,224,0.1)" stroke="#6FB5E0" stroke-width="1.1"/>
            <rect x="78" y="29" width="21" height="21" fill="rgba(232,185,99,0.12)" stroke="#E8B963" stroke-width="1.1"/>
            <rect x="88.5" y="39.5" width="10.5" height="10.5" fill="rgba(232,185,99,0.3)" stroke="#E8B963" stroke-width="1"/>
            <circle cx="93.75" cy="44.75" r="2.2" fill="#4ade80"/>
          </svg>
        </div>
        <h3>Finer Models · 100–500 m</h3>
        <p>A hierarchy of lithium models, each finer than the last, working toward exact drill coordinates.</p>
      </article>
      <article class="rm-card is-future-2">
        <span class="rm-tag"><span class="dot"></span>Research</span>
        <div class="rm-art">
          <svg viewBox="0 0 130 100" aria-hidden="true">
            <g stroke="rgba(111,181,224,0.35)" stroke-width="1">
              <line x1="22" y1="22" x2="65" y2="30"/><line x1="22" y1="22" x2="65" y2="70"/>
              <line x1="22" y1="50" x2="65" y2="30"/><line x1="22" y1="50" x2="65" y2="70"/>
              <line x1="22" y1="78" x2="65" y2="30"/><line x1="22" y1="78" x2="65" y2="70"/>
              <line x1="65" y1="30" x2="108" y2="50"/><line x1="65" y1="70" x2="108" y2="50"/>
            </g>
            <g fill="rgba(14,20,27,0.9)" stroke="#6FB5E0" stroke-width="1.4">
              <circle cx="22" cy="22" r="6"/><circle cx="22" cy="50" r="6"/><circle cx="22" cy="78" r="6"/>
              <circle cx="65" cy="30" r="6"/><circle cx="65" cy="70" r="6"/>
            </g>
            <circle cx="108" cy="50" r="7" fill="rgba(232,185,99,0.18)" stroke="#E8B963" stroke-width="1.6"/>
          </svg>
        </div>
        <h3>Neural Networks</h3>
        <p>Research into neural networks that bring our commodity models together into one framework.</p>
      </article>
    </div>
  </div>
</section>

<section class="meth-section">
  <div class="meth-inner">
    <h2>Built on <span style="color:var(--xr-gold);">known deposits</span>, not assumptions.</h2>
    <p class="intro">Every X-Ray model starts from known deposits as its ground truth, and is tested on ground it has not seen.</p>
    <div class="meth-grid">
      <div class="meth-item">
        <span class="lbl">Foundation</span>
        <h3>Labels from real ground.</h3>
        <p>Training labels come from existing mine site locations, geochemistry and mining-claim data. The model learns what real lithium ground looks like in the Great Basin.</p>
      </div>
      <div class="meth-item">
        <span class="lbl">Data</span>
        <h3>Decades of data, cleaned.</h3>
        <p>Geochemistry, structural, lithology, geophysics, geothermal and topography data, collected over decades, then cleaned and sorted into a form a model can learn from. Our featuresets, the geological features that indicate lithium mineralization, are designed in-house.</p>
      </div>
      <div class="meth-item">
        <span class="lbl">Validation</span>
        <h3>Tested the hard way.</h3>
        <p>An ensemble of XGBoost and LightGBM models with feature selection algorithms. Checked with spatial block cross-validation to account for spatial autocorrelation, plus repeated stratified k-fold and leave-one-out cross-validation.</p>
      </div>
    </div>
  </div>
</section>

<section class="om-cta">
  <div class="om-cta-inner">
    <h2>Pilot customers shape the <span class="accent">roadmap</span>.</h2>
    <p>Early customers get access to the Great Basin lithium model and a direct say in what the platform does next.</p>
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
        <div class="xr-footer-brand"><img class="xr-brand-logo" src="https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/logo-wordmark.png" alt="X-Ray Geoanalytics" width="570" height="180"></div>
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
