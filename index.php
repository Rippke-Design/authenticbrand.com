<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php
// Check if the ACF flexible content field 'components' has rows
if( have_rows('components') ):
    while( have_rows('components') ): the_row();
        // Check if the current row layout is 'hero'
        if( get_row_layout() == 'hero' ):
            // Include the hero template
            get_template_part('inc/hero');
        endif;
    endwhile;
endif;
?>




<?php endwhile; ?>
<?php else : ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'authenticbrand-com' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>