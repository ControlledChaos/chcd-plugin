<?php
/**
 * Courtney Plugin
 *
 * @package     CHCD_Plugin
 * @version     1.0.0
 * @author      Greg Sweet <greg@ccdzine.com>
 * @copyright   Copyright © 2018, Greg Sweet
 * @link        https://github.com/ControlledChaos/chcd-plugin
 * @link        https://controlledchaos.github.io/chcd-plugin/
 * @license     GPL-3.0+ http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * Plugin Name:  Courtney Plugin
 * Plugin URI:   https://controlledchaos.github.io/chcd-plugin/
 * Description:  A ClassicPress/WordPress plugin for the Courtney Hoffman Costume Designer website.
 * Version:      1.0.0
 * Author:       Controlled Chaos Design
 * Author URI:   https://ccdzine.com/
 * License:      GPL-3.0+
 * License URI:  https://www.gnu.org/licenses/gpl.txt
 * Text Domain:  chcd-plugin
 * Domain Path:  /languages
 * Tested up to: 5.2.2
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class
 *
 * Defines constants, gets the initialization class file
 * plus the activation and deactivation classes.
 *
 * @since  1.0.0
 * @access public
 */

// First check for other classes with the same name.
if ( ! class_exists( 'CHCD' ) ) :
	final class CHCD {

		/**
		 * Plugin version
		 *
		 * @since  1.0.0
		 * @return string Returns the latest plugin version.
		 */
		const VERSION = '1.0.0';

		/**
		 * Text domain
		 *
		 * @since  1.0.0
		 * @return string Returns the text domain of the plugin.
		 */
		const DOMAIN = 'chcd-plugin';

		/**
		 * Universal slug
		 *
		 * This URL slug is used for various plugin admin & settings pages.
		 *
		 * The prefix will change in your search & replace in renaming the plugin.
		 * Change the second part of the define(), here as chcd_plugin() :: DOMAIN,
		 * to your preferred page slug.
		 *
		 * @since  1.0.0
		 * @return string Returns the URL slug of the admin pages.
		 */
		const SLUG = 'chcd-plugin';

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

				// Require the core plugin class files.
				$instance->dependencies();
			}

			// Return the instance.
			return $instance;
		}

		/**
		 * Constructor method
		 *
		 * @since  1.0.0
		 * @access protected
		 * @return self
		 */
		protected function __construct() {}

		/**
		 * Plugin folder path
		 *
		 * @since  1.0.0
		 * @access public
		 * @return string Returns the filesystem directory path (with trailing slash)
		 *                for the plugin __FILE__ passed in.
		 */
		public function path() {
			return plugin_dir_path( __FILE__ );
		}

		/**
		 * Plugin folder URL
		 *
		 * @since  1.0.0
		 * @access public
		 * @return string Returns the URL directory path (with trailing slash)
		 *                for the plugin __FILE__ passed in.
		 */
		public function url() {
			return plugin_dir_url( __FILE__ );
		}

		/**
		 * Default meta image
		 *
		 * Change the path and file name to suit your needs.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return string Returns the URL of the image.
		 */
		public function default_meta_image() {
			return plugins_url( 'frontend/assets/images/default-meta-image.jpg', __FILE__ );
		}

		/**
		 * Throw error on object clone.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function __clone() {

			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'This is not allowed.', $this :: DOMAIN ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function __wakeup() {

			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'This is not allowed.', $this :: DOMAIN ), '1.0.0' );
		}

		/**
		 * Require the core plugin class files.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void Gets the file which contains the core plugin class.
		 */
		private function dependencies() {

			// The hub of all other dependency files.
			require_once $this->path() . 'includes/class-init.php';

			// Include the activation class.
			require_once $this->path() . 'includes/class-activate.php';

			// Include the deactivation class.
			require_once $this->path() . 'includes/class-deactivate.php';
		}
	}
	// End core plugin class.

	/**
	 * Put an instance of the plugin class into a function.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance of the `CHCD_Plugin` class.
	 */
	function chcd_plugin() {
		return CHCD::instance();
	}

	// Begin plugin functionality.
	chcd_plugin();

// End the check for the plugin class.
endif;

/**
 * Register the activaction & deactivation hooks.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
register_activation_hook( __FILE__, '\chcd_activate_plugin' );
register_deactivation_hook( __FILE__, '\chcd_deactivate_plugin' );

/**
 * The code that runs during plugin activation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function chcd_activate_plugin() {

	// Run the activation class.
	chcd_activate();
}

// Bail out now if the core class was not run.
if ( ! function_exists( 'chcd_plugin' ) ) {
	return;
}

/**
 * The code that runs during plugin deactivation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function chcd_deactivate_plugin() {

	// Run the deactivation class.
	chcd_deactivate();
}

/**
 * Add a link to the plugin's about page on the plugins page.
 *
 * The about page in its original form is intended to be read by
 * developers for getting familiar with the plugin, so it is
 * included in the admin menu under plugins.
 *
 * If you would like to link the page elsewhere as you make it your own then
 * do so in admin/class-admin-pages.php, in the about_plugin method.
 *
 * Uses the universal slug partial for admin pages. Set this
 * slug in the core plugin file.
 *
 * @param  array $links Default plugin links on the 'Plugins' admin page.
 * @since  1.0.0
 * @access public
 * @return mixed[] Returns an HTML string for the about page link.
 *                 Returns an array of the about link with the default plugin links.
 * @link   https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
 */
