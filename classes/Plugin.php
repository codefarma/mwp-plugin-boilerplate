<?php
/**
 * Plugin Class File
 *
 * @vendor: {vendor_name}
 * @package: {plugin_name}
 * @author: {plugin_author}
 * @link: {plugin_author_url}
 * @since: {date_time}
 */
namespace MWP\Boilerplate;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

/**
 * Plugin Class
 */
class Plugin extends \MWP\Framework\Plugin
{
	/**
	 * Instance Cache - Required
	 * @var	self
	 */
	protected static $_instance;
	
	/**
	 * @var string		Plugin Name
	 */
	public $name = '{plugin_name}';
	
	/**
	 * Main Stylesheet
	 *
	 * @MWP\WordPress\Stylesheet
	 */
	public $mainStyle = 'assets/css/style.css';
	
	/**
	 * Main Javascript Controller
	 *
	 * @MWP\WordPress\Script( deps={"mwp"} )
	 */
	public $mainScript = 'assets/js/main.js';
	
	/**
	 * Enqueue scripts and stylesheets
	 * 
	 * @MWP\WordPress\Action( for="wp_enqueue_scripts" )
	 *
	 * @return	void
	 */
	public function enqueueScripts()
	{
		$this->useStyle( $this->mainStyle );
		$this->useScript( $this->mainScript );
	}
	
}