<?php

// Link stylesheets
function lwn_bookcenter_enqueue_stylesheets(){
    wp_enqueue_style('lwn-bookcenter-stylesheet', get_stylesheet_uri());
    wp_style_add_data('lwn-bookcenter-stylesheet', 'rtl', 'replace');
}
add_action('wp_enqueue_scripts', 'lwn_bookcenter_enqueue_stylesheets');

// Add thumbnail support
add_theme_support('post-thumbnails');


// Register custom post types (Book)
function lwn_bookcenter_register_book_custom_post_type() {
    $labels = array(
        'name'                  => _x( 'Books', 'lwn-bookcenter' ),
        'singular_name'         => _x( 'Book', 'lwn-bookcenter' ),
        'menu_name'             => _x( 'Books', 'lwn-bookcenter' ),
        'name_admin_bar'        => _x( 'Book', 'lwn-bookcenter' ),
        'add_new'               => __( 'Add New', 'lwn-bookcenter' ),
        'add_new_item'          => __( 'Add New Book', 'lwn-bookcenter' ),
        'new_item'              => __( 'New Book', 'lwn-bookcenter' ),
        'edit_item'             => __( 'Edit Book', 'lwn-bookcenter' ),
        'view_item'             => __( 'View Book', 'lwn-bookcenter' ),
        'all_items'             => __( 'All Books', 'lwn-bookcenter' ),
        'search_items'          => __( 'Search Books', 'lwn-bookcenter' ),
        'parent_item_colon'     => __( 'Parent Books:', 'lwn-bookcenter' ),
        'not_found'             => __( 'No books found.', 'lwn-bookcenter' ),
        'not_found_in_trash'    => __( 'No books found in Trash.', 'lwn-bookcenter' ),
        'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'lwn-bookcenter' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'lwn-bookcenter' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'lwn-bookcenter' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'lwn-bookcenter' ),
        'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'lwn-bookcenter' ),
        'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'lwn-bookcenter' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'lwn-bookcenter' ),
        'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'lwn-bookcenter' ),
        'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'lwn-bookcenter' ),
        'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'lwn-bookcenter' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'book' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt',),
    );
 
    register_post_type( 'book', $args );
}
 
add_action( 'init', 'lwn_bookcenter_register_book_custom_post_type' );