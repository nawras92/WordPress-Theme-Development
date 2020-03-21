<?php

// Link stylesheets
function lwn_bookcenter_enqueue_stylesheets(){
    wp_enqueue_style('lwn-bookcenter-stylesheet', get_stylesheet_uri());
    wp_style_add_data('lwn-bookcenter-stylesheet', 'rtl', 'replace');
}
add_action('wp_enqueue_scripts', 'lwn_bookcenter_enqueue_stylesheets');

// Add thumbnail support
add_theme_support('post-thumbnails');

// Register menus
function lwn_bookcenter_register_menu(){
	register_nav_menu('main-menu', 'Main Menu');
}
add_action('init', 'lwn_bookcenter_register_menu');


// Register custom taxonomies (book_type, writer, publisher)
function lwn_bookcenter_register_custom_taxonomies() {
	// Register book_type
	$booktype_labels = array(
		'name'              => _x( 'Book Types', 'taxonomy general name', 'lwn-bookcenter' ),
		'singular_name'     => _x( 'Book Type', 'taxonomy singular name', 'lwn-bookcenter' ),
		'search_items'      => __( 'Search Book Types', 'lwn-bookcenter' ),
		'all_items'         => __( 'All Book Types', 'lwn-bookcenter' ),
		'parent_item'       => __( 'Parent Book Type', 'lwn-bookcenter' ),
		'parent_item_colon' => __( 'Parent Book Type:', 'lwn-bookcenter' ),
		'edit_item'         => __( 'Edit Book Type', 'lwn-bookcenter' ),
		'update_item'       => __( 'Update Book Type', 'lwn-bookcenter' ),
		'add_new_item'      => __( 'Add New Book Type', 'lwn-bookcenter' ),
		'new_item_name'     => __( 'New Book Type Name', 'lwn-bookcenter' ),
		'menu_name'         => __( 'Book Type', 'lwn-bookcenter' ),
	);

	$booktype_args = array(
		'hierarchical'      => true,
		'labels'            => $booktype_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'book-type' ),
	);

	register_taxonomy( 'book_type', array( 'book' ), $booktype_args );

	// Register Writer Taxonomy
	$writer_labels = array(
		'name'                       => _x( 'Writers', 'taxonomy general name', 'lwn-bookcenter' ),
		'singular_name'              => _x( 'Writer', 'taxonomy singular name', 'lwn-bookcenter' ),
		'search_items'               => __( 'Search Writers', 'lwn-bookcenter' ),
		'popular_items'              => __( 'Popular Writers', 'lwn-bookcenter' ),
		'all_items'                  => __( 'All Writers', 'lwn-bookcenter' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Writer', 'lwn-bookcenter' ),
		'update_item'                => __( 'Update Writer', 'lwn-bookcenter' ),
		'add_new_item'               => __( 'Add New Writer', 'lwn-bookcenter' ),
		'new_item_name'              => __( 'New Writer Name', 'lwn-bookcenter' ),
		'separate_items_with_commas' => __( 'Separate writers with commas', 'lwn-bookcenter' ),
		'add_or_remove_items'        => __( 'Add or remove writers', 'lwn-bookcenter' ),
		'choose_from_most_used'      => __( 'Choose from the most used writers', 'lwn-bookcenter' ),
		'not_found'                  => __( 'No writers found.', 'lwn-bookcenter' ),
		'menu_name'                  => __( 'Writers', 'lwn-bookcenter' ),
	);

	$writer_args = array(
		'hierarchical'          => false,
		'labels'                => $writer_labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'writer' ),
	);

    register_taxonomy( 'writer', 'book', $writer_args );
    
    // Register Publisher Taxonomy
	$publisher_labels = array(
		'name'                       => _x( 'Publishers', 'help text', 'taxonomy general name', 'lwn-bookcenter' ),
		'singular_name'              => _x( 'Publisher', 'help text', 'taxonomy singular name', 'lwn-bookcenter' ),
		'search_items'               => __( 'Search Publishers', 'lwn-bookcenter' ),
		'popular_items'              => __( 'Popular Publishers', 'lwn-bookcenter' ),
		'all_items'                  => __( 'All Publishers', 'lwn-bookcenter' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Publisher', 'lwn-bookcenter' ),
		'update_item'                => __( 'Update Publisher', 'lwn-bookcenter' ),
		'add_new_item'               => __( 'Add New Publisher', 'lwn-bookcenter' ),
		'new_item_name'              => __( 'New Publisher Name', 'lwn-bookcenter' ),
		'separate_items_with_commas' => __( 'Separate Publishers with commas', 'lwn-bookcenter' ),
		'add_or_remove_items'        => __( 'Add or remove Publishers', 'lwn-bookcenter' ),
		'choose_from_most_used'      => __( 'Choose from the most used Publishers', 'lwn-bookcenter' ),
		'not_found'                  => __( 'No Publishers found.', 'lwn-bookcenter' ),
		'menu_name'                  => __( 'Publishers', 'lwn-bookcenter' ),
	);

	$publisher_args = array(
		'hierarchical'          => false,
		'labels'                => $publisher_labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'publisher' ),
	);

	register_taxonomy( 'publisher', 'book', $publisher_args );
}
add_action( 'init', 'lwn_bookcenter_register_custom_taxonomies', 0 );



