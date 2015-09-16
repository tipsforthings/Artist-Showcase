<?php
function artist_showcase_content_sizing() {
	var $contentWidth
	
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	  $contentWidth = 'large-12';
  } else {
    $contentWidth = 'large-9';
  }
  echo '"' . $contentWidth . '"';
}


