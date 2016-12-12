<?php
// Footer Elements Align
$footer_align = ux_get_option('theme_option_footer_elements_align');
$footer_class = 'footer-centered';
if($footer_align == 'cols'){
	$footer_class = 'footer-cols-layout';
}

 ?>

<footer id="footer" class="<?php echo sanitize_html_class($footer_class); ?>">

    <?php //** Template Footer Widget
	ux_interface_footer_widget();
	
	//** Template Footer Info
	ux_interface_footer_info(); ?>

</footer>