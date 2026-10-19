<?php
/**
 * Moved from Code Snippets #16 "Pricing Page".
 */

add_action( 'generate_before_content', function () {
  if ( ! is_page( 'pricing' ) ) return;
  ?>

<nav class="xr-nav">
  <div class="xr-nav-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="xr-brand">
      <img class="xr-brand-logo" src="https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/logo-wordmark.png" alt="X-Ray Geoanalytics" width="570" height="180">
    </a>
    <div class="xr-nav-list">
      <div class="xr-nav-item">
        <button class="xr-nav-btn" style="color:var(--xr-gold);">Product<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop">
          <a href="<?php echo esc_url( home_url( '/product/' ) ); ?>">Product Overview</a>
          <a href="<?php echo esc_url( home_url( '/our-models/' ) ); ?>">Our Models</a>
          <a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>">Industries</a>
          <a href="<?php echo esc_url( home_url( '/platform/' ) ); ?>">Platform</a>
          <a href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>">How it Works</a>
          <a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>" style="color:var(--xr-gold);">Pricing</a>
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
    <a href="<?php echo esc_url( home_url( '/investors/' ) ); ?>">Investors</a>
    <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a>
    <a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>">Our Team</a>
    <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>">Why X-Ray</a>
    <a href="<?php echo esc_url( home_url( '/news-updates/' ) ); ?>">News &amp; Updates</a>
    <a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>">FAQs</a>
    <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold">Request Demo</a>
  </div>
</nav>

<section class="pr-hero">
  <canvas id="pr-terrain"></canvas>
  <div class="pr-hero-bg"></div>
  <div class="pr-hero-inner">
    <h1>Three annual tiers. <span class="accent">Matched to your program.</span></h1>
    <p>X-Ray is sold as an annual software subscription. Pick the tier that fits the scale of your exploration: <strong>a single commodity and project</strong>, or <strong>multiple commodities and projects</strong>. Contact us for exact pricing.</p>
  </div>
</section>

<section class="plan-section">
  <div class="plan-inner">
    <div class="plan-grid">

      <div class="plan-card">
        <span class="plan-soon-badge">Single Project</span>
        <div class="plan-name">Tier 1</div>
        <div class="plan-price" style="font-size:36px;">Contact us</div>
        <p class="plan-sub">Billed annually. One commodity, one project. Built for junior explorers running a focused lithium program in the Great Basin.</p>
        <hr class="plan-divider">
        <div class="plan-feats">
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>One commodity model · Great Basin lithium</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>One exploration project</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Upload your own exploration data</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Prospectivity heat map &amp; ranked drill targets</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>3D visualization of your target area</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Compartmentalized data · never trains other customers' models</span></div>
        </div>
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-outline plan-cta" style="justify-content:center;">Contact Us</a>
      </div>

      <div class="plan-card featured">
        <span class="plan-badge">Multi-Project · Multi-Commodity</span>
        <div class="plan-name" style="margin-top:18px;">Tier 2</div>
        <div class="plan-price" style="font-size:36px;">Contact us</div>
        <p class="plan-sub">Billed annually. Expands to multiple commodities and multiple projects for teams running more than one program.</p>
        <hr class="plan-divider">
        <div class="plan-feats">
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Everything in Tier 1</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Multiple exploration projects</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Multiple commodity models as they are released (nickel is next)</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Keep uploading drill data as your program moves</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Continuous updates as model accuracy improves</span></div>
        </div>
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold plan-cta" style="justify-content:center;">Request a Demo</a>
      </div>

      <div class="plan-card">
        <span class="plan-soon-badge">Broadest Scope</span>
        <div class="plan-name">Tier 3</div>
        <div class="plan-price" style="font-size:36px;">Contact us</div>
        <p class="plan-sub">Billed annually. Our widest coverage of commodities and projects, scoped with you to the scale and risk of your portfolio.</p>
        <hr class="plan-divider">
        <div class="plan-feats">
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Everything in Tier 2</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>More commodities and projects under one subscription</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Scope set to match your exploration investment</span></div>
        </div>
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-outline plan-cta" style="justify-content:center;">Contact Us</a>
      </div>

    </div>
  </div>
</section>

<section class="faq-section">
  <div class="faq-inner">
    <h2>How the <span class="accent">tiers</span> actually work.</h2>
    <details class="q" open>
      <summary>What's the difference between the tiers?</summary>
      <div class="q-body">Scope. Tier 1 covers a single commodity and a single project. Tiers 2 and 3 expand to multiple commodities and multiple projects. The point is to let you match your investment to the scale and risk of your exploration.</div>
    </details>
    <details class="q">
      <summary>Why don't you list prices?</summary>
      <div class="q-body">Pricing depends on how many commodities and projects you need, and we're still refining it with input from exploration teams. <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>">Request a demo</a> or email <a href="mailto:info@xraygeoanalytics.com">info@xraygeoanalytics.com</a> and we'll walk you through it.</div>
    </details>
    <details class="q">
      <summary>Which commodities are available?</summary>
      <div class="q-body">Lithium in the Great Basin today. Our Great Basin lithium model reaches 95% recall and 80% precision at 1x1 km cells. Nickel is the next model we're building, because our customers already explore for it alongside lithium. More commodities follow as each model is ready.</div>
    </details>
    <details class="q">
      <summary>Why an annual subscription?</summary>
      <div class="q-body">Exploration projects run for years. An annual subscription gives you continuous access to the platform and to updates as we improve model accuracy and add features, and you can keep uploading drilling data as your program progresses.</div>
    </details>
    <details class="q">
      <summary>What do I get from the platform?</summary>
      <div class="q-body">Your geologists upload their exploration data and get back a prospectivity heat map, a ranked list of drill targets and a 3D visualization of the area being targeted.</div>
    </details>
    <details class="q">
      <summary>Is my data used to train anyone else's model?</summary>
      <div class="q-body">No. Each customer's data is compartmentalized. Everything you upload is used only for your own predictions and is never used to train other customers' models.</div>
    </details>
  </div>
</section>

<section class="pr-cta">
  <div class="pr-cta-bg"></div>
  <div class="pr-cta-inner">
    <h2>Spend less finding <span class="accent">where to drill</span>.</h2>
    <p>Target generation runs $30K–$90K per project a year, and drilling can cost up to $500K per site. X-Ray helps you drill fewer holes before you make a discovery.</p>
    <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold" style="font-size:16px;padding:16px 36px;">Request a Demo</a>
      <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>" class="xr-btn xr-btn-outline" style="font-size:16px;padding:16px 36px;">Why X-Ray <span class="xr-arrow">→</span></a>
    </div>
  </div>
</section>

<footer class="xr-footer">
  <div class="xr-footer-strip"></div>
  <div class="xr-footer-inner">
    <div class="xr-footer-grid">
      <div>
        <div class="xr-footer-brand"><img class="xr-brand-logo" src="https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/logo-wordmark.png" alt="X-Ray Geoanalytics" width="570" height="180"></div>
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
