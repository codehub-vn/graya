<?php
global $post, $product, $woocommerce;
$attachment_ids = $product->get_gallery_attachment_ids();

foreach($attachment_ids as $gallery){
	$attr = array(
		'class' => 'product-slider-image',
		'alt' => get_the_title($gallery)
	); ?>
	<li><?php echo wp_get_attachment_image($gallery, 'image-thumb-1', false, $attr); ?></li>
<?php } ?>