<!DOCTYPE html>
<html lang="<?= pll_current_language('slug'); ?>" prefix="og: https://ogp.me/ns#">
	<head>
		<meta charset="UTF-8">
		<title>
			<?= wp_title('-', true, 'right') . get_bloginfo('name') ?>
		</title>
		<meta name="description" content="<?= get_bloginfo('description') ?>">
		<meta name="keywords" content="<?= __( 'mesure, pollution, qualité de l’air, système embarqué, capteurs', 'alt' ) ?>">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta property="og:site_name" content="<?= get_bloginfo('name') ?>"/>
		<meta property="og:title" content="<?= wp_title('-', true, 'right') . get_bloginfo('name') ?>"/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content="<?= get_permalink() ?>"/>
		<meta property="og:image" content="<?= atl_mix('/images/og.jpg') ?>"/>
		<meta property="og:description" content="<?= get_bloginfo('description') ?>"/>
		<meta property="og:locale" content="<?= pll_current_language('locale'); ?>"/>
		<?php foreach(atl_remove_value_from_array(pll_current_language('locale'), pll_languages_list(['fields'=>'locale'])) as $language): ?>
			<meta property="og:locale:alternate" content="<?= $language ?>"/>
		<?php endforeach; ?>
		<link rel="icon" type="image/svg+xml" href="<?= atl_mix('/images/favicon.svg'); ?>"/>
		<link rel="icon" type="image/png" href="<?= atl_mix('/images/favicon.ico'); ?>" media="(prefers-color-scheme:light)">
		<link rel="icon" type="image/png" href="<?= atl_mix('/images/favicon_dark.ico'); ?>" media="(prefers-color-scheme:dark)">
		<link rel="icon" type="image/png" href="<?= atl_mix('/images/favicon.ico'); ?>" media="(prefers-color-scheme:no-preference)">
		<link rel="stylesheet" type="text/css" href="<?= atl_mix('/css/style.css'); ?>"/>
		<script type="text/javascript" src="<?= atl_mix('js/script.js'); ?>"></script>
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<span class="hamburger"><span class="navicon"></span></span>
		<header class="header">
			<a class="header__skip-to-content" href="#main">
				<?= __('Sauter au contenu','atl'); ?>
			</a>
			<h1 class="header__title"><?= get_bloginfo('name') ?></h1>
			<nav class="header__nav nav">
				<h2 class="nav__title"><?= __('Navigation principale','atl') ?></h2>

				<a href="<?= get_home_url() ?>" class="nav__home" autofocus><img src="<?= atl_mix('/images/home.svg'); ?>" alt=""></a>
				<ul class="nav__container">
					<?php foreach(atl_get_menu_items('header') as $link): ?>
					<li class="<?= $link->getBemClasses('nav__item'); ?>">
						<a href="<?= $link->url; ?>" class="nav__link"><?= $link->label; ?></a>
						<?php if($link->hasSubItems()): ?>
						<ul class="nav__subitems">
								<?php foreach($link->subitems as $sub): ?>
								<li class="<?= $link->getBemClasses('nav__subitem'); ?>">
									<a href="<?= $sub->url; ?>" class="nav__link"><?= $sub->label; ?></a>
								</li>
								<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</header>
		<div class="overlay overlay--light"></div>