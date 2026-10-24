<?php
/**
 * Moved from Code Snippets #7 "XRay — index".
 */

add_action( 'generate_before_content', function() {
    if ( ! is_page( 'home' ) ) return;
    ?>

<?php xray_site_nav(); ?>

  <!-- ═════════════════════════ HERO (scroll-scrub · video bg) ═════════════ -->
  <section class="xr-hero">
    <div class="xr-hero-pin">

      <!-- Full-bleed video background -->
      <video class="xr-hero-video"
             src="https://videos.files.wordpress.com/CRfglhds/website_hero_scrub.mp4"
             muted playsinline preload="auto" disableremoteplayback></video>

      <!-- Left-side black fade so the headline reads cleanly -->
      <div class="xr-hero-fade"></div>
      <div class="xr-hero-fade-v"></div>

      <!-- LEFT column: eyebrow, headline, paragraph, CTAs -->
      <div class="xr-hero-content">
        <div class="xr-hero-content-inner">
          <div class="xr-hero-text">
            <span class="xr-eyebrow no-caret" style="margin-bottom:18px;">
              <span class="xr-eyebrow-hex"></span>
              <span class="xr-pulse-dot" style="margin-right:6px;"></span>
              Nevada Lithium Model · Prototype · In Development
            </span>

            <h1 class="xr-hero-headline">
              We tell mining companies <span class="accent">exactly</span> where to drill.
            </h1>

            <p class="xr-hero-sub">
              An AI driven platform that turns exploration data into accurate predictions that help mining companies figure out where to drill in search of new mineral deposits.
            </p>

            <div class="xr-hero-cta">
              <a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>" class="xr-btn xr-btn-gold">Learn More</a>
              <a href="<?php echo esc_url( home_url( '/product/' ) ); ?>" class="xr-btn xr-btn-outline">See the Product <span class="xr-arrow" aria-hidden="true">→</span></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Four reveal lines — each is anchored at the centre of a green
           hexagon in the video's final frame. The big headline is always
           visible to the LEFT; an invisible hit-zone over the hex centre
           triggers a body panel that animates outward to the RIGHT on
           hover. Positions: see .xr-hero-bullet:nth-child rules in
           xray-system.css. Copy rewritten for storytelling. -->
      <div class="xr-hero-bullets">

        <div class="xr-hero-bullet" tabindex="0">
          <h2 class="xr-hero-bullet-head">Validated<br> accuracy</h2>
          <span class="xr-hero-bullet-hit" aria-hidden="true"></span>
          <div class="xr-hero-bullet-body" role="tooltip">
            Current models achieve a 95% recall and 80% precision when tested on Lithium in the Great Basin region of the United States.
          </div>
        </div>

        <div class="xr-hero-bullet" tabindex="0">
          <h2 class="xr-hero-bullet-head">From months<br> to days</h2>
          <span class="xr-hero-bullet-hit" aria-hidden="true"></span>
          <div class="xr-hero-bullet-body" role="tooltip">
            Quicker turnaround times compared to consultants mean mining companies can accelerate the timelines of their projects, making new discoveries faster.
          </div>
        </div>

        <div class="xr-hero-bullet" tabindex="0">
          <h2 class="xr-hero-bullet-head">Software<br> subscription</h2>
          <span class="xr-hero-bullet-hit" aria-hidden="true"></span>
          <div class="xr-hero-bullet-body" role="tooltip">
            A tiered subscription allows customers flexibility to match their investment to the scale of their operations.
          </div>
        </div>

        <div class="xr-hero-bullet" tabindex="0">
          <h2 class="xr-hero-bullet-head">A compounding<br> advantage</h2>
          <span class="xr-hero-bullet-hit" aria-hidden="true"></span>
          <div class="xr-hero-bullet-body" role="tooltip">
            New data is fed back into the model as it is collected, creating better predictions.
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- ═════════════════════════ MERGED-PAIR: PROBLEM + SOLUTION ═══
       Both sections share a single tall mountain background. The
       mountain peak sits at the boundary between them; the upper
       part of the Problem section reveals empty sky/foreground
       beyond the peak. -->
  <div class="merged-pair">
    <div class="merged-pair-bg" aria-hidden="true"></div>

  <!-- ═════════════════════════ PROBLEM ═════════════════════════
       Per the May-2026 "additional index instructions" doc, this
       section is rebuilt around a single connected diagram that
       presents all three statistics with sources DIRECTLY underneath
       each. The body paragraph is repositioned to the LEFT of the
       diagram as a short journalistic lead-in, with a one-line
       kicker after the diagram closing the thought. -->
  <section class="xr-section xr-section-deep problem-sec">
    <div class="xr-section-rule"></div>

    <div class="xr-container problem-narrative">

      <h2 class="xr-reveal problem-headline">
        Mining is the riskiest gamble <span class="accent">ever</span>.
      </h2>

      <!-- Lead-in: two short paragraphs next to the diagram on the left.
           The diagram on the right carries every statistic. -->
      <div class="problem-lead-row xr-reveal xr-d1">
        <div class="problem-lede">
          <p>
            Every year, mining companies pour billions of dollars into exploration, with most projects leading to <em>nothing</em>.
          </p>
          <p class="problem-kicker">
            The bottleneck isn't capital, it's knowing where to strike gold.
          </p>
        </div>

        <!-- The lottery diagram. A single horizontal flow rail with three
             tick-stations: each station has a stat number, a context line,
             and the source citation IMMEDIATELY underneath. -->
        <figure class="lottery-diagram xr-reveal xr-d2" aria-label="Three exploration statistics on a single flow rail, each with its source directly underneath.">

          <!-- Diagram caption (top) -->
          <figcaption class="ld-caption">
            <span class="ld-caption-eyebrow">A snapshot of modern exploration trends</span>
          </figcaption>

          <!-- Flow rail: one node above the centre of each stat card, joined by
               a gold-to-sky line over a narrowing band. It uses the same grid
               as the cards below, so the nodes always line up with them. -->
          <div class="ld-rail" aria-hidden="true">
            <span class="ld-rail-node"></span>
            <span class="ld-rail-node"></span>
            <span class="ld-rail-node ld-rail-node-sky"></span>
          </div>

          <!-- Three stat stations sitting on the rail.
               Each one has, in order: a small uppercase label, the
               oversize number, a one-line context, and the source
               citation DIRECTLY underneath. -->
          <div class="ld-stations">
            <div class="ld-station">
              <div class="ld-label">Annual spend</div>
              <div class="ld-num xr-num" data-target="12.5" data-prefix="$" data-suffix="B" data-decimals="1">$12.5B</div>
              <div class="ld-context">Global nonferrous exploration budget. Most of it chases the wrong ground.</div>
              <div class="ld-source">S&amp;P Global · 2024 World Exploration Trends</div>
            </div>

            <div class="ld-station">
              <div class="ld-label">Talent gap</div>
              <div class="ld-num xr-num" data-target="71" data-suffix="%">71%</div>
              <div class="ld-context">Of mining executives say senior-geoscientist shortages now block their strategy.</div>
              <div class="ld-source">McKinsey &amp; Co. · 2023 Talent Outlook</div>
            </div>

            <div class="ld-station ld-station-sky">
              <div class="ld-label">Project Success Rate</div>
              <div class="ld-num xr-num" data-target="0.5" data-suffix="%">0.5%</div>
              <div class="ld-context">Success rate of greenfield exploration projects.</div>
              <div class="ld-source">Kreuzer &amp; Etheridge, 2010 &middot; AIG News</div>
            </div>
          </div>
        </figure>
      </div>

    </div>

    <!-- bottom rule mirroring the top section-rule -->
    <div class="xr-section-rule xr-section-rule-bottom"></div>
  </section>

  <!-- ═════════════════════════ SOLUTION (continues merged bg) ═══ -->
  <section class="xr-section solution-sec">

    <div class="xr-container">
      <div class="xr-reveal" style="margin-bottom:56px;max-width:780px;">
        <h2 style="margin:0 0 18px;">X-Ray Geoanalytics has a <span style="color:var(--xr-gold);">new solution</span></h2>
        <p style="color:var(--xr-text-2);font-size:18px;line-height:1.75;margin:0;">X-Ray fuses your geological data through a machine learning pipeline and returns a prospectivity map to assist with drilling, helping mining companies narrow down their areas of interest for greenfield and minesite exploration.</p>
      </div>

      <!-- Pipeline: each step shows what the data looks like at that stage. -->
      <ol class="xr-reveal xr-d1 pipe2">
        <li class="pipe2-step">
          <div class="pipe2-head"><span class="pipe2-num">01</span><h3>Clean</h3></div>
          <figure class="pipe2-art pipe2-art-layers">
            <svg viewBox="0 0 170 150" aria-hidden="true">
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
</svg>
            <figcaption><span class="k-rs">Remote sensing</span><span class="k-gp">Geophysics</span><span class="k-gc">Geochemistry</span></figcaption>
          </figure>
          <p>Geochemistry, geophysics, remote sensing and other surveys are cleaned and aligned to one grid, so every cell carries the same set of features.</p>
        </li>
        <li class="pipe2-step">
          <div class="pipe2-head"><span class="pipe2-num">02</span><h3>Train</h3></div>
          <figure class="pipe2-art">
            <svg viewBox="0 0 170 150" aria-hidden="true">
<defs><pattern id="trHatch" width="4" height="4" patternUnits="userSpaceOnUse" patternTransform="rotate(45)"><line x1="0" y1="0" x2="0" y2="4" stroke="#6FB5E0" stroke-opacity=".35" stroke-width="1"/></pattern></defs>
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
<rect x="101.40" y="39.75" width="26.80" height="24.75" fill="url(#trHatch)"/>
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
</svg>
            <figcaption><span class="k-gold">Known deposit</span><span class="k-train">Training</span><span class="k-sky">Held-out test</span></figcaption>
          </figure>
          <p>The model learns from confirmed deposits and their geology. Whole blocks of ground are held out during testing (spatial cross-validation), so it is scored on areas it has never seen.</p>
        </li>
        <li class="pipe2-step">
          <div class="pipe2-head"><span class="pipe2-num">03</span><h3>Predict</h3></div>
          <figure class="pipe2-art pipe2-art-map">
            <div class="pipe2-map"><div class="pipe2-map-in">
              <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/model-run-heatmap.webp?ver=' . filemtime( get_stylesheet_directory() . '/assets/img/model-run-heatmap.webp' ) ); ?>" alt="Lithium prospectivity map from a recent model run across the Great Basin, with its three largest high-scoring areas circled" loading="lazy" width="1168" height="1128">
              <?php // Rings sit on the three largest clusters of high-scoring cells in this model run, sized to each cluster, numbered by size. ?>
              <span class="pipe2-tgts" aria-hidden="true"><span class="pipe2-tgt" style="--x:23.1%;--y:61.2%;--s:14%"><b>01</b></span><span class="pipe2-tgt" style="--x:43.1%;--y:57%;--s:7.5%"><b>02</b></span><span class="pipe2-tgt" style="--x:26.7%;--y:33.7%;--s:6.5%"><b>03</b></span></span>
            </div></div>
            <figcaption><span>Low</span><i aria-hidden="true"></i><span>High</span></figcaption>
          </figure>
          <p>Every cell gets a prospectivity score. The highest-ranked ground is then analysed further to narrow the search to the strongest drill targets.</p>
        </li>
      </ol>

      <p class="xr-reveal pipe2-close">The surveys already exist. The advantage is reading all of them together, before the first hole is drilled.</p>
    </div>
  </section>

  </div><!-- /.merged-pair -->

  <!-- ═════════════════════════ PARALLAX STRIP: PROOF + ROADMAP + WHY + CTA ═══
       All four share a single tall background image that translates
       upward at half the rate of the page scroll (parallax). -->
  <div class="parallax-strip">
    <div class="parallax-strip-bg" aria-hidden="true"></div>

  <!-- ═════════════════════════ PROOF ═════════════════════════ -->
  <section class="xr-section proof-sec">
    <div class="xr-section-rule"></div>

    <div class="xr-container proof-grid">
      <div class="xr-reveal">
        <h2 style="margin:0 0 22px;"><span style="color:var(--xr-gold);">Validated metrics</span> on Nevada lithium.</h2>
        <p style="color:var(--xr-text-2);font-size:17px;line-height:1.8;margin:0 0 18px;">Our Nevada lithium prospectivity model recovers <strong style="color:var(--xr-text);">39%</strong> of known deposits in the <strong style="color:var(--xr-text);">top 1%</strong> of ranked ground, which is 39x more effective than a uniform search. The model is trained on deposit and geochemistry/geophysics data across 19,000 grid cells, validated under spatial cross-validation, and built on a five-model ensemble.</p>
        <p style="color:var(--xr-text-2);font-size:17px;line-height:1.8;margin:0 0 32px;">We work with clients in <strong style="color:var(--xr-text);">two ways:</strong> annual platform subscription services and individual project engagement. Annual platform access is best for active exploration programs running ongoing target work, while individual project terms are tailored to fit the engagement.</p>

        <a href="<?php echo esc_url( home_url( '/product/' ) ); ?>" class="xr-btn xr-btn-outline">Explore the Product <span class="xr-arrow" aria-hidden="true">→</span></a>
      </div>

      <!-- Lift panel: how many known deposits the top 1% of ranked ground recovers,
           against a uniform (unranked) search of the same area. -->
      <div class="xr-reveal xr-d2 lift-panel">
        <div class="lift-head">
          <span class="lift-tag">Nevada lithium prototype</span>
          <span class="lift-tag lift-tag-dim">Spatial cross-validation</span>
        </div>

        <div class="lift-big">
          <span class="lift-num">39<span>&times;</span></span>
          <p>more known deposits found in the <strong>top 1%</strong> of ranked ground than a uniform search of the same area.</p>
        </div>

        <div class="lift-compare">
          <div class="lift-compare-title">Known deposits recovered by searching 1% of the ground</div>
          <div class="lift-row lift-row-old">
            <span class="lift-label">Uniform search</span>
            <span class="lift-track"><span class="lift-fill" style="--w:1%"></span></span>
            <span class="lift-val">1%</span>
          </div>
          <div class="lift-row lift-row-new">
            <span class="lift-label">X-Ray ranking</span>
            <span class="lift-track"><span class="lift-fill" style="--w:39%"></span></span>
            <span class="lift-val">39%</span>
          </div>
          <div class="lift-scale" aria-hidden="true"><span class="lift-axis"><span style="--x:0%">0%</span><span style="--x:25%">25%</span><span style="--x:50%">50%</span><span style="--x:75%">75%</span><span style="--x:100%">100%</span></span></div>
        </div>

        <dl class="lift-facts">
          <div><dt>19,000</dt><dd>grid cells</dd></div>
          <div><dt>5</dt><dd>model ensemble</dd></div>
          <div><dt>1&times;1&nbsp;km</dt><dd>current resolution</dd></div>
        </dl>
      </div>
    </div>
  </section>

  <!-- ═════════════════════════ ROADMAP (timeline) ═════════════════════════ -->
  <section class="xr-section roadmap-sec">

    <div class="xr-container">
      <div class="xr-reveal" style="text-align:center;margin-bottom:56px;max-width:840px;margin-left:auto;margin-right:auto;">
        <h2>From prototype to platform.</h2>
        <p style="color:var(--xr-text-2);font-size:16px;line-height:1.7;margin:14px 0 0;">Our Great Basin lithium model is a working prototype. Here is the path from that prototype to a product mining companies can rely on.</p>
      </div>

      <ol class="rm2 xr-reveal xr-d1">
        <li class="rm2-step is-now">
          <span class="rm2-node" aria-hidden="true"></span>
          <span class="rm2-when">Now</span>
          <div class="rm2-art"><?php echo xray_roadmap_art( 'prototype' ); ?></div>
          <h3>Prototype model</h3>
          <p>A first lithium model for the Great Basin. It ranks ground at 1&times;1&nbsp;km, which proves the method but is too coarse to sell.</p>
        </li>
        <li class="rm2-step is-next">
          <span class="rm2-node" aria-hidden="true"></span>
          <span class="rm2-when">Next</span>
          <div class="rm2-art"><?php echo xray_roadmap_art( 'finer' ); ?></div>
          <h3>Finer models</h3>
          <p>A series of progressively finer models, working down toward 1&times;1&nbsp;m, precise enough to site individual boreholes.</p>
        </li>
        <li class="rm2-step">
          <span class="rm2-node" aria-hidden="true"></span>
          <span class="rm2-when">Then</span>
          <div class="rm2-art"><?php echo xray_roadmap_art( 'field' ); ?></div>
          <h3>Field testing</h3>
          <p>Checking predictions against real drilling and sampling, and feeding the results back until the model is accurate enough to sell.</p>
        </li>
        <li class="rm2-step">
          <span class="rm2-node" aria-hidden="true"></span>
          <span class="rm2-when">Then</span>
          <div class="rm2-art"><?php echo xray_roadmap_art( 'platform' ); ?></div>
          <h3>Software platform</h3>
          <p>Geologist teams import their survey data and get ranked drill targets, a heat map, a 3D view of the target area and other geoanalysis tools.</p>
        </li>
        <li class="rm2-step">
          <span class="rm2-node" aria-hidden="true"></span>
          <span class="rm2-when">Later</span>
          <div class="rm2-art"><?php echo xray_roadmap_art( 'minerals' ); ?></div>
          <h3>Other minerals</h3>
          <p>Once lithium is proven, the same method is applied to other minerals that mining companies explore for.</p>
        </li>
      </ol>

      <div class="xr-reveal xr-d2" style="text-align:center;margin-top:48px;">
        <a href="<?php echo esc_url( home_url( '/investors/#roadmap' ) ); ?>" class="xr-btn xr-btn-ghost">See the roadmap <span class="xr-arrow" aria-hidden="true">→</span></a>
      </div>
    </div>
  </section>

  <!-- ═════════════════════════ WHY X-RAY — vs. comparison ═════════════════════════ -->
  <section class="xr-section why-sec">
    <!-- Top-of-section gold rule removed per May 2026 user request. -->

    <div class="xr-container">
      <div class="xr-reveal" style="text-align:center;margin-bottom:48px;max-width:780px;margin-left:auto;margin-right:auto;">
        <h2>Software economics. <span style="color:var(--xr-gold);">Not</span> consulting economics.</h2>
        <p style="color:var(--xr-text-2);font-size:16px;line-height:1.7;margin:14px 0 0;">How <span class="xr-nobreak">X-Ray</span> compares with a traditional consultant and GIS study.</p>
      </div>

      <!-- Comparison table: traditional study vs X-Ray -->
      <div class="cmp2 xr-reveal xr-d1" role="table" aria-label="Consultant and GIS study compared with X-Ray">
        <div class="cmp2-row cmp2-headrow" role="row">
          <div class="cmp2-k" role="columnheader"></div>
          <div class="cmp2-old" role="columnheader">Consultant + GIS study</div>
          <div class="cmp2-new" role="columnheader"><?php echo xray_logo_img(); ?></div>
        </div>
          <div class="cmp2-row" role="row">
            <div class="cmp2-k" role="rowheader">Time to ranked targets</div>
            <div class="cmp2-old" role="cell"><span class="cmp2-m">Consultant + GIS</span>Months for each project area</div>
            <div class="cmp2-new" role="cell"><span class="cmp2-m">X-Ray</span>Days, across a whole region</div>
          </div>
          <div class="cmp2-row" role="row">
            <div class="cmp2-k" role="rowheader">Data considered</div>
            <div class="cmp2-old" role="cell"><span class="cmp2-m">Consultant + GIS</span>What a team can review by hand</div>
            <div class="cmp2-new" role="cell"><span class="cmp2-m">X-Ray</span>Every survey layer, in every cell</div>
          </div>
          <div class="cmp2-row" role="row">
            <div class="cmp2-k" role="rowheader">What you receive</div>
            <div class="cmp2-old" role="cell"><span class="cmp2-m">Consultant + GIS</span>A static report</div>
            <div class="cmp2-new" role="cell"><span class="cmp2-m">X-Ray</span>Ranked targets, a heat map and a 3D view</div>
          </div>
          <div class="cmp2-row" role="row">
            <div class="cmp2-k" role="rowheader">After drilling starts</div>
            <div class="cmp2-old" role="cell"><span class="cmp2-m">Consultant + GIS</span>The report goes out of date</div>
            <div class="cmp2-new" role="cell"><span class="cmp2-m">X-Ray</span>New results feed back into the ranking</div>
          </div>
          <div class="cmp2-row" role="row">
            <div class="cmp2-k" role="rowheader">How you pay</div>
            <div class="cmp2-old" role="cell"><span class="cmp2-m">Consultant + GIS</span>A new study for every project</div>
            <div class="cmp2-new" role="cell"><span class="cmp2-m">X-Ray</span>One software subscription</div>
          </div>
      </div>

      <div class="xr-reveal" style="text-align:center;margin-top:40px;">
        <a href="<?php echo esc_url( home_url( '/product/#pdt-how' ) ); ?>" class="xr-btn xr-btn-ghost">See how it works <span class="xr-arrow" aria-hidden="true">→</span></a>
      </div>
    </div>
  </section>

  <!-- ═════════════════════════ CTA ═════════════════════════ -->
  <section class="xr-section cta-sec">

    <div class="xr-container" style="max-width:760px;text-align:center;">
      <h2 class="xr-reveal xr-d1" style="margin:0 0 22px;">Know where to drill before you spend a dollar.</h2>
      <p class="xr-reveal xr-d2" style="color:var(--xr-text-2);font-size:18px;line-height:1.75;margin:0 auto 44px;max-width:560px;">
        Get on the list now. The Nevada lithium model is in active development — first pilot exploration teams onboarding when it launches.
      </p>
      <div class="xr-reveal xr-d3 xr-btn-row">
        <a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>" class="xr-btn xr-btn-gold" style="font-size:16px;padding:16px 36px;">Learn More</a>
        <a href="<?php echo esc_url( home_url( '/product/' ) ); ?>" class="xr-btn xr-btn-outline" style="font-size:16px;padding:16px 36px;">See the Product <span class="xr-arrow" aria-hidden="true">→</span></a>
      </div>
    </div>
  </section>

  </div><!-- /.parallax-strip -->

  <!-- ═════════════════════════ FOOTER ═════════════════════════ -->
  <?php xray_site_footer(); ?>

    <?php
});
