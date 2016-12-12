<?php
/****************************************************************/
/*
/* Functions
/*
/****************************************************************/

//Function more...
function twentyten_continue_reading_link() {
	return '';
}
function twentyten_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );
function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

//Function Web Title
function ux_interface_wp_title($title, $sep){
	global $paged, $page;

	if(is_feed() || is_search()){
		return $title;
	}

	$title .= get_bloginfo('name');

	$site_description = get_bloginfo('description', 'display');
	if($site_description &&(is_home() || is_front_page())){
		$title = "$title $sep $site_description";
	}

	if($paged >= 2 || $page >= 2){
		$title = "$title $sep " . sprintf(__('Page %s','ux'), max($paged, $page));
	}

	return esc_attr($title);
}

//Function Web Head Viewport
function ux_interface_webhead_viewport(){
	$enable_responsive = ux_get_option('theme_option_mobile_enable_responsive');
	
	if($enable_responsive){ ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php
	}
}

//function
function ux_interface_equiv_meta(){ ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php 
}


//Function Web Head Favicon
function ux_interface_webhead_favicon(){
	$favicon_icon = ux_get_option('theme_option_custom_favicon');
	$mobile_icon  = ux_get_option('theme_option_mobile_icon');
	
	$favicon_icon = $favicon_icon ? $favicon_icon : UX_LOCAL_URL . '/img/favicon.ico';
	$mobile_icon  = $mobile_icon ? $mobile_icon : UX_LOCAL_URL . '/img/apple-touch-icon-114x114.png'; ?>
    
    <link rel="shortcut icon" href="<?php echo esc_url($favicon_icon); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url($mobile_icon); ?>">
<?php
}

//Function body class
function ux_interface_body_class(){
	$responsive = ux_get_option('theme_option_mobile_enable_responsive') ? 'responsive-ux' : false;
	//$sticky_top = ux_get_option('theme_option_enable_header_sticky_top');
	$menubar = ux_get_option('theme_option_layout_menubar');
	$menubar_direction = ux_get_option('theme_option_layout_menubar_direction');
	$menu_head_type = ux_get_option('theme_option_layout_menubar_header_type');
	
	$sticky_class = false;
	if($menubar == 'menubar-on-head'){
		$sticky_class = 'header-sticky';
	}
	$menu_shown_always = false;
	if($menu_head_type == 'menu-shown'){
		$menu_shown_always = 'navi-always-shown';
	}
	
	$menubar_class = 'navi-side';
	if($menubar == 'menubar-on-head'){
		$menubar_class = 'navi-over';
	}elseif($menubar == 'menubar-on-side'){
		$menubar_class = 'navi-side';
	}
	
	$direction_class = false;
	if($menubar == 'menubar-on-side'){
		if($menubar_direction == 'left'){
			$direction_class = 'navi-left';
		}else{
			$direction_class = 'navi-right';
		}
	}


	$video_class = false;
	if(is_singular('post')){
		//if(has_post_format('video')){
		//	$video_class = 'with-video-cover';
		//}else
		if(has_post_format('gallery')){
			$enable_video_cover = ux_get_post_meta(get_the_ID(), 'theme_meta_enable_video_cover');
			if($enable_video_cover){
				$video_class = 'with-video-cover';
			}
		}
	}
	
	$cover_class = false;
	if($menubar != 'menubar-on-head'){
		$page_template = ux_get_post_meta(get_the_ID(), 'theme_meta_page_template');
		if($page_template == 'hiding-side-menubar'){
			$cover_class = 'with-page-cover';
		}
	}
	
	$top_class = false;
	if(is_page()){
		$spacer_top = ux_get_post_meta(get_the_ID(), 'theme_meta_show_top_spacer');
		if(!$spacer_top){
			$top_class = 'no-top-space';
		}
	} else {
		$spacer_top = ux_get_option('theme_option_enable_top_spacer_global');
		if(!$spacer_top){
			$top_class = 'no-top-space';
		}
	}
	
	$bottom_class = false;
	if(is_page()){
		$spacer_bottom = ux_get_post_meta(get_the_ID(), 'theme_meta_show_bottom_spacer');
		if(!$spacer_bottom){
			$bottom_class = 'no-bottom-space';
		}
	}
	
	body_class(sanitize_html_class($responsive). ' ' .sanitize_html_class($cover_class). ' ' .sanitize_html_class($video_class). ' ' .sanitize_html_class($menubar_class). ' ' .sanitize_html_class($direction_class). ' ' .sanitize_html_class($top_class). ' ' .sanitize_html_class($bottom_class). ' ' .sanitize_html_class($sticky_class). ' ' .sanitize_html_class($menu_shown_always). ' preload');
}

