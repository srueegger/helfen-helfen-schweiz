<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'countdown-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'countdown';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
$countdown_to = get_field( 'block_contdown_datetime' );
$countdown_to = str_replace( '-', '/', $countdown_to );
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>" data-countdownto="<?php echo $countdown_to; ?>">
	<div class="container">
		<div class="row">
			<div class="col-6 col-lg-3">
				<div class="countdownValue days"></div>
				<div>Tage</div>
			</div>
			<div class="col-6 col-lg-3">
				<div class="countdownValue hours"></div>
				<div>Stunden</div>
			</div>
			<div class="col-6 col-lg-3 mt-3 mt-lg-0">
				<div class="countdownValue minutes"></div>
				<div>Minuten</div>
			</div>
			<div class="col-6 col-lg-3 mt-3 mt-lg-0">
				<div class="countdownValue seconds"></div>
				<div>Sekunden</div>
			</div>
		</div>
	</div>
</div>