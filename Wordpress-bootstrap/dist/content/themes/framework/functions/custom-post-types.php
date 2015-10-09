<?php

/**
 * Add custom post types
 */	
function framework_post_types() 
{
	/**
	 * Add custom post types
	 */	
	register_post_type( 'book', array(
		'label'               => __( 'book', 'framework' ),
		'description'         => __( 'Book Description', 'framework' ),
		'labels'              => framework_post_type_labels( 'Book', 'Books' ),
		'supports'            => array( 'title', 'editor' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		//'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	));
	
}
//add_action( 'init', 'framework_post_types' );



/**
 * Generate custom post type labels
 *
 * @param string $single
 * @param string $plural
 * @return array
 */
function framework_post_type_labels( $single, $plural ) 
{
	return array(
		'name'                => _x( $plural, $single . ' General Name', 'framework' ),
		'singular_name'       => _x( $single, $single . 'Singular Name', 'framework' ),
		'menu_name'           => __( $plural, 'framework' ),
		'parent_item_colon'   => __( 'Parent Item:', 'framework' ),
		'all_items'           => __( 'All ' . $plural, 'framework' ),
		'view_item'           => __( 'View Item', 'framework' ),
		'add_new_item'        => __( 'Add New ' . $single, 'framework' ),
		'add_new'             => __( 'Add New', 'framework' ),
		'edit_item'           => __( 'Edit ' . $single, 'framework' ),
		'update_item'         => __( 'Update Item', 'framework' ),
		'search_items'        => __( 'Search Item', 'framework' ),
		'not_found'           => __( 'Not found', 'framework' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'framework' ),
	);
}

