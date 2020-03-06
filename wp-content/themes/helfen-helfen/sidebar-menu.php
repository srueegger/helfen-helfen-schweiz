<nav id="mainMenu">
	<div class="container-fluid custom-size">
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
						<i class="fas fa-newspaper fa-fw fa-4x"></i>
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
	<div id="menuNewsContent" class="d-none">
		<div class="menu-news-container">
			<div class="news-item">
				<div class="news-date">23. August 1988</div>
				<h3>Titel der News</h3>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
			</div>
			<div class="news-item">
				<div class="news-date">23. August 1988</div>
				<h3>Titel der News</h3>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
			</div>
		</div>
	</div>
</nav>