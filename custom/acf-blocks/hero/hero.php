<section class="hero-section" style="text-align: center; padding: 80px 20px;">
  <h1 style="font-size: 48px; color: #1e3d79;"><?php the_field('hero_title'); ?></h1>
  <p style="font-size: 16px; max-width: 700px; margin: 0 auto 20px;"><?php the_field('hero_description'); ?></p>
  <a class="cta-button" href="<?php the_field('cta_link'); ?>" style="background: #1e3d79; color: white; padding: 12px 24px; display: inline-block;">
    <?php the_field('cta_text'); ?>
  </a>
</section>