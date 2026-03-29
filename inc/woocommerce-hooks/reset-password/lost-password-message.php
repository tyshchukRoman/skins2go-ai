<?php

/*
 * Override the introductory text shown above the lost-password form.
 * If the ACF options field 'auth_popup_reset_text' is set, the message is
 * suppressed (the popup handles it via its own template). Otherwise a
 * default "enter your email…" prompt is shown.
 */
add_filter('woocommerce_lost_password_message', function() {
  $custom_text = get('auth_popup_reset_text', $options = true);
  if (!empty($custom_text)) {
    return '';
  }

  return esc_html__('Enter your email address and we’ll send you a link to create a new password.', 'codelibry');
});
