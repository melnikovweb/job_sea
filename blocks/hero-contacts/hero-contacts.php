<?php
/*
Block Name: Hero Contacts
Description: Hero Contacts block
Category: custom-blocks
Icon: wordpress-alt
Keywords: hero-contacts block
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
Example: {"preview_image_help": "/blocks/hero-contacts/preview.jpg"}
*/

if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. get_template_directory_uri() . $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
	return;
endif;

$context                  = Timber::context();
$context['class']         = 'hero-contacts';
$context['classes']       = 'gutenberg-block';
$context['block']         = ! empty( $block ) ? $block : null;
$context['block_classes'] = $block['className'] ?? null;

$fields = get_fields();
$context['title'] = checker_value($fields, 'title');
$context['bg_image'] = checker_value($fields, 'bg_image');
$context['bg_image_mobile'] = checker_value($fields, 'bg_image_mobile');


Timber::render( 'hero-contacts/hero-contacts.twig', $context );

