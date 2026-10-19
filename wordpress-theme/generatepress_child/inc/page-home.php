<?php
/**
 * Moved from Code Snippets #7 "XRay — index".
 */

add_action( 'wp_enqueue_scripts', function() {
    if ( ! is_page( 'home' ) ) return;

    // Add page-specific scripts here (see table below for each page)
    wp_enqueue_script( 'gsap',    'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js', [], null, true );
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js', ['gsap'], null, true );
});

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
              An advanced machine learning model that uses geochemistry, geophysics, and remote sensing data to create ranked drill targets and prospectivity reports.
              What takes a consultant team months, we'll do in days.
            </p>

            <div class="xr-hero-cta">
              <a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>" class="xr-btn xr-btn-gold">Learn More</a>
              <a href="<?php echo esc_url( home_url( '/product/' ) ); ?>" class="xr-btn xr-btn-outline">See the Product <span class="xr-arrow">→</span></a>
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
          <h2 class="xr-hero-bullet-head">Validated<br>accuracy</h2>
          <span class="xr-hero-bullet-hit" aria-hidden="true"></span>
          <div class="xr-hero-bullet-body" role="tooltip">
            Our <strong>Nevada lithium model</strong> recovers 39% of deposits in the top 1% of ranked ground.
          </div>
        </div>

        <div class="xr-hero-bullet" tabindex="0">
          <h2 class="xr-hero-bullet-head">From months<br>to days</h2>
          <span class="xr-hero-bullet-hit" aria-hidden="true"></span>
          <div class="xr-hero-bullet-body" role="tooltip">
            Upload data on a <strong>Monday</strong> and by the end of the work week have a complete list of ranked drilled targets ready for your geologists.
          </div>
        </div>

        <div class="xr-hero-bullet" tabindex="0">
          <h2 class="xr-hero-bullet-head">Software<br>subscription</h2>
          <span class="xr-hero-bullet-hit" aria-hidden="true"></span>
          <div class="xr-hero-bullet-body" role="tooltip">
            X-Ray is offered as a <strong>software subscription</strong>, so your team keeps access to the platform and its model updates instead of paying for one-off consulting studies. Plans will be announced as the lithium model launches.
          </div>
        </div>

        <div class="xr-hero-bullet" tabindex="0">
          <h2 class="xr-hero-bullet-head">A compounding<br>advantage</h2>
          <span class="xr-hero-bullet-hit" aria-hidden="true"></span>
          <div class="xr-hero-bullet-body" role="tooltip">
            Every drill result you feed back makes your model sharper. <strong>The longer you use X-Ray, the more accurate it becomes.</strong>
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
        Exploration is the most expensive <span class="accent">lottery</span> in mining.
      </h2>

      <!-- Lead-in: two short paragraphs next to the diagram on the left.
           The diagram on the right carries every statistic. -->
      <div class="problem-lead-row xr-reveal xr-d1">
        <div class="problem-lede">
          <p>
            Every year, mining companies pour billions of dollars into exploration, with most drill holes leading to <em>nothing</em>.
          </p>
          <p class="problem-kicker">
            The bottleneck isn't capital. It's knowing where to drill.
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

          <!-- SVG flow rail underlining the three stat stations -->
          <svg class="ld-rail" viewBox="0 0 1000 60" preserveAspectRatio="none" aria-hidden="true">
            <defs>
              <linearGradient id="ldGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%"   stop-color="#E8B963"/>
                <stop offset="50%"  stop-color="#E8B963"/>
                <stop offset="100%" stop-color="#6FB5E0"/>
              </linearGradient>
            </defs>
            <!-- Funnel shape: full width at the left collapsing to a narrow band at the right.
                 Visually carries the "narrowing" story. -->
            <path d="M 0 18 L 1000 26 L 1000 40 L 0 46 Z" fill="rgba(232,185,99,0.06)" stroke="none"/>
            <!-- Centre rail line -->
            <line x1="0" y1="32" x2="1000" y2="32" stroke="url(#ldGrad)" stroke-width="1.6"/>
            <!-- Tick marks at each station (0%, 50%, 100% of width) -->
            <line x1="80"   y1="20" x2="80"   y2="44" stroke="var(--xr-gold)" stroke-width="2"/>
            <line x1="500"  y1="20" x2="500"  y2="44" stroke="var(--xr-gold)" stroke-width="2"/>
            <line x1="920"  y1="20" x2="920"  y2="44" stroke="var(--xr-sky)" stroke-width="2"/>
            <!-- Glowing nodes -->
            <circle cx="80"  cy="32" r="6" fill="var(--xr-gold)"/>
            <circle cx="500" cy="32" r="6" fill="var(--xr-gold)"/>
            <circle cx="920" cy="32" r="6" fill="var(--xr-sky)"/>
            <!-- Soft halos -->
            <circle cx="80"  cy="32" r="14" fill="rgba(232,185,99,0.18)"/>
            <circle cx="500" cy="32" r="14" fill="rgba(232,185,99,0.18)"/>
            <circle cx="920" cy="32" r="14" fill="rgba(111,181,224,0.18)"/>
          </svg>

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
              <div class="ld-context">Success Rate of greenfield exploration projects.</div>
              <div class="ld-source">Diaz et al., 2026 &middot; Springer</div>
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
<polygon points="40,12 150,12 130,46 20,46" fill="rgba(14,22,32,.92)" stroke="rgba(232,185,99,.55)" stroke-width="1"/>
<rect x="39.0" y="13.7" width="7" height="5.2" fill="#E8B963" opacity="0.16"/>
<rect x="49.0" y="13.7" width="7" height="5.2" fill="#E8B963" opacity="0.08"/>
<rect x="59.0" y="13.7" width="7" height="5.2" fill="#E8B963" opacity="0.33"/>
<rect x="69.0" y="13.7" width="7" height="5.2" fill="#E8B963" opacity="0.04"/>
<rect x="79.0" y="13.7" width="7" height="5.2" fill="#E8B963" opacity="0.27"/>
<rect x="89.0" y="13.7" width="7" height="5.2" fill="#E8B963" opacity="0.18"/>
<rect x="99.0" y="13.7" width="7" height="5.2" fill="#E8B963" opacity="0.03"/>
<rect x="109.0" y="13.7" width="7" height="5.2" fill="#E8B963" opacity="0.25"/>
<rect x="119.0" y="13.7" width="7" height="5.2" fill="#E8B963" opacity="0.02"/>
<rect x="129.0" y="13.7" width="7" height="5.2" fill="#E8B963" opacity="0.22"/>
<rect x="139.0" y="13.7" width="7" height="5.2" fill="#E8B963" opacity="0.03"/>
<rect x="34.0" y="22.1" width="7" height="5.2" fill="#E8B963" opacity="0.05"/>
<rect x="44.0" y="22.1" width="7" height="5.2" fill="#E8B963" opacity="0.21"/>
<rect x="54.0" y="22.1" width="7" height="5.2" fill="#E8B963" opacity="0.41"/>
<rect x="64.0" y="22.1" width="7" height="5.2" fill="#E8B963" opacity="0.06"/>
<rect x="74.0" y="22.1" width="7" height="5.2" fill="#E8B963" opacity="0.11"/>
<rect x="84.0" y="22.1" width="7" height="5.2" fill="#E8B963" opacity="0.31"/>
<rect x="94.0" y="22.1" width="7" height="5.2" fill="#E8B963" opacity="0.47"/>
<rect x="104.0" y="22.1" width="7" height="5.2" fill="#E8B963" opacity="0.29"/>
<rect x="114.0" y="22.1" width="7" height="5.2" fill="#E8B963" opacity="0.20"/>
<rect x="124.0" y="22.1" width="7" height="5.2" fill="#E8B963" opacity="0.49"/>
<rect x="134.0" y="22.1" width="7" height="5.2" fill="#E8B963" opacity="0.02"/>
<rect x="29.0" y="30.6" width="7" height="5.2" fill="#E8B963" opacity="0.43"/>
<rect x="39.0" y="30.6" width="7" height="5.2" fill="#E8B963" opacity="0.14"/>
<rect x="49.0" y="30.6" width="7" height="5.2" fill="#E8B963" opacity="0.07"/>
<rect x="59.0" y="30.6" width="7" height="5.2" fill="#E8B963" opacity="0.06"/>
<rect x="69.0" y="30.6" width="7" height="5.2" fill="#E8B963" opacity="0.15"/>
<rect x="79.0" y="30.6" width="7" height="5.2" fill="#E8B963" opacity="0.41"/>
<rect x="89.0" y="30.6" width="7" height="5.2" fill="#E8B963" opacity="0.09"/>
<rect x="99.0" y="30.6" width="7" height="5.2" fill="#E8B963" opacity="0.29"/>
<rect x="109.0" y="30.6" width="7" height="5.2" fill="#E8B963" opacity="0.32"/>
<rect x="119.0" y="30.6" width="7" height="5.2" fill="#E8B963" opacity="0.19"/>
<rect x="129.0" y="30.6" width="7" height="5.2" fill="#E8B963" opacity="0.27"/>
<rect x="24.0" y="39.1" width="7" height="5.2" fill="#E8B963" opacity="0.03"/>
<rect x="34.0" y="39.1" width="7" height="5.2" fill="#E8B963" opacity="0.03"/>
<rect x="44.0" y="39.1" width="7" height="5.2" fill="#E8B963" opacity="0.10"/>
<rect x="54.0" y="39.1" width="7" height="5.2" fill="#E8B963" opacity="0.34"/>
<rect x="64.0" y="39.1" width="7" height="5.2" fill="#E8B963" opacity="0.21"/>
<rect x="74.0" y="39.1" width="7" height="5.2" fill="#E8B963" opacity="0.16"/>
<rect x="84.0" y="39.1" width="7" height="5.2" fill="#E8B963" opacity="0.29"/>
<rect x="94.0" y="39.1" width="7" height="5.2" fill="#E8B963" opacity="0.23"/>
<rect x="104.0" y="39.1" width="7" height="5.2" fill="#E8B963" opacity="0.15"/>
<rect x="114.0" y="39.1" width="7" height="5.2" fill="#E8B963" opacity="0.40"/>
<rect x="124.0" y="39.1" width="7" height="5.2" fill="#E8B963" opacity="0.35"/>
<polygon points="40,54 150,54 130,88 20,88" fill="rgba(14,22,32,.92)" stroke="rgba(232,185,99,.55)" stroke-width="1"/>
<path d="M42.0 60.8 q30 -5 55 0 t50 1" fill="none" stroke="#6FB5E0" stroke-opacity=".7" stroke-width="1"/>
<path d="M38.0 67.6 q30 -5 55 0 t50 1" fill="none" stroke="#6FB5E0" stroke-opacity=".7" stroke-width="1"/>
<path d="M34.0 74.4 q30 -5 55 0 t50 1" fill="none" stroke="#6FB5E0" stroke-opacity=".7" stroke-width="1"/>
<path d="M30.0 81.2 q30 -5 55 0 t50 1" fill="none" stroke="#6FB5E0" stroke-opacity=".7" stroke-width="1"/>
<polygon points="40,96 150,96 130,130 20,130" fill="rgba(14,22,32,.92)" stroke="rgba(232,185,99,.55)" stroke-width="1"/>
<circle cx="55.4" cy="115.5" r="1.8" fill="#E8B963" opacity="0.88"/>
<circle cx="114.5" cy="105.8" r="2.5" fill="#E8B963" opacity="0.42"/>
<circle cx="70.9" cy="121.7" r="1.3" fill="#E8B963" opacity="0.64"/>
<circle cx="30.9" cy="118.7" r="2.2" fill="#E8B963" opacity="0.69"/>
<circle cx="130.0" cy="106.7" r="2.1" fill="#E8B963" opacity="0.71"/>
<circle cx="94.7" cy="111.5" r="2.3" fill="#E8B963" opacity="0.92"/>
<circle cx="78.9" cy="118.6" r="1.2" fill="#E8B963" opacity="0.77"/>
<circle cx="91.3" cy="129.8" r="2.3" fill="#E8B963" opacity="0.52"/>
<circle cx="69.1" cy="118.7" r="1.1" fill="#E8B963" opacity="0.63"/>
<circle cx="56.1" cy="100.0" r="1.2" fill="#E8B963" opacity="0.81"/>
<circle cx="49.3" cy="104.4" r="1.6" fill="#E8B963" opacity="0.87"/>
<circle cx="39.9" cy="111.3" r="1.9" fill="#E8B963" opacity="0.88"/>
<circle cx="112.8" cy="125.4" r="1.5" fill="#E8B963" opacity="0.60"/>
<circle cx="61.8" cy="126.1" r="2.4" fill="#E8B963" opacity="0.44"/>
<circle cx="54.7" cy="103.9" r="1.4" fill="#E8B963" opacity="0.64"/>
<circle cx="99.5" cy="104.9" r="1.1" fill="#E8B963" opacity="0.60"/>
<circle cx="69.3" cy="115.3" r="2.4" fill="#E8B963" opacity="0.76"/>
<circle cx="84.4" cy="117.0" r="2.0" fill="#E8B963" opacity="0.38"/>
<circle cx="123.3" cy="122.5" r="2.3" fill="#E8B963" opacity="0.83"/>
<circle cx="75.2" cy="109.6" r="1.2" fill="#E8B963" opacity="0.73"/>
<circle cx="45.5" cy="98.3" r="1.4" fill="#E8B963" opacity="0.45"/>
<circle cx="76.4" cy="97.8" r="1.1" fill="#E8B963" opacity="0.44"/>
<circle cx="43.9" cy="108.4" r="1.1" fill="#E8B963" opacity="0.87"/>
<circle cx="104.6" cy="101.1" r="1.5" fill="#E8B963" opacity="0.56"/>
<circle cx="77.6" cy="100.2" r="2.3" fill="#E8B963" opacity="0.95"/>
<circle cx="81.6" cy="112.5" r="1.2" fill="#E8B963" opacity="0.41"/>
</svg>
            <figcaption><span>Remote sensing</span><span>Geophysics</span><span>Geochemistry</span></figcaption>
          </figure>
          <p>Geochemistry, geophysics, remote sensing and other surveys are cleaned and aligned to one grid, so every cell carries the same set of features.</p>
        </li>
        <li class="pipe2-step">
          <div class="pipe2-head"><span class="pipe2-num">02</span><h3>Train</h3></div>
          <figure class="pipe2-art">
            <svg viewBox="0 0 170 150" aria-hidden="true">
