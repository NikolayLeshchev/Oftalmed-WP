<?php

// Contact Form 7 settings

add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');

// Отключение Emoji
add_action('init', function() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', function($plugins) {
        return is_array($plugins) ? array_diff($plugins, ['wpemoji']) : [];
    });
    add_filter('wp_resource_hints', function($urls, $relation_type) {
        if ('dns-prefetch' === $relation_type) {
            $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/');
            $urls = array_diff($urls, [$emoji_svg_url]);
        }
        return $urls;
    }, 10, 2);
});

// Отключение Embeds (авто-вставка сторонних постов)
add_action('wp_footer', function() {
    wp_deregister_script('wp-embed');
});

// Очистка <head> от технического мусора
remove_action('wp_head', 'wp_generator');                   // Версия WP
remove_action('wp_head', 'rsd_link');                      // EditURI link
remove_action('wp_head', 'wlwmanifest_link');              // Windows Live Writer
remove_action('wp_head', 'rest_output_link_wp_head');       // REST API link
remove_action('wp_head', 'wp_oembed_add_discovery_links'); // oEmbed discovery
remove_action('wp_head', 'wp_shortlink_wp_head');          // Короткая ссылка

// Ограничение или отключение Heartbeat API
add_action('init', function() {
    wp_deregister_script('heartbeat');
}, 1);



// 1. Добавляем defer для JS-скриптов
add_filter('script_loader_tag', function($tag, $handle, $src) {
    if (is_admin()) return $tag;

    // Массив handles скриптов, которым нужен defer
    $defer_scripts = [
        'theme-script',
        'contact-form-7'
    ];

    if (in_array($handle, $defer_scripts, true)) {
        if (false === strpos($tag, 'defer')) {
            return str_replace(' src', ' defer src', $tag);
        }
    }

    return $tag;
}, 10, 3);


// 2. Делаем CSS асинхронным 
add_filter('style_loader_tag', function($html, $handle, $href) {
    if (is_admin()) return $html;

    $async_styles = [
        'theme-style',
        'contact-form-7', // Стили CF7
    ];

    if (in_array($handle, $async_styles, true)) {
        return "<link rel='stylesheet' id='{$handle}-css' href='{$href}' media='print' onload=\"this.media='all'\">\n<noscript><link rel='stylesheet' id='{$handle}-css' href='{$href}'></noscript>\n";
    }

    return $html;
}, 10, 3);