//Function Logo
function ux_interface_logo($key = ''){
	$enable_text_logo   = ux_get_option('theme_option_enable_text_logo');
	$text_logo          = ux_get_option('theme_option_text_logo');
	$text_logo          = $text_logo ? '<h1 class="logo-h1">' .balanceTags($text_logo). '</h1>' : '<h1 class="logo-h1">'. get_bloginfo('name'). '</h1>';
	$custom_logo        = ux_get_option('theme_option_custom_logo');
	$custom_logo        = $custom_logo ? '<img class="logo-image" src="' .esc_url($custom_logo). '" alt="' .get_bloginfo('name'). '" />' : false;
	$foot_custom_logo   = ux_get_option('theme_option_custom_footer_logo');
	$foot_custom_logo   = $foot_custom_logo ? '<div id="logo-footer"><img class="logo-footer-img" src="' .esc_url($foot_custom_logo). '" alt="' .esc_attr(get_bloginfo('name')). '" /></div>' : false;
	$custom_load_logo   = ux_get_option('theme_option_custom_logo_for_loading');
	$custom_load_logo   = $custom_load_logo ? '<img src="' .esc_url($custom_load_logo). '" alt="' .get_bloginfo('name'). '" />' : false;
	$custom_mobile_logo = ux_get_option('theme_option_custom_logo_mobile');
	$custom_mobile_logo = $custom_mobile_logo ? '<img class="logo-image" src="' .esc_url($custom_mobile_logo). '" alt="' .get_bloginfo('name'). '" />' : $custom_logo;
	$home_url           = home_url();
	$output             = '';
	
	switch($key){
		case 'loading':
			$output .= '<div class="site-loading-logo">';
			$output .= $enable_text_logo ? $text_logo : $custom_load_logo;
			$output .= '</div>';
		break;

		case 'footer': 
			$output .= '<div id="logo-footer"><a href="' . $home_url . '" title="' . get_bloginfo('name') . '">';
			$output .= $enable_text_logo ? $text_logo : $foot_custom_logo;
			$output .= '</a></div>';
		break;

		case 'mobile': 
			$output .= '<div class="mobile-panel-logo"><a class="logo-a" href="' . $home_url . '" title="' . get_bloginfo('name') . '">';
			$output .= $enable_text_logo ? $text_logo : $custom_mobile_logo;
			$output .= '</a></div>';
		break;
		
		case 'cover':
			$output .= '<div class="logo-cover"><a href="' . $home_url . '" title="' . get_bloginfo('name') . '">';
			$output .= $enable_text_logo ? $text_logo : $custom_logo;
			$output .= '</a></div>';
		break;
		
		default:       
			$output .= '<div id="logo"><a class="logo-a" href="' . $home_url . '" title="' . get_bloginfo('name') . '">';
			$output .= $enable_text_logo ? $text_logo : '<h1 class="logo-h1 logo-not-show-txt">' . get_bloginfo('name') . '</h1>'.$custom_logo;
			$output .= '</a></div>';
		break;
		
	}
	
	echo balanceTags($output,false);
}

//Function theme get option
function ux_get_option($key){
	$get_option = get_option('ux_theme_option');
	$return = false;
	
	if($get_option){
		if(isset($get_option[$key])){
			if($get_option[$key] != ''){
				switch($get_option[$key]){
					case 'true': $return = true; break;
					case 'false': $return = false; break;
					default: $return = $get_option[$key]; break;
				}
			}
		}else{
			switch($key){
				case 'theme_option_enable_search_field': $return = true; break;
				case 'theme_option_enable_search_button': $return = true; break;
				case 'theme_option_enable_meta_post_page': $return = true; break;
				case 'theme_option_posts_showmeta': $return = array(); break;
				case 'theme_option_mobile_enable_responsive': $return = true; break;
				case 'theme_option_enable_share_buttons_for_posts': $return = true; break;
				case 'theme_option_share_buttons': $return = array(); break;
				case 'theme_option_enable_footer_widget_for_pages': $return = true; break;
				case 'theme_option_show_post_author_information': $return = true; break;
				case 'theme_option_show_post_navigation': $return = true; break;
				case 'theme_option_show_related_post': $return = true; break;
				case 'theme_option_show_social_in_menu_panle': $return = true; break;
				case 'theme_option_enable_header_sticky_top': $return = true; break;
				case 'theme_option_hide_category_on_post_page': $return = array(); break;
				
			}
		}
	}else{
		$return = ux_theme_option_default($key);
		
		switch($key){
			case 'theme_option_enable_search_field': $return = true; break;
			case 'theme_option_enable_search_button': $return = true; break;
			case 'theme_option_enable_meta_post_page': $return = true; break;
			case 'theme_option_posts_showmeta': $return = array('date', 'length', 'category', 'tag', 'author', 'comments'); break;
			case 'theme_option_mobile_enable_responsive': $return = true; break;
			case 'theme_option_enable_share_buttons_for_posts': $return = true; break;
			case 'theme_option_share_buttons': $return = array('facebook', 'twitter', 'google-plus', 'pinterest'); break;
			case 'theme_option_enable_footer_widget_for_pages': $return = true; break;
			case 'theme_option_show_post_author_information': $return = true; break;
			case 'theme_option_show_post_navigation': $return = true; break;
			case 'theme_option_show_related_post': $return = true; break;
			case 'theme_option_show_social_in_menu_panle': $return = true; break;
			case 'theme_option_enable_header_sticky_top': $return = true; break;
			case 'theme_option_hide_category_on_post_page': $return = array(); break;
		}
	}
	
	return $return;
}

