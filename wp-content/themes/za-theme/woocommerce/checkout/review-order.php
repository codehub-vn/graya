<div id="order_review">

	<table class="shop_table">
        <tbody>
			<?php do_action( 'woocommerce_review_order_before_cart_contents' );

				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						?>
						<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
							<td class="product-description">
								<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ); ?>
								<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
								<?php echo WC()->cart->get_item_data( $cart_item ); ?>
							</td>
							<td class="product-subtotal">
								<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
							</td>
						</tr>
						<?php
					}
				}

				do_action( 'woocommerce_review_order_after_cart_contents' );
			?>
        </tbody>
    </table>
    
    <table class="totals_table">
        <tbody>
            <tr class="cart-subtotal">
				<th><?php _e('Subtotal', 'woocommerce'); ?></th>
				<td><?php wc_cart_totals_subtotal_html(); ?></td>
			</tr>
            
            <?php foreach(WC()->cart->get_coupons( 'cart' ) as $code => $coupon){ ?>
				<tr class="discount coupon-<?php echo esc_attr( $code ); ?>">
					<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
					<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
				</tr>
			<?php
			}
			
			if(WC()->cart->needs_shipping() && WC()->cart->show_shipping()){
				
				do_action('woocommerce_review_order_before_shipping');
				
				wc_cart_totals_shipping_html();
				
				do_action('woocommerce_review_order_after_shipping');
				 
			}
			
			foreach(WC()->cart->get_fees() as $fee){ ?>
				<tr class="fee">
					<th><?php echo esc_html($fee->name); ?></th>
					<td><?php wc_cart_totals_fee_html($fee); ?></td>
				</tr>
			<?php
			}
			
			if(WC()->cart->tax_display_cart === 'excl'){
				if(get_option('woocommerce_tax_total_display') === 'itemized'){
					foreach(WC()->cart->get_tax_totals() as $code => $tax){ ?>
						<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
							<th><?php echo esc_html( $tax->label ); ?></th>
							<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
						</tr>
					<?php
					}
				}else{ ?>
					<tr class="tax-total">
						<th><?php echo esc_html( WC()->countries->tax_or_vat()); ?></th>
						<td><?php echo wc_price( WC()->cart->get_taxes_total()); ?></td>
					</tr>
				<?php
				}
			}
			
			do_action('woocommerce_review_order_before_order_total'); ?>

                <tr class="blank">
                    <th></th>
                    <td></td>
                </tr>
                
                <tr class="total">
                    <th><strong><?php _e('Total', 'woocommerce'); ?></strong></th>
                    <td><strong><?php wc_cart_totals_order_total_html(); ?></strong></td>
                </tr>

			<?php do_action('woocommerce_review_order_after_order_total'); ?>
            
        </tbody>
    </table>

	<?php do_action( 'woocommerce_review_order_before_payment' ); ?>

	<?php do_action( 'woocommerce_review_order_after_payment' ); ?>

</div>
