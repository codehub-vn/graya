<?php if(sizeof( WC()->cart->get_cart()) > 0){ ?>

    <div id="woocomerce-cart-side">
        <a href="<?php echo WC()->cart->get_cart_url(); ?>"><span class="fa fa-shopping-cart"></span></a>
    </div>

<?php } ?>