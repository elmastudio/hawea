<?php
/**
 * The Template for displaying single posts.
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
		?>

	<?php the_post_navigation( array (
				'next_text' => '<span class="meta-nav">' . __( 'Next', 'hawea' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next Post', 'hawea' ) . '</span> ',
				'prev_text' => '<span class="meta-nav">' . __( 'Previous', 'hawea' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous Post', 'hawea' ) . '</span> ',
			) ); ?>

	</div><!-- end #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
