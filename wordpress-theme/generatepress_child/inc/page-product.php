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
      <a href="/" class="xr-brand"><img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics"><span class="xr-brand-wordmark">X-Ray <span class="accent">Geoanalytics</span></span></a>
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
            <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>The X-Ray Platform · Nevada Lithium</span>
          </div>
          <h1>
            <span class="pdt-hw"><span class="pdt-hw-inner">A</span></span>&#32;<span class="pdt-hw"><span class="pdt-hw-inner">model</span></span>&#32;<span class="pdt-hw"><span class="pdt-hw-inner">that</span></span><br>
            <span class="pdt-hw"><span class="pdt-hw-inner gold">learns.</span></span>&#32;<span class="pdt-hw"><span class="pdt-hw-inner gold"></span></span><br>
           
          </h1>
          <p class="pdt-lede">Greenfield exploration has slowed significantly in recent years, largely because most undiscovered deposits are becoming increasingly harder to find. To combat this, we are building models that learn new mineralization patterns by integrating geochemistry, geophysics, and structural data into a unified feature set. We train our model on confirmed deposits and validate it under spatial cross-validation. Every prediction comes with quantified uncertainty and the geological reasoning behind it. Every drilled result feeds back into the model, improving its accuracy. And the best part is, we don't share your improved model with anyone else.</p>
          <div class="pdt-cta-row">
            <a href="request-demo" class="xr-btn xr-btn-gold">Request Demo</a>
            <a href="how-it-works" class="xr-btn xr-btn-outline">How It Works <span class="xr-arrow">→</span></a>
          </div>
          <div class="pdt-hero-stats">
            <div class="pdt-stat-item">
              <span class="pdt-stat-num">94%</span>
              <span class="pdt-stat-label">Top target confidence</span>
            </div>
            <div class="pdt-stat-item">
              <span class="pdt-stat-num sky">Hours</span>
              <span class="pdt-stat-label">Not months</span>
            </div>
            <div class="pdt-stat-item">
              <span class="pdt-stat-num">$25K</span>
              <span class="pdt-stat-label">Annual vs $150-200K/study</span>
            </div>
          </div>
        </div>

        <!-- Right: ranked output panel -->
        <div class="pdt-output-panel" id="pdt-op">
          <div class="pdt-op-header">
            <div class="pdt-op-header-left">
              <div class="pdt-op-run">Nevada Basin · Run-NV-047</div>
              <div class="pdt-op-meta">94 parcels scored · 18,400 km² AOI · 2h 14m ago</div>
            </div>
            <div class="pdt-op-badge">Live · NV-Li-001</div>
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
            <span class="pdt-op-zone">NV-7B</span>
            <div class="pdt-op-bar-wrap"><div class="pdt-op-bar"><div class="pdt-op-bar-fill" data-w="94"></div></div></div>
            <span class="pdt-op-pct">94%</span>
            <span class="pdt-op-conf">HIGH CONF</span>
          </div>
          <div class="pdt-op-row top" data-fill="87">
            <span class="pdt-op-rank">02</span>
            <span class="pdt-op-zone">NV-12A</span>
            <div class="pdt-op-bar-wrap"><div class="pdt-op-bar"><div class="pdt-op-bar-fill" data-w="87"></div></div></div>
            <span class="pdt-op-pct">87%</span>
            <span class="pdt-op-conf">HIGH CONF</span>
          </div>
          <div class="pdt-op-row sky">
            <span class="pdt-op-rank">03</span>
            <span class="pdt-op-zone">NV-3C</span>
            <div class="pdt-op-bar-wrap"><div class="pdt-op-bar"><div class="pdt-op-bar-fill" data-w="71"></div></div></div>
            <span class="pdt-op-pct">71%</span>
            <span class="pdt-op-conf">MODERATE</span>
          </div>
          <div class="pdt-op-row sky">
            <span class="pdt-op-rank">04</span>
            <span class="pdt-op-zone">NV-8D</span>
            <div class="pdt-op-bar-wrap"><div class="pdt-op-bar"><div class="pdt-op-bar-fill" data-w="63"></div></div></div>
            <span class="pdt-op-pct">63%</span>
            <span class="pdt-op-conf">MODERATE</span>
          </div>
          <div class="pdt-op-row">
            <span class="pdt-op-rank" style="color:rgba(255,255,255,.18);">05</span>
            <span class="pdt-op-zone" style="color:rgba(255,255,255,.25);">NV-4F</span>
            <div class="pdt-op-bar-wrap"><div class="pdt-op-bar"><div class="pdt-op-bar-fill" style="background:rgba(255,255,255,.18);" data-w="48"></div></div></div>
            <span class="pdt-op-pct" style="color:rgba(255,255,255,.28);">48%</span>
            <span class="pdt-op-conf">LOW CONF</span>
          </div>
          <div class="pdt-op-footer">
            <span class="pdt-op-footer-txt">4 high-confidence targets · 40.8°N 118.0°W</span>
            <a href="how-it-works" class="pdt-op-view-all">View all 94 →</a>
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
        <p>The mineral exploration market hasn't changed in decades. Expensive, slow, and static. We built the alternative.</p>
      </div>
      <div class="pdt-cmp-grid xr-reveal">

        <!-- Traditional column -->
        <div class="pdt-cmp-col">
          <div class="pdt-cmp-head">
            <div class="pdt-cmp-head-icon">
              <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <span class="pdt-cmp-head-title">Traditional Consultants</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Turnaround</span>
            <span class="pdt-cmp-val">1 – 3 months</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Cost</span>
            <span class="pdt-cmp-val">$100 – 250K / study</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Learning</span>
            <span class="pdt-cmp-val">Static deliverable</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Output</span>
            <span class="pdt-cmp-val">Expert interpretation</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Access</span>
            <span class="pdt-cmp-val">Calendar bottleneck</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Explainability</span>
            <span class="pdt-cmp-val">Additional interpretation from mining company required</span>
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
            <span class="pdt-cmp-label">Turnaround</span>
            <span class="pdt-cmp-val">Less than a month</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Cost</span>
            <span class="pdt-cmp-val">Negotiated per project/mineral</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Learning</span>
            <span class="pdt-cmp-val">Sharpens every drill cycle</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Output</span>
            <span class="pdt-cmp-val">Ranked prospectivity report</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Access</span>
            <span class="pdt-cmp-val">Securely upload data and we take care of the rest</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Explainability</span>
            <span class="pdt-cmp-val">Easily understandable in-depth analysis and reasoning per target with satelite mapping</span>
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
        <h2>Three inputs. One model.<br>Drill-ready output.</h2>
        <p>The X-Ray platform is a closed loop — data goes in, ranked targets come out, drill results feed back in. The model compounds with every campaign.</p>
      </div>

      <div class="pdt-arch-flow">

        <!-- Step 1: Input -->
        <div class="pdt-arch-card gold">
          <div class="pdt-arch-card-num">01 · Input</div>
          <div class="pdt-arch-icon">
            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="4"/><rect x="3" y="9.5" width="18" height="4"/><rect x="3" y="16" width="18" height="4"/></svg>
          </div>
          <h3 class="pdt-arch-h">Connect your unprocessed data</h3>
          <p class="pdt-arch-p">Securely upload any combination of geochemistry grids, aeromagnetic surveys, remote sensing, structural mapping, etc. No preprocessing required — the platform auto-aligns datasets to a common spatial reference.</p>
          <div class="pdt-arch-bullets">
            <div class="pdt-arch-bullet">Geochemistry (soil, rock, stream sed)</div>
            <div class="pdt-arch-bullet">Aeromagnetics &amp; gravity</div>
            <div class="pdt-arch-bullet">ASTER / EMIT remote sensing</div>
            <div class="pdt-arch-bullet">Structural / mapping overlays</div>
          </div>
        </div>

        <div class="pdt-arch-arrow" aria-hidden="true">→</div>

        <!-- Step 2: Training -->
        <div class="pdt-arch-card mid">
          <div class="pdt-arch-card-num">02 · Training</div>
          <div class="pdt-arch-icon">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07M8.46 8.46a5 5 0 0 0 0 7.07"/></svg>
          </div>
          <h3 class="pdt-arch-h">X-Ray individual model training</h3>
          <p class="pdt-arch-p">We process and upload the data to a private, company-specific cross-validation model to train it. Then we run the machine learning algorithm to generate targets backed by geological reasoning and build a detailed report with both geoscientists and mining executives in mind.</p>
          <div class="pdt-arch-bullets">
            <div class="pdt-arch-bullet">Company data is kept private from the beginning</div>
            <div class="pdt-arch-bullet">Deposit-anchored inference (not generic ML)</div>
            <div class="pdt-arch-bullet">Signal attribution layer per target</div>
            <div class="pdt-arch-bullet">Compound learning on drill outcomes</div>
          </div>
        </div>

        <div class="pdt-arch-arrow" aria-hidden="true">→</div>

        <!-- Step 3: Output -->
        <div class="pdt-arch-card sky">
          <div class="pdt-arch-card-num">03 · Output</div>
          <div class="pdt-arch-icon">
            <svg viewBox="0 0 24 24"><polygon points="4 21 9 21 9 8 4 8"/><polygon points="11 21 16 21 16 4 11 4"/><polygon points="18 21 22 21 22 13 18 13"/></svg>
          </div>
          <h3 class="pdt-arch-h">Ranked targets, ready to drill</h3>
          <p class="pdt-arch-p">We look at your specific area of interest and localize the report for easy interpretation, building a heatmap to display areas within the scope with high mineralization probability. Each target includes plain-language rationale and the specific signals driving its score.</p>
          <div class="pdt-arch-bullets">
            <div class="pdt-arch-bullet">Ranked list with confidence intervals</div>
            <div class="pdt-arch-bullet">Plain-language explanation per target</div>
            <div class="pdt-arch-bullet">GeoTIFF export for GIS integration</div>
            <div class="pdt-arch-bullet">PDF drill target report (client-ready)</div>
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
        <h2>The Nevada lithium<br>proof of concept.</h2>
        <p>The first X-Ray model targets lithium in Nevada's Basin and Range province — the same geology driving the Thacker Pass mine. Internal validation completed May 2026.</p>
      </div>

      <div class="pdt-proof-grid">
        <div class="pdt-proof-stat">
          <div class="pdt-proof-stat-eyebrow">Top target confidence</div>
          <div class="pdt-proof-stat-num">94%</div>
          <div class="pdt-proof-stat-label">Zone NV-7B — Thacker Pass Adjacent. Aeromagnetic low coincident with elevated Li claystone indicators.</div>
        </div>
        <div class="pdt-proof-stat">
          <div class="pdt-proof-stat-eyebrow">Avg precision · top-10 targets</div>
          <div class="pdt-proof-stat-num sky">87%</div>
          <div class="pdt-proof-stat-label">Average confidence across the top 10 ranked parcels in the Nevada Basin AOI. Validated against USGS ground data.</div>
        </div>
        <div class="pdt-proof-stat">
          <div class="pdt-proof-stat-eyebrow">Turnaround · full AOI run</div>
          <div class="pdt-proof-stat-num">2.2h</div>
          <div class="pdt-proof-stat-label">18,400 km² AOI. 94 parcels scored. From data upload to ranked output — under 3 hours including signal attribution.</div>
        </div>
      </div>

      <div class="pdt-proof-quote xr-reveal" style="margin-top:2px;">
        <blockquote>"The Nevada model correctly identified Zone NV-7B as the highest-probability lithium target in the Thacker Pass Adjacent region. Ground survey confirmed elevated Li-bearing claystones at depth consistent with Basin and Range extension zone predictions."</blockquote>
        <cite>Internal Validation Report · X-Ray Geoanalytics · June 2025</cite>
      </div>
    </div>
  </section>

  <!-- ═══════════════ STATUS BOARD ═══════════════ -->
  <section class="pdt-status-sec">
    <div class="xr-container">
      <div class="pdt-status-intro xr-reveal">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Development Status</span>
        <h2>Where we are today.</h2>
        <p>We are pre-launch. The Nevada lithium model is in active development; the self-serve platform UI is being built around it; pilot customers onboard at launch.</p>
      </div>

      <div class="pdt-status-board">

        <div class="pdt-status-row">
          <div class="pdt-status-dot live"></div>
          <div class="pdt-status-mineral">Nevada Lithium Model</div>
          <div class="pdt-status-desc">Targeting 94k km² across Nevada's Basin and Range. 94 active parcels scored at 15-km grid resolution. Compound-learning on pilot drill results in real time.</div>
          <div class="pdt-status-timeline">Active · Pilot</div>
          <div class="pdt-status-badge live">Active</div>
        </div>

        <div class="pdt-status-row">
          <div class="pdt-status-dot active"></div>
          <div class="pdt-status-mineral">Self-serve Platform UI</div>
          <div class="pdt-status-desc">Data upload, AOI configuration, target report generation — all through the platform, no calendar bottleneck, no data export. Pilot customers onboard at launch.</div>
          <div class="pdt-status-timeline">Q3 2026</div>
          <div class="pdt-status-badge active">In Dev</div>
        </div>

        <div class="pdt-status-row">
          <div class="pdt-status-dot soon"></div>
          <div class="pdt-status-mineral">Copper, Rare Earths &amp; Gold</div>
          <div class="pdt-status-desc">Additional commodity models joining the library after Nevada lithium. Same fusion architecture, deposit-anchored weights trained per-mineral.</div>
          <div class="pdt-status-timeline">Q4 2026</div>
          <div class="pdt-status-badge soon">Planned</div>
        </div>

        <div class="pdt-status-row">
          <div class="pdt-status-dot future"></div>
          <div class="pdt-status-mineral">Deep Sea &amp; Lunar Models</div>
          <div class="pdt-status-desc">Extending the fusion architecture to sub-sea nodule provinces and eventually lunar resource mapping. Same platform, different training domains.</div>
          <div class="pdt-status-timeline">2027 +</div>
          <div class="pdt-status-badge future">Future</div>
        </div>

      </div>

      <div class="xr-reveal" style="margin-top:44px;">
        <p style="color:var(--xr-text-muted);font-size:14px;max-width:58ch;line-height:1.7;">At launch we ship a single tier — <strong style="color:var(--xr-text);">Explorer at $25K / year</strong>. Operator and Enterprise tiers follow once they become commercially viable.</p>
        <a href="pricing" class="xr-btn xr-btn-outline" style="margin-top:20px;display:inline-flex;">View pricing plans <span class="xr-arrow">→</span></a>
      </div>
    </div>
  </section>

  <!-- ═══════════════ CTA ═══════════════ -->
  <section class="pdt-cta">
    <div class="pdt-cta-inner">
      <span class="xr-reveal xr-eyebrow" style="justify-content:center;margin-bottom:18px;"><span class="xr-eyebrow-hex"></span>Get Started</span>
      <h2 class="xr-reveal pdt-cta-h">Know where to drill<br>before you spend a <span class="gold">dollar.</span></h2>
      <p class="xr-reveal xr-d2">Get on the list. The Nevada lithium model launches to pilot exploration teams shortly — spots are limited.</p>
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
          <div class="xr-footer-brand"><img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics"><span>X-Ray Geoanalytics</span></div>
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
