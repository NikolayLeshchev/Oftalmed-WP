<?php
/**
 * Block Name: Popular Services (Меню популярных разделов)
 */

$id = $block['anchor'] ?? 'info-card_' . $block['id'];
$customClass = $block['className'] ?? '';

$cards    = get_field( 'popular_cards' );
?>

<?php if($cards) : ?>

<section id="<?= esc_attr($id) ?>"  class="popular  <?= esc_attr($customClass) ?>">
    <div class="popular__container">
        <div class="popular-wrapper">
            <?php while(have_rows('popular_cards')): the_row(); ?>
                <?php $card_img = get_sub_field('card_img'); ?>
                <a href="<?= esc_url(get_sub_field('card_link')); ?>" class="popular-card">
                    <?php if ($card_img): ?>
                        <div class="popular-card__image">
                            <img src="<?= esc_url($card_img['url']) ?>" alt="<?= esc_attr($card_img['alt'] ?: get_sub_field('card_title')) ?>" loading="lazy">
                        </div>
                    <?php endif; ?>
                    <div class="popular-card__title"><?= esc_html(get_sub_field('card_title')); ?></div>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php endif; ?>