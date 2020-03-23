<?php

/**
 *
 * Registration unseres Custom Post Types "Portfolio"
 *

 */
function my_cpt_projects()
{
  $labels = [
    'name'               => 'Projects',
    'singular_name'      => 'Project',
    'menu_name'          => 'Projects',
    'parent_item_colon'  => '',
    'all_items'          => 'All Projects',
    'view_item'          => 'Show Project',
    'add_new_item'       => 'New Project',
    'add_new'            => 'Add',
    'edit_item'          => 'Edit Project',
    'update_item'        => 'Update Project',
    'search_items'       => '',
    'not_found'          => '',
    'not_found_in_trash' => '',
  ];
  $rewrite = [
    'slug'       => 'work',
    'with_front' => true,
    'pages'      => true,
    'feeds'      => true,
  ];
  $args = [
    'labels'              => $labels,
    'supports'            => ['title', 'excerpt', 'editor', 'thumbnail', 'revisions', 'comments'],
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
    'menu_icon'           => 'dashicons-hammer',
    'taxonomies'          => ['category', 'post_tag'],
  ];
  register_post_type('my_project', $args);
}

// Hook into the 'init' action
add_action('init', __NAMESPACE__.'\\my_cpt_projects', 20);

/**
 *
 * Registration unseres Custom Post Types "Directors"
 *

 */
function my_cpt_directors()
{
  $labels = [
    'name'               => 'Directors',
    'singular_name'      => 'Director',
    'menu_name'          => 'Directors',
    'parent_item_colon'  => '',
    'all_items'          => 'All Directors',
    'view_item'          => 'Show Director',
    'add_new_item'       => 'New Director',
    'add_new'            => 'Add',
    'edit_item'          => 'Edit Director',
    'update_item'        => 'Update Director',
    'search_items'       => '',
    'not_found'          => '',
    'not_found_in_trash' => '',
  ];
  $rewrite = [
    'slug'       => 'director',
    'with_front' => true,
    'pages'      => true,
    'feeds'      => true,
  ];
  $args = [
    'labels'              => $labels,
    'supports'            => ['title', 'excerpt', 'editor', 'thumbnail', 'revisions', 'comments'],
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
    'menu_icon'           => 'dashicons-businessman',
    'taxonomies'          => ['category', 'post_tag'],
  ];
  register_post_type('my_director', $args);
}

// Hook into the 'init' action
add_action('init', __NAMESPACE__.'\\my_cpt_directors', 20);
