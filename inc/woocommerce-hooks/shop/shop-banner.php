<?php

/*
 * Render the shop-banner block at the top of the shop loop header.
 * Content (image, title, description) is pulled from the "Shop" ACF options page.
 */
add_action( 'woocommerce_shop_loop_header', function() {

  get_template_part('template-parts/blocks/shop-banner', null, [
    'image' => get('shop-banner__image', $options = true),
    'title' => get('shop-banner__title', $options = true),
    'description' => get('shop-banner__description', $options = true),
  ]);

}, 10 );
