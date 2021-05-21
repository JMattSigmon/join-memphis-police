<?php


function create_post_type_recruiter()
{
    register_post_type('recruiter', array(
    'labels' => array(
    'name' => __('Recruiters', 'mem'),
    'singular_name' => __('Recruiter', 'mem'),
    'add_new' => __('Add New', 'mem'),
    'add_new_item' => __('Add New Recruiter', 'mem'),
    'edit' => __('Edit', 'mem'),
    'edit_item' => __('Edit Recruite', 'mem'),
    'new_item' => __('New Recruite', 'mem'),
    'view' => __('View Recruiters', 'mem'),
    'view_item' => __('View Recruiter', 'mem'),
    'search_items' => __('Search Recruiters', 'mem'),
    'not_found' => __('No Recruiters found', 'mem'),
    'not_found_in_trash' => __('No Recruiters found in Trash', 'mem')
  ),
  'menu_icon' => 'dashicons-megaphone',
  'exclude_from_search' => false,
  'public' => true,
  'query_var' => true,
  'hierarchical' => true,
  'has_archive' => true,
  'rewrite' => array( 'slug' => 'recruiter', 'with_front' => false, 'hierarchical' => true),
  'supports' => array( 'title' ), // Add page-attributes to enable menu_order which allows back-end sorting
  'can_export' => true
));
}
add_action('init', 'create_post_type_recruiter'); // Add Recruiter CPT

// Remove Unnecessary Yoast columns
function recruiter_remove_columns($columns)
{
    unset($columns['wpseo-score']);
    unset($columns['wpseo-title']);
    unset($columns['wpseo-metadesc']);
    unset($columns['wpseo-focuskw']);
    unset($columns['wpseo-score-readability']);
    unset($columns['wpseo-links']);

    return $columns;
}
add_filter('manage_recruiter_posts_columns', 'recruiter_remove_columns', 11);