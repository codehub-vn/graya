<?php
//register script
function ux_theme_register_script(){
	$ux_theme_register_script = array(
		array(
			'handle'    => 'ux-admin-bootstrap',
			'src'       => UX_THEME. '/js/bootstrap.min.js',
			'deps'      => array('jquery'),
			'ver'       => '3.0.2',
			'in_footer' => true,
		),
		array(
			'handle'    => 'ux-admin-bootstrap-switch',
			'src'       => UX_THEME. '/js/bootstrap-switch.min.js',
			'deps'      => array('jquery'),
			'ver'       => '1.8',
			'in_footer' => true,
		),
		array(
			'handle'    => 'ux-admin-minicolors',
			'src'       => UX_THEME. '/js/jquery.minicolors.min.js',
			'deps'      => array('jquery'),
			'ver'       => '2.1',
			'in_footer' => true,
		),
		array(
			'handle'    => 'ux-admin-icheck',
			'src'       => UX_THEME. '/js/jquery.icheck.min.js',
			'deps'      => array('jquery'),
			'ver'       => '0.9.1',
			'in_footer' => true,
		),
		array(
			'handle'    => 'ux-admin-isotope',
			'src'       => UX_THEME. '/js/jquery.isotope.min.js',
			'deps'      => array('jquery'),
			'ver'       => '1.5.25',
			'in_footer' => true,
		),
		array(
			'handle'    => 'ux-admin-bootstrap-datetimepicker',
			'src'       => UX_THEME. '/js/bootstrap-datetimepicker.js',
			'deps'      => array('jquery'),
			'ver'       => '0.0.1',
			'in_footer' => true,
		),
		array(
			'handle'    => 'ux-admin-theme-script',
			'src'       => UX_THEME. '/js/theme.js',
			'deps'      => array('jquery'),
			'ver'       => '0.0.1',
			'in_footer' => false,
		),
		array(
			'handle'    => 'ux-admin-customize-controls',
			'src'       => UX_THEME. '/js/customize-controls.js',
			'deps'      => array('jquery'),
			'ver'       => '0.0.1',
			'in_footer' => true,
		)
	);
	$ux_theme_register_script = apply_filters('ux_theme_register_script', $ux_theme_register_script);
	
	foreach($ux_theme_register_script as $script){
		wp_register_script($script['handle'], $script['src'], $script['deps'], $script['ver'], $script['in_footer'] ); 
	}
}
add_action('init', 'ux_theme_register_script');

//register style
function ux_theme_register_style(){
	$ux_theme_register_style = array(
		array(
			'handle' => 'ux-admin-bootstrap',
			'src'    => UX_THEME. '/css/bootstrap.css',
			'deps'   => array(),
			'ver'    => '3.0.2',
			'media'  => 'screen',
		),
		array(
			'handle' => 'ux-admin-bootstrap-theme',
			'src'    => UX_THEME. '/css/bootstrap-theme.css',
			'deps'   => array('ux-admin-bootstrap'),
			'ver'    => '3.0.2',
			'media'  => 'screen',
		),
		array(
			'handle' => 'font-awesome',
			'src'    => UX_THEME. '/css/font-awesome.min.css',
			'deps'   => array(),
			'ver'    => '4.0.3',
			'media'  => 'screen',
		),
		array(
			'handle' => 'ux-admin-bootstrap-switch',
			'src'    => UX_THEME. '/css/bootstrap-switch.css',
			'deps'   => array(),
			'ver'    => '1.8',
			'media'  => 'screen',
		),
		array(
			'handle' => 'ux-pb-bootstrap-datetimepicker',
			'src'    => UX_THEME. '/css/bootstrap-datetimepicker.min.css',
			'deps'   => array(),
			'ver'    => '0.0.1',
			'media'  => 'screen',
		),
		array(
			'handle' => 'ux-admin-minicolors',
			'src'    => UX_THEME. '/css/jquery.minicolors.css',
			'deps'   => array(),
			'ver'    => '2.1',
			'media'  => 'screen',
		),
		array(
			'handle' => 'ux-admin-theme-icons',
			'src'    => UX_THEME. '/css/icons.css',
			'deps'   => array(),
			'ver'    => '0.0.1',
			'media'  => 'screen',
		),
		array(
			'handle' => 'ux-admin-icheck',
			'src'    => UX_THEME. '/css/icheck/all.css',
			'deps'   => array(),
			'ver'    => '0.9.1',
			'media'  => 'screen',
		),
		array(
			'handle' => 'ux-admin-theme-style',
			'src'    => UX_THEME. '/css/theme.css',
			'deps'   => array(),
			'ver'    => '0.0.1',
			'media'  => 'screen',
		)
	);
	$ux_theme_register_style = apply_filters('ux_theme_register_style', $ux_theme_register_style);
	
	foreach($ux_theme_register_style as $style){
		wp_register_style($style['handle'], $style['src'], $style['deps'], $style['ver'], $style['media'] );
	}
}
add_action('init', 'ux_theme_register_style');

