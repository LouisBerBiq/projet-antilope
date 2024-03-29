<?php $og_type = _('website', 'atl'); ?>
<?php $description = _('lorem ipsum', 'atl'); ?>
<?php get_header(null, ['description' => $description]); ?>

<?php include(THEME_PATH . '/partials/accent-color-getter.php'); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<main class="layout singleProduct" id="main">
	<aside class="singleProduct__images">
		<ul class="images__list">
			<?php foreach( atl_get_product_details() as $image ): ?>
				<li class="list__item">
					<figure class="images__fig">
						<img class="fig__img" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
					</figure>
				</li>
			<?php endforeach; ?>
		</ul>
	</aside>
	<section class="singleProduct__description">
		<p class="singleProduct__tagline fadeable"><?= get_field('type') ?></p>
		<h2 class="singleProduct__title fadeable"><?= get_the_title(); ?></h2>
		<p class="singleProduct__sub-tagline__prepend fadeable">Parfait pour&nbsp;:
			<div class="singleProduct__sub-tagline"><?= get_field('perfect_for') ?></div>
		</p>
		<!-- <figure class="singleProduct__fig">
			<?= get_the_post_thumbnail(null, '', ['class' => 'fig__thumb']); ?> 
		</figure> -->
		<div class="singleProduct__content fadeable">
			<?php the_content(); ?>
		</div>
		<?php include 'product-cta.php'; ?>
		<section class="singleProduct__details fadeable">
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
						<span class="details__empty"><?= __('Ce module n’a pas de capteur environemental','atl'); ?></span>
					<?php endif; ?>
					</ul>
				</dd>
				<dt class="details__label"><?= __('Fréquence de mesure','atl'); ?></dt>
				<dd class="details__data">
					<p class="details__data list">
					<?php if(get_field('frequency')): ?>
						<?php if((int)get_field('frequency') == 1): ?>
							<?= str_replace(
								':FREQUENCY', 
								get_field('frequency'),
								__(':FREQUENCY seconde', 'atl')
							);?>
						<?php else: ?>
							<?= str_replace(
								':FREQUENCY', 
								get_field('frequency'),
								__(':FREQUENCY secondes', 'atl')
							);?>
						<?php endif; ?>
					<?php else: ?>
						<span class="details__empty"><?= __('Ce module ne mesure rien','atl'); ?></span>
					<?php endif; ?>
					</p>
				</dd>
				<?php if(get_field('specifications')): ?>
					<dt class="details__label details__label--extra"><?= __('Autres détails','atl'); ?></dt>
					<dd class="details__data">
						<p class="details__data paragraph">
							<?= get_field('specifications') ?>
						</p>
					</dd>
				<?php endif; ?>
			</dl>
		</section>
		<?php include 'product-cta.php'; ?>
	</section>
	<!-- // TODO: band of other modules -->
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>