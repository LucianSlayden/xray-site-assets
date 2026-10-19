<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

/*
 * X-Ray Geoanalytics site code, moved here from the Code Snippets plugin.
 *
 * Keep XRAY_THEME_LIVE false while the old snippets are still active,
 * otherwise every page renders its nav, content and footer twice.
 * Switch-over: deactivate the X-Ray snippets, then set this to true.
 */
define( 'XRAY_THEME_LIVE', true );

if ( XRAY_THEME_LIVE ) {
	// Same order the snippets ran in (by snippet ID), so script
	// registration and hook order stay identical.
	$xray_includes = array(
		'site-chrome',
		'global-scripts',
		'page-home',
		'enqueue-scripts',
		'page-product',
		'page-our-models',
		'page-industries',
		'page-platform',
		'page-how-it-works',
		'page-pricing',
		'page-investors',
		'page-about-us',
		'page-our-team',
		'page-why-xray',
		'page-news-updates',
		'page-faqs',
		'page-request-demo',
		'contact-form',
		'hide-gp-chrome',
		'page-resources',
	);

	foreach ( $xray_includes as $xray_include ) {
		require_once get_stylesheet_directory() . '/inc/' . $xray_include . '.php';
	}

	// Global design system, formerly Appearance → Customize → Additional CSS.
	// Printed at the same point as Additional CSS (wp_head, priority 101) so
	// it still overrides GeneratePress. Versioned by file time to bust caches.
	add_action( 'wp_head', function () {
		$path = get_stylesheet_directory() . '/assets/xray.css';
		$url  = get_stylesheet_directory_uri() . '/assets/xray.css?ver=' . filemtime( $path );
		echo '<link rel="stylesheet" id="xray-css" href="' . esc_url( $url ) . '" media="all" />' . "\n";
	}, 101 );

	// Browser tab and home-screen icons from the hex logo.
	add_action( 'wp_head', function () {
		$img = get_stylesheet_directory_uri() . '/assets/img/';
		echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url( $img . 'logo-hex-32.png' ) . '" />' . "\n";
		echo '<link rel="icon" type="image/png" sizes="512x512" href="' . esc_url( $img . 'logo-hex-512.png' ) . '" />' . "\n";
		echo '<link rel="apple-touch-icon" href="' . esc_url( $img . 'logo-hex-180.png' ) . '" />' . "\n";
	}, 102 );
}
