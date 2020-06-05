<?php
/***************************************
 * Add Bootstrap Classes to Gravityforms Submit Button
 ***************************************/
function hh_add_custom_css_classes( $button, $form ) {
	$dom = new DOMDocument();
	$dom->loadHTML( $button );
	$input = $dom->getElementsByTagName( 'input' )->item(0);
	$classes = "btn btn-primary";
	$input->setAttribute( 'class', $classes );
	return $dom->saveHtml( $input );
}
add_filter( 'gform_submit_button', 'hh_add_custom_css_classes', 10, 2 );

/***************************************
 * PLZ vor Ort im Adressfeld anzeigens
 ***************************************/
function hh_address_format( $format ) {
	return 'zip_before_city';
}
add_filter( 'gform_address_display_format', 'hh_address_format' );

/***************************************
 * Gravityform Export with Semicolon
 ***************************************/
function hh_change_separator( $separator, $form_id ) {
	return ';';
}
add_filter( 'gform_export_separator', 'hh_change_separator', 10, 2 );

/***************************************
 * Datepicker Regional to Swiss / German
 ***************************************/
function hh_add_datepicker_regional() {
	if ( wp_script_is( 'gform_datepicker_init' ) ) {
		wp_enqueue_script( 'datepicker-regional', DIST_JS . '/datepicker-de.min.js', array( 'gform_datepicker_init' ), false, true );
		remove_action( 'wp_enqueue_scripts', 'wp_localize_jquery_ui_datepicker', 1000 );
	}
}
add_action( 'gform_enqueue_scripts', 'hh_add_datepicker_regional', 11 );