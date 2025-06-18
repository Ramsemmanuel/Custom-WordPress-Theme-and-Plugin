<?php
/**
 * Template Name: Landing Page (Modular)
 */
get_header(); ?>

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
