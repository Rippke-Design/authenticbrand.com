<section id="awards-<?php echo get_row_index(); ?>" class="awards background-blue-lighter padding-y-100"
  style="--bg-img-width: 460px; --bg-img-height: 460px;">

  <span class="badge text-bg-danger">Awards</span>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="text-center"><?php the_sub_field('headline'); ?></h2>

        <div class="timeline" id="timeline">
          <div class="timeline-line" id="timelineLine"></div>
          <div class="timeline-fill" id="timelineFill"></div>

          <?php if( have_rows('awards') ): ?>
          <?php while( have_rows('awards') ): the_row(); 

          $award_image = get_sub_field('award_image');
          $award_date = get_sub_field('award_date');
          $award_text = get_sub_field('award_text');

          ?>
          <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
              <?php if ( !empty($award_image) && !empty($award_image['url']) ): ?>
              <img src="<?php echo esc_url($award_image['url']); ?>" alt="<?php echo esc_attr($award_image['alt']); ?>">
              <?php endif; ?>
              <h3>
                <span class="eyebrow"><?php echo $award_date; ?></span>
                <?php echo $award_text; ?>
              </h3>
            </div>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>


        </div>

      </div>


    </div>
  </div>
</section>

<script src="<?php echo esc_url( get_template_directory_uri() . '/docs/assets/js/timeline.js' ); ?>"></script>