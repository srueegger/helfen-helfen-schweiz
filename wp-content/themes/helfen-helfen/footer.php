		<?php
		/* Cookie Banner einbinden */
		get_template_part( 'templates/cookie', 'banner' );
		/* WordPress Footer Scripte einbauen */
		wp_footer();
		?>
		<script>
		/* Gravityforms DatePicker Language */
		if(jQuery('.gform_wrapper').length) {
			gform.addFilter('gform_datepicker_options_pre_init', function (optionsObj, formId, fieldId) {
			jQuery.datepicker.regional['de'];
			return optionsObj;
		});
		}
		</script>
	</body>
</html>