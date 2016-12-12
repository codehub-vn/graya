<?php
$menubar = ux_get_option('theme_option_layout_menubar');
if($menubar != 'menubar-on-head'){
	$page_template = ux_get_post_meta(get_the_ID(), 'theme_meta_page_template');
	$slider_source = ux_get_post_meta(get_the_ID(), 'theme_meta_slider_source');
	$topslider_revo_class = $slider_source == 'revolution-slider' ? ' topslider-revolu ' : false;
	if($page_template == 'hiding-side-menubar'){
		$style = false;
		if(has_post_thumbnail()){    
            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
			$style = 'background-image:url(' .esc_url($thumb[0]). ');';
		}
		
		$cover_class = false;
		$enable_slider = ux_get_post_meta(get_the_ID(), 'theme_meta_enable_slider');
		if($enable_slider){
			$cover_class = 'cover-wrap-slider';
		} ?>
        <div class="cover-wrap fullscreen-wrap <?php echo sanitize_html_class($cover_class); echo esc_attr($topslider_revo_class); ?>" style=" <?php echo esc_attr($style); ?>">
			<?php //** Function Logo for cover
			ux_interface_logo('cover');
			
			if($enable_slider){
				ux_interface_content_page_slider();
			}else{ ?>
                <div class="title-wrap-con middle-ux">
                    <h1 class="title-wrap-tit"><?php the_title(); ?></h1>
                    <div class="title-wrap-des"><?php the_excerpt(); ?></div>
                </div>
            <?php } ?>
    	</div>
    <?php	
	}
}
?>