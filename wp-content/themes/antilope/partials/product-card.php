<a href="<?= get_the_permalink(); ?>" class="product__wrapper fadeable">
	<style>
		#<?= strtolower(get_the_title())?> {
			background-color: <?= get_field('color')?>;
		}
		#<?= strtolower(get_the_title())?>:hover {
			box-shadow: 1.5px 15px 30px <?= get_field('color') . '33'?>;
		}
	</style>
	<article class="product" id="<?= strtolower(get_the_title()) ?>">
		<figure class="product__fig">
			<?php if(has_post_thumbnail()): ?>
				<?= get_the_post_thumbnail(null, '', ['class' => 'fig__thumb']); ?>
			<?php else: ?>
				<img src="<?= wp_get_attachment_image_src(105, '')[0] ?>" class="fig__thumb" alt="<?= get_post_meta(105, '_wp_attachment_image_alt', true); ?>" loading="lazy">
			<?php endif; ?>
		</figure>
		<div class="product__description">
			<h3 class="description__title"><?= get_the_title(); ?></h3>
			<p class="description__excerpt"><?= get_field('type') ?></p>
		</div>
	</article>
</a>