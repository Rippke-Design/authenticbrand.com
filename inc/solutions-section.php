<?php 

$background_color = get_sub_field('background_color');
$text_color = "text-dark";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-light";
} 

?>

<section id="solutions-section-<?php echo get_row_index(); ?>"
  class="section-50-50 <?php echo $background_color; ?> <?php echo $text_color; ?> padding-y-100 background-pattern-red-dots background-position-right-center-offscreen"
  style="--bg-img-width: 264px; --bg-img-height: 194px;">
  <div class="background-pattern-stripe-circle background-position-left-bottom-offscreen">
    <span class="badge text-bg-danger">Solutions</span>
    <div class="container">
      <div class="row gy-4">
        <?php if (get_sub_field('headline')): ?>
        <div class="col-lg-12 mb-4">
          <h2><?php the_sub_field('headline'); ?></h2>
        </div>
        <?php endif; ?>

        <?php if( have_rows('solution_cards') ): ?>
        <?php while( have_rows('solution_cards') ): the_row(); ?>
        <div class="col-lg-6 col-md-12">
          <div class="card text-center">
            <div class="card-body">
              <?php the_sub_field('card_content'); ?>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>

        <?php if (get_sub_field('bottom_content')): ?>
        <div class="col-lg-12 mt-4">
          <?php the_sub_field('bottom_content'); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>