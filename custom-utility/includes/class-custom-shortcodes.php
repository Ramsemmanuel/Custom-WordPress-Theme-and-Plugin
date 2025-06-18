<?php
/**
 * Custom Shortcodes Class
 *
 * @package Custom_Utility
 */

if ( ! class_exists( 'Custom_Shortcodes' ) ) {
    class Custom_Shortcodes {

        public function __construct() {
            add_action( 'init', array( $this, 'register_shortcodes' ) );
        }

        /**
         * Register custom shortcodes.
         */
        public function register_shortcodes() {
            add_shortcode( 'custom_greeting', array( $this, 'custom_greeting_shortcode' ) );
            add_shortcode( 'custom_button', array( $this, 'custom_button_shortcode' ) );
        }

        /**
         * Shortcode to output a simple greeting.
         * Usage: [custom_greeting name="John Doe"]
         *
         * @param array $atts Shortcode attributes.
         * @return string HTML output.
         */
        public function custom_greeting_shortcode( $atts ) {
            $atts = shortcode_atts(
                array(
                    'name' => 'Guest',
                ),
                $atts,
                'custom_greeting'
            );

            return '<p class="custom-greeting">Hello, ' . esc_html( $atts['name'] ) . '!</p>';
        }

        /**
         * Shortcode to output a button.
         * Usage: [custom_button link="https://example.com" text="Click Me" class="primary-btn"]
         *
         * @param array $atts Shortcode attributes.
         * @return string HTML output.
         */
        public function custom_button_shortcode( $atts ) {
            $atts = shortcode_atts(
                array(
                    'link'  => '#',
                    'text'  => 'Button',
                    'class' => '',
                ),
                $atts,
                'custom_button'
            );

            return sprintf(
                '<a href="%s" class="custom-button %s">%s</a>',
                esc_url( $atts['link'] ),
                esc_attr( $atts['class'] ),
                esc_html( $atts['text'] )
            );
        }
    }
}