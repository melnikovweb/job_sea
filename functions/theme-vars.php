<?php

if ( !function_exists('skeleton_theme_vars') ) {

	function skeleton_theme_vars() {
		// Throw variables from back to front end.
		$theme_vars = array(
			'home'   => get_home_url(),
			'isHome' => is_front_page(),
		);
		wp_enqueue_style('font-family-google-bai-jamjuree', "https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@300;400;500;600;700&display=swap", false);
		wp_enqueue_style('FontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css', false);
		wp_localize_script('manifest', 'themeVars', $theme_vars);
	}

	add_action('wp_enqueue_scripts', 'skeleton_theme_vars');
}
