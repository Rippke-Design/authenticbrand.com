<?php

$column_alignment = get_sub_field('column_alignment');

// Set text color based on background
$background_color = get_sub_field('background_color');
$text_color = "text-dark";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-light";
} 

?>

<section id="contained-columns-section-<?php echo get_row_index(); ?>"
  class="contained-columns-section <?php the_sub_field('background_color'); ?> <?php echo $text_color; ?> <?php if (get_sub_field('has_curved_bottom')): ?>background-curved-bottom<?php endif; ?>">

  <?php if( have_rows('background_images') ): ?>
  <?php while( have_rows('background_images') ): the_row();  
    $background_image = get_sub_field('background_image');
  ?>
  <div class="<?php echo $background_image; ?>">
    <?php endwhile; ?>
    <?php endif; ?>
    <div class="padding-y-100">

      <span class="badge text-bg-danger">Contained Columns</span>
      <div class="container">
        <?php if (get_sub_field('before_columns_content')): ?>
        <div class="row">
          <div class="col-lg-12 mb-5">
            <?php the_sub_field('before_columns_content'); ?>
          </div>
        </div>
        <?php endif; ?>

        <div class="row justify-content-center <?php echo $column_alignment; ?>">
          <?php if( have_rows('columns') ): ?>
          <?php while( have_rows('columns') ): the_row(); ?>
          <div class="col">
            <?php the_sub_field('column_content'); ?>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>

        <?php if (get_sub_field('after_columns_content')): ?>
        <div class="row">
          <div class="col-lg-12 mt-5">
            <?php the_sub_field('after_columns_content'); ?>
          </div>
        </div>
        <?php endif; ?>
      </div>

      <!-- close padding div -->
    </div>

    <?php if( have_rows('background_images') ): ?>
    <?php while( have_rows('background_images') ): the_row();  ?>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>

</section>