<?php get_header(); ?>
<main class="layout">
	<section class="layout__questions questions">
		<h2 class="questions__title"><?= __('Tous nos modules', 'atl'); ?></h2>
		<form method="get" action="<?= get_home_url(); ?>" class="header__search search" role="search">
			<div class="search__container">
				<label for="header_search" class="search__label"><?= __('rechercher une question?', 'atl'); ?></label>
				<input type="text" name="s" id="header_search" class="search__input" value="<?= get_search_query(); ?>" />
				<button type="submit" class="search__btn"><?= __('Rechercher', 'atl'); ?></button>
			</div>
		</form>
		<div class="questions__container">
			<?php 
			if(have_posts()): while(have_posts()): the_post();
				if(get_field('isMain')) {
					include(__DIR__ . '/partials/question-card.php');
				} else {
					include(__DIR__ . '/partials/question-line.php');
				}
			endwhile; else: ?>
				<p class="questions__empty"><?= __('La FAQ est vide…', 'atl'); ?></p>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>