<?php
/**
 * artist_showcase Theme Customizer.
 *
 * @package artist_showcase
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
$animate = array(
		  );



function artist_showcase_customize_register( $wp_customize ) {
	$wp_customize->get_control( 'blogname' )->priority         = '1';
	$wp_customize->get_control( 'blogdescription' )->priority         = '2';
	$wp_customize->get_control( 'display_header_text' )->priority         = '3';
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'header_image' )->panel = 'header';
	$wp_customize->get_section( 'title_tagline' )->panel = 'header';
	$wp_customize->get_section( 'header_image' )->priority = '1';
	$wp_customize->get_section( 'title_tagline' )->priority = '2';
	$wp_customize->get_section( 'colors' )->panel = 'base';
	$wp_customize->get_section( 'colors' )->priority = '1';
	$wp_customize->get_section( 'background_image' )->panel = 'base';
	$wp_customize->get_section( 'background_image' )->priority = '2';
	$wp_customize->get_section( 'static_front_page' )->panel = 'base';
	$wp_customize->get_section( 'static_front_page' )->priority = '3';
	
	$wp_customize->add_panel( 'header', array( 'title' => __('Header', 'artist_showcase'), 'priority' => '2' ) );
	$wp_customize->add_panel( 'base', array( 'title' => __('Base Settings', 'artist_showcase'), 'priority' => '1' ) );
	$wp_customize->add_setting( 'header_animate', array( 'default' => 'false' ) );
	$wp_customize->add_setting( 'header_underline', array( 'default' => 'false' ) );
	$wp_customize->add_control( 'header_animate', array( 'label'    => __( 'Animate Header', 'artist_showcase' ), 'section'  => 'title_tagline', 'settings' => 'header_animate', 'default' => 'false', 'type'     => 'radio', 'choices'  => array(
			  'true'  => 'True',
			  '' => 'False',
		  ),
	  )
  );
	$wp_customize->add_control( 'header_underline', array( 'label'    => __( 'Underline Header', 'artist_showcase' ), 'section'  => 'title_tagline', 'settings' => 'header_underline', 'default' => 'false', 'type'     => 'radio', 'choices'  => array(
			  'true'  => 'True',
			  '' => 'False',
		  ),
	  )
  );
	$wp_customize->add_setting( 'title_animation', array( 'default' => '' ) );
	$wp_customize->add_control( 'title_animation', array( 
	  'label'    => __( 'Title Animation', 'artist_showcase' ), 
	  'section'  => 'title_tagline', 
	  'settings' => 'title_animation', 
	  'type'     => 'select', 
	  'choices'  => array(
			  ""  => "",
			  "bounce"  => "Bounce",
			  "flash"  => "Flash",
			  "pulse"  => "Pulse",
			  "rubberBand"  => "Rubber Band",
			  "shake"  => "Shake",
			  "swing"  => "Swing",
			  "tada"  => "Tada",
			  "rubber"  => "Rubber",
			  "jelo"  => "Jelo",
			  "bounceIn"  => "Bounce In",
			  "bounceInDown"  => "Bounce In Down",
			  "bounceInLeft"  => "Bounce In Left",
			  "bounceInRight"  => "Bounce In Right",
			  "bounceInUp"  => "Bounce In Up",
			  "bounceOut"  => "Bounce Out",
			  "bounceOutDown"  => "Bounce Out Down",
			  "bounceOutLeft"  => "Bounce Out Left",
			  "bounceOutRight"  => "Bounce Out Right",
			  "bounceOutUp"  => "Bounce Out Up",
			  "fadeIn"  => "Fade In",
			  "fadeInDown"  => "Fade In Down",
			  "fadeInLeft"  => "Fade In Left",
			  "fadeInRight"  => "Fade In Right",
			  "fadeInUp"  => "Fade In Up",
			  "fadeInDownBig"  => "Fade In Down Big",
			  "fadeInLeftBig"  => "Fade In Left Big",
			  "fadeInRightBig"  => "Fade In Right Big",
			  "fadeInUpBig"  => "Fade In Up Big",
			  "fadeOut"  => "Fade Out",
			  "fadeOutDown"  => "Fade Out Down",
			  "fadeOutLeft"  => "Fade Out Left",
			  "fadeOutRight"  => "Fade Out Right",
			  "fadeOutUp"  => "Fade Out Up",
			  "fadeOutDownBig"  => "Fade Out Down ",
			  "fadeOutLeftBig"  => "Fade Out Left Big",
			  "fadeOutRightBig"  => "Fade Out Right Big",
			  "fadeOutUpBig"  => "Fade Out Up Big",
			  "flip"  => "Flip",
			  "flipInX"  => "Fade In X",
			  "flipInY"  => "Fade In Y",
			  "flipOutX"  => "Fade Out X",
			  "flipOutY"  => "Fade Out Y",
			  "lightspeedIn"  => "Lightspeed In",
			  "lightspeedOut"  => "Lightspeed Out",
			  "rotateIn"  => "Rotate In",
			  "rotateInUpLeft"  => "Rot. In Up Left",
			  "rotateInUpRight"  => "Rot. In Up Right",
			  "rotateInDownLeft"  => "Rot. In Down Left",
			  "rotateInDownRight"  => "Rot. In Down Right",
			  "rotateOut"  => "Rot. Out Up Left",
			  "rotateOutUpLeft"  => "Rot. Out Up Left",
			  "rotateOutUpRight"  => "Rot. Out Up Right",
			  "rotateOutDownLeft"  => "Rot. Out Down Left",
			  "rotateOutDownRight"  => "Rot. Out Down Right",
			  "slideInDown"  => "Slide In Down",
			  "slideInLeft"  => "Slide In Left",
			  "slideInRight"  => "Slide In Right",
			  "slideInUp"  => "Slide In Up",
			  "slideOutDown"  => "Slide Out Down",
			  "slideOutLeft"  => "Slide Out Left",
			  "slideOutRight"  => "Slide Out Right",
			  "slideOutUp"  => "Slide Out Up",
			  "zoomIn"  => "Zoom In",
			  "zoomInDown"  => "Zoom In Down",
			  "zoomInLeft"  => "Zoom In Left",
			  "zoomInRight"  => "Zoom In Right",
			  "zoomInUp"  => "Zoom In Up",
			  "zoomOut"  => "Zoom Out",
			  "zoomOutDown"  => "Zoom Out Down",
			  "zoomOutLeft"  => "Zoom Out Left",
			  "zoomOutRight"  => "Zoom Out Right",
			  "zoomOutUp"  => "Zoom Out Up",
			  "hinge" => "Hinge",
			  "rollIn" => "Roll In",
			  "rollOut" => "Roll Out"
	  ),
	 ) );
	$wp_customize->add_setting( 'tagline_animation', array( 'default' => 'false' ) );
	$wp_customize->add_control( 'tagline_animation', array( 'label'    => __( 'Tagline Animation', 'artist_showcase' ), 'section'  => 'title_tagline', 'settings' => 'tagline_animation', 'type'     => 'select', 'choices'  => array(
			  ""  => "",
			  "bounce"  => "Bounce",
			  "flash"  => "Flash",
			  "pulse"  => "Pulse",
			  "rubberBand"  => "Rubber Band",
			  "shake"  => "Shake",
			  "swing"  => "Swing",
			  "tada"  => "Tada",
			  "rubber"  => "Rubber",
			  "jelo"  => "Jelo",
			  "bounceIn"  => "Bounce In",
			  "bounceInDown"  => "Bounce In Down",
			  "bounceInLeft"  => "Bounce In Left",
			  "bounceInRight"  => "Bounce In Right",
			  "bounceInUp"  => "Bounce In Up",
			  "bounceOut"  => "Bounce Out",
			  "bounceOutDown"  => "Bounce Out Down",
			  "bounceOutLeft"  => "Bounce Out Left",
			  "bounceOutRight"  => "Bounce Out Right",
			  "bounceOutUp"  => "Bounce Out Up",
			  "fadeIn"  => "Fade In",
			  "fadeInDown"  => "Fade In Down",
			  "fadeInLeft"  => "Fade In Left",
			  "fadeInRight"  => "Fade In Right",
			  "fadeInUp"  => "Fade In Up",
			  "fadeInDownBig"  => "Fade In Down Big",
			  "fadeInLeftBig"  => "Fade In Left Big",
			  "fadeInRightBig"  => "Fade In Right Big",
			  "fadeInUpBig"  => "Fade In Up Big",
			  "fadeOut"  => "Fade Out",
			  "fadeOutDown"  => "Fade Out Down",
			  "fadeOutLeft"  => "Fade Out Left",
			  "fadeOutRight"  => "Fade Out Right",
			  "fadeOutUp"  => "Fade Out Up",
			  "fadeOutDownBig"  => "Fade Out Down ",
			  "fadeOutLeftBig"  => "Fade Out Left Big",
			  "fadeOutRightBig"  => "Fade Out Right Big",
			  "fadeOutUpBig"  => "Fade Out Up Big",
			  "flip"  => "Flip",
			  "flipInX"  => "Fade In X",
			  "flipInY"  => "Fade In Y",
			  "flipOutX"  => "Fade Out X",
			  "flipOutY"  => "Fade Out Y",
			  "lightspeedIn"  => "Lightspeed In",
			  "lightspeedOut"  => "Lightspeed Out",
			  "rotateIn"  => "Rotate In",
			  "rotateInUpLeft"  => "Rot. In Up Left",
			  "rotateInUpRight"  => "Rot. In Up Right",
			  "rotateInDownLeft"  => "Rot. In Down Left",
			  "rotateInDownRight"  => "Rot. In Down Right",
			  "rotateOut"  => "Rot. Out Up Left",
			  "rotateOutUpLeft"  => "Rot. Out Up Left",
			  "rotateOutUpRight"  => "Rot. Out Up Right",
			  "rotateOutDownLeft"  => "Rot. Out Down Left",
			  "rotateOutDownRight"  => "Rot. Out Down Right",
			  "slideInDown"  => "Slide In Down",
			  "slideInLeft"  => "Slide In Left",
			  "slideInRight"  => "Slide In Right",
			  "slideInUp"  => "Slide In Up",
			  "slideOutDown"  => "Slide Out Down",
			  "slideOutLeft"  => "Slide Out Left",
			  "slideOutRight"  => "Slide Out Right",
			  "slideOutUp"  => "Slide Out Up",
			  "zoomIn"  => "Zoom In",
			  "zoomInDown"  => "Zoom In Down",
			  "zoomInLeft"  => "Zoom In Left",
			  "zoomInRight"  => "Zoom In Right",
			  "zoomInUp"  => "Zoom In Up",
			  "zoomOut"  => "Zoom Out",
			  "zoomOutDown"  => "Zoom Out Down",
			  "zoomOutLeft"  => "Zoom Out Left",
			  "zoomOutRight"  => "Zoom Out Right",
			  "zoomOutUp"  => "Zoom Out Up",
			  "hinge" => "Hinge",
			  "rollIn" => "Roll In",
			  "rollOut" => "Roll Out"
		  ),
	  )
  );
}
add_action( 'customize_register', 'artist_showcase_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function artist_showcase_customize_preview_js() {
	wp_enqueue_script( 'artist_showcase_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'artist_showcase_customize_preview_js' );
