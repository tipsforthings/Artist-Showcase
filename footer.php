<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package artist_showcase
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer row" role="contentinfo">
	  <div class="large-8 large-offset-2 columns site-info">
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'artist_showcase' ), 'Artist Showcase', '<a href="http://alxs.co.uk/" rel="designer">Alex Scott</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>


var sticky = new Waypoint.Sticky(
{
  element: $('.site-header')[0],
  stuckClass: 'sticky',
  offset: '-100px',
  handler: function(direction) {
    if (direction == 'down') {
      $('.site-header').css('display','none').fadeIn(250);
    } else {
      $('.site-header').css('display','none').fadeIn(250);
    }
  }
})


</script>
</body>
</html>
