<?php

/*
Plugin Name: Plugin Action Links Demo
Plugin URI:
Description:
Version: 1.0
Author: Arif Islam
Author URI: arifislam.techviewing.com
License: GPLv2 or later
Text Domain: plac
Domain Path: /languages/
*/

add_action( 'admin_menu', function () {
	add_menu_page(
		__( 'Action Links', 'wp-quick-provision' ),
		__( 'Action Links', 'wp-quick-provision' ),
		'manage_options',
		'action_links',
		function () {
			?>
			<h1>Hello World</h1>
			<?php
		} );
} );

add_action( 'activated_plugin', function ( $plugin ) {
	if ( plugin_basename( __FILE__ ) == $plugin ) {
		wp_redirect( admin_url( 'admin.php?page=action_links' ) );
		die();
	}
} );

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), function ( $links ) {
	$link = sprintf( "<a href='%s' style='color:#2324ff;'>%s</a>", admin_url( 'admin.php?page=action_links' ), __( 'Settings', 'plac' ) );
	array_push( $links, $link );

	return $links;
} );


add_filter( 'plugin_row_meta', function ( $links, $plugin ) {
	if ( plugin_basename( __FILE__ ) == $plugin ) {
		$link = sprintf( "<a href='%s' style='color:#ff3c41;'>%s</a>", esc_url( 'https://github.com/arifislamarif344' ), __( 'Fork on Github', 'plac' ) );
		array_push( $links, $link );
	}

	return $links;
}, 10, 2 );