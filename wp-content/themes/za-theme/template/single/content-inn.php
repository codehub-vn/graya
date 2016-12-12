<?php
if(has_post_format('image')){
	if(has_post_thumbnail()){ ?>
		<div class="image-post-wrap">
			<?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
		</div>
	<?php
	}
}elseif(has_post_format('video')){
	$video_embeded_code = ux_get_post_meta(get_the_ID(), 'theme_meta_video_embeded_code');
	$video_ratio        = ux_get_post_meta(get_the_ID(), 'theme_meta_video_ratio', true);
	$video_custom_ratio = ux_get_post_meta(get_the_ID(), 'theme_meta_video_custom_ratio', true);
	
	$key_1      = false;
	$key_2      = false;
	$video_size = false;
	
	switch($video_ratio){
		case '16:9': $video_size = 'video-16-9'; break;
		case '4:3': $video_size = 'video-4-3'; break;
		case 'custom':
			$key_1 = $video_custom_ratio && isset($video_custom_ratio[1]) ? $video_custom_ratio[1] : 4;
			$key_2 = $video_custom_ratio && isset($video_custom_ratio[2]) ? $video_custom_ratio[2] : 3;
			$video_size = false;
		break;
	}
	
	$key_1 = $key_1 ? $key_1 : 4;
	$key_2 = $key_2 ? $key_2 : 3;
	$video_size = $video_size ? $video_size : false;
	
	$video_custom = $video_custom_ratio ? 'padding-bottom:'.($key_2 / $key_1) * 100 .'%' : false;
	
	if($video_embeded_code){
		
		if(strstr($video_embeded_code, "youtu") && !(strstr($video_embeded_code, "iframe"))){ ?>
		
			<div class="videoWrapper video-wrap video-post-wrap youtube <?php echo esc_attr($video_size); ?>" style=" <?php echo esc_attr($video_custom); ?>">
				<iframe src="http://www.youtube.com/embed/<?php echo esc_attr(ux_theme_get_youtube($video_embeded_code));?>?rel=0&controls=1&showinfo=0&theme=light&autoplay=0&wmode=transparent"></iframe>
			</div>
			
		<?php }elseif(strstr($video_embeded_code, "vimeo") && !(strstr($video_embeded_code, "iframe"))){ ?>
		
			<div class="videoWrapper video-wrap video-post-wrap viemo <?php echo esc_attr($video_size); ?>" style=" <?php echo esc_attr($video_custom); ?>">
				<iframe src="http://player.vimeo.com/video/<?php echo esc_attr(ux_theme_get_vimeo($video_embeded_code)); ?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=0" width="100%" height="auto" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			</div>
			
		<?php }else{ ?>
		
			<div class="videoWrapper video-wrap video-post-wrap <?php echo esc_attr($video_size); ?>" style=" <?php echo esc_attr($video_custom); ?>"><?php echo balanceTags($video_embeded_code,false); ?></div>
			
		<?php
		}
	}
}elseif(has_post_format('gallery')){ ?>
    <section class="gallery-post-wrap">
		
		<?php
        $enable_video_cover = ux_get_post_meta(get_the_ID(), 'theme_meta_enable_video_cover');
        $video_cover_alt_image = ux_get_post_meta(get_the_ID(), 'theme_meta_video_cover_alt_image');
		
		if($enable_video_cover && $video_cover_alt_image){
			$thumbnail = '<img class="gallery-image-cover" src="' .esc_url($video_cover_alt_image). '" alt="' .get_the_title(). '" />';
		}elseif(has_post_thumbnail()){
			$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
			$thumbnail = '<img class="gallery-image-cover" src="' .esc_url($thumbnail[0]). '" alt="' .get_the_title(). '" />';
		}else{
			$thumbnail = false;
		}
		
		$webm = ux_get_post_meta(get_the_ID(), 'theme_meta_video_cover_webm');
		$mp4 = ux_get_post_meta(get_the_ID(), 'theme_meta_video_cover_mp4');
		$ogg = ux_get_post_meta(get_the_ID(), 'theme_meta_video_cover_ogg'); 

		$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
		$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
		$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
		$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS"); 
		$ie9     = strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 9.0");
        
        if($enable_video_cover){ ?>
            <div class="gallery-cover">
                
                <div class="title-wrap-con">
                    <h1 class="title-wrap-tit"><?php the_title(); ?></h1>
                    <div class="title-wrap-des"><?php the_excerpt(); ?></div>
                </div>
                
                <div class="gallery-video-vover">
                    <?php if(!$ie9 && !$iPod && !$iPhone && !$iPad && !$Android && !$webOS) { ?>
                    <video autoplay loop>
                        <?php if($webm){ ?><source src="<?php echo esc_url($webm); ?>" type="video/webm"><?php } ?>
                        <?php if($mp4){ ?><source src="<?php echo esc_url($mp4); ?>" type="video/mp4"><?php } ?>
                        <?php if($ogg){ ?> <source src="<?php echo esc_url($ogg); ?>" type="video/ogg"><?php } ?>
                    </video>
                    <?php } ?>
                </div>
                
                <?php if($thumbnail){ echo $thumbnail; } ?>
                
            </div>
		<?php
        }
			
        ux_get_template_part('single/portfolio', 'template');
    
        ?>
    </section>
<?php } ?>