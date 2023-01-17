<?php
/**
 * Hawea functions and definitions
 *
 * @package Hawea
 * @since Hawea 1.0
 */

 /*-----------------------------------------------------------------------------------*/
/* Sets up the content width value based on the theme's design.
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
		$content_width = 1220;

function hawea_adjust_content_width() {
		global $content_width;

		if ( is_page_template( 'page-templates/full-width.php' ) )
				$content_width = 1200;
}
add_action( 'template_redirect', 'hawea_adjust_content_width' );


/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/

function hawea_setup() {

	// Make Hawea available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'hawea', get_template_directory() . '/languages' );

	// Remove support form block widget screens.
	remove_theme_support( 'widgets-block-editor' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	remove_theme_support( 'block-templates' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css' ) );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu().
	register_nav_menus( array (
		'primary' => __( 'Primary menu', 'hawea' ),
		'social' => __( 'Social menu', 'hawea' )
	) );

	// Implement the Custom Header feature
	require get_template_directory() . '/inc/custom-header.php';

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'hawea_custom_background_args', array(
		'default-color'	=> 'fff',
		'default-image'	=> '',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'hawea_get_featured_posts',
		'max_posts' => 10,
	) );

	// This theme uses post thumbnails.
	add_theme_support( 'post-thumbnails' );

}
add_action( 'after_setup_theme', 'hawea_setup' );

/*-----------------------------------------------------------------------------------*/
/*  Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/

function hawea_scripts() {
	global $wp_styles;

	// Loads JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

	// Loads main stylesheet.
	wp_enqueue_style( 'hawea-style', get_stylesheet_uri(), array(), '20151215' );
	wp_enqueue_style( 'hawea-animatecss', get_template_directory_uri() . '/css/animate.min.css', array(), '3.5.0' );

	// Loading viewpoint checker script
	wp_enqueue_script( 'hawea-viewportchecker', get_template_directory_uri() . '/js/jquery.viewportchecker.min.js', array( 'jquery' ), '1.8.5' );

	// Loads Custom Hawea JavaScript functionality
	wp_enqueue_script( 'hawea-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150704', true );
	wp_localize_script( 'hawea-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'hawea' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'hawea' ) . '</span>',
	) );

	// Loads Post Masonry
	wp_enqueue_script( 'hawea-imagesLoaded', get_template_directory_uri() . '/js/imagesLoaded.js', array( 'jquery' ), '3.2.0' );
	wp_enqueue_script( 'hawea-postmasonry', get_template_directory_uri() . '/js/postmasonry.js', array( 'jquery', 'masonry' ), '20151215', true );

	// Loads Scripts for Front Page Image Slider
	wp_enqueue_style( 'hawea-slick-style', get_template_directory_uri() . '/js/slick/slick.css' );
	wp_enqueue_script( 'hawea-slick', get_template_directory_uri() . '/js/slick/slick.min.js', array( 'jquery' ), '1.5.9' );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

}
add_action( 'wp_enqueue_scripts', 'hawea_scripts' );


/*-----------------------------------------------------------------------------------*/
/* Load block editor styles.
/*-----------------------------------------------------------------------------------*/
function hawea_block_editor_styles() {
 wp_enqueue_style( 'hawea-block-editor-styles', get_template_directory_uri() . '/block-editor.css');
}
add_action( 'enqueue_block_editor_assets', 'hawea_block_editor_styles' );


/*-----------------------------------------------------------------------------------*/
/* Sets the authordata global when viewing an author archive.
/*-----------------------------------------------------------------------------------*/

function hawea_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'hawea_setup_author' );


/*-----------------------------------------------------------------------------------*/
/* Add custom max excerpt lengths.
/*-----------------------------------------------------------------------------------*/

function hawea_custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'hawea_custom_excerpt_length', 999 );


/*-----------------------------------------------------------------------------------*/
/* Replace "[...]" with custom read more in excerpts.
/*-----------------------------------------------------------------------------------*/

