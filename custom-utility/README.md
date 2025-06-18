# Custom Utility Plugin

A custom WordPress plugin encapsulating reusable functionality.

## Setup Steps

1.  Upload the `custom-utility` folder to your `wp-content/plugins/` directory.
2.  Activate the plugin through the 'Plugins' menu in WordPress.

## Features Implemented

### Shortcodes

- **`[custom_greeting name="Your Name"]`**: Displays a personalized greeting. `name` is an optional attribute, defaults to "Guest".
- **`[custom_button link="URL" text="Button Text" class="your-class"]`**: Renders a customizable button. `link`, `text`, and `class` are optional attributes.

### Admin Settings Page

- A new menu item "Custom Utility" will appear under "Settings" in the WordPress admin dashboard.
- **Example Text Field**: A simple text input to store a custom setting.
- **Enable Feature Checkbox**: A checkbox to toggle a hypothetical feature.

_(If you implement a content filter, describe it here)_

### Content Filter

- The plugin hooks into `the_content` filter to append a specific message to the end of single post content.

## How to Modify or Extend Functionality

### Shortcodes

- To add new shortcodes, extend the `Custom_Shortcodes` class in `includes/class-custom-shortcodes.php` and add a new `add_shortcode()` call in the `register_shortcodes()` method, along with its corresponding callback function.
- To modify existing shortcodes, edit their respective callback functions within `Custom_Shortcodes`.

### Admin Settings Page

- To add new settings fields, modify the `register_settings()` method in `includes/class-custom-admin-settings.php`:
  - Use `add_settings_field()` to register a new field.
  - Create a corresponding callback method for rendering the field's HTML.
  - Update the `sanitize_callback()` method to properly sanitize the new field's input.
- To modify existing fields, adjust their callbacks and sanitization.

### Content Filter

- To add new content filters, add new `add_filter('the_content', ...)` calls within the `Custom_Content_Filter` class in `includes/class-custom-content-filter.php`.
- To modify the existing content filter, adjust the `append_custom_message()` method. You can change the message, add conditional logic, or modify the content in other ways (e.g., pre-pending, wrapping with HTML).

### General

- All plugin code is structured using classes for better organization and maintainability.
- Utilize standard WordPress hooks (actions and filters) to extend the plugin's capabilities.
- Ensure all new functionality adheres to WordPress coding standards and best practices.