function chcd_about_link( $links ) {

	/**
	 * Site about page link depends on the admin menu setting.
	 *
	 * @since  1.0.0
	 * @return string returns the URL of the page with parent or not.
	 */

	if ( is_admin() ) {

		// If Advanced Custom Fields is active.
		if ( chcd_acf_options() ) {

			// Get the field.
			$acf_position = get_field( 'chcd_site_plugin_link_position', 'option' );

			// Return true if the field is set to `top`.
			if ( 'top' == $acf_position ) {
				$position = true;

			// Otherwise return `false`.
			} else {
				$position = false;
			}

		// If ACF is not active, get the field from the WordPress options page.
		} else {

			// Get the field.
			$position = get_option( 'chcd_site_plugin_link_position' );
		}

		if ( true == $position ) {
			$url = admin_url( 'index.php?page=' . chcd_plugin() :: SLUG . '-settings' );
		} else {
			$url = admin_url( 'admin.php?page=' . chcd_plugin() :: SLUG . '-settings' );
		}

		// Create new settings link array as a variable.
		$about_page = [
			sprintf(
				'<a href="%1s" class="' . chcd_plugin() :: SLUG . '-page-link">%2s</a>',
				admin_url( 'plugins.php?page=' . chcd_plugin() :: SLUG . '-page' ),
				esc_attr( 'Documentation', $this :: DOMAIN )
			),
		];

		// Merge the new settings array with the default array.
		return array_merge( $about_page, $links );

	}
}
// Filter the default settings links with new array.
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'chcd_about_link' );

/**
 * Add links to the plugin settings pages on the plugins page.
 *
 * Change the links to those which fill your needs.
 *
 * Uses the universal slug partial for admin pages. Set this
 * slug in the core plugin file.
 *
 * @param  array  $links Default plugin links on the 'Plugins' admin page.
 * @param  object $file Reference the root plugin file with header.
 * @since  1.0.0
 * @return mixed[] Returns HTML strings for the settings pages link.
 *                 Returns an array of custom links with the default plugin links.
 * @link   https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
 */
function chcd_settings_links( $links, $file ) {

	if ( is_admin() ) {

		/**
		 * Site settings page link depends on the admin menu setting.
		 *
		 * @since  1.0.0
		 * @return string returns the URL of the page with parent or not.
		 */

		// If Advanced Custom Fields is active.
		if ( chcd_acf_options() ) {

			// Get the field.
			$acf_position = get_field( 'chcd_settings_link_position', 'option' );

			// Return true if the field is set to `top`.
			if ( 'top' == $acf_position ) {
				$position = true;

			// Otherwise return `false`.
			} else {
				$position = false;
			}

		// If ACF is not active, get the field from the WordPress options page.
		} else {

			// Get the field.
			$position = get_option( 'chcd_site_settings_position' );
		}

		if ( $position || true == $position ) {
			$url = admin_url( 'admin.php?page=' . chcd_plugin() :: SLUG . '-settings' );
		} else {
			$url = admin_url( 'index.php?page=' . chcd_plugin() :: SLUG . '-settings' );
		}

		if ( $file == plugin_basename( __FILE__ ) ) {

			// Add links to settings pages.
			$links[] = sprintf(
				'<a href="%1s" class="' . chcd_plugin() :: SLUG . '-settings-link">%2s</a>',
				$url,
				esc_attr( 'Site Settings', $this :: DOMAIN )
			);
			$links[] = sprintf(
				'<a href="%1s" class="' . chcd_plugin() :: SLUG . '-scripts-link">%2s</a>',
				admin_url( 'options-general.php?page=' . chcd_plugin() :: SLUG . '-scripts' ),
				esc_attr( 'Script Options', $this :: DOMAIN )
			);
		}

		// Return the full array of links.
		return $links;

	}
}
add_filter( 'plugin_row_meta', 'chcd_settings_links', 10, 2 );

/**
 * Check if WordPress is 5.0 or greater.
 *
 * @since  1.0.0
 * @access public
 * @return bool Returns true if the WordPress version is 5.0 or greater.
 */
function chcd_new_cms() {

	// Get the WordPress version.
	$version = get_bloginfo( 'version' );

	if ( $version >= 5.0 ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if the CMS is ClassicPress.
 *
 * @since  1.0.0
 * @access public
 * @return bool Returns true if ClassicPress is running.
 */
function chcd_classicpress() {

	if ( function_exists( 'classicpress_version' ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check for Advanced Custom Fields
 *
 * @since  1.0.0
 * @access public
 * @return bool Returns true if the ACF free or Pro plugin is active.
 */
function chcd_acf() {

	if ( class_exists( 'acf' ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check for Advanced Custom Fields Pro
 *
 * @since  1.0.0
 * @access public
 * @return bool Returns true if the ACF Pro plugin is active.
 */
function chcd_acf_pro() {

	if ( class_exists( 'acf_pro' ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check for Advanced Custom Fields options page
 *
 * @since  1.0.0
 * @access public
 * @return bool Returns true if ACF 4.0 free plus the
 *              Options Page addon or Pro plugin is active.
 */
function chcd_acf_options() {

	if ( class_exists( 'acf_pro' ) ) {
		return true;
	} elseif ( ( class_exists( 'acf' ) && class_exists( 'acf_options_page' ) ) ) {
		return true;
	} else {
		return false;
	}
}
