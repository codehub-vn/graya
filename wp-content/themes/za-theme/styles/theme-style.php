<?php
header("Content-type: text/css; charset: UTF-8");
require_once('../../../../wp-load.php');


//Global Colors

//Heighlight Color
$ux_color_theme_main = esc_attr(ux_get_option('theme_option_color_theme_main'));
if($ux_color_theme_main){ ?>
	.mainlist-meta a, .article-meta-unit a,
	.blog-unit-tit a:hover,.count-box,.social-like .wpulike .counter a.image:before,.post-meta-social .count, .list-author-unit .socialmeida-a:hover,.height-light-ux,.post-categories a,.widget_archive li,.widget_categories li,.widget_nav_menu li,.widget_pages li,
	a:hover,.entry p a,.sidebar_widget a:hover,#footer a:hover,.archive-tit a:hover,.text_block a,.post_meta > li a:hover, #sidebar a:hover, #comments .comment-author a:hover,#comments .reply a:hover,.fourofour-wrap a,.archive-meta-unit a:hover,.post-meta-unit a:hover,#back-top:hover,.heighlight,.archive-meta-item a,.author-name,.archive-unit-h2 a:hover,
	.carousel-wrap a:hover,.blog-item-main h2 a:hover,.related-post-wrap h3:hover a,.ux-grid-tit-a:hover,.iconbox-a .iconbox-h3:hover,.iconbox-a:hover,.iocnbox:hover .icon_wrap i.fa,.blog-masony-item .item-link:hover:before,.clients_wrap .carousel-btn .carousel-btn-a:hover:before,.tw-style-a:hover,.moudle .tw-style-a.ux-btn:hover,
	.blog_meta a:hover,.breadcrumbs a:hover,.link-wrap a:hover,.archive-wrap h3 a:hover,.more-link:hover,.post-color-default,.latest-posts-tags a:hover,.pagenums .current,.page-numbers.current,.fullwidth-text-white .fullwrap-with-tab-nav-a:hover,.fullwrap-with-tab-nav-a:hover,.fullwrap-with-tab-nav-a.full-nav-actived,.fullwidth-text-white .fullwrap-with-tab-nav-a.full-nav-actived,a.liquid-more-icon.ux-btn:hover,.moudle .iterblock-more.ux-btn:hover,
	input[type="submit"]:hover,.form-submit:hover:after,.comment-reply-title:hover,
	.woocommerce .woocommerce-message:before,.cart-summary .order-total .amount,.woocommerce .woocommerce-info:before, #respond .form-submit:hover input#submit
	{ 
		color:<?php echo esc_attr($ux_color_theme_main); ?>; 
	}
	.tagcloud a:hover,.related-post-wrap h3:before,.single-image-mask,
	input.idi_send:hover,.ux-hover-icon-wrap,.iconbox-content-hide .icon_text,.process-bar,.nav-tabs > li > a:hover,.portfolio-caroufredsel-hover
	{ 
		background-color:<?php echo esc_attr($ux_color_theme_main); ?>;
	}
	#respondwrap textarea:focus, #respondwrap input:focus,
	.moudle input[type="text"]:focus, .moudle textarea:focus,
	input:focus:invalid:focus, textarea:focus:invalid:focus, select:focus:invalid:focus {
		border-color: <?php echo esc_attr($ux_color_theme_main); ?>;
	}
	textarea:focus, input[type="text"]:focus, input[type="password"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="date"]:focus, input[type="month"]:focus, 
	input[type="time"]:focus, input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, 
	input[type="color"]:focus, .uneditable-input:focus, button:hover, .comment-reply-title:hover, .ux-btn:hover,input[type="submit"]:hover,
	#respond .form-submit:hover input[type="submit"]
	{
		border-bottom-color: <?php echo esc_attr($ux_color_theme_main); ?>;
	}

	
<?php }


