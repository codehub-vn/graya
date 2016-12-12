<?php
/*
Plugin Name: BM Slider
Plugin URI: http://www.uiueux.com/
Description: BM Slider - for ZA theme
Author: Bwsm
Version: 1.0
Text Domain: ux
Domain Path: /languages/
Author URI: http://www.uiueux.com
*/

function bm_theme_register_post_type(){
	$ux_theme_register_post_type = array();

	$ux_theme_register_post_type = apply_filters('ux_theme_register_post_type', $ux_theme_register_post_type);
	
	foreach($ux_theme_register_post_type as $slug => $post_type){
		$labels = array(
			'name'               => $post_type['name'],
			'singular_name'      => $post_type['name'],
			'add_new'            => $post_type['add_new'],
			'add_new_item'       => $post_type['add_new_item'],
			'edit_item'          => $post_type['edit_item'],
			'new_item'           => $post_type['new_item'],
			'all_items'          => $post_type['name'],
			'view_item'          => $post_type['view_item'],
			'search_items'       => $post_type['search_items'],
			'not_found'          => $post_type['not_found'],
			'not_found_in_trash' => $post_type['not_found_in_trash'], 
			'parent_item_colon'  => '',
			'menu_name'          => $post_type['name']
		);
		
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true, 
			'show_in_menu'       => true, 
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $slug ),
			'capability_type'    => 'post',
			'has_archive'        => true, 
			'hierarchical'       => true,
			'menu_position'      => isset($post_type['menu_position']) ? $post_type['menu_position'] : false,
			'menu_icon'          => $post_type['menu_icon'],
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		); 
		
		register_post_type($slug, $args);
		
		if(isset($post_type['remove_support'])){
			foreach($post_type['remove_support'] as $remove_support){
				remove_post_type_support( $slug, $remove_support );
			}
			
		}
		
		if(isset($post_type['cat_slug'])){
			$labels = array(   
				'name' => $post_type['cat_menu_name'], 
				'singular_name' => $post_type['cat_slug'], 
				'menu_name' => $post_type['cat_menu_name'],   
			);  
			
			register_taxonomy(   
				$post_type['cat_slug'],   
				array($slug),   
				array(   
					'hierarchical' => true,   
					'labels' => $labels,   
					'show_ui' => true,   
					'query_var' => true,   
					'rewrite' => array( 'slug' => $post_type['cat_slug'] ),   
				)   
			); 
		}
	}
	
	return $ux_theme_register_post_type;

}
add_action('init', 'bm_theme_register_post_type');

//theme register bmslider
function ux_theme_register_bmslider($register){
	$register['bmslider'] = array(
		'name' => __('BM Slider','ux'),
		'meta' => false,
		'add_new' => __('Add New','ux'),
		'add_new_item' => __('Add New Slider','ux'),
		'edit_item' => __('Edit Slider','ux'),
		'new_item' => __('New Slider','ux'),
		'view_item' => __('View Slider','ux'),
		'not_found' => __('No Slider found.','ux'),
		'not_found_in_trash' => __('No Slider found in Trash.','ux'),
		'search_items' => __('Search Slider','ux'),
		'columns' => array(
			'column_category' => __('Categories','ux')
		),
		'menu_position' => 100,
		'menu_icon' => untrailingslashit( plugins_url( '', __FILE__ ) ).'/images/bmslider.png',
		'enter_title' => __('Type your slider name here','ux'),
		'remove_support' => array('editor', 'thumbnail'),
		'sample_permalink' => false
	);
	
	return $register;
}
add_filter('ux_theme_register_post_type', 'ux_theme_register_bmslider');

//theme bmslider select fields
function theme_bmslider_select_fields($fields){
	$fields['theme_bmslider_type'] = array(
		array('title' => __('Standard Slide', 'ux'), 'value' => 'standard')
		//array('title' => __('Auto Width Slide', 'ux'), 'value' => 'auto_width')
	);

	$fields['theme_bmslider_autoplay'] = array(
		array('title' => __('Yes', 'ux'), 'value' => 'autoplay'),
		array('title' => __('No', 'ux'), 'value' => 'noautoplay')
	);
	
	$fields['theme_bmslider_orderby'] = array(
		array('title' => __('Please Select','ux'),                         'value' => 'none'),
		array('title' => __('Title','ux'),                                 'value' => 'title'),
		array('title' => __('Date','ux'),                                  'value' => 'date'),
		array('title' => __('ID','ux'),                                    'value' => 'id'),
		array('title' => __('Modified','ux'),                              'value' => 'modified'),
		array('title' => __('Author','ux'),                                'value' => 'author'),
		array('title' => __('Comment count','ux'),                         'value' => 'comment_count')
	);
	
	return $fields;
}
add_filter('theme_config_select_fields', 'theme_bmslider_select_fields');

