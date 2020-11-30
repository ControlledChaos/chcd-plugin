<?php
/**
 * Custom welcome panel output.
 *
 * Provided are several widget areas and hooks for adding content.
 * The `do_action` hooks are named and placed to be similar to the
 * before and after pseudoelements in CSS.
 *
 * @package    CHCD_Plugin
 * @subpackage Admin\Dashboard
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CHCD_Plugin\Admin\Dashboard;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! current_user_can( 'edit_posts' ) ) {
	return;
}

/**
 * Get pages by slug
 *
 * Look for specific page slaug and add edit links
 * by ID if they exist.
 */

// Resume & bio page.
$resume_page = get_page_by_path( 'resume' );
$resume_id   = null;

if ( $resume_page ) {
	$resume_id = $resume_page->ID;
}

// Contact page.
$contact_page = get_page_by_path( 'contact' );
$contact_id   = null;

if ( $contact_page ) {
	$contact_id = $contact_page->ID;
}

?>

<div class="chcd-dashboard-summary">

	<h2 class="screen-reader-text"><?php _e( 'Website Summary', chcd_plugin() :: DOMAIN ); ?></h2>

	<?php do_action( 'before_right_now' ); ?>

	<?php wp_dashboard_right_now(); ?>

	<?php do_action( 'after_right_now' ); ?>

	<?php echo sprintf(
		'<p class="chcd-website-help-link">%s <a href="%s">%s</a></p>',
		__( 'For tips and assistance managing this website visit the', chcd_plugin() :: DOMAIN ),
		esc_url( admin_url( 'index.php?page=' . chcd_plugin() :: SLUG . '-page' ) ),
		__( 'Website Help page', chcd_plugin() :: DOMAIN )
	); ?>
</div>

<div class="chcd-dashboard-post-managment">

	<header class="chcd-dashboard-section-header">
		<h2><?php _e( 'Manage Your Portfolio', chcd_plugin() :: DOMAIN ); ?></h2>
		<p class="description"><strong><?php _e( 'Remember that it is best practice to resize very images prior to upload, then add titles and descriptions, and crop as necessary prior to adding them to a project.', chcd_plugin() :: DOMAIN ); ?></strong></p>
	</header>

	<ul class="chcd-dashboard-actions-list chcd-dashboard-post-type-actions">
		<li>
			<h3><?php _e( 'Media Library', chcd_plugin() :: DOMAIN ); ?></h3>
			<div class="chcd-dashboard-icon media-library-icon"><span class="dashicons dashicons-format-gallery"></span></div>
			<p>
				<a href="<?php echo admin_url( 'media-new.php' ); ?>"><?php _e( 'Add New', chcd_plugin() :: DOMAIN ); ?></a>
				<a href="<?php echo admin_url( 'upload.php' ); ?>"><?php _e( 'Manage', chcd_plugin() :: DOMAIN ); ?></a>
			</p>
		</li>
		<li>
			<h3><?php _e( 'Film + TV', chcd_plugin() :: DOMAIN ); ?></h3>
			<div class="chcd-dashboard-icon features-icon"><span class="dashicons dashicons-format-video"></span></div>
			<p>
				<a href="<?php echo admin_url( 'post-new.php?post_type=features' ); ?>"><?php _e( 'Add New', chcd_plugin() :: DOMAIN ); ?></a>
				<a href="<?php echo admin_url( 'edit.php?post_type=features' ); ?>"><?php _e( 'View List', chcd_plugin() :: DOMAIN ); ?></a>
			</p>
		</li>
		<li>
			<h3><?php _e( 'Commercials', chcd_plugin() :: DOMAIN ); ?></h3>
			<div class="chcd-dashboard-icon commercials-icon"><span class="dashicons dashicons-megaphone"></span></div>
			<p>
				<a href="<?php echo admin_url( 'post-new.php?post_type=commercials' ); ?>"><?php _e( 'Add New', chcd_plugin() :: DOMAIN ); ?></a>
				<a href="<?php echo admin_url( 'edit.php?post_type=commercials' ); ?>"><?php _e( 'View List', chcd_plugin() :: DOMAIN ); ?></a>
			</p>
		</li>
	</ul>
</div>

<div class="chcd-dashboard-content-managment">

	<header class="chcd-dashboard-section-header">
		<h2><?php _e( 'Manage Your Content', chcd_plugin() :: DOMAIN ); ?></h2>

		<p class="description"><strong><?php _e( 'Following are links to manage the primary pages on your site.', chcd_plugin() :: DOMAIN ); ?></strong></p>
	</header>

	<ul class="chcd-dashboard-actions-list chcd-dashboard-content-actions">
		<?php if ( $resume_page ) : ?>
		<li>
			<h3><?php _e( 'Resume', chcd_plugin() :: DOMAIN ); ?></h3>
			<div class="chcd-dashboard-icon resume-icon"><span class="dashicons dashicons-businesswoman"></span></div>
			<p>
				<a href="<?php echo admin_url( 'post.php?post=' . $resume_id . '&action=edit' ); ?>"><?php _e( 'Manage Info', chcd_plugin() :: DOMAIN ); ?></a>
			</p>
		</li>
		<?php endif; // $resume_page ?>
		<?php if ( $contact_page ) : ?>
		<li>
			<h3><?php _e( 'Contact', chcd_plugin() :: DOMAIN ); ?></h3>
			<div class="chcd-dashboard-icon contact-icon"><span class="dashicons dashicons-email"></span></div>
			<p>
				<a href="<?php echo admin_url( 'post.php?post=' . $contact_id . '&action=edit' ); ?>"><?php _e( 'Manage Info', chcd_plugin() :: DOMAIN ); ?></a>
			</p>
		</li>
		<?php endif; // $contact_page ?>
		<li>
			<h3><?php _e( 'Front Page', chcd_plugin() :: DOMAIN ); ?></h3>
			<div class="chcd-dashboard-icon front-icon"><span class="dashicons dashicons-admin-home"></span></div>
			<p>
				<a href="<?php echo admin_url( 'post.php?post=' . get_option( 'page_on_front' ) . '&action=edit' ); ?>"><?php _e( 'Manage Display', chcd_plugin() :: DOMAIN ); ?></a>
			</p>
		</li>
	</ul>
</div>

<?php
/**
 * Custom development hook.
 *
 * @since 1.0.0
 */
do_action( 'chcd_dashboard' );
