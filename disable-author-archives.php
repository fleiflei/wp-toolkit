<?php

/**
 * disables author archive pages that can be accessed through
 *
 * /author/john-doe
 * or
 * /?author=1 (which eventually redirects to /author/john-doe revealing the username)
 *
 */

function author_page_redirect() {
    if ( is_author() ) {
        wp_redirect( home_url() );
    }
}
add_action( 'template_redirect', 'author_page_redirect' );