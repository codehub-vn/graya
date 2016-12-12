<?php

/*
============================================================================
	*
	* require functions theme 
	*
============================================================================	
*/
require_once locate_template('/functions/theme/theme-admin.php');

/*
============================================================================
	*
	* require class 
	*
============================================================================	
*/
require_once locate_template('/functions/class/class-admin.php');

/*
============================================================================
	*
	* require interface 
	*
============================================================================	
*/
require_once locate_template('/functions/interface/interface-admin.php');

/*
============================================================================
	*
	* require woocommerce 
	*
============================================================================	
*/

if(class_exists('Woocommerce')){
	add_theme_support( 'woocommerce' );
	require_once locate_template('/woocommerce/ux-woocommerce.php');
}

?>