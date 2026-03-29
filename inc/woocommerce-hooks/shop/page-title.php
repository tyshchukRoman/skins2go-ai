<?php

/*
 * Inject a custom "Our Shop" <h1> heading inside .woocommerce-page__title
 * at the top of the shop loop header. Replaces the default WC page title
 * which is suppressed in remove-default-elements.php.
 */
add_action( 'woocommerce_shop_loop_header', function() { ?>
  <div class="woocommerce-page__title">
      <div class="container">
          <h1><?php esc_html_e('Our Shop', 'codelibry') ?></h1>
      </div>
  </div>
<?php }, 10 );
