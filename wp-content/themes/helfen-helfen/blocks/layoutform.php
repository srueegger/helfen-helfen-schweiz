<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'layoutform-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'layoutform';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
$bg_image = get_field('block_lf_bgimage');
?>
<div style="background-image: url('<?php echo $bg_image['sizes']['imgsize-1920']; ?>');" id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<div class="inner">
		<div class="container">
			<div class="row">
				<div class="col-12 mb-3">
					<h1 class="layoutform--title"><?php the_field('block_lf_title'); ?></h1>
				</div>
				<div class="col-12 form-outer">
					<div class="form-inner">
						<?php echo do_shortcode( '[gravityform id="'.get_field('block_lf_form').'" title="false" description="false" ajax="true"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="layout-form--form-bottom">
	<h2><?php the_field('block_lf_footertxt'); ?></h2>
</div>