<?php
/**
 * Field import page.
 *
 * @package    CHCD_Plugin
 * @subpackage Settings
 * @since      1.0.0
 */

namespace CHCD_Plugin\Fields_Import_Page;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$active_tab = 'chcd-registered-fields-import';
if ( isset( $_GET[ 'tab' ] ) ) {
    $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'chcd-registered-fields-import';
} ?>

<div class="wrap import-registered-field-groups">
    <h1><?php esc_html_e( 'Registered Fields', chcd_plugin() :: DOMAIN ); ?></h1>
    <p class="description"><?php esc_html_e( 'Tools for ACF fields registered by the Controlled Chaos plugin.', chcd_plugin() :: DOMAIN ); ?></p>
    <h2 class="nav-tab-wrapper">
        <a href="edit.php?post_type=acf-field-group&page=acf-theme-fields&tab=chcd-registered-fields-import" class="nav-tab <?php echo $active_tab == 'chcd-registered-fields-import' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Import', chcd_plugin() :: DOMAIN ); ?></a>
        <a href="edit.php?post_type=acf-field-group&page=acf-theme-fields&tab=chcd-registered-fields-activation" class="nav-tab <?php echo $active_tab == 'chcd-registered-fields-activation' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Activation', chcd_plugin() :: DOMAIN ); ?></a>
    </h2>
    <?php if ( $active_tab == 'chcd-registered-fields-import' ) :

        // Check the version of ACF.
        $acf_version = explode( '.', acf_get_setting( 'version' ) );
        if ( $acf_version[0] != '5' ) : ?>
        <div id="message" class="error below-h2">
            <p><?php printf( esc_html__( 'This tool was built for ACF version 5 and you have version %s.', chcd_plugin() :: DOMAIN ) ); ?></p>
        </div>
        <?php endif; ?>

        <?php if ( ! empty( $imported ) ) { ?>
        <div id="message" class="updated below-h2">
            <p><strong><?php esc_html_e( 'Field groups imported:', chcd_plugin() :: DOMAIN ); ?></strong></p>
            <ul>
            <?php foreach ( $imported as $import ) { ?>
                <li><?php edit_post_link( $import['title'], '', '', $import['id']); ?></li>
            <?php } ?>
            </ul>
        </div>
        <div class="notice notice-success is-dismissible">
            <p><strong><?php esc_html_e( 'Next step:', chcd_plugin() :: DOMAIN ); ?></strong></p>
            <?php printf(
                '<p><a href="%1s">%2s</a>%3s</p>',
                admin_url( '/edit.php?post_type=acf-field-group&page=acf-theme-fields&tab=chcd-registered-fields-activation' ),
                esc_html__( 'Disable', chcd_plugin() :: DOMAIN ),
                esc_html__( ' the imported field groups. The duplicate field IDs will interfere with the editing of fields.', chcd_plugin() :: DOMAIN )
            ); ?>
        </div>
        <?php }
        printf( '<p>%1s</p>', esc_html__( 'This tool imports any field groups registered outside the ACF plugin so that they can be edited.', chcd_plugin() :: DOMAIN ) ); ?>
        <?php if ( ! empty( $acf_local->groups ) ) : ?>

        <form method="POST">
            <table class="widefat">
                <thead>
                    <th><?php esc_html_e( 'Import', chcd_plugin() :: DOMAIN ); ?></th>
                    <th><?php esc_html_e( 'Registered Field Groups', chcd_plugin() :: DOMAIN ); ?></th>
                    <th><?php esc_html_e( 'Possible Existing Matches', chcd_plugin() :: DOMAIN ); ?></th>
                </thead>
                <tbody>
                    <?php
                    foreach( $acf_local->groups as $key => $field_group ): ?>
                    <tr>
                        <td><input type="checkbox" name="fieldsets[]" value="<?php echo esc_attr( $key ); ?>" /></td>
                        <td><?php echo $field_group['title']; ?></td>
                        <td><?php
                        $sql = "SELECT ID, post_title FROM $wpdb->posts WHERE post_title LIKE '%s' AND post_type='acf-field-group'";
                        // Set post status
                        $post_status = apply_filters( 'acf_recovery\query\post_status', '' );
                        if ( ! empty( $post_status ) ) {
                            $sql .= ' AND post_status="' . esc_sql( $post_status ) . '"';
                        }
                        $matches = $wpdb->get_results( $wpdb->prepare( $sql, '%' . $wpdb->esc_like( $field_group['title'] ) .'%' ) );
                        if ( empty( $matches ) ) {
                            echo '<em>' . esc_html__( 'No matches found.', chcd_plugin() :: DOMAIN ) . '</em>';
                        } else {
                            $links = array();
                            foreach ( $matches as $match ) {
                            $links[] = '<a href="' . get_edit_post_link( $match->ID ) . '">' . $match->post_title . '</a>';
                        }
                            echo implode( ', ', $links );
                        }
                        ?></td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
            <?php wp_nonce_field( 'acf_php_recovery' ); ?>
            <input type="hidden" name="acf_php_recovery_action" value="import" />
            <p class="submit">
                <input type="submit" value="<?php esc_html_e( 'Import', chcd_plugin() :: DOMAIN ); ?>" class="button-primary" />
            </p>
        </form>

        <h3><?php esc_html_e( 'Field groups found in files:', chcd_plugin() :: DOMAIN ); ?></h3>

        <pre class="import-registered-field-groups-arrays">
        <?php echo var_export( $acf_local->groups ); ?>
        </pre>

        <?php else : ?>

        <p><strong><?php _e( 'No field groups found in files.', chcd_plugin() :: DOMAIN ); ?></strong></p>

        <?php endif; ?>
    <?php elseif ( $active_tab == 'chcd-registered-fields-activation' ) : ?>
    <form action="options.php" method="post">
        <?php settings_fields( 'chcd-registered-fields-activate' );
        do_settings_sections( 'chcd-registered-fields-activate' ); ?>
        <p class="submit"><?php submit_button( __( 'Save Settings', chcd_plugin() :: DOMAIN ), 'primary', '', false, [] ); echo ' '; ?></p>
    </form>
    <?php endif; ?>
</div>