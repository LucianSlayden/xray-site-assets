<?php
/**
 * Moved from Code Snippets #24 "XRay — Remove Header Footer for Custom Pages".
 */

add_action( 'wp', function () {
    $page_ids   = array( 254, 277, 283, 288, 293, 298 );
    $page_slugs = array( 'about-us', 'our-team', 'why-xray', 'news-updates',
                         'faqs', 'request-demo', 'learn-more', 'resources', 'our-models', 'industries');

    if ( ! is_page( $page_ids ) && ! is_page( $page_slugs ) ) {
        return;
    }

    remove_action( 'generate_header', 'generate_construct_header' );
    remove_action( 'generate_footer', 'generate_construct_footer' );
} );
