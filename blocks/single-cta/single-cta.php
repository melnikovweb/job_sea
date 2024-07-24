<?php
/*
Block Name: Single Quote
Description: Single Quote block
Category: custom-blocks
Icon: wordpress-alt
Keywords: single-quote quote block
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
Example: {"preview_image_help": "/blocks/single-cta/preview.jpg"}
*/

if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. get_template_directory_uri() . $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
	return;
endif;

$context                  = Timber::context();
$context['class']         = 'single-cta';
$context['classes']       = 'gutenberg-block';
$context['block']         = ! empty( $block ) ? $block : null;
$context['block_classes'] = $block['className'] ?? null;

$fields = get_fields();
$context['image'] = checker_value($fields, 'cta_image');
$context['image_mobile'] = checker_value($fields, 'cta_image_mobile');
$context['content'] = checker_value($fields, 'cta_content');

Timber::render( 'single-cta/single-cta.twig', $context );

