<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
		/* ===== Onest Font Faces ===== */
		
		/* Вес 400 (обычный) */
		@font-face {
			font-family: 'Onest';
			font-style: normal;
			font-weight: 400;
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/gNMKW3F-SZuj7xmS-HY6EQ.woff2') format('woff2');
			font-display: swap;
			unicode-range: U+0460-052F, U+1C80-1C8A, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
		}
		@font-face {
			font-family: 'Onest';
			font-style: normal;
			font-weight: 400;
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/gNMKW3F-SZuj7xmb-HY6EQ.woff2') format('woff2');
			font-display: swap;
			unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
		}
		@font-face {
			font-family: 'Onest';
			font-style: normal;
			font-weight: 400;
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/gNMKW3F-SZuj7xmR-HY6EQ.woff2') format('woff2');
			font-display: swap;
			unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
		}
		@font-face {
			font-family: 'Onest';
			font-style: normal;
			font-weight: 400;
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/gNMKW3F-SZuj7xmf-HY.woff2') format('woff2');
			font-display: swap;
			unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
		}

		/* Вес 500 */
		@font-face {
			font-family: 'Onest';
			font-style: normal;
			font-weight: 500;
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/gNMKW3F-SZuj7xmS-HY6EQ.woff2') format('woff2');
			font-display: swap;
			unicode-range: U+0460-052F, U+1C80-1C8A, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
		}
		@font-face {
			font-family: 'Onest';
			font-style: normal;
			font-weight: 500;
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/gNMKW3F-SZuj7xmb-HY6EQ.woff2') format('woff2');
			font-display: swap;
			unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
		}
		@font-face {
			font-family: 'Onest';
			font-style: normal;
			font-weight: 500;
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/gNMKW3F-SZuj7xmR-HY6EQ.woff2') format('woff2');
			font-display: swap;
			unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
		}
		@font-face {
			font-family: 'Onest';
			font-style: normal;
			font-weight: 500;
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/gNMKW3F-SZuj7xmf-HY.woff2') format('woff2');
			font-display: swap;
			unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
		}

		/* ===== Global Styles ===== */
		body {
			font-family: 'Onest', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
			font-weight: 400;
		}
		
		</style>

		<link
		rel="preload"
		href="./assets/fonts/gNMKW3F-SZuj7xmS-HY6EQ.woff2"
		as="font"
		type="font/woff2"
		crossorigin="anonymous"
		>
		<link
		rel="preload"
		href="./assets/fonts/gNMKW3F-SZuj7xmf-HY.woff2"
		as="font"
		type="font/woff2"
		crossorigin="anonymous"
		>
		<script>
		(function() {
			const removeLoading = () => {
				document.documentElement.removeAttribute('data-loading');
			};

			if (document.readyState === 'complete') {
				(document.fonts?.ready || Promise.resolve()).then(removeLoading);
			} else {
				window.addEventListener('load', () => {
				(document.fonts?.ready || Promise.resolve()).then(removeLoading);
				});
			}

			setTimeout(removeLoading, 1000);
		})();
		</script>

		<style>
		html[data-loading] #header {
			opacity: 0;
			pointer-events: none;
		}

		body #header {
			opacity: 1;
			transition: all 0.3s ease-in;
		}
		</style>

		<title><?php the_title(); ?></title>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
		<div class="wrapper">
			<header data-fls-header="" class="header" id="header">
				<div class="header__container">
					<div class="header-wrapper">
						<?php the_custom_logo(); ?>
						<div class="header__menu menu">
							<nav class="menu__body" aria-label="Основное меню навигации">
								<?php 
									wp_nav_menu( array(
										'theme_location' => 'header_menu',
										'container'      => false,
										'menu_class'     => 'menu__list',
										'fallback_cb'    => false,
									) );
								?>
								<?php if ( have_rows( 'socials', 'option' ) ) : ?>
									<div class="mobile-heder-social" aria-label="Социальные сети">
										<?php while ( have_rows( 'socials', 'option' ) ) : the_row(); 
											$link = get_sub_field( 'social_link' );
											$icon = get_sub_field( 'social_icon' );
										?>
											<a href="<?php echo esc_url( $link ); ?>" class="social-link" aria-label="Социальная сеть" target="_blank" rel="noopener noreferrer">
												<iconify-icon icon="<?php echo esc_attr( $icon ); ?>" width="22" height="22" noobserver="" aria-hidden="true"></iconify-icon>
											</a>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
							</nav>
						</div>
						<div class="header-buttons">
							<?php if(get_field('main_phone', 'options')) : ?>
							<a href="tel:<?php the_field('main_phone', 'options'); ?>" class="button --green" aria-label="Позвонить нам по телефону">
								<iconify-icon icon="lucide:phone" width="22" height="22" noobserver="" aria-hidden="true"></iconify-icon>
								<span>Позвонить нам</span>
							</a>
							<?php endif; ?>
							<a href="#data-choice" class="button --border" aria-label="Открыть список салонов для выбора">
								<iconify-icon icon="majesticons:map-marker-line" width="24" height="24" noobserver="" aria-hidden="true"></iconify-icon>
								<span>Выбрать салон</span>
							</a>
							<!-- data-popup="#choice" -->
						</div>
						<div class="menu-icon-block">
							<button type="button" data-fls-menu="" class="menu__icon icon-menu" aria-label="Открыть или закрыть меню навигации" aria-expanded="false" aria-controls="header">
								<span></span>
							</button>
						</div>
					</div>
				</div>
			</header>