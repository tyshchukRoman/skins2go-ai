<?php
/*
 * Auto-update the cart when quantity changes, without requiring the
 * "Update cart" button click:
 * - Hides the native "Update cart" button via CSS (it's triggered programmatically)
 * - Blocks the minus button at qty = 1 and shows an inline error message
 * - Blocks the plus button at stock max and shows an inline error message
 * - On any qty input change, validates min/max, then debounces 500 ms before
 *   programmatically clicking "Update cart" to submit the new quantity
 */
add_action( 'wp_head', function() {
  ?>
    <style>
      .woocommerce button[name="update_cart"],
      .woocommerce input[name="update_cart"] {
        display: none;
      }
      .qty-error-msg {
        display: block;
        color: #e2401c;
        font-size: 12px;
        padding-top: 1.5rem;
        white-space: nowrap;
        width: 100%;
      }
    </style>
  <?php
   add_action( 'wp_footer', function() { ?>
  <script>
    jQuery( function( $ ) {
      let timeout;

      function showQtyError( $wrapper, message ) {
        $wrapper.find('.qty-error-msg').remove();
        $wrapper.append('<span class="qty-error-msg">' + message + '</span>');
        setTimeout( function() {
          $wrapper.find('.qty-error-msg').fadeOut(300, function(){ $(this).remove(); });
        }, 3000 );
      }

      $('.woocommerce').on( 'click', '.quantity .minus', function() {
        let $input   = $(this).siblings('input.qty');
        let value    = parseInt( $input.val(), 10 );
        let $wrapper = $(this).closest('.quantity');

        if ( value <= 1 ) {
          $input.val(1);
          showQtyError( $wrapper, "Quantity can't be lower than 1" );
          return false;
        }
      });

      $('.woocommerce').on( 'click', '.quantity .plus', function() {
        let $input   = $(this).siblings('input.qty');
        let value    = parseInt( $input.val(), 10 );
        let max      = parseInt( $input.attr('max'), 10 );
        let $wrapper = $(this).closest('.quantity');

        if ( !isNaN( max ) && value >= max ) {
          $input.val( max );
          showQtyError( $wrapper, "Only " + max + " item(s) available in stock" );
          return false;
        }
      });

      $('.woocommerce').on( 'change', 'input.qty', function() {
        let $input   = $(this);
        let value    = parseInt( $input.val(), 10 );
        let max      = parseInt( $input.attr('max'), 10 );
        let $wrapper = $input.closest('.quantity');

        $wrapper.find('.qty-error-msg').remove();

        if ( value < 1 || isNaN( value ) ) {
          $input.val(1);
          showQtyError( $wrapper, "Quantity can't be lower than 1" );
          return;
        }

        if ( !isNaN( max ) && value > max ) {
          $input.val( max );
          showQtyError( $wrapper, "Only " + max + " item(s) available in stock" );
          return;
        }

        if ( timeout !== undefined ) {
          clearTimeout( timeout );
        }
        timeout = setTimeout( function() {
          $("[name='update_cart']").trigger("click");
        }, 500 );
      });
    });
  </script>
  <?php });
});