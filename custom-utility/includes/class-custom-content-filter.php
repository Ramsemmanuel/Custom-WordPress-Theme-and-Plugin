<?php
/**
 * Custom Content Filter Class
 *
 * @package Custom_Utility
 */

if ( ! class_exists( 'Custom_Content_Filter' ) ) {
    class Custom_Content_Filter {

        public function __construct() {
            add_filter( 'the_content', array( $this, 'append_custom_message' ) );
        }

        /**
         * Appends a custom message to post content.
         *
         * @param string $content The post content.
         * @return string Modified content.
         */
        public function append_custom_message( $content ) {
            // Only append to single posts, not pages or archives.
            if ( is_single() && ! is_page() ) {
                $message = '<p><em>' . esc_html__( 'This content was enhanced by the Custom Utility Plugin!', 'custom-utility' ) . '</em></p>';
                $content .= $message;
            }
            return $content;
        }

        // Add more content modification functions as needed.
        // E.g., pre-pending, replacing text, or wrapping content with specific HTML.
    }
}