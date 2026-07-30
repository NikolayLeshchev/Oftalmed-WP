<?php

add_action('wp_enqueue_scripts', 'oftalmed_assets_include');

function oftalmed_assets_include() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/app.min.css', [], filemtime(get_template_directory() . '/assets/css/app.min.css'));
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/app.min.js', [], filemtime(get_template_directory() . '/assets/js/app.min.js'), true);
}