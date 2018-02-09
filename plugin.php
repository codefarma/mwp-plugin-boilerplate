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
if ( ! class_exists( 'BoilerplatePlugin' ) )
{
	class BoilerplatePlugin
	{
		public static function init()
		{
			/* Plugin Core */
			$plugin	= \MillerMedia\Boilerplate\Plugin::instance();
			$plugin->setPath( rtrim( plugin_dir_path( __FILE__ ), '/' ) );
			
			/* Plugin Settings */
			$settings = \MillerMedia\Boilerplate\Settings::instance();
			$plugin->addSettings( $settings );
			
			/* Connect annotated resources to wordpress core */
			$framework = \MWP\Framework\Framework::instance()
				->attach( $plugin )
				->attach( $settings )
				;
			
			/* Enable Widgets */
			\MillerMedia\Boilerplate\BasicWidget::enableOn( $plugin );
		}
		
		public static function status() {
			if ( ! class_exists( 'MWPFramework' ) ) {
				echo '<td colspan="3" class="plugin-update colspanchange">
						<div class="update-message notice inline notice-error notice-alt">
							<p><strong style="color:red">INOPERABLE.</strong> Please activate <a href="' . admin_url( 'plugins.php?page=tgmpa-install-plugins' ) . '"><strong>MWP Application Framework</strong></a> to enable the operation of this plugin.</p>
						</div>
					  </td>';
			}
		}
	}
	
	/* Autoload Classes */
	require_once 'vendor/autoload.php';
	
	/* Bundled Framework */
	if ( file_exists( __DIR__ . '/framework/plugin.php' ) ) {
		include_once 'framework/plugin.php';
	}

	/* Register plugin dependencies */
	include_once 'includes/plugin-dependency-config.php';
	
	/* Register plugin status notice */
	add_action( 'after_plugin_row_' . plugin_basename( __FILE__ ), array( 'BoilerplatePlugin', 'status' ) );
	
	/**
	 * DO NOT REMOVE
	 *
	 * This plugin depends on the mwp application framework.
	 * This block ensures that it is loaded before we init.
	 */
	if ( class_exists( 'MWPFramework' ) ) {
		BoilerplatePlugin::init();
	}
	else {
		add_action( 'mwp_framework_init', array( 'BoilerplatePlugin', 'init' ) );
	}
	
}

