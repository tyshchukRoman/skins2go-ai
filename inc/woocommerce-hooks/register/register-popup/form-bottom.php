<?php

/*
 * Appended after the register form (woocommerce_register_form_end): injects an
 * "Already have an account? Sign in" switcher link that opens the login popup,
 * then closes the .login-popup__form wrapper opened in form-title.php.
 */

add_action('woocommerce_register_form_end', function() { ?>
    <p class="account-switcher-wrapper">
      <?php esc_html_e('Already have an account?', 'codelibry') ?> 
      <a class="account-switcher" href="#popup-login-form"><?php esc_html_e('Sign in', 'codelibry') ?></a>
    </p>
  </div>
<?php });
