<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bespoke_vc_contact_redirect( $status ) {
	wp_safe_redirect( add_query_arg( 'bvc_status', $status, home_url( '/' ) ) . '#contact' );
	exit;
}

function bespoke_vc_handle_contact_form() {
	if ( empty( $_POST['bvc_contact_submit'] ) ) {
		return;
	}

	if ( headers_sent() ) {
		return;
	}

	if ( ! isset( $_POST['bvc_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bvc_contact_nonce'] ) ), 'bvc_contact_form' ) ) {
		bespoke_vc_contact_redirect( 'error' );
	}

	// Honeypot: real visitors never see or fill in this field (hidden via aria-hidden + CSS).
	if ( ! empty( $_POST['bvc_hp_field'] ) ) {
		bespoke_vc_contact_redirect( 'success' );
	}

	$name    = isset( $_POST['bvc_name'] ) ? sanitize_text_field( wp_unslash( $_POST['bvc_name'] ) ) : '';
	$email   = isset( $_POST['bvc_email'] ) ? sanitize_email( wp_unslash( $_POST['bvc_email'] ) ) : '';
	$message = isset( $_POST['bvc_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['bvc_message'] ) ) : '';

	if ( empty( $name ) || empty( $message ) || ! is_email( $email ) ) {
		bespoke_vc_contact_redirect( 'error' );
	}

	$to      = bespoke_vc_get( 'contact_email' );
	$subject = sprintf( '[%s] New contact form submission', get_bloginfo( 'name' ) );
	$body    = "Name: {$name}\nEmail: {$email}\n\nMessage:\n{$message}";
	$headers = array( 'Reply-To: "' . addslashes( $name ) . '" <' . $email . '>' );

	$sent = wp_mail( $to, $subject, $body, $headers );

	bespoke_vc_contact_redirect( $sent ? 'success' : 'error' );
}
add_action( 'template_redirect', 'bespoke_vc_handle_contact_form' );
