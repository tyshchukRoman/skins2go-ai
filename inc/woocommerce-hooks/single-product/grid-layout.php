<?php

/*
 * Wrap the product gallery and product summary inside a CSS grid container
 * (.single-product-grid) at priority 0 — before any other summary hooks —
 * so both columns are enclosed in a single section > container > grid.
 */
add_action( 'woocommerce_before_single_product_summary', function() { ?>
	<section class="single-product-wrapper">
		<div class="container">
			<div class="single-product-grid | grid">
<?php }, 0 );

add_action( 'woocommerce_after_single_product_summary', function() { ?>
			</div>
		</div>
	</section>
<?php }, 0 );