//theme bmslider mask color
function theme_bmslider_mask_color(){
	$color = '#FF5533';
	
	$highlight_color = ux_get_option('theme_option_color_theme_main');
	if($highlight_color){
		$color = $highlight_color;
	}
	
	return $color;
}

//theme bmslider meta
function ux_theme_bmslider_meta($meta){
	$meta['bmslider'] = array(
		array(
			'id' => 'slider-settings',
			'title' => __('Slider Settings','ux'),
			'section' => array(
				array(
					'item' => array(
						//** Slider Type
						array('title' => __('Slider Type','ux'),
							  'type' => 'select',
							  'default' => 'standard',
							  'name' => 'theme_bmslider_type',
							  'col_size' => 'width:200px;'),


							  
						//** Image Height
						array('title' => __('Auto Play','ux'),
						 	  'type' => 'select',
						 	  'default' => 'noautoplay',
						 	  'name' => 'theme_bmslider_autoplay'),
							  
						//** Category
						array('title' => __('Category','ux'),
							  'type' => 'category-multiple',
							  'default' => 0,
							  'name' => 'theme_bmslider_category'),
								  
						// Select Category Order
						array('title'       => __('Order','ux'),
							  'description' => '',
							  'type'        => 'orderby',
							  'name'        => 'theme_bmslider_orderby',
							  'default'     => 'date',
							  'col_size'    => 'width:50%;'),
							  
						//** Number to List
						array('title' => __('Number to List','ux'),
							  'type' => 'text',
							  'default' => 8,
							  'name' => 'theme_bmslider_number')
					)
				)
			)
		)
	);
	
	return $meta;
}
add_filter('ux_theme_post_meta_fields', 'ux_theme_bmslider_meta');

