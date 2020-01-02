<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'counter-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'counter';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<div class="row">
		<?php
		if(have_rows('block_counter_elements')) {
			while(have_rows('block_counter_elements')) {
				the_row();
				?>
				<div class="col-12 col-lg text-center text-white h-100 position-relative">
					<div class="inner">
						<div class="icon">
							<i class="<?php the_sub_field('icon'); ?>"></i>
						</div>
						<div class="number">
							<?php
							$number = get_sub_field('number');
							echo '<span class="js_counter">'.$number.'</span>';
							if(get_sub_field('ispercent')) {
								echo '<span>%</span>';
							}
							?>
						</div>
						<div class="text">
							<?php the_sub_field('text'); ?>
						</div>
					</div>
				</div>
				<?php
			}
		}
		?>
	</div>
</div>