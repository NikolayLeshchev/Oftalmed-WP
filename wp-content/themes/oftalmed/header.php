<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="./assets/img/fav.png">
		<title>Home Page</title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
		<div class="wrapper">
			<header data-fls-header="" class="header" id="header">
				<div class="header__container">
					<div class="header-wrapper">
						<a href="index.html" class="header__logo">
							<img src="./assets/img/logo.svg" alt="logo">
						</a>
						<div class="header__menu menu">
							<nav class="menu__body">
								<ul class="menu__list">
									<li class="current-menu-item">
										<a href="#" class="menu__link">Услуги</a>
									</li>
									<li>
										<a href="#" class="menu__link">Линзы</a>
									</li>
									<li>
										<a href="#" class="menu__link">Ремонт очков</a>
									</li>
									<li>
										<a href="#" class="menu__link">Проверка зрения</a>
									</li>
									<li>
										<a href="#" class="menu__link">Контакты</a>
									</li>
								</ul>
								<div class="mobile-heder-social">
									<a href="#" class="social-link">
										<iconify-icon icon="iconoir:instagram" width="22" height="22" noobserver=""></iconify-icon>
									</a>
									<a href="#" class="social-link">
										<iconify-icon icon="meteor-icons:tiktok" width="20" height="20" noobserver=""></iconify-icon>
									</a>
								</div>
							</nav>
						</div>
						<div class="header-buttons">
							<a href="tel:+" class="button --green">
								<iconify-icon icon="lucide:phone" width="22" height="22" noobserver=""></iconify-icon>
								<span>Позвонить нам</span>
							</a>
							<a data-popup="#choice" href="#" class="button --border">
								<iconify-icon icon="majesticons:map-marker-line" width="24" height="24" noobserver=""></iconify-icon>
								<span>Выбрать салон</span>
							</a>
						</div>
						<div class="menu-icon-block">
							<button type="button" data-fls-menu="" class="menu__icon icon-menu" aria-label="close-menu">
								<span></span>
							</button>
						</div>
					</div>
				</div>
			</header>