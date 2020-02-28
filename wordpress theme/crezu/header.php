<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package crezu
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>
<body>
  <div class="site-content">
    <header class="header">
      <div class="container">
        <div class="header__wrapper">
          <a href="/"><img class="header__logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Crezu"></a>

          <div class="header__side">
            <?php
            wp_nav_menu( array(
                'menu'           => 'Menu 1',
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
                'container'      => 'nav',
                'container_class'=> 'header-menu',
                'menu_class'     => 'header-menu__list',
                'items_wrap'     => '<ul class="header-menu__list">%3$s</ul>',
            ) );
            ?>
            <a class="btn btn_red" href="#">Получить деньги</a>
          </div>
        </div>
      </div>
    </header>

    <section class="featured">
      <div class="container">
        <div class="featured__wrapper">
          <h1 class="featured__title"><?php echo get_field( "text", 18 ); ?></h1>
          <a class="btn btn_transparent" href="<?php echo get_field( "button_url", 18 ); ?>">
            <?php echo get_field( "button_text", 18 ); ?>
          </a>
        </div>
      </div>
    </section>

    <div class="breadcrumbs">
      <div class="container">
        <a class="breadcrumbs__item" href="/">Main</a>
        <div class="breadcrumbs__divider"> /</div>
        <div class="breadcrumbs__item breadcrumbs__item_active">Blog</div>
      </div>
    </div>

    <div class="container">