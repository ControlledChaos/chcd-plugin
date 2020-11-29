<?php
/**
 * Plugin activation class
 *
 * This file must not be namespaced.
 *
 * @package    CHCD_Plugin
 * @subpackage Includes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Plugin activation class
 *
 * @since  1.0.0
 * @access public
 */
class CHCD_Activate {

	/**
	 * Instance of the class
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {
		return new self;
	}

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {}

	/**
	 * Fired during plugin activation.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function activate() {}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function chcd_activate() {
	return CHCD_Activate :: instance();
}
