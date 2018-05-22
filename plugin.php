<?php
/**
 * Plugin Name: {plugin_name}
 * Plugin URI: {plugin_url}
 * Description: {plugin_description}
 * Author: {plugin_author}
 * Author URI: {plugin_author_url}
 * Version: 0.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

/* Load Only Once */
if ( class_exists( 'BoilerplatePlugin' ) ) {
	return;
}

/* Autoloaders */
include_once 'includes/plugin-bootstrap.php';

/**
 * This plugin uses the MWP Application Framework to init.
 *
 * @return void
 */
add_action( 'mwp_framework_init', function() 
{
	/**
	 * Get the framework instance
	 */
	$framework = MWP\Framework\Framework::instance();
	
	/**
	 * Plugin Core 
	 *
	 * Attach the functionality contained within the core
	 * Plugin class. Splitting functionality into multiple
	 * classes requires attaching each singleton instance.
	 */
	$plugin	= MWP\Boilerplate\Plugin::instance();
	$framework->attach( $plugin );
	
	/**
	 * Plugin Settings 
	 *
	 * Add a simple plugin settings page. The settings instance
	 * is registered with the plugin so the settings can be easily
	 * fetched via the getSetting() method on the plugin, and then
	 * it is attached to the framework so that the settings can be
	 * given their own admin page.
	 */
	$settings = MWP\Boilerplate\Settings::instance();
	$plugin->addSettings( $settings );
	// $framework->attach( $settings );
	
	/**
	 * Plugin Widgets
	 *
	 * Widgets that extend the MWP\Framework\Plugin\Widget class can be enabled
	 * by calling the enableOn() static method with the plugin instance to
	 * be used for rendering its templates.
	 */	
	// MWP\Boilerplate\BasicWidget::enableOn( $plugin );
	
} );
