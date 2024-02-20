<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

function sst_remove_sst_db_table() {
	global $wpdb;
	$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}simple_stats_total" );
	delete_option( 'sst_plugin_db_version' );
}

sst_remove_sst_db_table();