//Function page load blog list
function ux_page_load_blog_list($module_post, $paged){
	$category     = ux_get_post_meta($module_post, 'theme_meta_page_category');
	$orderby      = ux_get_post_meta($module_post, 'theme_meta_page_orderby');
	$order        = ux_get_post_meta($module_post, 'theme_meta_order');
	$per_page     = ux_get_post_meta($module_post, 'theme_meta_page_number');
	$columns      = ux_get_post_meta($module_post, 'theme_meta_page_columns');
	$larger_first = ux_get_post_meta($module_post, 'theme_meta_page_larger_first');
	$pagination   = ux_get_post_meta($module_post, 'theme_meta_page_pagination');
	
	$category     = ux_theme_exclude_category($category);
	
	$per_page     = $per_page ? $per_page : -1;
	
	$get_posts = get_posts(array(
		'posts_per_page' => $per_page,
		'paged'          => $paged,
		'orderby'        => $orderby,
		'order'          => $order,
		'category__in'   => $category
	));
	
	if($get_posts){
		global $post;
		
		foreach($get_posts as $num => $post){ setup_postdata($post);
			$get_post_format = (!get_post_format()) ? 'standard' : get_post_format();
			$first_class = 'width2';
			if($larger_first && $paged == 1){
				if($num == 0){
					$first_class = 'width4';
				}
			}
			
			$bg_style = false;
			if(has_post_thumbnail()){
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'image-thumb'); 
				$bg_style = 'background-image:url(' .$thumbnail[0]. ')';
			}  ?>
             <section class="main-list-item <?php echo sanitize_html_class($first_class); ?> <?php echo sanitize_html_class($get_post_format); ?>">
                <div class="inside">
                <?php 
                switch($get_post_format){
					case 'quote': 
						$ux_quote = ux_get_post_meta(get_the_ID(), 'theme_meta_quote'); 
						$ux_quote_cite = ux_get_post_meta(get_the_ID(), 'theme_meta_quote_cite');  ?>
						<div class="mainlist-img-wrap">
							<div class="mainlist-quote"> 
	                            <p><?php echo wp_kses_post($ux_quote); ?></p>
	                            <cite><span class="cite-line">&mdash;</span> <?php echo wp_kses_post($ux_quote_cite); ?></cite>
	                        </div>
	                    </div>

					<?php	
					break;

					case 'link': 
						$ux_link_item = ux_get_post_meta(get_the_ID(), 'theme_meta_link_item');
						if($ux_link_item){ ?>
							<div class="mainlist-img-wrap">
								<div class="mainlist-link">
								<?php foreach($ux_link_item['name'] as $i => $name){
									$url = $ux_link_item['url'][$i]; ?>
			                        <p class=""><a title="<?php echo esc_attr($name); ?>" href="<?php echo esc_url($url); ?>"><?php echo esc_html($name); ?></a></p>
			                    <?php } ?>
			                	</div>
			              </div>
						<?php
			            }

					break;

					case 'audio':
						$ux_audio_type = ux_get_post_meta(get_the_ID(), 'theme_meta_audio_type');
						$audio_mp3    = ux_get_post_meta(get_the_ID(), 'theme_meta_audio_mp3');
						$first_name   = $audio_mp3['name'][0];
						$first_url    = $audio_mp3['url'][0];
						$ux_audio_soundcloud = ux_get_post_meta(get_the_ID(), 'theme_meta_audio_soundcloud');
					switch($ux_audio_type){
						case 'self-hosted-audio': ?>
						<div class="mainlist-img-wrap" style=" <?php echo esc_attr($bg_style); ?>">
							<a href="<?php the_permalink(); ?>" class="mainlist-img-link"></a>
							<ul class="audio_player_list blog-list-audio container-inn center-ux">
				                <li class="audio-unit"><span id="audio-<?php echo esc_attr(get_the_ID() . '-0'); ?>" class="audiobutton pause" rel="<?php echo esc_url($first_url); ?>"></span><span class="songtitle" title="<?php echo esc_attr($first_name); ?>"><?php echo esc_html($first_name); ?></span></li>
				            </ul>
				        </div>
		                    
		                <?php
						break;
						
						case 'soundcloud': ?>
						<div class="mainlist-img-wrap" style=" <?php echo esc_attr($bg_style); ?>">
							<div class="soundcloudWrapper">
	                            <?php if($ux_audio_soundcloud){ ?>
	                           		<iframe src="https://w.soundcloud.com/player/?url=<?php echo esc_url($ux_audio_soundcloud); ?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
	                            <?php } ?>
		                    </div>
		                </div>    
		                <?php
						break;
					} ?>
					<div class="mainlist-des-wrap">
                        <h1 class="mainlist-tit"><a class="mainlist-tit-a" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <div class="mainlist-excerpt ux-ellipsis"><?php the_excerpt(); ?><span class="ux-ellipsis-before"></span></div>
                        <div class="mainlist-meta clearfix"><span class="mainlist-meta-cate"><span class="mainlist-meta-cate-label"><?php esc_attr_e('IN','ux'); ?></span><?php /** Do Hook Archive UX the category */ do_action('ux_interface_loop_the_category', '&ensp;&ensp;'); ?></span><span class="mainlist-meta-date"><?php echo get_the_date(); ?></span></div>
                    	<?php  //ux_interface_social_bar(); ?>
                    </div>

					<?php 
					break;

					case 'video': ?>

					<div class="mainlist-img-wrap" style=" <?php echo esc_attr($bg_style); ?>">
						<a class="blog-unit-video-play" href="<?php the_permalink(); ?>"><span class="fa fa-play"></span></a>
				        <div class="video-wrap hidden">
				            <?php $video_embeded_code = ux_get_post_meta(get_the_ID(), 'theme_meta_video_embeded_code');
				            if($video_embeded_code){
				                if(strstr($video_embeded_code, "youtu") && !(strstr($video_embeded_code, "iframe"))){ ?>
				                    <iframe src="http://www.youtube.com/embed/<?php echo esc_attr(ux_theme_get_youtube($video_embeded_code));?>?rel=0&controls=1&showinfo=0&theme=light&autoplay=0&wmode=transparent"></iframe>
				                <?php
				                }elseif(strstr($video_embeded_code, "vimeo") && !(strstr($video_embeded_code, "iframe"))){ ?>
				                    <iframe src="http://player.vimeo.com/video/<?php echo esc_attr(ux_theme_get_vimeo($video_embeded_code)); ?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=0"></iframe>
				                <?php	
				                }else{
				                    echo balanceTags($video_embeded_code);
				                }
				            } ?>
				        </div>
				    </div>    

					<div class="mainlist-des-wrap">
                        <h1 class="mainlist-tit"><a class="mainlist-tit-a" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <div class="mainlist-excerpt ux-ellipsis"><?php the_excerpt(); ?><span class="ux-ellipsis-before"></span></div>
                        <div class="mainlist-meta clearfix"><span class="mainlist-meta-cate"><span class="mainlist-meta-cate-label"><?php esc_attr_e('IN','ux'); ?></span><?php /** Do Hook Archive UX the category */ do_action('ux_interface_loop_the_category', '&ensp;&ensp;'); ?></span><span class="mainlist-meta-date"><?php echo get_the_date(); ?></span></div>
                    	<?php  //ux_interface_social_bar(); ?>
                    </div>

					<?php
					break;

					case 'gallery': 
					$ux_portfolio = ux_get_post_meta(get_the_ID(), 'theme_meta_portfolio'); 
					?>

					<div class="mainlist-img-wrap" style=" <?php echo esc_attr($bg_style); ?>">
						<?php if($ux_portfolio && count($ux_portfolio)>1){ 
							 ?>
						<div class="owl-carousel" data-item="1" data-center="false" data-margin="0" data-autowidth="false" data-slideby="1">
						<?php
							foreach($ux_portfolio as $num => $image){ 
								$thumb_src = wp_get_attachment_image_src($image, 'medium'); ?>
								<section class="item"><div class="carousel-img-wrap" style=" background-image:url(<?php echo esc_url($thumb_src[0]); ?>)"></div></section>
						<?php } ?>

						</div>
						<?php
						} ?>
					</div>

					<div class="mainlist-des-wrap">
                        <h1 class="mainlist-tit"><a class="mainlist-tit-a" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <div class="mainlist-excerpt ux-ellipsis"><?php the_excerpt(); ?><span class="ux-ellipsis-before"></span></div>
                        <div class="mainlist-meta clearfix"><span class="mainlist-meta-cate"><span class="mainlist-meta-cate-label"><?php esc_attr_e('IN','ux'); ?></span><?php /** Do Hook Archive UX the category */ do_action('ux_interface_loop_the_category', '&ensp;&ensp;'); ?></span><span class="mainlist-meta-date"><?php echo get_the_date(); ?></span></div>
                    	<?php  //ux_interface_social_bar(); ?>
                    </div>

					<?php 
					break; 

					default:

					?>
                    <div class="mainlist-img-wrap" style=" <?php echo esc_attr($bg_style); ?>">
                    	<a href="<?php the_permalink(); ?>" class="mainlist-img-link"></a>
                    </div>
                    <div class="mainlist-des-wrap">
                        <h1 class="mainlist-tit"><a class="mainlist-tit-a" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <div class="mainlist-excerpt ux-ellipsis"><?php the_excerpt(); ?><span class="ux-ellipsis-before"></span></div>
                        <div class="mainlist-meta clearfix"><span class="mainlist-meta-cate"><span class="mainlist-meta-cate-label"><?php esc_attr_e('IN','ux'); ?></span><?php /** Do Hook Archive UX the category */ do_action('ux_interface_loop_the_category', '&ensp;&ensp;'); ?></span><span class="mainlist-meta-date"><?php echo get_the_date(); ?></span></div>
                        <?php  //ux_interface_social_bar(); ?>
                    </div>
                    <?php 
                    break;
				} ?> 
                </div>
            </section>
		<?php
        }
		wp_reset_postdata();
	}
}

