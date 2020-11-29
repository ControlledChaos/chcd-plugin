<?php
/**
 * Settings for the Meta/SEO tab on the Site Settings page.
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
 * Settings for the Meta/SEO tab.
 *
 * @since  1.0.0
 * @access public
 */
class Settings_Fields_Site_Meta_SEO {

	/**
	 * Holds the values to be used in the fields callbacks.
	 *
	 * @var array
	 */
	private $options;

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

			// Require the class files.
			$instance->dependencies();

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

		// Register settings sections and fields.
		add_action( 'admin_init', [ $this, 'settings' ] );

	}

	/**
	 * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// Callbacks for the Meta/SEO tab.
		require chcd_plugin()->path() . 'admin/partials/field-callbacks/class-meta-seo-callbacks.php';

	}

	/**
	 * Plugin site settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 *
	 * @link  https://codex.wordpress.org/Settings_API
	 */
	public function settings() {

		// Meta/SEO settings section.
		add_settings_section(
			'chcd-site-meta-seo',
			__( 'Meta & SEO Settings', chcd_plugin() :: DOMAIN ),
			[],
			'chcd-site-meta-seo'
		);

		// Disable meta tags.
		add_settings_field(
			'chcd_meta_disable',
			__( 'Meta Tags', chcd_plugin() :: DOMAIN ),
			[ Partials\Field_Callbacks\Meta_SEO_Callbacks::instance(), 'disable_meta' ],
			'chcd-site-meta-seo',
			'chcd-site-meta-seo',
			[ esc_html__( 'Disable if your theme includes SEO meta tags or if you plan on using an SEO plugin.', chcd_plugin() :: DOMAIN ) ]
		);

		register_setting(
			'chcd-site-meta-seo',
			'chcd_meta_disable'
		);

		// Organization Schema type.
		add_settings_field(
			'schema_org_type',
			__( 'Organization Type', chcd_plugin() :: DOMAIN ),
			[ Partials\Field_Callbacks\Meta_SEO_Callbacks::instance(), 'schema_org_type' ],
			'chcd-site-meta-seo',
			'chcd-site-meta-seo',
			[ esc_html__( 'Select a category that generally applies to this website.', chcd_plugin() :: DOMAIN ) ]
		);

		register_setting(
			'chcd-site-meta-seo',
			'schema_org_type'
		);

	}
}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function chcd_settings_fields_site_meta_seo() {

	return Settings_Fields_Site_Meta_SEO::instance();

}

// Run an instance of the class.
chcd_settings_fields_site_meta_seo();