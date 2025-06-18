<?php
/**
 * Footer template with boxed layout and left-aligned content
 *
 * @package Custom_Theme
 */
?>

<footer id="colophon" class="site-footer" role="contentinfo" style="background:#203c79; padding: 2rem 1rem;">
  <div class="footer-container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem; text-align: left;">

    <!-- Logo -->
    <div class="footer-logo" style="margin-bottom: 1rem;">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/footer-logo.png" alt="<?php bloginfo('name'); ?> logo" style="max-width: 200px; height: auto;">
      </a>
    </div>

    <!-- Social icons -->
<div class="footer-social" style="font-size: 1.5rem; margin-bottom: 2rem;">
  <a href="https://facebook.com/yourpage" target="_blank" rel="noopener noreferrer" aria-label="Facebook" style="margin-right: 15px; color: #fff;">
    <i class="fab fa-facebook-f"></i>
  </a>
  <a href="https://instagram.com/yourpage" target="_blank" rel="noopener noreferrer" aria-label="Instagram" style="margin-right: 15px; color: #fff;">
    <i class="fab fa-instagram"></i>
  </a>
  <a href="https://twitter.com/yourpage" target="_blank" rel="noopener noreferrer" aria-label="X (Twitter)" style="color: #fff;">
    <i class="fab fa-x-twitter"></i>
  </a>
</div>


      <!-- Description text -->
    <div class="footer-description" style="max-width: 600px; margin-bottom: 2rem; font-size: 1rem; color: #fff;">
      <p>
        Cursus commodo vitae faucibus hac. Sem pretium lacus nunc urna commodo feugiat lacus. Massa a faucibus porttitor est maecenas aliquet.
      </p>
    </div>
    <div class="site-info" style="font-size: 0.875rem; color: #999;">
      <?php
        
      ?>
    </div>

  </div><!-- .footer-container -->
</footer>

<?php wp_footer(); ?>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.querySelector('.nav-toggle');
    const menuWrapper = document.querySelector('.nav-menu-wrapper');

    if (toggleButton && menuWrapper) {
      toggleButton.addEventListener('click', function () {
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
        menuWrapper.classList.toggle('active');
      });
    }
  });
</script>

</body>
</html>
