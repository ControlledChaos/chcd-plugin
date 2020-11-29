<?php
/**
 * Post Type Fields for Features
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
 * Post Type Fields for Features
 */
final class Post_Type_Fields_Features {

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

		if ( function_exists( 'acf_add_local_field_group' ) ) :

			acf_add_local_field_group( [
				'key'    => 'group_5615a7f27ace6',
				'title'  => 'Features',
				'fields' => [
					[
						'key' => 'field_567dc51c836dc',
						'label' => 'Info',
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'placement' => 'top',
						'endpoint' => 0,
					],
					[
						'key' => 'field_5615a86f2f95e',
						'label' => 'Project Title',
						'name' => 'project_title',
						'type' => 'text',
						'instructions' => 'This is what the viewer sees.',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					],
					[
						'key' => 'field_590b459be6e37',
						'label' => 'Project Type',
						'name' => 'chd_project_type',
						'type' => 'radio',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'choices' => [
							'film' => 'Feature Film',
							'indie' => 'Indie Film',
							'short' => 'Short Film',
							'tv' => 'Television',
						],
						'allow_null' => 0,
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => 'film',
						'layout' => 'horizontal',
						'return_format' => 'value',
					],
					[
						'key' => 'field_5615abe153560',
						'label' => 'Public Status',
						'name' => 'status',
						'type' => 'radio',
						'instructions' => '"Active" displays the trailer and stills links.
			"Coming Soon" displays a coming soon message.
			"Protected" to requires viewers to log in.
			"Inactive" hides the project.',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'choices' => [
							'active' => 'Active',
							'coming' => 'Coming Soon',
							'protected' => 'Protected',
							'inactive' => 'Inactive',
						],
						'allow_null' => 0,
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
					],
					[
						'key' => 'field_5615a8a82f95f',
						'label' => 'Director',
						'name' => 'director',
						'type' => 'text',
						'instructions' => 'Enter only the name of the director. Will display as "(Directed by: Jane Doe)" under the title.',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'default_value' => '',
						'placeholder' => '',
						'prepend' => 'Director:',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					],
					[
						'key' => 'field_590b7b71680cd',
						'label' => 'Description',
						'name' => 'chd_feature_description',
						'type' => 'textarea',
						'instructions' => 'Enter a brief description. Will display as a single paragraph.',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => 4,
						'new_lines' => '',
					],
					[
						'key' => 'field_590b4f8025110',
						'label' => 'IMDb Page',
						'name' => 'chd-imdb_page',
						'type' => 'url',
						'instructions' => 'Paste the URL (web address) of the main page on IMBd.',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'default_value' => '',
						'placeholder' => 'http://www.imdb.com/title/tt1234567/',
					],
					[
						'key' => 'field_567dc532836dd',
						'label' => 'Video',
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'placement' => 'top',
						'endpoint' => 0,
					],
					[
						'key' => 'field_5615a8fc2e664',
						'label' => 'Video Link',
						'name' => '',
						'type' => 'message',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'message' => 'Activate the video popup. Accepts videos from the Media Library or videos hosted on Vimeo and YouTube.<br />
			<strong><span style="color: #333;">Examples in red:</span></strong><br />
			http://courtneyhoffmandesigns.com/wp-content/uploads/year/mo/title.mp4<br />
			https://vimeo.com/<strong><span style="color: #d00;">130702439</span></strong><br />
			https://www.youtube.com/watch?v=<strong><span style="color: #d00;">DOjj07EuO50</span></strong>',
						'new_lines' => 'wpautop',
						'esc_html' => 0,
					],
					[
						'key' => 'field_5615aa8a62035',
						'label' => 'Video Host',
						'name' => 'video_host',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'choices' => [
							'vimeo' => 'Vimeo',
							'youtube' => 'YouTube',
						],
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'allow_null' => 0,
						'return_format' => 'value',
					],
					[
						'key' => 'field_5615aad867d76',
						'label' => 'Vimeo ID',
						'name' => 'vimeo_id',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => [
							[
								[
									'field' => 'field_5615aa8a62035',
									'operator' => '==',
									'value' => 'vimeo',
								],
							],
						],
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					],
					[
						'key' => 'field_567dc546836de',
						'label' => 'Images',
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'placement' => 'top',
						'endpoint' => 0,
					],
					[
						'key' => 'field_5615ab875355f',
						'label' => 'Poster Image',
						'name' => 'project_thumb',
						'type' => 'image',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id' => '',
						],
						'return_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					],
					[
						'key'          => 'field_561d68f64df75',
						'label'        => 'Project Gallery',
						'name'         => 'project_gallery',
						'type'         => 'gallery',
						'instructions' => 'Slideshow gallery of stills and screenshots.<br />
			Click "Add to Gallery" to upload photos or choose from media library. Drag & drop to set the order of the slideshow.',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'min'           => '',
						'max'           => '',
						'preview_size'  => 'thumbnail',
						'library'       => 'all',
						'min_width'     => '',
						'min_height'    => '',
						'min_size'      => '',
						'max_width'     => '',
						'max_height'    => '',
						'max_size'      => '',
						'mime_types'    => '',
						'return_format' => 'array',
						'insert'        => 'append',
					],
				],
				'location' => [
					[
						[
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'features',
						],
					],
				],
				'menu_order'            => 2,
				'position'              => 'acf_after_title',
				'style'                 => 'seamless',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => array(
					0  => 'permalink',
					1  => 'the_content',
					2  => 'excerpt',
					3  => 'custom_fields',
					4  => 'discussion',
					5  => 'comments',
					6  => 'revisions',
					7  => 'slug',
					8  => 'author',
					9  => 'format',
					10 => 'page_attributes',
					11 => 'featured_image',
					12 => 'categories',
					13 => 'tags',
					14 => 'send-trackbacks',
				),
				'active'      => true,
				'description' => 'For the Film + TV post type.',
			] );

		endif;
	}

}

// Run an instance of the class.
new Post_Type_Fields_Features;
