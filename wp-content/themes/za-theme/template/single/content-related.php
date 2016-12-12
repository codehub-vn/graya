<?php
//** current post id
$post_id = get_the_ID();

//** post data
$get_posts = array();

//** processing tags
$tags = array();
$get_tags = get_the_tags();
if($get_tags){
	foreach($get_tags as $num => $tag){
		array_push($tags, $tag->term_id);
	}
	
	if(count($tags)){
		$get_posts = get_posts(array(
			'posts_per_page' => 6,
			'meta_key' => '_thumbnail_id',
			'tag__in' => $tags,
			'post__not_in' => array($post_id),
			'orderby' => 'rand'
		));
	}
}

if(count($get_posts) < 6){
	//** processing category
	$category = array();
	$category_parents = array();
	$get_categories = get_the_category();
	
	foreach($get_categories as $cat){
		array_push($category, $cat->term_id);
		if($cat->parent){
			array_push($category_parents, $cat->parent);
		}
	}
	
	if(count($category)){
		$get_posts = get_posts(array(
			'posts_per_page' => 6,
			'meta_key' => '_thumbnail_id',
			'category__in' => $category,
			'post__not_in' => array($post_id),
			'orderby' => 'rand'
		)); 
	}
	
	if(count($get_posts) < 6 && count($category_parents)){
		$get_posts = get_posts(array(
			'posts_per_page' => 6,
			'meta_key' => '_thumbnail_id',
			'category__in' => $category_parents,
			'post__not_in' => array($post_id),
			'orderby' => 'rand'
		));
	}
}

if(count($get_posts) >= 2){

	global $post; 

	$ux_related_title = ux_get_option('theme_option_descriptions_related_posts_title');
	$ux_related_title = $ux_related_title ? $ux_related_title : esc_html__('YOU MIGHT ALSO LIKE','ux');
	?>
    
    <section class="related-posts-carousel">
        <h1 class="related-posts-carousel-tit"><?php echo balanceTags($ux_related_title); ?></h1>
        
        <div class="owl-carousel" data-auto="false" data-item="2" data-center="false" data-margin="0" data-autowidth="false" data-slideby="2">
			<?php
            foreach($get_posts as $num => $post){ setup_postdata($post);
                if(has_post_thumbnail()){
                    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
                    $style = 'background-image:url(' .$thumbnail[0]. ')';
                }else{
                    $style = false;
                } ?>
                <section class="related-posts-carousel-li item" style=" <?php echo $style; ?>"> 
                    <h2 class="related-posts-tit">
                        <span class="related-posts-meta"><?php /** Do Hook Archive UX the category */ do_action('ux_interface_loop_the_category', ' ', 'related-posts-meta-item'); ?></span>
                        <a class="related-posts-tit-a" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                </section>
            <?php
            }
            wp_reset_postdata(); ?>
        </div>
        
    </section>
<?php } ?>