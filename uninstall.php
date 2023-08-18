<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$plugin_name = 'subscription-renewal-reminder';

if ( isset( $_REQUEST['checked_plugin'] ) && $_REQUEST['checked_plugin'] === $plugin_name ) {
	//TODO: Uninstall logic. Check Referrer, user, etc.
}