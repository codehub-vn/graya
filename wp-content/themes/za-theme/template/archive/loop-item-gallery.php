<section class="width4 main-list-item portfolio ">
    <div class="inside" style="">
        <div class="mainlist-img-wrap" >
            <?php
			$portfolio = ux_get_post_meta(get_the_ID(), 'theme_meta_portfolio');
			
			if($portfolio){
				if(count($portfolio) > 1){ ?>
            
                    <div class="owl-carousel" data-item="1" data-center="false" data-margin="0" data-autowidth="false" data-slideby="1">
                        
                        <?php foreach($portfolio as $image){
                            $thumb = wp_get_attachment_image_src(intval($image), 'standard-thumb'); ?>
                            
                            <section class="item">
                                <div class="carousel-img-wrap" style="background-image:url(<?php echo $thumb[0]; ?>)"></div>
                            </section>
                            
                        <?php } ?>
                        
                    </div>
                
                <?php
				}
			} ?>
        </div>
        <div class="mainlist-des-wrap">
            <h1 class="mainlist-tit"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="mainlist-excerpt"><?php the_excerpt(); ?></div>
            <div class="mainlist-meta"><?php ux_get_template_part('archive/content', 'meta'); ?></div>
        </div>
        
        <?php
		//ux_interface_blog_show_meta('continue-reading', 'article');
	
		//** Do Hook Archive Loop Item
		/**
		 * @hooked  ux_interface_social_bar - 10
		 */
		//do_action('ux_interface_loop_item_after'); ?>

    </div>
</section>