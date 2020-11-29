<?php
/**
 * About page media options output.
 *
 * @package    CHCD_Plugin
 * @subpackage Admin\Partials
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CHCD_Plugin\Admin\Partials;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>
<h2><?php _e( 'Media and Upload Options', chcd_plugin() :: DOMAIN ); ?></h2>
<h3><?php _e( 'Image Sizes', chcd_plugin() :: DOMAIN ); ?></h3>
<ul>
	<li><?php _e( 'Add option to hard crop the medium and/or large image sizes', chcd_plugin() :: DOMAIN ); ?></li>
	<li><?php _e( 'Add option to allow SVG uploads to the Media Library', chcd_plugin() :: DOMAIN ); ?></li>
</ul>
<h3><?php _e( 'Fancybox Presentation', chcd_plugin() :: DOMAIN ); ?></h3>
<h3><?php _e( 'SVG Uploads', chcd_plugin() :: DOMAIN ); ?></h3>