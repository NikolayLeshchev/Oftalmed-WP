<?php
/**
 * Block Name: Contact Form
 */

$id = $block['anchor'] ?? 'contact-form_' . $block['id'];
$customClass = $block['className'] ?? '';

// Админ-заглушка
if (is_admin()) {
    ?>
    <div style="padding: 20px; background: #f8f9fa; border: 2px dashed #c3c4c7; border-radius: 8px; text-align: center;">
        <strong>📍 Блок: Форма обратной связи с картой</strong><br>
        <small>Настройка маркеров карты и заголовков выполняется в панели блока.</small>
    </div>
    <?php
    return;
}

// ACF Поля
$title       = get_field('cf_title') ?: 'Остались вопросы? Напишите нам';
$subtitle    = get_field('cf_subtitle') ?: 'Наши специалисты ответят и проконсультируют по всем интересующим вас вопросам';
$cf7_shortcode = get_field('cf_shortcode'); // Шорткод Contact Form 7

?>

<section id="<?= esc_attr($id) ?>" class="contact-form <?= esc_attr($customClass) ?>">
    <div class="contact-form__container">
        <div class="contact-form-wrapper">
            
            <div class="map" data-map="">
                <!-- Контейнер самой карты (обязательно data-body) -->
                <div class="map__body" data-body="" data-lat="55.190" data-lng="30.205" data-zoom="13"></div>
                <!-- Витебск, ул. Кирова, 2 -->
                <div class="map__marker" data-lat="55.190" data-lng="30.205" data-icon="<?php echo get_template_directory_uri(); ?>/assets/img/marker.svg" data-icon-size="32,32" data-icon-offset="-16,-32" data-title="ул. Кирова, 2" data-hint="Витебск, ул. Кирова, 2"></div>
                <!-- Витебск, пр-т Фрунзе, 28 -->
                <div class="map__marker" data-lat="55.185" data-lng="30.210" data-icon="<?php echo get_template_directory_uri(); ?>/assets/img/marker.svg" data-icon-size="32,32" data-icon-offset="-16,-32" data-title="пр-т Фрунзе, 28" data-hint="Витебск, пр-т Фрунзе, 28"></div>
                <!-- Витебск, ул. Ленина, 28 -->
                <div class="map__marker" data-lat="55.193" data-lng="30.199" data-icon="<?php echo get_template_directory_uri(); ?>/assets/img/marker.svg" data-icon-size="32,32" data-icon-offset="-16,-32" data-title="ул. Ленина, 28" data-hint="Витебск, ул. Ленина, 28"></div>
                <!-- Витебск, ул. Чкалова, 14B -->
                <div class="map__marker" data-lat="55.188" data-lng="30.215" data-icon="<?php echo get_template_directory_uri(); ?>/assets/img/marker.svg" data-icon-size="32,32" data-icon-offset="-16,-32" data-title="ул. Чкалова, 14B" data-hint="Витебск, ул. Чкалова, 14B"></div>
                <!-- Новолукомль, ул. Энергетиков, 9 -->
                <div class="map__marker" data-lat="54.662" data-lng="29.156" data-icon="<?php echo get_template_directory_uri(); ?>/assets/img/marker.svg" data-icon-size="32,32" data-icon-offset="-16,-32" data-title="ул. Энергетиков, 9" data-hint="Новолукомль, ул. Энергетиков, 9"></div>
            </div>

            <div class="contact-form-block">
                <h2><?= wp_kses_post($title); ?></h2>
                <?php if ($subtitle): ?>
                    <p><?= wp_kses_post($subtitle); ?></p>
                <?php endif; ?>

                <?php if ($cf7_shortcode): 
                    if (function_exists('wpcf7_enqueue_scripts')) {
                        wpcf7_enqueue_scripts();
                        wpcf7_enqueue_styles();
                    } ?>
                    <?= do_shortcode($cf7_shortcode); ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<script src="https://api-maps.yandex.ru/2.1/?apikey=ваш-api-ключ&lang=ru_RU"></script>