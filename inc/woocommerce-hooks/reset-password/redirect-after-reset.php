<?php

/*
 * After WP sends the password-reset email it redirects to ?checkemail=confirm.
 * Intercept that redirect and send the user back to the referring page
 * (or /login/) with a ?reset-link-sent=true flag so the popup can show a
 * confirmation message.
 */
add_action( 'login_form_lostpassword', function() {
    if ( isset( $_REQUEST['checkemail'] ) && $_REQUEST['checkemail'] === 'confirm' ) {
        $referer = wp_get_referer();
        if ( $referer ) {
            wp_safe_redirect( add_query_arg( 'reset-link-sent', 'true', $referer ) );
        } else {
            wp_safe_redirect( home_url( '/login/?reset-link-sent=true' ) );
        }
        exit;
    }
});

/*
 * After a successful password-reset request, redirect back to the referring
 * page instead of the default WooCommerce lost-password page.
 */
add_filter( 'lostpassword_redirect', function( $redirect ) {
    $referer = wp_get_referer();
    if ( $referer && strpos( $referer, home_url() ) === 0 ) {
        return $referer;
    }
    return $redirect;
});

/*
 * When the WooCommerce reset-password form submission fails, replace the
 * generic WC error notice with a friendlier message and redirect the user
 * back to the originating page with a ?reset-error= query param so the
 * popup can display the error inline.
 */
add_action( 'wp', function() {
    if ( ! isset( $_POST['wc_reset_password'] ) ) return;

    $notices = WC()->session->get( 'wc_notices', [] );
    $message = ! empty( $notices['error'][0]['notice'] )
               ? wp_strip_all_tags( $notices['error'][0]['notice'] )
               : __( 'Something went wrong. Please check the correctness of the entered data', 'codelibry' );


    if ( strpos( $message, 'Invalid username or email' ) !== false ) {
        $message = __( "No account found with that email address.", 'codelibry' );
    } elseif ( strpos( $message, 'Password reset is not allowed' ) !== false ) {
        $message = __( 'Password reset is not allowed for this account.', 'codelibry' );
    }

    $origin = ! empty( $_POST['_wp_http_referer'] )
              ? home_url( $_POST['_wp_http_referer'] )
              : home_url( '/' );

    wp_safe_redirect( add_query_arg( 'reset-error', urlencode( $message ), $origin ) . '#popup-reset-form' );
    exit;
});