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
    wp_enqueue_style('authenticbrand-global-css', get_template_directory_uri() . '/docs/assets/css/global.css', array(), null);

    // Enqueue JS files from /docs/assets/js
    //wp_enqueue_script('authenticbrand-faq-js', get_template_directory_uri() . '/docs/assets/js/faq.js', array(), null, true);
    wp_enqueue_script('authenticbrand-nav-position-js', get_template_directory_uri() . '/docs/assets/js/nav-position.js', array(), null, true);
    wp_enqueue_script('authenticbrand-number-flow-js', get_template_directory_uri() . '/docs/assets/js/number-flow.js', array('number-flow-lib'), null, true);
    wp_enqueue_script('authenticbrand-section-names-js', get_template_directory_uri() . '/docs/assets/js/section-names.js', array(), null, true);
    wp_enqueue_script('authenticbrand-timeline-js', get_template_directory_uri() . '/docs/assets/js/timeline.js', array(), null, true);

    // Enqueue external libraries
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), null, true);
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/fc47785991.js', array(), null, false);
    // Enqueue number-flow library from CDN
    wp_enqueue_script('number-flow-lib', 'https://esm.sh/number-flow', array(), null, true);
}
add_action('wp_enqueue_scripts', 'authenticbrand_enqueue_assets');




// TinyMCE Customization
add_filter('tiny_mce_before_init', function ($mce_init) {
    $custom_css = get_stylesheet_directory_uri() . '/docs/assets/css/global.css'; // Your custom CSS file path
    
    if (isset($mce_init['content_css'])) {
        $mce_init['content_css'] .= ',' . $custom_css;
    } else {
        $mce_init['content_css'] = $custom_css;
    }

    // Manually build the JS array string for textcolor_map
    $palette = "[
        '003c71', 'Dark Blue',
        '00b4ad', 'Teal',
        '007481', 'Teal Darker',
        'faa400', 'Yellow',
        '000000', 'Black'
    ]";

    // Assign the JS array string directly, not JSON encoded
    $mce_init['textcolor_map'] = $palette;

    // Disable custom colors to restrict selection to the palette
    $mce_init['custom_colors'] = false;

    return $mce_init;
});

// Add TinyMCE Button Options
function add_tinymce_button_options() {
    // Check if user has permission to edit posts
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }

    // Add only in Rich Editor mode
    if (get_user_option('rich_editing') == 'true') {
        add_filter('mce_external_plugins', 'add_tinymce_plugin');
        add_filter('mce_buttons', 'register_tinymce_button');
    }
}
add_action('admin_init', 'add_tinymce_button_options');

// Add Buttons to TinyMCE
function add_tinymce_plugin($plugin_array) {
    $plugin_array['authentic_buttons'] = get_template_directory_uri() . '/docs/assets/js/tinymce-buttons.js';
    return $plugin_array;
}

// Register the buttons
function register_tinymce_button($buttons) {
    array_push($buttons, 'authentic_buttons');
    array_push($buttons, 'check_mark_list');
    return $buttons;
}


// Add into paragraph format to TinyMCE, limit styles to h2, h3, h4 and paragraph
add_filter('tiny_mce_before_init', function($init_array) {
    $init_array['formats'] = json_encode([
        // add new format to formats
        'intro' => [
            'selector' => 'p',
            'block'    => 'p',
            'classes'  => 'intro',
        ],
    ], JSON_THROW_ON_ERROR);

    $block_formats = [
        'Paragraph=p',
        'Intro Paragraph=intro',
        'Heading 2=h2',
        'Heading 3=h3',
        'Heading 4=h4',
        
    ];
    $init_array['block_formats'] = implode(';', $block_formats);

    return $init_array;
});




// Allow additional inline CSS properties
add_filter('safe_style_css', 'allow_additional_inline_css_properties');
function allow_additional_inline_css_properties($allowed_css) {
    // Add CSS properties you want to allow inline
    $allowed_css[] = 'display';
    $allowed_css[] = 'font-size';
    $allowed_css[] = 'font-weight';
    $allowed_css[] = 'line-height';
    $allowed_css[] = 'color';
    $allowed_css[] = 'padding-bottom';
    $allowed_css[] = 'border-bottom';
    $allowed_css[] = 'margin';
    $allowed_css[] = 'text-align';
    $allowed_css[] = 'list-style';
    $allowed_css[] = 'text-transform';
    $allowed_css[] = 'text-shadow';
    $allowed_css[] = 'text-overflow';
    $allowed_css[] = 'text-wrap';
    $allowed_css[] = 'text-justify';
    // Add more properties as needed

    return $allowed_css;
}

add_filter('wp_kses_allowed_html', function($allowed_tags, $context) {
    if ($context === 'acf') {
        $allowed_tags['ul']['style'] = true;
        $allowed_tags['li']['style'] = true;
        $allowed_tags['span']['style'] = true;
    }
    return $allowed_tags;
}, 10, 2);



add_filter('acf/prepare_field/type=message', function($field) {
    // Disable escaping on the message field
    add_filter('acf/escape', '__return_false');
    return $field;
});


// add featured image
add_theme_support('post-thumbnails');


// ACF Site options page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Header / Footer',
        'menu_title'    => 'Header / Footer',
        'menu_slug'     => 'header-footer',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position'      => 4
    ));
}


// popoulate gravity forms to embed
// https://wpdevdesign.com/how-to-populate-gravity-forms-in-acf-select-field-and-display-the-selected-form-in-oxygen/
add_filter('acf/load_field/name=gravity_form', function($field) {
    if (class_exists('GFAPI')) {
        $forms = GFAPI::get_forms();
        $choices = [];
        foreach ($forms as $form) {
            $choices[$form['id']] = $form['title'];
        }
        $field['choices'] = $choices;
    }
    return $field;
});