// Auxiliary Color
$ux_color_second_auxiliary = esc_attr(ux_get_option('theme_option_color_second_auxiliary'));
if($ux_color_second_auxiliary){ ?>
	.break-line,.tagcloud a,.gallery-list-contiune,.mainlist-img-wrap,.archive-text-wrap,.author-unit-inn,ul.sidebar_widget > li .widget-title,
	.slider-panel,#main_title_wrap,.nav-tabs > li,.promote-wrap,.process-bar-wrap,.post_meta,.pagenumber a,.standard-blog-link-wrap,.blog-item.quote,.portfolio-standatd-tit-wrap:before,.quote-wrap,.entry pre,.text_block pre,.isotope-item.quote .blog-masony-item,.blog-masony-item .item-link-wrap,
	.pagenumber span,.testimenials,.testimenials .arrow-bg,.accordion-heading,.testimonial-thum-bg,.single-feild,.fullwidth-text-white .iconbox-content-hide .icon_wrap,
	.woocommerce .woocommerce-message, .woocommerce-page .woocommerce-message, .woocommerce .woocommerce-info, .woocommerce-page .woocommerce-info, .woocommerce .woocommerce-error, .woocommerce-page .woocommerce-error,.woocommerce-checkout #payment div.payment_box
	{ 
		background-color: <?php echo esc_attr($ux_color_second_auxiliary); ?>; 
	}
	.progress_bars_with_image_content .bar .bar_noactive.grey 
	{
	  color: <?php echo esc_attr($ux_color_second_auxiliary); ?>; 
	}
	.widget_archive li,.widget_categories li,.widget_nav_menu li,.widget_pages li,.widget_recent_entries li,.widget_recent_comments li,.widget_meta li,.widget_rss li,
	.border-style2,.border-style3,.nav-tabs > li > a,.tab-content,.nav-tabs > .active > a, .nav-tabs > .active > a:hover, .nav-tabs > .active > a:focus,.tabs-v,.single-feild,.archive-unit, 
	.list-author-unit,li.commlist-unit
	{ 
		border-color: <?php echo esc_attr($ux_color_second_auxiliary); ?>; 
	}
	
	.nav.nav-tabs, .tabs-v .nav-tabs > li:last-child.active>a,.sidebar_widget .widget-title,.woocommerce-checkout #payment div.payment_box:after {
		border-bottom-color: <?php echo esc_attr($ux_color_second_auxiliary); ?>; 
	}
	.tab-content.tab-content-v,blockquote {
		border-left-color: <?php echo esc_attr($ux_color_second_auxiliary); ?>; 
	}
	.blog-unit,.search-result-unit,
	.tabs-v .nav-tabs > .active > a {
		border-top-color: <?php echo esc_attr($ux_color_second_auxiliary); ?>; 
	}
	
<?php }



//Logo Text Color
$ux_color_logo = esc_attr(ux_get_option('theme_option_color_logo'));
if($ux_color_logo){ ?>
	
	.logo-h1  { 
		color:<?php echo esc_attr($ux_color_logo); ?> 
	}
	
<?php }

//Logo-in-Footer Text Color
$ux_color_logo_foot = esc_attr(ux_get_option('theme_option_color_footer_logo'));
if($ux_color_logo_foot){ ?>
	
	#footer .logo-h1  { 
		color:<?php echo esc_attr($ux_color_logo_foot); ?> 
	}
	
<?php }


//Navigation
// Menu Icon Color (Menu on Header)
$ux_color_menu_icon_on_header = esc_attr(ux_get_option('theme_option_color_menu_icon_on_header'));
if($ux_color_menu_icon_on_header){ ?>

<?php }

// Menu Panel Bg Color
$ux_color_menu_panel_bg = esc_attr(ux_get_option('theme_option_color_menu_panel_bg'));
if($ux_color_menu_panel_bg){ ?>
	.navi-side:not(.ux-mobile) #header-main,
	#mobile-panel,
    #nav-side-content, .nav-side-child-content, .nav-side-fold-content,
    #nav-top-content-wrap-inn,
    #mobile-panel-content,
    .mobile-panel-child-content,
    .mobile-panel-fold-content, .navi-over #header
	{
	background-color: <?php echo esc_attr($ux_color_menu_panel_bg); ?>; 
	}
    
<?php }

