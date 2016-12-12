<aside id="header">

    <?php
	$menubar = ux_get_option('theme_option_layout_menubar');
	$page_template = ux_get_post_meta(get_the_ID(), 'theme_meta_page_template');
	
	$header_main_style = false;
	if($menubar != 'menubar-on-head'){
		if($page_template == 'hiding-side-menubar'){
			$header_main_style = 'background-color: transparent;';
		}
	} ?>
    
    <div id="header-main" style=" <?php echo esc_attr($header_main_style); ?>">
        
        <div id="nav-side-content">
        
            <div class="nav-container">
    
                <?php if(is_single()){ ?>
                    <div id="title-hidden"><h1 class="title-hidden-tit"><?php the_title(); ?></h1></div>
                <?php } ?>
                
                <span id="navi-trigger"><span class="navi-trigger-inn"></span></span>
    
                <div class="navi-logo">
    
                    <div class="logo-wrap">
                        <?php //** Function Logo for header
                        ux_interface_logo('header');
                        ux_interface_logo('mobile'); ?>
                    </div><!--End logo wrap-->
                     
                </div><!--End navi-logo-->
    
                <div class="navi-main">
    
                    <nav id="navi">
                        <?php wp_nav_menu(array(
                            'theme_location'  => 'primary',
                            'container_id' => 'navi_wrap',
                            'items_wrap' => '<ul class="%2$s clearfix">%3$s</ul>'
                        )); ?><!--End #navi_wrap-->
                        
                        <?php
                        $enable_wpml = ux_get_option('theme_option_enable_WPML');
                        if($enable_wpml){
                            ux_interface_language_flags(); 
                        } ?>
                    </nav>
    
                    <?php
                    $enable_search_button = ux_get_option('theme_option_enable_search_button'); 
                    if($enable_search_button || class_exists('Woocommerce')){ ?>
                    <div class="head-meta">
						<?php //** //** Do Hook Hook Woocommerce Cart
                        do_action('ux_interface_wc_cart'); 
                        ?>
                        <div id="search-top-btn" class="search-top-btn-class"><span class="fa fa-search"></span></div>
                    </div>
                    <?php
                    } ?>
    
                </div><!--End navi-main--> 
    
            </div><!--End container-->
        
        </div>
        
        <?php if($menubar != 'menubar-on-head'){
			if($page_template == 'hiding-side-menubar'){ ?>
                <div id="nav-side-middle">
                    <div class="nav-side-child">
                        <div class="nav-side-child-content">
                            <div class="nav-side-content">
                            </div>
                            <div class="nav-side-shading"></div>
                        </div>
                    </div>
                </div>
                <div id="nav-side-top">
                    <div class="nav-side-child">
                        <div class="nav-side-child-content">
                            <div class="nav-side-content">
                            </div>
                            <div class="nav-side-shading"></div>
                        </div>
                    </div>
                    <div class="nav-side-fold">
                        <div class="nav-side-fold-content">
                            <div class="nav-side-content">
                            </div>
                            <div class="nav-side-shading"></div>
                        </div>
                    </div>
                </div>
                <div id="nav-side-bottom">
                    <div class="nav-side-child">
                        <div class="nav-side-child-content">
                            <div class="nav-side-content">
                            </div>
                            <div class="nav-side-shading"></div>
                        </div>
                    </div>
                    <div class="nav-side-fold">
                        <div class="nav-side-fold-content">
                            <div class="nav-side-content">
                            </div>
                            <div class="nav-side-shading"></div>
                        </div>
                    </div>
                </div>
			<?php
			}
		} ?>


    </div><!--End header main-->



</aside>