<?php
/**
 * Block Name: Modern Cards
 */

$id = $block['anchor'] ?? 'modern_' . $block['id'];
$customClass = $block['className'] ?? '';

$cards = get_field('modern_cards');

if (is_admin() && empty($cards)) {
    ?>
    <div style="padding: 20px; background: #f8f9fa; border: 2px dashed #c3c4c7; border-radius: 8px; text-align: center;">
        <strong>🎴 Блок: Карточки товаров (Modern)</strong><br>
        <small>Добавьте карточки через ACF-поля блока в боковой панели.</small>
    </div>
    <?php
    return;
}
?>

<section id="<?= esc_attr($id); ?>" class="modern <?= esc_attr($customClass); ?>">
    <div class="modern__container">
        <div class="modern-wrapper">
            
            <?php if ($cards): ?>
                <?php foreach ($cards as $card): 
                    $card_theme = $card['color_theme'] ?? '--blue-card';
                    $title      = $card['title'] ?? '';
                    $text       = $card['text'] ?? '';
                    $button     = $card['button'] ?? null;
                    $image      = $card['image'] ?? null; // Массив изображения из ACF

                    // Получаем URL для background-style и Alt-текст из массива
                    $img_url = $image['url'] ?? '';
                    $img_alt = !empty($image['alt']) ? $image['alt'] : $title;
                    $bg_style = $img_url ? 'style="background-image: url(' . esc_url($img_url) . ');"' : '';
                ?>
                    <div class="modern-card <?= esc_attr($card_theme); ?>" <?= $bg_style; ?>>
                        
                        <div class="modern-card-info">
                            <?php if ($title): ?>
                                <h2 class="modern-card-info__title"><?= esc_html($title); ?></h2>
                            <?php endif; ?>

                            <?php if ($text): ?>
                                <p><?= wp_kses_post($text); ?></p>
                            <?php endif; ?>

                            <?php if ($button && !empty($button['url'])): ?>
                                <a href="<?= esc_url($button['url']); ?>" 
                                   target="<?= esc_attr($button['target'] ?: '_self'); ?>" 
                                   class="button --green">
                                    <span><?= esc_html($button['title'] ?: 'Узнать больше'); ?></span>
                                    <iconify-icon icon="lucide:arrow-right" width="22" height="22" noobserver="" aria-hidden="true"></iconify-icon>
                                </a>
                            <?php endif; ?>
                        </div>

                        <?php if ($image): ?>
                            <div class="modern-card-image">
                                <?php 
                                // Выводим адаптивный <img> сгенерированный WordPress по ID из массива
                                if (!empty($image['id'])) {
                                    echo wp_get_attachment_image($image['id'], 'full', false, [
                                        'loading' => 'lazy',
                                        'alt'     => esc_attr($img_alt)
                                    ]);
                                } else {
                                    // Резервный вывод, если ID по какой-то причине отсутствует
                                    echo '<img loading="lazy" alt="' . esc_attr($img_alt) . '" src="' . esc_url($img_url) . '">';
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</section>