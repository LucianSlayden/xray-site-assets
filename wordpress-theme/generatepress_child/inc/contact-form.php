<?php
/**
 * Contact forms (Learn More and Investors): email each submission to Lucian.
 *
 * Both forms post to admin-post.php?action=xray_contact; a hidden "source"
 * field says which page to send the visitor back to.
 * The old /request-demo/ address redirects to /learn-more/.
 */

define( 'XRAY_CONTACT_TO', 'lucian@xraygeoanalytics.com' );

// Pages a form may send the visitor back to, with the anchor of their form.
function xray_contact_return( $source ) {
	$pages = array(
		'learn-more' => array( '/learn-more/', '#contact-form' ),
		'investors'  => array( '/investors/', '#iv-contact-form' ),
	);
	return isset( $pages[ $source ] ) ? $pages[ $source ] : $pages['learn-more'];
}

// Result message shown above a form after it redirects back with ?sent=.
function xray_contact_notice( $source = 'learn-more' ) {
	$sent  = isset( $_GET['sent'] ) ? sanitize_key( wp_unslash( $_GET['sent'] ) ) : '';
	$email = '<a href="mailto:info@xraygeoanalytics.com">info@xraygeoanalytics.com</a>';
	$messages = array(
		'1'       => array( 'ok', 'Thanks, your message is on its way. We\'ll get back to you soon.' ),
		'invalid' => array( 'err', 'investors' === $source ? 'Please add your name and a valid email, then send again.' : 'Please add your name, a valid email and a message, then send again.' ),
		'expired' => array( 'err', 'The form timed out. Please send it again.' ),
		'limit'   => array( 'err', 'You\'ve sent several messages already. Please email ' . $email . ' instead.' ),
		'error'   => array( 'err', 'Something went wrong sending your message. Please email ' . $email . ' instead.' ),
	);
	if ( ! isset( $messages[ $sent ] ) ) {
		return '';
	}
	list( $kind, $text ) = $messages[ $sent ];
	$text = wp_kses( $text, array( 'a' => array( 'href' => array() ) ) );
	return '<div class="lm-notice lm-notice-' . esc_attr( $kind ) . '" role="' . ( 'err' === $kind ? 'alert' : 'status' ) . '" tabindex="-1" data-sent="' . esc_attr( $sent ) . '">' . $text . '</div>';
}

// A fresh nonce for forms on cached pages: contact-form.js asks for one before
// sending, so a page served from cache after its nonce has lapsed still works.
function xray_contact_fresh_nonce() {
	nocache_headers();
	wp_send_json( array( 'nonce' => wp_create_nonce( 'xray_contact' ) ) );
}
add_action( 'wp_ajax_nopriv_xray_contact_nonce', 'xray_contact_fresh_nonce' );
add_action( 'wp_ajax_xray_contact_nonce', 'xray_contact_fresh_nonce' );

function xray_contact_handle() {
	$source = isset( $_POST['source'] ) ? sanitize_key( wp_unslash( $_POST['source'] ) ) : 'learn-more';
	list( $path, $anchor ) = xray_contact_return( $source );
	$back = home_url( $path );

	if ( ! isset( $_POST['xray_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['xray_contact_nonce'] ) ), 'xray_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'sent', 'expired', $back ) . $anchor );
		exit;
	}

	// Honeypot: real visitors never see or fill this field. It used to be
	// called "website", which browser autofill could fill in for real people.
	if ( ! empty( $_POST['xr_extra'] ) ) {
		wp_safe_redirect( add_query_arg( 'sent', '1', $back ) . $anchor );
		exit;
	}

	// At most five messages per visitor every ten minutes.
	$ip_key = 'xray_contact_' . md5( isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '' );
	$count  = (int) get_transient( $ip_key );
	if ( $count >= 5 ) {
		wp_safe_redirect( add_query_arg( 'sent', 'limit', $back ) . $anchor );
		exit;
	}

	$field = function ( $key, $textarea = false ) {
		if ( ! isset( $_POST[ $key ] ) ) {
			return '';
		}
		$value = wp_unslash( $_POST[ $key ] );
		return $textarea ? sanitize_textarea_field( $value ) : sanitize_text_field( $value );
	};

	$name     = $field( 'name' );
	$email    = sanitize_email( $field( 'email' ) );
	$company  = $field( 'company' );
	$interest = $field( 'interest' );
	$message  = $field( 'message', true );

	// The investor form's message is optional; Learn More needs one.
	if ( '' === $message && 'investors' === $source ) {
		$message = 'Requested investor materials.';
	}

	if ( '' === $name || ! is_email( $email ) || '' === $message ) {
		wp_safe_redirect( add_query_arg( 'sent', 'invalid', $back ) . $anchor );
		exit;
	}

	$subject = 'Website inquiry from ' . $name . ( $company ? ', ' . $company : '' );
	$body    = "Name: {$name}\n"
		. "Email: {$email}\n"
		. 'Company: ' . ( $company ? $company : '-' ) . "\n"
		. 'Interested as: ' . ( $interest ? $interest : '-' ) . "\n\n"
		. "Message:\n{$message}\n\n"
		. 'Sent from the ' . ( 'investors' === $source ? 'Investors' : 'Learn More' ) . " form on xraygeoanalytics.com.\n";
	// wp_mail splits Reply-To on commas, so keep the display name free of address punctuation.
	$reply_name = trim( str_replace( array( ',', ';', '<', '>', '"' ), ' ', $name ) );
	$headers    = array( 'Reply-To: ' . ( '' !== $reply_name ? $reply_name . ' ' : '' ) . '<' . $email . '>' );

	$ok = wp_mail( XRAY_CONTACT_TO, $subject, $body, $headers );

	set_transient( $ip_key, $count + 1, 10 * MINUTE_IN_SECONDS );
	wp_safe_redirect( add_query_arg( 'sent', $ok ? '1' : 'error', $back ) . $anchor );
	exit;
}
add_action( 'admin_post_nopriv_xray_contact', 'xray_contact_handle' );
add_action( 'admin_post_xray_contact', 'xray_contact_handle' );

// The page used to live at /request-demo/; send old links to /learn-more/.
add_action( 'template_redirect', function () {
	$path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) : '';
	if ( is_page( 'request-demo' ) || ( is_404() && preg_match( '#^/request-demo/?$#', (string) $path ) ) ) {
		wp_safe_redirect( home_url( '/learn-more/' ), 301 );
		exit;
	}
} );