// Register custom post types (Book)
function lwn_bookcenter_register_book_custom_post_type() {
    $labels = array(
        'name'                  => _x( 'Books', 'help text', 'lwn-bookcenter' ),
        'singular_name'         => _x( 'Book', 'help text', 'lwn-bookcenter' ),
        'menu_name'             => _x( 'Books', 'help text', 'lwn-bookcenter' ),
        'name_admin_bar'        => _x( 'Book', 'help text', 'lwn-bookcenter' ),
        'add_new'               => __( 'Add New', 'lwn-bookcenter' ),
        'add_new_item'          => __( 'Add New Book', 'lwn-bookcenter' ),
        'new_item'              => __( 'New Book', 'lwn-bookcenter' ),
        'edit_item'             => __( 'Edit Book', 'lwn-bookcenter' ),
        'view_item'             => __( 'View Book', 'lwn-bookcenter' ),
        'all_items'             => __( 'All Books', 'lwn-bookcenter' ),
        'search_items'          => __( 'Search Books', 'lwn-bookcenter' ),
        'parent_item_colon'     => __( 'Parent Books:', 'lwn-bookcenter' ),
        'not_found'             => __( 'No books found.', 'lwn-bookcenter' ),
        'not_found_in_trash'    => __( 'No books found in Trash.', 'help text', 'lwn-bookcenter' ),
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



// THeme customizer 
function lwn_bookcenter_theme_customizer($wp_customize){


	$wp_customize->add_setting('lwn_bookcenter_footer_text',array(
		'default'=> __("all copyrights reserverd ", 'lwn-bookcenter'),
		'type'=>'theme_mod'

	));

	$wp_customize->add_control('lwn_bookcenter_footer_text', array(
		'setting'=> 'lwn_bookcenter_footer_text',
		'label' => __('Footer Text', 'lwn-bookcenter'),
		'type' => 'textarea',
		'section'=> 'lwn_bookcenter_footer_text_section'
	));

	$wp_customize->add_section('lwn_bookcenter_footer_text_section', array(

		'title'=> __('Footer Text Section', 'lwn-bookcenter'),
		'description'=>__('You can customize footer text in here', 'lwn-bookcenter'),
		'description_hidden'=> true

	));


	// Add frontpage boxes 

	for ($item=1 ; $item<= 3; $item++){

		$section_id = 'lwn_bookcenter_box' .  $item  . '_section';
		$section_title = 'Box ' . $item;
		$section_desc = 'Edit the title and description of box ' . $item;

		$wp_customize->add_section($section_id, array(
			'title' => __($section_title, 'lwn-bookcenter'),
			'description' => __($section_desc, 'lwn-bookcenter'),
			'description_hidden' => false,
			'panel' => 'lwn_bookcenter_frontpage_boxes'	
		));	
		
		$setting_title_id = 'lwn_bookcenter_box' . $item . '_title';
		$setting_default_title = 'Box ' . $item . ' Title';
		$control_title_label = 'Box ' . $item . ' Title';

		$wp_customize->add_setting($setting_title_id, array(
		
			'default' => __($setting_default_title, 'lwn-bookcenter'),
			'type' => 'theme_mod'
		));
	
		$wp_customize->add_control($setting_title_id, array(
			'label' => __($control_title_label, 'lwn-bookcenter'),
			'type' => 'text',
			'section' => $section_id
		));

		$setting_desc_id = 'lwn_bookcenter_box' . $item . '_desc';
		$setting_default_desc = 'Box ' . $item . ' Description';
		$control_desc_label = 'Box ' . $item . ' Description';		

		$wp_customize->add_setting($setting_desc_id, array(
		
			'default' => __($setting_default_desc, 'lwn-bookcenter'),
			'type' => 'theme_mod'
		));
	
		$wp_customize->add_control($setting_desc_id, array(
			'label' => __($control_desc_label, 'lwn-bookcenter'),
			'type' => 'textarea',
			'section' => $section_id
		));

	}

	$wp_customize->add_panel('lwn_bookcenter_frontpage_boxes', array(
		'title' => __('Frontpage Boxes', 'lwn-bookcenter'),
		'description' => __('You can edit frontpage boxes here', 'lwn-bookcenter')
	));

	// Add frontpage boxes options
	$wp_customize->add_section('lwn_bookcenter_frontpage_boxes_options', array(
		'title' => __('Frontpage boxes options', 'lwn-bookcenter'),
		'description' => __('You can edit frontboxes options here', 'lwn-bookcenter'),
		'description_hidden' => false,
		'panel' => 'lwn_bookcenter_frontpage_boxes'	
	));	


	$wp_customize->add_setting('lwn_bookcenter_display_frontpage_boxes', array(
		'default' => 1
	));

	$wp_customize->add_control('lwn_bookcenter_display_frontpage_boxes', array(
		'section' => 'lwn_bookcenter_frontpage_boxes_options',
		'label' => __('Display frontpage boxes?', 'lwn-bookcenter'),
		'type' => 'radio',
		'choices' => array(1 =>'Yes', 0 => 'No'),
	));

	$wp_customize->add_setting('lwn_bookcenter_frontpage_boxes_count', array(
		'default' => 3
	));

	$wp_customize->add_control('lwn_bookcenter_frontpage_boxes_count', array(
		'section' => 'lwn_bookcenter_frontpage_boxes_options',
		'label' => __('How many boxes do you want to display?', 'lwn-bookcenter'),
		'type' => 'select',
		'choices' => array(1 => 'one box', 
						   2 => 'two boxes', 
						   3 => 'three boxes'),
	));


	// Theme color section
	$wp_customize->add_section('lwn_bookcenter_theme_colors', array(
		'title' => __('Theme Colors', 'lwn-bookcenter'),
		'description' => __('You can edit theme colors here', 'lwn-bookcenter')
	));

	$wp_customize->add_setting('lwn_bookcenter_primary_color', array(
		'default' => '#ffd500',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
	'lwn_bookcenter_primary_color', array(
		'section' => 'lwn_bookcenter_theme_colors',
		'label' => __('Pick theme primary color', 'lwn-bookcenter')
	)));

	$wp_customize->add_setting('lwn_bookcenter_secondary_color', array(
		'default' => '#06451b',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
	'lwn_bookcenter_secondary_color', array(
		'section' => 'lwn_bookcenter_theme_colors',
		'label' => __('Pick theme secondary color', 'lwn-bookcenter')
	)));


	$wp_customize->add_section('lwn_bookcenter_media_section', array(
		'title' => __('Media Section', 'lwn-bookcenter')
	));

	$wp_customize->add_setting('lwn_bookcenter_default_thumbnail', array(
		'default'=> '',
	));

	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'lwn_bookcenter_default_thumbnail',
		array(
			'section' => 'lwn_bookcenter_media_section',
			'label' => __('Default Thumbnail', 'lwn-bookcenter'),
			'flex_width' => false,
			'flex_height' => false,
			'height' => '400',
			'width' => '200'
		)));

	
}
add_action('customize_register', 'lwn_bookcenter_theme_customizer');


