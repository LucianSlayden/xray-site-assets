<?php
/**
 * Learn More contact form: emails each submission to Lucian.
 *
 * The form on /learn-more/ posts to admin-post.php?action=xray_contact.
 * The old /request-demo/ address redirects to /learn-more/.
 */

define( 'XRAY_CONTACT_TO', 'lucian@xraygeoanalytics.com' );

function xray_contact_handle() {
	$back = home_url( '/learn-more/' );

	if ( ! isset( $_POST['xray_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['xray_contact_nonce'] ) ), 'xray_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'sent', 'expired', $back ) . '#contact' );
		exit;
	}

	// Honeypot: real visitors never see or fill this field.
	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( add_query_arg( 'sent', '1', $back ) . '#contact' );
		exit;
	}

	// At most five messages per visitor every ten minutes.
	$ip_key = 'xray_contact_' . md5( isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '' );
	$count  = (int) get_transient( $ip_key );
	if ( $count >= 5 ) {
		wp_safe_redirect( add_query_arg( 'sent', 'limit', $back ) . '#contact' );
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

	if ( '' === $name || ! is_email( $email ) || '' === $message ) {
		wp_safe_redirect( add_query_arg( 'sent', 'invalid', $back ) . '#contact' );
		exit;
	}

	$subject = 'Website inquiry from ' . $name . ( $company ? ', ' . $company : '' );
	$body    = "Name: {$name}\n"
		. "Email: {$email}\n"
		. 'Company: ' . ( $company ? $company : '-' ) . "\n"
		. 'Interested as: ' . ( $interest ? $interest : '-' ) . "\n\n"
		. "Message:\n{$message}\n\n"
		. "Sent from the Learn More form on xraygeoanalytics.com.\n";
	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

	$ok = wp_mail( XRAY_CONTACT_TO, $subject, $body, $headers );

	set_transient( $ip_key, $count + 1, 10 * MINUTE_IN_SECONDS );
	wp_safe_redirect( add_query_arg( 'sent', $ok ? '1' : 'error', $back ) . '#contact' );
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