//Menu Item Text Color
$ux_color_menu_item_text = esc_attr(ux_get_option('theme_option_color_menu_item_text'));
if($ux_color_menu_item_text){ ?>

	#navi a,.nav-wrap a, #header .socialmeida-a,.social-header-triggle,#header .search-top-btn-class, #header .wpml-translation a, 
	#navi-wrap-mobile a,.header-meta-tit,.languages-shortname
	{ 
	color: <?php echo esc_attr($ux_color_menu_item_text); ?>; 
	}
	
	.menu-item-back .fa:after,.ux-mobile .submenu-icon,#mobile-panel-close:before, #mobile-panel-close:after, .mobile-panel-close:before, .mobile-panel-close:after,
	.navi-trigger-inn,.navi-trigger-inn:before,.navi-trigger-inn:after
	{
	background-color: <?php echo esc_attr($ux_color_menu_item_text); ?>; 
	}

<?php }

// Menu Item Text Color Mouseover
$ux_color_menu_item_text_mouseover = esc_attr(ux_get_option('theme_option_color_menu_item_text_mouseover'));
if($ux_color_menu_item_text_mouseover){ ?>
	#navi a:hover,#navi-wrap-mobile a:hover, .nav-wrap a:hover,.wpml-translation a:hover .languages-shortname,#header .socialmeida-a:hover,#mobile-panel .socialmeida-a:hover, #header .search-top-btn-class:hover,#header .wpml-translation li a:hover,#header .wpml-translation li .current-language,.current-language .languages-shortname
	{
	color:<?php echo esc_attr($ux_color_menu_item_text_mouseover); ?>;
	}
	.menu-item-back a:hover .fa:after,#navi-wrap-mobile a:hover > .submenu-icon 
	{
	background-color:<?php echo esc_attr($ux_color_menu_item_text_mouseover); ?>;
	}
<?php }

// Activated Item Text Color
$ux_color_menu_activated_item_text = esc_attr(ux_get_option('theme_option_color_menu_activated_item_text'));
if($ux_color_menu_activated_item_text){ ?>
	#navi .current-menu-item > a, 
	#navi>div>ul li.current-menu-parent>a, 
	#navi>div>ul>li.current-menu-ancestor>a, 
	#navi .sub-menu li.current-menu-item>a,
	.nav-wrap .current-menu-item > a, 
	.nav-wrap>div>ul li.current-menu-parent>a, 
	.nav-wrap>div>ul>li.current-menu-ancestor>a, 
	.nav-wrap .sub-menu li.current-menu-item>a
	{
	color:	<?php echo esc_attr($ux_color_menu_activated_item_text); ?>;
	}

<?php }

 
//Posts & Pages

//Heading Color  
$theme_option_color_heading = esc_attr(ux_get_option('theme_option_color_heading'));
if($theme_option_color_heading){ ?>
	
	.blog-unit-tit a,.main-title,.site-loading-logo .logo-h1,#comments .comment-author a,h1,h2,h3,h4,h5,h6,.archive-tit a,.blog-item-main h2 a,.item-title-a,#sidebar .social_active i:hover,.ux-grid-tit-a,.filters.filters-nobg li a:hover,.filters.filters-nobg li.active a,.portfolio-standatd-tit-a,.portfolio-standatd-tags a[rel*="tag"],.archive-unit-h2 a,.archive-date,
	.nav-tabs > .active > a, .nav-tabs > .active > a:hover, .nav-tabs > .active > a:focus,.accordion-heading .accordion-toggle,.post-navi-a,.moudle .ux-btn,
	.jqbar.vertical span,.team-item-con-back a,.team-item-con-back i,.team-item-con-h p,.slider-panel-item h2.slider-title a,.bignumber-item.post-color-default,.blog-item .date-block,
	.clients_wrap .carousel-btn .carousel-btn-a,.gallery-info-property-item,#search-result .pagenums .tw-style-a
	{ 
	color:<?php echo esc_attr($theme_option_color_heading); ?>; 
	}
	.woocommerce a.remove,.woocommerce a.remove:hover {
	color:<?php echo esc_attr($theme_option_color_heading); ?>!important; 
	}
	.post_social:before, .post_social:after,
	.accordion-heading,.title-ux.line_under_over,.gallery-wrap-sidebar .entry, .social-share,
	.woocommerce form .form-row.woocommerce-validated .select2-container
	{ 
	border-color: <?php echo esc_attr($theme_option_color_heading); ?>; 
	}
	textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input,
	.ux-btn,input[type="submit"],button,
	.woocommerce form .form-row.woocommerce-validated .select2-container, .woocommerce form .form-row.woocommerce-validated input.input-text, .woocommerce form .form-row.woocommerce-validated select
	{
	border-bottom-color: <?php echo esc_attr($theme_option_color_heading); ?>; 
	}
	h1.main-title:before,.team-item-con,.ux-btn:before,.title-ux.line_both_sides:before,.title-ux.line_both_sides:after,.galleria-info,#float-bar-triggler,.float-bar-inn,.short_line:after,.form-submit:before,.btnarea:before,.submit-wrap:before,#back-top:before,
	.accordion-style-b .accordion-heading a:before,.accordion-style-b .accordion-heading a:after,.separator_inn.bg- ,.countdown_section
	{
	background-color: <?php echo esc_attr($theme_option_color_heading); ?>;
	}

<?php }

