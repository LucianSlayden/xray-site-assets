<?php
/**
 * Moved from Code Snippets #20 "XRay — Why X-Ray Page Content".
 */

add_action( 'generate_before_content', function () {
  if ( ! is_page( 'why-xray' ) ) return;
  ?>

<canvas id="wx-terrain-bg" aria-hidden="true"></canvas>
<div id="wx-page-overlay" aria-hidden="true"></div>

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
        <button class="xr-nav-btn">Resources<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">Resources</a>
          <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">Investors</a>
        </div>
      </div>
      <div class="xr-nav-item">
        <button class="xr-nav-btn" style="color:var(--xr-gold);">About Us<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a>
          <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a>
          <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>" style="color:var(--xr-gold);">Why X-Ray</a>
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
    <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a>
    <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a>
    <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>" style="color:var(--xr-gold);">Why X-Ray</a>
    <a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a>
    <a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">FAQs</a>
    <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request Demo</a>
  </div>
</nav>

<!-- HERO -->
<section id="wx-hero">
  <div class="wx-hero-bg" aria-hidden="true"></div>
  <div class="wx-fog wx-fog-left" aria-hidden="true"></div>
  <div class="xr-container">
    <div class="wx-hero-content">
      <div id="wx-eyebrow">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Why X-Ray</span>
      </div>
      <h1>
        <div style="overflow:hidden;"><div class="wx-hw-inner">About 1 in 200 exploration projects succeeds.</div></div>

        <div style="overflow:hidden;"><div class="wx-hw-inner"><span style="color:#E8B963;">Our goal: double predictive accuracy.</span></div></div>
      </h1>
      <p id="wx-lede" style="color:#A8B2C0;font-size:17px;line-height:1.8;margin:20px 0 34px;max-width:520px;">
        Each project averages around 20 boreholes. Target generation costs $30K–$90K per project a year, drilling can run up to $500K per site, and it takes about 10 years to go from project to mine. X-Ray is the only platform specifically trained to find lithium in the Great Basin. More accurate targets mean fewer holes drilled before a discovery.
      </p>
      <div id="wx-ctas" style="display:flex;gap:14px;flex-wrap:wrap;">
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request a Demo</a>
        <a href="#wx-compare" class="xr-btn xr-btn-outline">See comparison <span class="xr-arrow">↓</span></a>
      </div>
    </div>
  </div>
</section>

<!-- COMPARISON TABLE -->
<section id="wx-compare">
  <canvas class="wx-sec-canvas" id="wx-compare-canvas" aria-hidden="true"></canvas>
  <div class="wx-compare-bg"></div>
  <div class="xr-container">
    <div class="wx-sr" style="margin-bottom:40px;">
      <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>01 · Comparison</span>
      <h2 style="font-family:var(--xr-font-display);font-size:clamp(26px,3vw,40px);font-weight:700;letter-spacing:-0.02em;margin:16px 0 0;color:#F1F4F8;max-width:600px;">X-Ray vs. the other options.</h2>
    </div>
    <div class="wx-table">
      <div class="wx-row wx-head">
        <div>Capability</div>
        <div class="wx-xr-col">X-Ray</div>
        <div>Large consultancies</div>
        <div>Other ML explorers</div>
      </div>
      <div class="wx-row">
        <div class="wx-lbl">Example</div>
        <div class="wx-xr-col">X-Ray Geoanalytics</div>
        <div class="wx-alt">ALS Geoanalytics</div>
        <div class="wx-alt">Earth AI, KoBold Metals</div>
      </div>
      <div class="wx-row">
        <div class="wx-lbl">Trained for lithium in the Great Basin</div>
        <div class="wx-xr-col">✓ Built specifically for it</div>
        <div class="wx-alt">Generalized models over large areas</div>
        <div class="wx-alt wx-cross">✗ Other focus (e.g. copper in Africa)</div>
      </div>
      <div class="wx-row">
        <div class="wx-lbl">Speed and iteration</div>
        <div class="wx-xr-col">✓ Fast, iterative predictions</div>
        <div class="wx-alt">Slower and less iterative</div>
        <div class="wx-alt">&mdash;</div>
      </div>
      <div class="wx-row">
        <div class="wx-lbl">Software you can license</div>
        <div class="wx-xr-col">✓ SaaS subscription</div>
        <div class="wx-alt">Consulting engagement</div>
        <div class="wx-alt wx-cross">✗ Earth AI builds its own mines</div>
      </div>
    </div>
  </div>
</section>

<!-- DIFFERENTIATORS -->
<section id="wx-diff">
  <canvas class="wx-sec-canvas" id="wx-diff-canvas" aria-hidden="true"></canvas>
  <div class="xr-container">
    <div class="wx-diff-layout">
      <div class="wx-diff-left">
        <div class="wx-diff-intro wx-sr">
          <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>02 · The Difference</span>
          <h2>What you don't get<br>anywhere else.</h2>
          <p>Four advantages that are hard and expensive for anyone else to copy.</p>
        </div>
        <div class="wx-feat-list">
          <div class="wx-feat-row">
            <div class="wx-feat-num-col" aria-hidden="true">
              <span class="wx-feat-num">01</span>
              <div class="wx-feat-num-accent"></div>
            </div>
            <div class="wx-feat-body">
              <div class="wx-feat-icon"><svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div>
              <h3 class="wx-feat-h">Proprietary lithium featuresets</h3>
              <p class="wx-feat-p">Our featuresets are lists of geological features that indicate lithium mineralization, designed entirely in-house. The model learns from geochemistry, structural, lithology, geophysics, geothermal and topography data together, so it can process more data and weigh more factors than any human analyst. Each model is focused on one commodity in one region.</p>
            </div>
          </div>
          <div class="wx-feat-row">
            <div class="wx-feat-num-col" aria-hidden="true">
              <span class="wx-feat-num">02</span>
              <div class="wx-feat-num-accent"></div>
            </div>
            <div class="wx-feat-body">
              <div class="wx-feat-icon"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg></div>
              <h3 class="wx-feat-h">Validated the hard way</h3>
              <p class="wx-feat-p">Our models are an ensemble of XGBoost and LightGBM. We test them with spatial block cross-validation, which accounts for spatial autocorrelation, plus repeated stratified k-fold and leave-one-out cross-validation. The Great Basin lithium model reaches 95% recall and 80% precision at 1x1 km cells. Field validation against real boreholes is next on our roadmap.</p>
            </div>
          </div>
          <div class="wx-feat-row sky">
            <div class="wx-feat-num-col" aria-hidden="true">
              <span class="wx-feat-num">03</span>
              <div class="wx-feat-num-accent"></div>
            </div>
            <div class="wx-feat-body">
              <div class="wx-feat-icon"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
              <h3 class="wx-feat-h">Decades of data, made usable</h3>
              <p class="wx-feat-p">We collected decades of cluttered geological data, then cleaned and sorted it into something a model can learn from. Fed raw into any AI model today, that data would be useless. Our data-cleaning pipeline is what makes it work, and it would be costly and slow for a competitor to rebuild our datasets.</p>
            </div>
          </div>
          <div class="wx-feat-row sky">
            <div class="wx-feat-num-col" aria-hidden="true">
              <span class="wx-feat-num">04</span>
              <div class="wx-feat-num-accent"></div>
            </div>
            <div class="wx-feat-body">
              <div class="wx-feat-icon"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
              <h3 class="wx-feat-h">Your data stays yours</h3>
              <p class="wx-feat-p">Exploration companies spend millions collecting their data. On X-Ray, each customer's data is compartmentalized: everything you upload is used only for your own predictions and never to train another customer's model. You can keep uploading drilling data as your program moves, so you can make quick, informed decisions on where to drill next.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="wx-diff-right">
        <div class="wx-diff-img-wrap">
          <img src="https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/mj-heatmap-hero.webp" alt="Lithium prospectivity heat map visualization">
          <div class="wx-diff-img-overlay"></div>
        </div>
        <p class="wx-diff-img-caption">Geochemistry, structural, lithology, geophysics, geothermal and topography data combined into a prospectivity heat map and a ranked list of drill targets.</p>
      </div>
    </div>
  </div>
</section>

<!-- PROOF STATS -->
<section id="wx-proof">
  <canvas class="wx-sec-canvas" id="wx-proof-canvas" aria-hidden="true"></canvas>
  <div class="xr-container">
    <div class="wx-proof-layout">
      <div class="wx-proof-left">
        <div class="wx-sr">
          <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>03 · The Proof</span>
          <h2 style="font-family:var(--xr-font-display);font-size:clamp(28px,3.2vw,44px);font-weight:700;letter-spacing:-.028em;margin:16px 0 0;line-height:1.07;">Numbers that<br>tell the story.</h2>
        </div>
        <div class="wx-proof-stats">
          <div class="wx-proof-stat">
            <div class="wx-proof-eyebrow">Recall · Great Basin lithium</div>
            <div class="wx-proof-num">95%</div>
            <div class="wx-proof-desc">Out of every 100 known lithium deposits, the model finds 95 of them on average, at 1x1 km cells.</div>
          </div>
          <div class="wx-proof-stat">
            <div class="wx-proof-eyebrow">Precision · Great Basin lithium</div>
            <div class="wx-proof-num sky">80%</div>
            <div class="wx-proof-desc">Roughly 80% of the model's predictions are lithium deposits.</div>
          </div>
          <div class="wx-proof-stat">
            <div class="wx-proof-eyebrow">Earlier Nevada model · top 10%</div>
            <div class="wx-proof-num">69%</div>
            <div class="wx-proof-desc">Share of known deposits our earlier Nevada model recovered in the top 10% of its ranked ground.</div>
          </div>
        </div>
      </div>
      <div class="wx-proof-right">
        <div class="wx-chart-wrap">
          <div class="wx-chart-label">Model results · lithium</div>
          <svg class="wx-chart-svg" viewBox="0 0 340 220" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Great Basin lithium model: 95% recall, 80% precision. Earlier Nevada model: 69% of deposits in the top 10% of ranked ground.">
            <line x1="44" y1="20"  x2="320" y2="20"  stroke="rgba(255,255,255,.05)" stroke-width="0.8"/>
            <line x1="44" y1="60"  x2="320" y2="60"  stroke="rgba(255,255,255,.05)" stroke-width="0.8"/>
            <line x1="44" y1="100" x2="320" y2="100" stroke="rgba(255,255,255,.05)" stroke-width="0.8"/>
            <line x1="44" y1="140" x2="320" y2="140" stroke="rgba(255,255,255,.05)" stroke-width="0.8"/>
            <line x1="44" y1="180" x2="320" y2="180" stroke="rgba(255,255,255,.15)" stroke-width="0.8"/>
            <line x1="44" y1="20"  x2="44"  y2="180" stroke="rgba(255,255,255,.15)" stroke-width="0.8"/>
            <text x="14" y="184" font-family="monospace" font-size="9" fill="rgba(255,255,255,.3)">0%</text>
            <text x="8"  y="144" font-family="monospace" font-size="9" fill="rgba(255,255,255,.3)">25%</text>
            <text x="8"  y="104" font-family="monospace" font-size="9" fill="rgba(255,255,255,.3)">50%</text>
            <text x="8"  y="64"  font-family="monospace" font-size="9" fill="rgba(255,255,255,.3)">75%</text>
            <text x="2"  y="24"  font-family="monospace" font-size="9" fill="rgba(255,255,255,.3)">100%</text>
            <rect x="68"  y="28"  width="56" height="152" fill="rgba(232,185,99,.55)" stroke="rgba(232,185,99,.9)" stroke-width="1"/>
            <rect x="154" y="52"  width="56" height="128" fill="rgba(111,181,224,.45)" stroke="rgba(111,181,224,.85)" stroke-width="1"/>
            <rect x="240" y="69.6" width="56" height="110.4" fill="rgba(232,185,99,.25)" stroke="rgba(232,185,99,.6)" stroke-width="1"/>
            <text x="96"  y="22"   font-family="monospace" font-size="10" fill="rgba(232,185,99,.9)" font-weight="bold" text-anchor="middle">95%</text>
            <text x="182" y="46"   font-family="monospace" font-size="10" fill="rgba(111,181,224,.9)" font-weight="bold" text-anchor="middle">80%</text>
            <text x="268" y="63.6" font-family="monospace" font-size="10" fill="rgba(232,185,99,.75)" font-weight="bold" text-anchor="middle">69%</text>
            <text x="96"  y="196" font-family="monospace" font-size="8.5" fill="rgba(255,255,255,.35)" text-anchor="middle">RECALL</text>
            <text x="182" y="196" font-family="monospace" font-size="8.5" fill="rgba(255,255,255,.35)" text-anchor="middle">PRECISION</text>
            <text x="268" y="196" font-family="monospace" font-size="8.5" fill="rgba(255,255,255,.35)" text-anchor="middle">TOP-10% RECOVERY</text>
            <text x="139" y="210" font-family="monospace" font-size="8" fill="rgba(255,255,255,.28)" text-anchor="middle">GREAT BASIN · 1x1 KM</text>
            <text x="268" y="210" font-family="monospace" font-size="8" fill="rgba(255,255,255,.28)" text-anchor="middle">EARLIER NEVADA MODEL</text>
          </svg>
          <p style="font-family:var(--xr-font-mono);font-size:10px;letter-spacing:.06em;color:var(--xr-text-muted);margin-top:14px;line-height:1.6;">Recall and precision are for the current Great Basin lithium model. Top-10% recovery is from our earlier, coarser Nevada model, which used 5x5 km cells.</p>
        </div>
        <div class="wx-proof-disclaimer">
          <p>Models are an ensemble of XGBoost and LightGBM trained on geochemistry, structural, lithology, geophysics, geothermal and topography data, with labels derived from existing mine sites, geochemistry and mining claim data. Evaluated with spatial block, repeated stratified k-fold and leave-one-out cross-validation. Field validation against real boreholes has not yet been completed.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section id="wx-cta">
  <canvas class="wx-sec-canvas" id="wx-cta-canvas" aria-hidden="true"></canvas>
  <div class="wx-cta-inner">
    <span class="xr-eyebrow wx-cta-el" style="justify-content:flex-start;margin-bottom:18px;"><span class="xr-eyebrow-hex"></span>See it on your data</span>
    <h2 class="wx-cta-el">The best argument<br>is a live <span class="gold">demo.</span></h2>
    <p class="wx-cta-el">Tell us about your project and target area. We'll walk you through how the platform turns your exploration data into a heat map, a ranked list of drill targets and a 3D view.</p>
    <div class="wx-cta-el" style="display:flex;gap:14px;justify-content:flex-start;flex-wrap:wrap;">
      <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request a Demo</a>
      <a href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>" class="xr-btn xr-btn-outline">How it Works <span class="xr-arrow">→</span></a>
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
          <a href="mailto:info@xraygeoanalytics.com"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="M4 6l8 7 8-7"/></svg>info@xraygeoanalytics.com</a>
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

<?php
} );
