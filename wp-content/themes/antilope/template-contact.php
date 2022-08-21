<?php /* Template Name: Contact page template */ ?>
<?php $og_type = _('website', 'atl'); ?>
<?php $description = _('', 'atl'); ?>
<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<main class="contact" id="main">
		<h2 class="contact__title"><?= get_the_title(); ?></h2>
		<p class="contact__tagline"><?= __('Envoyez-nous un mail&nbsp;!', 'atl') ?></p>
		<div class="contact__form">
			<?php if(! isset($_SESSION['feedback_contact_form']) || ! $_SESSION['feedback_contact_form']['success']) : ?>
				<form action="<?= get_home_url(); ?>/wp-admin/admin-post.php" method="POST" class="contact__form form">
					<div class="form__personality">
						<select name="personality" id="personality" class="personality__select" multiple required>
							<option value="municipality">Commune</option>
							<option value="researcher">Chercheur</option>
							<option value="student">Étudiant</option>
							<option value="other">Autre</option>
						</select>
						<?= atl_get_contact_field_error('personality'); ?>
					</div>
					<div class="form--two-column">
						<div class="form__field">
							<label for="lastname" class="field__label"><?= __('Votre nom', 'atl'); ?></label>
							<input type="text" name="lastname" id="lastname" class="field__input" value="<?= atl_get_contact_field_value('lastname'); ?>" />
							<?= atl_get_contact_field_error('lastname'); ?>
						</div>
						<div class="form__field">
							<label for="firstname" class="field__label"><?= __('Votre prénom', 'atl'); ?></label>
							<input type="text" name="firstname" id="firstname" class="field__input" value="<?= atl_get_contact_field_value('firstname'); ?>" />
							<?= atl_get_contact_field_error('firstname'); ?>
						</div>
					</div>
					<div class="form__field">
						<label for="email" class="field__label"><?= __('Votre adresse e-mail', 'atl'); ?></label>
						<input type="email" name="email" id="email" class="field__input" value="<?= atl_get_contact_field_value('email'); ?>" />
						<?= atl_get_contact_field_error('email'); ?>
					</div>
					<div class="form__field">
						<label for="message" class="field__label"><?= __('Votre message', 'atl'); ?></label>
						<textarea name="message" id="message" class="field__input"><?= atl_message_content(atl_get_contact_field_value('message'), isset($_GET['module']) ? $_GET['module'] : false) ?></textarea>
						<?= atl_get_contact_field_error('message'); ?>
					</div>
					<div class="form__field">
						<label for="rules" class="field__checkbox">
							<input type="checkbox" name="rules" id="rules" class="field__checker" value="1">
								<span class="field__checklabel"><?= str_replace(
								':CONDITIONS', 
								'<a href="' . get_privacy_policy_url() . '" class="field__link">' . __('conditions générales d’utilisation','atl') . '</a>',
								__('J’ai lu et j’accepte les :CONDITIONS.', 'atl')
							); ?></span>
						</label>
						<?= atl_get_contact_field_error('rules'); ?>
					</div>
					<?php if(isset($_SESSION['feedback_contact_form']) && ! $_SESSION['feedback_contact_form']['success']) : ?>
						<p class="form__errors"><?= __('Oups ! Ce formulaire contient des erreurs, merci de les corriger.', 'atl'); ?></p>
					<?php endif; ?>
					<div class="form__action">
						<input type="hidden" name="action" value="submit_contact_form" />
						<?php wp_nonce_field('nonce_check_contact_form'); ?>
						<button type="submit" class="action__button"><?= __('Envoyer&nbsp;!', 'atl'); ?></button>
					</div>
				</form>
			<?php endif; ?>
		</div>
	</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>