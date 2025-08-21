<?php 
// Count the logos by looping through the rows
$logo_count = 0;
if (have_rows('logos')) {
    while (have_rows('logos')) {
        the_row();
        $logo_count++;
    }
}

// Calculate animation speed: 5 seconds per logo
$seconds_per_logo = 3;
$total_duration = $logo_count * $seconds_per_logo;
?>

<section id="logo-banner-<?php echo get_row_index(); ?>"
  class="logo-banner <?php the_sub_field('background_color'); ?> padding-y-100"
  style="--slider-speed: <?php echo $total_duration; ?>s;">
  <span class="badge text-bg-danger">Logo Banner</span>
  <div class="container gy-4">
    <div class="row ">
      <div class="col-lg-12 mb-4">
        <?php the_sub_field("logo_banner_content"); ?>

      </div>
    </div>
  </div>

  <!-- Single seamless marquee wrapper -->
  <div class="marquee-wrapper">
    <div class="animate-marquee d-flex align-items-center">
      <!-- First set of logos -->
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

      <!-- Second set (duplicate) -->
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

      <!-- Second set (duplicate) -->
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

      <!-- Second set (duplicate) -->
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

  <div class="container gy-4">
    <div class="row ">
      <div class="col-lg-12 mt-4">
        <?php the_sub_field("after_logo_banner_content"); ?>
      </div>
    </div>
  </div>
</section>