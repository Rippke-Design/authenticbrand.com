<?php 
$background_color = get_sub_field('background_color');

// Generate FAQ JSON-LD schema
if (have_rows('faq_items')) {
    $faq_schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'name' => 'Frequently Asked Questions',
        'mainEntity' => array()
    );
    
    while (have_rows('faq_items')) : the_row();
        $faq_headline = get_sub_field('faq_headline');
        $faq_content = get_sub_field('faq_content');
        
        if ($faq_headline && $faq_content) {
            $faq_schema['mainEntity'][] = array(
                '@type' => 'Question',
                'name' => $faq_headline,
                'acceptedAnswer' => array(
                    '@type' => 'Answer',
                    'text' => $faq_content
                )
            );
        }
    endwhile;
    
    // Output the JSON-LD schema
    echo '<script type="application/ld+json">' . json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}
?>
<section id="faq-full-bleed-<?php echo get_row_index(); ?>" class="faq <?php echo $background_color; ?>">
  <span class="badge text-bg-danger">FAQ</span>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-12 faq-bg-bleed  text-light col-left">
        <div class="content-inner padding-y-100">
          <?php the_sub_field('left_column_content'); ?>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/docs/assets/img/faq-geometric-pattern.webp"
          class="bleed-img d-none d-xl-block" alt="Pattern">
      </div>
      <div class="col-lg-8 col-md-12   col-right">
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
          <?php if (get_sub_field('after_faq_content')) : ?>
          <div class="island background-white">
            <?php the_sub_field('after_faq_content'); ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>