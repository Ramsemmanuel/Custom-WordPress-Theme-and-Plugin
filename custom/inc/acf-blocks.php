<?php
/**
 * Register custom ACF Gutenberg blocks.
 *
 * @package Custom_Theme
 */

if ( ! function_exists( 'custom_register_acf_blocks' ) ) {
    function custom_register_acf_blocks() {
        if ( function_exists( 'acf_register_block_type' ) ) {

            // Example Block: Hero Section
            acf_register_block_type( array(
                'name'              => 'hero_section',
                'title'             => __( 'Hero Section', 'custom-theme' ),
                'description'       => __( 'A custom hero section block.', 'custom-theme' ),
                'render_template'   => get_template_directory() . '/template-parts/blocks/hero-section/render.php',
                'category'          => 'layout', // Common categories: common, formatting, layout, widgets, embed
                'icon'              => 'align-wide', // Dashicons name
                'keywords'          => array( 'hero', 'banner', 'heading' ),
                'mode'              => 'auto', // auto, preview, edit
                'supports'          => array(
                    'align' => array( 'wide', 'full' ),
                    'jsx'   => true, // Enable inner blocks
                ),
                'enqueue_assets' => function(){
                    // Enqueue block-specific assets if needed
                    // wp_enqueue_style( 'hero-section-style', get_template_directory_uri() . '/template-parts/blocks/hero-section/style.css' );
                    // wp_enqueue_script( 'hero-section-script', get_template_directory_uri() . '/template-parts/blocks/hero-section/script.js', array(), '1.0.0', true );
                },
            ) );

            // Example Block: Call to Action
            acf_register_block_type( array(
                'name'              => 'call_to_action',
                'title'             => __( 'Call to Action', 'custom-theme' ),
                'description'       => __( 'A customizable call to action block.', 'custom-theme' ),
                'render_template'   => get_template_directory() . '/template-parts/blocks/call-to-action/render.php',
                'category'          => 'layout',
                'icon'              => 'plus-alt',
                'keywords'          => array( 'cta', 'button', 'link' ),
            ) );

            // Add more blocks as per your design file
        }
    }
}
add_action( 'acf/init', 'custom_register_acf_blocks' );