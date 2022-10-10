<?php

// https://www.businessbloomer.com/?s=Hook+Guide

// https://woocommerce.com/document/disable-the-default-stylesheet/
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

add_action( 'woocommerce_shop_loop_item_title', function () {
	global $product;
	echo '<a class="h6 text-decoration-none text-truncate" href="' . $product->get_permalink() . '">';
}, 9 );
add_action( 'woocommerce_shop_loop_item_title', function () {
	echo get_the_title();
}, 10 );
add_action( 'woocommerce_shop_loop_item_title', function () {
	echo '</a>';
}, 11 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_filter( 'woocommerce_breadcrumb_defaults', function() {
	return array(
		'delimiter'   => '&nbsp;/&nbsp;',
		'wrap_before' => '<nav class="breadcrumb bg-light mb-30">',
		'wrap_after'  => '</nav>',
		'before'      => '',
		'after'       => '',
		'home'        => __( 'Home', 'woostudy' ),
	);
} );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );

remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
add_action( 'woocommerce_shop_loop_subcategory_title', function ( $category ) {
	echo '<h6>' . esc_html( $category->name ) . '</h6>
          <small class="text-body">' . $category->count . __( ' Products', 'woostudy' ) . '</small>';
}, 10 );

// https://woocommerce.com/document/show-cart-contents-total/
add_filter( 'woocommerce_add_to_cart_fragments', function ($fragments) {
	$fragments['.mini-cart-cnt'] = '<span class="badge text-dark border border-dark rounded-circle mini-cart-cnt">' . count( WC()->cart->get_cart() ) . '</span>';
	return $fragments;
} );

add_action( 'template_redirect', function () {
	if ( is_product() ) {
		remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar', 10 );
	}
} );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

