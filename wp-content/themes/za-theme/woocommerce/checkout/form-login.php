<?php
if(is_user_logged_in()) return;

$info_message = apply_filters('woocommerce_checkout_login_message', __('Returning customer?', 'woocommerce'));
?>

<p class="woocommerce-info"><?php echo esc_html($info_message); ?> <a href="#login-form" class="show-login"><?php _e('Click here to login', 'woocommerce'); ?></a></p>

<div id="login-form" class="modal fade out">
	
    <div class="modal-dialog">
    
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="close-btn"></span></button>
                <h3 id="login-form-modal"><?php _e('Login', 'woocommerce'); ?></h3>
            </div><!--End modal-header-->
            
            <div class="modal-body">
            
				<?php woocommerce_login_form(array(
					'message'  => __( 'If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.', 'woocommerce' ),
					'redirect' => get_permalink( woocommerce_get_page_id( 'checkout') ),
					'hidden'   => true)); ?>	
                
            </div><!--End modal-body-->
            
        </div><!--End modal-content-->
        
    </div><!--End modal-dialog-->
    
</div>