//theme bmslider interface
function ux_theme_bmslider_interface($action){
	$meta = ux_theme_bmslider_meta($meta = array());
	$get_option = get_post_meta(get_the_ID(), 'ux_theme_meta', true);
	$select_fields = ux_theme_options_config_select_fields();
	
	foreach($meta['bmslider'] as $option){
		if($option['id'] == $action){
			if(isset($option['section'])){
				foreach($option['section'] as $section){
					$section_count = isset($get_option['theme_bmslider_slide']) ? count($get_option['theme_bmslider_slide']) : 1; ?>
					<?php $count_i = 0;
					for($count_i; $count_i < (int) $section_count; $count_i++){ ?>
                        <div class="theme-option-item theme-option-item-bmslide theme-option-item-do-action">
                            <h4 class="theme-option-item-heading" section-id="<?php echo $section['id']; ?>">
                                <?php if(isset($section['title'])){
									echo '<span>' . $section['title'] . '</span>';
								}
								
								$bmslideradd_hidden = $count_i == 0 ? false : 'hidden';
								$bmsliderremove_hidden = $count_i != 0 ? false : 'hidden'; ?>
                                
                                <button type="button" class="btn btn-info btn-xs bmslider-add <?php echo $bmslideradd_hidden; ?>"><span class="glyphicon glyphicon-plus"></span></button>
                                <button type="button" class="btn btn-danger btn-xs bmslider-remove <?php echo $bmsliderremove_hidden; ?>"><span class="glyphicon glyphicon-remove"></span></button>
                            </h4>
                            <div class="theme-option-item-body">
                                <?php if(isset($section['item'])){
                                    foreach($section['item'] as $item){
                                        $name = isset($item['name']) ? $item['name'] : false;
                                        $default = isset($item['default']) ? $item['default'] : false;
                                        $title = isset($item['title']) ? $item['title'] : false;
                                        $col_size = isset($item['col_size']) ? $item['col_size'] : false;
										$control = isset($item['control']) ? 'data-name="' . $item['control']['name'] . '" data-value="' . $item['control']['value'] . '"' : false; 
                                        
										$get_value = $get_option ? $get_option[$name][(int) $count_i] : $default;
										
										switch($item['type']){
											case 'bmslide':
												if($get_value){
													foreach($get_value as $slide_i => $slide){ ?>
														<div class="row ux-bmslider-slide-item">
                                                            <div class="col-xs-10">
                                                                <select class="form-control input-sm ux-bmslider-slide-type">
                                                                    <option value="image" <?php selected($slide['type'], 'image'); ?>><?php _e('Image', 'ux'); ?></option>
                                                                    <option value="text" <?php selected($slide['type'], 'text'); ?>><?php _e('Text', 'ux'); ?></option>
                                                                    <option value="button" <?php selected($slide['type'], 'button'); ?>><?php _e('Button', 'ux'); ?></option>
                                                                    <option value="divider" <?php selected($slide['type'], 'divider'); ?>><?php _e('Divider', 'ux'); ?></option>
                                                                    <option value="textblur" <?php selected($slide['type'], 'textblur'); ?>><?php _e('Blur Text', 'ux'); ?></option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xs-2">
                                                            
																<?php if($slide_i == 0){ ?>
                                                                    <button type="button" class="btn btn-info btn-sm ux-bmslider-slide-field-add"><span class="glyphicon glyphicon-plus"></span></button>
                                                                <?php }else{ ?>
                                                                    <button type="button" class="btn btn-danger btn-sm ux-bmslider-slide-field-remove"><span class="glyphicon glyphicon-remove"></span></button>
                                                                <?php } ?>
                                                                <span class="spinner"></span>
                                                            
                                                            </div>
                                                            
                                                            <div class="col-xs-10 ux-bmslider-field-type">
                                                            
                                                                <?php switch($slide['type']){
																	case 'image': ?>
                                                                    
                                                                        <div class="row theme-option-topspacer">
                                                                            <div class="col-xs-12">
                                                                                <div class="input-group theme-option-upload">
                                                                                    <input type="text" class="form-control input-sm ux-bmslider-slide-image-value" name="ux-bmslider-slide-image-value" value="<?php echo $slide['image-value']; ?>" />
                                                                                    <span class="input-group-btn">
                                                                                        <button class="btn btn-default ux-theme-upload-image btn-sm" type="button" data-toggle="modal" data-target="#ux-theme-modal" data-title="<?php _e('Upload Image', 'ux'); ?>"><?php _e('Upload', 'ux'); ?></button>
                                                                                        <button class="btn btn-danger ux-theme-remove-image btn-sm" type="button"><?php _e('Remove', 'ux'); ?></button>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>                                 
                                                                                                                    
                                                                    <?php
                                                                    break;
                                                                    
                                                                    case 'text': ?>
                                                                    
                                                                        <div class="row theme-option-topspacer">
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control input-sm ux-bmslider-slide-text-value" placeholder="<?php _e('Enter your text here', 'ux'); ?>" value="<?php echo htmlspecialchars($slide['text-value'], ENT_QUOTES); ?>" />
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <select class="form-control input-sm ux-bmslider-slide-text-type">
                                                                                    <option value="h1" <?php selected($slide['text-type'], 'h1'); ?>><?php _e('Heading 1', 'ux'); ?></option>
                                                                                    <option value="h2" <?php selected($slide['text-type'], 'h2'); ?>><?php _e('Heading 2', 'ux'); ?></option>
                                                                                    <option value="h3" <?php selected($slide['text-type'], 'h3'); ?>><?php _e('Heading 3', 'ux'); ?></option>
                                                                                    <option value="h4" <?php selected($slide['text-type'], 'h4'); ?>><?php _e('Heading 4', 'ux'); ?></option>
                                                                                    <option value="h5" <?php selected($slide['text-type'], 'h5'); ?>><?php _e('Heading 5', 'ux'); ?></option>
                                                                                    <option value="h6" <?php selected($slide['text-type'], 'h6'); ?>><?php _e('Heading 6', 'ux'); ?></option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <select class="form-control input-sm ux-bmslider-slide-text-style">
                                                                                    <option value="decoration" <?php selected($slide['text-style'], 'decoration'); ?>><?php _e('Decoration', 'ux'); ?></option>
                                                                                    <option value="line-both-sides" <?php selected($slide['text-style'], 'line-both-sides'); ?>><?php _e('Line on Both Sides', 'ux'); ?></option>
                                                                                    <option value="line-under-over" <?php selected($slide['text-style'], 'line-under-over'); ?>><?php _e('Underline & Overline', 'ux'); ?></option>
                                                                                    <option value="line-border" <?php selected($slide['text-style'], 'line-border'); ?>><?php _e('Border', 'ux'); ?></option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                         <?php
                                                                    break;
                                                                    
                                                                    case 'textblur': ?>
                                                                    
                                                                        <div class="row theme-option-topspacer">
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control input-sm ux-bmslider-slide-textblur-value" placeholder="<?php _e('Enter your text here', 'ux'); ?>" value="<?php echo htmlspecialchars($slide['textblur-value'], ENT_QUOTES); ?>" />
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <select class="form-control input-sm ux-bmslider-slide-textblur-type">
                                                                                    <option value="h1" <?php selected($slide['textblur-type'], 'h1'); ?>><?php _e('Heading 1', 'ux'); ?></option>
                                                                                    <option value="h2" <?php selected($slide['textblur-type'], 'h2'); ?>><?php _e('Heading 2', 'ux'); ?></option>
                                                                                    <option value="h3" <?php selected($slide['textblur-type'], 'h3'); ?>><?php _e('Heading 3', 'ux'); ?></option>
                                                                                    <option value="h4" <?php selected($slide['textblur-type'], 'h4'); ?>><?php _e('Heading 4', 'ux'); ?></option>
                                                                                    <option value="h5" <?php selected($slide['textblur-type'], 'h5'); ?>><?php _e('Heading 5', 'ux'); ?></option>
                                                                                    <option value="h6" <?php selected($slide['textblur-type'], 'h6'); ?>><?php _e('Heading 6', 'ux'); ?></option>
                                                                                </select>
                                                                            </div>
                                                                           
                                                                        </div>

                                                                    <?php
                                                                    break;
                                                                    
                                                                    
                                                                    case 'button': ?>
                                                                    
                                                                        <div class="row theme-option-topspacer">
                                                                            <div class="col-sm-3">
                                                                                <input type="text" class="form-control input-sm ux-bmslider-slide-button-text" placeholder="<?php _e('Text', 'ux'); ?>" value="<?php echo htmlspecialchars($slide['button-text'], ENT_QUOTES); ?>" />
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control input-sm ux-bmslider-slide-button-url" placeholder="<?php _e('URL', 'ux'); ?>" value="<?php echo htmlspecialchars($slide['button-url'], ENT_QUOTES); ?>" />
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <select class="form-control input-sm ux-bmslider-slide-button-size">
                                                                                    <option value="button-large" <?php selected($slide['button-size'], 'button-large'); ?>><?php _e('Large', 'ux'); ?></option>
                                                                                    <option value="button-medium" <?php selected($slide['button-size'], 'button-medium'); ?>><?php _e('Medium', 'ux'); ?></option>
                                                                                    <option value="button-small" <?php selected($slide['button-size'], 'button-small'); ?>><?php _e('Small', 'ux'); ?></option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    break;
																} ?>
                                                                
                                                            </div>
                                                        </div>
													<?php
                                                    }
												}else{ ?>
                                                    <div class="row ux-bmslider-slide-item">
                                                        <div class="col-xs-10">
                                                            <select class="form-control input-sm ux-bmslider-slide-type">
                                                                <option value="image"><?php _e('Image', 'ux'); ?></option>
                                                                <option value="text"><?php _e('Text', 'ux'); ?></option>
                                                                <option value="button"><?php _e('Button', 'ux'); ?></option>
                                                                <option value="divider"><?php _e('Divider', 'ux'); ?></option>
                                                                <option value="textblur"><?php _e('Blur Text', 'ux'); ?></option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-2"><button type="button" class="btn btn-info btn-sm ux-bmslider-slide-field-add"><span class="glyphicon glyphicon-plus"></span></button><span class="spinner"></span></div>
                                                        
                                                        <div class="col-xs-10 ux-bmslider-field-type">
                                                            <div class="row theme-option-topspacer">
                                                                <div class="col-xs-12">
                                                                    <div class="input-group theme-option-upload">
                                                                        <input type="text" class="form-control input-sm ux-bmslider-slide-image-value" name="ux-bmslider-slide-image-value" value="" />
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default ux-theme-upload-image btn-sm" type="button" data-toggle="modal" data-target="#ux-theme-modal" data-title="<?php _e('Upload Image', 'ux'); ?>"><?php _e('Upload', 'ux'); ?></button>
                                                                            <button class="btn btn-danger ux-theme-remove-image btn-sm" type="button"><?php _e('Remove', 'ux'); ?></button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                <?php
												}
											break;
										}
                                    }
                                } ?>
                            </div>
                        </div>
					<?php
					}
				}
			}
		}
	} ?>
    <script type="text/javascript">
		jQuery(document).ready(function(){
			function ux_theme_bmslider_add_field(_this, _this_target, _first){
				jQuery.post(ajaxurl, {
					'action': 'ux_theme_bmslider_add_field',
					'first': _first
				}).done(function(content){
					var _content = jQuery(content);
					var _content_add_field = _content.find('.ux-bmslider-slide-field-add');
					var _content_remove_field = _content.find('.ux-bmslider-slide-field-remove');
					var _content_select_type = _content.find('.ux-bmslider-slide-type');
					var _content_upload_image = _content.find('.theme-option-upload');
				
					_this_target.append(_content);
					_this.next('.spinner').fadeOut();
					
					_content_add_field.click(function(){
						var _this_add = jQuery(this);
						var _this_add_parent = _this_add.parents('.ux-bmslider-slide-item');
						var _this_add_target = _this_add_parent.parent();
						
						_this_add.next('.spinner').show();
						ux_theme_bmslider_add_field(_this_add, _this_add_target, 'nofirst');
					});
					
					ux_theme_bmslider_change_field(_content_select_type);
					ux_theme_bmslider_remove_field(_content_remove_field);
					
					ux_theme_bmslider_upload(_content_upload_image);
				});
			}
			
			function ux_theme_bmslider_remove_field(el){
				el.click(function(){
					var _this = jQuery(this);
					var _this_parent = _this.parents('.ux-bmslider-slide-item');
					
					_this_parent.find('.spinner').show();
					
					_this_parent.fadeOut(300, function(){
						_this_parent.remove();
					});
				});
			}
			
			function ux_theme_bmslider_change_field(el){
				el.change(function(){
					var _this = jQuery(this);
					var _this_parent = _this.parents('.ux-bmslider-slide-item');
					var _this_target = _this_parent.find('.ux-bmslider-field-type');
					
					_this_parent.find('.spinner').show();
					
					jQuery.post(ajaxurl, {
						'action': 'ux_theme_bmslider_change_field',
						'type': _this.val()
					}).done(function(content){
						var _content = jQuery(content);
						var _content_upload_image = _content.find('.theme-option-upload');
						
						_this_target.html(_content);
						_this_parent.find('.spinner').fadeOut();
						ux_theme_bmslider_upload(_content_upload_image);
					});
				});
			}
			
			function ux_theme_bmslider_upload(el){
				var _this = el;
				var _this_input = _this.find('[name]');
				
				_this.delegate('.ux-theme-upload-image', 'click', function(){
					var _this_title = jQuery(this).data('title');
					
					jQuery('#ux-theme-modal-body').height(400).html('<iframe width="100%" height="100%" frameborder="0" src="media-upload.php?type=image"></iframe>');
					jQuery('#ux-theme-modal-title').text(_this_title);
					jQuery('#ux-theme-modal .modal-footer').hide();
					
					window.original_send_to_editor = window.send_to_editor;
					window.send_to_editor = function(html){
				
						if(_this_input){
							fileurl = jQuery('img',html).attr('src');
							_this_input.val(fileurl);
						}else{
							window.original_send_to_editor(html);
						}
						
						jQuery('#ux-theme-modal').modal('hide');
					}
				});
				
				_this.delegate('.ux-theme-remove-image', 'click', function(){
					_this_input.val('');
				});
			}
			
			var _bmslider_slide = jQuery('.ux-bmslider-slide-item');
			if(_bmslider_slide.length){
				_bmslider_slide.each(function(index, element){
                    var _this = jQuery(this);
					var _this_add_field = _this.find('.ux-bmslider-slide-field-add');
					var _this_remove_field = _this.find('.ux-bmslider-slide-field-remove');
					var _this_select_type = _this.find('.ux-bmslider-slide-type');
					
					_this_add_field.click(function(){
						var _this_add = jQuery(this);
						var _this_add_parent = _this_add.parents('.ux-bmslider-slide-item');
						var _this_add_target = _this_add_parent.parent();
						
						_this_add.next('.spinner').show();
						ux_theme_bmslider_add_field(_this_add, _this_add_target, 'nofirst');
					});
					
					ux_theme_bmslider_remove_field(_this_remove_field);
					ux_theme_bmslider_change_field(_this_select_type);
                });
			}
			
			jQuery('.ux-theme-meta-box [section-id]').each(function(index, element) {
				var _this = jQuery(this);
				var _this_add = _this.find('.bmslider-add');
				var _this_remove = _this.find('.bmslider-remove');
				var _this_parent = _this.parent('.theme-option-item');
				var _this_last, _this_clone, _this_checkbox;
				
				_this_add.bind('click', function(){
					_this_last = jQuery('.ux-theme-meta-box [section-id]:last').parent('.theme-option-item');
					_this_clone = _this_last.clone();
					_this_last.after(_this_clone);
					_this_clone.find('.theme-option-item-body').html('');
					ux_theme_bmslider_add_field(_this_clone, _this_clone.find('.theme-option-item-body'), 'first');
					_this_clone.find('.bmslider-add').hide();
					_this_clone.find('.bmslider-remove').removeClass('hidden').show().click(function(){
						jQuery(this).parents('.theme-option-item').fadeOut(function(){
							jQuery(this).remove();
						});
					});
				});
				
				if(index == 0){
					_this_remove.hide();
				}else{
					_this_remove.click(function(){
						jQuery(this).parents('.theme-option-item').slideUp(function(){
							jQuery(this).remove();
						});
					});
				}
			});
			
			jQuery('form#post').bind('submit', function(){
				ux_theme_bmslider_field_val();
			});
			
			function ux_theme_bmslider_field_val(){
				jQuery('.theme-option-item-bmslide').each(function(_bmslide_index){
                    var _bmslide = jQuery(this);
					var _bmslide_item = _bmslide.find('.ux-bmslider-slide-item');
					
					if(_bmslide_item.length){
						_bmslide_item.each(function(_slide_index, element){
							var _this = jQuery(this);
							var _slide_type = _this.find('.ux-bmslider-slide-type');
							if(_slide_type){
								_slide_type.attr('name', 'ux_theme_meta[theme_bmslider_slide]['+_bmslide_index+']['+_slide_index+'][type]');
							}
							
							//image
							var _slide_image = _this.find('.ux-bmslider-slide-image-value');
							if(_slide_image){
								_slide_image.attr('name', 'ux_theme_meta[theme_bmslider_slide]['+_bmslide_index+']['+_slide_index+'][image-value]');
							}
							
							//text
                            var _slide_text = _this.find('.ux-bmslider-slide-text-value');
                            var _slide_text_type = _this.find('.ux-bmslider-slide-text-type');
                            var _slide_text_style = _this.find('.ux-bmslider-slide-text-style');
							if(_slide_text){
								_slide_text.attr('name', 'ux_theme_meta[theme_bmslider_slide]['+_bmslide_index+']['+_slide_index+'][text-value]');
							}
							if(_slide_text_type){
								_slide_text_type.attr('name', 'ux_theme_meta[theme_bmslider_slide]['+_bmslide_index+']['+_slide_index+'][text-type]');
							}
							if(_slide_text_style){
								_slide_text_style.attr('name', 'ux_theme_meta[theme_bmslider_slide]['+_bmslide_index+']['+_slide_index+'][text-style]');
							}

							//BLUR
                            var _slide_textblur = _this.find('.ux-bmslider-slide-textblur-value');
                            var _slide_textblur_type = _this.find('.ux-bmslider-slide-textblur-type');
                            
							if(_slide_textblur){
								_slide_textblur.attr('name', 'ux_theme_meta[theme_bmslider_slide]['+_bmslide_index+']['+_slide_index+'][textblur-value]');
							}
							if(_slide_textblur_type){
								_slide_textblur_type.attr('name', 'ux_theme_meta[theme_bmslider_slide]['+_bmslide_index+']['+_slide_index+'][textblur-type]');
							}
	
							
							//button
                            var _slide_button_text = _this.find('.ux-bmslider-slide-button-text');
                            var _slide_button_url = _this.find('.ux-bmslider-slide-button-url');
                            var _slide_button_size = _this.find('.ux-bmslider-slide-button-size');
							if(_slide_button_text){
								_slide_button_text.attr('name', 'ux_theme_meta[theme_bmslider_slide]['+_bmslide_index+']['+_slide_index+'][button-text]');
							}
							if(_slide_button_url){
								_slide_button_url.attr('name', 'ux_theme_meta[theme_bmslider_slide]['+_bmslide_index+']['+_slide_index+'][button-url]');
							}
							if(_slide_button_size){
								_slide_button_size.attr('name', 'ux_theme_meta[theme_bmslider_slide]['+_bmslide_index+']['+_slide_index+'][button-size]');
							}
                        });
					}
					
                });
			}
		});
	</script>
<?php
} //end function
add_action('ux-theme-post-meta-interface', 'ux_theme_bmslider_interface');

