# Custom WordPress Theme

A custom, modular WordPress theme built from scratch using modern development practices.

## Setup Steps

1.  Upload the `custom` folder to your `wp-content/themes/` directory.
2.  Activate the theme from the 'Appearance > Themes' menu in the WordPress admin dashboard.
3.  Ensure ACF Pro is installed and activated for block development and ACF field group synchronization.
4.  (Optional) If you are using a build process for assets (e.g., Gulp, Webpack) to generate `main.min.css` from `main.css`, run your build command. The theme's `theme.json` includes a setting to toggle between minified and unminified assets.

## Features Implemented

### Theme Structure

- Follows a standard WordPress theme hierarchy with required files (`style.css`, `functions.php`, `index.php`, `header.php`, `footer.php`, `404.php`, `theme.json`).
- Organized with `inc/`, `assets/`, `template-parts/blocks/`, and `acf-json/` folders.

### Bootstrapping

- `functions.php` includes separate files for theme setup, script enqueuing, style enqueuing, utility functions, and ACF block registration.

### ACF and Gutenberg Block Development

- **Component-Based Architecture**: Utilizes ACF and Gutenberg blocks for building content sections.
- **Block Registration**: Blocks are registered using `acf_register_block_type()` in `inc/acf-blocks.php`.
- **Block Templates**: Each block has its dedicated folder within `template-parts/blocks/` containing its `render.php` and `block.json`.
- **ACF Field Groups**: ACF field groups for blocks are stored as JSON in `acf-json/` and automatically synchronized.
- **Editor and Front-end Rendering**: All blocks are designed to render correctly in both the Gutenberg editor and the public-facing front-end.
- **`block.json`**: Each block includes a `block.json` file for native Gutenberg integration and settings.
- **Preview Images**: (If implemented) Blocks have `preview.png` files for better visual representation in the editor.

### Asset Management

- **CSS**: Stored in `assets/css/`. Supports conditional loading of `main.min.css` or `main.css` based on a theme setting.
- **JavaScript**: Stored in `assets/js/` and enqueued via `inc/theme-scripts.php`.
- **Minified Asset Loading**: A custom setting in `theme.json` (`custom/minifyAssets`) allows toggling between minified and unminified assets.

### Utilities and Safe ACF Handling

- **`inc/utils.php`**: Contains helper functions, including wrappers for ACF functions.
- **`custom_safe_get_field()` and `custom_safe_the_field()`**: These functions ensure that ACF field retrieval and display are robust, preventing errors if ACF is not active or a field does not exist.

### Responsiveness and Accessibility

- The theme design (based on the provided PDF) is implemented with responsive breakpoints for various devices.
- Semantic HTML, ARIA attributes (where necessary), and other accessibility best practices are followed.

## How to Modify or Extend Functionality

### Adding New Blocks

1.  **Create a New Block Folder**: In `template-parts/blocks/`, create a new folder for your block (e.g., `my-new-block`).
2.  **`block.json`**: Create `block.json` inside this folder, defining block properties (name, title, icon, supports, etc.).
3.  **`render.php`**: Create `render.php` in the block folder; this will contain the HTML structure and logic for your block, pulling data from ACF fields.
4.  **Register ACF Field Group**: In the WordPress admin, go to ACF > Field Groups. Create a new field group for your block and set its location to "Block is equal to `acf/my-new-block`" (using the `name` from `block.json`). Save the field group to automatically generate its JSON file in `acf-json/`.
5.  **Register Block in PHP**: In `inc/acf-blocks.php`, add a new `acf_register_block_type()` call, pointing `render_template` to your new block's `render.php`.

### Modifying Existing Blocks

- **ACF Fields**: Edit the ACF field group in the WordPress admin, or directly modify the corresponding JSON file in `acf-json/` (then synchronize via ACF settings).
- **Block HTML/Logic**: Modify the `render.php` file for the specific block in `template-parts/blocks/`.
- **Block Settings**: Adjust properties in the block's `block.json` file.

### Customizing Styles

- Modify `assets/css/main.css`. If using a build process, ensure you re-run it to generate `main.min.css`.
- Add block-specific styles to your block's folder (e.g., `template-parts/blocks/hero-section/style.css`) and enqueue them in `acf-blocks.php` within the `enqueue_assets` callback for that block.

### Customizing Scripts

- Modify `assets/js/main.js`.
- Add block-specific scripts to your block's folder (e.g., `template-parts/blocks/hero-section/script.js`) and enqueue them in `acf-blocks.php` within the `enqueue_assets` callback for that block.

### Adding New Utility Functions

- Add new helper functions to `inc/utils.php`. Ensure they are wrapped in `if ( ! function_exists(...) )` to prevent conflicts.

### Theme Settings (from `theme.json`)

- Modify `theme.json` to adjust global styles, color palettes, font settings, or add new custom settings (like the `minifyAssets` example).

### General

- Always use WordPress actions and filters for extending functionality rather than directly modifying core files.
- Prioritize security by sanitizing and escaping all input and output.
- Adhere to WordPress coding standards for consistency and readability.
