<?php 
// set the color for the :before element that hides the slides on slider-50-50 layout
$background_color_hide_slides = "";
if (get_sub_field('background_color') == 'background-dark-blue'):
    $background_color_hide_slides = "var(--c-dark-blue)";
elseif (get_sub_field('background_color') == 'background-teal'):
    $background_color_hide_slides = "var(--c-teal)";
elseif (get_sub_field('background_color') == 'background-teal-darker'):
    $background_color_hide_slides = "var(--c-teal-darker)";
elseif (get_sub_field('background_color') == 'background-yellow'):
    $background_color_hide_slides = "var(--c-yellow)";
elseif (get_sub_field('background_color') == 'background-white'):
    $background_color_hide_slides = "var(--c-white)";
endif;
?>

<?php if (get_sub_field('column_layout') == 'slider-100'): ?>
<section id="offscreen-slider-<?php echo get_row_index(); ?>"
  class="offscreen-slider <?php the_sub_field('background_color'); ?> background-pattern-cubes background-pattern-right padding-y-100 text-light">
  <span class="badge text-bg-danger">Offscreen Slider</span>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>
          <div class="d-flex align-items-center justify-content-between flex-lg-row flex-column">
            <span class="text-center text-lg-start"><?php the_sub_field('headline'); ?></span>

            <?php 
            $cta_button = get_sub_field('cta_button');
            if ($cta_button && isset($cta_button['url']) && isset($cta_button['title'])): ?>
            <a href="<?php echo esc_url($cta_button['url']); ?>"
              class="btn <?php echo esc_attr(get_sub_field('cta_button_style')); ?> mt-5 mt-lg-0"><?php echo esc_html($cta_button['title']); ?></a>
            <?php endif; ?>
          </div>
        </h2>
      </div>

      <div class="col-lg-12">
        <div class="row">
          <div class="splide" id="card-carousel-<?php echo get_row_index(); ?>" aria-label="Splide Basic HTML Example">
            <div class="splide__arrows">
              <button class="splide__arrow splide__arrow--prev" type="button"
                aria-label="Previous slide">&laquo;</button>
              <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide">&raquo;</button>
            </div>
            <div class="splide__track">
              <ul class="splide__list">

                <?php 
                  $slides = get_sub_field('slides');
                  if ($slides): 
                    foreach ($slides as $slide_post):
                      // Get the post ID from the relationship field
                      $slide_id = $slide_post->ID;
                      $slide_title = get_the_title($slide_id);
                      $slide_permalink = get_permalink($slide_id);
                      $slide_image = get_the_post_thumbnail_url($slide_id, 'large');
                ?>
                <li class="splide__slide">
                  <div class="card">
                    <?php if ($slide_image): ?>
                    <div class="card-image">
                      <img src="<?php echo esc_url($slide_image); ?>" alt="<?php echo esc_attr($slide_title); ?>"
                        class="card-img-top">
                    </div>
                    <?php endif; ?>
                    <div class="card-body">
                      <h3 class="card-title"><?php echo esc_html($slide_title); ?></h3>
                      <a href="<?php echo esc_url($slide_permalink); ?>">Read More &raquo;</a>
                    </div>
                  </div>
                </li>
                <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- TODO: enqueue the splide js and css -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

<style>
#card-carousel-<?php echo get_row_index() . ' ';

?>.splide__track {
  overflow: visible;
}

#card-carousel-<?php echo get_row_index() . ' ';

?> {
  margin-top: 80px;
}

#card-carousel-<?php echo get_row_index() . ' ';

?>.splide__arrows {
  display: flex;
  justify-content: space-between;
  /* gap: 1rem; */
  margin-bottom: 1rem;
  font-size: 20px;
}

#card-carousel-<?php echo get_row_index() . ' ';

?>.splide__arrow {
  position: static;
  transform: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  new Splide('#card-carousel-<?php echo get_row_index(); ?>', {
    perPage: 3,
    perMove: 1,
    trimSpace: false,
    gap: '2rem',
    pagination: false,
    breakpoints: {
      992: {
        perPage: 1,
        perMove: 1,
        trimSpace: false,
        pagination: false
      },
    },
  }).mount();
});
</script>
<?php endif; ?>


<?php if (get_sub_field('column_layout') == 'slider-50-50'): ?>
<section id="offscreen-right-slider-<?php echo get_row_index(); ?>"
  class="offscreen-right-slider offscreen-slider <?php the_sub_field('background_color'); ?> background-pattern-cubes background-pattern-right text-light padding-y-100"
  style="--c-background: <?php echo $background_color_hide_slides; ?>;">

  <span class="badge text-bg-danger">Offscreen Right Slider</span>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 <?php the_sub_field('background_color'); ?> z-1">
        <?php the_sub_field('headline'); ?>
      </div>
      <div class="col-lg-6">
        <div class="splide" id="offscreen-right-card-slider-<?php echo get_row_index(); ?>"
          aria-label="Splide Basic HTML Example">
          <div class="splide__arrows">
            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Previous slide">&laquo;</button>
            <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide">&raquo;</button>
          </div>
          <div class="splide__track">
            <ul class="splide__list">
              <?php 
                $slides = get_sub_field('slides');
                if ($slides): 
                  foreach ($slides as $slide_post):
                    // Get the post ID from the relationship field
                    $slide_id = $slide_post->ID;
                    $slide_title = get_the_title($slide_id);
                    $slide_permalink = get_permalink($slide_id);
                    $slide_image = get_the_post_thumbnail_url($slide_id, 'large');
                ?>
              <li class="splide__slide">
                <div class="card">
                  <?php if ($slide_image): ?>
                  <div class="card-image">
                    <img src="<?php echo esc_url($slide_image); ?>" alt="<?php echo esc_attr($slide_title); ?>"
                      class="card-img-top">
                  </div>
                  <?php endif; ?>
                  <div class="card-body">
                    <h3 class="card-title"><?php echo esc_html($slide_title); ?></h3>
                    <a href="<?php echo esc_url($slide_permalink); ?>">Read More &raquo;</a>
                  </div>
                </div>
              </li>
              <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- TODO: enqueue the splide js and css -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

<style>
#offscreen-right-slider-<?php echo get_row_index() . ' ';

?>.splide__track {
  overflow: visible;
}

#offscreen-right-slider-<?php echo get_row_index() . ' ';

?>.splide {
  overflow: visible;
}

#offscreen-right-slider-<?php echo get_row_index() . ' ';

?>.splide__list {
  overflow: visible;
}

#offscreen-right-slider-<?php echo get_row_index() . ' ';

?>.splide__arrows {
  display: flex;
  justify-content: space-between;
  /* gap: 1rem; */
  margin-bottom: 1rem;
  font-size: 20px;
}

#offscreen-right-slider-<?php echo get_row_index() . ' ';

?>.splide__arrow {
  position: static;
  transform: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  new Splide('#offscreen-right-card-slider-<?php echo get_row_index(); ?>', {
    perPage: 2,
    perMove: 1,
    trimSpace: false,
    gap: '2rem',
    pagination: false,
    breakpoints: {
      992: {
        perPage: 1,
        perMove: 1,
        trimSpace: false,
        pagination: false
      },
    },
  }).mount();
});
</script>
<?php endif; ?>