<?php
/**
 * Uninstall Script
 *
 * Plugin Name: {plugin_name}
 */
 
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) or ! WP_UNINSTALL_PLUGIN ) {
	die( 'Access denied.' );
}

require_once 'vendor/autoload.php';

/* Get the plugin instance */
$plugin = \MillerMedia\Boilerplate\Plugin::instance();

/**
 * Uninstall it
 *
 * If you overload this method in your plugin, make sure to call
 * parent::uninstall() because the modern wordpress framework performs
 * automatic clean up operations such as the removal of your custom
 * database tables.
 */
$plugin->uninstall();