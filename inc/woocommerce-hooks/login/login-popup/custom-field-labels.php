<?php

/*
 * Rename the WooCommerce "Username or email" field label to simply "Email"
 * in the login popup, since the site uses email-only authentication.
 */
add_filter( 'gettext', function( $translated_text, $text, $domain ) {
  if ( $text === 'Username or email' && $domain === 'woocommerce' ) {
    $translated_text = 'Email'; // Change this to your desired text
  }

  return $translated_text;
}, 20, 3 );
