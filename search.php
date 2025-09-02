<?php get_header(); ?>

<main>
  <article id="article-content" class="padding-y-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">

          <?php if ( have_posts() ) : ?>

          <h1 class="mb-4">
            <?php 
              printf( 
                esc_html__( 'Search Results for: %s', 'authenticbrand-com' ), 
                '<span class="search-term">' . get_search_query() . '</span>' 
              ); 
              ?>
          </h1>

          <p class="mb-5 text-muted">
            <?php 
              global $wp_query;
              printf( 
                esc_html( _n( 
                  '%d result found', 
                  '%d results found', 
                  $wp_query->found_posts, 
                  'authenticbrand-com' 
                ) ), 
                $wp_query->found_posts 
              ); 
              ?>
          </p>

          <div class="search-results-list">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="search-result-item mb-4 pb-4 border-bottom">
              <h2 class="h4 mb-2">
                <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                  <?php the_title(); ?>
                </a>
              </h2>

              <div class="search-result-meta mb-2 text-muted small">
                <span
                  class="post-type"><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span>
                <?php if ( get_the_date() ) : ?>
                <span class="mx-2">•</span>
                <span class="post-date"><?php echo get_the_date(); ?></span>
                <?php endif; ?>
              </div>

              <div class="search-result-excerpt">
                <?php 
                    if ( has_excerpt() ) {
                      the_excerpt();
                    } else {
                      echo wp_trim_words( get_the_content(), 30, '...' );
                    }
                    ?>
              </div>

              <a href="<?php the_permalink(); ?>">
                <?php esc_html_e( 'Read More', 'authenticbrand-com' ); ?>
              </a>
            </div>
            <?php endwhile; ?>
          </div>

          <?php
            // Pagination
            the_posts_pagination( array(
              'mid_size'  => 2,
              'prev_text' => __( 'Previous', 'authenticbrand-com' ),
              'next_text' => __( 'Next', 'authenticbrand-com' ),
            ) );
            ?>

          <?php else : ?>

          <div class="no-results text-center py-5">
            <h1 class="mb-4">
              <?php 
                printf( 
                  esc_html__( 'No results found for: %s', 'authenticbrand-com' ), 
                  '<span class="search-term">' . get_search_query() . '</span>' 
                ); 
                ?>
            </h1>

            <p class="mb-4 text-muted">
              <?php esc_html_e( 'Sorry, no posts matched your search criteria. Please try again with different keywords.', 'authenticbrand-com' ); ?>
            </p>

            <div class="search-suggestions">
              <h3 class="h5 mb-3"><?php esc_html_e( 'Search Suggestions:', 'authenticbrand-com' ); ?></h3>
              <ul class="list-unstyled">
                <li><?php esc_html_e( '• Check your spelling', 'authenticbrand-com' ); ?></li>
                <li><?php esc_html_e( '• Try different keywords', 'authenticbrand-com' ); ?></li>
                <li><?php esc_html_e( '• Try more general keywords', 'authenticbrand-com' ); ?></li>
                <li><?php esc_html_e( '• Try fewer keywords', 'authenticbrand-com' ); ?></li>
              </ul>
            </div>

            <div class="mt-4">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                <?php esc_html_e( 'Back to Home', 'authenticbrand-com' ); ?>
              </a>
            </div>
          </div>

          <?php endif; ?>

        </div>
      </div>
    </div>
  </article>
</main>

<?php get_footer(); ?>