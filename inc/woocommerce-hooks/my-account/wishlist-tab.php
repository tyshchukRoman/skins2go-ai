<?php

/*
 * Register a custom "my-wishlist" endpoint in My Account and display the
 * YITH Wishlist shortcode inside it. Requires YITH WooCommerce Wishlist plugin.
 *
 * Note: the content action hook must follow the pattern
 * 'woocommerce_account_{endpoint-slug}_endpoint'.
 */

add_action('init', function() {
  add_rewrite_endpoint('my-wishlist', EP_ROOT | EP_PAGES );
});

add_filter('query_vars', function($vars) {
  $vars[] = 'my-wishlist';
  return $vars;
}, 0);
  
// add "my-wishlist" link in account navigation
add_filter('woocommerce_account_menu_items', function($items) {
  $items['my-wishlist'] = __('Wishlist', 'codelibry');
  return $items;
});
  
// add HTML content in my-wishlist tab
add_action('woocommerce_account_my-wishlist_endpoint', function() { ?>
  <div class="woocommerce-wishlist">
    <?php echo do_shortcode('[yith_wcwl_wishlist]'); ?>
  </div>
<?php });

/*
 * If a logged-in user lands on the standalone /wishlist/ page, redirect
 * them to the My Account wishlist tab instead.
 */
add_action('template_redirect', function() {
    if (is_page('wishlist') && is_user_logged_in()) {
        wp_redirect(wc_get_account_endpoint_url('my-wishlist'));
        exit;
    }
});
