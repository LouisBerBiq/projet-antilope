<?php get_header(); ?>

<main class="lost" id="main">
	<h2 class="lost__title">
		<?= __('Oops…','atl'); ?>
	</h2>
	<p class="lost__paragraph">
		<?php
			$messages = [
				__('Il s’emblerait que vous ayez pris un mauvais chemin…','atl'),
				__('Il s’emblerait que vous vous êtes perdu…', 'atl'),
				__('heu… essayez de revenir en arrière.', 'atl'),
			];
		
			echo $messages[array_rand($messages, 1)];
		?>
		<!-- // TODO: propose to send a message about it and maybe some animation -->
	</p>
</main>

<?php get_footer(); ?>