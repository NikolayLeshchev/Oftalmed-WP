<?php

add_action('wp_enqueue_scripts', 'oftalmed_assets_include');

function oftalmed_assets_include() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/app.min.css', [], filemtime(get_template_directory() . '/assets/css/app.min.css'));
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/app.min.js', [], filemtime(get_template_directory() . '/assets/js/app.min.js'), true);
}

add_theme_support('post-thumbnails');
add_theme_support( 'custom-logo' );

register_nav_menus( array(
    'header_menu' => 'Шапка сайта (Header Menu)',
) );
add_filter( 'nav_menu_link_attributes', function( $atts, $item, $args ) {
    if ( isset( $args->theme_location ) && $args->theme_location === 'header_menu' ) {
        $atts['class'] = 'menu__link';
    }
    return $atts;
}, 10, 3 );