<?php

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support( 'title-tag');

function alphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'alphabet_widgets_init' );

// Custom Header
add_theme_support(
	'custom-header',
	array(
		'height' => '30',
		'flex-height' => true,
		'uploads' => true,
		'header-text' => false,
	)
);

//Rewrite search page

add_action('parse_query', 'wp_search_query');

function wp_search_query($query, $error = true)
{
	if (is_search()) {
		$query->is_search = false;
		$query->query_vars['s'] = false;
		$query->query['s'] = false;
		if ($error) {
			$query->is_404 = true;
		}
	}
}

// ACF Options Pages
add_action('acf/init', 'acf_op_init');
function acf_op_init()
{
	// Check function exists.
	if (function_exists('acf_add_options_page')) {
		acf_add_options_page(array(
			'menu_title' => 'Theme Options',
			'menu_slug' => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect' => true,
		));
	}
}

add_action( 'init', 'cp_change_post_object' );
// Change dashboard Posts to Updates
function cp_change_post_object() {
	$get_post_type = get_post_type_object('post');
	$labels = $get_post_type->labels;
	$labels->name = 'Updates';
	$labels->singular_name = 'Update';
	$labels->add_new = 'Add Updates';
	$labels->add_new_item = 'Add Updates';
	$labels->edit_item = 'Edit Updates';
	$labels->new_item = 'Updates';
	$labels->view_item = 'View Updates';
	$labels->search_items = 'Search Updates';
	$labels->not_found = 'No Updates found';
	$labels->not_found_in_trash = 'No Updates found in Trash';
	$labels->all_items = 'All Updates';
	$labels->menu_name = 'Updates';
	$labels->name_admin_bar = 'Updates';
}

add_filter( 'big_image_size_threshold', '__return_false' );

function get_youtube_id( $video_url ) {
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $youtube_id);

	return $youtube_id[1];
}

function get_youtube_iframe( $video_url, $title ) {
	$youtube_id = get_youtube_id( $video_url );

	echo '<iframe class="content" title="'. $title .'" src="https://www.youtube.com/embed/'. $youtube_id .'?autoplay=0&mute=0" width="100%" height="100%" loading="lazy" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>';
}
