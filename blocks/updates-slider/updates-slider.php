<?php
/*
Block Name: Updates Slider
Description: Updates Slider block
Category: custom-blocks
Icon: wordpress-alt
Keywords: updates-slider block
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
Example: {"preview_image_help": "/blocks/updates-slider/preview.jpg"}
*/

if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. get_template_directory_uri() . $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
	return;
endif;

$context                  = Timber::context();
$context['fields']        = get_fields();
$context['class']         = 'updates-slider';
$context['classes']       = 'gutenberg-block';
$context['block']         = ! empty( $block ) ? $block : null;
$context['block_classes'] = $block['className'] ?? null;
$context['posts'] = Timber::get_posts( ['post_type' => 'post', 'posts_per_page' => 6] );

Timber::render( 'updates-slider/updates-slider.twig', $context );
