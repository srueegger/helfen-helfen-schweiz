<nav class="main_menu menu-desktop">
	<div class="container-fluid custom-size scroll">
		<div class="row justify-content-center align-items-center custom-size">
			<div class="col-12 col-md-10 col-xl-5">
				<?php
				/* Hauptmenü */
				$args = array(
					'theme_location' => 'main-menu',
					'depth' => 0,
					'container_class' => 'menu-container',
					'menu_class' => 'menu-list list-unstyled mb-0 mt-3'
				);
				wp_nav_menu($args);
				/* Submenü */
				$args = array(
					'theme_location' => 'sub-menu',
					'depth' => 1,
					'container_class' => 'submenu-container',
					'menu_class' => 'submenu-list list-inline mb-0 mt-4'
				);
				wp_nav_menu($args);
				?>
				<div class="social-media-container mt-4">
					<?php
					$locations = get_nav_menu_locations();
					$menuID = $locations['socialmedia-menu'];
					$menuItems = wp_get_nav_menu_items($menuID);
					if(!empty($menuItems)) {
						foreach($menuItems as $menuItem) {
							$icon = get_field('sm_menu_icon', $menuItem);
							echo '<a class="sm-icon" href="'.$menuItem->url.'" target="'.$menuItem->target.'"><i class="'.$icon.' fa-fw fa-2x"></i></a>';
						}
					}
					?>
					<a href="<?php echo get_post_type_archive_link('post'); ?>" target="_self" class="menu-news">
						<i class="fas fa-newspaper fa-fw"></i>
					</a>
				</div>
			</div>
			<div class="col-xl-5 h-100 d-none d-xl-block">
				<div class="dynamic-menu-content"></div>
			</div>
		</div>
	</div>
	<div class="container-fluid footer">
		<div class="row justify-content-center footer">
			<?php
			/* Footer Inhalte ausgeben */
			$footerSections = array('left', 'middle', 'right');
			foreach($footerSections as $footerSection) {
				$icon = get_field('footer_'.$footerSection.'_icon', 'option');
				$txt = get_field('footer_'.$footerSection.'_txt', 'option');
				$link = get_field('footer_'.$footerSection.'_link', 'option');
				$linkTarget = '_self';
				if(get_field('footer_'.$footerSection.'_link_newtab', 'option')) {
					$linkTarget = '_blank';
				}
				?>
				<div class="col-4 mt-25">
					<div class="row justify-content-center no-gutters">
						<div class="col-4 col-xl-2 text-center">
							<a href="<?php echo $link; ?>" target="<?php echo $linkTarget; ?>" class="text-white">
								<i class="<?php echo $icon; ?> fa-fw fa-3x"></i>
							</a>
						</div>
						<div class="col-xl-6 d-none d-xl-block">
							<?php echo $txt; ?>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<?php
	/* Die neusten beiden veröffentlichten Newsbeiträge auslesen */
	$args = array(
		'posts_per_page' => 1,
		'post_type' => 'post',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC'
	);
	$news = get_posts($args);
	if(!empty($news)) {
		echo '<div id="menuNewsContent" class="d-none"><div class="menu-news-container">';
		global $post;
		foreach($news as $post) {
			setup_postdata( $post );
			echo '<div data-goto="'.get_the_permalink().'" class="news-item"><div class="news-date">'.get_the_time( get_option( 'date_format' ) ).'</div>';
			the_title('<h3>', '</h3>');
			the_excerpt();
			echo '</div>';
		}
		wp_reset_postdata();
		echo '</div></div>';
	}
	?>
</nav>

<nav class="main_menu menu-mobile">
	<div class="container-fluid custom-size">
		<div class="row justify-content-center align-items-center custom-size">
			<div class="col-12">
				<?php
				/* Hauptmenü */
				$args = array(
					'theme_location' => 'main-menu',
					'depth' => 0,
					'container_class' => 'menu-container',
					'menu_class' => 'menu-list menu-list-mobile list-unstyled mb-0 mt-3'
				);
				wp_nav_menu($args);
				/* Submenü */
				$args = array(
					'theme_location' => 'sub-menu',
					'depth' => 1,
					'container_class' => 'submenu-container text-center',
					'menu_class' => 'submenu-list list-inline mb-0 mt-4'
				);
				wp_nav_menu($args);
				?>
				<div class="social-media-container mt-4 text-center">
					<?php
					$locations = get_nav_menu_locations();
					$menuID = $locations['socialmedia-menu'];
					$menuItems = wp_get_nav_menu_items($menuID);
					if(!empty($menuItems)) {
						foreach($menuItems as $menuItem) {
							$icon = get_field('sm_menu_icon', $menuItem);
							echo '<a class="sm-icon" href="'.$menuItem->url.'" target="'.$menuItem->target.'"><i class="'.$icon.' fa-fw fa-2x"></i></a>';
						}
					}
					?>
					<a href="<?php echo get_post_type_archive_link('post'); ?>" target="_self" class="menu-news">
						<i class="fas fa-newspaper fa-fw"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid footer">
		<div class="row justify-content-center footer">
			<?php
			/* Footer Inhalte ausgeben */
			$footerSections = array('left', 'middle', 'right');
			foreach($footerSections as $footerSection) {
				$icon = get_field('footer_'.$footerSection.'_icon', 'option');
				$txt = get_field('footer_'.$footerSection.'_txt', 'option');
				$link = get_field('footer_'.$footerSection.'_link', 'option');
				$linkTarget = '_self';
				if(get_field('footer_'.$footerSection.'_link_newtab', 'option')) {
					$linkTarget = '_blank';
				}
				?>
				<div class="col-4 mt-25">
					<div class="row justify-content-center no-gutters">
						<div class="col-4 col-xl-2 text-center">
							<a href="<?php echo $link; ?>" target="<?php echo $linkTarget; ?>" class="text-white">
								<i class="<?php echo $icon; ?> fa-fw fa-3x"></i>
							</a>
						</div>
						<div class="col-xl-6 d-none d-xl-block">
							<?php echo $txt; ?>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<?php
	/* Die neusten beiden veröffentlichten Newsbeiträge auslesen */
	$args = array(
		'posts_per_page' => 2,
		'post_type' => 'post',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC'
	);
	$news = get_posts($args);
	if(!empty($news)) {
		echo '<div id="menuNewsContent" class="d-none"><div class="menu-news-container">';
		global $post;
		foreach($news as $post) {
			setup_postdata( $post );
			echo '<div data-goto="'.get_the_permalink().'" class="news-item"><div class="news-date">'.get_the_time( get_option( 'date_format' ) ).'</div>';
			the_title('<h3>', '</h3>');
			the_excerpt();
			echo '</div>';
		}
		wp_reset_postdata();
		echo '</div></div>';
	}
	?>
</nav>