<?php
/**
 * Block Name: Section Title (Заголовок секции)
 */


$title    = get_field( 'section_title' );
$subtitle = get_field( 'section_subtitle' );
?>

<section class="section-title">
    <div class="section-title__container">
        <div class="section-title-block">
            <h2><?php echo esc_html( $title ); ?></h2>
            <?php if ( $subtitle ) : ?>
                <p><?php echo wp_kses_post( $subtitle ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>