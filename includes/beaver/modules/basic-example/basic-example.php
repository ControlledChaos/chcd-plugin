<?php
/**
 * Basic example Beaver Builder module
 *
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @package    CHCD_Plugin
 * @subpackage Includes\Beaver
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Basic example Beaver Builder module
 *
 * @since  1.0.0
 * @access public
 */
class CHCD_Basic_Example_Module extends FLBuilderModule {

    /**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
    public function __construct() {

        parent::__construct( [
            'name'          => __( 'Basic Example', 'chcd-plugin' ),
            'description'   => __( 'An basic example for coding new modules.', 'chcd-plugin' ),
            'category'      => __( 'Example Modules', 'chcd-plugin' ),
            'dir'           => CHCD_PATH . 'includes/beaver/modules/basic-example/',
            'url'           => CHCD_URL . 'includes/beaver/modules/basic-example/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ] );

    }
}

/**
 * Register the module and its form settings.
 *
 * @since  1.0.0
 * @access public
 * @return array Returns the array of module fields.
 */
FLBuilder::register_module( 'CHCD_Basic_Example_Module', [
    'general' => [ // Tab
        'title'    => __( 'General', 'chcd-plugin' ), // Tab title
        'sections' => [ // Tab Sections
            'general' => [ // Section
                'title' => __( 'Section Title', 'chcd-plugin' ), // Section Title
                'fields' => [ // Section Fields
                    'text_field' => [
                        'type'        => 'text',
                        'label'       => __( 'Text Field', 'chcd-plugin' ),
                        'default'     => '',
                        'maxlength'   => '2',
                        'size'        => '3',
                        'placeholder' => '10',
                        'class'       => 'my-css-class',
                        'description' => 'px',
                        'help'        => __( 'Put your help inf here.', 'chcd-plugin' ),
                        'preview'     => [
                            'type'     => 'css',
                            'selector' => '.fl-example-text',
                            'property' => 'font-size',
                            'unit'     => 'px'
                        ]
                    ],
                    'textarea_field' => [
                        'type'        => 'textarea',
                        'label'       => __( 'Textarea Field', 'chcd-plugin' ),
                        'default'     => '',
                        'placeholder' => __( 'Placeholder Text', 'chcd-plugin' ),
                        'rows'        => '6',
                        'preview'     => [
                            'type'     => 'text',
                            'selector' => '.fl-example-text'
                        ]
                    ],
                    'color_field' => [
                        'type'          => 'color',
                        'label'         => __( 'Color Picker', 'chcd-plugin' ),
                        'default'       => '333333',
                        'show_reset'    => true,
                        'preview'       => [
                            'type'     => 'css',
                            'selector' => '.fl-example-text',
                            'property' => 'color'
                        ]
                    ],
                    'custom_field_example' => [
                        'type'    => 'chcd-custom-beaver-field',
                        'label'   => __( 'Custom Field Example', 'chcd-plugin' ),
                        'default' => ''
                    ],
                ]
            ]
        ]
    ]
] );