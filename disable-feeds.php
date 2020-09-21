<?php
/**
 * Disable RSS feeds globally
 * Flush rewrite rules after enabling this (e.g. by changing permalink structure back and forth through WP backend or running flush_rewrite_rules() once)
 * Credits: https://wordpress.stackexchange.com/a/47087
 */

add_action( 'wp_head', __NAMESPACE__.'\\flei_wp_head', 1 );
/**
 * Remove feed links from wp_head
 */
function flei_wp_head()
{
  remove_action( 'wp_head', 'feed_links', 2 );
  remove_action( 'wp_head', 'feed_links_extra', 3 );
}

add_action( 'init', __NAMESPACE__.'\\flei_kill_feed_endpoint', 99 );
/**
 * Remove the `feed` endpoint
 */
function flei_kill_feed_endpoint()
{
  // This is extremely brittle.
  // $wp_rewrite->feeds is public right now, but later versions of WP
  // might change that
  global $wp_rewrite;

  if (isset($wp_rewrite->feeds)) {
    $wp_rewrite->feeds = array();
  }
}

foreach( array( 'rdf', 'rss', 'rss2', 'atom' ) as $feed )
{
  add_action( 'do_feed_' . $feed, __NAMESPACE__.'\\flei_remove_feeds', 1 );
}
unset( $feed );


/**
 * prefect actions from firing on feeds when the `do_feed` function is
 * called
 */
function flei_remove_feeds()
{
  // redirect the feeds! don't just kill them
  wp_redirect( home_url(), 302 );
  exit();
}
