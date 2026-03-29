<?php

/*
 * Build the two-column My Account layout:
 * - woocommerce_before_account_navigation: opens .myaccount-grid + navigation column wrapper
 * - woocommerce_after_account_navigation:  closes navigation column, opens content column
 * - woocommerce_account_content_end:       closes content column + grid
 */
add_action('woocommerce_before_account_navigation', function() { ?>
  <div class="myaccount-grid">
    <div class="myaccount-navigation-column">
      <div class="myaccount-navigation-wrapper | box">
<?php });

add_action('woocommerce_after_account_navigation', function() { ?>
    </div>
  </div>

  <div class="myaccount-content-column | box">
<?php });

add_action('woocommerce_account_content_end', function() { ?>
    </div>
  </div>
<?php });
