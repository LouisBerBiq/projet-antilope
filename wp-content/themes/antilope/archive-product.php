<?php $og_type = __('website', 'atl'); ?>
<?php $modules = []; ?>
<?php if(have_posts()): while(have_posts()): the_post();
	$modules[] = get_the_title();
endwhile; endif;?>
<?php $description = __('Tous nos modules; ' . implode(', ', $modules) . '.', 'atl'); ?>
<?php get_header(null, ['description' => $description]); ?>

<main class="products" id="main">
	<section class="products__section">
		<h2 class="products__title top__title fadeable"><?= __('Tous nos modules', 'atl'); ?></h2>
		<p class="products__tagline top__tagline fadeable"><?=
			str_replace(
				':AMOUNT', 
				wp_count_posts('product')->publish, // possible enhancement, translate to full word
				__('Tous nos :AMOUNT modules.', 'atl')
			);?>
		</p>
		<!-- // TODO: filters? -->
		<div class="products__container">
		<?php rewind_posts(); ?>
		<?php if(have_posts()): while(have_posts()): the_post();
			include(THEME_PATH . '/partials/product-card.php');
		endwhile; else: ?>
			<p class="products__empty"><?= __('Nous n’avons pas de modules disponibles pour le moment', 'atl'); ?></p>
		<?php endif; ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>