// Content text Color 
$ux_color_content = esc_attr(ux_get_option('theme_option_color_content_text'));
if($ux_color_content){ ?>
	.ux-mobile #navi,.magazine-unit.magazine-bgcolor-default,.magazine-unit.magazine-bgcolor-default a,.gallery-info-property-con,.text_block,#back-top, .article-meta-unit a:hover,
	body,a,.entry p a:hover,.text_block a:hover,#content_wrap,#comments,.blog-item-excerpt,.archive-unit-excerpt,.archive-meta-item a:hover,.entry code,.text_block code,
	h3#reply-title small, #comments .nav-tabs li.active h3#reply-title .logged,#comments .nav-tabs li a:hover h3 .logged,.testimonial-thum-bg i.fa,
	.header-info-mobile,.carousel-wrap a.disabled:hover,.stars a:hover 
	{ 
	color: <?php echo esc_attr($ux_color_content); ?>; 
	}
	.filters.filters-nobg li a:before,.blog-item-more-a:hover
	{
	background-color: <?php echo esc_attr($ux_color_content); ?>; 
	}
	.blog-item-more-a:hover,.audio-unit  {
	border-color: <?php echo esc_attr($ux_color_content); ?>; 
	}
	
<?php }

//meta text Color 
$ux_color_auxiliary_content = esc_attr(ux_get_option('theme_option_color_auxiliary_content'));
if($ux_color_auxiliary_content){ ?>
	.post-navi-unit-a,.related-posts-date,.list-author-unit .socialmeida-a, .blog-unit-meta, .blog-unit-meta a,.gallery-list-contiune,.mainlist-meta,.mainlist-meta a:hover,
	.post_meta>li,.post_meta>li a,.post-meta, .post-meta a,.archive-meta-unit,.archive-meta-unit a,.latest-posts-tags a,.latest-posts-date,#comments .comment-meta .comment-reply-link,#comments .comment-meta .date,
	#mobile-header-meta p,.bbp-meta,.bbp-meta a,.bbp-author-role,.bbp-pagination-count,span.bbp-author-ip,.bbp-forum-content,.infrographic-subtit,.blog_meta,.blog_meta a,.more-link,.blog-item-excerpt .wp-caption-text,
	#content_wrap .product_meta,#content_wrap .product_meta a,
	textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input
	{ 
	color:<?php echo esc_attr($ux_color_auxiliary_content); ?>; 
	}
	.comment-author:after {
	background-color: <?php echo esc_attr($ux_color_auxiliary_content); ?>; 
	}
	
<?php }

//Selected Text Bg Color
$ux_color_selected_text_bg = esc_attr(ux_get_option('theme_option_color_selected_text_bg'));
if($ux_color_selected_text_bg){ ?>

    ::selection { background: <?php echo esc_attr($ux_color_selected_text_bg); ?>; }
	::-moz-selection { background: <?php echo esc_attr($ux_color_selected_text_bg); ?>; }
	::-webkit-selection { background: <?php echo esc_attr($ux_color_selected_text_bg); ?>; }

<?php
}

//Page/Post Header Bg Color
$ux_header_bg_page_post = esc_attr(ux_get_option('theme_option_header_bg_page_post'));
if($ux_header_bg_page_post){ ?>
	.title-wrap
	{ 
	background-color: <?php echo esc_attr($ux_header_bg_page_post); ?>; 
	}

<?php }

