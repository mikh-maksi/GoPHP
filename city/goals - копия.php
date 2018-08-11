<?php
/*
Plugin Name: My Custom Post Types
Description: Add post types for movies and movie reviews
Author: Liam Carberry
*/
 
function searchin_property_posttype() {
    register_post_type('property', array(
        'lables' => array(
            'name' => 'Properties',
            'singular_name' => 'property',
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'rewrite' => array('slug' => 'property'),
        'register_meta_box_cb' => 'searchin_property_metaboxes',
    ));
}

add_action('init', 'searchin_property_posttype');




//Action hook to register metaboxes for specific post type property
add_action('add_meta_boxes_property', 'searchin_property_metaboxes');

//Action hook to register metaboxes for post types
add_action('add_meta_boxes','searchin_property_metaboxes');
//Action hook to register metaboxes for specific post type property
add_action('add_meta_boxes_property', 'searchin_property_metaboxes');
 
//Action hook to register metaboxes for post types
function searchin_property_metaboxes($post) {
    add_meta_box('property-contact', 'Contact', 'searchin_property_contact_meta', 'property', 'side', 'default');
    add_meta_box('property-price', 'Price', 'searchin_property_price_meta', 'property', 'normal', 'default');
}


add_action( 'init', 'lc_custom_post_movie' );
 
// The custom function to register a movie post type
function lc_custom_post_movie() {
 
  // Set the labels, this variable is used in the $args array
  $labels = array(
    'name'               => __( 'Movies' ),
    'singular_name'      => __( 'Movie' ),
    'add_new'            => __( 'Add New Movie' ),
    'add_new_item'       => __( 'Add New Movie' ),
    'edit_item'          => __( 'Edit Movie' ),
    'new_item'           => __( 'New Movie' ),
    'all_items'          => __( 'All Movies' ),
    'view_item'          => __( 'View Movie' ),
    'search_items'       => __( 'Search Movies' ),
    'featured_image'     => 'Poster',
    'set_featured_image' => 'Add Poster'
  );
 
  // The arguments for our post type, to be entered as parameter 2 of register_post_type()
  $args = array(
    'labels'            => $labels,
    'description'       => 'Holds our movies and movie specific data',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'has_archive'       => true,
    'query_var'         => 'film'
  );
 
  // Call the actual WordPress function
  // Parameter 1 is a name for the post type
  // Parameter 2 is the $args array
  register_post_type( 'movie', $args);
}
 
// Hook <strong>lc_custom_post_movie_reviews()</strong> to the init action hook
add_action( 'init', 'lc_custom_post_movie_reviews' );
 
// The custom function to register a movie review post type
function lc_custom_post_movie_reviews() {
 
  // Set the labels, this variable is used in the $args array
  $labels = array(
    'name'               => __( 'Movie Reviews' ),
    'singular_name'      => __( 'Movie Review' ),
    'add_new'            => __( 'Add New Movie Review' ),
    'add_new_item'       => __( 'Add New Movie Review' ),
    'edit_item'          => __( 'Edit Movie Review' ),
    'new_item'           => __( 'New Movie Review' ),
    'all_items'          => __( 'All Movie Reviews' ),
    'view_item'          => __( 'View Movie Reviews' ),
    'search_items'       => __( 'Search Movie Reviews' )
  );
 
  // The arguments for our post type, to be entered as parameter 2 of register_post_type()
  $args = array(
    'labels'            => $labels,
    'description'       => 'Holds our movie reviews',
    'public'            => true,
    'menu_position'     => 6,
    'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'has_archive'       => true
    'register_meta_box_cb' => 'searchin_property_metaboxes'
  );
 
  // Call the actual WordPress function
  // Parameter 1 is a name for the post type
  // $args array goes in parameter 2.
  register_post_type( 'review', $args);

  add_action( 'admin_init', 'my_admin' );

  function my_admin() {
    add_meta_box( 'movie_review_meta_box',
        'Movie Review Details',
        'display_movie_review_meta_box',
        'review', 'normal', 'high'
    );
}
}