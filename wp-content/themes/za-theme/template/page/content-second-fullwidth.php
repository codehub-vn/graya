<?php
$menubar = ux_get_option('theme_option_layout_menubar');
if($menubar != 'menubar-on-head'){
	$page_template = ux_get_post_meta(get_the_ID(), 'theme_meta_page_template');
	if($page_template == 'hiding-side-menubar'){
		$second_fullwidth = ux_get_post_meta(get_the_ID(), 'theme_meta_page_template_second_fullwidth');
		
		if($second_fullwidth){
			$second_bg = ux_get_post_meta(get_the_ID(), 'theme_meta_page_template_second_bg');
				
			if($second_bg){
				$style = 'background-image:url(' .esc_url($second_bg). ');';
			}else{
				$style = false;
			}
			
			$video_webm = ux_get_post_meta(get_the_ID(), 'theme_meta_page_template_second_video_webm');
			$video_mp4 = ux_get_post_meta(get_the_ID(), 'theme_meta_page_template_second_video_mp4');
			$video_ogg = ux_get_post_meta(get_the_ID(), 'theme_meta_page_template_second_video_ogg'); 
		
			$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
			$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
			$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
			$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
			$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS"); 
			$ie9     = strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 9.0"); ?>
		
			<section class="fullscreen-wrap second-fullscreen" style=" <?php echo esc_attr($style); ?>">
				<div class="fullwrap-video">
					<?php if(!$ie9 && !$iPod && !$iPhone && !$iPad && !$Android && !$webOS) { ?>
						<video autoplay muted loop poster="<?php echo esc_url($second_bg); ?>" class="centered-ux video-tag">
							<?php if($video_webm){ ?><source src="<?php echo esc_url($video_webm); ?>" type="video/webm"><?php } ?>
							<?php if($video_mp4){ ?><source src="<?php echo esc_url($video_mp4); ?>" type="video/mp4"><?php } ?>
							<?php if($video_ogg){ ?> <source src="<?php echo esc_url($video_ogg); ?>" type="video/ogg"><?php } ?>
						</video>
					<?php } ?>
				</div>
			</section>
			
		<?php
		}
	}
} ?>