function hawea_excerpt_more( $more ) {
	global $post;
	return '&hellip;';
}
add_filter( 'excerpt_more', 'hawea_excerpt_more' );


/*-----------------------------------------------------------------------------------*/
/* Add Theme Customizer CSS
/*-----------------------------------------------------------------------------------*/

function hawea_customize_css() {
		?>
	<style type="text/css">
	<?php if ('#000000' != get_theme_mod( 'link_color' ) ) { ?>
		a {color: <?php echo get_theme_mod('link_color'); ?>;}
	<?php } ?>
	<?php if ('#cccccc' != get_theme_mod( 'footer_bg_color' ) ) { ?>
		#colophon {background: <?php echo get_theme_mod('footer_bg_color'); ?>;}
	<?php } ?>
	<?php if ('#cccccc' != get_theme_mod( 'frontcontent_bg_color' ) ) { ?>
		#front-pagecontent {background: <?php echo get_theme_mod('frontcontent_bg_color'); ?>;}
	<?php } ?>
	<?php if ('#000000' != get_theme_mod( 'onsale_bg_color' ) ) { ?>
		.onsale {background: <?php echo get_theme_mod('onsale_bg_color'); ?>;}
	<?php } ?>
	<?php if ('#ffffff' != get_theme_mod( 'onsale_font_color' ) ) { ?>
		.onsale {color: <?php echo get_theme_mod('onsale_font_color'); ?>;}
	<?php } ?>
	</style>
		<?php
}
add_action( 'wp_head', 'hawea_customize_css');


/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/*-----------------------------------------------------------------------------------*/

add_filter('use_default_gallery_style', '__return_false');


/**
 * Callback to change just html output on a comment.
 */
function hawea_comments_callback($comment, $args, $depth){
	//checks if were using a div or ol|ul for our output
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 40 ); ?>
			</div>

			<div class="comment-wrap">
				<div class="comment-details">
					<div class="comment-author">

						<?php printf( ( '%s' ), wp_kses_post( sprintf( '%s', get_comment_author_link() ) ) ); ?>
					</div><!-- end .comment-author -->
					<div class="comment-meta">
						<span class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<?php
							/* translators: 1: date */
								printf( esc_html__( '%1$s', 'hawea' ),
								get_comment_date());
							?></a>
						</span>
						<?php edit_comment_link( esc_html__(' Edit', 'hawea'), '<span class="comment-edit">', '</span>'); ?>
					</div><!-- end .comment-meta -->
				</div><!-- end .comment-details -->

				<div class="comment-text">
				<?php comment_text(); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'hawea' ); ?></p>
					<?php endif; ?>
				</div><!-- end .comment-text -->
				<?php if ( comments_open () ) : ?>
					<div class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'hawea' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
				<?php endif; ?>
			</div><!-- end .comment-wrap -->
		</article><!-- end .comment -->
	<?php
}

/*-----------------------------------------------------------------------------------*/
/* Register widgetized areas
/*-----------------------------------------------------------------------------------*/

