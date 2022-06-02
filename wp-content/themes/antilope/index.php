<?php get_header(); ?>

<main class="layout" id="main">
	<section class="layout__intro intro">
		<div class="intro__video-wrapper video-wrapper">
			<video class="video-wrapper__video" poster="<?= atl_mix('/images/thumbnail1.webp') ?>" playsinline autoplay muted loop>
				<!-- <source type="video/webm" src="<?= atl_mix('/videos/hero.webm') ?>"> -->
				<!-- <source type="video/mp4" src="<?= atl_mix('/videos/hero.mp4') ?>"> -->
			</video>
		</div>
		<h2 class="intro__title">
			<?= str_replace( ':project', get_bloginfo('name'), __('Bienvenue <br>sur le site du <br> :project&nbsp;!', 'atl')); ?>
		</h2>
		<p class="intro__tagline"><?= __('Nous faisons des appareils pour aider l\'environement. <br>Et rendre la vie meilleure', 'atl') ?></p>
		<div class="intro__button-wrapper">
			<a href="<?= get_post_type_archive_link('product'); ?>" class="intro__button"><?= __('Voir tous nos modules', 'atl'); ?></a>
			<a href="<?= get_post_type_archive_link('question'); ?>" class="intro__button">?</a>
		</div>
	</section>
	<section class="layout__products products">
		<h2 class="products__title"><?= __('Nos derniers modules', 'atl'); ?></h2>
		<div class="products__container">
			<?php 
			if(($products = atl_get_products(1))->have_posts()): while($products->have_posts()): $products->the_post();
				include(__DIR__ . '/partials/product-card.php');
			endwhile; else: ?>
				<p class="products__empty"><?= __('Nous n\'avons pas de modules à afficher pour le moment', 'atl'); ?></p>
			<?php endif; ?>
		</div>
	</section>
</main>
<div class="form__feedback">
	<?php if(isset($_SESSION['feedback_contact_form']) && $_SESSION['feedback_contact_form']['success']): ?>
		<p class="form__feedback sucess">
			<?= __('Merci <br> de votre message&nbsp;!<br>à bientôt&nbsp;!', 'atl'); ?>
		</p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>