<?php
/**
 * Template Name: Landing Page (Modular with Nav)
 */
get_header(); ?>

<header class="site-header">
  <nav class="nav-container">
    <div class="nav-logo">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg" alt="Site Logo" />
      </a>
    </div>

    <button class="nav-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle menu">
      &#9776;
    </button>

    <div class="nav-menu-wrapper">
      <div class="nav-menu">
        <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'menu_class' => 'main-menu',
          'container' => false,
          'menu_id' => 'primary-menu',
        ]);
        ?>
      </div>
      <div class="nav-cta">
        <a href="/register" class="btn btn-primary">Register</a>
      </div>
    </div>
  </nav>
</header>

<style>
/* Basic Reset */
.nav-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
 /* max-width: 1200px; */
  margin: 0 auto;
  padding: 0.5rem 1rem;
  position: relative;
}

/* Logo always left */
.nav-logo {
  flex: 1 1 auto;
}

.nav-logo img {
  width: 30% !important;
}

/* Menu + CTA wrapper - for desktop, we'll align them horizontally and center the menu */
.nav-menu-wrapper {
  flex: 3 1 auto;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 2rem;
}

/* The menu container */
.nav-menu {
  flex-grow: 1;
}

/* Register button aligned right */
.nav-cta {
  flex: 0 0 auto;
}

/* Menu styling */
.main-menu {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  gap: 1.5rem;
}

.main-menu li a {
  text-decoration: none;
  color: #333;
  font-weight: 600;
}

/* Register button style */
.register-btn {
  background-color: #0073aa;
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 4px;
  text-decoration: none;
  font-weight: 600;
  white-space: nowrap;
}

.register-btn:hover,
.register-btn:focus {
  background-color: #005177;
}

/* Mobile menu toggle button - hidden on desktop */
.nav-toggle {
  background: none;
  border: none;
  font-size: 2rem;
  cursor: pointer;
  display: none;
}

/* Responsive: Mobile first */
@media (max-width: 768px) {
  .nav-container {
    justify-content: space-between;
  }

  /* Show toggle button on mobile */
  .nav-toggle {
    display: block;
  }

  /* Hide menu and cta by default */
  .nav-menu-wrapper {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    flex-direction: column;
    align-items: flex-start;
    padding: 1rem 1.5rem;
    border-top: 1px solid #ddd;
    display: none;
    z-index: 999;
  }

  /* Show menu when toggled */
  .nav-menu-wrapper.active {
    display: flex;
  }

  /* Stack menu vertically */
  .main-menu {
    flex-direction: column;
    width: 100%;
  }

  .main-menu li {
    margin-bottom: 1rem;
  }

  /* Register button full width */
  .nav-cta {
    width: 100%;
  }

  .register-btn {
    display: block;
    width: 100%;
    text-align: center;
  }
}

</style>

<main id="site-content" role="main">
  <?php
  if (have_posts()) {
    while (have_posts()) {
      the_post();
      the_content(); // Gutenberg blocks go here
    }
  }
  ?>
</main>

<?php get_footer(); ?>
