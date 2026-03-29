<?php

$account_link  = get_permalink( get_option('woocommerce_myaccount_page_id') );
$register_link = wc_get_page_permalink('myaccount') . '?action=register';
$display_popup = get('header__login-popup', $options = true);
$login_href    = $display_popup ? '#popup-login-form' : $account_link;

?>

<?php if ( is_user_logged_in() ): ?>

  <a href="<?php echo esc_url( $account_link ) ?>" class="header__account-link">
    <?php echo get_inline_svg('account-icon') ?>
    <span class="visually-hidden"><?php esc_html_e('My account', 'codelibry') ?></span>
  </a>

<?php else: ?>

  <div class="header__auth">
    <a href="<?php echo esc_url( $login_href ) ?>" class="button button--outline">
      <?php esc_html_e('Sign In', 'codelibry') ?>
    </a>
    <a href="<?php echo esc_url( $register_link ) ?>" class="button">
      <?php esc_html_e('Sign Up', 'codelibry') ?>
    </a>
  </div>

<?php endif; ?>
