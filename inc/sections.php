<?php
/**
 * The functions for the Front page sections
 *
 * @subpackage Hawea
 * @since Hawea 1.0
  * @version 1.0
 */


if ( ! function_exists( 'hawea_section_cats' ) ) :
/**
 * 1. WooCommerce product categories loop
 *
 */
function hawea_section_cats() {
	if (!hawea_woocommerce_active() || !get_theme_mod('hawea_cats_activate', 1) )
		return;

	$title	= get_theme_mod('hawea_cats_title', esc_html__('Product categories', 'hawea'));
	$number = get_theme_mod('hawea_cats_number', '5');
	?>

	<section id="front-cats" class="front-section cf">
		<?php if ($title) : ?>
			<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
		<?php endif; ?>
		<div id="masonry-wrap" class="front-content-wrap">
			<?php echo do_shortcode('[product_categories number="' . $number . '" columns="12"]'); ?>
		</div><!-- end .front-content-wrap -->
	</section><!-- end .front-cats -->

	<?php
}
endif;


if ( ! function_exists( 'hawea_frontpagecontent_section' ) ):
/**
 * Front page content area
 *
 */
function hawea_section_frontpagecontent() {
	if (!get_theme_mod('hawea_frontpagecontent_active', 1) )
		return;
 ?>

<section id="front-pagecontent" class="front-section front-products cf">
	<?php get_template_part( 'template-parts/content-front' ); ?>
</section><!-- end .front-content -->

<?php
}
endif; // hawea_frontpagecontent_section


if ( ! function_exists( 'hawea_products_section' ) ) :
/**
 * 2. WooCommerce latest products loop
 *
 */
function hawea_section_products() {
	if (!hawea_woocommerce_active() || !get_theme_mod('hawea_products_activate', 1))
		return;

	$title	= get_theme_mod('hawea_products_title', esc_html__('Latest products', 'hawea'));
	$number = get_theme_mod('hawea_products_number', '3');
	?>

	<section id="front-products" class="front-section front-products cf">
		<?php if ($title) : ?>
		<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
		<?php endif; ?>
		<div class="front-content-wrap">
			<?php echo do_shortcode('[recent_products per_page="' . intval($number) . '" columns="3"]'); ?>
		</div><!-- end .front-content-wrap -->
	</section><!-- end .front-products -->

	<?php
}
endif;


if ( ! function_exists( 'hawea_featuredproducts_section' ) ) :
/**
 * 3. WooCommerce featured products loop
 *
 */
function hawea_section_featured() {
	if (!hawea_woocommerce_active() || !get_theme_mod('hawea_featuredproducts_active', 1))
		return;

	$title	= get_theme_mod('hawea_featuredproducts_title', esc_html__('Featured products', 'hawea'));
	$number = get_theme_mod('hawea_featuredproducts_number', '3');
	?>

	<section id="front-featured" class="front-section front-products cf">
		<?php if ($title) : ?>
			<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
		<?php endif; ?>
		<div class="front-content-wrap">
			<?php echo do_shortcode('[featured_products per_page="' . intval($number) . '" columns="3"]'); ?>
		</div><!-- end .front-content-wrap -->
	</section><!-- end .front-featured -->

	<?php
}
endif;


if ( ! function_exists( 'hawea_topratedproducts_section' ) ) :
/**
 * 4. WooCommerce top rated products loop
 *
 */
function hawea_section_toprated() {
	if (!hawea_woocommerce_active() || !get_theme_mod('hawea_topratedproducts_active', 1))
		return;

	$title	= get_theme_mod('hawea_topratedproducts_title', esc_html__('Top rated products', 'hawea'));
	$number = get_theme_mod('hawea_topratedproducts_number', '3');
	?>

	<section id="front-toprated" class="front-section front-products cf">
		<?php if ($title) : ?>
			<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
		<?php endif; ?>
		<div class="front-content-wrap">
			<?php echo do_shortcode('[top_rated_products per_page="' . intval($number) . '" columns="3"]'); ?>
		</div><!-- end .front-content-wrap -->
	</section><!-- end .front-toprated -->

	<?php
}
endif;


if ( ! function_exists( 'hawea_saleproducts_section' ) ) :
/**
 * 5. WooCommerce on sale products loop
 *
 */
function hawea_section_sale() {
	if (!hawea_woocommerce_active() || !get_theme_mod('hawea_saleproducts_active', 1))
		return;

	$title	= get_theme_mod('hawea_saleproducts_title', esc_html__('On Sale', 'hawea'));
	$number = get_theme_mod('hawea_saleproducts_number', '6');
	?>

	<section id="front-sale" class="front-section front-products cf">
		<?php if ($title) : ?>
			<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
		<?php endif; ?>
		<div class="front-content-wrap">
			<?php echo do_shortcode('[sale_products per_page="' . intval($number) . '" columns="3"]'); ?>
		</div><!-- end .front-content-wrap -->
	</section><!-- end .front-sale -->

	<?php
}
endif;


if ( ! function_exists( 'hawea_sections' ) ) :
/**
 * Sections output
 *
 */
function hawea_sections() {

	$sections = array();
	$sections[] = get_theme_mod('section_1', 'cats');
	$sections[] = get_theme_mod('section_2', 'frontpagecontent');
	$sections[] = get_theme_mod('section_3', 'products');
	$sections[] = get_theme_mod('section_4', 'featured');
	$sections[] = get_theme_mod('section_5', 'toprated');
	$sections[] = get_theme_mod('section_6', 'sale');

	foreach ($sections as $section) {
		$section_name = 'hawea_section_' . $section;
		$section_name();
	}

}
endif;
