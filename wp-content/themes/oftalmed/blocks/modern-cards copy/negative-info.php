<?php
/**
 * Block Name: Negative Info
 */

$id = $block['anchor'] ?? 'negative_' . $block['id'];
$customClass = $block['className'] ?? '';

$title      = get_field('title');
$text       = get_field('text');
$bg_desktop = get_field('bg_desktop');
$bg_mobile  = get_field('bg_mobile');  
$items      = get_field('items');      

$bg_desktop_url = $bg_desktop['url'] ?? '';
$bg_mobile_url  = $bg_mobile['url'] ?? '';
$bg_style       = $bg_desktop_url ? 'style="background-image: url(' . esc_url($bg_desktop_url) . ');"' : '';

if (is_admin() && empty($title) && empty($items)) {
    ?>
    <div style="padding: 20px; background: #f8f9fa; border: 2px dashed #c3c4c7; border-radius: 8px; text-align: center;">
        <strong>⚠️ Блок: Инфо-блок с рисками (Negative)</strong><br>
        <small>Заполните заголовок, фоны и список карточек в панели ACF.</small>
    </div>
    <?php
    return;
}
?>

<section id="<?= esc_attr($id); ?>" class="negative <?= esc_attr($customClass); ?>">
    <div class="negative__container">
        <div class="negative-wrapper" <?= $bg_style; ?>>
            
            <div class="negative-block-info">
                <?php if ($title || $text): ?>
                    <div class="info-negative">
                        <?php if ($title): ?>
                            <h2><?= esc_html($title); ?></h2>
                        <?php endif; ?>
                        
                        <?php if ($text): ?>
                            <p><?= wp_kses_post($text); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($items): ?>
                    <div class="negative-block-info__items">
                        <?php foreach ($items as $item): 
                            $icon = $item['icon'] ?? null;
                            $item_text = $item['text'] ?? '';
                            $icon_url = $icon['url'] ?? '';
                            $icon_alt = !empty($icon['alt']) ? $icon['alt'] : ($item_text ?: 'Icon');
                        ?>
                            <div class="why-card">
                                <?php if ($icon_url): ?>
                                    <div class="why-card__image">
                                        <img src="<?= esc_url($icon_url); ?>" alt="<?= esc_attr($icon_alt); ?>" loading="lazy">
                                    </div>
                                <?php endif; ?>

                                <?php if ($item_text): ?>
                                    <div class="why-card__text"><?= esc_html($item_text); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($bg_mobile): ?>
                <div class="mobile-image">
                    <picture>
                        <source srcset="<?= esc_url($bg_mobile_url); ?>" type="<?= esc_attr($bg_mobile['mime_type'] ?? 'image/avif'); ?>">
                        <?php 
                        if (!empty($bg_mobile['id'])) {
                            echo wp_get_attachment_image($bg_mobile['id'], 'full', false, [
                                'loading' => 'lazy',
                                'alt'     => esc_attr($bg_mobile['alt'] ?: ($title ?: 'Mobile background'))
                            ]);
                        } else {
                            echo '<img loading="lazy" alt="' . esc_attr($title ?: 'Mobile background') . '" src="' . esc_url($bg_mobile_url) . '">';
                        }
                        ?>
                    </picture>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>