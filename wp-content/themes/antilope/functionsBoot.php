<?php

add_action('init', 'pfl_boot', 1);

function pfl_boot()
{
	load_theme_textdomain('pfl', __DIR__ . '/locales');

	if(! session_id()) {
		session_start();
	}
}