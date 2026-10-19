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
 <?php xray_site_nav(); ?>

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
            <a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>" class="xr-btn xr-btn-gold">Learn More</a>
            <a href="#pdt-how" class="xr-btn xr-btn-outline">How It Works <span class="xr-arrow">→</span></a>
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

        <!-- Right: what the customer's team gets -->
        <div class="pdt-output-panel pdt-gets" id="pdt-op">
          <div class="pdt-op-header">
            <div class="pdt-op-header-left">
              <div class="pdt-op-run">What your geologist team gets</div>
              <div class="pdt-op-meta">From your exploration data to a drill decision</div>
            </div>
          </div>

          <div class="pdt-gets-block">
            <div class="pdt-gets-label"><span>01</span>You upload</div>
            <div class="pdt-gets-chips">
              <span>Geochemistry</span><span>Structure</span><span>Lithology</span>
              <span>Geophysics</span><span>Geothermal</span><span>Topography</span>
            </div>
          </div>

          <div class="pdt-gets-block pdt-gets-model">
            <div class="pdt-gets-label"><span>02</span>The model scores</div>
            <p>Every 1x1 km cell in your area, weighing more factors together than a team can review by hand.</p>
          </div>

          <div class="pdt-gets-block">
            <div class="pdt-gets-label"><span>03</span>You get</div>
            <div class="pdt-gets-item">
              <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18"/><rect x="7" y="7" width="4" height="4" class="hot"/><rect x="13" y="13" width="4" height="4"/></svg>
              <div><strong>Prospectivity heat map</strong><small>See where the whole area is most likely to host a deposit, and which ground is not worth holding.</small></div>
            </div>
            <div class="pdt-gets-item">
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l9 5v10l-9 5-9-5V7z"/><path d="M3 7l9 5 9-5M12 12v10"/></svg>
              <div><strong>3D view of the target area</strong><small>Review the geology under each target with your team before committing a rig.</small></div>
            </div>
            <div class="pdt-gets-item">
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16M4 12h11M4 18h6"/></svg>
              <div><strong>Ranked drill targets</strong><small>Know which holes to drill first, so the drilling budget goes to the best odds.</small></div>
            </div>
          </div>

          <div class="pdt-op-footer">
            <span class="pdt-op-footer-txt">Your data only trains your own predictions</span>
            <a href="#pdt-how" class="pdt-op-view-all">How it works →</a>
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
            <span class="pdt-cmp-val">Software subscription</span>
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
  <section class="pdt-arch-sec" id="pdt-how">
    <div class="xr-container">
      <div class="pdt-arch-intro xr-reveal">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>How It Works</span>
        <h2>Your data. Our models.<br>Ranked drill targets.</h2>
        <p>The X-Ray platform is being built for geoscientist teams at mining companies. Your team imports its survey data, and the model outputs ranked drill targets with a 3D visualization, a heat map and other geoanalysis tools. Keep adding drill data as you go to make quick, informed decisions on where to drill next.</p>
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
        <p>We are pre-launch. Our Great Basin lithium model is a prototype that predicts to within 1x1 km, and mining companies need 1x1 m to place a borehole. We are using the prototype to build a series of finer models that will get there.</p>
      </div>

      <div class="pdt-status-board">

        <div class="pdt-status-row">
          <div class="pdt-status-dot live"></div>
          <div class="pdt-status-mineral">Great Basin Lithium Prototype</div>
          <div class="pdt-status-desc">Our first model predicts lithium across the Great Basin, but only to within 1x1 km cells. It is not finished and not precise enough for mining companies to use yet. It is the base the finer models build on.</div>
          <div class="pdt-status-timeline">Now</div>
          <div class="pdt-status-badge live">Prototype</div>
        </div>

        <div class="pdt-status-row">
          <div class="pdt-status-dot active"></div>
          <div class="pdt-status-mineral">Finer Models · Down to 1x1 m</div>
          <div class="pdt-status-desc">A series of models, each finer than the last, adding borehole logs from water wells, oil and gas wells and lithium drilling. The goal is predictions precise enough to place an individual borehole.</div>
          <div class="pdt-status-timeline">In progress</div>
          <div class="pdt-status-badge active">In Dev</div>
        </div>

        <div class="pdt-status-row">
          <div class="pdt-status-dot soon"></div>
          <div class="pdt-status-mineral">Field Testing</div>
          <div class="pdt-status-desc">Testing predictions on the ground against real boreholes and feeding the results back in, until the model is accurate enough to sell.</div>
          <div class="pdt-status-timeline">Next</div>
          <div class="pdt-status-badge soon">Planned</div>
        </div>

        <div class="pdt-status-row">
          <div class="pdt-status-dot soon"></div>
          <div class="pdt-status-mineral">Software Platform</div>
          <div class="pdt-status-desc">The interface geoscientist teams will use to import survey data and review ranked drill targets, a 3D visualization, a heat map and other geoanalysis tools.</div>
          <div class="pdt-status-timeline">To build</div>
          <div class="pdt-status-badge soon">Planned</div>
        </div>

        <div class="pdt-status-row">
          <div class="pdt-status-dot future"></div>
          <div class="pdt-status-mineral">Other Minerals</div>
          <div class="pdt-status-desc">Models for nickel, cobalt, gold and silver, the minerals our customers search for alongside lithium.</div>
          <div class="pdt-status-timeline">Later</div>
          <div class="pdt-status-badge future">Future</div>
        </div>

      </div>

      <div class="pdt-flow xr-reveal">
        <div class="pdt-flow-head">How it will work</div>
        <div class="pdt-flow-steps">
          <div class="pdt-flow-step"><span>01</span><strong>Import survey data</strong><small>Your geoscientist team brings in the survey and drill data it already has.</small></div>
          <div class="pdt-flow-arrow" aria-hidden="true">→</div>
          <div class="pdt-flow-step"><span>02</span><strong>The model scores your ground</strong><small>It weighs your data together with our cleaned geological datasets.</small></div>
          <div class="pdt-flow-arrow" aria-hidden="true">→</div>
          <div class="pdt-flow-step"><span>03</span><strong>Review ranked drill targets</strong><small>Explore them on a 3D visualization and heat map, with other geoanalysis tools.</small></div>
        </div>
        <a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>" class="xr-btn xr-btn-outline" style="margin-top:28px;display:inline-flex;">Follow our progress <span class="xr-arrow">→</span></a>
      </div>
    </div>
  </section>

  <!-- ═══════════════ CTA ═══════════════ -->
  <section class="pdt-cta">
    <div class="pdt-cta-inner">
      <span class="xr-reveal xr-eyebrow" style="justify-content:center;margin-bottom:18px;"><span class="xr-eyebrow-hex"></span>Get Started</span>
      <h2 class="xr-reveal pdt-cta-h">Know where to drill<br>before you spend a <span class="gold">dollar.</span></h2>
      <p class="xr-reveal xr-d2">We're building toward drill targets precise enough for a single borehole. Get in touch to follow our progress or help shape the platform.</p>
      <div class="xr-reveal xr-d3" style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
        <a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>" class="xr-btn xr-btn-gold">Learn More</a>
        <a href="mailto:info@xraygeoanalytics.com" class="xr-btn xr-btn-outline">Email us directly <span class="xr-arrow">→</span></a>
      </div>
    </div>
  </section>

  <?php xray_site_footer(); ?>

    <?php
});
