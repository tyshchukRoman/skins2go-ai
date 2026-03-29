<?php

/*
 * Skip WordPress's default "You have been logged out" confirmation page and
 * redirect the user straight to the homepage after logging out.
 */
add_filter( 'logout_redirect', function( $redirect_to, $requested_redirect_to, $user ) {
  return home_url();
}, 10, 3 );
