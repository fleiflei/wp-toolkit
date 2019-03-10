<?php
if ( defined('WP_ENV') && WP_ENV == 'development') {

	add_filter( 'body_class', 'wp_env_body_classes' );
	function wp_env_body_classes( $classes ) {

		$classes[] = 'env-'.WP_ENV;

		return $classes;

	}
}
