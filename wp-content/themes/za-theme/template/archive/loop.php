<?php if(have_posts()){ ?>
	
	<div class="main-list archive-list cleafix col2">
	                					 
        <div class="main-list-inn cleafix" style="" >
        
			<?php while(have_posts()){ the_post(); 
			
				//** Post format
				$get_post_format = (!get_post_format()) ? 'standard' : get_post_format();
				
				//** Template Archive loop item
				ux_get_template_part('archive/loop-item', $get_post_format);
				
			}
			
			//** Do Hook Archive Pagination
			/**
			 * @hooked  ux_interface_pagination - 10
			 */
			do_action('ux_interface_archive_pagination', '', 3, 'pagenums'); ?>
			
        </div>

    </div>
    
<?php }else{ ?>

    <div class="archive-nopost container"><?php esc_html_e('Sorry, no articles','ux');?> </div> 
    
<?php } ?>