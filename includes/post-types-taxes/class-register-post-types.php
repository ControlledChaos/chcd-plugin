<?php
/**
 * Register post types
 *
 * @package    CHCD_Plugin
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       https://codex.wordpress.org/Function_Reference/register_post_type
 */

namespace CHCD_Plugin\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register post types.
 *
 * @since  1.0.0
 * @access public
 */
final class Post_Types_Register {

	/**
	 * Constructor magic method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Register custom post types.
		add_action( 'init', [ $this, 'register' ] );
	}

	/**
	 * Register custom post types.
	 *
	 * Note for WordPress 5.0 or greater:
	 * If you want your post type to adopt the block edit_form_image_editor
	 * rather than using the classic editor then set `show_in_rest` to `true`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		// Text domain for translation.
		$domain = chcd_plugin() :: DOMAIN;

		$labels = [
			'name'                  => __( 'Film + TV', $domain ),
			'singular_name'         => __( 'Film + TV', $domain ),
			'menu_name'             => __( 'Film + TV', $domain ),
			'all_items'             => __( 'All Projects', $domain ),
			'add_new'               => __( 'New Project', $domain ),
			'add_new_item'          => __( 'New Film + TV Project', $domain ),
			'edit_item'             => __( 'Edit Project', $domain ),
			'new_item'              => __( 'New Project', $domain ),
			'view_item'             => __( 'View Project', $domain ),
			'view_items'            => __( 'View Projects', $domain ),
			'search_items'          => __( 'Search Projects', $domain ),
			'not_found'             => __( 'No Projects Found', $domain ),
			'not_found_in_trash'    => __( 'No Projects Found in Trash', $domain ),
			'parent_item_colon'     => __( 'Parent Project', $domain ),
			'featured_image'        => __( 'Featured image for this project', $domain ),
			'set_featured_image'    => __( 'Set featured image for this project', $domain ),
			'remove_featured_image' => __( 'Remove featured image for this project', $domain ),
			'use_featured_image'    => __( 'Use as featured image for this project', $domain ),
			'archives'              => __( 'Project archives', $domain ),
			'insert_into_item'      => __( 'Insert into Project', $domain ),
			'uploaded_to_this_item' => __( 'Uploaded to this Project', $domain ),
			'filter_items_list'     => __( 'Filter Projects', $domain ),
			'items_list_navigation' => __( 'Projects list navigation', $domain ),
			'items_list'            => __( 'Projects List', $domain ),
			'attributes'            => __( 'Project Attributes', $domain ),
			'parent_item_colon'     => __( 'Parent Project', $domain ),
		];

		$args = [
			'label'               => __( 'Film + TV', $domain ),
			'labels'              => $labels,
			'description'         => __( 'Film + TV production projects.', $domain ),
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_rest'        => false,
			'rest_base'           => 'features_rest_api',
			'has_archive'         => true,
			'show_in_menu'        => true,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'hierarchical'        => false,
			'rewrite'             => [
				'slug'       => 'features',
				'with_front' => true
			],
			'query_var'           => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-format-video',
			'supports'            => [
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'page-attributes'
			],
		];
		register_post_type( 'features', $args );

		$labels = [
			'name'                  => __( 'Commercials', $domain ),
			'singular_name'         => __( 'Commercial', $domain ),
			'menu_name'             => __( 'Commercials', $domain ),
			'all_items'             => __( 'All Commercials', $domain ),
			'add_new'               => __( 'New Commercial', $domain ),
			'add_new_item'          => __( 'New Commercial', $domain ),
			'edit_item'             => __( 'Edit Commercial', $domain ),
			'new_item'              => __( 'New Commercial', $domain ),
			'view_item'             => __( 'View Commercial', $domain ),
			'view_items'            => __( 'View Commercials', $domain ),
			'search_items'          => __( 'Search Commercials', $domain ),
			'not_found'             => __( 'No Commercials Found', $domain ),
			'not_found_in_trash'    => __( 'No Commercials Found in Trash', $domain ),
			'parent_item_colon'     => __( 'Parent Commercial', $domain ),
			'featured_image'        => __( 'Featured image for this commercial', $domain ),
			'set_featured_image'    => __( 'Set featured image for this commercial', $domain ),
			'remove_featured_image' => __( 'Remove featured image for this commercial', $domain ),
			'use_featured_image'    => __( 'Use as featured image for this commercial', $domain ),
			'archives'              => __( 'Commercial archives', $domain ),
			'insert_into_item'      => __( 'Insert into Commercial', $domain ),
			'uploaded_to_this_item' => __( 'Uploaded to this Commercial', $domain ),
			'filter_items_list'     => __( 'Filter Commercials', $domain ),
			'items_list_navigation' => __( 'Commercials list navigation', $domain ),
			'items_list'            => __( 'Commercials List', $domain ),
			'attributes'            => __( 'Commercial Attributes', $domain ),
			'parent_item_colon'     => __( 'Parent Commercial', $domain ),
		];

		$args = [
			'label'               => __( 'Commercials', $domain ),
			'labels'              => $labels,
			'description'         => __( 'Television commercial projects.', $domain ),
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_rest'        => false,
			'rest_base'           => 'commercials_rest_api',
			'has_archive'         => true,
			'show_in_menu'        => true,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'hierarchical'        => false,
			'rewrite'             => [
				'slug'       => 'commercials',
				'with_front' => true
			],
			'query_var'           => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-megaphone',
			'supports'            => [
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'page-attributes'
			],
		];
		register_post_type( 'commercials', $args );

		/**
		 * Post Type: Help
		 */

