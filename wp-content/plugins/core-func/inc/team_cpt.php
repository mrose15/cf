<?php
/**
 * Team Members CPT
 *
 * @package      CoreFunctionality
 * @since        1.0.0
 * @link         http://michelecheow.com
 * @author       michelecheow
 */

function cf_team_cpt() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Team Member', 'Post Type General Name', 'cf' ),
        'singular_name'       => _x( 'Team Member', 'Post Type Singular Name', 'cf' ),
        'menu_name'           => __( 'Team Members', 'cf' ),
        'parent_item_colon'   => __( 'Parent Team Member', 'cf' ),
        'all_items'           => __( 'All Team Members', 'cf' ),
        'view_item'           => __( 'View Team Member', 'cf' ),
        'add_new_item'        => __( 'Add New Team Member', 'cf' ),
        'add_new'             => __( 'Add New Team Member', 'cf' ),
        'edit_item'           => __( 'Edit Team Member', 'cf' ),
        'update_item'         => __( 'Update Team Member', 'cf' ),
        'search_items'        => __( 'Search Team Members', 'cf' ),
        'not_found'           => __( 'Not Found', 'cf' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cf' ),
    );
    
// Set other options for Custom Post Type
    
    $args = array(
        'label'               => __( 'members', 'cf' ),
        'description'         => __( 'Team Members', 'cf' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 30,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    
    // Registering your Custom Post Type
    register_post_type( 'cf_team_members', $args );

}

add_action( 'init', 'cf_team_cpt', 0 );


/* Member Metaboxes */
function cf_team_members_metabox() {
    $prefix = '_cf_team_';
     $cmb = new_cmb2_box( array(
            'id'           => $prefix . 'metabox',
            'title'        => __( 'Position and Social Links', 'cf-metabox' ),
            'object_types' => array( 'cf_team_members', ),
        ) );
     	$cmb->add_field( array(
            'name'    => 'Position',
            'id'      => $prefix . '_position',
            'type'    => 'text'
        ) );
        $cmb->add_field( array(
            'name'    => 'Facebook Link',
            'id'      => $prefix . '_facebookurl',
            'type'    => 'text_url'
        ) );
        $cmb->add_field( array(
            'name'    => 'Twitter Link',
            'id'      => $prefix . '_twitterurl',
            'type'    => 'text_url'
        ) );
}
add_action( 'cmb2_init', 'cf_team_members_metabox' );
