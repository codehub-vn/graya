<?php

if(!$messages) return;

?>

<ul class="woocommerce-error">

	<?php foreach($messages as $message){ ?>
    
		<li><?php echo wp_kses_post($message); ?></li>
        
	<?php } ?>
    
</ul>