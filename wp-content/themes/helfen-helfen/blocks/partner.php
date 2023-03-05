<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'partner-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'partner';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?> mt-4">
	<?php
	$args = array(
		'taxonomy' => 'hh_partnerkategorien',
    'hide_empty' => false,
	);
	$terms = get_terms( $args );
	if( !empty( $terms ) ) {
		echo '<div class="row justify-content-center">';
		foreach( $terms as $term ) {
			echo '<div class="col-12 col-md-6 col-lg-4 text-center">';
			//print_r( $term );
			echo '<h3>' . esc_attr( $term->name ) . '</h3>';
			$args = array(
				'posts_per_page' => -1,
				'post_type' => 'hh_partner',
				'post_status' => 'publish',
				'orderby' => 'menu_order',
				'order' => 'DESC',
				'tax_query' => array(
					array(
						'taxonomy' => $term->taxonomy,
						'field' => 'term_id',
						'terms' => $term->term_id
					)
				)
			);
			$partners = get_posts( $args );
			foreach( $partners as $partner ) {
				$logo = get_field('partner_logo', $partner->ID);
				echo '<div class="partner-container"><a href="'.esc_url( get_field('partner_link', $partner->ID) ).'" title="'. esc_attr( get_the_title($partner->ID) ).'" target="_blank"><picture><img data-object-fit="contain" loading="lazy" src="'.esc_url( $logo['url'] ).'" alt="'. esc_attr( $logo['alt'] ).'"></picture></a></div>';
			}
			echo '</div>';
		}
		echo '</div>';
	}
	?>
</div>