<?php get_header(); ?>

<main class="layout">
	<section class="results">
		<h2 class="results__title"><?= __('Les question correspondant à votre recherche','atl'); ?></h2>
		<div class="results__container">
		<?php 
		if(($trips = atl_get_questions(10, get_search_query()))->have_posts()): while($trips->have_posts()): $trips->the_post();
			include(__DIR__ . '/partials/question-line.php');
		endwhile; else: ?>
			<!-- // TODO: make emoji -->
			<p class="results__empty"><?= __('Votre recherche n\'a abouti à rien &#1F641;.','atl'); ?></p>
		<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>