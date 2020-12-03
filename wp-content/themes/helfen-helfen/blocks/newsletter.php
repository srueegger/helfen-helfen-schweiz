<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'newsletter-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-newsletter '.get_field('block_nl_bgcolor');
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9 mt-5">
				<h2 class="h2 important text-white"><?php the_field( 'block_nl_title' ); ?></h2>
			</div>
			<div class="col-12 col-lg-9">
				<?php echo do_shortcode( '[rm_form show_firstname="1" show_lastname="1" show_mailtype="1" show_title="1"  show_consent_text="1"] ' ); ?>
			</div>
		</div>
	</div>
</div>