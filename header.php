<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package artist_showcase
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="row hfeed site">
  
	<header id="masthead" class="site-header" role="banner">
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1 class="site-title <?php if ( get_theme_mod('header_animate') == 'true' ) { ?>animated <?php echo get_theme_mod('title_animation', 'rubberBand'); } ?>" ><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        </li>
        <li class="name desc"><h1 class="site-title <?php if ( get_theme_mod('header_animate') == 'true' ) { ?>animated <?php echo get_theme_mod('tagline_animation', 'rubberBand'); } ?>" ><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'description' ); ?></a></h1>
        </li>
         <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <section class="top-bar-section">

        <!-- Left Nav Section -->
	    <?php 
			    $defaults = array(
	          'theme_location'  => 'primary',
	          'menu'            => '',
	          'container'       => 'false',
	          'container_class' => 'top-bar-section',
	          'container_id'    => '',
	          'menu_class'      => 'right',
	          'menu_id'         => 'primary-menu',
	          'echo'            => true,
	          'fallback_cb'     => 'wp_page_menu',
	          'before'          => '',
	          'after'           => '',
	          'link_before'     => '',
	          'link_after'      => '',
	          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	          'depth'           => 0,
	          'walker'          => new Top_Bar_Walker(),
          );

    wp_nav_menu( $defaults ); ?>
      </section>
    </nav>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
