<?php

function woostudy_setup() {
	add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'woostudy_setup' );

add_action( 'wp_head', function () {
	echo '<link rel="preconnect" href="https://fonts.gstatic.com/">';
}, 5 );

function woostudy_scripts() {
	wp_enqueue_style( 'woostudy-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap', array(), null );
	wp_enqueue_style( 'woostudy-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css' );
	wp_enqueue_style( 'woostudy-animate', get_template_directory_uri() . '/assets/lib/animate/animate.min.css' );
	wp_enqueue_style( 'woostudy-owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css' );
	wp_enqueue_style( 'woostudy-main', get_template_directory_uri() . '/assets/css/style.css' );

//	wp_deregister_script( 'jquery' );
//	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), false, true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'woostudy-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array(), false, true );
	wp_enqueue_script( 'woostudy-easing', get_template_directory_uri() . '/assets/lib/easing/easing.min.js', array(), false, true );
	wp_enqueue_script( 'woostudy-owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.min.js', array(), false, true );
	wp_enqueue_script( 'woostudy-main', get_template_directory_uri() . '/assets/js/main.js', array(), false, true );

}

add_action( 'wp_enqueue_scripts', 'woostudy_scripts' );

// WooCommerce Hooks
require_once get_template_directory() . '/inc/woocommerce-hooks.php';

