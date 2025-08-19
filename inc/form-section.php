<section id="form-section-<?php echo get_row_index(); ?>" class="form-section padding-y-100">
  <!-- <span class="badge text-bg-danger">Form Banner</span> -->
  <div class="container">
    <div class="row ">
      <div class="col-lg-12">
        <?php the_sub_field('form_section_content'); ?>


        <?php $form_id = get_sub_field('gravity_form'); ?>
        <?php gravity_form($form_id, false); ?>
      </div>
    </div>
  </div>
</section>