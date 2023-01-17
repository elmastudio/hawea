<?php
/**
 * The Sidebar containing the main blog widget area
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<?php if ( is_active_sidebar( 'sidebar' )  ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside><!-- #secondary -->
<?php endif; ?>
