<section id="hero-inner-<?php echo get_row_index(); ?>"
  class="hero <?php the_sub_field('background_color'); ?> background-pattern-circle-row-top <?php if ( get_sub_field('homepage_hero') ) { echo 'hero-homepage'; } else { echo 'hero-inner'; } ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h1><?php the_sub_field('hero_headline'); ?></h1>
        <p class="tagline">
          <?php the_sub_field('hero_sub_headline'); ?>
        </p>
      </div>
      <div class="col-lg-5">
        <?php
        $hero_image = get_sub_field('hero_image');
        if ( $hero_image && isset($hero_image['url']) ) :
      ?>
        <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>"
          class="img-fluid">
        <?php endif; ?>
      </div>
    </div>
</section>