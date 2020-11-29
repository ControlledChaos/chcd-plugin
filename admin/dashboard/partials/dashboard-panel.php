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

// Get the current user name for the greeting.
$current_user = wp_get_current_user();
$user_name    = $current_user->display_name;

// Add a filterable subheading.
$subheading = sprintf(
	'<h3>%1s %2s %3s.</h3>',
	esc_html__( 'This is your custom', chcd_plugin() :: DOMAIN ),
	get_bloginfo( 'name' ),
	esc_html__( 'welcome panel', chcd_plugin() :: DOMAIN )
);
$subheading = apply_filters( 'chcd_welcome_subheading', $subheading );

// Add a filterable description.
$about_desc = apply_filters( 'chcd_welcome_about', __( 'Put your welcome message here.', chcd_plugin() :: DOMAIN ) );

?>

<?php echo sprintf(
	'<h2 class="welcome-panel-title">%1s %2s.</h2>',
	esc_html__( 'Welcome,', chcd_plugin() :: DOMAIN ),
	$user_name
); ?>
<p class="welcome-panel-description"><?php echo $about_desc; ?></p>
<?php echo $subheading; ?>