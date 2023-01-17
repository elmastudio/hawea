<?php
/**
 * The Sidebar containing the widget area on the bottom of the Front page
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'front' ) ) {
	return;
}
?>

<?php if ( is_active_sidebar( 'front' )  ) : ?>
	<aside id="sidebar-front" class="sidebar-front sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'front' ); ?>
	</aside><!-- #sidebar-front -->
<?php endif; ?>
