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

      <!-- Pipeline diagram replaces the numbered hex steps -->
      <div class="xr-reveal xr-d1 pipeline">
        <div class="pipeline-step">
          <div class="pipeline-step-art">
            <svg viewBox="0 0 100 80" aria-hidden="true">
              <rect x="6"  y="14" width="14" height="44" rx="1" fill="var(--xr-gold)" opacity="0.85"/>
              <rect x="26" y="22" width="14" height="36" rx="1" fill="var(--xr-gold)" opacity="0.55"/>
              <rect x="46" y="8"  width="14" height="50" rx="1" fill="var(--xr-gold)" opacity="0.7"/>
              <rect x="66" y="30" width="14" height="28" rx="1" fill="var(--xr-sky)"  opacity="0.6"/>
              <line x1="0" y1="68" x2="100" y2="68" stroke="rgba(232,185,99,0.35)" stroke-width="1" stroke-dasharray="2 3"/>
            </svg>
          </div>
          <div class="pipeline-step-label">Clean</div>
          <p>Geochemistry, geophysics, remote sensing, and other datasets are cleaned and merged into a set of features.</p>
        </div>

        <div class="pipeline-arrow" aria-hidden="true">
          <svg aria-hidden="true" viewBox="0 0 100 14"><path d="M0 7 L92 7 M88 2 L94 7 L88 12" fill="none" stroke="var(--xr-gold)" stroke-width="1.4" stroke-linecap="round"/></svg>
        </div>

        <div class="pipeline-step">
          <div class="pipeline-step-art">
            <svg viewBox="0 0 100 80" aria-hidden="true">
              <g fill="none" stroke="var(--xr-gold)" stroke-width="1">
                <polygon points="50,8 76,22 76,50 50,64 24,50 24,22" fill="var(--xr-gold)" opacity="0.85"/>
                <polygon points="20,28 36,38 36,56 20,66 4,56 4,38"  fill="var(--xr-gold)" opacity="0.45"/>
                <polygon points="80,28 96,38 96,56 80,66 64,56 64,38" fill="var(--xr-sky)"  opacity="0.5"/>
              </g>
              <circle cx="50" cy="36" r="3" fill="var(--xr-void)"/>
              <line x1="50" y1="20" x2="50" y2="32" stroke="var(--xr-void)" stroke-width="1.2"/>
              <line x1="50" y1="40" x2="50" y2="52" stroke="var(--xr-void)" stroke-width="1.2"/>
              <line x1="38" y1="36" x2="46" y2="36" stroke="var(--xr-void)" stroke-width="1.2"/>
              <line x1="54" y1="36" x2="62" y2="36" stroke="var(--xr-void)" stroke-width="1.2"/>
            </svg>
          </div>
          <div class="pipeline-step-label">Train</div>
          <p>Model learns from confirmed deposits and geology and uses spacial cross-validation to prevent overfitting.</p>
        </div>

        <div class="pipeline-arrow" aria-hidden="true">
          <svg aria-hidden="true" viewBox="0 0 100 14"><path d="M0 7 L92 7 M88 2 L94 7 L88 12" fill="none" stroke="var(--xr-gold)" stroke-width="1.4" stroke-linecap="round"/></svg>
        </div>

        <div class="pipeline-step">
          <div class="pipeline-step-art">
            <svg viewBox="0 0 100 80" aria-hidden="true">
              <path d="M8 60 Q30 18 50 38 T92 22" fill="none" stroke="var(--xr-gold)" stroke-width="2" stroke-linecap="round"/>
              <circle cx="8"  cy="60" r="3" fill="var(--xr-gold)"/>
              <circle cx="30" cy="34" r="3" fill="var(--xr-gold)"/>
              <circle cx="50" cy="38" r="3" fill="var(--xr-gold)"/>
              <circle cx="70" cy="28" r="3" fill="var(--xr-gold)"/>
              <circle cx="92" cy="22" r="3.5" fill="var(--xr-green)"/>
              <path d="M86 22 L92 16 L98 22" fill="none" stroke="var(--xr-green)" stroke-width="1.5"/>
            </svg>
          </div>
          <div class="pipeline-step-label">Predict</div>
          <p>Our model produces prospectivity maps that identify areas of high probability, then we run additional computations on those areas to narrow the search area.</p>
        </div>
      </div>

      <div class="xr-reveal xr-quote" style="margin-top:60px;">Months of senior geoscience — compressed into an afternoon.</div>
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

  <!-- ═════════════════════════ ROADMAP (themed phase cards) ═════════════════════════ -->
  <section class="xr-section roadmap-sec">

    <div class="xr-container">
      <div class="xr-reveal" style="text-align:center;margin-bottom:48px;max-width:840px;margin-left:auto;margin-right:auto;">
        <h2>One platform. From Nevada lithium to lunar ice.</h2>
        <p style="color:var(--xr-text-2);font-size:16px;line-height:1.7;margin:14px 0 0;">We are currently developing the Nevada lithium model. Looking to the future, X-Ray is planning on using the same methodology applied to a broader range of minerals, and even for Lunar ice.</p>
      </div>

      <div class="roadmap-grid xr-reveal xr-d1">
        <!-- 1. Nevada Lithium — themed: Nevada state outline -->
        <article class="phase-card phase-live">
          <span class="phase-status"><span class="phase-status-dot"></span>In Development</span>
          <div class="phase-art">
            <!-- Nevada outline projected from its real border coordinates:
                 42°N north line, 114.04°W east line down to Lake Mead,
                 the Colorado River south to the 35°N tip, the diagonal
                 California line to Lake Tahoe, then 120°W north. -->
            <svg viewBox="0 0 100 130" aria-hidden="true">
              <path d="M10.0 5.0 L89.9 5.0 L89.9 104.6 L88.5 105.8 L86.1 106.8 L83.8 105.6 L82.2 106.1 L80.6 107.7 L81.0 110.4 L81.5 114.4 L82.7 119.0 L82.2 122.8 L82.0 125.0 L10.0 56.4 Z"
                    fill="rgba(232,185,99,0.06)" stroke="var(--xr-gold)" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"/>
              <!-- Active exploration target — northern Nevada lithium basin -->
              <circle cx="44" cy="38" r="11" fill="none" stroke="var(--xr-green)" stroke-width="1.5"/>
              <circle cx="44" cy="38" r="4" fill="var(--xr-green)"/>
              <line x1="44" y1="24" x2="44" y2="31" stroke="var(--xr-green)" stroke-width="1.5"/>
              <line x1="44" y1="45" x2="44" y2="52" stroke="var(--xr-green)" stroke-width="1.5"/>
              <line x1="30" y1="38" x2="37" y2="38" stroke="var(--xr-green)" stroke-width="1.5"/>
              <line x1="51" y1="38" x2="58" y2="38" stroke="var(--xr-green)" stroke-width="1.5"/>
            </svg>
          </div>
          <h3>Nevada Lithium</h3>
          <p><strong style="color:var(--xr-gold);">In active development</strong>.</p>
        </article>

        <!-- 2. Western US Cu & REE — themed: copper-ore vein under ridgeline -->
        <article class="phase-card phase-dev">
          <span class="phase-status"><span class="phase-status-dot dev"></span>Long-term Roadmap</span>
          <div class="phase-art">
            <svg viewBox="0 0 130 100" aria-hidden="true">
              <defs>
                <linearGradient id="cuOreGrad" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%"  stop-color="#E8B963"/>
                  <stop offset="50%" stop-color="#C77A3D"/>
                  <stop offset="100%" stop-color="#6FB5E0"/>
                </linearGradient>
              </defs>
              <!-- Sky/sub-surface backdrop -->
              <rect x="0" y="0" width="130" height="38" fill="rgba(111,181,224,0.04)"/>
              <!-- Western-US ridgeline silhouette (Sierra Nevada → Rockies feel) -->
              <path d="M0 60 L12 50 L20 56 L30 44 L42 52 L52 38 L62 46 L72 32 L82 42 L92 36 L102 44 L114 38 L122 46 L130 42 L130 100 L0 100 Z"
                    fill="rgba(14,20,27,0.85)" stroke="rgba(111,181,224,0.6)" stroke-width="1.2" stroke-linejoin="round"/>
              <!-- Sub-surface ore vein in copper gradient running diagonally -->
              <path d="M14 80 Q40 70 60 78 T118 72"
                    fill="none" stroke="url(#cuOreGrad)" stroke-width="2.2" stroke-linecap="round"/>
              <!-- Ore nodes pulsing along the vein -->
              <circle cx="36" cy="76" r="2.6" fill="#E8B963"/>
              <circle cx="68" cy="78" r="3"   fill="#C77A3D"/>
              <circle cx="98" cy="74" r="2.4" fill="#6FB5E0"/>
              <!-- Element tags floating in sky region -->
              <g font-family="JetBrains Mono, monospace" font-weight="700">
                <rect x="14" y="10" width="22" height="20" rx="1" fill="rgba(232,185,99,0.12)" stroke="var(--xr-gold)" stroke-width="0.9"/>
                <text x="25" y="23" text-anchor="middle" fill="var(--xr-gold)" font-size="10">Cu</text>
                <rect x="50" y="10" width="26" height="20" rx="1" fill="rgba(111,181,224,0.1)" stroke="var(--xr-sky)" stroke-width="0.9"/>
                <text x="63" y="23" text-anchor="middle" fill="var(--xr-sky)" font-size="9.5">REE</text>
                <rect x="90" y="10" width="22" height="20" rx="1" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.45)" stroke-width="0.8"/>
                <text x="101" y="23" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="10">Au</text>
              </g>
            </svg>
          </div>
          <h3>Western US Cu &amp; REE</h3>
          <p>Future models for copper, rare earths and gold across the Cordillera — on the same fusion infrastructure. Long-term roadmap.</p>
        </article>

        <!-- 3. Global · All Minerals — themed: periodic-table tiles -->
        <article class="phase-card phase-soon">
          <span class="phase-status"><span class="phase-status-dot soon"></span>Roadmap</span>
          <div class="phase-art">
            <svg viewBox="0 0 130 90" aria-hidden="true">
              <!-- Periodic-table style grid of element tiles -->
              <g font-family="JetBrains Mono, monospace" font-weight="700">
                <rect x="4"   y="4"  width="20" height="22" rx="1" fill="rgba(232,185,99,0.18)" stroke="var(--xr-gold)" stroke-width="1"/>
                <text x="14"  y="18" text-anchor="middle" fill="var(--xr-gold)" font-size="9">Li</text>
                <rect x="28"  y="4"  width="20" height="22" rx="1" fill="rgba(232,185,99,0.1)" stroke="rgba(232,185,99,0.5)" stroke-width="1"/>
                <text x="38"  y="18" text-anchor="middle" fill="var(--xr-gold)" font-size="9">Cu</text>
                <rect x="52"  y="4"  width="20" height="22" rx="1" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.35)" stroke-width="1"/>
                <text x="62"  y="18" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Au</text>
                <rect x="76"  y="4"  width="20" height="22" rx="1" fill="rgba(111,181,224,0.08)" stroke="rgba(111,181,224,0.45)" stroke-width="1"/>
                <text x="86"  y="18" text-anchor="middle" fill="var(--xr-sky)" font-size="9">Ni</text>
                <rect x="100" y="4"  width="20" height="22" rx="1" fill="rgba(111,181,224,0.06)" stroke="rgba(111,181,224,0.3)" stroke-width="1"/>
                <text x="110" y="18" text-anchor="middle" fill="rgba(111,181,224,0.85)" font-size="9">Co</text>

                <rect x="4"   y="32" width="20" height="22" rx="1" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.32)" stroke-width="1"/>
                <text x="14"  y="46" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Ag</text>
                <rect x="28"  y="32" width="20" height="22" rx="1" fill="rgba(111,181,224,0.08)" stroke="rgba(111,181,224,0.4)" stroke-width="1"/>
                <text x="38"  y="46" text-anchor="middle" fill="var(--xr-sky)" font-size="9">U</text>
                <rect x="52"  y="32" width="20" height="22" rx="1" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.3)" stroke-width="1"/>
                <text x="62"  y="46" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Pt</text>
                <rect x="76"  y="32" width="20" height="22" rx="1" fill="rgba(111,181,224,0.06)" stroke="rgba(111,181,224,0.3)" stroke-width="1"/>
                <text x="86"  y="46" text-anchor="middle" fill="rgba(111,181,224,0.85)" font-size="9">Mo</text>
                <rect x="100" y="32" width="20" height="22" rx="1" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.3)" stroke-width="1"/>
                <text x="110" y="46" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Zn</text>

                <rect x="4"   y="60" width="20" height="22" rx="1" fill="rgba(232,185,99,0.04)" stroke="rgba(232,185,99,0.22)" stroke-width="1"/>
                <text x="14"  y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">Sn</text>
                <rect x="28"  y="60" width="20" height="22" rx="1" fill="rgba(111,181,224,0.04)" stroke="rgba(111,181,224,0.22)" stroke-width="1"/>
                <text x="38"  y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">V</text>
                <rect x="52"  y="60" width="20" height="22" rx="1" fill="rgba(232,185,99,0.04)" stroke="rgba(232,185,99,0.22)" stroke-width="1"/>
                <text x="62"  y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">Pd</text>
                <rect x="76"  y="60" width="20" height="22" rx="1" fill="rgba(111,181,224,0.04)" stroke="rgba(111,181,224,0.22)" stroke-width="1"/>
                <text x="86"  y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">W</text>
                <rect x="100" y="60" width="20" height="22" rx="1" fill="rgba(232,185,99,0.04)" stroke="rgba(232,185,99,0.22)" stroke-width="1"/>
                <text x="110" y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">Mn</text>
              </g>
            </svg>
          </div>
          <h3>Global · All Minerals</h3>
          <p>Same platform architecture, every commercially important mineral, every producing country.</p>
        </article>

        <!-- 4. Deep Sea Mining — themed: sonar / seafloor -->
        <article class="phase-card phase-deep">
          <span class="phase-status"><span class="phase-status-dot deep"></span>Long-term</span>
          <div class="phase-art">
            <svg viewBox="0 0 130 100" aria-hidden="true">
              <!-- Vessel at top -->
              <path d="M50 14 L80 14 L84 22 L46 22 Z" fill="var(--xr-sky)" opacity="0.85"/>
              <rect x="62" y="8" width="6" height="6" fill="var(--xr-sky)" opacity="0.7"/>
              <!-- Sonar pings (concentric arcs) -->
              <g fill="none" stroke="var(--xr-sky)" stroke-width="1" stroke-linecap="round">
                <path d="M40 38 Q65 28 90 38" opacity="0.7"/>
                <path d="M30 50 Q65 36 100 50" opacity="0.5"/>
                <path d="M20 62 Q65 44 110 62" opacity="0.3"/>
              </g>
              <!-- Seafloor terrain -->
              <path d="M0 78 L18 70 L34 76 L50 66 L66 74 L84 64 L102 72 L120 66 L130 74 L130 100 L0 100 Z"
                    fill="rgba(111,181,224,0.12)" stroke="var(--xr-sky)" stroke-width="1.2"/>
              <!-- Polymetallic nodules -->
              <circle cx="40"  cy="84" r="2.5" fill="var(--xr-gold)" opacity="0.85"/>
              <circle cx="62"  cy="86" r="2"   fill="var(--xr-gold)" opacity="0.7"/>
              <circle cx="88"  cy="82" r="2.8" fill="var(--xr-gold)" opacity="0.9"/>
              <circle cx="110" cy="86" r="2"   fill="var(--xr-gold)" opacity="0.7"/>
            </svg>
          </div>
          <h3>Deep Sea Mining</h3>
          <p>Polymetallic nodules &amp; seafloor sulphides — bathymetry + sediment geochemistry through the same fusion engine.</p>
        </article>

        <!-- 5. Lunar Mining — themed: moon -->
        <article class="phase-card phase-lunar">
          <span class="phase-status"><span class="phase-status-dot lunar"></span>Long-term</span>
          <div class="phase-art">
            <svg viewBox="0 0 130 100" aria-hidden="true">
              <!-- Stars -->
              <g fill="rgba(241,244,248,0.6)">
                <circle cx="10"  cy="14" r="0.8"/>
                <circle cx="118" cy="22" r="1"/>
                <circle cx="22"  cy="34" r="0.7"/>
                <circle cx="106" cy="48" r="0.8"/>
                <circle cx="14"  cy="68" r="0.9"/>
                <circle cx="120" cy="78" r="0.7"/>
              </g>
              <!-- Moon -->
              <defs>
                <radialGradient id="moonGrad" cx="38%" cy="38%">
                  <stop offset="0%"  stop-color="#F1F4F8"/>
                  <stop offset="60%" stop-color="#A8B2C0"/>
                  <stop offset="100%" stop-color="#5a6678"/>
                </radialGradient>
              </defs>
              <circle cx="65" cy="50" r="34" fill="url(#moonGrad)"/>
              <!-- Craters -->
              <g fill="rgba(14,20,27,0.35)">
                <circle cx="54" cy="38" r="4"/>
                <circle cx="74" cy="44" r="3"/>
                <circle cx="60" cy="58" r="5.5"/>
                <circle cx="80" cy="64" r="2.5"/>
                <circle cx="48" cy="68" r="3"/>
                <circle cx="84" cy="36" r="2"/>
              </g>
              <!-- Mining marker -->
              <line x1="60"  y1="58" x2="60"  y2="46" stroke="var(--xr-green)" stroke-width="1.4"/>
              <polygon points="60,42 56,48 64,48" fill="var(--xr-green)"/>
            </svg>
          </div>
          <h3>Lunar Mining</h3>
          <p>Moon-surface resource models. KREEP terranes, ice-bearing shadowed craters — terrestrial methodology applied to the regolith.</p>
        </article>
      </div>

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
        <p style="color:var(--xr-text-2);font-size:16px;line-height:1.7;margin:14px 0 0;">Three dimensions where X-Ray fundamentally outperforms the traditional consultant + GIS workflow.</p>
      </div>

      <!-- vs. comparison: three cards, traditional workflow above, X-Ray below -->
      <div class="vs2-grid xr-reveal xr-d1">
        <article class="vs2-card">
          <div class="vs2-head">
            <span class="vs2-num">01</span>
            <h3>Time to ranked targets</h3>
          </div>
          <div class="vs2-row vs2-old"><span>Traditional</span><p>Months of consultant and GIS work for each project area.</p></div>
          <div class="vs2-row vs2-new"><span>X-Ray</span><p>The model scores every cell across a whole region in one run.</p></div>
        </article>
        <article class="vs2-card">
          <div class="vs2-head">
            <span class="vs2-num">02</span>
            <h3>Improves over time</h3>
          </div>
          <div class="vs2-row vs2-old"><span>Traditional</span><p>A static report that is out of date once drilling starts.</p></div>
          <div class="vs2-row vs2-new"><span>X-Ray</span><p>Each new drill result can feed back in and sharpen the next ranking.</p></div>
        </article>
        <article class="vs2-card">
          <div class="vs2-head">
            <span class="vs2-num">03</span>
            <h3>Geoscience bottleneck</h3>
          </div>
          <div class="vs2-row vs2-old"><span>Traditional</span><p>Limited by how much data a team can review by hand.</p></div>
          <div class="vs2-row vs2-new"><span>X-Ray</span><p>Weighs more data than any team can, so geologists focus on the best targets.</p></div>
        </article>
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
