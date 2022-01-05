<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="theme-color" content="#0061ab">
		<script data-search-pseudo-elements defer src="https://kit.fontawesome.com/a69a585fa6.js" crossorigin="anonymous"></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header>
			<?php
			$addLogoClass = '';
			$addMenuClass = '';
			if(is_front_page()) {
				$addLogoClass = ' class="animate-logo"';
				$addMenuClass = ' class="animate-menu"';
			}
			?>
			<div id="logoContainer"<?php echo $addLogoClass; ?>>
				<a href="<?php echo HOME_URI; ?>" target="_self">
					<picture>
						<source srcset="<?php echo THEME_IMAGES; ?>/logo-black@2x.png 2x, <?php echo THEME_IMAGES; ?>/logo-black.png 1x">
						<img class="logo-normal" src="<?php echo THEME_IMAGES; ?>/logo-black.png" alt="">
					</picture>
					<picture>
						<source srcset="<?php echo THEME_IMAGES; ?>/logo-white@2x.png 2x, <?php echo THEME_IMAGES; ?>/logo-white.png 1x">
						<img class="logo-invert d-none" src="<?php echo THEME_IMAGES; ?>/logo-white.png" alt="">
					</picture>
				</a>
			</div>
			<div id="menuButton"<?php echo $addMenuClass; ?>>
				<button class="hamburger hamburger--squeeze" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</header>
		<?php
		get_sidebar('menu');