// populate select menu ACF field called card_source with categories from posts
add_filter('acf/load_field/name=card_source', function($field) {
    $categories = get_categories(array(
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC'
    ));
    
    $choices = array();
    foreach ($categories as $category) {
        $choices[$category->term_id] = $category->name;
    }
    
    $field['choices'] = $choices;
    return $field;
});




// Modify Gravity Forms button classes
add_filter('gform_submit_button', 'custom_gform_button_classes', 10, 2);
function custom_gform_button_classes($button, $form) {
    // Remove default classes and add your custom ones
    $button = str_replace('gform_button button', 'btn btn-yellow', $button);
    return $button;
}



// tinyMCE remove buttons from toolbar
function disable_tinymce_buttons_row1($buttons) {
    $buttons = array_diff($buttons, array('wp_more', 'wp_full_screen', 'fullscreen', 'blockquote'));
    return $buttons;
}
add_filter('mce_buttons', 'disable_tinymce_buttons_row1');

// Also try the second toolbar row for full screen and other buttons
function disable_tinymce_buttons_row2($buttons) {
    $buttons = array_diff($buttons, array('wp_full_screen', 'charmap', 'indent', 'outdent'));
    return $buttons;
}
add_filter('mce_buttons_2', 'disable_tinymce_buttons_row2');

// Try the third toolbar row as well
function disable_tinymce_buttons_row3($buttons) {
    $buttons = array_diff($buttons, array('wp_full_screen'));
    return $buttons;
}
add_filter('mce_buttons_3', 'disable_tinymce_buttons_row3');


// Add page slug to body class
add_filter('body_class', function($classes) {
    if (is_singular()) {
        global $post;
        if (isset($post->post_name)) {
            $classes[] = 'page-' . sanitize_html_class($post->post_name);
        }
    } elseif (is_home() || is_front_page()) {
        $classes[] = 'page-home';
    }
    return $classes;
});


// Simple WordPress Breadcrumb Function
function get_simple_breadcrumbs() {
    // Don't show breadcrumbs on homepage
    if (is_front_page() || is_home()) {
        return '';
    }
    
    $breadcrumbs = array();
    
    
    if (is_page()) {
        // Page breadcrumbs - only show if there are ancestors
        $ancestors = array_reverse(get_post_ancestors(get_the_ID()));
        if (empty($ancestors)) {
            return ''; // No parent pages, don't show breadcrumbs
        }
        
        foreach ($ancestors as $ancestor_id) {
            $breadcrumbs[] = '<a href="' . get_permalink($ancestor_id) . '">' . get_the_title($ancestor_id) . '</a>';
        }
        // Current page (not linked)
        $breadcrumbs[] = get_the_title();
    } elseif (is_single()) {
        // Single post breadcrumbs
        if (has_category()) {
            $categories = get_the_category();
            $breadcrumbs[] = '<a href="' . get_category_link($categories[0]->term_id) . '">' . $categories[0]->name . '</a>';
        }
        $breadcrumbs[] = get_the_title();
    } elseif (is_category()) {
        // Category breadcrumbs
        $breadcrumbs[] = single_cat_title('', false);
    } elseif (is_tag()) {
        // Tag breadcrumbs
        $breadcrumbs[] = single_tag_title('', false);
    } elseif (is_archive()) {
        // Archive breadcrumbs
        $breadcrumbs[] = get_the_archive_title();
    } elseif (is_search()) {
        // Search breadcrumbs
        $breadcrumbs[] = 'Search Results for: ' . get_search_query();
    } elseif (is_404()) {
        // 404 breadcrumbs
        $breadcrumbs[] = 'Page Not Found';
    }
    
    // Build the breadcrumb HTML
    $breadcrumb_html = '<nav aria-label="breadcrumb">';
    $breadcrumb_html .= '<ol class="breadcrumb">';
    
    foreach ($breadcrumbs as $index => $crumb) {
        if ($index === count($breadcrumbs) - 1) {
            // Last item (current page) - no link, add active class
            $breadcrumb_html .= '<li class="breadcrumb-item active" aria-current="page">' . $crumb . '</li>';
        } else {
            // Regular breadcrumb item
            $breadcrumb_html .= '<li class="breadcrumb-item">' . $crumb . '</li>';
        }
    }
    
    $breadcrumb_html .= '</ol>';
    $breadcrumb_html .= '</nav>';
    
    return $breadcrumb_html;
}

// Echo version of the function
function breadcrumbs() {
    echo get_simple_breadcrumbs();
}



// Register custom image size for testimonial headshots
function ab_register_testimonial_headshot_size() {
    add_image_size('testimonial-headshot', 100, 100, true);
}
add_action('after_setup_theme', 'ab_register_testimonial_headshot_size');

// Only show the "Testimonial Headshot" size in the admin for the testimonials post type
function ab_limit_image_sizes_for_testimonials($sizes, $post_id = null) {
    // Only proceed if we have a post_id and it's a testimonials post type
    if ($post_id && get_post_type($post_id) === 'testimonials') {
        // Only show the custom size and the full/original
        return array(
            'testimonial-headshot' => __('Testimonial Headshot (100x100)'),
            'full' => __('Full Size'),
        );
    }
    return $sizes;
}
add_filter('image_size_names_choose', 'ab_limit_image_sizes_for_testimonials', 10, 2);