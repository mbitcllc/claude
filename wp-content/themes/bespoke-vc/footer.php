<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<footer class="bvc-footer">
	<p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> &mdash; <?php echo esc_html( get_theme_mod( 'footer_text', 'All Rights Reserved.' ) ); ?></p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
