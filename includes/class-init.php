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
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Load the required dependencies for this plugin.
		$this->dependencies();

		// Remove the Draconian capital P filter.
		remove_filter( 'the_title', 'capital_P_dangit', 11 );
		remove_filter( 'the_content', 'capital_P_dangit', 11 );
		remove_filter( 'comment_text', 'capital_P_dangit', 31 );

		// Remove blog.
		add_action( 'admin_menu', [ $this, 'remove_default_post_type' ] );
		add_action( 'admin_bar_menu', [ $this, 'remove_default_post_type_menu_bar' ], 999 );
		add_action( 'wp_dashboard_setup', [ $this, 'remove_draft_widget' ], 999 );
	}

	/**
	 * Remove posts from admin menu
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function remove_default_post_type() {
		remove_menu_page( 'edit.php' );
	}

	/**
	 * Remove posts from admin toolbar
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function remove_default_post_type_menu_bar( $wp_admin_bar ) {
		$wp_admin_bar->remove_node( 'new-post' );
	}

	/**
	 * Remove post quick draft
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function remove_draft_widget(){
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
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
		require_once chcd_plugin()->path() . 'includes/class-i18n.php';

		// Admin/backend functionality, scripts and styles.
		require_once chcd_plugin()->path() . 'admin/class-admin.php';

		// Frontend functionality, scripts and styles.
		require_once chcd_plugin()->path() . 'frontend/class-frontend.php';

		// Various media and media library functionality.
		require_once chcd_plugin()->path() . 'includes/media/class-media.php';

		// Post types and taxonomies.
		require_once chcd_plugin()->path() . 'includes/post-types-taxes/class-post-type-tax.php';

		// User funtionality.
		require_once chcd_plugin()->path() . 'includes/users/class-users.php';
	}
}

// Run an instance of the class.
new Init;
