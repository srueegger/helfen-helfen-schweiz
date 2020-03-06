<div class="news-meta-container">
	<div class="row">
		<div class="col-12 col-lg-6 news-date">
			<i class="fas fa-calendar text-primary"></i> <?php the_time( get_option( 'date_format' ) ); ?>
		</div>
		<div class="col-12 col-lg-6 news-author">
			<?php
			/* Author String zusammenstellen */
			$author_name = get_the_author_meta('display_name');
			$author_string = $author_name;
			/* Prüfen ob der Benutzer mit einem Kopf verknüpft ist */
			$author_ID = get_the_author_meta('ID');
			$args = array(
				'numberposts' => 1,
				'post_type' => 'koepfe',
				'post_status' => 'publish',
				'meta_query' => array(
					array(
						'key' => 'kopf_user',
						'value' => $author_ID,
						'compare' => '=',
						'type' => 'NUMERIC'
					)
				)
			);
			$kopfe = get_posts($args);
			if(!empty($kopfe)) {
				global $post;
				foreach($kopfe as $post) {
					setup_postdata( $post );
					$author_string .= ', '.get_field('kopf_job');
				}
				wp_reset_postdata();
			}
			?>
			<i class="fas fa-user-tie text-primary"></i> <?php echo $author_string; ?>
		</div>
	</div>
</div>
<hr class="wp-block-separator has-text-color has-background has-primary-background-color has-primary-color is-style-wide">