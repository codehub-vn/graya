<?php
//ux woocommerce register sidebar
function ux_woocommerce_register_sidebar(){
	register_sidebar(array(
		'name' => __('Shop Sidebar', 'ux'),
		'id' => 'ux-shop-sidebar',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'class' => ''
	));
}
add_action('init', 'ux_woocommerce_register_sidebar');

//ux woocommerce enqueue script
function ux_woocommerce_enqueue_scripts(){
	wp_register_script('ux-woocommerce', UX_WOOCOMMERCE. '/js/woocommerce.js', array('jquery'), '0.0.1', true);
	wp_register_style('ux-woocommerce', UX_WOOCOMMERCE. '/css/woocommerce.css', array(), '0.0.1', 'screen');
		wp_dequeue_style('woocommerce_frontend_styles');
		wp_enqueue_script('ux-woocommerce');
		wp_enqueue_style('ux-woocommerce');
}
add_action('wp_enqueue_scripts', 'ux_woocommerce_enqueue_scripts', 100);

?>