<section id="hero-inner-<?php echo get_row_index(); ?>"
  class="hero <?php the_sub_field('background_color'); ?> background-pattern-circle-row-top <?php if ( get_sub_field('homepage_hero') ) { echo 'hero-homepage'; } else { echo 'hero-inner'; } ?>">
  <span class="badge text-bg-danger">Hero</span>
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <?php if ( ! get_sub_field('homepage_hero') ) { breadcrumbs(); } ?>


        <h1>
          <span class="eyebrow">
            <?php the_sub_field('hero_headline_eyebrow'); ?>
          </span>
          <?php the_sub_field('hero_headline'); ?>
        </h1>
        <p class="tagline">
          <?php the_sub_field('hero_sub_headline'); ?>
        </p>

        <?php if( have_rows('cta_buttons') ): ?>
        <?php while( have_rows('cta_buttons') ): the_row(); 
            $button = get_sub_field('cta_button');
            $button_color = get_sub_field('button_color');
            if( $button ):
              $button_url = $button['url'];
              $button_title = $button['title'];
              $button_target = $button['target'] ? $button['target'] : '_self';
          ?>
        <a href="<?php echo esc_url($button_url); ?>" class="btn <?php echo ($button_color); ?>"
          target="<?php echo esc_attr($button_target); ?>">
          <?php echo esc_html($button_title); ?>
        </a>
        <?php 
            endif;
          endwhile; ?>
        <?php endif; ?>
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