<?php
get_header();
?>
<main id="job-overview" class="foerderer">

		<?php
		/* Prüfen ob es Jobs gibt */
		$args = array(
			'posts_per_page' => -1,
			'post_type' => 'hh_jobs',
			'post_status' => 'publish',
			'orderby' => 'menu_order',
			'order' => 'DESC',
		);
		$jobs = get_posts($args);
		if(!empty($jobs)) {
			echo '<div class="row no-gutters">';
			global $post;
			foreach($jobs as $post) {
				setup_postdata( $post );
				$image = get_field( 'news_image' );
				?>
				<div class="col-12 col-lg-6 col-xl-4 foerdererItem">
					<a href="<?php the_permalink(); ?>">
						<picture>
							<source srcset="<?php echo $image['sizes']['kopf']; ?> 1x, <?php echo $image['sizes']['kopf2x']; ?> 2x">
							<img data-object-fit="cover" src="<?php echo $image['sizes']['kopf']; ?>" loading="lazy" alt="<?php echo $image['alt']; ?>">
						</picture>
						<div class="overlay">
							<div class="inner">
								<h2><?php the_title(); ?></h2>
							</div>
						</div>
					</a>
				</div>
				<?php
			}
			wp_reset_postdata();
			echo '</div>';
		} else {
			/* Anzeige bei keinen offenen Jobs */
			the_field( 'setting_job_nojobs', 'option' );
		}
		?>
</main>
<?php
get_template_part( 'templates/page', 'footer' );
get_template_part( 'templates/modal', 'windows' );
get_footer();