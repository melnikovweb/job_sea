<?php
/*
Block Name: Hero Single/About
Description: Hero Single/About block
Category: custom-blocks
Icon: wordpress-alt
Keywords: hero-about block
PostTypes: page post
Mode: edit
Align: full
SupportsAlign: left center right wide full
SupportsAnchor: true
SupportsCustomClassName: true
SupportsMode: true
SupportsMultiple: true
SupportsReusable: true
SupportsJSX: false
Example: {"preview_image_help": "/blocks/hero-about/preview.jpg"}
*/

if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. get_template_directory_uri() . $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
	return;
endif;

$context                  = Timber::context();
$context['class']         = 'hero-about';
$context['classes']       = 'gutenberg-block';
$context['block']         = ! empty( $block ) ? $block : null;
$context['block_classes'] = $block['className'] ?? null;

$fields = get_fields();
$context['title'] = checker_value($fields, 'title');
$context['default_title'] = get_the_title();
$context['description'] = checker_value($fields, 'description');
$context['bg_image'] = checker_value($fields, 'bg_image');
$context['bg_image_mobile'] = checker_value($fields, 'bg_image_mobile');
$context['top_layer'] = checker_value($fields, 'top_layer');
$context['top_layer_mobile'] = checker_value($fields, 'top_layer_mobile');
$context['bottom_layer'] = checker_value($fields, 'bottom_layer');
$context['type'] = checker_value($fields, 'type');




Timber::render( 'hero-about/hero-about.twig', $context );

