<?php 
$menu_type = ux_get_option('theme_option_layout_menubar_header_type') ? ux_get_option('theme_option_layout_menubar_header_type') : 'menu-folder';
?>

<header id="header">

    <div id="header-main">

        <div class="container">

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

            <?php if($menu_type =='menu-shown') { ?>
            
            <nav class="nav-wrap">
                 <?php wp_nav_menu(array(
                    'theme_location'  => 'primary',
                    'container_id' => 'navi_wrap',
                    'items_wrap' => '<ul class="%2$s clearfix">%3$s</ul>'
                )); ?><!--End #navi_wrap-->
            

            <?php
            $show_social_medias = ux_get_option('theme_option_show_social');
            $social_medias = ux_get_option('theme_option_show_social_medias');
                
            if($show_social_medias && $social_medias && isset($social_medias['icontype'])){
                $icon_type = $social_medias['icontype'];  ?> 
                    <ul class="socialmeida clearfix">                       
                        <?php foreach($icon_type as $num => $type){
                            $icon = $social_medias['icon'][$num];
                            $url = $social_medias['url'][$num];
                            $tip = $social_medias['tip'][$num];
                            $tip_wrap =  $tip ? '<span class="socialmeida-text">'.esc_attr($tip).'</span>' : false;
                            $width = (100 / count($icon_type)). '%';  ?>
                            
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
            <?php } ?>

                <?php
                $enable_search_button = ux_get_option('theme_option_enable_search_button'); 
                if($enable_search_button || class_exists('Woocommerce')){ ?> 
                     
                <div id="search-top-btn" class="header-meta-tit search-top-btn-class"><span class="fa fa-search"></span></div> 
                <?php
                } ?>

                <?php
                $enable_wpml = ux_get_option('theme_option_enable_WPML');
                if($enable_wpml){
                    ux_interface_language_flags(); 
                } ?>

                <?php //** //** Do Hook Hook Woocommerce Cart
                do_action('ux_interface_wc_cart'); 
                ?>

            </nav>

            <?php } ?>

        </div><!--End container-->
        
    </div><!--End header main-->

</header>

<?php if($menu_type =='menu-folder') { ?>

<div id="nav-top-content" class="navi-main">

    <div id="nav-top-content-wrap">

        <div id="nav-top-content-wrap-inn">

            <div  class="container">

                <div class="row-fluid">

                    <nav id="navi" class="span9">
                        <?php wp_nav_menu(array(
                            'theme_location'  => 'primary',
                            'container_id' => 'navi_wrap',
                            'items_wrap' => '<ul class="%2$s clearfix">%3$s</ul>'
                        )); ?><!--End #navi_wrap-->
                    </nav>

                    <div class="header-meta span3">

                        <?php
                        $show_social_medias = ux_get_option('theme_option_show_social');
                        $social_medias = ux_get_option('theme_option_show_social_medias');
                            
                        if($show_social_medias && $social_medias && isset($social_medias['icontype'])){
                            $icon_type = $social_medias['icontype'];  ?>
                            <section class="header-social">
                                <h3 class="header-social-tit header-meta-tit"><?php esc_html_e('Find us on','ux'); ?></h3>
                                <ul class="socialmeida clearfix">                       
                                    <?php foreach($icon_type as $num => $type){
                                        $icon = $social_medias['icon'][$num];
                                        $url = $social_medias['url'][$num];
                                        $tip = $social_medias['tip'][$num];
                                        $tip_wrap =  $tip ? '<span class="socialmeida-text">'.esc_attr($tip).'</span>' : false;
                                        $width = (100 / count($icon_type)). '%';  ?>
                                        
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
                            </section>
                        <?php } ?>

                        <?php
                        $enable_search_button = ux_get_option('theme_option_enable_search_button'); 
                        if($enable_search_button || class_exists('Woocommerce')){ ?> 
                             
                        <div id="search-top-btn" class="header-meta-tit search-top-btn-class"><?php esc_html_e('Search','ux'); ?></div> 
                        <?php
                        } ?>

                        <?php
                        $enable_wpml = ux_get_option('theme_option_enable_WPML');
                        if($enable_wpml){
                            ux_interface_language_flags(); 
                        } ?>

                        <?php //** //** Do Hook Hook Woocommerce Cart
                        do_action('ux_interface_wc_cart'); 
                        ?>

                    </div>

                </div>

            </div>

        </div>

        <div id="mobile-panel-center">
            <div class="mobile-panel-child">
                <div class="mobile-panel-child-content">
                    <div class="mobile-panel-content">
                    </div>
                    <div class="mobile-panel-shading"></div>
                </div>
            </div>
        </div>
        <div id="mobile-panel-left">
            <div class="mobile-panel-child">
                <div class="mobile-panel-child-content">
                    <div class="mobile-panel-content">
                    </div>
                    <div class="mobile-panel-shading"></div>
                </div>
            </div>
            <div class="mobile-panel-fold">
                <div class="mobile-panel-fold-content">
                    <div class="mobile-panel-content">
                    </div>
                    <div class="mobile-panel-shading"></div>
                </div>
            </div>
        </div>
        <div id="mobile-panel-right">
            <div class="mobile-panel-child">
                <div class="mobile-panel-child-content">
                    <div class="mobile-panel-content">
                    </div>
                    <div class="mobile-panel-shading"></div>
                </div>
            </div>
            <div class="mobile-panel-fold">
                <div class="mobile-panel-fold-content">
                    <div class="mobile-panel-content">
                    </div>
                    <div class="mobile-panel-shading"></div>
                </div>
            </div>
        </div>

    </div>

</div><!--End navi-main-->

<?php } ?>