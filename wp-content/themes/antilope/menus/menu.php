<?php

require_once(__DIR__ . '/PrimaryMenuItem.php');

// from the course
function atl_get_menu_items($location)
{
	$items = [];

	// Récupérer le menu qui correspond à l'emplacement souhaité
	$locations = get_nav_menu_locations();

	if(! ($locations[$location] ?? false)) {
		return $items;
	}

	$menu = $locations[$location];

	// Récupérer tous les éléments du menu en question
	$posts = wp_get_nav_menu_items($menu);

	// Traiter chaque élément de menu pour le transformer en objet
	foreach($posts as $post) {
		// Créer une instance d'un objet personnalisé à partir de $post
		$item = new PrimaryMenuItem($post);

		// Ajouter cette instance soit à $items (s'il s'agit d'un élément de niveau 0), soit en tant que sous-élément d'un item déjà existant.
		if(! $item->isSubItem()) {
			// Il s'agit d'un élément de niveau 0, on l'ajoute au tableau
			$items[] = $item;
			continue;
		}

		// Ajouter l'instance comme "enfant" d'un item existant
		foreach($items as $existing) {
			if(! $existing->isParentFor($item)) continue;
			
			$existing->addSubItem($item);
		}
	}

	// Retourner les éléments de menu de niveau 0
	return $items;
}

// register nav menus with automatic population
register_nav_menu('header', __('Navigation du haut de page', 'atl'));
register_nav_menu('footer', __('Navigation du bas de page', 'atl'));