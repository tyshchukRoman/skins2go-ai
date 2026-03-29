<?php

/*
 * Appended after the register form (woocommerce_register_form_end): injects an
 * "Already have an account? Sign in" link pointing to /login/, then closes
 * the .login-popup__form wrapper opened in form-title.php.
 */

add_action('woocommerce_register_form_end', function() { ?>
    
        <div class="content-block woocommerce-form-login__register-text">
            Already have an account? <a href="<?php echo get_home_url() . '/login/';?>">Sign in</a>
        </div>

    </div>

    <?php 
});