<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<main>
  <article id="article-content" class="padding-y-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </div>
      </div>
    </div>
  </article>
</main>
<?php endwhile; ?>
<?php else : ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'authenticbrand-com' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>