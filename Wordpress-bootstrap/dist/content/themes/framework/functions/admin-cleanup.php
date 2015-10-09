<?php

/*
 * Remove admin menu items that aren't needed
 */
function framework_admin_remove_menus() 
{
	global $menu;
	$restricted = array( __('Posts'), __('Comments') );
	end ( $menu );
	while ( prev( $menu ) )
	{
		$value = explode( ' ',$menu[ key( $menu ) ][0] );
		if ( in_array( $value[0] != NULL ? $value[0] : "" , $restricted ) )
			unset( $menu[ key( $menu ) ] );
	}
}
//add_action( 'admin_menu', 'framework_admin_remove_menus' );


/*
 * Modifying TinyMCE editor to remove unused items.
 */
function framework_refine_tiny_mce( $init ) 
{
	// Add block format elements you want to show in dropdown
	$init['theme_advanced_blockformats'] = 'p,pre,h2,h3,h4,h5,h6';
	
	// Disable some advanced editing features
	$init[ 'theme_advanced_disable' ] = 'strikethrough,underline,forecolor,justifyfull';

	return $init;
}
//add_filter('tiny_mce_before_init', 'framework_refine_tiny_mce' );