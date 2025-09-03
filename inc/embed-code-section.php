<?php
// Set text color based on background
$background_color = get_sub_field('background_color');
$text_color = "text-dark";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-light";
} 

?>

<section id="embed-code-section-<?php echo get_row_index(); ?>"
  class="emebed-code-section <?php echo $background_color; ?> <?php echo $text_color; ?> padding-y-100">
  <span class="badge text-bg-danger">Embed Code Section</span>
  <div class="container">

    <?php if (get_sub_field('before_embed_content')): ?>
    <div class="row">
      <div class="col-lg-12">
        <?php the_sub_field('before_embed_content'); ?>
      </div>
    </div>
    <?php endif; ?>

    <?php if (get_sub_field('embed_code')): ?>
    <div class="row">
      <div class="col-lg-12">
        <?php echo get_sub_field('embed_code'); ?>
      </div>
    </div>
    <?php endif; ?>

  </div>
</section>