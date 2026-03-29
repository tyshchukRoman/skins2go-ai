<?php

/*
 * Swap the display order of Price and Excerpt in the product summary:
 * default order is Price (10) → Excerpt (20);
 * theme order is Excerpt (10) → Price (20), so the short description
 * appears above the price.
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
