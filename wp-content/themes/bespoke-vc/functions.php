<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BESPOKE_VC_VERSION', '1.0.1' );

function bespoke_vc_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'bespoke_vc_setup' );

function bespoke_vc_scripts() {
	wp_enqueue_style( 'bespoke-vc-style', get_stylesheet_uri(), array(), BESPOKE_VC_VERSION );
}
add_action( 'wp_enqueue_scripts', 'bespoke_vc_scripts' );

require get_template_directory() . '/inc/defaults.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/contact-form.php';
