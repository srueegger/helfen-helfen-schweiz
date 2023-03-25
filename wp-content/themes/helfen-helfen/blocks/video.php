<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'video-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'videoblock fullpage position-relative';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
  <?php
  while( have_rows( 'block_videos' ) ) {
    the_row();
    $index = esc_attr( get_row_index() );
    $style = '';
    if( $index > 1 ) {
      $style = ' style="display: none;"';
    }
    if( wp_is_mobile(  ) ) {
      echo '<video' . $style . ' id="video-' . $index . '" autoplay controls loop muted src="' . esc_url( get_sub_field( 'moble' ) ) . '" playsinline></video>';
    } else {
      echo '<video' . $style . ' id="video-' . $index . '" autoplay controls loop muted src="' . esc_url( get_sub_field( 'desktop' ) ) . '" playsinline></video>';
    }
  }
  echo '<ul class="video_navigation">';
  while( have_rows( 'block_videos' ) ) {
    the_row();
    $index = esc_attr( get_row_index() );
    echo '<li data-show="#video-' . $index . '" role="button">Spot ' . $index . '</li>';
  }
  echo '</ul>';
  ?>
</div>