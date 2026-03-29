<?php

/*
 * Open the .login-popup__form wrapper and inject the "Welcome" heading
 * at the start of the login form. The wrapper is closed inside form-bottom.php.
 */
add_action('woocommerce_login_form_start', function() { ?>
  <div class="login-popup__form | flow">
    <h2><?php esc_html_e('Welcome', 'codelibry') ?></h2>
<?php });
