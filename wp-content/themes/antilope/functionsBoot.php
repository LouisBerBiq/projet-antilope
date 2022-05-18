<?php

add_action('init', 'atl_boot', 1);

function atl_boot()
{
	load_theme_textdomain('atl', __DIR__ . '/locales');

	if(! session_id()) {
		session_start();
	}
}