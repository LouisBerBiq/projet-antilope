<?php get_header(); ?>

<main class="layout intro" id="main">
	<section class="intro__section intro__welcome">
		<div class="intro__video-wrapper video-wrapper">
			<video class="video-wrapper__video" poster="<?= atl_mix('/images/thumbnail1.webp') ?>" playsinline autoplay muted loop>
				<!-- <source type="video/webm" src="<?= atl_mix('/videos/hero.webm') ?>"> -->
				<!-- <source type="video/mp4" src="<?= atl_mix('/videos/hero.mp4') ?>"> -->
			</video>
		</div>
		<h2 class="intro__title">
			<?= __('Bienvenue <br>sur le site du<br>projet <span class="title__special">Antilope</span>&nbsp;!', 'atl'); ?>
		</h2>
		<p class="intro__tagline"><?= __('Nous faisons des appareils pour aider l’environement. <br>Et rendre la vie meilleure', 'atl') ?></p>
		<div class="intro__button-wrapper">
			<a href="<?= get_post_type_archive_link('product'); ?>" class="intro__button"><?= __('Voir tous nos modules', 'atl'); ?></a>
			<a href="<?= get_post_type_archive_link('question'); ?>" class="intro__button">?</a>
		</div>
		<div class="intro__scroll-down">
			<?= __('Scrollez pour en savoir plus&nbsp;!', 'atl'); ?>
		</div>
	</section>
	<section class="intro__section intro__what fadeable--left">
		<h2 class="intro__title">
			<?= __('Qu’est-ce que c’est?', 'atl'); ?>
		</h2>
		<p class="intro__tagline">
		<?= __('Il s’agit d’un module portable de mesure de la qualité de l’air. Ce module a pour vocation d’être porté par un piéton ou un cycliste et mesurera en temps réel les différents polluants (NO, NO2, O3, particule fines…) présents dans l’air environnant. Le but est de créer une carte des concentrations en polluants.', 'atl') ?>
		</p>
	</section>
	<section class="intro__section intro__why fadeable--left">
		<h2 class="intro__title">
			<?= __('Pourquoi est-ce important?', 'atl'); ?>
		</h2>
		<p class="intro__tagline">
		<?= __('L’air joue un rôle primordial pour la vie telle que nous la connaissons sur terre. Une mauvaise qualité de l’air a une incidence négative sur la santé humaine et sur l’environnement au sens large.<br>Ses conséquences sont non seulement de nature sanitaire, écologique et économique mais aussi du point de vue humain: disposer d’un air de qualité et sain doit être un droit fondamental.', 'atl') ?>
		</p>
	</section>
</main>
<?php if(isset($_SESSION['feedback_contact_form']) && $_SESSION['feedback_contact_form']['success']): ?>
	<div class="form__feedback form__feedback--success">
		<?= __('Merci de votre message&nbsp;!<br>à bientôt&nbsp;!', 'atl'); ?>
	</div>
	<?php unset($_SESSION['feedback_contact_form']); ?>
<?php endif; ?>

<?php get_footer(); ?>