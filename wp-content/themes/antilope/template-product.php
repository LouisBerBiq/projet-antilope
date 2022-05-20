<?php /* Template Name: Product page template */ ?>
<?php get_header(); ?>
<?php if(($products = atl_get_products(1))->have_posts()): while($products->have_posts()): $products->the_post(); ?>
	<main class="layout about">
		<h2 class="about__title"><?= get_the_title(); ?></h2>
		<div class="about__content">
			<?php the_content(); ?>
			<?php get_post_custom( int $post_id ) ?>
		</div>
	</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>