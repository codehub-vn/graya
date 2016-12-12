<?php
$category   = ux_get_post_meta(get_the_ID(), 'theme_meta_page_category');
$per_page   = ux_get_post_meta(get_the_ID(), 'theme_meta_page_number');
$pagination = ux_get_post_meta(get_the_ID(), 'theme_meta_page_pagination');
$Columns    = ux_get_post_meta(get_the_ID(), 'theme_meta_page_columns');
$Columns    = $Columns ? $Columns : ' col2';
$sidebar    = ux_get_post_meta(get_the_ID(), 'theme_meta_sidebar');
$container_style = $sidebar == 'without-sidebar' ? ' container' : false; 

$category   = ux_theme_exclude_category($category);

$per_page   = $per_page ? $per_page : -1;

$post_id    = get_the_ID();

$the_query = new WP_Query(array(
	'posts_per_page' => $per_page,
	'category__in'   => $category
)); 

global $wp_query;
$current = 1;
	if(isset($wp_query->query['paged'])){
		if($wp_query->query['paged'] > 1){
			$current = $wp_query->query['paged'];
		}
	}

if($the_query->have_posts()){ ?>
    <div class="main-list container <?php echo esc_attr($Columns); ?>">
	                					 
        <div class="main-list-inn clearfix" style="" >
        
			<?php ux_page_load_blog_list($post_id, $current); ?>
            
			<?php if((int) $the_query->found_posts > 2){
				if($pagination == 'twitter'){
					ux_view_module_pagenums($post_id, 'page-blog-list', $per_page, $the_query->found_posts, $pagination);
				}else{
					echo '<div class="clearfix pagenums pagenums-default">';
					echo paginate_links( array(
						'base'      => @add_query_arg('paged','%#%'),
						'format'    => '',
						'current'   => $current,
						'prev_text' => esc_attr__('Previous','ux'),
						'next_text' => esc_attr__('Next','ux'),
						'total'     => $the_query->max_num_pages,
						'mid_size'  => 3
					));  
					echo '</div>';
					
				}
			} ?>
        </div>
    </div>
    
<?php
}
?>