<?php
if(!$messages) return;

foreach($messages as $message){ ?>

	<div class="woocommerce-info"><?php echo wp_kses_post($message); ?></div>
    
<?php } ?>