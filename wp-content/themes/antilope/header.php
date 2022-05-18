<!DOCTYPE html>
<html lang="<?= pll_current_language('slug'); ?>">
	<head>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>
			// TODO: since posts are removed, do something about the index
			Portfolio - <?php if(have_posts()): while(have_posts()): the_post(); ?> <?= get_the_title(); ?> <?php endwhile; endif; ?>
		</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<h1 class="header__title"><?= get_bloginfo('name') ?></h1>
		<p class="header__tagline"><?php get_bloginfo('description') ?></p>
		<nav class="header__nav nav">
			<h2 clas="nav__title">Nav
				<p class="nav__desc">TODO.</p>
			</h2>
		</nav>