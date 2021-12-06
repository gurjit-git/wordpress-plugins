<?php
/*
Plugin Name: JBM Instagram
Plugin URI: http://wordpress.org/
Description: This is a Instagram plugin
Author: Gurjit Singh
Version: 1.0
Author URI: http://gurjitsingh.com
*/
defined( 'ABSPATH' ) or die( 'Direct access not allowed!' );
define( 'JBM_INSTAGRAM_PLUGIN_PATH_', plugin_dir_path( __FILE__ ) );

include('class/instagram.php');
include('cmb-functions.php');

include('inc/gallery-shortcode.php');
add_shortcode('jbm_instagram_gallery','jbm_instagram_gallery');

function jbm_include_css_js(){
	wp_enqueue_style( 'jbm-instagram-style', plugins_url('/assets/css/style.css', __FILE__), false, '1.0.0', 'all');
   	
	wp_enqueue_style( 'jbm_fancybox-style', plugins_url('/assets/css/jquery.fancybox.min.css', __FILE__), false, '1.0.0', 'all');
	
	wp_enqueue_script( 'jbm-jquery-fancybox-script', plugins_url( '/assets/js/jquery.fancybox.min.js' , __FILE__ ), array( 'jquery' ), '1.0.0', true  );
	wp_enqueue_script( 'jbm-instagram-custom-script', plugins_url( '/assets/js/custom.js' , __FILE__ ), array( 'jquery' ), '1.0.0', true  );
}
add_action('wp_enqueue_scripts', "jbm_include_css_js");