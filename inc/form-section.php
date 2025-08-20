<?php 

// Text color is set to light by default - if the background color is white or yellow then the text color is set to dark
$left_column_text_color = "text-light";
$right_column_text_color = "text-light";

if (get_sub_field('left_column_background_color') == "var(--c-white)" || get_sub_field('left_column_background_color') == "var(--c-yellow)") {
  $left_column_text_color = "text-dark";
}

if (get_sub_field('right_column_background_color') == "var(--c-white)" || get_sub_field('right_column_background_color') == "var(--c-yellow)") {
  $right_column_text_color = "text-dark";
}


?>

<?php if (get_sub_field("form_section_layout") == "form-25-75"): ?>
<section id="form-section-<?php echo get_row_index(); ?>" class="form-section full-bleed-25-75" style=" --c-left: <?php the_sub_field('left_column_background_color'); ?>; --c-right:
  <?php the_sub_field('right_column_background_color'); ?>;">
  <div class="container">
    <div class="row ">

      <div class="col-lg-3 col-md-12 col-left  <?php echo $left_column_text_color; ?>"
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
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_sub_field("form_section_layout") == "form-100"): ?>
<section id="form-section-<?php echo get_row_index(); ?>"
  class="form-section <?php the_sub_field('background_color'); ?> padding-y-100">
  <div class="container">
    <div class="row ">
      <div class="col-lg-12">
        <?php the_sub_field('form_section_content'); ?>
        <?php $form_id = get_sub_field('gravity_form'); ?>
        <?php gravity_form($form_id, false); ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>