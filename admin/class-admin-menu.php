<?php
/**
 * Admin menu functions.
 *
 * @package    CHCD_Plugin
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CHCD_Plugin\Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Admin menu functions.
 *
 * @since  1.0.0
 * @access public
 */
class Admin_Menu {

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

		}

		// Return the instance.
		return $instance;
	}

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Remove menu items.
		add_action( 'admin_menu', [ $this, 'hide' ] );

		// Hide ACF field groups UI.
		if ( chcd_acf_options() ) {

			$options = get_field( 'chcd_admin_hide_links', 'option' );
			if ( $options && in_array( 'fields', $options ) ) {
				add_filter( 'acf/settings/show_admin', '__return_false' );
			}
		}

		// Move the Menus & Widgets menu items.
		add_action( 'admin_menu', [ $this, 'nav_menus' ] );

		// Set the new parent file URL.
		add_filter( 'parent_file', [ $this, 'set_parent_file' ] );

		// Set the user capability for the pages.
		add_filter( 'user_has_cap', [ $this, 'set_capability' ], 20, 4 );
	}

	/**
	 * Remove menu items.
	 *
	 * Check for the Advanced Custom Fields PRO plugin, or the Options Page
	 * addon for free ACF. Use ACF options from the ACF 'Site Settings' page,
	 * otherwise use the options from the standard 'Site Settings' page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function hide() {

		/**
		 * If Advanced Custom Fields is active.
		 */
		if ( chcd_acf_options() ) {

			// Get the multiple checkbox field.
			$options = get_field( 'chcd_admin_hide_links', 'option' );

			// Hide Appearance link.
			if ( $options && in_array( 'themes', $options ) ) {
				remove_menu_page( 'themes.php' );
			}

			// Hide Plugins link.
			if ( $options && in_array( 'plugins', $options ) ) {
				remove_menu_page( 'plugins.php' );
			}

			// Hide Users link.
			if ( $options && in_array( 'users', $options ) ) {
				remove_menu_page( 'users.php' );
			}

			// Hide Tools link.
			if ( $options && in_array( 'tools', $options ) ) {
				remove_menu_page( 'tools.php' );
			}

		} else {

			/**
			 * If Advanced Custom Fields is not active.
			 */

			// Get options.
			$appearance = get_option( 'chcd_hide_appearance' );
			$plugins    = get_option( 'chcd_hide_plugins' );
			$users      = get_option( 'chcd_hide_users' );
			$tools      = get_option( 'chcd_hide_tools' );

			// Hide Appearance link.
			if ( $appearance ) {
				remove_menu_page( 'themes.php' );
			}

			// Hide Plugins link.
			if ( $plugins ) {
				remove_menu_page( 'plugins.php' );
			}

			// Hide Users link.
			if ( $users ) {
				remove_menu_page( 'users.php' );
			}

			// Hide Tools link.
			if ( $tools ) {
				remove_menu_page( 'tools.php' );
			}
		}
	}

	/**
	 * Navigation menus position.
	 *
	 * Check for the Advanced Custom Fields PRO plugin, or the Options Page
	 * addon for free ACF. Use ACF options from the ACF 'Site Settings' page,
	 * otherwise use the options from the standard 'Site Settings' page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @global array menu The admin menu array.
	 * @global array submenu The admin submenu array.
	 * @return void
	 */
	public function nav_menus() {

		global $menu, $submenu;

		// If ACF is active.
		if ( chcd_acf_options() ) {

			// Get the ACF field registered by this plugin.
			$menus_link   = get_field( 'chcd_menus_position', 'option' );

			// Remove Menus as submenu items of Appearances.
			if ( isset( $submenu['themes.php'] ) ) {

				// Look for menu items under Appearances.
				foreach ( $submenu['themes.php'] as $key => $item ) {

					// Unset Menus if it is found.
					if ( $item[2] === 'nav-menus.php' && 'top' == $menus_link ) {
						unset( $submenu['themes.php'][$key] );
					}
				}
			}

			// Get the current user info.
			$user = wp_get_current_user();

			// If the user can access the theme editor, remove that page.
			if ( in_array( 'editor', $user->roles ) ) {
				unset( $menu[60] );
			}

			// Add a new top-level Menus page.
			if ( 'top' == $menus_link ) {
				add_menu_page(
					__( 'Menus', chcd_plugin() :: DOMAIN ),
					__( 'Menus', chcd_plugin() :: DOMAIN ),
					'delete_others_pages',
					'nav-menus.php',
					'',
					'dashicons-list-view',
					61
				);
			}

		// If ACF is not active.
		} else {

			// Get the options from the standard fields.
			$menus_link   = get_option( 'chcd_menus_position' );

			// Remove Menus as submenu items of Appearances.
			if ( isset( $submenu['themes.php'] ) ) {

				// Look for menu items under Appearances.
				foreach ( $submenu['themes.php'] as $key => $item ) {

					// Unset Menus if it is found.
					if ( $item[2] === 'nav-menus.php' && $menus_link ) {
						unset($submenu['themes.php'][$key] );
					}
				}
			}

			// Get the current user info.
			$user = wp_get_current_user();

			// If the user can access the theme editor, remove that page.
			if ( in_array( 'editor', $user->roles ) ) {
				unset( $menu[60] );
			}

			// Add a new top-level Menus page.
			if ( $menus_link ) {
				add_menu_page(
					__( 'Menus', chcd_plugin() :: DOMAIN ),
					__( 'Menus', chcd_plugin() :: DOMAIN ),
					'delete_others_pages',
					'nav-menus.php',
					'',
					'dashicons-list-view',
					61
				);
			}
		}
	}

	/**
	 * Set the new Menus parent file URL.
	 *
	 * Check for the Advanced Custom Fields PRO plugin, or the Options Page
	 * addon for free ACF. Use ACF options from the ACF 'Site Settings' page,
	 * otherwise use the options from the standard 'Site Settings' page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $parent_file Looks for a parent of the current screen.
	 * @global object current_screen Holds the result of WP_Screen.
	 * @return array Returns the parent page in admin page array (appearances or self).
	 */
	public function set_parent_file( $parent_file ) {

		// Get the current screen to check for parent.
		global $current_screen;

		// If ACF is active.
		if ( chcd_acf_options() ) {

			// Get the ACF field registered by this plugin.
			$menus_link   = get_field( 'chcd_menus_position', 'option' );

			// Set Menus parent as self.
			if ( $current_screen->base == 'nav-menus' && 'default' != $menus_link ) {
				$parent_file = 'nav-menus.php';
			}

			// Return the new parent URL.
			return $parent_file;

		// If ACF is not active.
		} else {

			// Get the options from the standard fields.
			$menus_link   = get_option( 'chcd_menus_position' );

			// Set Menus parent as self.
			if ( $current_screen->base == 'nav-menus' && $menus_link ) {
				$parent_file = 'nav-menus.php';
			}

			// Return the new parent URL.
			return $parent_file;

		}
	}

	/**
	 * Set the user capability for the new Menus and Widgets pages.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $caps Current user capabilities.
	 * @param  mixed $cap Allowed user role.
	 * @param  array $args Arguments for admin menu entries.
	 * @param  object $user Current user info.
	 * @return array Returns the new capabilities.
	 */
	public function set_capability( $caps, $cap, $args, $user ) {

		// Get the URL requented by the user.
		$url = $_SERVER['REQUEST_URI'];

		// Allow Editors access to the Menus page.
		if ( strpos( $url, 'nav-menus.php' ) !== false && in_array( 'edit_theme_options', $cap ) && in_array( 'editor', $user->roles ) ) {
			$caps['edit_theme_options'] = true;
		}

		// Return the new capabilities.
		return $caps;
	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function chcd_admin_menu() {
	return Admin_Menu::instance();
}

// Run an instance of the class.
chcd_admin_menu();
