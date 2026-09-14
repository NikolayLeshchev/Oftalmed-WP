<?php
/**
 * Block Name: Info Cards (Сетка карточек с иконками)
 */

$id = $block['anchor'] ?? 'info-card_' . $block['id'];
$customClass = $block['className'] ?? '';

$cards    = get_field( 'info_cards' );
?>

<?php if($cards) : ?>
<section id="<?= esc_attr($id) ?>" class="why <?= esc_attr($customClass) ?> <?= the_field('cards_per_row') ?>">
    <div class="why__container">
        <div class="why-wrapper">
            <?php while(have_rows('info_cards')): the_row(); ?>
                <?php $card_img = get_sub_field('card_img'); ?>
                <div class="why-card">
                    <?php if ($card_img): ?>
                        <div class="why-card__image">
                            <img src="<?= esc_url($card_img['url']) ?>" alt="<?= esc_attr($card_img['alt'] ?: get_sub_field('card_title')) ?>" loading="lazy">
                        </div>
                    <?php endif; ?>
                    <div class="why-card__title"><?= wp_kses_post(get_sub_field('card_title')); ?></div>
                    <div class="why-card__text"><?=  wp_kses_post(get_sub_field('card_text')); ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php endif; ?>