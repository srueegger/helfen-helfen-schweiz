<?php
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();
$image = get_field('news_image');
?>
<main id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="wp-block-cover has-background-dim-40 <?php the_field('news_image_layer'); ?> has-background-dim fullpage" style="background-image:url(<?php echo $image['sizes']['imgsize-1920']; ?>)">
		<div class="wp-block-cover__inner-container">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-lg-9">
						<?php the_title('<h1 class="d-none">', '</h1>'); ?>
						<p class="has-text-align-center has-large-font-size"><?php the_title(); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="height:75px" aria-hidden="true" class="wp-block-spacer"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
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
			</div>
		</div>
	</div>
	<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
	<?php the_content(); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
				<hr class="wp-block-separator has-text-color has-background has-primary-background-color has-primary-color is-style-wide">
				<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
				<div class="row">
					<div class="col-12 col-lg-4 next-news-link">
						<?php
						$next_post = get_next_post();
						if(!empty($next_post)) {
							echo '<a class="btn btn-primary btn-lg" href="'.get_the_permalink($next_post).'" target="_self"><i class="far fa-angle-left mr-2"></i>'.get_the_title($next_post->ID).'</a>';
						}
						?>
					</div>
					<div class="col-12 col-lg-4 home-news-link">
						<a href="<?php echo get_post_type_archive_link('post'); ?>" target="self" class="btn btn-secondary btn-lg">Zum Newsarchiv</a>
					</div>
					<div class="col-12 col-lg-4 prev-news-link">
						<?php
						$prev_post = get_previous_post();
						if(!empty($prev_post)) {
							echo '<a class="btn btn-primary btn-lg" href="'.get_the_permalink($prev_post).'" target="_self">'.get_the_title($prev_post->ID).'<i class="far fa-angle-right ml-2"></i></a>';
						}
						?>
					</div>
				</div>
				<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
			</div>
		</div>
	</div>
</main>
<?php
endwhile; endif;
get_footer();