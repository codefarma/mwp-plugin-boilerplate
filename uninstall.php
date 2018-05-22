<?php
/**
 * Uninstall Script
 *
 * @package  {plugin_name}
 * @author   {plugin_author}
 * @since    {build_version}
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) or ! WP_UNINSTALL_PLUGIN ) {
	die( 'Access denied.' );
}

include_once __DIR__ . '/plugin.php';

if ( ! class_exists( 'MWPFramework' ) ) {
	if ( ! file_exists( __DIR__ . '/framework/plugin.php' ) ) {
		return;
	}
	
	include_once __DIR__ . '/framework/plugin.php';
	do_action( 'mwp_framework_manual_init' );
}

/* Get the plugin instance */
$plugin = MWP\Boilerplate\Plugin::instance();
$plugin->setPath( rtrim( plugin_dir_path( __DIR__ . '/plugin.php' ), '/' ) );

/**
 * Uninstall it
 *
 * If you overload this method in your plugin, make sure to call
 * parent::uninstall() because the mwp application framework performs
 * automatic clean up operations such as the removal of your custom
 * database tables.
 */
$plugin->uninstall();

