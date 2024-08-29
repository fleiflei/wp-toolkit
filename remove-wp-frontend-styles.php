<?php

add_theme_support('editor-gradient-presets', []);
add_theme_support('disable-custom-gradients', true);
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
