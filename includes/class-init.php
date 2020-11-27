<?php
/**
 * Initialize the plugin
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

// Get plugins path to check for active plugins.
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Begin the core functionality of the plugin.
 *
 * @since  1.0.0
 * @access public
 */
final class Init {

	/**
	 * Instance of the class
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {

		// Varialbe for the instance to be used outside the class.
		static $instance = null;

		if ( is_null( $instance ) ) {

			// Set variable for new instance.
			$instance = new self;

			// Get class dependencies.
			$instance->dependencies();

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access private
	 * @return self
	 */
	private function __construct() {

		// Remove the Draconian capital P filter.
		remove_filter( 'the_title', 'capital_P_dangit', 11 );
		remove_filter( 'the_content', 'capital_P_dangit', 11 );
		remove_filter( 'comment_text', 'capital_P_dangit', 31 );

		// Load classes to extend plugins.
		add_action( 'init', [ $this, 'plugin_support' ] );

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// Translation functionality.
		require_once CHCD_PATH . 'includes/class-i18n.php';

		// Admin/backend functionality, scripts and styles.
		require_once CHCD_PATH . 'admin/class-admin.php';

		// Frontend functionality, scripts and styles.
		require_once CHCD_PATH . 'frontend/class-frontend.php';

		// Various media and media library functionality.
		require_once CHCD_PATH . 'includes/media/class-media.php';

		/**
		 * Register custom editor blocks.
		 *
		 * @todo Remove conditional statement when Gutenberg is in core?
		 */
		if ( chcd_acf_pro() ) {
			$editor = get_field( 'chcd_classic_editor', 'option' );
		} else {
			$editor = get_option( 'chcd_classic_editor' );
		}
		if ( ( chcd_classicpress() || chcd_new_cms() ) && ! $editor || is_plugin_active( 'gutenberg/gutenberg.php' ) ) {
			require_once CHCD_PATH . 'includes/editor-blocks/class-register-block-types.php';
		}

		// Post types and taxonomies.
		require_once CHCD_PATH . 'includes/post-types-taxes/class-post-type-tax.php';

		// User funtionality.
		require_once CHCD_PATH . 'includes/users/class-users.php';

		// Dev and maintenance tools.
		require_once CHCD_PATH . 'includes/tools/class-tools.php';

	}

	/**
	 * Load classes to extend plugins.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function plugin_support() {

		// Add Advanced Custom Fields Support.
		if ( chcd_acf() ) {
			include_once CHCD_PATH . 'includes/acf/class-extend-acf.php';
		}

		// Add Beaver Builder support.
		if ( class_exists( 'FLBuilder' ) ) {
			include_once CHCD_PATH . 'includes/beaver/class-beaver-builder.php';
		}

		// Add Elementor support.
		if ( class_exists( '\Elementor\Plugin' ) ) {
			include_once CHCD_PATH . 'includes/elementor/class-elementor.php';
		}

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function chcd_init() {

	return Init::instance();

}

// Run an instance of the class.
chcd_init();