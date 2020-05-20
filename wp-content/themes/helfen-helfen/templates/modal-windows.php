<?php
/* Prüfen ob ein auf dieser Seite ein Modal Widow angezeigt werden muss */
if( have_rows( 'setting_modalwindow_windows', 'option' ) ) {
	while( have_rows( 'setting_modalwindow_windows', 'option' ) ) {
		the_row();
		$window_pages = get_sub_field( 'pages' );
		if( in_array( get_queried_object_id(), $window_pages ) ) {
			/* Modal Fenster ausgeben */
			?>
			<div class="modal fade helfen-helfen-modal" id="helfen-helfen-infowindow-<?php echo get_row_index(); ?>" tabindex="-1" role="dialog" aria-labelledby="helfen-helfen-infowindow-Label-<?php echo get_row_index(); ?>" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
						<?php
						$title = get_sub_field( 'title' );
						if($title) {
							?>
							<div class="modal-header">
								<h5 class="modal-title" id="helfen-helfen-infowindow-Label-<?php echo get_row_index(); ?>"><?php echo $title; ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true"><i class="fas fa-times fa-2x"></i></span>
									</button>
							</div>
							<?php
						} else {
							?>
							<button type="button" class="close custom" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times fa-2x"></i></span>
							</button>
							<?php
						}
						?>
						<div class="modal-body">
							<?php
							$typ = get_sub_field( 'typ' );
							if(!$typ) {
								/* Normaler Inhalt */
								the_sub_field( 'content' );
							} else {
								echo '<div class="embed-container">';
								$args = array(
									''
								);
								echo wp_oembed_get( get_sub_field( 'video' ), $args );
								echo '</div>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}
}