<?php
/**
 * Block Name: Choose Info
 */

$id = $block['anchor'] ?? 'choose_' . $block['id'];
$customClass = $block['className'] ?? '';

$title      = get_field('title');
$text       = get_field('text');
$button     = get_field('button');   
$bg_desktop = get_field('bg_desktop'); 
$bg_mobile  = get_field('bg_mobile');  
$items      = get_field('items');      

$bg_desktop_url = $bg_desktop['url'] ?? '';
$bg_mobile_url  = $bg_mobile['url'] ?? '';
$bg_style       = $bg_desktop_url ? 'style="background-image: url(' . esc_url($bg_desktop_url) . ');"' : '';

if (is_admin() && empty($title) && empty($items)) {
    ?>
    <div style="padding: 20px; background: #f8f9fa; border: 2px dashed #c3c4c7; border-radius: 8px; text-align: center;">
        <strong>🤔 Блок: Инфо-блок с выбором</strong><br>
        <small>Заполните заголовок, кнопку, фоны и список карточек в панели ACF.</small>
    </div>
    <?php
    return;
}
?>

<section id="<?= esc_attr($id); ?>" class="choose <?= esc_attr($customClass); ?>">
    <div class="choose__container">
        <div class="choose-wrapper" <?= $bg_style; ?>>
            
            <div class="choose-block-info">
                <div class="info-choose">
                    <?php if ($title): ?>
                        <h2 class="info-choose__title"><?= esc_html($title); ?></h2>
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

                <?php if ($items): ?>
                    <div class="choose-block-info__items">
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

            <?php if ($bg_mobile_url): ?>
                <div class="mobile-image">
                    <picture>
                        <?php if (!empty($bg_mobile['mime_type'])): ?>
                            <source srcset="<?= esc_url($bg_mobile_url); ?>" type="<?= esc_attr($bg_mobile['mime_type']); ?>">
                        <?php endif; ?>
                        <img src="<?= esc_url($bg_mobile_url); ?>" alt="<?= esc_attr(!empty($bg_mobile['alt']) ? $bg_mobile['alt'] : ($title ?: 'Image')); ?>" loading="lazy">
                    </picture>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>