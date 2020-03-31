<?php 

// Enqueue styles
function twentytwenty_child_enqueue_styles(){

    //Parent style
    wp_enqueue_style('twentytwenty-style', get_template_directory_uri() . '/style.css');

    //child style
    wp_enqueue_style('twentytwenty-child-style', 
        get_stylesheet_directory_uri() . '/style.css',
        array('twentytwenty-style'));

}
add_action('wp_enqueue_scripts', 'twentytwenty_child_enqueue_styles');