//Function archive load main list
function ux_archive_load_main_list($module_post, $paged){
	$posts_per_page = intval(get_option('posts_per_page'));
	
	$query = false;
	if($module_post){
		$archive_query = $module_post;
		$args = explode('_____', $archive_query);
		if(isset($args[1])){
			$args = explode('@__@', $args[1]);
			if(count($args)){
				$query = array(
					'posts_per_page' => $posts_per_page,
					'paged' => $paged
				);
				foreach($args as $arg_name => $arg){
					if(!empty($arg)){
						$arg = explode('@_@', $arg);
						$query[$arg[0]] = $arg[1];
					}
				}
			}
		}
	}
	
	if($query){
		$the_query = new WP_Query($query);
		
		if($the_query->have_posts()){
			while($the_query->have_posts()){
				$the_query->the_post();
				
				//** Post format
				$get_post_format = (!get_post_format()) ? 'standard' : get_post_format();
				
				//** Template Archive loop item
				ux_get_template_part('archive/loop-item', $get_post_format);
			}
		}
		wp_reset_postdata();
	}
}

//Function pagination
function ux_interface_pagination($pages = '', $range = 3, $type = 'pagenums'){
	global $wp_query, $wp_rewrite;
	
	$posts_per_page = intval(get_option('posts_per_page'));
	$current = 1;
	if(isset($wp_query->query['paged'])){
		if($wp_query->query['paged'] > 1){
			$current = $wp_query->query['paged'];
		}
	}
	
	if($type == 'twitter'){
		$archive_query = 'is_home_____';
		
		if(is_date()){
			$archive_query  = 'is_date_____';
		}elseif(is_tag()){
			$archive_query  = 'is_tag_____';
		}elseif(is_author()){
			$archive_query  = 'is_author_____';
		}elseif(is_category()){
			$archive_query  = 'is_category_____';
		}elseif(is_archive()){
			$archive_query  = 'is_archive_____';
		}
		
		foreach($wp_query->query as $name => $query){
			$archive_query .= '@__@' .$name. '@_@' .$query;
		}
		
		$archive_query = $archive_query;
		ux_view_module_pagenums($archive_query, 'archive-main-list', $posts_per_page, $wp_query->found_posts, 'twitter');
	}else{
		
		echo '<div class="clearfix pagenums pagenums-default">';
		echo wp_kses_post(paginate_links( array(
			'base'      => @add_query_arg('paged','%#%'),
			'format'    => '',
			'current'   => $current,
			'prev_text' => esc_attr__('Previous','ux'),
			'next_text' => esc_attr__('Next','ux'),
			'total'     => $wp_query->max_num_pages,
			'mid_size'  => $range
		)));  
		echo '</div>';
		
	}
}

