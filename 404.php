<?php
/**
 * The template for displaying 404 error pages.
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */

get_header(); ?>
	
	<div id="primary" class="site-content cf" role="main">

		<section class="error-404 not-found no-results">

				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'hawea' ); ?></h1>
				</header><!--end .entry-header -->

				<div class="entry-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'hawea' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- end .entry-content -->
		</section><!-- .error-404 -->

	</div><!-- end #primary -->
	<?php get_sidebar(); ?>
<?php get_footer(); ?>