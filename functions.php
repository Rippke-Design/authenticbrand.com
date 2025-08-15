<?php
/**
 * Authentic Brand functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package authenticbrand-com
 */


function authenticbrand_enqueue_assets() {
// Enqueue CSS files from /docs/assets/css
wp_enqueue_style('authenticbrand-global-css', get_template_directory_uri() . '/docs/assets/css/global.css', array(),
null);

// Enqueue JS files from /docs/assets/js
wp_enqueue_script('authenticbrand-faq-js', get_template_directory_uri() . '/docs/assets/js/faq.js', array(), null,
true);
wp_enqueue_script('authenticbrand-nav-position-js', get_template_directory_uri() . '/docs/assets/js/nav-position.js',
array(), null, true);
wp_enqueue_script('authenticbrand-number-flow-js', get_template_directory_uri() . '/docs/assets/js/number-flow.js',
array(), null, true);
wp_enqueue_script('authenticbrand-section-names-js', get_template_directory_uri() . '/docs/assets/js/section-names.js',
array(), null, true);
wp_enqueue_script('

authenticbrand-timeline-js', get_template_directory_uri() . '/docs/assets/js/timeline.js', array(),
null, true);
}
add_action('wp_enqueue_scripts', 'authenticbrand_enqueue_assets');