<?php
/**
 * The template for the Page content on the Front page
 *
 * @subpackage Hawea
 * @since Hawea 1.0
  * @version 1.0
 */
?>

<?php if( '' !== get_post()->post_content ) : ?>
	<?php
	// Start the Loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

		endwhile;
	?>
<?php endif; // check, if front page has content ?>
