<?php get_header(); ?>
<main class="layout">
	<section class="layout__products products">
		<h2 class="products__title"><?= __('Tous nos modules', 'atl'); ?></h2>
		// TODO: filters?
		<div class="products__container">
			<?php 
			if(have_posts()): while(have_posts()): the_post();
					include(__DIR__ . '/partials/product-card.php');
			endwhile; else: ?>
			<p class="products__empty"><?= __('Nous n\'avons pas de modules disponibles pour le moment', 'atl'); ?></p>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>