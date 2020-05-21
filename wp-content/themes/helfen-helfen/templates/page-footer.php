<footer id="pageFooter">
	<span id="scrollToTop"><i class="fas fa-long-arrow-up fa-2x"></i></span>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list-inline page-footer-menu">
					<?php
					$menu_locations = get_nav_menu_locations();
					$footer_menu_id = $menu_locations['footer-menu'];
					$footer_menu = wp_get_nav_menu_items($footer_menu_id);
					foreach($footer_menu as $menu) {
						$link_target = $menu->target ? $menu->target : '_self';
						echo '<li class="list-inline-item"><a href="'.$menu->url.'" target="'.$link_target.'">'.$menu->title.'</a></li>';
					}
					?>
				</ul>
			</div>
		</div>
	</div>
</footer>