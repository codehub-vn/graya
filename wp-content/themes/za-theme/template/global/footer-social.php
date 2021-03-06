<?php
$show_social_medias = ux_get_option('theme_option_show_social');
$social_medias = ux_get_option('theme_option_show_social_medias');
	
if($show_social_medias && $social_medias && isset($social_medias['icontype'])){
	$icon_type = $social_medias['icontype'];  ?>
	<div class="footer-social">
		<ul class="socialmeida clearfix">						
			<?php foreach($icon_type as $num => $type){
				$icon = $social_medias['icon'][$num];
				$url = $social_medias['url'][$num];
				$tip = $social_medias['tip'][$num];
				$tip_wrap =  $tip ? '<span class="socialmeida-text">'.esc_attr($tip).'</span>' : false;
				$width = (100 / count($icon_type)). '%';  ?>
				
				<li class="socialmeida-li">
                    <a title="<?php echo esc_attr($tip); ?>" href="<?php echo esc_url($url); ?>" class="socialmeida-a">
                        <?php      
                        if($type == 'user'){
                            echo '<img src="' .esc_url($icon). '" alt="' .esc_attr($tip). '" /> '.balanceTags($tip_wrap);
                        } else { 
                        	echo '<span class="' .esc_attr($icon). '"></span> '.balanceTags($tip_wrap); 
                        } ?>

                    </a>
                </li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>