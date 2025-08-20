<?php

$column_alignment = get_sub_field('column_alignment');
$island_background_color = get_sub_field('island_background_color');
$island_text_color = "text-dark";
// if color is background-dark-blue, background-teal,  background-teal-darker  
if ($island_background_color == "background-dark-blue" || $island_background_color == "background-teal" || $island_background_color == "background-teal-darker") {
  $island_text_color = "text-light";
} 


$background_color = get_sub_field('background_color');
$text_color = "";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-white";
} else {
  $text_color = "text-dark";
}
?>

<section id="island-section-<?php echo get_row_index(); ?>"
  class="<?php the_sub_field('background_color'); ?> <?php echo $text_color; ?> island-section padding-y-100">
  <span class="badge text-bg-danger">Island Section</span>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php if (get_sub_field('before_island_content')): ?>
        <div class="mb-5">
          <?php the_sub_field('before_island_content'); ?>
        </div>
        <?php endif; ?>

        <div class="island <?php the_sub_field('island_background_color'); ?>  <?php echo $island_text_color; ?>">
          <div class="island-content">
            <?php if (get_sub_field('island_content_top')): ?>
            <div class="row">
              <div class="col-lg-12 mb-5">
                <?php the_sub_field('island_content_top'); ?>
              </div>
            </div>
            <?php endif; ?>


            <?php if( have_rows('columns') ): ?>
            <div class="row island-columns <?php echo $column_alignment; ?>">
              <?php while( have_rows('columns') ): the_row(); ?>
              <div class="col">
                <?php the_sub_field('column_content'); ?>
              </div>
              <?php endwhile; ?>
            </div>
            <?php endif; ?>

            <?php if (get_sub_field('island_content_bottom')): ?>
            <div class="row">
              <div class="col-lg-12">
                <?php the_sub_field('island_content_bottom'); ?>
              </div>
            </div>
            <?php endif; ?>
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