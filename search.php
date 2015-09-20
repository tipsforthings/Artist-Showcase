<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package artist_showcase
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      <div class="row">
      <?php if ( ! is_active_sidebar( 'sidebar-1' ) ) { ?>
        <div class="large-12 columns">
      <?php } elseif ( is_active_sidebar( 'sidebar-1' ) ) { ?>
        <div class="large-9 large-push-3 columns">
      <?php } ?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'artist_showcase' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
				?>

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
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
