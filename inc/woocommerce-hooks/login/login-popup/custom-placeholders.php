<?php

/*
 * Set placeholder text on login popup input fields via JS.
 * WooCommerce does not expose a PHP filter for per-field placeholders
 * on the login form, so jQuery is used to set them after DOM ready.
 */
add_action('woocommerce_login_form', function() { ?>
  <script type="text/javascript">
    jQuery(document).ready(function($){
      // Modify placeholders
      $('input#username').attr('placeholder', 'Enter your email');
      $('input#reg_username').attr('placeholder', 'Enter your username');
      $('input#reg_email').attr('placeholder', 'Enter your email');
      $('input#password').attr('placeholder', 'Enter your password');
      $('input#reg_password').attr('placeholder', 'Enter your password');
      $('input#reg_password2').attr('placeholder', 'Re-enter your password');
      $('input#user_login').attr('placeholder', 'Enter your email');
    });
  </script>
<?php }, 10);
