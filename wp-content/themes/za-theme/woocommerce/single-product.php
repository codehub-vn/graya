<?php get_header(); ?>

	<?php //** Do Woocommerce before main content
	do_action('woocommerce_before_main_content'); ?>

		<div class="span9 pull-right" id="content_wrap">
        
            <div class="product-wrap product-single">
            
				<?php while(have_posts()): the_post(); ?>
        
                    <?php woocommerce_get_template_part('content', 'single-product'); ?>
        
                <?php endwhile; // end of the loop. ?>
            
            </div>
        
        </div>
        
        <?php //** Do Woocommerce Sidebar
		do_action('woocommerce_sidebar'); ?>

	<?php //** Do Woocommerce after main content
	do_action('woocommerce_after_main_content'); ?>

<?php get_footer(); ?>