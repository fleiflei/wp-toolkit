<?php

function flei_custom_admin_columns_projects($columns)
{
  $columns = [
    'cb'        => '<input type="checkbox" />',
    'thumbnail' => 'Thumbnail',
    'title'     => 'Title',
    'featured'  => 'Featured',
    'author'    => 'Author',
    'date'      => 'Date',
  ];

  return $columns;
}

function my_custom_columns($column)
{
  global $post;
  if ($column == 'thumbnail') {
    echo wp_get_attachment_image(get_field('page_image', $post->ID), [200, 200]);
  } elseif ($column == 'featured') {
    if (get_field('featured')) {
      echo 'Yes';
    } else {
      echo 'No';
    }
  }
}

add_action("manage_my_project_custom_column", "my_custom_columns");
add_filter("manage_edit-page_columns", "flei_custom_admin_columns_projects");
