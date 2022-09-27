<?php

function woostudy_setup() {
	add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'woostudy_setup' );

require_once get_template_directory() . '/inc/woocommerce-hooks.php';

