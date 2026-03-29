<?php

foreach (glob(CODELIBRY_THEME_PATH . '/inc/woocommerce-hooks/cart/*.php') as $file) {
    require $file;
}

foreach (glob(CODELIBRY_THEME_PATH . '/inc/woocommerce-hooks/checkout/*.php') as $file) {
    require $file;
}

foreach (glob(CODELIBRY_THEME_PATH . '/inc/woocommerce-hooks/global/*.php') as $file) {
    require $file;
}

foreach (glob(CODELIBRY_THEME_PATH . '/inc/woocommerce-hooks/my-account/*.php') as $file) {
    require $file;
}

foreach (glob(CODELIBRY_THEME_PATH . '/inc/woocommerce-hooks/reset-password/*.php') as $file) {
    require $file;
}

foreach (glob(CODELIBRY_THEME_PATH . '/inc/woocommerce-hooks/shop/*.php') as $file) {
    require $file;
}

foreach (glob(CODELIBRY_THEME_PATH . '/inc/woocommerce-hooks/single-product/*.php') as $file) {
    require $file;
}


$display_popup = get('header__login-popup', $options = true);

if($display_popup):

    foreach (glob(CODELIBRY_THEME_PATH . '/inc/woocommerce-hooks/login/login-popup/*.php') as $file) {
        require $file;
    }

    foreach (glob(CODELIBRY_THEME_PATH . '/inc/woocommerce-hooks/register/register-popup/*.php') as $file) {
        require $file;
    }

else:

  // Login Page Hooks
    foreach (glob(CODELIBRY_THEME_PATH . '/inc/woocommerce-hooks/login/login-page/*.php') as $file) {
        require $file;
    }

    foreach (glob(CODELIBRY_THEME_PATH . '/inc/woocommerce-hooks/register/register-page/*.php') as $file) {
        require $file;
    }

endif;
