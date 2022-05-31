<a href="<?= get_the_permalink(); ?>" class="question__wrapper">
	<article class="question-big">
		<div class="question__card card">
			<?php if(get_field('image')): ?>
				<figure class="card__fig">
					<!-- // TODO: use this like get_the_post_thumbnail -->
					<img src="<?= get_field('image'); ?>" alt="">
				</figure>
			<?php endif; ?>
			<h3 class="card__title"><?= get_the_title(); ?></h3>
			<p class="card__answer"><?= get_the_content(); ?></p>
		</div>
	</article>
</a>