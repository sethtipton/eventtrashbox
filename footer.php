<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EventTrashBox
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php
			echo esc_html( get_bloginfo( 'name' ) ) . ' &copy; ' . esc_html( gmdate( 'Y' ) );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
