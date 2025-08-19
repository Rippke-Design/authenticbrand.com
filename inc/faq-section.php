<section id="faq-full-bleed" class="faq">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-12 faq-bg-bleed background-teal-darker text-light col-left">
        <div class="content-inner padding-y-100">
          <?php the_sub_field('left_column_content'); ?>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/faq-geometric-pattern.webp"
          class="bleed-img d-none d-sm-block" alt="Pattern">
      </div>
      <div class="col-lg-8 col-md-12 background-white  col-right">
        <div class="content-inner padding-y-100">
          <?php if (have_rows('faq_items')) : ?>
          <?php while (have_rows('faq_items')) : the_row(); 
              $faq_headline = get_sub_field('faq_headline');
              $faq_content = get_sub_field('faq_content');
              $is_open = get_sub_field('open');
            ?>
          <details <?php echo $is_open ? 'open' : ''; ?>>
            <summary><?php echo esc_html($faq_headline); ?></summary>
            <div class="details-inner">
              <?php echo wp_kses_post($faq_content); ?>
            </div>
          </details>
          <?php endwhile; ?>
          <?php else : ?>
          <!-- Fallback content if no FAQ items -->

          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>