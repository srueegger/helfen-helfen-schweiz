<?php
get_header();
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$header_image = get_field( 'hh_cat_mitstreiter_image', $term );
?>
<main id="helfen-helfen-mitstreiter-term">
	<div class="wp-block-cover has-<?php the_field( 'hh_cat_mitstreiter_overlay', $term ); ?>-background-color has-background-dim fullpage" style="background-image:url(<?php echo $header_image['sizes']['imgsize-1920']; ?>)">
		<div class="wp-block-cover__inner-container">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-lg-9">
						<p class="has-text-align-center has-large-font-size"><?php echo $term->name; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="mitstreiter-list" class="row no-gutters">
		<?php
		$args = array(
			'posts_per_page' => -1,
			'post_type' => 'hh_mitstreiter',
			'post_status' => 'publish',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => $term->taxonomy,
					'field' => 'term_id',
					'terms' => $term->term_id
				)
			)
		);
		$mitstreiter = get_posts( $args );
		if(!empty($mitstreiter)) {
			global $post;
			foreach($mitstreiter as $post) {
				setup_postdata( $post );
				$image = get_field( 'mitstreiter_image' );
				?>
				<div class="col-12 col-lg-6 col-xl-4 mitstreiterItem">
					<a href="<?php the_field( 'mitstreiter_link' ) ?>" target="_blank">
						<picture>
							<source srcset="<?php echo $image['sizes']['kopf']; ?> 1x, <?php echo $image['sizes']['kopf2x']; ?> 2x">
							<img src="<?php echo $image['sizes']['kopf']; ?>" loading="lazy" alt="<?php echo $image['alt']; ?>">
						</picture>
						<div class="overlay">
							<div class="inner">
								<?php the_title( '<h1 class="h3">', '</h1>' ); ?>
							</div>
						</div>
					</a>
				</div>
				<?php
			}
			wp_reset_postdata();
		}
		?>
	</div>
</main>
<?php
get_footer();