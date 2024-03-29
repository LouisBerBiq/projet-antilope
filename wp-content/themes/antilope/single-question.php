<?php $og_type = _('website', 'atl'); ?>
<?php $description = _('lorem ipsum', 'atl'); ?>
<?php get_header(null, ['description' => $description]); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<main class="layout singleProduct" id="main">
	<h2 class="singleProduct__title"><?= get_the_title(); ?></h2>
	<figure class="singleProduct__fig">
		<?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'singleProduct__thumb']); ?>
	</figure>
	<div class="singleProduct__content">
		<?php the_content(); ?>
	</div>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>