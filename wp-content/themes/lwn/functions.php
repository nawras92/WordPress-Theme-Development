<?php

// Theme support
add_theme_support('post-thumbnails');

function lwn_enqueue_stylesheets(){
    wp_enqueue_style('lwn-stylesheet',get_stylesheet_uri());
    wp_style_add_data('lwn-stylesheet', 'rtl', 'replace');

}
add_action('wp_enqueue_scripts','lwn_enqueue_stylesheets');



// LWN menus

function lwn_register_menus(){
    $args = array('main-menu'=> 'Main Menu');
    register_nav_menus($args);
}
add_action('init', 'lwn_register_menus');

// LWN widgets
function lwn_register_widgets(){
    $footer1 = array(
               'name' => 'Footer Column 1',
               'id' => 'footer1',
               'before_widget'=> '<div id="%1$s" class="widget lwn-widget %2$s">',
               'after_widget' => '</div>',
               'before_title' => '<h4>',
               'after_title'=> '</h4>'

    );
    register_sidebar($footer1);

    $footer2 = array(
        'name' => 'Footer Column 2',
        'id' => 'footer2',
        'before_widget'=> '<div id="%1$s" class="widget lwn-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title'=> '</h4>'

);
register_sidebar($footer2);

    $footer3 = array(
        'name' => 'Footer Column 3',
        'id' => 'footer3',
        'before_widget'=> '<div id="%1$s" class="widget lwn-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title'=> '</h4>'

    );
    register_sidebar($footer3);
}
add_action('widgets_init', 'lwn_register_widgets');
































