<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bespoke_vc_sanitize_checkbox( $checked ) {
	return (bool) $checked;
}

function bespoke_vc_customize_register( $wp_customize ) {

	// Hero.
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
			'default'           => bespoke_vc_default( 'hero_image' ),
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
			'default'           => bespoke_vc_default( 'hero_heading' ),
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
			'default'           => bespoke_vc_default( 'hero_tagline' ),
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

	// What We Do.
	$wp_customize->add_section(
		'bespoke_vc_what_we_do',
		array(
			'title'    => __( 'Landing Page: What We Do', 'bespoke-vc' ),
			'priority' => 31,
		)
	);

	$wp_customize->add_setting(
		'what_we_do_image',
		array(
			'default'           => bespoke_vc_default( 'what_we_do_image' ),
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'what_we_do_image',
			array(
				'label'   => __( 'Image', 'bespoke-vc' ),
				'section' => 'bespoke_vc_what_we_do',
			)
		)
	);

	$wp_customize->add_setting(
		'what_we_do_text',
		array(
			'default'           => bespoke_vc_default( 'what_we_do_text' ),
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'what_we_do_text',
		array(
			'label'   => __( 'Text', 'bespoke-vc' ),
			'section' => 'bespoke_vc_what_we_do',
			'type'    => 'textarea',
		)
	);

	// About Me.
	$wp_customize->add_section(
		'bespoke_vc_about',
		array(
			'title'    => __( 'Landing Page: About Me', 'bespoke-vc' ),
			'priority' => 32,
		)
	);

	$wp_customize->add_setting(
		'about_photo',
		array(
			'default'           => bespoke_vc_default( 'about_photo' ),
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'about_photo',
			array(
				'label'   => __( 'Photo', 'bespoke-vc' ),
				'section' => 'bespoke_vc_about',
			)
		)
	);

	$wp_customize->add_setting(
		'about_bio',
		array(
			'default'           => bespoke_vc_default( 'about_bio' ),
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'about_bio',
		array(
			'label'   => __( 'Bio', 'bespoke-vc' ),
			'section' => 'bespoke_vc_about',
			'type'    => 'textarea',
		)
	);

	// Contact Me.
	$wp_customize->add_section(
		'bespoke_vc_contact',
		array(
			'title'    => __( 'Landing Page: Contact Me', 'bespoke-vc' ),
			'priority' => 33,
		)
	);

	$wp_customize->add_setting(
		'contact_name',
		array(
			'default'           => bespoke_vc_default( 'contact_name' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'contact_name',
		array(
			'label'   => __( 'Name', 'bespoke-vc' ),
			'section' => 'bespoke_vc_contact',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'contact_location',
		array(
			'default'           => bespoke_vc_default( 'contact_location' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'contact_location',
		array(
			'label'   => __( 'Location', 'bespoke-vc' ),
			'section' => 'bespoke_vc_contact',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'contact_email',
		array(
			'default'           => bespoke_vc_default( 'contact_email' ),
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
			'default'           => bespoke_vc_default( 'contact_email_visible' ),
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
			'default'           => bespoke_vc_default( 'contact_phone' ),
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
			'default'           => bespoke_vc_default( 'contact_intro' ),
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

	// Footer.
	$wp_customize->add_section(
		'bespoke_vc_footer',
		array(
			'title'    => __( 'Landing Page: Footer', 'bespoke-vc' ),
			'priority' => 34,
		)
	);

	$wp_customize->add_setting(
		'footer_text',
		array(
			'default'           => bespoke_vc_default( 'footer_text' ),
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
