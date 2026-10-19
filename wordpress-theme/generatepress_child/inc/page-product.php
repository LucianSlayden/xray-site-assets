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
            <span class="pdt-cmp-val">Geologists, GIS and prospectivity studies</span>
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
            <span class="pdt-cmp-head-logo"><?php echo xray_logo_img(); ?></span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Success rate</span>
            <span class="pdt-cmp-val">Prototype: 95% recall, 80% precision</span>
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
            <span class="pdt-cmp-val">Machine learning on cleaned geological data</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Targets tested</span>
            <span class="pdt-cmp-val">A ranked list shows where to drill first</span>
          </div>
          <div class="pdt-cmp-row">
            <span class="pdt-cmp-label">Data processed</span>
            <span class="pdt-cmp-val">More data and factors than any team can weigh</span>
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

      <ol class="pa2 xr-reveal">
        <li class="pa2-step">
          <div class="pa2-top"><span class="pa2-num">01</span><span class="pa2-kind">Input</span></div>
          <figure class="pa2-art"><svg viewBox="0 0 170 150" aria-hidden="true">
<polygon points="34.0,12.0 130.0,12.0 112.0,42.0 16.0,42.0" fill="#0E1822" stroke="rgba(232,185,99,.55)" stroke-width="1"/>
<polygon points="34.0,12.0 42.0,12.0 39.0,17.0 31.0,17.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="42.0,12.0 50.0,12.0 47.0,17.0 39.0,17.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="50.0,12.0 58.0,12.0 55.0,17.0 47.0,17.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="58.0,12.0 66.0,12.0 63.0,17.0 55.0,17.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="66.0,12.0 74.0,12.0 71.0,17.0 63.0,17.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="74.0,12.0 82.0,12.0 79.0,17.0 71.0,17.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="82.0,12.0 90.0,12.0 87.0,17.0 79.0,17.0" fill="#8C7A4E" fill-opacity=".8"/>
<polygon points="90.0,12.0 98.0,12.0 95.0,17.0 87.0,17.0" fill="#8C7A4E" fill-opacity=".8"/>
<polygon points="98.0,12.0 106.0,12.0 103.0,17.0 95.0,17.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="106.0,12.0 114.0,12.0 111.0,17.0 103.0,17.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="114.0,12.0 122.0,12.0 119.0,17.0 111.0,17.0" fill="#A88456" fill-opacity=".8"/>
<polygon points="122.0,12.0 130.0,12.0 127.0,17.0 119.0,17.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="31.0,17.0 39.0,17.0 36.0,22.0 28.0,22.0" fill="#8C7A4E" fill-opacity=".8"/>
<polygon points="39.0,17.0 47.0,17.0 44.0,22.0 36.0,22.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="47.0,17.0 55.0,17.0 52.0,22.0 44.0,22.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="55.0,17.0 63.0,17.0 60.0,22.0 52.0,22.0" fill="#B5653E" fill-opacity=".8"/>
<polygon points="63.0,17.0 71.0,17.0 68.0,22.0 60.0,22.0" fill="#8C7A4E" fill-opacity=".8"/>
<polygon points="71.0,17.0 79.0,17.0 76.0,22.0 68.0,22.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="79.0,17.0 87.0,17.0 84.0,22.0 76.0,22.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="87.0,17.0 95.0,17.0 92.0,22.0 84.0,22.0" fill="#A88456" fill-opacity=".8"/>
<polygon points="95.0,17.0 103.0,17.0 100.0,22.0 92.0,22.0" fill="#A88456" fill-opacity=".8"/>
<polygon points="103.0,17.0 111.0,17.0 108.0,22.0 100.0,22.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="111.0,17.0 119.0,17.0 116.0,22.0 108.0,22.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="119.0,17.0 127.0,17.0 124.0,22.0 116.0,22.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="28.0,22.0 36.0,22.0 33.0,27.0 25.0,27.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="36.0,22.0 44.0,22.0 41.0,27.0 33.0,27.0" fill="#A88456" fill-opacity=".8"/>
<polygon points="44.0,22.0 52.0,22.0 49.0,27.0 41.0,27.0" fill="#A88456" fill-opacity=".8"/>
<polygon points="52.0,22.0 60.0,22.0 57.0,27.0 49.0,27.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="60.0,22.0 68.0,22.0 65.0,27.0 57.0,27.0" fill="#A88456" fill-opacity=".8"/>
<polygon points="68.0,22.0 76.0,22.0 73.0,27.0 65.0,27.0" fill="#8C7A4E" fill-opacity=".8"/>
<polygon points="76.0,22.0 84.0,22.0 81.0,27.0 73.0,27.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="84.0,22.0 92.0,22.0 89.0,27.0 81.0,27.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="92.0,22.0 100.0,22.0 97.0,27.0 89.0,27.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="100.0,22.0 108.0,22.0 105.0,27.0 97.0,27.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="108.0,22.0 116.0,22.0 113.0,27.0 105.0,27.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="116.0,22.0 124.0,22.0 121.0,27.0 113.0,27.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="25.0,27.0 33.0,27.0 30.0,32.0 22.0,32.0" fill="#8C7A4E" fill-opacity=".8"/>
<polygon points="33.0,27.0 41.0,27.0 38.0,32.0 30.0,32.0" fill="#8C7A4E" fill-opacity=".8"/>
<polygon points="41.0,27.0 49.0,27.0 46.0,32.0 38.0,32.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="49.0,27.0 57.0,27.0 54.0,32.0 46.0,32.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="57.0,27.0 65.0,27.0 62.0,32.0 54.0,32.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="65.0,27.0 73.0,27.0 70.0,32.0 62.0,32.0" fill="#B5653E" fill-opacity=".8"/>
<polygon points="73.0,27.0 81.0,27.0 78.0,32.0 70.0,32.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="81.0,27.0 89.0,27.0 86.0,32.0 78.0,32.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="89.0,27.0 97.0,27.0 94.0,32.0 86.0,32.0" fill="#8C7A4E" fill-opacity=".8"/>
<polygon points="97.0,27.0 105.0,27.0 102.0,32.0 94.0,32.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="105.0,27.0 113.0,27.0 110.0,32.0 102.0,32.0" fill="#8C7A4E" fill-opacity=".8"/>
<polygon points="113.0,27.0 121.0,27.0 118.0,32.0 110.0,32.0" fill="#A88456" fill-opacity=".8"/>
<polygon points="22.0,32.0 30.0,32.0 27.0,37.0 19.0,37.0" fill="#B5653E" fill-opacity=".8"/>
<polygon points="30.0,32.0 38.0,32.0 35.0,37.0 27.0,37.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="38.0,32.0 46.0,32.0 43.0,37.0 35.0,37.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="46.0,32.0 54.0,32.0 51.0,37.0 43.0,37.0" fill="#A88456" fill-opacity=".8"/>
<polygon points="54.0,32.0 62.0,32.0 59.0,37.0 51.0,37.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="62.0,32.0 70.0,32.0 67.0,37.0 59.0,37.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="70.0,32.0 78.0,32.0 75.0,37.0 67.0,37.0" fill="#A88456" fill-opacity=".8"/>
<polygon points="78.0,32.0 86.0,32.0 83.0,37.0 75.0,37.0" fill="#B5653E" fill-opacity=".8"/>
<polygon points="86.0,32.0 94.0,32.0 91.0,37.0 83.0,37.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="94.0,32.0 102.0,32.0 99.0,37.0 91.0,37.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="102.0,32.0 110.0,32.0 107.0,37.0 99.0,37.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="110.0,32.0 118.0,32.0 115.0,37.0 107.0,37.0" fill="#A88456" fill-opacity=".8"/>
<polygon points="19.0,37.0 27.0,37.0 24.0,42.0 16.0,42.0" fill="#B5653E" fill-opacity=".8"/>
<polygon points="27.0,37.0 35.0,37.0 32.0,42.0 24.0,42.0" fill="#B5653E" fill-opacity=".8"/>
<polygon points="35.0,37.0 43.0,37.0 40.0,42.0 32.0,42.0" fill="#8C7A4E" fill-opacity=".8"/>
<polygon points="43.0,37.0 51.0,37.0 48.0,42.0 40.0,42.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="51.0,37.0 59.0,37.0 56.0,42.0 48.0,42.0" fill="#B5653E" fill-opacity=".8"/>
<polygon points="59.0,37.0 67.0,37.0 64.0,42.0 56.0,42.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="67.0,37.0 75.0,37.0 72.0,42.0 64.0,42.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="75.0,37.0 83.0,37.0 80.0,42.0 72.0,42.0" fill="#2D4A5A" fill-opacity=".8"/>
<polygon points="83.0,37.0 91.0,37.0 88.0,42.0 80.0,42.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="91.0,37.0 99.0,37.0 96.0,42.0 88.0,42.0" fill="#5E7A55" fill-opacity=".8"/>
<polygon points="99.0,37.0 107.0,37.0 104.0,42.0 96.0,42.0" fill="#3E6F6A" fill-opacity=".8"/>
<polygon points="107.0,37.0 115.0,37.0 112.0,42.0 104.0,42.0" fill="#B5653E" fill-opacity=".8"/>
<line x1="50.0" y1="12.0" x2="32.0" y2="42.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="66.0" y1="12.0" x2="48.0" y2="42.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="82.0" y1="12.0" x2="64.0" y2="42.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="98.0" y1="12.0" x2="80.0" y2="42.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="114.0" y1="12.0" x2="96.0" y2="42.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="28.0" y1="22.0" x2="124.0" y2="22.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="22.0" y1="32.0" x2="118.0" y2="32.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<polygon points="76.0,22.0 92.0,22.0 86.0,32.0 70.0,32.0" fill="#F1F4F8" fill-opacity=".18" stroke="#F1F4F8" stroke-width="1.4"/>
<polygon points="34.0,58.0 130.0,58.0 112.0,88.0 16.0,88.0" fill="#0E1822" stroke="rgba(232,185,99,.55)" stroke-width="1"/>
<polyline points="90.1,73.0 89.1,74.5 86.8,75.7 84.3,76.3 82.0,76.6 80.1,76.9 78.1,77.4 75.6,77.9 73.1,77.8 71.5,77.0 71.3,75.7 72.4,74.2 73.8,73.0 74.8,72.0 75.6,70.8 76.8,69.4 78.9,68.2 81.5,67.5 83.9,67.7 85.4,68.5 86.3,69.4 87.1,70.2 88.4,70.8 89.6,71.7 90.1,73.0" fill="none" stroke="#6FB5E0" stroke-opacity="0.80" stroke-width="1"/>
<polyline points="99.7,73.0 95.8,75.7 91.1,77.5 86.9,78.7 83.3,80.0 79.4,81.8 74.4,83.4 69.2,83.9 65.3,82.8 64.0,80.3 64.9,77.5 66.3,75.1 67.0,73.0 67.3,70.6 68.6,67.8 72.0,65.0 77.0,63.2 82.2,63.1 86.1,64.0 88.9,65.2 91.7,66.0 95.3,66.6 99.0,67.8 100.9,70.1 99.7,73.0" fill="none" stroke="#6FB5E0" stroke-opacity="0.70" stroke-width="1"/>
<polyline points="105.8,73.0 99.8,76.4 94.5,79.0 90.2,81.8 85.2,85.3" fill="none" stroke="#6FB5E0" stroke-opacity="0.60" stroke-width="1"/>
<polyline points="60.4,85.9 59.7,82.2 59.7,79.0 58.5,76.2 56.8,73.0 57.0,68.8 60.8,64.4 67.9,61.2 75.9,60.1 82.5,60.5 87.8,61.1 93.3,61.0 100.0,60.7 106.7,61.6 110.8,64.4 110.3,68.7 105.8,73.0" fill="none" stroke="#6FB5E0" stroke-opacity="0.60" stroke-width="1"/>
<polyline points="108.9,73.0 104.1,77.1 100.5,81.5 95.7,86.9" fill="none" stroke="#6FB5E0" stroke-opacity="0.50" stroke-width="1"/>
<polyline points="57.9,87.5 55.0,84.2 50.6,81.5 45.7,78.1 43.6,73.0 47.0,67.1 55.6,62.2 66.0,59.5 75.3,58.5" fill="none" stroke="#6FB5E0" stroke-opacity="0.50" stroke-width="1"/>
<polyline points="118.8,62.2 114.8,68.0 108.9,73.0" fill="none" stroke="#6FB5E0" stroke-opacity="0.50" stroke-width="1"/>
<polyline points="114.4,73.0 113.3,78.7 110.2,85.7" fill="none" stroke="#6FB5E0" stroke-opacity="0.40" stroke-width="1"/>
<polyline points="35.9,85.7 30.7,80.3 32.8,73.0 42.0,66.2 54.0,61.5 65.0,58.6" fill="none" stroke="#6FB5E0" stroke-opacity="0.40" stroke-width="1"/>
<polyline points="121.1,61.5 117.0,67.7 114.4,73.0" fill="none" stroke="#6FB5E0" stroke-opacity="0.40" stroke-width="1"/>
<line x1="50.0" y1="58.0" x2="32.0" y2="88.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="66.0" y1="58.0" x2="48.0" y2="88.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="82.0" y1="58.0" x2="64.0" y2="88.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="98.0" y1="58.0" x2="80.0" y2="88.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="114.0" y1="58.0" x2="96.0" y2="88.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="28.0" y1="68.0" x2="124.0" y2="68.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="22.0" y1="78.0" x2="118.0" y2="78.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<polygon points="76.0,68.0 92.0,68.0 86.0,78.0 70.0,78.0" fill="#F1F4F8" fill-opacity=".18" stroke="#F1F4F8" stroke-width="1.4"/>
<polygon points="34.0,104.0 130.0,104.0 112.0,134.0 16.0,134.0" fill="#0E1822" stroke="rgba(232,185,99,.55)" stroke-width="1"/>
<circle cx="53.9" cy="132.7" r="0.9" fill="#E8B963" fill-opacity="0.36"/>
<circle cx="115.3" cy="104.0" r="0.9" fill="#E8B963" fill-opacity="0.35"/>
<circle cx="37.7" cy="131.3" r="0.9" fill="#E8B963" fill-opacity="0.35"/>
<circle cx="61.5" cy="133.4" r="0.9" fill="#E8B963" fill-opacity="0.35"/>
<circle cx="70.8" cy="106.2" r="1.0" fill="#E8B963" fill-opacity="0.39"/>
<circle cx="80.4" cy="127.4" r="1.2" fill="#E8B963" fill-opacity="0.44"/>
<circle cx="58.3" cy="106.6" r="1.0" fill="#E8B963" fill-opacity="0.37"/>
<circle cx="48.6" cy="132.9" r="0.9" fill="#E8B963" fill-opacity="0.35"/>
<circle cx="104.6" cy="107.5" r="1.1" fill="#E8B963" fill-opacity="0.40"/>
<circle cx="55.8" cy="107.0" r="1.0" fill="#E8B963" fill-opacity="0.37"/>
<circle cx="25.4" cy="127.9" r="0.9" fill="#E8B963" fill-opacity="0.35"/>
<circle cx="41.0" cy="120.8" r="1.1" fill="#E8B963" fill-opacity="0.40"/>
<circle cx="73.5" cy="109.7" r="1.5" fill="#E8B963" fill-opacity="0.51"/>
<circle cx="101.9" cy="107.9" r="1.1" fill="#E8B963" fill-opacity="0.41"/>
<circle cx="93.7" cy="107.5" r="1.2" fill="#E8B963" fill-opacity="0.43"/>
<circle cx="70.6" cy="110.4" r="1.6" fill="#E8B963" fill-opacity="0.53"/>
<circle cx="42.4" cy="133.1" r="0.9" fill="#E8B963" fill-opacity="0.35"/>
<circle cx="105.7" cy="113.1" r="1.4" fill="#E8B963" fill-opacity="0.49"/>
<circle cx="115.2" cy="110.3" r="1.0" fill="#E8B963" fill-opacity="0.39"/>
<circle cx="56.5" cy="129.6" r="1.0" fill="#E8B963" fill-opacity="0.38"/>
<circle cx="93.8" cy="107.0" r="1.1" fill="#E8B963" fill-opacity="0.42"/>
<circle cx="125.1" cy="110.4" r="0.9" fill="#E8B963" fill-opacity="0.36"/>
<circle cx="44.9" cy="127.2" r="1.0" fill="#E8B963" fill-opacity="0.38"/>
<circle cx="60.2" cy="112.9" r="1.6" fill="#E8B963" fill-opacity="0.53"/>
<circle cx="39.4" cy="106.7" r="0.9" fill="#E8B963" fill-opacity="0.35"/>
<circle cx="85.6" cy="111.3" r="2.0" fill="#E8B963" fill-opacity="0.64"/>
<circle cx="85.0" cy="115.2" r="2.8" fill="#E8B963" fill-opacity="0.87"/>
<circle cx="60.2" cy="132.8" r="0.9" fill="#E8B963" fill-opacity="0.36"/>
<circle cx="70.1" cy="121.2" r="2.5" fill="#E8B963" fill-opacity="0.78"/>
<circle cx="113.9" cy="109.5" r="1.0" fill="#E8B963" fill-opacity="0.38"/>
<line x1="50.0" y1="104.0" x2="32.0" y2="134.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="66.0" y1="104.0" x2="48.0" y2="134.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="82.0" y1="104.0" x2="64.0" y2="134.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="98.0" y1="104.0" x2="80.0" y2="134.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="114.0" y1="104.0" x2="96.0" y2="134.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="28.0" y1="114.0" x2="124.0" y2="114.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<line x1="22.0" y1="124.0" x2="118.0" y2="124.0" stroke="#F1F4F8" stroke-opacity=".22" stroke-width=".6"/>
<polygon points="76.0,114.0 92.0,114.0 86.0,124.0 70.0,124.0" fill="#F1F4F8" fill-opacity=".18" stroke="#F1F4F8" stroke-width="1.4"/>
<line x1="81.0" y1="27.0" x2="81.0" y2="119.0" stroke="#F1F4F8" stroke-width="1" stroke-dasharray="2 2.5"/>
<circle cx="81.0" cy="27.0" r="1.8" fill="#F1F4F8"/>
<circle cx="81.0" cy="73.0" r="1.8" fill="#F1F4F8"/>
<circle cx="81.0" cy="119.0" r="1.8" fill="#F1F4F8"/>
<path d="M85.0 73.0 H141" stroke="#F1F4F8" stroke-opacity=".6" stroke-width="1"/>
<path d="M138 70.0 L142 73.0 L138 76.0" fill="none" stroke="#F1F4F8" stroke-opacity=".6" stroke-width="1"/>
<rect x="146" y="59.0" width="16" height="8" fill="#8C7A4E"/>
<rect x="146" y="69.0" width="16" height="8" fill="#6FB5E0"/>
<rect x="146" y="79.0" width="16" height="8" fill="#E8B963"/>
<path d="M165 59.0 h2 v28 h-2" fill="none" stroke="#F1F4F8" stroke-opacity=".5" stroke-width=".8"/>
</svg></figure>
          <h3>Upload your exploration data</h3>
          <p>Securely upload the exploration data your team has already collected. It is combined with our own dataset: decades of cluttered public geological data that we have cleaned and sorted so a model can learn from it.</p>
          <ul class="pa2-chips"><li>Geochemistry</li><li>Structural &amp; lithology</li><li>Geophysics, geothermal &amp; topography</li><li>Your survey and drill data</li></ul>
        </li>
        <li class="pa2-step">
          <div class="pa2-top"><span class="pa2-num">02</span><span class="pa2-kind">Training</span></div>
          <figure class="pa2-art"><svg viewBox="0 0 170 150" aria-hidden="true">
