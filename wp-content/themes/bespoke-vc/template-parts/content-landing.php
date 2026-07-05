<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = bespoke_vc_get( 'hero_image' );
$status     = isset( $_GET['bvc_status'] ) ? sanitize_key( wp_unslash( $_GET['bvc_status'] ) ) : '';

$hero_fit_map      = array(
	'cover'   => 'cover',
	'contain' => 'contain',
	'stretch' => '100% 100%',
);
$hero_position_map = array(
	'center' => 'center',
	'top'    => 'top',
	'bottom' => 'bottom',
	'left'   => 'left',
	'right'  => 'right',
);
$hero_fit         = bespoke_vc_get( 'hero_image_fit' );
$hero_position    = bespoke_vc_get( 'hero_image_position' );
$hero_bg_size     = isset( $hero_fit_map[ $hero_fit ] ) ? $hero_fit_map[ $hero_fit ] : 'cover';
$hero_bg_position = isset( $hero_position_map[ $hero_position ] ) ? $hero_position_map[ $hero_position ] : 'center';
?>
<main id="main">

	<section class="bvc-hero" <?php if ( $hero_image ) : ?>style="background-image:url('<?php echo esc_url( $hero_image ); ?>'); background-size: <?php echo esc_attr( $hero_bg_size ); ?>; background-position: <?php echo esc_attr( $hero_bg_position ); ?>;"<?php endif; ?>>
		<div class="bvc-hero-overlay">
			<h1 class="bvc-hero-heading"><?php echo esc_html( bespoke_vc_get( 'hero_heading' ) ); ?></h1>
			<p class="bvc-hero-tagline"><?php echo esc_html( bespoke_vc_get( 'hero_tagline' ) ); ?></p>
		</div>
	</section>

	<section id="what-we-do" class="bvc-light-section">
		<div class="bvc-two-col">
			<div class="bvc-col-text">
				<h2 class="bvc-heading-block">What We Do</h2>
				<p class="bvc-serif-body"><?php echo esc_html( bespoke_vc_get( 'what_we_do_text' ) ); ?></p>
			</div>
			<?php $what_we_do_image = bespoke_vc_get( 'what_we_do_image' ); ?>
			<?php if ( $what_we_do_image ) : ?>
				<div class="bvc-col-image">
					<img src="<?php echo esc_url( $what_we_do_image ); ?>" alt="">
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section id="services" class="bvc-light-section">
		<h2 class="bvc-heading-block bvc-centered">Services</h2>
		<div class="bvc-services-grid">
			<?php foreach ( bespoke_vc_services_list() as $index => $service ) : ?>
				<div class="bvc-service-item">
					<span class="bvc-service-number"><?php echo esc_html( $index + 1 ); ?></span>
					<p class="bvc-serif-body"><?php echo esc_html( $service ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section id="about" class="bvc-light-section">
		<div class="bvc-two-col bvc-two-col-reverse">
			<?php
			$about_photo = bespoke_vc_get( 'about_photo' );
			$contact_name = bespoke_vc_get( 'contact_name' );
			?>
			<?php if ( $about_photo ) : ?>
				<div class="bvc-col-image bvc-about-photo">
					<img src="<?php echo esc_url( $about_photo ); ?>" alt="<?php echo esc_attr( $contact_name ); ?>">
				</div>
			<?php endif; ?>
			<div class="bvc-col-text">
				<h2 class="bvc-heading-block">About Me</h2>
				<p class="bvc-serif-body"><?php echo esc_html( bespoke_vc_get( 'about_bio' ) ); ?></p>
			</div>
		</div>
	</section>

	<section id="contact" class="bvc-light-section">
		<h2 class="bvc-heading-block">Contact Me</h2>

		<?php if ( 'success' === $status ) : ?>
			<p class="bvc-form-notice bvc-form-success">Thanks &mdash; your message has been sent. We'll be in touch soon.</p>
		<?php elseif ( 'error' === $status ) : ?>
			<p class="bvc-form-notice bvc-form-error">Something went wrong sending your message. Please try again or email us directly.</p>
		<?php endif; ?>

		<?php $intro = bespoke_vc_get( 'contact_intro' ); ?>
		<?php if ( $intro ) : ?>
			<p class="bvc-serif-body"><?php echo esc_html( $intro ); ?></p>
		<?php endif; ?>

		<div class="bvc-contact-columns">
			<div class="bvc-contact-col">
				<?php if ( $contact_name ) : ?>
					<p class="bvc-serif-body"><?php echo esc_html( $contact_name ); ?></p>
				<?php endif; ?>
				<?php $location = bespoke_vc_get( 'contact_location' ); ?>
				<?php if ( $location ) : ?>
					<p class="bvc-serif-body"><?php echo esc_html( $location ); ?></p>
				<?php endif; ?>
			</div>
			<div class="bvc-contact-col">
				<?php $phone = bespoke_vc_get( 'contact_phone' ); ?>
				<?php if ( $phone ) : ?>
					<p class="bvc-serif-body"><a class="bvc-underline-link" href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
				<?php endif; ?>
				<?php $email = bespoke_vc_get( 'contact_email' ); ?>
				<?php if ( $email && bespoke_vc_get( 'contact_email_visible' ) ) : ?>
					<p class="bvc-serif-body"><a href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
				<?php endif; ?>
			</div>
		</div>

		<form class="bvc-contact-form" method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>#contact">
			<?php wp_nonce_field( 'bvc_contact_form', 'bvc_contact_nonce' ); ?>
			<div class="bvc-field-honeypot" aria-hidden="true">
				<label for="bvc_hp_field">Leave this field empty</label>
				<input type="text" id="bvc_hp_field" name="bvc_hp_field" tabindex="-1" autocomplete="off">
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
