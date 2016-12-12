<?php
$tabs = apply_filters('woocommerce_product_tabs', array());

if(!empty($tabs)){
	
	$current = key($tabs); ?>

	<div class="span12 tabs-h">
		<ul id="product-tab" class="nav nav-tabs ">
			<?php foreach($tabs as $key => $tab){
				$active = $key == $current ? 'active' : false; ?>
				<li class="<?php echo $active; ?>">
					<a href="#tab-<?php echo $key ?>"><?php echo apply_filters('woocommerce_product_' . $key . '_tab_title', $tab['title'], $key) ?></a>
				</li>
			<?php } ?>
		</ul>
        <div class="tab-content">
			<?php foreach($tabs as $key => $tab){
				$active = $key == $current ? 'active' : false; ?>
                <div class="tab-pane <?php echo $active; ?>" id="tab-<?php echo $key ?>">
                    <?php call_user_func($tab['callback'], $key, $tab) ?>
                </div>
            <?php } ?>
        </div>
	</div>

<?php } ?>