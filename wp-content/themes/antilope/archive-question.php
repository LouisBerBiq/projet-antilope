<?php get_header(); ?>

<main class="faq" id="main">
	<h2 class="faq__title"><?= __('F.A.Q', 'atl'); ?></h2>
	<p class="faq__tagline"><?= __('Vous avez des questions?<br>En-Voici quelque unes courrament posées&nbsp;!', 'atl') ?></p>
	<form method="get" action="<?= get_home_url(); ?>" class="faq__search search" role="search">
		<div class="search__container">
			<label for="header_search" class="search__label"><?= __('rechercher une question?', 'atl'); ?></label>
			<div class="search__input">
				<input type="text" name="s" id="header_search" class="input__field" value="<?= get_search_query(); ?>" />
				<button type="submit" class="input__button"><?= __('Rechercher', 'atl'); ?></button>
			</div>
		</div>
	</form>
	<div class="faq__questions">
		// TODO: ask Toon
		<?php query_posts($query_string . '&isMain=true&order=ASC'); ?>
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<div class="questions__main">
			<?php if(get_field('isMain')): include(__DIR__ . '/partials/question-card.php'); ?>
			</div>
			<div class="questions__collapsibles">
			<?php else: include(__DIR__ . '/partials/question-collapsible.php'); ?>	
			</div>
			<?php endif; ?>
		<?php endwhile; else: ?> ?>
			<p class="questions__empty"><?= __('La FAQ est vide…', 'atl'); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>