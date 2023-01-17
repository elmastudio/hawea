<?php
/**
 * The default template for displaying content
 *
 * @package Hawea
 * @since Hawea 1.0
 * @version 1.0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( '' != get_the_post_thumbnail() && ! post_password_required() && ! has_post_format( 'video' ) ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'hawea' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail(); ?></a>
		</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- end .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<div class="entry-date">
			<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
		</div><!-- end .entry-date -->
		<?php if ( comments_open() ) : ?>
		<div class="entry-comments">
			<?php comments_popup_link( '<span class="leave-reply">' . esc_html__( 'Comment 0', 'hawea' ) . '</span>', esc_html__( 'Comment 1', 'hawea' ), esc_html__( 'Comments %', 'hawea' ) ); ?>
		</div><!-- end .entry-comments -->
		<?php endif; // comments_open() ?>
		<?php edit_post_link( esc_html__( 'Edit', 'hawea' ), '<div class="entry-edit">', '</div>' ); ?>
	</footer><!-- end .entry-meta -->

</article><!-- end post -<?php the_ID(); ?> -->