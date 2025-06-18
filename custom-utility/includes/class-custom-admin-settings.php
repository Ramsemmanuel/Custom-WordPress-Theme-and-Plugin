<?php
/**
 * Custom Admin Settings Class
 *
 * @package Custom_Utility
 */

if ( ! class_exists( 'Custom_Admin_Settings' ) ) {
    class Custom_Admin_Settings {

        private $option_group = 'custom_utility_options_group';
        private $page_slug    = 'custom-utility-settings';
        private $settings_section_id = 'custom_utility_main_section';

        public function __construct() {
            add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
            add_action( 'admin_init', array( $this, 'register_settings' ) );
        }

        /**
         * Add admin menu page.
         */
        public function add_admin_menu() {
            add_options_page(
                __( 'Custom Utility Settings', 'custom-utility' ), // Page title
                __( 'Custom Utility', 'custom-utility' ),         // Menu title
                'manage_options',                                   // Capability
                $this->page_slug,                                   // Menu slug
                array( $this, 'settings_page_html' )                // Callback function
            );
        }

        /**
         * Register plugin settings.
         */
        public function register_settings() {
            register_setting(
                $this->option_group,        // Option group
                'custom_utility_setting_example', // Option name
                array( $this, 'sanitize_callback' ) // Sanitize callback
            );

            add_settings_section(
                $this->settings_section_id,     // ID
                __( 'Main Settings', 'custom-utility' ), // Title
                array( $this, 'settings_section_callback' ), // Callback
                $this->page_slug                // Page
            );

            add_settings_field(
                'custom_utility_text_field',    // ID
                __( 'Example Text Field', 'custom-utility' ), // Title
                array( $this, 'text_field_callback' ), // Callback
                $this->page_slug,               // Page
                $this->settings_section_id,     // Section
                array(
                    'label_for' => 'custom_utility_text_field',
                    'class'     => 'custom-utility-row',
                )
            );

            add_settings_field(
                'custom_utility_checkbox_field', // ID
                __( 'Enable Feature', 'custom-utility' ), // Title
                array( $this, 'checkbox_field_callback' ), // Callback
                $this->page_slug,               // Page
                $this->settings_section_id,     // Section
                array(
                    'label_for' => 'custom_utility_checkbox_field',
                    'class'     => 'custom-utility-row',
                )
            );
        }

        /**
         * Settings page HTML.
         */
        public function settings_page_html() {
            ?>
            <div class="wrap">
                <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
                <form action="options.php" method="post">
                    <?php
                    settings_fields( $this->option_group );
                    do_settings_sections( $this->page_slug );
                    submit_button( __( 'Save Changes', 'custom-utility' ) );
                    ?>
                </form>
            </div>
            <?php
        }

        /**
         * Settings section callback.
         */
        public function settings_section_callback() {
            echo '<p>' . esc_html__( 'Configure general settings for the Custom Utility plugin.', 'custom-utility' ) . '</p>';
        }

        /**
         * Text field callback.
         */
        public function text_field_callback() {
            $value = get_option( 'custom_utility_setting_example' );
            ?>
            <input type="text" id="custom_utility_text_field" name="custom_utility_setting_example" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
            <p class="description"><?php esc_html_e( 'This is an example text field.', 'custom-utility' ); ?></p>
            <?php
        }

        /**
         * Checkbox field callback.
         */
        public function checkbox_field_callback() {
            $value = get_option( 'custom_utility_checkbox_field' );
            ?>
            <input type="checkbox" id="custom_utility_checkbox_field" name="custom_utility_checkbox_field" value="1" <?php checked( 1, $value ); ?> />
            <label for="custom_utility_checkbox_field"><?php esc_html_e( 'Check to enable this feature.', 'custom-utility' ); ?></label>
            <?php
        }


        /**
         * Sanitize callback for settings.
         *
         * @param mixed $input The input value.
         * @return mixed Sanitized value.
         */
        public function sanitize_callback( $input ) {
            if ( is_string( $input ) ) {
                return sanitize_text_field( $input );
            }
            return $input;
        }
    }
}