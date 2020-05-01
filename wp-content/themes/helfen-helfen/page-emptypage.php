<?php
/* Template Name: Leere Oberseite */
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<main id="page-<?php the_ID(); ?>" <?php post_class('emptypage'); ?>>
	<div class="inner">
		<?php
		/* Unterseiten der aktuellen Seite ermitteln */
		$args = array(
			'posts_per_page' => -1,
			'post_type' => 'page',
			'post_status' => 'publish',
			'orderby' => 'menu_order',
			'order' => 'DESC',
			'post_parent' => get_queried_object_id()

		);
		$pages = get_posts($args);
		if(!empty($pages)) {
			echo '<ul class="list-unstyled text-center">';
			global $post;
			foreach($pages as $post) {
				setup_postdata( $post );
				echo '<li><a href="'.get_the_permalink().'" target="_self">'.get_the_title().'</a></li>';
			}
			wp_reset_postdata();
			echo '</ul>';
		}
		?>
	</div>
</main>
<?php
endwhile; endif;
get_footer();