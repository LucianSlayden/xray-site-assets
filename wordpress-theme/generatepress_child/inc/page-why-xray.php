<?php
/**
 * Moved from Code Snippets #20 "XRay — Why X-Ray Page Content".
 */

add_action( 'generate_before_content', function () {
  if ( ! is_page( 'why-xray' ) ) return;
  ?>

<canvas id="wx-terrain-bg" aria-hidden="true"></canvas>
<div id="wx-page-overlay" aria-hidden="true"></div>

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
          <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>" style="color:var(--xr-gold);">Why X-Ray</a>
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
    <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">Investors</a>
    <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a>
    <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a>
    <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>" style="color:var(--xr-gold);">Why X-Ray</a>
    <a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a>
    <a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">FAQs</a>
    <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request Demo</a>
  </div>
</nav>

<!-- HERO -->
<section id="wx-hero">
  <div class="wx-hero-bg" aria-hidden="true"></div>
  <div class="wx-fog wx-fog-left" aria-hidden="true"></div>
  <div class="xr-container">
    <div class="wx-hero-content">
      <div id="wx-eyebrow">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Why X-Ray</span>
      </div>
      <h1>
        <div style="overflow:hidden;"><div class="wx-hw-inner">The alternatives have been telling you it takes months.</div></div>
        
        <div style="overflow:hidden;"><div class="wx-hw-inner"><span style="color:#E8B963;">It doesn't.</span></div></div>
      </h1>
      <p id="wx-lede" style="color:#A8B2C0;font-size:17px;line-height:1.8;margin:20px 0 34px;max-width:520px;">
        Every exploration company has the same options today: hire consultants, buy legacy GIS software, or build in-house. All three have the same failure mode — they don't fuse the data. X-Ray does.
      </p>
      <div id="wx-ctas" style="display:flex;gap:14px;flex-wrap:wrap;">
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request a Demo</a>
        <a href="#wx-compare" class="xr-btn xr-btn-outline">See comparison <span class="xr-arrow">↓</span></a>
      </div>
    </div>
  </div>
</section>

<!-- COMPARISON TABLE -->
<section id="wx-compare">
  <canvas class="wx-sec-canvas" id="wx-compare-canvas" aria-hidden="true"></canvas>
  <div class="wx-compare-bg"></div>
  <div class="xr-container">
    <div class="wx-sr" style="margin-bottom:40px;">
      <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>01 · Comparison</span>
      <h2 style="font-family:var(--xr-font-display);font-size:clamp(26px,3vw,40px);font-weight:700;letter-spacing:-0.02em;margin:16px 0 0;color:#F1F4F8;max-width:600px;">X-Ray vs. your current options.</h2>
    </div>
    <div class="wx-table">
      <div class="wx-row wx-head">
        <div>Capability</div>
        <div class="wx-xr-col">X-Ray</div>
        <div>Consultants</div>
        <div>Generic GIS</div>
      </div>
      <div class="wx-row">
        <div class="wx-lbl">Analysis turnaround</div>
        <div class="wx-xr-col">Hours</div>
        <div class="wx-alt">4–12 weeks</div>
        <div class="wx-alt">Days–weeks (manual)</div>
      </div>
      <div class="wx-row">
        <div class="wx-lbl">Cost per campaign analysis</div>
        <div class="wx-xr-col">$25K–$140K / yr</div>
        <div class="wx-alt">$500K+ per project</div>
        <div class="wx-alt">License + analyst cost</div>
      </div>
      <div class="wx-row">
        <div class="wx-lbl">Automated multi-source data fusion</div>
        <div class="wx-xr-col">✓ Built-in</div>
        <div class="wx-alt">Manual (labor-intensive)</div>
        <div class="wx-alt">Manual (user responsibility)</div>
      </div>
      <div class="wx-row">
        <div class="wx-lbl">Commodity-specific ML models</div>
        <div class="wx-xr-col">✓ Per mineral</div>
        <div class="wx-alt">Expert judgment varies</div>
        <div class="wx-alt wx-cross">✗ Not included</div>
      </div>
      <div class="wx-row">
        <div class="wx-lbl">Learns from your drill results</div>
        <div class="wx-xr-col">✓ Automatic</div>
        <div class="wx-alt">Not systematically</div>
        <div class="wx-alt wx-cross">✗ Static</div>
      </div>
      <div class="wx-row">
        <div class="wx-lbl">Signal attribution per target</div>
        <div class="wx-xr-col">✓ Full attribution</div>
        <div class="wx-alt">Narrative reports (variable)</div>
        <div class="wx-alt">Visualization only</div>
      </div>
      <div class="wx-row">
        <div class="wx-lbl">Scale to multiple AOIs simultaneously</div>
        <div class="wx-xr-col">✓ Unlimited</div>
        <div class="wx-alt">Constrained by team size</div>
        <div class="wx-alt">Constrained by analyst time</div>
      </div>
      <div class="wx-row">
        <div class="wx-lbl">Client data isolation</div>
        <div class="wx-xr-col">✓ Contractual + technical</div>
        <div class="wx-alt">NDA only</div>
        <div class="wx-alt">Depends on IT setup</div>
      </div>
    </div>
  </div>
</section>

<!-- DIFFERENTIATORS -->
<section id="wx-diff">
  <canvas class="wx-sec-canvas" id="wx-diff-canvas" aria-hidden="true"></canvas>
  <div class="xr-container">
    <div class="wx-diff-layout">
      <div class="wx-diff-left">
        <div class="wx-diff-intro wx-sr">
          <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>02 · The Difference</span>
          <h2>What you don't get<br>anywhere else.</h2>
          <p>Four structural advantages that no amount of consulting budget or GIS licensing can replicate.</p>
        </div>
        <div class="wx-feat-list">
          <div class="wx-feat-row">
            <div class="wx-feat-num-col" aria-hidden="true">
              <span class="wx-feat-num">01</span>
              <div class="wx-feat-num-accent"></div>
            </div>
            <div class="wx-feat-body">
              <div class="wx-feat-icon"><svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div>
              <h3 class="wx-feat-h">True multi-modal fusion</h3>
              <p class="wx-feat-p">GIS software layers data on a map — that's visual overlay, not fusion. X-Ray's transformer architecture produces a single unified feature tensor that encodes cross-modal relationships invisible to any individual dataset. A geochemical anomaly becomes significantly more informative when aligned with a coincident aeromagnetic low and a satellite-detected alteration zone. No human analyst makes all those connections simultaneously, at scale, in minutes.</p>
            </div>
          </div>
          <div class="wx-feat-row">
            <div class="wx-feat-num-col" aria-hidden="true">
              <span class="wx-feat-num">02</span>
              <div class="wx-feat-num-accent"></div>
            </div>
            <div class="wx-feat-body">
              <div class="wx-feat-icon"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg></div>
              <h3 class="wx-feat-h">Validated against confirmed deposits</h3>
              <p class="wx-feat-p">We don't validate models against held-out training data — we validate against USGS-confirmed mineral deposits that were never in any training set. The 90% accuracy target for Nevada lithium is the out-of-sample benchmark we are required to hit before commercial launch. Independently verified, not a training metric. If the model doesn't clear the bar, it doesn't ship.</p>
            </div>
          </div>
          <div class="wx-feat-row sky">
            <div class="wx-feat-num-col" aria-hidden="true">
              <span class="wx-feat-num">03</span>
              <div class="wx-feat-num-accent"></div>
            </div>
            <div class="wx-feat-body">
              <div class="wx-feat-icon"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
              <h3 class="wx-feat-h">Software economics, not services pricing</h3>
              <p class="wx-feat-p">A consulting firm charges $500K+ per project because a senior geoscientist team is doing the work. X-Ray's marginal cost of running another analysis is near zero. That cost structure allows us to price 10–20× lower while sustaining strong unit economics — and allows you to run analyses that were economically unjustifiable at consulting rates. Lower cost, more campaigns, more data, better models.</p>
            </div>
          </div>
          <div class="wx-feat-row sky">
            <div class="wx-feat-num-col" aria-hidden="true">
              <span class="wx-feat-num">04</span>
              <div class="wx-feat-num-accent"></div>
            </div>
            <div class="wx-feat-body">
              <div class="wx-feat-icon"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
              <h3 class="wx-feat-h">Compounds over time</h3>
              <p class="wx-feat-p">A static tool gives the same output in year three as year one. X-Ray's models are updated with every drill result you return. The more your company drills, the more refined your model becomes — creating a proprietary accuracy advantage that grows harder for any competitor to replicate by switching vendors. X-Ray becomes part of your exploration IP, not just a software expense.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="wx-diff-right">
        <div class="wx-diff-img-wrap">
          <img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/mj-heatmap-hero.png" alt="Multi-modal geoscience data fusion visualization">
          <div class="wx-diff-img-overlay"></div>
        </div>
        <p class="wx-diff-img-caption">Multi-source geoscience data — geochemistry, geophysics, remote sensing, structural geology — fused into a single ranked drill-target output.</p>
      </div>
    </div>
  </div>
</section>

<!-- PROOF STATS -->
<section id="wx-proof">
  <canvas class="wx-sec-canvas" id="wx-proof-canvas" aria-hidden="true"></canvas>
  <div class="xr-container">
    <div class="wx-proof-layout">
      <div class="wx-proof-left">
        <div class="wx-sr">
          <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>03 · The Proof</span>
          <h2 style="font-family:var(--xr-font-display);font-size:clamp(28px,3.2vw,44px);font-weight:700;letter-spacing:-.028em;margin:16px 0 0;line-height:1.07;">Numbers that<br>tell the story.</h2>
        </div>
        <div class="wx-proof-stats">
          <div class="wx-proof-stat">
            <div class="wx-proof-eyebrow">Validation accuracy</div>
            <div class="wx-proof-num">90%</div>
            <div class="wx-proof-desc">Out-of-sample validation on Nevada lithium vs. USGS-confirmed deposits — before any pilot drilling, using held-out ground truth.</div>
          </div>
          <div class="wx-proof-stat">
            <div class="wx-proof-eyebrow">Cost advantage</div>
            <div class="wx-proof-num sky">20×</div>
            <div class="wx-proof-desc">vs. equivalent geoscience consulting engagement for the same AOI. Same analytical coverage, same mineral commodity, 5% of the price.</div>
          </div>
          <div class="wx-proof-stat">
            <div class="wx-proof-eyebrow">Turnaround · 5,000 km² AOI</div>
            <div class="wx-proof-num">&lt;1hr</div>
            <div class="wx-proof-desc">From data upload to ranked drill targets. Four fused data modalities scored simultaneously, no preprocessing required.</div>
          </div>
        </div>
      </div>
      <div class="wx-proof-right">
        <div class="wx-chart-wrap">
          <div class="wx-chart-label">Model accuracy · Nevada Li-001 · by drill cycle</div>
          <svg class="wx-chart-svg" viewBox="0 0 340 220" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="44" y1="20"  x2="320" y2="20"  stroke="rgba(255,255,255,.05)" stroke-width="0.8"/>
            <line x1="44" y1="60"  x2="320" y2="60"  stroke="rgba(255,255,255,.05)" stroke-width="0.8"/>
            <line x1="44" y1="100" x2="320" y2="100" stroke="rgba(255,255,255,.05)" stroke-width="0.8"/>
            <line x1="44" y1="140" x2="320" y2="140" stroke="rgba(255,255,255,.05)" stroke-width="0.8"/>
            <line x1="44" y1="180" x2="320" y2="180" stroke="rgba(255,255,255,.05)" stroke-width="0.8"/>
            <line x1="44" y1="180" x2="320" y2="180" stroke="rgba(255,255,255,.15)" stroke-width="0.8"/>
            <line x1="44" y1="20"  x2="44"  y2="180" stroke="rgba(255,255,255,.15)" stroke-width="0.8"/>
            <text x="6"  y="184" font-family="monospace" font-size="9" fill="rgba(255,255,255,.3)">60%</text>
            <text x="6"  y="144" font-family="monospace" font-size="9" fill="rgba(255,255,255,.3)">70%</text>
            <text x="6"  y="104" font-family="monospace" font-size="9" fill="rgba(255,255,255,.3)">80%</text>
            <text x="6"  y="64"  font-family="monospace" font-size="9" fill="rgba(255,255,255,.3)">90%</text>
            <text x="6"  y="24"  font-family="monospace" font-size="9" fill="rgba(255,255,255,.3)">94%</text>
            <rect x="44" y="60" width="276" height="1" fill="none" stroke="rgba(232,185,99,.25)" stroke-width="1" stroke-dasharray="4,4"/>
            <text x="258" y="57" font-family="monospace" font-size="8.5" fill="rgba(232,185,99,.55)">90% target</text>
            <path d="M44,180 C80,176 110,168 145,148 C175,130 205,100 240,72 C265,52 290,36 320,24" stroke="rgba(232,185,99,.7)" stroke-width="2" fill="none"/>
            <path d="M44,180 C80,176 110,168 145,148 C175,130 205,100 240,72 C265,52 290,36 320,24 L320,180 L44,180 Z" fill="rgba(232,185,99,.06)"/>
            <circle cx="44"  cy="180" r="4.5" fill="rgba(232,185,99,.35)" stroke="rgba(232,185,99,.6)" stroke-width="1"/>
            <circle cx="110" cy="168" r="4.5" fill="rgba(232,185,99,.45)" stroke="rgba(232,185,99,.7)" stroke-width="1"/>
            <circle cx="175" cy="140" r="4.5" fill="rgba(232,185,99,.55)" stroke="rgba(232,185,99,.8)" stroke-width="1"/>
            <circle cx="240" cy="72"  r="4.5" fill="rgba(232,185,99,.70)" stroke="rgba(232,185,99,.9)" stroke-width="1"/>
            <circle cx="320" cy="24"  r="4.5" fill="rgba(232,185,99,.85)" stroke="rgba(232,185,99,1)"  stroke-width="1"/>
            <text x="44"  y="196" font-family="monospace" font-size="8.5" fill="rgba(255,255,255,.35)" text-anchor="middle">PRE-LAUNCH</text>
            <text x="110" y="196" font-family="monospace" font-size="8.5" fill="rgba(255,255,255,.35)" text-anchor="middle">CYCLE 1</text>
            <text x="175" y="196" font-family="monospace" font-size="8.5" fill="rgba(255,255,255,.35)" text-anchor="middle">CYCLE 2</text>
            <text x="240" y="196" font-family="monospace" font-size="8.5" fill="rgba(255,255,255,.35)" text-anchor="middle">CYCLE 3</text>
            <text x="320" y="196" font-family="monospace" font-size="8.5" fill="rgba(255,255,255,.35)" text-anchor="middle">CYCLE 4</text>
            <text x="293" y="21" font-family="monospace" font-size="10" fill="rgba(232,185,99,.9)" font-weight="bold">94%</text>
          </svg>
          <p style="font-family:var(--xr-font-mono);font-size:10px;letter-spacing:.06em;color:var(--xr-text-muted);margin-top:14px;line-height:1.6;">Accuracy improves as drill results feed back into the model. Each cycle represents one completed drill programme returned to X-Ray.</p>
        </div>
        <div class="wx-proof-disclaimer">
          <p>Accuracy figure validated against USGS Mineral Resources Data System (MRDS) confirmed lithium deposit records in Nevada. Out-of-sample validation using 30% holdout of known deposits. Comparable consulting cost estimate based on public rate data for senior exploration geoscience teams. S&amp;P Global, 2024.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section id="wx-cta">
  <canvas class="wx-sec-canvas" id="wx-cta-canvas" aria-hidden="true"></canvas>
  <div class="wx-cta-inner">
    <span class="xr-eyebrow wx-cta-el" style="justify-content:flex-start;margin-bottom:18px;"><span class="xr-eyebrow-hex"></span>See it on your data</span>
    <h2 class="wx-cta-el">The best argument<br>is a live <span class="gold">demo.</span></h2>
    <p class="wx-cta-el">We'll run X-Ray on a real dataset for your region and target mineral. No slides. No deck. You'll see a ranked drill list come out of your data in real time.</p>
    <div class="wx-cta-el" style="display:flex;gap:14px;justify-content:flex-start;flex-wrap:wrap;">
      <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request a Demo</a>
      <a href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>" class="xr-btn xr-btn-outline">How it Works <span class="xr-arrow">→</span></a>
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
          <a href="mailto:info@xraygeoanalytics.com"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="M4 6l8 7 8-7"/></svg>info@xraygeoanalytics.com</a>
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

<?php
} );
