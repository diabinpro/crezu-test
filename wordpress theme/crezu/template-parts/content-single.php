<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package crezu
 */

?>

<article id="post-<?php the_ID(); ?>" class="post">
  <header class="post__header">
    <?php the_title( '<h1 class="post__title">', '</h1>' ); ?>

    <?php
    if ( 'post' === get_post_type() ) :
      ?>
      <div class="post-meta">
        <div class="post-meta__item">
          <div class="icon icon_views"></div>
          <?php the_field('views'); ?> Visitas
        </div>
      </div>
    <?php endif; ?>
  </header><!-- .post-header -->

  <div class="post__content">
    <?php
    the_content( sprintf(
        wp_kses(
        /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'crezu' ),
            array(
                'span' => array(
                    'class' => array(),
                ),
            )
        ),
        get_the_title()
    ) );

    wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'crezu' ),
        'after'  => '</div>',
    ) );
    ?>
  </div><!-- .post-content -->
</article><!-- #post-<?php the_ID(); ?> -->
