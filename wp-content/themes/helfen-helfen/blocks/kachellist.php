<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'kachellist-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'foerderer';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
$columns = get_field( 'block_kachellist_columns' );
$print_columns = 'col-12 col-lg-6 col-xl-4';
if( $columns == 2 ) {
  $print_columns = 'col-12 col-lg-6 heightfix';
}
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
  <?php
  if( have_rows( 'block_kachellist_elements' ) ) {
    echo '<div class="row no-gutters">';
    while( have_rows( 'block_kachellist_elements' ) ) {
      the_row();
      $image = get_sub_field( 'img' );
      $link = get_sub_field( 'link' );
      $link_target = $link['target'] ? $link['target'] : '_self';
      ?>
      <div class="<?php echo $print_columns; ?> foerdererItem">
        <a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
          <picture>
            <source srcset="<?php echo $image['sizes']['kopf']; ?> 1x, <?php echo $image['sizes']['kopf2x']; ?> 2x">
            <img data-object-fit="cover" src="<?php echo $image['sizes']['kopf']; ?>" loading="lazy" alt="<?php echo $image['alt']; ?>">
          </picture>
          <div class="overlay">
            <div class="inner">
              <h2><?php echo esc_attr( $link['title'] ); ?></h2>
              <?php
              if( !empty( get_sub_field( 'subtitle' ) ) ) {
                echo '<p class="font-weight-bold">' . esc_attr( get_sub_field( 'subtitle' ) ) . '</p>';
              }
              ?>
            </div>
          </div>
        </a>
      </div>
      <?php
    }
    echo '</div>';
  }
  ?>
</div>