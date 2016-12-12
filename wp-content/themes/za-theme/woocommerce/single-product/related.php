<?php
global $product, $woocommerce_loop;

$related = $product->get_related($posts_per_page);

if(sizeof($related) == 0) return;

$args = apply_filters('woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array($product->id)
));

$products = new WP_Query($args);

$woocommerce_loop['columns'] = $columns;

if($products->have_posts()){ ?>

	<div class="products-relative">

		<h2><?php _e('Related Products', 'woocommerce'); ?></h2>

		<div class="isotope masonry isotope-product-list clearfix" data-size="small" style="margin: -20px 0px 0px -20px;" data-space="20px">

			<?php while($products->have_posts()){ $products->the_post(); ?>

				<?php ux_get_woo_template_part('related', 'product'); ?>

			<?php } ?>

		</div>

	</div>

<?php
}

wp_reset_postdata();
