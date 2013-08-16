<?php
/*
Plugin Name: Genesis Mobile Menu
Plugin URI: http://daan.kortenba.ch/proposing-a-responsive-hamburger-style-mobile-menu-for-genesis/
Description: Hamburger style sliding mobile menu for Genesis
Author: Daan Kortenbach
Version: 1.0-beta1
Author URI: http://daan.kortenba.ch/
*/

// define( 'GENESIS_MOBILE_MENU_METHOD', 'device' );
define( 'GENESIS_MOBILE_MENU_METHOD', 'breakpoint' );

add_action( 'wp_footer', 'genesis_mobile_breakpoint', $priority = 1 );
/**
 * Set the breakpoint variable for the jQuery script.
 * @return string
 */
function genesis_mobile_breakpoint() {

	if ( 'breakpoint' == GENESIS_MOBILE_MENU_METHOD ) {
		$breakpoint = 480;
		echo '<script>var genesis_mobile_breakpoint = ' . $breakpoint . '</script>';
	}
}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );
/**
 * Enqueues style and script.
 * @return void
 */
function themeslug_enqueue_script() {

	wp_enqueue_style( 'genesis-mobile-menu', plugins_url( 'genesis-mobile-menu.css' , __FILE__ ), $deps = array(), $ver = null, $media = false );

	if ( 'breakpoint' == GENESIS_MOBILE_MENU_METHOD )
		wp_enqueue_script( 'genesis-mobile-menu', plugins_url( 'genesis-mobile-menu.js' , __FILE__ ), $deps = array( 'jquery' ), $ver = null, $in_footer = true );

	if ( 'device' == GENESIS_MOBILE_MENU_METHOD )
		wp_enqueue_script( 'genesis-mobile-menu', plugins_url( 'genesis-mobile-menu-device.js' , __FILE__ ), $deps = array( 'jquery' ), $ver = null, $in_footer = true );
}
