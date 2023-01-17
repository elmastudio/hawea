<?php
/**
 * The template for displaying the footer.
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0.1
 */
?>

</div><!-- end #content-wrap -->

	<footer id="colophon" class="site-footer cf">

			<?php get_sidebar( 'footer' ); ?>

			<div id="site-info">
				<ul class="credit" role="contentinfo">
					<?php if ( get_theme_mod( 'credit_text' ) ) : ?>
						<li><?php echo wp_kses_post( get_theme_mod( 'credit_text' ) ); ?></li>
					<?php else : ?>
					<li class="copyright">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo(); ?>.</a><?php
					/* Include Privacy Policy link. */
					if ( function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link( '<span>', '</span>', 'hawea');
					}
					?></li>

					<li class="wp-credit"><?php esc_html_e('Powered by', 'hawea') ?> <a href="<?php echo esc_url( esc_html__( 'https://wordpress.org/', 'hawea' ) ); ?>" ><?php esc_html_e( 'WordPress', 'hawea' ); ?></a></li>
					<li><?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'hawea' ), 'Hawea', '<a href="https://www.elmastudio.de/en/" rel="designer">Elmastudio</a>' ); ?></li>
					<?php endif; ?>
				</ul><!-- end .credit -->
				<a href="#site-container" class="top smooth"><span><?php esc_html_e('Top', 'hawea') ?></span></a>
			</div><!-- end #site-info -->
	</footer><!-- end #colophon -->
</div><!-- end #site-container -->

<?php wp_footer(); ?>

</body>
</html>
