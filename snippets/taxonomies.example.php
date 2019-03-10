<?php


function my_create_expertise_taxonomy()
{

    $labels = array(
        'name' => 'Expertisen (Taxonomie)',
        'singular_name' => 'Expertise (Taxonomie)',
        'menu_name' => 'Expertisen (Taxonomie)',
        'parent_item_colon' => '',
        'all_items' => 'Alle Expertisen (Taxonomie)',
        'view_item' => 'Expertise (Taxonomie) anzeigen',
        'add_new_item' => 'Neue Expertise (Taxonomie)',
        'add_new' => 'Hinzufügen',
        'edit_item' => 'Expertise (Taxonomie) bearbeiten',
        'update_item' => 'Expertise (Taxonomie) aktualisieren',
        'search_items' => '',
        'not_found' => '',
        'not_found_in_trash' => '',
    );

// create a new taxonomy
    register_taxonomy(
        'tax_expertise',
        array('page'),
        array(
            'labels' => $labels,
            'show_admin_column' => true,
            'hierarchical' => true,
            'rewrite' => array('slug' => 'expertise'),
        )
    );
    register_taxonomy_for_object_type('tax_expertise', 'page');
    register_taxonomy_for_object_type('tax_expertise', 'post');
    register_taxonomy_for_object_type('tax_expertise', 'my_case');
    register_taxonomy_for_object_type('tax_expertise', 'my_job');

}

//add_action('init', __NAMESPACE__ . '\\my_create_expertise_taxonomy');



function ev_unregister_taxonomy(){
    register_taxonomy('post_tag', array());
    register_taxonomy('category', array());
}
add_action('init', __NAMESPACE__ . '\\ev_unregister_taxonomy');

//To remove the sidebar menu entry:

// Remove menu
function remove_menus(){
    remove_menu_page('edit-tags.php?taxonomy=category'); // Post tags
    remove_menu_page('edit-tags.php?taxonomy=post_tag'); // Post tags
}

add_action( 'admin_menu', __NAMESPACE__ . '\\remove_menus' );



// Add Taxonomy to Media (Attachments)

function flei_add_taxonomies_to_attachments() {
    register_taxonomy_for_object_type( 'my_expertise', 'attachment' );
}
//add_action( 'init' , __NAMESPACE__ . '\\flei_add_taxonomies_to_attachments' );

/**
 * Remove Meta Boxes
 */
function flei_remove_meta_boxes() {

    // remove taxonomy meta box for my_expertise b/c for attachment this has to be done through ACF
    remove_meta_box( 'custom-post-type-onomies-my_expertise', 'attachment', 'normal' );


}
add_action( 'admin_menu', 'flei_remove_meta_boxes' );