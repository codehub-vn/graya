<?php
global $product;

// Ensure visibility
if(!$product || !$product->is_visible() )
	return;
?>

<div class="width2 isotope-item product-item" >
    <div class="inside" style=" margin:10px 0 0 10px">
    
        <?php //** Do Woocommerce before shop loop item
		do_action('woocommerce_before_shop_loop_item'); ?>
        
        <a href="<?php the_permalink(); ?>" class="prouduct-item-a">
        
            <?php //** Do Woocommerce before shop loop item title
			do_action('woocommerce_before_shop_loop_item_title'); ?>

        </a>    
        
            <div class="product-caption">
                <a class="prouduct-item-a" href="<?php the_permalink(); ?>"><h3 class="product-caption-title"><?php the_title(); ?></h3></a>
                
                <div class="product-caption-inn">
                <?php //** Do Woocommerce after shop loop item title
				do_action('woocommerce_after_shop_loop_item_title'); ?>

                <?php //** Do Woocommerce after shop loop item
                do_action('woocommerce_after_shop_loop_item'); ?>
                </div>

            </div><!--End product-caption-->
        
    </div><!--End inside-->	
</div>