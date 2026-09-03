<?php
/**
 * Block Name: Image Cards (Сетка карточек с картинками)
 */

$id = $block['anchor'] ?? 'info-card_' . $block['id'];
$customClass = $block['className'] ?? '';

$cards = get_field('image_cards');
?>

<?php if ($cards) : ?>

<section id="<?= esc_attr($id) ?>" class="most-often <?= esc_attr($customClass) ?>">
    <div class="results__container">
        <div class="results-wrapper">
            <?php while (have_rows('image_cards')): the_row(); ?>
                <?php 
                $card_img = get_sub_field('card_img');
                $card_link = get_sub_field('card_link');
                $card_title = get_sub_field('card_title');
                
                $tag = $card_link ? 'a' : 'div';
                $tag_attributes = $card_link ? 'href="' . esc_url($card_link) . '" target="_blank" class="card"' : 'class="card"';
                ?>
                <<?= $tag; ?> <?= $tag_attributes; ?>>
                    <div class="card__image">
                        <?php 
                        if (!empty($card_img['id'])) {
                            echo wp_get_attachment_image($card_img['id'], 'large', false, [
                                'alt'     => esc_attr($card_img['alt'] ?: $card_title),
                                'loading' => 'lazy',
                                'sizes'   => '(max-width: 600px) 100vw, (max-width: 1024px) 50vw, 33vw'
                            ]);
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <div class="card-body__title"><?= wp_kses_post($card_title); ?></div>
                        <div class="card-body__list card-body__text">
                            <?= wp_kses_post(get_sub_field('card_text')); ?>
                        </div>
                        <?php if (get_sub_field('show_btn')) : ?>
                            <div class="card-body__button">
                                <div class="button --green">
                                    <span><?= esc_html(get_sub_field('card_btn_text')) ?></span>
                                    <iconify-icon icon="lucide:arrow-right" width="22" height="22" noobserver="" aria-hidden="true"></iconify-icon>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </<?= $tag; ?>>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>