<?php $og_type = _('website', 'atl'); ?>
<?php $description = _('', 'atl'); ?>
<?php get_header(); ?>

<main class="layout">
	<section class="results">
		<h2 class="results__title"><?= __('Les questions correspondantes à votre recherche&nbsp;:','atl'); ?></h2>
		<div class="results__container">
		<?php 
		if(($trips = atl_get_questions(10, get_search_query()))->have_posts()): while($trips->have_posts()): $trips->the_post();
			include(__DIR__ . '/partials/question-collapsible.php');
		endwhile; else: ?>
			<p class="results__empty"><?= __('Votre recherche n’a abouti à rien 🙁.','atl'); ?></p>
		<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>