// Page Body BG Color
$ux_bg_page_post = esc_attr(ux_get_option('theme_option_bg_page_post'));
if($ux_bg_page_post){ ?>
	
	#header-inn-main,.page-loading,#search-overlay,.navi-top-layout:not(.ux-mobile) #main-navi,#back-top,
	body,#wrap-outer,#top-wrap,#main,.separator h4, #login-form.modal .modal-dialog,
	.nav-tabs > .active > a, .nav-tabs > .active > a:hover, .nav-tabs > .active > a:focus,.tab-content,.filters.filter-floating li a:before,.standard-list-item:hover .portfolio-standatd-tit-wrap:before,.ux-mobile #main-navi-inn 
	{ 
	background-color: <?php echo esc_attr($ux_bg_page_post); ?>;
	}
	.testimenials span.arrow,.nav-tabs > .active > a, .nav-tabs > .active > a:hover, .nav-tabs > .active > a:focus { 
	border-bottom-color: <?php echo esc_attr($ux_bg_page_post); ?>; 
	}
	.tabs-v .nav-tabs > .active > a
	{ 
	border-right-color: <?php echo esc_attr($ux_bg_page_post); ?>; 
	}
	.quote-wrap, .mouse-icon, #search-result .pagenums .tw-style-a:hover,
	.moudle .ux-btn:before, .countdown_amount,.countdown_section {
	color: <?php echo esc_attr($ux_bg_page_post); ?>; 
	}
	
	
<?php }

//Sidebar
//Sidebar Widget Title Color
$ux_color_sidebar_widget_title = esc_attr(ux_get_option('theme_option_color_sidebar_widget_title'));
if($ux_color_sidebar_widget_title){ ?>
	
	.sidebar_widget h3.widget-title,
	.sidebar_widget h3.widget-title a { 
	  color: <?php echo esc_attr($ux_color_sidebar_widget_title); ?>;
	}
	
<?php }

//Sidebar Widget content Color
$ux_color_sidebar_con_color = esc_attr(ux_get_option('theme_option_color_sidebar_content_color'));
if($ux_color_sidebar_con_color){ ?>
	
	.sidebar_widget,
	.sidebar_widget a { 
	  color: <?php echo esc_attr($ux_color_sidebar_con_color); ?>; 
	}

<?php }

//Footer Text Color
$ux_color_footer_text = esc_attr(ux_get_option('theme_option_footer_text_color'));
if($ux_color_footer_text){ ?>
	
	.footer-bar,.footer-bar a,.copyright, .copyright a { 
	  color: <?php echo esc_attr($ux_color_footer_text); ?>; 
	}
	

<?php }

//Footer bg Color
$ux_color_footer_bg = esc_attr(ux_get_option('theme_option_footer_bg_color'));
if($ux_color_footer_bg){ ?>
	
	#footer {
		background-color: <?php echo esc_attr($ux_color_footer_bg); ?>; 
	}
	

<?php }

// Footer Widget Bg Color
$ux_footer_widget_bg_color = esc_attr(ux_get_option('theme_option_footer_widget_bg_color'));
if($ux_footer_widget_bg_color){ ?>
	
	.widget_footer { 
	  background-color: <?php echo esc_attr($ux_footer_widget_bg_color); ?>; 
	}

<?php }

// Footer Widget Content Color
$ux_footer_widget_content_color = esc_attr(ux_get_option('theme_option_footer_widget_content_color'));
if($ux_footer_widget_content_color){ ?>
	
	.widget_footer_unit,
	.widget_footer_unit a { 
	  color: <?php echo esc_attr($ux_footer_widget_content_color); ?>; 
	}
	.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range { 
		background-color: <?php echo esc_attr($ux_footer_widget_content_color); ?>; 
	}

<?php }

// Footer Widget Title Colour
$ux_footer_widget_title_color = esc_attr(ux_get_option('theme_option_footer_widget_title_color'));
if($ux_footer_widget_title_color){ ?>
	
	.widget_footer_unit .widget-title,
	.widget_footer_unit .widget-title a 
	{ 
	  color: <?php echo esc_attr($ux_footer_widget_title_color); ?>; 
	}

<?php }

//## Font ########################################################################################