//Function Copyright
function ux_interface_copyright(){
	$footer_copyright = ux_get_option('theme_option_copyright');
	$footer_copyright = $footer_copyright ? $footer_copyright : 'Copyright uiueux.com';
	
	echo balanceTags(stripslashes($footer_copyright));
}

//Function Social
function ux_interface_social($key = false){
	$show_social_medias = ux_get_option('theme_option_show_social');
	$social_medias = ux_get_option('theme_option_show_social_medias');
	
	if($show_social_medias && $social_medias && isset($social_medias['icontype'])){
		$icon_type = $social_medias['icontype']; ?>
		
		<ul class="socialmeida">
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
	<?php

	} //End if $social_medias
}

//Function Language Flags
function ux_interface_language_flags(){
	if (function_exists('icl_get_languages')) {
		$languages = icl_get_languages('skip_missing=0&orderby=code');
		if(!empty($languages)){
			
				echo '<div class="wpml-translation">';
				echo '<ul class="wpml-language-flags clearfix">';
				foreach($languages as $l){
					echo '<li>';
					if($l['country_flag_url']){
						if(!$l['active']) {
							echo '<a href="'.esc_url($l['url']).'"><img src="'.esc_url($l['country_flag_url']).'" height="12" alt="'.esc_attr($l['language_code']).'" width="18" /><span class="languages-shortname">'.esc_attr($l['language_code']).'</span><span class="languages-name">'.esc_attr($l['native_name']).'</span></a>';
						} else {
							echo '<div class="current-language"><img src="'.esc_url($l['country_flag_url']).'" height="12" alt="'.esc_attr($l['language_code']).'" width="18" /><span class="languages-shortname">'.esc_attr($l['language_code']).'</span><span class="languages-name">'.esc_attr($l['native_name']).'</span></div>';
						}
					}
					echo '</li>';
				}
				echo '</ul>';
				echo '</div><!--End header-translation-->';
			
		}
	} else {
		echo "<p class='wpml-tip'>". esc_attr__('WPML not installed and activated.','ux') ."</p>";
	}
}

//Function Content wrap class
function ux_interface_content_class(){
	$ux_sidebar_class = 'span9';

	$output = $ux_sidebar_class;
	
	if(is_singular('post') || is_page() || is_singular('team_item')){
		$pb_switch = get_post_meta(get_the_ID(), 'ux-pb-switch', true);
		$sidebar   = ux_get_post_meta(get_the_ID(), 'theme_meta_sidebar');
		switch($sidebar){
			case 'right-sidebar':   $output = $ux_sidebar_class; break;
			case 'left-sidebar':    $output = $ux_sidebar_class. ' pull-right'; break;
			case 'without-sidebar': $output = '';
		}
	}
	
	if(ux_enable_team_template()){
		$output = false;
	}
	
	echo 'class="' .esc_attr($output). '"';
	
}

//Function Pagebuilder
function ux_interface_pagebuilder(){
	$switch = false;
	
		if(ux_enable_pb()){
			if(post_password_required()){
			 	echo get_the_password_form();
			 	return;
			}else{
			$switch = true;
			}
		}
		
	$enable_paid = false;
	//$enable_paid = ux_get_option('theme_option_enable_paid_content');
	if($enable_paid){
		if(function_exists('pmpro_has_membership_access')){
			$hasaccess = pmpro_has_membership_access(NULL, NULL, true);
			if(is_array($hasaccess)){
				//returned an array to give us the membership level values
				$post_membership_levels_ids = $hasaccess[1];
				$post_membership_levels_names = $hasaccess[2];
				$hasaccess = $hasaccess[0];
			}
			if($hasaccess){
				$switch = true;
			}else{
				$switch = false;
			}
		}
	}
	
	if($switch){
		echo '<div class="pagebuilder-wrap">';
		do_action('ux-theme-single-pagebuilder');
		echo '</div>';
	}else{
		if(ux_enable_pb()){
			the_excerpt();
		}
		
	}
}

