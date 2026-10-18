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
    wp_enqueue_script( 'gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), '3.12.5', true );
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap'), '3.12.5', true );
    wp_enqueue_script( 'xray-anim', 'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/xray-anim.js', array('gsap-st'), '1.0', true );
    if ( is_page(254) ) {
        wp_enqueue_script( 'xray-product', 'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/product-page.js', array('gsap-st'), '1.0', true );
    }
    if ( is_front_page() ) {
        wp_enqueue_script( 'xray-hero', 'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/xray-hero.js', array('xray-anim'), '1.0', true );
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
    wp_enqueue_script(
        'xray-investors',
        'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/investors-page.js',
        array( 'gsap-st' ),
        null,
        true
    );
}
	// About Us page
if ( is_page( 'about-us' ) ) {
    wp_enqueue_script(
        'xray-about-us',
        'https://cdn.jsdelivr.net/gh/LucianSlayden/xray-site-assets@main/about-us-page.js',
        array( 'gsap-st' ),
        null,
        true
    );
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
