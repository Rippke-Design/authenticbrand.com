<?php

// Set text color based on background
$background_color = get_sub_field('background_color');
$text_color = "text-dark";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-light";
} 

?>

<section id="video-section-<?php echo get_row_index(); ?>"
  class="video-section <?php the_sub_field('background_color'); ?> <?php echo $text_color; ?> padding-y-100">
  <span class="badge text-bg-danger">Video Section</span>
  <div class="container">
    <?php if (get_sub_field('before_video_content')): ?>
    <div class="row">
      <div class="col-lg-12 mb-5">
        <?php the_sub_field('before_video_content'); ?>
      </div>
    </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-lg-12">
        <div class="video-container">
          <?php the_sub_field('video'); ?>
        </div>
      </div>
    </div>
  </div>
</section>