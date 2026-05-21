<?php
/**
 * X-RAY GEOANALYTICS — WORDPRESS CODE SNIPPETS
 * ─────────────────────────────────────────────────────────────────
 * Paste each snippet block separately into the Code Snippets plugin
 * (each marked with its own title). Activate them in the order
 * listed below.
 *
 * DEPLOYMENT ORDER:
 *   A. XRay — Load Google Fonts (Inter + JetBrains Mono)
 *   B. XRay — Enqueue scroll-animation.js from jsDelivr
 *   C. XRay — Hide default GP header/footer + body class
 *   D. XRay — Inject custom navigation (with Investors in Resources)
 *   E. XRay — Inject custom footer (with five columns + social)
 *
 * Last updated: May 2026 (post site-wide revamp)
 * ─────────────────────────────────────────────────────────────────
 */


/* ══════════════════════════════════════════════════════════════
   SNIPPET A — Load Google Fonts (Inter + JetBrains Mono)
   Code Snippets title: "XRay — Google Fonts"
   ══════════════════════════════════════════════════════════════ */
add_action( 'wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">';
}, 2 );


/* ══════════════════════════════════════════════════════════════
   SNIPPET B — Enqueue scroll-animation.js
   Code Snippets title: "XRay — Scroll Animation JS"
   Replace the placeholder URL with your jsDelivr CDN URL once
   scroll-animation.js is uploaded to GitHub.
   ══════════════════════════════════════════════════════════════ */
add_action( 'wp_enqueue_scripts', function () {
    // Example after upload:
    // https://cdn.jsdelivr.net/gh/YOUR-ORG/xray-assets@main/scroll-animation.js
    $scroll_js_url = 'PLACEHOLDER — insert jsDelivr URL for scroll-animation.js';

    if ( 'PLACEHOLDER — insert jsDelivr URL for scroll-animation.js' !== $scroll_js_url ) {
        wp_enqueue_script(
            'xray-scroll-animation',
            $scroll_js_url,
            array(),
            '2.0.0',
            true
        );
    }
} );


/* ══════════════════════════════════════════════════════════════
   SNIPPET C — Hide default GP header / footer + base body class
   Code Snippets title: "XRay — Hide GP Chrome + Body Class"
   ══════════════════════════════════════════════════════════════ */
add_filter( 'generate_navigation_location', '__return_false' );
add_filter( 'generate_footer_widgets', '__return_zero' );

add_filter( 'body_class', function ( $classes ) {
    $classes[] = 'xr-page';
    return $classes;
} );

