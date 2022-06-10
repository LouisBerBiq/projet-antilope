<a href="<?= get_the_permalink(); ?>" class="product__wrapper fadeable--bottom">
	<article class="product" module="<?= strtolower(get_the_title()); ?>">
		<div class="product__card">
			<figure class="product__fig">
				<?= get_the_post_thumbnail(null, '', ['class' => 'fig__thumb']); ?>
			</figure>
			<div class="product__description">
				<h3 class="description__title"><?= get_the_title(); ?></h3>
				<!-- // TODO: possibly a read more -->
				<p class="description__excerpt"><?= get_the_excerpt(); ?></p>
			</div>
		</div>
	</article>
</a>