//theme bmslider
function ux_theme_bmslider($bmslider){
	$bmslider_type = ux_get_post_meta($bmslider, 'theme_bmslider_type');
	$bmslider_auto = ux_get_post_meta($bmslider, 'theme_bmslider_autoplay');
	$bmslider_height = ux_get_post_meta($bmslider, 'theme_bmslider_image_height');
	$bmslider_category = ux_get_post_meta($bmslider, 'theme_bmslider_category');
	$bmslider_orderby = ux_get_post_meta($bmslider, 'theme_bmslider_orderby');
	$bmslider_order = ux_get_post_meta($bmslider, 'theme_meta_order');
	$bmslider_number = ux_get_post_meta($bmslider, 'theme_bmslider_number');
	
	$bmslider_category = ux_theme_exclude_category($bmslider_category);
	
	$per_page = $bmslider_number ? $bmslider_number : 3;
	
	if($bmslider){
		$topslider_class = $bmslider_type == 'auto_width' ? false : false;
		$bmslider_auto_attr = $bmslider_auto == 'autoplay' ? 'true' : 'false';
		$autowidth = $bmslider_type == 'auto_width' ? 'true' : 'false';
		$margin = $bmslider_type == 'auto_width' ? '0' : '0';
		$center = $bmslider_type == 'auto_width' ? 'true' : 'false';
		$item = $bmslider_type == 'auto_width' ? $bmslider_number : '1';
		
		$get_posts = get_posts(array(
			'posts_per_page' => $per_page,
			'category__in' => $bmslider_category,
			'orderby' => $bmslider_orderby,
			'order' => $bmslider_order,
		));
		
		if($get_posts){
			global $post;
			
			if($bmslider_type == 'auto_width'){
				$owl_stage_outer = intval($bmslider_height) + 100; 
				$owl_next = - (intval($bmslider_height)/2 + 125); ?>
				
			<?php }else{
				$owl_next = - (intval($bmslider_height)/2 + 35); ?>
				
				
			<?php } ?>
	
			<div class="topslider fullscreen-wrap <?php echo sanitize_html_class($topslider_class); ?>">
				<span id="topslider-triggle" class="fa fa-play"></span>
				<div class="owl-carousel" data-auto="<?php echo esc_attr($bmslider_auto_attr); ?>" data-item="<?php echo esc_attr($item); ?>" data-center="<?php echo esc_attr($center); ?>" data-margin="<?php echo esc_attr($margin); ?>" data-autowidth="<?php echo esc_attr($autowidth); ?>" data-slideby="1">

					<?php foreach($get_posts as $post){ setup_postdata($post);
						if($bmslider_type == 'auto_width'){ ?>
							<section class="item">
								<div class="carousel-img-wrap">
									<?php if(has_post_thumbnail()){ ?>
										<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="carousel-img-a"><?php echo get_the_post_thumbnail(get_the_ID(), array(500,320)); ?></a>
									<?php  } ?>
								</div>
								<div class="carousel-des-wrap">
									<div class="carousel-des-wrap-inn">
										<div class="centered-ux">
											<h2 class="carousel-des-wrap-tit"><a class="carousel-des-wrap-tit-a" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<span class="carousel-des-wrap-meta"><?php /** Do Hook Archive UX the category */ do_action('ux_interface_loop_the_category', ' '); ?></span>

										</div>
									</div>
								</div>
							</section>
						<?php }else{
							if(has_post_thumbnail()){
								$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
								$style = 'background-image:url(' .$thumbnail[0]. ')';
							}else{
								$style = false;
							} ?>
							<section class="item">
								<div class="carousel-img-wrap fullscreen-wrap" style=" <?php echo esc_attr($style); ?>">
									<div class="carousel-des-wrap-inn">
										<div class="centered-ux">
											<h2 class="carousel-des-wrap-tit"><a class="carousel-des-wrap-tit-a" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<span class="carousel-des-wrap-meta"><?php echo get_the_excerpt(); ?></span>
										</div>
									</div>
								</div>
							</section>
						<?php
						}
					}
					wp_reset_postdata(); ?>
				</div>
			</div>
		
		<?php
		}
	}
}

