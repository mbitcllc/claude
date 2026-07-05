<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bespoke_vc_sanitize_checkbox( $checked ) {
	return (bool) $checked;
}

function bespoke_vc_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		'bespoke_vc_hero',
		array(
			'title'    => __( 'Landing Page: Hero', 'bespoke-vc' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'hero_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'hero_image',
			array(
				'label'    => __( 'Hero Background Image', 'bespoke-vc' ),
				'section'  => 'bespoke_vc_hero',
				'priority' => 10,
			)
		)
	);

	$wp_customize->add_setting(
		'hero_heading',
		array(
			'default'           => 'Bespoke Virtual Concierge',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'hero_heading',
		array(
			'label'   => __( 'Hero Heading', 'bespoke-vc' ),
			'section' => 'bespoke_vc_hero',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'hero_tagline',
		array(
			'default'           => 'Unlocking Potential, Together.',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'hero_tagline',
		array(
			'label'   => __( 'Hero Tagline', 'bespoke-vc' ),
			'section' => 'bespoke_vc_hero',
			'type'    => 'text',
		)
	);

	$wp_customize->add_section(
		'bespoke_vc_contact',
		array(
			'title'    => __( 'Landing Page: Contact', 'bespoke-vc' ),
			'priority' => 31,
		)
	);

	$wp_customize->add_setting(
		'contact_email',
		array(
			'default'           => get_option( 'admin_email' ),
			'sanitize_callback' => 'sanitize_email',
		)
	);
	$wp_customize->add_control(
		'contact_email',
		array(
			'label'   => __( 'Contact Email (displayed + form recipient)', 'bespoke-vc' ),
			'section' => 'bespoke_vc_contact',
			'type'    => 'email',
		)
	);

	$wp_customize->add_setting(
		'contact_email_visible',
		array(
			'default'           => true,
			'sanitize_callback' => 'bespoke_vc_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'contact_email_visible',
		array(
			'label'   => __( 'Show Contact Email on the page', 'bespoke-vc' ),
			'section' => 'bespoke_vc_contact',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'contact_phone',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'contact_phone',
		array(
			'label'   => __( 'Contact Phone (optional)', 'bespoke-vc' ),
			'section' => 'bespoke_vc_contact',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'contact_intro',
		array(
			'default'           => "Have a question or want to get started? Send us a message and we'll be in touch.",
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'contact_intro',
		array(
			'label'   => __( 'Contact Section Intro Text', 'bespoke-vc' ),
			'section' => 'bespoke_vc_contact',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_section(
		'bespoke_vc_footer',
		array(
			'title'    => __( 'Landing Page: Footer', 'bespoke-vc' ),
			'priority' => 32,
		)
	);

	$wp_customize->add_setting(
		'footer_text',
		array(
			'default'           => 'All Rights Reserved.',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'footer_text',
		array(
			'label'   => __( 'Footer Text (after copyright + site name)', 'bespoke-vc' ),
			'section' => 'bespoke_vc_footer',
			'type'    => 'text',
		)
	);
}
add_action( 'customize_register', 'bespoke_vc_customize_register' );