//heading font
$ux_heading_font = ux_get_option('theme_option_font_family_heading');
$ux_heading_font = $ux_heading_font != -1 ? $ux_heading_font : false;
if($ux_heading_font){
	$ux_heading_font = str_replace('+', ' ', $ux_heading_font); ?>
	h1,h2,h3,h4,h5,h6,#content_wrap .infrographic p,#content_wrap .promote-mod p,.ux-btn,.archive-custom-list-ul a,.tptn_title,.widget_archive li, .widget_categories li, .widget_pages li, .widget_nav_menu li, .widget_recent_entries li, .widget_recent_comments li,
	textarea, select,input[type="submit"],button,input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], 
	input[type="time"], select, input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], 
	input[type="color"], .uneditable-input,.tw-style-a  
	{ 
		font-family: <?php echo esc_attr($ux_heading_font); ?>; 
	}
<?php }
//heading style
$ux_heading_font_style = ux_get_option('theme_option_font_style_heading');
if($ux_heading_font_style){ ?>
    h1,h2,h3,h4,h5,h6,#content_wrap .infrographic p,#content_wrap .promote-mod p,.ux-btn,.archive-custom-list-ul a,.tptn_title,.widget_archive li, .widget_categories li, .widget_pages li, .widget_nav_menu li, .widget_recent_entries li, .widget_recent_comments li,
    textarea, select,input[type="submit"],button,input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], 
	input[type="time"], select, input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], 
	input[type="color"], .uneditable-input,.tw-style-a  
	{ 
    <?php echo esc_attr(ux_theme_google_font_style($ux_heading_font_style)); ?>
	}
<?php }

//main font : menu, button, meta, sidebar, footer
$ux_main_font = ux_get_option('theme_option_font_family_main');
$ux_main_font = $ux_main_font != -1 ? $ux_main_font : false;
if($ux_main_font){
	$ux_main_font = str_replace('+', ' ', $ux_main_font); ?>
	body, input, textarea, select, button, legend,.gallery-info-property-con,.text_block 
	{ 
		font-family: <?php echo esc_attr($ux_main_font); ?>; 
	}
<?php }

//main style
$ux_main_font_style = ux_get_option('theme_option_font_style_main');
if($ux_main_font_style){ ?>
    body, input, textarea, select, button,legend,.gallery-info-property-con,.text_block 
    { 
	    <?php echo esc_attr(ux_theme_google_font_style($ux_main_font_style)); ?>
	}
<?php }

//Menu &  Meta font below title
$ux_menu_font = ux_get_option('theme_option_font_family_menu');
$ux_menu_font = $ux_menu_font != -1 ? $ux_menu_font : false;
if($ux_menu_font){
	$ux_menu_font = str_replace('+', ' ', $ux_menu_font); ?>
	#navi a,.nav-wrap a, .article-meta, .ux-mega-cate-meta,.ux-mobile #navi .ux-mega-cate-tit-a, .blog-unit-meta-bottom,.mainlist-meta,.related-posts-meta,.blog-unit-meta-top,.carousel-des-wrap-meta,.comment-meta .date, .comment-reply-link,.tptn_author,.tptn_date,.tptn_excerpt,.tptn_list_count,.header-meta-tit.search-top-btn-class,.header-meta-tit,.navi-over header .languages-shortname .tw_style,.article-meta, .mainlist-meta 
	{ 
		font-family: <?php echo esc_attr($ux_menu_font); ?>; 
	}
<?php }

//Menu & Meta font below title style
$ux_menu_font_style = ux_get_option('theme_option_font_style_menu');
if($ux_menu_font_style){ ?>
    #navi a,.nav-wrap a, .article-meta, .ux-mega-cate-meta,.ux-mobile #navi .ux-mega-cate-tit-a, .blog-unit-meta-bottom,.mainlist-meta,.related-posts-meta,.blog-unit-meta-top,.carousel-des-wrap-meta,.comment-meta .date, .comment-reply-link,.tptn_author,.tptn_date,.tptn_excerpt,.tptn_list_count,.header-meta-tit.search-top-btn-class,.header-meta-tit,.navi-over header .languages-shortname .tw_style,.article-meta, .mainlist-meta  
    { 
	    <?php echo esc_attr(ux_theme_google_font_style($ux_menu_font_style)); ?>
	}
<?php }


