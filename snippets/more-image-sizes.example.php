<?php

/**
 * Define new image sizes
 *
 * @version 1.0
 * @date    21.06.2016
 * @author  flei
 *
 */

$img_size_full = 1920;
$img_size_lg = 1300;
$img_size_md = 992;
$img_size_sm = 768;
$img_size_xs = 320;

$img_landscape_factor = 0.5;
$img_scraper_factor = 0.5;

//add_image_size('project-main-image-lg', $img_size_lg, round($img_size_lg * (641/1140)), true);
add_image_size('fullscreen-bg-lg', $img_size_lg, round($img_size_lg * (780 / 1366)), true);
add_image_size('fullscreen-bg-md', $img_size_md, round($img_size_md * (780 / 1366)), true);
add_image_size('fullscreen-bg-sm', $img_size_sm, round($img_size_sm * (780 / 1366)), true);
add_image_size('fullscreen-bg-xs', $img_size_xs, round($img_size_xs * (780 / 1366)), true);

add_image_size('video-thumbnail-lg', $img_size_lg, round($img_size_lg * (280 / 500)), true);
add_image_size('video-thumbnail-md', $img_size_md, round($img_size_md * (280 / 500)), true);
add_image_size('video-thumbnail-sm', $img_size_sm, round($img_size_sm * (280 / 500)), true);
add_image_size('video-thumbnail-xs', $img_size_xs / 2, round($img_size_xs / 2 * (280 / 500)), true);

add_image_size('teaser-bg-lg', $img_size_lg, round($img_size_lg * (434 / 1366)), true);
add_image_size('teaser-bg-md', $img_size_md, round($img_size_md * (434 / 1366)), true);
add_image_size('teaser-bg-sm', $img_size_sm, round($img_size_sm * (434 / 1366)), true);
add_image_size('teaser-bg-xs', $img_size_xs, round($img_size_xs * (434 / 1366)), true);

add_image_size('landscape-full', $img_size_full, round($img_size_full * $img_landscape_factor), true);
add_image_size('landscape-lg', $img_size_lg, round($img_size_lg * $img_landscape_factor), true);
add_image_size('landscape-md', $img_size_md, round($img_size_md * $img_landscape_factor), true);
add_image_size('landscape-sm', $img_size_sm, round($img_size_sm * $img_landscape_factor), true);
add_image_size('landscape-xs', $img_size_xs, round($img_size_xs * $img_landscape_factor), true);
//
//add_image_size('scraper-lg', round($img_size_lg * $img_scraper_factor), $img_size_lg, true);
//add_image_size('scraper-md', round($img_size_md * $img_scraper_factor), $img_size_md, true);
//add_image_size('scraper-sm', round($img_size_sm * $img_scraper_factor), $img_size_sm, true);
//add_image_size('scraper-xs', round($img_size_xs * $img_scraper_factor), $img_size_xs, true);

add_image_size('lg', $img_size_lg, $img_size_lg);
add_image_size('md', $img_size_md, $img_size_md);
add_image_size('sm', $img_size_sm, $img_size_sm);
add_image_size('xs', $img_size_xs, $img_size_xs);

add_image_size('lg-cropped', $img_size_lg, $img_size_lg, true);
add_image_size('md-cropped', $img_size_md, $img_size_md, true);
add_image_size('sm-cropped', $img_size_sm, $img_size_sm, true);
add_image_size('xs-cropped', $img_size_xs, $img_size_xs, true);
