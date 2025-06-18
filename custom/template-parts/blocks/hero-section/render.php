<?php
/**
 * Block Name: Hero Section
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute for specific styling.
$id = 'hero-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'hero-section-block';
if( !empty($block['className']) ) {
    $class_name .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and handle defaults.
$heading       = custom_safe_get_field( 'heading' ) ?: 'Default Heading';
$sub_heading   = custom_safe_get_field( 'sub_heading' );
$button_text   = custom_safe_get_field( 'button_text' );
$button_link   = custom_safe_get_field( 'button_link' );
$background_image = custom_safe_get_field( 'background_image' );

?>
<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>" <?php if ( $background_image ) : ?>style="background-image: url(<?php echo esc_url( $background_image['url'] ); ?>);"<?php endif; ?>>
    <div class="hero-content">
        <?php if ( $heading ) : ?>
            <h1 class="hero-heading"><?php echo esc_html( $heading ); ?></h1>
        <?php endif; ?>

        <?php if ( $sub_heading ) : ?>
            <p class="hero-sub-heading"><?php echo esc_html( $sub_heading ); ?></p>
        <?php endif; ?>

        <?php if ( $button_text && $button_link ) : ?>
            <a href="<?php echo esc_url( $button_link ); ?>" class="hero-button"><?php echo esc_html( $button_text ); ?></a>
        <?php endif; ?>

        <?php // This allows for inner blocks if 'jsx' support is true in block.json ?>
        <InnerBlocks />
    </div>
</section>