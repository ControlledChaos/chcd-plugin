<?php
/**
 * Define the internationalization functionality.
 *
 * @package    CHCD_Plugin
 * @subpackage Includes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CHCD_Plugin\Includes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since  1.0.0
 * @access public
 */
class i18n {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self`
	 */
	public function __construct() {}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			chcd_plugin() :: DOMAIN,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}

// Run an instance of the class.
new i18n;
