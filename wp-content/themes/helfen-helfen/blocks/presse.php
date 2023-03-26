<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'presse-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'presse foerderer';
if( !empty($block['className']) ) {
	$className .= '' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<?php
	$args = array(
		'numberposts' => -1,
		'post_type' => 'hh_presse',
		'orderby' => 'date',
		'order' => 'DESC',
		'post_status' => 'publish'
	);
	$presse = get_posts($args);
	if( !empty( $presse ) ) {
		global $post;
		echo '<div class="row no-gutters">';
		foreach( $presse as $post ) {
			setup_postdata( $post );
			$image = get_field( 'presse_image', get_the_ID() );
			$link = get_field( 'presse_link', get_the_ID() );
			$link_target = $link['target'] ? $link['target'] : '_self';
			echo '<div class="col-12 col-lg-6 col-xl-4 foerdererItem">';
			?>
			<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
				<picture>
					<source srcset="<?php echo $image['sizes']['kopf']; ?> 1x, <?php echo $image['sizes']['kopf2x']; ?> 2x">
					<img data-object-fit="cover" src="<?php echo $image['sizes']['kopf']; ?>" loading="lazy" alt="<?php echo $image['alt']; ?>">
				</picture>
				<div class="overlay">
					<div class="inner">
						<h2><?php echo esc_attr( get_the_title( get_the_ID() ) ); ?></h2>
						<p class="mt-3"><?php echo get_the_time( get_option( 'date_format' ), get_the_ID() ); ?></p>
						<p><?php the_field( 'presse_medium', get_the_ID() ); ?></p>
					</div>
				</div>
			</a>
			<?php
			echo '</div>';
		}
		wp_reset_postdata();
		echo '</div>';
	}
	?>
</div>