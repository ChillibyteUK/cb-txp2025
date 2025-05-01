<?php
/**
 * Custom Post Types Registration
 *
 * This file contains the code to register custom post types for the theme.
 *
 * @package cb-txp2025
 */

/**
 * Register custom post types for the theme.
 *
 * This function registers a custom post type called 'people'.
 * The post type is set to be publicly queryable, has a UI in the admin,
 * and supports REST API.
 *
 * @return void
 */
function cb_register_post_types() {

	$args = array(
		'labels'                => array(
			'name'          => 'People',
			'singular_name' => 'Person',
		),
		'public'                => false,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'rest_base'             => 'people',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => false,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => false,
		'menu_icon'             => 'dashicons-groups',
		'delete_with_user'      => false,
		'exclude_from_search'   => true,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'rewrite'               => false,
		'query_var'             => true,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'show_in_graphql'       => false,
	);

    register_post_type( 'people', $args );

}
// add_action( 'init', 'cb_register_post_types' );
