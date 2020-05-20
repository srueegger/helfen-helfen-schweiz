<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'checklist-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-checklist';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
$font_color = get_field( 'block_checklist_fontcolor' );
?>
<div style="background-color: <?php the_field( 'block_checklist_bgcolor' ); ?>" id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<h3 style="color: <?php echo $font_color; ?>"><?php the_field( 'block_checklist_title' ); ?></h3>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<?php
				if(have_rows( 'block_checklist_list' )) {
					echo '<ul style="color: '.$font_color.';" class="list-unstyled mb-0">';
					while(have_rows( 'block_checklist_list' )) {
						the_row();
						echo '<li><i class="'.get_sub_field( 'icon' ).'"></i>'.get_sub_field( 'txt' ).'</li>';
					}
					echo '</ul>';
				}
				?>
			</div>
		</div>
	</div>
</div>