add_action( 'wp_head', function () {
    echo '<style>
      /* Push content below fixed nav (80px on desktop, 68px on mobile) */
      .site-content, #content, .generate-columns-container { margin-top: 80px; }
      @media (max-width: 980px) {
        .site-content, #content, .generate-columns-container { margin-top: 68px; }
      }
      .site-header { display: none !important; }
      .site { background-color: #0E141B; }
      body { background-color: #0E141B; color: #F1F4F8; font-family: "Inter", system-ui, sans-serif; }
    </style>';
}, 20 );


/* ══════════════════════════════════════════════════════════════
   SNIPPET D — Inject custom navigation
   Code Snippets title: "XRay — Navigation"
   Outputs the X-Ray nav at wp_body_open (just inside <body>).
   ══════════════════════════════════════════════════════════════ */
add_action( 'wp_body_open', function () {
    // Build the logo URL. If you upload the hex logo to the Media
    // Library, replace this with the Media Library URL.
    $logo = get_stylesheet_directory_uri() . '/brand_assets/hex_logo_clean.png';
    $home = esc_url( home_url( '/' ) );
    ?>
    <nav class="xr-nav">
      <div class="xr-nav-inner">
        <a href="<?php echo $home; ?>" class="xr-brand">
          <img src="<?php echo esc_url( $logo ); ?>" alt="X-Ray Geoanalytics">
          <span class="xr-brand-wordmark">X-Ray <span class="accent">Geoanalytics</span></span>
        </a>
        <div class="xr-nav-list">

          <div class="xr-nav-item">
            <button class="xr-nav-btn" aria-haspopup="true">Product
              <svg class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </button>
            <div class="xr-nav-drop">
              <a href="<?php echo esc_url( home_url( '/product' ) ); ?>">Product Overview</a>
              <a href="<?php echo esc_url( home_url( '/our-models' ) ); ?>">Our Models</a>
              <a href="<?php echo esc_url( home_url( '/industries' ) ); ?>">Industries</a>
              <a href="<?php echo esc_url( home_url( '/platform' ) ); ?>">Platform</a>
              <a href="<?php echo esc_url( home_url( '/how-it-works' ) ); ?>">How it Works</a>
              <a href="<?php echo esc_url( home_url( '/pricing' ) ); ?>">Pricing</a>
            </div>
          </div>

          <div class="xr-nav-item">
            <button class="xr-nav-btn" aria-haspopup="true">Resources
              <svg class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </button>
            <div class="xr-nav-drop">
              <a href="<?php echo esc_url( home_url( '/resources' ) ); ?>">Resources</a>
              <a href="<?php echo esc_url( home_url( '/investors' ) ); ?>">Investors</a>
            </div>
          </div>

          <div class="xr-nav-item">
            <button class="xr-nav-btn" aria-haspopup="true">About Us
              <svg class="xr-nav-chev" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </button>
            <div class="xr-nav-drop">
              <a href="<?php echo esc_url( home_url( '/our-team' ) ); ?>">Our Team</a>
              <a href="<?php echo esc_url( home_url( '/why-xray' ) ); ?>">Why X-Ray</a>
              <a href="<?php echo esc_url( home_url( '/news-updates' ) ); ?>">News &amp; Updates</a>
              <a href="<?php echo esc_url( home_url( '/faqs' ) ); ?>">FAQs</a>
            </div>
          </div>

          <a href="<?php echo esc_url( home_url( '/request-demo' ) ); ?>" class="xr-btn xr-btn-gold xr-nav-cta">Request Demo</a>
        </div>

        <button class="xr-nav-toggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
      </div>

      <div class="xr-nav-mobile">
        <a href="<?php echo esc_url( home_url( '/product' ) ); ?>">Product</a>
        <a href="<?php echo esc_url( home_url( '/our-models' ) ); ?>">Our Models</a>
        <a href="<?php echo esc_url( home_url( '/industries' ) ); ?>">Industries</a>
        <a href="<?php echo esc_url( home_url( '/platform' ) ); ?>">Platform</a>
        <a href="<?php echo esc_url( home_url( '/how-it-works' ) ); ?>">How it Works</a>
        <a href="<?php echo esc_url( home_url( '/pricing' ) ); ?>">Pricing</a>
        <a href="<?php echo esc_url( home_url( '/resources' ) ); ?>">Resources</a>
        <a href="<?php echo esc_url( home_url( '/investors' ) ); ?>">Investors</a>
        <a href="<?php echo esc_url( home_url( '/our-team' ) ); ?>">Our Team</a>
        <a href="<?php echo esc_url( home_url( '/why-xray' ) ); ?>">Why X-Ray</a>
        <a href="<?php echo esc_url( home_url( '/news-updates' ) ); ?>">News &amp; Updates</a>
        <a href="<?php echo esc_url( home_url( '/faqs' ) ); ?>">FAQs</a>
        <a href="<?php echo esc_url( home_url( '/request-demo' ) ); ?>" class="xr-btn xr-btn-gold">Request Demo</a>
      </div>
    </nav>
    <?php
} );


/* ══════════════════════════════════════════════════════════════
   SNIPPET E — Inject custom footer
   Code Snippets title: "XRay — Footer"
   Hook: generate_before_footer (GeneratePress).
   ══════════════════════════════════════════════════════════════ */
add_action( 'generate_before_footer', function () {
    $logo = get_stylesheet_directory_uri() . '/brand_assets/hex_logo_clean.png';
    $year = esc_html( date( 'Y' ) );
    ?>
    <footer class="xr-footer">
      <div class="xr-footer-strip"></div>
      <div class="xr-footer-inner">
        <div class="xr-footer-grid">

          <div>
            <div class="xr-footer-brand">
              <img src="<?php echo esc_url( $logo ); ?>" alt="X-Ray Geoanalytics">
              <span>X-Ray Geoanalytics</span>
            </div>
            <p class="xr-footer-tagline">Advanced machine learning for mining site discovery. Nevada lithium. Every mineral. Every continent. Every drill result makes us smarter.</p>
            <div class="xr-footer-contact">
              <a href="mailto:info@xraygeoanalytics.com"><svg viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="M4 6l8 7 8-7"/></svg>info@xraygeoanalytics.com</a>
              <a href="mailto:investors@xraygeoanalytics.com"><svg viewBox="0 0 24 24"><path d="M3 12l9-9 9 9-9 9z"/></svg>investors@xraygeoanalytics.com</a>
            </div>
          </div>

          <div>
            <h4>Product</h4>
            <ul class="xr-footer-list">
              <li><a href="<?php echo esc_url( home_url( '/product' ) ); ?>">Overview</a></li>
              <li><a href="<?php echo esc_url( home_url( '/our-models' ) ); ?>">Our Models</a></li>
              <li><a href="<?php echo esc_url( home_url( '/platform' ) ); ?>">Platform</a></li>
              <li><a href="<?php echo esc_url( home_url( '/industries' ) ); ?>">Industries</a></li>
              <li><a href="<?php echo esc_url( home_url( '/how-it-works' ) ); ?>">How it Works</a></li>
              <li><a href="<?php echo esc_url( home_url( '/pricing' ) ); ?>">Pricing</a></li>
            </ul>
          </div>

          <div>
            <h4>Company</h4>
            <ul class="xr-footer-list">
              <li><a href="<?php echo esc_url( home_url( '/our-team' ) ); ?>">Our Team</a></li>
              <li><a href="<?php echo esc_url( home_url( '/why-xray' ) ); ?>">Why X-Ray</a></li>
              <li><a href="<?php echo esc_url( home_url( '/news-updates' ) ); ?>">News &amp; Updates</a></li>
              <li><a href="<?php echo esc_url( home_url( '/faqs' ) ); ?>">FAQs</a></li>
            </ul>
          </div>

          <div>
            <h4>Resources</h4>
            <ul class="xr-footer-list">
              <li><a href="<?php echo esc_url( home_url( '/resources' ) ); ?>">Resources Library</a></li>
              <li><a href="<?php echo esc_url( home_url( '/investors' ) ); ?>">For Investors</a></li>
              <li><a href="<?php echo esc_url( home_url( '/request-demo' ) ); ?>">Request Demo</a></li>
            </ul>
          </div>

          <div>
            <h4>Get in Touch</h4>
            <ul class="xr-footer-list">
              <li><a href="<?php echo esc_url( home_url( '/request-demo' ) ); ?>">Book a Demo</a></li>
              <li><a href="mailto:partnerships@xraygeoanalytics.com">Partnerships</a></li>
              <li><a href="mailto:press@xraygeoanalytics.com">Press</a></li>
              <li><a href="mailto:careers@xraygeoanalytics.com">Careers</a></li>
            </ul>
          </div>
        </div>

        <div class="xr-footer-bottom">
          <p>© <?php echo $year; ?> X-Ray Geoanalytics, Inc. All rights reserved.</p>
          <div class="xr-footer-social">
            <a href="https://www.linkedin.com/company/xray-geoanalytics" aria-label="LinkedIn" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><rect x="2" y="9" width="4" height="13"/><circle cx="4" cy="4" r="2" fill="currentColor"/><path d="M22 22V13.5a3.5 3.5 0 0 0-7 0V22M10 22V9"/></svg></a>
            <a href="https://x.com/xraygeoanalytic" aria-label="X" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M4 4l16 16M20 4L4 20"/></svg></a>
            <a href="mailto:info@xraygeoanalytics.com" aria-label="Email"><svg viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="M4 6l8 7 8-7"/></svg></a>
          </div>
          <p>xraygeoanalytics.com</p>
        </div>

      </div>
    </footer>
    <?php
} );


/* ══════════════════════════════════════════════════════════════
   DEPLOYMENT NOTES
   ──────────────────────────────────────────────────────────────
   1. Pages to create in WordPress (slugs must match):
        /product, /our-models, /industries, /platform, /how-it-works,
        /pricing, /resources, /investors (NEW), /our-team, /why-xray,
        /news-updates, /faqs, /request-demo, /about-us
      Plus the homepage (set "Homepage displays → A static page" to your
      homepage with the scroll-scrub hero embedded in the page content).

   2. Hex logo:
        get_stylesheet_directory_uri() . '/brand_assets/hex_logo_clean.png'
      WordPress.com Business doesn't expose the theme folder for upload.
      Upload the logo to Media Library and hardcode the resulting URL,
      e.g.:
        $logo = 'https://YOUR-SITE.com/wp-content/uploads/2026/05/hex_logo_clean.png';

   3. Hero video (website_hero_scrub.mp4):
        IMPORTANT — use website_hero_scrub.mp4 (the keyframe-per-frame
        re-encoded version), NOT the original website_hero.mp4. The
        original only has 4 keyframes across 91 frames and cannot be
        scrubbed/reverse-played smoothly. The scrub version has one
        keyframe per frame so seek operations are instant.
        Upload to a video host (jsDelivr-from-GitHub works for <=20MB
        files; otherwise use a small CDN like bunny.net or Cloudflare R2).
        Reference it directly in the homepage hero <video src=...> tag.

   4. Scroll animation JS:
        Upload wordpress-deploy/scroll-animation.js to a public GitHub
        repo. Get the jsDelivr URL:
          https://cdn.jsdelivr.net/gh/USER/REPO@main/scroll-animation.js
        Replace the PLACEHOLDER in Snippet B with that URL.

   5. Homepage hero block:
        In your homepage's Block Editor, add an HTML block with the
        contents of the hero <section> from index.html (the scroll-scrub
        section with the four hex bullets). Make sure the <video src>
        points at your CDN URL.

   6. Investors page:
        New page added in this revamp. Create at slug /investors and
        paste the body content from investors.html. The contact form
        uses a plain mailto: action — for production, consider swapping
        to a managed form (WPForms, Forminator, etc.) targeting
        investors@xraygeoanalytics.com.
   ══════════════════════════════════════════════════════════════ */
