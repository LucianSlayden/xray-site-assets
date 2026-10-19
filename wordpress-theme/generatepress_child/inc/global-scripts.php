<?php
/**
 * Moved from Code Snippets #6 "XRay — Global Scripts".
 */

/**
 * Enqueue a script that ships in this theme's assets/ folder, versioned by
 * file time so every deploy busts browser and CDN caches at once.
 */
function xray_theme_script( $handle, $file, $deps = array() ) {
    $path = get_stylesheet_directory() . '/assets/' . $file;
    wp_enqueue_script( $handle, get_stylesheet_directory_uri() . '/assets/' . $file, $deps, file_exists( $path ) ? filemtime( $path ) : null, true );
}

/*
 * Safety net for scroll reveals. Content starts hidden (opacity 0) and is
 * faded in by xray-anim.js or a page's GSAP script. If those scripts are
 * blocked or fail, show everything after a short wait instead of leaving
 * the page blank. Without JS at all, .xr-reveal never hides (html.xr-js).
 */
add_action( 'wp_head', function() {
    ?>
<script>
document.documentElement.classList.add('xr-js');
window.addEventListener('load', function () {
  setTimeout(function () {
    var needGsap = document.querySelector('script[src*="gsap.min.js"]');
    if (window.__xrAnimReady && (!needGsap || window.gsap)) return;
    document.documentElement.classList.add('xr-fallback');
    document.querySelectorAll('main *, .site-content *, article *').forEach(function (el) {
      if (el.closest('.xr-nav-mobile, .xr-hero-bullet-body, [role="tooltip"], [aria-hidden="true"]')) return;
      var cs = getComputedStyle(el);
      if (cs.opacity === '0' || cs.visibility === 'hidden') { el.style.opacity = '1'; el.style.visibility = 'visible'; el.style.transform = 'none'; }
    });
  }, 2500);
});
</script>
    <?php
}, 1 );

add_action( 'wp_enqueue_scripts', function() {
    // Shared animation JS (reveals, counters, nav, parallax): runs on every page.
    xray_theme_script( 'xray-anim', 'xray-anim.js' );
});
