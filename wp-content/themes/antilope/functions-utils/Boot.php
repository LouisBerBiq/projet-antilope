<?php

function atl_boot()
{
	load_theme_textdomain('atl', __DIR__ . '/locales');

	if(! session_id()) {
		session_start();
	}
}

add_action('init', 'atl_boot', 1);
