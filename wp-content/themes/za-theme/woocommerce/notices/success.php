<?php
if(!$messages) return;

foreach($messages as $message){ ?>

	<div class="woocommerce-message"><?php echo wp_kses_post($message); ?></div>
    
<?php } ?>
