<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<main id="main" class="bvc-404">
	<h1 class="bvc-section-heading">Page Not Found</h1>
	<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Return to the homepage</a></p>
</main>
<?php
get_footer();
