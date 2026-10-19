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
    <canvas id="iv-canvas" aria-hidden="true"></canvas>

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
        <span class="iv-hw"><span class="iv-hw-inner"><em>resource</em></span></span>
        <span class="iv-hw"><span class="iv-hw-inner"><em>discovery.</em></span></span>
      </h1>

      <p class="iv-subhead" id="iv-sub">
        X-Ray Geoanalytics uses machine learning to find mineral deposits for mining companies, starting with lithium in the Great Basin and expanding to the minerals our customers already search for alongside it: nickel, cobalt, gold, and silver.
      </p>

      <a href="#iv-contact" class="iv-hero-cta" id="iv-cta">
        Request investor materials
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>

      <div class="iv-stat-strip" id="iv-stats">
        <div class="iv-stat-item">
          <div class="iv-stat-n">$2.5B</div>
          <div class="iv-stat-label">Annual target-generation spend</div>
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
          <div class="iv-stat-label">Co-founders</div>
        </div>
      </div>
    </div>

    <div class="iv-radar-label" aria-hidden="true">
      <span class="iv-radar-tick"></span>
      Deposit scan · Live
    </div>
  </section>

  <div class="iv-divider"></div>

  <!-- ═══════════════════════ 01 OPPORTUNITY ══════════════════════════ -->
  <section class="iv-section iv-opp">
    <div class="iv-container">
      <div class="xr-reveal">
        <div class="iv-section-label">01 · The Opportunity</div>
        <h2 class="iv-section-h2" style="max-width:860px;">A <strong>$2.5B/year</strong> target-generation market, and discoveries are falling.</h2>
        <p class="iv-section-lead" style="margin-top:16px;margin-bottom:0;">
          New mineral discoveries fell from a peak of 202 in 2009 to roughly 80 in 2023, while lithium demand is projected to grow 2.5x from 2024 to 2030. Explorers spend $30,000 to $90,000 a year per project on target generation, and at the high end only one in 200 drill projects leads to a new mine site discovery. Target generation, deciding where to drill, is the slice X-Ray serves.
        </p>
      </div>

      <div class="iv-bars xr-reveal xr-d1" id="iv-bars">
        <div class="iv-bar-row">
          <div class="iv-bar-track">
            <div class="iv-bar-fill" data-target-w="100"></div>
            <span class="iv-bar-text">Global annual spend on target generation</span>
            <span class="iv-bar-val">$2.5B / yr</span>
          </div>
          <div class="iv-bar-cite">Total addressable</div>
        </div>
        <div class="iv-bar-row">
          <div class="iv-bar-track featured">
            <div class="iv-bar-fill bright" data-target-w="4.4"></div>
            <span class="iv-bar-text featured">
              Great Basin target-generation spend
              <span class="featured-badge">X-Ray's beachhead market</span>
            </span>
            <span class="iv-bar-val">$110M / yr</span>
          </div>
          <div class="iv-bar-cite">Serviceable obtainable</div>
        </div>
        <div class="iv-bar-row">
          <div class="iv-bar-track">
            <div class="iv-bar-fill sky" data-target-w="13.2"></div>
            <span class="iv-bar-text">US target-generation spend</span>
            <span class="iv-bar-val">$330M / yr</span>
          </div>
          <div class="iv-bar-cite">Serviceable available</div>
        </div>
      </div>

      <div class="iv-insight xr-reveal xr-d2">
        <div class="iv-insight-pin" aria-hidden="true"></div>
        <p>The biggest question in mining is <strong>where to dig</strong>. Explorers already spend heavily on target generation, which leaves room for a software subscription to grow as X-Ray builds credibility in the industry.</p>
      </div>
    </div>
  </section>

  <div class="iv-divider"></div>

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
            We have <strong style="color:var(--xr-text);">built a lithium model</strong> that covers the entire Great Basin at 1x1 km cells. It reaches <strong style="color:var(--xr-gold);">95% recall</strong>: out of every 100 known deposits, it finds 95 on average. Its 80% precision means roughly 80% of its predictions are lithium deposits. An earlier Nevada model, built on 19,000 grid cells at 5x5 km, recovered 69% of deposits in the top 10% of ranked ground.
          </p>
          <p style="color:var(--xr-text-2);font-size:17px;line-height:1.85;margin:0 0 22px;">
            The moat is our <em>data and proprietary featuresets</em>. We collected decades of cluttered geological data, cleaned and sorted it, and designed features in-house that indicate lithium mineralization. The same raw data would be useless to most AI models, and it would be costly and slow for competitors to replicate.
          </p>
          <p style="color:var(--xr-text-2);font-size:17px;line-height:1.85;margin:0 0 28px;">
            The models are <strong style="color:var(--xr-text);">not commercially viable yet</strong>. We are raising funding to develop them down to <strong style="color:var(--xr-gold);">1x1 m precision</strong>, fine enough to place individual boreholes, alongside customer discovery with mining companies and field validation against real boreholes.
          </p>
          <div class="iv-tags">
            <span class="iv-tag iv-tag-gold">Built · Great Basin Lithium</span>
            <span class="iv-tag iv-tag-sky">Next · Nickel</span>
            <span class="iv-tag iv-tag-dim">Goal · 1x1 m precision</span>
          </div>
        </div>

        <div class="xr-reveal xr-d2">
          <div class="iv-gauge-wrap" id="iv-gauge-wrap">
            <svg class="iv-gauge-svg" viewBox="0 0 240 140" aria-hidden="true">
              <defs>
                <linearGradient id="iv-gauge-grad" x1="0%" y1="0%" x2="100%" y2="0%">
                  <stop offset="0%" stop-color="#E8B963"/>
                  <stop offset="100%" stop-color="#6FB5E0"/>
                </linearGradient>
              </defs>
              <path d="M 30,125 A 90,90 0 0,1 210,125"
                    fill="none" stroke="rgba(232,185,99,0.1)" stroke-width="12" stroke-linecap="round"
                    class="iv-gauge-track"/>
              <path id="iv-gauge-arc" d="M 30,125 A 90,90 0 0,1 210,125"
                    fill="none" stroke="url(#iv-gauge-grad)" stroke-width="12" stroke-linecap="round"
                    class="iv-gauge-arc"/>
              <text x="120" y="108" class="iv-gauge-label-text" font-size="38" font-weight="800">95%</text>
              <text x="120" y="130" font-family="JetBrains Mono, monospace" font-size="11"
                    fill="#6F7B8B" text-anchor="middle" letter-spacing="2">RECALL</text>
              <line x1="30" y1="125" x2="22" y2="125" stroke="rgba(232,185,99,0.3)" stroke-width="1.5"/>
              <line x1="210" y1="125" x2="218" y2="125" stroke="rgba(111,181,224,0.3)" stroke-width="1.5"/>
              <text x="18" y="130" font-family="JetBrains Mono, monospace" font-size="9" fill="#6F7B8B" text-anchor="middle">0%</text>
              <text x="222" y="130" font-family="JetBrains Mono, monospace" font-size="9" fill="#6F7B8B" text-anchor="middle">100%</text>
            </svg>
            <p class="iv-gauge-sub">Great Basin lithium model · 80% precision</p>
          </div>

          <div class="iv-stack">
            <div class="iv-stack-row">
              <span class="iv-stack-idx">01</span>
              <div class="iv-stack-lbl">Known deposits<small>Labels from mine sites, geochemistry and mining claims</small></div>
              <span class="iv-stack-v">Labels</span>
            </div>
            <div class="iv-stack-arrow">↓</div>
            <div class="iv-stack-row">
              <span class="iv-stack-idx">02</span>
              <div class="iv-stack-lbl">Six data layers<small>Geochem · Structural · Lithology · Geophys · Geothermal · Topo</small></div>
              <span class="iv-stack-v">6 src</span>
            </div>
            <div class="iv-stack-arrow">↓</div>
            <div class="iv-stack-row sky">
              <span class="iv-stack-idx">03</span>
              <div class="iv-stack-lbl">Ensemble model<small>XGBoost + LightGBM · Feature selection</small></div>
              <span class="iv-stack-v">XGB+LGBM</span>
            </div>
            <div class="iv-stack-arrow">↓</div>
            <div class="iv-stack-row green">
              <span class="iv-stack-idx">04</span>
              <div class="iv-stack-lbl">Ranked drill targets<small>Prospectivity heat map · 3D visualization</small></div>
              <span class="iv-stack-v">95%</span>
            </div>
            <div class="iv-stack-arrow">↑ Validation ↑</div>
            <div class="iv-stack-row">
              <span class="iv-stack-idx">05</span>
              <div class="iv-stack-lbl">Cross-validated<small>Spatial block · Repeated stratified k-fold · Leave-one-out</small></div>
              <span class="iv-stack-v">3 methods</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="iv-divider"></div>

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
        <div class="iv-tier xr-reveal xr-d1">
          <div class="iv-tier-label">The platform</div>
          <div class="iv-tier-n">Heat map + 3D view</div>
          <p>Geologist teams upload their exploration data and get back a prospectivity heat map, a 3D visualization of the target area, and a ranked list of drill targets, all in one place.</p>
        </div>
        <div class="iv-tier sky xr-reveal xr-d2">
          <div class="iv-tier-label" style="color:var(--xr-sky);">Customers</div>
          <div class="iv-tier-n" style="color:var(--xr-sky);">Mining companies</div>
          <p>We start with companies targeting lithium in the Great Basin, then companies there targeting multiple commodities, then mining companies across the US as new models for nickel, cobalt, gold and silver come online.</p>
        </div>
        <div class="iv-tier xr-reveal xr-d3">
          <div class="iv-tier-label">Defensibility</div>
          <div class="iv-tier-n">Compounding data</div>
          <p>In-house featuresets and decades of cleaned data are hard to replicate. Each customer's data is compartmentalized and never used to train anyone else's model, so mining companies can trust us with it.</p>
        </div>
      </div>

      <div class="iv-quote xr-reveal xr-d1">
        Fewer holes drilled before a discovery means <strong>less time and money spent</strong> on every project.
      </div>
    </div>
  </section>

  <div class="iv-divider"></div>

  <!-- ═══════════════════════ 04 ROADMAP ══════════════════════════════ -->
  <section class="iv-section iv-road">
    <div class="iv-container">
      <div class="xr-reveal" style="margin-bottom:16px;">
        <div class="iv-section-label">04 · Roadmap</div>
        <h2 class="iv-section-h2" style="max-width:880px;">One platform. From Great Basin lithium to <strong>the minerals explorers drill for alongside it</strong>.</h2>
        <p class="iv-section-lead" style="margin-top:16px;">
          Each model focuses on one commodity in one region. Adding a commodity means new training data and features on the same framework, not a new platform.
        </p>
      </div>

      <div class="iv-timeline xr-reveal xr-d1" id="iv-timeline">
        <div class="iv-tl-line" id="iv-tl-line"></div>

        <!-- 1: Nevada Lithium -->
        <div class="iv-tl-step active">
          <div class="iv-tl-icon" aria-hidden="true">
            <svg viewBox="0 0 100 130">
              <path d="M10.0 5.0 L89.9 5.0 L89.9 104.6 L88.5 105.8 L86.1 106.8 L83.8 105.6 L82.2 106.1 L80.6 107.7 L81.0 110.4 L81.5 114.4 L82.7 119.0 L82.2 122.8 L82.0 125.0 L10.0 56.4 Z"
                    fill="rgba(232,185,99,0.06)" stroke="#E8B963" stroke-width="2" stroke-linejoin="round"/>
              <circle cx="44" cy="38" r="11" fill="none" stroke="#4ade80" stroke-width="1.5"/>
              <circle cx="44" cy="38" r="4"  fill="#4ade80"/>
              <line x1="44" y1="24" x2="44" y2="31" stroke="#4ade80" stroke-width="1.5"/>
              <line x1="44" y1="45" x2="44" y2="52" stroke="#4ade80" stroke-width="1.5"/>
              <line x1="30" y1="38" x2="37" y2="38" stroke="#4ade80" stroke-width="1.5"/>
              <line x1="51" y1="38" x2="58" y2="38" stroke="#4ade80" stroke-width="1.5"/>
            </svg>
          </div>
          <div class="iv-tl-meta">Now · Model built · Customer discovery</div>
          <h3 class="iv-tl-h3">Great Basin Lithium</h3>
          <p class="iv-tl-p">Our lithium model covers the Great Basin at 1x1 km cells with 95% recall and 80% precision. Next is two rounds of customer interviews: first to validate the problem and how explorers decide where to drill today, then to learn what they want in the software.</p>
        </div>

        <!-- 2: Nickel, field validation, grants -->
        <div class="iv-tl-step dev">
          <div class="iv-tl-icon" aria-hidden="true">
            <svg viewBox="0 0 130 100">
              <!-- Nickel tile -->
              <g font-family="JetBrains Mono,monospace" font-weight="700">
                <rect x="4" y="22" width="34" height="38" rx="2" fill="rgba(111,181,224,0.1)" stroke="#6FB5E0" stroke-width="1.2"/>
                <text x="8" y="32" fill="rgba(111,181,224,0.8)" font-size="7">28</text>
                <text x="21" y="51" text-anchor="middle" fill="#6FB5E0" font-size="15">Ni</text>
              </g>
              <!-- Field validation: drill into ground, hitting the target -->
              <path d="M44 56 H86" stroke="rgba(232,185,99,0.55)" stroke-width="1.2"/>
              <path d="M44 62 H86 M44 70 H86 M44 78 H86" stroke="rgba(232,185,99,0.18)" stroke-width="1"/>
              <path d="M58 56 L65 22 L72 56" fill="none" stroke="#A8B2C0" stroke-width="1.4" stroke-linejoin="round"/>
              <path d="M61 40 H69" stroke="#A8B2C0" stroke-width="1.2"/>
              <path d="M65 56 V82" stroke="#E8B963" stroke-width="2" stroke-dasharray="3 2"/>
              <circle cx="65" cy="86" r="5" fill="none" stroke="#4ade80" stroke-width="1.5"/>
              <path d="M62.3 86 l2 2 l3.6 -4" fill="none" stroke="#4ade80" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <!-- Federal grant: government building -->
              <path d="M94 34 L110 24 L126 34 Z" fill="rgba(232,185,99,0.08)" stroke="#E8B963" stroke-width="1.2" stroke-linejoin="round"/>
              <path d="M97 38 V54 M103 38 V54 M110 38 V54 M117 38 V54 M123 38 V54" stroke="#E8B963" stroke-width="1.6"/>
              <path d="M94 36 H126 M93 57 H127 M91 61 H129" stroke="#E8B963" stroke-width="1.2"/>
              <text x="110" y="74" text-anchor="middle" font-family="JetBrains Mono,monospace" font-weight="700" fill="rgba(232,185,99,0.85)" font-size="8">SBIR</text>
            </svg>
          </div>
          <div class="iv-tl-meta">Next · Within a year</div>
          <h3 class="iv-tl-h3">Nickel, Field Validation &amp; Federal Grants</h3>
          <p class="iv-tl-p">A nickel model, a metal our customers already target alongside lithium. Development toward 1x1 m precision for individual boreholes, field validation comparing predictions to real boreholes, and applications for SBIR and STTR grants to fund the work.</p>
        </div>

        <!-- 3: Global -->
        <div class="iv-tl-step long">
          <div class="iv-tl-icon" aria-hidden="true">
            <svg viewBox="0 0 130 90">
              <g font-family="JetBrains Mono,monospace" font-weight="700">
                <rect x="4"   y="4"  width="20" height="22" rx="1" fill="rgba(232,185,99,0.18)" stroke="#E8B963" stroke-width="1"/>
                <text x="14"  y="18" text-anchor="middle" fill="#E8B963" font-size="9">Li</text>
                <rect x="28"  y="4"  width="20" height="22" rx="1" fill="rgba(232,185,99,0.1)" stroke="rgba(232,185,99,0.5)" stroke-width="1"/>
                <text x="38"  y="18" text-anchor="middle" fill="#E8B963" font-size="9">Cu</text>
                <rect x="52"  y="4"  width="20" height="22" rx="1" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.35)" stroke-width="1"/>
                <text x="62"  y="18" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Au</text>
                <rect x="76"  y="4"  width="20" height="22" rx="1" fill="rgba(111,181,224,0.08)" stroke="rgba(111,181,224,0.45)" stroke-width="1"/>
                <text x="86"  y="18" text-anchor="middle" fill="#6FB5E0" font-size="9">Ni</text>
                <rect x="100" y="4"  width="20" height="22" rx="1" fill="rgba(111,181,224,0.06)" stroke="rgba(111,181,224,0.3)" stroke-width="1"/>
                <text x="110" y="18" text-anchor="middle" fill="rgba(111,181,224,0.85)" font-size="9">Co</text>
                <rect x="4"   y="32" width="20" height="22" rx="1" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.32)" stroke-width="1"/>
                <text x="14"  y="46" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Ag</text>
                <rect x="28"  y="32" width="20" height="22" rx="1" fill="rgba(111,181,224,0.08)" stroke="rgba(111,181,224,0.4)" stroke-width="1"/>
                <text x="38"  y="46" text-anchor="middle" fill="#6FB5E0" font-size="9">U</text>
                <rect x="52"  y="32" width="20" height="22" rx="1" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.3)" stroke-width="1"/>
                <text x="62"  y="46" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Pt</text>
                <rect x="76"  y="32" width="20" height="22" rx="1" fill="rgba(111,181,224,0.06)" stroke="rgba(111,181,224,0.3)" stroke-width="1"/>
                <text x="86"  y="46" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">Mo</text>
                <rect x="100" y="32" width="20" height="22" rx="1" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.3)" stroke-width="1"/>
                <text x="110" y="46" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Zn</text>
                <rect x="4"   y="60" width="20" height="22" rx="1" fill="rgba(232,185,99,0.04)" stroke="rgba(232,185,99,0.22)" stroke-width="1"/>
                <text x="14"  y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">Sn</text>
                <rect x="28"  y="60" width="20" height="22" rx="1" fill="rgba(111,181,224,0.04)" stroke="rgba(111,181,224,0.22)" stroke-width="1"/>
                <text x="38"  y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">V</text>
                <rect x="52"  y="60" width="20" height="22" rx="1" fill="rgba(232,185,99,0.04)" stroke="rgba(232,185,99,0.22)" stroke-width="1"/>
                <text x="62"  y="74" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="9">Pd</text>
                <rect x="76"  y="60" width="20" height="22" rx="1" fill="rgba(111,181,224,0.04)" stroke="rgba(111,181,224,0.22)" stroke-width="1"/>
                <text x="86"  y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">W</text>
                <rect x="100" y="60" width="20" height="22" rx="1" fill="rgba(232,185,99,0.04)" stroke="rgba(232,185,99,0.22)" stroke-width="1"/>
                <text x="110" y="74" text-anchor="middle" fill="rgba(168,178,192,0.85)" font-size="9">Mn</text>
              </g>
            </svg>
          </div>
          <div class="iv-tl-meta">Later · Five-year vision</div>
          <h3 class="iv-tl-h3">Cobalt, Gold &amp; Silver</h3>
          <p class="iv-tl-p">More commodity models, multiple paid clients across the Great Basin with successful drill sites, and expansion to larger mining companies across the US and potentially internationally.</p>
        </div>

      </div>
    </div>
  </section>

  <div class="iv-divider"></div>

  <!-- ═══════════════════════ 05 TEAM ═════════════════════════════════ -->
  <section class="iv-section iv-team-sec">
    <div class="iv-container">
      <div class="xr-reveal" style="margin-bottom:12px;">
        <div class="iv-section-label">05 · Team</div>
        <h2 class="iv-section-h2">Four co-founders with every discipline needed to build and sell the technology.</h2>
      </div>

      <div class="iv-founders" id="iv-founders">
        <div class="iv-founder">
          <div class="iv-founder-hex"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/founder-lucian.webp' ); ?>" alt="Lucian Slayden" width="320" height="320" loading="lazy"></div>
          <div class="iv-founder-name">Lucian Slayden</div>
          <div class="iv-founder-role">Chief Executive Officer</div>
        </div>
        <div class="iv-founder">
          <div class="iv-founder-hex"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/founder-ethan.webp' ); ?>" alt="Ethan Lopez" width="320" height="320" loading="lazy"></div>
          <div class="iv-founder-name">Ethan Lopez</div>
          <div class="iv-founder-role">Chief Technical Officer</div>
        </div>
        <div class="iv-founder sky">
          <div class="iv-founder-hex"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/founder-jack.webp' ); ?>" alt="Jack Hilbert" width="320" height="320" loading="lazy"></div>
          <div class="iv-founder-name">Jack Hilbert</div>
          <div class="iv-founder-role">Chief Data Officer</div>
        </div>
        <div class="iv-founder">
          <div class="iv-founder-hex"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/founder-nick.webp' ); ?>" alt="Nick Lopez, J.D." width="320" height="320" loading="lazy"></div>
          <div class="iv-founder-name">Nick Lopez, J.D.</div>
          <div class="iv-founder-role">Chief Legal Officer</div>
        </div>
      </div>
    </div>
  </section>

  <div class="iv-divider"></div>

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

        <form class="iv-form xr-reveal xr-d1" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
          <input type="hidden" name="action" value="xray_contact">
          <input type="hidden" name="source" value="investors">
          <input type="hidden" name="interest" value="Investor">
          <?php wp_nonce_field( 'xray_contact', 'xray_contact_nonce', false ); ?>
          <div class="xr-hp" aria-hidden="true"><label for="iv-website">Website</label><input type="text" id="iv-website" name="website" tabindex="-1" autocomplete="off"></div>
          <?php echo xray_contact_notice(); ?>
          <div class="iv-form-grid">
            <div class="iv-form-row">
              <label for="iv-name">Name</label>
              <input type="text" id="iv-name" name="name" required placeholder="Full name">
            </div>
            <div class="iv-form-row">
              <label for="iv-firm">Firm</label>
              <input type="text" id="iv-firm" name="company" placeholder="Fund / institution">
            </div>
          </div>
          <div class="iv-form-row">
            <label for="iv-email">Email</label>
            <input type="email" id="iv-email" name="email" required placeholder="you@example.com">
          </div>
          <div class="iv-form-row">
            <label for="iv-msg">Message <span style="text-transform:none;letter-spacing:0;opacity:0.6;">(optional)</span></label>
            <textarea id="iv-msg" name="message" placeholder="Stage focus, sector interest, anything specific."></textarea>
          </div>
          <div style="display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap;margin-top:8px;">
            <span style="color:var(--xr-text-muted);font-size:12px;font-family:var(--xr-font-mono);letter-spacing:0.04em;">Goes directly to our CEO.</span>
            <button type="submit" class="xr-btn xr-btn-gold">Request Investor Materials <span class="xr-arrow">→</span></button>
          </div>
        </form>
      </div>
    </div>
  </section>

<?php xray_site_footer(); ?>
	<?php
} );
