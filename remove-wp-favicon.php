<?php
/*
 * Removes default WP favicon
 */
add_filter( 'get_site_icon_url', '__return_false' );
