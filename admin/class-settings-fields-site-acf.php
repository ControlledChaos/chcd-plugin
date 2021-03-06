<?php
/**
 * Site settings page field groups
 *
 * @package    CHCD_Plugin
 * @subpackage Admin
 * @since      1.0.0
 */

namespace CHCD_Plugin\Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register settings page fields.
 *
 * Uses the universal slug partial for admin pages. Set this
 * slug in the core plugin file.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group( [
		'key'    => 'group_5a0c7ff7764ca',
		'title'  => __( 'Settings Page', chcd_plugin() :: DOMAIN ),
		'fields' => [

			/**
			 * Admin Menu tab settings.
			 *
			 * @since 1.0.0
			 */

			[
				'key'               => 'field_5a0c800f57d56',
				'label'             => __( 'Admin Menu', chcd_plugin() :: DOMAIN ),
				'name'              => '',
				'type'              => 'tab',
				'instructions'      => __( '', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'placement'         => 'top',
				'endpoint'          => 0,
			],
			[
				'key'               => 'field_5a0c80ab57d59',
				'label'             => __( 'Settings Page', chcd_plugin() :: DOMAIN ),
				'name'              => 'chcd_settings_link_position',
				'type'              => 'button_group',
				'instructions'      => __( 'Select the position of this Settings page link, and whether to show or hide the other settings links.', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'choices'           => [
					'default' => __( 'Default/Show', chcd_plugin() :: DOMAIN ),
					'top'     => __( 'Top Level/Hide', chcd_plugin() :: DOMAIN ),
				],
				'allow_null'        => 0,
				'default_value'     => 'default',
				'layout'            => 'horizontal',
				'return_format'     => 'value',
			],
			[
				'key'               => 'field_5a0c802257d57',
				'label'             => __( 'Menus Link', chcd_plugin() :: DOMAIN ),
				'name'              => 'chcd_menus_position',
				'type'              => 'button_group',
				'instructions'      => __( 'Select the position of the Menus page link.', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'choices'           => [
					'top'     => __( 'Top Level', chcd_plugin() :: DOMAIN ),
					'default' => __( 'Default', chcd_plugin() :: DOMAIN ),
				],
				'allow_null'        => 0,
				'default_value'     => 'default',
				'layout'            => 'horizontal',
				'return_format'     => 'value',
			],
			[
				'key'               => 'field_5a0c8d8a32b95',
				'label'             => __( 'Hide Links', chcd_plugin() :: DOMAIN ),
				'name'              => 'chcd_admin_hide_links',
				'type'              => 'checkbox',
				'instructions'      => __( 'Select which menu items to hide.', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper' => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'choices'           => [
					'themes'  => __( 'Appearance', chcd_plugin() :: DOMAIN ),
					'plugins' => __( 'Plugins', chcd_plugin() :: DOMAIN ),
					'users'   => __( 'Users', chcd_plugin() :: DOMAIN ),
					'tools'   => __( 'Tools', chcd_plugin() :: DOMAIN ),
					'fields'  => __( 'Custom Fields', chcd_plugin() :: DOMAIN ),
				],
				'allow_custom'      => 0,
				'save_custom'       => 0,
				'default_value'     => [],
				'layout'            => 'horizontal',
				'toggle'            => 1,
				'return_format'     => 'value',
			],

			/**
			 * Admin Pages tab settings.
			 *
			 * @since 1.0.0
			 */

			[
				'key'               => 'field_5a0cbb3873e55',
				'label'             => __( 'Admin Pages', chcd_plugin() :: DOMAIN ),
				'name'              => '',
				'type'              => 'tab',
				'instructions'      => __( '', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'placement'         => 'top',
				'endpoint'          => 0,
			],
			[
				'key'               => 'field_5bd8abd79a46d',
				'label'             => __( 'Admin Header', chcd_plugin() :: DOMAIN ),
				'name'              => 'chcd_use_admin_header',
				'type'              => 'true_false',
				'instructions'      => __( 'Add the site title, site tagline, and a nav menu to the top of admin pages.', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => __( 'Use the admin header.', chcd_plugin() :: DOMAIN ),
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __( 'Yes', chcd_plugin() :: DOMAIN ),
				'ui_off_text'       => __( 'No', chcd_plugin() :: DOMAIN ),
			],
			[
				'key'               => 'field_5b834989e850c',
				'label'             => __( 'Drag & Drop Sort Order', chcd_plugin() :: DOMAIN ),
				'name'              => 'chcd_use_custom_sort_order',
				'type'              => 'true_false',
				'instructions'      => __( 'When posts and taxonomies are selected for custom sort order functionality, the table rows on their respective admin management screen can be dragged up or down.

				The order you set on the admin management screens will automatically set the order of the posts in the blog index pages and in archive pages.', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => __( 'Add drag & drop sort order functionality to post types and taxonomies.', chcd_plugin() :: DOMAIN ),
				'default_value'     => 0,
				'ui' => 1,
				'ui_on_text'        => __( 'Yes', chcd_plugin() :: DOMAIN ),
				'ui_off_text'       => __( 'No', chcd_plugin() :: DOMAIN ),
			],

			/**
			 * Meta/SEO tab settings.
			 *
			 * @since 1.0.0
			 */

			[
				'key'               => 'field_5a1989a036067',
				'label'             => __( 'Meta/SEO', chcd_plugin() :: DOMAIN ),
				'name'              => '',
				'type'              => 'tab',
				'instructions'      => __( '', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'placement'         => 'top',
				'endpoint'          => 0,
			],
			[
				'key'               => 'field_5a237090744c4',
				'label'             => __( 'Meta Tags', chcd_plugin() :: DOMAIN ),
				'name'              => 'chcd_meta_disable_tags',
				'type'              => 'true_false',
				'instructions'      => __( 'Disable if you plan on using Yoast SEO or a similarly awful plugin.', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => __( 'Check to disable', chcd_plugin() :: DOMAIN ),
				'default_value'     => 0,
				'ui'                => 0,
				'ui_on_text'        => __( 'Disabled', chcd_plugin() :: DOMAIN ),
				'ui_off_text'       => __( 'Enabled', chcd_plugin() :: DOMAIN ),
			],
			[
				'key'               => 'field_5a198d601b523',
				'label'             => __( 'Blog Pages Title', chcd_plugin() :: DOMAIN ),
				'name'              => 'chcd_meta_blog_title',
				'type'              => 'text',
				'instructions'      => __( 'Will use the site title if left empty.', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => [
					[
						[
							'field'    => 'field_5a237090744c4',
							'operator' => '!=',
							'value'    => '1',
						],
					],
				],
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			],
			[
				'key'               => 'field_5a198bd736068',
				'label'             => __( 'Blog Pages Description', chcd_plugin() :: DOMAIN ),
				'name'              => 'chcd_meta_blog_description',
				'type'              => 'textarea',
				'instructions'      => __( 'Will use the site tagline if left empty and if a tagline is set.', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => [
					[
						[
							'field'    => 'field_5a237090744c4',
							'operator' => '!=',
							'value'    => '1',
						],
					],
				],
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => '',
				'placeholder'       => '',
				'maxlength'         => '',
				'rows'              => 4,
				'new_lines'         => '',
			],
			[
				'key'               => 'field_5a198c1836069',
				'label'             => __( 'Blog Pages Image', chcd_plugin() :: DOMAIN ),
				'name'              => 'chcd_meta_blog_image',
				'type'              => 'image',
				'instructions'      => __( 'A minimum of 1230px by 600px is recommended for retina display devices.', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => [
					[
						[
							'field'    => 'field_5a237090744c4',
							'operator' => '!=',
							'value'    => '1',
						],
					],
				],
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'return_format'     => 'array',
				'preview_size'      => 'medium',
				'library'           => 'all',
				'min_width'         => '',
				'min_height'        => '',
				'min_size'          => '',
				'max_width'         => '',
				'max_height'        => '',
				'max_size'          => '',
				'mime_types'        => '',
			],
			[
				'key'               => 'field_5b2fd67604455',
				'label'             => __( 'Default Meta Image', chcd_plugin() :: DOMAIN ),
				'name'              => 'chcd_meta_default_image',
				'type'              => 'image',
				'instructions'      => __( 'Will be used as a fallback for posts without a featured image and used for archive pages. A minimum of 1230px by 600px is recommended for retina display devices.', chcd_plugin() :: DOMAIN ),
				'required'          => 0,
				'conditional_logic' => [
					[
						[
							'field'    => 'field_5a237090744c4',
							'operator' => '!=',
							'value'    => '1',
						],
					],
				],
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'return_format'     => 'array',
				'preview_size'      => 'medium',
				'library'           => 'all',
				'min_width'         => '',
				'min_height'        => '',
				'min_size'          => '',
				'max_width'         => '',
				'max_height'        => '',
				'max_size'          => '',
				'mime_types'        => '',
			],
		],
		'location' => [
			[
				[
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => chcd_plugin() :: VERSION . '-settings',
				],
			],
		],
		'menu_order'            => 0,
		'position'              => 'acf_after_title',
		'style'                 => 'seamless',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => 1,
		'description'           => '',
		] );

endif;
