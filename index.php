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
        elseif( get_row_layout() == 'offscreen-slider' ):
            get_template_part('inc/offscreen-slider');
        elseif( get_row_layout() == 'faq-section' ):
            get_template_part('inc/faq-section');
        elseif( get_row_layout() == 'stats-section' ):
            get_template_part('inc/stats-section');
        elseif( get_row_layout() == 'island-section' ):
            get_template_part('inc/island-section');
        elseif( get_row_layout() == 'form-section' ):
            get_template_part('inc/form-section');
        elseif( get_row_layout() == 'flip-cards-section' ):
            get_template_part('inc/flip-cards-section');
        elseif( get_row_layout() == 'solution-section' ):
            get_template_part('inc/solutions-section');
        elseif( get_row_layout() == 'contained-columns' ):
            get_template_part('inc/contained-columns-section');
        elseif( get_row_layout() == 'graphic-divider-section' ):
            get_template_part('inc/graphic-divider-section');
        elseif( get_row_layout() == 'cards-section' ):
            get_template_part('inc/cards-section');
        endif;
    endwhile;
endif;
?>




<?php endwhile; ?>
<?php else : ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'authenticbrand-com' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>