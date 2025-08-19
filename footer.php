<footer>
  <div class="container">
    <div class="row gy-lg-0 gy-5">
      <div class="col-lg-12">
        <img src="<?php echo get_template_directory_uri(); ?>/docs/assets/img/authentic-brand-logo-dark.svg"
          alt="Authentic Brand Logo" class="footer-logo">
      </div>

      <div class="col-lg-4">

        <address>
          <strong class="text-white">Authentic Headquarters</strong><br>
          4600 W. 77th St. Suite 385<br>
          Minneapolis, MN 55435<br>
          Phone: <a href="tel:6128086300">612-808-6300</a>
        </address>
        <p>
          <small>Authentic<sup>®</sup>, Overcome Random Acts of Marketing<sup>®</sup>, and Authentic Growth<sup>®</sup>
            are
            registered trademarks of Authentic Brand LLC.</small>
        </p>

        <ul class="list-unstyled d-flex align-items-center footer-social mt-3 mb-3 gap-3">
          <li>
            <a href="https://www.linkedin.com/company/authenticbrandllc/" target="_blank" rel="noopener"
              aria-label="LinkedIn">
              <i class="fab fa-linkedin fa-xl"></i>
            </a>
          </li>
          <li>
            <a href="https://www.youtube.com/@AuthenticBrandLLC" target="_blank" rel="noopener" aria-label="YouTube">
              <i class="fab fa-youtube fa-xl"></i>
            </a>
          </li>
        </ul>



      </div>
      <div class="col-lg-2">
        <ul class="list-unstyled d-flex flex-column gap-3">
          <?php
            $main_nav_links = get_field('main_nav_links', 'option');
            
            if ($main_nav_links) : foreach ($main_nav_links as $nav_item) :
                $main_nav_link = $nav_item['main_nav_link'];
                if ($main_nav_link) :
            ?>
          <li>
            <a href="<?php echo esc_url($main_nav_link['url']); ?>">
              <?php echo esc_html($main_nav_link['title']); ?>
            </a>
          </li>
          <?php
                endif;
              endforeach;
            endif;
            ?>
        </ul>
      </div>
      <div class="col-lg-3">
        <div class="d-grid gap-2">
          <a href="#" class="btn btn-outline">
            Find the right marketing leadership solution for your business.
          </a>

          <a href="#" class="btn btn-outline">
            Explore Authentic® careers.
          </a>

        </div>

      </div>
      <div class="col-lg-3">
        <img src="<?php echo get_template_directory_uri(); ?>/docs/assets/img/badges-footer.png" alt="">
      </div>

      <div class="col-lg-12">
        <p class="copyright">
          © <span id="year"></span> Authentic Brand LLC | <a href="#">Privacy Policy</a>
        </p>
      </div>

    </div>
</footer>

<?php wp_footer(); ?>

<script>
document.getElementById('year').textContent = new Date().getFullYear();
</script>

</body>

</html>