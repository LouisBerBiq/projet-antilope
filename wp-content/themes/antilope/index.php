<?php get_header(); ?>

<main class="layout">
	<section class="layout__intro">
		<h2 class="layout__title">
			<?= __('Portfolio', 'pfl'); ?>
		</h2>
		<section class="layout__products products">
			<h2 class="products__title"><?= __('My latest works', 'atl'); ?></h2>
			<div class="products__container">
				<?php 
				if(($products = atl_get_products(6))->have_posts()): while($products->have_posts()): $products->the_post();
					include(__DIR__ . '/partials/product-card.php');
				endwhile; else: ?>
					<p class="products__empty"><?= __('I have no work on display yet.', 'atl'); ?></p>
				<?php endif; ?>
			</div>
		</section>	
	</section>
</main>

<?php get_footer(); ?>