<?php

/*
 * Remove the WooCommerce sidebar (woocommerce_sidebar hook) on all WC pages.
 * Layout is handled entirely by the theme without a sidebar widget area.
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
