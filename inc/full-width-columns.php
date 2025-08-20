<!-- inline css vars are used in _full-bleed.scss - these need to be set in ACF fields -->
<!-- Need to find a way to allow for adding of additional styling images in each column -->
<?php 

$column_alignment = get_sub_field('column_alignment');

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

<section id="full-width-columns-<?php echo get_row_index(); ?>"
  class="full-bleed <?php the_sub_field('column_layout'); ?>" style=" --c-left: <?php the_sub_field('left_column_background_color'); ?>; --c-right:
  <?php the_sub_field('right_column_background_color'); ?>;">
  <!-- <span class="badge text-bg-danger">Full Bleed 50 - 50</span> -->
  <div class="container">
    <div class="row <?php echo $column_alignment; ?>">

      <?php if (get_sub_field("column_layout") == "full-bleed-50-50"): ?>
      <div class="col-lg-6 col-md-12 col-left <?php echo $left_column_text_color; ?>"
        style=" --col-left-bg: url('http://localhost:3000/assets/img/circles-bg-pattern.svg');">
        <div class="col-inner padding-y-100 padding-end-50">
          <?php the_sub_field('left_column_content'); ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-right <?php echo $right_column_text_color; ?>"
        style="--col-right-bg: url('http://localhost:3000/assets/img/circles-bg-pattern.svg');">
        <div class="col-inner padding-y-100 padding-start-50">
          <?php the_sub_field('right_column_content'); ?>
        </div>
      </div>
      <?php endif; ?>

      <?php if (get_sub_field("column_layout") == "full-bleed-25-75"): ?>
      <div class="col-lg-3 col-md-12 col-left <?php echo $left_column_text_color; ?>"
        style="background-color: <?php the_sub_field('left_column_background_color'); ?>;">
        <!-- Note padding has to be added inside columns for full bleeds -->
        <div class="col-inner padding-y-100 padding-end-50">
          <?php the_sub_field('left_column_content'); ?>
        </div>
      </div>

      <div class="col-lg-9 col-md-12 col-right <?php echo $right_column_text_color; ?>"
        style="background-color: <?php the_sub_field('right_column_background_color'); ?>;">
        <div class="col-inner padding-y-100 padding-start-50">
          <?php the_sub_field('right_column_content'); ?>
        </div>

      </div>
      <?php endif; ?>

      <?php if (get_sub_field("column_layout") == "full-bleed-75-25"): ?>
      <div class="col-lg-9 col-md-12 col-left <?php echo $left_column_text_color; ?>"
        style="background-color: <?php the_sub_field('left_column_background_color'); ?>;">
        <div class="col-inner padding-y-100 padding-end-50">
          <?php the_sub_field('left_column_content'); ?>
        </div>
      </div>

      <div class="col-lg-3 col-md-12 col-right <?php echo $right_column_text_color; ?>"
        style="background-color: <?php the_sub_field('right_column_background_color'); ?>;">
        <!-- Note padding has to be added inside columns for full bleeds -->
        <div class="col-inner padding-y-100 padding-start-50">
          <?php the_sub_field('right_column_content'); ?>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>
</section>