function hawea_widgets_init() {

	register_sidebar( array (
		'name' => esc_html__( 'Sidebar', 'hawea' ),
		'id' => 'sidebar',
		'description' => esc_html__( 'Widgets appear in the themes main sidebar.', 'hawea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Front Page - Instagram', 'hawea' ),
		'id' => 'front',
		'description' => esc_html__( 'Widget Area for the WP Instagram Widget.', 'hawea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer (big 1-column)', 'hawea' ),
		'id' => 'footer-1',
		'description' => esc_html__( 'Widgets will appear in the 1. widget area of the 5-column footer.', 'hawea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer (2-column left)', 'hawea' ),
		'id' => 'footer-2',
		'description' => esc_html__( 'Widgets will appear in the 2. widget area of the 5-column footer.', 'hawea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer (2-column right)', 'hawea' ),
		'id' => 'footer-3',
		'description' => esc_html__( 'Widgets will appear in the 3. widget area of the 5-column footer.', 'hawea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer (5-column 1)', 'hawea' ),
		'id' => 'footer-4',
		'description' => esc_html__( 'Widgets will appear in the 4. widget area of the 5-column footer.', 'hawea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer (5-column 2)', 'hawea' ),
		'id' => 'footer-5',
		'description' => esc_html__( 'Widgets will appear in the 5. widget area of the 5-column footer.', 'hawea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer (5-column 3)', 'hawea' ),
		'id' => 'footer-6',
		'description' => esc_html__( 'Widgets will appear in the 6. widget area of the 5-column footer.', 'hawea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer (5-column 4)', 'hawea' ),
		'id' => 'footer-7',
		'description' => esc_html__( 'Widgets will appear in the 6. widget area of the 5-column footer.', 'hawea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer (5-column 5)', 'hawea' ),
		'id' => 'footer-8',
		'description' => esc_html__( 'Widgets will appear in the 6. widget area of the 5-column footer.', 'hawea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

}
add_action( 'widgets_init', 'hawea_widgets_init' );


if ( ! function_exists( 'hawea_content_nav' ) ) :


/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous pages when applicable.
/*-----------------------------------------------------------------------------------*/

function hawea_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="nav-wrap cf">
			<nav id="<?php echo $nav_id; ?>">
				<div class="nav-previous"><?php next_posts_link( wp_kses_post(__( '<span>Previous Posts</span>', 'hawea'  ) ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( wp_kses_post(__( '<span>Next Posts</span>', 'hawea' ) ) ); ?></div>
			</nav>
		</div><!-- end .nav-wrap -->
	<?php endif;
}

endif; // hawea_content_nav


/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous post when applicable.
/*-----------------------------------------------------------------------------------*/

function hawea_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<div class="nav-wrap cf">
		<nav id="nav-single">
			<div class="nav-previous"><?php previous_post_link( '%link', wp_kses_post( __( '<span class="meta-nav">Previous Post</span>%title', 'hawea' ) )  ); ?></div>
			<div class="nav-next"><?php next_post_link('%link', wp_kses_post( __( '<span class="meta-nav">Next Post</span>%title', 'hawea' ) ) ); ?></div>
		</nav><!-- #nav-single -->
	</div><!-- end .nav-wrap -->
	<?php
}


/*-----------------------------------------------------------------------------------*/
/* Extends the default WordPress body classes
/*-----------------------------------------------------------------------------------*/
function hawea_body_class( $classes ) {

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front';
	}

	if ( is_page_template( 'page-templates/fullwidth.php' ) ) {
		$classes[] = 'fullwidth';
	}

	if (is_page() && !is_page_template()) {
		$classes[] = 'default-page';
	}

	if (is_single() ) {
		$classes[] = 'default-page';
	}

	if ( is_page_template( 'page-templates/full-width.php' ) ) {
		$classes[] = 'fullwidth';
	}

	if ( is_page_template( 'page-templates/cart-page.php' ) ) {
		$classes[] = 'fullwidth';
	}

	if ( is_page_template( 'page-templates/checkout-page.php' ) ) {
		$classes[] = 'fullwidth';
	}

	if ( '' == get_theme_mod( 'hawea_slideone_img' ) ) {
		$classes[] = 'slider-off';
	}

	return $classes;
}
add_filter( 'body_class', 'hawea_body_class' );


/*-----------------------------------------------------------------------------------*/
/* Customizer additions
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/customizer.php';

/*-----------------------------------------------------------------------------------*/
/* Load Jetpack compatibility file.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/jetpack.php';

/*-----------------------------------------------------------------------------------*/
/* Front Page sections.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/sections.php';

/*-----------------------------------------------------------------------------------*/
/* Grab the Hawea Custom shortcodes.
/*-----------------------------------------------------------------------------------*/
require( get_template_directory() . '/inc/shortcodes.php' );

/*-----------------------------------------------------------------------------------*/
/* Add WooCommerce code.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/woocommerce/woocommerce.php';

/*-----------------------------------------------------------------------------------*/
/* Add One Click Demo Import code.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/demo-installer.php';
