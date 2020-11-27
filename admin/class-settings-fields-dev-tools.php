<?php
/**
 * Settings fields for site development.
 *
 * @package    CHCD_Plugin
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @todo       Add a "Dev Mode", functionality to be determined.
 * @todo       Finish converting the debug plugin to work with a setting.
 */

namespace CHCD_Plugin\Plugin_Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Settings fields for site development.
 *
 * @since  1.0.0
 * @access public
 */
class Settings_Fields_Dev_Tools {

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

		// Start settings for page.
		add_action( 'admin_init', [ $this, 'dev_settings' ] );

	}

	/**
	 * Settings for the development page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function dev_settings() {

		/**
		 * Site development.
		 */

		// Site development settings section.
		add_settings_section(
			'chcd-site-development-general',
			__( 'General Website Development', 'chcd-plugin' ),
			[ $this, 'site_development_section_callback' ],
			'chcd-site-development-general'
		);

		// Site development settings field.
		add_settings_field(
			'chcd_site_development',
			__( 'Debug Mode', 'chcd-plugin' ),
			[ $this, 'chcd_site_development_callback' ],
			'chcd-site-development-general',
			'chcd-site-development-general',
			[ esc_html__( 'Put the site in Debug Mode via wp-config.', 'chcd-plugin' ) ]
		);

		// Register the Site development field.
		register_setting(
			'chcd-site-development-general',
			'chcd_site_development'
		);

		// Live theme test settings field.
		add_settings_field(
			'chcd_theme_test',
			__( 'Live Theme Test', 'chcd-plugin' ),
			[ $this, 'chcd_theme_test_callback' ],
			'chcd-site-development-general',
			'chcd-site-development-general',
			[ esc_html__( 'Find the theme test page under Appearances.', 'chcd-plugin' ) ]
		);

		// Register the live theme test field.
		register_setting(
			'chcd-site-development-general',
			'chcd_theme_test'
		);

		// Customizer reset settings field.
		add_settings_field(
			'chcd_customizer_reset',
			__( 'Customizer Reset', 'chcd-plugin' ),
			[ $this, 'chcd_customizer_reset_callback' ],
			'chcd-site-development-general',
			'chcd-site-development-general',
			[ esc_html__( 'Add a reset button to the Customizer for getting a fresh start.', 'chcd-plugin' ) ]
		);

		// Register the Customizer reset field.
		register_setting(
			'chcd-site-development-general',
			'chcd_customizer_reset'
		);

		// Database reset settings field.
		add_settings_field(
			'chcd_database_reset',
			__( 'Database Reset', 'chcd-plugin' ),
			[ $this, 'chcd_database_reset_callback' ],
			'chcd-site-development-general',
			'chcd-site-development-general',
			[ esc_html__( 'Add a tool to reset select tables or all of the database.', 'chcd-plugin' ) ]
		);

		// Register the database reset field.
		register_setting(
			'chcd-site-development-general',
			'chcd_database_reset'
		);

		// RTL (right to left) test settings field.
		add_settings_field(
			'chcd_rtl_test',
			__( 'RTL (Right to Left) Test', 'chcd-plugin' ),
			[ $this, 'chcd_rtl_test_callback' ],
			'chcd-site-development-general',
			'chcd-site-development-general',
			[ esc_html__( 'Add RTL button to the toolbar to test layout in languages that read right to left.', 'chcd-plugin' ) ]
		);

		// Register the RTL test field.
		register_setting(
			'chcd-site-development-general',
			'chcd_rtl_test'
		);

	}

	/**
	 * Site development section callback.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Holds the settings section array.
	 * @return string Returns the section HTML.
	 */
	public function site_development_section_callback( $args ) {

		$html = sprintf(
			'<p>%1s</p>',
			esc_html__( '', 'chcd-plugin' )
		);

		echo $html;

	}

	/**
	 * Site development field callback.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Holds the settings field array.
	 * @return string Returns the field HTML.
	 */
	public function chcd_site_development_callback( $args ) {

		$option = get_option( 'chcd_site_development' );

		$html   = '<p><input type="checkbox" id="chcd_site_development" name="chcd_site_development" value="1" ' . checked( 1, $option, false ) . '/>';
		$html  .= '<label for="chcd_site_development"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Live theme test field callback.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Holds the settings field array.
	 * @return string Returns the field HTML.
	 */
	public function chcd_theme_test_callback( $args ) {

		$option = get_option( 'chcd_theme_test' );

		$html   = '<p><input type="checkbox" id="chcd_theme_test" name="chcd_theme_test" value="1" ' . checked( 1, $option, false ) . '/>';
		$html  .= sprintf(
			'<label for="chcd_theme_test">%1s</label></p>',
			$args[0]
		 );

		echo $html;

	}

	/**
	 * Customizer reset field callback.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Holds the settings field array.
	 * @return string Returns the field HTML.
	 */
	public function chcd_customizer_reset_callback( $args ) {

		$option = get_option( 'chcd_customizer_reset' );

		$html   = '<p><input type="checkbox" id="chcd_customizer_reset" name="chcd_customizer_reset" value="1" ' . checked( 1, $option, false ) . '/>';
		$html  .= sprintf(
			'<label for="chcd_customizer_reset">%1s</label></p>',
			$args[0]
		 );

		echo $html;

	}

	/**
	 * Database reset field callback.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Holds the settings field array.
	 * @return string Returns the field HTML.
	 */
	public function chcd_database_reset_callback( $args ) {

		$option = get_option( 'chcd_database_reset' );

		$html   = '<p><input type="checkbox" id="chcd_database_reset" name="chcd_database_reset" value="1" ' . checked( 1, $option, false ) . '/>';
		$html  .= sprintf(
			'<label for="chcd_database_reset">%1s</label></p>',
			$args[0]
		 );

		echo $html;

	}

	/**
	 * RTL test field callback.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Holds the settings field array.
	 * @return string Returns the field HTML.
	 */
	public function chcd_rtl_test_callback( $args ) {

		$option = get_option( 'chcd_rtl_test' );

		$html   = '<p><input type="checkbox" id="chcd_rtl_test" name="chcd_rtl_test" value="1" ' . checked( 1, $option, false ) . '/>';
		$html  .= sprintf(
			'<label for="chcd_rtl_test">%1s</label> <a href="%2s" target="_blank" class="tooltip" title="%3s"><span class="dashicons dashicons-editor-help"></span></a></p>',
			$args[0],
			esc_url( 'https://codex.wordpress.org/Right_to_Left_Language_Support' ),
			__( 'Read more in the WordPress Codex (also applies to ClassicPress)', 'chcd-plugin' )
		 );

		echo $html;

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function chcd_settings_fields_dev_tools() {

	return Settings_Fields_Dev_Tools::instance();

}

// Run an instance of the class.
chcd_settings_fields_dev_tools();