<?php

require_once(__DIR__ . '/functionsSVGsupport.php');
require_once(__DIR__ . '/functionsCustomAvatarSupport.php');
require_once(__DIR__ . '/functionsBoot.php');
require_once(__DIR__ . '/functionsUtilities.php');
require_once(__DIR__ . '/functionsForm.php');

// register a custom post type for projects
register_post_type( 'project', [
	'labels' => [
		'name' => 'Projects',
		'singular_name' => 'Project'
	],
	'description' => 'Manage your projects list',
	'public' => true,
	'menu_position' => 5,
	'menu_icon' => 'dashicons-embed-generic',
	'supports' => ['title','editor','thumbnail','custom-fields'],
]);

// register nav menus with automatic population
register_nav_menu('Header', 'Top nav');
register_nav_menu('footer', 'Bottom nav');

// TODO: auto populate nav

// Get Projects list
function pfl_get_projects($count = 10)
{
   // new query
	$trips = new WP_Query([
		'post_type' => 'project',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => $count,
	]);

	return $trips;
}

add_action('admin_post_submit_contact_form', 'pfl_handle_submit_contact_form');