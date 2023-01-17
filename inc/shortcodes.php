<?php
/**
 * Available Hawea Shortcodes
 *
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Hawea Shortcodes
/*-----------------------------------------------------------------------------------*/
// Enable shortcodes in widget areas
add_filter( 'widget_text', 'do_shortcode' );

// Replace WP autop formatting
if (!function_exists( "hawea_remove_wpautop")) {
	function hawea_remove_wpautop($content) {
		$content = do_shortcode( shortcode_unautop( $content ) );
		$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
		return $content;
	}
}

/*-----------------------------------------------------------------------------------*/
/* Multi Columns Shortcodes
/* Don't forget to add "_last" behind the shortcode if it is the last column.
/*-----------------------------------------------------------------------------------*/

// Two Columns
function hawea_shortcode_two_columns_one( $atts, $content = null ) {
   return '<div class="columns two-columns-one">' . hawea_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one', 'hawea_shortcode_two_columns_one' );

function hawea_shortcode_two_columns_one_last( $atts, $content = null ) {
   return '<div class="columns two-columns-one last">' . hawea_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one_last', 'hawea_shortcode_two_columns_one_last' );

// Three Columns
function hawea_shortcode_three_columns_one($atts, $content = null) {
   return '<div class="columns three-columns-one">' . hawea_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one', 'hawea_shortcode_three_columns_one' );

function hawea_shortcode_three_columns_one_last($atts, $content = null) {
   return '<div class="columns three-columns-one last">' . hawea_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one_last', 'hawea_shortcode_three_columns_one_last' );

function hawea_shortcode_three_columns_two($atts, $content = null) {
   return '<div class="columns three-columns-two">' . hawea_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two', 'hawea_shortcode_three_columns_two' );

function hawea_shortcode_three_columns_two_last($atts, $content = null) {
   return '<div class="columns three-columns-two last">' . hawea_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two_last', 'hawea_shortcode_three_columns_two_last' );

// Four Columns
function hawea_shortcode_four_columns_one($atts, $content = null) {
   return '<div class="columns four-columns-one">' . hawea_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one', 'hawea_shortcode_four_columns_one' );

function hawea_shortcode_four_columns_one_last($atts, $content = null) {
   return '<div class="columns four-columns-one last">' . hawea_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one_last', 'hawea_shortcode_four_columns_one_last' );

function hawea_shortcode_four_columns_two($atts, $content = null) {
   return '<div class="columns four-columns-two">' . hawea_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two', 'hawea_shortcode_four_columns_two' );

function hawea_shortcode_four_columns_two_last($atts, $content = null) {
   return '<div class="columns four-columns-two last">' . hawea_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two_last', 'hawea_shortcode_four_columns_two_last' );

function hawea_shortcode_four_columns_three($atts, $content = null) {
   return '<div class="columns four-columns-three">' . hawea_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three', 'hawea_shortcode_four_columns_three' );

function hawea_shortcode_four_columns_three_last($atts, $content = null) {
   return '<div class="columns four-columns-three last">' . hawea_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three_last', 'hawea_shortcode_four_columns_three_last' );


// Divide Text Shortcode
function hawea_shortcode_divider($atts, $content = null) {
   return '<div class="divider"></div>';
}
add_shortcode( 'divider', 'hawea_shortcode_divider' );


/*-----------------------------------------------------------------------------------*/
/* Info Boxes Shortcodes
/*-----------------------------------------------------------------------------------*/

function hawea_shortcode_white_box($atts, $content = null) {
   return '<div class="box white-box">' . do_shortcode( hawea_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'white_box', 'hawea_shortcode_white_box' );

function hawea_shortcode_yellow_box($atts, $content = null) {
   return '<div class="box yellow-box">' . do_shortcode( hawea_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'yellow_box', 'hawea_shortcode_yellow_box' );

function hawea_shortcode_red_box($atts, $content = null) {
   return '<div class="box red-box">' . do_shortcode( hawea_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'red_box', 'hawea_shortcode_red_box' );

function hawea_shortcode_blue_box($atts, $content = null) {
   return '<div class="box blue-box">' . do_shortcode( hawea_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'blue_box', 'hawea_shortcode_blue_box' );

function hawea_shortcode_green_box($atts, $content = null) {
   return '<div class="box green-box">' . do_shortcode( hawea_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'green_box', 'hawea_shortcode_green_box' );

function hawea_shortcode_lightgrey_box($atts, $content = null) {
   return '<div class="box lightgrey-box">' . do_shortcode( hawea_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'lightgrey_box', 'hawea_shortcode_lightgrey_box' );

function hawea_shortcode_grey_box($atts, $content = null) {
   return '<div class="box grey-box">' . do_shortcode( hawea_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'grey_box', 'hawea_shortcode_grey_box' );

function hawea_shortcode_dark_box($atts, $content = null) {
   return '<div class="box dark-box">' . do_shortcode( hawea_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'dark_box', 'hawea_shortcode_dark_box' );


/*-----------------------------------------------------------------------------------*/
/* Buttons Shortcodes
/*-----------------------------------------------------------------------------------*/
function hawea_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '#',
    'target' => '',
    'color'	=> '',
    'size'	=> '',
	 'form'	=> '',
	 'font'	=> '',
    ), $atts));

	$color = ($color) ? ' '.$color. '-btn' : '';
	$size = ($size) ? ' '.$size. '-btn' : '';
	$form = ($form) ? ' '.$form. '-btn' : '';
	$font = ($font) ? ' '.$font. '-btn' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="standard-btn' .$color.$size.$form.$font. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

    return $out;
}
add_shortcode('button', 'hawea_button');

