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
<h2><?php _e( 'Media and Upload Options', 'chcd-plugin' ); ?></h2>
<h3><?php _e( 'Image Sizes', 'chcd-plugin' ); ?></h3>
<ul>
	<li><?php _e( 'Add option to hard crop the medium and/or large image sizes', 'chcd-plugin' ); ?></li>
	<li><?php _e( 'Add option to allow SVG uploads to the Media Library', 'chcd-plugin' ); ?></li>
</ul>
<h3><?php _e( 'Fancybox Presentation', 'chcd-plugin' ); ?></h3>
<h3><?php _e( 'SVG Uploads', 'chcd-plugin' ); ?></h3>