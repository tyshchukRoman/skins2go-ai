<?php

/*
 * Open the two-column checkout grid (.checkout-grid) that holds the
 * billing/shipping form on the left and the order summary on the right.
 * Closed by woocommerce_checkout_after_order_review at the bottom of this file.
 */
add_action( 'woocommerce_checkout_before_customer_details', function() { ?>
  <div class="checkout-grid">
<?php });


/*
 * Wrap "Checkout Form" in custom container
 */
add_action( 'woocommerce_checkout_before_customer_details', function() { ?>
  <div class="checkout-form-column | box">
<?php });

add_action( 'woocommerce_checkout_after_customer_details', function() { ?>
  </div>
<?php });


/*
 * Wrap the order summary heading and order review table together inside
 * .order-details-column > .order-details-wrapper.box — the right column.
 * Also closes the outer .checkout-grid wrapper opened above.
 */
add_action( 'woocommerce_checkout_before_order_review_heading', function() { ?>
  <div class="order-details-column">
    <div class="order-details-wrapper | box">
<?php });

add_action( 'woocommerce_checkout_after_order_review', function() { ?>
      </div>
    </div>
  </div>
<?php });
