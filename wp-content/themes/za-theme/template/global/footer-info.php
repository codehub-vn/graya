<?php 
$elements_1 = ux_get_option('theme_option_footer_elements_1');
$elements_1_wrap_before = $elements_1 != 'none' && $elements_1 != '' ? '<div class="span3">' : false;
$elements_1_wrap_after = $elements_1 != 'none' && $elements_1 != '' ? '</div>' : false;
$elements_2 = ux_get_option('theme_option_footer_elements_2');
$elements_2_wrap_before = $elements_2 != 'none' && $elements_2 != '' ? '<div class="span3">' : false;
$elements_2_wrap_after = $elements_2 != 'none' && $elements_2 != '' ? '</div>' : false;
$elements_3 = ux_get_option('theme_option_footer_elements_3');
$elements_3_wrap_before = $elements_3 != 'none' && $elements_3 != '' ? '<div class="span6">' : false;
$elements_3_wrap_after = $elements_3 != 'none' && $elements_3 != '' ? '</div>' : false;
?>

	<div class="footer-info row-fluid">

        <div class="container">
    
            <?php

            echo balanceTags($elements_1_wrap_before);
			
			if($elements_1 == 'menu'){
				$elements_1_menu = ux_get_option('theme_option_footer_elements_1_menu');
				if($elements_1_menu){
					wp_nav_menu(array(
						'menu' => $elements_1_menu,
						'container' => 'div',
						'container_class' => 'footer-menu',
						'items_wrap' => '<ul>%3$s</ul>'
					));
				}
			}elseif($elements_1 == 'copyright'){
				//** Function Copyright ?>
                <div class="copyright">
                    <?php ux_interface_copyright(); ?>
                </div>
			<?php
			}elseif($elements_1 == 'socialicons'){
				//** Function  ?>
                <?php ux_interface_footer_social(); ?>
			<?php
            }elseif($elements_1 == 'logo'){
				//** Function Logo for footer
				ux_interface_logo('footer');
			} 
			echo balanceTags($elements_1_wrap_after);
			
            echo balanceTags($elements_2_wrap_before);
				
				if($elements_2 == 'logo'){
					//** Function Logo for footer
					ux_interface_logo('footer');
				}elseif($elements_2 == 'copyright'){
					//** Function Copyright ?>
                    <div class="copyright">
                        <?php ux_interface_copyright(); ?>
                    </div>
				<?php
				}elseif($elements_2 == 'socialicons'){
				//** Function  ?>
                	<?php ux_interface_footer_social(); ?>
				<?php
                }elseif($elements_1 == 'logo'){
					$elements_2_menu = ux_get_option('theme_option_footer_elements_2_menu');
					if($elements_2_menu){
						wp_nav_menu(array(
							'menu' => $elements_2_menu,
							'container' => 'div',
							'container_class' => 'footer-menu',
							'items_wrap' => '<ul>%3$s</ul>'
						));
					}
				} 
			echo balanceTags($elements_2_wrap_after);

			echo balanceTags($elements_3_wrap_before);
				
				if($elements_3 == 'logo'){
					//** Function Logo for footer
					ux_interface_logo('footer');
				}elseif($elements_3 == 'menu'){
					$elements_3_menu = ux_get_option('theme_option_footer_elements_3_menu');
					if($elements_3_menu){
						wp_nav_menu(array(
							'menu' => $elements_3_menu,
							'container' => 'div',
							'container_class' => 'footer-menu',
							'items_wrap' => '<ul>%3$s</ul>'
						));
					}
                }elseif($elements_3 == 'copyright'){
					//** Function Copyright ?>
                    <div class="copyright">
                        <?php ux_interface_copyright(); ?>
                    </div>
				<?php
				}elseif($elements_3 == 'socialicons'){
				//** Function  ?>
                	<?php ux_interface_footer_social(); ?>
				<?php
				} 
			echo balanceTags($elements_3_wrap_after);

			?>
    
        </div>	
    
    </div>