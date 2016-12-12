<div class="width2 isotope-item product-item" >
    <div class="inside" style=" margin:10px 0 0 10px">
    
        <?php //** Do Woocommerce before subcategory
		do_action('woocommerce_before_subcategory', $category); ?>
        
        <a href="<?php echo get_term_link( $category->slug, 'product_cat'); ?>">
        
            <?php //** Do Woocommerce before subcategory title
			do_action('woocommerce_before_subcategory_title', $category); ?>
        
            <div class="product-caption">
                <h3>
					<?php echo $category->name;
                    if($category->count > 0 )
                        echo apply_filters('woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category); ?>
                </h3>
            </div><!--End product-caption-->
            
            <?php //** Do Woocommerce after subcategory title
			do_action('woocommerce_after_subcategory_title', $category); ?>
            
        </a>
        
        <?php //** Do Woocommerce after subcategory
		do_action('woocommerce_after_subcategory', $category); ?>
        
    </div><!--End inside-->	
</div><!--End isotope-item-->