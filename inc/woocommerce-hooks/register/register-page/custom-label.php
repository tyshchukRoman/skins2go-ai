<?php

/*
 * Rename the WooCommerce "Register" submit button text to "Sign up"
 * to match the page heading and the rest of the auth UI language.
 */
add_filter( 'gettext', function( $translated_text, $text, $domain ) {
  if ( $text === 'Register' && $domain === 'woocommerce' ) {
    $translated_text = esc_html('Sign up', 'codelibry'); // Change this to your desired text
  }

  return $translated_text;
}, 20, 3 );
