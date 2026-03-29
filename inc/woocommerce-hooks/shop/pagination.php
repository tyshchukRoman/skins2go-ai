<?php

/*
 * Adjust shop pagination link counts:
 * - end_size: 2 pages shown at each end (first/last)
 * - mid_size: 2 pages shown on each side of the current page
 */
add_filter( 'woocommerce_pagination_args', function( $args ) {
	$args['end_size'] = 2; // Number of pages at the beginning and end
	$args['mid_size'] = 2; // Number of pages around the current page
	return $args;
});
