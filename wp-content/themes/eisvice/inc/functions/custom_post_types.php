<?php // CUSTOM POST TYPES

  // MUSIC
  add_action( 'init', 'register_cpt_music' );

  function register_cpt_music() {
    $labels = array(
      'name' => _x( 'Music', 'music' ),
      'singular_name' => _x( 'Music', 'music' ),
      'add_new' => _x( 'Add New', 'music' ),
      'add_new_item' => _x( 'Add New Music', 'music' ),
      'edit_item' => _x( 'Edit Music', 'music' ),
      'new_item' => _x( 'New Music', 'music' ),
      'view_item' => _x( 'View Music', 'music' ),
      'search_items' => _x( 'Search Music', 'music' ),
      'not_found' => _x( 'No music found', 'music' ),
      'not_found_in_trash' => _x( 'No music found in Trash', 'music' ),
      'parent_item_colon' => _x( 'Parent Music:', 'music' ),
      'menu_name' => _x( 'Music', 'music' ),
    );

    $args = array(
      'labels' => $labels,
      'hierarchical' => false,

      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'trackbacks', 'comments', 'revisions' ),
      'taxonomies' => array('project'),
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 5,

      'show_in_nav_menus' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'has_archive' => true,
      'query_var' => true,
      'can_export' => true,
      'rewrite' => true,
      'capability_type' => 'post'
    );

    register_post_type( 'music', $args );
  }
  
?>
