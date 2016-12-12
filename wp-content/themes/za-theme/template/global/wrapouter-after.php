</div><!--End wrap-outer-->
<?php 
$back_top = ux_get_option('theme_option_enable_back_to_top'); 
$Navi_Layout = ux_get_option('theme_option_layout_menubar');
$Navi_head_backTop_before = $Navi_Layout == 'menubar-on-head' ? '<div class="container back-top-out">' : false;
$Navi_head_backTop_after = $Navi_Layout == 'menubar-on-head' ? '</div>' : false;
if ($back_top) { 
echo balanceTags($Navi_head_backTop_before); ?>
<div id="back-top"><span class="fa fa-angle-up"></span></div>
<?php 
echo balanceTags($Navi_head_backTop_after);
} ?>