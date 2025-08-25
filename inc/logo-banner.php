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

$background_color = get_sub_field('background_color');
$text_color = "text-dark";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-light";
} 

?>

<section id="logo-banner-<?php echo get_row_index(); ?>"
  class="logo-banner <?php echo $background_color; ?> <?php echo $text_color; ?>"
  style="--slider-speed: <?php echo $total_duration; ?>s;">
  <span class="badge text-bg-danger">Logo Banner</span>

  <?php if( have_rows('background_images') ): ?>
  <?php while( have_rows('background_images') ): the_row();  
    $background_image = get_sub_field('background_image');
  ?>
  <div class="<?php echo $background_image; ?>">
    <?php endwhile; ?>
    <?php endif; ?>
    <div class="padding-y-100">

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

      <?php if (get_sub_field("after_logo_banner_content")): ?>
      <div class="container gy-4">
        <div class="row">
          <div class="col-lg-12 mt-4">
            <?php the_sub_field("after_logo_banner_content"); ?>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <!-- close padding div -->
    </div>

    <?php if( have_rows('background_images') ): ?>
    <?php while( have_rows('background_images') ): the_row();  ?>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
</section>