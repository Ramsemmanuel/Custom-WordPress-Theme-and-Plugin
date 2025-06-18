<section class="latest-posts" style="padding: 60px 20px; max-width: 960px; margin: 0 auto;">
  <h2 style="font-size: 30px; margin-bottom: 30px;">Latest Blogs</h2>
  <?php
  $query = new WP_Query(['post_type' => 'post', 'posts_per_page' => 3]);
  if ($query->have_posts()):
    while ($query->have_posts()): $query->the_post(); ?>
      <article style="margin-bottom: 30px;">
        <h3 style="font-size: 24px;"><?php the_title(); ?></h3>
        <p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
      </article>
    <?php endwhile;
    wp_reset_postdata();
  else:
    echo '<p>No posts found.</p>';
  endif;
  ?>
</section>