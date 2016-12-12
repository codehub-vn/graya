<section class="width4 main-list-item standard ">
    <div class="inside" style="">
        <?php
		$style = false;
		if(has_post_thumbnail()){    
            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
			$style = 'background-image:url(' .$thumb[0]. ');';
		} ?>
        <div class="mainlist-img-wrap" style=" <?php echo esc_attr($style); ?>"></div>
        <div class="mainlist-des-wrap">
            <h1 class="mainlist-tit"><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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