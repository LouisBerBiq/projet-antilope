<?php /* Template Name: About page template */ ?>
<?php $og_type = _('website', 'atl'); ?>
<?php $description = _('lorem ipsum', 'atl'); ?>
<?php get_header(null, ['description' => $description]); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<main class="layout about">
		<h2 class="about__title"><?= get_the_title(); ?></h2>
		<div class="about__content">
			<?= get_the_content(); ?>
		</div>
	</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>