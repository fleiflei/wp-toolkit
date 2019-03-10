<?php
$flei_includes = [

	'admin-custom-columns.php', // custom image sizes
	'cpt.php',  // Custom Post Types

	'excerpt.php',
	'loop-query.php',
	'more-image-sizes.php', // custom image sizes
    'nav-wpml-lang-item.php', // WPML menu item added to end of menu
	'taxonomies.php',
	'theme-options.php',
	'tiny-mce.php',
	'tools.php',
	'visualcomposer.php',
	'wp-env-body-class.php',
	'admin-bar-env-ribbon.php',
    'menu-editor-custom-fields.php',

    // clean up
    'clean-up.php',
    'disable-comments.php',
    'disable-json-api.php',
    'disable-google-fonts-in-backend.php',
    'remove-emojis.php',

];

foreach ($flei_includes as $file) {
    require_once __DIR__ . '/flei-wp-toolkit/' . $file; // adjust path
}


