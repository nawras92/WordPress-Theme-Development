<?php

// Link stylesheets
function lwn_bookcenter_enqueue_stylesheets(){
    wp_enqueue_style('lwn-bookcenter-stylesheet', get_stylesheet_uri());
    wp_style_add_data('lwn-bookcenter-stylesheet', 'rtl', 'replace');
}
add_action('wp_enqueue_scripts', 'lwn_bookcenter_enqueue_stylesheets');