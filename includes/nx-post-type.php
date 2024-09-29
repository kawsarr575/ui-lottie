<?php


/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function nx_lottie_register_post_type() {

	$labels = array(
		'name'                  => _x( 'NX Lottie', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'NX Lotties', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'NX Lottie', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'NX Lottie', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New Lottie', 'textdomain' ),
		'add_new_item'          => __( 'Add New Lottie', 'textdomain' ),
		'new_item'              => __( 'New Lottie', 'textdomain' ),
		'edit_item'             => __( 'Edit Lottie', 'textdomain' ),
		'view_item'             => __( 'View Lottie', 'textdomain' ),
		'all_items'             => __( 'All Lotties', 'textdomain' ),
		'search_items'          => __( 'Search Lottie', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent Lottie:', 'textdomain' ),
		'not_found'             => __( 'No Lottie found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No Lottie found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Lottie Preview Gif', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set Preview Gif', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove Preview Gif', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as Preview Animation', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Lottie archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Lottie', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Lottie', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Lotties list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Lotties list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Lotties list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'nx-lottie' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title' ),
	);

	register_post_type( 'nx-lottie', $args );
}

add_action( 'init', 'nx_lottie_register_post_type' );