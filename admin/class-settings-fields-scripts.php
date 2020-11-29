<?php
/**
 * Settings fields for script loading and more.
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
 * Settings fields for script loading and more.
 *
 * @since  1.0.0
 * @access public
 */
class Settings_Fields_Scripts {

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

		// Register settings.
		add_action( 'admin_init', [ $this, 'settings' ] );

		// Include jQuery Migrate.
		$migrate = get_option( 'chcd_jquery_migrate' );
		if ( ! $migrate ) {
			add_action( 'wp_default_scripts', [ $this, 'include_jquery_migrate' ] );
		}

	}

	/**
	 * Register settings via the WordPress/ClassicPress Settings API.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function settings() {

		/**
		 * Generl script options.
		 */
		add_settings_section( 'chcd-scripts-general', __( 'General Options', chcd_plugin() :: DOMAIN ), [ $this, 'scripts_general_section_callback' ], 'chcd-scripts-general' );

		// Inline scripts.
		add_settings_field( 'chcd_inline_scripts', __( 'Inline Scripts', chcd_plugin() :: DOMAIN ), [ $this, 'chcd_inline_scripts_callback' ], 'chcd-scripts-general', 'chcd-scripts-general', [ esc_html__( 'Add script contents to footer', chcd_plugin() :: DOMAIN ) ] );

		register_setting(
			'chcd-scripts-general',
			'chcd_inline_scripts'
		);

		// Inline styles.
		add_settings_field( 'chcd_inline_styles', __( 'Inline Styles', chcd_plugin() :: DOMAIN ), [ $this, 'chcd_inline_styles_callback' ], 'chcd-scripts-general', 'chcd-scripts-general', [ esc_html__( 'Add script-related CSS contents to head', chcd_plugin() :: DOMAIN ) ] );

		register_setting(
			'chcd-scripts-general',
			'chcd_inline_styles'
		);

		// Inline jQuery.
		add_settings_field( 'chcd_inline_jquery', __( 'Inline jQuery', chcd_plugin() :: DOMAIN ), [ $this, 'chcd_inline_jquery_callback' ], 'chcd-scripts-general', 'chcd-scripts-general', [ esc_html__( 'Deregister jQuery and add its contents to footer', chcd_plugin() :: DOMAIN ) ] );

		register_setting(
			'chcd-scripts-general',
			'chcd_inline_jquery'
		);

		// Include jQuery Migrate.
		add_settings_field( 'chcd_jquery_migrate', __( 'jQuery Migrate', chcd_plugin() :: DOMAIN ), [ $this, 'chcd_jquery_migrate_callback' ], 'chcd-scripts-general', 'chcd-scripts-general', [ esc_html__( 'Use jQuery Migrate for backwards compatibility', chcd_plugin() :: DOMAIN ) ] );

		register_setting(
			'chcd-scripts-general',
			'chcd_jquery_migrate'
		);

		// Remove emoji script.
		add_settings_field( 'chcd_remove_emoji_script', __( 'Emoji Script', chcd_plugin() :: DOMAIN ), [ $this, 'remove_emoji_script_callback' ], 'chcd-scripts-general', 'chcd-scripts-general', [ esc_html__( 'Remove emoji script from <head>', chcd_plugin() :: DOMAIN ) ] );

		register_setting(
			'chcd-scripts-general',
			'chcd_remove_emoji_script'
		);

		// Remove WordPress/ClassicPress version appended to script links.
		add_settings_field( 'chcd_remove_script_version', __( 'Script Versions', chcd_plugin() :: DOMAIN ), [ $this, 'remove_script_version_callback' ], 'chcd-scripts-general', 'chcd-scripts-general', [ esc_html__( 'Remove WordPress/ClassicPress version from script and stylesheet links in <head>', chcd_plugin() :: DOMAIN ) ] );

		register_setting(
			'chcd-scripts-general',
			'chcd_remove_script_version'
		);

		// Minify HTML.
		add_settings_field( 'chcd_html_minify', __( 'Minify HTML', chcd_plugin() :: DOMAIN ), [ $this, 'html_minify_callback' ], 'chcd-scripts-general', 'chcd-scripts-general', [ esc_html__( 'Minify HTML source code to increase load speed', chcd_plugin() :: DOMAIN ) ] );

		register_setting(
			'chcd-scripts-general',
			'chcd_html_minify'
		);

		/**
		 * Use included vendor scripts & options.
		 */
		add_settings_section( 'chcd-scripts-vendor', __( 'Included Vendor Scripts', chcd_plugin() :: DOMAIN ), [ $this, 'scripts_vendor_section_callback' ], 'chcd-scripts-vendor' );

		// Use Slick.
		add_settings_field( 'chcd_enqueue_slick', __( 'Slick', chcd_plugin() :: DOMAIN ), [ $this, 'enqueue_slick_callback' ], 'chcd-scripts-vendor', 'chcd-scripts-vendor', [ esc_html__( 'Use Slick script and stylesheets', chcd_plugin() :: DOMAIN ) ] );

		register_setting(
			'chcd-scripts-vendor',
			'chcd_enqueue_slick'
		);

		// Use Tabslet.
		add_settings_field( 'chcd_enqueue_tabslet', __( 'Tabslet', chcd_plugin() :: DOMAIN ), [ $this, 'enqueue_tabslet_callback' ], 'chcd-scripts-vendor', 'chcd-scripts-vendor', [ esc_html__( 'Use Tabslet script', chcd_plugin() :: DOMAIN ) ] );

		register_setting(
			'chcd-scripts-vendor',
			'chcd_enqueue_tabslet'
		);

		// Use Sticky-kit.
		add_settings_field( 'chcd_enqueue_stickykit', __( 'Sticky-kit', chcd_plugin() :: DOMAIN ), [ $this, 'enqueue_stickykit_callback' ], 'chcd-scripts-vendor', 'chcd-scripts-vendor', [ esc_html__( 'Use Sticky-kit script', chcd_plugin() :: DOMAIN ) ] );

		register_setting(
			'chcd-scripts-vendor',
			'chcd_enqueue_stickykit'
		);

		/**
		 * Use Tooltipster.
		 *
		 * @todo Add option to enqueue on the backend.
		 */
		add_settings_field( 'chcd_enqueue_tooltipster', __( 'Tooltipster', chcd_plugin() :: DOMAIN ), [ $this, 'enqueue_tooltipster_callback' ], 'chcd-scripts-vendor', 'chcd-scripts-vendor', [ esc_html__( 'Use Tooltipster script and stylesheet', chcd_plugin() :: DOMAIN ) ] );

		register_setting(
			'chcd-scripts-vendor',
			'chcd_enqueue_tooltipster'
		);

		// Site Settings section.
		if ( chcd_acf_options() ) {

			add_settings_section( 'chcd-registered-fields-activate', __( 'Registered Fields Activation', chcd_plugin() :: DOMAIN ), [ $this, 'registered_fields_activate' ], 'chcd-registered-fields-activate' );

			add_settings_field( 'chcd_acf_activate_settings_page', __( 'Site Settings Page', chcd_plugin() :: DOMAIN ), [ $this, 'registered_fields_page_callback' ], 'chcd-registered-fields-activate', 'chcd-registered-fields-activate', [ __( 'Deactive the field group for the "Site Settings" options page.', chcd_plugin() :: DOMAIN ) ] );

			register_setting(
				'chcd-registered-fields-activate',
				'chcd_acf_activate_settings_page'
			);

		}

	}

	/**
	 * General section callback.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function scripts_general_section_callback( $args ) {

		$html = sprintf( '<p>%1s</p>', esc_html__( 'Inline settings only apply to scripts and styles included with the plugin.' ) );

		echo $html;

	}

	/**
	 * Inline jQuery.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function chcd_inline_jquery_callback( $args ) {

		$option = get_option( 'chcd_inline_jquery' );

		$html = '<p><input type="checkbox" id="chcd_inline_jquery" name="chcd_inline_jquery" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="chcd_inline_jquery"> '  . $args[0] . '</label><br />';

		$html .= '<small><em>This may break the functionality of plugins that put scripts in the head</em>.</small></p>';

		echo $html;

	}

	/**
	 * Include jQuery Migrate.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function chcd_jquery_migrate_callback( $args ) {

		$option = get_option( 'chcd_jquery_migrate' );

		$html = '<p><input type="checkbox" id="chcd_jquery_migrate" name="chcd_jquery_migrate" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="chcd_jquery_migrate"> '  . $args[0] . '</label><br />';

		$html .= '<small><em>Some outdated plugins and themes may be dependent on an old version of jQuery</em></small></p>';

		echo $html;

	}

	/**
	 * Inline scripts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function chcd_inline_scripts_callback( $args ) {

		$option = get_option( 'chcd_inline_scripts' );

		$html = '<p><input type="checkbox" id="chcd_inline_scripts" name="chcd_inline_scripts" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="chcd_inline_scripts"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Inline styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function chcd_inline_styles_callback( $args ) {

		$option = get_option( 'chcd_inline_styles' );

		$html = '<p><input type="checkbox" id="chcd_inline_styles" name="chcd_inline_styles" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="chcd_inline_styles"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Remove emoji script.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function remove_emoji_script_callback( $args ) {

		$option = get_option( 'chcd_remove_emoji_script' );

		$html = '<p><input type="checkbox" id="chcd_remove_emoji_script" name="chcd_remove_emoji_script" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="chcd_remove_emoji_script"> '  . $args[0] . '</label><br />';

		$html .= '<small><em>Emojis will still work in modern browsers</em></small></p>';

		echo $html;

	}

	/**
	 * Script options and enqueue settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function remove_script_version_callback( $args ) {

		$option = get_option( 'chcd_remove_script_version' );

		$html = '<p><input type="checkbox" id="chcd_remove_script_version" name="chcd_remove_script_version" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="chcd_remove_script_version"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Minify HTML source code.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function html_minify_callback( $args ) {

		$option = get_option( 'chcd_html_minify' );

		$html = '<p><input type="checkbox" id="chcd_html_minify" name="chcd_html_minify" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="chcd_html_minify"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Vendor section callback.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function scripts_vendor_section_callback( $args ) {

		$html = sprintf( '<p>%1s</p>', esc_html__( 'Look for Fancybox options on the Media Settings page.' ) );

		echo $html;

	}

	/**
	 * Use Slick.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function enqueue_slick_callback( $args ) {

		$option = get_option( 'chcd_enqueue_slick' );

		$html = '<p><input type="checkbox" id="chcd_enqueue_slick" name="chcd_enqueue_slick" value="1" ' . checked( 1, $option, false ) . '/>';
		$html .= sprintf(
			'<label for="chcd_enqueue_slick"> %1s</label> <a href="%2s" target="_blank" class="tooltip" title="%3s"><span class="dashicons dashicons-editor-help"></span></a>',
			$args[0],
			esc_attr( esc_url( 'http://kenwheeler.github.io/slick/' ) ),
			esc_attr( __( 'Learn more about Slick', chcd_plugin() :: DOMAIN ) )
		);
		$html .= '</p>';

		echo $html;

	}

	/**
	 * Use Tabslet.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function enqueue_tabslet_callback( $args ) {

		$option = get_option( 'chcd_enqueue_tabslet' );

		$html = '<p><input type="checkbox" id="chcd_enqueue_tabslet" name="chcd_enqueue_tabslet" value="1" ' . checked( 1, $option, false ) . '/>';
		$html .= sprintf(
			'<label for="chcd_enqueue_tabslet"> %1s</label> <a href="%2s" target="_blank" class="tooltip" title="%3s"><span class="dashicons dashicons-editor-help"></span></a>',
			$args[0],
			esc_attr( esc_url( 'http://vdw.github.io/Tabslet/' ) ),
			esc_attr( __( 'Learn more about Tabslet', chcd_plugin() :: DOMAIN ) )
		);
		$html .= '</p>';

		echo $html;

	}

	/**
	 * Use Sticky-kit.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function enqueue_stickykit_callback( $args ) {

		$option = get_option( 'chcd_enqueue_stickykit' );

		$html = '<p><input type="checkbox" id="chcd_enqueue_stickykit" name="chcd_enqueue_stickykit" value="1" ' . checked( 1, $option, false ) . '/>';
		$html .= sprintf(
			'<label for="chcd_enqueue_stickykit"> %1s</label> <a href="%2s" target="_blank" class="tooltip" title="%3s"><span class="dashicons dashicons-editor-help"></span></a>',
			$args[0],
			esc_attr( esc_url( 'http://leafo.net/sticky-kit/' ) ),
			esc_attr( __( 'Learn more about Sticky-kit', chcd_plugin() :: DOMAIN ) )
		);
		$html .= '</p>';

		echo $html;

	}

	/**
	 * Use Tooltipster.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function enqueue_tooltipster_callback( $args ) {

		$option = get_option( 'chcd_enqueue_tooltipster' );

		$html = '<p><input type="checkbox" id="chcd_enqueue_tooltipster" name="chcd_enqueue_tooltipster" value="1" ' . checked( 1, $option, false ) . '/>';
		$html .= sprintf(
			'<label for="chcd_enqueue_tooltipster"> %1s</label> <a href="%2s" target="_blank" class="tooltip" title="%3s"><span class="dashicons dashicons-editor-help"></span></a>',
			$args[0],
			esc_attr( esc_url( 'http://iamceege.github.io/tooltipster/' ) ),
			esc_attr( __( 'Learn more about Tooltipster', chcd_plugin() :: DOMAIN ) )
		);
		$html .= '</p>';

		echo $html;

	}

	/**
	 * Site Settings section.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function registered_fields_activate() {

		if ( chcd_acf_options() ) {

			echo sprintf( '<p>%1s</p>', esc_html( 'The Controlled Chaos plugin registers custom fields for Advanced Custom Fields Pro that can be imported for editing. These built-in field goups must be deactivated for the imported field groups to take effect.', chcd_plugin() :: DOMAIN ) );

		}

	}

	/**
	 * Site Settings section callback.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function registered_fields_page_callback( $args ) {

		if ( chcd_acf_options() ) {

			$html = '<p><input type="checkbox" id="chcd_acf_activate_settings_page" name="chcd_acf_activate_settings_page" value="1" ' . checked( 1, get_option( 'chcd_acf_activate_settings_page' ), false ) . '/>';

			$html .= '<label for="chcd_acf_activate_settings_page"> '  . $args[0] . '</label></p>';

			echo $html;

		}

	}

	/**
	 * Include jQuery Migrate.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
    public function include_jquery_migrate( $scripts ) {

		if ( ! empty( $scripts->registered['jquery'] ) ) {

			$scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, [ 'jquery-migrate' ] );

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
function chcd_settings_fields_scripts() {

	return Settings_Fields_Scripts::instance();

}

// Run an instance of the class.
chcd_settings_fields_scripts();