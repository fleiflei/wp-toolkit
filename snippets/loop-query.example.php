<?php
/**
 * Created by PhpStorm.
 * User: flei
 * Date: 14.08.17
 * Time: 13:48
 */

// My function to modify the main query object
function flei_loop_query( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) { // Run only on the homepage
		$query->query_vars['cat']            = - 2; // Exclude my featured category because I display that elsewhere
		$query->query_vars['posts_per_page'] = 5; // Show only 5 posts on the homepage only
	}

	if ( ! is_admin() && isset( $query->query_vars['post_type'] ) ) {

		$post_type = '';

		if (!is_string( $query->query_vars['post_type']) && !empty($query->query_vars['post_type'])) {
			$post_type = $query->query_vars['post_type'][0];
		} else {
			$post_type = $query->query_vars['post_type'];
		}

		if ( strpos( $post_type, 'my_projects' ) !== false ) {
			$query->query_vars['post_status'] = 'publish';
		}
	}

}

// Hook my above function to the pre_get_posts action
add_action( 'pre_get_posts', 'flei_loop_query' );