<?php
/**
 * Helper utility functions.
 *
 * @package Custom_Theme
 */

if ( ! function_exists( 'custom_safe_get_field' ) ) {
    /**
     * Safely retrieves an ACF field value.
     * Prevents errors if ACF is not active or field does not exist.
     *
     * @param string $field_name The name of the ACF field.
     * @param mixed  $post_id    The post ID (optional). Defaults to current post.
     * @param bool   $format_value Whether to format the value (optional).
     * @return mixed The field value, or null if not found/ACF not active.
     */
    function custom_safe_get_field( $field_name, $post_id = false, $format_value = true ) {
        if ( function_exists( 'get_field' ) ) {
            return get_field( $field_name, $post_id, $format_value );
        }
        return null;
    }
}

if ( ! function_exists( 'custom_safe_the_field' ) ) {
    /**
     * Safely displays an ACF field value.
     * Prevents errors if ACF is not active or field does not exist.
     *
     * @param string $field_name The name of the ACF field.
     * @param mixed  $post_id    The post ID (optional). Defaults to current post.
     * @param bool   $format_value Whether to format the value (optional).
     */
    function custom_safe_the_field( $field_name, $post_id = false, $format_value = true ) {
        if ( function_exists( 'the_field' ) ) {
            the_field( $field_name, $post_id, $format_value );
        }
    }
}

// Add other utility functions here as needed, e.g., for image handling, responsive images, etc.