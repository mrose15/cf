<?php
/**
 * CF 2016 functions and definitions
 *
 */

// Add parent styles
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

// Add bootstrap styles
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_styles' );
function enqueue_bootstrap_styles(){
	wp_enqueue_style( 'bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
	wp_enqueue_style( 'bootstrap-social', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.0.0/bootstrap-social.min.css');
}

// Add fontawesome styles
add_action('wp_enqueue_scripts', 'enqueue_fontawesome_styles' );
function enqueue_fontawesome_styles(){
	wp_enqueue_style( 'fontawesome_styles', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
}

// Add global js file
add_action('wp_enqueue_scripts', 'cf_global_js');
function cf_global_js() {
    wp_enqueue_script( 'global_js', get_stylesheet_directory_uri() . '/js/global.js', array( 'jquery' ), '1.0', true );
}

// Custom Image Sizes
add_image_size('team_thumb', 318, 180, array( 'center', 'center' ));


?>