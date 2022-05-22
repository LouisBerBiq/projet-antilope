<?php

require_once(__DIR__ . '/menus/menu.php');

// register a custom post type for products
register_post_type( 'product', [
	'labels' => [
		'name' => 'Modules',
		'singular_name' => 'Module'
	],
	'description' => 'Gérer les modules',
	'public' => true,
	'has_archive' => true,
	'menu_position' => 5,
	'menu_icon' => 'dashicons-screenoptions',
	'supports' => ['title','editor','thumbnail','custom-fields'],
]);

// register a custom post type for FAQ questions
register_post_type( 'question', [
	'label' => 'FAQ',
	'description' => 'Gérer la FAQ',
	'public' => true,
	'has_archive' => true,
	'menu_position' => 15,
	'menu_icon' => 'dashicons-feedback',
	'supports' => ['title','editor','thumbnail','custom-fields'],
]);

// snatched and modified from https://www.wpbeginner.com/wp-tutorials/how-to-replace-enter-title-here-text-in-wordpress/
// changes Post title placeholder text
function atl_change_title_placeholder_text($title){
	switch (get_current_screen()->post_type) {
		case 'product':
			$title = 'Nom du module';
			break;
		case 'question':
			$title = 'La question';
			break;
	}

	return $title;
}

add_filter('enter_title_here', 'atl_change_title_placeholder_text');

// Get products list
function atl_get_products($count = 10)
{
   // new query
	$trips = new WP_Query([
		'post_type' => 'product',
		'orderby' => 'name',
		'order' => 'DESC',
		'posts_per_page' => $count,
	]);

	return $trips;
}

// Get questions list with search
function atl_get_questions($count = 10, $search = null)
{
   // new query
	$trips = new WP_Query([
		'post_type' => 'question',
		'orderby' => 'date',
		'order' => 'ASC',
		'posts_per_page' => $count,
		's' => strlen($search) ? $search : null
	]);

	return $trips;
}

add_action('admin_post_submit_contact_form', 'atl_handle_submit_contact_form');