<?php

/*
 * Appended inside the login form (woocommerce_login_form): renders the
 * "Remember me" checkbox row, "Forgot your password? Reset" link (which
 * switches to the reset popup via .reset-switcher), the Cloudflare Turnstile
 * widget, and closes the .login-popup__form wrapper opened in form-title.php.
 */
add_action('woocommerce_login_form', function() { ?>
    <div class="lost-rem">
      <p class="form-row">
        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
          <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> 
          <span><?php esc_html_e('Remember me', 'codelibry'); ?></span>
        </label>
      </p>

      <p class="woocommerce-LostPassword lost_password">
        <?php esc_html_e('Forgot your password?', 'codelibry') ?>
        <a class="account-switcher reset-switcher" href="#popup-reset-form">
          <?php esc_html_e('Reset', 'codelibry') ?>
        </a>
      </p>
    </div>

    <div id="cf-turnstile-login" class="cf-turnstile"></div>
  </div>
<?php });


/*
 * Appended after the login form (woocommerce_login_form_end): injects a
 * "Don't have an account? Sign up" switcher link that opens the register popup.
 */
add_action('woocommerce_login_form_end', function() { ?>
  <p class="account-switcher-wrapper">
    <?php esc_html_e('Don’t have an account yet?', 'codelibry') ?> 
    <a class="account-switcher" href="#popup-register-form"><?php esc_html_e('Sign up', 'codelibry') ?></a>
  </p>
<?php });
