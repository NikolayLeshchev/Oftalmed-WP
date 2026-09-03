<?php

add_action('wp_enqueue_scripts', 'oftalmed_assets_include');

function oftalmed_assets_include() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/app.min.css', [], filemtime(get_template_directory() . '/assets/css/app.min.css'));
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/app.min.js', [], filemtime(get_template_directory() . '/assets/js/app.min.js'), true);
}

add_theme_support('post-thumbnails');
add_theme_support( 'custom-logo' );

add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
});

// Add SVG support
add_filter('upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
});

add_filter('wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    if ( strpos( $filename, '.svg' ) !== false ) {
        $data['ext']  = 'svg';
        $data['type'] = 'image/svg+xml';
    }
    return $data;
}, 10, 4);

// Menu registration
register_nav_menus( array(
    'header_menu' => 'Шапка сайта (Header Menu)',
    'footer_menu' => 'Подвал сайта (Footer Menu)'
) );

add_filter( 'nav_menu_link_attributes', function( $atts, $item, $args ) {
    if ( isset( $args->theme_location ) && $args->theme_location === 'header_menu' ) {
        $atts['class'] = 'menu__link';
    }
    return $atts;
}, 10, 3 );


// ACF Blocks registration
add_action('init' , function () {
    $blocks = glob(get_template_directory() . '/blocks/*/block.json');

    foreach ($blocks as $block) {
        register_block_type($block);
    }
});

add_action('after_setup_theme', function() {
    add_theme_support('editor-styles');
    add_editor_style('assets/css/app.min.css');
});

add_action( 'after_setup_theme', function() {
    add_theme_support( 'align-wide' );
});