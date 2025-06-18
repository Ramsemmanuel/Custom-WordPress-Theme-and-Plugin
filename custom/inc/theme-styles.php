<?php
/**
 * Enqueue styles.
 *
 * @package Custom_Theme
 */

function custom_theme_styles() {
    // Retrieve the setting using get_theme_mod() or get_option() if you created a custom option.
    // Assuming you've created a customizer setting or admin option for this.
    $minify_assets = get_theme_mod( 'custom_theme_minify_assets', false ); // Default to false if not set.
    $css_file      = $minify_assets ? 'main.min.css' : 'main.css';

    wp_enqueue_style(
        'custom-theme-main',
        get_template_directory_uri() . '/assets/css/' . $css_file,
        array(),
        '1.0.0'
    );

    // Enqueue block styles (editor and front-end)
    wp_enqueue_style( 'wp-block-library' ); // Default Gutenberg styles
    // wp_enqueue_style( 'wp-block-library-theme' ); // This might also require newer WP versions.
}
add_action( 'wp_enqueue_scripts', 'custom_theme_styles' );

// Enqueue editor-specific styles
function custom_theme_editor_styles() {
    add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'admin_init', 'custom_theme_editor_styles' );

// You would also need to register this setting, e.g., in inc/theme-setup.php or a new file
// Example for Customizer:
// function custom_theme_customize_register( $wp_customize ) {
//     $wp_customize->add_setting( 'custom_theme_minify_assets', array(
//         'default'   => false,
//         'transport' => 'refresh',
//         'sanitize_callback' => 'rest_sanitize_boolean', // Or custom sanitize function
//     ) );

//     $wp_customize->add_control( 'custom_theme_minify_assets_control', array(
//         'label'     => __( 'Minify Assets', 'custom-theme' ),
//         'section'   => 'title_tagline', // Or create a new section
//         'type'      => 'checkbox',
//         'settings'  => 'custom_theme_minify_assets',
//     ) );
// }
// add_action( 'customize_register', 'custom_theme_customize_register' );