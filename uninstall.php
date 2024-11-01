<?php
// If unistall not called from WordPress exit
if( !defined( 'WP_UNINSTALL_PLUGIN' ) )
  exit();

// Delete option from options table
delete_option( 'PLUGIN_NAME_OPTIONS' );
delete_option( 'WPPush_options' );
delete_option( 'WPPush_menu' );
delete_option( 'WPPush_structure' );
delete_option( 'WPPush_slideshow' );
delete_option( 'WPPush_ga' );
delete_option( 'wppush_firstVisit' );
delete_option( 'wppush_firstCreation' );
//wordapp_firstVisit
//wordapp_firstCreation
// Remove any additional options and custom tables.
?>