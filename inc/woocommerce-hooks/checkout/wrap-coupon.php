<?php

/*
 * Move the coupon form out of its default position (priority 10) and
 * re-inject it wrapped in .coupon-widget at priority 20, so it sits in
 * a dedicated container that can be styled independently above the checkout form.
 */
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

add_action( 'woocommerce_before_checkout_form', function() { ?>
  <div class="coupon-widget">
<?php }, 15 );

add_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 20 );

add_action( 'woocommerce_before_checkout_form', function() { ?>
  </div>
<?php }, 30 );
