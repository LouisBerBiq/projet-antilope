<a href="<?= get_the_permalink(); ?>" class="product__wrapper">
	<article class="product">
		<div class="product__card">
			<figure class="product__fig">
				<?= get_the_post_thumbnail(null, 'medium', ['class' => 'product__thumb']); ?>
			</figure>
			<h3 class="product__title"><?= get_the_title(); ?></h3>
			<p class="product__date"><time class="product__time" datetime="<?= date('c', strtotime(get_field('working_date', false, false))); ?>">
				<?= ucfirst(date_i18n('F Y', strtotime(get_field('working_date', false, false)))); ?>
			<p class="product__excerpt"><?= get_the_excerpt(); ?></p>
			</time></p>
		</div>
	</article>
</a>