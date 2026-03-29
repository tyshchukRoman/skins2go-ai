<?php

/*
 * Restrict the billing phone input to numbers and the characters +, -, (, ),
 * and spaces. Strips any other characters on each keystroke via JS input event.
 */

add_action( 'wp_footer', 'woocommerce_billing_phone_only_numbers' );
function woocommerce_billing_phone_only_numbers() {
    ?>
    <script type="text/javascript">
        jQuery( function($){
            $(document.body).on('input', '#billing_phone', function() {
                var value = $(this).val();
                // Allow only numbers, +, -, ( , and )
                value = value.replace(/[^0-9\+\-\(\)\s]/g, '');
                $(this).val(value);
            });
        });
    </script>
    <?php
}