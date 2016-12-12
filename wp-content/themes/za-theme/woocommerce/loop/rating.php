<?php
global $product;

if(get_option('woocommerce_enable_review_rating') === 'no')
	return;


if($rating_html = $product->get_rating_html()){
	
	echo $rating_html;
	
}

?>