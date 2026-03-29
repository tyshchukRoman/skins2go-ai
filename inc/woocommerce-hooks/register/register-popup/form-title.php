<?php

/*
 * Open the .login-popup__form wrapper and inject the "Sign up" heading
 * at the start of the register popup form. The wrapper is closed in form-bottom.php.
 */
add_action('woocommerce_register_form_start', function() { ?>
  <div class="login-popup__form | flow">
    <h2><?php esc_html_e('Sign up', 'codelibry') ?></h2>
<?php });
