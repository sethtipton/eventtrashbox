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
		<div class="site-footer__inner">
			<div class="site-footer__brand">
				<p class="site-footer__title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
				<p class="site-info">
					<?php
					echo esc_html( get_bloginfo( 'name' ) ) . ' &copy; ' . esc_html( gmdate( 'Y' ) );
					?>
				</p>
			</div>

			<?php if ( has_nav_menu( EVENTTRASHBOX_MENU_FOOTER ) ) : ?>
				<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer menu', 'eventtrashbox' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => EVENTTRASHBOX_MENU_FOOTER,
							'menu_id'        => EVENTTRASHBOX_MENU_FOOTER,
							'depth'          => 2,
						)
					);
					?>
				</nav>
			<?php endif; ?>

			<?php eventtrashbox_button( home_url( '/quote/' ), __( 'Get a Quote', 'eventtrashbox' ), 'site-footer__cta' ); ?>
		</div><!-- .site-footer__inner -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
