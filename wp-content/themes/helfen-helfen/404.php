<?php
get_header();
$btn = get_field('404_btn', 'option');
$btn_target = $btn['target'] ? $btn['target'] : '_self'
?>
<main id="page-404">
	<div class="inner">
		<h1><?php the_field('404_title', 'option'); ?></h1>
		<?php the_field('404_txt', 'option'); ?>
		<p><a href="<?php echo $btn['url']; ?>" class="btn btn-secondary" target="<?php echo $btn_target; ?>"><?php echo $btn['title']; ?></a></p>
	</div>
</main>
<?php
get_footer();