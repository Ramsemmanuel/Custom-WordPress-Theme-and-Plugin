<main id="site-content" role="main">
  <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        the_content();

        // Output block-based comments or additional content
        wp_link_pages();
      }
    }
  ?>
</main>
