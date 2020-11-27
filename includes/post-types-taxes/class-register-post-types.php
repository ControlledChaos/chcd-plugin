<?php
/**
 * Register post types.
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

		$labels = [
			'name'                  => __( 'Film + TV', 'ch-designer' ),
			'singular_name'         => __( 'Film + TV', 'ch-designer' ),
			'menu_name'             => __( 'Film + TV', 'ch-designer' ),
			'all_items'             => __( 'All Projects', 'ch-designer' ),
			'add_new'               => __( 'New Project', 'ch-designer' ),
			'add_new_item'          => __( 'New Film + TV Project', 'ch-designer' ),
			'edit_item'             => __( 'Edit Project', 'ch-designer' ),
			'new_item'              => __( 'New Project', 'ch-designer' ),
			'view_item'             => __( 'View Project', 'ch-designer' ),
			'view_items'            => __( 'View Projects', 'ch-designer' ),
			'search_items'          => __( 'Search Projects', 'ch-designer' ),
			'not_found'             => __( 'No Projects Found', 'ch-designer' ),
			'not_found_in_trash'    => __( 'No Projects Found in Trash', 'ch-designer' ),
			'parent_item_colon'     => __( 'Parent Project', 'ch-designer' ),
			'featured_image'        => __( 'Featured image for this project', 'ch-designer' ),
			'set_featured_image'    => __( 'Set featured image for this project', 'ch-designer' ),
			'remove_featured_image' => __( 'Remove featured image for this project', 'ch-designer' ),
			'use_featured_image'    => __( 'Use as featured image for this project', 'ch-designer' ),
			'archives'              => __( 'Project archives', 'ch-designer' ),
			'insert_into_item'      => __( 'Insert into Project', 'ch-designer' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Project', 'ch-designer' ),
			'filter_items_list'     => __( 'Filter Projects', 'ch-designer' ),
			'items_list_navigation' => __( 'Projects list navigation', 'ch-designer' ),
			'items_list'            => __( 'Projects List', 'ch-designer' ),
			'attributes'            => __( 'Project Attributes', 'ch-designer' ),
			'parent_item_colon'     => __( 'Parent Project', 'ch-designer' ),
		];

		$args = [
			'label'               => __( 'Film + TV', 'ch-designer' ),
			'labels'              => $labels,
			'description'         => __( 'Film + TV production projects.', 'ch-designer' ),
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
			'menu_icon'           => 'dashicons-editor-video',
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
			'name'                  => __( 'Commercials', 'ch-designer' ),
			'singular_name'         => __( 'Commercial', 'ch-designer' ),
			'menu_name'             => __( 'Commercials', 'ch-designer' ),
			'all_items'             => __( 'All Commercials', 'ch-designer' ),
			'add_new'               => __( 'New Commercial', 'ch-designer' ),
			'add_new_item'          => __( 'New Commercial', 'ch-designer' ),
			'edit_item'             => __( 'Edit Commercial', 'ch-designer' ),
			'new_item'              => __( 'New Commercial', 'ch-designer' ),
			'view_item'             => __( 'View Commercial', 'ch-designer' ),
			'view_items'            => __( 'View Commercials', 'ch-designer' ),
			'search_items'          => __( 'Search Commercials', 'ch-designer' ),
			'not_found'             => __( 'No Commercials Found', 'ch-designer' ),
			'not_found_in_trash'    => __( 'No Commercials Found in Trash', 'ch-designer' ),
			'parent_item_colon'     => __( 'Parent Commercial', 'ch-designer' ),
			'featured_image'        => __( 'Featured image for this commercial', 'ch-designer' ),
			'set_featured_image'    => __( 'Set featured image for this commercial', 'ch-designer' ),
			'remove_featured_image' => __( 'Remove featured image for this commercial', 'ch-designer' ),
			'use_featured_image'    => __( 'Use as featured image for this commercial', 'ch-designer' ),
			'archives'              => __( 'Commercial archives', 'ch-designer' ),
			'insert_into_item'      => __( 'Insert into Commercial', 'ch-designer' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Commercial', 'ch-designer' ),
			'filter_items_list'     => __( 'Filter Commercials', 'ch-designer' ),
			'items_list_navigation' => __( 'Commercials list navigation', 'ch-designer' ),
			'items_list'            => __( 'Commercials List', 'ch-designer' ),
			'attributes'            => __( 'Commercial Attributes', 'ch-designer' ),
			'parent_item_colon'     => __( 'Parent Commercial', 'ch-designer' ),
		];

		$args = [
			'label'               => __( 'Commercials', 'ch-designer' ),
			'labels'              => $labels,
			'description'         => __( 'Television commercial projects.', 'ch-designer' ),
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
			'menu_icon'           => 'dashicons-video-alt2',
			'supports'            => [
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'page-attributes'
			],
		];
		register_post_type( 'commercials', $args );
	}

}

// Run the class.
$chcd_post_types = new Post_Types_Register;
