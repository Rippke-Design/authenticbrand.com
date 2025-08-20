<section id="stats-<?php echo get_row_index(); ?>" class="stats-section padding-y-100">
  <span class="badge text-bg-danger">Stats</span>
  <div class="container">
    <div class="row gy-4 mb-4">
      <div class="col-lg-7">
        <?php the_sub_field('left_column_content'); ?>

      </div>
      <div class="col-lg-5">
        <?php the_sub_field('right_column_content'); ?>

      </div>
    </div>
    <div class="row flex-column flex-lg-row justify-content-center align-items-stretch gap-3">
      <?php if (have_rows('stats')) : ?>
      <?php while (have_rows('stats')) : the_row(); 
          $stat_number = get_sub_field('stat_number');
          $stat_unit = get_sub_field('stat_unit');
          $stat_content = get_sub_field('stat_content');
          $stat_text_color = get_sub_field('stat_text_color');
        ?>
      <div class="col d-flex">
        <div class="card stat-card w-100">
          <div class="card-body d-flex flex-column">
            <h3 class="stat-card-title <?php echo $stat_text_color; ?>">
              <span class="number-flow">
                <number-flow class="number-flow" id="nf1" data-no-commas><?php echo $stat_number; ?></number-flow>
              </span><span class="stat-card-unit"><?php echo $stat_unit; ?></span>
            </h3>
            <div class="stat-card-subtitle"><?php echo $stat_content; ?></div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>

    </div>
    <div class="row">
      <div class="col-lg-8 offset-lg-2  mt-5">
        <?php the_sub_field('stat_bottom_cta'); ?>
      </div>
    </div>
  </div>
</section>

<script type="module" src="./assets/js/number-flow.js"></script>