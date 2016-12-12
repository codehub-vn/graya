<?php
/****************************************************************/
/*
/* Functions
/*
/****************************************************************/

//Function Woocommerce archive description
function ux_woocommerce_archive_description(){
	$description = false;
	
	if(is_tax(array('product_cat', 'product_tag')) && get_query_var('paged') == 0){
		$description = apply_filters('the_content', term_description());
	}elseif(is_post_type_archive('product') && get_query_var('paged') == 0){
		$shop_page = get_post(wc_get_page_id('shop'));
		if($shop_page){
			$description = apply_filters('the_content', $shop_page->post_content);
		}
	}
	
	if($description){
		echo '<div class="post-expert">' . $description . '</div>';
	}
}

//Function Woocommerce Subcategory Thumbnail
function ux_woocommerce_subcategory_thumbnail($category){
	global $woocommerce;
	
	$thumbnail_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);

	if($thumbnail_id){
		$image = wp_get_attachment_image_src($thumbnail_id, 'imagebox-thumb');
		$image = $image[0];
	}else{
		$image = woocommerce_placeholder_img_src();
	}

	if($image){
		echo '<div class="product-img-wrap">';
		echo '<img src="' . $image . '" alt="' . $category->name . '" class="product-img-front" />';
		echo '<img src="' . $image . '" alt="' . $category->name . '" class="product-img-back" />';
		echo '</div>';
	}
}

//Function Woocommerce Template Loop Product Thumbnail
function ux_woocommerce_template_loop_product_thumbnail(){
	global $post, $product;
	
	$size = 'imagebox-thumb';
	$gallery_count = count($product->get_gallery_attachment_ids());
	echo '<div class="product-img-wrap">';
	if(has_post_thumbnail()){
		$gallery_class = ($gallery_count > 0) ? 'product-img-front' : '';
		echo get_the_post_thumbnail($post->ID, $size, array('class' => $gallery_class));
		if($gallery_count > 0){
			foreach($product->get_gallery_attachment_ids() as $num => $gallery){
				$image = wp_get_attachment_image_src($gallery, $size);
				if($num == 0){
					echo '<img src="' . $image[0] . '" class="product-img-back" />';
				}
			}
		}
	}elseif($gallery_count > 0){
		foreach($product->get_gallery_attachment_ids() as $num => $gallery){
			$gallery_class = ($gallery_count > 2) ? 'product-img-front' : '';
			$image = wp_get_attachment_image_src($gallery, $size);
			if($num == 0){
				echo '<img src="' . $image[0] . '" class="' . $gallery_class . '" />';
			}elseif($num == 1){
				echo '<img src="' . $image[0] . '" class="product-img-back" />';
			}
		}
	}elseif(woocommerce_placeholder_img_src()){
		echo '<img src="' . woocommerce_placeholder_img_src() . '" class="product-img-front" />';
		echo '<img src="' . woocommerce_placeholder_img_src() . '" class="product-img-back" />';
	}
	echo '</div>';
}

//Function Woocommerce Default Product Tabs
function ux_woocommerce_default_product_tabs($tabs){
	if(comments_open()){
		$tabs['leave-reviews'] = array(
			'title'    => __('Leave a Review', 'ux'),
			'priority' => 40,
			'callback' => 'ux_woocommerce_product_leave_reviews'
		);
	}
	return $tabs;
}

