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
 		<div class="site-branding">
				<h1 class="site-title <?php if ( get_theme_mod('header_animate') == 'true' ) { ?>animated <?php echo get_theme_mod('title_animation', 'rubberBand'); } ?> "><a class="animated swing" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<div class="site-description <?php if ( get_theme_mod('header_animate') == 'true' ) { ?>animated <?php echo get_theme_mod('tagline_animation', 'rubberBand'); } ?>"><?php bloginfo( 'description' ); ?></div>
			<?php if ( get_theme_mod('header_underline') == true ) { ?>
			  <div id="branding-underline"></div>
			
			<?php } ?>
		</div><!-- .site-branding -->
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
