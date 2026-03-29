<?php

/*
 * Build the two-column cart grid:
 * - woocommerce_before_cart_table: opens .cart-grid + .cart-table-column.box
 * - woocommerce_after_cart_table:  closes .cart-table-column
 * - woocommerce_after_cart:        closes .cart-grid
 *   (the right column .cart-totals-column is opened in wrap-cart-totals.php)
 */
add_action( 'woocommerce_before_cart_table', function() { ?>
  <div class="cart-grid">
    <div class="cart-table-column | box">
<?php });

add_action( 'woocommerce_after_cart_table', function() { ?>
  </div>
<?php });

add_action( 'woocommerce_after_cart', function() { ?>
  </div>
<?php });
