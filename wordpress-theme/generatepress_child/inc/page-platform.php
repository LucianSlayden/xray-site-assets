<?php
/**
 * Moved from Code Snippets #14 "XRay — Platform Page".
 */

add_action( 'generate_before_content', function () {
    if ( ! is_page('platform') ) return;
    echo <<<'HTML'
<?php xray_site_nav(); ?>

<section class="pf-hero">
  <canvas id="pf-canvas" aria-hidden="true"></canvas>
  <div class="pf-hero-bg" aria-hidden="true"></div>
  <div class="pf-fog pf-fog-left"   aria-hidden="true"></div>
  <div class="pf-fog pf-fog-top"    aria-hidden="true"></div>
  <div class="pf-fog pf-fog-bottom" aria-hidden="true"></div>
  <div class="pf-hero-inner">
    <div>
      <div class="pf-eyebrow-wrap">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Platform · Technical Architecture</span>
      </div>
      <h1>
        <span class="pf-hw"><span class="pf-hw-inner">Built to</span></span><br>
        <span class="pf-hw"><span class="pf-hw-inner">process</span></span>&#32;<span class="pf-hw"><span class="pf-hw-inner gold">geoscience</span></span><br>
        <span class="pf-hw"><span class="pf-hw-inner">at scale.</span></span>
      </h1>
      <p class="pf-lede">Four layers (ingestion, features, inference and delivery) that turn decades of cluttered public geological data, plus your own exploration data, into ranked lithium drill targets.</p>
      <div class="pf-cta-row">
        <a href="/request-demo/" class="xr-btn xr-btn-gold">Request Demo</a>
        <a href="/how-it-works/" class="xr-btn xr-btn-outline">How it Works <span class="xr-arrow">→</span></a>
      </div>
      <div class="pf-hero-stats">
        <div><div class="pf-hero-stat-val">6</div><div class="pf-hero-stat-label">Data types used</div></div>
        <div><div class="pf-hero-stat-val">95%</div><div class="pf-hero-stat-label">Recall · Great Basin lithium</div></div>
        <div><div class="pf-hero-stat-val sky">80%</div><div class="pf-hero-stat-label">Precision</div></div>
      </div>
    </div>
    <div class="pf-monitor" id="pf-monitor" aria-label="Example pipeline">
      <div class="pf-mon-header">
        <div class="pf-mon-title"><div class="pf-mon-pulse"></div>PIPELINE · EXAMPLE</div>
        <div class="pf-mon-run">GREAT BASIN · Li</div>
      </div>
      <div class="pf-mon-layers">
        <div class="pf-mon-layer">
          <div class="pf-mon-l-head"><span class="pf-mon-l-num">01</span><span class="pf-mon-l-name">Ingestion</span><span class="pf-mon-l-status complete">COMPLETE</span></div>
          <div class="pf-mon-l-bar-wrap"><div class="pf-mon-l-bar gold" data-w="100"></div></div>
          <div class="pf-mon-l-meta">6 data types · public + client data cleaned</div>
        </div>
        <div class="pf-mon-layer">
          <div class="pf-mon-l-head"><span class="pf-mon-l-num">02</span><span class="pf-mon-l-name">Features</span><span class="pf-mon-l-status complete">COMPLETE</span></div>
          <div class="pf-mon-l-bar-wrap"><div class="pf-mon-l-bar gold" data-w="100"></div></div>
          <div class="pf-mon-l-meta">Proprietary featuresets · feature selection</div>
        </div>
        <div class="pf-mon-layer">
          <div class="pf-mon-l-head"><span class="pf-mon-l-num">03</span><span class="pf-mon-l-name">Inference</span><span class="pf-mon-l-status running" id="pf-inf-status">RUNNING</span></div>
          <div class="pf-mon-l-bar-wrap"><div class="pf-mon-l-bar gold" id="pf-inf-bar" data-w="63"></div></div>
          <div class="pf-mon-l-meta" id="pf-inf-meta">XGBoost + LightGBM ensemble · 1x1 km cells</div>
        </div>
        <div class="pf-mon-layer">
          <div class="pf-mon-l-head"><span class="pf-mon-l-num">04</span><span class="pf-mon-l-name">Delivery</span><span class="pf-mon-l-status queued" id="pf-del-status">QUEUED</span></div>
          <div class="pf-mon-l-bar-wrap"><div class="pf-mon-l-bar sky" id="pf-del-bar" data-w="0"></div></div>
          <div class="pf-mon-l-meta">Heat map · ranked targets · 3D view</div>
        </div>
      </div>
      <div class="pf-mon-footer">
        <div class="pf-mon-f-col"><div class="pf-mon-f-val gold">95%</div><div class="pf-mon-f-label">Recall</div></div>
        <div class="pf-mon-f-col"><div class="pf-mon-f-val gold" id="pf-scored-count">80%</div><div class="pf-mon-f-label">Precision</div></div>
        <div class="pf-mon-f-col"><div class="pf-mon-f-val sky" id="pf-eta">1 km</div><div class="pf-mon-f-label">Cell size</div></div>
        <div class="pf-mon-f-col"><div class="pf-mon-f-val" style="font-size:15px;letter-spacing:-0.01em;">Great Basin</div><div class="pf-mon-f-label">Region</div></div>
      </div>
    </div>
  </div>
</section>

<section class="xr-section xr-section-deep xr-topo" style="position:relative;overflow:hidden;">
  <div class="pf-sources-bg" aria-hidden="true"></div>
  <div class="xr-section-rule"></div>
  <div class="xr-topo-layer xr-topo-lattice"></div>
  <div class="xr-container" style="position:relative;z-index:1;">
    <div class="xr-reveal" style="text-align:center;margin-bottom:56px;">
      <span class="xr-eyebrow" style="justify-content:center;"><span class="xr-eyebrow-hex"></span>02 · Data Sources</span>
      <h2 style="margin:18px 0 14px;">Six data types. One cleaned dataset.</h2>
      <p style="color:var(--xr-text-2);font-size:17px;line-height:1.72;max-width:580px;margin:0 auto;">We have collected decades of cluttered public geological data, cleaned and sorted it, and turned it into something a model can learn from. Your own exploration data sits on top.</p>
    </div>
    <div class="pf-sources-grid">
      <div class="pf-src-card">
        <div class="pf-src-num-col"><div class="pf-src-num">01</div><div class="pf-src-accent"></div></div>
        <div class="pf-src-body">
          <div class="pf-src-cat">Geochemistry</div>
          <h3>Element concentrations.</h3>
          <p>The chemical fingerprint of the ground, from decades of public records and from your own samples.</p>
          <ul class="pf-src-items"><li>Public geochemistry records</li><li>Geochemistry used to label known lithium ground</li><li>Your soil and rock samples</li><li>Your drill-core assays</li></ul>
        </div>
      </div>
      <div class="pf-src-card">
        <div class="pf-src-num-col"><div class="pf-src-num">02</div><div class="pf-src-accent"></div></div>
        <div class="pf-src-body">
          <div class="pf-src-cat">Geophysics &amp; Geothermal</div>
          <h3>Below the surface.</h3>
          <p>Geophysical and geothermal data that point to what lies under the surface.</p>
          <ul class="pf-src-items"><li>Public geophysical data</li><li>Geothermal data</li><li>Your own geophysical surveys</li></ul>
        </div>
      </div>
      <div class="pf-src-card sky">
        <div class="pf-src-num-col"><div class="pf-src-num">03</div><div class="pf-src-accent"></div></div>
        <div class="pf-src-body">
          <div class="pf-src-cat">Structure · Lithology · Topography</div>
          <h3>The shape of the ground.</h3>
          <p>Structural data, rock types and terrain: the geological setting that controls where lithium forms.</p>
          <ul class="pf-src-items"><li>Structural data</li><li>Lithology</li><li>Topography</li><li>Next: borehole logs from water wells, oil and gas wells and lithium drilling</li></ul>
        </div>
      </div>
      <div class="pf-src-card sky">
        <div class="pf-src-num-col"><div class="pf-src-num">04</div><div class="pf-src-accent"></div></div>
        <div class="pf-src-body">
          <div class="pf-src-cat">Your Proprietary Data</div>
          <h3>Your edge, amplified.</h3>
          <p>Upload the exploration data your team has already collected, on top of our public baseline. It is used only for your own predictions.</p>
          <ul class="pf-src-items"><li>Drill results and logs</li><li>Soil and rock samples</li><li>Your own surveys</li><li>Never used to train other customers' models</li></ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="xr-section xr-section-void xr-topo" style="position:relative;overflow:hidden;">
  <div class="pf-engine-bg" aria-hidden="true"></div>
  <div class="xr-section-rule"></div>
  <div class="xr-container" style="position:relative;z-index:1;">
    <div class="xr-reveal" style="text-align:center;margin-bottom:0;">
      <span class="xr-eyebrow" style="justify-content:center;"><span class="xr-eyebrow-hex"></span>03 · ML Engine</span>
      <h2 style="margin:18px 0 14px;">Four stages. One ranked result.</h2>
      <p style="color:var(--xr-text-2);font-size:17px;line-height:1.72;max-width:560px;margin:0 auto;">A pipeline that turns cleaned geoscience data into ranked lithium prospectivity, from data ingestion and cleaning all the way to the result delivered to you.</p>
    </div>
    <div class="pf-engine-steps">
      <div class="pf-step-row">
        <div class="pf-step-num-col"><div class="pf-step-num">01</div><div class="pf-step-label">Ingestion</div></div>
        <div class="pf-step-body">
          <h3>Clean everything. Keep what matters.</h3>
          <p>Public geological data comes as decades of cluttered records. Fed raw into any model, it would be useless. We clean and sort it into a form a model can learn from, then add the data you upload.</p>
          <div class="pf-step-tags"><span class="pf-step-tag">Data cleaning</span><span class="pf-step-tag">Sorting</span><span class="pf-step-tag">Public baseline</span><span class="pf-step-tag">Client uploads</span></div>
        </div>
        <div class="pf-step-stat-col"><div class="pf-step-stat-val">6</div><div class="pf-step-stat-lbl">Data types ingested</div></div>
      </div>
      <div class="pf-step-row">
        <div class="pf-step-num-col"><div class="pf-step-num">02</div><div class="pf-step-label">Features</div></div>
        <div class="pf-step-body">
          <h3>Proprietary featuresets.</h3>
          <p>Our featuresets, lists of the geological features that indicate lithium mineralization, were designed entirely in-house. Feature selection algorithms keep the signals that matter for each grid cell.</p>
          <div class="pf-step-tags"><span class="pf-step-tag">In-house featuresets</span><span class="pf-step-tag">Feature selection</span><span class="pf-step-tag">Grid cells</span><span class="pf-step-tag">Lithium indicators</span></div>
        </div>
        <div class="pf-step-stat-col"><div class="pf-step-stat-val">1x1 km</div><div class="pf-step-stat-lbl">Prediction cell size</div></div>
      </div>
      <div class="pf-step-row">
        <div class="pf-step-num-col"><div class="pf-step-num">03</div><div class="pf-step-label">Inference</div></div>
        <div class="pf-step-body">
          <h3>Ensemble models trained on known deposits.</h3>
          <p>An ensemble of XGBoost and LightGBM models, trained on labels from mine sites, geochemistry and mining-claim data. Checked with spatial block cross-validation, repeated stratified k-fold and leave-one-out cross-validation.</p>
          <div class="pf-step-tags"><span class="pf-step-tag">XGBoost + LightGBM</span><span class="pf-step-tag">Spatial block CV</span><span class="pf-step-tag">Stratified k-fold</span><span class="pf-step-tag">Leave-one-out CV</span></div>
        </div>
        <div class="pf-step-stat-col"><div class="pf-step-stat-val">95%</div><div class="pf-step-stat-lbl">Recall · 80% precision</div></div>
      </div>
      <div class="pf-step-row">
        <div class="pf-step-num-col"><div class="pf-step-num">04</div><div class="pf-step-label">Delivery</div></div>
        <div class="pf-step-body">
          <h3>Heat map. Ranked targets. 3D view.</h3>
          <p>Results arrive as a prospectivity heat map and a ranked list of drill targets, with a 3D visualization of the target area and analysis tools that save your geologists time in target generation.</p>
          <div class="pf-step-tags"><span class="pf-step-tag">Prospectivity heat map</span><span class="pf-step-tag">Ranked drill targets</span><span class="pf-step-tag">3D visualization</span><span class="pf-step-tag">Analysis tools</span></div>
        </div>
        <div class="pf-step-stat-col"><div class="pf-step-stat-val sky">3D</div><div class="pf-step-stat-lbl">Target-area view</div></div>
      </div>
    </div>
  </div>
</section>

<section class="xr-section xr-section-deep xr-topo" style="position:relative;overflow:hidden;">
  <div class="pf-sec-bg" aria-hidden="true"></div>
  <div class="xr-section-rule"></div>
  <div class="xr-topo-layer xr-topo-lattice"></div>
  <div class="xr-container" style="position:relative;z-index:1;">
    <div class="pf-sec-layout">
      <div class="pf-sec-left xr-reveal">
        <span class="xr-eyebrow" style="margin-bottom:22px;"><span class="xr-eyebrow-hex"></span>04 · Security</span>
        <h2>Security is not a feature.<br>It's the <em>foundation</em>.</h2>
        <p>Your exploration data represents years of work and millions in spend. We treat it accordingly. It is kept separate and never shared with another customer.</p>
        <p style="color:var(--xr-text-2);font-size:16px;line-height:1.72;max-width:42ch;margin:0 0 28px;">Each customer's model is compartmentalized. Everything you upload is used only for your own predictions and is never collected to train anyone else's model.</p>
        <div class="pf-sec-cert">
          <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6FB5E0" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          COMPARTMENTALIZED MODEL PER CUSTOMER
        </div>
      </div>
      <div class="pf-sec-cards">
        <div class="pf-sec-card">
          <div class="pf-sec-icon"><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="1.8"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></div>
          <div class="pf-sec-card-content"><div class="pf-sec-card-title">Compartmentalized Models</div><div class="pf-sec-card-desc">Each customer's model is kept separate. What you upload feeds your own predictions and nothing else.</div></div>
        </div>
        <div class="pf-sec-card">
          <div class="pf-sec-icon"><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg></div>
          <div class="pf-sec-card-content"><div class="pf-sec-card-title">No Cross-Training</div><div class="pf-sec-card-desc">Your drill data, samples and exploration records are never used to train other customers' models. Ever.</div></div>
        </div>
        <div class="pf-sec-card sky">
          <div class="pf-sec-icon"><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6FB5E0" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
          <div class="pf-sec-card-content"><div class="pf-sec-card-title">Handled In-House</div><div class="pf-sec-card-desc">X-Ray handles every step itself, from data cleaning to the final report and prediction maps.</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="xr-section pf-cta-section">
  <div class="xr-container" style="max-width:760px;text-align:center;">
    <span class="xr-reveal xr-eyebrow" style="justify-content:center;margin-bottom:18px;"><span class="xr-eyebrow-hex"></span>See it in action</span>
    <h2 class="xr-reveal xr-d1" style="margin:0 0 18px;">See the platform process your data.</h2>
    <p class="xr-reveal xr-d2" style="color:var(--xr-text-2);font-size:17px;line-height:1.75;margin:0 auto 40px;max-width:520px;">Request a demo and we'll walk you through the Great Basin lithium model and how your exploration data turns into ranked drill targets.</p>
    <div class="xr-reveal xr-d3" style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="/request-demo/" class="xr-btn xr-btn-gold">Request a Demo</a>
      <a href="/how-it-works/" class="xr-btn xr-btn-outline">How it Works <span class="xr-arrow">→</span></a>
    </div>
  </div>
</section>

<?php xray_site_footer(); ?>
HTML;
} );
