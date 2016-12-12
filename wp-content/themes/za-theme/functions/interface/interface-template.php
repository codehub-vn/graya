<?php
/****************************************************************/
/*
/* Template archive
/*
/****************************************************************/

//Template Archive loop
function ux_interface_archive_loop(){
	ux_get_template_part('archive/loop', false);
}

//Template Archive before
function ux_interface_archive_title(){
	ux_get_template_part('archive/content', 'title');
}

/****************************************************************/
/*
/* Template page
/*
/****************************************************************/

//Template Page content before
function ux_interface_page_content_before(){
	ux_get_template_part('page/content', 'before');
}

//Template Page content after
function ux_interface_page_content_after(){
	ux_get_template_part('page/content', 'after');
}

//Template page content
function ux_interface_page_content(){
	$page_template = ux_get_post_meta(get_the_ID(), 'theme_meta_page_template');
	if($page_template == 'blog'){
		ux_get_template_part('page/content', 'blog');
	}else{
		if(!ux_enable_pb()){
			ux_get_template_part('page/content', false);
		}
	}
}

//Template page slider
function ux_interface_content_page_cover(){
	if(is_page()){
		ux_get_template_part('page/content', 'cover');
	}
}

//Template page slider
function ux_interface_content_page_slider(){
	if(is_page()){
		ux_get_template_part('page/content', 'slider');
	}
}

//Template page slider
function ux_interface_content_page_second_fullwidth(){
	if(is_page()){
		ux_get_template_part('page/content', 'second-fullwidth');
	}
}


/****************************************************************/
/*
/* Template single
/*
/****************************************************************/

//Template single content before
function ux_interface_single_content_before(){
	ux_get_template_part('single/content', 'before');
}

//Template single content after
function ux_interface_single_content_after(){
	ux_get_template_part('single/content', 'after');
}

//Template single Content Inn
function ux_interface_single_content_inn(){
	ux_get_template_part('single/content', 'inn');
}

//Template Single content
function ux_interface_single_content(){
	
	//** post format
	if(is_singular('post') && !ux_enable_pb()){
		$post_format = !get_post_format() ? 'standard' : get_post_format();
		ux_get_template_part('single/format', $post_format);
	}

	//** post type for clients, faqs, jobs, testimonials team
	if(!is_singular('post')){
		ux_get_template_part('single/type', get_post_type());
	}
}

//Template Single content
function ux_interface_single_comment(){
	comments_template();
}

//Template Single author
function ux_interface_single_author(){
	if(is_singular('post')){
		ux_get_template_part('single/content', 'author');
	}
}

//Template Single Related
function ux_interface_single_related(){
	$ux_enable_related = ux_get_option('theme_option_show_related_post');
	if(is_singular('post') && $ux_enable_related){
		ux_get_template_part('single/content', 'related');
	}
}

//Template Single Title
function ux_interface_single_content_title(){
	ux_get_template_part('single/content', 'title');
}

//Template Single Navi
function ux_interface_single_navi(){
	//$ux_enable_navi = ux_get_option('theme_option_show_post_navigation');
	$ux_enable_navi = false;
	if(is_singular('post') && $ux_enable_navi){
		ux_get_template_part('single/content', 'navi');
	}
}


/****************************************************************/
/*
/* Template global
/*
/****************************************************************/

//Template jplayer
function ux_interface_jplayer(){
	ux_get_template_part('global/site', 'jplayer');
}

//Template Page Loading
function ux_interface_page_loading(){
	ux_get_template_part('global/page', 'loading');
}

//Template Wrap Outer before
function ux_interface_wrap_outer_before(){
	ux_get_template_part('global/wrapouter', 'before');
}

//Template Wrap Outer after
function ux_interface_wrap_outer_after(){
	ux_get_template_part('global/wrapouter', 'after');
}

//Template Content before
function ux_interface_content_before(){
	ux_get_template_part('global/content', 'before');
}

//Template Content after
function ux_interface_content_after(){
	ux_get_template_part('global/content', 'after');
}

//Template Content titlewrap
function ux_interface_content_titlewrap(){
	$switch = true;
	if(is_single()){
		$enable_video_cover = ux_get_post_meta(get_the_ID(), 'theme_meta_enable_video_cover');
		if(has_post_format('gallery') && $enable_video_cover){
			$switch = false;
		}
	}elseif(is_page()){
		$page_template = ux_get_post_meta(get_the_ID(), 'theme_meta_page_template');
		if($page_template == 'hiding-side-menubar'){
			$switch = false;
		}
	}
	
	if($switch){
		ux_get_template_part('global/content', 'titlewrap');
	}
}