//logo font
$ux_logo_font = ux_get_option('theme_option_font_family_logo');
$ux_logo_font = $ux_logo_font != -1 ? $ux_logo_font : false;
if($ux_logo_font){
	$ux_logo_font = str_replace('+', ' ', $ux_logo_font); ?>
	.logo-h1 { font-family: <?php echo esc_attr($ux_logo_font); ?>;}
<?php }
//logo size
$ux_logo_font_size = ux_get_option('theme_option_font_size_logo');
if($ux_logo_font_size && $ux_logo_font_size!='Select'){ ?>
    .logo-h1 { font-size: <?php echo esc_attr($ux_logo_font_size); ?>;}
<?php }
//logo style
$ux_logo_font_style = ux_get_option('theme_option_font_style_logo');
if($ux_logo_font_style){ ?>
    .logo-h1 { <?php echo esc_attr(ux_theme_google_font_style($ux_logo_font_style)); ?>}
<?php }


//menu
$ux_menu_font_size = ux_get_option('theme_option_font_size_menu');
if($ux_menu_font_size && $ux_menu_font_size !='Select'){ ?>
    #navi a,.nav-wrap a, .gallery-navi-a,.header-meta-tit,.navi-over header .languages-shortname,.navi-over #navi a ,.nav-wrap .socialmeida-a,.navi-over .nav-wrap .languages-shortname,.navi-over.navi-always-shown .header-meta-tit
    { 
    font-size: <?php echo esc_attr($ux_menu_font_size); ?>;
	}
<?php }

//copyright
$ux_copyright_font_size = ux_get_option('theme_option_font_size_copyright');
if($ux_copyright_font_size && $ux_copyright_font_size !='Select'){ ?>
    .copyright { font-size: <?php echo esc_attr($ux_copyright_font_size); ?>;}
<?php }

//Post & page Title font
$ux_post_page_title_font = ux_get_option('theme_option_font_post_page_title');
if($ux_post_page_title_font && $ux_post_page_title_font !='Select' ){
	$ux_post_page_title_font = str_replace('+', ' ', $ux_post_page_title_font); ?>
    .title-wrap-tit,.related-posts-item-tit,.archive-grid-item-tit,.title-wrap-meta-a,.archive-grid-item-meta-item,.related-posts-item-meta 
    { 
    font-family: <?php echo esc_attr($ux_post_page_title_font); ?>;
	}
<?php }

//Post & page Title stlye
$ux_post_page_title_font_style = ux_get_option('theme_option_font_style_post_page_title');
if($ux_post_page_title_font_style){ ?>
    .title-wrap-tit,.related-posts-item-tit,.archive-grid-item-tit,.title-wrap-meta-a,.archive-grid-item-meta-item,.related-posts-item-meta 
    { 
    <?php echo esc_attr(ux_theme_google_font_style($ux_post_page_title_font_style)); ?>;
	}
<?php }

//Post & page Title size
$ux_post_page_title_font_size = ux_get_option('theme_option_font_size_post_page_title');
if($ux_post_page_title_font_size && $ux_post_page_title_font_size !='Select' ){ ?>
    .title-wrap-tit { font-size: <?php echo esc_attr($ux_post_page_title_font_size); ?>;}
<?php }

//Post & page Content size
$ux_post_page_content_font_size = ux_get_option('theme_option_font_size_post_page_content');
if($ux_post_page_content_font_size && $ux_post_page_content_font_size !='Select'){ ?>
	body, legend, label, input, button, select, textarea 
	{ 
	font-size: <?php echo esc_attr($ux_post_page_content_font_size); ?>;
	}
<?php }

//Post & page meta size
$ux_post_page_meta_font_size = ux_get_option('theme_option_font_size_post_page_meta');
if($ux_post_page_meta_font_size && $ux_post_page_meta_font_size !='Select'){ ?>
    .blog-unit-meta,.article-meta,.mainlist-meta 
    { 
    font-size: <?php echo esc_attr($ux_post_page_meta_font_size); ?>;
	}
<?php }

//Sidebar Widget Title size
$ux_sidebar_widget_title_font_size = ux_get_option('theme_option_font_size_post_page_widget_tit');
if($ux_sidebar_widget_title_font_size && $ux_sidebar_widget_title_font_size != 'Select'){ ?>
    .widget-title { font-size: <?php echo esc_attr($ux_sidebar_widget_title_font_size); ?>; }
<?php }

