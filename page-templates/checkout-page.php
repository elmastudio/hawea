<?php
/**
 * Template Name: Checkout Page
 *
 * Description: A page template for the WooCommerce Checkout Page
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="site-content" role="main">

	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

		endwhile;
	?>

</div><!-- end #primary -->

<?php get_footer(); ?>
