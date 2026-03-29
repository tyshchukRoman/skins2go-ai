<?php

/*
 * Move breadcrumbs into the product summary column by hooking
 * woocommerce_breadcrumb onto woocommerce_single_product_summary at
 * priority 0 — before the product title (priority 5) — so they appear
 * at the very top of the summary area.
 */
add_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 0 );
