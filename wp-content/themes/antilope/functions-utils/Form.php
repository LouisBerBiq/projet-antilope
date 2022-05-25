<?php

// Form system totally not entirely taken from class

register_post_type('message', [
	'labels' => [
		'name' => 'Messages',
		'singular_name' => 'Message',
	],
	'description' => 'Les messages envoyés via le formulaire de contact se retrouvent ici.',
	'public' => false,
	'show_ui' => true,
	'menu_position' => 10,
	'menu_icon' => 'dashicons-buddicons-pm',
	'capabilities' => [
		'create_posts' => false,
	],
	'map_meta_cap' => true,
]);

function atl_handle_submit_contact_form()
{

	// check nonces for CSRF
	if(! atl_verify_contact_form_nonce()) {
		// TODO : redirect to unauthorized page
		return;
	}

	// sanitize data passed
	$data = atl_sanitize_contact_form_data();

	// validate form fields and return its errors to the client
	if($errors = atl_validate_contact_form_data($data)) {
		$_SESSION['feedback_contact_form'] = [
			'success' => false,
			'data' => $data,
			'errors' => $errors,
		];

		return wp_redirect($_POST['_wp_http_referer']);
	}

	   // Store message in database
		$id = wp_insert_post([
			'post_type' => 'message',
			'post_title' => 'Message de ' . $data['firstname'] . ' ' . $data['lastname'],
			'post_content' => $data['message'],
			'post_status' => 'publish',
		]);

	// build and send mail
	$emailObject = 'Nouveau message sur Projet Antilope';
	$emailContent = 'Nouveau message envoyé de la part de ' . $data['firstname'] . ' ' . $data['lastname'] . ' depuis le formulaire<br><br>' . get_edit_post_link($id);

	wp_mail(get_bloginfo('admin_email'), $emailObject, $emailContent);

	// nothing went wrong, tell the client everything is good
	$_SESSION['feedback_contact_form'] = [
		'success' => true,
	];

	return wp_redirect(get_home_url());
}

//functions for form handling
function atl_verify_contact_form_nonce()
{
	$nonce = $_POST['_wpnonce'];

	return wp_verify_nonce($nonce, 'nonce_check_contact_form');
}

function atl_sanitize_contact_form_data()
{
	return [
		'firstname' => sanitize_text_field($_POST['firstname'] ?? null),
		'lastname' => sanitize_text_field($_POST['lastname'] ?? null),
		'email' => sanitize_email($_POST['email'] ?? null),
		'phone' => sanitize_text_field($_POST['phone'] ?? null),
		'message' => sanitize_text_field($_POST['message'] ?? null),
		'rules' => $_POST['rules'] ?? null
	];
}

function atl_validate_contact_form_data($data)
{
	$errors = [];

	$required = ['firstname', 'lastname', 'email', 'message'];
	$email = ['email'];
	$accepted = ['rules'];

	foreach($data as $key => $value) {
		if(in_array($key, $required) && ! $value) {
			$errors[$key] = 'required';
			continue;
		}

		if(in_array($key, $email) && ! filter_var($value, FILTER_VALIDATE_EMAIL)) {
			$errors[$key] = 'email';
			continue;
		}

		if(in_array($key, $accepted) && $value !== '1') {
			$errors[$key] = 'accepted';
			continue;
		}
	}

	return $errors ?: false;
}

// functions for returning messages to erroneous form
function atl_get_contact_field_value($field)
{
	if(! isset($_SESSION['feedback_contact_form'])) {
		return '';
	}

	return $_SESSION['feedback_contact_form']['data'][$field] ?? '';
}

function atl_get_contact_field_error($field)
{
	if(! isset($_SESSION['feedback_contact_form'])) {
		return '';
	}

	if(! isset($_SESSION['feedback_contact_form']['errors'][$field])) {
		return '';
	}

	return '<p class="form__error">' . __('Problèmes : ', 'atl') . $_SESSION['feedback_contact_form']['errors'][$field] . '</p>';
}
