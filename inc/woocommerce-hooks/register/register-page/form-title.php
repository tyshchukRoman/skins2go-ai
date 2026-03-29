<?php

/*
 * Open the .login-popup__form wrapper and inject the "Sign up" heading
 * at the start of the register form. The wrapper is closed in form-bottom.php.
 */
add_action('woocommerce_register_form_start', function() { ?>
  <div class="login-popup__form | flow">
    <h3><?php esc_html_e('Sign up', 'codelibry') ?></h3>
<?php });
