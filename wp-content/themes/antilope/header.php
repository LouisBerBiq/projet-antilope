<!DOCTYPE html>
<html lang="<?= pll_current_language('slug'); ?>">
	<head>
		<meta name="description" content="<?= get_bloginfo('description') ?>">
		<meta name="keywords" content="<?= __( 'mesure, pollution, qualité de l’air, système embarqué, capteurs', 'alt' ) ?>">
		<meta name="author" content="">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>
			<?= wp_title('-', true, 'right') . get_bloginfo('name') ?>
		</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body>
		<h1 class="header__title"><?= get_bloginfo('name') ?></h1>
		<p class="header__tagline"><?php get_bloginfo('description') ?></p>
		<nav class="header__nav nav">
			<h2 clas="nav__title"><?= __('Navigation principale','atl') ?></h2>
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