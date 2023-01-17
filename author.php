<?php
/**
 * The template for displaying author archive pages
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">
			
	<?php if ( have_posts() ) : ?>

		<?php
		// Author bio.
		if ( get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
		?>
	
		<header class="archive-header">
			<h3 class="author-archive-title"><?php esc_html_e('All posts by ', 'hawea') ?><span><?php echo get_the_author(); ?></span></h3>
		</header><!-- end .archive-header -->
	
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
	
			get_template_part( 'content', get_post_format() );
	
		// End the loop.
		endwhile;
	
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );
	
		endif;
		?>

		<?php
		// Previous/next post navigation.
		hawea_content_nav( 'nav-below' ); ?>

	</div><!-- end #primary -->

	<?php get_sidebar(); ?>
<?php get_footer(); ?>