<?php
global $product;

echo apply_filters('woocommerce_loop_add_to_cart_link',
	sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="btn-add-cat %s product_type_%s"><i class="fa fa-shopping-cart"></i> %s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		$product->is_purchasable() ? 'add_to_cart_button' : '',
		esc_attr( $product->product_type ),
		esc_html( $product->add_to_cart_text() )
	),
$product);