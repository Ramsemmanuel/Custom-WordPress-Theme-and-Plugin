<?php
/**
 * Enqueue scripts.
 *
 * @package Custom_Theme
 */

if ( ! function_exists( 'custom_theme_scripts' ) ) {
    function custom_theme_scripts() {
        $minify_assets = get_theme_mod( 'custom_theme_minify_assets', false );

        wp_enqueue_script(
            'custom-theme-main',
            get_template_directory_uri() . '/assets/js/main.js',
            array(),
            '1.0.0',
            true
        );
    }
    add_action( 'wp_enqueue_scripts', 'custom_theme_scripts' );
}

if ( ! function_exists( 'custom_theme_landing_scripts' ) ) {
    function custom_theme_landing_scripts() {
        wp_enqueue_script(
            'custom-landing',
            get_template_directory_uri() . '/assets/js/landing.js',
            array(),
            '1.0.0',
            true
        );
    }
    add_action( 'wp_enqueue_scripts', 'custom_theme_landing_scripts' );
}