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

<nav class="xr-nav">
  <div class="xr-nav-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="xr-brand">
      <img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics">
      <span class="xr-brand-wordmark">X-Ray <span class="accent">Geoanalytics</span></span>
    </a>
    <div class="xr-nav-list">
      <div class="xr-nav-item">
        <button class="xr-nav-btn">Product<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/product/' ) ); ?>">Product Overview</a>
          <a href="<?php echo esc_url( home_url( '/our-models/' ) ); ?>">Our Models</a>
          <a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>">Industries</a>
          <a href="<?php echo esc_url( home_url( '/platform/' ) ); ?>">Platform</a>
          <a href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>">How it Works</a>
          <a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>">Pricing</a>
        </div>
      </div>
      <div class="xr-nav-item">
        <button class="xr-nav-btn" style="color:var(--xr-gold);">Resources<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">Resources</a>
          <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>" style="color:var(--xr-gold);">Investors</a>
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
    <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>" style="color:var(--xr-gold);">Investors</a>
    <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a>
    <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a>
    <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">Why X-Ray</a>
    <a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a>
    <a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">FAQs</a>
    <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request Demo</a>
  </div>
</nav>

  <canvas id="iv-page-canvas" aria-hidden="true"></canvas>

  <!-- ═══════════════════════════ HERO ════════════════════════════════ -->
  <section class="iv-hero">
    <div class="iv-hero-photo"></div>
    <div class="iv-hero-fog-left"></div>
    <div class="iv-hero-fog-edges"></div>
    <canvas id="iv-canvas" aria-hidden="true"></canvas>

    <div class="iv-hero-inner">
      <div id="iv-eyebrow" class="iv-eyebrow">
        <span class="iv-eyebrow-dot"></span>
        For Investors &nbsp;·&nbsp; Confidential Brief
      </div>

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
        X-Ray Geoanalytics is building the ML infrastructure that mining majors and exploration teams will use to find the minerals powering the energy transition — starting with Nevada lithium today, extending to every critical mineral on Earth.
      </p>

      <a href="mailto:lucian@xraygeoanalytics.com" class="iv-hero-cta" id="iv-cta">
        Request investor access
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>

      <div class="iv-stat-strip" id="iv-stats">
        <div class="iv-stat-item">
          <div class="iv-stat-n">$12.5B</div>
          <div class="iv-stat-label">Annual exploration market</div>
        </div>
        <div class="iv-stat-item">
          <div class="iv-stat-n sky">90%</div>
          <div class="iv-stat-label">Target model accuracy</div>
        </div>
        <div class="iv-stat-item">
          <div class="iv-stat-n">$25K</div>
          <div class="iv-stat-label">Vs. $150K consulting baseline</div>
        </div>
        <div class="iv-stat-item">
          <div class="iv-stat-n sky">5</div>
          <div class="iv-stat-label">Co-founders, pre-revenue</div>
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
        <h2 class="iv-section-h2" style="max-width:860px;">A <strong>$12.5B/year</strong> market running on a 90-year-old workflow.</h2>
        <p class="iv-section-lead" style="margin-top:16px;margin-bottom:0;">
          Exploration dollars decompose into a handful of well-measured slices. The grassroots-targeting slice — where every program decides where to drill — runs on workflows unchanged since the 1970s. That's the slice X-Ray replaces.
        </p>
      </div>

      <div class="iv-bars xr-reveal xr-d1" id="iv-bars">
        <div class="iv-bar-row">
          <div class="iv-bar-track">
            <div class="iv-bar-fill" data-target-w="100"></div>
            <span class="iv-bar-text">Total annual nonferrous exploration spend</span>
            <span class="iv-bar-val">$12.5B / yr</span>
          </div>
          <div class="iv-bar-cite">S&amp;P Global · 2024</div>
        </div>
        <div class="iv-bar-row">
          <div class="iv-bar-track featured">
            <div class="iv-bar-fill bright" data-target-w="22"></div>
            <span class="iv-bar-text featured">
              Grassroots-targeting slice
              <span class="featured-badge">X-Ray's primary market</span>
            </span>
            <span class="iv-bar-val">~$2.75B / yr</span>
          </div>
          <div class="iv-bar-cite">22% of total</div>
        </div>
        <div class="iv-bar-row">
          <div class="iv-bar-track">
            <div class="iv-bar-fill sky" data-target-w="71"></div>
            <span class="iv-bar-text">Of mining executives report senior-geoscientist constraint</span>
            <span class="iv-bar-val">71%</span>
          </div>
          <div class="iv-bar-cite">McKinsey · 2023</div>
        </div>
        <div class="iv-bar-row">
          <div class="iv-bar-track">
            <div class="iv-bar-fill" data-target-w="90"></div>
            <span class="iv-bar-text">Cost gap vs. comparable consultant engagement</span>
            <span class="iv-bar-val">10–20× cheaper</span>
          </div>
          <div class="iv-bar-cite">$25K / yr vs. $150–200K</div>
        </div>
      </div>

      <div class="iv-insight xr-reveal xr-d2">
        <div class="iv-insight-pin" aria-hidden="true"></div>
        <p>The bottleneck isn't capital — it's <strong>knowing where to drill</strong>. X-Ray converts a labor-constrained workflow into compute and prices it at software economics.</p>
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
        <h2 class="iv-section-h2" style="max-width:820px;">Targeting <strong>90% accuracy</strong>. Validated against confirmed USGS deposits. Pre-launch.</h2>
      </div>
      <div class="iv-traction-inner">
        <div class="xr-reveal xr-d1">
          <p style="color:var(--xr-text-2);font-size:17px;line-height:1.85;margin:0 0 22px;">
            We are <strong style="color:var(--xr-text);">currently developing</strong> the Nevada lithium model — our first commercial release. Validated against known USGS deposits using public geochemistry, geophysics, and remote-sensing data, targeting <strong style="color:var(--xr-gold);">90% accuracy</strong> against confirmed economic deposits at launch.
          </p>
          <p style="color:var(--xr-text-2);font-size:17px;line-height:1.85;margin:0 0 22px;">
            The technical moat is the <em>deposit-anchored training methodology</em>: every model starts from confirmed economic deposits as ground truth and builds outward. Every drill result a customer feeds back becomes a new labeled training example — the moat compounds.
          </p>
          <p style="color:var(--xr-text-2);font-size:17px;line-height:1.85;margin:0 0 28px;">
            At launch we offer only the <strong style="color:var(--xr-text);">Explorer tier ($25K / year)</strong>. Operator and Enterprise tiers follow once additional commodity models become commercially viable.
          </p>
          <div class="iv-tags">
            <span class="iv-tag iv-tag-gold">In Development · Nevada Lithium</span>
            <span class="iv-tag iv-tag-sky">Roadmap · Cu &amp; REE</span>
            <span class="iv-tag iv-tag-dim">Pilot pipeline opens at launch</span>
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
              <text x="120" y="108" class="iv-gauge-label-text" font-size="38" font-weight="800">90%</text>
              <text x="120" y="130" font-family="JetBrains Mono, monospace" font-size="11"
                    fill="#6F7B8B" text-anchor="middle" letter-spacing="2">TARGET ACCURACY</text>
              <line x1="30" y1="125" x2="22" y2="125" stroke="rgba(232,185,99,0.3)" stroke-width="1.5"/>
              <line x1="210" y1="125" x2="218" y2="125" stroke="rgba(111,181,224,0.3)" stroke-width="1.5"/>
              <text x="18" y="130" font-family="JetBrains Mono, monospace" font-size="9" fill="#6F7B8B" text-anchor="middle">0%</text>
              <text x="222" y="130" font-family="JetBrains Mono, monospace" font-size="9" fill="#6F7B8B" text-anchor="middle">100%</text>
            </svg>
            <p class="iv-gauge-sub">Validated against confirmed USGS deposits</p>
          </div>

          <div class="iv-stack">
            <div class="iv-stack-row">
              <span class="iv-stack-idx">01</span>
              <div class="iv-stack-lbl">Confirmed USGS deposits<small>Ground-truth labels</small></div>
              <span class="iv-stack-v">Anchor</span>
            </div>
            <div class="iv-stack-arrow">↓</div>
            <div class="iv-stack-row">
              <span class="iv-stack-idx">02</span>
              <div class="iv-stack-lbl">Multi-modal fusion<small>Geochem · Geophys · Remote-sensing · Terrain</small></div>
              <span class="iv-stack-v">4+ src</span>
            </div>
            <div class="iv-stack-arrow">↓</div>
            <div class="iv-stack-row sky">
              <span class="iv-stack-idx">03</span>
              <div class="iv-stack-lbl">Ensemble inference<small>GBM + Neural net · Per-mineral weights</small></div>
              <span class="iv-stack-v">GBM+NN</span>
            </div>
            <div class="iv-stack-arrow">↓</div>
            <div class="iv-stack-row green">
              <span class="iv-stack-idx">04</span>
              <div class="iv-stack-lbl">Ranked drill targets<small>Confidence intervals · Signal attribution</small></div>
              <span class="iv-stack-v">90%</span>
            </div>
            <div class="iv-stack-arrow">↑ Feedback loop ↑</div>
            <div class="iv-stack-row">
              <span class="iv-stack-idx">05</span>
              <div class="iv-stack-lbl">Drill outcomes return to training<small>Every result retrains the model</small></div>
              <span class="iv-stack-v">Compounds</span>
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
        <h2 class="iv-section-h2" style="max-width:840px;">Software economics on top of a <strong>$150K consulting</strong> workflow.</h2>
      </div>

      <div class="iv-tiers">
        <div class="iv-tier xr-reveal xr-d1">
          <div class="iv-tier-label">Pricing</div>
          <div class="iv-tier-n">$25K</div>
          <p>Per site per year. Flat. Vs. $150–200K per consultant engagement at comparable scope. Accessible to junior explorers and majors alike.</p>
        </div>
        <div class="iv-tier sky xr-reveal xr-d2">
          <div class="iv-tier-label" style="color:var(--xr-sky);">Expansion</div>
          <div class="iv-tier-n" style="color:var(--xr-sky);">Per-site</div>
          <p>Customers expand by adding sites under the same MSA. No re-contracting friction — each new site is a direct upsell with zero acquisition cost.</p>
        </div>
        <div class="iv-tier xr-reveal xr-d3">
          <div class="iv-tier-label">Defensibility</div>
          <div class="iv-tier-n text">Compounding</div>
          <p>Every drill result fed back retrains the model. Switching costs grow with every cycle a customer runs — the moat is structural, not contractual.</p>
        </div>
      </div>

      <div class="iv-quote xr-reveal xr-d1">
        Software margins on top of a workflow <strong>currently sold at consulting margins</strong>.
      </div>
    </div>
  </section>

  <div class="iv-divider"></div>

  <!-- ═══════════════════════ 04 ROADMAP ══════════════════════════════ -->
  <section class="iv-section iv-road">
    <div class="iv-container">
      <div class="xr-reveal" style="margin-bottom:16px;">
        <div class="iv-section-label">04 · Roadmap</div>
        <h2 class="iv-section-h2" style="max-width:880px;">One platform. From Nevada lithium to <strong>lunar regolith</strong>.</h2>
        <p class="iv-section-lead" style="margin-top:16px;">
          Every phase reuses the same fusion pipeline. Adding a new commodity is training data + features, not a new platform. That's why phases 4 and 5 are credible — not science fiction.
        </p>
      </div>

      <div class="iv-timeline xr-reveal xr-d1" id="iv-timeline">
        <div class="iv-tl-line" id="iv-tl-line"></div>

        <!-- 1: Nevada Lithium -->
        <div class="iv-tl-step active">
          <div class="iv-tl-icon" aria-hidden="true">
            <svg viewBox="0 0 100 130">
              <path d="M16 8 L88 8 L88 90 L57 122 L13 65 L13 50 Z"
                    fill="rgba(232,185,99,0.06)" stroke="#E8B963" stroke-width="2" stroke-linejoin="round"/>
              <circle cx="44" cy="38" r="11" fill="none" stroke="#4ade80" stroke-width="1.5"/>
              <circle cx="44" cy="38" r="4"  fill="#4ade80"/>
              <line x1="44" y1="24" x2="44" y2="31" stroke="#4ade80" stroke-width="1.5"/>
              <line x1="44" y1="45" x2="44" y2="52" stroke="#4ade80" stroke-width="1.5"/>
              <line x1="30" y1="38" x2="37" y2="38" stroke="#4ade80" stroke-width="1.5"/>
              <line x1="51" y1="38" x2="58" y2="38" stroke="#4ade80" stroke-width="1.5"/>
            </svg>
          </div>
          <div class="iv-tl-meta">In Development · 2026 launch · Explorer-tier only</div>
          <h3 class="iv-tl-h3">Nevada Lithium</h3>
          <p class="iv-tl-p">Our active model. Targeting 90% accuracy on a major Nevada lithium province, validated against confirmed USGS deposits. Pilot customers onboard at launch on the Explorer tier.</p>
        </div>

        <!-- 2: Western US Cu & REE -->
        <div class="iv-tl-step dev">
          <div class="iv-tl-icon" aria-hidden="true">
            <svg viewBox="0 0 130 100">
              <defs>
                <linearGradient id="cuGradIv" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%"  stop-color="#E8B963"/>
                  <stop offset="50%" stop-color="#C77A3D"/>
                  <stop offset="100%" stop-color="#6FB5E0"/>
                </linearGradient>
              </defs>
              <path d="M0 60 L12 50 L20 56 L30 44 L42 52 L52 38 L62 46 L72 32 L82 42 L92 36 L102 44 L114 38 L122 46 L130 42 L130 100 L0 100 Z"
                    fill="rgba(14,20,27,0.85)" stroke="rgba(111,181,224,0.6)" stroke-width="1.2" stroke-linejoin="round"/>
              <path d="M14 80 Q40 70 60 78 T118 72" fill="none" stroke="url(#cuGradIv)" stroke-width="2.2" stroke-linecap="round"/>
              <circle cx="36" cy="76" r="2.6" fill="#E8B963"/>
              <circle cx="68" cy="78" r="3"   fill="#C77A3D"/>
              <circle cx="98" cy="74" r="2.4" fill="#6FB5E0"/>
              <g font-family="JetBrains Mono,monospace" font-weight="700">
                <rect x="14" y="10" width="22" height="20" rx="1" fill="rgba(232,185,99,0.12)" stroke="#E8B963" stroke-width="0.9"/>
                <text x="25" y="23" text-anchor="middle" fill="#E8B963" font-size="10">Cu</text>
                <rect x="50" y="10" width="26" height="20" rx="1" fill="rgba(111,181,224,0.1)" stroke="#6FB5E0" stroke-width="0.9"/>
                <text x="63" y="23" text-anchor="middle" fill="#6FB5E0" font-size="9.5">REE</text>
                <rect x="90" y="10" width="22" height="20" rx="1" fill="rgba(232,185,99,0.06)" stroke="rgba(232,185,99,0.45)" stroke-width="0.8"/>
                <text x="101" y="23" text-anchor="middle" fill="rgba(232,185,99,0.85)" font-size="10">Au</text>
              </g>
            </svg>
          </div>
          <div class="iv-tl-meta">In Development · 12–24 months</div>
          <h3 class="iv-tl-h3">Western US Copper &amp; Rare Earths</h3>
          <p class="iv-tl-p">Two new commodity models using the same data fusion infrastructure, trained on different geochemical signatures across the Western US corridor.</p>
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
          <div class="iv-tl-meta">Roadmap · 4–5 years</div>
          <h3 class="iv-tl-h3">Global · All Critical Minerals</h3>
          <p class="iv-tl-p">Same platform architecture, every commercially important mineral, every producing country. No re-platforming. The first ML-native catalog of where every critical mineral on Earth probably is.</p>
        </div>

        <!-- 4: Deep Sea -->
        <div class="iv-tl-step long">
          <div class="iv-tl-icon" aria-hidden="true">
            <svg viewBox="0 0 130 100">
              <path d="M50 14 L80 14 L84 22 L46 22 Z" fill="#6FB5E0" opacity="0.85"/>
              <rect x="62" y="8" width="6" height="6" fill="#6FB5E0" opacity="0.7"/>
              <g fill="none" stroke="#6FB5E0" stroke-width="1" stroke-linecap="round">
                <path d="M40 38 Q65 28 90 38" opacity="0.7"/>
                <path d="M30 50 Q65 36 100 50" opacity="0.5"/>
                <path d="M20 62 Q65 44 110 62" opacity="0.3"/>
              </g>
              <path d="M0 78 L18 70 L34 76 L50 66 L66 74 L84 64 L102 72 L120 66 L130 74 L130 100 L0 100 Z"
                    fill="rgba(111,181,224,0.12)" stroke="#6FB5E0" stroke-width="1.2"/>
              <circle cx="40"  cy="84" r="2.5" fill="#E8B963" opacity="0.85"/>
              <circle cx="62"  cy="86" r="2"   fill="#E8B963" opacity="0.7"/>
              <circle cx="88"  cy="82" r="2.8" fill="#E8B963" opacity="0.9"/>
              <circle cx="110" cy="86" r="2"   fill="#E8B963" opacity="0.7"/>
            </svg>
          </div>
          <div class="iv-tl-meta" style="color:#6FB5E0;">Long-term · Deep Sea Mining</div>
          <h3 class="iv-tl-h3">Polymetallic Nodules &amp; Seafloor Sulphides</h3>
          <p class="iv-tl-p">The same methodology applied to bathymetry, seafloor magnetics, and sediment geochemistry. As deep-sea mining matures into a permitted industry, X-Ray is positioned to be its targeting layer.</p>
        </div>

        <!-- 5: Lunar -->
        <div class="iv-tl-step long">
          <div class="iv-tl-icon" aria-hidden="true">
            <svg viewBox="0 0 130 100">
              <g fill="rgba(241,244,248,0.5)">
                <circle cx="10" cy="14" r="0.8"/><circle cx="118" cy="22" r="1"/>
                <circle cx="22" cy="34" r="0.7"/><circle cx="106" cy="48" r="0.8"/>
              </g>
              <defs>
                <radialGradient id="moonGradIv" cx="38%" cy="38%">
                  <stop offset="0%"  stop-color="#F1F4F8"/>
                  <stop offset="60%" stop-color="#A8B2C0"/>
                  <stop offset="100%" stop-color="#5a6678"/>
                </radialGradient>
              </defs>
              <circle cx="65" cy="50" r="34" fill="url(#moonGradIv)"/>
              <g fill="rgba(14,20,27,0.35)">
                <circle cx="54" cy="38" r="4"/><circle cx="74" cy="44" r="3"/>
                <circle cx="60" cy="58" r="5.5"/><circle cx="80" cy="64" r="2.5"/>
                <circle cx="48" cy="68" r="3"/><circle cx="84" cy="36" r="2"/>
              </g>
              <line x1="60" y1="58" x2="60" y2="46" stroke="#4ade80" stroke-width="1.4"/>
              <polygon points="60,42 56,48 64,48" fill="#4ade80"/>
            </svg>
          </div>
          <div class="iv-tl-meta">Long-term · Lunar Mining</div>
          <h3 class="iv-tl-h3">Moon-Surface Resource Models</h3>
          <p class="iv-tl-p">Lunar regolith, KREEP terranes, ice-bearing permanently shadowed craters. The terrestrial methodology extends to remotely-sensed extraterrestrial bodies — same compute, same fusion, new training corpus.</p>
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
        <h2 class="iv-section-h2">Five co-founders. The minimum viable team to solve this.</h2>
      </div>

      <div class="iv-founders" id="iv-founders">
        <div class="iv-founder">
          <div class="iv-founder-hex"><span class="iv-founder-initials">LS</span></div>
          <div class="iv-founder-name">Lucian Slayden</div>
          <div class="iv-founder-role">CEO</div>
        </div>
        <div class="iv-founder">
          <div class="iv-founder-hex"><span class="iv-founder-initials">EL</span></div>
          <div class="iv-founder-name">Ethan Lopez</div>
          <div class="iv-founder-role">CTO</div>
        </div>
        <div class="iv-founder sky">
          <div class="iv-founder-hex" style="border-color:#6FB5E0;">
            <span class="iv-founder-initials" style="color:#6FB5E0;">JH</span>
          </div>
          <div class="iv-founder-name">Jack Hilbert</div>
          <div class="iv-founder-role" style="color:#6FB5E0;">CDO</div>
        </div>
        <div class="iv-founder">
          <div class="iv-founder-hex"><span class="iv-founder-initials">NL</span></div>
          <div class="iv-founder-name">Nick Lopez</div>
          <div class="iv-founder-role">CLO</div>
        </div>
        <div class="iv-founder sky">
          <div class="iv-founder-hex" style="border-color:#6FB5E0;">
            <span class="iv-founder-initials" style="color:#6FB5E0;">LB</span>
          </div>
          <div class="iv-founder-name">Luke Bierbaum</div>
          <div class="iv-founder-role" style="color:#6FB5E0;">CSE</div>
        </div>
      </div>

      <div class="iv-team-link xr-reveal">
        <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>" class="xr-btn xr-btn-ghost">Full team bios <span class="xr-arrow">→</span></a>
      </div>
    </div>
  </section>

  <div class="iv-divider"></div>

  <!-- ═══════════════════════ 06 CONTACT ══════════════════════════════ -->
  <section class="iv-section iv-contact-sec">
    <div class="iv-contact-photo" aria-hidden="true"></div>
    <div class="iv-container">
      <div class="iv-contact-inner">
        <div class="xr-reveal">
          <div class="iv-section-label">Get in Touch</div>
          <h2 class="iv-section-h2" style="margin-bottom:20px;">Want to talk?</h2>
          <p style="color:var(--xr-text-2);font-size:17px;line-height:1.75;max-width:460px;margin:0 0 8px;">
            If you invest in industrial-tech, energy-transition infrastructure, or applied ML, we'd welcome a conversation.
          </p>
          <a href="mailto:lucian@xraygeoanalytics.com" class="iv-contact-email">
            <span class="iv-dot"></span>
            lucian@xraygeoanalytics.com
          </a>
          <div class="iv-access-note" style="margin-top:28px;">
            <p>Investor materials (deck, model, references) are gated. Use the form to request access — expect a same-week reply.</p>
          </div>
        </div>

        <form class="iv-form xr-reveal xr-d1" action="mailto:lucian@xraygeoanalytics.com" method="post" enctype="text/plain">
          <div class="iv-form-grid">
            <div class="iv-form-row">
              <label for="iv-name">Name</label>
              <input type="text" id="iv-name" name="name" required placeholder="Full name">
            </div>
            <div class="iv-form-row">
              <label for="iv-firm">Firm</label>
              <input type="text" id="iv-firm" name="firm" placeholder="Fund / institution">
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
            <span style="color:var(--xr-text-muted);font-size:12px;font-family:var(--xr-font-mono);letter-spacing:0.04em;">Replies within 5 business days.</span>
            <button type="submit" class="xr-btn xr-btn-gold">Request Investor Materials <span class="xr-arrow">→</span></button>
          </div>
        </form>
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
