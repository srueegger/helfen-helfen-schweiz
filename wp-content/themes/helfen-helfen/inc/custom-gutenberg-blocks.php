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

	// register a Presse block.
	acf_register_block_type(array(
		'name' => 'presse',
		'title' => __('Presseartikel anzeigen'),
		'description' => __('Der Block zeigt die Presseartikel an'),
		'render_template' => '/blocks/presse.php',
		'category' => 'layout',
		'icon' => 'microphone',
		'keywords' => array( 'presse', 'news', 'nachrichten' ),
		'mode' => 'edit'
	));

	// Förderer Übersicht
	acf_register_block_type(array(
		'name' => 'foerderer',
		'title' => __('Förderer anzeigen'),
		'description' => __('Der Block managt die Förderer Übersicht'),
		'render_template' => '/blocks/foerderer.php',
		'category' => 'layout',
		'icon' => 'star-filled',
		'keywords' => array( 'förderer', 'foerderer' ),
		'mode' => 'edit'
	));

	// Layout Formular
	acf_register_block_type(array(
		'name' => 'layoutform',
		'title' => __('Layout Formular'),
		'description' => __('Der Block kan GravityForms Formulare in einem speziellen Layout anzeigen'),
		'render_template' => '/blocks/layoutform.php',
		'category' => 'layout',
		'icon' => 'forms',
		'keywords' => array( 'form', 'formular' ),
		'mode' => 'edit'
	));

	// register a Partner block.
	acf_register_block_type(array(
		'name' => 'partner',
		'title' => __('Partner anzeigen'),
		'description' => __('Der Block zeigt die Partner an'),
		'render_template' => '/blocks/partner.php',
		'category' => 'layout',
		'icon' => 'star-filled',
		'keywords' => array( 'partner', 'support' ),
		'mode' => 'edit'
	));

	// register a Partner block.
	acf_register_block_type(array(
		'name' => 'contactform',
		'title' => __('Kontaktformular'),
		'description' => __('Der Block zeigt das Kontaktformular an'),
		'render_template' => '/blocks/contactform.php',
		'category' => 'layout',
		'icon' => 'email',
		'keywords' => array( 'contact', 'form', 'support', 'help' ),
		'mode' => 'edit'
	));

	// register a Checkliste block.
	acf_register_block_type(array(
		'name' => 'hh_checklist',
		'title' => __('Checkliste'),
		'description' => __('Der Block zeigt eine Checkliste an'),
		'render_template' => '/blocks/checklist.php',
		'category' => 'layout',
		'icon' => 'yes',
		'keywords' => array( 'list', 'check' ),
		'mode' => 'edit'
	));

	//Newsletter Anmeldung Block
	acf_register_block_type(array(
		'name' => 'hh_newsletter',
		'title' => __('Newsletter Anmeldung'),
		'description' => __('Der Block zeigt eine Checkliste an'),
		'render_template' => '/blocks/newsletter.php',
		'category' => 'layout',
		'icon' => 'edit',
		'keywords' => array( 'anmeldung', 'newsletter' ),
		'mode' => 'edit'
	));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'register_acf_block_types');
}