<?php
/**
 * Enqueue frontend styles.
 *
 * @package    CHCD_Plugin
 * @subpackage Frontend
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CHCD_Plugin\Frontend;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The frontend functionality of the plugin.
 *
 * @since  1.0.0
 * @access public
 */
class Enqueue_Frontend_Styles {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		add_action( 'wp_enqueue_scripts', [ $this, 'styles' ] );
	}

	/**
	 * Enqueue the stylesheets for the frontend of the site.
	 *
	 * Uses the universal slug partial for admin pages. Set this
     * slug in the core plugin file.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function styles() {

		// Non-vendor plugin styles.
		wp_enqueue_style( chcd_plugin() :: VERSION, chcd_plugin()->url() . 'frontend/assets/css/frontend.css', [], chcd_plugin() :: VERSION, 'all' );

		// Fancybox 3.
		if ( get_option( 'chcd_enqueue_fancybox_styles' ) ) {

			/**
			 * Bail if the current theme supports ccd-fancybox by
			 * including its own copy of the Fancybox stylesheet.
			 */
			if ( current_theme_supports( 'ccd-fancybox' ) ) {
				return;
			} else {
				wp_enqueue_style( chcd_plugin() :: VERSION . '-fancybox', chcd_plugin()->url() . 'frontend/assets/css/jquery.fancybox.min.css', [], chcd_plugin() :: VERSION, 'all' );
			}
		}

		// Tooltipster.
		// wp_enqueue_style( chcd_plugin() :: VERSION . '-tooltipster', chcd_plugin()->url() . 'frontend/assets/css/tooltipster.bundle.min.css', [], chcd_plugin() :: VERSION, 'all' );
	}
}

// Run an instance of the class.
new Enqueue_Frontend_Styles;
