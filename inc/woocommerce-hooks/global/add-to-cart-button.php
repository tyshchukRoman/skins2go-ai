<?php

/*
 * Replace the default WooCommerce "Add to cart" button label with "Buy"
 * on all product archive and loop contexts (shop, category, search).
 */
add_filter( 'woocommerce_product_add_to_cart_text', function() {
  return __('Buy', 'codelibry');
});
