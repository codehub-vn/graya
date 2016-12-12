<?php get_header(); ?>
   
    <div id="content">
    
        <?php //** Do Hook Archive before
		do_action('ux_interface_archive_before'); ?>
    
        <div class="row-fluid content_wrap_outer fullwrap-layout">
            <div class="container">
                <div class="fullwrap-layout-inn">
                    <div id="content_wrap">
                        <?php //** Do Hook Archive loop
                        /**
                         * @hooked  ux_interface_archive_loop - 10
                         */
                        do_action('ux_interface_archive_loop'); ?>
                    </div>
                </div>
            </div>
        </div>
    
    </div><!--End content-->
  
<?php get_footer(); ?>