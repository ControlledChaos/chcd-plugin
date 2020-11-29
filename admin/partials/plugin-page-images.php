<?php
/**
 * Help page images tab
 *
 * Uses the universal slug partial for admin pages. Set this
 * slug in the core plugin file.
 *
 * @package    Grande_Design
 * @subpackage Admin\Partials
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Grande_Design\Admin\Partials;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Slug for which to look.
$slug = 'images';

// Stop here if the slug is not found.
if ( ! $slug ) {
	return;
}

// Post query arguments.
$args = [
	'name'           => $slug,
	'post_type'      => [ 'website_help' ],
	'post_status'    => [ 'publish' ],
	'posts_per_page' => 1,
	'perm'           => 'edit_posts'
];

// New instance of the WP_Query class.
$query = new \WP_Query( $args );

// Loop the post and display content.
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

?>
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>

<?php

// End the loop.
endwhile;

else :
?>
	<h2><?php _e( 'Nothing Found', chcd_plugin() :: DOMAIN ); ?></h2>
	<?php echo sprintf(
		'<p>%s</p>',
		esc_html( __( 'Please contact an administrator or developer to add content to this section.', chcd_plugin() :: DOMAIN ) )
	); ?>

<?php
endif;
