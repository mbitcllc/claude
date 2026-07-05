<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Single source of truth for Customizer defaults, used both when
 * registering settings and when rendering the template, so the two
 * can never drift out of sync.
 */
function bespoke_vc_defaults() {
	static $defaults;

	if ( null === $defaults ) {
		$defaults = array(
			'hero_image'            => '',
			'hero_image_fit'        => 'cover',
			'hero_image_position'   => 'center',
			'hero_overlay_visible'  => true,
			'hero_heading'          => 'Bespoke Virtual Concierge',
			'hero_tagline'          => 'Unlocking Potential, Together.',
			'what_we_do_image'      => '',
			'what_we_do_text'       => 'We specialize in optimizing operations for busy medspas. We provide comprehensive support, including pre-assessments to qualify clients and manage all client communication and scheduling, allowing providers to focus on what they do best: injecting and growing their business.',
			'about_photo'           => '',
			'about_bio'             => "I'm Denise Lopez and my journey in healthcare began in 2019 as a medical assistant, and I've had the privilege of learning from the best! I offer specialized expertise gained through direct training from Dr. Thuy Doan. My experience also spans the fast-paced environments of urgent care and the specialized field of plastic surgery. Originally from Australia, and with two decades dedicated to customer service, I understand the importance of building strong relationships and I am committed to providing seamless and professional support, ensuring exceptional experiences for both clients and providers.",
			'contact_name'          => 'Denise Lopez',
			'contact_location'      => 'Atlanta, Georgia',
			'contact_email'         => 'denise@bespoke-vc.com',
			'contact_email_visible' => true,
			'contact_phone'         => '470-263-0648',
			'contact_intro'         => "Have a question or want to get started? Send us a message and we'll be in touch.",
			'footer_text'           => 'All Rights Reserved.',
		);
	}

	return $defaults;
}

function bespoke_vc_default( $key ) {
	$defaults = bespoke_vc_defaults();
	return isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
}

/**
 * Reads a theme_mod, always falling back to the matching entry in
 * bespoke_vc_defaults() so the fallback can never drift from what's
 * registered as the setting's Customizer default.
 */
function bespoke_vc_get( $key ) {
	return get_theme_mod( $key, bespoke_vc_default( $key ) );
}

function bespoke_vc_services_list() {
	return array(
		'Comprehensive Client Communication',
		'Expert handling of pre and post-procedure inquiries',
		'Knowledgeable response to non-urgent medical inquiries',
		'Seamless appointment scheduling & management',
		'Pre Assessments for new clients',
		'Personalized business support',
		'Prescription call in abilities',
		'Available 8am - 8pm EST, 7 Days',
	);
}
