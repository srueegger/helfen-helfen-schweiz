<?php
/* Template für das Newsarchiv */
get_header();
$image = get_field('news_image', get_queried_object_id());
?>
<main id="newsarchive">
	<div class="wp-block-cover has-background-dim-40 <?php the_field('news_image_layer', get_queried_object_id()); ?> has-background-dim fullpage" style="background-image:url(<?php echo $image['sizes']['imgsize-1920']; ?>)">
		<div class="wp-block-cover__inner-container">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-lg-9">
						<?php echo '<h1 class="d-none">'.get_the_title(get_queried_object_id()).'</h1>'; ?>
						<p class="has-text-align-center has-large-font-size"><?php echo get_the_title(get_queried_object_id()); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="height:75px" aria-hidden="true" class="wp-block-spacer"></div>
		<?php
		/* News ausgeben */
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			?>
			<div id="news-<?php the_ID(); ?>" <?php post_class('container'); ?>>
				<div class="row justify-content-center">
					<div class="col-12 col-lg-9">
						<?php
						the_title('<h2 class="mb-3 h3">', '</h2>');
						get_template_part( 'templates/news', 'meta' );
						?>
						<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
					</div>
					<div class="col-12 col-lg-9 mb-4">
						<?php the_excerpt(); ?>
						<p class="text-right"><a href="<?php the_permalink(); ?>" class="btn btn-primary" target="_self">Mehr lesen</a></p>
					</div>
				</div>
			</div>
			<?php
		endwhile; endif;
		?>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<nav class="news-pagination text-center">
					<hr class="wp-block-separator has-text-color has-background has-primary-background-color has-primary-color is-style-wide">
					<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
					<?php hh_pagination_bar(); ?>
					<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
				</nav>
			</div>
		</div>
	</div>
</main>
<?php
get_template_part( 'templates/page', 'footer' );
get_template_part( 'templates/modal', 'windows' );
get_footer();