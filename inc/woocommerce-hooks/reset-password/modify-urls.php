<?php

/*
 * Rewrite the "lost password" URL to a hash anchor (#popup-reset-form)
 * so clicking "Forgot your password?" opens the reset popup rather than
 * navigating to a separate page. Skipped in wp-admin to avoid breaking
 * the admin login flow.
 */
add_filter('lostpassword_url', function ($url) {
    if (is_admin()) {
        return $url;
    }

    return '#popup-reset-form';
});
