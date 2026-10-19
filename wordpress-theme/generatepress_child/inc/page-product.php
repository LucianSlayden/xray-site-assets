<?php
/**
 * Moved from Code Snippets #11 "XRay — Product".
 */

add_action( 'wp_enqueue_scripts', function() {
    if ( ! is_page( 'product' ) ) return;

    // Add page-specific scripts here (see table below for each page)
    wp_enqueue_script( 'gsap',    'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js', [], null, true );
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js', ['gsap'], null, true );
});

add_action( 'generate_before_content', function() {
    if ( ! is_page( 'product' ) ) return;
    ?>
<canvas id="pdt-bg-canvas" aria-hidden="true" style="position:fixed;inset:0;width:100%;height:100%;z-index:0;pointer-events:none;"></canvas>
 <nav class="xr-nav">
    <div class="xr-nav-inner">
      <a href="/" class="xr-brand"><img class="xr-brand-logo" src="https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/logo-wordmark.png" alt="X-Ray Geoanalytics" width="570" height="180"></a>
      <div class="xr-nav-list">
        <div class="xr-nav-item">
          <button class="xr-nav-btn" style="color:var(--xr-gold);">Product<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
          <div class="xr-nav-drop">
            <a href="product" style="color:var(--xr-gold);">Product Overview</a>
            <a href="our-models">Our Models</a>
            <a href="industries">Industries</a>
            <a href="platform">Platform</a>
            <a href="how-it-works">How it Works</a>
            <a href="pricing">Pricing</a>
          </div>
        </div>
        <div class="xr-nav-item">
          <button class="xr-nav-btn">Resources<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
          <div class="xr-nav-drop"><a href="resources">Resources</a><a href="investors">Investors</a></div>
        </div>
        <div class="xr-nav-item">
          <button class="xr-nav-btn">About Us<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
          <div class="xr-nav-drop">
            <a href="about-us">About Us</a>
            <a href="our-team">Our Team</a>
            <a href="why-xray">Why X-Ray</a>
            <a href="news-updates">News &amp; Updates</a>
            <a href="faqs">FAQs</a>
          </div>
        </div>
        <a href="request-demo" class="xr-btn xr-btn-gold xr-nav-cta">Request Demo</a>
      </div>
      <button class="xr-nav-toggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
    </div>
    <div class="xr-nav-mobile">
      <a href="product" style="color:var(--xr-gold);">Product</a><a href="our-models">Our Models</a>
      <a href="industries">Industries</a><a href="platform">Platform</a>
      <a href="how-it-works">How it Works</a><a href="pricing">Pricing</a>
      <a href="resources">Resources</a><a href="investors">Investors</a>
      <a href="about-us">About Us</a><a href="our-team">Our Team</a>
      <a href="why-xray">Why X-Ray</a><a href="news-updates">News &amp; Updates</a>
      <a href="faqs">FAQs</a>
      <a href="request-demo" class="xr-btn xr-btn-gold">Request Demo</a>
    </div>
  </nav>

  <!-- ═══════════════ HERO ═══════════════ -->
  <section class="pdt-hero">
    <div class="xr-container" style="position:relative;z-index:3;width:100%;">
      <div class="pdt-hero-grid">

        <!-- Left: copy -->
        <div class="pdt-hero-left">
          <div class="pdt-eyebrow-wrap">
            <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>The X-Ray Platform · Great Basin Lithium</span>
          </div>
          <h1>
            <span class="pdt-hw"><span class="pdt-hw-inner">A</span></span>&#32;<span class="pdt-hw"><span class="pdt-hw-inner">model</span></span>&#32;<span class="pdt-hw"><span class="pdt-hw-inner">that</span></span><br>
            <span class="pdt-hw"><span class="pdt-hw-inner gold">learns.</span></span>&#32;<span class="pdt-hw"><span class="pdt-hw-inner gold"></span></span><br>
           
          </h1>
          <p class="pdt-lede">New mineral discoveries have fallen from 202 in 2009 to about 80 in 2023, because most of the easy deposits have already been found. Our machine learning models process more data and weigh more factors than any human can. They are trained on geochemistry, structural, lithology, geophysics, geothermal and topography data, and checked with spatial block cross-validation. Your geologists upload their exploration data and get back a prospectivity heat map and a ranked list of drill targets. Your data is only used for your own predictions. It is never used to train anyone else's model.</p>
          <div class="pdt-cta-row">
            <a href="request-demo" class="xr-btn xr-btn-gold">Request Demo</a>
            <a href="how-it-works" class="xr-btn xr-btn-outline">How It Works <span class="xr-arrow">→</span></a>
          </div>
          <div class="pdt-hero-stats">
            <div class="pdt-stat-item">
              <span class="pdt-stat-num">95%</span>
              <span class="pdt-stat-label">Recall · Great Basin lithium</span>
            </div>
            <div class="pdt-stat-item">
              <span class="pdt-stat-num sky">80%</span>
              <span class="pdt-stat-label">Precision</span>
            </div>
            <div class="pdt-stat-item">
              <span class="pdt-stat-num">1x1 km</span>
              <span class="pdt-stat-label">Prediction cells</span>
            </div>
          </div>
        </div>

        <!-- Right: ranked output panel -->
        <div class="pdt-output-panel" id="pdt-op">
          <div class="pdt-op-header">
            <div class="pdt-op-header-left">
              <div class="pdt-op-run">Great Basin Lithium · Example Output</div>
              <div class="pdt-op-meta">Illustrative ranked drill-target list · 1x1 km cells</div>
            </div>
            <div class="pdt-op-badge">Sample</div>
          </div>
          <div class="pdt-op-col-heads">
            <span class="pdt-op-col-head">#</span>
            <span class="pdt-op-col-head">Zone</span>
            <span class="pdt-op-col-head">Score</span>
            <span class="pdt-op-col-head">Pct</span>
            <span class="pdt-op-col-head">Confidence</span>
          </div>
          <div class="pdt-op-row top" data-fill="94">
            <span class="pdt-op-rank">01</span>
            <span class="pdt-op-zone">Target A</span>
            <div class="pdt-op-bar-wrap"><div class="pdt-op-bar"><div class="pdt-op-bar-fill" data-w="94"></div></div></div>
            <span class="pdt-op-pct">94%</span>
            <span class="pdt-op-conf">HIGH CONF</span>
          </div>
          <div class="pdt-op-row top" data-fill="87">
            <span class="pdt-op-rank">02</span>
            <span class="pdt-op-zone">Target B</span>
            <div class="pdt-op-bar-wrap"><div class="pdt-op-bar"><div class="pdt-op-bar-fill" data-w="87"></div></div></div>
            <span class="pdt-op-pct">87%</span>
            <span class="pdt-op-conf">HIGH CONF</span>
          </div>
          <div class="pdt-op-row sky">
            <span class="pdt-op-rank">03</span>
            <span class="pdt-op-zone">Target C</span>
            <div class="pdt-op-bar-wrap"><div class="pdt-op-bar"><div class="pdt-op-bar-fill" data-w="71"></div></div></div>
            <span class="pdt-op-pct">71%</span>
            <span class="pdt-op-conf">MODERATE</span>
          </div>
          <div class="pdt-op-row sky">
            <span class="pdt-op-rank">04</span>
            <span class="pdt-op-zone">Target D</span>
            <div class="pdt-op-bar-wrap"><div class="pdt-op-bar"><div class="pdt-op-bar-fill" data-w="63"></div></div></div>
            <span class="pdt-op-pct">63%</span>
            <span class="pdt-op-conf">MODERATE</span>
          </div>
          <div class="pdt-op-row">
            <span class="pdt-op-rank" style="color:rgba(255,255,255,.18);">05</span>
            <span class="pdt-op-zone" style="color:rgba(255,255,255,.25);">Target E</span>
            <div class="pdt-op-bar-wrap"><div class="pdt-op-bar"><div class="pdt-op-bar-fill" style="background:rgba(255,255,255,.18);" data-w="48"></div></div></div>
            <span class="pdt-op-pct" style="color:rgba(255,255,255,.28);">48%</span>
            <span class="pdt-op-conf">LOW CONF</span>
          </div>
          <div class="pdt-op-footer">
            <span class="pdt-op-footer-txt">Example layout · not real targets</span>
            <a href="how-it-works" class="pdt-op-view-all">How it works →</a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ═══════════════ COMPARISON ═══════════════ -->
  <section class="pdt-cmp-sec">
    <div class="xr-container">
      <div class="pdt-cmp-intro xr-reveal">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>The Difference</span>
        <h2>Old methods.<br>Or X-Ray.</h2>
        <p>Discoveries fell from 202 in 2009 to about 80 in 2023, and the cost of finding new deposits keeps rising. Choosing where to drill is still slow, expensive and mostly unsuccessful. We built the alternative.</p>
      </div>
      <div class="pdt-cmp-grid xr-reveal">

        <!-- Traditional column -->
        <div class="pdt-cmp-col">
          <div class="pdt-cmp-head">
            <div class="pdt-cmp-head-icon">
              <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <span class="pdt-cmp-head-title">Traditional Exploration</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Success rate</span>
            <span class="pdt-cmp-val">About 1 in 200 drill projects, ~20 boreholes each</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Target generation</span>
            <span class="pdt-cmp-val">$30K – $90K per project, per year</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Drilling</span>
            <span class="pdt-cmp-val">Up to $500K per site</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Method</span>
            <span class="pdt-cmp-val">Geologist teams, GIS, prospectivity studies, surface mapping</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Targets tested</span>
            <span class="pdt-cmp-val">Can run to several thousand before a discovery</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Data processed</span>
            <span class="pdt-cmp-val">As much as a team can review by hand</span>
          </div>
        </div>

        <!-- X-Ray column -->
        <div class="pdt-cmp-col gold-col">
          <div class="pdt-cmp-head">
            <div class="pdt-cmp-head-icon">
              <svg viewBox="0 0 24 24"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
            </div>
            <span class="pdt-cmp-head-title">X-Ray Platform</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Success rate</span>
            <span class="pdt-cmp-val">Great Basin lithium model: 95% recall, 80% precision</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Target generation</span>
            <span class="pdt-cmp-val">Three annual subscription tiers</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Drilling</span>
            <span class="pdt-cmp-val">Fewer holes drilled before a discovery</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Method</span>
            <span class="pdt-cmp-val">Machine learning on decades of cleaned geological data</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Targets tested</span>
            <span class="pdt-cmp-val">A ranked list shows where to drill first</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Data processed</span>
            <span class="pdt-cmp-val">More data and more factors than any human can weigh</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ═══════════════ ARCHITECTURE ═══════════════ -->
  <section class="pdt-arch-sec">
    <div class="xr-container">
      <div class="pdt-arch-intro xr-reveal">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>How It Works</span>
        <h2>Your data. Our models.<br>Ranked drill targets.</h2>
        <p>The X-Ray platform is a software subscription for geologists. Your exploration data goes in, and a prospectivity heat map and ranked drill targets come out. Keep uploading drill data as you go and make quick, informed decisions on where to drill next.</p>
      </div>

      <div class="pdt-arch-flow">

        <!-- Step 1: Input -->
        <div class="pdt-arch-card gold">
          <div class="pdt-arch-card-num">01 · Input</div>
          <div class="pdt-arch-icon">
            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="4"/><rect x="3" y="9.5" width="18" height="4"/><rect x="3" y="16" width="18" height="4"/></svg>
          </div>
          <h3 class="pdt-arch-h">Upload your exploration data</h3>
          <p class="pdt-arch-p">Securely upload the exploration data your team has already collected. It is combined with our own dataset: decades of cluttered public geological data that we have cleaned and sorted so a model can learn from it.</p>
          <div class="pdt-arch-bullets">
            <div class="pdt-arch-bullet">Geochemistry</div>
            <div class="pdt-arch-bullet">Structural &amp; lithology data</div>
            <div class="pdt-arch-bullet">Geophysics, geothermal &amp; topography</div>
            <div class="pdt-arch-bullet">Your own survey and drill data</div>
          </div>
        </div>

        <div class="pdt-arch-arrow" aria-hidden="true">→</div>

        <!-- Step 2: Training -->
        <div class="pdt-arch-card mid">
          <div class="pdt-arch-card-num">02 · Training</div>
          <div class="pdt-arch-icon">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07M8.46 8.46a5 5 0 0 0 0 7.07"/></svg>
          </div>
          <h3 class="pdt-arch-h">Models built for one mineral, one region</h3>
          <p class="pdt-arch-p">An ensemble of XGBoost and LightGBM models scores your ground using our proprietary featuresets: in-house lists of the geological features that indicate lithium mineralization. Each customer's model is kept separate.</p>
          <div class="pdt-arch-bullets">
            <div class="pdt-arch-bullet">Your data is used only for your predictions</div>
            <div class="pdt-arch-bullet">XGBoost + LightGBM ensemble</div>
            <div class="pdt-arch-bullet">Proprietary in-house featuresets</div>
            <div class="pdt-arch-bullet">Spatial block cross-validation</div>
          </div>
        </div>

        <div class="pdt-arch-arrow" aria-hidden="true">→</div>

        <!-- Step 3: Output -->
        <div class="pdt-arch-card sky">
          <div class="pdt-arch-card-num">03 · Output</div>
          <div class="pdt-arch-icon">
            <svg viewBox="0 0 24 24"><polygon points="4 21 9 21 9 8 4 8"/><polygon points="11 21 16 21 16 4 11 4"/><polygon points="18 21 22 21 22 13 18 13"/></svg>
          </div>
          <h3 class="pdt-arch-h">Ranked targets, ready to review</h3>
          <p class="pdt-arch-p">You get a prospectivity heat map of your area of interest and a ranked list of drill targets. A 3D view and analysis tools help your geologists narrow down where to drill.</p>
          <div class="pdt-arch-bullets">
            <div class="pdt-arch-bullet">Prospectivity heat map</div>
            <div class="pdt-arch-bullet">Ranked list of drill targets</div>
            <div class="pdt-arch-bullet">3D visualization of the target area</div>
            <div class="pdt-arch-bullet">Analysis tools for your geologists</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ═══════════════ PROOF / NEVADA ═══════════════ -->
  <section class="pdt-proof-sec">
    <div class="xr-container">
      <div class="pdt-proof-intro xr-reveal">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Proof of Concept</span>
        <h2>The Great Basin<br>lithium model.</h2>
        <p>Our first model predicts lithium deposits across the whole Great Basin region of the United States at 1x1 km cells. It builds on an earlier Nevada model that proved the approach.</p>
      </div>

      <div class="pdt-proof-grid">
        <div class="pdt-proof-stat">
          <div class="pdt-proof-stat-eyebrow">Recall · known deposits</div>
          <div class="pdt-proof-stat-num">95%</div>
          <div class="pdt-proof-stat-label">Out of every 100 known lithium deposits in the Great Basin, the model finds 95 of them on average.</div>
        </div>
        <div class="pdt-proof-stat">
          <div class="pdt-proof-stat-eyebrow">Precision</div>
          <div class="pdt-proof-stat-num sky">80%</div>
          <div class="pdt-proof-stat-label">Roughly 80% of the model's predictions are lithium deposits.</div>
        </div>
        <div class="pdt-proof-stat">
          <div class="pdt-proof-stat-eyebrow">Earlier Nevada model</div>
          <div class="pdt-proof-stat-num">69%</div>
          <div class="pdt-proof-stat-label">Of deposits recovered in the top 10% of ranked ground, across 19,000 grid cells at 5x5 km.</div>
        </div>
      </div>

      <div class="pdt-proof-quote xr-reveal" style="margin-top:2px;">
        <blockquote>Trained on labels from known mine sites, geochemistry and mining-claim data. Checked with spatial block cross-validation to account for spatial autocorrelation, plus repeated stratified k-fold and leave-one-out cross-validation.</blockquote>
        <cite>Model validation · X-Ray Geoanalytics</cite>
      </div>
    </div>
  </section>

  <!-- ═══════════════ STATUS BOARD ═══════════════ -->
  <section class="pdt-status-sec">
    <div class="xr-container">
      <div class="pdt-status-intro xr-reveal">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Development Status</span>
        <h2>Where we are today.</h2>
        <p>We are pre-launch. The Great Basin lithium model is built. The software platform is being designed around it, shaped by what geologists at junior explorers tell us they need.</p>
      </div>

      <div class="pdt-status-board">

        <div class="pdt-status-row">
          <div class="pdt-status-dot live"></div>
          <div class="pdt-status-mineral">Great Basin Lithium Model</div>
          <div class="pdt-status-desc">Predicts lithium across the Great Basin at 1x1 km cells. 95% recall and 80% precision on known deposits.</div>
          <div class="pdt-status-timeline">Built</div>
          <div class="pdt-status-badge live">Active</div>
        </div>

        <div class="pdt-status-row">
          <div class="pdt-status-dot active"></div>
          <div class="pdt-status-mineral">Finer Models · 100–500 m</div>
          <div class="pdt-status-desc">A hierarchy of models, each finer than the last, working toward exact drill coordinates. Adds borehole logs from water wells, oil and gas wells and lithium drilling, plus customer data.</div>
          <div class="pdt-status-timeline">In progress</div>
          <div class="pdt-status-badge active">In Dev</div>
        </div>

        <div class="pdt-status-row">
          <div class="pdt-status-dot soon"></div>
          <div class="pdt-status-mineral">Nickel Model</div>
          <div class="pdt-status-desc">Our next commodity model. Nickel is a metal our customers already target alongside lithium.</div>
          <div class="pdt-status-timeline">Next</div>
          <div class="pdt-status-badge soon">Planned</div>
        </div>

        <div class="pdt-status-row">
          <div class="pdt-status-dot future"></div>
          <div class="pdt-status-mineral">Cobalt, Gold &amp; Silver</div>
          <div class="pdt-status-desc">Further models for minerals customers drill for alongside lithium. We are also researching neural networks to bring the models together into one framework.</div>
          <div class="pdt-status-timeline">Later</div>
          <div class="pdt-status-badge future">Future</div>
        </div>

      </div>

      <div class="xr-reveal" style="margin-top:44px;">
        <p style="color:var(--xr-text-muted);font-size:14px;max-width:58ch;line-height:1.7;">We offer <strong style="color:var(--xr-text);">three annual tiers</strong>. Tier 1 covers a single commodity or project; tiers 2 and 3 cover multiple commodities and projects, so you can match your investment to the scale and risk of your exploration.</p>
        <a href="pricing" class="xr-btn xr-btn-outline" style="margin-top:20px;display:inline-flex;">View pricing plans <span class="xr-arrow">→</span></a>
      </div>
    </div>
  </section>

  <!-- ═══════════════ CTA ═══════════════ -->
  <section class="pdt-cta">
    <div class="pdt-cta-inner">
      <span class="xr-reveal xr-eyebrow" style="justify-content:center;margin-bottom:18px;"><span class="xr-eyebrow-hex"></span>Get Started</span>
      <h2 class="xr-reveal pdt-cta-h">Know where to drill<br>before you spend a <span class="gold">dollar.</span></h2>
      <p class="xr-reveal xr-d2">Our Great Basin lithium model is built. Request a demo to see how it ranks drill targets on your ground.</p>
      <div class="xr-reveal xr-d3" style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
        <a href="request-demo" class="xr-btn xr-btn-gold">Request a Demo</a>
        <a href="platform"     class="xr-btn xr-btn-outline">Platform details <span class="xr-arrow">→</span></a>
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
        <div><h3>Product</h3><ul class="xr-footer-list"><li><a href="product">Overview</a></li><li><a href="our-models">Our Models</a></li><li><a href="platform">Platform</a></li><li><a href="industries">Industries</a></li><li><a href="how-it-works">How it Works</a></li><li><a href="pricing">Pricing</a></li></ul></div>
        <div><h3>Company</h3><ul class="xr-footer-list"><li><a href="our-team">Our Team</a></li><li><a href="why-xray">Why X-Ray</a></li><li><a href="news-updates">News &amp; Updates</a></li><li><a href="faqs">FAQs</a></li></ul></div>
        <div><h3>Resources</h3><ul class="xr-footer-list"><li><a href="resources">Resources Library</a></li><li><a href="investors">For Investors</a></li><li><a href="request-demo">Request Demo</a></li></ul></div>
        <div><h3>Get in Touch</h3><ul class="xr-footer-list"><li><a href="request-demo">Book a Demo</a></li></ul></div>
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
});
