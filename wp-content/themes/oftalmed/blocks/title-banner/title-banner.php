<?php
/**
 * Block Name: Title Banner (Заголовок страницы)
 */

$custom_title  = get_field( 'banner_title' );
$title         = ! empty( $custom_title ) ? $custom_title : get_the_title();
$text          = get_field( 'banner_text' );
$banner_bg     = get_field( 'banner_bg' );
$banner_bg_mob = get_field( 'banner_bg_mob' );

$bg_style = ! empty( $banner_bg['url'] ) ? 'style="background-image: url(' . esc_url( $banner_bg['url'] ) . ');"' : '';
?>

<section class="top-section" <?= $bg_style ?>>
    <div class="top-section__container">
        <div class="top-section-wrapper">
            
            <!-- Кастомные автоматические крошки -->
            <?php oftalmed_breadcrumbs(); ?>

            <div class="top-section-block">
                <h1 class="top-section__title"><?= esc_html( $title ); ?></h1>
                
                <?php if ( $text ) : ?>
                    <div class="top-section__text"><?= wp_kses_post( $text ); ?></div>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <?php if ( ! empty( $banner_bg_mob['url'] ) ) : ?>
        <div class="mobile-top-section__image">
            <picture>
                <source srcset="<?= esc_url( $banner_bg_mob['url'] ); ?>" type="image/avif">
                <img src="<?= esc_url( $banner_bg_mob['url'] ); ?>" 
                     alt="<?= esc_attr( $banner_bg_mob['alt'] ?? $title ); ?>" 
                     loading="lazy">
            </picture>
        </div>
    <?php endif; ?>
</section>