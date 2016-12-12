<?php get_header(); ?>

	<?php //** Do Woocommerce before main content
	do_action('woocommerce_before_main_content'); ?>
    
        <div class="span9" id="content_wrap">
        
            <?php //** switch page title
			if(apply_filters('woocommerce_show_page_title', true)){
				
				//** woo page title
				ux_woocommerce_page_title();
				
			} ?>
            
            <div class="product-wrap">
        
				<?php if(have_posts()){
					
					//** Do Woocommerce before shop loop
					do_action('woocommerce_before_shop_loop');
					
					woocommerce_product_loop_start();
					
						woocommerce_product_subcategories();
						
						while(have_posts()){ the_post();
						
							woocommerce_get_template_part('content', 'product');
							
						}
						
					woocommerce_product_loop_end();
					
					//** Do Woocommerce after shop loop
					do_action('woocommerce_after_shop_loop');
					
				}elseif(!woocommerce_product_subcategories(array(
					'before' => woocommerce_product_loop_start(false),
					'after' => woocommerce_product_loop_end(false)))){
					
					woocommerce_get_template('loop/no-products-found.php');
					
				} ?>
                
            </div>
                
        </div>
        
        <?php //** Do Woocommerce Sidebar
		do_action('woocommerce_sidebar'); ?>

	<?php //** Do Woocommerce after main content
	do_action('woocommerce_after_main_content'); ?>

<?php get_footer(); ?>