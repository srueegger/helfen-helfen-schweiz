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

/***************************************
 * Jobs zum Formular Mitglied werden hinzufügen (als Checkboxen)
 ***************************************/
function hh_add_jobs_to_member_form( $form ) {
	foreach ( $form['fields'] as $field ) {
		if ( $field->type != 'checkbox' || strpos( $field->cssClass, 'hh_add_dynamic_jobs' ) === false ) {
			continue;
		}
		if($field->pageNumber == 6) {
			continue;
		}
		print_r($form);
		/* Alle Jobs auslesen */
		$args = array(
			'numberposts' => -1,
			'post_status' => 'publish',
			'post_type' => 'hh_jobs',
			'orderby' => 'date',
			'order' => 'ASC'
		);
		$jobs = get_posts( $args );
		if(!empty($jobs)) {
			$input_counter = count($field->inputs) + 1;;
			$new_choices = array();
			$new_inputs = array();
			foreach( $jobs as $job ) {
				$job_title = 'Aktivmitglied (' . $job->post_title . ')';
				$new_choices[] = array(
					'text' => $job_title,
					'value' => $job_title
				);
				$new_inputs[] = array(
					'label' => $job_title,
					'id' => '19.' . $input_counter
				);
				$input_counter++;
			}
			$old_choices = $field->choices;
			$merge_choices = array_merge( $old_choices, $new_choices );
			$field->choices = $merge_choices;
			$old_inputs = $field->inputs;
			$merge_inputs = array_merge( $old_inputs, $new_inputs );
			$field->inputs = $merge_inputs;
		}
	}
	return $form;
}
add_filter( 'gform_pre_render_2', 'hh_add_jobs_to_member_form' );
add_filter( 'gform_pre_submission_filter_2', 'hh_add_jobs_to_member_form' );
add_filter( 'gform_admin_pre_render_2', 'hh_add_jobs_to_member_form' );