//theme bmslider add field
function ux_theme_bmslider_add_field(){
	$first = $_POST['first']; ?>
	
	<div class="row ux-bmslider-slide-item">
        <div class="col-xs-10">
            <select class="form-control input-sm ux-bmslider-slide-type">
                <option value="image"><?php _e('Image', 'ux'); ?></option>
                <option value="text"><?php _e('Text', 'ux'); ?></option>
                <option value="button"><?php _e('Button', 'ux'); ?></option>
                <option value="divider"><?php _e('Divider', 'ux'); ?></option>
                <option value="textblur"><?php _e('Blur Text', 'ux'); ?></option>
            </select>
        </div>
        
        <?php if($first == 'first'){ ?>
        
			<div class="col-xs-2"><button type="button" class="btn btn-info btn-sm ux-bmslider-slide-field-add"><span class="glyphicon glyphicon-plus"></span></button><span class="spinner"></span></div>
            
		<?php }else{ ?>
			
            <div class="col-xs-2"><button type="button" class="btn btn-danger btn-sm ux-bmslider-slide-field-remove"><span class="glyphicon glyphicon-remove"></span></button><span class="spinner"></span></div>
		
		<?php } ?>
        
        <div class="col-xs-10 ux-bmslider-field-type">
            <div class="row theme-option-topspacer">
                <div class="col-xs-12">
                    <div class="input-group theme-option-upload">
                        <input type="text" class="form-control input-sm ux-bmslider-slide-image-value" name="ux-bmslider-slide-image-value" value="" />
                        <span class="input-group-btn">
                            <button class="btn btn-default ux-theme-upload-image btn-sm" type="button" data-toggle="modal" data-target="#ux-theme-modal" data-title="<?php _e('Upload Image', 'ux'); ?>"><?php _e('Upload', 'ux'); ?></button>
                            <button class="btn btn-danger ux-theme-remove-image btn-sm" type="button"><?php _e('Remove', 'ux'); ?></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                                
    <?php
	die('');
}
add_action('wp_ajax_ux_theme_bmslider_add_field', 'ux_theme_bmslider_add_field');

