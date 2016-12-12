<?php
/****************************************************************/
/*
/* Condition
/*
/****************************************************************/

//Condition enable sidebar
function ux_enable_sidebar(){
	$sidebar = true;
	if(is_singular('post')){
		$sidebar = ux_get_post_meta(get_the_ID(), 'theme_meta_sidebar');
		//** not portfolio template get sidebar template
		if($sidebar == 'without-sidebar'){
			$sidebar = false;
		}
	}elseif(is_page()){
		$sidebar = ux_get_post_meta(get_the_ID(), 'theme_meta_sidebar');
		if($sidebar == 'without-sidebar'){
			$sidebar = false;
		}
	}elseif(is_singular('team_item')){
		$sidebar = ux_get_post_meta(get_the_ID(), 'theme_meta_sidebar');
		
		if($sidebar == 'without-sidebar'){
			$sidebar = false;
		}
		
		if(ux_enable_team_template()){
			$sidebar = false;
		}
	}
	
	return $sidebar;
}

//Condition enable pagebuilder
function ux_enable_pb(){
	$switch = false;
	
	if(is_singular('post') || is_page() ){
		$pb_switch = get_post_meta(get_the_ID(), 'ux-pb-switch', true);
		
		if($pb_switch == 'pagebuilder'){
			$switch = true;
		}
		
		//if(ux_enable_team_template()){
		//	$switch = false;
		//}
	}
	
	return $switch;
	
}

//Condition enable team template
function ux_enable_team_template(){
	$switch = false;
	
	if(is_singular('team_item')){
		$team_template = ux_get_post_meta(get_the_ID(), 'theme_meta_enable_team_template');
		
		if($team_template){
			$switch = true;
		}
	}
	
	return $switch;
	
}

?>