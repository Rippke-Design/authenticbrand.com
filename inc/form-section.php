<section id="form-section-<?php echo get_row_index(); ?>"
  class="form-section <?php the_sub_field('background_color'); ?> padding-y-100">
  <div class="container">
    <div class="row ">

      <?php if (get_sub_field("form_section_layout") == "form-25-75"): ?>
      <div class="col-lg-3 col-md-12 col-left <?php echo $left_column_text_color; ?>"
        style="background-color: <?php the_sub_field('left_column_background_color'); ?>;">
        <!-- Note padding has to be added inside columns for full bleeds -->
        <div class="col-inner padding-y-100 padding-end-50">
          <?php the_sub_field('form_section_content'); ?>
        </div>
      </div>

      <div class="col-lg-9 col-md-12 col-right <?php echo $right_column_text_color; ?>"
        style="background-color: <?php the_sub_field('right_column_background_color'); ?>;">
        <div class="col-inner padding-y-100 padding-start-50">
          <?php $form_id = get_sub_field('gravity_form'); ?>
          <?php gravity_form($form_id, false); ?>
        </div>

      </div>
      <?php endif; ?>

      <?php if (get_sub_field("form_section_layout") == "form-100"): ?>
      <div class="col-lg-12">
        <?php the_sub_field('form_section_content'); ?>


        <?php $form_id = get_sub_field('gravity_form'); ?>
        <?php gravity_form($form_id, false); ?>
      </div>
      <?php endif; ?>

    </div>
  </div>
</section>