<?php
/**
 * Theme setup functions.
 *
 * @package Custom_Theme
 */

if ( ! function_exists( 'custom_theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function custom_theme_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__( 'Primary', 'custom-theme' ),
            )
        );

        // Switch default core markup for search form, comment form, and comments
        // to output valid HTML5.
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add support for core block visual styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for custom color palettes.
        add_theme_support( 'editor-color-palette', array() ); // Define your palette in theme.json

        // Add support for custom font sizes.
        add_theme_support( 'editor-font-sizes', array() ); // Define your font sizes in theme.json

        // Add support for responsive embeds.
        add_theme_support( 'responsive-embeds' );

        // Load text domain for translation.
        load_theme_textdomain( 'custom-theme', get_template_directory() . '/languages' );
    }
endif;
add_action( 'after_setup_theme', 'custom_theme_setup' );