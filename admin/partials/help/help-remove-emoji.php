<?php
/**
 * Content for the Remove Emoji Script help tab.
 *
 * @package    CHCD_Plugin
 * @subpackage Admin\Partials
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CHCD_Plugin\Admin\Partials\Help;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>
<div>
	<h3><?php _e( 'Remove Emoji Script', chcd_plugin() :: DOMAIN ); ?></h3>
	<p><?php _e( 'WordPress/ClassicPress includes this script to allow emojis to work in older browsers. If your users work with modern browsers than this script is unnecessary.' ); ?></p>
</div>