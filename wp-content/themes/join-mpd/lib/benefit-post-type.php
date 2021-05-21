<?php


function create_post_type_benefit()
{
    register_post_type('benefit', array(
    'labels' => array(
    'name' => __('Benefits', 'mem'),
    'singular_name' => __('Benefit', 'mem'),
    'add_new' => __('Add New', 'mem'),
    'add_new_item' => __('Add New Benefit', 'mem'),
    'edit' => __('Edit', 'mem'),
    'edit_item' => __('Edit Benefit', 'mem'),
    'new_item' => __('New Benefit', 'mem'),
    'view' => __('View Benefits', 'mem'),
    'view_item' => __('View Benefit', 'mem'),
    'search_items' => __('Search Benefits', 'mem'),
    'not_found' => __('No Benefits found', 'mem'),
    'not_found_in_trash' => __('No Benefits found in Trash', 'mem')
  ),
  'menu_icon' => 'dashicons-saved',
  'exclude_from_search' => false,
  'public' => true,
  'query_var' => true,
  'hierarchical' => true,
  'has_archive' => true,
  'show_in_rest' => true,
  'rewrite' => array( 'slug' => 'benefit', 'with_front' => false, 'hierarchical' => true),
  'supports' => array( 'title', 'editor' ), // Add page-attributes to enable menu_order which allows back-end sorting
  'can_export' => true
));
}
add_action('init', 'create_post_type_benefit'); // Add benefit CPT

// Remove Unnecessary Yoast columns
function benefit_remove_columns($columns)
{
    unset($columns['wpseo-score']);
    unset($columns['wpseo-title']);
    unset($columns['wpseo-metadesc']);
    unset($columns['wpseo-focuskw']);
    unset($columns['wpseo-score-readability']);
    unset($columns['wpseo-links']);

    return $columns;
}
add_filter('manage_benefit_posts_columns', 'benefit_remove_columns', 11);