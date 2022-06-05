<?php get_header(); ?>
	<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<main class="layout singleProduct" id="main">
		<aside class="singleProduct__images">
			<ul class="images__list">
				<?php foreach( atl_get_product_details() as $image ): ?>
					<li class="list__item">
						<figure class="images__fig">
							<img class="images__img" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
						</figure>
					</li>
				<?php endforeach; ?>
			</ul>
		</aside>
		<section class="singleProduct__description">
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
					<dt class="details__label"><?= __('Polluants mesurés','atl'); ?></dt>
					<dd class="details__data">
						<ul class="details__data list">
						<?php if(get_field('measured_pollutants')): ?>
							<?php foreach( get_field('measured_pollutants') as $pollutant ): ?>
								<li class="list__item">
									<?= $pollutant ?>
								</li>
							<?php endforeach; ?>
						<?php else: ?>
							<span class="details__empty"><?= __('Ce module ne mesure aucun polluant','atl'); ?></span>
						<?php endif; ?>
						</ul>
					</dd>
					<dt class="details__label"><?= __('Capteur environnemental','atl'); ?></dt>
					<dd class="details__data">
						<ul class="details__data list">
						<?php if(get_field('captured')): ?>
							<?php foreach( get_field('captured') as $captured ): ?>
								<li class="list__item">
									<?= $captured ?>
								</li>
							<?php endforeach; ?>
						<?php else: ?>
							<span class="details__empty"><?= __('Ce module n\'a pas de capteur environemental','atl'); ?></span>
						<?php endif; ?>
						</ul>
					</dd>
					<dt class="details__label"><?= __('Fréquence de mesure','atl'); ?></dt>
					<dd class="details__data">
						<ul class="details__data list">
						<?php if(get_field('frequency')): ?>
							<?= get_field('frequency') ?> secondes
						<?php else: ?>
							<span class="details__empty"><?= __('Ce module ne mesure rien','atl'); ?></span>
						<?php endif; ?>
						</ul>
					</dd>
				</dl>
			</section>
		</section>
		<!-- // TODO: band of other modules -->
	</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>