<?php
/**
 * Search and share metadata for the five published pages: a meta
 * description, and Open Graph / Twitter card tags with a 1200x630 image.
 * When Jetpack prints its own Open Graph tags, ours are fed into Jetpack's
 * instead of being printed twice.
 */

function xray_page_meta() {
	$pages = array(
		'home'       => array(
			'X-Ray Geoanalytics',
			'We tell mining companies exactly where to drill. A machine learning model that uses geochemistry, geophysics and remote sensing data to create ranked drill targets and prospectivity reports.',
		),
		'product'    => array(
			'The X-Ray Platform',
			'How X-Ray will work: your geologist team imports its survey data and gets ranked drill targets, a prospectivity heat map and a 3D view of the target area, built on our Great Basin lithium prototype.',
		),
		'investors'  => array(
			'Investors · X-Ray Geoanalytics',
			'X-Ray Geoanalytics uses machine learning to find mineral deposits for mining companies, starting with lithium in the Great Basin. The market, our prototype, the roadmap and the team.',
		),
		'about-us'   => array(
			'About X-Ray',
			'X-Ray Geoanalytics finds mineral deposits for mining companies using machine learning. Our models process more data and consider more factors than any human can.',
		),
		'learn-more' => array(
			'Learn More About X-Ray',
			'We\'re early, and we want to hear from you. Whether you explore for minerals, invest in the space or want to work with us, send us a note and a co-founder will reply directly.',
		),
	);
	if ( is_front_page() ) {
		$key = 'home';
	} elseif ( is_page( 254 ) || is_page( 'product' ) ) {
		$key = 'product';
	} elseif ( is_page( 298 ) || is_page( 'investors' ) ) {
		$key = 'investors';
	} elseif ( is_page( 'about-us' ) ) {
		$key = 'about-us';
	} elseif ( is_page( array( 'learn-more', 'request-demo' ) ) ) {
		$key = 'learn-more';
	} else {
		return null;
	}
	return array(
		'title'       => $pages[ $key ][0],
		'description' => $pages[ $key ][1],
		'url'         => 'home' === $key ? home_url( '/' ) : home_url( '/' . $key . '/' ),
		'image'       => get_stylesheet_directory_uri() . '/assets/img/share-card.jpg',
	);
}

// True when Jetpack is set to print Open Graph tags on this page.
function xray_jetpack_og_active() {
	return function_exists( 'jetpack_og_tags' ) && false !== has_action( 'wp_head', 'jetpack_og_tags' );
}

add_action( 'wp_head', function () {
	$m = xray_page_meta();
	if ( ! $m ) {
		return;
	}
	echo '<meta name="description" content="' . esc_attr( $m['description'] ) . '" />' . "\n";
	if ( xray_jetpack_og_active() ) {
		return; // Jetpack prints the og: tags; see the filter below.
	}
	$tags = array(
		'og:type'             => 'website',
		'og:site_name'        => 'X-Ray Geoanalytics',
		'og:title'            => $m['title'],
		'og:description'      => $m['description'],
		'og:url'              => $m['url'],
		'og:image'            => $m['image'],
		'og:image:width'      => '1200',
		'og:image:height'     => '630',
		'twitter:card'        => 'summary_large_image',
		'twitter:title'       => $m['title'],
		'twitter:description' => $m['description'],
		'twitter:image'       => $m['image'],
	);
	foreach ( $tags as $k => $v ) {
		$attr = 0 === strpos( $k, 'twitter:' ) ? 'name' : 'property';
		echo '<meta ' . $attr . '="' . esc_attr( $k ) . '" content="' . esc_attr( $v ) . '" />' . "\n";
	}
}, 2 );

// Jetpack builds og: tags from the page excerpt, which these pages don't have.
add_filter( 'jetpack_open_graph_tags', function ( $tags ) {
	$m = xray_page_meta();
	if ( ! $m ) {
		return $tags;
	}
	$tags['og:title']            = $m['title'];
	$tags['og:description']      = $m['description'];
	$tags['og:image']            = $m['image'];
	$tags['og:image:width']      = 1200;
	$tags['og:image:height']     = 630;
	$tags['twitter:card']        = 'summary_large_image';
	$tags['twitter:description'] = $m['description'];
	$tags['twitter:image']       = $m['image'];
	return $tags;
} );

// Jetpack SEO can print its own description; keep only ours.
add_filter( 'jetpack_seo_meta_tags', function ( $tags ) {
	if ( xray_page_meta() ) {
		unset( $tags['description'] );
	}
	return $tags;
} );
