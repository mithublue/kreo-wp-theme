<?php

add_action( 'init', function() {
    register_post_type( 'kreo_project', array(
        'labels'             => array(
            'name'               => _x( 'kreo_project', 'post type general name', 'kreo' ),
            'singular_name'      => _x( 'Project', 'post type singular name', 'kreo' ),
            'menu_name'          => _x( 'Project', 'admin menu', 'kreo' ),
            'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'kreo' ),
            'add_new'            => _x( 'Add New', 'Project', 'kreo' ),
            'add_new_item'       => __( 'Add New Project', 'kreo' ),
            'new_item'           => __( 'New Project', 'kreo' ),
            'edit_item'          => __( 'Edit Project', 'kreo' ),
            'view_item'          => __( 'View Project', 'kreo' ),
            'all_items'          => __( 'All Project', 'kreo' ),
            'search_items'       => __( 'Search Project', 'kreo' ),
            'parent_item_colon'  => __( 'Parent Project:', 'kreo' ),
            'not_found'          => __( 'No Additional Projects found.', 'kreo' ),
            'not_found_in_trash' => __( 'No Additional Projects found in Trash.', 'kreo' )
        ),
        'description'        => __( 'Description.', 'kreo' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'kreo-project' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'menu_position'      => null
    ) );
    register_post_type( 'kreo_service', array(
        'labels'             => array(
            'name'               => _x( 'kreo_service', 'post type general name', 'kreo' ),
            'singular_name'      => _x( 'Service', 'post type singular name', 'kreo' ),
            'menu_name'          => _x( 'Service', 'admin menu', 'kreo' ),
            'name_admin_bar'     => _x( 'Service', 'add new on admin bar', 'kreo' ),
            'add_new'            => _x( 'Add New', 'Service', 'kreo' ),
            'add_new_item'       => __( 'Add New Service', 'kreo' ),
            'new_item'           => __( 'New Service', 'kreo' ),
            'edit_item'          => __( 'Edit Service', 'kreo' ),
            'view_item'          => __( 'View Service', 'kreo' ),
            'all_items'          => __( 'All Service', 'kreo' ),
            'search_items'       => __( 'Search Service', 'kreo' ),
            'parent_item_colon'  => __( 'Parent Service:', 'kreo' ),
            'not_found'          => __( 'No Additional Services found.', 'kreo' ),
            'not_found_in_trash' => __( 'No Additional Services found in Trash.', 'kreo' )
        ),
        'description'        => __( 'Description.', 'kreo' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'kreo-service' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'menu_position'      => null
    ) );
    register_post_type( 'kreo_member', array(
        'labels'             => array(
            'name'               => _x( 'kreo_member', 'post type general name', 'kreo' ),
            'singular_name'      => _x( 'Member', 'post type singular name', 'kreo' ),
            'menu_name'          => _x( 'Member', 'admin menu', 'kreo' ),
            'name_admin_bar'     => _x( 'Member', 'add new on admin bar', 'kreo' ),
            'add_new'            => _x( 'Add New', 'Member', 'kreo' ),
            'add_new_item'       => __( 'Add New Member', 'kreo' ),
            'new_item'           => __( 'New Member', 'kreo' ),
            'edit_item'          => __( 'Edit Member', 'kreo' ),
            'view_item'          => __( 'View Member', 'kreo' ),
            'all_items'          => __( 'All Member', 'kreo' ),
            'search_items'       => __( 'Search Member', 'kreo' ),
            'parent_item_colon'  => __( 'Parent Member:', 'kreo' ),
            'not_found'          => __( 'No Additional Members found.', 'kreo' ),
            'not_found_in_trash' => __( 'No Additional Members found in Trash.', 'kreo' )
        ),
        'description'        => __( 'Description.', 'kreo' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'kreo-member' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'menu_position'      => null
    ) );
    register_post_type( 'kreo_testimonial', array(
        'labels'             => array(
            'name'               => _x( 'kreo_testimonial', 'post type general name', 'kreo' ),
            'singular_name'      => _x( 'Testimonial', 'post type singular name', 'kreo' ),
            'menu_name'          => _x( 'Testimonial', 'admin menu', 'kreo' ),
            'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'kreo' ),
            'add_new'            => _x( 'Add New', 'Testimonial', 'kreo' ),
            'add_new_item'       => __( 'Add New Testimonial', 'kreo' ),
            'new_item'           => __( 'New Testimonial', 'kreo' ),
            'edit_item'          => __( 'Edit Testimonial', 'kreo' ),
            'view_item'          => __( 'View Testimonial', 'kreo' ),
            'all_items'          => __( 'All Testimonial', 'kreo' ),
            'search_items'       => __( 'Search Testimonial', 'kreo' ),
            'parent_item_colon'  => __( 'Parent Testimonial:', 'kreo' ),
            'not_found'          => __( 'No Additional Testimonials found.', 'kreo' ),
            'not_found_in_trash' => __( 'No Additional Testimonials found in Trash.', 'kreo' )
        ),
        'description'        => __( 'Description.', 'kreo' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'kreo-testimonial' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'supports'           => array( 'title', 'editor' ),
        'menu_position'      => null
    ) );
    register_post_type( 'kreo_slider', array(
        'labels'             => array(
            'name'               => _x( 'kreo_slider', 'post type general name', 'kreo' ),
            'singular_name'      => _x( 'Slide', 'post type singular name', 'kreo' ),
            'menu_name'          => _x( 'Slide', 'admin menu', 'kreo' ),
            'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'kreo' ),
            'add_new'            => _x( 'Add New', 'Slide', 'kreo' ),
            'add_new_item'       => __( 'Add New Slide', 'kreo' ),
            'new_item'           => __( 'New Slide', 'kreo' ),
            'edit_item'          => __( 'Edit Slide', 'kreo' ),
            'view_item'          => __( 'View Slide', 'kreo' ),
            'all_items'          => __( 'All Slide', 'kreo' ),
            'search_items'       => __( 'Search Slide', 'kreo' ),
            'parent_item_colon'  => __( 'Parent Slide:', 'kreo' ),
            'not_found'          => __( 'No Additional Slides found.', 'kreo' ),
            'not_found_in_trash' => __( 'No Additional Slides found in Trash.', 'kreo' )
        ),
        'description'        => __( 'Description.', 'kreo' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'kreo-slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'supports'           => array( 'title', 'editor' ),
        'menu_position'      => null
    ) );

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Project Category', 'taxonomy general name' ),
        'singular_name'     => _x( 'Project Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Project Categories' ),
        'all_items'         => __( 'All Project Categories' ),
        'parent_item'       => __( 'Parent Project Category' ),
        'parent_item_colon' => __( 'Parent Project Category:' ),
        'edit_item'         => __( 'Edit Project Category' ),
        'update_item'       => __( 'Update Project Category' ),
        'add_new_item'      => __( 'Add New Project Category' ),
        'new_item_name'     => __( 'New Project Category Name' ),
        'menu_name'         => __( 'Project Category' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'genre' ),
    );

    register_taxonomy( 'project_category', array( 'kreo_project' ), $args );

});