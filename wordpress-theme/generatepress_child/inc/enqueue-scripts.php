<?php
/**
 * Moved from Code Snippets #10 "XRay — Enqueue All Scripts".
 */

add_action( 'wp_enqueue_scripts', function () {
	// Register Three.js (used by Why X-Ray page)
wp_register_script(
    'three-js',
    'https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.min.js',
    array(),
    '0.160.0',
    true
);
    // One GSAP version site-wide. Learn More has no GSAP animation.
    if ( ! is_page( array( 'learn-more', 'request-demo' ) ) ) {
        wp_enqueue_script( 'gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js', array(), '3.12.7', true );
        // ScrollTrigger loads only where a page script lists it as a dependency (not Home or Product).
        wp_register_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js', array('gsap'), '3.12.7', true );
    }
    // Page scripts are served from the theme (not jsDelivr @main) so a deploy takes effect at once.
    if ( is_page(254) ) {
        xray_theme_script( 'xray-product', 'product-page.js', array('gsap') );
    }
    if ( is_front_page() ) {
        xray_theme_script( 'xray-hero', 'xray-hero.js', array('gsap') );
    }
    // Contact forms: Learn More and Investors.
    if ( is_page( array( 'learn-more', 'request-demo', 298 ) ) ) {
        xray_theme_script( 'xray-contact', 'contact-form.js' );
    }
	if ( is_page(283) ) {
    wp_enqueue_script( 'xray-platform', 'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/platform-page.js', array('gsap-st'), '1.0', true );
}
	if ( is_page(288) ) {
    wp_enqueue_script( 'xray-hiw', 'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/how-it-works-page.js', array('gsap-st'), '1.0', true );
}
	if ( is_page(293) ) {
    wp_enqueue_script( 'xray-pricing', 'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/pricing-page.js', array('gsap-st'), '1.0', true );
}
	// Investors page
if ( is_page( 298 ) ) {
    // Served from the theme (not jsDelivr) so a deploy takes effect at once.
    $iv_js = get_stylesheet_directory() . '/assets/investors-page.js';
    wp_enqueue_script(
        'xray-investors',
        get_stylesheet_directory_uri() . '/assets/investors-page.js',
        array( 'gsap-st' ),
        filemtime( $iv_js ),
        true
    );
}
	// About Us page
if ( is_page( 'about-us' ) ) {
    xray_theme_script( 'xray-about-us', 'about-us-page.js', array( 'gsap-st' ) );
}
	// Our Team page
if ( is_page( 'our-team' ) ) {
    wp_enqueue_script(
        'xray-our-team',
        'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/our-team-page.js',
        array( 'gsap-st' ),
        null,
        true
    );
}
// Why X-Ray page
if ( is_page( 'why-xray' ) ) {
    wp_enqueue_script( 'three-js' );
    wp_enqueue_script(
        'xray-why-xray',
        'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/why-xray-page.js',
        array( 'three-js', 'gsap-st' ),
        null,
        true
    );
}
	if ( is_page( 'news-updates' ) ) {
    wp_enqueue_script(
        'xray-news-updates',
        'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/news-updates-page.js',
        array( 'gsap-st' ),
        null,
        true
    );
}
	if ( is_page( 'faqs' ) ) {
    wp_enqueue_script(
        'xray-faqs',
        'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/faqs-page.js',
        array( 'gsap-st' ),
        null,
        true
    );
}
	
} );
