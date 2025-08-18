<!-- inline css vars are used in _full-bleed.scss - these need to be set in ACF fields -->
<!-- Need to find a way to allow for adding of additional styling images in each column -->


<section id="full-width-columns-<?php echo get_row_index(); ?>"
  class="full-bleed <?php the_sub_field('column_layout'); ?>" style=" --c-left: <?php the_sub_field('left_column_background_color'); ?>; --c-right:
  <?php the_sub_field('right_column_background_color'); ?>;">
  <!-- <span class="badge text-bg-danger">Full Bleed 50 - 50</span> -->
  <div class="container">
    <div class="row">

      <?php if (get_sub_field("column_layout") == "full-bleed-50-50"): ?>
      <div class="col-lg-6 col-md-12 col-left"
        style="--col-left-bg: url('http://localhost:3000/assets/img/circles-bg-pattern.svg');">
        <div class="col-inner padding-80">
          <?php the_sub_field('left_column_content'); ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-right"
        style="--col-right-bg: url('http://localhost:3000/assets/img/circles-bg-pattern.svg');">
        <div class="col-inner padding-80">
          <?php the_sub_field('right_column_content'); ?>
        </div>
      </div>
      <?php endif; ?>

      <?php if (get_sub_field("column_layout") == "full-bleed-25-75"): ?>
      <div class="col-lg-3 col-md-12 col-left  text-light"
        style="background-color: <?php the_sub_field('left_column_background_color'); ?>;">
        <!-- Note padding has to be added inside columns for full bleeds -->
        <div class="col-inner padding-y-100 padding-end-50">
          <?php the_sub_field('left_column_content'); ?>
        </div>
      </div>

      <div class="col-lg-9 col-md-12 col-right"
        style="background-color: <?php the_sub_field('right_column_background_color'); ?>;">
        <div class="col-inner padding-y-100 padding-start-50">
          <?php the_sub_field('right_column_content'); ?>
        </div>

      </div>
      <?php endif; ?>

      <?php if (get_sub_field("column_layout") == "full-bleed-75-25"): ?>
      <div class="col-lg-9 col-md-12 col-left"
        style="background-color: <?php the_sub_field('left_column_background_color'); ?>;">
        <div class="col-inner padding-y-100 padding-end-50 ">
          <?php the_sub_field('left_column_content'); ?>
        </div>
      </div>

      <div class="col-lg-3 col-md-12 col-right "
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