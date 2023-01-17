<?php
/**
 * Template Name: Front Page
 *
 * Description: A page template for the Custom Front Page
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */

get_header(); ?>

	<?php if ( '' != get_theme_mod( 'hawea_slideone_img' ) ) : ?>
		<?php get_template_part( 'template-parts/front-slider' ); ?>
	<?php endif; ?>

	<div id="shop-start">
		<?php hawea_sections(); ?>
	</div><!-- end #shop-start -->

	<?php get_sidebar( 'front' ); ?>

</div><!-- end #primary -->

<?php get_footer(); ?>