<defs><pattern id="trHatchP" width="4" height="4" patternUnits="userSpaceOnUse" patternTransform="rotate(45)"><line x1="0" y1="0" x2="0" y2="4" stroke="#6FB5E0" stroke-opacity=".35" stroke-width="1"/></pattern></defs>
<ellipse cx="52" cy="40" rx="10.0" ry="6.8" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(15 52 40)"/>
<ellipse cx="52" cy="40" rx="18.8" ry="12.8" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(15 52 40)"/>
<ellipse cx="52" cy="40" rx="27.5" ry="18.7" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(15 52 40)"/>
<ellipse cx="52" cy="40" rx="36.2" ry="24.6" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(15 52 40)"/>
<ellipse cx="52" cy="40" rx="45.0" ry="30.6" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(15 52 40)"/>
<ellipse cx="112" cy="58" rx="10.0" ry="6.8" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(40 112 58)"/>
<ellipse cx="112" cy="58" rx="18.8" ry="12.8" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(40 112 58)"/>
<ellipse cx="112" cy="58" rx="27.5" ry="18.7" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(40 112 58)"/>
<ellipse cx="112" cy="58" rx="36.2" ry="24.6" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(40 112 58)"/>
<ellipse cx="112" cy="58" rx="45.0" ry="30.6" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(40 112 58)"/>
<ellipse cx="80" cy="98" rx="10.0" ry="6.8" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(65 80 98)"/>
<ellipse cx="80" cy="98" rx="18.8" ry="12.8" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(65 80 98)"/>
<ellipse cx="80" cy="98" rx="27.5" ry="18.7" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(65 80 98)"/>
<ellipse cx="80" cy="98" rx="36.2" ry="24.6" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(65 80 98)"/>
<ellipse cx="80" cy="98" rx="45.0" ry="30.6" fill="none" stroke="#F1F4F8" stroke-opacity=".1" stroke-width=".6" transform="rotate(65 80 98)"/>
<rect x="12.40" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.07"/>
<rect x="19.10" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.11"/>
<rect x="25.80" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.18"/>
<rect x="32.50" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.25"/>
<rect x="12.40" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.10"/>
<rect x="19.10" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.16"/>
<rect x="25.80" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.25"/>
<rect x="32.50" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.36"/>
<rect x="12.40" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.11"/>
<rect x="19.10" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.20"/>
<rect x="25.80" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.32"/>
<rect x="32.50" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.48"/>
<rect x="12.40" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.13"/>
<rect x="19.10" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.23"/>
<rect x="25.80" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.39"/>
<rect x="32.50" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.57"/>
<rect x="12.00" y="12.00" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="42.20" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.34"/>
<rect x="48.90" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.36"/>
<rect x="55.60" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.34"/>
<rect x="62.30" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.29"/>
<rect x="42.20" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.51"/>
<rect x="48.90" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.54"/>
<rect x="55.60" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.51"/>
<rect x="62.30" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.42"/>
<rect x="42.20" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.68"/>
<rect x="48.90" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.73"/>
<rect x="55.60" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.69"/>
<rect x="62.30" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.57"/>
<rect x="42.20" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.82"/>
<rect x="48.90" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.88"/>
<rect x="55.60" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.84"/>
<rect x="62.30" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.69"/>
<rect x="41.80" y="12.00" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="72.00" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.18"/>
<rect x="78.70" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.12"/>
<rect x="85.40" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.09"/>
<rect x="92.10" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.07"/>
<rect x="72.00" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.26"/>
<rect x="78.70" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.18"/>
<rect x="85.40" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.13"/>
<rect x="92.10" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.10"/>
<rect x="72.00" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.36"/>
<rect x="78.70" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.25"/>
<rect x="85.40" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.18"/>
<rect x="92.10" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.16"/>
<rect x="72.00" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.45"/>
<rect x="78.70" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.32"/>
<rect x="85.40" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.26"/>
<rect x="92.10" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.25"/>
<rect x="71.60" y="12.00" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="101.80" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.07"/>
<rect x="108.50" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.08"/>
<rect x="115.20" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.12"/>
<rect x="121.90" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.21"/>
<rect x="101.80" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.10"/>
<rect x="108.50" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.12"/>
<rect x="115.20" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.18"/>
<rect x="121.90" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.27"/>
<rect x="101.80" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.17"/>
<rect x="108.50" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.20"/>
<rect x="115.20" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.25"/>
<rect x="121.90" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.34"/>
<rect x="101.80" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.29"/>
<rect x="108.50" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.32"/>
<rect x="115.20" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.35"/>
<rect x="121.90" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.39"/>
<rect x="101.40" y="12.00" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="131.60" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.35"/>
<rect x="138.30" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.38"/>
<rect x="145.00" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.30"/>
<rect x="151.70" y="12.40" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.18"/>
<rect x="131.60" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.45"/>
<rect x="138.30" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.46"/>
<rect x="145.00" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.36"/>
<rect x="151.70" y="18.59" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.21"/>
<rect x="131.60" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.46"/>
<rect x="138.30" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.45"/>
<rect x="145.00" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.34"/>
<rect x="151.70" y="24.77" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.20"/>
<rect x="131.60" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.42"/>
<rect x="138.30" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.36"/>
<rect x="145.00" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.26"/>
<rect x="151.70" y="30.96" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.15"/>
<rect x="131.20" y="12.00" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="12.40" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.14"/>
<rect x="19.10" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.24"/>
<rect x="25.80" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.41"/>
<rect x="32.50" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.61"/>
<rect x="12.40" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.13"/>
<rect x="19.10" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.22"/>
<rect x="25.80" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.36"/>
<rect x="32.50" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.54"/>
<rect x="12.40" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.11"/>
<rect x="19.10" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.18"/>
<rect x="25.80" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.30"/>
<rect x="32.50" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.43"/>
<rect x="12.40" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.09"/>
<rect x="19.10" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.15"/>
<rect x="25.80" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.23"/>
<rect x="32.50" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.32"/>
<rect x="12.00" y="39.75" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="42.20" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.86"/>
<rect x="48.90" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.94"/>
<rect x="55.60" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.90"/>
<rect x="62.30" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.75"/>
<rect x="42.20" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.79"/>
<rect x="48.90" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.86"/>
<rect x="55.60" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.82"/>
<rect x="62.30" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.71"/>
<rect x="42.20" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.62"/>
<rect x="48.90" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.69"/>
<rect x="55.60" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.68"/>
<rect x="62.30" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.61"/>
<rect x="42.20" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.48"/>
<rect x="48.90" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.53"/>
<rect x="55.60" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.54"/>
<rect x="62.30" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.51"/>
<rect x="41.80" y="39.75" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="72.00" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.53"/>
<rect x="78.70" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.42"/>
<rect x="85.40" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.41"/>
<rect x="92.10" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.45"/>
<rect x="72.00" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.53"/>
<rect x="78.70" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.46"/>
<rect x="85.40" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.48"/>
<rect x="92.10" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.59"/>
<rect x="72.00" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.49"/>
<rect x="78.70" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.48"/>
<rect x="85.40" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.54"/>
<rect x="92.10" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.68"/>
<rect x="72.00" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.46"/>
<rect x="78.70" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.48"/>
<rect x="85.40" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.56"/>
<rect x="92.10" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.71"/>
<rect x="71.60" y="39.75" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="101.80" y="40.15" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.57"/>
<rect x="108.50" y="40.15" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.61"/>
<rect x="115.20" y="40.15" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.59"/>
<rect x="121.90" y="40.15" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.49"/>
<rect x="101.80" y="46.34" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.79"/>
<rect x="108.50" y="46.34" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.84"/>
<rect x="115.20" y="46.34" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.77"/>
<rect x="121.90" y="46.34" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.61"/>
<rect x="101.80" y="52.52" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.94"/>
<rect x="108.50" y="52.52" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.94"/>
<rect x="115.20" y="52.52" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.88"/>
<rect x="121.90" y="52.52" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.66"/>
<rect x="101.80" y="58.71" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.94"/>
<rect x="108.50" y="58.71" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.94"/>
<rect x="115.20" y="58.71" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.88"/>
<rect x="121.90" y="58.71" width="5.90" height="5.39" fill="#6FB5E0" fill-opacity="0.64"/>
<rect x="101.40" y="39.75" width="26.80" height="24.75" fill="url(#trHatchP)"/>
<rect x="99.90" y="38.25" width="29.80" height="27.75" fill="none" stroke="#6FB5E0" stroke-width="1.3" stroke-dasharray="3 2"/>
<text x="114.80" y="35.75" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="6" font-weight="700" letter-spacing=".8" fill="#6FB5E0">TEST</text>
<rect x="131.60" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.34"/>
<rect x="138.30" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.24"/>
<rect x="145.00" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.15"/>
<rect x="151.70" y="40.15" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.08"/>
<rect x="131.60" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.32"/>
<rect x="138.30" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.20"/>
<rect x="145.00" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.11"/>
<rect x="151.70" y="46.34" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.07"/>
<rect x="131.60" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.32"/>
<rect x="138.30" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.18"/>
<rect x="145.00" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.09"/>
<rect x="151.70" y="52.52" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.06"/>
<rect x="131.60" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.30"/>
<rect x="138.30" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.16"/>
<rect x="145.00" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.08"/>
<rect x="151.70" y="58.71" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.05"/>
<rect x="131.20" y="39.75" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="12.40" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.07"/>
<rect x="19.10" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.11"/>
<rect x="25.80" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.16"/>
<rect x="32.50" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.22"/>
<rect x="12.40" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.08"/>
<rect x="19.10" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.11"/>
<rect x="25.80" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.16"/>
<rect x="32.50" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.21"/>
<rect x="12.40" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.10"/>
<rect x="19.10" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.16"/>
<rect x="25.80" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.21"/>
<rect x="32.50" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.24"/>
<rect x="12.40" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.13"/>
<rect x="19.10" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.22"/>
<rect x="25.80" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.29"/>
<rect x="32.50" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.31"/>
<rect x="12.00" y="67.50" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="42.20" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.30"/>
<rect x="48.90" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.35"/>
<rect x="55.60" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.39"/>
<rect x="62.30" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.42"/>
<rect x="42.20" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.25"/>
<rect x="48.90" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.30"/>
<rect x="55.60" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.35"/>
<rect x="62.30" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.42"/>
<rect x="42.20" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.25"/>
<rect x="48.90" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.29"/>
<rect x="55.60" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.35"/>
<rect x="62.30" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.45"/>
<rect x="42.20" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.29"/>
<rect x="48.90" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.30"/>
<rect x="55.60" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.38"/>
<rect x="62.30" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.48"/>
<rect x="41.80" y="67.50" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="72.00" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.46"/>
<rect x="78.70" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.49"/>
<rect x="85.40" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.56"/>
<rect x="92.10" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.66"/>
<rect x="72.00" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.49"/>
<rect x="78.70" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.54"/>
<rect x="85.40" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.57"/>
<rect x="92.10" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.61"/>
<rect x="72.00" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.57"/>
<rect x="78.70" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.61"/>
<rect x="85.40" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.61"/>
<rect x="92.10" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.57"/>
<rect x="72.00" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.64"/>
<rect x="78.70" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.68"/>
<rect x="85.40" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.64"/>
<rect x="92.10" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.56"/>
<rect x="71.60" y="67.50" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="101.80" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.79"/>
<rect x="108.50" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.79"/>
<rect x="115.20" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.66"/>
<rect x="121.90" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.48"/>
<rect x="101.80" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.62"/>
<rect x="108.50" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.57"/>
<rect x="115.20" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.46"/>
<rect x="121.90" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.32"/>
<rect x="101.80" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.48"/>
<rect x="108.50" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.39"/>
<rect x="115.20" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.30"/>
<rect x="121.90" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.21"/>
<rect x="101.80" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.38"/>
<rect x="108.50" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.27"/>
<rect x="115.20" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.20"/>
<rect x="121.90" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.13"/>
<rect x="101.40" y="67.50" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="131.60" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.22"/>
<rect x="138.30" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.11"/>
<rect x="145.00" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.07"/>
<rect x="151.70" y="67.90" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.05"/>
<rect x="131.60" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.16"/>
<rect x="138.30" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.08"/>
<rect x="145.00" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.06"/>
<rect x="151.70" y="74.09" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.05"/>
<rect x="131.60" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.11"/>
<rect x="138.30" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.07"/>
<rect x="145.00" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.05"/>
<rect x="151.70" y="80.28" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="131.60" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.07"/>
<rect x="138.30" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.05"/>
<rect x="145.00" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="151.70" y="86.46" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="131.20" y="67.50" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="12.40" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.18"/>
<rect x="19.10" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.29"/>
<rect x="25.80" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.38"/>
<rect x="32.50" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.39"/>
<rect x="12.40" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.16"/>
<rect x="19.10" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.26"/>
<rect x="25.80" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.35"/>
<rect x="32.50" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.35"/>
<rect x="12.40" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.12"/>
<rect x="19.10" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.20"/>
<rect x="25.80" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.25"/>
<rect x="32.50" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.25"/>
<rect x="12.40" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.08"/>
<rect x="19.10" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.11"/>
<rect x="25.80" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.15"/>
<rect x="32.50" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.15"/>
<rect x="12.00" y="95.25" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="42.20" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.32"/>
<rect x="48.90" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.31"/>
<rect x="55.60" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.38"/>
<rect x="62.30" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.49"/>
<rect x="42.20" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.29"/>
<rect x="48.90" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.27"/>
<rect x="55.60" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.34"/>
<rect x="62.30" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.45"/>
<rect x="42.20" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.22"/>
<rect x="48.90" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.22"/>
<rect x="55.60" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.26"/>
<rect x="62.30" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.35"/>
<rect x="42.20" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.14"/>
<rect x="48.90" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.15"/>
<rect x="55.60" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.18"/>
<rect x="62.30" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.25"/>
<rect x="41.80" y="95.25" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="72.00" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.68"/>
<rect x="78.70" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.71"/>
<rect x="85.40" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.64"/>
<rect x="92.10" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.49"/>
<rect x="72.00" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.61"/>
<rect x="78.70" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.62"/>
<rect x="85.40" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.56"/>
<rect x="92.10" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.43"/>
<rect x="72.00" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.48"/>
<rect x="78.70" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.49"/>
<rect x="85.40" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.45"/>
<rect x="92.10" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.34"/>
<rect x="72.00" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.34"/>
<rect x="78.70" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.35"/>
<rect x="85.40" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.31"/>
<rect x="92.10" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.24"/>
<rect x="71.60" y="95.25" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="101.80" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.29"/>
<rect x="108.50" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.18"/>
<rect x="115.20" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.11"/>
<rect x="121.90" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.07"/>
<rect x="101.80" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.24"/>
<rect x="108.50" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.14"/>
<rect x="115.20" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.08"/>
<rect x="121.90" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.06"/>
<rect x="101.80" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.18"/>
<rect x="108.50" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.11"/>
<rect x="115.20" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.07"/>
<rect x="121.90" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.05"/>
<rect x="101.80" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.13"/>
<rect x="108.50" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.08"/>
<rect x="115.20" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.06"/>
<rect x="121.90" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.05"/>
<rect x="101.40" y="95.25" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<rect x="131.60" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.05"/>
<rect x="138.30" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="145.00" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="151.70" y="95.65" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="131.60" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="138.30" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="145.00" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="151.70" y="101.84" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="131.60" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="138.30" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="145.00" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="151.70" y="108.03" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="131.60" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="138.30" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="145.00" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="151.70" y="114.21" width="5.90" height="5.39" fill="#E8B963" fill-opacity="0.04"/>
<rect x="131.20" y="95.25" width="26.80" height="24.75" fill="none" stroke="rgba(232,185,99,.32)" stroke-width=".7"/>
<polygon points="50.77,37.60 48.00,39.20 45.23,37.60 45.23,34.40 48.00,32.80 50.77,34.40" fill="#E8B963" stroke="#0B121A" stroke-width=".8"/>
<polygon points="60.77,47.60 58.00,49.20 55.23,47.60 55.23,44.40 58.00,42.80 60.77,44.40" fill="#E8B963" stroke="#0B121A" stroke-width=".8"/>
<polygon points="86.77,97.60 84.00,99.20 81.23,97.60 81.23,94.40 84.00,92.80 86.77,94.40" fill="#E8B963" stroke="#0B121A" stroke-width=".8"/>
<polygon points="78.77,103.60 76.00,105.20 73.23,103.60 73.23,100.40 76.00,98.80 78.77,100.40" fill="#E8B963" stroke="#0B121A" stroke-width=".8"/>
<polygon points="142.77,25.60 140.00,27.20 137.23,25.60 137.23,22.40 140.00,20.80 142.77,22.40" fill="#E8B963" stroke="#0B121A" stroke-width=".8"/>
<polygon points="32.77,99.60 30.00,101.20 27.23,99.60 27.23,96.40 30.00,94.80 32.77,96.40" fill="#E8B963" stroke="#0B121A" stroke-width=".8"/>
<circle cx="118.02" cy="53.36" r="5" fill="none" stroke="#F1F4F8" stroke-width="1"/>
<polygon points="120.27,54.66 118.02,55.96 115.76,54.66 115.76,52.06 118.02,50.76 120.27,52.06" fill="#F1F4F8"/>
<circle cx="109.44" cy="47.17" r="5" fill="none" stroke="#F1F4F8" stroke-width="1"/>
<polygon points="111.69,48.47 109.44,49.77 107.19,48.47 107.19,45.88 109.44,44.57 111.69,45.87" fill="#F1F4F8"/>
<line x1="12.0" y1="123" x2="12.0" y2="125.5" stroke="#F1F4F8" stroke-opacity=".3" stroke-width=".6"/>
<line x1="41.2" y1="123" x2="41.2" y2="125.5" stroke="#F1F4F8" stroke-opacity=".3" stroke-width=".6"/>
<line x1="70.4" y1="123" x2="70.4" y2="125.5" stroke="#F1F4F8" stroke-opacity=".3" stroke-width=".6"/>
<line x1="99.6" y1="123" x2="99.6" y2="125.5" stroke="#F1F4F8" stroke-opacity=".3" stroke-width=".6"/>
<line x1="128.8" y1="123" x2="128.8" y2="125.5" stroke="#F1F4F8" stroke-opacity=".3" stroke-width=".6"/>
<line x1="158.0" y1="123" x2="158.0" y2="125.5" stroke="#F1F4F8" stroke-opacity=".3" stroke-width=".6"/>
<line x1="12" y1="123" x2="158" y2="123" stroke="#F1F4F8" stroke-opacity=".3" stroke-width=".6"/>
</svg></figure>
          <h3>Models built for one mineral, one region</h3>
          <p>An ensemble of XGBoost and LightGBM models scores your ground using our proprietary featuresets: in-house lists of the geological features that indicate lithium mineralization. Each customer's model is kept separate.</p>
          <ul class="pa2-chips"><li>Your data used only for you</li><li>XGBoost + LightGBM ensemble</li><li>Proprietary featuresets</li><li>Spatial block cross-validation</li></ul>
        </li>
        <li class="pa2-step">
          <div class="pa2-top"><span class="pa2-num">03</span><span class="pa2-kind">Output</span></div>
          <figure class="pa2-art pa2-art-out">
            <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/model-run-heatmap.webp?ver=' . filemtime( get_stylesheet_directory() . '/assets/img/model-run-heatmap.webp' ) ); ?>" alt="" loading="lazy" width="1168" height="1128">
            <ol class="pa2-rank" aria-hidden="true"><li><b>T-01</b><i style="--w:92%"></i></li><li><b>T-02</b><i style="--w:81%"></i></li><li><b>T-03</b><i style="--w:74%"></i></li><li><b>T-04</b><i style="--w:63%"></i></li><li><b>T-05</b><i style="--w:55%"></i></li></ol>
          </figure>
          <h3>Ranked targets, ready to review</h3>
          <p>You get a prospectivity heat map of your area of interest and a ranked list of drill targets. A 3D view and analysis tools help your geologists narrow down where to drill.</p>
          <ul class="pa2-chips"><li>Prospectivity heat map</li><li>Ranked drill targets</li><li>3D view of the target area</li><li>Geoanalysis tools</li></ul>
        </li>
      </ol>
    </div>
  </section>

  <!-- ═══════════════ PROOF: GREAT BASIN PROTOTYPE ═══════════════ -->
  <section class="pdt-proof-sec pdt-proof2">
    <div class="xr-container">
      <div class="pdt-proof-intro xr-reveal">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Proof of Concept</span>
        <h2>The Great Basin<br>lithium prototype.</h2>
        <p>Our first model scores every 1x1 km cell across the Great Basin region of the United States for lithium. It is a prototype and the base for the finer models we are building, but its early results show the approach works.</p>
      </div>

      <div class="pp-grid">
        <figure class="pp-map xr-reveal">
          <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/model-run-heatmap.webp?ver=' . filemtime( get_stylesheet_directory() . '/assets/img/model-run-heatmap.webp' ) ); ?>" alt="Prospectivity heat map from a recent X-Ray model run, with the highest-scoring cells in gold" width="1168" height="1128" loading="lazy">
          <figcaption>
            <span>Heat map from a recent model run</span>
            <span class="pp-legend"><em>Low</em><i></i><em>High</em></span>
          </figcaption>
          <p class="pp-map-note">Each cell is 1x1 km. Gold cells are where the model sees the strongest signs of lithium, and they are where a geologist would look first.</p>
        </figure>

        <div class="pp-metrics">
          <div class="pp-metric xr-reveal xr-d1" id="pp-recall">
            <div class="pp-metric-top">
              <div>
                <div class="pp-eyebrow">Recall · known deposits</div>
                <div class="pp-num">95%</div>
              </div>
              <div class="pp-hexgrid pp-hexgrid-100" aria-hidden="true"><i class="on" style="--d:0ms"></i><i class="on" style="--d:35ms"></i><i class="on" style="--d:70ms"></i><i class="on" style="--d:105ms"></i><i class="on" style="--d:140ms"></i><i class="on" style="--d:175ms"></i><i class="on" style="--d:210ms"></i><i class="on" style="--d:245ms"></i><i class="on" style="--d:280ms"></i><i class="on" style="--d:315ms"></i><i class="on" style="--d:35ms"></i><i class="on" style="--d:70ms"></i><i class="on" style="--d:105ms"></i><i class="on" style="--d:140ms"></i><i class="on" style="--d:175ms"></i><i class="on" style="--d:210ms"></i><i class="on" style="--d:245ms"></i><i class="on" style="--d:280ms"></i><i class="on" style="--d:315ms"></i><i class="on" style="--d:350ms"></i><i class="on" style="--d:70ms"></i><i class="on" style="--d:105ms"></i><i class="on" style="--d:140ms"></i><i class="on" style="--d:175ms"></i><i class="on" style="--d:210ms"></i><i class="on" style="--d:245ms"></i><i class="on" style="--d:280ms"></i><i class="on" style="--d:315ms"></i><i class="on" style="--d:350ms"></i><i class="on" style="--d:385ms"></i><i class="on" style="--d:105ms"></i><i class="on" style="--d:140ms"></i><i class="on" style="--d:175ms"></i><i class="on" style="--d:210ms"></i><i class="on" style="--d:245ms"></i><i class="on" style="--d:280ms"></i><i class="on" style="--d:315ms"></i><i class="on" style="--d:350ms"></i><i class="on" style="--d:385ms"></i><i class="on" style="--d:420ms"></i><i class="on" style="--d:140ms"></i><i class="on" style="--d:175ms"></i><i class="on" style="--d:210ms"></i><i class="on" style="--d:245ms"></i><i class="on" style="--d:280ms"></i><i class="on" style="--d:315ms"></i><i class="on" style="--d:350ms"></i><i class="on" style="--d:385ms"></i><i class="on" style="--d:420ms"></i><i class="on" style="--d:455ms"></i><i class="on" style="--d:175ms"></i><i class="on" style="--d:210ms"></i><i class="on" style="--d:245ms"></i><i class="on" style="--d:280ms"></i><i class="on" style="--d:315ms"></i><i class="on" style="--d:350ms"></i><i class="on" style="--d:385ms"></i><i class="on" style="--d:420ms"></i><i class="on" style="--d:455ms"></i><i class="on" style="--d:490ms"></i><i class="on" style="--d:210ms"></i><i class="on" style="--d:245ms"></i><i class="on" style="--d:280ms"></i><i class="on" style="--d:315ms"></i><i class="on" style="--d:350ms"></i><i class="on" style="--d:385ms"></i><i class="on" style="--d:420ms"></i><i class="on" style="--d:455ms"></i><i class="on" style="--d:490ms"></i><i class="on" style="--d:525ms"></i><i class="on" style="--d:245ms"></i><i class="on" style="--d:280ms"></i><i class="on" style="--d:315ms"></i><i class="on" style="--d:350ms"></i><i class="on" style="--d:385ms"></i><i class="on" style="--d:420ms"></i><i class="on" style="--d:455ms"></i><i class="on" style="--d:490ms"></i><i class="on" style="--d:525ms"></i><i class="on" style="--d:560ms"></i><i class="on" style="--d:280ms"></i><i class="on" style="--d:315ms"></i><i class="on" style="--d:350ms"></i><i class="on" style="--d:385ms"></i><i class="on" style="--d:420ms"></i><i class="on" style="--d:455ms"></i><i class="on" style="--d:490ms"></i><i class="on" style="--d:525ms"></i><i class="on" style="--d:560ms"></i><i class="on" style="--d:595ms"></i><i class="on" style="--d:315ms"></i><i class="on" style="--d:350ms"></i><i class="on" style="--d:385ms"></i><i class="on" style="--d:420ms"></i><i class="on" style="--d:455ms"></i><i class="" style="--d:490ms"></i><i class="" style="--d:525ms"></i><i class="" style="--d:560ms"></i><i class="" style="--d:595ms"></i><i class="" style="--d:630ms"></i></div>
            </div>
            <p><strong>It rarely misses known lithium.</strong> Out of every 100 known deposits in the Great Basin, the model flags 95 of them on average, so very little proven ground slips through.</p>
          </div>

          <div class="pp-metric sky xr-reveal xr-d2" id="pp-precision">
            <div class="pp-metric-top">
              <div>
                <div class="pp-eyebrow">Precision</div>
                <div class="pp-num">80%</div>
              </div>
              <div class="pp-hexgrid pp-hexgrid-10" aria-hidden="true"><i class="on" style="--d:0ms"></i><i class="on" style="--d:90ms"></i><i class="on" style="--d:180ms"></i><i class="on" style="--d:270ms"></i><i class="on" style="--d:360ms"></i><i class="on" style="--d:450ms"></i><i class="on" style="--d:540ms"></i><i class="on" style="--d:630ms"></i><i class="" style="--d:720ms"></i><i class="" style="--d:810ms"></i></div>
            </div>
            <p><strong>Most of its calls are real.</strong> About 8 in every 10 cells it flags hold lithium, so a team spends less time chasing false leads.</p>
          </div>
        </div>
      </div>

      <div class="pp-checks xr-reveal">
        <div class="pp-checks-head">How we checked it</div>
        <div class="pp-checks-row">
          <div class="pp-check"><span>01</span><strong>Trained on what's known</strong><small>Labels come from known mine sites, geochemistry and mining-claim data, combined with our cleaned geological datasets.</small></div>
          <div class="pp-check"><span>02</span><strong>Tested on unseen ground</strong><small>Spatial block cross-validation holds out whole areas of the map, so the model can't score well just by memorising neighbouring cells.</small></div>
          <div class="pp-check"><span>03</span><strong>Stress-tested</strong><small>Repeated stratified k-fold and leave-one-out cross-validation check that the results hold across many different splits of the data.</small></div>
        </div>
        <p class="pp-checks-note">Measured at 1x1 km against known deposits. Finer models and field testing against real boreholes come next.</p>
      </div>
    </div>
  </section>
  <script>
  (function () {
    var els = document.querySelectorAll('.pp-hexgrid');
    if (!('IntersectionObserver' in window)) { els.forEach(function (e) { e.classList.add('is-in'); }); return; }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); } });
    }, { threshold: 0.35 });
    els.forEach(function (e) { io.observe(e); });
  })();
  </script>

  <!-- ═══════════════ STATUS BOARD ═══════════════ -->
  <section class="pdt-status-sec">
    <div class="xr-container">
      <div class="pdt-status-intro xr-reveal">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Development Status</span>
        <h2>Where we are today.</h2>
        <p>We are pre-launch. Our Great Basin lithium model is a prototype that predicts to within 1x1 km, and mining companies need 1x1 m to place a borehole. We are using the prototype to build a series of finer models that will get there.</p>
      </div>

      <ol class="ps2 xr-reveal">
        <li class="ps2-item is-now">
          <div class="ps2-when">Now</div>
          <span class="ps2-node" aria-hidden="true"></span>
          <div class="ps2-art" aria-hidden="true"><svg viewBox="0 0 140 140" aria-hidden="true"><rect x="10.00" y="10.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.23"/><rect x="40.00" y="10.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.51"/><rect x="70.00" y="10.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.65"/><rect x="100.00" y="10.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.45"/><rect x="10.00" y="40.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.32"/><rect x="40.00" y="40.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.74"/><rect x="70.00" y="40.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.95"/><rect x="100.00" y="40.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.65"/><rect x="10.00" y="70.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.25"/><rect x="40.00" y="70.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.57"/><rect x="70.00" y="70.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.74"/><rect x="100.00" y="70.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.51"/><rect x="10.00" y="100.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.13"/><rect x="40.00" y="100.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.25"/><rect x="70.00" y="100.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.32"/><rect x="100.00" y="100.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.23"/></svg></div>
          <div class="ps2-body">
            <div class="ps2-head"><h3>Great Basin lithium prototype</h3><span class="ps2-pill">Prototype</span></div>
            <p>Our first model predicts lithium across the Great Basin, but only to within 1&times;1&nbsp;km cells. It is not finished and not precise enough for mining companies to use yet. It is the base the finer models build on.</p>
          </div>
        </li>
        <li class="ps2-item is-active">
          <div class="ps2-when">In progress</div>
          <span class="ps2-node" aria-hidden="true"></span>
          <div class="ps2-art" aria-hidden="true"><svg viewBox="0 0 140 140" aria-hidden="true"><rect x="10.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="32.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="40.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="47.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="55.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="62.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="70.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.14"/><rect x="77.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="85.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.14"/><rect x="92.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="100.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.11"/><rect x="107.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="115.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="122.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="10.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="32.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="40.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="47.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="55.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="62.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.19"/><rect x="70.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.22"/><rect x="77.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.24"/><rect x="85.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.23"/><rect x="92.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.20"/><rect x="100.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.16"/><rect x="107.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="115.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="122.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="10.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="32.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="40.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="47.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.16"/><rect x="55.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.23"/><rect x="62.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.30"/><rect x="70.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.36"/><rect x="77.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.38"/><rect x="85.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.36"/><rect x="92.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.31"/><rect x="100.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.24"/><rect x="107.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.18"/><rect x="115.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="122.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="10.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="32.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="40.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="47.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.22"/><rect x="55.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.33"/><rect x="62.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.44"/><rect x="70.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.53"/><rect x="77.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.57"/><rect x="85.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.54"/><rect x="92.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.46"/><rect x="100.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.35"/><rect x="107.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.24"/><rect x="115.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.16"/><rect x="122.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.11"/><rect x="10.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="32.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="40.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.18"/><rect x="47.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.29"/><rect x="55.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.43"/><rect x="62.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.58"/><rect x="70.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.71"/><rect x="77.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.76"/><rect x="85.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.73"/><rect x="92.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.61"/><rect x="100.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.46"/><rect x="107.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.31"/><rect x="115.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.20"/><rect x="122.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="10.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="32.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="40.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.21"/><rect x="47.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.33"/><rect x="55.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.51"/><rect x="62.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.69"/><rect x="70.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.85"/><rect x="77.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.91"/><rect x="85.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.87"/><rect x="92.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.73"/><rect x="100.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.54"/><rect x="107.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.36"/><rect x="115.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.23"/><rect x="122.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.14"/><rect x="10.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="32.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="40.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.22"/><rect x="47.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.35"/><rect x="55.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.53"/><rect x="62.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.73"/><rect x="70.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.89"/><rect x="77.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.96"/><rect x="85.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.91"/><rect x="92.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.76"/><rect x="100.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.57"/><rect x="107.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.38"/><rect x="115.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.24"/><rect x="122.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="10.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="32.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="40.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.20"/><rect x="47.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.33"/><rect x="55.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.49"/><rect x="62.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.68"/><rect x="70.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.82"/><rect x="77.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.89"/><rect x="85.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.85"/><rect x="92.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.71"/><rect x="100.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.53"/><rect x="107.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.36"/><rect x="115.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.22"/><rect x="122.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.14"/><rect x="10.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="32.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.11"/><rect x="40.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.18"/><rect x="47.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.27"/><rect x="55.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.41"/><rect x="62.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.56"/><rect x="70.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.68"/><rect x="77.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.73"/><rect x="85.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.69"/><rect x="92.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.58"/><rect x="100.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.44"/><rect x="107.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.30"/><rect x="115.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.19"/><rect x="122.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="10.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="32.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="40.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.14"/><rect x="47.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.21"/><rect x="55.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.31"/><rect x="62.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.41"/><rect x="70.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.49"/><rect x="77.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.53"/><rect x="85.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.51"/><rect x="92.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.43"/><rect x="100.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.33"/><rect x="107.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.23"/><rect x="115.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="122.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="10.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="32.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="40.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.11"/><rect x="47.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="55.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.21"/><rect x="62.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.27"/><rect x="70.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.33"/><rect x="77.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.35"/><rect x="85.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.33"/><rect x="92.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.29"/><rect x="100.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.22"/><rect x="107.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.16"/><rect x="115.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="122.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="10.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="32.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="40.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="47.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.11"/><rect x="55.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.14"/><rect x="62.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.18"/><rect x="70.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.20"/><rect x="77.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.22"/><rect x="85.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.21"/><rect x="92.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.18"/><rect x="100.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="107.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="115.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="122.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="10.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="32.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="40.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="47.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="55.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="62.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.11"/><rect x="70.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="77.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="85.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="92.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="100.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="107.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="115.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="122.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="10.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="32.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="40.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="47.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="55.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="62.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="70.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="77.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="85.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="92.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="100.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="107.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="115.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="122.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="10.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="32.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="40.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="47.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="55.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="62.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="70.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="77.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="85.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="92.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="100.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="107.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="115.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="122.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="10.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="32.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="40.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="47.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="55.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="62.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="70.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="77.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="85.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="92.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="100.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="107.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="115.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="122.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/></svg></div>
          <div class="ps2-body">
            <div class="ps2-head"><h3>Finer models, down to 1&times;1&nbsp;m</h3><span class="ps2-pill">In development</span></div>
            <p>A series of models, each finer than the last, adding borehole logs from water wells, oil and gas wells and lithium drilling. The goal is predictions precise enough to place an individual borehole.</p>
          </div>
        </li>
        <li class="ps2-item is-soon">
          <div class="ps2-when">Next</div>
          <span class="ps2-node" aria-hidden="true"></span>
          <div class="ps2-art" aria-hidden="true"><svg viewBox="0 0 140 140" aria-hidden="true"><rect x="10" y="10" width="120" height="120" fill="#0B121A"/><polygon points="10,37.7 15,38.3 20,38.8 25,39.0 30,38.9 35,38.6 40,38.1 45,37.4 50,36.6 55,35.7 60,34.9 65,34.1 70,33.5 75,33.1 80,33.0 85,33.1 90,33.5 95,34.1 100,34.8 105,35.7 110,36.6 115,37.4 120,38.1 125,38.6 130,38.9 130,57.2 125,58.1 120,58.7 115,59.0 110,58.9 105,58.6 100,57.9 95,56.9 90,55.8 85,54.7 80,53.5 75,52.5 70,51.7 65,51.2 60,51.0 55,51.2 50,51.6 45,52.4 40,53.4 35,54.5 30,55.7 25,56.8 20,57.8 15,58.5 10,58.9" fill="#A88456" fill-opacity=".85"/><polyline points="10,37.7 15,38.3 20,38.8 25,39.0 30,38.9 35,38.6 40,38.1 45,37.4 50,36.6 55,35.7 60,34.9 65,34.1 70,33.5 75,33.1 80,33.0 85,33.1 90,33.5 95,34.1 100,34.8 105,35.7 110,36.6 115,37.4 120,38.1 125,38.6 130,38.9" fill="none" stroke="#0B121A" stroke-opacity=".5" stroke-width=".8"/><polygon points="10,58.9 15,58.5 20,57.8 25,56.8 30,55.7 35,54.5 40,53.4 45,52.4 50,51.6 55,51.2 60,51.0 65,51.2 70,51.7 75,52.5 80,53.5 85,54.7 90,55.8 95,56.9 100,57.9 105,58.6 110,58.9 115,59.0 120,58.7 125,58.1 130,57.2 130,71.7 125,72.9 120,74.1 115,75.1 110,76.0 105,76.6 100,77.0 95,76.9 90,76.6 85,75.9 80,75.0 75,73.9 70,72.7 65,71.6 60,70.6 55,69.8 50,69.2 45,69.0 40,69.1 35,69.6 30,70.4 25,71.3 20,72.5 15,73.6 10,74.8" fill="#B5653E" fill-opacity=".85"/><polyline points="10,58.9 15,58.5 20,57.8 25,56.8 30,55.7 35,54.5 40,53.4 45,52.4 50,51.6 55,51.2 60,51.0 65,51.2 70,51.7 75,52.5 80,53.5 85,54.7 90,55.8 95,56.9 100,57.9 105,58.6 110,58.9 115,59.0 120,58.7 125,58.1 130,57.2" fill="none" stroke="#0B121A" stroke-opacity=".5" stroke-width=".8"/><polygon points="10,74.8 15,73.6 20,72.5 25,71.3 30,70.4 35,69.6 40,69.1 45,69.0 50,69.2 55,69.8 60,70.6 65,71.6 70,72.7 75,73.9 80,75.0 85,75.9 90,76.6 95,76.9 100,77.0 105,76.6 110,76.0 115,75.1 120,74.1 125,72.9 130,71.7 130,94.9 125,95.0 120,94.8 115,94.3 110,93.7 105,92.9 100,92.0 95,91.1 90,90.3 85,89.7 80,89.2 75,89.0 70,89.1 65,89.4 60,89.9 55,90.6 50,91.4 45,92.3 40,93.1 35,93.9 30,94.5 25,94.9 20,95.0 15,94.9 10,94.5" fill="#6F7A4E" fill-opacity=".85"/><polyline points="10,74.8 15,73.6 20,72.5 25,71.3 30,70.4 35,69.6 40,69.1 45,69.0 50,69.2 55,69.8 60,70.6 65,71.6 70,72.7 75,73.9 80,75.0 85,75.9 90,76.6 95,76.9 100,77.0 105,76.6 110,76.0 115,75.1 120,74.1 125,72.9 130,71.7" fill="none" stroke="#0B121A" stroke-opacity=".5" stroke-width=".8"/><polygon points="10,94.5 15,94.9 20,95.0 25,94.9 30,94.5 35,93.9 40,93.1 45,92.3 50,91.4 55,90.6 60,89.9 65,89.4 70,89.1 75,89.0 80,89.2 85,89.7 90,90.3 95,91.1 100,92.0 105,92.9 110,93.7 115,94.3 120,94.8 125,95.0 130,94.9 130,130.0 125,130.0 120,130.0 115,130.0 110,130.0 105,130.0 100,130.0 95,130.0 90,130.0 85,130.0 80,130.0 75,130.0 70,130.0 65,130.0 60,130.0 55,130.0 50,130.0 45,130.0 40,130.0 35,130.0 30,130.0 25,130.0 20,130.0 15,130.0 10,130.0" fill="#7E8A88" fill-opacity=".85"/><polyline points="10,94.5 15,94.9 20,95.0 25,94.9 30,94.5 35,93.9 40,93.1 45,92.3 50,91.4 55,90.6 60,89.9 65,89.4 70,89.1 75,89.0 80,89.2 85,89.7 90,90.3 95,91.1 100,92.0 105,92.9 110,93.7 115,94.3 120,94.8 125,95.0 130,94.9" fill="none" stroke="#0B121A" stroke-opacity=".5" stroke-width=".8"/><polygon points="10,94.5 15,94.9 20,95.0 25,94.9 30,94.5 35,93.9 40,93.1 45,92.3 50,91.4 55,90.6 60,89.9 65,89.4 70,89.1 75,89.0 80,89.2 85,89.7 90,90.3 95,91.1 100,92.0 105,92.9 110,93.7 115,94.3 120,94.8 125,95.0 130,94.9 130,130 10,130" fill="#46536A"/><ellipse cx="88" cy="112" rx="22" ry="7" fill="#E8B963"/><ellipse cx="88" cy="112" rx="22" ry="7" fill="none" stroke="#FFE3A8" stroke-opacity=".7"/><path d="M80 33.3 L88 12 L96 33.3 M82.5 26.3 H93.5 M85 18.3 H91" fill="none" stroke="#6FB5E0" stroke-width="1.6" stroke-linejoin="round"/><rect x="76" y="31.3" width="24" height="3" fill="#6FB5E0"/><line x1="88" y1="33.3" x2="88" y2="98" stroke="#0B121A" stroke-width="5"/><line x1="88" y1="33.3" x2="88" y2="98" stroke="#F1F4F8" stroke-width="2"/><line x1="88" y1="98" x2="88" y2="105" stroke="#F1F4F8" stroke-width="2" stroke-dasharray="2 2" stroke-opacity=".7"/><path d="M85 98 L88 103 L91 98 Z" fill="#6FB5E0"/></svg></div>
          <div class="ps2-body">
            <div class="ps2-head"><h3>Field testing</h3><span class="ps2-pill">Planned</span></div>
            <p>Testing predictions on the ground against real boreholes and feeding the results back in, until the model is accurate enough to sell.</p>
          </div>
        </li>
        <li class="ps2-item is-soon">
          <div class="ps2-when">To build</div>
          <span class="ps2-node" aria-hidden="true"></span>
          <div class="ps2-art" aria-hidden="true"><svg viewBox="0 0 140 140" aria-hidden="true"><rect x="8" y="16" width="124" height="108" fill="#0B121A" stroke="rgba(232,185,99,.55)"/><line x1="8" y1="28" x2="132" y2="28" stroke="rgba(232,185,99,.35)"/><circle cx="15" cy="22" r="1.8" fill="rgba(232,185,99,.6)"/><circle cx="21" cy="22" r="1.8" fill="rgba(232,185,99,.4)"/><polygon points="16,67.8 19,64.1 22,63.0 25,64.2 28,66.3 31,67.9 34,68.3 37,67.4 40,66.4 43,66.5 46,68.8 49,73.1 52,78.5 55,83.4 58,85.9 61,85.1 64,81.3 82,67.3 79,71.1 76,71.9 73,69.4 70,64.5 67,59.1 64,54.8 61,52.5 58,52.4 55,53.4 52,54.3 49,53.9 46,52.3 43,50.2 40,49.0 37,50.1 34,53.8" fill="#5E7A55" fill-opacity=".9"/><polyline points="20.5,62.3 23.5,58.6 26.5,57.5 29.5,58.7 32.5,60.8 35.5,62.4 38.5,62.8 41.5,61.9 44.5,60.9 47.5,61.0 50.5,63.3 53.5,67.6 56.5,73.0 59.5,77.9 62.5,80.4 65.5,79.6 68.5,75.8" fill="none" stroke="#C9D8B6" stroke-opacity=".45" stroke-width=".7"/><polyline points="25.0,58.8 28.0,55.1 31.0,54.0 34.0,55.2 37.0,57.3 40.0,58.9 43.0,59.3 46.0,58.4 49.0,57.4 52.0,57.5 55.0,59.8 58.0,64.1 61.0,69.5 64.0,74.4 67.0,76.9 70.0,76.1 73.0,72.3" fill="none" stroke="#C9D8B6" stroke-opacity=".45" stroke-width=".7"/><polyline points="29.5,55.3 32.5,51.6 35.5,50.5 38.5,51.7 41.5,53.8 44.5,55.4 47.5,55.8 50.5,54.9 53.5,53.9 56.5,54.0 59.5,56.3 62.5,60.6 65.5,66.0 68.5,70.9 71.5,73.4 74.5,72.6 77.5,68.8" fill="none" stroke="#C9D8B6" stroke-opacity=".45" stroke-width=".7"/><ellipse cx="49.0" cy="58.4" rx="7" ry="3" fill="#E8B963" fill-opacity=".85"/><polygon points="16,67.8 19,64.1 22,63.0 25,64.2 28,66.3 31,67.9 34,68.3 37,67.4 40,66.4 43,66.5 46,68.8 49,73.1 52,78.5 55,83.4 58,85.9 61,85.1 64,81.3 64,88.3 61,92.1 58,92.9 55,90.4 52,85.5 49,80.1 46,75.8 43,73.5 40,73.4 37,74.4 34,75.3 31,74.9 28,73.3 25,71.2 22,70.0 19,71.1 16,74.8" fill="#A88456"/><polygon points="64,81.3 82,67.3 82,74.3 64,88.3" fill="#A88456" fill-opacity=".7"/><polygon points="16,74.8 19,71.1 22,70.0 25,71.2 28,73.3 31,74.9 34,75.3 37,74.4 40,73.4 43,73.5 46,75.8 49,80.1 52,85.5 55,90.4 58,92.9 61,92.1 64,88.3 64,96.3 61,100.1 58,100.9 55,98.4 52,93.5 49,88.1 46,83.8 43,81.5 40,81.4 37,82.4 34,83.3 31,82.9 28,81.3 25,79.2 22,78.0 19,79.1 16,82.8" fill="#B5653E"/><polygon points="64,88.3 82,74.3 82,82.3 64,96.3" fill="#B5653E" fill-opacity=".7"/><polygon points="16,82.8 19,79.1 22,78.0 25,79.2 28,81.3 31,82.9 34,83.3 37,82.4 40,81.4 43,81.5 46,83.8 49,88.1 52,93.5 55,98.4 58,100.9 61,100.1 64,96.3 64,105.3 61,109.1 58,109.9 55,107.4 52,102.5 49,97.1 46,92.8 43,90.5 40,90.4 37,91.4 34,92.3 31,91.9 28,90.3 25,88.2 22,87.0 19,88.1 16,91.8" fill="#6F7A4E"/><polygon points="64,96.3 82,82.3 82,91.3 64,105.3" fill="#6F7A4E" fill-opacity=".7"/><polygon points="16,91.8 19,88.1 22,87.0 25,88.2 28,90.3 31,91.9 34,92.3 37,91.4 40,90.4 43,90.5 46,92.8 49,97.1 52,102.5 55,107.4 58,109.9 61,109.1 64,105.3 64,112.0 61,112.0 58,112.0 55,112.0 52,112.0 49,112.0 46,112.0 43,112.0 40,112.0 37,112.0 34,112.0 31,112.0 28,112.0 25,112.0 22,112.0 19,112.0 16,112.0" fill="#46536A"/><polygon points="64,105.3 82,91.3 82,98.0 64,112.0" fill="#46536A" fill-opacity=".7"/><ellipse cx="40" cy="104" rx="9" ry="3.5" fill="#E8B963"/><polyline points="16,112 64,112 82,98" fill="none" stroke="rgba(241,244,248,.35)" stroke-width=".8"/><rect x="90" y="36" width="36" height="52" fill="none" stroke="rgba(111,181,224,.45)"/><polygon points="92,67.8 94,63.9 96,62.3 98,62.6 100,64.3 102,66.2 104,67.5 106,67.8 108,67.4 110,67.1 112,67.7 114,69.9 116,73.7 118,78.5 120,83.0 122,86.1 124,86.6 124,84 92,84" fill="rgba(111,181,224,.18)"/><polyline points="92,67.8 94,63.9 96,62.3 98,62.6 100,64.3 102,66.2 104,67.5 106,67.8 108,67.4 110,67.1 112,67.7 114,69.9 116,73.7 118,78.5 120,83.0 122,86.1 124,86.6" fill="none" stroke="#6FB5E0" stroke-width="1.2"/><line x1="91" y1="42" x2="93" y2="42" stroke="rgba(111,181,224,.6)" stroke-width=".7"/><line x1="91" y1="52" x2="93" y2="52" stroke="rgba(111,181,224,.6)" stroke-width=".7"/><line x1="91" y1="62" x2="93" y2="62" stroke="rgba(111,181,224,.6)" stroke-width=".7"/><line x1="91" y1="72" x2="93" y2="72" stroke="rgba(111,181,224,.6)" stroke-width=".7"/><line x1="91" y1="82" x2="93" y2="82" stroke="rgba(111,181,224,.6)" stroke-width=".7"/><rect x="92" y="96" width="8" height="3" fill="#F1F4F8" stroke="#F1F4F8" stroke-width=".6"/><rect x="100" y="96" width="8" height="3" fill="#0B121A" stroke="#F1F4F8" stroke-width=".6"/><rect x="108" y="96" width="8" height="3" fill="#F1F4F8" stroke="#F1F4F8" stroke-width=".6"/><rect x="116" y="96" width="8" height="3" fill="#0B121A" stroke="#F1F4F8" stroke-width=".6"/><line x1="92" y1="99" x2="92" y2="102" stroke="#F1F4F8" stroke-width=".6"/><line x1="100" y1="99" x2="100" y2="102" stroke="#F1F4F8" stroke-width=".6"/><line x1="108" y1="99" x2="108" y2="102" stroke="#F1F4F8" stroke-width=".6"/><line x1="116" y1="99" x2="116" y2="102" stroke="#F1F4F8" stroke-width=".6"/><line x1="124" y1="99" x2="124" y2="102" stroke="#F1F4F8" stroke-width=".6"/><rect x="92" y="108" width="12" height="2.4" fill="rgba(232,185,99,.9)" stroke="rgba(232,185,99,.9)" stroke-width=".6"/><rect x="104" y="108" width="12" height="2.4" fill="#0B121A" stroke="rgba(232,185,99,.9)" stroke-width=".6"/></svg></div>
          <div class="ps2-body">
            <div class="ps2-head"><h3>Software platform</h3><span class="ps2-pill">Planned</span></div>
            <p>The interface geoscientist teams will use to import survey data and review ranked drill targets, a 3D visualization, a heat map and other geoanalysis tools.</p>
          </div>
        </li>
        <li class="ps2-item is-future">
          <div class="ps2-when">Later</div>
          <span class="ps2-node" aria-hidden="true"></span>
          <div class="ps2-art" aria-hidden="true"><svg viewBox="0 0 140 140" aria-hidden="true"><rect x="12" y="28" width="36" height="40" fill="#E8B963" fill-opacity="0.9" stroke="#E8B963" stroke-opacity="1"/><text x="30" y="53" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="13" font-weight="700" fill="#0E141B">Li</text><rect x="52" y="28" width="36" height="40" fill="none" fill-opacity="0" stroke="#E8B963" stroke-opacity="0.35"/><text x="70" y="53" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="13" font-weight="700" fill="rgba(232,185,99,.55)">Cu</text><rect x="92" y="28" width="36" height="40" fill="none" fill-opacity="0" stroke="#E8B963" stroke-opacity="0.35"/><text x="110" y="53" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="13" font-weight="700" fill="rgba(232,185,99,.55)">Ni</text><rect x="12" y="72" width="36" height="40" fill="none" fill-opacity="0" stroke="#E8B963" stroke-opacity="0.35"/><text x="30" y="97" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="13" font-weight="700" fill="rgba(232,185,99,.55)">Co</text><rect x="52" y="72" width="36" height="40" fill="none" fill-opacity="0" stroke="#E8B963" stroke-opacity="0.35"/><text x="70" y="97" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="13" font-weight="700" fill="rgba(232,185,99,.55)">Ag</text><rect x="92" y="72" width="36" height="40" fill="none" fill-opacity="0" stroke="#E8B963" stroke-opacity="0.35"/><text x="110" y="97" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="13" font-weight="700" fill="rgba(232,185,99,.55)">Au</text></svg></div>
          <div class="ps2-body">
            <div class="ps2-head"><h3>Other minerals</h3><span class="ps2-pill">Future</span></div>
            <p>Models for nickel, cobalt, gold and silver, the minerals our customers search for alongside lithium.</p>
          </div>
        </li>
      </ol>

      <div class="ph2 xr-reveal">
        <div class="ph2-head">How it will work</div>
        <ol class="ph2-steps">
          <li><span class="ph2-n">01</span><strong>Import survey data</strong><p>Your geoscientist team brings in the survey and drill data it already has.</p></li>
          <li><span class="ph2-n">02</span><strong>The model scores your ground</strong><p>It weighs your data together with our cleaned geological datasets.</p></li>
          <li><span class="ph2-n">03</span><strong>Review ranked drill targets</strong><p>Explore them on a 3D visualization and heat map, with other geoanalysis tools.</p></li>
        </ol>
        <div class="ph2-cta"><a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>" class="xr-btn xr-btn-outline">Follow our progress <span class="xr-arrow">→</span></a></div>
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
