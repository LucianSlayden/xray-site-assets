<?php
/**
 * Moved from Code Snippets #17 "XRay — Investors Page HTML".
 */

add_action( 'generate_before_content', function () {
  if ( ! is_page( 'investors' ) ) return;
  ?>
<style>
/* Investors — GeneratePress wrapper resets.
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

/* Extended GP/WP site-level wrappers — all transparent so the page canvas shows through */
.site, .site-wrap, .site-inner, .site-content,
.inside-site-content, .site-header-wrap,
.container, .inside-container { background: transparent !important; }

/* Page background — only injected on the Investors page */
body { background: #060c12 !important; }

/* Hero background override: remove the prototype's grid-pattern background so
   #iv-page-canvas (position:fixed, z-index:0) shows through the hero too.
   This gives the background the same visibility throughout the entire page. */
.iv-hero { background: transparent !important; }
</style>

<?php xray_site_nav(); ?>

  <canvas id="iv-page-canvas" aria-hidden="true"></canvas>

  <!-- ═══════════════════════════ HERO ════════════════════════════════ -->
  <section class="iv-hero">
    <div class="iv-hero-photo"></div>
    <div class="iv-hero-fog-left"></div>
    <div class="iv-hero-fog-edges"></div>

    <figure class="iv-heatmap" aria-label="Prospectivity heat map from a recent model run">
      <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/model-run-heatmap.webp?ver=' . filemtime( get_stylesheet_directory() . '/assets/img/model-run-heatmap.webp' ) ); ?>" alt="Prospectivity heat map from a recent X-Ray model run, with high-scoring areas in gold" width="1168" height="1128">
      <div class="iv-heatmap-tag"><strong>Great Basin</strong><span>Western United States</span></div>
      <figcaption>
        <span class="iv-heatmap-title">Lithium prospectivity · recent run</span>
        <span class="iv-heatmap-legend"><span>Low</span><i></i><span>High</span></span>
      </figcaption>
    </figure>

    <div class="iv-hero-inner">
      <h1 class="iv-headline" id="iv-headline" aria-label="The data layer for the next era of resource discovery.">
        <span class="iv-hw"><span class="iv-hw-inner">The</span></span>
        <span class="iv-hw"><span class="iv-hw-inner">data</span></span>
        <span class="iv-hw"><span class="iv-hw-inner">layer</span></span>
        <span class="iv-hw"><span class="iv-hw-inner">for</span></span>
        <span class="iv-hw"><span class="iv-hw-inner">the</span></span>
        <span class="iv-hw"><span class="iv-hw-inner">next</span></span>
        <span class="iv-hw"><span class="iv-hw-inner">era</span></span>
        <span class="iv-hw"><span class="iv-hw-inner">of</span></span>
        <span class="iv-hw-pair"><span class="iv-hw"><span class="iv-hw-inner"><em>resource</em></span></span>
        <span class="iv-hw"><span class="iv-hw-inner"><em>discovery.</em></span></span></span>
      </h1>

      <p class="iv-subhead" id="iv-sub">
        X-Ray Geoanalytics uses machine learning to find mineral deposits for mining companies, starting with lithium in the Great Basin and expanding to the minerals mining companies already search for alongside it: nickel, cobalt, gold, and silver.
      </p>

      <div class="iv-hero-cta" id="iv-cta">
        <a href="#iv-contact" class="xr-btn xr-btn-gold">Request investor materials <span class="xr-arrow" aria-hidden="true">→</span></a>
      </div>

      <div class="iv-stat-strip" id="iv-stats">
        <div class="iv-stat-item">
          <div class="iv-stat-n">$2.5B</div>
          <div class="iv-stat-label">Global annual target generation spend</div>
        </div>
        <div class="iv-stat-item">
          <div class="iv-stat-n sky">95%</div>
          <div class="iv-stat-label">Recall, Great Basin lithium</div>
        </div>
        <div class="iv-stat-item">
          <div class="iv-stat-n">80%</div>
          <div class="iv-stat-label">Precision, Great Basin lithium</div>
        </div>
        <div class="iv-stat-item">
          <div class="iv-stat-n sky">4</div>
          <div class="iv-stat-label"><span class="xr-nobreak">Co-founders</span></div>
        </div>
      </div>
    </div>

  </section>


  <!-- ═══════════════════════ 01 OPPORTUNITY ══════════════════════════ -->
  <section class="iv-section iv-opp">
    <div class="iv-container">
      <div class="xr-reveal">
        <div class="iv-section-label">01 · The Opportunity</div>
        <h2 class="iv-section-h2" style="max-width:860px;">A <strong>$2.5B/year</strong> <span class="xr-nobreak">target-generation</span> market, and discoveries are falling.</h2>
        <p class="iv-section-lead" style="margin-top:16px;margin-bottom:0;">
          New mineral discoveries fell from a peak of 202 in 2009 to roughly 80 in 2023, while lithium demand is projected to grow 2.5x from 2024 to 2030. Explorers spend $30,000 to $90,000 a year per project on target generation, and at the high end only one in 200 drill projects leads to a new mine site discovery. Target generation, deciding where to drill, is the slice <span class="xr-nobreak">X-Ray</span> serves.
        </p>
      </div>

      <div class="iv-bars xr-reveal xr-d1" id="iv-bars">
        <div class="iv-bar-row">
          <div class="iv-bar-track">
            <div class="iv-bar-fill" data-target-w="100" style="--w:100%"></div>
            <span class="iv-bar-text">Global annual spend on target generation</span>
            <span class="iv-bar-val">$2.5B / yr</span>
          </div>
          <div class="iv-bar-cite">Total addressable</div>
        </div>
        <div class="iv-bar-row">
          <div class="iv-bar-track">
            <div class="iv-bar-fill sky" data-target-w="13.2" style="--w:13.2%"></div>
            <span class="iv-bar-text">US <span class="xr-nobreak">target-generation</span> spend</span>
            <span class="iv-bar-val">$330M / yr</span>
          </div>
          <div class="iv-bar-cite">Serviceable available</div>
        </div>
        <div class="iv-bar-row">
          <div class="iv-bar-track featured">
            <div class="iv-bar-fill bright" data-target-w="4.4" style="--w:4.4%"></div>
            <span class="iv-bar-text featured">
              Great Basin <span class="xr-nobreak">target-generation</span> spend
              <span class="featured-badge">X-Ray's beachhead market</span>
            </span>
            <span class="iv-bar-val">$110M / yr</span>
          </div>
          <div class="iv-bar-cite">Serviceable obtainable</div>
        </div>
      </div>

      <div class="iv-insight xr-reveal xr-d2">
        <div class="iv-insight-pin" aria-hidden="true"></div>
        <p>The biggest question in mining is <strong>where to dig</strong>. Explorers already spend heavily on target generation, which leaves room for a software subscription to grow as <span class="xr-nobreak">X-Ray</span> builds credibility in the industry.</p>
      </div>
    </div>
  </section>


  <!-- ═══════════════════════ 02 TRACTION ═════════════════════════════ -->
  <section class="iv-section iv-traction">
    <div class="iv-traction-photo" aria-hidden="true"></div>
    <div class="iv-container">
      <div class="xr-reveal" style="margin-bottom:56px;">
        <div class="iv-section-label">02 · Traction</div>
        <h2 class="iv-section-h2" style="max-width:820px;"><strong>95% recall</strong> and 80% precision across the Great Basin.</h2>
      </div>
      <div class="iv-traction-inner">
        <div class="xr-reveal xr-d1">
          <p style="color:var(--xr-text-2);font-size:17px;line-height:1.85;margin:0 0 22px;">
            We have <strong style="color:var(--xr-text);">a prototype lithium model</strong> that covers the entire Great Basin at 1×1&nbsp;km cells. It reaches <strong style="color:var(--xr-gold);">95% recall</strong>: out of every 100 known deposits, it finds 95 on average. Its 80% precision means roughly 80% of its predictions are lithium deposits.
          </p>
          <p style="color:var(--xr-text-2);font-size:17px;line-height:1.85;margin:0 0 22px;">
            The moat is our <em>data and proprietary featuresets</em>. We collected decades of cluttered geological data, cleaned and sorted it, and designed features in-house that indicate lithium mineralization. The same raw data would be useless to most AI models, and it would be costly and slow for competitors to replicate.
          </p>
          <p style="color:var(--xr-text-2);font-size:17px;line-height:1.85;margin:0 0 28px;">
            The models are <strong style="color:var(--xr-text);">not commercially viable yet</strong>. We are raising funding to develop them down to <strong style="color:var(--xr-gold);">1×1&nbsp;m precision</strong>, fine enough to place individual boreholes, alongside customer discovery with mining companies and field validation against real boreholes.
          </p>
          <div class="iv-tags">
            <span class="iv-tag iv-tag-gold">Prototype · Great Basin Lithium</span>
            <span class="iv-tag iv-tag-sky">Next · Finer models</span>
            <span class="iv-tag iv-tag-dim">Goal · 1×1&nbsp;m precision</span>
          </div>
        </div>

        <div class="xr-reveal xr-d2">
          <div class="iv-gauge-wrap" id="iv-gauge-wrap">
            <svg class="iv-gauge-svg iv-hexpie" viewBox="0 0 320 320" role="img" aria-label="95% recall">
              <defs>
                <clipPath id="iv-hexpie-clip"><polygon points="160.0,10.0 289.9,85.0 289.9,235.0 160.0,310.0 30.1,235.0 30.1,85.0"/></clipPath>
              </defs>
              <g clip-path="url(#iv-hexpie-clip)">
                <polygon points="160.0,10.0 289.9,85.0 289.9,235.0 160.0,310.0 30.1,235.0 30.1,85.0" class="iv-hexpie-rest"/>
                <g transform="rotate(-90 160 160)">
                  <circle id="iv-gauge-arc" class="iv-hexpie-fill" cx="160" cy="160" r="80" stroke-width="160" fill="none"/>
                </g>
              </g>
              <polygon points="160.0,10.0 289.9,85.0 289.9,235.0 160.0,310.0 30.1,235.0 30.1,85.0" class="iv-hexpie-edge"/>
              <polygon points="160.0,82.0 227.5,121.0 227.5,199.0 160.0,238.0 92.5,199.0 92.5,121.0" class="iv-hexpie-core"/>
              <text x="160" y="168" class="iv-gauge-label-text" font-size="44" font-weight="800">95%</text>
              <text x="160" y="192" font-family="JetBrains Mono, monospace" font-size="11"
                    fill="#808C9C" text-anchor="middle" letter-spacing="2">RECALL</text>
            </svg>
            <p class="iv-gauge-sub">Great Basin lithium model · 80% precision</p>
          </div>

          <div class="iv-stack">
            <div class="iv-stack-row">
              <span class="iv-stack-idx">01</span>
              <div class="iv-stack-lbl">Known deposits<small>Labels from mine sites, geochemistry and mining claims</small></div>
              <span class="iv-stack-v">Labels</span>
            </div>
            <div class="iv-stack-arrow" aria-hidden="true"></div>
            <div class="iv-stack-row">
              <span class="iv-stack-idx">02</span>
              <div class="iv-stack-lbl">Six data layers<small>Geochem · Structural · Lithology · Geophys · Geothermal · Topo</small></div>
              <span class="iv-stack-v">6 src</span>
            </div>
            <div class="iv-stack-arrow" aria-hidden="true"></div>
            <div class="iv-stack-row sky">
              <span class="iv-stack-idx">03</span>
              <div class="iv-stack-lbl">Ensemble model<small>XGBoost + LightGBM · Feature selection</small></div>
              <span class="iv-stack-v">XGB+LGBM</span>
            </div>
            <div class="iv-stack-arrow" aria-hidden="true"></div>
            <div class="iv-stack-row green">
              <span class="iv-stack-idx">04</span>
              <div class="iv-stack-lbl">Ranked drill targets<small>Prospectivity heat map · 3D visualization</small></div>
              <span class="iv-stack-v">95% recall</span>
            </div>
            <div class="iv-stack-arrow up">Validation</div>
            <div class="iv-stack-row">
              <span class="iv-stack-idx">05</span>
              <div class="iv-stack-lbl">Cross-validated<small>Spatial block · Repeated stratified <span class="xr-nobreak">k-fold</span> · <span class="xr-nobreak">Leave-one-out</span></small></div>
              <span class="iv-stack-v">3 methods</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ════════════════════ 03 BUSINESS MODEL ══════════════════════════ -->
  <section class="iv-section iv-biz">
    <div class="iv-container">
      <div class="xr-reveal" style="margin-bottom:20px;">
        <div class="iv-section-label">03 · Business Model</div>
        <h2 class="iv-section-h2" style="max-width:860px;">A software platform that <strong>mining companies</strong> subscribe to and their geologist teams use.</h2>
        <p class="iv-section-lead" style="margin-top:16px;">
          Mining companies buy the subscription. Their geologist teams use the platform for target generation, deciding where to drill. Every new mineral model adds to what the subscription covers.
        </p>
      </div>

      <div class="iv-tiers">
        <div class="iv-tier">
          <div class="iv-tier-head"><div class="iv-tier-art" aria-hidden="true"><svg viewBox="0 0 64 64"><g transform="translate(-1.5 4.5)"><path d="M4 19l12-7l12 7l-12 7Z" fill="#E8B963" fill-opacity="0.12" stroke="#E8B963" stroke-width="1"/><path d="M4 27l12-7l12 7l-12 7Z" fill="#E8B963" fill-opacity="0.24" stroke="#E8B963" stroke-width="1"/><path d="M4 35l12-7l12 7l-12 7Z" fill="#E8B963" fill-opacity="0.36" stroke="#E8B963" stroke-width="1"/><path d="M30 27.5h5m0 0l-2.5-2.5m2.5 2.5l-2.5 2.5" stroke="#E8B963" stroke-width="1.1" fill="none"/><rect x="38" y="15" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.15"/><rect x="38" y="20" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.25"/><rect x="38" y="25" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.3"/><rect x="38" y="30" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.2"/><rect x="38" y="35" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.1"/><rect x="43" y="15" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.25"/><rect x="43" y="20" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.5"/><rect x="43" y="25" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.65"/><rect x="43" y="30" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.45"/><rect x="43" y="35" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.2"/><rect x="48" y="15" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.35"/><rect x="48" y="20" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.7"/><rect x="48" y="25" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.95"/><rect x="48" y="30" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.65"/><rect x="48" y="35" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.3"/><rect x="53" y="15" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.3"/><rect x="53" y="20" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.5"/><rect x="53" y="25" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.7"/><rect x="53" y="30" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.45"/><rect x="53" y="35" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.25"/><rect x="58" y="15" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.15"/><rect x="58" y="20" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.25"/><rect x="58" y="25" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.35"/><rect x="58" y="30" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.2"/><rect x="58" y="35" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.1"/><rect x="47.8" y="24.8" width="5" height="5" fill="none" stroke="#F1F4F8" stroke-width="1"/></g></svg></div><div class="iv-tier-label">The platform</div></div>
          <div class="iv-tier-n">Heat map + 3D view</div>
          <p>Geologist teams will upload their exploration data and get back a prospectivity heat map, a 3D visualization of the target area, and a ranked list of drill targets, all in one place.</p>
        </div>
        <div class="iv-tier sky">
          <div class="iv-tier-head"><div class="iv-tier-art" aria-hidden="true"><svg viewBox="0 0 64 64"><rect x="5.5" y="5.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="11.5" y="5.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="17.5" y="5.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="23.5" y="5.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="29.5" y="5.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="35.5" y="5.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="41.5" y="5.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="47.5" y="5.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="53.5" y="5.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="5.5" y="11.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="11.5" y="11.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="17.5" y="11.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="23.5" y="11.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="29.5" y="11.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="35.5" y="11.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="41.5" y="11.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="47.5" y="11.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="53.5" y="11.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="5.5" y="17.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="11.5" y="17.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="17" y="17" width="5" height="5" fill="#6FB5E0" fill-opacity="0.29"/><rect x="23" y="17" width="5" height="5" fill="#6FB5E0" fill-opacity="0.28"/><rect x="29" y="17" width="5" height="5" fill="#6FB5E0" fill-opacity="0.27"/><rect x="35" y="17" width="5" height="5" fill="#6FB5E0" fill-opacity="0.3"/><rect x="41" y="17" width="5" height="5" fill="#6FB5E0" fill-opacity="0.22"/><rect x="47.5" y="17.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="53.5" y="17.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="5.5" y="23.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="11" y="23" width="5" height="5" fill="#6FB5E0" fill-opacity="0.3"/><rect x="17" y="23" width="5" height="5" fill="#6FB5E0" fill-opacity="0.36"/><rect x="23" y="23" width="5" height="5" fill="#6FB5E0" fill-opacity="0.38"/><rect x="29" y="23" width="5" height="5" fill="#6FB5E0"/><rect x="35" y="23" width="5" height="5" fill="#6FB5E0" fill-opacity="0.41"/><rect x="41" y="23" width="5" height="5" fill="#6FB5E0" fill-opacity="0.26"/><rect x="47.5" y="23.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="53.5" y="23.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="5.5" y="29.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="11" y="29" width="5" height="5" fill="#6FB5E0" fill-opacity="0.33"/><rect x="17" y="29" width="5" height="5" fill="#6FB5E0" fill-opacity="0.39"/><rect x="23" y="29" width="5" height="5" fill="#6FB5E0"/><rect x="29" y="29" width="5" height="5" fill="#6FB5E0"/><rect x="35" y="29" width="5" height="5" fill="#6FB5E0"/><rect x="41" y="29" width="5" height="5" fill="#6FB5E0" fill-opacity="0.28"/><rect x="47.5" y="29.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="53.5" y="29.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="5" y="35" width="5" height="5" fill="#6FB5E0" fill-opacity="0.21"/><rect x="11" y="35" width="5" height="5" fill="#6FB5E0" fill-opacity="0.29"/><rect x="17" y="35" width="5" height="5" fill="#6FB5E0" fill-opacity="0.36"/><rect x="23" y="35" width="5" height="5" fill="#6FB5E0"/><rect x="29" y="35" width="5" height="5" fill="#6FB5E0"/><rect x="35" y="35" width="5" height="5" fill="#6FB5E0" fill-opacity="0.4"/><rect x="41" y="35" width="5" height="5" fill="#6FB5E0" fill-opacity="0.27"/><rect x="47" y="35" width="5" height="5" fill="#6FB5E0" fill-opacity="0.22"/><rect x="53.5" y="35.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="5.5" y="41.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="11.5" y="41.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="17" y="41" width="5" height="5" fill="#6FB5E0" fill-opacity="0.29"/><rect x="23" y="41" width="5" height="5" fill="#6FB5E0" fill-opacity="0.41"/><rect x="29" y="41" width="5" height="5" fill="#6FB5E0" fill-opacity="0.4"/><rect x="35" y="41" width="5" height="5" fill="#6FB5E0" fill-opacity="0.29"/><rect x="41" y="41" width="5" height="5" fill="#6FB5E0" fill-opacity="0.24"/><rect x="47.5" y="41.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="53.5" y="41.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="5.5" y="47.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="11.5" y="47.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="17" y="47" width="5" height="5" fill="#6FB5E0" fill-opacity="0.22"/><rect x="23" y="47" width="5" height="5" fill="#6FB5E0" fill-opacity="0.29"/><rect x="29" y="47" width="5" height="5" fill="#6FB5E0" fill-opacity="0.23"/><rect x="35.5" y="47.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="41.5" y="47.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="47.5" y="47.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="53.5" y="47.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="5.5" y="53.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="11.5" y="53.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="17.5" y="53.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="23.5" y="53.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="29.5" y="53.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="35.5" y="53.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="41.5" y="53.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="47.5" y="53.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/><rect x="53.5" y="53.5" width="4" height="4" fill="none" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/></svg></div><div class="iv-tier-label" style="color:var(--xr-sky);">Customers</div></div>
          <div class="iv-tier-n" style="color:var(--xr-sky);">Mining companies</div>
          <p>We start with companies targeting lithium in the Great Basin, then companies there targeting multiple commodities, then mining companies across the US as new models for nickel, cobalt, gold and silver come online.</p>
        </div>
        <div class="iv-tier">
          <div class="iv-tier-head"><div class="iv-tier-art" aria-hidden="true"><svg viewBox="0 0 64 64"><rect x="6" y="9" width="14" height="46" fill="#E8B963" fill-opacity=".03" stroke="#E8B963" stroke-opacity=".5" stroke-width=".8" stroke-dasharray="2.5 1.5"/><rect x="8.0" y="13.0" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.12"/><rect x="13.5" y="13.0" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.3"/><rect x="8.0" y="19.6" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.48"/><rect x="13.5" y="19.6" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.21"/><rect x="8.0" y="26.2" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.36"/><rect x="13.5" y="26.2" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.15"/><rect x="8.0" y="32.8" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.54"/><rect x="13.5" y="32.8" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.27"/><rect x="8.0" y="39.4" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.18"/><rect x="13.5" y="39.4" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.42"/><rect x="8.0" y="46.0" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.33"/><rect x="13.5" y="46.0" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.09"/><rect x="25" y="9" width="14" height="46" fill="#E8B963" fill-opacity=".08" stroke="#E8B963" stroke-opacity="1" stroke-width="1.2"/><rect x="27.0" y="13.0" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.81"/><rect x="32.5" y="13.0" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.38"/><rect x="27.0" y="19.6" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.28"/><rect x="32.5" y="19.6" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.62"/><rect x="27.0" y="26.2" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.19"/><rect x="32.5" y="26.2" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.71"/><rect x="27.0" y="32.8" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.47"/><rect x="32.5" y="32.8" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.9"/><rect x="27.0" y="39.4" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.57"/><rect x="32.5" y="39.4" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.24"/><rect x="27.0" y="46.0" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.38"/><rect x="32.5" y="46.0" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.66"/><rect x="44" y="9" width="14" height="46" fill="#E8B963" fill-opacity=".03" stroke="#E8B963" stroke-opacity=".5" stroke-width=".8" stroke-dasharray="2.5 1.5"/><rect x="46.0" y="13.0" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.21"/><rect x="51.5" y="13.0" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.42"/><rect x="46.0" y="19.6" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.33"/><rect x="51.5" y="19.6" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.12"/><rect x="46.0" y="26.2" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.48"/><rect x="51.5" y="26.2" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.27"/><rect x="46.0" y="32.8" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.15"/><rect x="51.5" y="32.8" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.36"/><rect x="46.0" y="39.4" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.54"/><rect x="51.5" y="39.4" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.24"/><rect x="46.0" y="46.0" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.18"/><rect x="51.5" y="46.0" width="4.5" height="4.5" fill="#E8B963" fill-opacity="0.39"/><path d="M20.9 30.4l3.2 3.2m0-3.2l-3.2 3.2" stroke="#D9725F" stroke-width="1.1"/><path d="M39.9 30.4l3.2 3.2m0-3.2l-3.2 3.2" stroke="#D9725F" stroke-width="1.1"/></svg></div><div class="iv-tier-label">Defensibility</div></div>
          <div class="iv-tier-n">Compounding data</div>
          <p>In-house featuresets and decades of cleaned data are hard to replicate. Each customer's data is compartmentalized and never used to train anyone else's model, so mining companies can trust us with it.</p>
        </div>
      </div>

      <div class="iv-quote xr-reveal xr-d1">
        Fewer holes drilled before a discovery means <strong>less time and money spent</strong> on every project.
      </div>
    </div>
  </section>


  <!-- ═══════════════════════ 04 ROADMAP ══════════════════════════════ -->
  <section class="iv-section iv-road">
    <div class="iv-container">
      <div class="xr-reveal" style="margin-bottom:16px;">
        <div class="iv-section-label">04 · Roadmap</div>
        <h2 class="iv-section-h2" style="max-width:880px;">One platform. From Great Basin lithium to <strong>the minerals mining companies drill for alongside it</strong>.</h2>
        <p class="iv-section-lead" style="margin-top:16px;">
          Each model focuses on one commodity in one region. Adding a commodity means new training data and features on the same framework, not a new platform.
        </p>
      </div>

      <div class="iv-timeline xr-reveal xr-d1" id="iv-timeline">
        <div class="iv-tl-line" id="iv-tl-line"></div>

        <!-- Same five stages, in the same order and with the same drawings,
             as the Home roadmap and the Product development tracker. -->
        <div class="iv-tl-step active">
          <div class="iv-tl-icon" aria-hidden="true"><?php echo xray_roadmap_art( 'prototype' ); ?></div>
          <div class="iv-tl-meta">Now · Prototype · Customer discovery</div>
          <h3 class="iv-tl-h3">Great Basin Lithium</h3>
          <p class="iv-tl-p">Our lithium model covers the Great Basin at 1×1&nbsp;km cells with 95% recall and 80% precision. Next is two rounds of customer interviews: first to validate the problem and how mining companies decide where to drill today, then to learn what they want in the software.</p>
        </div>

        <div class="iv-tl-step dev">
          <div class="iv-tl-icon" aria-hidden="true"><?php echo xray_roadmap_art( 'finer' ); ?></div>
          <div class="iv-tl-meta">Next · Within a year</div>
          <h3 class="iv-tl-h3">Finer Models &amp; Federal Grants</h3>
          <p class="iv-tl-p">Development toward 1×1&nbsp;m precision for individual boreholes, and applications for SBIR and STTR grants to fund the work.</p>
        </div>

        <div class="iv-tl-step dev">
          <div class="iv-tl-icon" aria-hidden="true"><?php echo xray_roadmap_art( 'field' ); ?></div>
          <div class="iv-tl-meta">Next · Within a year</div>
          <h3 class="iv-tl-h3">Field Validation</h3>
          <p class="iv-tl-p">Field validation comparing predictions to real boreholes, with the results fed back into the model until it is accurate enough to sell.</p>
        </div>

        <div class="iv-tl-step long">
          <div class="iv-tl-icon" aria-hidden="true"><?php echo xray_roadmap_art( 'platform' ); ?></div>
          <div class="iv-tl-meta">Then · Software platform</div>
          <h3 class="iv-tl-h3">The <span class="xr-nobreak">X-Ray</span> Platform</h3>
          <p class="iv-tl-p">The software mining companies will use: their geologist teams import survey data and get ranked drill targets, a heat map, a 3D view of the target area and other geoanalysis tools.</p>
        </div>

        <div class="iv-tl-step long">
          <div class="iv-tl-icon" aria-hidden="true"><?php echo xray_roadmap_art( 'minerals' ); ?></div>
          <div class="iv-tl-meta">Later · Five-year vision</div>
          <h3 class="iv-tl-h3">Nickel, Cobalt, Gold &amp; Silver</h3>
          <p class="iv-tl-p">More commodity models, starting with nickel, a metal mining companies already target alongside lithium. Multiple paid clients across the Great Basin with successful drill sites, and expansion to larger mining companies across the US and potentially internationally.</p>
        </div>

      </div>
    </div>
  </section>


  <!-- ═══════════════════════ 05 TEAM ═════════════════════════════════ -->
  <section class="iv-section iv-team-sec" id="iv-team">
    <div class="iv-container">
      <div class="xr-reveal" style="margin-bottom:12px;">
        <div class="iv-section-label">05 · Team</div>
        <h2 class="iv-section-h2">Four co-founders with every discipline needed to build and sell the technology.</h2>
      </div>

      <div class="iv-founders" id="iv-founders">
        <div class="iv-founder">
          <div class="iv-founder-hex"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/founder-lucian.webp' ); ?>" alt="Lucian Slayden" width="378" height="438" loading="lazy"></div>
          <div class="iv-founder-name">Lucian Slayden</div>
          <div class="iv-founder-role">Chief Executive Officer</div>
        </div>
        <div class="iv-founder">
          <div class="iv-founder-hex"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/founder-ethan.webp' ); ?>" alt="Ethan Lopez" width="378" height="438" loading="lazy"></div>
          <div class="iv-founder-name">Ethan Lopez</div>
          <div class="iv-founder-role">Chief Technology Officer</div>
        </div>
        <div class="iv-founder sky">
          <div class="iv-founder-hex"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/founder-jack.webp' ); ?>" alt="Jack Hilbert" width="378" height="438" loading="lazy"></div>
          <div class="iv-founder-name">Jack Hilbert</div>
          <div class="iv-founder-role">Chief Data Officer</div>
        </div>
        <div class="iv-founder">
          <div class="iv-founder-hex"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/founder-nick.webp' ); ?>" alt="Nick Lopez, J.D." width="378" height="438" loading="lazy"></div>
          <div class="iv-founder-name">Nick&nbsp;Lopez,&nbsp;J.D.</div>
          <div class="iv-founder-role">Chief Legal Officer</div>
        </div>
      </div>
    </div>
  </section>


  <!-- ═══════════════════════ 06 CONTACT ══════════════════════════════ -->
  <section class="iv-section iv-contact-sec" id="iv-contact">
    <div class="iv-contact-photo" aria-hidden="true"></div>
    <div class="iv-container">
      <div class="iv-contact-inner">
        <div class="xr-reveal">
          <div class="iv-section-label">Get in Touch</div>
          <h2 class="iv-section-h2" style="margin-bottom:20px;">Want to talk?</h2>
          <p style="color:var(--xr-text-2);font-size:17px;line-height:1.75;max-width:460px;margin:0 0 8px;">
            If you invest in industrial tech, critical minerals, energy transition, or applied ML, we'd welcome a conversation.
          </p>
          <a href="mailto:lucian@xraygeoanalytics.com" class="iv-contact-email">
            <span class="iv-dot"></span>
            lucian@xraygeoanalytics.com
          </a>
          <div class="iv-access-note" style="margin-top:28px;">
            <p>Investor materials are available on request. Use the form or email our CEO directly.</p>
          </div>
        </div>

        <form class="iv-form xr-reveal xr-d1 xr-contact-form" id="iv-contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
          <input type="hidden" name="action" value="xray_contact">
          <input type="hidden" name="source" value="investors">
          <input type="hidden" name="interest" value="Investor">
          <?php wp_nonce_field( 'xray_contact', 'xray_contact_nonce', false ); ?>
          <div class="xr-hp" aria-hidden="true"><label for="iv-website">Website</label><input type="text" id="iv-website" name="website" tabindex="-1" autocomplete="off"></div>
          <?php echo xray_contact_notice(); ?>
          <div class="iv-form-grid">
            <div class="iv-form-row">
              <label for="iv-name">Name</label>
              <input type="text" id="iv-name" name="name" required placeholder="Full name" autocomplete="name">
            </div>
            <div class="iv-form-row">
              <label for="iv-firm">Firm</label>
              <input type="text" id="iv-firm" name="company" placeholder="Fund / institution" autocomplete="organization">
            </div>
          </div>
          <div class="iv-form-row">
            <label for="iv-email">Email</label>
            <input type="email" id="iv-email" name="email" required placeholder="you@example.com" autocomplete="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="An email address like you@example.com">
          </div>
          <div class="iv-form-row">
            <label for="iv-msg">Message <span class="iv-form-opt">(optional)</span></label>
            <textarea id="iv-msg" name="message" placeholder="Stage focus, sector interest, anything specific."></textarea>
          </div>
          <div class="iv-form-foot">
            <span class="iv-form-note">Goes directly to our CEO.</span>
            <button type="submit" class="xr-btn xr-btn-gold">Request Investor Materials <span class="xr-arrow" aria-hidden="true">→</span></button>
          </div>
        </form>
      </div>
    </div>
  </section>

<?php xray_site_footer(); ?>
	<?php
} );
