<?php

if ( ! defined('ABSPATH') ) {
	die('Access denied.');
}

class BoilerplatePlugin
{
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

/* Autoloader */
require_once dirname( __DIR__ ) . '/vendor/autoload.php';

/* Provide bundled framework */
if ( file_exists( dirname( __DIR__ ) . '/framework/plugin.php' ) ) {
	include_once dirname( __DIR__ ) . '/framework/plugin.php';
}

/* Register plugin dependencies */
include_once 'plugin-dependency-config.php';

/* Display notice if framework is missing */
add_action( 'after_plugin_row_' . plugin_basename( dirname( __DIR__ ) . '/plugin.php' ), array( 'BoilerplatePlugin', 'status' ) );

/**
 * Initialize the plugin on framework init
 */
add_action( 'mwp_framework_init', function() {
	$plugin	= MWP\Boilerplate\Plugin::instance();
	$plugin->setPath( rtrim( plugin_dir_path( dirname( __DIR__ ) . '/plugin.php' ), '/' ) );
});
