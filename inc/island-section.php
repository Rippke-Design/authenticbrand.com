<section id="island-section-<?php echo get_row_index(); ?>" class="island-section padding-y-100">
  <!-- <span class="badge text-bg-danger">Island Section</span> -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php if (get_sub_field('before_island_content')): ?>
        <div class="mb-5">
          <?php the_sub_field('before_island_content'); ?>
        </div>
        <?php endif; ?>

        <div class="island background-dark-blue text-white text-center">
          <div class="island-content">
            <div class="row">
              <div class="col-lg-12 text-white mb-5">
                <?php the_sub_field('island_content_top'); ?>
              </div>
            </div>

            <div class="row text-center mb-4">
              <?php if( have_rows('columns') ): ?>
              <?php while( have_rows('columns') ): the_row(); ?>
              <div class="col">
                <?php the_sub_field('column_content'); ?>
              </div>
              <?php endwhile; ?>
              <?php endif; ?>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <?php the_sub_field('island_content_bottom'); ?>
              </div>
            </div>
          </div>
        </div>

        <?php if (get_sub_field('after_island_content')): ?>
        <div class="mt-5">
          <?php the_sub_field('after_island_content'); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>