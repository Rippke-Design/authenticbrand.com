<section id="logo-banner" class="logo-banner <?php the_sub_field('background_color'); ?> padding-y-100">
  <!-- <span class="badge text-bg-danger">Logo Banner</span> -->
  <div class="container gy-4">
    <div class="row ">
      <div class="col-lg-12 mb-4">
        <?php the_sub_field("logo_banner_content"); ?>
      </div>
    </div>
  </div>

  <!-- Single seamless marquee wrapper -->
  <div class="marquee-wrapper gap-4">
    <!-- First marquee -->
    <div class="animate-marquee d-flex gap-4 align-items-center" style="animation-play-state: running;">
      <!-- original logos -->
      <?php if( have_rows('logos') ): ?>
      <?php while( have_rows('logos') ): the_row(); 
            $logo = get_sub_field('logo');
            if ( $logo && isset($logo['url']) ):
          ?>
      <div>
        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
      </div>
      <?php endif; endwhile; ?>
      <?php endif; ?>

      <!-- duplicated logos for seamless scroll -->
      <?php if( have_rows('logos') ): ?>
      <?php while( have_rows('logos') ): the_row(); 
            $logo = get_sub_field('logo');
            if ( $logo && isset($logo['url']) ):
          ?>
      <div>
        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
      </div>
      <?php endif; endwhile; ?>
      <?php endif; ?>
    </div>

    <!-- Second marquee -->
    <div class="animate-marquee2 d-flex gap-4 align-items-center" style="animation-play-state: running;">
      <!-- original logos -->
      <?php if( have_rows('logos') ): ?>
      <?php while( have_rows('logos') ): the_row(); 
            $logo = get_sub_field('logo');
            if ( $logo && isset($logo['url']) ):
          ?>
      <div>
        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
      </div>
      <?php endif; endwhile; ?>
      <?php endif; ?>

      <!-- duplicated logos for seamless scroll -->
      <?php if( have_rows('logos') ): ?>
      <?php while( have_rows('logos') ): the_row(); 
            $logo = get_sub_field('logo');
            if ( $logo && isset($logo['url']) ):
          ?>
      <div>
        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
      </div>
      <?php endif; endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>