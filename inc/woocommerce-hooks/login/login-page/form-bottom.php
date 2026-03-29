<?php

/*
 * Appended inside the login form (woocommerce_login_form): renders the
 * "Remember me" checkbox row, "Forgot your password?" link, the Cloudflare
 * Turnstile widget, and closes the .login-popup__form wrapper opened in
 * form-title.php.
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
        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot your password?', 'woocommerce' ); ?></a>
      </p>
    </div>

    <div id="cf-turnstile-login" class="cf-turnstile"></div>
  </div>
<?php });

/*
 * Appended after the login form (woocommerce_login_form_end): injects a
 * "Don't have an account? Sign up" link pointing to /register/, then closes
 * the outer .page-auth.box wrapper opened in form-title.php.
 */

add_action('woocommerce_login_form_end', function() { ?>
    
        <div class="content-block woocommerce-form-login__register-text">
            Don’t have an account yet? <a href="<?php echo get_home_url() . '/register/';?>">Sign up</a>
        </div>

    </div>

    <?php 
});