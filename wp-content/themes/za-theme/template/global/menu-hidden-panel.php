<div id="mobile-panel">

    <div class="container">
        
        <?php //** Function Logo for header
		ux_interface_logo('mobile'); ?>
        <span class="" id="mobile-panel-close"></span>
    </div>

    <div class="container mobile-panel-main">
        <div class="mobile-panel-in middle-ux">
            <div class="mobile-panel-inn">

                <nav id="navi-mobile">
                    <?php wp_nav_menu(array(
						'theme_location'  => 'primary',
						'container_id' => 'navi-wrap-mobile',
						'items_wrap' => '<ul class="menu clearfix">%3$s</ul>'
					)); ?><!--End #navi_wrap-->
                    
                </nav>
                
				<?php
				$show_social_in_menu_panle = ux_get_option('theme_option_show_social_in_menu_panle'); 
				if($show_social_in_menu_panle){
					//** Function Social
					ux_interface_header_social();
				} ?>

            </div>	
        </div>
    </div>
    
    <?php
	$enable_wpml = ux_get_option('theme_option_enable_WPML');
	if($enable_wpml){ 
		echo '<div class="container mobile-paenl-wpml">';
		ux_interface_language_flags(); 
		echo '</div>';
	} ?>

</div>