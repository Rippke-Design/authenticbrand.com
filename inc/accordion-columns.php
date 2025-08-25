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
  class="accordion-columns <?php echo $background_color; ?> <?php echo $text_color; ?>">

  <?php if( have_rows('background_images') ): ?>
  <?php while( have_rows('background_images') ): the_row();  
    $background_image = get_sub_field('background_image');
  ?>
  <div class="<?php echo $background_image; ?>">
    <?php endwhile; ?>
    <?php endif; ?>
    <div class="padding-y-100">
      <span class="badge text-bg-danger">Accordion 2 Columns</span>

      <div class="container">
        <div class="row">
          <?php if (get_sub_field('headline')): ?>
          <div class="col-lg-12 mb-5">
            <?php the_sub_field('headline'); ?>
          </div>
          <?php endif; ?>




          <?php if ($accordion_columns_layout == 'col2'): ?>

          <?php if (have_rows('accordion_items')) : ?>
          <?php while (have_rows('accordion_items')) : the_row(); 
        $accordion_headline = get_sub_field('accordion_headline');
        $accordion_content = get_sub_field('accordion_content');
        $is_open = get_sub_field('open');
      ?>
          <div class="col-lg-6 mb-5">
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
          <?php endif; ?>

          <?php if ($accordion_columns_layout == 'col1'): ?>
          <?php if (have_rows('accordion_items')) : ?>
          <?php while (have_rows('accordion_items')) : the_row(); 
        $accordion_headline = get_sub_field('accordion_headline');
        $accordion_content = get_sub_field('accordion_content');
        $is_open = get_sub_field('open');
      ?>
          <div class="col-lg-12 mb-5">
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
          <?php endif; ?>

          <?php if ($accordion_columns_layout == 'island'): ?>
          <?php if (have_rows('accordion_items')) : ?>
          <div class="col-lg-12">
            <div class="island background-white accordion-icon ">
              <div class="island-content">
                <?php while (have_rows('accordion_items')) : the_row(); 
              $accordion_headline = get_sub_field('accordion_headline');
              $accordion_content = get_sub_field('accordion_content');
              $is_open = get_sub_field('open');
            ?>
                <details <?php echo $is_open ? 'open' : ''; ?>>
                  <summary>
                    <?php 
                $accordion_icon = get_sub_field('accordion_icon');
                if ($accordion_icon): ?>
                    <img src="<?php echo esc_url($accordion_icon['url']); ?>"
                      alt="<?php echo esc_html($accordion_headline); ?>" class="icon"
                      style="width: 50px; height: auto;">
                    <?php endif; ?>
                    <?php echo esc_html($accordion_headline); ?>
                  </summary>
                  <div class="details-inner">
                    <?php echo wp_kses_post($accordion_content); ?>
                  </div>
                </details>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>

      <!-- close padding div -->
    </div>

    <?php if( have_rows('background_images') ): ?>
    <?php while( have_rows('background_images') ): the_row();  ?>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
</section>