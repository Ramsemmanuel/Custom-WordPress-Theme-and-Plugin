<?php
/**
 * Uninstall routines for Custom Utility Plugin.
 *
 * @package Custom_Utility
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Delete plugin options.
delete_option( 'custom_utility_setting_example' );
delete_option( 'custom_utility_checkbox_field' );

// Delete any custom post types, taxonomies, or transient data created by the plugin.
// For example:
// $posts = get_posts( array( 'post_type' => 'my_custom_post_type', 'numberposts' => -1 ) );
// foreach ( $posts as $post ) {
//     wp_delete_post( $post->ID, true );
// }