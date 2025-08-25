<?php 

// Set text color based on background
$background_color = get_sub_field('background_color');
$text_color = "text-dark";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-light";
} 

?>

<section id="cta-banner-<?php echo get_row_index(); ?>"
  class="text-banner <?php echo $background_color; ?> <?php echo $text_color; ?> ">

  <?php if( have_rows('background_images') ): ?>
  <?php while( have_rows('background_images') ): the_row();  
    $background_image = get_sub_field('background_image');
  ?>
  <div class="<?php echo $background_image; ?>">
    <?php endwhile; ?>
    <?php endif; ?>
    <div class="padding-y-100">

      <span class="badge text-bg-danger">CTA Banner</span>
      <div class="container">
        <div class="row ">

          <div class="col-lg-12">
            <div class="text-banner-text-content">
              <?php the_sub_field('cta_banner_content'); ?>
            </div>
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