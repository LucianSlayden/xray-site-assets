<?php
/**
 * Moved from Code Snippets #14 "XRay — Platform Page".
 */

add_action( 'generate_before_content', function () {
    if ( ! is_page('platform') ) return;
    echo <<<'HTML'
<nav class="xr-nav">
  <div class="xr-nav-inner">
    <a href="/" class="xr-brand"><img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics"><span class="xr-brand-wordmark">X-Ray <span class="accent">Geoanalytics</span></span></a>
    <div class="xr-nav-list">
      <div class="xr-nav-item"><button class="xr-nav-btn" style="color:var(--xr-gold);">Product<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop"><a href="/product/">Product Overview</a><a href="/our-models/">Our Models</a><a href="/industries/">Industries</a><a href="/platform/" style="color:var(--xr-gold);">Platform</a><a href="/how-it-works/">How it Works</a><a href="/pricing/">Pricing</a></div>
      </div>
      <div class="xr-nav-item"><button class="xr-nav-btn">Resources<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop"><a href="/resources/">Resources</a><a href="/investors/">Investors</a></div>
      </div>
      <div class="xr-nav-item"><button class="xr-nav-btn">About Us<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop"><a href="/about-us/">About Us</a><a href="/our-team/">Our Team</a><a href="/why-xray/">Why X-Ray</a><a href="/news-updates/">News &amp; Updates</a><a href="/faqs/">FAQs</a></div>
      </div>
      <a href="/request-demo/" class="xr-btn xr-btn-gold xr-nav-cta">Request Demo</a>
    </div>
    <button class="xr-nav-toggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
  </div>
  <div class="xr-nav-mobile">
    <a href="/product/">Product</a><a href="/our-models/">Our Models</a>
    <a href="/industries/">Industries</a><a href="/platform/">Platform</a>
    <a href="/how-it-works/">How it Works</a><a href="/pricing/">Pricing</a>
    <a href="/resources/">Resources</a><a href="/investors/">Investors</a>
    <a href="/about-us/">About Us</a><a href="/our-team/">Our Team</a>
    <a href="/why-xray/">Why X-Ray</a><a href="/news-updates/">News &amp; Updates</a>
    <a href="/faqs/">FAQs</a>
    <a href="/request-demo/" class="xr-btn xr-btn-gold">Request Demo</a>
  </div>
</nav>

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
      <p class="pf-lede">Four purpose-built layers — ingestion, fusion, inference, and delivery — designed for the fragmented, heterogeneous data reality of mineral exploration.</p>
      <div class="pf-cta-row">
        <a href="/request-demo/" class="xr-btn xr-btn-gold">Request Demo</a>
        <a href="/how-it-works/" class="xr-btn xr-btn-outline">How it Works <span class="xr-arrow">→</span></a>
      </div>
      <div class="pf-hero-stats">
        <div><div class="pf-hero-stat-val">4+</div><div class="pf-hero-stat-label">Data types fused</div></div>
        <div><div class="pf-hero-stat-val">94%</div><div class="pf-hero-stat-label">Prediction accuracy</div></div>
        <div><div class="pf-hero-stat-val sky">&lt;1hr</div><div class="pf-hero-stat-label">Run to delivery</div></div>
      </div>
    </div>
    <div class="pf-monitor" id="pf-monitor" aria-label="Live pipeline status">
      <div class="pf-mon-header">
        <div class="pf-mon-title"><div class="pf-mon-pulse"></div>PIPELINE MONITOR · LIVE</div>
        <div class="pf-mon-run">RUN-NV-2847</div>
      </div>
      <div class="pf-mon-layers">
        <div class="pf-mon-layer">
          <div class="pf-mon-l-head"><span class="pf-mon-l-num">01</span><span class="pf-mon-l-name">Ingestion</span><span class="pf-mon-l-status complete">COMPLETE</span></div>
          <div class="pf-mon-l-bar-wrap"><div class="pf-mon-l-bar gold" data-w="100"></div></div>
          <div class="pf-mon-l-meta">4 source types · 14.2 GB normalized</div>
        </div>
        <div class="pf-mon-layer">
          <div class="pf-mon-l-head"><span class="pf-mon-l-num">02</span><span class="pf-mon-l-name">Fusion</span><span class="pf-mon-l-status complete">COMPLETE</span></div>
          <div class="pf-mon-l-bar-wrap"><div class="pf-mon-l-bar gold" data-w="100"></div></div>
          <div class="pf-mon-l-meta">Spatial alignment · Unified feature tensor</div>
        </div>
        <div class="pf-mon-layer">
          <div class="pf-mon-l-head"><span class="pf-mon-l-num">03</span><span class="pf-mon-l-name">Inference</span><span class="pf-mon-l-status running" id="pf-inf-status">RUNNING</span></div>
          <div class="pf-mon-l-bar-wrap"><div class="pf-mon-l-bar gold" id="pf-inf-bar" data-w="63"></div></div>
          <div class="pf-mon-l-meta" id="pf-inf-meta">63% · 59 / 94 parcels scored</div>
        </div>
        <div class="pf-mon-layer">
          <div class="pf-mon-l-head"><span class="pf-mon-l-num">04</span><span class="pf-mon-l-name">Delivery</span><span class="pf-mon-l-status queued" id="pf-del-status">QUEUED</span></div>
          <div class="pf-mon-l-bar-wrap"><div class="pf-mon-l-bar sky" id="pf-del-bar" data-w="0"></div></div>
          <div class="pf-mon-l-meta">GeoTIFF · PDF · API endpoint</div>
        </div>
      </div>
      <div class="pf-mon-footer">
        <div class="pf-mon-f-col"><div class="pf-mon-f-val gold">94</div><div class="pf-mon-f-label">Parcels</div></div>
        <div class="pf-mon-f-col"><div class="pf-mon-f-val gold" id="pf-scored-count">59</div><div class="pf-mon-f-label">Scored</div></div>
        <div class="pf-mon-f-col"><div class="pf-mon-f-val sky" id="pf-eta">2m 14s</div><div class="pf-mon-f-label">ETA</div></div>
        <div class="pf-mon-f-col"><div class="pf-mon-f-val" style="font-size:15px;letter-spacing:-0.01em;">Nevada</div><div class="pf-mon-f-label">Basin</div></div>
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
      <h2 style="margin:18px 0 14px;">Four streams. One unified truth.</h2>
      <p style="color:var(--xr-text-2);font-size:17px;line-height:1.72;max-width:580px;margin:0 auto;">We pre-integrate every major open geoscience repository so you start with maximum context — then layer in your proprietary data on top.</p>
    </div>
    <div class="pf-sources-grid">
      <div class="pf-src-card">
        <div class="pf-src-num-col"><div class="pf-src-num">01</div><div class="pf-src-accent"></div></div>
        <div class="pf-src-body">
          <div class="pf-src-cat">Geochemistry</div>
          <h3>Element concentrations.</h3>
          <p>Multi-element assay tables, soil samples, drill-core records — the chemical fingerprint of every parcel in your AOI.</p>
          <ul class="pf-src-items"><li>USGS National Geochemical Survey</li><li>State geological survey assay databases</li><li>Client drill core &amp; soil samples</li><li>Historical exploration reports</li></ul>
        </div>
      </div>
      <div class="pf-src-card">
        <div class="pf-src-num-col"><div class="pf-src-num">02</div><div class="pf-src-accent"></div></div>
        <div class="pf-src-body">
          <div class="pf-src-cat">Geophysics</div>
          <h3>Field anomalies.</h3>
          <p>Aeromagnetics, gravity, radiometrics — the deep-earth signal that tells you what's under the surface, even under cover.</p>
          <ul class="pf-src-items"><li>USGS aeromagnetic survey grids</li><li>Bouguer &amp; free-air gravity anomalies</li><li>Radiometric uranium/thorium/potassium</li><li>Client seismic &amp; MT profiles</li></ul>
        </div>
      </div>
      <div class="pf-src-card sky">
        <div class="pf-src-num-col"><div class="pf-src-num">03</div><div class="pf-src-accent"></div></div>
        <div class="pf-src-body">
          <div class="pf-src-cat">Remote Sensing</div>
          <h3>Orbital alteration signals.</h3>
          <p>Multispectral and SWIR bands flag mineral-alteration zones invisible to a field geologist on the ground.</p>
          <ul class="pf-src-items"><li>Sentinel-2 multispectral (10 m resolution)</li><li>ASTER SWIR mineral alteration bands</li><li>GTOPO30 / SRTM terrain derivatives</li><li>Client hyperspectral imagery</li></ul>
        </div>
      </div>
      <div class="pf-src-card sky">
        <div class="pf-src-num-col"><div class="pf-src-num">04</div><div class="pf-src-accent"></div></div>
        <div class="pf-src-body">
          <div class="pf-src-cat">Your Proprietary Data</div>
          <h3>Your edge, amplified.</h3>
          <p>Ingest your own drill results, sampling programs, or legacy exploration data on top of public baselines — your data stays yours, always.</p>
          <ul class="pf-src-items"><li>Drill hole assay &amp; lithology logs</li><li>Proprietary soil &amp; rock chip samples</li><li>Internal seismic or gravity surveys</li><li>Legacy project reports &amp; maps</li></ul>
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
      <h2 style="margin:18px 0 14px;">Four stages. One intelligent result.</h2>
      <p style="color:var(--xr-text-2);font-size:17px;line-height:1.72;max-width:560px;margin:0 auto;">A purpose-built pipeline that turns heterogeneous geoscience data into ranked mineral probability scores — from raw file to deliverable in under an hour.</p>
    </div>
    <div class="pf-engine-steps">
      <div class="pf-step-row">
        <div class="pf-step-num-col"><div class="pf-step-num">01</div><div class="pf-step-label">Ingestion</div></div>
        <div class="pf-step-body">
          <h3>Normalize everything. Lose nothing.</h3>
          <p>Raw data arrives in a dozen formats — CSV, GDB, GeoTIFF, Shapefile, LAS. The ingestion layer resolves CRS conflicts, standardizes units, and flags coverage gaps before a single model sees the data.</p>
          <div class="pf-step-tags"><span class="pf-step-tag">CRS normalization</span><span class="pf-step-tag">Format unification</span><span class="pf-step-tag">Gap detection</span><span class="pf-step-tag">Provenance tracking</span></div>
        </div>
        <div class="pf-step-stat-col"><div class="pf-step-stat-val">4+</div><div class="pf-step-stat-lbl">Data types ingested</div></div>
      </div>
      <div class="pf-step-row">
        <div class="pf-step-num-col"><div class="pf-step-num">02</div><div class="pf-step-label">Fusion</div></div>
        <div class="pf-step-body">
          <h3>One tensor to represent them all.</h3>
          <p>A multi-modal transformer aligns every data stream to a common spatial grid and produces a unified feature tensor per spatial cell. Chemistry, physics, and spectral data become a single coherent representation.</p>
          <div class="pf-step-tags"><span class="pf-step-tag">Spatial alignment</span><span class="pf-step-tag">Multi-modal transformer</span><span class="pf-step-tag">Feature engineering</span><span class="pf-step-tag">Imputation</span></div>
        </div>
        <div class="pf-step-stat-col"><div class="pf-step-stat-val">1M+</div><div class="pf-step-stat-lbl">Spatial cells per run</div></div>
      </div>
      <div class="pf-step-row">
        <div class="pf-step-num-col"><div class="pf-step-num">03</div><div class="pf-step-label">Inference</div></div>
        <div class="pf-step-body">
          <h3>Ensemble models trained on confirmed deposits.</h3>
          <p>A gradient-boosted machine plus neural ensemble runs per-mineral predictions against USGS and state geological survey confirmed deposit records. Confidence intervals are surfaced alongside every score.</p>
          <div class="pf-step-tags"><span class="pf-step-tag">GBM + neural ensemble</span><span class="pf-step-tag">Per-mineral models</span><span class="pf-step-tag">Confidence intervals</span><span class="pf-step-tag">Deposit training data</span></div>
        </div>
        <div class="pf-step-stat-col"><div class="pf-step-stat-val">94%</div><div class="pf-step-stat-lbl">Prediction accuracy</div></div>
      </div>
      <div class="pf-step-row">
        <div class="pf-step-num-col"><div class="pf-step-num">04</div><div class="pf-step-label">Delivery</div></div>
        <div class="pf-step-body">
          <h3>GIS-ready. Report-ready. API-ready.</h3>
          <p>Ranked probability maps export as GeoTIFF, Shapefile, or GeoJSON. A PDF summary translates scores into plain-language recommendations. The API endpoint feeds directly into your existing GIS or exploration workflow.</p>
          <div class="pf-step-tags"><span class="pf-step-tag">GeoTIFF / Shapefile</span><span class="pf-step-tag">PDF report</span><span class="pf-step-tag">REST API</span><span class="pf-step-tag">Natural language summary</span></div>
        </div>
        <div class="pf-step-stat-col"><div class="pf-step-stat-val sky">&lt;1hr</div><div class="pf-step-stat-lbl">Run to deliverable</div></div>
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
        <p>Your exploration data represents years of work and millions in spend. We treat it accordingly — isolated, audited, and never commingled with another client's data.</p>
        <p style="color:var(--xr-text-2);font-size:16px;line-height:1.72;max-width:42ch;margin:0 0 28px;">All runs execute in a tenant-isolated environment. Your proprietary drill data is used only to train your models. Access is logged, immutable, and available to your security team on request.</p>
        <div class="pf-sec-cert">
          <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6FB5E0" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          SOC 2 TYPE II AUDIT IN PROGRESS · Q3 2026
        </div>
      </div>
      <div class="pf-sec-cards">
        <div class="pf-sec-card">
          <div class="pf-sec-icon"><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="1.8"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></div>
          <div class="pf-sec-card-content"><div class="pf-sec-card-title">Tenant Isolation</div><div class="pf-sec-card-desc">Every client runs in a fully isolated cloud environment. Your data never shares compute, storage, or network paths with another client's data — at any stage of the pipeline.</div></div>
        </div>
        <div class="pf-sec-card">
          <div class="pf-sec-icon"><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg></div>
          <div class="pf-sec-card-content"><div class="pf-sec-card-title">No Cross-Training</div><div class="pf-sec-card-desc">Your proprietary drill data, soil samples, and exploration records are used exclusively to improve your models. We do not pool client data to train shared models. Ever.</div></div>
        </div>
        <div class="pf-sec-card sky">
          <div class="pf-sec-icon"><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6FB5E0" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
          <div class="pf-sec-card-content"><div class="pf-sec-card-title">Immutable Audit Logs</div><div class="pf-sec-card-desc">Full access logging for every data query, model run, and export. Logs are append-only and tamper-evident. Available to your security team on request, at any time.</div></div>
        </div>
        <div class="pf-sec-card sky">
          <div class="pf-sec-icon"><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6FB5E0" stroke-width="1.8"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
          <div class="pf-sec-card-content"><div class="pf-sec-card-title">SOC 2 Type II <span style="color:var(--xr-text-muted);font-weight:400;font-size:12px;">(In Progress)</span></div><div class="pf-sec-card-desc">Currently undergoing SOC 2 Type II audit. Expected Q3 2026. Security documentation and trust reports are available on request for enterprise clients.</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="xr-section pf-cta-section">
  <div class="xr-container" style="max-width:760px;text-align:center;">
    <span class="xr-reveal xr-eyebrow" style="justify-content:center;margin-bottom:18px;"><span class="xr-eyebrow-hex"></span>See it in action</span>
    <h2 class="xr-reveal xr-d1" style="margin:0 0 18px;">See the platform process your data.</h2>
    <p class="xr-reveal xr-d2" style="color:var(--xr-text-2);font-size:17px;line-height:1.75;margin:0 auto 40px;max-width:520px;">Schedule a 45-minute walkthrough. We'll run a live pipeline on a real dataset in your region of interest — from raw data to ranked targets.</p>
    <div class="xr-reveal xr-d3" style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="/request-demo/" class="xr-btn xr-btn-gold">Request a Demo</a>
      <a href="/how-it-works/" class="xr-btn xr-btn-outline">How it Works <span class="xr-arrow">→</span></a>
    </div>
  </div>
</section>

<footer class="xr-footer">
  <div class="xr-footer-strip"></div>
  <div class="xr-footer-inner">
    <div class="xr-footer-grid">
      <div>
        <div class="xr-footer-brand"><img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics"><span>X-Ray Geoanalytics</span></div>
        <p class="xr-footer-tagline">Advanced machine learning for mining site discovery. Nevada lithium. Every mineral. Every continent. Every drill result makes us smarter.</p>
        <div class="xr-footer-contact"><a href="mailto:info@xraygeoanalytics.com"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="M4 6l8 7 8-7"/></svg>info@xraygeoanalytics.com</a></div>
      </div>
      <div><h3>Product</h3><ul class="xr-footer-list"><li><a href="/product/">Overview</a></li><li><a href="/our-models/">Our Models</a></li><li><a href="/platform/">Platform</a></li><li><a href="/industries/">Industries</a></li><li><a href="/how-it-works/">How it Works</a></li><li><a href="/pricing/">Pricing</a></li></ul></div>
      <div><h3>Company</h3><ul class="xr-footer-list"><li><a href="/our-team/">Our Team</a></li><li><a href="/why-xray/">Why X-Ray</a></li><li><a href="/news-updates/">News &amp; Updates</a></li><li><a href="/faqs/">FAQs</a></li></ul></div>
      <div><h3>Resources</h3><ul class="xr-footer-list"><li><a href="/resources/">Resources Library</a></li><li><a href="/investors/">For Investors</a></li><li><a href="/request-demo/">Request Demo</a></li></ul></div>
      <div><h3>Get in Touch</h3><ul class="xr-footer-list"><li><a href="/request-demo/">Book a Demo</a></li></ul></div>
    </div>
    <div class="xr-footer-bottom">
      <p>© 2026 X-Ray Geoanalytics, Inc. All rights reserved.</p>
      <div class="xr-footer-social">
        <a href="https://www.linkedin.com/company/xray-geoanalytics" aria-label="LinkedIn" target="_blank" rel="noopener"><svg aria-hidden="true" viewBox="0 0 24 24"><rect x="2" y="9" width="4" height="13"/><circle cx="4" cy="4" r="2" fill="currentColor"/><path d="M22 22V13.5a3.5 3.5 0 0 0-7 0V22M10 22V9"/></svg></a>
        <a href="https://x.com/xraygeoanalytic" aria-label="X" target="_blank" rel="noopener"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 4l16 16M20 4L4 20"/></svg></a>
        <a href="mailto:info@xraygeoanalytics.com" aria-label="Email"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="M4 6l8 7 8-7"/></svg></a>
      </div>
      <p>xraygeoanalytics.com</p>
    </div>
  </div>
</footer>
HTML;
} );
