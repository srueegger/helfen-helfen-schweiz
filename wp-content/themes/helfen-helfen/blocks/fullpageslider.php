<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'fullpageslider-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'fullpageslider';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<?php
	if(have_rows('block_fps_elements')) {
		echo '<div class="hh-full-carousel mb-0">';
		while(have_rows('block_fps_elements')) {
			the_row();
			$link = get_sub_field('link');
			$image = get_sub_field('image');
			?>
			<div>
				<a href="<?php echo get_the_permalink( $link ); ?>" target="_self">
					<picture>
						<img src="<?php echo $image['sizes']['imgsize-1920']; ?>" alt="<?php echo $image['alt']; ?>">
					</picture>
					<div class="inner-container <?php the_sub_field('overlay_color'); ?>">
						<div class="inner">
							<h2><?php echo $image['title']; ?></h2>
							<p><?php echo $image['caption']; ?></p>
						</div>
					</div>
				</a>
			</div>
			<?php
		}
		echo '</div>';
	}
	?>
</div>