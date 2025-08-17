<section id="con-tabs-<?php echo get_row_index(); ?>"
  class="icon-tabs background-dark-blue padding-y-100 background-pattern-circle-row-bottom">
  <!-- <span class="badge text-bg-danger">Icon Tabs</span> -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="text-light text-center mb-5"><?php the_sub_field('headline'); ?></h2>
      </div>

      <div class="col-lg-2">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <?php if( have_rows('tabs') ): ?>
          <?php while( have_rows('tabs') ): the_row(); ?>
          <?php $tab_icon = get_sub_field('tab_icon'); ?>

          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab-<?php echo get_row_index(); ?>" data-bs-toggle="tab"
              data-bs-target="#tab-pane-<?php echo get_row_index(); ?>" type="button" role="tab"
              aria-controls="tab-pane-<?php echo get_row_index(); ?>" aria-selected="true">
              <img src="<?php echo esc_url($tab_icon['url']); ?>" alt="<?php echo esc_attr($tab_icon['alt']); ?>"
                class="rounded-circle">
            </button>
          </li>
          <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div>
      <div class="col-lg-10">
        <div class="tab-content" id="myTabContent">
          <?php if( have_rows('tabs') ): ?>
          <?php while( have_rows('tabs') ): the_row(); 
           $tab_content = get_sub_field('tab_content'); 
           $tab_content_image = get_sub_field('tab_content_image'); 
          $tab_content_headline = get_sub_field('tab_content_headline');
          ?>
          <div class="tab-pane fade show active h-100" id="tab-pane-<?php echo get_row_index(); ?>" role="tabpanel"
            aria-labelledby="tab-<?php echo get_row_index(); ?>" tabindex="0">
            <div class="island background-white h-100">
              <div class="row">
                <div class="col-lg-4">
                  <img src="<?php echo esc_url($tab_content_image['url']); ?>"
                    alt="<?php echo esc_attr($tab_content_image['alt']); ?>" class="img-fluid">
                </div>
                <div class="col-lg-8">
                  <h2>
                    <span class="eyebrow"><?php echo str_pad(get_row_index() + 1, 2, '0', STR_PAD_LEFT); ?></span>
                    <?php echo $tab_content_headline; ?>
                  </h2>
                  <?php echo $tab_content; ?>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>