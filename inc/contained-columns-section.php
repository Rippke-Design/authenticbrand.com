<section id="contained-columns-section-<?php echo get_row_index(); ?>"
  class="contained-columns-section <?php the_sub_field('background_color'); ?> text-light padding-y-100 background-pattern-cubes background-pattern-right"
  style="--bg-img-width: 457px; --bg-img-height: 1115px;">
  <!-- <span class="badge text-bg-danger">50 - 50</span> -->
  <div class="container">
    <div class="row justify-content-center align-items-center">


      <?php if( have_rows('columns') ): ?>
      <?php while( have_rows('columns') ): the_row(); ?>
      <div class="col">
        <?php the_sub_field('column_content'); ?>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>



    </div>
  </div>
</section>