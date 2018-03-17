<?php

  // Create custom post type
  add_action( 'init', 'testimony' );
  flush_rewrite_rules();
  function testimony() {
    register_post_type( 'testimony',
      array(
        'labels' => array(
          'name' => __( 'Testimony' ),
          'singular_name' => __( 'Testimony' )
        ),
        'public' => true,
        'has_archive' => true,
  			'supports' => array( 'title', 'editor', 'thumbnail' )
      )
    );
  }

  // Create custom taxonomy
  function coverages() {
    register_taxonomy(
      'coverages',
      'product',
      array(
        'label' => __( 'Coverages' ),
        'show_option_all' => '',
        'rewrite' => array( 'slug' => 'coverages' ),
        'hierarchical' => true,
        'with_thumbnail' => true,
        'orderby' => 'name',
        'order' => 'ASC',
      )
    );
  }
  add_action( 'init', 'coverages' );

  // custom taxonomy
  $terms = get_the_terms( $post->ID , 'providers' );
  foreach ( $terms as $term ) {
      $term_link = get_term_link( $term, 'providers' );
      if( is_wp_error( $term_link ) )
        continue;
      echo '<a href="' . $term_link . '">' . $term->name . '</a>';
  }

  // custom taxonomy thumbnail
  function taximage_providers() {
    global $post;
    return apply_filters( 'taxonomy-images-list-the-terms', '', array('post_id' => $post->ID, 'taxonomy' => 'providers') );
  }


// remove editor galerie post type
add_action('init', 'init_remove_support',100);
function init_remove_support(){
    $post_type = 'galerie';
    remove_post_type_support( $post_type, 'editor');
}
  

?>
