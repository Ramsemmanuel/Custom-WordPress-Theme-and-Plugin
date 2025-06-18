<?php
/**
 * Custom Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Custom_Theme
 */

// Bootstrapping theme files
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/theme-scripts.php';
require_once get_template_directory() . '/inc/theme-styles.php';
require_once get_template_directory() . '/inc/utils.php';
require_once get_template_directory() . '/inc/acf-blocks.php';

// Add other theme-specific functions here

require_once get_template_directory() . '/acf-blocks/register-blocks.php';

register_nav_menus([
  'primary' => __('Primary Menu', 'custom'),
]);

if (function_exists('acf_add_options_page')) {
  acf_add_options_page([
    'page_title' => 'Theme Settings',
    'menu_title' => 'Theme Settings',
    'menu_slug'  => 'theme-settings',
    'capability' => 'edit_posts',
    'redirect'   => false
  ]);
}

function custom_theme_scripts() {
  wp_enqueue_script('custom-main', get_template_directory_uri() . '/assets/js/main.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'custom_theme_scripts');

if ( ! function_exists('custom_theme_scripts') ) {
  function custom_theme_scripts() {
    wp_enqueue_script('custom-main', get_template_directory_uri() . '/assets/js/main.js', [], null, true);
  }
  add_action('wp_enqueue_scripts', 'custom_theme_scripts');
}

function custom_theme_enqueue_dashicons() {
    wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'custom_theme_enqueue_dashicons' );

function custom_theme_enqueue_scripts() {
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', [], null, true );
}
add_action( 'wp_enqueue_scripts', 'custom_theme_enqueue_scripts' );

function load_font_awesome() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'load_font_awesome' );
