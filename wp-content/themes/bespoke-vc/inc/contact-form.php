<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bespoke_vc_handle_contact_form() {
	if ( empty( $_POST['bvc_contact_submit'] ) ) {
		return;
	}

	if ( ! isset( $_POST['bvc_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bvc_contact_nonce'] ) ), 'bvc_contact_form' ) ) {
		wp_safe_redirect( add_query_arg( 'bvc_status', 'error', home_url( '/' ) ) );
		exit;
	}

	// Honeypot: real visitors never fill in this hidden field.
	if ( ! empty( $_POST['bvc_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'bvc_status', 'success', home_url( '/' ) ) );
		exit;
	}

	$name    = isset( $_POST['bvc_name'] ) ? sanitize_text_field( wp_unslash( $_POST['bvc_name'] ) ) : '';
	$email   = isset( $_POST['bvc_email'] ) ? sanitize_email( wp_unslash( $_POST['bvc_email'] ) ) : '';
	$message = isset( $_POST['bvc_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['bvc_message'] ) ) : '';

	if ( empty( $name ) || empty( $message ) || ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'bvc_status', 'error', home_url( '/' ) ) );
		exit;
	}

	$to      = get_theme_mod( 'contact_email', get_option( 'admin_email' ) );
	$subject = sprintf( '[%s] New contact form submission', get_bloginfo( 'name' ) );
	$body    = "Name: {$name}\nEmail: {$email}\n\nMessage:\n{$message}";
	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

	$sent = wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'bvc_status', $sent ? 'success' : 'error', home_url( '/' ) ) );
	exit;
}
add_action( 'template_redirect', 'bespoke_vc_handle_contact_form' );
