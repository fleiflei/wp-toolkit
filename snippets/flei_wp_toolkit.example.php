<?php

/**
 * Include static snippets that don't need to be modified by themselves.
 */
$flei_tools = [
    'admin-bar-env-ribbon.php',
    'clean-up.php',
    'disable-author-archives.php',
    'disable-comments.php',
    'disable-feeds.php',
    'disable-google-fonts-in-backend.php',
    'excerpt.php',
    'gutenberg-gallery-carousel.php',
    'laravel-mix.php',
    'remove-emojis.php',
    'remove-wp-favicon.php',
    'sanitize-filenames.php',
    'tools.php',
    'wp-env-body-class.php',
    'hide-users-from-rest-api.php',
    'remove-wp-frontend-styles.php',
    'active_users.php',
];

foreach ($flei_tools as $file) {
    require_once __DIR__ . '/wp-toolkit/' . $file; // adjust path
}

/**
 * Copy a snippet from the repositories "snippets" folder next to this file,
 * remove ".example" from the filename, adjust it to your needs and uncomment below.
 */
$flei_snippets = [
    //    'admin-custom-columns.php',
    //    'cpt.php',
    //    'gutenberg-disable-blocks.php',
    //    'loop-query.php',
    //    'more-image-sizes.php',
    //    'taxonomies.php',
    //    'theme-options.php',
    //    'tiny-mce.php',
    //    'visualcomposer.php',
];

foreach ($flei_snippets as $file) {
    require_once __DIR__ . '/' . $file; // adjust path
}


