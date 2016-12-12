<?php
global $product;
$attachment_ids = $product->get_gallery_attachment_ids(); ?>

<div class="images flex-slider-wrap span6">

    <?php woocommerce_show_product_sale_flash(); ?>
    
    <?php $flexslider = $attachment_ids ? 'flexslider' : false; ?>
    
    <div id="product-img-slider" class="<?php echo $flexslider; ?>">
    
        <ul class="slides">
        
			<?php if($attachment_ids){
                
                if(has_post_thumbnail()){ ?>
					<li><?php echo get_the_post_thumbnail(get_the_ID(), 'image-thumb-1', array('class' => 'product-slider-image')); ?></li>
				<?php
                }
				
				//** Do Woocommerce product thumbnails
				do_action('woocommerce_product_thumbnails');
                
            }elseif(has_post_thumbnail()){ ?>
            
                <li><?php echo get_the_post_thumbnail(get_the_ID(), 'image-thumb-1', array('class' => 'product-slider-image')); ?></li>
                
            <?php }elseif(woocommerce_placeholder_img_src()){
                
                echo '<li><img src="' . woocommerce_placeholder_img_src() . '" class="product-slider-image" /></li>';
                
            } ?>
        
        </ul>
        
    </div>
    
</div>


