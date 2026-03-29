<?php

/*
 * Wrap the WooCommerce product tabs (Description, Reviews, etc.) inside
 * a full-width .single-product-tabs section. Uses priorities 9 and 11
 * to open/close the wrapper around the default tabs output at priority 10.
 */
add_action( 'woocommerce_after_single_product_summary', function() { ?>
  <section class="single-product-tabs | section-top">
    <div class="container">
<?php }, 9);

add_action( 'woocommerce_after_single_product_summary', function() { ?>
    </div>
  </section>
<?php }, 11);
