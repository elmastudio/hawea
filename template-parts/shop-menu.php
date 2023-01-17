<div class="shop-menu">
	<?php if ( is_user_logged_in() ) { ?>
		<a class="account-btn" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_html_e('Account','hawea'); ?>"><span class="btn-text"><?php esc_html_e('Account','hawea'); ?></span></a>
	<?php } 
	else { ?>
		<a class="account-btn" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_html_e('Login / Register','hawea'); ?>"><span class="btn-text"><?php esc_html_e('Login / Register','hawea'); ?></span></a>
	<?php } ?>
			 	
	<a class="cart-btn" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View cart', 'hawea' ); ?>">
		<span class="btn-text"><?php esc_html_e('Cart', 'hawea') ?></span>
		<span class="cart-count"><?php echo sprintf ( esc_html__('%d', 'hawea'), WC()->cart->cart_contents_count ); ?></span>
	</a><!-- end .cart-btn -->
	
	<div class="cart-dropdown">
		<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
	</div><!-- end .cart-dropdown -->
</div><!-- end .shop-menu -->
