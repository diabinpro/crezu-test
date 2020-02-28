<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package crezu
 */

?>

<article class="card">
  <div class="card__inner">

    <div class="card__image-wrapper">
      <a href="<?php echo get_permalink(); ?>">
        <?php the_post_thumbnail('medium_large', array('class' => 'card__image')); ?>
      </a>
    </div>

    <div class="card__caption">
      <?php the_title( '<h2 class="card__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
      <div class="card__summary">
        <?php the_excerpt(); ?>
      </div>
      <div class="post-meta">
        <div class="post-meta__item">
          <div class="icon icon_views"></div>
          <?php the_field('views'); ?> Visitas
        </div>
      </div>
    </div>

  </div>
</article><!-- #post-<?php the_ID(); ?> -->
