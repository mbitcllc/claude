<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = get_theme_mod( 'hero_image', '' );
$status     = isset( $_GET['bvc_status'] ) ? sanitize_key( wp_unslash( $_GET['bvc_status'] ) ) : '';
?>
<main id="main" class="bvc-main">

	<section class="bvc-hero" <?php if ( $hero_image ) : ?>style="background-image:url('<?php echo esc_url( $hero_image ); ?>');"<?php endif; ?>>
		<div class="bvc-hero-overlay">
			<h1 class="bvc-hero-heading"><?php echo esc_html( get_theme_mod( 'hero_heading', get_bloginfo( 'name' ) ) ); ?></h1>
			<p class="bvc-hero-tagline"><?php echo esc_html( get_theme_mod( 'hero_tagline', '' ) ); ?></p>
		</div>
	</section>

	<section id="contact" class="bvc-contact">
		<h2 class="bvc-section-heading">Contact Us</h2>

		<?php if ( 'success' === $status ) : ?>
			<p class="bvc-form-notice bvc-form-success">Thanks &mdash; your message has been sent. We'll be in touch soon.</p>
		<?php elseif ( 'error' === $status ) : ?>
			<p class="bvc-form-notice bvc-form-error">Something went wrong sending your message. Please try again or email us directly.</p>
		<?php endif; ?>

		<?php $intro = get_theme_mod( 'contact_intro', '' ); ?>
		<?php if ( $intro ) : ?>
			<p class="bvc-contact-intro"><?php echo esc_html( $intro ); ?></p>
		<?php endif; ?>

		<div class="bvc-contact-details">
			<?php $email = get_theme_mod( 'contact_email', get_option( 'admin_email' ) ); ?>
			<?php if ( $email ) : ?>
				<p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
			<?php endif; ?>
			<?php $phone = get_theme_mod( 'contact_phone', '' ); ?>
			<?php if ( $phone ) : ?>
				<p><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
			<?php endif; ?>
		</div>

		<form class="bvc-contact-form" method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>#contact">
			<?php wp_nonce_field( 'bvc_contact_form', 'bvc_contact_nonce' ); ?>
			<div class="bvc-field-honeypot">
				<label for="bvc_website">Website</label>
				<input type="text" id="bvc_website" name="bvc_website" tabindex="-1" autocomplete="off">
			</div>
			<div class="bvc-field">
				<label for="bvc_name">Name</label>
				<input type="text" id="bvc_name" name="bvc_name" required>
			</div>
			<div class="bvc-field">
				<label for="bvc_email">Email</label>
				<input type="email" id="bvc_email" name="bvc_email" required>
			</div>
			<div class="bvc-field">
				<label for="bvc_message">Message</label>
				<textarea id="bvc_message" name="bvc_message" rows="5" required></textarea>
			</div>
			<button type="submit" name="bvc_contact_submit" value="1" class="bvc-submit">Send Message</button>
		</form>
	</section>

</main>
