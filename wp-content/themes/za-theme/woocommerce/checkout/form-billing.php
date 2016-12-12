<?php 
global $woocommerce;

if($woocommerce->cart->ship_to_billing_address_only() && $woocommerce->cart->needs_shipping()){ ?>

	<h4 class="lined-heading"><span><?php _e('Billing &amp; Shipping', 'woocommerce'); ?></span></h4>

<?php }else{ ?>

	<h4 class="lined-heading"><span><?php _e('Billing Address', 'woocommerce'); ?></span></h4>

<?php }

do_action('woocommerce_before_checkout_billing_form', $checkout);

foreach($checkout->checkout_fields['billing'] as $key => $field){
	
	woocommerce_form_field($key, $field, $checkout->get_value($key));
	
}

do_action('woocommerce_after_checkout_billing_form', $checkout);

if(!is_user_logged_in() && $checkout->enable_signup){
	
	if($checkout->enable_guest_checkout){ ?>

		<p class="form-row form-row-wide">
			<input class="input-checkbox" id="createaccount" <?php checked($checkout->get_value('createaccount'), true) ?> type="checkbox" name="createaccount" value="1" /> <label for="createaccount" class="checkbox"><?php _e('Create an account?', 'woocommerce'); ?></label>
		</p>

	<?php }
	
	do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

	<div class="create-account">

		<p><?php _e('Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'woocommerce'); ?></p>

		<?php foreach($checkout->checkout_fields['account'] as $key => $field){
			
			woocommerce_form_field($key, $field, $checkout->get_value($key));
			
		} ?>

		<div class="clear"></div>

	</div>

	<?php do_action('woocommerce_after_checkout_registration_form', $checkout);
	
} ?>