<rect x="13" y="14" width="21" height="25" fill="#E8B963" fill-opacity="0.12" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="37" y="14" width="21" height="25" fill="#E8B963" fill-opacity="0.22" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="61" y="14" width="21" height="25" fill="#E8B963" fill-opacity="0.12" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="85" y="14" width="21" height="25" fill="#E8B963" fill-opacity="0.22" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="109" y="14" width="21" height="25" fill="#E8B963" fill-opacity="0.12" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="133" y="14" width="21" height="25" fill="#E8B963" fill-opacity="0.22" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="13" y="42" width="21" height="25" fill="#E8B963" fill-opacity="0.22" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="37" y="42" width="21" height="25" fill="#E8B963" fill-opacity="0.12" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="61" y="42" width="21" height="25" fill="#E8B963" fill-opacity="0.22" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="85" y="42" width="21" height="25" fill="#6FB5E0" fill-opacity="0.55" stroke="#6FB5E0" stroke-opacity="0.9" stroke-width="1"/>
<rect x="109" y="42" width="21" height="25" fill="#6FB5E0" fill-opacity="0.55" stroke="#6FB5E0" stroke-opacity="0.9" stroke-width="1"/>
<rect x="133" y="42" width="21" height="25" fill="#E8B963" fill-opacity="0.12" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="13" y="70" width="21" height="25" fill="#E8B963" fill-opacity="0.12" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="37" y="70" width="21" height="25" fill="#E8B963" fill-opacity="0.22" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="61" y="70" width="21" height="25" fill="#E8B963" fill-opacity="0.12" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="85" y="70" width="21" height="25" fill="#6FB5E0" fill-opacity="0.55" stroke="#6FB5E0" stroke-opacity="0.9" stroke-width="1"/>
<rect x="109" y="70" width="21" height="25" fill="#6FB5E0" fill-opacity="0.55" stroke="#6FB5E0" stroke-opacity="0.9" stroke-width="1"/>
<rect x="133" y="70" width="21" height="25" fill="#E8B963" fill-opacity="0.22" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="13" y="98" width="21" height="25" fill="#E8B963" fill-opacity="0.22" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="37" y="98" width="21" height="25" fill="#E8B963" fill-opacity="0.12" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="61" y="98" width="21" height="25" fill="#E8B963" fill-opacity="0.22" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="85" y="98" width="21" height="25" fill="#E8B963" fill-opacity="0.12" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="109" y="98" width="21" height="25" fill="#E8B963" fill-opacity="0.22" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="133" y="98" width="21" height="25" fill="#E8B963" fill-opacity="0.12" stroke="#E8B963" stroke-opacity="0.35" stroke-width="1"/>
<rect x="83" y="40" width="49" height="57" fill="none" stroke="#6FB5E0" stroke-width="1.4" stroke-dasharray="3 3"/>
<path d="M30 26 L33.5 28 L33.5 32 L30 34 L26.5 32 L26.5 28 Z" fill="#E8B963"/>
<path d="M60 94 L63.5 96 L63.5 100 L60 102 L56.5 100 L56.5 96 Z" fill="#E8B963"/>
<path d="M110 58 L113.5 60 L113.5 64 L110 66 L106.5 64 L106.5 60 Z" fill="#E8B963"/>
<path d="M140 36 L143.5 38 L143.5 42 L140 44 L136.5 42 L136.5 38 Z" fill="#E8B963"/>
<path d="M88 116 L91.5 118 L91.5 122 L88 124 L84.5 122 L84.5 118 Z" fill="#E8B963"/>
</svg>
            <figcaption><span class="k-gold">Known deposit</span><span class="k-sky">Held-out block</span></figcaption>
          </figure>
          <p>The model learns from confirmed deposits and their geology. Whole blocks of ground are held out during testing (spatial cross-validation), so it is scored on areas it has never seen.</p>
        </li>
        <li class="pipe2-step">
          <div class="pipe2-head"><span class="pipe2-num">03</span><h3>Predict</h3></div>
          <figure class="pipe2-art pipe2-art-map">
            <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/model-run-heatmap.webp?ver=' . filemtime( get_stylesheet_directory() . '/assets/img/model-run-heatmap.webp' ) ); ?>" alt="Lithium prospectivity map from a recent model run across the Great Basin" loading="lazy" width="1168" height="1128">
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
        <p style="color:var(--xr-text-2);font-size:17px;line-height:1.8;margin:0 0 18px;">Our Nevada lithium prospectivity model recovers <strong style="color:var(--xr-text);">39%</strong> of known deposits in the <strong style="color:var(--xr-text);">top 1%</strong> of ranked ground, which is 39x more effective than a uniform search. The model is trained on deposit and geochemistry/geophysics data across 19,000 grid cells, validated under spacial cross-validation, and built on a five-model ensemble.</p>
        <p style="color:var(--xr-text-2);font-size:17px;line-height:1.8;margin:0 0 32px;">We work with clients in <strong style="color:var(--xr-text);">two ways:</strong> annual platform subscription services and individual project engagement. Annual platform access is best for active exploration programs running ongoing target work, while individual project terms are tailored to fit the engagement.</p>

        <a href="<?php echo esc_url( home_url( '/product/' ) ); ?>" class="xr-btn xr-btn-outline">Explore the Product <span class="xr-arrow">→</span></a>
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
          <div class="lift-scale" aria-hidden="true"><span>0%</span><span>25%</span><span>50%</span><span>75%</span><span>100%</span></div>
        </div>

        <dl class="lift-facts">
          <div><dt>19,000</dt><dd>grid cells</dd></div>
          <div><dt>5</dt><dd>model ensemble</dd></div>
          <div><dt>1&times;1 km</dt><dd>current resolution</dd></div>
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
          <div class="rm2-art"><svg viewBox="0 0 140 140" aria-hidden="true"><rect x="10.00" y="10.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.23"/><rect x="40.00" y="10.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.51"/><rect x="70.00" y="10.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.65"/><rect x="100.00" y="10.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.45"/><rect x="10.00" y="40.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.32"/><rect x="40.00" y="40.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.74"/><rect x="70.00" y="40.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.95"/><rect x="100.00" y="40.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.65"/><rect x="10.00" y="70.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.25"/><rect x="40.00" y="70.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.57"/><rect x="70.00" y="70.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.74"/><rect x="100.00" y="70.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.51"/><rect x="10.00" y="100.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.13"/><rect x="40.00" y="100.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.25"/><rect x="70.00" y="100.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.32"/><rect x="100.00" y="100.00" width="29.00" height="29.00" fill="#E8B963" fill-opacity="0.23"/></svg></div>
          <h3>Prototype model</h3>
          <p>A first lithium model for the Great Basin. It ranks ground at 1&times;1&nbsp;km, which proves the method but is too coarse to sell.</p>
        </li>
        <li class="rm2-step is-next">
          <span class="rm2-node" aria-hidden="true"></span>
          <span class="rm2-when">Next</span>
          <div class="rm2-art"><svg viewBox="0 0 140 140" aria-hidden="true"><rect x="10.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="32.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="40.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="47.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="55.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="62.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="70.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.14"/><rect x="77.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="85.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.14"/><rect x="92.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="100.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.11"/><rect x="107.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="115.00" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="122.50" y="10.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="10.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="32.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="40.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="47.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="55.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="62.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.19"/><rect x="70.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.22"/><rect x="77.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.24"/><rect x="85.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.23"/><rect x="92.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.20"/><rect x="100.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.16"/><rect x="107.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="115.00" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="122.50" y="17.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="10.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="32.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="40.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="47.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.16"/><rect x="55.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.23"/><rect x="62.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.30"/><rect x="70.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.36"/><rect x="77.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.38"/><rect x="85.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.36"/><rect x="92.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.31"/><rect x="100.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.24"/><rect x="107.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.18"/><rect x="115.00" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="122.50" y="25.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="10.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="32.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="40.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="47.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.22"/><rect x="55.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.33"/><rect x="62.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.44"/><rect x="70.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.53"/><rect x="77.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.57"/><rect x="85.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.54"/><rect x="92.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.46"/><rect x="100.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.35"/><rect x="107.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.24"/><rect x="115.00" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.16"/><rect x="122.50" y="32.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.11"/><rect x="10.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="32.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="40.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.18"/><rect x="47.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.29"/><rect x="55.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.43"/><rect x="62.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.58"/><rect x="70.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.71"/><rect x="77.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.76"/><rect x="85.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.73"/><rect x="92.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.61"/><rect x="100.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.46"/><rect x="107.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.31"/><rect x="115.00" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.20"/><rect x="122.50" y="40.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="10.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="32.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="40.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.21"/><rect x="47.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.33"/><rect x="55.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.51"/><rect x="62.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.69"/><rect x="70.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.85"/><rect x="77.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.91"/><rect x="85.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.87"/><rect x="92.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.73"/><rect x="100.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.54"/><rect x="107.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.36"/><rect x="115.00" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.23"/><rect x="122.50" y="47.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.14"/><rect x="10.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="32.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="40.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.22"/><rect x="47.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.35"/><rect x="55.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.53"/><rect x="62.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.73"/><rect x="70.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.89"/><rect x="77.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.96"/><rect x="85.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.91"/><rect x="92.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.76"/><rect x="100.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.57"/><rect x="107.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.38"/><rect x="115.00" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.24"/><rect x="122.50" y="55.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="10.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="32.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="40.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.20"/><rect x="47.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.33"/><rect x="55.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.49"/><rect x="62.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.68"/><rect x="70.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.82"/><rect x="77.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.89"/><rect x="85.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.85"/><rect x="92.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.71"/><rect x="100.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.53"/><rect x="107.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.36"/><rect x="115.00" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.22"/><rect x="122.50" y="62.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.14"/><rect x="10.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="32.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.11"/><rect x="40.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.18"/><rect x="47.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.27"/><rect x="55.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.41"/><rect x="62.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.56"/><rect x="70.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.68"/><rect x="77.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.73"/><rect x="85.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.69"/><rect x="92.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.58"/><rect x="100.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.44"/><rect x="107.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.30"/><rect x="115.00" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.19"/><rect x="122.50" y="70.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="10.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="32.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="40.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.14"/><rect x="47.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.21"/><rect x="55.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.31"/><rect x="62.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.41"/><rect x="70.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.49"/><rect x="77.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.53"/><rect x="85.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.51"/><rect x="92.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.43"/><rect x="100.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.33"/><rect x="107.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.23"/><rect x="115.00" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="122.50" y="77.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="10.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="32.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="40.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.11"/><rect x="47.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="55.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.21"/><rect x="62.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.27"/><rect x="70.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.33"/><rect x="77.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.35"/><rect x="85.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.33"/><rect x="92.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.29"/><rect x="100.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.22"/><rect x="107.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.16"/><rect x="115.00" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="122.50" y="85.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="10.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="32.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="40.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="47.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.11"/><rect x="55.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.14"/><rect x="62.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.18"/><rect x="70.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.20"/><rect x="77.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.22"/><rect x="85.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.21"/><rect x="92.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.18"/><rect x="100.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.15"/><rect x="107.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="115.00" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="122.50" y="92.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="10.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="32.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="40.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="47.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="55.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="62.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.11"/><rect x="70.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="77.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="85.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.13"/><rect x="92.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.12"/><rect x="100.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.10"/><rect x="107.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="115.00" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="122.50" y="100.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="10.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="32.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="40.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="47.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="55.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="62.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="70.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="77.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="85.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.09"/><rect x="92.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="100.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.08"/><rect x="107.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="115.00" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="122.50" y="107.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="10.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="32.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="40.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="47.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="55.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="62.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="70.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="77.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="85.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="92.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="100.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.07"/><rect x="107.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="115.00" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="122.50" y="115.00" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="10.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="17.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="25.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="32.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="40.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="47.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="55.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="62.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="70.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="77.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="85.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="92.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="100.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="107.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="115.00" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/><rect x="122.50" y="122.50" width="6.90" height="6.90" fill="#E8B963" fill-opacity="0.06"/></svg></div>
          <h3>Finer models</h3>
          <p>A series of progressively finer models, working down toward 1&times;1&nbsp;m, precise enough to site individual boreholes.</p>
        </li>
        <li class="rm2-step">
          <span class="rm2-node" aria-hidden="true"></span>
          <span class="rm2-when">Then</span>
          <div class="rm2-art"><svg viewBox="0 0 140 140" aria-hidden="true"><rect x="10" y="10" width="120" height="120" fill="rgba(232,185,99,.04)"/><path d="M10 44 q30 -6 60 0 t60 2" fill="none" stroke="rgba(168,178,192,.35)" stroke-width="1"/><path d="M10 66 q30 -3 60 0 t60 1" fill="none" stroke="rgba(168,178,192,.35)" stroke-width="1"/><path d="M10 88 q30 0 60 0 t60 0" fill="none" stroke="rgba(168,178,192,.35)" stroke-width="1"/><path d="M10 110 q30 3 60 0 t60 -1" fill="none" stroke="rgba(168,178,192,.35)" stroke-width="1"/><ellipse cx="70" cy="98" rx="24" ry="9" fill="#E8B963" fill-opacity=".35"/><line x1="70" y1="18" x2="70" y2="98" stroke="#6FB5E0" stroke-width="2"/><line x1="65" y1="30" x2="75" y2="30" stroke="#6FB5E0" stroke-width="1"/><line x1="65" y1="40" x2="75" y2="40" stroke="#6FB5E0" stroke-width="1"/><line x1="65" y1="50" x2="75" y2="50" stroke="#6FB5E0" stroke-width="1"/><line x1="65" y1="60" x2="75" y2="60" stroke="#6FB5E0" stroke-width="1"/><line x1="65" y1="70" x2="75" y2="70" stroke="#6FB5E0" stroke-width="1"/><line x1="65" y1="80" x2="75" y2="80" stroke="#6FB5E0" stroke-width="1"/><line x1="65" y1="90" x2="75" y2="90" stroke="#6FB5E0" stroke-width="1"/><path d="M62 10 L78 10 L74 18 L66 18 Z" fill="#6FB5E0"/><circle cx="70" cy="98" r="3.5" fill="#E8B963"/></svg></div>
          <h3>Field testing</h3>
          <p>Checking predictions against real drilling and sampling, and feeding the results back until the model is accurate enough to sell.</p>
        </li>
        <li class="rm2-step">
          <span class="rm2-node" aria-hidden="true"></span>
          <span class="rm2-when">Then</span>
          <div class="rm2-art"><svg viewBox="0 0 140 140" aria-hidden="true"><rect x="10" y="18" width="120" height="104" fill="rgba(14,22,32,.9)" stroke="rgba(232,185,99,.55)"/><line x1="10" y1="30" x2="130" y2="30" stroke="rgba(232,185,99,.35)"/><circle cx="17" cy="24" r="1.8" fill="rgba(232,185,99,.6)"/><circle cx="23" cy="24" r="1.8" fill="rgba(232,185,99,.4)"/><rect x="16.00" y="38.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.08"/><rect x="25.00" y="38.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.11"/><rect x="34.00" y="38.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.17"/><rect x="43.00" y="38.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.23"/><rect x="52.00" y="38.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.25"/><rect x="61.00" y="38.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.22"/><rect x="70.00" y="38.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.15"/><rect x="79.00" y="38.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.10"/><rect x="16.00" y="47.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.10"/><rect x="25.00" y="47.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.17"/><rect x="34.00" y="47.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.31"/><rect x="43.00" y="47.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.45"/><rect x="52.00" y="47.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.50"/><rect x="61.00" y="47.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.42"/><rect x="70.00" y="47.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.28"/><rect x="79.00" y="47.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.15"/><rect x="16.00" y="56.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.12"/><rect x="25.00" y="56.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.25"/><rect x="34.00" y="56.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.47"/><rect x="43.00" y="56.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.71"/><rect x="52.00" y="56.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.80"/><rect x="61.00" y="56.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.67"/><rect x="70.00" y="56.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.42"/><rect x="79.00" y="56.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.22"/><rect x="16.00" y="65.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.14"/><rect x="25.00" y="65.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.29"/><rect x="34.00" y="65.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.56"/><rect x="43.00" y="65.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.85"/><rect x="52.00" y="65.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.96"/><rect x="61.00" y="65.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.80"/><rect x="70.00" y="65.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.50"/><rect x="79.00" y="65.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.25"/><rect x="16.00" y="74.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.13"/><rect x="25.00" y="74.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.26"/><rect x="34.00" y="74.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.50"/><rect x="43.00" y="74.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.75"/><rect x="52.00" y="74.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.85"/><rect x="61.00" y="74.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.71"/><rect x="70.00" y="74.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.45"/><rect x="79.00" y="74.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.23"/><rect x="16.00" y="83.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.10"/><rect x="25.00" y="83.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.19"/><rect x="34.00" y="83.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.34"/><rect x="43.00" y="83.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.50"/><rect x="52.00" y="83.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.56"/><rect x="61.00" y="83.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.47"/><rect x="70.00" y="83.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.31"/><rect x="79.00" y="83.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.17"/><rect x="16.00" y="92.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.08"/><rect x="25.00" y="92.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.12"/><rect x="34.00" y="92.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.19"/><rect x="43.00" y="92.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.26"/><rect x="52.00" y="92.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.29"/><rect x="61.00" y="92.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.25"/><rect x="70.00" y="92.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.17"/><rect x="79.00" y="92.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.11"/><rect x="16.00" y="101.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.07"/><rect x="25.00" y="101.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.08"/><rect x="34.00" y="101.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.10"/><rect x="43.00" y="101.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.13"/><rect x="52.00" y="101.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.14"/><rect x="61.00" y="101.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.12"/><rect x="70.00" y="101.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.10"/><rect x="79.00" y="101.00" width="8.00" height="8.00" fill="#E8B963" fill-opacity="0.08"/><rect x="94" y="40" width="30" height="6" fill="#E8B963" fill-opacity="0.85"/><rect x="94" y="52" width="24" height="6" fill="#E8B963" fill-opacity="0.67"/><rect x="94" y="64" width="19" height="6" fill="#E8B963" fill-opacity="0.49"/><rect x="94" y="76" width="14" height="6" fill="#E8B963" fill-opacity="0.31"/><rect x="94" y="94" width="30" height="20" fill="none" stroke="#6FB5E0" stroke-opacity=".6"/><path d="M98 110 l7 -8 l6 5 l9 -9" fill="none" stroke="#6FB5E0" stroke-width="1.2"/></svg></div>
          <h3>Software platform</h3>
          <p>Geologist teams import their survey data and get ranked drill targets, a heat map, a 3D view of the target area and other geoanalysis tools.</p>
        </li>
        <li class="rm2-step">
          <span class="rm2-node" aria-hidden="true"></span>
          <span class="rm2-when">Later</span>
          <div class="rm2-art"><svg viewBox="0 0 140 140" aria-hidden="true"><rect x="12" y="28" width="36" height="40" fill="#E8B963" fill-opacity="0.9" stroke="#E8B963" stroke-opacity="1"/><text x="30" y="53" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="13" font-weight="700" fill="#0E141B">Li</text><rect x="52" y="28" width="36" height="40" fill="none" fill-opacity="0" stroke="#E8B963" stroke-opacity="0.35"/><text x="70" y="53" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="13" font-weight="700" fill="rgba(232,185,99,.55)">Cu</text><rect x="92" y="28" width="36" height="40" fill="none" fill-opacity="0" stroke="#E8B963" stroke-opacity="0.35"/><text x="110" y="53" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="13" font-weight="700" fill="rgba(232,185,99,.55)">Ni</text><rect x="12" y="72" width="36" height="40" fill="none" fill-opacity="0" stroke="#E8B963" stroke-opacity="0.35"/><text x="30" y="97" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="13" font-weight="700" fill="rgba(232,185,99,.55)">Co</text><rect x="52" y="72" width="36" height="40" fill="none" fill-opacity="0" stroke="#E8B963" stroke-opacity="0.35"/><text x="70" y="97" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="13" font-weight="700" fill="rgba(232,185,99,.55)">Au</text><rect x="92" y="72" width="36" height="40" fill="none" fill-opacity="0" stroke="#E8B963" stroke-opacity="0.35"/><text x="110" y="97" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="10" font-weight="700" fill="rgba(232,185,99,.55)">REE</text></svg></div>
          <h3>Other minerals</h3>
          <p>Once lithium is proven, the same method is applied to other minerals that mining companies explore for.</p>
        </li>
      </ol>

      <div class="xr-reveal xr-d2" style="text-align:center;margin-top:48px;">
        <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>" class="xr-btn xr-btn-ghost">See the roadmap <span class="xr-arrow">→</span></a>
      </div>
    </div>
  </section>

  <!-- ═════════════════════════ WHY X-RAY — vs. comparison ═════════════════════════ -->
  <section class="xr-section why-sec">
    <!-- Top-of-section gold rule removed per May 2026 user request. -->

    <div class="xr-container">
      <div class="xr-reveal" style="text-align:center;margin-bottom:48px;max-width:780px;margin-left:auto;margin-right:auto;">
        <h2>Software economics. <span style="color:var(--xr-gold);">Not</span> consulting economics.</h2>
        <p style="color:var(--xr-text-2);font-size:16px;line-height:1.7;margin:14px 0 0;">How X-Ray compares with a traditional consultant and GIS study.</p>
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
        <a href="<?php echo esc_url( home_url( '/product/' ) ); ?>" class="xr-btn xr-btn-ghost">See how we compare <span class="xr-arrow">→</span></a>
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
      <div class="xr-reveal xr-d3" style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
        <a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>" class="xr-btn xr-btn-gold" style="font-size:16px;padding:16px 36px;">Learn More</a>
        <a href="<?php echo esc_url( home_url( '/product/' ) ); ?>" class="xr-btn xr-btn-outline" style="font-size:16px;padding:16px 36px;">See the Product <span class="xr-arrow">→</span></a>
      </div>
    </div>
  </section>

  </div><!-- /.parallax-strip -->

  <!-- ═════════════════════════ FOOTER ═════════════════════════ -->
  <?php xray_site_footer(); ?>

    <?php
});
