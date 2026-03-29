<?php

/*
 * Clear the cart immediately after a new order is created.
 * Needed for payment methods (e.g. Transferty) that do not trigger the
 * standard WooCommerce payment flow which normally empties the cart.
 */
add_action( 'woocommerce_checkout_order_created', function() {
  if ( WC()->cart && ! WC()->cart->is_empty() ) {
    WC()->cart->empty_cart();
  }
});
