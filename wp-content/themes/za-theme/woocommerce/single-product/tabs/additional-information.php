<?php
global $product;

$heading = apply_filters('woocommerce_product_additional_information_heading', __('Additional Information', 'woocommerce'));

$product->list_attributes(); ?>