<?php get_header(); ?>
	<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<main class="layout singleProduct">
		<h2 class="singleProduct__title"><?= get_the_title(); ?></h2>
		<figure class="singleProduct__fig">
			<?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'singleProduct__thumb']); ?>
		</figure>
		<div class="singleProduct__content">
			<?php the_content(); ?>
		</div>
		<aside class="singleProduct__details">
			<h3 class="singleProduct__subtitle"><?= __('Spécifications','atl'); ?></h3>
			<dl class="singleProduct__definitions">
				<dt class="singleProduct__label"><?= __('prix','atl'); ?></dt>
				<dd class="singleProduct__data">
					<?php if(get_field('price')): ?>
						<?= get_field('price') ?>€
					<?php else: ?>
						<span class="singleProduct__empty"><?= __('Aucun prix n\'a été décidé pour le moment.','atl'); ?></span>
					<?php endif; ?>
				</dd>
				<dt class="singleProduct__label"><?= __('specs','atl'); ?></dt>
				<dd class="singleProduct__data">
					<?=get_field('specifications'); ; ?>
					<h4><?= __('Polluants mesurés', 'atl') ?></h4>
					<ul class="singleProduct__data list">
						<?php foreach(explode(PHP_EOL, get_field('measured_pollutants')) as $captured): ?>
							<li class="list item">
								<?= $captured ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<h4><?= __('Capteur environnemental', 'atl') ?></h4>
					<ul class="singleProduct__data list">
						<?php foreach(explode(PHP_EOL, get_field('captured')) as $captured): ?>
							<li class="list item">
								<?= $captured ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<h4><?= __('Fréquence de mesure', 'atl') ?></h4>
					<?= get_field('frequency') ?> secondes
				</dd>
			</dl>
		</aside>
	</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>