<?php get_header(); ?>

<main>
  <article id="article-content" class="padding-y-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <h1><?php single_cat_title(); ?></h1>
          <?php if ( have_posts() ) : ?>
          <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-lg-4 mb-5">
              <div class="card h-100">
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail('medium', array(
                        'class' => 'card-img-top', 
                        'loading' => 'lazy',
                        'style' => 'width: auto; height: auto;'
                    ));
                } ?>
                <div class="card-body d-flex flex-column justify-content-between">
                  <h3><?php the_title(); ?></h3>
                  <a href="<?php the_permalink(); ?>" class="">Read More &raquo;</a>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </article>
</main>

<?php get_footer(); ?>