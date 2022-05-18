<?php get_header(); ?>

<main class="layout">
	<section class="layout__intro">
		<h2 class="layout__title">
			<?= __('Portfolio', 'pfl'); ?>
		</h2>
		<section class="layout__projects projects">
			<h2 class="projects__title"><?= __('My latest works', 'pfl'); ?></h2>
			<div class="projects__container">
				<?php 
				if(($projects = pfl_get_projects(6))->have_posts()): while($projects->have_posts()): $projects->the_post();
					include(__DIR__ . '/partials/project-card.php');
				endwhile; else: ?>
					<p class="projects__empty"><?= __('I have no work on display yet.', 'pfl'); ?></p>
				<?php endif; ?>
			</div>
		</section>	
	</section>
</main>

<?php get_footer(); ?>