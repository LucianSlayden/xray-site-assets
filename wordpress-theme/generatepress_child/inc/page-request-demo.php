<?php
/**
 * Moved from Code Snippets #23 "XRay — Request Demo Page Content".
 */

add_action( 'generate_before_content', function () {
  if ( ! is_page( 'request-demo' ) ) return;
  ?>
<style>
/* Request Demo — GeneratePress wrapper resets */
#content,
#content .inside-site-content,
#content .grid-container,
#content .grid-parent,
#primary, .content-area, .grid-item,
#main, .site-main,
article, .inside-article, .entry-content {
    max-width: none !important; width: 100% !important;
    padding: 0 !important; margin: 0 !important;
    background: transparent !important; border: none !important;
    box-shadow: none !important; overflow: visible !important; float: none !important;
}
.entry-content { position: relative !important; z-index: 2 !important; }
.site, .site-wrap, .site-inner, .site-content,
.inside-site-content, .container, .inside-container { background: transparent !important; }

body { background: #0E141B !important; }

/* Override .xr-page-hero to use the hosted image */
.xr-page-hero {
    background:
        linear-gradient(180deg, rgba(14,20,27,0.88) 0%, rgba(14,20,27,0.65) 35%, rgba(14,20,27,0.92) 100%),
        url('https://xraygeoanalytics.com/wp-content/uploads/2026/05/mj-landscape-sharp-1.jpg') center/cover no-repeat,
        #0E141B !important;
}

/* Demo page layout & form styles (from xray-system.css / local prototype) */
.demo-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: start; }
@media (max-width: 980px) { .demo-grid { grid-template-columns: 1fr; gap: 48px; } }

.step-list { position: relative; display: flex; flex-direction: column; gap: 0; }
.step-list::before {
    content: ''; position: absolute;
    left: 16px; top: 34px; bottom: 34px; width: 1px;
    background: linear-gradient(to bottom, rgba(232,185,99,0.35) 0%, rgba(232,185,99,0.08) 100%);
    pointer-events: none;
}
.step-item { display: flex; align-items: flex-start; gap: 18px; padding: 0 0 26px; }
.step-item:last-child { padding-bottom: 0; }
.step-hex {
    width: 32px; height: 32px;
    background: rgba(232,185,99,0.10); border: 1.5px solid rgba(232,185,99,0.42);
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; margin-top: 1px;
    color: var(--xr-gold); font-family: var(--xr-font-mono); font-weight: 700;
    font-size: 12px; letter-spacing: 0.04em; position: relative; z-index: 1;
}
.step-item .title { color: var(--xr-text); font-weight: 600; font-size: 15.5px; margin-bottom: 4px; }
.step-item .desc  { color: var(--xr-text-2); font-size: 14.5px; line-height: 1.7; }

.status-block {
    padding: 24px 28px; background: var(--xr-card);
    border: 1px solid rgba(232,185,99,0.28); border-radius: 2px;
    position: relative; overflow: hidden;
}
.status-block::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
    background: linear-gradient(90deg, var(--xr-green), transparent);
}

.demo-form {
    background: var(--xr-deep); border: 1px solid rgba(232,185,99,0.28);
    border-radius: 2px; padding: 44px 40px; position: relative; overflow: hidden;
}
.demo-form::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, var(--xr-gold), rgba(232,185,99,0.2));
}
.demo-form label {
    display: block; color: var(--xr-text-muted); font-family: var(--xr-font-mono);
    font-size: 11px; font-weight: 600; letter-spacing: 0.16em; text-transform: uppercase;
    margin-bottom: 8px;
}
.demo-form input, .demo-form textarea, .demo-form select {
    width: 100%; padding: 12px 14px;
    background: var(--xr-mid); border: 1px solid rgba(232,185,99,0.22);
    border-radius: 2px; color: var(--xr-text); font-family: var(--xr-font-body);
    font-size: 15px; transition: border-color .18s, background .18s, box-shadow .18s;
    box-sizing: border-box;
}
.demo-form input:focus, .demo-form textarea:focus, .demo-form select:focus {
    outline: none; border-color: var(--xr-gold); background: rgba(14,20,27,0.85);
    box-shadow: 0 0 0 3px rgba(232,185,99,0.1);
}
.demo-form textarea { resize: vertical; min-height: 120px; font-family: var(--xr-font-body); }
.form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 22px; }
.form-row { margin-bottom: 22px; }
@media (max-width: 600px) { .form-grid-2 { grid-template-columns: 1fr; } .demo-form { padding: 32px 28px; } }
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

