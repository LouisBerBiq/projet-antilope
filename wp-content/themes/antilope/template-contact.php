<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<main class="layout contact">
		<h2 class="contact__title"><?= get_the_title(); ?></h2>
		<div class="contact__form">
			// TODO: JS: switch displayed form
			// TODO: make contact form form change depending on where user comes from (?form=student)
			<?php if(! isset($_SESSION['feedback_contact_form']) || ! $_SESSION['feedback_contact_form']['success']) : ?>
				<form action="<?= get_home_url(); ?>/wp-admin/admin-post.php" method="POST" class="contact__form form">
					<?php if(isset($_SESSION['feedback_contact_form']) && ! $_SESSION['feedback_contact_form']['success']) : ?>
							<p class="form__errors"><?= __('Oups ! Ce formulaire contient des erreurs, merci de les corriger.', 'atl'); ?></p>
					<?php endif; ?>
					<div class="form__field">
							<label for="lastname" class="form__label"><?= __('Votre nom', 'atl'); ?></label>
							<input type="text" name="lastname" id="lastname" class="form__input" value="<?= atl_get_contact_field_value('lastname'); ?>" />
							<?= atl_get_contact_field_error('lastname'); ?>
					</div>
					<div class="form__field">
							<label for="firstname" class="form__label"><?= __('Votre prénom', 'atl'); ?></label>
							<input type="text" name="firstname" id="firstname" class="form__input" value="<?= atl_get_contact_field_value('firstname'); ?>" />
							<?= atl_get_contact_field_error('firstname'); ?>
					</div>
					<div class="form__field">
							<label for="email" class="form__label"><?= __('Votre adresse e-mail', 'atl'); ?></label>
							<input type="email" name="email" id="email" class="form__input" value="<?= atl_get_contact_field_value('email'); ?>" />
							<?= atl_get_contact_field_error('email'); ?>
					</div>
					<div class="form__field">
							<label for="message" class="form__label"><?= __('Votre message', 'atl'); ?></label>
							<textarea name="message" id="message" cols="30" rows="10" class="form__input"><?= atl_get_contact_field_value('message'); ?></textarea>
							<?= atl_get_contact_field_error('message'); ?>
					</div>
					<div class="form__field">
							<label for="rules" class="form__checkbox">
								<input type="checkbox" name="rules" id="rules" class="form__checker" value="1">
								<span class="form__checklabel"><?= str_replace(
									':conditions', // TODO: find better way to link to pages
									'<a href="' . get_home_url() . '/privacy-policy' . '">' . __('conditions générales d’utilisation','atl') . '</a>',
									__('J’ai lu et j’accepte les :conditions.', 'atl')
								); ?></span>
							</label>
							<?= atl_get_contact_field_error('rules'); ?>
					</div>
					<div class="form__actions">
							<input type="hidden" name="action" value="submit_contact_form" />
							<?php wp_nonce_field('nonce_check_contact_form'); ?>
							<button type="submit" class="form__button"><?= __('Envoyer', 'atl'); ?></button>
					</div>
				</form>
			<?php else : ?>
				<p class="form__feedback"><?= __('Merci de nous avoir contacté, à bientôt !', 'atl'); ?></p>
			<?php endif; ?>
		</div>
	</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>