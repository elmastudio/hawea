<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="entry-meta">
				<div class="entry-date">
					<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
				</div><!-- end .entry-date -->
				<?php if ( comments_open() ) : ?>
				<div class="entry-comments">
					<?php comments_popup_link( '<span class="leave-reply">' . esc_html__( 'Comment 0', 'hawea' ) . '</span>', esc_html__( 'Comment 1', 'hawea' ), esc_html__( 'Comments %', 'hawea' ) ); ?>
				</div><!-- end .entry-comments -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( esc_html__( 'Edit', 'hawea' ), '<div class="entry-edit">', '</div>' ); ?>
		</div><!-- end .entry-meta -->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- end .entry-header -->

	<?php if ( '' != get_the_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail();
echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
		</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

	<div class="entry-content cf">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hawea' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- end .entry-content -->

	<footer class="entry-footer cf">
		<div class="entry-cats">
			<span><?php esc_html_e('Category:', 'hawea') ?></span><?php the_category(', '); ?>
		</div><!-- end .entry-cats -->
		<?php $tags_list = get_the_tag_list();
			if ( $tags_list ): ?>
			<div class="entry-tags"><span><?php esc_html_e('Tagged:', 'hawea') ?></span><?php the_tags('', ', ', ''); ?></div>
		<?php endif; ?>
		<?php
		// Author bio.
		if ( get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
		?>
	</footer><!-- end .entry-footer -->
</article><!-- end .post-<?php the_ID(); ?> -->