//theme register google fonts
function ux_theme_register_google_fonts(){
	$json = get_option('ux_theme_googlefont');
	if($json){
		$fonts_object = json_decode($json);
		if($fonts_object && is_object($fonts_object)){
			if($fonts_object->items && is_array($fonts_object->items)){
				$fonts = $fonts_object->items;
				foreach($fonts as $item){
					$family_val = str_replace(' ', '+', $item->family);
					$separator = '%2C';
					$output = '';
					if(count($item->variants)){
						foreach($item->variants as $num => $variant){
							$output .= $variant . $separator;
						}
					}
					wp_register_style('google-fonts-' . $family_val, 'http://fonts.googleapis.com/css?family=' . $family_val . ':' . trim($output, $separator));
				}
			}
		}
	}
}
add_filter('init', 'ux_theme_register_google_fonts');

//register post type
function ux_theme_register_post_type(){
	$ux_theme_register_post_type = apply_filters('ux_theme_register_post_type', array());
	
	return $ux_theme_register_post_type;
}
add_action('init', 'ux_theme_register_post_type');

//register sidebar
function ux_theme_register_sidebar($key){
	//sidebars
	$sidebars = array(
		array('value' => 'sidebar_1', 'title' => __('Sidebar 1 for Post/Page','ux')),
		array('value' => 'sidebar_2', 'title' => __('Sidebar 2 for Post/Page','ux')),
		array('value' => 'sidebar_3', 'title' => __('Sidebar 3 for Post/Page','ux')),
		array('value' => 'sidebar_4', 'title' => __('Sidebar 4 for Post/Page','ux')),
		array('value' => 'sidebar_5', 'title' => __('Sidebar 5 for Post/Page','ux')),
		array('value' => 'sidebar_6', 'title' => __('Sidebar 6 for Post/Page','ux')),
		array('value' => 'sidebar_7', 'title' => __('Sidebar 7 for Post/Page','ux')),
		array('value' => 'sidebar_8', 'title' => __('Sidebar 8 for Post/Page','ux')),
		array('value' => 'sidebar_9', 'title' => __('Sidebar 9 for Post/Page','ux')),
		array('value' => 'sidebar_10', 'title' => __('Sidebar 10 for Post/Page','ux'))
	);
	
	foreach($sidebars as $num => $sidebar){
		register_sidebar(array(
			'name' => $sidebar['title'],
			'id' => $sidebar['value'],
			'description'   => __('widgets for sidebar','ux'),
			'before_title' => '<h3 class="widget-title"><span class="widget-title-inn">',
			'after_title' => '</span></h3>',
			'before_widget' => '<li class="widget-container %2$s">',
			'after_widget' => '</li>',
			'class' => ''
		));
	}
	
	//footer widget
	$footer_widget = array(
		array('value' => 'footer_widget_1', 'title' => __('Footer 1 for Post/Page','ux')),
		array('value' => 'footer_widget_2', 'title' => __('Footer 2 for Post/Page','ux')),
		array('value' => 'footer_widget_3', 'title' => __('Footer 3 for Post/Page','ux')),
		array('value' => 'footer_widget_4', 'title' => __('Footer 4 for Post/Page','ux')),
		array('value' => 'footer_widget_5', 'title' => __('Footer 5 for Post/Page','ux'))
	);
	
	foreach($footer_widget as $num => $sidebar){
		register_sidebar(array(
			'name' => $sidebar['title'],
			'id' => $sidebar['value'],
			'description'   => __('No more than 3 widgets could be shown','ux'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
			'before_widget' => '<section class="widget_footer_unit widget-container span4 %2$s">',
			'after_widget' => '</section>',
			'class' => ''
		));
	}
	
	switch($key){
		case 'sidebars':        return $sidebars; break;
		case 'footer_widget':   return $footer_widget; break;
	}
	
	
}
add_action('init', 'ux_theme_register_sidebar');

function ux_theme_register_nav_menu(){
	register_nav_menus(array(
		'primary' => 'Primary Menu'
	));
}
add_action('init', 'ux_theme_register_nav_menu');
?>