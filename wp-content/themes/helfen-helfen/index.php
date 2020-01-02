<?php
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<main id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_content(); ?>
</main>
<?php
endwhile; endif;
get_footer();