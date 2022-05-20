<?php

require_once(__DIR__ . '/functionsSVGsupport.php');
require_once(__DIR__ . '/functionsCustomAvatarSupport.php');
require_once(__DIR__ . '/functionsBoot.php');
require_once(__DIR__ . '/functionsUtilities.php');
require_once(__DIR__ . '/functionsForm.php');

// register a custom post type for products
register_post_type( 'product', [
	'labels' => [
		'name' => 'Produits',
		'singular_name' => 'Produit'
	],
	'description' => 'Gérer vos produits',
	'public' => true,
	'menu_position' => 5,
	'menu_icon' => 'dashicons-screenoptions',
	'supports' => ['title','editor','thumbnail','custom-fields'],
]);

// register nav menus with automatic population
register_nav_menu('Header', 'Top nav');
register_nav_menu('footer', 'Bottom nav');

// TODO: auto populate nav

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

add_action('admin_post_submit_contact_form', 'atl_handle_submit_contact_form');