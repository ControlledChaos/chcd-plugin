<?php
/**
 * Help page output
 *
 * This page uses the jQuery tabs from the jQuery UI suite that is included
 * with WordPress/ClassicPress. Tabs are activated by targeting the `backend-tabbed-content`
 * in this plugin's admin.js file.
 *
 * @package    CHCD_Plugin
 * @subpackage Admin\Partials
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @see        Tabs admin/assets/js/admin.js
 * @link       Dashicons https://developer.wordpress.org/resource/dashicons/
 */

namespace CHCD_Plugin\Admin\Partials;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Site Options tab icon.
 *
 * The Site Options page has options to make the page top-level in
 * the admin menu and set a Dashicons icon. If an icon has been set
 * for the link in the admin menu then we will use the same icon here
 * for the Site Options tab.
 *
 * @since  1.0.0
 * @return void
 */

// Get plugin data.
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$plugin_data = get_plugin_data( __FILE__ );
$plugin_name = $plugin_data['Name'];

/**
 * Set up the page tabs as an array for adding tabs
 * from another plugin or from a theme.
 *
 * @since  1.0.0
 * @return array
 */
$tabs = [

	// Introduction tab.
	sprintf(
		'<li><a href="%1s"><span class="dashicons dashicons-welcome-learn-more"></span> %2s</a></li>',
		'#intro',
		esc_html__( 'Introduction', chcd_plugin() :: DOMAIN )
	),

	// Features tab.
	sprintf(
		'<li><a href="%1s"><span class="dashicons dashicons-format-video"></span> %2s</a></li>',
		'#features',
		esc_html__( 'Features', chcd_plugin() :: DOMAIN )
	),

	// Commercials tab.
	sprintf(
		'<li><a href="%1s"><span class="dashicons dashicons-megaphone"></span> %2s</a></li>',
		'#commercials',
		esc_html__( 'Commercials', chcd_plugin() :: DOMAIN )
	),

	// Images tab.
	sprintf(
		'<li><a href="%1s"><span class="dashicons dashicons-format-gallery"></span> %3s</a></li>',
		'#images',
		esc_html__( 'Images', chcd_plugin() :: DOMAIN )
	),

	// Videos tab.
	sprintf(
		'<li><a href="%1s"><span class="dashicons dashicons-format-video"></span> %2s</a></li>',
		'#videos',
		esc_html__( 'Videos', chcd_plugin() :: DOMAIN )
	),

	// Settings tab.
	sprintf(
		'<li><a href="%1s"><span class="dashicons dashicons-admin-generic"></span> %2s</a></li>',
		'#settings',
		esc_html__( 'Settings', chcd_plugin() :: DOMAIN )
	),

];

// Apply a filter to the tabs array for adding tabs.
$page_tabs = apply_filters( 'chcd_tabs_page_about', $tabs );

// Begin with default WordPress/ClassicPress page wrapper.
?>
<div class="wrap site-plugin-wrap">

	<?php echo sprintf( '<h1 class="wp-heading-inline">%1s %2s</h1>', get_bloginfo( 'name' ), esc_html__( 'Plugin', chcd_plugin() :: DOMAIN ) ); ?>

    <p class="description"><?php esc_html_e( 'A feature-packed WordPress or ClassicPress starter plugin for building custom-tailored websites.', chcd_plugin() :: DOMAIN ); ?></p>

	<div class="backend-tabbed-content">

		<ul>
			<?php echo implode( $page_tabs ); ?>
		</ul>

		<?php

		// Hook for adding tabbed content.
		do_action( 'chcd_content_page_about_before' );
		?>
		<div id="intro">
			<?php include_once chcd_plugin()->path() . 'admin/partials/plugin-page-intro.php'; ?>
		</div>
		<div id="features">
			<?php include_once chcd_plugin()->path() . 'admin/partials/plugin-page-features.php'; ?>
		</div>
		<div id="commercials">
			<?php include_once chcd_plugin()->path() . 'admin/partials/plugin-page-commercials.php'; ?>
		</div>
		<div id="images">
			<?php include_once chcd_plugin()->path() . 'admin/partials/plugin-page-images.php'; ?>
		</div>
		<div id="videos">
			<?php include_once chcd_plugin()->path() . 'admin/partials//plugin-page-videos.php'; ?>
		</div>
		<div id="settings">
			<?php include_once chcd_plugin()->path() . 'admin/partials/plugin-page-settings.php'; ?>
		</div>
		<?php

		// Hook for adding tabbed content.
		do_action( 'chcd_content_page_about_after' );
		?>
	</div>

	<?php
	/**
	 * Page footer
	 *
	 * Prints a message to users with the 'manage options' capability,
	 * which typically are administrators and developers.
	 *
	 * This message includes a link to edit the help pages posts,
	 * since the link is excluded from the admin menu.
	 */
	if ( current_user_can( 'manage_options' ) ) :
	?>
	<footer>
		<?php echo sprintf(
			'<p class="description"><strong>%s</strong> %s <a href="%s">%s</a> %s</p>',
			__( 'Developers:', chcd_plugin() :: DOMAIN ),
			__( 'The content of these tabs can be edited in the', chcd_plugin() :: DOMAIN ),
			esc_url( admin_url( 'edit.php?post_type=website_help' ) ),
			__( 'Website Help', chcd_plugin() :: DOMAIN ),
			__( 'post type.', chcd_plugin() :: DOMAIN )
		); ?>
	</footer>
	<?php endif; ?>
</div>