//Function search list ajax
function ux_interface_search_list_load($keyword, $paged){
	$the_search = new WP_Query('s=' .$keyword. '&paged=' .$paged);
	
	if($the_search->have_posts()){
		while($the_search->have_posts()){ $the_search->the_post(); ?>
            <section class="search-result-unit">
                <h1 class="blog-unit-tit"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <?php if(get_the_excerpt()){ ?>		
                    <div class="blog-unit-excerpt"><?php the_excerpt(); ?></div>
                <?php } ?>
                <div class="blog-unit-meta">
                    <?php ux_interface_blog_show_meta('date'); ?><?php ux_interface_blog_show_meta('category'); ?>
                </div>
            </section>
		<?php
        }
		wp_reset_postdata();
		
		$next_paged = (int) $paged + 1;
		
		if((int) $paged < $the_search->max_num_pages){
			echo '<div class="clearfix pagenums tw_style page_twitter">';
			echo '<a class="tw-style-a ux-btn container-inn" data-paged="' .esc_attr($next_paged). '" href="#">' . esc_attr__('Load More','ux'). '</a>';
			echo '</div>';
		}
	}else{
		echo '<section class="search-result-unit">';
		esc_attr_e('Sorry, no result.','ux');
		echo '</section>';
	}
}

//Function blog excerpt
function ux_interface_blog_list_excerpt($module_post = false){
	$show_summary = false;
	$summary_word = 200;
	
	$option_show_summary = false;
	$option_summary_word = false;
	
	if($module_post){
		$option_show_summary = get_post_meta($module_post, 'module_blog_show_summary', true);
		$option_summary_word = get_post_meta($module_post, 'module_blog_summary_words', true);
	}
	
	if($option_show_summary){
		$show_summary = true;
	}
	
	if($option_summary_word){
		$summary_word = $option_summary_word;
	}
	
	//$enable_paid = ux_get_option('theme_option_enable_paid_content');
	$enable_paid = false;
	$paid_span = false;
	if($enable_paid && function_exists('pmpro_has_membership_access')){
		$hasaccess = pmpro_has_membership_access(NULL, NULL, true);
		if(is_array($hasaccess)){
			//returned an array to give us the membership level values
			$post_membership_levels_ids = $hasaccess[1];
			$post_membership_levels_names = $hasaccess[2];
			$hasaccess = $hasaccess[0];
		}
		if(!$hasaccess){
			$paid_span = '<span class="member-tip">' .__('PREMIUM', 'ux'). '</span>';
		}
	}
	
	global $post;
	if($enable_paid && function_exists('pmpro_has_membership_access') && has_shortcode(get_the_content(), 'membership')){
		$content = explode('[membership', get_the_content(), 2);
		//$content = force_balance_tags($content[0]);
		$content = prepend_attachment(shortcode_unautop(wpautop(convert_chars(convert_smilies(wptexturize($content[0]))))));
		echo '<div class="entry">' .do_shortcode(balanceTags($content)). balanceTags($paid_span). '</div>';
    }elseif(preg_match('/<!--more(.*?)?-->/', $post->post_content, $matches)){
		$content = explode($matches[0], $post->post_content, 2);
		//$content = force_balance_tags($content[0]);
		$content = prepend_attachment(shortcode_unautop(wpautop(convert_chars(convert_smilies(wptexturize($content[0]))))));
		echo '<div class="entry">' .do_shortcode(balanceTags($content)). balanceTags($paid_span). '</div>';
	}elseif($show_summary && has_excerpt()){ ?>
        <div class="entry container-inn"><?php echo get_the_excerpt(); ?><?php echo balanceTags($paid_span); ?></div>
    <?php
	}elseif($show_summary && !has_excerpt()){ 
		$content = html_entity_decode(ux_limit_words(htmlentities($post->post_content), esc_attr($summary_word)));
		//$content = force_balance_tags(html_entity_decode(ux_limit_words(htmlentities(get_the_content()), $summary_word)));
		$content = prepend_attachment(shortcode_unautop(wpautop(convert_chars(convert_smilies(wptexturize($content)))))); 
		echo '<div class="entry">' .do_shortcode(balanceTags($content)). balanceTags($paid_span). '</div>';
	}else{ ?>
        <div class="entry"><?php the_content(); ?><?php echo balanceTags($paid_span); ?></div>
    <?php
	}
}

//Function Limit words
function ux_limit_words($string, $word_limit){
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}

//Function blog show meta
function ux_interface_blog_min_read($post_id = false){
	$time = 2;
	$content = get_the_content();
	
	if($post_id){
		global $post;
		$post = get_post($post_id);
		setup_postdata($post);
		$content = get_the_content();
		wp_reset_postdata(); 
	}
	
	if($content){
		$length = mb_strlen($content);
		$time = $length / 200;
	}
	
	return ceil($time);
}

