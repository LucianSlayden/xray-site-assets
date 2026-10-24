<?php
/**
 * Moved from Code Snippets #11 "XRay — Product".
 */

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
            <span class="pdt-hw"><span class="pdt-hw-inner gold">learns.</span></span>
          </h1>
          <p class="pdt-lede">Built from geochemistry, geophysics, fault, and other data, <span class="xr-nobreak">X-Ray&rsquo;s</span> models represent the cutting edge of AI technology in mining exploration. Our models can target an area of interest for a mining company and, utilizing uploaded exploration data, output drill targets and other information to assist geologists with exploration. Uploaded data is only used for a customer&rsquo;s own predictions and never used to train anyone else&rsquo;s models.</p>
          <div class="pdt-cta-row">
            <a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>" class="xr-btn xr-btn-gold">Learn More</a>
            <a href="#pdt-how" class="xr-btn xr-btn-outline">How It Works <span class="xr-arrow" aria-hidden="true">→</span></a>
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
        <p>The <span class="xr-nobreak">X-Ray</span> platform is being built for geoscientist teams at mining companies. Your team imports its survey data, and the model outputs ranked drill targets with a 3D visualization, a heat map and other geoanalysis tools. Keep adding drill data as you go to make quick, informed decisions on where to drill next.</p>
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
<path d="M84 27H128L136 63H143" fill="none" stroke="#A88456" stroke-width="1" stroke-linejoin="round"/>
<path d="M84 73H143" fill="none" stroke="#6FB5E0" stroke-width="1"/>
<path d="M84 119H128L136 83H143" fill="none" stroke="#E8B963" stroke-width="1" stroke-linejoin="round"/>
<path d="M140.2 60.6L143.4 63 140.2 65.4M140.2 70.6L143.4 73 140.2 75.4M140.2 80.6L143.4 83 140.2 85.4" fill="none" stroke="#F1F4F8" stroke-opacity=".75" stroke-width=".9"/>
<rect x="146" y="59.0" width="16" height="8" fill="#A88456"/>
<rect x="146" y="69.0" width="16" height="8" fill="#6FB5E0"/>
<rect x="146" y="79.0" width="16" height="8" fill="#E8B963"/>
<path d="M165 59.0 h2 v28 h-2" fill="none" stroke="#F1F4F8" stroke-opacity=".5" stroke-width=".8"/>
</svg></figure>
          <h3>Upload your exploration data</h3>
          <p>Securely upload the exploration data your team has already collected. It is combined with our own dataset: decades of cluttered public geological data that we have cleaned and sorted so a model can learn from it.</p>
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
<rect x="101.3" y="30.6" width="27" height="10" fill="#0B121A" stroke="#6FB5E0" stroke-width=".7"/><text x="114.80" y="38.1" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="7.2" font-weight="700" letter-spacing=".6" fill="#6FB5E0">TEST</text>
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
        </li>
        <li class="pa2-step">
          <div class="pa2-top"><span class="pa2-num">03</span><span class="pa2-kind">Output</span></div>
          <figure class="pa2-art pa2-art-out">
            <?php // A 4x nearest-neighbour crop of the model-run heat map (southwest Great Basin), so single cells stay sharp. ?>
            <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/heatmap-zoom.webp?ver=' . filemtime( get_stylesheet_directory() . '/assets/img/heatmap-zoom.webp' ) ); ?>" alt="" loading="lazy" width="1360" height="1200">
            <span class="pa2-pins" aria-hidden="true"><span class="pa2-pin is-top" style="--x:24.1%;--y:43.7%">01</span><span class="pa2-pin" style="--x:92.1%;--y:27.7%">02</span><span class="pa2-pin" style="--x:15%;--y:26.3%">03</span><span class="pa2-pin" style="--x:37.4%;--y:75%">04</span><span class="pa2-pin" style="--x:28.2%;--y:30%">05</span></span>
            <ol class="pa2-rank" aria-hidden="true"><li><b>T-01</b><i style="--w:92%"></i></li><li><b>T-02</b><i style="--w:81%"></i></li><li><b>T-03</b><i style="--w:74%"></i></li><li><b>T-04</b><i style="--w:63%"></i></li><li><b>T-05</b><i style="--w:55%"></i></li></ol>
          </figure>
          <h3>Ranked targets, ready to review</h3>
          <p>You get a prospectivity heat map of your area of interest and a ranked list of drill targets. A 3D view and analysis tools help your geologists narrow down where to drill.</p>
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
        <p>Our first model scores every 1×1&nbsp;km cell across the Great Basin region of the United States for lithium. It is a prototype and the base for the finer models we are building, but its early results show the approach works.</p>
      </div>

      <div class="pp-grid">
        <figure class="pp-map xr-reveal">
          <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/model-run-heatmap.webp?ver=' . filemtime( get_stylesheet_directory() . '/assets/img/model-run-heatmap.webp' ) ); ?>" alt="Prospectivity heat map from a recent X-Ray model run, with the highest-scoring cells in gold" width="1168" height="1128" loading="lazy">
          <figcaption>
            <span>Heat map from a recent model run</span>
            <span class="pp-legend"><em>Low</em><i></i><em>High</em></span>
          </figcaption>
          <p class="pp-map-note">Each cell is 1×1&nbsp;km; the faint lines are a coarser reference grid. Gold cells are where the model sees the strongest signs of lithium, and they are where a geologist would look first.</p>
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
        <p>We are pre-launch. Our Great Basin lithium model is a prototype that predicts to within 1×1&nbsp;km, and mining companies need 1×1&nbsp;m to place a borehole. We are using the prototype to build a series of finer models that will get there.</p>
      </div>

      <ol class="ps2 xr-reveal">
        <li class="ps2-item is-now">
          <div class="ps2-when">Now</div>
          <span class="ps2-node" aria-hidden="true"></span>
          <div class="ps2-art" aria-hidden="true"><?php echo xray_roadmap_art( 'prototype' ); ?></div>
          <div class="ps2-body">
            <div class="ps2-head"><h3>Great Basin lithium prototype</h3><span class="ps2-pill">Prototype</span></div>
            <p>Our first model predicts lithium across the Great Basin, but only to within 1&times;1&nbsp;km cells. It is not finished and not precise enough for mining companies to use yet. It is the base the finer models build on.</p>
          </div>
        </li>
        <li class="ps2-item is-active">
          <div class="ps2-when">In progress</div>
          <span class="ps2-node" aria-hidden="true"></span>
          <div class="ps2-art" aria-hidden="true"><?php echo xray_roadmap_art( 'finer' ); ?></div>
          <div class="ps2-body">
            <div class="ps2-head"><h3>Finer models, down to 1&times;1&nbsp;m</h3><span class="ps2-pill">In development</span></div>
            <p>A series of models, each finer than the last, adding borehole logs from water wells, oil and gas wells and lithium drilling. The goal is predictions precise enough to place an individual borehole.</p>
          </div>
        </li>
        <li class="ps2-item is-soon">
          <div class="ps2-when">Next</div>
          <span class="ps2-node" aria-hidden="true"></span>
          <div class="ps2-art" aria-hidden="true"><?php echo xray_roadmap_art( 'field' ); ?></div>
          <div class="ps2-body">
            <div class="ps2-head"><h3>Field testing</h3><span class="ps2-pill">Planned</span></div>
            <p>Testing predictions on the ground against real boreholes and feeding the results back in, until the model is accurate enough to sell.</p>
          </div>
        </li>
        <li class="ps2-item is-soon">
          <div class="ps2-when">To build</div>
          <span class="ps2-node" aria-hidden="true"></span>
          <div class="ps2-art" aria-hidden="true"><?php echo xray_roadmap_art( 'platform' ); ?></div>
          <div class="ps2-body">
            <div class="ps2-head"><h3>Software platform</h3><span class="ps2-pill">Planned</span></div>
            <p>The interface geoscientist teams will use to import survey data and review ranked drill targets, a 3D visualization, a heat map and other geoanalysis tools.</p>
          </div>
        </li>
        <li class="ps2-item is-future">
          <div class="ps2-when">Later</div>
          <span class="ps2-node" aria-hidden="true"></span>
          <div class="ps2-art" aria-hidden="true"><?php echo xray_roadmap_art( 'minerals' ); ?></div>
          <div class="ps2-body">
            <div class="ps2-head"><h3>Other minerals</h3><span class="ps2-pill">Future</span></div>
            <p>Models for nickel, cobalt, gold and silver, the minerals mining companies search for alongside lithium.</p>
          </div>
        </li>
      </ol>
    </div>
  </section>

  <!-- ═══════════════ CTA ═══════════════ -->
  <section class="pdt-cta">
    <div class="pdt-cta-inner">
      <span class="xr-reveal xr-eyebrow" style="justify-content:center;margin-bottom:18px;"><span class="xr-eyebrow-hex"></span>Get Started</span>
      <h2 class="xr-reveal pdt-cta-h">Know where to drill<br>before you spend a <span class="gold">dollar.</span></h2>
      <p class="xr-reveal xr-d2">We're building toward drill targets precise enough for a single borehole. Get in touch to follow our progress or help shape the platform.</p>
      <div class="xr-reveal xr-d3 xr-btn-row">
        <a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>" class="xr-btn xr-btn-gold">Learn More</a>
        <a href="mailto:info@xraygeoanalytics.com" class="xr-btn xr-btn-outline">Email us directly <span class="xr-arrow" aria-hidden="true">→</span></a>
      </div>
    </div>
  </section>

  <?php xray_site_footer(); ?>

    <?php
});
