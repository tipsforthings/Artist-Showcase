<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artist_showcase
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      <div class="row">
      <?php if ( ! is_active_sidebar( 'sidebar-1' ) ) { ?>
        <div class="large-12 columns">
      <?php } elseif ( is_active_sidebar( 'sidebar-1' ) ) { ?>
        <div class="large-9 large-push-3 columns">
      <?php } ?>
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() ); 
					$img = get_post_meta(get_the_ID(), 'wp_custom_attachment', true); ?>
					
					<a href="<?php echo $img['url']; ?>">
            Download PDF Here
          </a>
			<?php endwhile; ?>
			<?php the_posts_navigation(); ?>
		  <?php else : ?>

			  <?php get_template_part( 'template-parts/content', 'none' ); ?>

		  <?php endif; ?>
  
        </div>
      <?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
        <div class="large-3 large-pull-9 columns">
          <?php get_sidebar(); ?>
        </div>
      <?php } ?>
      </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
