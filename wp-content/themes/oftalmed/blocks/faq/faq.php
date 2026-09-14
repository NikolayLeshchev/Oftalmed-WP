<?php
/**
 * Block Name: FAQ Spollers
 */

$id = $block['anchor'] ?? 'faq_' . $block['id'];
$customClass = $block['className'] ?? '';

// ACF поля
$spollers  = get_field('faq_spollers');

// Админ-заглушка для пустого блока
if (is_admin() && empty($spollers)) {
    ?>
    <div style="padding: 20px; background: #f8f9fa; border: 2px dashed #c3c4c7; border-radius: 8px; text-align: center;">
        <strong>❓ Блок: FAQ (Аккордеон)</strong><br>
        <small>Добавьте вопросы и ответы в боковой панели или через поля блока.</small>
    </div>
    <?php
    return;
}
?>

<section id="<?= esc_attr($id); ?>" class="faq <?= esc_attr($customClass); ?>">
    <div class="faq__container">
        <div class="faq-wrapper">

            <?php if ($spollers): ?>
                <div data-fls-spollers="" data-fls-spollers-one="" class="spollers">
                    <?php foreach ($spollers as $item): 
                        $question = $item['question'] ?? '';
                        $answer   = $item['answer'] ?? '';
                    ?>
                        <?php if ($question && $answer): ?>
                            <details class="spollers__item">
                                <summary class="spollers__title"><?= esc_html($question); ?></summary>
                                <div class="spollers__body">
                                    <?= wp_kses_post($answer); ?>
                                </div>
                            </details>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>