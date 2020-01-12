<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'presse-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'presse';
if( !empty($block['className']) ) {
	$className .= '' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo $className; ?>">
		<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
		<?php
		$args = array(
			'numberposts' => -1,
			'post_type' => 'hh_presse',
			'orderby' => 'date',
			'order' => 'DESC',
			'post_status' => 'publish'
		);
		$presse = get_posts($args);
		if(!empty($presse)) {
			global $post;
			$i = 1;
			foreach($presse as $post) {
				setup_postdata( $post );
				$image = get_field('presse_image', get_the_ID());
				$link = get_field('presse_link', get_the_ID());
				if ($i % 2 != 0) {
					$headerBG = 'bg-primary text-white';
				} else {
					$headerBG = 'bg-secondary';
				}
				?>
				<div class="col mb-4">
					<div class="card border-0">
						<div class="card-header font-weight-bold text-right <?php echo $headerBG; ?>">
							Vom <?php the_time( get_option( 'date_format' ) ); ?>
						</div>
						<?php
						if(!empty($image)) {
							?>
							<picture>
								<source data-srcset="<?php echo $image['sizes']['presse']; ?> 1x, <?php echo $image['sizes']['presse2x']; ?> 2x">
								<img data-src="<?php echo $image['sizes']['presse']; ?>" class="card-img-top lazy" alt="<?php echo $image['alt']; ?>">
							</picture>
							<?php
						}
						?>
						<div class="card-body">
							<?php
							the_title('<h5 class="card-title">', '</h5>');
							the_content();
							if($link) {
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a href="<?php echo $link['url']; ?>" target="<?php echo $link_target; ?>" class="card-link"><i class="far fa-globe-europe mr-2"></i><?php echo $link['title']; ?></a>
								<?php
								}
							?>
						</div>
					</div>
				</div>
				<?php
				$i++;
			}
			wp_reset_postdata();
		}
		?>
	</div>
</div>