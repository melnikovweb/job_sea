<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */
$context          = Timber::context();
$context['posts'] = new Timber\PostQuery();
$context['title'] = get_field('custom_title', 'options') ? get_field('custom_title', 'options') : get_post_type_object(get_post_type())->labels->name;
Timber::render('home.twig', $context);
