<?php
/*
Plugin Name: Uplisting Integration
Description: This plugin integrates uplisting third party api.
Version: 1.0
Author: Hybrid Anchor
Author URI: https://www.hybridanchor.com/
*/

if ( !defined('ABSPATH') ) exit; // Exit if accessed directly

if ( !class_exists('Hybrid') ) :

class Hybrid {

	/** @var string The plugin version number. */
	var $version = '1';

	function __construct() {}

	function initialize() {

		switch ($_SERVER['SERVER_ADDR']) {
			case '::1':
				$this->define('HYBRID_ENV', 'local');
			break;
			case '10.104.0.216':
				$this->define('HYBRID_ENV', 'staging');
			break;
			default:
				$this->define('HYBRID_ENV', 'prod');
			break;
		}

		// Define constants.
		$this->define('HYBRID_PATH', plugin_dir_path(__FILE__) );
		$this->define('HYBRID_DIR_URL', plugin_dir_url(__FILE__) );
		$this->define('HYBRID_BASENAME', plugin_basename(__FILE__) );
		$this->define('HYBRID_PLUGIN_VERSION', $this->version );

		// Include utility functions.
		require_once( HYBRID_PATH . 'includes/hybrid-utility-function.php');

		//Include config files.
		hybrid_include('includes/config/api.php'); 
		hybrid_include('includes/config/token.php'); 

		//Include controllers.
		hybrid_include('includes/controllers/blok-bookings.php'); 

		//Include shortcodes.
		hybrid_include('includes/shortcodes/forms.php');

		//Include core.
		hybrid_include('includes/hybrid-assets.php');

	}


	function define($name, $value = true) {
		if( !defined($name) ) {
			define($name, $value);
		}
	}

}

function initialize() {
		global $hybrid;

		// Instantiate only once.
		if( !isset($hybrid) ) {
			$hybrid = new Hybrid();
			$hybrid->initialize();
		}

		return $hybrid;
 }


initialize();

endif; // class_exists check
