<?php
/**
 * Shared top nav and footer for every X-Ray page.
 *
 * The site is trimmed to five public pages for now: Home, Product, Investors,
 * About Us and Learn More. The other page templates stay in the theme and
 * their WordPress pages are drafts, so they can be brought back later by
 * publishing the page and adding it to xray_site_links().
 */

function xray_site_links() {
	return array(
		'product'   => 'Product',
		'investors' => 'Investors',
		'about-us'  => 'About Us',
	);
}

function xray_logo_img() {
	// Versioned by file time so browsers fetch a replaced logo straight away.
	// 2x/3x copies (from logo-wordmark-full.png) keep the contour emblem sharp on retina phones.
	$dir  = get_stylesheet_directory() . '/assets/img/';
	$uri  = get_stylesheet_directory_uri() . '/assets/img/';
	$ver  = '?ver=' . filemtime( $dir . 'logo-wordmark.png' );
	$src  = $uri . 'logo-wordmark.png' . $ver;
	$set  = $src . ' 1x, ' . $uri . 'logo-wordmark-2x.webp' . $ver . ' 2x, ' . $uri . 'logo-wordmark-3x.webp' . $ver . ' 3x';
	return '<img class="xr-brand-logo" src="' . esc_url( $src ) . '" srcset="' . esc_attr( $set ) . '" alt="X-Ray Geoanalytics" width="601" height="120">';
}

function xray_site_nav() {
	$links = xray_site_links();
	$learn = is_page( array( 'learn-more', 'request-demo' ) );
	?>
<nav class="xr-nav">
  <div class="xr-nav-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="xr-brand"><?php echo xray_logo_img(); ?></a>
    <div class="xr-nav-list">
      <?php foreach ( $links as $slug => $label ) : ?>
      <a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>" class="xr-nav-link<?php echo is_page( $slug ) ? ' is-current" aria-current="page' : ''; ?>"><?php echo esc_html( $label ); ?></a>
      <?php endforeach; ?>
      <a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>" class="xr-btn xr-btn-gold xr-nav-cta<?php echo $learn ? ' is-current" aria-current="page' : ''; ?>">Learn More</a>
    </div>
    <button class="xr-nav-toggle" type="button" aria-label="Menu" aria-expanded="false" aria-controls="xr-nav-mobile"><span></span><span></span><span></span></button>
  </div>
  <div class="xr-nav-mobile" id="xr-nav-mobile">
    <?php foreach ( $links as $slug => $label ) : ?>
    <a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>"<?php echo is_page( $slug ) ? ' class="is-current" aria-current="page"' : ''; ?>><?php echo esc_html( $label ); ?></a>
    <?php endforeach; ?>
    <a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>" class="xr-btn xr-btn-gold"<?php echo $learn ? ' aria-current="page"' : ''; ?>>Learn More</a>
  </div>
</nav>
	<?php
}

function xray_site_footer() {
	$links = xray_site_links();
	?>
<footer class="xr-footer" role="contentinfo">
  <div class="xr-footer-inner">
    <div class="xr-footer-grid xr-footer-grid-slim">
      <div>
        <div class="xr-footer-brand"><?php echo xray_logo_img(); ?></div>
        <p class="xr-footer-tagline">An AI driven platform that turns exploration data into accurate predictions that help mining companies figure out where to drill in search of new mineral deposits.</p>
        <div class="xr-footer-contact">
          <a href="mailto:info@xraygeoanalytics.com">info@xraygeoanalytics.com</a>
        </div>
      </div>

      <div>
        <h3>Explore</h3>
        <ul class="xr-footer-list">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
          <?php foreach ( $links as $slug => $label ) : ?>
          <li><a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>"><?php echo esc_html( $label ); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div>
        <h3>Get in Touch</h3>
        <ul class="xr-footer-list">
          <li><a href="<?php echo esc_url( home_url( '/learn-more/' ) ); ?>">Learn More</a></li>
          <li><a href="mailto:info@xraygeoanalytics.com">Email Us</a></li>
        </ul>
      </div>
    </div>

    <div class="xr-footer-bottom">
      <p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> X-Ray Geoanalytics, Inc. <span class="xr-nobreak">All rights reserved.</span></p>
      <div class="xr-footer-social">
        <a href="https://www.linkedin.com/company/xray-geoanalytics" aria-label="LinkedIn" target="_blank" rel="noopener">
          <svg class="xr-brand-icon" aria-hidden="true" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 1 1 0-4.125 2.062 2.062 0 0 1 0 4.125zM7.119 20.452H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
        </a>
        <a href="https://x.com/xraygeoanalytic" aria-label="X" target="_blank" rel="noopener">
          <svg class="xr-brand-icon" aria-hidden="true" viewBox="0 0 24 24"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>
        </a>
      </div>
      <p>xraygeoanalytics.com</p>
    </div>
  </div>
</footer>
	<?php
}
