<?php
/**
 * The template for for the Front page image slider
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0.1
 */
?>

<section id="front-slider" class="front-section cf">
	<div class="front-slider-content">

		<?php if ( '' != get_theme_mod( 'hawea_slideone_img' ) ) : ?>
			<div id="slideone" class="slide-wrap">
				<div class="slide-content"><a href="<?php echo esc_url( get_theme_mod( 'hawea_slideone_link' ) ); ?>"class="img-link"><img src="<?php echo wp_kses_post( get_theme_mod( 'hawea_slideone_img' ) ); ?>"></a></div><!-- end .slide-content -->
				<div class="slide-text">
					<p><?php echo wp_kses_post( get_theme_mod( 'hawea_slideone_text' ) ); ?></p>
				</div><!-- end .slide-text -->
			</div><!-- end #slideone -->
		<?php endif; ?>

		<?php if ( '' != get_theme_mod( 'hawea_slidetwo_img' ) ) : ?>
			<div id="slidetwo" class="slide-wrap">
				<div class="slide-content"><a href="<?php echo esc_url( get_theme_mod( 'hawea_slidetwo_link' ) ); ?>"class="img-link"><img src="<?php echo wp_kses_post( get_theme_mod( 'hawea_slidetwo_img' ) ); ?>"></a></div><!-- end .slide-content -->
				<div class="slide-text">
					<p><?php echo wp_kses_post( get_theme_mod( 'hawea_slidetwo_text' ) ); ?></p>
				</div><!-- end .slide-text -->
			</div><!-- end #slidetwo -->
		<?php endif; ?>

		<?php if ( '' != get_theme_mod( 'hawea_slidethree_img' ) ) : ?>
			<div id="slidethree" class="slide-wrap">
				<div class="slide-content"><a href="<?php echo esc_url( get_theme_mod( 'hawea_slidethree_link' ) ); ?>"class="img-link"><img class="slider-img" src="<?php echo wp_kses_post( get_theme_mod( 'hawea_slidethree_img' ) ); ?>"></a></div><!-- end .slide-content -->	
				<div class="slide-text">
					<p><?php echo wp_kses_post( get_theme_mod( 'hawea_slidethree_text' ) ); ?></p>
				</div><!-- end .slide-text -->
			</div><!-- end #slidethree -->
		<?php endif; ?>

		<?php if ( '' != get_theme_mod( 'hawea_slidefour_img' ) ) : ?>
			<div id="slidefour" class="slide-wrap">
				<div class="slide-content"><a href="<?php echo esc_url( get_theme_mod( 'hawea_slidefour_link' ) ); ?>"class="img-link"><img src="<?php echo wp_kses_post( get_theme_mod( 'hawea_slidefour_img' ) ); ?>"></a></div><!-- end .slide-content -->	
				<div class="slide-text">
					<p><?php echo wp_kses_post( get_theme_mod( 'hawea_slidefour_text' ) ); ?></p>
				</div><!-- end .slide-text -->
			</div><!-- end #slidefour -->
		<?php endif; ?>

		<?php if ( '' != get_theme_mod( 'hawea_slidefive_img' ) ) : ?>
			<div id="slidefive" class="slide-wrap">
				<div class="slide-content"><a href="<?php echo esc_url( get_theme_mod( 'hawea_slidefive_link' ) ); ?>"class="img-link"><img src="<?php echo wp_kses_post( get_theme_mod( 'hawea_slidefive_img' ) ); ?>"></a></div><!-- end .slide-content -->
				<div class="slide-text">
					<p><?php echo wp_kses_post( get_theme_mod( 'hawea_slidefive_text' ) ); ?></p>
				</div><!-- end .slide-text -->
			</div><!-- end #slidefive -->
		<?php endif; ?>

	</div><!-- end .front-slider-content -->
		<a href="#shop-start" id="down" class="smooth down"><span><?php esc_html_e('More Info', 'hawea') ?></span></a>
</section><!-- end #front-slider -->
