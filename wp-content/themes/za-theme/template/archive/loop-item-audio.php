<section class="width4 main-list-item aduio ">
    <div class="inside" style="">
        <?php
		$audio_type = ux_get_post_meta(get_the_ID(), 'theme_meta_audio_type');
		$audio_soundcloud = ux_get_post_meta(get_the_ID(), 'theme_meta_audio_soundcloud');
		if($audio_type == 'soundcloud' && $audio_soundcloud){ ?>
		
			<div class="blog-unit-soundcloud">
				<iframe width="100%" height="400" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo esc_url($audio_soundcloud); ?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
			</div>
			
		<?php }else{
			$audio_artist = ux_get_post_meta(get_the_ID(), 'theme_meta_audio_artist');
			$audio_mp3    = ux_get_post_meta(get_the_ID(), 'theme_meta_audio_mp3');
			$first_name   = $audio_mp3['name'][0];
			$first_url    = $audio_mp3['url'][0]; 
			
			$style = false;
			if(has_post_thumbnail()){    
				$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
				$style = 'background-image:url(' .$thumb[0]. ');';
			}
			
			if($audio_mp3){ ?>
			
                <div class="mainlist-img-wrap" style=" <?php echo esc_attr($style); ?>">
                    <?php if($audio_artist){ ?><cite class="content-audio-artist"><?php esc_html_e('Artist:','ux'); ?> <?php echo esc_html($audio_artist); ?></cite><?php } ?>
                    
                    <ul class="audio_player_list blog-list-audio">
                        <li class="audio-unit"><span id="audio-<?php echo get_the_ID() . '-' . $i; ?>" class="audiobutton pause" rel="<?php echo esc_url($first_url); ?>"></span><span class="songtitle" title="<?php echo esc_attr($first_name); ?>"><?php echo esc_html($first_name); ?></span></li>
                    </ul>
        
                </div>
                
            <?php
			}
		} ?>
        
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