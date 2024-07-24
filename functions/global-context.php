<?php

if (class_exists('Timber')) {
	$timber = new Timber\Timber();
	$timber::$dirname = array('templates', 'blocks', 'layouts');

	add_filter('timber/context', 'add_to_context');
}

function add_to_context($context)
{
	$context['homelink'] 						= get_home_url();
	$context['menu']  							= new Timber\Menu();
	$context['options']      				= get_fields( 'options' );
	$context['logo']								= get_header_image() ? get_header_image() : get_bloginfo( 'name' );
	$context['hero_home_mask']			= get_template_directory_uri() . '/resources/img/hero-home-mask-alt.svg';
	return $context;
}
