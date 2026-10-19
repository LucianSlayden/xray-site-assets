<?php
/**
 * Moved from Code Snippets #13 "XRay — Industries Page".
 */

add_action( 'generate_before_content', function () {
    if ( ! is_page('industries') ) return;
    echo <<<'HTML'
<nav class="xr-nav">
  <div class="xr-nav-inner">
    <a href="/" class="xr-brand"><img class="xr-brand-logo" src="https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/logo-wordmark.png" alt="X-Ray Geoanalytics" width="570" height="180"></a>
    <div class="xr-nav-list">
      <div class="xr-nav-item"><button class="xr-nav-btn" style="color:var(--xr-gold);">Product<svg aria-hidden="true" class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg></button>
        <div class="xr-nav-drop"><a href="/product/">Product Overview</a><a href="/our-models/">Our Models</a><a href="/industries/" style="color:var(--xr-gold);">Industries</a><a href="/platform/">Platform</a><a href="/how-it-works/">How it Works</a><a href="/pricing/">Pricing</a></div>
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
    <a href="/product/">Product</a>
    <a href="/our-models/">Our Models</a>
    <a href="/industries/">Industries</a>
    <a href="/platform/">Platform</a>
    <a href="/how-it-works/">How it Works</a>
    <a href="/pricing/">Pricing</a>
    <a href="/resources/">Resources</a>
    <a href="/investors/">Investors</a>
    <a href="/about-us/">About Us</a>
    <a href="/our-team/">Our Team</a>
    <a href="/why-xray/">Why X-Ray</a>
    <a href="/news-updates/">News &amp; Updates</a>
    <a href="/faqs/">FAQs</a>
    <a href="/request-demo/" class="xr-btn xr-btn-gold">Request Demo</a>
  </div>
</nav>

<section id="ind-hero" class="xr-page-hero xr-topo">
  <div class="xr-topo-layer xr-topo-contours"></div>
  <div class="xr-topo-layer xr-topo-wash"></div>
  <div class="xr-topo-hex-tr"></div>
  <div class="xr-topo-hex-bl"></div>
  <div class="xr-container">
    <div class="xr-reveal"><span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Industries</span></div>
    <h1 class="xr-reveal xr-d1" style="max-width:980px;margin-top:18px;font-size:clamp(38px,4.8vw,70px);line-height:1.04;letter-spacing:-0.032em;">Built for <span style="color:var(--xr-gold);">junior explorers</span> in the Great Basin.</h1>
    <p class="xr-reveal xr-d2 xr-lede" style="max-width:680px;margin-top:14px;">We start with junior mining companies exploring the Great Basin and the American Southwest. Three annual tiers let you match your investment to the scale and risk of your projects. <strong style="color:var(--xr-text);">Larger mining companies come next</strong>, once our models have proven themselves in the field.</p>
  </div>
</section>

<section class="xr-section xr-section-void xr-topo" id="junior">
  <div class="top-strip"></div>
  <div class="xr-topo-layer xr-topo-contours" style="opacity:0.35;"></div>
  <div class="xr-topo-layer xr-topo-wash"></div>
  <div class="xr-topo-hex-tr"></div>
  <div class="xr-container">
    <div class="xr-reveal ind-grid">
      <div>
        <div class="tier-pill"><span class="hx"></span><span>Where We Start</span></div>
        <h2 style="margin:0 0 20px;">Junior exploration companies.</h2>
        <p style="color:var(--xr-text-2);font-size:16.5px;line-height:1.8;margin:0 0 18px;">You're early in exploration, without the time, people or money for large-scale data analytics. Every drill hole costs real money, and the risk regularly drives smaller firms into bankruptcy.</p>
        <p style="color:var(--xr-text-2);font-size:16.5px;line-height:1.8;margin:0 0 32px;">X-Ray gives your geologists a prospectivity heat map and a ranked list of drill targets from the data you've already collected, so you test fewer targets before you make a discovery.</p>
        <div class="xr-eyebrow" style="margin-bottom:14px;">What changes when you use X-Ray</div>
        <div style="display:flex;flex-direction:column;gap:8px;margin-bottom:32px;">
          <div class="change-row"><span class="ico"></span><span>Narrow thousands of possible targets down to a ranked list of where to drill first</span></div>
          <div class="change-row"><span class="ico"></span><span>Upload the exploration data you already have and get a prospectivity heat map back</span></div>
          <div class="change-row"><span class="ico"></span><span>Keep uploading drill data to make quick, informed decisions on where to drill next</span></div>
          <div class="change-row"><span class="ico"></span><span>Build a stronger geological case when you raise funding and report to investors</span></div>
        </div>
        <div style="display:flex;gap:12px;flex-wrap:wrap;">
          <a href="/pricing/" class="xr-btn xr-btn-outline">View Pricing <span class="xr-arrow">→</span></a>
          <a href="/request-demo/" class="xr-btn xr-btn-gold">Request Demo</a>
        </div>
      </div>
      <div>
        <div class="outcome-card">
          <div class="xr-eyebrow" style="margin-bottom:22px;">The real cost of the old way</div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v">1 in 200</div><div class="lbl">Drill projects</div></div>
            <p>Industry success rate for new mine discovery, with about 20 boreholes per project</p>
          </div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v">$30–90K</div><div class="lbl">Per year</div></div>
            <p>What companies spend per project, every year, on target generation alone</p>
          </div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v">$500K</div><div class="lbl">Per site</div></div>
            <p>What getting equipment to a site and drilling it can cost</p>
          </div>
        </div>
        <div class="tier-cta-card sky">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:10px;">
            <span style="display:inline-block;width:10px;height:12px;background:var(--xr-sky);clip-path:polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);"></span>
            <span class="xr-mono" style="color:var(--xr-sky);font-size:13px;font-weight:700;letter-spacing:0.05em;">Tier 1 · Single commodity or project</span>
          </div>
          <p style="color:var(--xr-text-2);font-size:13.5px;line-height:1.7;margin:0;">An annual plan for one commodity or one project. Prospectivity heat map, ranked drill targets, 3D visualization and analysis tools.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="xr-section xr-section-deep xr-topo" id="midcap">
  <div class="top-strip sky"></div>
  <div class="xr-topo-layer xr-topo-lattice"></div>
  <div class="xr-topo-hex-bl"></div>
  <div class="xr-container">
    <div class="xr-reveal ind-grid">
      <div>
        <div class="outcome-card sky-border">
          <div class="xr-eyebrow" style="margin-bottom:22px;color:var(--xr-sky);">Why exploration is so hard</div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v sky">1000s</div><div class="lbl">Targets</div></div>
            <p>An exploration team can test several thousand targets before a discovery that could become a profitable mine</p>
          </div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v sky">&lt;1%</div><div class="lbl">Become mines</div></div>
            <p>Generally less than 1% of exploration projects ever become an operational mine</p>
          </div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v sky">95%</div><div class="lbl">Recall</div></div>
            <p>Our Great Basin lithium model finds 95 of every 100 known deposits on average, with 80% precision</p>
          </div>
        </div>
        <div class="tier-cta-card">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:10px;">
            <span style="display:inline-block;width:10px;height:12px;background:var(--xr-gold);clip-path:polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);"></span>
            <span class="xr-mono" style="color:var(--xr-gold);font-size:13px;font-weight:700;letter-spacing:0.05em;">Tiers 2 &amp; 3 · Multiple commodities or projects</span>
          </div>
          <p style="color:var(--xr-text-2);font-size:13.5px;line-height:1.7;margin:0;">Annual plans that cover multiple commodities and projects. More commodity models are on the way, starting with nickel. Contact us to talk through your program.</p>
        </div>
      </div>
      <div>
        <div class="tier-pill sky"><span class="hx"></span><span>Tiers 2 &amp; 3</span></div>
        <h2 style="margin:0 0 20px;">Teams running multiple projects.</h2>
        <p style="color:var(--xr-text-2);font-size:16.5px;line-height:1.8;margin:0 0 18px;">As your program grows to more projects and more commodities, tiers 2 and 3 cover them under one annual plan, so your investment matches the scale of your exploration.</p>
        <p style="color:var(--xr-text-2);font-size:16.5px;line-height:1.8;margin:0 0 32px;">X-Ray doesn't replace your geologists. It processes more data and weighs more factors than any one person can, so your team can spend its time on interpretation and decisions.</p>
        <div class="xr-eyebrow" style="margin-bottom:14px;color:var(--xr-sky);">What changes when you use X-Ray</div>
        <div style="display:flex;flex-direction:column;gap:8px;margin-bottom:32px;">
          <div class="change-row sky"><span class="ico"></span><span>Run targeting across several projects under one plan</span></div>
          <div class="change-row sky"><span class="ico"></span><span>Each project's data stays compartmentalized and is used only for your predictions</span></div>
          <div class="change-row sky"><span class="ico"></span><span>Add commodities as new models arrive: nickel next, then cobalt, gold and silver</span></div>
          <div class="change-row sky"><span class="ico"></span><span>Your geologists review the ranked targets and make the call</span></div>
        </div>
        <a href="/request-demo/" class="xr-btn xr-btn-gold">Talk to Us</a>
      </div>
    </div>
  </div>
</section>

<section class="xr-section xr-section-void xr-topo" id="enterprise">
  <div class="top-strip"></div>
  <div class="xr-topo-layer xr-topo-contours" style="opacity:0.35;"></div>
  <div class="xr-topo-layer xr-topo-wash"></div>
  <div class="xr-topo-hex-tr"></div>
  <div class="xr-container">
    <div class="xr-reveal ind-grid">
      <div>
        <div class="tier-pill"><span class="hx"></span><span>What Comes Next</span></div>
        <h2 style="margin:0 0 20px;">Larger mining companies.</h2>
        <p style="color:var(--xr-text-2);font-size:16.5px;line-height:1.8;margin:0 0 18px;">Once our models have earned credibility with junior explorers, and we have added more commodity models, we plan to work with larger mining companies across the Great Basin and the rest of the United States.</p>
        <p style="color:var(--xr-text-2);font-size:16.5px;line-height:1.8;margin:0 0 32px;">The need is growing. Lithium demand is projected to grow 2.5x from 2024 to 2030, while new discoveries keep falling.</p>
        <div class="xr-eyebrow" style="margin-bottom:14px;">What we are building</div>
        <div style="display:flex;flex-direction:column;gap:8px;margin-bottom:32px;">
          <div class="change-row"><span class="ico"></span><span>A nickel model next, followed by cobalt, gold and silver</span></div>
          <div class="change-row"><span class="ico"></span><span>A hierarchy of finer models at 100–500 m, working toward exact drill coordinates</span></div>
          <div class="change-row"><span class="ico"></span><span>Borehole logs from water wells, oil and gas wells and lithium drilling added to the data</span></div>
          <div class="change-row"><span class="ico"></span><span>Research into neural networks that bring the models together</span></div>
        </div>
        <a href="/request-demo/" class="xr-btn xr-btn-gold">Get in Touch</a>
      </div>
      <div>
        <div class="outcome-card">
          <div class="xr-eyebrow" style="margin-bottom:22px;">Why it matters now</div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v">2.5x</div><div class="lbl">Lithium demand</div></div>
            <p>Projected growth in lithium demand from 2024 to 2030</p>
          </div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v">~80</div><div class="lbl">Discoveries</div></div>
            <p>New mineral deposit discoveries in 2023, down from 202 in 2009</p>
          </div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v">Ni</div><div class="lbl">Next model</div></div>
            <p>Nickel, a metal our customers already target alongside lithium, is our next commodity model</p>
          </div>
        </div>
        <div style="background:linear-gradient(135deg,rgba(232,185,99,0.08) 0%,rgba(232,185,99,0.03) 100%);border:1px solid rgba(232,185,99,0.28);border-radius:2px;padding:24px 28px;">
          <p class="xr-quote" style="border-left:none;padding:0;font-size:16px;margin:0 0 14px;">Every X-Ray model is trained for one commodity in one region, so each new model is built for the ground you are exploring.</p>
          <a href="/request-demo/" class="xr-btn xr-btn-ghost" style="padding:0;">Talk to our team <span class="xr-arrow">→</span></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="xr-section xr-section-deep xr-topo cta-final" id="cta-section">
  <div class="xr-section-rule"></div>
  <div class="xr-topo-layer xr-topo-lattice"></div>
  <div class="xr-topo-hex-tr"></div>
  <div class="xr-topo-hex-bl"></div>
  <div class="xr-container" style="max-width:760px;text-align:center;">
    <span class="xr-reveal xr-eyebrow" style="justify-content:center;margin-bottom:18px;"><span class="xr-eyebrow-hex"></span>Ready to start</span>
    <h2 class="xr-reveal xr-d1" style="margin:0 0 18px;">Stop planning where to drill. Start knowing.</h2>
    <p class="xr-reveal xr-d2" style="color:var(--xr-text-2);font-size:17px;line-height:1.75;margin:0 auto 40px;max-width:520px;">Request a demo and see how the Great Basin lithium model ranks drill targets on your own ground.</p>
    <div class="xr-reveal xr-d3" style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="/request-demo/" class="xr-btn xr-btn-gold">Request Demo</a>
      <a href="/pricing/" class="xr-btn xr-btn-outline">View Pricing <span class="xr-arrow">→</span></a>
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
