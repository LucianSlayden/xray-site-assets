<?php
/**
 * Moved from Code Snippets #13 "XRay — Industries Page".
 */

add_action( 'generate_before_content', function () {
    if ( ! is_page('industries') ) return;
    echo <<<'HTML'
<nav class="xr-nav">
  <div class="xr-nav-inner">
    <a href="/" class="xr-brand"><img src="https://xraygeoanalytics.com/wp-content/uploads/2026/05/hex_logo_clean.png" alt="X-Ray Geoanalytics"><span class="xr-brand-wordmark">X-Ray <span class="accent">Geoanalytics</span></span></a>
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
    <h1 class="xr-reveal xr-d1" style="max-width:980px;margin-top:18px;font-size:clamp(38px,4.8vw,70px);line-height:1.04;letter-spacing:-0.032em;">Built for every scale of <span style="color:var(--xr-gold);">mineral exploration</span>.</h1>
    <p class="xr-reveal xr-d2 xr-lede" style="max-width:680px;margin-top:14px;">One fusion engine, three deployment tiers — sized to your portfolio, your budget, and your geoscience team. <strong style="color:var(--xr-text);">Only Explorer is offered at launch</strong>; Operator and Enterprise tiers arrive once we ship additional commercially-viable models.</p>
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
        <div class="tier-pill"><span class="hx"></span><span>Explorer Tier</span></div>
        <h2 style="margin:0 0 20px;">Junior exploration companies.</h2>
        <p style="color:var(--xr-text-2);font-size:16.5px;line-height:1.8;margin:0 0 18px;">You're running a single grassroots campaign — constrained budget, small team, enormous geological uncertainty. Every drill hole costs real money. One misallocated hole can set a program back a year.</p>
        <p style="color:var(--xr-text-2);font-size:16.5px;line-height:1.8;margin:0 0 32px;">X-Ray gives your team the same targeting precision as a major miner's in-house geoscience department — at a fraction of the cost, and without the months-long wait of a consultant study.</p>
        <div class="xr-eyebrow" style="margin-bottom:14px;">What changes when you use X-Ray</div>
        <div style="display:flex;flex-direction:column;gap:8px;margin-bottom:32px;">
          <div class="change-row"><span class="ico"></span><span>Replace $150K+ consultant studies with a subscription that costs less than one drill hole</span></div>
          <div class="change-row"><span class="ico"></span><span>Get ranked drill targets in hours — not months — from your existing geochemistry and remote sensing data</span></div>
          <div class="change-row"><span class="ico"></span><span>Every drill result feeds back in — so your second program is smarter than your first</span></div>
          <div class="change-row"><span class="ico"></span><span>Outputs are in plain English — legible for your board, your investors, and your field team</span></div>
        </div>
        <div style="display:flex;gap:12px;flex-wrap:wrap;">
          <a href="/pricing/" class="xr-btn xr-btn-outline">View Explorer Pricing <span class="xr-arrow">→</span></a>
          <a href="/request-demo/" class="xr-btn xr-btn-gold">Request Demo</a>
        </div>
      </div>
      <div>
        <div class="outcome-card">
          <div class="xr-eyebrow" style="margin-bottom:22px;">The real cost of the old way</div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v">3-6</div><div class="lbl">Months</div></div>
            <p>Average time from data collection to a consultant-delivered targeting report</p>
          </div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v">$200K</div><div class="lbl">Typical cost</div></div>
            <p>What a full geoscience consultant study costs — before a single hole is drilled</p>
          </div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v">Zero</div><div class="lbl">Compounding</div></div>
            <p>Static report. Doesn't learn from your drill results. Next program starts from scratch.</p>
          </div>
        </div>
        <div class="tier-cta-card sky">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:10px;">
            <span style="display:inline-block;width:10px;height:12px;background:var(--xr-sky);clip-path:polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);"></span>
            <span class="xr-mono" style="color:var(--xr-sky);font-size:13px;font-weight:700;letter-spacing:0.05em;">X-Ray Explorer · $25K/year</span>
          </div>
          <p style="color:var(--xr-text-2);font-size:13.5px;line-height:1.7;margin:0;">One mineral model. Unlimited data uploads. Ranked drill targets within hours. Every drill result refines your next output.</p>
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
          <div class="xr-eyebrow" style="margin-bottom:22px;color:var(--xr-sky);">Where mid-cap teams get stuck</div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v sky">8+</div><div class="lbl">Project sites</div></div>
            <p>Managing multiple sites simultaneously with a geoscience team built for one or two</p>
          </div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v sky">Siloed</div><div class="lbl">Drill history</div></div>
            <p>Historical drill results from Site A don't improve targeting decisions at Site B</p>
          </div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v sky">Re-hire</div><div class="lbl">To expand</div></div>
            <p>Adding a second commodity means hiring another specialist or paying another consultant</p>
          </div>
        </div>
        <div class="tier-cta-card">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:10px;">
            <span style="display:inline-block;width:10px;height:12px;background:var(--xr-gold);clip-path:polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);"></span>
            <span class="xr-mono" style="color:var(--xr-gold);font-size:13px;font-weight:700;letter-spacing:0.05em;">X-Ray Operator · Coming Soon</span>
          </div>
          <p style="color:var(--xr-text-2);font-size:13.5px;line-height:1.7;margin:0;">Three mineral models. Up to eight project sites. Continuous learning across your full portfolio. Contact us to join the waitlist.</p>
        </div>
      </div>
      <div>
        <div class="tier-pill sky"><span class="hx"></span><span>Operator Tier</span></div>
        <h2 style="margin:0 0 20px;">Mid-cap mining companies.</h2>
        <p style="color:var(--xr-text-2);font-size:16.5px;line-height:1.8;margin:0 0 18px;">Your geoscience team is capable — but they're the bottleneck. Every targeting decision funnels through the same two or three specialists who are already stretched across multiple active sites.</p>
        <p style="color:var(--xr-text-2);font-size:16.5px;line-height:1.8;margin:0 0 32px;">X-Ray doesn't replace your geologists. It removes the repetitive data processing burden so they can focus on interpretation, not preprocessing. And it compounds across all your sites simultaneously.</p>
        <div class="xr-eyebrow" style="margin-bottom:14px;color:var(--xr-sky);">What changes when you use X-Ray</div>
        <div style="display:flex;flex-direction:column;gap:8px;margin-bottom:32px;">
          <div class="change-row sky"><span class="ico"></span><span>Run targeting analysis on all eight sites simultaneously — not one at a time as geoscience bandwidth permits</span></div>
          <div class="change-row sky"><span class="ico"></span><span>Drill history from every site feeds one continuous model — each program benefits from all past programs</span></div>
          <div class="change-row sky"><span class="ico"></span><span>Add a second commodity without hiring — switch models inside the same platform</span></div>
          <div class="change-row sky"><span class="ico"></span><span>Your geoscientists review outputs and make decisions — they don't produce the analysis</span></div>
        </div>
        <a href="/request-demo/" class="xr-btn xr-btn-gold">Join the Operator Waitlist</a>
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
        <div class="tier-pill"><span class="hx"></span><span>Enterprise Tier</span></div>
        <h2 style="margin:0 0 20px;">Major mining companies.</h2>
        <p style="color:var(--xr-text-2);font-size:16.5px;line-height:1.8;margin:0 0 18px;">Global portfolios. Dozens of active projects. Multiple critical minerals. You have large exploration budgets, but you have large boards scrutinizing them too. The cost of wrong targeting decisions scales with the size of your program.</p>
        <p style="color:var(--xr-text-2);font-size:16.5px;line-height:1.8;margin:0 0 32px;">X-Ray at enterprise scale means private cloud deployment, custom SLAs, dedicated geoscientist support, and a model that compounds across your entire global portfolio — not just one region or one commodity.</p>
        <div class="xr-eyebrow" style="margin-bottom:14px;">What enterprise deployment includes</div>
        <div style="display:flex;flex-direction:column;gap:8px;margin-bottom:32px;">
          <div class="change-row"><span class="ico"></span><span>Custom mineral model plans — beyond what standard tiers offer</span></div>
          <div class="change-row"><span class="ico"></span><span>Private cloud deployment with your security and compliance requirements</span></div>
          <div class="change-row"><span class="ico"></span><span>Dedicated geoscientist support and custom SLAs</span></div>
          <div class="change-row"><span class="ico"></span><span>Pay-per-site expansion as your portfolio grows — no re-negotiating your contract</span></div>
        </div>
        <a href="/request-demo/" class="xr-btn xr-btn-gold">Contact Sales</a>
      </div>
      <div>
        <div class="outcome-card">
          <div class="xr-eyebrow" style="margin-bottom:22px;">The compounding advantage at scale</div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v">40+</div><div class="lbl">Projects</div></div>
            <p>Each active project feeds your central model — making every subsequent decision more accurate</p>
          </div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v">Global</div><div class="lbl">Geology</div></div>
            <p>Your exploration data from every continent becomes a proprietary training dataset no competitor has</p>
          </div>
          <div class="outcome-item">
            <div class="outcome-stat"><div class="v">Zero</div><div class="lbl">Talent dep.</div></div>
            <p>No single geoscientist holds institutional knowledge — it lives in the model, not in anyone's head</p>
          </div>
        </div>
        <div style="background:linear-gradient(135deg,rgba(232,185,99,0.08) 0%,rgba(232,185,99,0.03) 100%);border:1px solid rgba(232,185,99,0.28);border-radius:2px;padding:24px 28px;">
          <p class="xr-quote" style="border-left:none;padding:0;font-size:16px;margin:0 0 14px;">"The platform that scales as your global portfolio does — without scaling your headcount alongside it."</p>
          <a href="/request-demo/" class="xr-btn xr-btn-ghost" style="padding:0;">Talk to our enterprise team <span class="xr-arrow">→</span></a>
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
    <p class="xr-reveal xr-d2" style="color:var(--xr-text-2);font-size:17px;line-height:1.75;margin:0 auto 40px;max-width:520px;">Request a demo and see ranked drill targets from your own geological data — within a single session.</p>
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
