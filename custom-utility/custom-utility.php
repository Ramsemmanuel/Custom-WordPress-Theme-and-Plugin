<?php
/**
 * Plugin Name: Custom Utility Plugin
 * Plugin URI: https://yourwebsite.com/
 * Description: A custom utility plugin for reusable functionality.
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://yourwebsite.com/
 * License: GPL2
 * Text Domain: custom-utility
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Require necessary files
require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-shortcodes.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-admin-settings.php';
// require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-content-filter.php'; // Uncomment if implementing content filter

/**
 * Initialize plugin components.
 */
function custom_utility_plugin_init() {
    new Custom_Shortcodes();
    new Custom_Admin_Settings();
    // new Custom_Content_Filter(); // Uncomment if implementing content filter
}
add_action( 'plugins_loaded', 'custom_utility_plugin_init' );

/**
 * Activation hook.
 */
function custom_utility_activate() {
    // Perform activation tasks, e.g., create default options.
    add_option( 'custom_utility_setting_example', 'Default value' );
}
register_activation_hook( __FILE__, 'custom_utility_activate' );

/**
 * Deactivation hook.
 */
function custom_utility_deactivate() {
    // Perform deactivation tasks.
}
register_deactivation_hook( __FILE__, 'custom_utility_deactivate' );