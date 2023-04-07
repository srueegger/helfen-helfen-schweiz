<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'timeline-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'timeline-container';
if( !empty($block['className']) ) {
  $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
?>
<div id="<?php echo esc_attr( $id ); ?>" class="timeline-container">
  <div class="timeline">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php
        while( have_rows( 'block_hs_events' ) ) {
          the_row();
          $year = esc_attr( get_sub_field( 'year' ) );
          $img = get_sub_field( 'img' );
          ?>
          <div class="swiper-slide" style="background-image: url('<?php echo $img['url']; ?>');" data-year="<?php echo $year; ?>">
            <div class="swiper-slide-content text-white">
              <div class="row px-3 p-lg-0">
                <div class="col-12 d-lg-none">
                  <h2 class="h1"><?php the_sub_field( 'titel' ); ?></h4>
                </div> 
                <div class="col-9 col-lg-4">
                  <span class="timeline-year"><?php echo $year; ?></span>
                </div>
                <div class="col-9 col-lg-5">
                  <h2 class="h1 d-none d-lg-block"><?php the_sub_field( 'titel' ); ?></h4>
                  <?php the_sub_field( 'txt' ); ?>
                  <p class="mb-0 text-lg-end mt-5"><a class="text-white color-white slider-next-element" href=""><?php _e( 'Nächster Meilenstein' ); ?> <i class="fa-regular fa-arrow-right"></i></a></p>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>