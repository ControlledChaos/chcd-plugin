<?php
/**
 * About page site settings output.
 *
 * Uses the universal slug partial for admin pages. Set this
 * slug in the core plugin file.
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
<h3><?php _e( 'Website settings', chcd_plugin() :: DOMAIN ); ?></h3>
<?php echo sprintf(
	'<p>%1s <a href="%2s">%3s</a> %4s</p>',
	__( 'The plugin is equipped with', chcd_plugin() :: DOMAIN ),
	esc_url( admin_url( '?page=' . chcd_plugin() :: VERSION . '-settings' ) ),
	__( 'an admin page', chcd_plugin() :: DOMAIN ),
	__( 'for customizing the user interface of WordPress/ClassicPress, as well as other useful features.', chcd_plugin() :: DOMAIN )
 ); ?>
<h3><?php _e( 'Clean Up the Admin', chcd_plugin() :: DOMAIN ); ?></h3>
<ul>
	<li><?php _e( 'Remove dashboard widgets: WordPress/ClassicPress news, quick press', chcd_plugin() :: DOMAIN ); ?></li>
	<li><?php _e( 'Make Menus and Widgets top level menu items', chcd_plugin() :: DOMAIN ); ?></li>
	<li><?php _e( 'Remove select admin menu items', chcd_plugin() :: DOMAIN ); ?></li>
	<li><?php _e( 'Remove WordPress/ClassicPress logo from admin bar', chcd_plugin() :: DOMAIN ); ?></li>
	<li><?php _e( 'Remove access to theme and plugin editors', chcd_plugin() :: DOMAIN ); ?></li>
</ul>
<h3><?php _e( 'Enchance the Admin', chcd_plugin() :: DOMAIN ); ?></h3>
<ul>
	<li><?php _e( 'Add three admin bar menus', chcd_plugin() :: DOMAIN ); ?></li>
	<li><?php _e( 'Add custom post types to the At a Glance widget', chcd_plugin() :: DOMAIN ); ?></li>
	<li><?php _e( 'Custom admin footer message', chcd_plugin() :: DOMAIN ); ?></li>
</ul>