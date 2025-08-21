<?php 
// Component variables & Configuration
$accordion_columns_layout = get_sub_field('accordion_columns_layout');

$background_color = get_sub_field('background_color');
$text_color = "text-dark";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-light";
} 

?>

<section id="accordion-columns-<?php echo get_row_index(); ?>"
  class="accordion-columns <?php echo $background_color; ?> <?php echo $text_color; ?> padding-y-100">
  <span class="badge text-bg-danger">Accordion 2 Columns</span>

  <div class="container">
    <div class="row">
      <?php if (get_sub_field('headline')): ?>
      <div class="col-lg-12 mb-5">
        <?php the_sub_field('headline'); ?>
      </div>
      <?php endif; ?>

      <!-- Accordion Items -->
      <?php if (have_rows('accordion_items')) : ?>
      <?php while (have_rows('accordion_items')) : the_row(); 
        $accordion_headline = get_sub_field('accordion_headline');
        $accordion_content = get_sub_field('accordion_content');
        $is_open = get_sub_field('open');
      ?>

      <?php if ($accordion_columns_layout == 'col2'): ?>
      <div class="col-lg-6 mb-5">
        <?php else: ?>
        <div class="col-lg-12 mb-5">
          <?php endif; ?>

          <div class="island background-white text-dark">
            <details <?php echo $is_open ? 'open' : ''; ?>>
              <summary><?php echo esc_html($accordion_headline); ?></summary>
              <div class="details-inner">
                <?php echo wp_kses_post($accordion_content); ?>
              </div>
            </details>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>