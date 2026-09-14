<?php
/**
 * Block Name: Section Title (Заголовок секции)
 */

$id = $block['anchor'] ?? 'title_' . $block['id'];
$customClass = $block['className'] ?? '';

$title    = get_field( 'section_title' );
$subtitle = get_field( 'section_subtitle' );
?>

<section id="<?= esc_attr($id); ?>" class="section-title <?= esc_attr($customClass); ?>">
    <div class="section-title__container">
        <div class="section-title-block">
            <h2><?php echo esc_html( $title ); ?></h2>
            <?php if ( $subtitle ) : ?>
                <p><?php echo wp_kses_post( $subtitle ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>