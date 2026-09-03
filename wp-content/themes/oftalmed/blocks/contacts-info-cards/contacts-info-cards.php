<?php
/**
 * Block Name: Contacts Info Cards (Сетка карточек контактов)
 */

$id = $block['anchor'] ?? 'info-card_' . $block['id'];
$customClass = $block['className'] ?? '';

$cards    = get_field( 'contacts_info_cards' );
?>

<?php if($cards) : ?>
<section class="contacts <?= esc_attr($customClass) ?>" id="<?= esc_attr($id) ?>" >
    <div class="contacts__container">
        <div class="contacts-wrapper">
            <?php while(have_rows('contacts_info_cards')): the_row(); ?>
                <?php 
                    $phone = esc_html(get_sub_field('phone')); 
                    $open_time = wp_kses_post(get_sub_field('time')); 
                ?>
                <div class="contacts-card">
                    <ul>
                        <li class="contacts-address">
                            <iconify-icon icon="majesticons:map-marker-line" width="28" height="28" noobserver="" aria-hidden="true"></iconify-icon>
                            <h2><?= wp_kses_post(get_sub_field('address')); ?></h2>
                        </li>
                        <?php if($phone) : ?>
                            <li class="contacts-phone">
                                <iconify-icon icon="lucide:phone" width="24" height="24" noobserver="" aria-hidden="true"></iconify-icon>
                                <a href="tel:<?= $phone ?>"><?= $phone ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if($open_time): ?>
                            <li class="contacts-work">
                                <iconify-icon icon="tabler:clock" width="26" height="26" noobserver=""></iconify-icon>
                                <?= $open_time ?>
                            </li>
                        <?php endif; ?>    
                    </ul>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>