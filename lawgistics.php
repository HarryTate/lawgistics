<?php
/*
Plugin Name: Lawgistics
Version: 1.0
Author: Harry Tate
*/

// Prevent direct access to the file
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

function lawgistics_enqueue_styles() {
    wp_enqueue_style('lawgistics_styles', plugin_dir_url(__FILE__) . 'assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'lawgistics_enqueue_styles');

// Register Custom Post Type
function custom_pies_post_type() {

    $labels = array(
        'name'                  => _x( 'Pies', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Pie', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Pies', 'text_domain' ),
        'name_admin_bar'        => __( 'Pie', 'text_domain' ),
        'archives'              => __( 'Pie Archives', 'text_domain' ),
        'attributes'            => __( 'Pie Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Pie:', 'text_domain' ),
        'all_items'             => __( 'All Pies', 'text_domain' ),
        'add_new_item'          => __( 'Add New Pie', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Pie', 'text_domain' ),
        'edit_item'             => __( 'Edit Pie', 'text_domain' ),
        'update_item'           => __( 'Update Pie', 'text_domain' ),
        'view_item'             => __( 'View Pie', 'text_domain' ),
        'view_items'            => __( 'View Pies', 'text_domain' ),
        'search_items'          => __( 'Search Pie', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into pie', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this pie', 'text_domain' ),
        'items_list'            => __( 'Pies list', 'text_domain' ),
        'items_list_navigation' => __( 'Pies list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter pies list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Pie', 'text_domain' ),
        'description'           => __( 'Custom post type for pies', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title' ),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'pies', $args );

}
add_action( 'init', 'custom_pies_post_type', 0 );

function custom_pies_register_acf_fields() {

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group([
            'key' => 'group_pie_fields',
            'title' => 'Pie',
            'fields' => [
                [
                    'key' => 'field_pie_type',
                    'label' => 'Pie Type',
                    'name' => 'pie_type',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_description',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                ],
                [
                    'key' => 'field_ingredients',
                    'label' => 'Ingredients',
                    'name' => 'ingredients',
                    'type' => 'text',
                ],
        ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'pies',
                    ],
                ],
            ],
        ]);

    endif;
}
add_action('acf/init', 'custom_pies_register_acf_fields');

include plugin_dir_path(__FILE__) . 'shortcode-pies.php';

?>
