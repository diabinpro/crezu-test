<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package crezu
 */

?>

<article id="post-<?php the_ID(); ?>" class="post">
	<header class="post__header">
    <?php the_title( '<h1 class="post__title">', '</h1>' ); ?>
	</header><!-- .page__header -->

	<?php crezu_post_thumbnail(); ?>

	<div class="post__content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'crezu' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .page__content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="post__footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'crezu' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
