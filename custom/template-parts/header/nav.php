<?php
$logo_id = get_field('site_logo', 'option');
$logo_url = $logo_id ? wp_get_attachment_image_url($logo_id, 'full') : get_template_directory_uri() . '/assets/logo.svg';

$menu_location = 'primary';
$menu_override = get_field('custom_menu', 'option');
if ($menu_override && is_nav_menu($menu_override)) {
  $menu_location = $menu_override;
}
?>

<header class="site-header<?php echo get_field('transparent_header', 'option') ? ' transparent' : ''; ?>">
  <nav class="nav-container">
    <div class="nav-logo">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo esc_url($logo_url); ?>" alt="Site Logo" />
      </a>
    </div>
    <button class="mobile-toggle" aria-label="Toggle navigation">&#9776;</button>
    <div class="nav-menu-wrap">
      <div class="nav-menu">
        <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'menu_class' => 'main-menu',
          'container' => false,
        ]);
        ?>
      </div>
      <div class="nav-cta">
        <a href="/register" class="register-btn">Register</a>
      </div>
    </div>
  </nav>
</header>
