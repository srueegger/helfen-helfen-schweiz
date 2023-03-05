<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'social-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'social-icons bg-primary';
if( !empty($block['className']) ) {
	$className .= '' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<div class="container">
    <div class="row text-center">
      <div class="col-12">
        <p class="text-white">Wir <i class="fas fa-heart text-danger fa-fw"></i> Social Media</p>
      </div>
      <div class="col-12 mt-4">
        <ul class="list-inline mb-0">
          <?php
          while( have_rows( 'block_social_icons' ) ) {
            the_row();
            echo '<li class="list-inline-item"><a class="text-white" href="' . esc_url( get_sub_field( 'url' ) ) . '"><i class="' . get_sub_field( 'icon' ) . ' fa-4x fa-fw"></i></a></li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>