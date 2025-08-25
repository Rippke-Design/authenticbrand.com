<?php 
$background_color = get_sub_field('background_color');
$text_color = "text-dark";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-light";
} 

?>
<section id="flip-cards-<?php echo get_row_index(); ?>"
  class="flip-cards <?php echo $background_color; ?> <?php echo $text_color; ?> border-bottom-yellow">

  <?php if( have_rows('background_images') ): ?>
  <?php while( have_rows('background_images') ): the_row();  
    $background_image = get_sub_field('background_image');
  ?>
  <div class="<?php echo $background_image; ?>">
    <?php endwhile; ?>
    <?php endif; ?>
    <div class="padding-y-100">
      <span class="badge text-bg-danger">Flip Cards</span>
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-12">
            <?php the_sub_field('headline'); ?>
          </div>

          <?php if (have_rows('flip_cards')): ?>
          <?php while (have_rows('flip_cards')): the_row(); ?>
          <div class="col-lg-4">
            <div class="flip-card h-100">
              <div class="flip-card-inner">
                <div class="flip-card-front text-white">
                  <div class="card-body">
                    <?php the_sub_field('card_front'); ?>
                  </div>
                </div>
                <div class="flip-card-back">
                  <div class="card-body">
                    <?php the_sub_field('card_back'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>

      <!-- close padding div -->
    </div>

    <?php if( have_rows('background_images') ): ?>
    <?php while( have_rows('background_images') ): the_row();  ?>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
</section>