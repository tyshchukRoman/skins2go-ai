<?php

/*
 * Replace WooCommerce's default content wrappers with theme-specific ones.
 * Removes woocommerce_output_content_wrapper / _end and injects
 * <main class="main"> + <div class="woocommerce-page"> around all WC content.
 */
add_action('after_setup_theme', function () {
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10);

		add_action('woocommerce_before_main_content', function () { ?>
      <main class="main" id="main"><div class="woocommerce-page">
		<?php }, 10);

		add_action('woocommerce_after_main_content',  function() { ?>
      </div></main>
		<?php }, 10);
});
