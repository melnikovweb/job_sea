<?php
/*
Block Name: Form Block
Description: Form Block block
Category: custom-blocks
Icon: wordpress-alt
Keywords: form-block block
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
Example: {"preview_image_help": "/blocks/form-block/preview.jpg"}
*/

if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. get_template_directory_uri() . $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
	return;
endif;

$context                  = Timber::context();
$context['class']         = 'form-block';
$context['classes']       = 'gutenberg-block';
$context['block']         = ! empty( $block ) ? $block : null;
$context['block_classes'] = $block['className'] ?? null;

$fields = get_fields();
$context['form_shortcode'] = checker_value($fields, 'form_shortcode');

Timber::render( 'form-block/form-block.twig', $context );

