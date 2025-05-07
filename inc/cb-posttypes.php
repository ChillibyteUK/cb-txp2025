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
			'name' => 'User Feedback',
			'singular_name' => 'Feedback',
		),
		'public' => false,
		'show_ui' => true,
		'supports' => array( 'title', 'editor' ),
		'capability_type' => 'post',
		'capabilities' => array(
			'create_posts' => 'do_not_allow',
		),
		'map_meta_cap' => true,
		'menu_position' => 25,
		'menu_icon' => 'dashicons-feedback',
	));

}
// add_action( 'init', 'cb_register_post_types' );