//Sidebar Widget Content size
$ux_sidebar_widget_content_font_size = ux_get_option('theme_option_font_size_post_page_widget_content');
if($ux_sidebar_widget_content_font_size && $ux_sidebar_widget_content_font_size != 'Select'){ ?>
    .widget-container,.widget-container a,.widget-container input,.widget-container textarea,.widget-container select,.widget-container button { font-size: <?php echo esc_attr($ux_sidebar_widget_content_font_size); ?>;}
<?php }

//Sidebar width
$ux_sidebar_sidebar_width = ux_get_option('theme_option_layout_menubar_size');
if($ux_sidebar_sidebar_width){
	$ux_sidebar_sidebar_width_p = $ux_sidebar_sidebar_width - 1; 
	$ux_sidebar_sidebar_width_new = $ux_sidebar_sidebar_width * 1.4125; ?>

.navi-side.with-page-cover.scrolled:not(.ux-mobile) #wrap,
.navi-side:not(.ux-mobile) #wrap,
.navi-side:not(.ux-mobile) #footer {
	padding-right: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px;
}
.navi-side.navi-left.with-page-cover:not(.ux-mobile) #wrap {
padding-left: 0; padding-right: 0;
}
.navi-side.navi-left.with-page-cover.scrolled:not(.ux-mobile) #wrap,
.navi-side.navi-left:not(.ux-mobile) #wrap,
.navi-side.navi-left:not(.ux-mobile) #footer {
	padding-right: 0; padding-left: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px;
}
.navi-side.with-page-cover:not(.ux-mobile) #header {
	-webkit-perspective-origin: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px 50%;
	-moz-perspective-origin: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px 50%;
	perspective-origin: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px 50%;
}
.logo-cover,
.nav-container,
.navi-side .head-meta,
.logo-cover,
.navi-side:not(.ux-mobile) #header,
#nav-side-top, #nav-side-bottom, #nav-side-middle,
#nav-side,
#nav-side-content,
.nav-side-content,
.nav-side-child,
.nav-side-child-content,
.nav-side-fold,
.nav-side-fold-content {
   width: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px; 
}
.navi-side.with-page-cover:not(.ux-mobile) #header {
  -webkit-perspective-origin: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px 50%;
     -moz-perspective-origin: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px 50%;
          perspective-origin: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px 50%;
}
#nav-side-top,#nav-side-bottom,#nav-side-top .nav-side-child-content,#nav-side-top .nav-side-fold-content,#nav-side-bottom .nav-side-child-content,#nav-side-bottom .nav-side-fold-content {
	height: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px; 
}
#nav-side-middle {
	top: <?php echo esc_attr($ux_sidebar_sidebar_width_p); ?>px; bottom: <?php echo esc_attr($ux_sidebar_sidebar_width_p); ?>px;
}
#nav-side-middle .nav-side-content {
    top: -<?php echo esc_attr($ux_sidebar_sidebar_width_p); ?>px;
}
#nav-side-top .nav-side-fold-content .nav-side-content {
	right: -<?php echo esc_attr($ux_sidebar_sidebar_width); ?>px;
}
.navi-side.navi-left #nav-side-top .nav-side-fold-content .nav-side-content,
body:not(.ux-mobile) #back-top {
	right: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px;
}
.navi-side.with-page-cover.scrolled:not(.ux-mobile) #wrap,
.navi-side:not(.ux-mobile) #wrap,
.navi-side:not(.ux-mobile) #footer {
	padding-right: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px;
}
.touch .navi-side.navi-left.with-page-cover:not(.ux-mobile) #wrap,
.no-touch .navi-side.navi-left.with-page-cover.scrolled:not(.ux-mobile) #wrap,
.navi-side.navi-left:not(.ux-mobile) #wrap,
.navi-side.navi-left:not(.ux-mobile) #footer {
  padding-right: 0; padding-left: <?php echo esc_attr($ux_sidebar_sidebar_width); ?>px;
}
#nav-side-top .nav-side-child,#nav-side-top .nav-side-fold,#nav-side-bottom .nav-side-child,#nav-side-bottom .nav-side-fold {
	height: <?php echo esc_attr($ux_sidebar_sidebar_width_new); ?>px; 
}

<?php }

//Global  

//Custom css
$ux_custom_css = ux_get_option('theme_option_custom_css');
if($ux_custom_css){ 
	echo balanceTags(stripslashes($ux_custom_css));
}
?>