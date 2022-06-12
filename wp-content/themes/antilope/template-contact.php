<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<main class="contact" id="main">
		<h2 class="contact__title"><?= get_the_title(); ?></h2>
		<p class="contact__tagline"><?= __('Envoyez-nous un mail&nbsp;!', 'atl') ?></p>
		<div class="contact__form">
			<?php if(! isset($_SESSION['feedback_contact_form']) || ! $_SESSION['feedback_contact_form']['success']) : ?>
				<?php
				// apparently it is discouraged by wordpress to use $_GET and instead use get_query_var() and add the variable to the global $wp object with add_query_var() but this variable is only use on this specific page so... (https://stackoverflow.com/questions/13652605/extracting-a-parameter-from-a-url-in-wordpress)
				if (isset($_SERVER['HTTP_REFERER'])) {
					// Ideally one would use $_SESSION paired with AJAX to handle clicking on the button back there
					// TODO: use post title instead
					$referer = $_SERVER['HTTP_REFERER'];
					$siteUrl = get_site_url();
					
					// get the important part of the url
					$referer = trim(str_replace($siteUrl, '', $referer), '/');
					$arguments = explode('/', $referer);

					// what happens next
					switch ($arguments[0]) {
						case 'product':
							$preFilledText = $arguments[1];
							break;
							
							default:
							break;
					}
				}
				?>
				<form action="<?= get_home_url(); ?>/wp-admin/admin-post.php" method="POST" class="contact__form form">
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
						<!-- // TODO: also it's not sanitized -->
						<textarea name="message" id="message" class="field__input"><?= atl_get_contact_field_value('message'); ?><?= isset($preFilledText) ? atl_get_prefilled_message($preFilledText) : ''; ?></textarea>
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