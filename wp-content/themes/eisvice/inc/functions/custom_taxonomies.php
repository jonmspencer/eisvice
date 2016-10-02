<?php  // TAXONOMIES

  // PROJECT TAXONOMY
  add_action( 'init', 'register_taxonomy_project' );
  function register_taxonomy_project() {
    $labels = array(
      'name' => _x( 'Project', 'project' ),
      'singular_name' => _x( 'Project', 'project' ),
      'search_items' => _x( 'Search Projects', 'project' ),
      'popular_items' => _x( 'Popular Project', 'project' ),
      'all_items' => _x( 'All Projects', 'project' ),
      'parent_item' => _x( 'Parent Project', 'project' ),
      'parent_item_colon' => _x( 'Parent Project:', 'project' ),
      'edit_item' => _x( 'Edit Project', 'project' ),
      'update_item' => _x( 'Update Project', 'project' ),
      'add_new_item' => _x( 'Add New Project', 'project' ),
      'new_item_name' => _x( 'New Project', 'project' ),
      'separate_items_with_commas' => _x( 'Separate project with commas', 'project' ),
      'add_or_remove_items' => _x( 'Add or remove project', 'project' ),
      'choose_from_most_used' => _x( 'Choose from the most used project', 'project' ),
      'menu_name' => _x( 'Project', 'project' ),
    );
    $args = array(
      'labels' => $labels,
      'public' => true,
      'show_in_nav_menus' => true,
      'show_ui' => true,
      'show_tagcloud' => true,
      'show_admin_column' => false,
      'hierarchical' => true,
      'rewrite' => true,
      'query_var' => true
      );
    register_taxonomy( 'project', array('music'), $args );
  }

?>
