<footer>
  <div class="container">
    <div class="row gy-lg-0 gy-5">
      <div class="col-lg-12">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/docs/assets/img/authentic-brand-logo-dark.svg"
            alt="Authentic Brand Logo" class="footer-logo">
        </a>
      </div>

      <div class="col-lg-4">

        <address class="text-white">
          <?php the_field('footer_contact_info', 'option'); ?>
        </address>

        <?php the_field('footer_tagline ', 'option'); ?>


        <ul class="list-unstyled d-flex align-items-center footer-social mt-3 mb-3 gap-3">
          <?php if (get_field('linkedin_url', 'option')) : ?>
          <li>
            <a href="<?php the_field('linkedin_url', 'option'); ?>" target="_blank" rel="noopener"
              aria-label="LinkedIn">
              <i class="fab fa-linkedin fa-xl"></i>
            </a>
          </li>
          <?php endif; ?>
          <?php if (get_field('youtube_url', 'option')) : ?>
          <li>
            <a href="<?php the_field('youtube_url', 'option'); ?>" target="_blank" rel="noopener" aria-label="YouTube">
              <i class="fab fa-youtube fa-xl"></i>
            </a>
          </li>
          <?php endif; ?>
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
          <?php
          if (have_rows('footer_cta_buttons', 'option')) :
            while (have_rows('footer_cta_buttons', 'option')) : the_row();
              $button = get_sub_field('footer_cta_button');
              if ($button) :
              ?>
          <a href="<?php echo esc_url($button['url']); ?>" class="btn btn-outline">
            <?php echo esc_html($button['title']); ?>
          </a>
          <?php
              endif;
            endwhile;
          endif;
          ?>
        </div>

      </div>
      <div class="col-lg-3">
        <?php
        $footer_image = get_field('footer_image', 'option');
        if ($footer_image) : ?>
        <img src="<?php echo esc_url($footer_image['url']); ?>" alt="<?php echo esc_attr($footer_image['alt']); ?>"
          class="img-fluid">
        <?php endif; ?>
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