		$labels = [
			'name'                  => __( 'Website Help', $domain ),
			'singular_name'         => __( 'Help Page', $domain ),
			'menu_name'             => __( 'Website Help', $domain ),
			'all_items'             => __( 'All Help Pages', $domain ),
			'add_new'               => __( 'New Help Page', $domain ),
			'add_new_item'          => __( 'New Help Page', $domain ),
			'edit_item'             => __( 'Edit Help Page', $domain ),
			'new_item'              => __( 'New Help Page', $domain ),
			'view_item'             => __( 'View Help Page', $domain ),
			'view_items'            => __( 'View Help Page', $domain ),
			'search_items'          => __( 'Search Help Pages', $domain ),
			'not_found'             => __( 'No Help Pages Found', $domain ),
			'not_found_in_trash'    => __( 'No Help Pages Found in Trash', $domain ),
			'parent_item_colon'     => __( 'Parent Help Page', $domain ),
			'featured_image'        => __( 'Featured image for this help', $domain ),
			'set_featured_image'    => __( 'Set featured image for this help page', $domain ),
			'remove_featured_image' => __( 'Remove featured image for this help page', $domain ),
			'use_featured_image'    => __( 'Use as featured image for this help page', $domain ),
			'archives'              => __( 'Help Pages Archives', $domain ),
			'insert_into_item'      => __( 'Insert into Help Page', $domain ),
			'uploaded_to_this_item' => __( 'Uploaded to this Help Page', $domain ),
			'filter_items_list'     => __( 'Filter Help Page', $domain ),
			'items_list_navigation' => __( 'Help Pages list navigation', $domain ),
			'items_list'            => __( 'Help Pages List', $domain ),
			'attributes'            => __( 'Help Page Attributes', $domain ),
			'parent_item_colon'     => __( 'Parent Help Page', $domain ),
		];

		// Apply a filter to labels for customization.
		$labels = apply_filters( 'help_labels', $labels );

		$options = [
			'label'               => __( 'Help Pages', $domain ),
			'labels'              => $labels,
			'description'         => __( 'Website user help pages.', $domain ),
			'public'              => false,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_rest'        => false,
			'rest_base'           => '',
			'has_archive'         => false,
			'show_in_menu'        => false,
			'exclude_from_search' => true,
			// Sets user role levels, accepts array: 'capabilities'        => [],
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'hierarchical'        => false,
			'rewrite'             => false,
			'query_var'           => 'help',
			'menu_position'       => 100,
			'menu_icon'           => 'dashicons-welcome-learn-more',
			'supports'            => [
				'title',
				'editor',
				'thumbnail',
				'excerpt'
			],
			'taxonomies'          => [],
		];

		// Apply a filter to arguments for customization.
		$options = apply_filters( 'help_args', $options );

		/**
		 * Register the post type
		 */
		register_post_type(
			'website_help',
			$options
		);
	}
}

// Run the class.
$chcd_post_types = new Post_Types_Register;
