<?php
/**
 * The main template file.
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">
		
		<div id="post-container" class="post-container cf">
			<!-- .grid-sizer empty element, only used for element sizing -->
			<div class="grid-sizer"></div>

			<?php
		// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'content' );

			endwhile;
		?>
		</div><!-- end .post-container -->

		<?php the_posts_pagination( array(
			'next_text' => '<span class="meta-nav">' . __( 'Older', 'hawea' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Older Posts', 'hawea' ) . '</span> ',
			'prev_text' => '<span class="meta-nav">' . __( 'Newer', 'hawea' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Newer Posts', 'hawea' ) . '</span> ',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'hawea' ) . ' </span>',
		) ); ?>

		</div><!-- end #primary -->
	<?php get_sidebar(); ?>
<?php get_footer(); ?>