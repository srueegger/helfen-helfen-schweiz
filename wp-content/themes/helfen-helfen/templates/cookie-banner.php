<div id="cookieBanner" class="shadow">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<p class="h6"><?php the_field( 'cookie_banner_title', 'option' ); ?></p>
				<?php the_field( 'cookie_banner_txt', 'option' ); ?>
				<button id="closeCookieBanner" type="button" class="btn btn-primary btn-sm"><?php the_field( 'cookie_banner_btn', 'option' ); ?></button>
			</div>
		</div>
	</div>
</div>