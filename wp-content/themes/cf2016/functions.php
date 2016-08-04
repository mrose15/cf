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
}

// Custom Image Sizes
add_image_size('team_thumb', 318, 180, array( 'center', 'center' ));


?>