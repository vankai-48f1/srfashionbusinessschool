<?php
$portfolio = new CPT(
    array(
        'post_type_name' => 'courses',
        'singular' => __('Courses', 'kai'),
        'plural' => __('Courses', 'kai'),
        'slug' => 'courses'
    ),
    array(
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'post-formats', 'custom-fields', 'page-attributes'),
        'menu_icon' => 'dashicons-list-view',
    )
);
$portfolio->register_taxonomy(array(
    'taxonomy_name' => 'courses-list',
    'singular' => __('Courses List', 'kai'),
    'plural' => __('Courses Lists', 'kai'),
    'slug' => 'courses-list',
    'hierarchical'               => true,
));
