<?php
/**
 * The template used for displaying page content.
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>
	
	<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- end .entry-header -->
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hawea' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
		<?php edit_post_link( esc_html__( 'Edit', 'hawea' ), '<div class="edit-link cf">', '</div>' ); ?>
	<?php endif; ?>
</article><!-- end post-<?php the_ID(); ?> -->