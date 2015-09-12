<?php
  function custom_edit_shows_columns( $showcolumn, $post_id ) {
    switch ( $showcolumn ) {
      case "title":
        $title = get_post_meta($post_id, 'post_title', true);
        echo $title;
      break;

      case "_showdescription":
        $showdescription = get_post_meta($post_id, '_showdescription', true);
        echo $showdescription;
      break;

    }
  }
  add_action( "manage_posts_custom_column", "custom_edit_shows_columns", 10, 2 );

?>
