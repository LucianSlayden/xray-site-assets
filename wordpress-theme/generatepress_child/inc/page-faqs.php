<?php
/**
 * Moved from Code Snippets #22 "XRay — FAQs Page Content".
 */

/* ══ FAQs page — content + styles injection ══════════════════════════
   Hook: generate_before_content (fires inside .entry-content)
   Condition: only on the /faqs/ page
   IMPORTANT: The WordPress page editor for /faqs/ should be empty.
   ════════════════════════════════════════════════════════════════════ */
add_action( 'generate_before_content', function () {
  if ( ! is_page( 'faqs' ) ) return;
  ?>
<style>
/* FAQs — GeneratePress wrapper resets */
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

/* Extended GP/WP site-level wrappers */
.site, .site-wrap, .site-inner, .site-content,
.inside-site-content, .site-header-wrap,
.container, .inside-container { background: transparent !important; }

/* Page background — only injected on FAQs page */
body { background: #060c12 !important; }

/* ── Full-page canvas + veil ───────────────────────────────── */
#fq-canvas {
  position: fixed; inset: 0;
  width: 100%; height: 100%;
  pointer-events: none; z-index: 0;
}
#fq-veil {
  position: fixed; inset: 0;
  background: rgba(6, 12, 18, 0.68);
  pointer-events: none; z-index: 1;
}

/* ── Hero ──────────────────────────────────────────────────── */
#fq-hero {
  position: relative; z-index: 2;
  display: flex;
  align-items: flex-start;
  overflow: visible;
  background: linear-gradient(to bottom, transparent 40%, rgba(6,12,18,0.40) 100%);
  padding: 130px 0 44px;
}
.fq-hero-bg, .fq-fog-top, .fq-fog-bottom { display: none !important; }
.fq-hero-content { position: relative; z-index: 3; }
#fq-eyebrow, #fq-lede { opacity: 0; transform: translateY(16px); }
.fq-hw-inner { display: inline-block; transform: translateY(110%); }

/* ── FAQ body section ──────────────────────────────────────── */
#fq-body {
  background: linear-gradient(to bottom,
    rgba(6,12,18,0.40) 0%,
    rgba(6,12,18,0.62) 100px,
    rgba(6,12,18,0.62) 100%
  );
  padding: 60px 0 110px;
  position: relative; z-index: 2;
}

.xr-footer { z-index: 2; }

/* Ensure containers are transparent */
.xr-container { background: transparent !important; }

/* ── Layout ────────────────────────────────────────────────── */
.fq-layout {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 60px;
  align-items: start;
}
@media (max-width: 980px) { .fq-layout { grid-template-columns: 1fr; gap: 32px; } }

/* ── Section labels ────────────────────────────────────────── */
.fq-section { margin-bottom: 48px; }
.fq-section:last-child { margin-bottom: 0; }
.fq-section-lbl { margin-bottom: 18px; }

