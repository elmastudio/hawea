<?php
/**
 * Woocommerce compatibility
 *
 * @package Hawea
 * @since Hawea 1.0.1
 * @version 1.0
 */

//Check if Woocommerce is active
function hawea_woocommerce_active() {
	if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}

if ( !hawea_woocommerce_active() )
return;

//Check if Woocommerce is active
	add_theme_support( 'woocommerce', array(
	'thumbnail_image_width' => 650,
	'single_image_width' => 1500,
	) );
	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

	add_filter( 'woocommerce_gallery_thumbnail_size', function( $size ) {
			return 'woocommerce_thumbnail';
	} );

//Add product gallery features
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

/*-----------------------------------------------------------------------------------*/
/* WooCommerce Customizations & Hooks
/*-----------------------------------------------------------------------------------*/

// Define WooCommerce image ratio
function hawea_woocommerce_image_dimensions() {
	global $pagenow;

	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}

	update_option( 'woocommerce_thumbnail_cropping', 'custom' );
	update_option( 'woocommerce_thumbnail_cropping_custom_width', 5 );
	update_option( 'woocommerce_thumbnail_cropping_custom_height', 6 );
}
add_action( 'after_switch_theme', 'hawea_woocommerce_image_dimensions', 1 );

// Remove sidebar on shop pages
add_action('template_redirect', 'remove_sidebar_shop');
function remove_sidebar_shop() {
if (is_product()) {
		remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
	}
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 2; // 3 products per row
	}
}

// Change number or related products per row to 3
function woo_related_products_limit() {
	global $product;

	$args['posts_per_page'] = 3;
	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
	function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; // arranged in 3 columns
	return $args;
}

// Add 4 images to the Featured Image gallery
add_filter ( 'woocommerce_product_thumbnails_columns', 'xx_thumb_cols' );
	function xx_thumb_cols() {
	return 4; // .last class applied to every 4th thumbnail
}

// Remove the product rating display on product loops
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