//Function blog show meta
function ux_interface_blog_show_meta($meta, $container = false, $this_postid = false, $module_post = false){
	$showmeta = $showmeta = array('date', 'category', 'tag', 'author', 'continue-reading');;
	
	if(is_single()){
		$showmeta = ux_get_option('theme_option_posts_showmeta');
	}
	
	/*if(is_archive()||is_home()){
		$showmeta = array('date', 'category', 'tag', 'author', 'continue-reading');
	}*/
	
	if(is_page()){
		$showmeta = array('date', 'author');
	}
	
	if($module_post){ 
		$get_this_meta = get_post_meta($module_post, 'module_blog_posts_showmeta', true);
		$get_blog_type = get_post_meta($module_post, 'module_blog_type', true);
		
		if($get_blog_type == 'big_image_list'){
			$get_this_meta = get_post_meta($module_post, 'module_blog_show_meta_below_title_feature', true);
		}
		
		if(is_array($get_this_meta)){
			$showmeta = $get_this_meta;
		}else{
			$showmeta = array($get_this_meta);
		}
	}
	
	if(count($showmeta)){
		//date
		if($meta == 'date' && in_array($meta, $showmeta)){
			if($container == 'single'){
				echo '<span class="article-meta-unit article-meta-date">' .get_the_date(). '</span>';
			}elseif($container == 'title'){
				echo '<span class="title-wrap-meta-b-item article-meta-date">' .get_the_date(). '</span>';
			}elseif($container == 'article'){
				echo '<span class="article-meta-date">' .get_the_date(). '</span>';
			}
		}
		
		//length
		if($meta == 'length' && in_array($meta, $showmeta)){
			$pb_switch = get_post_meta(get_the_ID(), 'ux-pb-switch', true);
			$read_length = ux_get_post_meta(get_the_ID(), 'theme_meta_post_length');

			if($read_length) {

				if($container == 'single'){
					echo '<span class="article-meta-unit">' .esc_html($read_length). ' ' .esc_html__(' MIN READ','ux'). '</span>';
				}elseif($container == 'navi'){
					echo '<div class="post-navi-meta">' .esc_html($read_length). ' ' .esc_html__(' MIN READ','ux'). '</div>';
				}elseif($container == 'title'){
					echo '<span class="title-wrap-meta-b-item">' .esc_html($read_length). ' ' .esc_html__(' MIN READ','ux'). '</span>';
				}elseif($container == 'article'){
					echo esc_html($read_length). ' ' .esc_html__(' MIN READ','ux');
				}

			}else{
				if($pb_switch != 'pagebuilder'){
					
					if($container == 'single'){
						echo '<span class="article-meta-unit">' .esc_html(ux_interface_blog_min_read()). ' ' .esc_html__(' MIN READ','ux'). '</span>';
					}elseif($container == 'navi'){
						echo '<div class="post-navi-meta">' .esc_html(ux_interface_blog_min_read($this_postid)). ' ' .esc_html__(' MIN READ','ux'). '</div>';
					}elseif($container == 'title'){
						echo '<span class="title-wrap-meta-b-item">' .esc_html(ux_interface_blog_min_read()). ' ' .esc_html__(' MIN READ','ux'). '</span>';
					}elseif($container == 'article'){
						echo esc_html(ux_interface_blog_min_read()). ' ' .esc_html__(' MIN READ','ux');
					}
				}
			}
		}
		
		//category
		if($meta == 'category' && in_array($meta, $showmeta) && has_category()){
			if($container == 'single'){
				echo '<span class="article-meta-unit">' .esc_attr__('IN: ','ux'); ux_theme_hide_category(', '); echo '</span>';
			}elseif($container == 'title'){
				ux_theme_hide_category(', ');
			}elseif($container == 'article'){
				echo esc_attr__('IN: ','ux');
				ux_theme_hide_category(', ', 'mainlist-meta-a');
			}
		}
		
		//tag
		if($meta == 'tag' && in_array($meta, $showmeta) && has_tag()){
			if($container == 'single'){
				echo '<span class="article-meta-unit">' .esc_attr__('TAGS: ','ux'); the_tags(', '); echo '</span>';
			}elseif($container == 'title'){
				echo '<span class="title-wrap-meta-b-item">' .esc_attr__('TAGS: ','ux'); the_tags(', '); echo '</span>';
			}elseif($container == 'article'){
				echo esc_attr__('TAGS: ','ux');
				$posttags = get_the_tags();
				$separator = ', ';
				$output = '';
				if($posttags){
					foreach($posttags as $tag) {
						$output .= '<a href="'.get_tag_link( $tag->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s","ux" ), $tag->name ) ) . '" class="mainlist-meta-a">'.$tag->name.'</a>'.$separator;
					}
				echo trim($output, $separator);
				}
			}
		}
		
		//author
		if($meta == 'author' && in_array($meta, $showmeta)){
			if($container == 'single'){
				echo '<span class="article-meta-unit">' .esc_attr__('BY: ','ux'); the_author_link(); echo '</span>';
			}elseif($container == 'title'){
				echo '<span class="title-wrap-meta-b-item">' .esc_attr__('BY: ','ux'); the_author_link(); echo '</span>';
			}elseif($container == 'article'){
				echo esc_attr__('BY: ','ux'); the_author_link();
			}
		}
		
		//comments
		if($meta == 'comments' && in_array($meta, $showmeta)){
			$comments_count = wp_count_comments(get_the_ID());
			if($container == 'single'){ ?>
                <span class="article-meta-unit"><?php comments_number(esc_attr__('0 COMMENT', "ux"), esc_attr__('1 COMMENT', "ux"), esc_attr__('% COMMENTS', "ux") ); ?></span>
			<?php
            }elseif($container == 'title'){ ?>
                <span class="title-wrap-meta-b-item"><?php comments_number(esc_attr__('0 COMMENT', "ux"), esc_attr__('1 COMMENT', "ux"), esc_attr__('% COMMENTS', "ux") ); ?></span>
			<?php
			}elseif($container == 'article'){
				comments_number(esc_attr__('0 COMMENT', "ux"), esc_attr__('1 COMMENT', "ux"), esc_attr__('% COMMENTS', "ux") );
			}
		}
		
		//Continue Reading
		if($meta == 'continue-reading' && in_array($meta, $showmeta)){
			if($container == 'single'){
				echo '<div class="blog-unit-more"><a href="' .get_permalink(). '" class="blog-unit-more-a"><span class="blog-unit-more-txt">' .esc_html__('Continue Reading','ux'). '</span> <span class="fa fa-long-arrow-right"></span></a></div>';
			}
		}		
	}
}

//Function video popup
function ux_interface_video_popup(){ ?>
    <div class="video-overlay modal">
        <span class="video-close"></span>
    </div><!--end video-overlay-->
<?php
}

//ux dynamic sidebar
function ux_dynamic_sidebar($index = 1, $count = 1){
	global $wp_registered_sidebars, $wp_registered_widgets;

	if(is_int($index)){
		$index = "sidebar-$index";
	}else{
		$index = sanitize_title($index);
		foreach((array) $wp_registered_sidebars as $key => $value){
			if(sanitize_title($value['name']) == $index){
				$index = $key;
				break;
			}
		}
	}

	$sidebars_widgets = wp_get_sidebars_widgets();
	if(empty($wp_registered_sidebars[ $index ]) || empty($sidebars_widgets[ $index ]) || ! is_array($sidebars_widgets[ $index ])){
		do_action('dynamic_sidebar_before', $index, false);
		do_action('dynamic_sidebar_after',  $index, false);
		return apply_filters('dynamic_sidebar_has_widgets', false, $index);
	}
	

	do_action('dynamic_sidebar_before', $index, true);
	$sidebar = $wp_registered_sidebars[$index];
	
	$widget_count = count((array) $sidebars_widgets[$index]);
	
	$col_class = 'span4';
	if($widget_count == 1){
		$col_class = 'span12';
	}elseif($widget_count == 2){
		$col_class = 'span6';
	}
	
	$did_one = false;
	foreach((array) $sidebars_widgets[$index] as $num => $id){
		
		if($num < $count){

			if(!isset($wp_registered_widgets[$id])) continue;
	
			$params = array_merge(
				array(array_merge($sidebar, array('widget_id' => $id, 'widget_name' => $wp_registered_widgets[$id]['name']))),
				(array) $wp_registered_widgets[$id]['params']
			);
	
			$classname_ = '';
			foreach((array) $wp_registered_widgets[$id]['classname'] as $cn){
				if(is_string($cn))
					$classname_ .= '_' . $cn;
				elseif(is_object($cn))
					$classname_ .= '_' . get_class($cn);
			}
			$classname_ = ltrim($classname_, '_');
			$params[0]['before_widget'] = sprintf($params[0]['before_widget'], $id, $classname_);
			
			$params = apply_filters('dynamic_sidebar_params', $params);
			
			$params[0]['before_widget'] = str_replace('span4', $col_class, $params[0]['before_widget']);
	
			$callback = $wp_registered_widgets[$id]['callback'];
	
			do_action('dynamic_sidebar', $wp_registered_widgets[ $id ]);
	
			if(is_callable($callback)){
				call_user_func_array($callback, $params);
				$did_one = true;
			}
		}
	}

	do_action('dynamic_sidebar_after', $index, true);

	$did_one = apply_filters('dynamic_sidebar_has_widgets', $did_one, $index);

	return $did_one;
}

//ux theme exclude category
function ux_theme_exclude_category($category){
	$hide_category = ux_get_option('theme_option_hide_category_on_post_page');
	if($category){
		$return = array();
		foreach($category as $cat){
			if(!in_array($cat, $hide_category)){
				array_push($return, $cat);
			}
		}
	}else{
		$return = false;
	}
	//return $return;
	return $category;
}

//ux theme hide category
function ux_theme_hide_category($separator= '', $class=''){
	$hide_category = ux_get_option('theme_option_hide_category_on_post_page');
	if(!$hide_category){
		$hide_category = array();
	}
	$categories = get_the_category();
	$output = '';
	if($categories){
		foreach($categories as $category){
			if(!in_array($category->term_id, $hide_category)){
				$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'ux' ), $category->name ) ) . '" class="' .sanitize_html_class($class). '">'.$category->cat_name.'</a>'.$separator;
			}
		}
		echo trim($output, $separator);
	} 
}
add_action('ux_interface_loop_the_category', 'ux_theme_hide_category', 10);
?>