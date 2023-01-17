<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main-wrap">
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="site-container">

	<header id="masthead" class="cf" role="banner">
	
	<div class="header-wrap cf">

		<div id="site-branding">
			<?php if ( get_header_image() ) : ?>
				<div id="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt=""></a>
				</div><!-- end #site-logo -->
			<?php endif; ?> 

			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>

			<?php if ( '' != get_bloginfo('description') ) : ?>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php endif; ?>
		</div><!-- end #site-branding -->

		<button id="menu-main-toggle"><span><?php esc_html_e( 'Open', 'hawea' ); ?></span></button>
			<nav id="site-navigation" class="main-navigation cf" role="navigation">
				<div class="sticky-wrap">
				<?php
				wp_nav_menu( array(
					'theme_location'	=> 'primary',
					'menu_class'    	=> 'primary-menu',
					'container' 		=> false,
				 ) );
				?>
			</nav><!-- end #site-nav -->
			
			<?php if (hawea_woocommerce_active() ) : ?>
				<?php get_template_part( 'template-parts/shop-menu' ); ?>
			<?php endif; ?>
			
	</div><!-- end .header-wrap -->

	<?php if (has_nav_menu( 'social' ) ) : ?>
	<nav class="social-nav" role="navigation">
		<?php wp_nav_menu( array(
			'theme_location'	=> 'social',
			'container' 		=> 'false',
			'depth' 			=> -1));  ?>
	</nav><!-- end .social-nav -->
	<?php endif; ?>

	</header><!-- end #masthead -->

<div id="content-wrap" class="cf">
