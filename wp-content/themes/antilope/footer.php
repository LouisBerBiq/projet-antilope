<footer class="footer">
	<section class="footer__text">
		<nav class="footer__nav nav">
			<button class="button">button</button>
			<ul class="nav__container">
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
			<div class="nav__languages">
				<?php foreach(pll_the_languages(['raw' => true]) as $code => $locale) : ?>
					<a href="<?= $locale['url']; ?>" 
						class="nav__locale" 
						title="<?= $locale['name']; ?>" 
						lang="<?= $locale['locale']; ?>" 
						hreflang="<?= $locale['locale']; ?>">
						<?= $code; ?>
					</a>
				<?php endforeach; ?>
			</div>
		</nav>
	</section>
</footer>
</body>
</html>