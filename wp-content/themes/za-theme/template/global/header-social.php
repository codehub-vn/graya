<?php
$show_social_medias = ux_get_option('theme_option_show_social');
$social_medias = ux_get_option('theme_option_show_social_medias');

$social_media_title = ux_get_option('theme_option_social_media_title');
$social_media_descriptions = ux_get_option('theme_option_social_media_descriptions');
	
if($show_social_medias && $social_medias && isset($social_medias['icontype'])){
	$icon_type = $social_medias['icontype'];  ?>
	
    <ul class="socialmeida clearfix">						
        <?php foreach($icon_type as $num => $type){
            $icon = $social_medias['icon'][$num];
            $url = $social_medias['url'][$num];
            $tip = $social_medias['tip'][$num];  ?>
            
            <li class="socialmeida-li">
                <a title="<?php echo esc_attr($tip); ?>" href="<?php echo esc_url($url); ?>" class="socialmeida-a">
                    <?php      
                    if($type == 'user'){
                        echo '<img src="' .esc_url($icon). '" alt="' .esc_attr($tip). '" /> ';
                    } else { 
                        if($icon) { echo '<span class="' .esc_attr($icon). '"></span> '; } 
                    } ?>

                </a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>