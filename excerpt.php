<?php

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function flei_custom_excerpt_length($length)
{
    return 25;
}

add_filter('excerpt_length', __NAMESPACE__ . '\\flei_custom_excerpt_length', 999);

function flei_excerpt_more($more)
{
//    global $post;
    return '...';
//    $more_text = '...';
//    return '… <a href="'. get_permalink($post->ID) . '">' . $more_text . '</a>';
}

add_filter('excerpt_more', __NAMESPACE__ . '\\flei_excerpt_more');



/**
 * Add Excerpt to Pages
 */

function flei_page_supports()
{
    add_post_type_support('page', array('excerpt'));

}

add_action('init', __NAMESPACE__ . '\\flei_page_supports', 10);