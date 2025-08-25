<?php 

$background_color = get_sub_field('background_color');
$text_color = "text-dark";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-light";
} 

?>

<section id="stats-<?php echo get_row_index(); ?>" class="stats-section">
  <span class="badge text-bg-danger">Stats</span>



  <?php if (get_sub_field('stats_section_layout') == 'stats-bottom-5') : ?>
  <div class="stats-section-inner <?php echo $background_color; ?> <?php echo $text_color; ?> padding-y-100">
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
      <?php if (get_sub_field('stat_bottom_cta')) : ?>
      <div class="row">
        <div class="col-lg-12 mt-5">
          <?php the_sub_field('stat_bottom_cta'); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>

  <?php if (get_sub_field('stats_section_layout') == 'stats-bottom-3') : ?>
  <div class="stats-section-inner <?php echo $background_color; ?> <?php echo $text_color; ?> padding-y-100">
    <div class="container">
      <div class="row gy-4 mb-4">
        <div class="col-lg-8">
          <?php the_sub_field('left_column_content'); ?>
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
                      <number-flow class="number-flow" id="nf1" data-no-commas><?php echo $stat_number; ?>
                      </number-flow>
                    </span><span class="stat-card-unit"><?php echo $stat_unit; ?></span>
                  </h3>
                  <div class="stat-card-subtitle"><?php echo $stat_content; ?></div>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>

          </div>

        </div>
        <div class="col-lg-4">
          <?php the_sub_field('right_column_content'); ?>

        </div>
      </div>

      <?php if (get_sub_field('stat_bottom_cta')) : ?>
      <div class="row">
        <div class="col-lg-12 mt-5">
          <?php the_sub_field('stat_bottom_cta'); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>


  <?php if (get_sub_field('stats_section_layout') == 'stats-right') : ?>
  <div class="stats-section-inner stats-section-right" style=" --c-left: <?php the_sub_field('left_column_background_color'); ?>; --c-right:
    <?php the_sub_field('right_column_background_color'); ?>;">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-left">
          <div class="col-inner padding-y-100">
            <?php the_sub_field('left_column_content'); ?>
          </div>
        </div>
        <div class="col-lg-4 col-right">
          <div class="col-inner padding-y-100">
            <?php if (get_sub_field('right_column_content')) { ?>
            <div class="mb-5">
              <?php the_sub_field('right_column_content'); ?>
            </div>
            <?php } ?>

            <div class="row">
              <?php if (have_rows('stats')) : ?>
              <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 ">
                <div class="d-flex flex-column gap-3">
                  <?php while (have_rows('stats')) : the_row(); 
                  $stat_number = get_sub_field('stat_number');
                  $stat_unit = get_sub_field('stat_unit');
                  $stat_content = get_sub_field('stat_content');
                  $stat_text_color = get_sub_field('stat_text_color');
                ?>
                  <div class="card stat-card w-100">
                    <div class="card-body d-flex flex-column">
                      <h3 class="stat-card-title <?php echo $stat_text_color; ?>">
                        <span class="number-flow">
                          <number-flow class="number-flow" id="nf1" data-no-commas><?php echo $stat_number; ?>
                          </number-flow>
                        </span><span class="stat-card-unit"><?php echo $stat_unit; ?></span>
                      </h3>
                      <div class="stat-card-subtitle"><?php echo $stat_content; ?></div>
                    </div>
                  </div>
                  <?php endwhile; ?>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if (get_sub_field('stat_bottom_cta')) : ?>
  <div class="container padding-y-100">
    <div class="row">
      <div class="col-lg-12 mt-5">
        <?php the_sub_field('stat_bottom_cta'); ?>
      </div>
    </div>
    <?php endif; ?>
    <?php endif; ?>

  </div>
</section>

<!-- <script type="module" src="./assets/js/number-flow.js"></script> -->