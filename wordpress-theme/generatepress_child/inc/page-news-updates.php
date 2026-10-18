<?php
/**
 * Moved from Code Snippets #21 "XRay — News & Updates Page Content".
 */

add_action( 'generate_before_content', function () {
  if ( ! is_page( 'news-updates' ) ) return;
  ?>

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
          <a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>" style="color:var(--xr-gold);">News &amp; Updates</a>
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
    <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">Why X-Ray</a>
    <a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a>
    <a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">FAQs</a>
    <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request Demo</a>
  </div>
</nav>

<!-- HERO -->
<section class="nu-hero">
  <div class="nu-hero-photo" aria-hidden="true"></div>
  <canvas id="nu-canvas" aria-hidden="true"></canvas>
  <div class="nu-hero-fog" aria-hidden="true"></div>
  <div class="nu-hero-content">
    <div class="nu-eyebrow-row" id="nu-eyebrow">
      <span class="nu-eyebrow-dash" id="nu-edash"></span>
      <span class="nu-eyebrow-text">News &amp; Updates</span>
    </div>
    <h1 class="nu-headline" aria-label="What's happening at X-Ray.">
      <span class="nu-wclip"><span class="nu-w">What's</span></span>
      <span class="nu-wclip"><span class="nu-w">happening</span></span><br>
      <span class="nu-wclip"><span class="nu-w">at</span></span>&#32;<span class="nu-wclip"><span class="nu-w nu-accent">X-Ray.</span></span>
    </h1>
    <p class="nu-hero-sub" id="nu-sub">Product milestones, model accuracy updates, and company announcements. We're moving fast — here's what's changed.</p>
    <div class="nu-stats">
      <div class="nu-stat" id="nu-s0">
        <span class="nu-stat-val" data-target="5" data-duration="900">5</span>
        <span class="nu-stat-lbl">Updates Published</span>
      </div>
      <div class="nu-stat" id="nu-s1">
        <span class="nu-stat-val" data-target="90" data-suffix="%" data-duration="1500">90%</span>
        <span class="nu-stat-lbl">Model Accuracy</span>
      </div>
      <div class="nu-stat" id="nu-s2">
        <span class="nu-stat-val" data-target="2026" data-duration="1100">2026</span>
        <span class="nu-stat-lbl">Launch Year</span>
      </div>
    </div>
  </div>
  </div>
</section>

<!-- RECENT ARTICLES -->
<section class="nu-cards">
  <div class="nu-inner">
    <div class="nu-sec-hd xr-reveal">
      <span class="nu-sec-title">Recent Updates</span>
      <span class="nu-sec-count">3 Articles</span>
    </div>
    <div class="nu-card-grid">

      <article class="nu-card">
        <div class="nu-card-bar s"></div>
        <div class="nu-card-body">
          <div class="nu-card-meta">
            <span class="nu-pill nu-pill-sky">Company</span>
            <span class="nu-card-date">April 2026</span>
          </div>
          <h3>X-Ray applied to Y Combinator S26 batch</h3>
          <p>X-Ray Geoanalytics has submitted its application to Y Combinator's Summer 2026 batch, citing Nevada lithium model validation results, the $12.5B addressable market, and the team's geoscience and ML expertise.</p>
        </div>
        <div class="nu-card-foot">
          <span class="nu-card-tag">Company · Strategy</span>
          <span class="nu-card-ico s"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
        </div>
      </article>

      <article class="nu-card">
        <div class="nu-card-bar g"></div>
        <div class="nu-card-body">
          <div class="nu-card-meta">
            <span class="nu-pill nu-pill-gold">Model</span>
            <span class="nu-card-date">February 2026</span>
          </div>
          <h3>Nevada lithium model crosses 90% accuracy in internal validation</h3>
          <p>Internal benchmarks crossed the 90% threshold in out-of-sample validation against confirmed USGS MRDS lithium deposit records. 90% of held-out deposits land in the top scoring quintile of the ranked probability map.</p>
        </div>
        <div class="nu-card-foot">
          <span class="nu-card-tag">Model · Accuracy</span>
          <span class="nu-card-ico g"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
        </div>
      </article>

      <article class="nu-card">
        <div class="nu-card-bar s"></div>
        <div class="nu-card-body">
          <div class="nu-card-meta">
            <span class="nu-pill nu-pill-sky">Platform</span>
            <span class="nu-card-date">January 2026</span>
          </div>
          <h3>Platform beta launched — full four-layer pipeline operational</h3>
          <p>All four layers — ingestion, fusion, inference, and delivery — are live. The platform produces ranked probability maps in under one hour for a 5,000 km² AOI, delivered as an interactive viewer or exportable GeoTIFF.</p>
        </div>
        <div class="nu-card-foot">
          <span class="nu-card-tag">Platform · Infrastructure</span>
          <span class="nu-card-ico s"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- ARCHIVE -->
<section class="nu-archive xr-reveal">
  <div class="nu-archive-bg" aria-hidden="true"></div>
  <div class="nu-archive-inner nu-inner">
    <div class="nu-sec-hd" style="margin-bottom:44px;">
      <span class="nu-sec-title">Archive</span>
      <span class="nu-sec-count">Company History</span>
    </div>
    <div class="nu-tl-layout">
      <div class="nu-tl-aside">
        <span class="nu-tl-aside-lbl">Timeline</span>
        <div class="nu-tl-track" id="nu-tl"><div class="nu-tl-fill"></div></div>
        <div class="nu-tl-dot"></div>
      </div>
      <div class="nu-tl-entry">
        <div class="nu-tl-period">Q4 2025</div>
        <h3>X-Ray Geoanalytics, Inc. incorporated in Delaware</h3>
        <p>X-Ray Geoanalytics, Inc. was incorporated as a Delaware C-corporation. The founding team spans ML engineering, geoscience data expertise, software engineering, legal strategy, and business development. Initial funding was provided by the five co-founders.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="nu-cta">
  <div class="nu-inner">
    <div class="nu-cta-grid">
      <div class="nu-cta-card xr-reveal">
        <div class="nu-cta-ey">Stay updated</div>
        <h3>Get model accuracy updates first.</h3>
        <p>Get notified when we publish model accuracy updates, new mineral coverage, or product launches. No noise — only signal.</p>
        <form class="nu-form" action="mailto:info@xraygeoanalytics.com" method="post" enctype="text/plain">
          <input class="nu-input" type="email" name="email" placeholder="you@company.com" aria-label="Email address" required>
          <button type="submit" class="xr-btn xr-btn-gold" style="text-align:center;justify-content:center;width:100%;">Subscribe</button>
        </form>
      </div>
      <div class="nu-cta-card hi xr-reveal xr-d1">
        <div class="nu-cta-ey">Live demonstration</div>
        <h3>See the Nevada lithium model on your AOI.</h3>
        <p>Schedule a 45-minute demo and we'll run a live analysis on a dataset for your region of interest — ranked probability output, data layer explanations, and the full platform workflow.</p>
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold" style="align-self:flex-start;">Request Demo <span class="xr-arrow">→</span></a>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="xr-footer">
  <div class="xr-footer-strip"></div>
  <div class="xr-footer-inner">
    <div class="xr-footer-grid">
      <div>
        <div class="xr-footer-brand"><img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics"><span>X-Ray Geoanalytics</span></div>
        <p class="xr-footer-tagline">Advanced machine learning for mining site discovery. Nevada lithium. Every mineral. Every continent. Every drill result makes us smarter.</p>
        <div class="xr-footer-contact"><a href="mailto:info@xraygeoanalytics.com"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="M4 6l8 7 8-7"/></svg>info@xraygeoanalytics.com</a></div>
      </div>
      <div><h3>Product</h3><ul class="xr-footer-list">
        <li><a href="<?php echo esc_url( home_url( '/product/' ) ); ?>">Overview</a></li>
        <li><a href="<?php echo esc_url( home_url( '/our-models/' ) ); ?>">Our Models</a></li>
        <li><a href="<?php echo esc_url( home_url( '/platform/' ) ); ?>">Platform</a></li>
        <li><a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>">Industries</a></li>
        <li><a href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>">How it Works</a></li>
        <li><a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>">Pricing</a></li>
      </ul></div>
      <div><h3>Company</h3><ul class="xr-footer-list">
        <li><a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a></li>
        <li><a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">Why X-Ray</a></li>
        <li><a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a></li>
        <li><a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">FAQs</a></li>
      </ul></div>
      <div><h3>Resources</h3><ul class="xr-footer-list">
        <li><a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">Resources Library</a></li>
        <li><a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">For Investors</a></li>
        <li><a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>">Request Demo</a></li>
      </ul></div>
      <div><h3>Get in Touch</h3><ul class="xr-footer-list">
        <li><a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>">Book a Demo</a></li>
      </ul></div>
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
