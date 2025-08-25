<?php 

$background_color = get_sub_field('background_color');
$border_bottom = get_sub_field('border_bottom');

$text_color = "text-dark";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-light";
} 

?>

<section id="card-rows-<?php echo get_row_index(); ?>"
  class="card-rows <?php echo $background_color; ?> <?php echo $text_color; ?> <?php echo $border_bottom; ?>">

  <?php if( have_rows('background_images') ): ?>
  <?php while( have_rows('background_images') ): the_row();  
    $background_image = get_sub_field('background_image');
  ?>
  <div class="<?php echo $background_image; ?>">
    <?php endwhile; ?>
    <?php endif; ?>
    <div class="padding-y-100">

      <span class="badge text-bg-danger">Contained Rows and Columns with Islands</span>
      <div class="container">

        <?php if (get_sub_field('before_columns_content')): ?>
        <div class="row">
          <div class="col-lg-12 mb-5">
            <?php the_sub_field('before_columns_content'); ?>
          </div>
        </div>
        <?php endif; ?>


        <?php if (have_rows('rows')): ?>
        <?php while (have_rows('rows')): the_row(); ?>
        <!-- repeater called rows -->
        <div class="row g-5">
          <?php if (have_rows('columns')): ?>
          <?php while (have_rows('columns')): the_row(); ?>
          <?php if (get_sub_field('island_column')): ?>
          <!-- repeater called columns -->
          <div class="<?php the_sub_field('column_width'); ?>">
            <?php 
            $island_background_color = get_sub_field('island_background_color');
            $island_text_color = "text-dark";
            if ($island_background_color == "background-dark-blue" || $island_background_color == "background-teal" || $island_background_color == "background-teal-darker") {
              $island_text_color = "text-light";
            }
          ?>
            <div
              class="card h-100 card-padding-large <?php echo $island_background_color; ?> <?php echo $island_text_color; ?>">
              <div class="card-body">
                <?php if (have_rows('inner_rows')): ?>
                <?php while (have_rows('inner_rows')): the_row(); ?>
                <!-- inner rows -->
                <div class="row g-5">
                  <?php if (have_rows('inner_columns')): ?>
                  <?php while (have_rows('inner_columns')): the_row(); ?>
                  <!-- inner columns -->
                  <div class="<?php the_sub_field('inner_column_width'); ?>">
                    <?php the_sub_field('inner_column_content'); ?>
                  </div>
                  <?php endwhile; ?>
                  <?php endif; ?>
                </div>
                <?php endwhile; ?>
                <?php else: ?>
                <?php the_sub_field('column_content'); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php else: ?>
          <div class="<?php the_sub_field('column_width'); ?>">
            <?php the_sub_field('column_content'); ?>
          </div>
          <?php endif; ?>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>

        <?php if (get_sub_field('after_columns_content')): ?>
        <div class="row">
          <div class="col-lg-12">
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