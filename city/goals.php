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
