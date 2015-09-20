<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

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
