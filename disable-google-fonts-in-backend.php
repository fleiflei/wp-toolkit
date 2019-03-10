<?php
/**
 * Created by PhpStorm.
 * User: flei
 * Date: 08/05/17
 * Time: 12:31
 */

function flei_dequeue_google_fonts() {
    wp_dequeue_style( 'twentyfifteen-fonts' );
    wp_dequeue_style( 'woocommerce_de_admin' );
    wp_dequeue_style( 'woocommerce_de_admin-css' );
    if (class_exists('Woocommerce_German_Market')) {
//        wp_enqueue_style( 'woocommerce_de_admin', get_template_directory_uri( '/lib/plugins/german-market/backend.css', Woocommerce_German_Market::$plugin_base_name ) );
    }

}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\flei_dequeue_google_fonts', 0 );