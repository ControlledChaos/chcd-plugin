<?php
/**
 * Enqueue frontend scripts.
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
class Enqueue_Frontend_Scripts {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		add_action( 'wp_enqueue_scripts', [ $this, 'scripts' ] );
	}

	/**
	 * Enqueue scripts traditionally by default.
	 *
	 * Uses the universal slug partial for admin pages. Set this
     * slug in the core plugin file.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function scripts() {

		// Non-vendor plugin script. Uncomment to use.
		// wp_enqueue_script( chcd_plugin() :: SLUG, chcd_plugin()->url() . 'frontend/assets/js/frontend.js', [ 'jquery' ], chcd_plugin() :: VERSION, true );

		// Fancybox 3.
		if ( get_option( 'chcd_enqueue_fancybox_script' ) ) {
			wp_enqueue_script( chcd_plugin() :: SLUG . '-fancybox', chcd_plugin()->url() . 'frontend/assets/js/jquery.fancybox.min.js', [ 'jquery' ], chcd_plugin() :: VERSION, true );
		}

		// Tabslet.
		wp_enqueue_script( chcd_plugin() :: SLUG . '-tabslet', chcd_plugin()->url() . 'frontend/assets/js/jquery.tabslet.min.js', [ 'jquery' ], chcd_plugin() :: VERSION, true );

		// Tooltipster.
		// wp_enqueue_script( chcd_plugin() :: SLUG . '-tooltipster', chcd_plugin()->url() . 'frontend/assets/js/tooltipster.bundle.min.js', [ 'jquery' ], chcd_plugin() :: VERSION, true );

		// FitVids.
		wp_enqueue_script( chcd_plugin() :: SLUG . '-fitvids', chcd_plugin()->url() . 'frontend/assets/js/jquery.fitvids.min.js', [ 'jquery' ], chcd_plugin() :: VERSION, true );

	}
}

// Run an instance of the class.
new Enqueue_Frontend_Scripts;
