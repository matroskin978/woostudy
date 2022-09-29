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
