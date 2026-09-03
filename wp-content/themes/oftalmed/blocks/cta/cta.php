<?php
/**
 * Block Name: Contacts Info Cards (Сетка карточек контактов)
 */

$id = $block['anchor'] ?? 'info-card_' . $block['id'];
$customClass = $block['className'] ?? '';

$title    = get_field( 'title' );
$text    = get_field( 'text' );
$bg_img    = get_field( 'bg_img' );
$bg_img_mob    = get_field( 'bg_img_mob' );
$btns    = get_field( 'btns' );
?>


<section class="contact">
    <div class="contact__container">
        <div class="contact-wrapper" style="background-image: url(<?= $bg_img['url'] ?>);">
            <div class="contact-block">
                <h2 class="contact-block__title">
                    <?= wp_kses_post($title) ?>
                </h2>
                <div class="contact-block__text"><?= wp_kses_post($text) ?></div>
                <?php if($btns) : ?>
                    <div class="contact-block__buttons">
                        <?php while(have_rows('btns')): the_row(); ?>
                            <a href="<?= esc_url(get_sub_field('btn_link')) ?>" target="_blank" aria-label="<?= esc_html(get_sub_field('btn_text')) ?>" class="button <?= esc_html(get_sub_field('btn_color')) ?>">
                                <span class="button-block">
                                    <iconify-icon icon="<?= esc_html(get_sub_field('btn_icon')) ?>" width="22" height="22" noobserver="" aria-hidden="true"></iconify-icon>
                                    <?= esc_html(get_sub_field('btn_text')) ?>
                                </span>
                                <iconify-icon icon="lucide:arrow-right" width="22" height="22" noobserver="" aria-hidden="true"></iconify-icon>
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <picture>
                <source srcset="<?= $bg_img_mob['url'] ?>" type="image/avif">
                <img class="contact-mobile-image" alt="<?php echo esc_attr($bg_img_mob['alt'] ?: $title); ?>" loading="lazy" src="<?= $bg_img_mob['url'] ?>">
            </picture>
        </div>
    </div>
</section>