<?php get_header(); ?>

	<div id="content">

		<?php while(have_posts()){ the_post(); ?>
        
            <?php //** Do Hook Single summary
			do_action('ux_interface_single_summary'); ?>
            
            
			<?php //** Do Hook Single before
            /**
             * @hooked  ux_interface_single_content_before 10
             */
            do_action('ux_interface_single_content_before'); ?>
            
            <div id="content_wrap" <?php ux_interface_content_class(); ?>>
                
                <?php //** Do Hook Single Article before
				do_action('ux_interface_single_article_before'); ?>
                
                
                <article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
                
                    <?php //** Do Hook Single Article Inn before
					do_action('ux_interface_single_article_inn_before'); 
                    
                    $showmeta_single = ux_get_option('theme_option_enable_meta_post_page');
                    $article_inn_class = $showmeta_single ? ' span9' : false;
                    
                    ?>
                    
                    
                    <div class="row-fluid">
                        
                        <?php if($showmeta_single) { ?>
                        <div class="article-meta span3"><?php ux_get_template_part('single/content', 'meta'); ?></div>
                        <?php } ?>

                        <div class="article-inn <?php echo sanitize_html_class($article_inn_class); ?>">
                    
							<?php //** Do Hook Page content
                            /**
                             * @hooked  ux_interface_single_content - 10
                             * @hooked  ux_interface_pagebuilder - 15
                             * @hooked  ux_interface_social_bar - 20
                             * @hooked  ux_interface_single_author - 27
                             * @hooked  ux_interface_single_comment - 30
                             * @hooked  ux_interface_single_navi - 35
                             */
                            do_action('ux_interface_single_content'); ?>
                        
                        </div>
                    
                    </div>
                    
                </article><!--end article-->
                
                 <?php //** Do Hook Single Article after
				do_action('ux_interface_single_article_after'); ?>

            </div><!--End content_wrap-->

            <?php //** Do Hook Sidebar Widget
            /**
             * @hooked  ux_interface_sidebar_widget - 10
             */
            do_action('ux_interface_sidebar_widget'); ?>
                
            <?php //** Do Hook Single after
            /**
             * @hooked  ux_interface_single_content_after 10
			 * @hooked  ux_interface_single_related - 11
             */
            do_action('ux_interface_single_content_after'); ?>
        
        <?php } ?>
    
    </div><!--End content-->
	
<?php get_footer(); ?>