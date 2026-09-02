<?php
/**
 * Block Name: Nearest Salons
 */

$id = $block['anchor'] ?? 'info-card_' . $block['id'];
$customClass = $block['className'] ?? '';

$salons = get_field('salons');

if (!$salons) {
    if (is_admin()) {
        echo '<div style="padding: 20px; background: #f0f0f0;">Добавьте салоны в настройках блока.</div>';
    }
    return;
}

if (is_admin()) {
    ?>
    <div style="
        padding: 24px;
        background: #f8f9fa;
        border: 2px dashed #c3c4c7;
        border-radius: 8px;
        text-align: center;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, sans-serif;
    ">
        <div style="font-size: 16px; font-weight: 600; color: #1e1e1e; margin-bottom: 6px;">
            Блок: Ближайшие салоны
        </div>
        <div style="font-size: 13px; color: #50575e; max-width: 480px; margin: 0 auto; line-height: 1.4;">
            Предпросмотр блока недоступен в редакторе. 
            Все изменения редактируются через кнопку <strong>«Редактировать оригинал»</strong> и отображаются сразу на сайте.
        </div>
    </div>
    <?php
    return;
}
?>

<section id="<?= esc_attr($id) ?>" class="nearest-salon <?= esc_attr($customClass) ?>">
    <div class="nearest-salon__container">
        <div class="nearest-salon-tabs">
            <div data-fls-tabs class="tabs">
                
                <nav data-fls-tabs-titles class="tabs__navigation">
                    <?php foreach ($salons as $index => $salon): 
                        $active_class = ($index === 0) ? ' --tab-active' : '';
                        $address = $salon['address'] ?? '';
                    ?>
                        <button type="button" class="tabs__title<?php echo $active_class; ?>">
                            <?php echo esc_html($address); ?>
                        </button>
                    <?php endforeach; ?>
                </nav>

                <div data-fls-tabs-body class="tabs__content">
                    <?php foreach ($salons as $index => $salon): 
                        $choice_number = $index + 1;
                        $address = $salon['address'] ?? '';
                        $image = $salon['image'] ?? null;
                        $phone = $salon['phone'] ?? '';
                        $clean_phone = preg_replace('/[^\d+]/', '', $phone);
                        $working_hours_raw = $salon['working_hours'] ?? '';
                        $doctor_info = $salon['doctor_info'] ?? '';
                        $map_url = $salon['map_url'] ?? '';

                        $working_hours_lines = array_filter(array_map('trim', explode("\n", $working_hours_raw)));
                    ?>
                        <div class="tabs__body">
                            <div class="nearest-salon-wrapper" data-choice="<?php echo $choice_number; ?>">
                                
                                <div class="nearest-salon-wrapper__image">
                                    <?php if (!empty($image) && is_array($image)): ?>
                                        <?php if (!empty($image['id'])): ?>
                                            <?php echo wp_get_attachment_image($image['id'], 'full', false, [
                                                'alt' => esc_attr($image['alt'] ?: $address),
                                                'loading' => 'lazy',
                                            ]); ?>
                                        <?php elseif (!empty($image['url'])): ?>
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $address); ?>" loading="lazy">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>

                                <div class="nearest-salon-wrapper-info">
                                    <div class="nearest-salon-wrapper-info__title">
                                        <?php echo esc_html($address); ?>
                                    </div>

                                    <ul class="nearest-salon-wrapper-info__list">
                                        <?php if ($phone): ?>
                                            <li>
                                                <a href="tel:<?php echo esc_attr($clean_phone); ?>">
                                                    <iconify-icon icon="lucide:phone" width="24" height="24" noobserver></iconify-icon>
                                                    <span><?php echo esc_html($phone); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (!empty($working_hours_lines)): ?>
                                            <li>
                                                <iconify-icon icon="tabler:clock" width="24" height="24" noobserver></iconify-icon>
                                                <ul>
                                                    <?php foreach ($working_hours_lines as $line): ?>
                                                        <li>
                                                            <span><?php echo esc_html($line); ?></span>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                        <?php endif; ?>

                                        <?php if ($doctor_info): ?>
                                            <li>
                                                <iconify-icon icon="iconamoon:check-bold" width="24" height="24" noobserver></iconify-icon>
                                                <span><?php echo esc_html($doctor_info); ?></span>
                                            </li>
                                        <?php endif; ?>
                                    </ul>

                                    <div class="nearest-salon-wrapper-info__buttons">
                                        <?php if ($phone): ?>
                                            <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="button --green">
                                                <iconify-icon icon="lucide:phone" width="24" height="24" noobserver></iconify-icon>
                                                <span>Позвонить</span>
                                            </a>
                                        <?php endif; ?>

                                        <?php if ($map_url): ?>
                                            <a href="<?php echo esc_url($map_url); ?>" target="_blank" rel="noopener noreferrer" class="button --border">
                                                <iconify-icon icon="majesticons:map-marker-line" width="24" height="24" noobserver></iconify-icon>
                                                <span>Построить маршрут</span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</section>