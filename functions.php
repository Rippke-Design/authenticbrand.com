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

wp_enqueue_script(
    'bootstrap-bundle',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
    array(),
    null,
    true
);

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

// Register the plugin
function add_tinymce_plugin($plugin_array) {
    $plugin_array['authentic_buttons'] = get_template_directory_uri() . '/js/tinymce-buttons.js';
    return $plugin_array;
}

// Register the button
function register_tinymce_button($buttons) {
    array_push($buttons, 'authentic_buttons');
    return $buttons;
}

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
        'page_title'    => 'Site Options',
        'menu_title'    => 'Site Options',
        'menu_slug'     => 'site-options',
        'capability'    => 'edit_posts',
        'redirect'      => false
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

// Modify Gravity Forms button classes
add_filter('gform_submit_button', 'custom_gform_button_classes', 10, 2);
function custom_gform_button_classes($button, $form) {
    // Remove default classes and add your custom ones
    $button = str_replace('gform_button button', 'btn btn-yellow', $button);
    return $button;
}