//Function Woocommerce Leave Reviews
function ux_woocommerce_product_leave_reviews(){
	global $post, $current_user, $woocommerce;
	
	if(!comments_open())
		return;
	
	if(get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->id)){ ?>

		<div id="respondwrap">
            <?php 
                $commenter = wp_get_current_commenter();
                $req = get_option('require_name_email');
                $review_text = __('YOU REVIEW','ux');
                $aria_req = ( $req ? " aria-required='true'" : '' );
                $name_text = __('Name','ux');
				$email_text = __('Email','ux');
				$review_text = ux_get_option('theme_option_descriptions_your_message');
				$review_text = $review_text ? $review_text : __('Leave your message here','ux');
				$review_submit = ux_get_option('theme_option_descriptions_comment_submit');
				$review_submit = $review_submit ? $review_submit : __( 'SEND MESSAGE','ux' );

                if(esc_attr( $commenter['comment_author'] )){
                $fields =  array(
                    'author' => '<p class="respond-half respond-name"><input id="author" name="author" type="text" class="requiredFieldcomm" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' tabindex="1" onfocus="if(this.value==\''.esc_attr($name_text).'\'){this.value=\'\';}" onblur="if(this.value==\'\'){this.value=\''.esc_attr($name_text).'\';}"/></p>',
                    'email' => '<p class="respond-half respond-mail"><input id="email" name="email" type="text" class="email requiredFieldcomm" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' tabindex="2" onfocus="if(this.value==\''.esc_attr($email_text).'\'){this.value=\'\';}" onblur="if(this.value==\'\'){this.value=\''.esc_attr($email_text).'\';}"/></p>'
                );
                }else{
                $fields =  array(
                    'author' => '<p class="respond-half respond-name"><input id="author" name="author" type="text" class="requiredFieldcomm" value="'.esc_attr($name_text).'" size="30"' . $aria_req . ' tabindex="1" onfocus="if(this.value==\''.esc_attr($name_text).'\'){this.value=\'\';}" onblur="if(this.value==\'\'){this.value=\''.esc_attr($name_text).'\';}"/></p>',
                    'email' => '<p class="respond-half respond-mail"><input id="email" name="email" type="text" class="email requiredFieldcomm" value="'.esc_attr($email_text).'" size="30"' . $aria_req . ' tabindex="2" onfocus="if(this.value==\''.esc_attr($email_text).'\'){this.value=\'\';}" onblur="if(this.value==\'\'){this.value=\''.esc_attr($email_text).'\';}"/></p>'
                );
                }
                $comments_args = array(
                    'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
                    'logged_in_as'		   => '<p class="logged">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out &raquo;</a>', 'ux' ), admin_url( 'profile.php' ), $current_user->user_login, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
                    'title_reply'          => '<span class="comm-reply-title">'.__( 'LEAVE A REPLY', 'ux' ).'</span>',
                    'title_reply_to'       => __( 'Leave a Reply to %s', 'ux' ),
                    'cancel_reply_link'    => __( 'Cancel reply', 'ux' ),
                    'label_submit'         => esc_html($review_submit),
                    'comment_field'		   => '<p class="respond-full respond-comment"><textarea id="comment" name="comment" class="requiredFieldcomm" cols="100%" tabindex="4" aria-required="true" onfocus="if(this.value==this.defaultValue){this.value=\'\';}" onblur="if(this.value==\'\'){this.value=this.defaultValue;}" >'.$review_text.'</textarea></p>' . wp_nonce_field('comment_rating', true, false),
                    'must_log_in'		   => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'ux' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
                    'comment_notes_after'  =>'<p class="comment-form-rating clearfix"><label for="rating">Rating</label><select name="rating" id="rating" style="display:none;"><option value="">Rate&hellip;</option><option value="5">Perfect</option><option value="4">Good</option><option value="3">Average</option><option value="2">Not that bad</option><option value="1">Very Poor</option></select></p>',
                    'comment_notes_before'  =>''
                );
            ?>
            <?php comment_form($comments_args); ?>
        </div>
	<?php }else{ ?>

		<p class="woocommerce-verification-required"><?php _e('Only logged in customers who have purchased this product may leave a review.', 'woocommerce'); ?></p>

	<?php
	}
}

/****************************************************************/
/*
/* Template
/*
/****************************************************************/

//Template Woocommerce Page Title
function ux_woocommerce_page_title(){
	ux_get_woo_template_part('title', 'bar');
}

//Template Woocommerce Page Title
function ux_woocommerce_sidebar_cart(){
	ux_get_woo_template_part('sidebar', 'cart');
}

?>