<?php
global $product, $woocommerce_loop;

$upsells = $product->get_upsells();

if(sizeof($upsells) == 0) return;

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array($product->id),
	'meta_query'          => $meta_query
);

$products = new WP_Query($args);

$woocommerce_loop['columns'] = $columns;

if($products->have_posts()){ ?>

	<div class="products-relative">

		<h2><?php _e('You may also like&hellip;', 'woocommerce'); ?></h2>

		<div class="isotope masonry isotope-product-list clearfix" data-size="small" style="margin: -20px 0px 0px -20px;" data-space="20px">

			<?php while($products->have_posts()){ $products->the_post(); ?>

				<?php ux_get_woo_template_part('related', 'product'); ?>

			<?php } ?>

		</div>

	</div>

<?php
}

wp_reset_postdata();
