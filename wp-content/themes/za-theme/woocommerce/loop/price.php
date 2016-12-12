<?php
global $product;

if($price_html = $product->get_price_html()){ ?>

	<span class="price"><?php echo $price_html; ?></span>
    
<?php } ?>