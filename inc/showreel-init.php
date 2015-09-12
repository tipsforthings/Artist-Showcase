<?php 

  /* Register Shows Function */
  function shows_init() {
    $labels = array(
      'name'               => _x( 'Shows', 'post type general name' ),
      'singular_name'      => _x( 'Show', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'show' ),
      'add_new_item'       => __( 'Add New Show' ),
      'edit_item'          => __( 'Edit Show' ),
      'new_item'           => __( 'New Show' ),
      'all_items'          => __( 'All Shows' ),
      'view_item'          => __( 'View Show' ),
      'search_items'       => __( 'Search Shows' ),
      'not_found'          => __( 'No shows found' ),
      'not_found_in_trash' => __( 'No shows found in the Trash' ), 
      'parent_item_colon'  => '',
      'menu_name'          => 'Show Reel'
    );
    $args = array(
      'labels'        => $labels,
      'description'   => 'Holds our shows with descriptions',
      'public'        => true,
      'menu_position' => 5,
      'supports'      => array('' ),
      'has_archive'   => true,
      'menu_icon' => 'dashicons-format-audio',
      'show_in_nav_menu' => true,
      'show_in_menu' => true,
      'taxonomies' => array('genres'),
    );
    register_post_type( 'shows', $args );
  }
  add_action( 'init', 'shows_init' );
  
  function showreel_add_show_meta() {

	  $screens = array( 'shows' );

	  foreach ( $screens as $screen ) {

		  add_meta_box(
			  'showreel_show',
			  __( 'Show Details', 'showreel' ),
			  'showreel_show_details',
			  $screen, 
			  'normal', 
			  'high'
		  );

      add_meta_box(
          'wp_custom_attachment',
          'Custom Attachment',
          'wp_custom_attachment',
          $screen,
          'side',
          'high'
      );

	  }
  }
  add_action( 'add_meta_boxes', 'showreel_add_show_meta' );

  function wp_custom_attachment() {
   
      wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');
       
      $html = '<p class="description">';
      $html .= 'Upload your PDF here.';
      $html .= '</p>';
      $html .= '<input type="file" id="wp_custom_attachment" name="wp_custom_attachment" value="" size="25" />';
       
      echo $html;
   
  } // end wp_custom_attachment

  function save_custom_meta_data($id) {
   
      /* --- security verification --- */
      if(!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {
        return $id;
      } // end if
         
      if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $id;
      } // end if
         
      if('page' == $_POST['post_type']) {
        if(!current_user_can('edit_page', $id)) {
          return $id;
        } // end if
      } else {
          if(!current_user_can('edit_page', $id)) {
              return $id;
          } // end if
      } // end if
      /* - end security verification - */
       
      // Make sure the file array isn't empty
      if(!empty($_FILES['wp_custom_attachment']['name'])) {
           
          // Setup the array of supported file types. In this case, it's just PDF.
          $supported_types = array('application/pdf');
           
          // Get the file type of the upload
          $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));
          $uploaded_type = $arr_file_type['type'];
           
          // Check if the type is supported. If not, throw an error.
          if(in_array($uploaded_type, $supported_types)) {
   
              // Use the WordPress API to upload the file
              $upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));
       
              if(isset($upload['error']) && $upload['error'] != 0) {
                  wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
              } else {
                  add_post_meta($id, 'wp_custom_attachment', $upload);
                  update_post_meta($id, 'wp_custom_attachment', $upload);     
              } // end if/else
   
          } else {
              wp_die("The file type that you've uploaded is not a PDF.");
          } // end if/else
           
      } // end if
       
  } // end save_custom_meta_data
  add_action('save_post', 'save_custom_meta_data');
  function update_edit_form() {
      echo ' enctype="multipart/form-data"';
  } // end update_edit_form
  add_action('post_edit_form_tag', 'update_edit_form');

  function showreel_show_details() {
	  global $post;
	
	  echo '<input type="hidden" name="showmeta_noncename" id="showmeta_noncename" value="' . 
	  wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	  $title = get_post_meta($post->ID, 'title', true);
	  $showdescription = get_post_meta($post->ID, '_showdescription', true);
	
    echo '<p>Show Name:</p>';
    echo '<input type="text" name="post_title" value="' . $title  . '" class="widefat" />';
    echo '<p>Description:</p>';
    wp_editor( $showdescription, '_showdescription', $settings = array() );
    echo '<input type="submit" name="_time" value="" class="widefat submit" />';

  }

  function showreel_save_shows_meta($post_id, $post) {
	
	  if ( !wp_verify_nonce( $_POST['showmeta_noncename'], plugin_basename(__FILE__) )) {
	  return $post->ID;
	  }

	  // Is the user allowed to edit the post or page?
	  if ( !current_user_can( 'edit_post', $post->ID ))
		  return $post->ID;

	  $shows_meta['title'] = $_POST['post_title'];
	  $shows_meta['_showdescription'] = $_POST['_showdescription'];
	
	  foreach ($shows_meta as $key => $value) {
		  if( $post->post_type == 'revision' ) return;
		  $value = implode(',', (array)$value);
		  if(get_post_meta($post->ID, $key, FALSE)) {
			  update_post_meta($post->ID, $key, $value);
		  } else {
			  add_post_meta($post->ID, $key, $value);
		  }
		  if(!$value) delete_post_meta($post->ID, $key);
	  }

    
  }

  add_action('save_post', 'showreel_save_shows_meta', 1, 2); // save the custom fields

  function add_new_shows_columns($shows_columns) {
      $new_columns['cb'] = '<input type="checkbox" />';
      $new_columns['title'] = __('Show Name', 'post_title');
      $new_columns['_showdescription'] = __('Description', '_showdescription');
      return $new_columns;
  }

  add_filter('manage_edit-shows_columns' , 'add_new_shows_columns');














  /* Register Genres Functions */
  function genres() {
    $labels = array(
      'name'              => _x( 'Genres', 'taxonomy general name' ),
      'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Genres' ),
      'all_items'         => __( 'All Genres' ),
      'parent_item'       => __( 'Parent Genre' ),
      'parent_item_colon' => __( 'Parent Genre:' ),
      'edit_item'         => __( 'Edit Genre' ), 
      'update_item'       => __( 'Update Genre' ),
      'add_new_item'      => __( 'Add New Genre' ),
      'new_item_name'     => __( 'New Genre' ),
      'menu_name'         => __( 'Genres' ),
      'show_admin_column' => true,
    );
    $args = array(
      'labels' => $labels,
      'hierarchical' => true,
    );
    register_taxonomy( 'genres', 'shows', $args );
  }
  add_action( 'init', 'genres', 0 );
  
  
  function checktoradio(){
      echo '<script type="text/javascript">jQuery("#genreschecklist li label input").each(function(){this.type="radio"});</script>';
  }
  add_action('admin_footer', 'checktoradio');

