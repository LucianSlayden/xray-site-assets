<?php
/**
 * Moved from Code Snippets #15 "How It Works page".
 */

add_action( 'generate_before_content', function () {
	if ( ! is_page( 'how-it-works' ) ) return;
	$hero_bg = 'https://xraygeoanalytics.com/wp-content/uploads/2026/05/mj4-landscape.png';
	?>
<style>
/* HIW — GeneratePress wrapper resets.
   .grid-container/.grid-parent are scoped to #content because GP also uses
   those classes on the site-header inner wrapper — leaving them unscoped
   strips the header background and hides the nav. */
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
</style>

<nav class="xr-nav">
  <div class="xr-nav-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="xr-brand">
      <img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics">
      <span class="xr-brand-wordmark">X-Ray <span class="accent">Geoanalytics</span></span>
    </a>
    <div class="xr-nav-list">
      <div class="xr-nav-item">
        <button class="xr-nav-btn" style="color:var(--xr-gold);">Product<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/product/' ) ); ?>">Product Overview</a>
          <a href="<?php echo esc_url( home_url( '/our-models/' ) ); ?>">Our Models</a>
          <a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>">Industries</a>
          <a href="<?php echo esc_url( home_url( '/platform/' ) ); ?>">Platform</a>
          <a href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>" style="color:var(--xr-gold);">How it Works</a>
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
    <a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">Resources</a>
    <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">Investors</a>
    <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a>
    <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a>
    <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">Why X-Ray</a>
    <a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a>
    <a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">FAQs</a>
    <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request Demo</a>
  </div>
</nav>

<canvas id="hiw-canvas" aria-hidden="true"></canvas>
<div id="hiw-veil" aria-hidden="true"></div>

<section class="hiw-hero">
  <div class="hiw-hero-bg" style="background-image:url('<?php echo esc_url( $hero_bg ); ?>');"></div>
  <div class="hiw-fog hiw-fog-left"></div>
  <div class="hiw-fog hiw-fog-top"></div>
  <div class="hiw-fog hiw-fog-bottom"></div>
  <div class="xr-container" style="position:relative;z-index:3;width:100%;">
    <div class="hiw-hero-inner">
      <div class="hiw-eyebrow-wrap">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>How It Works &middot; 4 Steps</span>
      </div>
      <h1>
        <span class="hiw-hw"><span class="hiw-hw-inner">From</span></span>&#32;<span class="hiw-hw"><span class="hiw-hw-inner">raw</span></span>&#32;<span class="hiw-hw"><span class="hiw-hw-inner">data</span></span>&#32;<span class="hiw-hw"><span class="hiw-hw-inner">to</span></span><br>
        <span class="hiw-hw"><span class="hiw-hw-inner gold">ranked</span></span>&#32;<span class="hiw-hw"><span class="hiw-hw-inner gold">drill</span></span>&#32;<span class="hiw-hw"><span class="hiw-hw-inner gold">targets</span></span><br>
        <span class="hiw-hw"><span class="hiw-hw-inner">in</span></span>&#32;<span class="hiw-hw"><span class="hiw-hw-inner">hours.</span></span>
      </h1>
      <p class="hiw-lede">The X-Ray workflow is designed for geoscientists, not data engineers. You bring the domain expertise. We handle the data fusion and machine learning.</p>
      <div class="hiw-cta-wrap">
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">See it in a live demo</a>
      </div>
    </div>
  </div>
</section>

<div class="hiw-steps">

  <div class="hiw-steps-intro">
    <div class="xr-container">
      <div class="xr-reveal">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>The Workflow</span>
        <h2 style="margin-top:16px;font-size:clamp(30px,4vw,50px);letter-spacing:-.024em;">Connect. Run. Receive. Refine.</h2>
        <p style="color:var(--xr-text-2);font-size:17px;line-height:1.72;max-width:62ch;margin:14px 0 0;">Four steps from geological data to a prioritised drill programme &mdash; automated, explainable, and sharper with every cycle.</p>
      </div>
    </div>
  </div>

  <!-- Step 1 -->
  <section class="hiw-step">
    <div class="xr-container">
      <div class="hiw-step-hdr">
        <div class="hiw-step-num">01</div>
        <div class="hiw-step-hdr-rule"></div>
        <div class="hiw-step-hdr-tag">Step One &middot; Connect</div>
      </div>
      <div class="hiw-step-grid">
        <div class="hiw-step-body xr-reveal">
          <div class="hiw-step-meta-row">
            <div class="hiw-step-label">Step One</div>
            <div class="hiw-step-title">Connect your data</div>
          </div>
          <p>Upload your proprietary datasets &mdash; drill results, geophysical surveys, assay data, historical reports &mdash; in any common format. Our ingestion layer handles CRS reconciliation, unit normalization, and coverage mapping automatically.</p>
          <p>If you don&rsquo;t have proprietary data yet, no problem. We pre-load your region of interest with public USGS, state survey, and satellite data so you start with a rich baseline.</p>
          <div class="hiw-step-chips">
            <span class="hiw-chip">CSV / XLS assay tables</span>
            <span class="hiw-chip">GeoTIFF / Shapefile</span>
            <span class="hiw-chip">LAS point clouds</span>
            <span class="hiw-chip">PDF report parsing</span>
          </div>
        </div>
        <div class="hiw-panel">
          <div class="hiw-panel-label">What you bring</div>
          <div class="hiw-bullets" style="margin-bottom:22px;">
            <div class="hiw-bullet"><span class="hiw-bullet-dot"></span><span>Historical drill hole logs and assay results</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot"></span><span>Any geophysical surveys you&rsquo;ve already run</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot"></span><span>Proprietary mapping or structural interpretations</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot sky"></span><span>Region of interest (bounding box or polygon)</span></div>
          </div>
          <hr style="border:none;border-top:1px solid rgba(255,255,255,.07);margin:0 0 18px;">
          <div class="hiw-panel-label sky" style="margin-bottom:14px;">What we add automatically</div>
          <div class="hiw-bullets">
            <div class="hiw-bullet"><span class="hiw-bullet-dot sky"></span><span style="color:var(--xr-text-muted);">USGS geochemistry, aeromagnetics, gravity</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot sky"></span><span style="color:var(--xr-text-muted);">Sentinel-2 + ASTER satellite imagery</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot sky"></span><span style="color:var(--xr-text-muted);">SRTM terrain + GTOPO30 elevation</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Step 2 -->
  <section class="hiw-step">
    <div class="xr-container">
      <div class="hiw-step-hdr">
        <div class="hiw-step-num">02</div>
        <div class="hiw-step-hdr-rule"></div>
        <div class="hiw-step-hdr-tag">Step Two &middot; Run</div>
      </div>
      <div class="hiw-step-grid">
        <div class="hiw-panel">
          <div class="hiw-panel-label">Model execution timeline</div>
          <div class="hiw-timeline">
            <div class="hiw-tl-step">
              <div class="hiw-tl-bubble">1</div>
              <div><div class="hiw-tl-label">Data validation &amp; normalization</div><div class="hiw-tl-time">~5 min</div></div>
            </div>
            <div class="hiw-tl-step">
              <div class="hiw-tl-bubble">2</div>
              <div><div class="hiw-tl-label">Multi-modal spatial fusion</div><div class="hiw-tl-time">~15&ndash;30 min (scales with area)</div></div>
            </div>
            <div class="hiw-tl-step">
              <div class="hiw-tl-bubble">3</div>
              <div><div class="hiw-tl-label">ML inference (ensemble)</div><div class="hiw-tl-time">~10&ndash;20 min</div></div>
            </div>
            <div class="hiw-tl-step">
              <div class="hiw-tl-bubble sky">4</div>
              <div><div class="hiw-tl-label">Report generation &amp; delivery</div><div class="hiw-tl-time">~5 min</div></div>
            </div>
          </div>
          <div style="margin-top:18px;padding:12px 16px;background:var(--xr-deep);border-radius:2px;display:flex;align-items:center;gap:12px;border:1px solid rgba(232,185,99,.14);">
            <span class="xr-pulse-dot"></span>
            <span style="color:var(--xr-text);font-size:13.5px;font-family:var(--xr-font-mono);">Total: <strong style="color:var(--xr-gold);">under 1 hour</strong> for a 5,000 km&sup2; AOI</span>
          </div>
        </div>
        <div class="hiw-step-body xr-reveal">
          <div class="hiw-step-meta-row">
            <div class="hiw-step-label">Step Two</div>
            <div class="hiw-step-title">Model runs</div>
          </div>
          <p>Once your data is validated and loaded, the pipeline runs automatically. The fusion layer aligns all spatial data to a common grid. The inference layer scores each cell in your area of interest against confirmed deposit signatures for your target mineral.</p>
          <p>No configuration required. No model parameters to tune. The system selects the appropriate mineral-specific model and weights based on your project settings.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Step 3 -->
  <section class="hiw-step">
    <div class="xr-container">
      <div class="hiw-step-hdr">
        <div class="hiw-step-num">03</div>
        <div class="hiw-step-hdr-rule"></div>
        <div class="hiw-step-hdr-tag">Step Three &middot; Receive</div>
      </div>
      <div class="hiw-step-grid">
        <div class="hiw-step-body xr-reveal">
          <div class="hiw-step-meta-row">
            <div class="hiw-step-label">Step Three</div>
            <div class="hiw-step-title">Ranked targets delivered</div>
          </div>
          <p>Results arrive as a ranked probability map &mdash; every cell in your AOI scored from 0 to 100. High-confidence targets are called out as discrete drill locations with supporting rationale in plain language.</p>
          <p>Every target includes the top contributing data signals &mdash; so your geoscientists can interrogate the recommendation, not just accept it.</p>
          <div class="hiw-bullets" style="margin-top:18px;">
            <div class="hiw-bullet"><span class="hiw-bullet-dot"></span><span>Interactive probability map (web viewer)</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot"></span><span>Exportable GeoTIFF for GIS import</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot"></span><span>Natural-language drill target report (PDF)</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot sky"></span><span>Signal attribution per target (explainability)</span></div>
          </div>
        </div>
        <div class="hiw-panel">
          <div class="hiw-panel-label">Sample output &middot; Target #1</div>
          <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:14px;margin-bottom:18px;">
            <div>
              <div style="color:var(--xr-text);font-weight:700;font-size:15px;letter-spacing:-.01em;margin-bottom:4px;">Zone NV-7B &middot; Thacker Pass Adj.</div>
              <div style="font-family:var(--xr-font-mono);color:var(--xr-text-muted);font-size:11.5px;letter-spacing:.02em;">40.8372&deg;N, 118.0291&deg;W &middot; ~120 km&sup2;</div>
            </div>
            <div class="hiw-score-badge">94%</div>
          </div>
          <p style="color:var(--xr-text-2);font-size:12.5px;line-height:1.72;margin:0 0 18px;">High aeromagnetic low coincident with elevated Li-bearing claystone indicators in ASTER SWIR. Geochemical anomaly in USGS grid exceeds 3&sigma; above regional background.</p>
          <div style="display:flex;flex-direction:column;gap:10px;">
            <div class="hiw-signal-row">
              <span style="color:var(--xr-text-muted);font-size:11px;font-family:var(--xr-font-mono);min-width:120px;">Geochemistry</span>
              <div class="hiw-signal-bar"><div class="hiw-signal-fill" style="width:87%"></div></div>
              <span style="font-family:var(--xr-font-mono);color:var(--xr-gold);font-size:11.5px;font-weight:700;min-width:34px;text-align:right;">87%</span>
            </div>
            <div class="hiw-signal-row">
              <span style="color:var(--xr-text-muted);font-size:11px;font-family:var(--xr-font-mono);min-width:120px;">Geophysics</span>
              <div class="hiw-signal-bar"><div class="hiw-signal-fill" style="width:91%"></div></div>
              <span style="font-family:var(--xr-font-mono);color:var(--xr-gold);font-size:11.5px;font-weight:700;min-width:34px;text-align:right;">91%</span>
            </div>
            <div class="hiw-signal-row">
              <span style="color:var(--xr-text-muted);font-size:11px;font-family:var(--xr-font-mono);min-width:120px;">Remote sensing</span>
              <div class="hiw-signal-bar"><div class="hiw-signal-fill sky" style="width:78%"></div></div>
              <span style="font-family:var(--xr-font-mono);color:var(--xr-sky);font-size:11.5px;font-weight:700;min-width:34px;text-align:right;">78%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Step 4 -->
  <section class="hiw-step">
    <div class="xr-container">
      <div class="hiw-step-hdr">
        <div class="hiw-step-num sky">04</div>
        <div class="hiw-step-hdr-rule sky"></div>
        <div class="hiw-step-hdr-tag sky">Step Four &middot; Refine</div>
      </div>
      <div class="hiw-step-grid">
        <div class="hiw-panel sky-border">
          <div class="hiw-panel-label sky">Feedback loop &middot; how the model improves</div>
          <div class="hiw-fb">
            <div class="hiw-fb-item">
              <div class="hiw-fb-hex">A</div>
              <div>
                <div class="hiw-fb-title">You drill the ranked targets</div>
                <div class="hiw-fb-desc">Drill the locations X-Ray recommended. Record results &mdash; hit, miss, grade, depth.</div>
              </div>
            </div>
            <div class="hiw-fb-item">
              <div class="hiw-fb-hex">B</div>
              <div>
                <div class="hiw-fb-title">Return results to X-Ray</div>
                <div class="hiw-fb-desc">Upload drill logs via the platform or our data import API. Results are added to your workspace only.</div>
              </div>
            </div>
            <div class="hiw-fb-item">
              <div class="hiw-fb-hex">C</div>
              <div>
                <div class="hiw-fb-title">Model fine-tunes on your outcomes</div>
                <div class="hiw-fb-desc">Each confirmed hit or miss updates feature weights in your mineral model. The next run is more precise. The more you drill, the smarter it gets.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="hiw-step-body xr-reveal">
          <div class="hiw-step-meta-row">
            <div class="hiw-step-label sky">Step Four</div>
            <div class="hiw-step-title">You drill. We learn.</div>
          </div>
          <p>Every exploration campaign generates ground truth. X-Ray closes the loop &mdash; using your drill outcomes to refine the model for your next campaign. No two clients&rsquo; models evolve the same way.</p>
          <p>This compound learning effect means the X-Ray platform becomes uniquely valuable to your company over time &mdash; not a commodity tool any competitor can replicate by switching vendors.</p>
          <a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>" class="xr-btn xr-btn-outline" style="margin-top:8px;display:inline-flex;">See pricing plans <span class="xr-arrow">&rarr;</span></a>
        </div>
      </div>
    </div>
  </section>

</div><!-- /hiw-steps -->

<section class="hiw-cta">
  <div class="hiw-cta-inner">
    <span class="xr-reveal xr-eyebrow" style="justify-content:center;margin-bottom:18px;"><span class="xr-eyebrow-hex"></span>Get Started</span>
    <h2 class="xr-reveal xr-d1">Ready to run your first analysis?</h2>
    <p class="xr-reveal xr-d2">Schedule a demo and we&rsquo;ll walk through the full workflow on a real dataset for your region and target mineral.</p>
    <div class="xr-reveal xr-d3" style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request a Demo</a>
      <a href="<?php echo esc_url( home_url( '/platform/' ) ); ?>" class="xr-btn xr-btn-outline">Platform details <span class="xr-arrow">&rarr;</span></a>
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
