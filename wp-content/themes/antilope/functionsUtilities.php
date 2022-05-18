<?php

// disable the Gutenberg editor
add_filter( 'use_block_editor_for_post', '__return_false' );

// enable thumbnails in posts
add_theme_support( 'post-thumbnails' );

// taken from https://stackoverflow.com/questions/17393887/how-to-remove-posts-from-admin-sidebar-in-wordpress
// remove uneeded menu entries
function remove_menu_entries () 
{
   remove_menu_page('edit.php');
   remove_menu_page('edit-comments.php');
} 

add_action('admin_menu', 'remove_menu_entries');

// Utilitaire pour charger un fichier compilé par mix, avec cache bursting.
function atl_mix($path)
{
	$path = '/' . ltrim($path, '/');

	// Checker si le fichier demandé existe bien, sinon retourner NULL
	if(! realpath(__DIR__ . '/public' . $path)) {
		return;
	}

	// Check si le fichier mix-manifest existe bien, sinon retourner le fichier sans cache-bursting
	if(! ($manifest = realpath(__DIR__ . '/public/mix-manifest.json'))) {
		return get_stylesheet_directory_uri() . '/public' . $path;
	}

	// Ouvrir le fichier mix-manifest et lire le JSON
	$manifest = json_decode(file_get_contents($manifest), true);

	// Check si le fichier demandé est bien présent dans le mix manifest, sinon retourner le fichier sans cache-bursting
	if(! array_key_exists($path, $manifest)) {
		return get_stylesheet_directory_uri() . '/public' . $path;
	}

	// C'est OK, on génère l'URL vers la ressource sur base du nom de fichier avec cache-bursting.
	return get_stylesheet_directory_uri() . '/public' . $manifest[$path];
}

// Fonction permettant d'inclure des composants et d'y injecter des variables locales (scope de l'appel de fonction)
function atl_include(string $partial, array $variables = [])
{
	extract($variables);

	include(__DIR__ . '/partials/' . $partial . '.php');
}
