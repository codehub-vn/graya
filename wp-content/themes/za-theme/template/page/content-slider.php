<?php
$enable_slider = ux_get_post_meta(get_the_ID(), 'theme_meta_enable_slider');
$slider_source = ux_get_post_meta(get_the_ID(), 'theme_meta_slider_source');

if($enable_slider){
	switch($slider_source){
		case 'revolution-slider':
			$revolution_slider = ux_get_post_meta(get_the_ID(), 'theme_meta_select_revolution_slider');
			if($revolution_slider){ ?>
				<div class="topslider"><?php putRevSlider($revolution_slider); ?></div>
			<?php
			}
		break;
		
		case 'bmslider':
			$bmslider = ux_get_post_meta(get_the_ID(), 'theme_meta_select_bmslider');
			if($bmslider && post_type_exists('bmslider')){
				ux_theme_bmslider($bmslider);
			}
		break;
	}
}

?>