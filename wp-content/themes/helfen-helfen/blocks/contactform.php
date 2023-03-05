<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'contactform-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-contactform';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
$form_id = get_field( 'block_cf_form' );
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<?php echo do_shortcode( '[gravityform id="'.$form_id.'" title="false" description="false" ajax="true"]' ); ?>
			</div>
		</div>
	</div>
</div>