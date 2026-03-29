<?php

/*
 * Open the outer .page-auth.box wrapper before the entire
 * WooCommerce customer login form (both login and register tabs).
 * Closed in form-bottom.php via woocommerce_login_form_end.
 */

add_action('woocommerce_before_customer_login_form', function() {
    echo '<div class="page-auth box">';
});

/*
 * Open the .login-popup__form wrapper and inject the "Sign In" heading
 * at the start of the login form. The wrapper is closed inside form-bottom.php.
 */
add_action('woocommerce_login_form_start', function() { ?>
  <div class="login-popup__form | flow">
    <h3><?php esc_html_e('Sign In', 'codelibry') ?></h3>
<?php });
