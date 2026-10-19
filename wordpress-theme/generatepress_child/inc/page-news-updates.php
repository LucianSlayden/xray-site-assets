<?php
/**
 * Moved from Code Snippets #21 "XRay — News & Updates Page Content".
 */

add_action( 'generate_before_content', function () {
  if ( ! is_page( 'news-updates' ) ) return;
  ?>

<?php xray_site_nav(); ?>

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
    <p class="nu-hero-sub" id="nu-sub">Model milestones, customer discovery progress, and company announcements. Here's where X-Ray stands and what comes next.</p>
    <div class="nu-stats">
      <div class="nu-stat" id="nu-s0">
        <span class="nu-stat-val" data-target="4" data-duration="900">4</span>
        <span class="nu-stat-lbl">Co-founders</span>
      </div>
      <div class="nu-stat" id="nu-s1">
        <span class="nu-stat-val" data-target="95" data-suffix="%" data-duration="1500">95%</span>
        <span class="nu-stat-lbl">Recall</span>
      </div>
      <div class="nu-stat" id="nu-s2">
        <span class="nu-stat-val" data-target="80" data-suffix="%" data-duration="1100">80%</span>
        <span class="nu-stat-lbl">Precision</span>
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
            <span class="nu-card-date">Up next</span>
          </div>
          <h3>Customer discovery with junior explorers begins</h3>
          <p>X-Ray is starting two rounds of interviews with mining companies exploring in the Great Basin. Round one validates the problem and how teams decide where to drill today. Round two asks what they want to see in the software.</p>
        </div>
        <div class="nu-card-foot">
          <span class="nu-card-tag">Company · Customers</span>
          <span class="nu-card-ico s"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
        </div>
      </article>

      <article class="nu-card">
        <div class="nu-card-bar g"></div>
        <div class="nu-card-body">
          <div class="nu-card-meta">
            <span class="nu-pill nu-pill-gold">Model</span>
            <span class="nu-card-date">Latest</span>
          </div>
          <h3>Great Basin lithium model reaches 95% recall and 80% precision</h3>
          <p>Our lithium model now covers the entire Great Basin at 1x1 km cells. An ensemble of XGBoost and LightGBM trained on geochemistry, structural, lithology, geophysics, geothermal, and topography data, it was validated with repeated stratified k-fold and leave-one-out cross-validation.</p>
        </div>
        <div class="nu-card-foot">
          <span class="nu-card-tag">Model · Lithium</span>
          <span class="nu-card-ico g"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
        </div>
      </article>

      <article class="nu-card">
        <div class="nu-card-bar s"></div>
        <div class="nu-card-body">
          <div class="nu-card-meta">
            <span class="nu-pill nu-pill-sky">Platform</span>
            <span class="nu-card-date">In planning</span>
          </div>
          <h3>Building the X-Ray platform for exploration geologists</h3>
          <p>Customers will upload their exploration data and receive a prospectivity heat map, a ranked list of drill targets, and a 3D visualization of the target area. Each customer's data stays compartmentalized and is never used to train anyone else's model.</p>
        </div>
        <div class="nu-card-foot">
          <span class="nu-card-tag">Platform · Product</span>
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
        <div class="nu-tl-period">First model</div>
        <h3>Early Nevada lithium model recovers 69% of deposits in the top 10% of ranked ground</h3>
        <p>Our first lithium model covered 19,000 grid cells across Nevada at 5x5 km and was evaluated with spatial block cross-validation to account for spatial autocorrelation. Later models addressed its main limitations, including the large cell size and a tendency to underpredict prospectivity.</p>
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
        <p>Get notified when we publish model updates, new mineral models like nickel, or product news. No noise, only signal.</p>
        <form class="nu-form" action="mailto:info@xraygeoanalytics.com" method="post" enctype="text/plain">
          <input class="nu-input" type="email" name="email" placeholder="you@company.com" aria-label="Email address" required>
          <button type="submit" class="xr-btn xr-btn-gold" style="text-align:center;justify-content:center;width:100%;">Subscribe</button>
        </form>
      </div>
      <div class="nu-cta-card hi xr-reveal xr-d1">
        <div class="nu-cta-ey">Demonstration</div>
        <h3>See the Great Basin lithium model.</h3>
        <p>Request a demo and we'll walk you through how the model ranks ground across the Great Basin, the data layers behind it, and what the platform will deliver: a prospectivity heat map and ranked drill targets.</p>
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold" style="align-self:flex-start;">Request Demo <span class="xr-arrow">→</span></a>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<?php xray_site_footer(); ?>

  <?php
} );
