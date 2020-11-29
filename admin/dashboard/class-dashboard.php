<?php
/**
 * Dashboard functionality.
 *
 * @package    CHCD_Plugin
 * @subpackage Admin\Dashboard
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CHCD_Plugin\Admin\Dashboard;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Dashboard functionality.
 *
 * @since  1.0.0
 * @access public
 */
class Dashboard {

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

		// Remove the welcome panel dismiss button.
		add_action( 'admin_head', [ $this, 'dismiss' ] );

		// Use the custom dashboard panel.
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
		add_action( 'welcome_panel', [ $this, 'dashboard_panel' ], 25 );

		// "At a Glance" dashboard widget.
		add_action( 'dashboard_glance_items', [ $this, 'at_glance' ] );

		// Remove metaboxes.
		add_action( 'wp_dashboard_setup', [ $this, 'metaboxes' ] );

		// Remove screen options.
		add_filter( 'screen_options_show_screen', [ $this, 'remove_screen_options' ], 10, 2 );

		// Remove contextual help content.
		add_action( 'admin_head', [ $this, 'remove_help' ] );

		// Enqueue dashboard stylesheet.
		add_action( 'admin_enqueue_scripts', [ $this, 'styles' ] );
	}

	/**
	 * Remove the welcome panel dismiss button.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function dismiss() {

		$dismiss = '
			<style>
				/*
				* Welcome panel user dismiss option
				* is disabled in the Customizer
				*/
				a.welcome-panel-close, #wp_welcome_panel-hide, .metabox-prefs label[for="wp_welcome_panel-hide"] {
					display: none !important;
				}
				.welcome-panel {
					display: block !important;
				}
			</style>
			';

		echo $dismiss;
	}

	/**
	 * Custom dashboard panel
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function dashboard_panel() {

		$panel = locate_template( 'template-parts/admin/dashboard-panel.php' );

		if ( ! empty( $panel ) ) {
			get_template_part( 'template-parts/admin/dashboard-panel' );
		} else {
			include_once chcd_plugin()->path() . 'admin/dashboard/partials/dashboard-panel.php';
		}
	}

	/**
	 * Add custom post types to "At a Glance" dashboard widget.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function at_glance() {

		// Post type query arguments.
		$args       = [
			'public'   => true,
			'_builtin' => false
		];

		// The type of output to return, either 'names' or 'objects'.
		$output     = 'object';

		// The operator (and/or) to use with multiple $args.
		$operator   = 'and';

		// Get post types according to above.
		$post_types = get_post_types( $args, $output, $operator );

		// Prepare an entry for each post type mathing the query.
		foreach ( $post_types as $post_type ) {

			// Count the number of posts.
			$count  = wp_count_posts( $post_type->name );

			// Get the number of published posts.
			$number = number_format_i18n( $count->publish );

			// Get the plural or single name based on the count.
			$name   = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $count->publish ) );

			// Supply an edit link if the user can edit posts.
			if ( current_user_can( 'edit_posts' ) ) {
				echo sprintf(
					'<li class="post-count %1s-count"><a href="edit.php?post_type=%2s">%3s %4s</a></li>',
					$post_type->name,
					$post_type->name,
					$number,
					$name
				);

			// Otherwise just the count and post type name.
			} else {
				echo sprintf(
					'<li class="post-count %1s-count">%2s %3s</li>',
					$post_type->name,
					$number,
					$name
				);

			}
		}
	}

	/**
	 * Remove Dashboard metaboxes
	 *
	 * @since  1.0.0
	 * @access public
	 * @global array wp_meta_boxes The metaboxes array holds all the widgets for wp-admin.
	 * @return void
	 */
	public function metaboxes() {

		global $wp_meta_boxes;

		// Hide the Welcome panel.
		remove_action( 'welcome_panel', 'wp_welcome_panel' );

		// Hide the WordPress News widget.
		unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );

		// Hide Quick Draft (QuickPress) widget.
		unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );

		// Hide At a Glance widget.
		unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );

		// Hide Site Health widget.
		unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health'] );

		// Hide Activity widget.
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	}

	/**
	 * Removes screen options tab.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  boolean $display_boolean
	 * @param  object $wp_screen_object
	 * @return boolean Returns false for the screens in the array.
	 */
	public function remove_screen_options( $display_boolean, $wp_screen_object ) {

		if ( in_array( $GLOBALS['pagenow'], [ 'index.php' ] ) ) {
			$wp_screen_object->render_screen_layout();
			$wp_screen_object->render_per_page_options();

			return false;
		}

		return true;
	}

	/**
	 * Remove contextual help content.
	 *
	 * Much of the default help content does not apply to
	 * the cleaned up Dashboard so we'll remove it.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function remove_help() {

		// Get the screen ID to target the Dashboard.
		$screen = get_current_screen();

		// Bail if not on the Dashboard screen.
		if ( $screen->id != 'dashboard' ) {
			return;
		}

		// Remove individual content tabs.
		$screen->remove_help_tab( 'overview' );
		$screen->remove_help_tab( 'help-content' );
		$screen->remove_help_tab( 'help-layout' );
		$screen->remove_help_tab( 'help-navigation' );

		// Remove the help sidebar.
		$screen->set_help_sidebar(
			null
		);
	}

	/**
	 * Enqueue dashboard stylesheet.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function styles() {

		// Get the screen ID to target the Dashboard.
		$screen = get_current_screen();

		// Enqueue only on the Dashboard screen.
		if ( $screen->id == 'dashboard' ) {
			wp_enqueue_style( chcd_plugin() :: SLUG . '-dashboard', chcd_plugin()->url() .  'admin/dashboard/assets/css/dashboard.min.css', [], null, 'screen' );
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
function chcd_dashboard() {
	return Dashboard::instance();
}

// Run an instance of the class.
chcd_dashboard();
