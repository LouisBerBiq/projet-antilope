<footer class="footer">
	<section class="footer__text">
		<nav class="footer__nav nav">
			<section class="nav__container nav__container--social-media">
				<h2 class="nav__title">
					<?= __('Suivez-nous sur les <br>réseaux sociaux', 'atl') ?>
				</h2>
				<ul class="nav__social-media social-media">
					<li class="social-media__item"><a href="facebook.com/antilope"><img src="<?= atl_mix('/images/facebook.svg') ?>" alt="Facebook"></a></li>
					<li class="social-media__item"><a href="instagram.com/antilope"><img src="<?= atl_mix('/images/instagram.svg') ?>" alt="Instagram"></a></li>
					<li class="social-media__item"><a href="twitter.com/antilope"><img src="<?= atl_mix('/images/twitter.svg') ?>" alt="Twitter"></a></li>
				</ul>
			</section>
			<section class="nav__container nav__separator">
				<?= __('OU', 'atl') ?>
			</section>
			<section class="nav__container nav__container--contact">
				<h2 class="nav__title">
					<?= __('Envoyez-nous un message', 'atl') ?>
				</h2>
				<a href="<?= get_permalink(atl_get_page_of_template('template-contact')) ?>" class="nav__button">
					<?= __('Contact', 'atl'); ?>
				</a>
			</section>
			<section class="nav__container nav__container--about">
				<h2 class="nav__title">
					<?= __('À propos de nous','atl') ?>
				</h2>
				<p class="nav__paragraph">
					<?= __('In quibus doctissimi illi veteres inesse quiddam caeleste et divinum putaverunt. Qualem igitur hominem natura inchoavit.','atl') ?>
				</p>
				<a href="<?= get_permalink(atl_get_page_of_template('template-about')) ?>" class="nav__button">
				<?= __('Lire plus', 'atl'); ?>
				</a>
			</section>
			<section class="nav__container nav__container--pages">
				<ul class="nav__pages">
					<?php foreach(atl_get_menu_items('footer') as $link): ?>
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
			</section>
		</nav>
		<div class="footer__copyright">
			© 2022 - Antilope
		</div>
	</section>
</footer>
</body>
</html>