// show theme modifications
function lwn_bookcenter_display_theme_modification(){

	$output = array();
	$output['footer_text'] = get_theme_mod('lwn_bookcenter_footer_text');

	// frontpage boxes
	for ($item=1;$item<=3; $item++){
		$output['box' . $item .'_title'] = get_theme_mod('lwn_bookcenter_box' . $item .'_title');
		$output['box'. $item. '_desc'] = get_theme_mod('lwn_bookcenter_box' . $item .'_desc');		
	}

	$output['display_frontpage_boxes'] = get_theme_mod('lwn_bookcenter_display_frontpage_boxes');
	$output['frontpage_boxes_count'] = get_theme_mod('lwn_bookcenter_frontpage_boxes_count');

	$output['default_thumbnail'] = get_theme_mod('lwn_bookcenter_default_thumbnail', '');
	return $output;
}
add_action('init', 'lwn_bookcenter_display_theme_modification');


// Display custom css
function lwn_bookcenter_custom_css(){
	$primary_color = get_theme_mod('lwn_bookcenter_primary_color', '#ffd500');
	$secondary_color = get_theme_mod('lwn_bookcenter_secondary_color', '#06451b');

	echo <<< START
		<style id="theme-basic-color">
		:root{
			--primary-color: $primary_color;
			--secondary-color: $secondary_color;
		}
		</style>

	START;
}
add_action('wp_head', 'lwn_bookcenter_custom_css');






