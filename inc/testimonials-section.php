<?php


$background_color = get_sub_field('background_color');
$text_color = "";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-white";
} 
?>

<section id="testimonials-section-<?php echo get_row_index(); ?>"
  class="<?php echo $background_color; ?> <?php echo $text_color; ?> testimonials-section padding-y-100">
  <span class="badge text-bg-danger">Testimonials</span>
  <div class="container">
    <?php if (get_sub_field('before_testimonials_content')): ?>
    <div class="row">
      <div class="col-lg-12">

        <div class="mb-5">
          <?php the_sub_field('before_testimonials_content'); ?>
        </div>

      </div>
    </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="island background-white text-dark">
          <div class="island-content">

            <div class="splide" id="testimonials-slider-<?php echo get_row_index(); ?>"
              aria-label="Testimonials Slider">

              <div class="splide__track">
                <ul class="splide__list">

                  <?php $testimonials = get_sub_field('testimonials');
                    
                    if ($testimonials):
                  ?>

                  <?php foreach ($testimonials as $testimonial): ?>
                  <li class="splide__slide text-center">

                    <?php if (get_field('testimonial_content', $testimonial->ID)): ?>
                    <p class="testimonial-text"><?php echo get_field('testimonial_content', $testimonial->ID); ?>
                    </p>
                    <?php endif; ?>

                    <?php if (get_field('testimonial_headshot', $testimonial->ID)): 
                        $headshot = get_field('testimonial_headshot', $testimonial->ID);
                      ?>
                    <img src="<?php echo esc_url($headshot['sizes']['testimonial-headshot']); ?>"
                      alt="<?php echo esc_attr($headshot['alt']); ?>" class="testimonial-headshot rounded-circle mb-3"
                      style="width: 100px; height: 100px; object-fit: cover;">
                    <?php endif; ?>

                    <?php if (get_field('testimonial_name', $testimonial->ID)): ?>
                    <p class="testimonial-info">
                      <strong><?php echo get_field('testimonial_name', $testimonial->ID); ?></strong>

                      <?php if (get_field('testimonial_title', $testimonial->ID)): ?>
                      <br /><?php echo get_field('testimonial_title', $testimonial->ID); ?>

                      <?php endif; ?>
                    </p>
                    <?php endif; ?>

                  </li>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </ul>
              </div>

              <div class="splide__pagination"></div>

            </div>
          </div>

          <?php if (get_sub_field('after_testimonials_content')): ?>
          <div class="mt-5">
            <?php the_sub_field('after_testimonials_content'); ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TODO: enqueue the splide js and css -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">


<script>
document.addEventListener('DOMContentLoaded', function() {
  new Splide('#testimonials-slider-<?php echo get_row_index(); ?>', {
    perPage: 1,
    perMove: 1,
    trimSpace: false,
    gap: '2rem',
    pagination: true,
    arrows: false,
  }).mount();
});
</script>