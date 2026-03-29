<?php

/*
 * Intercept WooCommerce reset-password error notices, replace raw WC strings
 * with friendlier messages, and store the result in a short-lived transient
 * (60 s) keyed to the session — long enough to survive the redirect but
 * not so long that stale errors linger.
 * Replaced strings:
 * - "Invalid username or email" → account-not-found copy
 * - "Password reset is not allowed" → explicit not-allowed copy
 */

add_action( 'wp', function() {
    if ( ! isset( $_POST['wc_reset_password'] ) ) return;

    // Store the error in a transient tied to the session
    $notices = WC()->session->get( 'wc_notices', [] );
    if ( empty( $notices['error'] ) ) return;

    $message = wp_strip_all_tags( $notices['error'][0]['notice'] );

    if ( strpos( $message, 'Invalid username or email' ) !== false ) {
        $message = __( "We couldn't find an account with that email address.", 'codelibry' );
    } elseif ( strpos( $message, 'Password reset is not allowed' ) !== false ) {
        $message = __( 'Password reset is not allowed for this account.', 'codelibry' );
    }

    // Store in transient for 60 seconds — enough to survive the redirect
    set_transient( 'reset_error_' . WC()->session->get_customer_id(), $message, 60 );
}, 20 );