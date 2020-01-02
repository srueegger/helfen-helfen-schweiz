<?php
/* Register some Custom Gutenberg Blocks */
function register_acf_block_types() {

	// register a fullpage Slider block.
	acf_register_block_type(array(
		'name' => 'fullpageslider',
		'title' => __('Slider volle Seite'),
		'description' => __('Der Block rendert einen Slider der über die ganze Seite geht'),
		'render_template' => '/blocks/fullpageslider.php',
		'category' => 'layout',
		'icon' => 'slides',
		'keywords' => array( 'slider' ),
		'mode' => 'edit'
	));

	// register a Counter block.
	acf_register_block_type(array(
		'name' => 'counter',
		'title' => __('Counter'),
		'description' => __('Der Block rendert einen Counter'),
		'render_template' => '/blocks/counter.php',
		'category' => 'layout',
		'icon' => 'star-filled',
		'keywords' => array( 'counter', 'zahlen' ),
		'mode' => 'edit'
	));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'register_acf_block_types');
}