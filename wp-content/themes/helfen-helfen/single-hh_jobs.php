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
				<?php the_field( 'jobs_about_us' ); ?>
			</div>
		</div>
		<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<?php the_title( '<h2>', '</h2>' ); ?>
			</div>
		</div>
		<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<h3 class="h5 mb-3">Das erwartet Dich:</h3>
				<?php the_field( 'jobs_about_job' ); ?>
			</div>
		</div>
		<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<h3 class="h5 mb-3">Das hast Du drauf:</h3>
				<?php
				if(have_rows( 'jobs_skills' )) {
					echo '<ul class="fa-ul custom">';
					while(have_rows( 'jobs_skills' )) {
						the_row();
						echo '<li><span class="fa-li"><i class="fas fa-check text-success"></i></span>'.get_sub_field( 'txt' ).'</li>';
					}
					echo '</ul>';
				}
				?>
			</div>
		</div>
		<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<h3 class="h5 mb-3">Das bieten wir:</h3>
				<?php
				if(have_rows( 'jobs_benefits' )) {
					echo '<ul class="fa-ul custom">';
					while(have_rows( 'jobs_benefits' )) {
						the_row();
						echo '<li><span class="fa-li"><i class="fas fa-long-arrow-right text-warning"></i></span>'.get_sub_field( 'txt' ).'</li>';
					}
					echo '</ul>';
				}
				?>
			</div>
		</div>
		<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<?php the_field( 'jobs_epilog' ); ?>
			</div>
		</div>
	</div>
	<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
</main>
<?php
endwhile; endif;
get_footer();