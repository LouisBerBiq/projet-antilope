<?php get_header(); ?>
	<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<main class="layout singleProduct" id="main">
		<p class="singleProduct__tagline"><?= get_field('type') ?></p>
		<h2 class="singleProduct__title"><?= get_the_title(); ?></h2>
		<figure class="singleProduct__fig">
			<?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'singleProduct__thumb']); ?>
		</figure>
		<a class="singleProduct__cta" href="<?= get_permalink(atl_get_page_of_template('template-contact')); ?>"><?= __('Contactez-nous pour trouver un arrangement', 'atl'); ?></a>
		<div class="singleProduct__content">
			<?php the_content(); ?>
		</div>
		<section class="singleProduct__details">
			<h3 class="details__subtitle"><?= __('Spécifications','atl'); ?></h3>
			<dl class="details__definitions">
				<dt class="details__label"><?= __('prix','atl'); ?></dt>
				<dd class="details__data">
					<?php if(get_field('price')): ?>
						<?= get_field('price') ?>€
					<?php else: ?>
						<span class="details__empty"><?= __('Aucun prix n\'a été décidé pour le moment.','atl'); ?></span>
					<?php endif; ?>
				</dd>
				<dt class="details__label"><?= __('specs','atl'); ?></dt>
				<dd class="details__data">
					<?=get_field('specifications'); ; ?>
					<h4><?= __('Polluants mesurés', 'atl') ?></h4>
					<ul class="details__data list">
						<?php foreach( get_field('measured_pollutants') as $pollutant ): ?>
							<li class="list__item">
								<?= $pollutant ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<h4><?= __('Capteur environnemental', 'atl') ?></h4>
					<ul class="details__data list">
						<?php foreach( get_field('captured') as $captured ): ?>
							<li class="list__item">
								<?= $captured ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<h4><?= __('Fréquence de mesure', 'atl') ?></h4>
					<?= get_field('frequency') ?> secondes
				</dd>
			</dl>
		</section>
		<aside class="singleProduct__images">
			<ul class="images__list">
				<?php foreach( get_field('images') as $image ): ?>
					<li class="list__item">
						<?= $image ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</aside>
	</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>