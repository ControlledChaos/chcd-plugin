<?php
/**
 * Head scripts.
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
 * Head scripts.
 *
 * @since  1.0.0
 * @access public
 */
class Head_Scripts {

    /**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
    public function __construct() {

        // Remove WP versions from stylesheets and scripts.
        add_filter( 'style_loader_src', [ $this, 'remove_ver_css_js' ], 999 );
		add_filter( 'script_loader_src', [ $this, 'remove_ver_css_js' ], 999 );

		// Disable emoji script.
		add_action( 'init', [ $this, 'disable_emojis' ] );

    }

    /**
     * Remove WP versions from stylesheets and scripts.
	 *
	 * Only if the option is selected on the Script Options page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string $src Path to the file.
	 * @return null
     */
	public function remove_ver_css_js( $src ) {

		if ( get_option( 'chcd_remove_script_verion' ) && strpos( $src, 'ver=' ) ) {
			$src = remove_query_arg( 'ver', $src );
		}

		return $src;

	}

	/**
	 * Disable emoji script.
	 *
	 * Emojis will still work in modern browsers. This removes the script
	 * that makes emojis work in old browser.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function disable_emojis() {

		// Check if the disable option is checked.
		if ( get_option( 'chcd_remove_emoji_script' ) ) {

			remove_action( 'admin_print_styles', 'print_emoji_styles' );
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

		}

	}

}

// Run an instance of the class.
new Head_Scripts;