//theme bmslider change field
function ux_theme_bmslider_change_field(){
	$type = $_POST['type'];
	
	switch($type){
		case 'image': ?>
        
            <div class="row theme-option-topspacer">
                <div class="col-xs-12">
                    <div class="input-group theme-option-upload">
                        <input type="text" class="form-control input-sm ux-bmslider-slide-image-value" name="ux-bmslider-slide-image-value" value="" />
                        <span class="input-group-btn">
                            <button class="btn btn-default ux-theme-upload-image btn-sm" type="button" data-toggle="modal" data-target="#ux-theme-modal" data-title="<?php _e('Upload Image', 'ux'); ?>"><?php _e('Upload', 'ux'); ?></button>
                            <button class="btn btn-danger ux-theme-remove-image btn-sm" type="button"><?php _e('Remove', 'ux'); ?></button>
                        </span>
                    </div>
                </div>
            </div>                                 
                                                        
        <?php
		break;
		
		case 'text': ?>
        
            <div class="row theme-option-topspacer">
                <div class="col-sm-6">
                    <input type="text" class="form-control input-sm ux-bmslider-slide-text-value" placeholder="<?php _e('Enter your text here', 'ux'); ?>" value="" />
                </div>
                <div class="col-sm-3">
                    <select class="form-control input-sm ux-bmslider-slide-text-type">
                        <option value="h1"><?php _e('Heading 1', 'ux'); ?></option>
                        <option value="h2"><?php _e('Heading 2', 'ux'); ?></option>
                        <option value="h3"><?php _e('Heading 3', 'ux'); ?></option>
                        <option value="h4"><?php _e('Heading 4', 'ux'); ?></option>
                        <option value="h5"><?php _e('Heading 5', 'ux'); ?></option>
                        <option value="h6"><?php _e('Heading 6', 'ux'); ?></option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <select class="form-control input-sm ux-bmslider-slide-text-style">
                        <option value="decoration"><?php _e('Decoration', 'ux'); ?></option>
                        <option value="line-both-sides"><?php _e('Line on Both Sides', 'ux'); ?></option>
                        <option value="line-under-over"><?php _e('Underline & Overline', 'ux'); ?></option>
                        <option value="line-border"><?php _e('Border', 'ux'); ?></option>
                    </select>
                </div>

            </div>
            <small>HTML: &lt;span class=heighlight&gt;Heighlight Text&lt;/span&gt;</small>
            
		<?php
		break;

		case 'textblur': ?>
        
            <div class="row theme-option-topspacer">
                <div class="col-sm-6">
                    <input type="text" class="form-control input-sm ux-bmslider-slide-textblur-value" placeholder="<?php _e('Enter your text here', 'ux'); ?>" value="" />
                </div>
                <div class="col-sm-3">
                    <select class="form-control input-sm ux-bmslider-slide-textblur-type">
                        <option value="h1"><?php _e('Heading 1', 'ux'); ?></option>
                        <option value="h2"><?php _e('Heading 2', 'ux'); ?></option>
                        <option value="h3"><?php _e('Heading 3', 'ux'); ?></option>
                        <option value="h4"><?php _e('Heading 4', 'ux'); ?></option>
                        <option value="h5"><?php _e('Heading 5', 'ux'); ?></option>
                        <option value="h6"><?php _e('Heading 6', 'ux'); ?></option>
                    </select>
                </div>
            </div>

            
		<?php
		break;
		
		
		case 'button': ?>
        
            <div class="row theme-option-topspacer">
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm ux-bmslider-slide-button-text" placeholder="<?php _e('Text', 'ux'); ?>" value="" />
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control input-sm ux-bmslider-slide-button-url" placeholder="<?php _e('URL', 'ux'); ?>" value="" />
                </div>
                <div class="col-sm-3">
                    <select class="form-control input-sm ux-bmslider-slide-button-size">
                        <option value="button-large"><?php _e('Large', 'ux'); ?></option>
                        <option value="button-medium"><?php _e('Medium', 'ux'); ?></option>
                        <option value="button-small"><?php _e('Small', 'ux'); ?></option>
                    </select>
                </div>
            </div>
		<?php
		break;
	}
	
	die('');
}
add_action('wp_ajax_ux_theme_bmslider_change_field', 'ux_theme_bmslider_change_field');

