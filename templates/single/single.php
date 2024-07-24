<?php
// single.php,
$context = Timber::context();
$context['post'] 					= new Timber\Post();
$context['thumbnail_url'] = get_the_post_thumbnail_url();
$context['thumbnail_id'] 	= get_post_thumbnail_id();
$context['title'] 				= get_the_title();
$context['fields'] 				= get_fields();
Timber::render('single.twig', $context);

