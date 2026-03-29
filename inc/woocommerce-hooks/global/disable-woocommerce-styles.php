<?php

/*
 * Prevent WooCommerce from enqueueing its own stylesheet bundle.
 * The theme provides complete custom styles for all WC pages, so the
 * default CSS would only cause conflicts.
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