//Template Content Slider
function ux_interface_content_slider(){
	$page_template = ux_get_post_meta(get_the_ID(), 'theme_meta_page_template');
	if($page_template != 'hiding-side-menubar'){
		ux_interface_content_page_slider();
	}
}

//Template Sidebar Weiget
function ux_interface_sidebar_widget(){
	ux_get_template_part('global/sidebar', 'widget');
}

//Template Header
function ux_interface_header(){
	$menubar = ux_get_option('theme_option_layout_menubar');
	if($menubar == 'menubar-on-head'){
		ux_get_template_part('global/header', 'onhead');
	}else{
		ux_get_template_part('global/header', 'onside');
	}
	
}

//Template search popup
function ux_interface_search_popup(){
	ux_get_template_part('global/search', 'popup');
}

//Template social bar
function ux_interface_social_bar($module_post = false){
	$show_share = true;
	$share_buttons = array('facebook', 'twitter', 'google-plus', 'pinterest', 'digg', 'reddit', 'linkedin', 'stumbleupon', 'tumblr', 'mail');
	
	$enable_share_buttons = ux_get_option('theme_option_enable_share_buttons_for_posts');
	$share_buttons = ux_get_option('theme_option_share_buttons');
	if(!$enable_share_buttons){
		$show_share = false;
	}
	
	if($module_post){
		$enable_share_buttons = get_post_meta($module_post, 'module_blog_show_share', true);
		$get_this_buttons = get_post_meta($module_post, 'module_blog_share_buttons', true);
		if(!$enable_share_buttons){
			$show_share = false;
		}elseif(!$get_this_buttons){
			$show_share = false;
		}
		
		if(is_array($get_this_buttons)){
			$share_buttons = $get_this_buttons;
		}else{
			$share_buttons = array($get_this_buttons);
		}
	}
	
	if($show_share){
		$share_tit = ux_get_option('theme_option_descriptions_share');
		$share_tit = $share_tit ? $share_tit : esc_html__('SHARE','ux');
		if(!$module_post){ echo '<div class="blog-unit-meta-bottom">'; } ?>
        
		<div class="social-bar">
			<h3 class="social-bar-tit"><?php echo esc_html($share_tit); ?></h3>
			<ul class="post_social post-meta-social">
				<?php if(is_array($share_buttons)){
	
					$post_link = get_permalink();
					$post_link_pure = preg_replace('#^https?://#', '', rtrim($post_link,'/'));
	
					//facebook
					if(in_array('facebook', $share_buttons)){ ?>
				
						<li class="post-meta-social-li">
							<a class="share postshareicon-facebook-wrap" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url($post_link); ?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url($post_link); ?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;">
							<span class="fa fa-facebook postshareicon-facebook">Facebook</span>
							</a>
						</li>
					
					<?php }
					
					//twitter
					if(in_array('twitter', $share_buttons)){ ?>
					
						<li class="post-meta-social-li">
							<a class="share postshareicon-twitter-wrap" href="http://twitter.com/share?url=<?php echo esc_url($post_link); ?>&amp;text=<?php the_title(); ?>" onclick="window.open('http://twitter.com/share?url=<?php echo esc_url($post_link); ?>&amp;text=<?php the_title(); ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" >
							<span class="fa fa-twitter postshareicon-twitter">Twitter</span>
							</a>
						</li>
					
					<?php }
					
					//google-plus
					if(in_array('google-plus', $share_buttons)){ ?>
			
						<li class="post-meta-social-li">
							<a class="share postshareicon-googleplus-wrap" href="https://plus.google.com/share?url=<?php echo esc_url($post_link); ?>" onclick="window.open('https://plus.google.com/share?url=<?php echo esc_url($post_link); ?>','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
							<span class="fa fa-google-plus postshareicon-googleplus">Google+</span>
							</a>
						</li>
					
					<?php }
					
					//pinterest
					if(in_array('pinterest', $share_buttons)){
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
						$thumbnail = $image ? $image[0] : false; ?>
						
						<li class="post-meta-social-li">
							<a class="share postshareicon-pinterest-wrap" href="javascript:;" onclick="javascript:window.open('http://pinterest.com/pin/create/bookmarklet/?url=<?php echo esc_url($post_link); ?>&amp;is_video=false&amp;media=<?php echo esc_url($thumbnail); ?>','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
							<span class="fa fa-pinterest  postshareicon-pinterest">Pinterest</span>
							</a>
						</li>
				
					<?php }
	
					//Digg
					if(in_array('digg', $share_buttons)){ ?>
			
						<li class="post-meta-social-li">
							<a class="share postshareicon-digg-wrap" href="http://www.digg.com/submit?url=<?php echo esc_url($post_link); ?>" onclick="window.open('http://www.digg.com/submit?url=<?php echo esc_url($post_link); ?>','Digg','width=715,height=330,left='+(screen.availWidth/2-357)+',top='+(screen.availHeight/2-165)+''); return false;">
							<span class="fa fa-digg postshareicon-digg">Digg</span>
							</a>
						</li>
					
					<?php }
	
					//Readdit
					if(in_array('reddit', $share_buttons)){ ?>
			
						<li class="post-meta-social-li">
							<a class="share postshareicon-reddit-wrap" href="http://reddit.com/submit?url=<?php echo esc_url($post_link); ?>&amp;title=<?php the_title(); ?>" onclick="window.open('http://reddit.com/submit?url=<?php echo esc_url($post_link); ?>&amp;title=<?php the_title(); ?>','Reddit','width=617,height=514,left='+(screen.availWidth/2-308)+',top='+(screen.availHeight/2-257)+''); return false;">
							<span class="fa fa-reddit postshareicon-reddit">Reddit</span>
							</a>
						</li>
					
					<?php }
	
					//linkedin
					if(in_array('linkedin', $share_buttons)){ ?>
			
						<li class="post-meta-social-li">
							<a class="share postshareicon-linkedin-wrap" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($post_link); ?>" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($post_link); ?>','Linkedin','width=863,height=500,left='+(screen.availWidth/2-431)+',top='+(screen.availHeight/2-250)+''); return false;">
							<span class="fa fa-linkedin postshareicon-linkedin">Linkedin</span>
							</a>
						</li>
					
					<?php }
	
					//stumbleupon
					if(in_array('stumbleupon', $share_buttons)){ ?>
			
						<li class="post-meta-social-li">
							<a class="share postshareicon-stumbleupon-wrap" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url($post_link); ?>&amp;title=<?php the_title(); ?>" onclick="window.open('http://www.stumbleupon.com/submit?url=<?php echo esc_url($post_link); ?>&amp;title=<?php the_title(); ?>','Stumbleupon','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;">
							<span class="fa fa-stumbleupon postshareicon-stumbleupon">Stumbleupon</span>
							</a>
						</li>
					
					<?php }
	
					//tumblr
					if(in_array('tumblr', $share_buttons)){ ?>
			
						<li class="post-meta-social-li">
							<a class="share postshareicon-tumblr-wrap" href="http://www.tumblr.com/share/link?url=<?php echo esc_attr($post_link_pure); ?>&amp;name=<?php the_title(); ?>" onclick="window.open('http://www.tumblr.com/share/link?url=<?php  echo esc_attr($post_link_pure); ?>&amp;name=<?php the_title(); ?>','Tumblr','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;">
							<span class="fa fa-tumblr postshareicon-tumblr">Tumblr</span>
							</a>
						</li>
					
					<?php }
	
					//mail
					if(in_array('mail', $share_buttons)){ ?>
			
						<li class="post-meta-social-li">
							<a class="share postshareicon-mail-wrap" href="mailto:?Subject=<?php the_title(); ?>&amp;Body=<?php echo esc_url($post_link); ?>" >
							<span class="fa fa-envelope-o postshareicon-mail">Mail</span>
							</a>
						</li>
					
					<?php }
	
				} ?>
			</ul>
		</div>
        
		<?php
		if(!$module_post){ echo '</div>'; }
	
	}else{ ?>
	
		<div class="break-line"></div>
	
	<?php
	}
}

//Template footer
function ux_interface_footer(){
	ux_get_template_part('global/footer', false);
}

//Template footer widget
function ux_interface_footer_widget(){
	ux_get_template_part('global/footer', 'widget');
}

//Template footer info
function ux_interface_footer_info(){
	ux_get_template_part('global/footer', 'info');
}

//Template footer social
function ux_interface_footer_social(){
	ux_get_template_part('global/footer', 'social');
}

//Template header social
function ux_interface_header_social(){
	ux_get_template_part('global/header', 'social');
}

//Template menu hidden panel
function ux_interface_menu_hidden_panel(){
	ux_get_template_part('global/menu-hidden', 'panel');
}

//Template photoswipe
function ux_interface_photoswipe(){
	ux_get_template_part('global/photoswipe', false);
}

?>