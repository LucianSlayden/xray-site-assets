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
      <img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics">
      <span class="xr-brand-wordmark">X-Ray <span class="accent">Geoanalytics</span></span>
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
    <h1>The full X-Ray pipeline, available now. <span class="accent">Explorer tier.</span></h1>
    <p>When the Nevada lithium model launches, <strong>Explorer</strong> will be the only tier we offer. Operator and Enterprise arrive later — once we have additional commercially viable models worth bundling into them.</p>
  </div>
</section>

<section class="plan-section">
  <div class="plan-inner">
    <div class="plan-grid">

      <div class="plan-card soon">
        <span class="plan-soon-badge">Coming Later</span>
        <div class="plan-name">Operator</div>
        <div class="plan-price">$70K+<span class="unit">/yr</span></div>
        <p class="plan-sub">Once we ship three commercially viable models. For mid-cap teams running multiple commodity programs.</p>
        <hr class="plan-divider">
        <div class="plan-feats">
          <div class="plan-feat muted"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6F7B8B" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg><span>Everything in Explorer</span></div>
          <div class="plan-feat muted"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6F7B8B" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg><span>Up to three mineral models</span></div>
          <div class="plan-feat muted"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6F7B8B" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg><span>Unlimited analysis runs</span></div>
          <div class="plan-feat muted"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6F7B8B" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg><span>Priority processing queue</span></div>
          <div class="plan-feat muted"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6F7B8B" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg><span>Dedicated onboarding</span></div>
        </div>
        <a href="mailto:info@xraygeoanalytics.com?subject=Operator%20Waitlist" class="xr-btn xr-btn-outline plan-cta" style="justify-content:center;">Join the Waitlist</a>
      </div>

      <div class="plan-card featured">
        <span class="plan-badge">Launching · Explorer Tier</span>
        <div class="plan-name" style="margin-top:18px;">Explorer</div>
        <div class="plan-price">$25K<span class="unit">/yr</span></div>
        <p class="plan-sub">Billed annually. The only tier offered at launch. One mineral model — Nevada lithium — with everything you need to run a real program.</p>
        <hr class="plan-divider">
        <div class="plan-feats">
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Nevada lithium model · launch tier</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Up to 12 analysis runs per year</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Full four-layer ML pipeline</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Ranked probability map &amp; GeoTIFF export</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Natural-language target report (PDF)</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Signal attribution per target</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Continuous learning from your drill results</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Email support · 48-hour response</span></div>
        </div>
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold plan-cta" style="justify-content:center;">Get Started with Explorer</a>
      </div>

      <div class="plan-card soon">
        <span class="plan-soon-badge">Coming Later</span>
        <div class="plan-name">Enterprise</div>
        <div class="plan-price">$140K+<span class="unit">/yr</span></div>
        <p class="plan-sub">Base price + à-la-carte models &amp; project sites. For majors running global, multi-commodity portfolios.</p>
        <hr class="plan-divider">
        <div class="plan-feats">
          <div class="plan-feat muted"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6F7B8B" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg><span>Everything in Operator</span></div>
          <div class="plan-feat muted"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6F7B8B" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg><span>API access + GIS integration</span></div>
          <div class="plan-feat muted"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6F7B8B" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg><span>Dedicated technical account team</span></div>
          <div class="plan-feat muted"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6F7B8B" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg><span>Custom SLAs &amp; security review</span></div>
        </div>
        <div class="ent-addon">
          <div class="ent-addon-title">À-la-carte add-ons</div>
          <div class="ent-addon-row"><span>Additional model</span><span><strong>discounted</strong></span></div>
          <div class="ent-addon-row"><span>Additional project site</span><span><strong>discounted</strong></span></div>
          <div class="ent-addon-row" style="color:var(--xr-text-muted);font-size:12px;line-height:1.5;font-style:italic;">Each below the cost of the next-tier upgrade.</div>
        </div>
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-outline plan-cta" style="justify-content:center;margin-top:20px;">Contact Sales</a>
      </div>

    </div>
  </div>
</section>

<section class="faq-section">
  <div class="faq-inner">
    <h2>How the <span class="accent">tiers</span> actually work.</h2>
    <details class="q" open>
      <summary>Why is only Explorer available at launch?</summary>
      <div class="q-body">Because we're being honest. The Nevada lithium model is the only commercially-viable model we'll have when we launch. Operator and Enterprise tiers exist on the long-term roadmap, but they make sense only once we have multiple commodity models to bundle. Building those tiers prematurely would force us to charge for capability we haven't delivered yet.</div>
    </details>
    <details class="q">
      <summary>When will Operator and Enterprise tiers be offered?</summary>
      <div class="q-body">Once we have at least three commercially-viable mineral models. The lithium model is the first; copper, rare earths, and gold are on the roadmap. We don't have a hard date — we'll announce when the second and third models are independently verified. Pilot Explorer customers get priority access to upgrade as soon as the higher tiers open.</div>
    </details>
    <details class="q">
      <summary>How does Enterprise pricing work?</summary>
      <div class="q-body">Enterprise will have a <strong>base annual price</strong> covering one model and one project site. Additional models and additional project sites can then be added as <strong>discounted add-ons</strong>, each priced below the cost of upgrading from a lower tier. This rewards major mining companies who consolidate their entire portfolio onto X-Ray rather than paying piecemeal across many engagements.</div>
    </details>
    <details class="q">
      <summary>What's the minimum commitment for Explorer?</summary>
      <div class="q-body">One year, billed annually. There's no pay-as-you-go option — the continuous learning loop only delivers meaningful value across a full program cycle, and we don't want to charge by the run for something that should compound.</div>
    </details>
    <details class="q">
      <summary>What counts as an "analysis run"?</summary>
      <div class="q-body">One run is a full pipeline execution on a single AOI for a specific mineral. It produces one ranked probability map, one PDF target report, and one GeoTIFF. Running the same AOI again with new data counts as a second run.</div>
    </details>
    <details class="q">
      <summary>What's the AOI size limit on Explorer?</summary>
      <div class="q-body">10,000 km² per run as a soft cap. We've successfully run analyses on areas as small as a single permit block (~50 km²) and as large as a full basin province. Contact us for larger coverage during the pilot.</div>
    </details>
    <details class="q">
      <summary>Do I need to bring my own data to start?</summary>
      <div class="q-body">No. We pre-integrate public USGS geochemistry, aeromagnetics, gravity, Sentinel-2 satellite imagery and terrain data for any region we cover. You can run a full Explorer analysis on day one without uploading anything. Proprietary drill data improves results — but it's optional.</div>
    </details>
  </div>
</section>

<section class="pr-cta">
  <div class="pr-cta-bg"></div>
  <div class="pr-cta-inner">
    <h2>Less than the cost of <span class="accent">one drill hole</span>.</h2>
    <p>Start with Explorer when the lithium model launches. Get on the pilot list now.</p>
    <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold" style="font-size:16px;padding:16px 36px;">Join the Pilot</a>
      <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>" class="xr-btn xr-btn-outline" style="font-size:16px;padding:16px 36px;">Why X-Ray <span class="xr-arrow">→</span></a>
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
