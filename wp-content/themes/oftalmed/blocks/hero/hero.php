<?php
/**
 * Hero block template
*/

$id = $block['anchor'] ?? 'hero-' . $block['id'];
$classes = ['hero'];
if (!empty($block['className'])) {
    $classes[] = $block['className'];
}
$class = implode(' ', $classes);

$heading        = get_field('heading');
$text           = get_field('text');
$button_text    = get_field('button_text');
$button_link    = get_field('button_link');
$bg_image       = get_field('bg_image');
$mobile_image   = get_field('mobile_image');
?>

<section
    id="<?= esc_attr($id) ?>"
    class="<?= esc_attr($class) ?>"
    <?php if ($bg_image): ?>
        style="background-image: url(<?= esc_url($bg_image['url']) ?>)"
    <?php endif; ?>
>
    <div class="hero__container">
        <div class="hero-wrapper">
            <div class="hero-content">

                <?php if ($heading): ?>
                    <h1 class="main-title">
                        <?= wp_kses_post($heading) ?>
                    </h1>
                <?php endif; ?>

                <?php if ($text): ?>
                    <p class="hero-text"><?= esc_html($text) ?></p>
                <?php endif; ?>

                <?php if ($button_text && $button_link): ?>
                    <div class="hero-button">
                        <a href="<?= esc_url($button_link) ?>" class="button --green">
                            <iconify-icon icon="majesticons:map-marker-line" width="24" height="24"></iconify-icon>
                            <span><?= esc_html($button_text) ?></span>
                        </a>
                    </div>
                <?php endif; ?>

            </div>

            <?php if ($mobile_image): ?>
                <div class="hero-image">
                    <picture>
                        <source srcset="<?= esc_url($mobile_image['url']) ?>" type="<?= esc_attr($mobile_image['mime_type']) ?>">
                        <img fetchpriority="high"
                            src="<?= esc_url($mobile_image['url']) ?>"
                            alt="<?= esc_attr($mobile_image['alt'] ?: esc_attr($heading)) ?>"
                        >
                    </picture>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>