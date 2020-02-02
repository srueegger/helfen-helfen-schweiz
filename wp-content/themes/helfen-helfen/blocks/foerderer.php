<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'foerderer-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'foerderer';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<div class="row no-gutters">
		<?php
		$args = array(
			'posts_per_page' => -1,
			'post_type' => 'page',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'post_parent' => get_queried_object_id()
		);
		$pages = get_posts($args);
		if(!empty($pages)) {
			global $post;
			foreach($pages as $post) {
				setup_postdata( $post );
				$image = get_field('forderer_overview_image', get_the_ID());
				$h1_txt = get_field('forderer_h1', get_the_ID());
				$h2_txt = get_field('forderer_h2', get_the_ID());
				?>
				<div class="col-12 col-lg-6 col-xl-4 foerdererItem">
					<picture>
						<source data-srcset="<?php echo $image['sizes']['kopf']; ?> 1x, <?php echo $image['sizes']['kopf2x']; ?> 2x">
						<img data-src="<?php echo $image['sizes']['kopf']; ?>" class="lazy" alt="<?php echo $image['alt']; ?>">
					</picture>
					<div class="overlay">
						<div class="inner">
							<?php
							if(!empty($h1_txt)) {
								echo '<h1 class="h3">'.$h1_txt.'</h1>';
							}
							if(!empty($h2_txt)) {
								echo '<h2>'.$h2_txt.'</h2>';
							}
							?>
						</div>
					</div>
				</div>
				<?php
			}
			wp_reset_postdata();
		}
		?>
	</div>
</div>