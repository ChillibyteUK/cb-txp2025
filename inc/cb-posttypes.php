<?php
/**
 * Custom Post Types Registration
 *
 * This file contains the code to register custom post types for the theme.
 *
 * @package cb-pbh2025
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

	register_post_type(
		'work',
		array(
			'labels' => array(
				'name'               => 'Work',
				'singular_name'      => 'Work',
				'add_new_item'       => 'Add New Work',
				'edit_item'          => 'Edit Work',
				'new_item'           => 'New Work',
				'view_item'          => 'View Work',
				'search_items'       => 'Search Work',
				'not_found'          => 'No Work found',
				'not_found_in_trash' => 'No Work in trash',
			),
			'has_archive' 	  => true,
			'public'          => true,
			'show_ui'         => true,
			'show_in_menu'    => true, // Ensure it shows in the admin menu
			'show_in_rest'       => true,
			'menu_position'   => 25,
			'menu_icon'       => 'dashicons-feedback',
			'supports'        => array( 'title', 'thumbnail', 'editor' ),
			'capability_type' => 'post',
			'map_meta_cap'    => true,
			'rewrite'         => array( 'slug' => 'our-work' ),
		)
	);
}
add_action( 'init', 'cb_register_post_types' );