//theme import bmslider
function ux_import_process_bmslider_demo_images(){
	global $wpdb;
	
	$demo_attachment = get_option('ux_theme_demo_attachment');
	if($demo_attachment){
		$attachment_url = wp_get_attachment_image_src($demo_attachment, 'full');
		
		$get_bmslider = get_posts(array(
			'posts_per_page' => -1,
			'post_type' => 'bmslider',
			'post_status' => 'any'
		));
		
		if($get_bmslider){
			foreach($get_bmslider as $bmslider){
				$get_post_meta = get_post_meta($bmslider->ID, 'ux_theme_meta', true);
				if($get_post_meta){
					foreach($get_post_meta as $meta_key => $meta_value){
						switch($meta_key){
							case 'theme_bmslider_background_image':
								$get_post_meta[$meta_key] = $attachment_url;
							break;
							
							case 'theme_bmslider_slide':
								if(count($meta_value)){
									foreach($meta_value as $slider_num => $slider){
										if(count($slider)){
											foreach($slider as $slide_num => $slide){
												if($slide['type'] == 'image'){
													$get_post_meta[$meta_key][$slider_num][$slide_num]['image-value'] = $attachment_url;
												}
											}
										}
									}
								}
							break;
						}
					}
					update_post_meta($bmslider->ID, 'ux_theme_meta', $get_post_meta);
				}
			}
		}
	}
}
add_action('ux_theme_process_demo_images_ajax', 'ux_import_process_modules_demo_images');
?>