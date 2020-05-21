<?php
get_header();
$header_image = get_field( 'setting_mitstreiter_image', 'option' );
?>
<main id="helfen-helfen-mitstreiter">
	<div class="wp-block-cover has-<?php the_field( 'setting_mitstreiter_overlay', 'option' ); ?>-background-color has-background-dim fullpage" style="background-image:url(<?php echo $header_image['sizes']['imgsize-1920']; ?>)">
		<div class="wp-block-cover__inner-container">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-lg-9">
						<p class="has-text-align-center has-large-font-size"><?php the_field( 'setting_mitstreiter_imagetxt', 'option' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="mitstreiter-list" class="row no-gutters">
		<?php
		$args = array(
			'taxonomy' => 'hh_mitstreiterkategorien',
			'hide_empty' => true,
			'orderby' => 'menu_order',
			'order' => 'ASC'
		);
		$terms = get_terms( $args );
		foreach( $terms as $term ) {
			$image = get_field( 'hh_cat_mitstreiter_image', $term );
			?>
			<div class="col-12 col-lg-6 col-xl-4 mitstreiterItem">
				<a href="<?php echo get_term_link( $term, 'hh_mitstreiterkategorien' ) ?>" target="_self">
						<picture>
							<source srcset="<?php echo $image['sizes']['kopf']; ?> 1x, <?php echo $image['sizes']['kopf2x']; ?> 2x">
							<img src="<?php echo $image['sizes']['kopf']; ?>" loading="lazy" alt="<?php echo $image['alt']; ?>">
						</picture>
						<div class="overlay">
							<div class="inner">
								<h1 class="h3"><?php echo $term->name; ?></h1>
							</div>
						</div>
					</a>
			</div>
			<?php
		}
		?>
	</div>
</main>
<?php
get_template_part( 'templates/page', 'footer' );
get_footer();