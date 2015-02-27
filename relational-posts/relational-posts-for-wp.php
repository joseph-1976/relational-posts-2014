<?php
/*
	Plugin Name: Relational Posts for WordPress
	Description: Relational Posts for WordPress, the best way to display related posts in WordPress.
	Version: 1.4
	Author: Joseph Stenhouse
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

function rp4wp_load_plugin() {

	if ( defined( 'RP4WP_PLUGIN_FILE' ) ) {
		return false;
	}

	// Define
	define( 'RP4WP_PLUGIN_FILE', __FILE__ );

	// Load main plugin file
	require_once plugin_dir_path( RP4WP_PLUGIN_FILE ) . 'classes/class-rp4wp.php';
	RP4WP();

}

// Create object - Plugin init
add_action( 'plugins_loaded', 'rp4wp_load_plugin', 20 );

//
if ( is_admin() && ! is_multisite() && ( false === defined( 'DOING_AJAX' ) || false === DOING_AJAX ) ) {

	// Load installer functions
	require_once plugin_dir_path( __FILE__ ) . 'includes/installer-functions.php';

	// Activation hook
	register_activation_hook( __FILE__, 'rp4wp_activate_plugin' );
}