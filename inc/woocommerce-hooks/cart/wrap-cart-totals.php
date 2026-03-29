<?php

/*
 * Wrap the cart totals section (subtotal, shipping, total, proceed button)
 * inside .cart-totals-column > .cart-totals-wrapper.box — the right-hand
 * column of the two-column cart grid defined in grid-layout.php.
 */
add_action( 'woocommerce_before_cart_collaterals', function() { ?>
  <div class="cart-totals-column">
    <div class="cart-totals-wrapper | box">
<?php });

add_action( 'woocommerce_after_cart', function() { ?>
    </div>
  </div>
<?php });
