<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'faq-' . $block['id'] . '-' . rand(0,99999);
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'faq container';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-9">
      <?php
      if( have_rows( 'block_faqs' ) ) {
        echo '<div class="accordion" id="faq-' . esc_attr( $id ) . '">';
        while( have_rows( 'block_faqs' ) ) {
          the_row();
          $index = esc_attr( get_row_index() );
          ?>
          <div class="card">
            <div class="card-header" id="heading<?php echo $index; ?>">
              <h6 class="mb-0" data-toggle="collapse" data-target="#<?php echo $id; ?>-collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse<?php echo $index; ?>">
                <?php the_sub_field( 'title' ); ?>
              </h6>
            </div>
            <div id="<?php echo $id; ?>-collapse<?php echo $index; ?>" class="collapse" aria-labelledby="heading<?php echo $index; ?>" data-parent="#faq-<?php echo esc_attr( $id ); ?>">
              <div class="card-body">
                <?php the_sub_field( 'txt' ); ?>
              </div>
            </div>
          </div>
          <?php
        }
        echo '</div>';
      }
      ?>
    </div>
  </div>
</div>