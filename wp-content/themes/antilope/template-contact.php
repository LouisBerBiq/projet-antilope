<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<main class="contact">
		<h2 class="contact__title"><?= get_the_title(); ?></h2>
		<p class="contact__tagline"><?= __('Envoyez-nous un mail&nbsp;!', 'atl') ?></p>
		<div class="contact__form">
			<!-- // in case I attempt to reinvent the wheel: https://stackoverflow.com/questions/43815499/how-to-show-form-input-fields-based-on-select-value-in-html-javascript  -->
			<!-- // TODO: JS: switch displayed form (with <buttons>) -->
			<!-- // TODO: choose wether to make a different form for each personality or show/hide fields  -->

			<!-- // KIND OF FORMS I NEED: references -->
			<!-- // TODO: make contact form change default option in select depending on where user comes from (?form=student) -->
			<?php if(! isset($_SESSION['feedback_contact_form']) || ! $_SESSION['feedback_contact_form']['success']) : ?>
				<!-- // apparently it is discouraged by wordpress to use $_GET and instead use get_query_var() and add the variable to the global $wp object with add_query_var() but this variable is only use on this specific page so... (https://stackoverflow.com/questions/13652605/extracting-a-parameter-from-a-url-in-wordpress) -->
				<!-- <?php if(isset($_GET['persona'])): ?>
					<?= var_dump($_GET['persona']); ?>
				<?php else: ?>
					<?= 'no persona' ?>
				<?php endif; ?>
				<?php if(isset($_GET['pretext'])): ?>
					<?= var_dump($_GET['pretext']); ?>
				<?php else: ?>
					<?= 'no pretext' ?>
				<?php endif; ?> -->
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
					<?php if(isset($_SESSION['feedback_contact_form']) && ! $_SESSION['feedback_contact_form']['success']) : ?>
						<p class="form__errors"><?= __('Oups ! Ce formulaire contient des erreurs, merci de les corriger.', 'atl'); ?></p>
					<?php endif; ?>
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
						<textarea name="message" id="message" cols="30" rows="10" class="field__input"><?= atl_get_contact_field_value('message'); ?></textarea>
						<?= atl_get_contact_field_error('message'); ?>
					</div>
					<div class="form__field">
						<label for="rules" class="field__checkbox">
							<input type="checkbox" name="rules" id="rules" class="field__checker" value="1">
							<span class="field__checklabel"><?= str_replace(
								':conditions', 
								'<a href="' . get_privacy_policy_url() . '" class="field__link">' . __('conditions générales d’utilisation','atl') . '</a>',
								__('J’ai lu et j’accepte les :conditions.', 'atl')
							); ?></span>
						</label>
						<?= atl_get_contact_field_error('rules'); ?>
					</div>
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