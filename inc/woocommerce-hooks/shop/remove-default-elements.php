<?php

/*
 * Strip all default WooCommerce archive header output: breadcrumb, taxonomy
 * description, product archive description, taxonomy loop header, and the
 * page title — the theme renders its own title via shop/page-title.php.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
remove_action( 'woocommerce_shop_loop_header', 'woocommerce_product_taxonomy_archive_header', 10 );
add_filter( 'woocommerce_show_page_title', '__return_false' );


/*
 * Prevent WordPress from adding the automatic `sizes` attribute to <img> tags.
 * WP 6.4+ injects `sizes="auto, ..."` which can conflict with the theme's
 * layout-aware image sizing and produce unexpected responsive behaviour.
 */
add_filter( 'wp_img_tag_add_auto_sizes', '__return_false' );
