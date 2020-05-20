<?php
$redirect_link = get_field( 'mitstreiter_link', get_queried_object_id() );
wp_redirect( $redirect_link );
exit();