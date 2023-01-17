<?php
/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */

function hawea_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'hawea' );
	
	$wp_customize->get_section('header_image')->title = esc_html__( 'Logo' );


	$wp_customize->add_section( 'hawea_themeoptions', array(
		'title'         => esc_html__( 'Theme Options', 'hawea' ),
		'priority'      => 135,
	) );


	// Add custom Hawea panels
    $wp_customize->add_panel( 'hawea_themeoptions', array(
        'priority'       => 1,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => esc_html__('Theme Options', 'hawea'),
    ) );

    $wp_customize->add_panel( 'hawea_headerslider', array(
		'priority'       	=> 2,
		'theme_supports' 	=> '',
		'title'          	=> esc_html__('Front Page Slider', 'hawea'),
		'description'    	=> esc_html__('include an image slider at the top of the Front page', 'hawea'),
	) );


	// Hawea Theme Options Sections
	$wp_customize->add_section( 'hawea_general', array(
		'title'        		=> esc_html__( 'General', 'hawea' ),
		'priority'      	=> 1,
		'panel'  			=> 'hawea_themeoptions',
	) );
	
	
	$wp_customize->add_section( 'hawea_frontpage', array(
		'title'        		=> esc_html__( 'Front Page Settings', 'hawea' ),
		'priority'      	=> 2,
		'panel'  			=> 'hawea_themeoptions',
	) );


	// Hawea Header Slider Sections
	$wp_customize->add_section( 'hawea_headerslider_slideone', array(
		'title'				=> esc_html__( '1. Slide', 'hawea' ),
		'priority'			=> 1,
		'panel'  			=> 'hawea_headerslider',
	) );

	$wp_customize->add_section( 'hawea_headerslider_slidetwo', array(
		'title'				=> esc_html__( '2. Slide', 'hawea' ),
		'priority'			=> 2,
		'panel'  			=> 'hawea_headerslider',
	) );

	$wp_customize->add_section( 'hawea_headerslider_slidethree', array(
		'title'				=> esc_html__( '3. Slide', 'hawea' ),
		'priority'			=> 3,
		'panel'  			=> 'hawea_headerslider',
	) );

	$wp_customize->add_section( 'hawea_headerslider_slidefour', array(
		'title'				=> esc_html__( '4. Slide', 'hawea' ),
		'priority'			=> 4,
		'panel'  			=> 'hawea_headerslider',
	) );

	$wp_customize->add_section( 'hawea_headerslider_slidefive', array(
		'title'				=> esc_html__( '5. Slide', 'hawea' ),
		'priority'			=> 5,
		'panel'  			=> 'hawea_headerslider',
	) );


	// Add the custom settings and controls.
	$wp_customize->add_setting( 'header_background_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );


	// Custom Colors.
	// Link Color.
	$wp_customize->add_setting( 'link_color' , array(
    	'default'     		=> '#000000',
    	'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'		=> esc_html__( 'Link Color', 'hawea' ),
		'section'	=> 'colors',
		'settings'	=> 'link_color',
	) ) );

	// Footer Background Color.
	$wp_customize->add_setting( 'footer_bg_color' , array(
    	'default'     		=> '#cccccc',
    	'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
		'label'		=> esc_html__( 'Footer Background Color', 'hawea' ),
		'section'	=> 'colors',
		'settings'	=> 'footer_bg_color',
	) ) );

	// Front Page Content Background Color.
	$wp_customize->add_setting( 'frontcontent_bg_color' , array(
    	'default'     		=> '#cccccc',
    	'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'frontcontent_bg_color', array(
		'label'		=> esc_html__( 'Front Page Content Background Color', 'hawea' ),
		'section'	=> 'colors',
		'settings'	=> 'frontcontent_bg_color',
	) ) );

	// On Sale circle Background Color.
	$wp_customize->add_setting( 'onsale_bg_color' , array(
    	'default'     		=> '#000000',
    	'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'onsale_bg_color', array(
		'label'		=> esc_html__( '"On Sale" circle background color', 'hawea' ),
		'section'	=> 'colors',
		'settings'	=> 'onsale_bg_color',
	) ) );

	// On Sale circle Font Color.
	$wp_customize->add_setting( 'onsale_font_color' , array(
    	'default'     		=> '#ffffff',
    	'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'onsale_font_color', array(
		'label'		=> esc_html__( '"On Sale" circle font color', 'hawea' ),
		'section'	=> 'colors',
		'settings'	=> 'onsale_font_color',
	) ) );


	// Theme Options:// Theme Options - General
	
	// Theme Options - General
	$wp_customize->add_setting( 'credit_text', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'credit_text', array(
		'label'         => esc_html__( 'Footer credit text', 'hawea' ),
		'description'	=> esc_html__( 'Customize the footer credit text. (HTML is allowed)', 'hawea' ),
		'section'       => 'hawea_general',
		'type'          => 'text',
		'priority'		=> 11,
	) );


	// Theme Options - Front Page Settings

	// Show product categories
    $wp_customize->add_setting('hawea_cats_activate', array(
            'default'           => 1,
            'sanitize_callback' => 'hawea_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'hawea_cats_activate', array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Show Product categories?', 'hawea'),
            'section'   => 'hawea_frontpage',
            'priority'  => 1,
    ) );
    
    // Show front page content
    $wp_customize->add_setting('hawea_frontpagecontent_active', array(
            'default'           => 1,
            'sanitize_callback' => 'hawea_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'hawea_frontpagecontent_active', array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Show default Front page content', 'hawea'),
            'section'   => 'hawea_frontpage',
            'priority'  => 2,
    ) );

    // Show latest products
    $wp_customize->add_setting('hawea_products_activate', array(
            'default'           => 1,
            'sanitize_callback' => 'hawea_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'hawea_products_activate', array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Show latest Products?', 'hawea'),
            'section'   => 'hawea_frontpage',
            'priority'  => 3,
    ) );

    // Show featured products
    $wp_customize->add_setting('hawea_featuredproducts_active', array(
            'default'           => 1,
            'sanitize_callback' => 'hawea_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'hawea_featuredproducts_active', array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Show Featured Products?', 'hawea'),
            'section'   => 'hawea_frontpage',
            'priority'  => 4,
    ) );

   // Show top rated products
    $wp_customize->add_setting('hawea_topratedproducts_active', array(
            'default'           => 1,
            'sanitize_callback' => 'hawea_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'hawea_topratedproducts_active', array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Show Top Rated Products?', 'hawea'),
            'section'   => 'hawea_frontpage',
            'priority'  => 5,
    ) );

    // Show on sale products
    $wp_customize->add_setting('hawea_saleproducts_active', array(
            'default'           => 1,
            'sanitize_callback' => 'hawea_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'hawea_saleproducts_active', array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Show On Sale Products?', 'hawea'),
            'section'   => 'hawea_frontpage',
            'priority'  => 6,
    ) );

    // Number of product catgories
    $wp_customize->add_setting( 'hawea_cats_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '5'
	) );

    $wp_customize->add_control( 'hawea_cats_number', array(
        'type'        => 'number',
        'label'       => esc_html__('Number of Product categories', 'hawea'),
        'section'     => 'hawea_frontpage',
		'priority'  => 7,
    ) );
    
    // Number of latest products
    $wp_customize->add_setting( 'hawea_products_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '3'
	) );

    $wp_customize->add_control( 'hawea_products_number', array(
        'type'        => 'number',
        'label'       => esc_html__('Number of Latest Products', 'hawea'),
        'section'     => 'hawea_frontpage',
		'priority'  => 8,
    ) );
    
    // Number of featured products
    $wp_customize->add_setting( 'hawea_featuredproducts_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '3'
	) );

    $wp_customize->add_control( 'hawea_featuredproducts_number', array(
        'type'        => 'number',
        'label'       => esc_html__('Number of Featured Products', 'hawea'),
        'section'     => 'hawea_frontpage',
		'priority'  => 9,
    ) );
    
    // Number of Top Rated products
    $wp_customize->add_setting( 'hawea_topratedproducts_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '3'
	) );

    $wp_customize->add_control( 'hawea_topratedproducts_number', array(
        'type'        => 'number',
        'label'       => esc_html__('Number of Top Rated Products', 'hawea'),
        'section'     => 'hawea_frontpage',
		'priority'  => 10,
    ) );
    
    // Number of On Sale products
    $wp_customize->add_setting( 'hawea_saleproducts_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '3'
	) );

    $wp_customize->add_control( 'hawea_saleproducts_number', array(
        'type'        => 'number',
        'label'       => esc_html__('Number of On Sale Products', 'hawea'),
        'section'     => 'hawea_frontpage',
		'priority'  => 11,
    ) );


    // Title of product categories
    $wp_customize->add_setting('hawea_cats_title', array(
            'default'           => esc_html__('Product categories', 'hawea'),
            'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'hawea_cats_title', array(
            'type'      => 'text',
            'label'     => esc_html__('Product Categories Title', 'hawea'),
            'section'   => 'hawea_frontpage',
            'priority'  => 12,
    ) );
 
	// Title of Latest Products
    $wp_customize->add_setting('hawea_products_title', array(
            'default'           => esc_html__('Latest products', 'hawea'),
            'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'hawea_products_title', array(
            'type'      => 'text',
            'label'     => esc_html__('Latest Products Title', 'hawea'),
            'section'   => 'hawea_frontpage',
            'priority'  => 13,
    ) );
    
    // Title of Featured Products
    $wp_customize->add_setting('hawea_featuredproducts_title', array(
            'default'           => esc_html__('Featured products', 'hawea'),
            'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'hawea_featuredproducts_title', array(
            'type'      => 'text',
            'label'     => esc_html__('Featured Products Title', 'hawea'),
            'section'   => 'hawea_frontpage',
            'priority'  => 14,
    ) );
    
    // Title of Top Rated Products
    $wp_customize->add_setting('hawea_topratedproducts_title', array(
            'default'           => esc_html__('Top rated products', 'hawea'),
            'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'hawea_topratedproducts_title', array(
            'type'      => 'text',
            'label'     => esc_html__('Top Rated Products Title', 'hawea'),
            'section'   => 'hawea_frontpage',
            'priority'  => 15,
    ) );
    
    // Title of On Sale Products
    $wp_customize->add_setting('hawea_saleproducts_title', array(
            'default'           => esc_html__('On Sale', 'hawea'),
            'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'hawea_saleproducts_title', array(
            'type'      => 'text',
            'label'     => esc_html__('On Sale Products Title', 'hawea'),
            'section'   => 'hawea_frontpage',
            'priority'  => 16,
    ) );





    // Front Page Slider - Slide 1
	$wp_customize->add_setting( 'hawea_slideone_img', array(
		'default'       	=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'hawea_slideone_img', array(
        'label'      		=> esc_html__( 'Upload image', 'hawea' ),
        'section'    		=> 'hawea_headerslider_slideone',
        'priority'			=> 1,
	) ) );

	$wp_customize->add_setting( 'hawea_slideone_link', array(
		'default'       	=> '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'hawea_slideone_link', array(
		'label'         	=> esc_html__( 'Image Link URL', 'hawea' ),
		'section'       	=> 'hawea_headerslider_slideone',
		'type'          	=> 'text',
		'priority'			=> 2,
	) );
	
	$wp_customize->add_setting( 'hawea_slideone_text', array(
		'default'       	=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'hawea_slideone_text', array(
		'label'         	=> esc_html__( 'Text below image (HTML is allowed)', 'hawea' ),
		'section'       	=> 'hawea_headerslider_slideone',
		'type'          	=> 'textarea',
		'priority'			=> 3,
	) );


	// Front Page Slider - Slide 2
		$wp_customize->add_setting( 'hawea_slidetwo_img', array(
		'default'       	=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'hawea_slidetwo_img', array(
        'label'      		=> esc_html__( 'Upload image', 'hawea' ),
        'section'			=> 'hawea_headerslider_slidetwo',
        'priority'			=> 1,
	) ) );

	$wp_customize->add_setting( 'hawea_slidetwo_link', array(
		'default'       	=> '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'hawea_slidetwo_link', array(
		'label'         	=> esc_html__( 'Image Link URL', 'hawea' ),
		'section'       	=> 'hawea_headerslider_slidetwo',
		'type'          	=> 'text',
		'priority'			=> 2,
	) );
	
	$wp_customize->add_setting( 'hawea_slidetwo_text', array(
		'default'       	=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'hawea_slidetwo_text', array(
		'label'         	=> esc_html__( 'Text below image (HTML is allowed)', 'hawea' ),
		'section'       	=> 'hawea_headerslider_slidetwo',
		'type'          	=> 'textarea',
		'priority'			=> 3,
	) );


	// Front Page Slider - Slide 3
	$wp_customize->add_setting( 'hawea_slidethree_img', array(
		'default'       	=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'hawea_slidethree_img', array(
        'label'      		=> esc_html__( 'Upload image', 'hawea' ),
        'section'    		=> 'hawea_headerslider_slidethree',
        'priority'			=> 1,
	) ) );

	$wp_customize->add_setting( 'hawea_slidethree_link', array(
		'default'       	=> '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'hawea_slidethree_link', array(
		'label'         	=> esc_html__( 'Image Link URL', 'hawea' ),
		'section'       	=> 'hawea_headerslider_slidethree',
		'type'				=> 'text',
		'priority'			=> 2,
	) );

	$wp_customize->add_setting( 'hawea_slidethree_text', array(
		'default'       	=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'hawea_slidethree_text', array(
		'label'         	=> esc_html__( 'Text below image (HTML is allowed)', 'hawea' ),
		'section'       	=> 'hawea_headerslider_slidethree',
		'type'          	=> 'textarea',
		'priority'			=> 3,
	) );


	// Front Page Slider - Slide 4
	$wp_customize->add_setting( 'hawea_slidefour_img', array(
		'default'       	=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'hawea_slidefour_img', array(
        'label'      		=> esc_html__( 'Upload image', 'hawea' ),
        'section'    		=> 'hawea_headerslider_slidefour',
        'priority'			=> 1,
	) ) );

	$wp_customize->add_setting( 'hawea_slidefour_text', array(
		'default'       	=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'hawea_slidefour_text', array(
		'label'         	=> esc_html__( 'Text below image (HTML is allowed)', 'hawea' ),
		'section'       	=> 'hawea_headerslider_slidefour',
		'type'          	=> 'textarea',
		'priority'			=> 2,
	) );
	
	$wp_customize->add_setting( 'hawea_slidefour_link', array(
		'default'       	=> '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'hawea_slidefour_link', array(
		'label'         	=> esc_html__( 'Slide 4: Link URL', 'hawea' ),
		'section'       	=> 'hawea_headerslider_slidefour',
		'type'          	=> 'text',
		'priority'			=> 3,
	) );


	// Front Page Slider - Slide 5
	$wp_customize->add_setting( 'hawea_slidefive_img', array(
		'default'       	=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'hawea_slidefive_img', array(
        'label'				=> esc_html__( 'Upload image', 'hawea' ),
        'section'			=> 'hawea_headerslider_slidefive',
        'priority'			=> 1,
	) ) );

	$wp_customize->add_setting( 'hawea_slidefive_text', array(
		'default'       	=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'hawea_slidefive_text', array(
		'label'         	=> esc_html__( 'Text below image (HTML is allowed)', 'hawea' ),
		'section'       	=> 'hawea_headerslider_slidefive',
		'type'          	=> 'textarea',
		'priority'			=> 2,
	) );

	$wp_customize->add_setting( 'hawea_slidefive_link', array(
		'default'       	=> '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'hawea_slidefive_link', array(
		'label'         	=> esc_html__( 'Slide 5: Link URL', 'hawea' ),
		'section'       	=> 'hawea_headerslider_slidefive',
		'type'          	=> 'text',
		'priority'			=> 3,
	) );

}
add_action( 'customize_register', 'hawea_customize_register' );

/**
 * Sanitize Checkboxes.
 */
function hawea_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}