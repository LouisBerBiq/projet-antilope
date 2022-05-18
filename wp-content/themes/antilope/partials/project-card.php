<a href="<?= get_the_permalink(); ?>" class="project__wrapper">
	<article class="project">
		<div class="project__card">
			<figure class="project__fig">
				<?= get_the_post_thumbnail(null, 'medium', ['class' => 'project__thumb']); ?>
			</figure>
			<h3 class="project__title"><?= get_the_title(); ?></h3>
			<p class="project__date"><time class="project__time" datetime="<?= date('c', strtotime(get_field('working_date', false, false))); ?>">
				<?= ucfirst(date_i18n('F Y', strtotime(get_field('working_date', false, false)))); ?>
			<p class="project__excerpt"><?= get_the_excerpt(); ?></p>
			</time></p>
		</div>
	</article>
</a>