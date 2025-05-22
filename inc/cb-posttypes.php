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

	register_post_type( 'user_feedback', array(
		'labels' => array(
			'name'               => 'User Feedback',
			'singular_name'      => 'Feedback',
			'add_new_item'       => 'Add New Feedback',
			'edit_item'          => 'Edit Feedback',
			'new_item'           => 'New Feedback',
			'view_item'          => 'View Feedback',
			'search_items'       => 'Search Feedback',
			'not_found'          => 'No feedback found',
			'not_found_in_trash' => 'No feedback in trash',
		),
		'has_archive' 	  => true,
		'public'          => false,
		'show_ui'         => true,
		'show_in_menu'    => true, // Ensure it shows in the admin menu
		'menu_position'   => 25,
		'menu_icon'       => 'dashicons-feedback',
		'supports'        => array( 'title', 'editor' ),
		'capability_type' => 'post',
		'map_meta_cap'    => true,
		'rewrite'         => array( 'slug' => 'user_feedback' ),
	) );
	
}
add_action( 'init', 'cb_register_post_types' );
