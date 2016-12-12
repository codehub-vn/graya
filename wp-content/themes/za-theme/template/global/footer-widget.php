<?php
if(is_singular('post') || is_page() || is_home()){
	
	$switch_sidebar = false;
	$sidebar_widget = false;
	
	if(is_page() || is_home()){
		$sidebar_widget = ux_get_post_meta(get_the_ID(), 'theme_meta_footer_widget_for_pages');
		$switch_sidebar = ux_get_post_meta(get_the_ID(), 'theme_meta_enable_footer_widget');
	}elseif(is_singular('post')){
		$sidebar_widget = ux_get_option('theme_option_footer_widget_for_posts');
		$switch_sidebar = ux_get_option('theme_option_enable_footer_widget_for_posts');
	}
	
	if($switch_sidebar){ ?>
        <!--Footer Widget-->
        <div class="widget_footer">
        	<div class="container">
	            <div class="row-fluid">
	                <?php if($sidebar_widget){
						ux_dynamic_sidebar($sidebar_widget, 3);
					} ?>
	            </div><!--End row-->
        	</div>
        </div><!--End widget_footer-->
    
    <?php
	}
} ?>