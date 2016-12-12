<?php
define('UX_WOOCOMMERCE', get_template_directory_uri(). '/woocommerce');

//UX Theme Get Woo Template
function ux_get_woo_template_part($key, $name){
	get_template_part('woocommerce/ux-template/' . $key, $name);
}

//require theme woocommerce register
require_once locate_template('/woocommerce/ux-woocommerce-register.php');

//require theme woocommerce functions
require_once locate_template('/woocommerce/ux-woocommerce-functions.php');

//require theme woocommerce hook
require_once locate_template('/woocommerce/ux-woocommerce-hook.php');

?>