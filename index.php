<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php
if( have_rows('components') ):
    while( have_rows('components') ): the_row();
        if( get_row_layout() == 'hero' ):
            get_template_part('inc/hero');
        elseif( get_row_layout() == 'cta-banner' ):
            get_template_part('inc/cta-banner');
        elseif( get_row_layout() == 'logo-banner' ):
            get_template_part('inc/logo-banner');
        elseif( get_row_layout() == 'awards-section' ):
            get_template_part('inc/awards-section');
        elseif( get_row_layout() == 'icon-tabs-section' ):
            get_template_part('inc/icon-tabs');
        elseif( get_row_layout() == 'full-width-columns' ):
            get_template_part('inc/full-width-columns');
        endif;
    endwhile;
endif;
?>




<?php endwhile; ?>
<?php else : ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'authenticbrand-com' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>