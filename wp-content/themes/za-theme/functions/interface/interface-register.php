<?php
//register script
function ux_theme_interface_register_script($script){
	
	$script['ux-interface-jplayer'] = array(
		'handle'    => 'ux-interface-jplayer',
		'src'       => UX_LOCAL_URL. '/js/jquery.jplayer.min.js',
		'deps'      => array('jquery'),
		'ver'       => '2.2.0',
		'in_footer' => true
	);
	
	$script['ux-interface-infographic'] = array(
		'handle'    => 'ux-interface-infographic',
		'src'       => UX_LOCAL_URL. '/js/infographic.js',
		'deps'      => array('jquery'),
		'ver'       => '1.7.0',
		'in_footer' => true
	);

	$script['ux-interface-countdown'] = array(
		'handle'    => 'ux-interface-countdown',
		'src'       => UX_LOCAL_URL. '/js/jquery.countdown.min.js',
		'deps'      => array('jquery'),
		'ver'       => '1.6.3',
		'in_footer' => true
	);

	$script['ux-interface-caroufredsel'] = array(
		'handle'    => 'ux-interface-caroufredsel',
		'src'       => UX_LOCAL_URL. '/js/jquery.caroufredsel.js',
		'deps'      => array('jquery'),
		'ver'       => '6.2.1',
		'in_footer' => true
	);
	
	$script['ux-interface-googlemap'] = array(
		'handle'    => 'ux-interface-googlemap',
		'src'       => 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false',
		'deps'      => array('jquery'),
		'ver'       => '3.0.0',
		'in_footer' => false
	);
	
	$script['ux-interface-main'] = array(
		'handle'    => 'ux-interface-main',
		'src'       => UX_LOCAL_URL. '/js/main.js',
		'deps'      => array('jquery'),
		'ver'       => '1.0.0',
		'in_footer' => true
	);
	
	$script['ux-interface-theme'] = array(
		'handle'    => 'ux-interface-theme',
		'src'       => UX_LOCAL_URL. '/js/custom.theme.js',
		'deps'      => array('jquery'),
		'ver'       => '1.0.0',
		'in_footer' => true
	);
	
	
	return $script;
}
add_filter('ux_theme_register_script', 'ux_theme_interface_register_script');

//register style
function ux_theme_interface_register_style($style){
	$style['ux-interface-bootstrap'] = array(
		'handle' => 'ux-interface-bootstrap',
		'src'    => UX_LOCAL_URL. '/styles/bootstrap.css',
		'deps'   => array(),
		'ver'    => '2.0.0',
		'media'  => 'screen'
	);
	
	$style['font-awesome'] = array(
		'handle' => 'font-awesome',
		'src'    => UX_LOCAL_URL. '/functions/pagebuilder/css/font-awesome.min.css',
		'deps'   => array(),
		'ver'    => '4.1.0',
		'media'  => 'screen'
	);
	
		$style['ux-owl-carousel'] = array(
		'handle' => 'ux-owl-carousel',
		'src'    => UX_LOCAL_URL. '/styles/owl.carousel.css',
		'deps'   => array(),
		'ver'    => '0.0.1',
		'media'  => 'screen'
	);
	
	
	$style['ux-interface-pagebuild'] = array(
		'handle' => 'ux-interface-pagebuild',
		'src'    => UX_LOCAL_URL. '/styles/pagebuild.css',
		'deps'   => array(),
		'ver'    => '1.7.0',
		'media'  => 'screen'
	);

	$style['ux-interface-style'] = array(
		'handle' => 'ux-interface-style',
		'src'    => UX_LOCAL_URL. '/style.css',
		'deps'   => array(),
		'ver'    => '1.0.0',
		'media'  => 'screen'
	);

	$style['ux-googlefont-opensans'] = array(
		'handle' => 'ux-googlefont-opensans',
		'src'    => 'http://fonts.googleapis.com/css?family=Open+Sans',
		'deps'   => array(),
		'ver'    => '1.0.0',
		'media'  => 'screen'
	);

	$style['ux-googlefont-ek'] = array(
		'handle' => 'ux-googlefont-ek',
		'src'    => 'http://fonts.googleapis.com/css?family=Ek+Mukta',
		'deps'   => array(),
		'ver'    => '1.0.0',
		'media'  => 'screen'
	);

	$style['ux-googlefont-lato'] = array(
		'handle' => 'ux-googlefont-lato',
		'src'    => 'http://fonts.googleapis.com/css?family=Lato',
		'deps'   => array(),
		'ver'    => '1.0.0',
		'media'  => 'screen'
	);

	$style['ux-interface-style-ie'] = array(
		'handle' => 'ux-interface-style-ie',
		'src'    => UX_LOCAL_URL. '/styles/ie.css',
		'deps'   => array(),
		'ver'    => '1.0.0',
		'media'  => 'screen'
	);
	
	$style['ux-interface-photoswipe'] = array(
		'handle' => 'ux-interface-photoswipe',
		'src'    => UX_LOCAL_URL. '/styles/photoswipe.css',
		'deps'   => array(),
		'ver'    => '4.0.5',
		'media'  => 'screen',
	);
	
	$style['ux-interface-photoswipe-default-skin'] = array(
		'handle' => 'ux-interface-photoswipe-default-skin',
		'src'    => UX_LOCAL_URL. '/styles/skin/photoswipe/default/default-skin.css',
		'deps'   => array('ux-interface-photoswipe'),
		'ver'    => '4.0.5',
		'media'  => 'screen',
	);
	
	$style['ux-interface-theme-style'] = array(
		'handle' => 'ux-interface-theme-style',
		'src'    => UX_LOCAL_URL. '/styles/theme-style.php',
		'deps'   => array('ux-interface-style'),
		'ver'    => '1.0.0',
		'media'  => 'screen',
	);
	
	$style['ux-interface-style-rtl'] = array(
		'handle' => 'ux-interface-style-rtl',
		'src'    => UX_LOCAL_URL. '/styles/rtl.css',
		'deps'   => array(),
		'ver'    => '1.0.0',
		'media'  => 'screen'
	);
	
	
	return $style;
}
add_filter('ux_theme_register_style', 'ux_theme_interface_register_style');
?>