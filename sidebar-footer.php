<?php
/**
 * The Footer widget areas.
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */
?>

<?php
	/* Check if any of the footer widget areas have widgets.
	 *
	 * If none of the footer widget areas have widgets, let's bail early.
	 */
	if (   ! is_active_sidebar( 'footer-1' )
		&& ! is_active_sidebar( 'footer-2' )
		&& ! is_active_sidebar( 'footer-3' )
		&& ! is_active_sidebar( 'footer-4' )
		&& ! is_active_sidebar( 'footer-5' )
		)
		return;
	// If we get this far, we have widgets. Let do this.
?>

<div id="footerwidgets" class="cf">
	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<div id="footer-one" class="one-column sidebar-footer widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div><!-- end #footer-one -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
		<div id="footer-two" class="two-columns sidebar-footer widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div><!-- end #footer-two -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
		<div id="footer-three" class="two-columns sidebar-footer widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div><!-- end #footer-three -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
		<div id="footer-four" class="five-columns sidebar-footer widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-4' ); ?>
		</div><!-- end #footer-four -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-5' ) ) : ?>
		<div id="footer-five" class="five-columns sidebar-footer widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-5' ); ?>
		</div><!-- end #footer-five -->
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'footer-6' ) ) : ?>
		<div id="footer-six" class="five-columns sidebar-footer widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-6' ); ?>
		</div><!-- end #footer-six -->
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'footer-7' ) ) : ?>
		<div id="footer-seven" class="five-columns sidebar-footer widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-7' ); ?>
		</div><!-- end #footer-seven -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-8' ) ) : ?>
		<div id="footer-eight" class="five-columns sidebar-footer widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-8' ); ?>
		</div><!-- end #footer-eight -->
	<?php endif; ?>

</div><!-- end #footerwidgets -->
