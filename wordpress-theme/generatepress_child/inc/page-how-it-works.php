<?php
/**
 * Moved from Code Snippets #15 "How It Works page".
 */

add_action( 'generate_before_content', function () {
	if ( ! is_page( 'how-it-works' ) ) return;
	$hero_bg = 'https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/mj4-landscape.webp';
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

<?php xray_site_nav(); ?>

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
        <span class="hiw-hw"><span class="hiw-hw-inner">in</span></span>&#32;<span class="hiw-hw"><span class="hiw-hw-inner">one</span></span>&#32;<span class="hiw-hw"><span class="hiw-hw-inner">platform.</span></span>
      </h1>
      <p class="hiw-lede">The X-Ray workflow is built for geologists at junior explorers, not data engineers. You bring the exploration data and the domain expertise. We handle the data cleaning and the machine learning.</p>
      <div class="hiw-cta-wrap">
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request a demo</a>
      </div>
    </div>
  </div>
</section>

<div class="hiw-steps">

  <div class="hiw-steps-intro">
    <div class="xr-container">
      <div class="xr-reveal">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>The Workflow</span>
        <h2 style="margin-top:16px;font-size:clamp(30px,4vw,50px);letter-spacing:-.024em;">Upload. Run. Receive. Update.</h2>
        <p style="color:var(--xr-text-2);font-size:17px;line-height:1.72;max-width:62ch;margin:14px 0 0;">Four steps from your exploration data to a ranked list of drill targets, so you drill fewer holes before you make a discovery.</p>
      </div>
    </div>
  </div>

  <!-- Step 1 -->
  <section class="hiw-step">
    <div class="xr-container">
      <div class="hiw-step-hdr">
        <div class="hiw-step-num">01</div>
        <div class="hiw-step-hdr-rule"></div>
        <div class="hiw-step-hdr-tag">Step One &middot; Upload</div>
      </div>
      <div class="hiw-step-grid">
        <div class="hiw-step-body xr-reveal">
          <div class="hiw-step-meta-row">
            <div class="hiw-step-label">Step One</div>
            <div class="hiw-step-title">Upload your data</div>
          </div>
          <p>Upload the exploration data your team has already collected: drill results, geochemistry, geophysical surveys and mapping. It is used only for your own predictions and never to train other customers&rsquo; models.</p>
          <p>Not much data of your own yet? Our models already run on decades of public geological data that we have cleaned and sorted, covering the whole Great Basin.</p>
          <div class="hiw-step-chips">
            <span class="hiw-chip">Drill logs</span>
            <span class="hiw-chip">Geochemistry</span>
            <span class="hiw-chip">Geophysical surveys</span>
            <span class="hiw-chip">Structural mapping</span>
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
            <div class="hiw-bullet"><span class="hiw-bullet-dot sky"></span><span style="color:var(--xr-text-muted);">Public geochemistry, geophysics and geothermal data</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot sky"></span><span style="color:var(--xr-text-muted);">Structural, lithology and topography data</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot sky"></span><span style="color:var(--xr-text-muted);">Our in-house lithium featuresets</span></div>
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
          <div class="hiw-panel-label">What happens in a run</div>
          <div class="hiw-timeline">
            <div class="hiw-tl-step">
              <div class="hiw-tl-bubble">1</div>
              <div><div class="hiw-tl-label">Data cleaning &amp; sorting</div><div class="hiw-tl-time">Your uploads + our public baseline</div></div>
            </div>
            <div class="hiw-tl-step">
              <div class="hiw-tl-bubble">2</div>
              <div><div class="hiw-tl-label">Feature engineering</div><div class="hiw-tl-time">Proprietary lithium featuresets</div></div>
            </div>
            <div class="hiw-tl-step">
              <div class="hiw-tl-bubble">3</div>
              <div><div class="hiw-tl-label">ML inference (ensemble)</div><div class="hiw-tl-time">XGBoost + LightGBM</div></div>
            </div>
            <div class="hiw-tl-step">
              <div class="hiw-tl-bubble sky">4</div>
              <div><div class="hiw-tl-label">Results delivered</div><div class="hiw-tl-time">Heat map + ranked targets</div></div>
            </div>
          </div>
          <div style="margin-top:18px;padding:12px 16px;background:var(--xr-deep);border-radius:2px;display:flex;align-items:center;gap:12px;border:1px solid rgba(232,185,99,.14);">
            <span class="xr-pulse-dot"></span>
            <span style="color:var(--xr-text);font-size:13.5px;font-family:var(--xr-font-mono);">Current resolution: <strong style="color:var(--xr-gold);">1x1 km cells</strong> across the Great Basin</span>
          </div>
        </div>
        <div class="hiw-step-body xr-reveal">
          <div class="hiw-step-meta-row">
            <div class="hiw-step-label">Step Two</div>
            <div class="hiw-step-title">Model runs</div>
          </div>
          <p>Once your data is loaded, the model scores each cell in your area of interest for lithium prospectivity. It is an ensemble of XGBoost and LightGBM models trained on known mine sites, geochemistry and mining-claim data, and checked with spatial block cross-validation.</p>
          <p>No model parameters to tune. Each model is trained for one commodity in one region, and on the Great Basin it has reached 95% recall and 80% precision on known lithium deposits.</p>
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
          <p>Results arrive as a prospectivity heat map of your area of interest and a ranked list of drill targets, with a 3D visualization of the area being targeted.</p>
          <p>Analysis tools let your geologists dig into each target and question the recommendation, not just accept it.</p>
          <div class="hiw-bullets" style="margin-top:18px;">
            <div class="hiw-bullet"><span class="hiw-bullet-dot"></span><span>Prospectivity heat map</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot"></span><span>Ranked list of drill targets</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot"></span><span>3D visualization of the target area</span></div>
            <div class="hiw-bullet"><span class="hiw-bullet-dot sky"></span><span>Analysis tools for your geologists</span></div>
          </div>
        </div>
        <div class="hiw-panel">
          <div class="hiw-panel-label">Example layout &middot; Target #1</div>
          <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:14px;margin-bottom:18px;">
            <div>
              <div style="color:var(--xr-text);font-weight:700;font-size:15px;letter-spacing:-.01em;margin-bottom:4px;">Target A &middot; Illustrative</div>
              <div style="font-family:var(--xr-font-mono);color:var(--xr-text-muted);font-size:11.5px;letter-spacing:.02em;">Not a real target &middot; 1x1 km cell</div>
            </div>
            <div class="hiw-score-badge">High</div>
          </div>
          <p style="color:var(--xr-text-2);font-size:12.5px;line-height:1.72;margin:0 0 18px;">How a ranked target is shown: its prospectivity score and the types of data that drive it.</p>
          <div style="display:flex;flex-direction:column;gap:10px;">
            <div class="hiw-signal-row">
              <span style="color:var(--xr-text-muted);font-size:11px;font-family:var(--xr-font-mono);min-width:120px;">Geochemistry</span>
              <div class="hiw-signal-bar"><div class="hiw-signal-fill" style="width:87%"></div></div>
              <span style="font-family:var(--xr-font-mono);color:var(--xr-gold);font-size:11.5px;font-weight:700;min-width:34px;text-align:right;">High</span>
            </div>
            <div class="hiw-signal-row">
              <span style="color:var(--xr-text-muted);font-size:11px;font-family:var(--xr-font-mono);min-width:120px;">Geophysics</span>
              <div class="hiw-signal-bar"><div class="hiw-signal-fill" style="width:91%"></div></div>
              <span style="font-family:var(--xr-font-mono);color:var(--xr-gold);font-size:11.5px;font-weight:700;min-width:34px;text-align:right;">High</span>
            </div>
            <div class="hiw-signal-row">
              <span style="color:var(--xr-text-muted);font-size:11px;font-family:var(--xr-font-mono);min-width:120px;">Structural</span>
              <div class="hiw-signal-bar"><div class="hiw-signal-fill sky" style="width:78%"></div></div>
              <span style="font-family:var(--xr-font-mono);color:var(--xr-sky);font-size:11.5px;font-weight:700;min-width:34px;text-align:right;">Med</span>
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
        <div class="hiw-step-hdr-tag sky">Step Four &middot; Update</div>
      </div>
      <div class="hiw-step-grid">
        <div class="hiw-panel sky-border">
          <div class="hiw-panel-label sky">Keep going &middot; how your predictions stay current</div>
          <div class="hiw-fb">
            <div class="hiw-fb-item">
              <div class="hiw-fb-hex">A</div>
              <div>
                <div class="hiw-fb-title">You drill the ranked targets</div>
                <div class="hiw-fb-desc">Choose from the ranked list and drill. Record what you find.</div>
              </div>
            </div>
            <div class="hiw-fb-item">
              <div class="hiw-fb-hex">B</div>
              <div>
                <div class="hiw-fb-title">Upload results to X-Ray</div>
                <div class="hiw-fb-desc">Add new drill data to the platform as you get it. It is used for your predictions only.</div>
              </div>
            </div>
            <div class="hiw-fb-item">
              <div class="hiw-fb-hex">C</div>
              <div>
                <div class="hiw-fb-title">Your predictions update</div>
                <div class="hiw-fb-desc">Your next decision on where to drill is made with the latest data from your own ground.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="hiw-step-body xr-reveal">
          <div class="hiw-step-meta-row">
            <div class="hiw-step-label sky">Step Four</div>
            <div class="hiw-step-title">You drill. You upload. You decide.</div>
          </div>
          <p>Keep uploading your drilling data and make quick, informed decisions on where to drill next. Your data is compartmentalized: it is never used to train other customers&rsquo; models.</p>
          <p>Over time this cuts the number of drill holes you need before a discovery, saving time and money on every project.</p>
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
    <p class="xr-reveal xr-d2">Request a demo and we&rsquo;ll walk you through the full workflow and the Great Basin lithium model.</p>
    <div class="xr-reveal xr-d3" style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request a Demo</a>
      <a href="<?php echo esc_url( home_url( '/platform/' ) ); ?>" class="xr-btn xr-btn-outline">Platform details <span class="xr-arrow">&rarr;</span></a>
    </div>
  </div>
</section>

<?php xray_site_footer(); ?>
	<?php
} );
