<?php

  // Music Meta
  add_action( 'cmb2_init', 'ev_music' );
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
    ) );

    $cmb_ev_music->add_field( array(
      'name'    => __( 'Backstory', 'cmb2' ),
      //'desc'    => __( 'field description (optional)', 'cmb2' ),
      'id'      => $prefix . 'backstory',
      'type'    => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ));

  }

?>
