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

	// register a Countdown block.
	acf_register_block_type(array(
		'name' => 'countdown',
		'title' => __('Countdown'),
		'description' => __('Der Block rendert einen benutzerdeinierten Countdown'),
		'render_template' => '/blocks/countdown.php',
		'category' => 'layout',
		'icon' => 'backup',
		'keywords' => array( 'counter', 'zahlen', 'countdown' ),
		'mode' => 'edit'
	));

	// register a Köpfe block.
	acf_register_block_type(array(
		'name' => 'kopefe',
		'title' => __('Köpfe anzeigen'),
		'description' => __('Der Block zeigt die Köpfe an'),
		'render_template' => '/blocks/koepfe.php',
		'category' => 'layout',
		'icon' => 'groups',
		'keywords' => array( 'team', 'köpfe', 'koepfe' ),
		'mode' => 'edit'
	));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'register_acf_block_types');
}