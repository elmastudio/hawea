<?php
/**
 * The template for displaying archive pages
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0.1
 */

get_header(); ?>

		<div id="primary" class="site-content cf" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<?php
					the_archive_title( '<h1 class="archive-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- end .archive-header -->

			<div id="post-container" class="post-container cf">
			<!-- .grid-sizer empty element, only used for element sizing -->
			<div class="grid-sizer"></div>

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

		</div><!-- end .post-container -->

		<?php // Previous/next page navigation.
			the_posts_pagination( array(
				'next_text' => '<span class="meta-nav">' . __( 'Older', 'hawea' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Older Posts', 'hawea' ) . '</span> ',
				'prev_text' => '<span class="meta-nav">' . __( 'Newer', 'hawea' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Newer Posts', 'hawea' ) . '</span> ',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'hawea' ) . ' </span>',
		) ); ?>

	</div><!-- end #primary -->
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
