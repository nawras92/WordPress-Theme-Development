<?php


function lwn_enqueue_stylesheets(){
    wp_enqueue_style('lwn-stylesheet',get_stylesheet_uri());
    wp_style_add_data('lwn-stylesheet', 'rtl', 'replace');

}
add_action('wp_enqueue_scripts','lwn_enqueue_stylesheets');
