<?php
/*
Block Name: What We Are About
Description: What We Are About block
Category: custom-blocks
Icon: wordpress-alt
Keywords: what-we-are-about block
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
Example: {"preview_image_help": "/blocks/what-we-are-about/preview.jpg"}
*/

if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. get_template_directory_uri() . $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
	return;
endif;

$context                  = Timber::context();
$context['demo']          = false;
$context['class']         = 'what-we-are-about';
$context['cta_class']     = 'cta-block';
$context['classes']       = 'gutenberg-block';
$context['block']         = ! empty( $block ) ? $block : null;
$context['block_classes'] = $block['className'] ?? null;

$fields = get_fields();
$context['t_icon'] = checker_value($fields, 'top_icon');
$context['b_icon'] = checker_value($fields, 'bottom_icon');
$context['title'] = checker_value($fields, 'title');
$context['bg_image_desktop'] = checker_value($fields, 'bg_image_desktop');
$context['bg_image_mobile'] = checker_value($fields, 'bg_image_mobile');
$context['items'] = checker_value($fields, 'items');
$context['cta_title'] = checker_value($fields, 'cta_title');
$context['button'] = checker_value($fields, 'button');

Timber::render( 'what-we-are-about/what-we-are-about.twig', $context );

