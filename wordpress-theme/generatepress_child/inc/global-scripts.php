<?php
/**
 * Moved from Code Snippets #6 "XRay — Global Scripts".
 */

add_action( 'wp_enqueue_scripts', function() {
    // Shared animation JS — runs on all XRay pages
    wp_enqueue_script( 'xray-anim', 'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/xray-anim.js', [], '1.0', true );
});
