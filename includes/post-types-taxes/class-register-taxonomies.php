<?php
/**
 * Register taxonomies
 *
 * @package    CHCD_Plugin
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       https://codex.wordpress.org/Function_Reference/register_taxonomy
 */

namespace CHCD_Plugin\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register taxonomies.
 *
 * @since  1.0.0
 * @access public
 */
final class Taxes_Register {

	/**
	 * Constructor magic method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Register custom taxonomies.
		add_action( 'init', [ $this, 'register' ] );

	}

	/**
	 * Register custom taxonomies.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		/**
		 * Taxonomy: Sample taxonomy (Taxonomy).
		 *
		 * Renaming:
		 * Search case "Taxonomy" and replace with your post type singular name.
		 * Search case "Taxonomies" and replace with your post type plural name.
		 * Search case "chcd_taxonomy" and replace with your taxonomy database name.
		 * Search case "taxonomies" and replace with your taxonomy permalink slug.
		 */

		$labels = [
			'name'                       => __( 'Taxonomies', chcd_plugin() :: DOMAIN ),
			'singular_name'              => __( 'Taxonomy', chcd_plugin() :: DOMAIN ),
			'menu_name'                  => __( 'Taxonomy', chcd_plugin() :: DOMAIN ),
			'all_items'                  => __( 'All Taxonomies', chcd_plugin() :: DOMAIN ),
			'edit_item'                  => __( 'Edit Taxonomy', chcd_plugin() :: DOMAIN ),
			'view_item'                  => __( 'View Taxonomy', chcd_plugin() :: DOMAIN ),
			'update_item'                => __( 'Update Taxonomy', chcd_plugin() :: DOMAIN ),
			'add_new_item'               => __( 'Add New Taxonomy', chcd_plugin() :: DOMAIN ),
			'new_item_name'              => __( 'New Taxonomy', chcd_plugin() :: DOMAIN ),
			'parent_item'                => __( 'Parent Taxonomy', chcd_plugin() :: DOMAIN ),
			'parent_item_colon'          => __( 'Parent Taxonomy', chcd_plugin() :: DOMAIN ),
			'popular_items'              => __( 'Popular Taxonomies', chcd_plugin() :: DOMAIN ),
			'separate_items_with_commas' => __( 'Separate Taxonomies with commas', chcd_plugin() :: DOMAIN ),
			'add_or_remove_items'        => __( 'Add or Remove Taxonomies', chcd_plugin() :: DOMAIN ),
			'choose_from_most_used'      => __( 'Choose from the most used Taxonomies', chcd_plugin() :: DOMAIN ),
			'not_found'                  => __( 'No Taxonomies Found', chcd_plugin() :: DOMAIN ),
			'no_terms'                   => __( 'No Taxonomies', chcd_plugin() :: DOMAIN ),
			'items_list_navigation'      => __( 'Taxonomies List Navigation', chcd_plugin() :: DOMAIN ),
			'items_list'                 => __( 'Taxonomies List', chcd_plugin() :: DOMAIN )
		];

		$options = [
			'label'                 => __( 'Taxonomies', chcd_plugin() :: DOMAIN ),
			'labels'                => $labels,
			'public'                => true,
			'hierarchical'          => false,
			'label'                 => 'Taxonomies',
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'query_var'             => true,
			'rewrite'               => [
				'slug'         => 'taxonomies',
				'with_front'   => true,
				'hierarchical' => false,
			],
			'show_admin_column'     => true,
			'show_in_rest'          => false,
			'rest_base'             => 'taxonomies',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
			'show_in_quick_edit'    => true
		];

		/**
		 * Register the taxonomy
		 */
		register_taxonomy(
			'chcd_taxonomy',
			[
				'chcd_post_type' // Change to your post type name.
			],
			$options
		);
	}
}

// Run the class.
$chcd_taxes = new Taxes_Register;
