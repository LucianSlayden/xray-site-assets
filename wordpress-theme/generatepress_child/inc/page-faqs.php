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
        <button class="xr-nav-btn">Resources<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">Resources</a>
          <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">Investors</a>
        </div>
      </div>
      <div class="xr-nav-item">
        <button class="xr-nav-btn" style="color:var(--xr-gold);">About Us<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a>
          <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a>
          <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">Why X-Ray</a>
          <a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a>
          <a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>" style="color:var(--xr-gold);">FAQs</a>
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
    <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">Investors</a>
    <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a>
    <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a>
    <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">Why X-Ray</a>
    <a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a>
    <a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>" style="color:var(--xr-gold);">FAQs</a>
    <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request Demo</a>
  </div>
</nav>

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
              <p>X-Ray delivers three outputs per analysis run:</p>
              <ul>
                <li><strong>Ranked probability map</strong> — an interactive web viewer showing your full AOI with each spatial cell scored 0-100. Zoom, filter by score threshold, click any cell to see contributing signal data.</li>
                <li><strong>Drill target report (PDF)</strong> — natural language summaries of the top-ranked target locations, including coordinates, estimated extent, and the primary data signals that drove the ranking.</li>
                <li><strong>Exportable GeoTIFF</strong> — the probability raster in a format you can import directly into ArcGIS, QGIS, or any standard GIS platform.</li>
              </ul>
              <p>Every target includes full signal attribution — the relative contribution of each data layer to the score — so your geoscientists can interrogate rather than just accept the recommendation.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>How is the 90% accuracy figure validated?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p><strong>Important context first:</strong> 90% is the <em>target</em> accuracy of our Nevada lithium model, which is currently <strong>in active development</strong> — not a shipped, validated production figure. The benchmark is out-of-sample: 90% of confirmed USGS mineral deposit records that are withheld from the training set must fall within the top scoring quintile of our ranked probability map. We do not report training accuracy because it doesn't reflect real-world performance. Final independent validation will accompany the lithium model's commercial launch.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>What minerals do you currently cover?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>Our engineering effort right now is focused on a single model — <strong>Nevada lithium</strong>, currently in active development and the first commercial model we'll ship. Additional commodity models (gold, copper, nickel, rare earths) live on the long-term roadmap and become available, model-by-model, once they reach commercial viability. Operator and Enterprise tiers — which bundle multiple models — launch at the same time.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>How long does an analysis take from data upload to results?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>For a standard 5,000 km² area of interest using baseline public datasets, under one hour. This includes data validation, multi-modal fusion, ML inference, and report generation. Analyses over larger AOIs or incorporating large proprietary datasets may take longer — we give you a runtime estimate before you submit a run. Compare this to 4-12 weeks for an equivalent consulting engagement.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>Do I need to have my own data, or can I use just the public datasets?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>You can run a full analysis with only the baseline public data — no proprietary data required. X-Ray pre-integrates USGS geochemistry, aeromagnetics, gravity, Sentinel-2 satellite imagery, and terrain data for any region we cover. If you have proprietary drill logs, geophysical surveys, or assay data, you can layer those on top and they will improve your model's precision for your specific tenure.</p>
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
              <p>Absolutely not. Your data is isolated in a dedicated compute and storage namespace. No data you upload, no drill results you return to us, and no model outputs from your workspace are ever shared with or used to train models for any other client. This is enforced at both the contractual level (your agreement with us) and the technical level (isolated compute namespaces, separate encrypted storage volumes).</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>Are you SOC 2 certified?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>SOC 2 Type II certification is in progress. We are currently undergoing our first audit and expect certification in Q3 2026. In the meantime, we provide detailed security documentation, can answer your vendor security questionnaire directly, and can schedule a technical security review with your team. Our security architecture uses AES-256 encryption at rest, TLS 1.3 in transit, and immutable audit logging for all data access events.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>What data formats do you accept for uploads?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>CSV and XLSX for assay tables and geochemical data; GeoTIFF, Shapefile (.shp), GeoJSON, and KML for spatial data; LAS for point cloud data; and PDF for historical exploration reports (with OCR-based extraction). If you have data in a format not listed here, contact us — we build custom ingestion adapters for enterprise clients.</p>
            </div>
          </details>
        </div>

        <!-- Pricing & Contracts -->
        <div class="fq-section" id="pricing">
          <div class="fq-section-lbl fq-sr">
            <span class="xr-eyebrow" style="color:var(--xr-sky);"><span class="xr-eyebrow-hex" style="background:var(--xr-sky);"></span>Pricing &amp; Contracts</span>
          </div>

          <details class="fq-q">
            <summary>What's the minimum commitment? Can I run a single project?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>At launch, the <strong>Explorer tier ($25K / year) is the only tier we offer</strong>. It's designed for junior companies running one active lithium program. Operator and Enterprise tiers arrive later — once we ship additional commercially-viable models worth bundling into them. There is no per-run or pay-as-you-go option; the continuous learning loop only delivers meaningful value on an annual basis.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>How will pricing work for majors when Enterprise launches?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>Enterprise will have a <strong>base annual price</strong> covering one model and one project site. Additional models and project sites can then be added as discounted add-ons — each priced below the cost of upgrading from a lower tier. This rewards major mining companies who consolidate their entire portfolio onto X-Ray rather than paying piecemeal across many engagements. Pricing announces alongside the second commercially-viable model.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>What happens to my model if I don't renew?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>At contract end, you retain all reports and outputs delivered during your contract. Your uploaded data and model checkpoints are deleted from our systems per your data agreement (typically 30 days after contract end, unless requested sooner). You do not take a copy of the model itself — the trained weights are our IP — but all your data and all outputs generated during your term are yours.</p>
            </div>
          </details>
        </div>

        <!-- Technical -->
        <div class="fq-section" id="technical">
          <div class="fq-section-lbl fq-sr">
            <span class="xr-eyebrow" style="color:var(--xr-sky);"><span class="xr-eyebrow-hex" style="background:var(--xr-sky);"></span>Technical</span>
          </div>

          <details class="fq-q">
            <summary>Do I need any special software or GIS expertise to use X-Ray?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>No. X-Ray is a self-serve web platform. You need a browser and your data files. No GIS software, no command line, no Python environment. The output GeoTIFF can be imported into ArcGIS or QGIS if you want to do further spatial analysis, but that's optional — the interactive web viewer is the primary way to explore results.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>Can X-Ray integrate with our existing exploration data management system?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>Enterprise clients can connect X-Ray to existing data systems (e.g., GEOSOFT environments, Datamine, or internal data lakes) via our API. We'll scope the integration during the enterprise onboarding process. Explorer and Operator tier clients use file-based upload through the platform UI.</p>
            </div>
          </details>

          <details class="fq-q">
            <summary>How does the model improve from drill results? Is there a lag?<span class="fq-icon"><svg aria-hidden="true" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#0E141B" stroke-width="3"><path d="M12 5v14M5 12h14"/></svg></span></summary>
            <div class="fq-body">
              <p>When you upload drill results, they're processed in your workspace within 24-48 hours and used to fine-tune your mineral model. The next analysis run you submit will use the updated model. There is a minimum threshold of drill results (typically 3+ confirmed outcomes) before we run a fine-tune cycle — below this threshold, the data is accumulated and the update runs when the threshold is reached.</p>
            </div>
          </details>
        </div>

      </div><!-- /main -->

      <!-- Sidebar -->
      <aside class="fq-aside">
        <div class="fq-side-card">
          <h3>Still have questions?</h3>
          <p>Can't find the answer here? Our team responds to every inquiry within 24 hours.</p>
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
