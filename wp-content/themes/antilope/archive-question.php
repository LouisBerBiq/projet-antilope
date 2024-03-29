<?php $og_type = _('website', 'atl'); ?>
<?php $description = _('lorem ipsum', 'atl'); ?>
<?php get_header(null, ['description' => $description]); ?>

<main class="faq" id="main">
	<h2 class="faq__title top__title fadeable"><?= __('FAQ', 'atl'); ?></h2>
	<p class="faq__tagline top__tagline fadeable"><?= __('Vous avez des questions&nbsp;?<br>En voici quelques unes couramment posées&nbsp;!', 'atl') ?></p>
	<form method="get" action="<?= get_home_url(); ?>" class="faq__search search fadeable" role="search">
		<div class="search__container">
			<label for="header_search" class="search__label"><?= __('Vous recherchez une question?', 'atl'); ?></label>
			<div class="search__input">
				<input type="text" name="s" id="header_search" class="input__field" value="<?= get_search_query(); ?>" />
				<button type="submit" class="input__button"><?= __('Rechercher', 'atl'); ?></button>
			</div>
		</div>
	</form>
	<div class="faq__questions fadeable">
		<?php 
			// TODO: fixup
			$mains = [];
			$notMains = [];

			if(have_posts()): while(have_posts()): the_post();

				if(get_field('isMain')) {
					$mains[] = get_post();
				} else {
					$notMains[] = get_post();
				}

			endwhile; wp_reset_postdata(); endif;
		?>
		<div class="questions__main">
			<?php if(count($mains) > 0) {
				foreach ($mains as $main) {
					include(__DIR__ . '/partials/question-card.php');
				}
			};?>
		</div>
		<div class="questions__collapsibles">
			<?php if(count($notMains) > 0) {
				foreach ($notMains as $notMain) {
					include(__DIR__ . '/partials/question-collapsible.php');
				} 
			};?>
		</div>
		<?php if(count($mains) == 0 && count($notMains) == 0): ?>
			<p class="questions__empty"><?= __('La FAQ est vide…', 'atl'); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>