/* ── Accordion ─────────────────────────────────────────────── */
details.fq-q {
  background: #0E141B;
  border: 1px solid rgba(232,185,99,0.15);
  border-radius: 2px;
  margin-bottom: 10px;
  overflow: hidden;
  transition: border-color .2s;
}
details.fq-q[open] { border-color: rgba(232,185,99,0.38); }
details.fq-q summary {
  cursor: pointer;
  padding: 20px 24px;
  color: #F1F4F8;
  font-weight: 600;
  font-size: 15px;
  list-style: none;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  transition: color .15s;
}
details.fq-q summary::-webkit-details-marker { display: none; }
details.fq-q summary:hover { color: #E8B963; }
details.fq-q .fq-icon {
  width: 24px; height: 24px;
  background: #E8B963;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
  transition: transform .25s cubic-bezier(0.34, 1.56, 0.64, 1);
}
details.fq-q[open] .fq-icon { transform: rotate(45deg); }
details.fq-q .fq-body {
  padding: 0 24px 22px;
  color: #A8B2C0;
  font-size: 14.5px;
  line-height: 1.78;
}
details.fq-q .fq-body p { margin: 0 0 11px; }
details.fq-q .fq-body p:last-child { margin-bottom: 0; }
details.fq-q .fq-body ul {
  margin: 0 0 11px;
  padding-left: 20px;
  display: flex; flex-direction: column; gap: 9px;
}
details.fq-q .fq-body strong { color: #F1F4F8; font-weight: 600; }

/* ── Sidebar ───────────────────────────────────────────────── */
.fq-aside { position: sticky; top: 100px; display: flex; flex-direction: column; gap: 16px; }
.fq-side-card {
  background: #0E141B;
  border: 1px solid rgba(232,185,99,0.20);
  border-radius: 2px;
  padding: 24px;
  opacity: 0; transform: translateY(18px);
}
.fq-side-card.sky { border-color: rgba(111,181,224,0.20); }
.fq-side-card h3 {
  font-family: var(--xr-font-display); font-weight: 700;
  font-size: 16px; letter-spacing: -0.01em;
  color: #F1F4F8; margin: 0 0 12px;
}
.fq-side-card p { color: #A8B2C0; font-size: 14px; line-height: 1.7; margin: 0 0 16px; }
.fq-side-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; }
.fq-side-list a {
  color: #A8B2C0; font-size: 14px;
  display: inline-flex; align-items: center; gap: 8px;
  transition: color .15s, padding-left .15s;
  text-decoration: none;
}
.fq-side-list a:hover { color: #E8B963; padding-left: 4px; }

/* Scroll-reveal init state */
.fq-sr { opacity: 0; transform: translateY(16px); }
</style>

<?php xray_site_nav(); ?>

<canvas id="fq-canvas"></canvas>
<div id="fq-veil"></div>

<!-- ══ HERO ══════════════════════════════════════════════════ -->
<section id="fq-hero">
  <div class="fq-hero-bg"></div>
  <div class="fq-fog-top"></div>
  <div class="fq-fog-bottom"></div>
  <div class="xr-container fq-hero-content" style="width:100%;">
    <div id="fq-eyebrow">
      <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>FAQs</span>
    </div>
    <h1 style="font-family:var(--xr-font-display);font-size:clamp(40px,5.5vw,72px);font-weight:700;line-height:1.08;letter-spacing:-0.03em;margin:18px 0 0;color:#F1F4F8;max-width:820px;">
      <div style="overflow:hidden;"><div class="fq-hw-inner">Frequently asked</div></div>
      <div style="overflow:hidden;"><div class="fq-hw-inner"><span style="color:#E8B963;">questions</span>.</div></div>
    </h1>
    <p id="fq-lede" style="color:#A8B2C0;font-size:17px;line-height:1.8;margin:18px 0 0;max-width:560px;">
      Answers to the most common questions we hear from exploration teams, procurement teams, and technical evaluators. If yours isn't here, email us.
    </p>
  </div>
</section>

<!-- ══ FAQ BODY ══════════════════════════════════════════════ -->
<section id="fq-body">
  <div class="xr-container">
    <div class="fq-layout">
      <!-- Main FAQ content -->
      <div>

        <!-- Product -->
        <div class="fq-section" id="product">
          <div class="fq-section-lbl fq-sr">
            <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Product</span>
          </div>

          <details class="fq-q" open>
            <summary>What exactly does X-Ray produce? What does the output look like?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>X-Ray is a software platform for geologists at exploration companies. Your team uploads its exploration data and gets back:</p>
              <ul>
                <li><strong>A prospectivity heat map</strong> of the area you're exploring.</li>
                <li><strong>A ranked list of drill targets</strong> to help you narrow down where to drill.</li>
                <li><strong>A 3D visualization</strong> of the target area, along with analysis tools for the target generation process.</li>
              </ul>
              <p>You can keep uploading drilling data as your program moves, so your decisions on where to drill next stay informed.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>How accurate is the model?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>Our Great Basin lithium model reaches <strong>95% recall</strong> and <strong>80% precision</strong> at 1x1 km cells. Recall means that out of every 100 known lithium deposits, the model finds 95 on average. Precision means roughly 80% of its predictions are lithium deposits.</p>
              <p>An earlier, coarser Nevada model (5x5 km cells) recovered <strong>69% of deposits in the top 10%</strong> of its ranked ground. Validating the model against real boreholes in the field is a next step on our roadmap.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>What minerals and regions do you cover?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>Today, <strong>lithium in the Great Basin</strong>. X-Ray is the only platform specifically trained to find lithium there. Each model focuses on one commodity in one region.</p>
              <p><strong>Nickel</strong> is the next model we're building, because our customers already explore for it alongside lithium. Over the longer term we plan models for other minerals explored alongside lithium, such as cobalt, gold and silver.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>Who is X-Ray built for?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>Junior exploration companies in the Great Basin and the American Southwest. These teams are early in the exploration stage and often don't have the time, staff or budget for large-scale data analytics. Larger mining companies come later, as we add models and grow our track record.</p>
            </div>
          </details>
        </div>

        <!-- Data & Security -->
        <div class="fq-section" id="security">
          <div class="fq-section-lbl fq-sr">
            <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Data &amp; Security</span>
          </div>

          <details class="fq-q">
            <summary>Is my exploration data kept confidential? Will it be used to train models for other clients?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>Your data stays yours. Each customer's model is compartmentalized. Everything you upload is used only for your own predictions and is never used to train other customers' models. We know exploration companies spend millions collecting their data, and we built the platform around that.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>What data are your models trained on?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>Geochemistry, structural, lithology, geophysics, geothermal and topography data. Training labels come from existing mine site locations, geochemistry and mining claim data. We collected decades of cluttered geological data and cleaned and sorted it with our own pipeline so the model can learn from it.</p>
            </div>
          </details>
        </div>

        <!-- Pricing & Contracts -->
        <div class="fq-section" id="pricing">
          <div class="fq-section-lbl fq-sr">
            <span class="xr-eyebrow" style="color:var(--xr-sky);"><span class="xr-eyebrow-hex" style="background:var(--xr-sky);"></span>Pricing &amp; Contracts</span>
          </div>

          <details class="fq-q">
            <summary>How is pricing structured? Can I start with a single project?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>Yes. X-Ray is an annual subscription with three tiers. <strong>Tier 1</strong> covers a single commodity and a single project. <strong>Tiers 2 and 3</strong> expand to multiple commodities and projects. The tiers let you match your investment to the scale and risk of your exploration. For exact pricing, <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>">request a demo</a> or email <a href="mailto:info@xraygeoanalytics.com">info@xraygeoanalytics.com</a>.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>Why a subscription instead of a one-off report?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>Exploration projects can last years. A subscription gives you continuous access to the platform and to updates as we improve model accuracy and add new features.</p>
            </div>
          </details>
        </div>

        <!-- Technical -->
        <div class="fq-section" id="technical">
          <div class="fq-section-lbl fq-sr">
            <span class="xr-eyebrow" style="color:var(--xr-sky);"><span class="xr-eyebrow-hex" style="background:var(--xr-sky);"></span>Technical</span>
          </div>

          <details class="fq-q">
            <summary>How is the model built?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>It's an ensemble of XGBoost and LightGBM models with feature selection algorithms, built on our proprietary featuresets: lists of geological features that indicate lithium mineralization. Machine learning also runs through the rest of the process, from data ingestion and cleaning to the results delivered to you.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>How do you validate the model?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>We use three methods:</p>
              <ul>
                <li><strong>Spatial block cross-validation</strong>, which accounts for spatial autocorrelation between nearby cells.</li>
                <li><strong>Repeated stratified k-fold cross-validation.</strong></li>
                <li><strong>Leave-one-out cross-validation.</strong></li>
              </ul>
              <p>Next, we'll validate the model in the field by comparing its predictions with real boreholes drilled by mining companies.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>Will the model get more precise?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>Yes, that's the plan. We're building finer layers at 100–500 m per cell, adding borehole data from water well, oil and gas, and lithium drill logs. The end goal is a hierarchy of models, each finer than the last, that can tell you where to drill down to exact coordinates.</p>
            </div>
          </details>
        </div>

      </div><!-- /main -->

      <!-- Sidebar -->
      <aside class="fq-aside">
        <div class="fq-side-card">
          <h3>Still have questions?</h3>
          <p>Can't find the answer here? Email us and we'll get back to you.</p>
          <a href="mailto:info@xraygeoanalytics.com" class="xr-btn xr-btn-gold" style="display:block;text-align:center;justify-content:center;margin-bottom:10px;">Email us</a>
          <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-outline" style="display:block;text-align:center;justify-content:center;">Request a demo</a>
        </div>
        <div class="fq-side-card">
          <h3>Jump to section</h3>
          <ul class="fq-side-list">
            <li><a href="#product">→ Product</a></li>
            <li><a href="#security">→ Data &amp; Security</a></li>
            <li><a href="#pricing">→ Pricing &amp; Contracts</a></li>
            <li><a href="#technical">→ Technical</a></li>
          </ul>
        </div>
        <div class="fq-side-card sky">
          <div class="xr-eyebrow" style="margin-bottom:12px;color:var(--xr-sky);">Related pages</div>
          <ul class="fq-side-list">
            <li><a href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>">→ How it works</a></li>
            <li><a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>">→ Pricing plans</a></li>
            <li><a href="<?php echo esc_url( home_url( '/platform/' ) ); ?>">→ Platform details</a></li>
            <li><a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">→ Why X-Ray</a></li>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</section>

<?php xray_site_footer(); ?>
	<?php
} );
