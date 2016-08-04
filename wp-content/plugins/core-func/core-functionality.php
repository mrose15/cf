<?php
/**
 * Plugin Name: Core Functionality
 * Plugin URI: https://michelecheow.com/
 * Functionality
 * Description: This contains all your site's core functionality so that it is theme independent. <strong>It should always be activated</strong>.
 * Version:     1.0
 * Author:      michelecheow.com
 * Author URI:  http://michelecheow.com
 */

 // Plugin Directory 
define( 'EA_DIR', dirname( __FILE__ ) ); 

// Team Member CPT
include_once( EA_DIR . '/inc/team_cpt.php' );