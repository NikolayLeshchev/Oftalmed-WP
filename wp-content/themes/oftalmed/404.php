<?php
get_header();
?>

<main class="page">
    <div data-fls-index="" class="index">
        <section class="error-404" style="text-align: center; padding: 80px 20px;">
            <h1 style="font-size: 72px; margin-bottom: 10px; line-height: 1;">404</h1>
            <h2 style="font-size: 24px; margin-bottom: 20px;">Страница не найдена</h2>
            <p style="margin-bottom: 30px; opacity: 0.8;">К сожалению, запрашиваемая страница не существует или была перемещена.</p>
            
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button --green" aria-label="Вернуться на главную страницу">
                <iconify-icon icon="lucide:home" width="22" height="22" noobserver="" aria-hidden="true"></iconify-icon>
                <span>На главную</span>
            </a>
        </section>
    </div>
</main>

<?php
get_footer();