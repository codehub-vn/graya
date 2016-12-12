<?php
//theme icons
function ux_theme_icons_fields(){

// Fontawesome icons list
$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
$fontawesome_path =  get_template_directory().'/functions/theme/css/font-awesome.min.css';
if( file_exists( $fontawesome_path ) ) {
	if(!class_exists('WP_Filesystem_Direct')){
		require_once(ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php');
		require_once(ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php');
	}
	$wp_filesystem = new WP_Filesystem_Direct('');
	@$subject = $wp_filesystem->get_contents($fontawesome_path);
}

preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

$icons = array();

foreach($matches as $match){
	//$icons[$match[1]] = $match[2];
	array_push($icons, 'fa ' . $match[1]);
}
//$icons = apply_filters('ux_theme_icons_fields', $icons);

return $icons;


}

function ux_theme_get_categories_fields($type=false){
	$output = array();
	
	$categories = get_categories(array(
		'hide_empty' => 0,
		'orderby' => 'id'
	));
	if($categories){
		foreach($categories as $category){
			array_push($output, array(
				'title' => $category->name,
				'value' => $category->term_id
			));
		}
	}else{
		$output = false;
	}
	
	return $output;
}

function ux_wp_get_nav_menus(){
	$output = array();
	$menus = wp_get_nav_menus();
	
	array_push($output, array(
		'title' => __('Select menu', 'ux'),
		'value' => 0
	));
	
	if($menus){
		foreach($menus as $menu){
			array_push($output, array(
				'title' => $menu->name,
				'value' => $menu->term_id
			));
		}
	}
	return $output;
}

//theme color
function ux_theme_color(){
	$theme_color = array(
		array('id' => 'color1', 'value' => 'theme-color-1', 'rgb' => '#F9885C'),
		array('id' => 'color2', 'value' => 'theme-color-2', 'rgb' => '#BD9DD1'),
		array('id' => 'color3', 'value' => 'theme-color-3', 'rgb' => '#F1A1C3'),
		array('id' => 'color4', 'value' => 'theme-color-4', 'rgb' => '#92C3E3'),
		array('id' => 'color5', 'value' => 'theme-color-5', 'rgb' => '#5B6A81'),
		array('id' => 'color6', 'value' => 'theme-color-6', 'rgb' => '#B8B69A'),
		array('id' => 'color7', 'value' => 'theme-color-7', 'rgb' => '#69CE9B'),
		array('id' => 'color8', 'value' => 'theme-color-8', 'rgb' => '#FFD02E'),
		array('id' => 'color9', 'value' => 'theme-color-9', 'rgb' => '#C6A584'),
		array('id' => 'color10', 'value' => 'theme-color-10', 'rgb' => '#313139')
	);	
	return $theme_color;
}

//theme config social networks
function ux_theme_social_networks(){
	$theme_config_social_networks = array(
		array(
			'name' => __('Facebook','ux'),
			'icon' => 'fa fa-facebook-square',
			'icon2' => 'fa fa-facebook-square',
			'slug' => 'facebook',
			'dec'  => __('Visit Facebook page','ux')
		),
		array(
			'name' => __('Twitter','ux'),
			'icon' => 'fa fa-twitter-square',
			'icon2' => 'fa fa-twitter-square',
			'slug' => 'twitter',
			'dec'  => __('Visit Twitter page','ux')
		),
		array(
			'name' => __('Google+','ux'),
			'icon' => 'fa fa-google-plus-square',
			'icon2' => 'fa fa-google-plus-square',
			'slug' => 'googleplus',
			'dec'  => __('Visit Google Plus page','ux')
		),
		array(
			'name' => __('Youtube','ux'),
			'icon' => 'fa fa-youtube-square',
			'icon2' => 'fa fa-youtube-square',
			'slug' => 'youtube',
			'dec'  => __('Visit Youtube page','ux')
		),
		array(
			'name' => __('Vimeo','ux'),
			'icon' => 'fa fa-vimeo-square',
			'icon2' => 'fa fa-vimeo-square',
			'slug' => 'vimeo',
			'dec'  => __('Visit Vimeo page','ux')
		),
		array(
			'name' => __('Tumblr','ux'),
			'icon' => 'fa fa-tumblr-square',
			'icon2' => 'fa fa-tumblr-square',
			'slug' => 'tumblr',
			'dec'  => __('Visit Tumblr page','ux')
		),
		array(
			'name' => __('RSS','ux'),
			'icon' => 'fa fa-rss-square',
			'icon2' => 'fa fa-rss-square',
			'slug' => 'rss',
			'dec'  => __('Visit Rss','ux')
		),
		array(
			'name' => __('Pinterest','ux'),
			'icon' => 'fa fa-pinterest-square',
			'icon2' => 'fa fa-pinterest-square',
			'slug' => 'pinterest',
			'dec'  => __('Visit Pinterest page','ux')
		),
		array(
			'name' => __('Linkedin','ux'),
			'icon' => 'fa fa-linkedin-square',
			'icon2' => 'fa fa-linkedin-square',
			'slug' => 'linkedin',
			'dec'  => __('Visit Linkedin page','ux')
		),
		array(
			'name' => __('Instagram','ux'),
			'icon' => 'fa fa-instagram',
			'icon2' => 'fa fa-instagram',
			'slug' => 'instagram',
			'dec'  => __('Visit Instagram page','ux')
		),
		array(
			'name' => __('Github','ux'),
			'icon' => 'fa fa-github-square',
			'icon2' => 'fa fa-github-square',
			'slug' => 'github',
			'dec'  => __('Visit Github page','ux')
		),
		array(
			'name' => __('Xing','ux'),
			'icon' => 'fa fa-xing-square',
			'icon2' => 'fa fa-xing-square',
			'slug' => 'xing',
			'dec'  => __('Visit Xing page','ux')
		),
		array(
			'name' => __('Flickr','ux'),
			'icon' => 'fa fa-flickr',
			'icon2' => 'fa fa-flickr',
			'slug' => 'flickr',
			'dec'  => __('Visit Flickr page','ux')
		),
		array(
			'name' => __('VK','ux'),
			'icon' => 'fa fa-vk square-radiu',
			'icon2' => 'fa fa-vk square-radiu',
			'slug' => 'vk',
			'dec'  => __('Visit VK page','ux')
		),
		array(
			'name' => __('Weibo','ux'),
			'icon' => 'fa fa-weibo square-radiu',
			'icon2' => 'fa fa-weibo square-radiu',
			'slug' => 'weibo',
			'dec'  => __('Visit Weibo page','ux')
		),
		array(
			'name' => __('Renren','ux'),
			'icon' => 'fa fa-renren square-radiu',
			'icon2' => 'fa fa-renren square-radiu',
			'slug' => 'renren',
			'dec'  => __('Visit Renren page','ux')
		),
		array(
			'name' => __('Bitbucket','ux'),
			'icon' => 'fa fa-bitbucket-square',
			'icon2' => 'fa fa-bitbucket-square',
			'slug' => 'bitbucket',
			'dec'  => __('Visit Bitbucket page','ux')
		),
		array(
			'name' => __('Foursquare','ux'),
			'icon' => 'fa fa-foursquare square-radiu',
			'icon2' => 'fa fa-foursquare square-radiu',
			'slug' => 'foursquare',
			'dec'  => __('Visit Foursquare page','ux')
		),
		array(
			'name' => __('Skype','ux'),
			'icon' => 'fa fa-skype square-radiu',
			'icon2' => 'fa fa-skype square-radiu',
			'slug' => 'skype',
			'dec'  => __('Skype','ux')
		),
		array(
			'name' => __('Dribbble','ux'),
			'icon' => 'fa fa-dribbble square-radiu',
			'icon2' => 'fa fa-dribbble square-radiu',
			'slug' => 'dribbble',
			'dec'  => __('Visit Dribbble page','ux')
		)
	);	
	
	return $theme_config_social_networks;
	
}

//theme config fonts size
function ux_theme_options_fonts_size(){
	$theme_config_fonts_size = array('Select','10px', '11px', '12px', '13px', '14px', '15px', '16px', '17px', '18px', '19px', '20px', '22px', '24px', '26px', '28px', '30px', '32px', '36px', '38px', '40px', '46px', '50px', '56px', '60px', '66px', '72px');
	
	return $theme_config_fonts_size;
}

//theme config fonts style
function ux_theme_options_fonts_style(){
	$theme_config_fonts_style = array(
		array('title' => 'Select', 'value' => ''),
		array('title' => 'Light', 'value' => 'light'),
		array('title' => 'Normal', 'value' => 'regular'),
		array('title' => 'Bold', 'value' => 'bold'),
		array('title' => 'Italic', 'value' => 'italic')
	);
	
	return $theme_config_fonts_style;
}

//theme config color scheme
function ux_theme_options_color_scheme(){
	
	$color_scheme = array(
		'scheme-1' => array(
			array('name' => 'theme_main_color', 			  'value' => '#C7AD87'),
			array('name' => 'second_auxiliary_color', 		  'value' => '#EEEEEE'),
			array('name' => 'logo_text_color', 				  'value' => '#FFFFFF'),
			array('name' => 'logo_text_color_footer', 		  'value' => '#FFFFFF'),
			array('name' => 'menu_panel_bg_color', 		      'value' => '#FFFFFF'),
			array('name' => 'menu_item_text_color',           'value' => '#313139'),
			array('name' => 'menu_item_text_mouseover_color', 'value' => '#C7AD87'),
			array('name' => 'menu_item_text_active_color',    'value' => '#313139'),
			array('name' => 'heading_color', 				  'value' => '#313139'),
			array('name' => 'content_text_color', 			  'value' => '#414145'),
			array('name' => 'auxiliary_content_color', 		  'value' => '#999999'),
			array('name' => 'selected_text_bg_color', 		  'value' => '#D4BD9B'),
			array('name' => 'page_post_header_bg_color',      'value' => '#F1F1F1'),
			array('name' => 'page_post_bg_color', 			  'value' => '#F8F8F8'),
			array('name' => 'sidebar_widget_title_color',     'value' => '#28282E'),
			array('name' => 'sidebar_content_color', 	      'value' => '#606066'),
			array('name' => 'footer_widget_title_color', 	  'value' => '#28282E'),
			array('name' => 'footer_widget_content_color',    'value' => '#888888'),
			array('name' => 'footer_widget_bg_color',         'value' => '#FFFFFF'),
			array('name' => 'footer_text_color', 			  'value' => '#888888'),
			array('name' => 'footer_bg_color', 				  'value' => '#FFFFFF')
		),
		'scheme-2' => array(
			array('name' => 'theme_main_color', 			  'value' => '#EE7164'),
			array('name' => 'second_auxiliary_color', 		  'value' => '#EEEEEE'),
			array('name' => 'logo_text_color', 				  'value' => '#FFFFFF'),
			array('name' => 'logo_text_color_footer', 		  'value' => '#FFFFFF'),
			array('name' => 'menu_panel_bg_color', 		      'value' => '#FFFFFF'),
			array('name' => 'menu_item_text_color',           'value' => '#313139'),
			array('name' => 'menu_item_text_mouseover_color', 'value' => '#EE7164'),
			array('name' => 'menu_item_text_active_color',    'value' => '#313139'),
			array('name' => 'heading_color', 				  'value' => '#313139'),
			array('name' => 'content_text_color', 			  'value' => '#414145'),
			array('name' => 'auxiliary_content_color', 		  'value' => '#999999'),
			array('name' => 'selected_text_bg_color', 		  'value' => '#EE7164'),
			array('name' => 'page_post_header_bg_color',      'value' => '#F1F1F1'),
			array('name' => 'page_post_bg_color', 			  'value' => '#F8F8F8'),
			array('name' => 'sidebar_widget_title_color',     'value' => '#28282E'),
			array('name' => 'sidebar_content_color', 	      'value' => '#606066'),
			array('name' => 'footer_widget_title_color', 	  'value' => '#28282E'),
			array('name' => 'footer_widget_content_color',    'value' => '#888888'),
			array('name' => 'footer_widget_bg_color',         'value' => '#FFFFFF'),
			array('name' => 'footer_text_color', 			  'value' => '#888888'),
			array('name' => 'footer_bg_color', 				  'value' => '#FFFFFF')
		),
		'scheme-3' => array(
			array('name' => 'theme_main_color', 			  'value' => '#5DBD88'),
			array('name' => 'second_auxiliary_color', 		  'value' => '#EEEEEE'),
			array('name' => 'logo_text_color', 				  'value' => '#FFFFFF'),
			array('name' => 'logo_text_color_footer', 		  'value' => '#FFFFFF'),
			array('name' => 'menu_panel_bg_color', 		      'value' => '#FFFFFF'),
			array('name' => 'menu_item_text_color',           'value' => '#313139'),
			array('name' => 'menu_item_text_mouseover_color', 'value' => '#5DBD88'),
			array('name' => 'menu_item_text_active_color',    'value' => '#313139'),
			array('name' => 'heading_color', 				  'value' => '#313139'),
			array('name' => 'content_text_color', 			  'value' => '#414145'),
			array('name' => 'auxiliary_content_color', 		  'value' => '#999999'),
			array('name' => 'selected_text_bg_color', 		  'value' => '#5DBD88'),
			array('name' => 'page_post_header_bg_color',      'value' => '#F1F1F1'),
			array('name' => 'page_post_bg_color', 			  'value' => '#F8F8F8'),
			array('name' => 'sidebar_widget_title_color',     'value' => '#28282E'),
			array('name' => 'sidebar_content_color', 	      'value' => '#606066'),
			array('name' => 'footer_widget_title_color', 	  'value' => '#28282E'),
			array('name' => 'footer_widget_content_color',    'value' => '#888888'),
			array('name' => 'footer_widget_bg_color',         'value' => '#FFFFFF'),
			array('name' => 'footer_text_color', 			  'value' => '#888888'),
			array('name' => 'footer_bg_color', 				  'value' => '#FFFFFF')
		),
		'scheme-4' => array(
			array('name' => 'theme_main_color', 			  'value' => '#7CD1ED'),
			array('name' => 'second_auxiliary_color', 		  'value' => '#EEEEEE'),
			array('name' => 'logo_text_color', 				  'value' => '#FFFFFF'),
			array('name' => 'logo_text_color_footer', 		  'value' => '#FFFFFF'),
			array('name' => 'menu_panel_bg_color', 		      'value' => '#FFFFFF'),
			array('name' => 'menu_item_text_color',           'value' => '#313139'),
			array('name' => 'menu_item_text_mouseover_color', 'value' => '#7CD1ED'),
			array('name' => 'menu_item_text_active_color',    'value' => '#313139'),
			array('name' => 'heading_color', 				  'value' => '#313139'),
			array('name' => 'content_text_color', 			  'value' => '#414145'),
			array('name' => 'auxiliary_content_color', 		  'value' => '#999999'),
			array('name' => 'selected_text_bg_color', 		  'value' => '#7CD1ED'),
			array('name' => 'page_post_header_bg_color',      'value' => '#F1F1F1'),
			array('name' => 'page_post_bg_color', 			  'value' => '#F8F8F8'),
			array('name' => 'sidebar_widget_title_color',     'value' => '#28282E'),
			array('name' => 'sidebar_content_color', 	      'value' => '#606066'),
			array('name' => 'footer_widget_title_color', 	  'value' => '#28282E'),
			array('name' => 'footer_widget_content_color',    'value' => '#888888'),
			array('name' => 'footer_widget_bg_color',         'value' => '#FFFFFF'),
			array('name' => 'footer_text_color', 			  'value' => '#888888'),
			array('name' => 'footer_bg_color', 				  'value' => '#FFFFFF')
		),
		'scheme-5' => array(
			array('name' => 'theme_main_color', 			  'value' => '#C7AD87'),
			array('name' => 'second_auxiliary_color', 		  'value' => '#EEEEEE'),
			array('name' => 'logo_text_color', 				  'value' => '#FFFFFF'),
			array('name' => 'logo_text_color_footer', 		  'value' => '#FFFFFF'),
			array('name' => 'menu_panel_bg_color', 		      'value' => '#373740'),
			array('name' => 'menu_item_text_color',           'value' => '#F0F0F0'),
			array('name' => 'menu_item_text_mouseover_color', 'value' => '#C7AD87'),
			array('name' => 'menu_item_text_active_color',    'value' => '#FFFFFF'),
			array('name' => 'heading_color', 				  'value' => '#313139'),
			array('name' => 'content_text_color', 			  'value' => '#414145'),
			array('name' => 'auxiliary_content_color', 		  'value' => '#999999'),
			array('name' => 'selected_text_bg_color', 		  'value' => '#D4BD9B'),
			array('name' => 'page_post_header_bg_color',      'value' => '#FFFFFF'),
			array('name' => 'page_post_bg_color', 			  'value' => '#FAFAFA'),
			array('name' => 'sidebar_widget_title_color',     'value' => '#28282E'),
			array('name' => 'sidebar_content_color', 	      'value' => '#888888'),
			array('name' => 'footer_widget_title_color', 	  'value' => '#28282E'),
			array('name' => 'footer_widget_content_color',    'value' => '#888888'),
			array('name' => 'footer_widget_bg_color',         'value' => '#FFFFFF'),
			array('name' => 'footer_text_color', 			  'value' => '#999999'),
			array('name' => 'footer_bg_color', 				  'value' => '#FFFFFF')
		),
		'scheme-6' => array(
			array('name' => 'theme_main_color', 			  'value' => '#EE7164'),
			array('name' => 'second_auxiliary_color', 		  'value' => '#EEEEEE'),
			array('name' => 'logo_text_color', 				  'value' => '#FFFFFF'),
			array('name' => 'logo_text_color_footer', 		  'value' => '#FFFFFF'),
			array('name' => 'menu_panel_bg_color', 		      'value' => '#373740'),
			array('name' => 'menu_item_text_color',           'value' => '#F0F0F0'),
			array('name' => 'menu_item_text_mouseover_color', 'value' => '#EE7164'),
			array('name' => 'menu_item_text_active_color',    'value' => '#FFFFFF'),
			array('name' => 'heading_color', 				  'value' => '#313139'),
			array('name' => 'content_text_color', 			  'value' => '#414145'),
			array('name' => 'auxiliary_content_color', 		  'value' => '#999999'),
			array('name' => 'selected_text_bg_color', 		  'value' => '#EE7164'),
			array('name' => 'page_post_header_bg_color',      'value' => '#FFFFFF'),
			array('name' => 'page_post_bg_color', 			  'value' => '#FAFAFA'),
			array('name' => 'sidebar_widget_title_color',     'value' => '#28282E'),
			array('name' => 'sidebar_content_color', 	      'value' => '#888888'),
			array('name' => 'footer_widget_title_color', 	  'value' => '#28282E'),
			array('name' => 'footer_widget_content_color',    'value' => '#888888'),
			array('name' => 'footer_widget_bg_color',         'value' => '#FFFFFF'),
			array('name' => 'footer_text_color', 			  'value' => '#999999'),
			array('name' => 'footer_bg_color', 				  'value' => '#FFFFFF')
		),
		'scheme-7' => array(
			array('name' => 'theme_main_color', 			  'value' => '#5DBD88'),
			array('name' => 'second_auxiliary_color', 		  'value' => '#EEEEEE'),
			array('name' => 'logo_text_color', 				  'value' => '#FFFFFF'),
			array('name' => 'logo_text_color_footer', 		  'value' => '#FFFFFF'),
			array('name' => 'menu_panel_bg_color', 		      'value' => '#373740'),
			array('name' => 'menu_item_text_color',           'value' => '#F0F0F0'),
			array('name' => 'menu_item_text_mouseover_color', 'value' => '#5DBD88'),
			array('name' => 'menu_item_text_active_color',    'value' => '#FFFFFF'),
			array('name' => 'heading_color', 				  'value' => '#313139'),
			array('name' => 'content_text_color', 			  'value' => '#414145'),
			array('name' => 'auxiliary_content_color', 		  'value' => '#999999'),
			array('name' => 'selected_text_bg_color', 		  'value' => '#5DBD88'),
			array('name' => 'page_post_header_bg_color',      'value' => '#FFFFFF'),
			array('name' => 'page_post_bg_color', 			  'value' => '#FAFAFA'),
			array('name' => 'sidebar_widget_title_color',     'value' => '#28282E'),
			array('name' => 'sidebar_content_color', 	      'value' => '#888888'),
			array('name' => 'footer_widget_title_color', 	  'value' => '#28282E'),
			array('name' => 'footer_widget_content_color',    'value' => '#888888'),
			array('name' => 'footer_widget_bg_color',         'value' => '#FFFFFF'),
			array('name' => 'footer_text_color', 			  'value' => '#999999'),
			array('name' => 'footer_bg_color', 				  'value' => '#FFFFFF')
		),
		'scheme-8' => array(
			array('name' => 'theme_main_color', 			  'value' => '#7CD1ED'),
			array('name' => 'second_auxiliary_color', 		  'value' => '#EEEEEE'),
			array('name' => 'logo_text_color', 				  'value' => '#FFFFFF'),
			array('name' => 'logo_text_color_footer', 		  'value' => '#FFFFFF'),
			array('name' => 'menu_panel_bg_color', 		      'value' => '#373740'),
			array('name' => 'menu_item_text_color',           'value' => '#F0F0F0'),
			array('name' => 'menu_item_text_mouseover_color', 'value' => '#7CD1ED'),
			array('name' => 'menu_item_text_active_color',    'value' => '#FFFFFF'),
			array('name' => 'heading_color', 				  'value' => '#313139'),
			array('name' => 'content_text_color', 			  'value' => '#414145'),
			array('name' => 'auxiliary_content_color', 		  'value' => '#999999'),
			array('name' => 'selected_text_bg_color', 		  'value' => '#7CD1ED'),
			array('name' => 'page_post_header_bg_color',      'value' => '#FFFFFF'),
			array('name' => 'page_post_bg_color', 			  'value' => '#FAFAFA'),
			array('name' => 'sidebar_widget_title_color',     'value' => '#28282E'),
			array('name' => 'sidebar_content_color', 	      'value' => '#888888'),
			array('name' => 'footer_widget_title_color', 	  'value' => '#28282E'),
			array('name' => 'footer_widget_content_color',    'value' => '#888888'),
			array('name' => 'footer_widget_bg_color',         'value' => '#FFFFFF'),
			array('name' => 'footer_text_color', 			  'value' => '#999999'),
			array('name' => 'footer_bg_color', 				  'value' => '#FFFFFF')
		)
	);
	return $color_scheme;
	
}

//theme config select fields
function ux_theme_options_config_select_fields(){
	$theme_config_select_fields = array(
		'theme_option_posts_showmeta' => array(
		array('title' => __('Date','ux'),                       'value' => 'date'),
		array('title' => __('Length','ux'),                     'value' => 'length'),
		array('title' => __('Category','ux'),                   'value' => 'category'),
		array('title' => __('Tag','ux'),                        'value' => 'tag'),
		array('title' => __('Author','ux'),                     'value' => 'author'),
		array('title' => __('Comments','ux'),                   'value' => 'comments')
		),
		
		'theme_meta_demo_site' => array(  
		array('title' => __('Agency Demo','ux'),                'value' => '../wp-content/themes/'.get_stylesheet().'/functions/theme/agency.xml'),
		array('title' => __('Freelance Demo','ux'),             'value' => '../wp-content/themes/'.get_stylesheet().'/functions/theme/freelance.xml'),
		array('title' => __('Agency Demo B','ux'),              'value' => '../wp-content/themes/'.get_stylesheet().'/functions/theme/agency2.xml')
		),
		
		'theme_option_share_buttons' => array(
		array('title' => __('Facebook','ux'),                   'value' => 'facebook'),
		array('title' => __('Twitter','ux'),                    'value' => 'twitter'),
		array('title' => __('Google Plus','ux'),                'value' => 'google-plus'),
		array('title' => __('Pinterest','ux'),                  'value' => 'pinterest'),
		array('title' => __('Digg','ux'),                       'value' => 'digg'),
		array('title' => __('Reddit','ux'),                    	'value' => 'reddit'),
		array('title' => __('Linkedin','ux'),                   'value' => 'linkedin'),
		array('title' => __('Stumbleupon','ux'),                'value' => 'stumbleupon'),
		array('title' => __('Tumblr','ux'),                    	'value' => 'tumblr'),
		array('title' => __('Mail','ux'),                    	'value' => 'mail')
		),
		
		'theme_option_layout_menubar' => array(
		array('title' => __('Menubar on Side','ux'),            'value' => 'menubar-on-side'),
		array('title' => __('Menubar on Head','ux'),            'value' => 'menubar-on-head')
		),
		
		'theme_option_layout_menubar_direction' => array(
		array('title' => __('Left','ux'),                       'value' => 'left'),
		array('title' => __('Right','ux'),                      'value' => 'right')
		),

		'theme_option_layout_menubar_header_type' => array(
		array('title' => __('Menu Folder Effect','ux'),         'value' => 'menu-folder'),
		array('title' => __('Menu Shown by Default','ux'),      'value' => 'menu-shown')
		),
		
		'theme_option_footer_widget_for_posts'                   => ux_theme_register_sidebar('footer_widget'),
		'theme_option_hide_category_on_post_page'                => ux_theme_get_categories_fields(),
		
		'theme_option_footer_elements_align' => array(
		array('title' => __('Centered','ux'),                   'value' => 'centered'),
		array('title' => __('1/4+1/4+1/2','ux'),                'value' => 'cols')
		),
		
		'theme_option_footer_elements_1' => array(
		array('title' => __('Logo','ux'),                       'value' => 'logo'),
		array('title' => __('Menu','ux'),                       'value' => 'menu'),
		array('title' => __('Copyright Info','ux'),             'value' => 'copyright'),
		array('title' => __('Social Icons','ux'),               'value' => 'socialicons'),
		array('title' => __('None','ux'),                       'value' => 'none')
		),
		
		'theme_option_footer_elements_2' => array(
		array('title' => __('Logo','ux'),                       'value' => 'logo'),
		array('title' => __('Menu','ux'),                       'value' => 'menu'),
		array('title' => __('Copyright Info','ux'),             'value' => 'copyright'),
		array('title' => __('Social Icons','ux'),               'value' => 'socialicons'),
		array('title' => __('None','ux'),                       'value' => 'none')
		),
		
		'theme_option_footer_elements_3' => array(
		array('title' => __('Logo','ux'),                       'value' => 'logo'),
		array('title' => __('Menu','ux'),                       'value' => 'menu'),
		array('title' => __('Copyright Info','ux'),             'value' => 'copyright'),
		array('title' => __('Social Icons','ux'),               'value' => 'socialicons'),
		array('title' => __('None','ux'),                       'value' => 'none')
		),
		
		'theme_option_footer_elements_1_menu'                   => ux_wp_get_nav_menus(),
		'theme_option_footer_elements_2_menu'                   => ux_wp_get_nav_menus(),
		'theme_option_footer_elements_3_menu'                   => ux_wp_get_nav_menus(),
		
		
	);
	
	$theme_config_select_fields = apply_filters('theme_config_select_fields', $theme_config_select_fields);
	return $theme_config_select_fields;
}

//theme config fields
function ux_theme_options_config_fields(){
	$theme_config_fields = array(
		array(
			'id'      => 'options-theme',
			'name'    => __('Theme Options','ux'),
			'section' => array(
				
				array(/* Import Demo Data */
					'id'    => 'import-export',
					'title' => __('Import Demo Data','ux'),
					'item'  => array(
						array('description' => __('if you are new to WordPress or have problems creating posts or pages that look like the theme demo, you could import dummy posts and pages here that will definitely help to understand how those tasks are done','ux'),
							  'button'      => array('title'   => __('Import Demo Data','ux'),
													 'loading' => __('Loading data, don&acute;t close the page please.','ux'),
													 'type'    => 'import-demo-data',
													 'class'   => 'btn-info',
													 'url'     => admin_url('admin.php?import=wordpress&step=2', 'http')),
							  'notice'      => __('The demo content will be import including post/pages and sliders, the images in sliders could only be use as placeholder and could not be use in your finally website due to copyright reasons.','ux'),
							  'type'        => 'button',
							  'name'        => 'theme_option_import_demo'),
								  
						array('type'        => 'select',
							  'description' => '',
							  'name'        => 'theme_meta_demo_site',
							  'col_size'    => 'width: 300px;'),
						
						array('description' => __('export your current data to a file and save it on your computer','ux'),
							  'button'      => array('title' => __('Export Current Data','ux'),
													 'type'  => 'export-current-data',
													 'class' => 'btn-default',
													 'url'   => admin_url('export.php?download=true')),
							  'type'        => 'button',
							  'name'        => 'theme_option_export_current_data'),
								  
						array('description' => __('import a data file you have saved','ux'),
							  'button'      => array('title' => __('Import My Saved Data','ux'),
													 'type'  => 'import-mysaved-data',
													 'class' => 'btn-default',
													 'url'   => admin_url('admin.php?import=wordpress')),
							  'type'        => 'button',
							  'name'        => 'theme_option_import_mysaved_data'))),
							  
				array(/* FrontPage */
					'id'   => 'frontpage',
					'item' => array(
						array('title'       => __('FrontPage','ux'),
							  'description' => __('select which page to display on your FrontPage, if left blank the Blog will be displayed','ux'),
							  'type'        => 'select-front',
							  'name'        => 'theme_option_frontpage'))),
							  
				array(/* Generate New Thumbs for This Theme */
					'id'   => 'generate-thumbs',
					'item' => array(
						array('title'       => __('Generate New Thumbs for This Theme','ux'),
							  'description' => __('if you have many posts and had assigned some Featured Image for them before using this theme, this button could help you adapt these feature images to appropriate size for this theme','ux'),
							  'button'      => array('title'   => __('Generate New Thumbnails','ux'),
													 'loading' => __('Processing, don&acute;t close the page please.','ux'),
													 'type'    => 'generate-thumbs',
													 'class'   => 'btn-default'),
							  'type'        => 'button',
							  'name'        => 'theme_option_generate_thumbs')))
			)
		),
		array(
			'id'      => 'options-general',
			'name'    => __('General Settings','ux'),
			'section' => array(    

				array(/* Logo */
					'id'    => 'logo',
					'title' => __('Logo','ux'),
					'item'  => array(        
						
						// Enable Plain Text Logo
						array('title'       => __('Enable Plain Text Logo','ux'),
							  'description' => '',
							  'type'        => 'switch',
							  'name'        => 'theme_option_enable_text_logo',
							  'default'     => 'false'),

						// Logo Text
						array('title'       => __('Logo Text','ux'),
							  'type'        => 'text',
							  'name'        => 'theme_option_text_logo',
							  'description' => '',
							  'default'     => '',
							  'control'     => array('name'  => 'theme_option_enable_text_logo',
													 'value' => 'true')),

						// Costom Logo
						array('title'       => __('Custom Logo','ux'),
							  'description' => __('the container for custom logo is 120px(width) * 120px(hight) for "Menu Bar on Side" layout,  240px(width) * 100px(hight) for "Menu Bar on Head" layout, you could upload a double size logo image to meet the needs of retina screens','ux'),
							  'type'        => 'upload',
							  'name'        => 'theme_option_custom_logo',
							  'control'     => array('name'  => 'theme_option_enable_text_logo',
													 'value' => 'false')),

						// Costom Logo for mobile
						array('title'       => __('Custom Logo For Mobile Layout','ux'),
							  'description' => __('the container for custom logo is 240px(width) * 60px(height)','ux'),
							  'type'        => 'upload',
							  'name'        => 'theme_option_custom_logo_mobile',
							  'control'     => array('name'  => 'theme_option_enable_text_logo',
													 'value' => 'false')),

						// Custom Logo For Loading Page
						array('title'       => __('Custom Logo For Loading Page','ux'),
							  'description' => '',
							  'type'        => 'upload',
							  'name'        => 'theme_option_custom_logo_for_loading',
							  'control'     => array('name'  => 'theme_option_enable_text_logo',
													 'value' => 'false')),

						// Costom Footer Logo
						array('title'       => __('Custom Footer Logo','ux'),
							  'description' => '',
							  'type'        => 'upload',
							  'name'        => 'theme_option_custom_footer_logo',
							  'control'     => array('name'  => 'theme_option_enable_text_logo',
													 'value' => 'false')))),
				
				array(/* Descriptions */
					'id'    => 'descriptions',
					'title' => __('Descriptions','ux'),
					'item'  => array(

						// Pagination
                        array('title'       => __('Load More','ux'),
                               'description' => '',
                               'type'        => 'text',
                               'default'     => __('LOAD MORE ARTICLES','ux'),
                               'name'        => 'theme_option_descriptions_pagination'),

						// Leave a Comment
                        array('title'       => __('Comment Title','ux'),
                               'description' => __('Comments in posts','ux'),
                               'type'        => 'text',
                               'default'     => __('LEAVE A COMMNET','ux'),
                               'name'        => 'theme_option_descriptions_comment_title'),

						// Your message
                        array('title'       => __('Comment Box Placeholder','ux'),
                               'description' => '',
                               'type'        => 'text',
                               'default'     => __('Leave your message here','ux'),
                               'name'        => 'theme_option_descriptions_your_message'),

                        // Send
                        array('title'       => __('Comment Submit Button Name','ux'),
                               'description' => '',
                               'type'        => 'text',
                               'default'     => __('SEND MESSAGE','ux'),
                               'name'        => 'theme_option_descriptions_comment_submit'),

                        // Learn more
                        array('title'       => __('Learn More in portfolio module','ux'),
                               'description' => '',
                               'type'        => 'text',
                               'default'     => __('Learn More','ux'),
                               'name'        => 'theme_option_descriptions_portfolio_learnmore'),

                        // Share
                        array('title'       => __('Social Media Share Bar Title','ux'),
                               'description' => '',
                               'type'        => 'text',
                               'default'     => __('SHARE','ux'),
                               'name'        => 'theme_option_descriptions_share')

						)),
				
				array(/* Copyright */
					'id'    => 'copyright',
					'title' => __('Copyright','ux'),
					'item'  => array(
						
						// Copyright Information
						array('title'       => __('Copyright Information','ux'),
							  'description' => __('enter the copyright information, it would be placed on the bottom of the pages','ux'),
							  'type'        => 'text',
							  'name'        => 'theme_option_copyright',
							  'default'     => 'Copyright Information.'))),
							 
							  
				array(/* Icon */
					'id'    => 'icon',
					'title' => __('Icon','ux'),
					'item'  => array(
						
						// Custom Favicon
						array('title'       => __('Custom Favicon','ux'),
							  'description' => __('upload the favicon for your website, it would be shown on the tab of the browser','ux'),
							  'type'        => 'upload',
							  'name'        => 'theme_option_custom_favicon',
							  'default'     => UX_LOCAL_URL . '/img/favicon.ico'),
							  
						// Custom Mobile Icon
						array('title'       => __('Custom Mobile Icon','ux'),
							  'description' => __('upload the icon for the shortcuts on mobile devices','ux'),
							  'type'        => 'upload',
							  'name'        => 'theme_option_mobile_icon',
							  'default'     => UX_LOCAL_URL . '/img/apple-touch-icon-114x114.png'))),
							
				array(/* Custom CSS */
					'title' => __('Custom CSS','ux'),
					'id'    => 'custom-css',
					'title' => __('Custom CSS','ux'),
					'item'  => array(
						
						// Please enter your Custom CSS (Optional)
						array('title'       => __('Please enter your Custom CSS (Optional)','ux'),
							  'description' => '',
							  'type'        => 'textarea',
							  'name'        => 'theme_option_custom_css')))
			)
		),
		array(
			'id'      => 'options-social-networks',
			'name'    => __('Social Networks','ux'),
			'section' => array(
				
				array(/* Your Social Media Links */
					'id'    => 'social-media-links',
					'title' => __('Your Social Media Links','ux'),
					'item'  => array(

						// Enable Social Media Links
						array('title'       => __('Enable Social Media Links','ux'),
							  'description' => '',
							  'type'        => 'switch',
							  'name'        => 'theme_option_show_social',
							  'default'     => 'false'),

						// Title for Social Media Links Section
						// array('title'       => __('Title for Social Media Links Section','ux'),
						// 	  'description' => '',
						// 	  'type'        => 'text',
						// 	  'name'        => 'theme_option_social_media_title'),

						// Descriptions for Social Media Links Section
						// array('title'       => __('Descriptions for Social Media Links Section','ux'),
						// 	  'description' => '',
						// 	  'type'        => 'textarea',
						// 	  'name'        => 'theme_option_social_media_descriptions'),
															
						// Social Medias
						array('title'       => __('Social Medias','ux'),
							  'description' => '',
							  'type'        => 'new-social-medias',
							  'name'        => 'theme_option_show_social_medias',
							  'control'  => array('name'  => 'theme_option_show_social',
												  'value' => 'true')))),				 
				
				array(/* Share Buttons For Post */
					'id'    => 'social-media-buttons',
					'title' => __('Share Buttons For Post','ux'),
					'item'  => array(
											 
					    // Enable Share Buttons for Posts
						array('title'       => __('Enable Share Buttons for Posts','ux'),
							  'description' => '',
							  'type'        => 'switch',
							  'name'        => 'theme_option_enable_share_buttons_for_posts',
							  'default'     => 'true',
							  'bind'        => array(
								  array('type'     => 'checkbox-group',
										'name'     => 'theme_option_share_buttons',
										'position' => 'after',
										'default'  => array('facebook', 'twitter', 'google-plus', 'pinterest'),
										'control'  => array('name'  => 'theme_option_enable_share_buttons_for_posts',
															'value' => 'true'))))
					)
				)
			)
		),
		array(
			'id'      => 'options-schemes',
			'name'    => __('Schemes','ux'),
			'section' => array(
				
				array(/* Color Setting */
					'id'    => 'color-scheme',
					'title' => __('Color Setting','ux'),
					'item'  => array(
						
						// Select Color Scheme
						array('title'       => __('Select a predefined color scheme ','ux'),
							  'description' => '',
							  'type'        => 'color-scheme',
							  'name'        => 'theme_option_color_scheme'))),
							  
				array(/* Global */
					'id'    => 'color-main',
					'title' => __('Global','ux'),
					'item'  => array(
						
						// Highlight Color
						array('title'       => __('Highlight Color','ux'),
							  'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_theme_main',
							  'scheme-name' => 'theme_main_color',
							  'default'     => '#E07B48'),
							  
						//** Auxiliary Color
						array('title'       => __('Auxiliary Color','ux'),
							  'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_second_auxiliary',
							  'scheme-name' => 'second_auxiliary_color',
							  'default'     => '#EEEEEE'))),
                                
				array(/* Logo */
					'id'    => 'color-logo',
					'title' => __('Logo','ux'),
					'item'  => array(
						
						// Logo Text Color
						array('title'       => __('Logo Text Color','ux'),
							  'description' => __('color for plain text logo','ux'),
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_logo',
							  'scheme-name' => 'logo_text_color',
							  'default'     => '#FFFFFF'),
	  
						// Logo Text Color for Footer
						array('title'       => __('Logo Text Color for Footer','ux'),
							  'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_footer_logo',
							  'scheme-name' => 'logo_text_color_footer',
							  'default'     => '#FFFFFF'),
	  
					)
				),
							  
				array(/* Menu */
					'id'    => 'color-menu',
					'title' => __('Menu','ux'),
					'item'  => array(
										  
										  
						// Menu Panel Bg Color
						array('title'       => __('Menu Panel Bg Color','ux'),
							  'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_menu_panel_bg',
							  'scheme-name' => 'menu_panel_bg_color',
							  'default'     => '#ffffff'),
										  
						// Menu Item Text Color
						array('title'       => __('Menu Item Text Colour','ux'),
							  'description' => __('color for menu item text','ux'),
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_menu_item_text',
							  'scheme-name' => 'menu_item_text_color',
							  'default'     => '#313139'),
										  
						// Menu Item Text Color Mouseover
						array('title'       => __('Menu Item Text Color Mouseover','ux'),
							  'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_menu_item_text_mouseover',
							  'scheme-name' => 'menu_item_text_mouseover_color',
							  'default'     => '#313139'),
										  
						// Activated Item Text Color
						array('title'       => __('Activated Item Text Color','ux'),
							  'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_menu_activated_item_text',
							  'scheme-name' => 'menu_item_text_active_color',
							  'default'     => '#313139'),
								  
						// Menu Item Text Color Mouseover
						/*array('title'       => __('Menu Item Background Colour','ux'),
							  'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_menu_item_bg',
							  'scheme-name' => 'menu_item_bg_color',
							  'default'     => '#ffffff') */
								  
						)),
							  
				array(/* Posts & Pages */
					'id'    => 'color-post-page',
					'title' => __('Posts & Pages','ux'),
					'item'  => array(

						// Heading Text Color
						array('title'       => __('Heading Text Color','ux'),
							  'description' => __('the color for post/archive title text','ux'),
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_heading',
							  'scheme-name' => 'heading_color',
							  'default'     => '#313139'),
							  
						// Content Text Color
						array('title'       => __('Content Text Color','ux'),
							  'description' => __('the color for content text ','ux'),
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_content_text',
							  'scheme-name' => 'content_text_color',
							  'default'     => '#414145'),
							  
						// Auxiliary Text Color
						array('title'       => __('Auxiliary Text Color','ux'),
							  'description' => __('the color for auxiliary content text, such as meta of a post','ux'),
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_auxiliary_content',
							  'scheme-name' => 'auxiliary_content_color',
							  'default'     => '#999999'),
							  
						// Selected Text Bg Color
						array('title'       => __('Selected Text Bg Color','ux'),
							  'description' => __('the color for selected text background','ux'),
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_selected_text_bg',
							  'scheme-name' => 'selected_text_bg_color',
							  'default'     => '#E07B48'),
							  
						// Page/Post Header Bg Color
						array('title'       => __('Page/Post Title Wrap Bg Color','ux'),
							  'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_header_bg_page_post',
							  'scheme-name' => 'page_post_header_bg_color',
							  'default'     => '#f1f1f1'),
							  
						// Page Post Bg Color
						array('title'       => __('Page/Post Bg Color','ux'),
							  'description' => __('background color for the page area','ux'),
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_bg_page_post',
							  'scheme-name' => 'page_post_bg_color',
							  'default'     => '#f8f8f8')
							  
						// Floating Bar Bg Color for Post
						// array('title'       => __('Floating Bar Bg Color for Post','ux'),
						// 	  'description' => '',
						// 	  'type'        => 'switch-color',
						// 	  'name'        => 'theme_option_topbar_bg_page_post',
						// 	  'scheme-name' => 'page_post_topbar_bg_color',
						// 	  'default'     => '#ffffff')
						)),
				
				array(/* Sidebar */
					'id'    => 'color-sidebar',
					'title' => __('Sidebar','ux'),
					'item'  => array(
                                                
						// Sidebar Widget Title Color
						array('title'       => __('Page/Post Sidebar Widget Title Color','ux'),
							  'description' => __('color for sidebar widget title text','ux'),
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_sidebar_widget_title',
							  'scheme-name' => 'sidebar_widget_title_color',
							  'default'     => '#28282E'),
							  
						// Sidebar Widget Content Color
						array('title'       => __('Page/Post Sidebar Widget Content Color','ux'),
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_color_sidebar_content_color',
							  'scheme-name' => 'sidebar_content_color',
							  'default'     => '#999999'))),
							  
				array(/* Header & Footer */
					'id'    => 'color-header-and-footer',
					'title' => __('Footer','ux'),
					'item'  => array( 
							  
						// Footer Widget Title Colour
						array('title'       => __('Footer Widget Title Colour','ux'),
                              'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_footer_widget_title_color',
							  'scheme-name' => 'footer_widget_title_color',
							  'default'     => '#28282E'),
							  
						// Footer Widget Content Color
						array('title'       => __('Footer Widget Content Color','ux'),
                              'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_footer_widget_content_color',
							  'scheme-name' => 'footer_widget_content_color',
							  'default'     => '#888888'),
							  
						// Footer Widget bg Color
						array('title'       => __('Footer Widget Bg Color','ux'),
                              'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_footer_widget_bg_color',
							  'scheme-name' => 'footer_widget_bg_color',
							  'default'     => '#ffffff'),
							  
						// Footer Text Color
						array('title'       => __('Footer Text Color','ux'),
                              'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_footer_text_color',
							  'scheme-name' => 'footer_text_color',
							  'default'     => '#999999'),
							  
						// Footer Bg Color
						array('title'       => __('Footer Bg Color','ux'),
                              'description' => '',
							  'type'        => 'switch-color',
							  'name'        => 'theme_option_footer_bg_color',
							  'scheme-name' => 'footer_bg_color',
							  'default'     => '#ffffff')))
			)
		),
		
		array(
			'id'      => 'options-font',
			'name'    => __('Font Settings','ux'),
			'section' => array(
				
				array(/* Synchronous */
					'id'    => 'font-synchronous',
					'title' => __('Synchronous','ux'),
					'item'  => array(
						
						// Update to new Google Font Data
						array('description' => '',
							  'button'      => array('title'   => __('Update to new Google Font Data','ux'),
													 'loading' => __('Updating ...','ux'),
													 'type'    => 'font-synchronous',
													 'class'   => 'btn-primary'),
							  'type'        => 'button',
							  'name'        => 'theme_option_font_synchronous'))),
							  
				array(/* Cole Fonts */
					'id' => 'font-main',
					'item' => array(
							  
						// Heading Font
						array('title'       => __('Heading Font','ux'),
							  'description' => __('font for titles','ux'),
							  'type'        => 'fonts-family',
							  'default'     => 'Open+Sans',
							  'name'        => 'theme_option_font_family_heading',
							  'bind'        => array(
								  array('type'     => 'fonts-style',
										'name'     => 'theme_option_font_style_heading',
										'default'  => 'regular',
										'position' => 'after'))),
						// Main Font
						array('title'       => __('Main Font','ux'),
							  'description' => __('menu, button, meta, sidebar, footer','ux'),
							  'type'        => 'fonts-family',
							  'default'     => 'ek+mukta',
							  'name'        => 'theme_option_font_family_main',
							  'bind'        => array(
								  array('type'     => 'fonts-style',
										'name'     => 'theme_option_font_style_main',
										'default'  => '300',
										'position' => 'after'))),

						// Menu & Meta Font
						array('title'       => __('Menu & Meta Font','ux'),
							  'description' => __('menu, data, author, category...','ux'),
							  'type'        => 'fonts-family',
							  'default'     => 'Open+Sans',
							  'name'        => 'theme_option_font_family_menu',
							  'bind'        => array(
								  array('type'     => 'fonts-style',
										'name'     => 'theme_option_font_style_menu',
										'default'  => 'regular',
										'position' => 'after')))
						
					)
				),

				array(/* Logo Font */
					'id'   => 'font-logo',
					'item' => array(
						
						// Logo Font
						array('title'       => __('Logo Font','ux'),
							  'description' => __('font for plaint text logo','ux'),
							  'type'        => 'fonts-family',
							  'default'     => 'Open+Sans',
							  'name'        => 'theme_option_font_family_logo',
							  'bind'        => array(
								  array('type'     => 'fonts-size',
										'name'     => 'theme_option_font_size_logo',
										'default'  => '46px',
										'position' => 'after'),
										
								  array('type'     => 'fonts-style',
										'name'     => 'theme_option_font_style_logo',
										'default'  => 'normal',
										'position' => 'after')
								)
						)
					)
				),
										
				
										
                array(/* Menu Font */
					'id'   => 'menu-font',
					'item' => array(
						
						//Menu
						array('title'       => __('Menu','ux'),
							  'description' => '',
							  'type'        => 'fonts-size',
							  'name'        => 'theme_option_font_size_menu',
							  'default'     => '12px'))),


                array(/* Copyright Font */
					'id'   => 'copyright',
					'item' => array(
						
						//Copyright
						array('title'       => __('Copyright','ux'),
							  'description' => '',
							  'type'        => 'fonts-size',
							  'name'        => 'theme_option_font_size_copyright',
							  'default'     => '14px'))),
							  
				array(/* Page Post Font */
					'id'   => 'font-post-page',
					'item' => array(
						
						// Post Page Title Font
						array('title'       => __('Post/Page Title Font','ux'),
							  'description' => __('Post/Page and Blog Fullscreen Section Title Font ','ux'),
							  'type'        => 'fonts-family',
							  'default'     => 'Ek+Mukta',
							  'name'        => 'theme_option_font_post_page_title',
							  'bind'        => array(
								  array('type'     => 'fonts-size',
										'name'     => 'theme_option_font_size_post_page_title',
										'default'  => '36px',
										'position' => 'after'),
										
								  array('type'     => 'fonts-style',
										'name'     => 'theme_option_font_style_post_page_title',
										'default'  => '500',
										'position' => 'after')
								)
						),
							  
						// Post Page Content Font	  
						array('title'       => __('Post/Page Content Font','ux'),
							  'description' => __('font for post/page content text','ux'),
							  'type'        => 'fonts-size',
							  'name'        => 'theme_option_font_size_post_page_content',
							  'default'     => '16px'),

						// Post Page Meta Font
						array('title'       => __('Post/Page Meta Font','ux'),
							  'description' => __('font for post/page meta text','ux'),
							  'type'        => 'fonts-size',
							  'name'        => 'theme_option_font_size_post_page_meta',
							  'default'     => '12px'),
							  
						// Post Page Sidebar Widget Title Font
						array('title'       => __('Post/Page Widget Title Font','ux'),
							  'description' => '',
							  'type'        => 'fonts-size',
							  'name'        => 'theme_option_font_size_post_page_widget_tit',
							  'default'     => '14px'),
							  
						// Post Page Sidebar Widget Content Font
						array('title'       => __('Post/Page Widget Content Font','ux'),
							  'description' => '',
							  'type'        => 'fonts-size',
							  'name'        => 'theme_option_font_size_post_page_widget_content',
							  'default'     => '14px')
					))
			)
		),
		
		array(
			'id'      => 'options-icons',
			'name'    => __('Icons','ux'),
			'section' => array(
				
				array(/* Upload Icons */
					'id'    => 'icons-upload',
					'title' => __('Upload Icons','ux'),
					'item'  => array(
						
						// Upload Icons
						array('description' => __('select images for your icons from Media Library, it is recommended to upload 48*48 images','ux'),
							  'type'        => 'select-images',
							  'name'        => 'theme_option_icons_custom')))
			)
		),	
			
		array(
			'id'      => 'options-layout',
			'name'    => __('Layout','ux'),
			'section' => array(
				array(/*  General */
					'title' => __('General','ux'),
					'item'  => array(
						// Enable RTL
						array('title'       => __('Enable RTL','ux'),
							  'description' => '',
							  'type'        => 'switch',
							  'name'        => 'theme_option_enable_rtl',
							  'default'     => 'false'),

						// Enable  WPML
						array('title'       => __('Enable WPML','ux'),
							  'description' => __('WPML switcher would be shown when this option is on','ux'),
							  'type'        => 'switch',
							  'name'        => 'theme_option_enable_WPML',
							  'default'     => 'false'),

						// Enable  page loader
						array('title'       => __('Enable Page Loader','ux'),
							  'description' => '',
							  'type'        => 'switch',
							  'name'        => 'theme_option_enable_fadein_effect',
							  'default'     => 'false'),

						array('title'       => __('Page Loader only for Homepage','ux'),
							  'type'        => 'switch',
							  'default'     => 'false',
							  'name'        => 'theme_option_enable_fadein_effect_homepage',
							  'control'     => array('name'  => 'theme_option_enable_fadein_effect',
													 'value' => 'true'))

						)),
                         
				array(/* Layout */
					'title' => __('Layout','ux'),
					'item'  => array(

                        // Layout
						array('title'       => __('Layout','ux'),
							  'description' => '',
							  'type'        => 'select',
							  'name'        => 'theme_option_layout_menubar',
							  'default'     => 'menubar-on-side'),
							  
						array('type'        => 'select',
							  'default'     => 'right',
							  'name'        => 'theme_option_layout_menubar_direction',
							  'control'     => array('name'  => 'theme_option_layout_menubar',
													 'value' => 'menubar-on-side')),

						array('type'        => 'select',
							  'default'     => 'menu-folder',
							  'name'        => 'theme_option_layout_menubar_header_type',
							  'control'     => array('name'  => 'theme_option_layout_menubar',
													 'value' => 'menubar-on-head')),

						array('type'        => 'text',
							  'default'     => '',
							  'title'       => __('Menubar Width','ux'),
							  'description' => __('it is optional, default value is 160','ux'),
							  'name'        => 'theme_option_layout_menubar_size',
							  'control'     => array('name'  => 'theme_option_layout_menubar',
													 'value' => 'menubar-on-side')),
							  
						// Enable Header Sticky Top
						// array('title'       => __('Enable Header Sticky Top','ux'),
						// 	  'description' => '',
						// 	  'type'        => 'switch',
						// 	  'default'     => 'true',
						// 	  'name'        => 'theme_option_enable_header_sticky_top',
						// 	  'control'     => array('name'  => 'theme_option_layout_menubar',
						// 							 'value' => 'menubar-on-head')),
							  
						// Enable Social Media Links on Menu Panel
						// array('title'       => __('Enable Social Media Links on Menu Panel','ux'),
						// 	  'description' => '',
						// 	  'type'        => 'switch',
						// 	  'default'     => 'true',
						// 	  'name'        => 'theme_option_show_social_in_menu_panle'),

                        // Enable Search Button
						array('title'       => __('Enable Search Button','ux'),
							  'description' => '',
							  'type'        => 'switch',
							  'name'        => 'theme_option_enable_search_button',
							  'default'     => 'true')
				)),
							  
				array(/* Footer */
					'title' => __('Footer','ux'),
					'item'  => array(
							  
						// Enable Footer Social Media Links
						// array('title'       => __('Enable Footer Social Media Links','ux'),
						// 	  'description' => '',
						// 	  'type'        => 'switch',
						// 	  'default'     => 'false',
						// 	  'name'        => 'theme_option_show_social_in_footer'),

						// Enable Back To Top Button
						array('title'       => __('Enable Back To Top Button','ux'),
							  'description' => '',
							  'type'        => 'switch',
							  'name'        => 'theme_option_enable_back_to_top',
							  'default'     => 'false'),

                        // Footer Elements Align
						array('title'       => __('Footer Elements Align','ux'),
							  'description' => '',
							  'type'        => 'select',
							  'name'        => 'theme_option_footer_elements_align',
							  'default'     => 'centered'),

                        // Footer Elements 1
						array('title'       => __('Footer Elements 1','ux'),
							  'description' => '',
							  'type'        => 'select',
							  'name'        => 'theme_option_footer_elements_1',
							  'default'     => 'copyright',
							  'bind'        => array(
								  array(
									  'name'    => 'theme_option_footer_elements_1_menu',
									  'default' => 0,
									  'type' => 'select',
									  'position' => 'after',
									  'col_size' => 'margin-top:10px;',
									  'control' => array('name'  => 'theme_option_footer_elements_1',
													     'value' => 'menu')
								  )
							  )),

                        // Footer Elements 2
						array('title'       => __('Footer Elements 2','ux'),
							  'description' => '',
							  'type'        => 'select',
							  'name'        => 'theme_option_footer_elements_2',
							  'default'     => 'none',
							  'bind'        => array(
								  array(
									  'name'    => 'theme_option_footer_elements_2_menu',
									  'default' => 0,
									  'type' => 'select',
									  'position' => 'after',
									  'col_size' => 'margin-top:10px;',
									  'control' => array('name'  => 'theme_option_footer_elements_2',
													     'value' => 'menu')
								  )
							  )),

                        // Footer Elements 3
						array('title'       => __('Footer Elements 3','ux'),
							  'description' => '',
							  'type'        => 'select',
							  'name'        => 'theme_option_footer_elements_3',
							  'default'     => 'none',
							  'bind'        => array(
								  array(
									  'name'    => 'theme_option_footer_elements_3_menu',
									  'default' => 0,
									  'type' => 'select',
									  'position' => 'after',
									  'col_size' => 'margin-top:10px;',
									  'control' => array('name'  => 'theme_option_footer_elements_3',
													     'value' => 'menu')
								  )
							  ))
                        
							  
						)),
							  
				array(/* Page Post */
					'title' => __('Page/Post','ux'),
					'item' => array(

						array('title'       => __('Show Top Spacer','ux'),
							  'description' => '',
							  'type'        => 'switch',
							  'name'        => 'theme_option_enable_top_spacer_global',
							  'default'     => 'true'),

						// Enable Footer Widget for Posts
						array('title'       => __('Enable Footer Widget for Posts','ux'),
							  'description' => '',
							  'type'        => 'switch',
							  'name'        => 'theme_option_enable_footer_widget_for_posts',
							  'default'     => 'true'),

						// Select Footer Widget for Posts
						array('title'       => __('Select Footer Widget for Posts','ux'),
							  'description' => '',
							  'type'        => 'select',
							  'name'        => 'theme_option_footer_widget_for_posts',
							  'default'     => 'true',
							  'control'     => array('name'  => 'theme_option_enable_footer_widget_for_posts',
													 'value' => 'true')),
													 
					    // Show Meta On Post Page
						array('title'       => __('Show Meta On Post Content Page','ux'),
							  'description' => '',
							  'type'        => 'switch',
							  'name'        => 'theme_option_enable_meta_post_page',
							  'default'     => 'true',
							  'bind'        => array(
								  array('type'     => 'checkbox-group',
										'name'     => 'theme_option_posts_showmeta',
										'position' => 'after',
										'default'  => array('date', 'length', 'category', 'tag', 'author', 'comments'),
										'control'  => array('name'  => 'theme_option_enable_meta_post_page',
															'value' => 'true')))),

						// Category to Hide on Page Post
						array('title'       => __('Category to Hide on Page/Post','ux'),
							  'description' => '',
							  'type'        => 'checkbox-group',
							  'name'        => 'theme_option_hide_category_on_post_page',
							  'default'     => array(),
							  'control'  => array('name'  => 'theme_option_enable_meta_post_page',
												  'value' => 'true')),
						
						// Show Author Section On Post Content Page
						array('title'       => __('Show Author Section On Post Content Page','ux'),
							  'description' => '',
							  'type'        => 'switch',
							  'name'        => 'theme_option_show_post_author_information',
							  'default'     => 'true'),

						// Show Post Navigation On Post Content Page
						// array('title'       => __('Show Post Navigation On Post Content Page','ux'),
						// 	  'description' => '',
						// 	  'type'        => 'switch',
						// 	  'name'        => 'theme_option_show_post_navigation',
						// 	  'default'     => 'true'),

						// Show Related Post On Post Content Page
						array('title'       => __('Show Related Post On Post Content Page','ux'),
							  'description' => '',
							  'type'        => 'switch',
							  'name'        => 'theme_option_show_related_post',
							  'default'     => 'true'))),
			)
		),
		
		array(
			'id' => 'options-mobile',
			'name' => __('Mobile','ux'),
			'section' => array(
				
				array(/* Mobile Responsive */
					'id' => 'mobile-responsive',
					'title' => __('Responsive','ux'),
					'item' => array(
						
						// Enable Mobile Layout
						array('title'       => __('Enable Mobile Layout','ux'),
							  'description' => __('disable this option if you want to display the same with PC end','ux'),
							  'type'        => 'switch',
							  'name'        => 'theme_option_mobile_enable_responsive',
							  'default'     => 'true'))))
		)
	);
	
	return $theme_config_fields;
}


?>