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

add_action( 'wp_enqueue_scripts', function() {
    // Shared animation JS (reveals, counters, nav, parallax): runs on every page.
    xray_theme_script( 'xray-anim', 'xray-anim.js' );
});
