<?php
/**
 * Implement a custom logo for Hawea
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */

function hawea_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'default-text-color'     => 'bbbbbb',
		'width'                  => 500,
		'height'                 => 100,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'hawea_header_style',
	);

	add_theme_support( 'custom-header', $args );

}
add_action( 'after_setup_theme', 'hawea_custom_header_setup', 11 );


/**
 * Style the header text displayed on the blog.
 *
 * @since Hawea 1.0
 *
 * @return void
 */
function hawea_header_style() {
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( empty( $header_image ) && $text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="hawea-header-css">
	<?php
		if ( ! empty( $header_image ) and  display_header_text()) :
	?>
	
	<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
	
	#site-branding h1.site-title, #site-branding p.site-title, #site-branding p.site-description {display: none !important;}

	<?php

		// If the user has set a custom color for the text, use that.
		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		#site-branding h1.site-title a, #site-branding p.site-title a, #site-branding p.site-description {color: #<?php echo esc_attr( $text_color ); ?>;}
	<?php endif; ?>
	</style>
	<?php
}