<section class="xr-page-hero xr-topo">
  <div class="xr-topo-layer xr-topo-contours"></div>
  <div class="xr-topo-layer xr-topo-wash"></div>
  <div class="xr-topo-hex-tr"></div>
  <div class="xr-topo-hex-bl"></div>

  <div class="xr-container">
    <div class="demo-grid">
      <div>
        <div class="xr-reveal"><span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Get Early Access</span></div>
        <h1 class="xr-reveal xr-d1" style="margin-top:18px;">Request<br><span style="color:var(--xr-gold);">a Demo</span></h1>
        <p class="xr-reveal xr-d2 xr-lede" style="margin-top:14px;max-width:480px;">We're onboarding our first pilot exploration teams now. Tell us about your project and we'll reach out within one business day to schedule a walkthrough.</p>

        <div class="xr-reveal xr-d3 step-list" style="margin-top:42px;margin-bottom:36px;">
          <div class="step-item">
            <div class="step-hex">01</div>
            <div>
              <div class="title">Submit your request</div>
              <div class="desc">Fill out the form and tell us about your exploration focus, geography, and target minerals.</div>
            </div>
          </div>
          <div class="step-item">
            <div class="step-hex">02</div>
            <div>
              <div class="title">We'll be in touch within 24 hours</div>
              <div class="desc">Lucian or Ethan will reach out directly to schedule a live walkthrough of the platform.</div>
            </div>
          </div>
          <div class="step-item">
            <div class="step-hex">03</div>
            <div>
              <div class="title">See ranked targets on your data</div>
              <div class="desc">Pilot customers can run the model on their own project data before committing to a subscription.</div>
            </div>
          </div>
        </div>

        <div class="xr-reveal xr-d4 status-block">
          <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
            <span class="xr-pulse-dot"></span>
            <div class="xr-eyebrow" style="margin:0;">Current Status</div>
          </div>
          <p style="color:var(--xr-text-2);font-size:14.5px;line-height:1.7;margin:0;">Our Nevada lithium model is currently in active development, targeting 90% accuracy at launch. Demo requests reserve a spot in the first pilot cohort and priority access to additional models as they become commercially viable.</p>
        </div>
      </div>

      <h2 class="xr-sr-only">Demo request form</h2>
      <form class="xr-reveal xr-d1 demo-form" action="mailto:info@xraygeoanalytics.com" method="post" enctype="text/plain">
        <div class="form-grid-2">
          <div>
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first-name" placeholder="Jane" required>
          </div>
          <div>
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last-name" placeholder="Smith" required>
          </div>
        </div>

        <div class="form-row">
          <label for="company">Company</label>
          <input type="text" id="company" name="company" placeholder="Acme Exploration Inc." required>
        </div>

        <div class="form-row">
          <label for="email">Company Email</label>
          <input type="email" id="email" name="email" placeholder="jane@acmeexploration.com" required>
        </div>

        <div class="form-grid-2">
          <div>
            <label for="mineral">Target Mineral</label>
            <select id="mineral" name="mineral">
              <option value="lithium">Lithium</option>
              <option value="copper">Copper</option>
              <option value="gold">Gold</option>
              <option value="rare-earth">Rare Earths</option>
              <option value="nickel">Nickel</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div>
            <label for="region">Geography</label>
            <input type="text" id="region" name="region" placeholder="e.g., Nevada, Western Australia">
          </div>
        </div>

        <div class="form-row">
          <label for="comments">Additional Comments</label>
          <textarea id="comments" name="comments" placeholder="Tell us about your project: target mineral, geography, current stage of exploration, and what you're trying to solve..."></textarea>
        </div>

        <button type="submit" class="xr-btn xr-btn-gold" style="width:100%;text-align:center;justify-content:center;font-size:16px;padding:15px 24px;margin-bottom:14px;">Submit Request <span class="xr-arrow">→</span></button>

        <p style="color:var(--xr-text-muted);font-size:12px;text-align:center;margin:0;font-family:var(--xr-font-mono);letter-spacing:0.02em;line-height:1.6;">By submitting this form you agree to be contacted by X-Ray Geoanalytics regarding your request. We don't share your information.</p>
      </form>
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
