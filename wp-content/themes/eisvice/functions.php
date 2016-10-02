<?php // Functions

// Enqueue Styles and Scripts
if(!is_admin()) {
  // Theme Stylesheet
  wp_enqueue_style('theme_style', get_stylesheet_uri());
  // Theme Scripts
  wp_enqueue_script('theme_scripts', get_stylesheet_directory_uri() . '/assets/scripts/build.min.js', array('jquery'), false, false);
}

// Includes
// Standard
require('inc/functions/standard.php');
// Menus
require('inc/functions/menus.php');
// Custom Post Types
require('inc/functions/custom_post_types.php');
// Custom Taxonomies
require('inc/functions/custom_taxonomies.php');

// Metaboxes
// CMB2 INIT
if ( file_exists( dirname( __FILE__ ) . '/inc/vendor/cmb2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/inc/vendor/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/inc/vendor/CMB2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/inc/vendor/CMB2/init.php';
}

// Music Meta
require('inc/functions/metaboxes/music-meta.php');
