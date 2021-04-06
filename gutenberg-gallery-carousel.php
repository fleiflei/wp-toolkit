<?php

/**
 * Outputs Gutenberg's built-in gallery block as a Bootstrap 4 carousel
 * Added: 06.04.2021
 */

add_filter('render_block', function ($block_content, $block) {
    if ('core/gallery' !== $block['blockName']) {
        return $block_content;
    }

    $block_id = 'block-gallery-' . uniqid();

    $block_content = '<div id="' . $block_id . '" class="block-carousel carousel slide" data-ride="carousel"><div class="carousel-inner">';

    $indicators = '';
    $slides     = '';

    foreach ($block['attrs']['ids'] as $idx => $att_id) {

        if (count($block['attrs']['ids']) > 1) {
            $indicators .= '<li data-target="#' . $block_id . '" data-slide-to="' . $idx . '" ' . ($idx === 0 ? ' class="active"' : '') . '></li>';
        }
        $slides .= '<div class="carousel-item' . ($idx === 0 ? ' active' : '') . '">';
        $slides .= wp_get_attachment_image($att_id, 'carousel-lg');
        $slides .= '</div>';
    }

    if ($indicators) {
        $block_content .= '<ol class="carousel-indicators">' . $indicators . '</ol>';
    }
    $block_content .= $slides;


    if (count($block['attrs']['ids']) > 1) {
        $block_content .= '<a class="carousel-control-prev" href="#' . $block_id . '" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#' . $block_id . '" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>';
    }

    $block_content .= '</div></div>';

    return $block_content;
}, 10, 2);
