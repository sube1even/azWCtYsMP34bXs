<?php
/**
 * Body Classes
 *
 * Use framework_add_body_class() to anywhere before the header to add body classes.
 *
 * @package framework
 */


/**
 * Store classes here
 * @var array
 */
$GLOBALS[ 'framework_body_classes' ] = array();


/**
 * Adds a body class. Must be used before the header
 * @param $class string
 */
function framework_add_body_class( $class ) 
{
	global $framework_body_classes;
	$framework_body_classes[] = $class;
}


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function framework_body_classes( $classes ) 
{
	global $framework_body_classes;
	$classes = array_merge( $classes, $framework_body_classes );

	return $classes;
}
add_filter( 'body_class', 'framework_body_classes' );