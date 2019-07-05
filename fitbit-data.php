<?php
/**
 * Plugin Name: Michael's Fitbit Data
 * Plugin URI: https://michaelbox.net
 * Description: Process and store Fitbit data.
 * Author: tw2113
 * Author URI: https://michaelbox.net
 * Version: 1.0.0
 */

namespace tw2113\fitbit;

function create_tables() {
	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	//* Create the teams table
	$table_name = $wpdb->prefix . 'fitbit_steps';
	$sql = "CREATE TABLE $table_name (
 		id INTEGER NOT NULL AUTO_INCREMENT,
 		dateTime DATETIME NOT NULL,
 		steps CHAR(6),
 		PRIMARY KEY (id)
 	) {$charset_collate};";
	dbDelta( $sql );
}
register_activation_hook( __FILE__, __NAMESPACE__ . '\create_tables' );

function load_includes() {
	if ( defined( 'WP_CLI' ) && WP_CLI ) {
		require_once 'includes/wp-cli.php';
	}
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\load_includes' );