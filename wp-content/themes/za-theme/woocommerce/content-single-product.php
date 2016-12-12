<?php //** Do Woocommerce before single product
do_action('woocommerce_before_single_product');

if(post_password_required()){
	echo get_the_password_form();
	return;
}

?>

<div class="row-fluid">
    
    <?php //** Do Woocommerce before single product summary
	do_action('woocommerce_before_single_product_summary'); ?>
    
    <div class="single-product-summary span6">
    
        <div class="summary entry-summary">

            <?php //** Do Woocommerce single product summary
			do_action('woocommerce_single_product_summary'); ?>
    
        </div><!-- .summary -->
    
    </div>
        
</div>

<div class="row-fluid">

    <?php //** Do Woocommerce after single product summary
	do_action('woocommerce_after_single_product_summary'); ?>

</div>

<?php //** Do Woocommerce after single product
do_action('woocommerce_after_single_product'); ?>
