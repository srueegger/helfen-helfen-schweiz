<?php
get_header();
?>
<main id="job-overview" class="emptypage">
	<div class="inner">
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
			echo '<ul class="list-unstyled text-center">';
			global $post;
			foreach($jobs as $post) {
				setup_postdata( $post );
				echo '<li><a href="'.get_the_permalink().'" target="_self">'.get_the_title().'</a></li>';
			}
			wp_reset_postdata();
			echo '</ul>';
		} else {
			/* Anzeige bei keinen offenen Jobs */
			the_field( 'setting_job_nojobs', 'option' );
		}
		?>
	</div>
</main>
<?php
get_template_part( 'templates/modal', 'windows' );
get_footer();