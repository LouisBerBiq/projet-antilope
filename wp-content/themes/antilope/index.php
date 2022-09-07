<?php $og_type = _('website', 'atl'); ?>
<?php $description = _('Nous faisons des modules portables économes capables de mesurer la qualité de l’air environnant.', 'atl'); ?>
<?php get_header(null, ['description' => $description]); ?>

<main class="layout intro" id="main">
	<section class="intro__welcome">
		<div class="intro__video-wrapper video-wrapper fadeable">
			<video class="video-wrapper__video" poster="<?= atl_mix('/images/thumbnail1.webp') ?>" playsinline autoplay muted loop>
				<!-- <source type="video/webm" src="<?= atl_mix('/videos/hero.webm') ?>"> -->
				<!-- <source type="video/mp4" src="<?= atl_mix('/videos/hero.mp4') ?>"> -->
			</video>
		</div>
		<h2 class="intro__title fadeable">
			<?= __('<span class="special">Le Projet Antilope</span> fait des appareils pour aider l’environement. <br>Et rendre la vie meilleure', 'atl'); ?>
		</h2>
		<p class="intro__tagline fadeable"><?= __('tagline', 'atl') ?></p>
		<div class="intro__buttons-wrapper fadeable">
			<a href="<?= get_post_type_archive_link('product'); ?>" class="intro__button"><?= __('Voir tous nos modules', 'atl'); ?></a>
		</div>
		<div class="intro__scroll-down fadeable-inverted">
			<?= __('Scrollez pour en savoir plus&nbsp;!', 'atl'); ?>
		</div>
	</section>
	<section class="intro__bullet-point bullet-point__what fadeable">
		<div class="bullet-point__text-wrapper">
			<h2 class="bullet-point__title">
				<?= __('Qu’est-ce que c’est?', 'atl'); ?>
			</h2>
			<p class="bullet-point__tagline">
			<?= __('Il s’agit d’un module portable de mesure de la qualité de l’air. Ce module a pour vocation d’être porté par un piéton ou un cycliste et mesurera en temps réel les différents polluants (NO, NO2, O3, particule fines…) présents dans l’air environnant. Le but est de créer une carte des concentrations en polluants.', 'atl') ?>
			</p>
			<a href="<?= get_post_type_archive_link('question'); ?>" class="bullet-point__button"><?= __('D’autres questions&nbsp;?', 'atl') ?></a>
		</div>
		<img src="<?= atl_mix('/images/what.webp') ?>" class="bullet-point__img" alt="">
	</section>
	<section class="intro__bullet-point bullet-point__why fadeable">
		<div class="bullet-point__text-wrapper">
			<h2 class="bullet-point__title">
				<?= __('Pourquoi est-ce important?', 'atl'); ?>
			</h2>
			<p class="bullet-point__tagline">
				<?= __('L’air joue un rôle primordial pour la vie telle que nous la connaissons sur terre. Une mauvaise qualité de l’air a une incidence négative sur la santé humaine et sur l’environnement au sens large.<br>Ses conséquences sont non seulement de nature sanitaire, écologique et économique mais aussi du point de vue humain: disposer d’un air de qualité et sain doit être un droit fondamental.', 'atl') ?>
			</p>
			<a href="<?= get_post_type_archive_link('question'); ?>" class="bullet-point__button"><?= __('Nous avons une collection d’articles à ce sujet', 'atl') ?></a>
		</div>
		<img src="<?= atl_mix('/images/why.webp') ?>" class="bullet-point__img" alt="">
	</section>
</main>
<?php if(isset($_SESSION['feedback_contact_form']) && $_SESSION['feedback_contact_form']['success']): ?>
	<div class="form__feedback form__feedback--success">
		<?= __('Merci de votre message&nbsp;!<br>à bientôt&nbsp;!', 'atl'); ?>
	</div>
	<?php unset($_SESSION['feedback_contact_form']); ?>
<?php endif; ?>

<?php get_footer(); ?>