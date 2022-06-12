<?php

function atl_boot()
{
	load_theme_textdomain('atl', THEME_PATH . '/locales');

	if(! session_id()) {
		session_start();
	}
}

function atl_admin_boot()
{
	// TODO: make it so it's not accessible by direct url either (https://wordpress.stackexchange.com/questions/59032/advanced-custom-fields-user-role-editor-how-to-hide-acf-for-certain-users)
	// TODO: custom widget for messages (https://wordpress.stackexchange.com/questions/5318/adding-custom-post-type-counts-to-the-dashboard)

	// Remove some dashboard widgets
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );	// No idea
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );				// No idea
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );				// No idea
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );			// No idea
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );			// Quick post
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );	// Recent comments
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );			// At a glance

	// remove sidebar menus
		// remove_menu_page('themes.php');														// Appearance
		// remove_menu_page('plugins.php');														// Plugins
		// remove_menu_page('users.php');														// Users
		// remove_menu_page('options-general.php');											// Settings
		// remove_menu_page('edit.php?post_type=acf-field-group');						// ACF
		// remove_menu_page('admin.php?page=mlang');											// Polylang

}

function atl_dashboard_setup() {
	wp_add_dashboard_widget(
		'recent_messages',
		'Messages',
		'atl_messages_widget'
	);
}

function atl_messages_widget() {
	echo "Hello there, I'm a great Dashboard Widget. Edit me!";

function custom_glance_items( $items = array() ) {
	$post_types = array('message');
	if ($posts = atl_get_questions(5)->have_posts()) {
		while (have_posts()) {
			// TODO: put post in items array
		}
	}
	// foreach( $post_types as $type ) {
	// 	if( ! post_type_exists( $type ) ) continue;
	// 	$num_posts = wp_count_posts( $type );
	// 	if( $num_posts ) {
	// 		$published = intval( $num_posts->publish );
	// 		$post_type = get_post_type_object( $type );
	// 		$text = _n( '%s ' . $post_type->labels->singular_name, '%s ' . $post_type->labels->name, $published, 'your_textdomain' );
	// 		$text = sprintf( $text, number_format_i18n( $published ) );
	// 		if ( current_user_can( $post_type->cap->edit_posts ) ) {
	// 		$output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $text . '</a>';
	// 				echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
	// 		} else {
	// 		$output = '<span>' . $text . '</span>';
	// 				echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
	// 		}
	// 	}
	// }
	return $items;
}

// snatched from https://www.wpoptimus.com/626/7-ways-disable-update-wordpress-notifications/
function remove_core_updates(){
	global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
	
add_action('init', 'atl_boot', 1);
add_action('admin_init', 'atl_admin_boot');
add_action('wp_dashboard_setup', 'atl_dashboard_setup');

// add_filter('pre_site_transient_update_core','remove_core_updates');
// add_filter('pre_site_transient_update_plugins','remove_core_updates');
// add_filter('pre_site_transient_update_themes','remove_core_updates');