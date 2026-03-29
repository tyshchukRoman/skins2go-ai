<?php

/*
 * Replace the default WooCommerce related products output with the theme's
 * products-slider block. Content (title, subtitle, button) comes from the
 * "Single Product" ACF options page; products are fetched by WC relation logic
 * (up to 8 items).
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_after_single_product_summary', function() {
  global $product;

  get_template_part('template-parts/blocks/products-slider', null, [
    'title' => get('related-products__title', $options = true),
    'button' => get('related-products__button', $options = true),
    'subtitle' => get('related-products__subtitle', $options = true),
    'products' => get_related_products($product->get_id(), $count = 8)
  ]);
}, 20 );
