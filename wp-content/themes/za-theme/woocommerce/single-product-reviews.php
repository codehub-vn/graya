<?php
global $woocommerce, $product;
if(comments_open()){
	$get_comments = get_comments(array(
		'post_id' => get_the_ID(),
		'status' => 'approve'
	)); ?>
	<div id="comments">
		<div id="comments_box">
			<span id="comments_inlist"><?php comments_number(__('0 COMMENTS', "ux"), __('1 COMMENT', "ux"), __('% COMMENTS', "ux") ); ?></span>
			<?php if($get_comments){ ?>
				<ol class="commentlist commentlist-only">
					<?php foreach($get_comments as $comment){
						$rating = esc_attr(get_comment_meta($comment->comment_ID, 'rating', true)); ?>
						<li id="comment-<?php echo $comment->comment_ID; ?>" class="commlist-unit">
							<div class="comm-u-wrap">
								<?php if(get_option('woocommerce_enable_review_rating') == 'yes'){ ?>
									<span class="rating_container">
									<div class="star-rating" title="<?php echo sprintf(__( 'Rated %d out of 5', 'ux' ), $rating) ?>"><span style="width:<?php echo (intval(get_comment_meta($comment->comment_ID, 'rating', true ) ) / 5 ) * 100; ?>%"><strong itemprop="ratingValue" class="rating"><?php echo intval(get_comment_meta($comment->comment_ID, 'rating', true)); ?></strong> <?php _e( 'out of 5', 'ux' ); ?></span></div>
									</span>
								<?php } ?>
								<div class="comment-meta">
									<span class="comment-author"><a href="<?php comment_author_url($comment->comment_ID); ?>"><?php comment_author($comment->comment_ID); ?></a></span>
									<span class="date"><?php echo human_time_diff(get_comment_date('U', $comment->comment_ID), current_time('timestamp'));  _e(" ago","ux"); ?></span>
								</div><!--END comment-mate--> 
								<div class="comment">
									<p><?php echo $comment->comment_content; ?></p>
								</div><!--END comment-->
								<span class="reply"></span>		
							</div><!--END comm-u-wrap-->
	  
						</li><!-- #comment-## -->
					<?php } ?>
				</ol>
			<?php } ?>
		</div><!-- #comments_box-->	
	</div>
<?php
}