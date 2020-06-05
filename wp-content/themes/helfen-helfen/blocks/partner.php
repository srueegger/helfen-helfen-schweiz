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
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<?php
	/* Veröffentlichte Partner ermitteln und ausgeben */
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'hh_partner',
		'post_status' => 'publish',
		'orderby' => 'menu_order',
		'order' => 'DESC',
	);
	$partners = get_posts($args);
	if(!empty($partners)) {
		echo '<div class="row">';
		foreach($partners as $partner) {
			$logo = get_field('partner_logo', $partner->ID);
			echo '<div class="col-12 col-md-6 col-lg-4 col-xl-3">';
			echo '<div class="partner-container"><a href="'.get_field('partner_link', $partner->ID).'" title="'.get_the_title($partner->ID).'" target="_blank">';
			echo '<picture><img data-object-fit="contain" loading="lazy" src="'.$logo['url'].'" alt="'.$logo['alt'].'"></picture>';
			echo '</a></div></div>';
		}
		echo '</div>';
	}
	?>
</div>