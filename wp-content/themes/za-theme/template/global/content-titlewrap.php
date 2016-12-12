<?php
$switch = true;

$excerpt = false;
$title = get_the_title();

if(is_single() || is_page()){
	$excerpt = get_the_excerpt();
	$title = get_the_title();
}

if(is_day()){
	$excerpt = __('Daily Archives','ux');
	$title = get_the_date();
}

if(is_month()){
	$excerpt = __('Monthly Archives','ux');
	$title = get_the_date(_x('F Y', 'monthly archives date format', 'ux'));
}

if(is_year()){
	$excerpt = __('Yearly Archives','ux');
	$title = get_the_date(_x('Y', 'yearly archives date format', 'ux'));
}

if(is_home()){
	$excerpt = __('Latest Posts','ux');
	$title = __('Home','ux');
}

if(is_404()){
	$excerpt = false;
	$title = false;
}

if(is_archive()){
	$excerpt = false;
	$title = __('Archives','ux');
	if(class_exists('Woocommerce')){
		if(is_shop()){
			$title = __('Shop','ux');
		}
	}
}

if(is_tag()){
	$excerpt = __('Tag','ux');
	$title = single_tag_title('', false);
}

if(is_author()){
	$excerpt = __('Author','ux');
	$title = get_the_author();
}

if(is_category()){
	$excerpt = __('Category','ux');
	$title = single_cat_title('', false);
}

if(class_exists('Woocommerce')){
	if(is_product_category()) {
		$title = single_cat_title('', false);
	}
}

if(is_search()){
	$excerpt = __( 'Search Results for', 'ux');
	$title = get_search_query();
}

if(is_page()){
	$show_title = ux_get_post_meta(get_the_ID(), 'theme_meta_page_show_title');
	if(!$show_title){
		$switch = false;
	}
}

if($switch){ ?>

    <section class="title-wrap">
        <div class="title-wrap-con middle-ux">
            <h1 class="title-wrap-tit"><?php echo esc_html($title); ?></h1>
            <?php if($excerpt) { ?>
            <div class="title-wrap-des"><?php echo balanceTags($excerpt); ?></div>
            <?php } ?>
        </div>
    </section>
    
<?php } ?>