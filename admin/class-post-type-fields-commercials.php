<?php
/**
 * Post Type Fields for Commercials
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
 * Post Type Fields for Commercials
 */
final class Post_Type_Fields_Commercials {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Register ACF fields.
		$this->settings_fields();
	}

	/**
	 * Register ACF fields
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function settings_fields() {

		if( function_exists('acf_add_local_field_group') ):

			acf_add_local_field_group(array(
				'key' => 'group_5615ae2253617',
				'title' => 'Commercials',
				'fields' => array(
					array(
						'key' => 'field_567dc5889594b',
						'label' => 'Info',
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5615ae2c93354',
						'label' => 'Commercial Client',
						'name' => 'commercial_client',
						'type' => 'text',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array(
						'key' => 'field_5616c20080648',
						'label' => 'Commercial Title/Description',
						'name' => 'commercial_title',
						'type' => 'text',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array(
						'key' => 'field_567dc5999594c',
						'label' => 'Video',
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5615ae6593356',
						'label' => 'Video Link',
						'name' => '',
						'type' => 'message',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => 'Activate the video popup. Accepts videos from the Media Library or videos hosted on Vimeo and YouTube.<br />
			<strong><span style="color: #333;">Examples in red:</span></strong><br />
			http://courtneyhoffmandesigns.com/wp-content/uploads/year/mo/title.mp4<br />
			https://vimeo.com/<strong><span style="color: #d00;">130702439</span></strong><br />
			https://www.youtube.com/watch?v=<strong><span style="color: #d00;">DOjj07EuO50</span></strong>',
						'new_lines' => 'wpautop',
						'esc_html' => 0,
					),
					array(
						'key' => 'field_5615aecc93357',
						'label' => 'Video Host',
						'name' => 'com_video_host',
						'type' => 'radio',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'vimeo' => 'Vimeo',
							'youtube' => 'YouTube',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'allow_null' => 0,
						'return_format' => 'value',
					),
					array(
						'key' => 'field_5615af2193359',
						'label' => 'Vimeo ID',
						'name' => 'com_vimeo_id',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5615aecc93357',
									'operator' => '==',
									'value' => 'vimeo',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array(
						'key' => 'field_5615af479335a',
						'label' => 'YouTube ID',
						'name' => 'com_youtube_id',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5615aecc93357',
									'operator' => '==',
									'value' => 'youtube',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array(
						'key' => 'field_567dc5a99594d',
						'label' => 'Images',
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5615af769335b',
						'label' => 'Thumbnail',
						'name' => 'commercial_thumb',
						'type' => 'image',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'commercials',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'seamless',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => array(
					0 => 'permalink',
					1 => 'the_content',
					2 => 'excerpt',
					3 => 'discussion',
					4 => 'comments',
					5 => 'revisions',
					6 => 'slug',
					7 => 'author',
					8 => 'format',
					9 => 'page_attributes',
					10 => 'featured_image',
					11 => 'categories',
					12 => 'tags',
					13 => 'send-trackbacks',
				),
				'active' => true,
				'description' => 'For the Commercials post type.',
			));

		endif;
	}

}

// Run an instance of the class.
new Post_Type_Fields_Commercials;
