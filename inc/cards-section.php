<?php 
// Set text color based on background
$background_color = get_sub_field('background_color');
$text_color = "text-dark";
if ($background_color == "background-dark-blue" || $background_color == "background-teal" || $background_color == "background-teal-darker") {
  $text_color = "text-light";
} 

?>

<section id="cards-section-<?php echo get_row_index(); ?>"
  class="cards-section <?php the_sub_field('background_color'); ?> <?php echo $text_color; ?> background-pattern-cubes background-pattern-right padding-y-100">

  <?php if( have_rows('background_images') ): ?>
  <?php while( have_rows('background_images') ): the_row();  
    $background_image = get_sub_field('background_image');
  ?>
  <div class="<?php echo $background_image; ?>">
    <?php endwhile; ?>
    <?php endif; ?>
    <div class="padding-y-100">

      <span class="badge text-bg-danger">Cards Section</span>
      <div class="container">
        <div class="row">
          <?php if (get_sub_field('headline')): ?>
          <div class="col-lg-12 mb-5">
            <?php the_sub_field('headline'); ?>
          </div>
          <?php endif; ?>


          <?php if (get_sub_field('card_source_selection_type') == 'manual'): ?>
          <!-- manual card selection -->
          <?php
          $cards = get_sub_field('cards');
          if ($cards) :
            foreach ($cards as $post) :
              setup_postdata($post);
              $featured_image = get_the_post_thumbnail_url($post->ID, 'large');
              ?>


          <?php if (get_post_type($post->ID) == 'team-member' || get_post_type($post->ID) == 'consultant'): ?>
          <div class="col-lg-3 mb-5">
            <div class="card team-member-card h-100">
              <?php $headshot = get_field('headshot', $post->ID);
                $name = get_field('name', $post->ID);
                $title = get_field('title', $post->ID);
                $linkedin = get_field('linkedin_url', $post->ID);
                $bio = get_field('bio', $post->ID);
              ?>
              <?php if ($headshot && isset($headshot['url'])) : ?>
              <img class="card-img-top" src="<?php echo esc_url($headshot['url']); ?>"
                alt="<?php echo esc_attr(get_the_title($post->ID)); ?>" />
              <?php endif; ?>
              <div class="card-body text-center">
                <h3><?php echo $name ?></h3>
                <p class="text-uppercase"><small><?php echo $title;?></small></p>
                <a href="<?php echo $linkedin; ?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
              </div>
            </div>
          </div>
          <?php else: ?>

          <div class="col-lg-4 mb-5">
            <div class="card success-story-card">
              <?php if ($featured_image) : ?>
              <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>"
                class="card-img-top">
              <?php endif; ?>
              <div class="card-body d-flex flex-column justify-content-between">
                <div>
                  <p><?php echo get_the_date('', $post->ID); ?></p>
                  <h3><?php echo esc_html(get_the_title($post->ID)); ?></h3>
                </div>

                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="">Read More &raquo;</a>
              </div>
            </div>
          </div>
          <?php endif; ?>


          <?php endforeach; wp_reset_postdata(); ?>
          <?php endif; ?>



          <?php endif; ?>

          <?php if (get_sub_field('card_source_selection_type') == 'automatic'): ?>
          <!-- automatic card selection -->
          <?php
      $category_id = get_sub_field('card_source');
      $posts = get_posts(array(
        'category' => $category_id,
        'numberposts' => get_sub_field('number_of_cards'),
      ));
      ?>

          <?php if ($posts) : ?>
          <?php foreach ($posts as $post) : ?>
          <?php setup_postdata($post); 
      $featured_image = get_the_post_thumbnail_url($post->ID, 'large'); ?>

          <div class="col-lg-4 mb-5">
            <div class="card success-story-card">
              <?php if ($featured_image) : ?>
              <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>"
                class="card-img-top">
              <?php endif; ?>
              <div class="card-body d-flex flex-column justify-content-between">
                <div>
                  <p><?php echo get_the_date('', $post->ID); ?></p>
                  <h3><?php echo esc_html(get_the_title($post->ID)); ?></h3>
                </div>

                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="">Read More &raquo;</a>
              </div>
            </div>
          </div>
          <?php endforeach; wp_reset_postdata(); ?>
          <?php endif; ?>
          <?php endif; ?>

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


<!-- <section id="success-stories2"
  class="success-stories background-dark-blue background-pattern-cubes-reverse background-pattern-left padding-y-100">


  <span class="badge text-bg-danger">Success Stories2</span>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="text-white">Success Stories</h2>
      </div>
      <div class="col-lg-4">
        <div class="card success-story-card">
          <img src="https://placehold.co/300x150" alt="Image" class="card-img-top">
          <div class="card-body">
            <h3>Allure Aesthethics: Client Story</h3>

            <a href="#" class="">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card success-story-card">
          <img src="https://placehold.co/300x150" alt="Image" class="card-img-top">
          <div class="card-body">
            <h3>Financial Services Company: Client Story</h3>
            <a href="#" class="">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card success-story-card">
          <img src="https://placehold.co/300x150" alt="Image" class="card-img-top">
          <div class="card-body">
            <h3>Plymold: Client Story</h3>

            <a href="#" class="">Read More</a>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
</section> -->