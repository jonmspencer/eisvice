<?php 


/*
function custom_taxonomies_terms_links()
{
    // get post by post id
    $post = get_post( $post->ID );
 
    // get post type by post
    $post_type = $post->post_type;
 
    // get post type taxonomies
    $taxonomies = get_object_taxonomies( $post_type, 'objects' );
    $out = '';
   
    $format_start_list = "<h2></h2><ul>\n";
    $format_start_parent = "<li><h3>%s</h3><ul>\n";
    $format_item = "<li><a href=\"%s\">%s</a></li>\n";
    $format_end_parent = "</ul></li>\n";
    $format_end_list = "</ul>\n";
   
    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ) {
        $ordered_terms = array();
       
        // get the terms related to post
        $terms = get_the_terms( $post->ID, $taxonomy_slug );
 
        if ( !empty( $terms ) ) {
            $out .= sprintf($format_start_list, $taxonomy->label);
 
            foreach ( $terms as $term ) {
                if ( $term->parent < 1 ) {
                    $ordered_terms[$term->term_id]['parent'] = $term;
                } else {
                    $ordered_terms[$term->parent]['items'][$term->term_id] = $term;                    
                }
            }
           
            foreach ($ordered_terms as $id => $terms) {                
                $out .= sprintf($format_start_parent, $terms['parent']->name);
           
                foreach ($terms['items'] as $term) {
                    $out .= sprintf($format_item, get_term_link($term->slug, $taxonomy_slug), $term->name);
                }
               
                $out .= $format_end_parent;
            }
           
 
            $out .= $format_end_list;
        }
    }
 
    return $out;
}  
  
  
*/
/*
// get taxonomies terms links
function custom_taxonomies_terms_links(){
  // get post by post id
  $post = get_post( $post->ID );

  // get post type by post
  $post_type = $post->post_type;

  // get post type taxonomies
  $taxonomies = get_object_taxonomies( $post_type, 'objects' );

  $out = array();
  foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

    // get the terms related to post
    $terms = get_the_terms( $post->ID, $taxonomy_slug );

    if ( !empty( $terms ) ) {
      // = "<h2>" . $taxonomy->label . "</h2>\n
      $out[] = "<div class='meta'>";
      foreach ( $terms as $term ) {
        $out[] ='<a href="'
        .    get_term_link( $term->slug, $taxonomy_slug ) .'">'
        .    $term->name
        . "</a>\n";
      }
      $out[] = "</div>\n";
    }
  }
  return implode('', $out );
}
*/
  
  

// CUSTOM POST TYPES
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


// TAXONOMIES 

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


// CMB2
if ( file_exists( dirname( __FILE__ ) . '/assets/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/assets/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/assets/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/assets/CMB2/init.php';
}

add_action( 'cmb2_init', 'ev_music' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function ev_music() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ev_music_';
	
  	$cmb_ev_music = new_cmb2_box( array(
  		'id'           => $prefix . 'metabox',
  		'title'        => __( 'More on the Music', 'cmb2' ),
  		'object_types' => array( 'music', ), // Post type
  		'context'      => 'normal',
  		'priority'     => 'high',
  		'show_names'   => true, // Show field names on the left
  		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
  	) );
  
    $cmb_ev_music->add_field( array(
  		'name'    => __( 'Backstory', 'cmb2' ),
  		//'desc'    => __( 'field description (optional)', 'cmb2' ),
  		'id'      => $prefix . 'backstory',
  		'type'    => 'wysiwyg',
  		'options' => array( 'textarea_rows' => 5, ),
  	) );

}

?>