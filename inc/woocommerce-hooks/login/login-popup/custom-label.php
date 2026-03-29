<?php

/*
 * Rename the WooCommerce "Login" submit button text to "Sign in"
 * so it matches the heading and language used throughout the popup.
 */
add_filter( 'gettext', function( $translated_text, $text, $domain ) {
  if ( $text === 'Login' && $domain === 'woocommerce' ) {
    $translated_text = 'Sign in'; // Change this to your desired text
  }

  return $translated_text;
}, 20, 3 );
