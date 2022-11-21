<?php

function parent_styles(): void {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function include_styles(): void {
	wp_enqueue_style( 'laravel-mix-homepage-style', get_stylesheet_directory_uri() . '/css/homepage.css' );
}

add_action( 'wp_enqueue_scripts', 'parent_styles' );
add_action( 'wp_enqueue_scripts', 'include_styles' );

// register widgets
require_once get_stylesheet_directory() . "/widgets/VueWidget.php";