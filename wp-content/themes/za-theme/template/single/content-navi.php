<?php 
    $prev_post = get_previous_post();
    $next_post = get_next_post();
	$prefix_permalink = false;
	$data = false;
	$get_post = false;
	
	if(isset($_REQUEST['mode'])){
		if($_REQUEST['mode'] == 'ajax-portfolio'){
			$cat = $_REQUEST['category'];
			if($cat != ''){
				$categories = get_the_category();
				$categoryIDS = array();
				foreach($categories as $category) {
					if($category->term_id != $cat){
						array_push($categoryIDS, $category->term_id);
					}
				}
				$categoryIDS = implode(",", $categoryIDS);
				
				$prev_post = get_previous_post(true, $categoryIDS);
				$next_post = get_next_post(true, $categoryIDS);
				
				$prefix_permalink = '#/';
			}
			$bg_color = ux_get_post_meta(get_the_ID(), 'theme_meta_bg_color');
			$bg_color = $bg_color ? 'bg-' . ux_theme_switch_color($bg_color) : 'post-bgcolor-default';
			$data = 'data-bgcolor="' . $bg_color . '" data-category="' . $cat . '"';
		}
	}
	
	//first post
	$get_first_post = get_posts(array(
		'posts_per_page' => 1,
		'order'          => 'ASC'
	)); 
	
	$first_post = $get_first_post ? $get_first_post[0] : false; 
	
	//last post
	$get_last_post = get_posts(array(
		'posts_per_page' => 1,
		'order'          => 'DESC'
	)); 
	
	$last_post = $get_last_post ? $get_last_post[0] : false; 

	$prefix_permalink = esc_attr($prefix_permalink);
	
	$next_text = ux_get_option('theme_option_descriptions_next');
	$next_text = $next_text ? $next_text : esc_html__('NEXT','ux');
	$prev_text = ux_get_option('theme_option_descriptions_prev');
	$prev_text = $prev_text ? $prev_text : esc_html__('PREVIOUS','ux');
?>
<!--Post navi-->
<nav id="post-navi">
    <div class="row-fluid">
        <?php if(!empty($prev_post)){ ?>
            <div class="post-navi-unit post-navi-unit-prev span6">
                <a href="<?php echo esc_url($prefix_permalink . get_permalink($prev_post->ID)); ?>" title="<?php echo esc_attr($prev_post->post_title); ?>" class="post-navi-unit-a"><span class="fa fa-long-arrow-left"></span> <?php echo esc_html($prev_text); ?></a>
                <h2 class="post-navi-unit-tit hidden-phone"><a href="<?php echo esc_url($prefix_permalink . get_permalink($prev_post->ID)); ?>" title="<?php echo esc_attr($prev_post->post_title); ?>"><?php echo esc_html($prev_post->post_title); ?></a></h2>
            </div>
        <?php }elseif($last_post){ ?>
            <div class="post-navi-unit post-navi-unit-prev span6">
                <a href="<?php echo esc_url($prefix_permalink . get_permalink($last_post->ID)); ?>)" title="<?php echo esc_attr($last_post->post_title); ?>" class="post-navi-unit-a"><span class="fa fa-long-arrow-left"></span> <?php echo esc_html($prev_text); ?></a>
                <h2 class="post-navi-unit-tit hidden-phone"><a href="<?php echo esc_url($prefix_permalink . get_permalink($last_post->ID)); ?>" title="<?php echo esc_attr($last_post->post_title); ?>"><?php echo esc_html($last_post->post_title); ?></a></h2>
            </div>
        <?php	
		}
		
		if(!empty($next_post)){ ?>
            <div class="post-navi-unit post-navi-unit-next span6">
                <a href="<?php echo esc_url($prefix_permalink . get_permalink($next_post->ID)); ?>" title="<?php echo esc_attr($next_post->post_title); ?>" class="post-navi-unit-a"><?php echo esc_html($next_text); ?> <span class="fa fa-long-arrow-right"></span></a>
                <h2 class="post-navi-unit-tit hidden-phone"><a href="<?php echo esc_url($prefix_permalink . get_permalink($next_post->ID)); ?>" title="<?php echo esc_attr($next_post->post_title); ?>"><?php echo esc_html($next_post->post_title); ?></a></h2>
            </div>
        <?php }elseif($first_post){ ?>
            <div class="post-navi-unit post-navi-unit-next span6">
                <a href="<?php echo esc_url($prefix_permalink . get_permalink($first_post->ID)); ?>" title="<?php echo esc_attr($first_post->post_title); ?>" class="post-navi-unit-a"><?php echo esc_html($next_text); ?> <span class="fa fa-long-arrow-right"></span></a>
                <h2 class="post-navi-unit-tit hidden-phone"><a href="<?php echo esc_url($prefix_permalink . get_permalink($first_post->ID)); ?>" title="<?php echo esc_attr($first_post->post_title); ?>"><?php echo esc_html($first_post->post_title); ?></a></h2>
            </div>
        <?php	
		} ?>
    </div>
</nav>